<?php
/**
 * _shared/audit/Audit.php — motore di audit: discovery dei siti, esecuzione dei
 * controlli e raccolta dei "findings".
 *
 * Categorie di controllo (cfr. piano):
 *   A  Associazione landing/operatore/company   D  Link & asset
 *   B  Coerenza dati legali                       E  Contratto DOM del form
 *   C  Testi consenso / brand                     F  Residui migrazione PHP
 *   R  Refusi / contenuto (consenso fra copie, formato, placeholder, mojibake)
 *
 * Ogni finding: site, cat, sev (ERROR|WARN|INFO), code, msg, file.
 */

require_once __DIR__ . '/../dbc2_lib.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/Canonical.php';

class Audit
{
    const PAGE_BASENAMES = [
        'index', 'chi-siamo', 'tariffe', 'contatti',
        'privacy-policy', 'condizioni-utilizzo', 'revoke',
    ];
    // Variabili "piatte" dell'API vecchia: in un sito API-nuova stampano vuoto.
    const FLAT_VARS = [
        'company_name', 'nome_commerciale', 'p_iva', 'sede_legale', 'sede_operativa',
        'pec', 'email_dpo', 'email_supporto', 'capitale_sociale', 'telefono',
        'logo_url', 'logo2_url',
    ];
    // Variabili dell'API vecchia usate nei TESTI (tipicamente il consenso): in un
    // sito API-nuova $OPERATORE_ENERGETICO stampa VUOTO e $brand ripiega sul
    // generico "La nostra azienda" -> consenso/brand rotto a video (ERROR, non WARN
    // come le piatte, perché il danno è visibile in pagina e legalmente rilevante).
    const OLD_API_VARS = ['OPERATORE_ENERGETICO', 'brand'];
    // Termini di settore/web legittimi ma spesso assenti dal dizionario it_IT
    // generico (anglicismi, sigle, gergo energia): non sono refusi. La whitelist
    // viene completata a runtime coi nomi azienda/operatore del canonico.
    const SPELL_WHITELIST = [
        'srl', 'srls', 'spa', 'sas', 'snc', 'sapa', 'scarl',
        'email', 'e-mail', 'online', 'newsletter', 'marketing', 'partner',
        'privacy', 'cookie', 'cookies', 'web', 'website', 'internet', 'browser',
        'form', 'login', 'link', 'click', 'smart', 'green', 'power', 'energy',
        'gas', 'kwh', 'smc', 'iban', 'whatsapp', 'spid', 'pec', 'pdf',
        'landing', 'page', 'url', 'app', 'fax', 'mail', 'dpo', 'rpd',
    ];

    private $root;
    private $opts;
    /** @var Canonical */
    private $canon;
    private $sites = [];      // siti in scope (dopo i filtri --site/--client)
    private $allSites = [];   // tutti i siti (per i confronti cross-site)
    private $scope = [];      // set dir in scope (per emettere solo quelli filtrati)
    private $findings = [];
    private $fileCache = [];
    private $spellAvail = null;  // null=non ancora sondato, true/false=esito
    private $spellBin;           // binario hunspell (env HUNSPELL_BIN o 'hunspell')
    private $spellLang;          // dizionario (env HUNSPELL_LANG o 'it_IT')

    public function __construct($root, array $opts, Canonical $canon)
    {
        $this->root = rtrim(str_replace('\\', '/', $root), '/');
        $this->opts = $opts;
        $this->canon = $canon;
    }

    public function sites()
    {
        return $this->sites;
    }
    public function findings()
    {
        return $this->findings;
    }

    private function add($site, $cat, $sev, $code, $msg, $file = null)
    {
        if (!empty($this->opts['only']) && !in_array($cat, $this->opts['only'], true)) {
            return;
        }
        $this->findings[] = [
            'site' => $site, 'cat' => $cat, 'sev' => $sev,
            'code' => $code, 'msg' => $msg, 'file' => $file,
        ];
    }

    private function read($abs)
    {
        if (!array_key_exists($abs, $this->fileCache)) {
            $this->fileCache[$abs] = is_file($abs) ? (string) file_get_contents($abs) : '';
        }
        return $this->fileCache[$abs];
    }

    /* ============================== DISCOVERY ============================== */

    public function discover()
    {
        $clients = glob($this->root . '/*', GLOB_ONLYDIR) ?: [];
        foreach ($clients as $clientDir) {
            $client = basename($clientDir);
            if ($client[0] === '_' || $client[0] === '.') {
                continue; // _shared, _claude, ecc.
            }
            foreach ((glob($clientDir . '/*', GLOB_ONLYDIR) ?: []) as $siteDir) {
                $domain = basename($siteDir);
                if ($domain[0] === '.') {
                    continue;
                }
                $this->allSites[] = $this->buildSite($client, $domain, $siteDir);
            }
        }
        // I confronti cross-site usano SEMPRE tutti i siti; i filtri CLI
        // restringono solo i siti analizzati nel dettaglio e i findings mostrati.
        $this->sites = $this->allSites;
        if (!empty($this->opts['site'])) {
            $want = audit_domain_norm(basename($this->opts['site']));
            $this->sites = array_values(array_filter($this->sites, fn($s) => $s['domainNorm'] === $want || $s['dir'] === $this->opts['site']));
        }
        if (!empty($this->opts['client'])) {
            $this->sites = array_values(array_filter($this->sites, fn($s) => strcasecmp($s['client'], $this->opts['client']) === 0));
        }
        $this->scope = array_flip(array_column($this->sites, 'dir'));
        return $this->sites;
    }

