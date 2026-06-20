<?php
/**
 * _shared/config.php — cuore CONDIVISO dei siti dinamici (dati azienda da API Datalia).
 *
 * Questo file contiene la logica UNICA, prima duplicata in ogni cartella sito come
 * "_config.php". Ora ogni sito ha solo uno stub di 3 righe (_config.php) che:
 *      $SITE_DIR = __DIR__;                       // cartella DEL SITO
 *      require dirname(__DIR__, 2) . '/_shared/config.php';
 * Lo stub passa $SITE_DIR così .env e la cache restano nella cartella del singolo
 * sito (NON in _shared/). Per questo NON si possono usare i symlink: PHP risolve
 * __DIR__ al path reale del target, perdendo la cartella del sito.
 *
 * 1. Legge le variabili di configurazione da DUE possibili fonti, in ordine:
 *      a) variabili di sistema (env Apache/PHP-FPM, SetEnv, ecc.)
 *      b) file .env locale (NON versionato)
 *    I valori sono sempre ripuliti da spazi e virgolette accidentali
 *    (vedi clean_env_value).
 * 2. Scarica i dati dell'azienda dall'API protetta da token bearer.
 * 3. Tiene una copia in cache su file (.company-cache.json): se l'API non
 *    risponde, il sito continua a funzionare con l'ultima copia valida.
 * 4. Mette a disposizione delle pagine:
 *      $p_iva, $company_name, $pec, ... -> una variabile per ogni campo API,
 *                   GIÀ PULITA per l'HTML: si stampa direttamente <?= $p_iva ?>
 *      $brand     -> nome da mostrare (commerciale, o ragione sociale)
 *      $company   -> array con i dati azienda grezzi (non puliti)
 *      $LANDING_PAGE / $OPERATORE / $COMPANY -> tre array associativi con i dati
 *                   della NUOVA API (landing page, operatore energetico, azienda),
 *                   valori GIÀ PULITI per l'HTML. Vedi sotto "DUE API".
 *      c('chiave')-> valore grezzo di un campo azienda (con eventuale default)
 *      e('testo') -> rende sicuro un testo per l'HTML (per valori NON già puliti)
 *
 * Il token resta SEMPRE lato server: il browser riceve solo HTML già pronto.
 *
 * DUE API (scelta automatica in base al .env):
 *   - Se è presente LANDING_PAGE_ID -> API NUOVA, più ricca:
 *       GET /landing-pages/{LANDING_PAGE_ID} -> { landing_page, operatore_energetico,
 *       company }. Popola i tre array $LANDING_PAGE / $OPERATORE / $COMPANY
 *       (valori già puliti per l'HTML). In questa modalità le variabili "piatte"
 *       ($p_iva, $company_name, ...) e $company restano stringa vuota.
 *   - Altrimenti, se è presente COMPANY_ID -> API VECCHIA (DEPRECATA ma ancora
 *       attiva): GET /companies/{COMPANY_ID} -> oggetto azienda "piatto". Popola
 *       le variabili piatte, $company, $brand, c() come sempre. In questa modalità
 *       i tre array nuovi esistono comunque, con TUTTE le chiavi ma valori vuoti.
 *   I due "mondi" sono a specchio: quello non attivo esiste sempre (tutte le
 *   chiavi) ma azzerato, così le pagine non incontrano mai variabili indefinite.
 *
 * DOVE METTERE LE VARIABILI (DBC2_API_BASE, DBC2_TOKEN, LANDING_PAGE_ID o COMPANY_ID,
 * SITO_WEB, OPERATORE_ENERGETICO) — a scelta:
 *   - Variabili di sistema (consigliato per il token segreto):
 *       PHP-FPM:  env[DBC2_TOKEN] = "2|xxxxx"  in /etc/php/X.Y/fpm/pool.d/www.conf
 *                 ATTENZIONE: le VIRGOLETTE sono obbligatorie se il valore
 *                 contiene caratteri riservati INI ( |  &  ~  !  ( )  { }  " ^ ),
 *                 altrimenti il valore viene troncato. Poi: restart php-fpm.
 *       Apache mod_php: "export DBC2_TOKEN=..." in /etc/apache2/envvars + restart
 *                 apache2; oppure SetEnv DBC2_TOKEN "..." nel VirtualHost.
 *   - File .env locale (NON versionato), una riga per variabile: CHIAVE=valore
 */