    private function buildSite($client, $domain, $siteDir)
    {
        $abs = str_replace('\\', '/', $siteDir);
        $env = load_env($abs . '/.env');
        $landing = isset($env['LANDING_PAGE_ID']) ? clean_env_value($env['LANDING_PAGE_ID']) : '';
        $company = isset($env['COMPANY_ID']) ? clean_env_value($env['COMPANY_ID']) : '';
        $hasPhp = is_file($abs . '/_config.php') || is_file($abs . '/index.php');

        if ($hasPhp) {
            $type = $landing !== '' ? 'php_new' : 'php_old';
        } else {
            $type = 'static';
        }

        // Pagine effettive presenti (html + php).
        $pages = [];
        foreach (self::PAGE_BASENAMES as $b) {
            foreach (['php', 'html'] as $ext) {
                if (is_file("$abs/$b.$ext")) {
                    $pages[] = "$b.$ext";
                }
            }
        }

        return [
            'client' => $client,
            'domain' => $domain,
            'domainNorm' => audit_domain_norm($domain),
            'dir' => "$client/$domain",
            'abs' => $abs,
            'type' => $type,
            'has_env' => is_file($abs . '/.env'),
            'landing_id' => $landing,
            'company_id' => $company,
            'sito_web' => isset($env['SITO_WEB']) ? clean_env_value($env['SITO_WEB']) : '',
            'operatore_env' => isset($env['OPERATORE_ENERGETICO']) ? clean_env_value($env['OPERATORE_ENERGETICO']) : '',
            'cache_file' => is_file($abs . '/.company-cache.json') ? $abs . '/.company-cache.json' : '',
            'pages' => $pages,
            'is_php' => $hasPhp,
        ];
    }

    /* ================================ RUN ================================= */

    public function run()
    {
        if (!$this->sites) {
            $this->discover();
        }
        foreach ($this->sites as $s) {
            $canon = $this->canon->forSite($s);
            $this->checkBinding($s);
            $this->checkSitoWeb($s);
            $this->checkLinksAssets($s);
            $this->checkFormContract($s);
            $this->checkContentSanity($s);
            $this->checkOwnDomain($s);
            $this->checkPhpResiduals($s);
            $this->checkPhpLint($s);
            $this->checkLandingUrl($s, $canon);
            $this->checkLegal($s, $canon);
            $this->checkConsent($s, $canon);
            if ($this->opts['spell']) {
                $this->checkSpelling($s, $canon);
            }
        }
        $this->crossDuplicateLanding();
        $this->crossScriptDrift();
        $this->crossConsensus();
        $this->canon->persist();
        return $this->findings;
    }

    /* ===================== A. ASSOCIAZIONE / BINDING ===================== */

    private function checkBinding($s)
    {
        if ($s['type'] === 'static') {
            return; // niente binding API: gestito da landing-url/consent se canonico
        }
        if ($s['landing_id'] !== '' && $s['company_id'] !== '') {
            $this->add($s['dir'], 'A', 'WARN', 'A-both',
                "Sia LANDING_PAGE_ID ($s[landing_id]) sia COMPANY_ID ($s[company_id]) nel .env: vince LANDING_PAGE_ID, rimuovere l'altro.", '.env');
        }
        if ($s['landing_id'] === '' && $s['company_id'] === '') {
            $this->add($s['dir'], 'A', 'ERROR', 'A-none',
                "Sito PHP senza LANDING_PAGE_ID né COMPANY_ID nel .env: nessun dato azienda.", '.env');
        }
        if ($s['landing_id'] !== '' && !ctype_digit($s['landing_id'])) {
            $this->add($s['dir'], 'A', 'ERROR', 'A-nan', "LANDING_PAGE_ID non numerico: '$s[landing_id]'.", '.env');
        }
        if ($s['company_id'] !== '' && !ctype_digit($s['company_id'])) {
            $this->add($s['dir'], 'A', 'ERROR', 'A-nan', "COMPANY_ID non numerico: '$s[company_id]'.", '.env');
        }
        if ($s['type'] === 'php_old') {
            $this->add($s['dir'], 'A', 'INFO', 'A-old',
                "Sito sull'API VECCHIA (COMPANY_ID): valutare migrazione a LANDING_PAGE_ID (vedi MIGRAZIONE-PHP.md §7).", '.env');
        }
    }

    private function checkSitoWeb($s)
    {
        if ($s['sito_web'] !== '' && audit_domain_norm($s['sito_web']) !== $s['domainNorm']) {
            $this->add($s['dir'], 'A', 'WARN', 'A-sito',
                "SITO_WEB ('$s[sito_web]') non coincide col dominio della cartella ('$s[domain]').", '.env');
        }
    }

    /** landing_page.url canonico deve combaciare col dominio della cartella. */
    private function checkLandingUrl($s, $canon)
    {
        if (($canon['landing']['url'] ?? '') === '') {
            return;
        }
        $apiDom = audit_domain_norm($canon['landing']['url']);
        if ($apiDom !== '' && $apiDom !== $s['domainNorm']) {
            $this->add($s['dir'], 'A', 'ERROR', 'A-url',
                "La landing (id $s[landing_id]) ha url '$apiDom' nell'API ma la cartella è '$s[domainNorm]': binding probabilmente sbagliato.", '.env');
        }
    }