// Cartella del SITO che ci ha incluso (impostata dallo stub _config.php del sito).
// Fallback di sicurezza se il file viene incluso direttamente senza stub.
if (!isset($SITE_DIR)) {
    $SITE_DIR = __DIR__;
}

// --- Impostazioni cache e debug ------------------------------------------
define('CACHE_FILE', $SITE_DIR . '/.company-cache.json');
define('CACHE_TTL', 3600); // secondi (1 ora) prima di richiamare l'API
define('DEBUG_MODE', false); // METTERE true SOLO per diagnosi: stampa i [DEBUG] in pagina

function log_debug($msg)
{
    if (DEBUG_MODE) {
        echo "[DEBUG] " . htmlspecialchars($msg) . "<br>\n";
    }
}

// --- 1. Lettura variabili (sistema + .env) -------------------------------
function load_env($path)
{
    $vars = [];
    if (!is_file($path)) {
        return $vars;
    }
    foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#' || strpos($line, '=') === false) {
            continue; // riga vuota o commento
        }
        list($key, $value) = explode('=', $line, 2);
        $vars[trim($key)] = trim($value);
    }
    return $vars;
}

/**
 * Ripulisce il valore di una variabile: toglie spazi ai bordi e un'eventuale
 * coppia di virgolette (singole o doppie) che alcuni parser (es. PHP-FPM) non
 * rimuovono. Senza questo, un token tipo "2|abc" letto con le virgolette
 * incluse fallirebbe l'autenticazione.
 */
function clean_env_value($value)
{
    $value = trim((string) $value);
    if (strlen($value) >= 2) {
        $first = $value[0];
        $last = $value[strlen($value) - 1];
        if (($first === '"' && $last === '"') || ($first === "'" && $last === "'")) {
            $value = substr($value, 1, -1);
        }
    }
    return trim($value);
}

/**
 * Cerca una variabile prima nell'ambiente di sistema (getenv / $_SERVER /
 * $_ENV — copre mod_php con envvars, PHP-FPM con env[], SetEnv nel VirtualHost)
 * e, se non la trova, nel file .env. Il valore restituito è sempre ripulito.
 */
function get_env_var($key, $fallback_array)
{
    $sys = getenv($key);
    if ($sys !== false && $sys !== '') {
        log_debug("Variabile dal SISTEMA (getenv): $key");
        return clean_env_value($sys);
    }
    if (isset($_SERVER[$key]) && $_SERVER[$key] !== '') {
        log_debug("Variabile dal SISTEMA (\$_SERVER): $key");
        return clean_env_value($_SERVER[$key]);
    }
    if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
        log_debug("Variabile dal SISTEMA (\$_ENV): $key");
        return clean_env_value($_ENV[$key]);
    }
    if (isset($fallback_array[$key]) && $fallback_array[$key] !== '') {
        log_debug("Variabile dal file .ENV: $key");
        return clean_env_value($fallback_array[$key]);
    }
    log_debug("ATTENZIONE: variabile NON trovata: $key");
    return '';
}

$env_file = load_env($SITE_DIR . '/.env');

$API_BASE = rtrim(get_env_var('DBC2_API_BASE', $env_file), '/');
$TOKEN = get_env_var('DBC2_TOKEN', $env_file);
$COMPANY_ID = get_env_var('COMPANY_ID', $env_file);
// API nuova: se valorizzato, ha la PRECEDENZA su COMPANY_ID (vedi scelta più sotto).
$LANDING_PAGE_ID = get_env_var('LANDING_PAGE_ID', $env_file);
$SITO_WEB = htmlspecialchars(get_env_var('SITO_WEB', $env_file), ENT_QUOTES, 'UTF-8');
// Operatore energetico di cui il sito è rivenditore (es. "Hera Comm").
$OPERATORE_ENERGETICO = htmlspecialchars(get_env_var('OPERATORE_ENERGETICO', $env_file), ENT_QUOTES, 'UTF-8');

// --- 2. Chiamata all'API --------------------------------------------------

/**
 * GET autenticata (Bearer) verso $url; restituisce l'array decodificato dal JSON
 * oppure null in caso di errore. Logica HTTP CONDIVISA fra l'API vecchia
 * (/companies) e quella nuova (/landing-pages).
 */
function dbc2_api_get($url, $token)
{
    log_debug("Chiamata API verso: " . $url);

    // Metodo preferito: cURL (presente sulla maggior parte degli hosting)
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $token,
                'Accept: application/json',
            ],
        ]);
        $body = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            log_debug("Errore cURL: " . curl_error($ch));
        }
        curl_close($ch);
        log_debug("Risposta API HTTP Code: " . $code);
        if ($body !== false && $code >= 200 && $code < 300) {
            $data = json_decode($body, true);
            if (is_array($data)) {
                return $data;
            }
            log_debug("Errore API: il body restituito non è un JSON valido.");
        } else {
            log_debug("Errore API: risposta fallita o non autorizzata. Body: " . substr((string) $body, 0, 200));
        }
        return null;
    }

    // Fallback: file_get_contents con stream context
    log_debug("cURL non disponibile, uso file_get_contents...");
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => "Authorization: Bearer {$token}\r\nAccept: application/json\r\n",
            'timeout' => 5,
            'ignore_errors' => true,
        ],
    ]);
    $body = @file_get_contents($url, false, $context);
    if ($body !== false) {
        $data = json_decode($body, true);
        if (is_array($data)) {
            return $data;
        }
    }
    return null;
}

/**
 * API VECCHIA (DEPRECATA, ma ANCORA ATTIVA): GET /companies/{COMPANY_ID}.
 * Restituisce l'oggetto azienda "piatto" oppure null. Usata quando nel .env
 * NON è presente LANDING_PAGE_ID.
 */
function fetch_company($apiBase, $token, $companyId)
{
    if ($apiBase === '' || $token === '' || $companyId === '') {
        log_debug("Errore API: parametri di configurazione incompleti.");
        return null; // configurazione incompleta
    }
    return dbc2_api_get($apiBase . '/companies/' . rawurlencode($companyId), $token);
}

/**
 * API NUOVA: GET /landing-pages/{LANDING_PAGE_ID}.
 * Restituisce la risposta annidata { landing_page, operatore_energetico,
 * company } oppure null. Usata quando nel .env è presente LANDING_PAGE_ID.
 */
function fetch_landing($apiBase, $token, $landingId)
{
    if ($apiBase === '' || $token === '' || $landingId === '') {
        log_debug("Errore API: parametri di configurazione incompleti.");
        return null; // configurazione incompleta
    }
    return dbc2_api_get($apiBase . '/landing-pages/' . rawurlencode($landingId), $token);
}

// --- 3. Cache su file con fallback ---------------------------------------

/**
 * Strato di cache GENERICO, indipendente dall'API usata. $fetch è la funzione
 * che effettua la chiamata (es. fetch_company o fetch_landing).
 * Comportamento: cache fresca -> file; scaduta/assente -> chiama API e salva;
 * API fallita -> ultima copia (anche "vecchia"); nulla -> array vuoto.
 */