    /* ===================== D. LINK & ASSET ===================== */

    private function checkLinksAssets($s)
    {
        $anchorSet = $this->anchorSet($s);
        foreach ($s['pages'] as $page) {
            $html = $this->read($s['abs'] . '/' . $page);
            foreach (audit_extract_refs($html) as $ref) {
                $ref = trim($ref);
                if ($ref === '' || $ref[0] === '{' || strpos($ref, '<?') !== false) {
                    continue; // valore dinamico php
                }
                if (preg_match('#^(https?:)?//#i', $ref) || str_starts_with($ref, 'data:')) {
                    continue; // esterno / data-uri (HTTP opzionale altrove)
                }
                if (str_starts_with($ref, 'mailto:') || str_starts_with($ref, 'tel:')) {
                    continue;
                }
                if ($ref[0] === '#') {
                    $anchor = ltrim($ref, '#');
                    if ($anchor === '') {
                        continue; // href="#" no-op (pulsante/JS): non è un'ancora
                    }
                    if (!in_array($anchor, $anchorSet, true)) {
                        $this->add($s['dir'], 'D', 'WARN', 'D-anchor', "Ancora interna inesistente: '$ref'.", $page);
                    }
                    continue;
                }
                // Link/asset relativo: risolvi su disco (via query/anchor).
                $path = preg_replace('/[?#].*$/', '', $ref);
                if ($path === '') {
                    continue;
                }
                // Residuo migrazione: link .html interno in un sito PHP.
                if ($s['is_php'] && preg_match('/\.html$/i', $path)) {
                    $this->add($s['dir'], 'F', 'WARN', 'F-htmllink', "Link interno .html in sito PHP: '$ref' (dovrebbe essere .php).", $page);
                }
                if (!is_file($s['abs'] . '/' . $path)) {
                    $this->add($s['dir'], 'D', 'ERROR', 'D-404', "Link/asset relativo inesistente: '$ref'.", $page);
                }
            }
        }
    }

    /** id/name presenti nelle pagine + header/footer (per le ancore). */
    private function anchorSet($s)
    {
        $ids = [];
        $files = $s['pages'];
        foreach (['header.php', 'footer.php', 'header.html', 'footer.html'] as $inc) {
            if (is_file($s['abs'] . '/' . $inc)) {
                $files[] = $inc;
            }
        }
        foreach (array_unique($files) as $f) {
            $html = $this->read($s['abs'] . '/' . $f);
            if (preg_match_all('/\b(?:id|name)\s*=\s*"([^"]+)"/i', $html, $m)) {
                foreach ($m[1] as $id) {
                    $ids[$id] = true;
                }
            }
        }
        return array_keys($ids);
    }

    /* ===================== E. CONTRATTO DOM DEL FORM ===================== */

    private function checkFormContract($s)
    {
        $page = null;
        foreach (['contatti.php', 'contatti.html'] as $c) {
            if (is_file($s['abs'] . '/' . $c)) {
                $page = $c;
                break;
            }
        }
        if ($page === null) {
            return;
        }
        $h = $this->read($s['abs'] . '/' . $page);

        // CRITICO — il <form> deve avere id="leadForm" (o "contatto-form"): è
        // ciò che lead-form.js cerca per agganciarsi. Senza, il form NON invia.
        if (!preg_match('/<form[^>]*\bid="(?:leadForm|contatto-form)"/', $h)) {
            $this->add($s['dir'], 'E', 'ERROR', 'E-formid',
                "Il <form> non ha id=\"leadForm\": lead-form.js non si aggancia e il form NON invia.", $page);
        }
        // CRITICO — campi inviati nel payload (per attributo name) + consensi.
        foreach (['nome', 'telefono', 'consenso_privacy'] as $nm) {
            if (!preg_match('/name="' . $nm . '"/', $h)) {
                $this->add($s['dir'], 'E', 'ERROR', 'E-name', "Form contatti: manca name=\"$nm\".", $page);
            }
        }
        if (!preg_match('/name="consenso_(ricontatto|commerciale)"/', $h)) {
            $this->add($s['dir'], 'E', 'ERROR', 'E-consent', "Form contatti: manca il consenso commerciale (consenso_ricontatto/consenso_commerciale).", $page);
        }
        // Endpoint: nell'action del form OPPURE chiamato via fetch da lead-form.js.
        $leadJs = is_file($s['abs'] . '/lead-form.js') ? $this->read($s['abs'] . '/lead-form.js') : null;
        $hasEndpoint = strpos($h, 'api/lead') !== false || ($leadJs !== null && strpos($leadJs, 'api/lead') !== false);
        if (!$hasEndpoint) {
            $this->add($s['dir'], 'E', 'ERROR', 'E-action', "Né il form né lead-form.js puntano all'endpoint dbc2.datalia.it/api/lead.", $page);
        }
        if ($leadJs === null) {
            $this->add($s['dir'], 'E', 'ERROR', 'E-js', "Manca lead-form.js (gestione invio form).", $page);
        }
        // UX — id usati per validazione live e feedback: il form invia comunque,
        // ma senza questi la validazione/disabilitazione/conferma è degradata.
        foreach (['fNome', 'fTel', 'btnSubmit', 'conferma'] as $id) {
            if (!preg_match('/id="' . $id . '"/', $h)) {
                $this->add($s['dir'], 'E', 'WARN', 'E-ux', "Form contatti: manca id=\"$id\" (validazione/feedback degradati).", $page);
            }
        }
        // Facoltativo — lead-form.js tratta l'email come opzionale.
        if (!preg_match('/name="email"/', $h)) {
            $this->add($s['dir'], 'E', 'INFO', 'E-email', "Form contatti senza campo email: i lead non avranno l'email (facoltativo).", $page);
        }
    }