function dbc2_load_cached(callable $fetch)
{
    $cacheFresh = is_file(CACHE_FILE) && (time() - filemtime(CACHE_FILE) < CACHE_TTL);

    // Cache valida e recente: usala senza chiamare l'API.
    if ($cacheFresh) {
        log_debug("Cache valida: caricamento da file.");
        $cached = json_decode((string) @file_get_contents(CACHE_FILE), true);
        if (is_array($cached)) {
            return $cached;
        }
    }

    // Cache assente o scaduta: prova a richiamare l'API.
    log_debug("Cache assente o scaduta. Tento il recupero dall'API...");
    $fresh = $fetch();
    if ($fresh !== null) {
        log_debug("API OK. Aggiorno la cache.");
        @file_put_contents(CACHE_FILE, json_encode($fresh, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        return $fresh;
    }

    // API non raggiungibile: usa l'ultima copia salvata, anche se "vecchia".
    if (is_file(CACHE_FILE)) {
        log_debug("API fallita: uso la cache scaduta come fallback.");
        $stale = json_decode((string) @file_get_contents(CACHE_FILE), true);
        if (is_array($stale)) {
            return $stale;
        }
    }

    // Nessun dato disponibile: array vuoto (le pagine mostreranno i default).
    log_debug("CRITICO: nessun dato da API né da cache. Restituisco array vuoto.");
    return [];
}

/**
 * DEPRECATA: vecchio entry-point del caricamento azienda. Mantenuta ATTIVA per
 * retrocompatibilità; internamente usa lo strato di cache generico.
 */
function load_company($apiBase, $token, $companyId)
{
    return dbc2_load_cached(function () use ($apiBase, $token, $companyId) {
        return fetch_company($apiBase, $token, $companyId);
    });
}

// --- Scelta dell'API in base al .env -------------------------------------
// LANDING_PAGE_ID presente -> API NUOVA (/landing-pages). Altrimenti API VECCHIA
// (/companies). Il percorso vecchia-API resta IDENTICO a prima.
if ($LANDING_PAGE_ID !== '') {
    log_debug("Uso API NUOVA (/landing-pages), LANDING_PAGE_ID=" . $LANDING_PAGE_ID);
    $payload = dbc2_load_cached(function () use ($API_BASE, $TOKEN, $LANDING_PAGE_ID) {
        return fetch_landing($API_BASE, $TOKEN, $LANDING_PAGE_ID);
    });
} else {
    log_debug("Uso API VECCHIA (/companies), COMPANY_ID=" . $COMPANY_ID);
    $payload = dbc2_load_cached(function () use ($API_BASE, $TOKEN, $COMPANY_ID) {
        return fetch_company($API_BASE, $TOKEN, $COMPANY_ID);
    });
}

// --- 4. Normalizzazione: i due "mondi" a specchio ------------------------
// Liste delle chiavi note di ciascun blocco. Garantiscono che gli array siano
// SEMPRE presenti con TUTTE le chiavi (valori vuoti) anche quando l'API che li
// popolerebbe non è quella in uso.
$campi_noti = [
    'id',
    'company_name',
    'nome_commerciale',
    'parent_id',
    'azienda_madre',
    'p_iva',
    'sede_legale',
    'sede_operativa',
    'pec',
    'email_dpo',
    'email_supporto',
    'capitale_sociale',
    'telefono',
    'logo_url',
    'logo2_url',
    'bpg_customer_id',
    'bpg_customer_name',
    'created_at',
    'updated_at',
]; // chiavi del blocco "company" (e delle variabili piatte)
$LANDING_PAGE_FIELDS = [
    'id',
    'url',
    'nome_portale',
    'operatore_energetico_id',
    'company_id',
    'p_iva',
    'sede_legale',
    'sede_operativa',
    'pec',
    'privacy_version',
    'mostra_consenso_0',
    'mostra_consenso_1',
    'mostra_consenso_2',
    'logo_url',
    'logo2_url',
    'created_at',
    'updated_at',
];
$OPERATORE_FIELDS = [
    'id',
    'nome_marketing',
    'nome_legale',
    'indirizzo',
    'partita_iva',
    'logo_url',
    'logo2_url',
    'created_at',
    'updated_at',
];

/**
 * Costruisce un array associativo con TUTTE le $fields (default '') sovrascritte
 * dai valori di $source, GIÀ resi sicuri per l'HTML (stessa logica dei piatti:
 * null -> ''; scalare -> htmlspecialchars; non scalare -> invariato). Eventuali
 * chiavi extra presenti in $source (campi futuri dell'API) vengono incluse.
 */
function dbc2_build_assoc(array $fields, $source)
{
    $out = [];
    foreach ($fields as $f) {
        $out[$f] = '';
    }
    if (is_array($source)) {
        foreach ($source as $k => $v) {
            if ($v === null) {
                $out[$k] = '';
            } elseif (is_scalar($v)) {
                $out[$k] = htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
            } else {
                $out[$k] = $v;
            }
        }
    }
    return $out;
}

// Rilevo la FORMA del payload (robusto anche con cache di forma diversa):
//   nuova   -> risposta annidata { landing_page, operatore_energetico, company }
//   vecchia -> oggetto azienda "piatto"
$is_new_shape = isset($payload['landing_page']) || isset($payload['operatore_energetico']) || isset($payload['company']);
if ($is_new_shape) {
    // API NUOVA: popolo i tre array; il "mondo piatto" ($company) resta vuoto.
    $company = [];
    $LANDING_PAGE = dbc2_build_assoc($LANDING_PAGE_FIELDS, isset($payload['landing_page']) ? $payload['landing_page'] : []);
    $OPERATORE = dbc2_build_assoc($OPERATORE_FIELDS, isset($payload['operatore_energetico']) ? $payload['operatore_energetico'] : []);
    $COMPANY = dbc2_build_assoc($campi_noti, isset($payload['company']) ? $payload['company'] : []);
} else {
    // API VECCHIA (invariata): popolo il "mondo piatto"; i tre array esistono
    // con tutte le chiavi ma valori vuoti.
    $company = is_array($payload) ? $payload : [];
    $LANDING_PAGE = dbc2_build_assoc($LANDING_PAGE_FIELDS, []);
    $OPERATORE = dbc2_build_assoc($OPERATORE_FIELDS, []);
    $COMPANY = dbc2_build_assoc($campi_noti, []);
}

// --- 5. Variabili "piatte" da $company (popolate SOLO con l'API vecchia) ---
// Così nelle pagine puoi usare direttamente $p_iva, $company_name, $pec, ...
// senza scrivere e($...): i valori vengono già resi sicuri per l'HTML qui.
// Con l'API nuova $company è [] -> tutte le piatte restano stringa vuota.
foreach ($campi_noti as $campo) {
    $GLOBALS[$campo] = '';
}
// Sovrascrivo con i valori reali ricevuti dall'API, già "puliti" per l'output
// HTML (null -> stringa vuota; valori non testuali lasciati invariati).
foreach ($company as $campo => $valore) {
    if ($valore === null) {
        $GLOBALS[$campo] = '';
    } elseif (is_scalar($valore)) {
        $GLOBALS[$campo] = htmlspecialchars((string) $valore, ENT_QUOTES, 'UTF-8');
    } else {
        $GLOBALS[$campo] = $valore;
    }
}

// --- 6. Helper per le pagine ---------------------------------------------

/** Restituisce un campo dell'azienda, oppure un default se mancante/nullo. */
function c($key, $default = '')
{
    global $company;
    if (isset($company[$key]) && $company[$key] !== null && $company[$key] !== '') {
        return $company[$key];
    }
    return $default;
}

/** Rende un testo sicuro per l'output dentro l'HTML. */
function e($text)
{
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

// Nome da mostrare: commerciale se presente, altrimenti ragione sociale.
// Uso le globali già pulite, così anche $brand è sicuro per l'output HTML.
$brand = $nome_commerciale !== '' ? $nome_commerciale
    : ($company_name !== '' ? $company_name : 'La nostra azienda');