    /* ===================== R. CONTENUTO / REFUSI (per-sito) ===================== */

    private function checkContentSanity($s)
    {
        foreach ($s['pages'] as $page) {
            $raw = $this->read($s['abs'] . '/' . $page);
            // Tag PHP rimasti in un .html
            if (preg_match('/\.html$/', $page) && preg_match('/<\?(php|=)/', $raw)) {
                $this->add($s['dir'], 'R', 'ERROR', 'R-phptag', "Tag PHP in un file .html (sito non interpretato come PHP).", $page);
            }
            $text = audit_html_to_text(preg_replace('/<\?.*?\?>/s', ' ', $raw));
            // Segnaposto: regex con CONFINI di parola (evita falsi positivi tipo
            // "todo" dentro "meTODO").
            $placeholders = [
                'lorem ipsum' => '/lorem ipsum/i',
                'TODO' => '/\bTODO\b/',
                'FIXME' => '/\bFIXME\b/',
                'XXXX' => '/\bX{4,}\b/',
                '{{ ... }}' => '/\{\{.+?\}\}/',
                'testo segnaposto' => '/\b(testo segnaposto|inserire qui|da compilare|lorem)\b/i',
            ];
            foreach ($placeholders as $label => $re) {
                if (preg_match($re, $text)) {
                    $this->add($s['dir'], 'R', 'WARN', 'R-placeholder', "Possibile testo segnaposto/non finito: '$label'.", $page);
                }
            }
            // Mojibake da encoding errato
            if (preg_match('/Ã[\x80-\xBF]|â€|Â[^\s]/u', $raw)) {
                $this->add($s['dir'], 'R', 'WARN', 'R-mojibake', "Possibile mojibake/encoding errato nel testo.", $page);
            }
            // Parole doppie consecutive (>=4 lettere) DENTRO lo stesso nodo di
            // testo: i tag diventano newline così non si uniscono testi separati
            // (es. due voci di menu "Luce" "Luce" non sono un refuso).
            $blocked = preg_replace('/<\?.*?\?>/s', ' ', $raw);
            $blocked = preg_replace('#<[^>]+>#', "\n", $blocked);
            $blocked = html_entity_decode($blocked, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            if (preg_match('/\b([A-Za-zàèéìòùÀÈÉÌÒÙ]{4,})[ \t]+\1\b/ui', $blocked, $m)) {
                // Reduplicazioni legittime dell'italiano (non sono refusi).
                $redupl = ['passo', 'piano', 'pian', 'mano', 'poco', 'appena', 'quasi', 'bene', 'meglio', 'sotto'];
                if (!in_array(mb_strtolower($m[1], 'UTF-8'), $redupl, true)) {
                    $this->add($s['dir'], 'R', 'INFO', 'R-dup', "Parola ripetuta: '{$m[1]} {$m[1]}'.", $page);
                }
            }
        }
    }

    /**
     * Domini estranei nei TESTI il cui dominio non è quello del sito
     * (cartella/SITO_WEB) né una terza parte nota. Sintomo tipico di un blocco
     * (es. legale) copiato da un altro sito — vedi "www.paragono.it" finito in
     * sceltaenergia.it. Autosufficiente: non richiede dati canonici.
     *
     * Per ridurre i falsi positivi si guardano solo i segnali di "identità":
     *   - domini "X.tld" citati nel testo visibile (auto-referenze tipo
     *     "www.X.it" o "X.it è una piattaforma…"); gli indirizzi email vengono
     *     prima rimossi dal testo per non rileggerli qui;
     *   - domini delle email di CONTATTO, esclusi i ruoli privacy/DPO che
     *     puntano legittimamente al dominio del titolare del trattamento.
     * Gli host nei link/asset (es. logo dell'operatore via <img src>) NON sono
     * considerati. Provider email/PEC, social e autorità sono in allowlist.
     */
    private function checkOwnDomain($s)
    {
        // domini leciti: cartella + SITO_WEB dichiarato
        $own = [$s['domainNorm'] => true];
        if ($s['sito_web'] !== '') {
            $own[audit_domain_norm($s['sito_web'])] = true;
        }
        // terze parti note: mai segnalate (match esatto o sottodominio)
        static $infra = [
            // infrastruttura / font / CDN / API / immagini
            'googleapis.com', 'gstatic.com', 'google.com', 'youtube.com',
            'w3.org', 'schema.org', 'datalia.it', 'ipify.org', 'unsplash.com',
            // social
            'facebook.com', 'instagram.com', 'linkedin.com', 'whatsapp.com',
            'twitter.com', 'x.com', 'tiktok.com',
            // provider email / PEC
            'arubapec.it', 'pec.it', 'aruba.it', 'pec.aruba.it', 'legalmail.it',
            'sicurezzapostale.it', 'postacert.it', 'register.it', 'namirial.it',
            'email.it', 'libero.it', 'gmail.com', 'hotmail.com', 'outlook.com',
            'yahoo.com', 'yahoo.it',
            // autorità / enti (il Garante usa garanteprivacy.it e gpdp.it; GME)
            'garanteprivacy.it', 'gpdp.it', 'arera.it', 'agcm.it',
            'mercatoelettrico.org',
        ];
        // Deroghe allo standard: domini "ufficiali" di un brand/fornitore che NON
        // sono contaminazione quando il sito appartiene a quel brand. Es. il
        // fornitore "Semplice" usa il dominio semplicegaseluce.it (email titolare,
        // sito partner): legittimo sui siti del brand "semplice", non altrove.
        // Mappa dominio => token-brand atteso nel nome della cartella. Estendibile.
        static $brandDomains = [
            'semplicegaseluce.it' => 'semplice',
        ];
        // ruoli "titolare/DPO": email legittimamente sul dominio del titolare
        $controllerRole = '/^(privacy|dpo|rpd|garante|protezione[._-]?dati)$/i';

        $foreign = []; // domNorm => [page => true]
        foreach ($s['pages'] as $page) {
            $raw  = $this->read($s['abs'] . '/' . $page);
            $cand = [];

            // 1) email di contatto (esclusi i ruoli privacy/DPO del titolare)
            foreach (audit_extract_emails($raw) as $e) {
                $at = explode('@', $e, 2);
                if (count($at) !== 2 || preg_match($controllerRole, $at[0])) {
                    continue;
                }
                $cand[] = $at[1];
            }
            // 2) domini "X.tld" nel testo visibile, dopo aver tolto le email
            $text = preg_replace('/\S+@\S+/', ' ', audit_html_to_text($raw));
            if (preg_match_all('/\b(?:www\.)?([a-z0-9][a-z0-9\-]*\.(?:it|com|eu|net|org))\b/i', $text, $m)) {
                foreach ($m[1] as $d) {
                    $cand[] = $d;
                }
            }

            foreach ($cand as $d) {
                $dn = audit_domain_norm($d);
                if ($dn === '' || isset($own[$dn])) {
                    continue;
                }
                $skip = false;
                foreach ($infra as $w) {
                    if ($dn === $w || substr($dn, -strlen($w) - 1) === '.' . $w) {
                        $skip = true;
                        break;
                    }
                }
                // deroga brand: dominio ufficiale del fornitore (es.
                // semplicegaseluce.it) legittimo se il sito è di quel brand.
                if (!$skip && isset($brandDomains[$dn])
                    && strpos(strtolower($s['domain']), $brandDomains[$dn]) !== false) {
                    $skip = true;
                }
                // dominio-brand del sito: se un'etichetta del dominio (senza TLD)
                // compare nel nome della cartella (es. 'nexicom' in
                // 'nexicom.ncenergy-srl.it'), non è una contaminazione.
                if (!$skip) {
                    $labels = explode('.', $dn);
                    array_pop($labels); // via il TLD
                    $folder = strtolower($s['domain']);
                    foreach ($labels as $lab) {
                        if (strlen($lab) >= 4 && strpos($folder, $lab) !== false) {
                            $skip = true;
                            break;
                        }
                    }
                }
                if (!$skip) {
                    $foreign[$dn][$page] = true;
                }
            }
        }

        foreach ($foreign as $dn => $pages) {
            $this->add($s['dir'], 'R', 'WARN', 'R-dominio-estraneo',
                "Dominio estraneo '$dn' citato nei testi (atteso '" . $s['domainNorm']
                . "'): possibile contenuto copiato da un altro sito.",
                implode(', ', array_keys($pages)));
        }
    }

    /* ===================== R. SPELL-CHECK (opt-in, hunspell) ===================== */

    /**
     * Sonda hunspell UNA volta sola. Vero se il binario risponde e il dizionario
     * (`it_IT` di default) è risolvibile. Se manca, lo segnala su STDERR e
     * disabilita il check per il resto della run (nessun finding fasullo).
     * Override via ambiente: HUNSPELL_BIN (path al binario), HUNSPELL_LANG.
     */
    private function spellReady()
    {
        if ($this->spellAvail !== null) {
            return $this->spellAvail;
        }
        $this->spellBin  = getenv('HUNSPELL_BIN') ?: 'hunspell';
        $this->spellLang = getenv('HUNSPELL_LANG') ?: 'it_IT';
        $probe = $this->runSpell("prova parola\n");
        $this->spellAvail = ($probe !== null);
        if (!$this->spellAvail) {
            fwrite(STDERR,
                "[--spell] hunspell/dizionario '{$this->spellLang}' non disponibile: "
                . "spell-check saltato. Vedi _shared/LEGGIMI_AUDIT.md (sezione Spell-check).\n");
        }
        return $this->spellAvail;
    }

    /**
     * Esegue `hunspell -d <lang> -l` passando $text su stdin e restituisce
     * l'output grezzo (una parola sconosciuta per riga, con ripetizioni), oppure
     * null se il processo non parte o esce con errore (binario/dizionario assenti).
     */
    private function runSpell($text)
    {
        $cmd = escapeshellarg($this->spellBin) . ' -d ' . escapeshellarg($this->spellLang) . ' -l';
        $desc = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
        $p = @proc_open($cmd, $desc, $pipes);
        if (!is_resource($p)) {
            return null;
        }
        fwrite($pipes[0], $text);
        fclose($pipes[0]);
        $out = stream_get_contents($pipes[1]);
        $err = stream_get_contents($pipes[2]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        $code = proc_close($p);
        // hunspell -l esce 0 anche con molte parole errate; un codice != 0 con
        // stderr non vuoto = binario o dizionario mancante.
        if ($code !== 0 && trim((string) $out) === '' && trim((string) $err) !== '') {
            return null;
        }
        return (string) $out;
    }

    /**
     * Insieme di parole (minuscole) da NON segnalare: nomi azienda/operatore del
     * canonico (spezzati in token), etichette del dominio del sito e i termini di
     * settore/web della whitelist statica.
     */
    private function spellWhitelist($s, $canon)
    {
        $w = [];
        $addName = function ($str) use (&$w) {
            $str = audit_strip_company_suffix((string) $str); // toglie srl/spa, minuscolo, no punteggiatura
            foreach (preg_split('/\s+/u', $str) as $tok) {
                if ($tok !== '' && mb_strlen($tok, 'UTF-8') >= 3) {
                    $w[$tok] = true;
                }
            }
        };
        foreach ([
            $canon['company']['company_name'] ?? '',
            $canon['company']['nome_commerciale'] ?? '',
            $canon['operatore']['nome_legale'] ?? '',
            $canon['operatore']['nome_marketing'] ?? '',
        ] as $name) {
            $addName($name);
        }
        // etichette del dominio della cartella, spezzate anche sui trattini
        // (es. 'gowin-srl.it' -> 'gowin', 'srl'): il brand nel dominio non è refuso.
        foreach (preg_split('/[.\-]+/', $s['domainNorm']) as $lab) {
            if (mb_strlen($lab, 'UTF-8') >= 3) {
                $w[mb_strtolower($lab, 'UTF-8')] = true;
            }
        }
        foreach (self::SPELL_WHITELIST as $t) {
            $w[$t] = true;
        }
        return $w;
    }

    /**
     * Spell-check ortografico delle pagine (categoria R, severità INFO: è un
     * supporto alla revisione, può avere falsi positivi su nomi propri/brand).
     * Filtra parole < 4 lettere, con cifre, tutte maiuscole (acronimi) e quelle
     * in whitelist; aggrega per pagina le parole distinte non riconosciute.
     */
    private function checkSpelling($s, $canon)
    {
        if (!$this->spellReady()) {
            return;
        }
        $white = $this->spellWhitelist($s, $canon);
        foreach ($s['pages'] as $page) {
            $raw  = $this->read($s['abs'] . '/' . $page);
            $text = audit_html_to_text(preg_replace('/<\?.*?\?>/s', ' ', $raw));
            if ($text === '') {
                continue;
            }
            $out = $this->runSpell($text . "\n");
            if ($out === null) {
                return; // hunspell sparito a metà run: smetto
            }
            $bad = [];
            foreach (preg_split('/\R+/', trim($out)) as $word) {
                $word = trim($word);
                if ($word === '' || mb_strlen($word, 'UTF-8') < 4) {
                    continue;
                }
                if (preg_match('/\d/', $word) || preg_match('/^\p{Lu}+$/u', $word)) {
                    continue; // numeri o acronimi/sigle tutte maiuscole
                }
                $lw = mb_strtolower($word, 'UTF-8');
                if (isset($white[$lw])) {
                    continue;
                }
                $bad[$lw] = true;
            }
            if ($bad) {
                $list = array_slice(array_keys($bad), 0, 15);
                $more = count($bad) > 15 ? ' …(+' . (count($bad) - 15) . ')' : '';
                $this->add($s['dir'], 'R', 'INFO', 'R-spell',
                    "Parole non nel dizionario {$this->spellLang} (possibili refusi, verifica manuale): "
                    . implode(', ', $list) . $more . '.', $page);
            }
        }
    }

    /* ===================== F. RESIDUI MIGRAZIONE PHP ===================== */

    private function checkPhpResiduals($s)
    {
        if ($s['type'] !== 'php_new') {
            return;
        }
        $re = '/\$(' . implode('|', array_map('preg_quote', self::FLAT_VARS)) . ')\b/';
        // \b dopo "brand" NON matcha $brandName (d->N senza confine di parola):
        // così si intercetta solo l'uso del vecchio $brand, non i nuovi $brandName.
        $reOld = '/\$(' . implode('|', array_map('preg_quote', self::OLD_API_VARS)) . ')\b/';
        foreach (array_merge($s['pages'], ['header.php', 'footer.php']) as $page) {
            $abs = $s['abs'] . '/' . $page;
            if (!is_file($abs) || !preg_match('/\.php$/', $page)) {
                continue;
            }
            $content = $this->read($abs);
            if (preg_match_all($re, $content, $m)) {
                $vars = array_values(array_unique($m[1]));
                $this->add($s['dir'], 'F', 'WARN', 'F-flatvar',
                    "Variabili piatte API-vecchia in sito API-nuova (stampano vuoto): \$" . implode(', $', $vars) . ".", $page);
            }
            // CRITICO: residuo API-vecchia nei testi (consenso). $OPERATORE_ENERGETICO
            // -> vuoto, $brand -> "La nostra azienda". Vanno sostituite con i dati
            // dell'API nuova: $OPERATORE['nome_marketing'] e $COMPANY['company_name'].
            if (preg_match_all($reOld, $content, $m)) {
                $vars = array_values(array_unique($m[1]));
                $this->add($s['dir'], 'F', 'ERROR', 'F-oldvar',
                    "Variabili API-vecchia in sito API-nuova (\$" . implode(', $', $vars)
                    . "): \$OPERATORE_ENERGETICO stampa vuoto, \$brand ripiega su \"La nostra azienda\". "
                    . "Usare \$OPERATORE['nome_marketing'] e \$COMPANY['company_name'].", $page);
            }
        }
    }

    private function checkPhpLint($s)
    {
        if (!$s['is_php'] || empty($this->opts['lint'])) {
            return;
        }
        foreach (array_merge($s['pages'], ['_config.php', 'header.php', 'footer.php']) as $page) {
            $abs = $s['abs'] . '/' . $page;
            if (!is_file($abs) || !preg_match('/\.php$/', $page)) {
                continue;
            }
            $out = [];
            $code = 0;
            exec('php -l ' . escapeshellarg($abs) . ' 2>&1', $out, $code);
            if ($code !== 0) {
                $this->add($s['dir'], 'F', 'ERROR', 'F-lint', "Errore di sintassi PHP: " . trim(implode(' ', $out)), $page);
            }
        }
    }

    /* ===================== B. COERENZA DATI LEGALI ===================== */

    private function checkLegal($s, $canon)
    {
        // Sui siti PHP i dati legali non sono nel sorgente (vengono dall'API):
        // li controlliamo sui siti statici (o sull'HTML reso, se --render altrove).
        if ($s['type'] !== 'static' && empty($this->opts['render'])) {
            return;
        }
        $allText = '';
        $piva = [];
        $pec = [];
        $rea = [];
        $cap = [];
        foreach ($s['pages'] as $page) {
            $text = audit_html_to_text($this->read($s['abs'] . '/' . $page));
            $allText .= ' ' . $text;
            foreach (audit_extract_labeled_piva($text) as $v) {
                $piva[$v][] = $page;
            }
            foreach (audit_extract_rea($text) as $v) {
                $rea[$v][] = $page;
            }
            foreach (audit_extract_capitale($text) as $v) {
                $cap[$v][] = $page;
            }
        }
        // PEC: email che "sembrano" PEC
        foreach (audit_extract_emails($allText) as $e) {
            if (preg_match('/(pec|arubapec|legalmail|sicurezzapostale|postacert)/i', $e)) {
                $pec[$e] = true;
            }
        }
        $pec = array_keys($pec);

        // --- P.IVA ---
        foreach ($piva as $v => $pgs) {
            if (!audit_piva_valid($v)) {
                $this->add($s['dir'], 'B', 'ERROR', 'B-piva-bad', "P.IVA con checksum non valido: $v.", $pgs[0]);
            }
        }
        if (count($piva) > 1) {
            $this->add($s['dir'], 'B', 'ERROR', 'B-piva-incoer',
                "P.IVA diverse tra le pagine: " . implode(', ', array_keys($piva)) . ".", null);
        }
        $cPiva = $canon['company']['p_iva'] ?? '';
        if ($cPiva !== '' && $piva && !isset($piva[$cPiva])) {
            $this->add($s['dir'], 'B', 'ERROR', 'B-piva-canon',
                "P.IVA del sito (" . implode(',', array_keys($piva)) . ") diversa dal canonico ($cPiva).", null);
        }

        // --- REA / capitale: solo coerenza interna ---
        if (count($rea) > 1) {
            $this->add($s['dir'], 'B', 'WARN', 'B-rea', "REA diversi tra le pagine: " . implode(', ', array_keys($rea)) . ".", null);
        }
        if (count($cap) > 1) {
            $this->add($s['dir'], 'B', 'WARN', 'B-cap', "Capitale sociale diverso tra le pagine: " . implode(' | ', array_keys($cap)) . ".", null);
        }

        // --- PEC ---
        if (count($pec) > 1) {
            $this->add($s['dir'], 'B', 'WARN', 'B-pec-incoer', "PEC diverse nel sito: " . implode(', ', $pec) . ".", null);
        }
        $cPec = strtolower($canon['company']['pec'] ?? '');
        if ($cPec !== '' && $pec && !in_array($cPec, $pec, true)) {
            $this->add($s['dir'], 'B', 'WARN', 'B-pec-canon', "PEC del sito (" . implode(',', $pec) . ") diversa dal canonico ($cPec).", null);
        }

        // --- Ragione sociale (canonico) ---
        $cName = $canon['company']['company_name'] ?? '';
        if ($cName !== '' && $allText !== '') {
            if (!audit_names_match($cName, $allText) && stripos($allText, $cName) === false) {
                $this->add($s['dir'], 'B', 'WARN', 'B-name',
                    "La ragione sociale canonica ('$cName') non compare nel sito.", null);
            }
        }
    }

    /* ===================== C. TESTI CONSENSO / BRAND ===================== */

    private function checkConsent($s, $canon)
    {
        foreach (['contatti.php', 'contatti.html', 'tariffe.php', 'tariffe.html'] as $page) {
            $abs = $s['abs'] . '/' . $page;
            if (!is_file($abs)) {
                continue;
            }
            // Estraggo SOLO lo span del consenso commerciale (delimitato): così
            // non rischio di agganciare un "ricontattato da" presente altrove nel
            // testo della pagina (es. claim introduttivo).
            $html = $this->read($abs);
            if (!preg_match('/consenso_(?:ricontatto|commerciale)"[^>]*>.*?<span\b[^>]*>(.*?)<\/span>/is', $html, $span)) {
                continue;
            }
            $text = audit_html_to_text($span[1]);
            if (!preg_match('/ricontattato da (.+?),?\s+tramite il partner commerciale\s+(.+?)\s*(?:,|\.|per |\*|$)/iu', $text, $m)) {
                continue;
            }
            $op = trim($m[1]);
            $partner = trim($m[2]);
            // Nei siti PHP il brand è dinamico (stampato da PHP): nel SORGENTE
            // risulta vuoto. Confronto solo valori con almeno due lettere reali.
            $hasText = fn($v) => (bool) preg_match('/\p{L}{2,}/u', $v);

            $cOpLeg = $canon['operatore']['nome_legale'] ?? '';
            $cOpMkt = $canon['operatore']['nome_marketing'] ?? '';
            if ($hasText($op) && ($cOpLeg !== '' || $cOpMkt !== '') &&
                !audit_names_match($op, $cOpLeg) && !audit_names_match($op, $cOpMkt)) {
                $this->add($s['dir'], 'C', 'WARN', 'C-op',
                    "Operatore nel consenso ('$op') diverso dal canonico ('" . ($cOpLeg ?: $cOpMkt) . "').", $page);
            }
            $cCoName = $canon['company']['company_name'] ?? '';
            $cCoComm = $canon['company']['nome_commerciale'] ?? '';
            if ($hasText($partner) && ($cCoName !== '' || $cCoComm !== '') &&
                !audit_names_match($partner, $cCoName) && !audit_names_match($partner, $cCoComm)) {
                $this->add($s['dir'], 'C', 'WARN', 'C-partner',
                    "Partner commerciale nel consenso ('$partner') diverso dal canonico ('" . ($cCoName ?: $cCoComm) . "').", $page);
            }
        }
    }

    /* =========================== CROSS-SITE =========================== */

    private function crossDuplicateLanding()
    {
        $map = [];
        foreach ($this->allSites as $s) {
            if ($s['landing_id'] !== '') {
                $map[$s['landing_id']][] = $s['dir'];
            }
        }
        foreach ($map as $id => $dirs) {
            if (count($dirs) > 1) {
                foreach ($dirs as $d) {
                    if (isset($this->scope[$d])) {
                        $this->add($d, 'A', 'WARN', 'A-dup',
                            "LANDING_PAGE_ID $id condiviso da più cartelle: " . implode(' , ', $dirs) . ".", '.env');
                    }
                }
            }
        }
    }

    /** lead-form.js è copiato per-sito ma è LOGICA pura: segnala varianti minoritarie
     * (possibile fix non propagato). cb.js è escluso: ha il colore accento per-sito. */
    private function crossScriptDrift()
    {
        $byHash = [];
        foreach ($this->allSites as $s) {
            $abs = $s['abs'] . '/lead-form.js';
            if (is_file($abs)) {
                $byHash[sha1($this->read($abs))][] = $s['dir'];
            }
        }
        if (count($byHash) <= 1) {
            return;
        }
        uasort($byHash, fn($a, $b) => count($b) <=> count($a));
        $hashes = array_keys($byHash);
        $majority = count($byHash[$hashes[0]]);
        foreach (array_slice($hashes, 1) as $h) {
            foreach ($byHash[$h] as $d) {
                if (isset($this->scope[$d])) {
                    $this->add($d, 'R', 'WARN', 'R-drift',
                        "lead-form.js differisce dalla variante maggioritaria ($majority siti identici, " . count($byHash[$h]) . " come questo): possibile fix non propagato o contratto diverso.", 'lead-form.js');
                }
            }
        }
    }

    /** Consenso fra le copie: frasi di consenso difformi dalla maggioranza. */
    private function crossConsensus()
    {
        // Raccolgo per tipo: privacy (testo pieno) e commerciale (template mascherato).
        $privacy = [];   // dir => frase
        $commerc = [];   // dir => template
        foreach ($this->allSites as $s) {
            foreach (['contatti.php', 'contatti.html'] as $page) {
                $abs = $s['abs'] . '/' . $page;
                if (!is_file($abs)) {
                    continue;
                }
                $h = $this->read($abs);
                // span del consenso privacy
                if (preg_match('/consenso_privacy".*?<span\b[^>]*>(.*?)<\/span>/is', $h, $m)) {
                    $privacy[$s['dir']] = audit_norm_sentence($m[1]);
                }
                // span del consenso commerciale (maschero operatore e partner)
                if (preg_match('/consenso_(?:ricontatto|commerciale)".*?<span\b[^>]*>(.*?)<\/span>/is', $h, $m)) {
                    $t = audit_norm_sentence($m[1]);
                    $t = preg_replace('/ricontattato da .+? tramite il partner commerciale .+? per/u',
                        'ricontattato da __OP__ tramite il partner commerciale __PARTNER__ per', $t);
                    $commerc[$s['dir']] = $t;
                }
                break;
            }
        }
        $this->consensusFlag($privacy, 'consenso privacy');
        $this->consensusFlag($commerc, 'consenso commerciale (template)');
    }

    private function consensusFlag(array $byDir, $label)
    {
        if (count($byDir) < 5) {
            return; // troppo pochi per un "consenso"
        }
        $freq = array_count_values($byDir);
        foreach ($byDir as $dir => $sentence) {
            if (!isset($this->scope[$dir])) {
                continue;
            }
            $out = audit_consensus_outlier($sentence, $freq);
            if ($out) {
                $this->add($dir, 'R', 'WARN', 'R-consensus',
                    "Testo $label difforme dalla maggioranza (distanza {$out['dist']}, {$out['count']} siti con la variante prevalente): possibile refuso.", 'contatti.*');
            }
        }
    }
}
