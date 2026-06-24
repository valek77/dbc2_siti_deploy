<?php
/**
 * _shared/audit.php — tool CLI di audit/regression dei siti landing.
 *
 * USO (dalla root del repo):
 *   php _shared/audit.php                       # tutti i siti, report a console
 *   php _shared/audit.php --site=Risa/gowin-srl.it
 *   php _shared/audit.php --client=GrimaldiGroup
 *   php _shared/audit.php --only=A,B,C          # solo alcune categorie
 *   php _shared/audit.php --min=WARN            # nasconde gli INFO a console
 *   php _shared/audit.php --lint                # aggiunge php -l (più lento)
 *   php _shared/audit.php --spell               # spell-check ortografico (hunspell)
 *   php _shared/audit.php --refresh             # ignora la cache API locale
 *   php _shared/audit.php --json=report.json --html=report.html
 *
 * FONTE DI VERITÀ: API Datalia. Imposta il token PRIMA di lanciare:
 *   PowerShell:  $env:DBC2_TOKEN="2|xxxx"; php _shared/audit.php
 *   bash:        DBC2_TOKEN="2|xxxx" php _shared/audit.php
 * Senza token, i controlli "canonici" usano la cache .company-cache.json
 * per-sito quando presente (fallback offline, dati potenzialmente vecchi).
 *
 * Categorie: A associazione · B dati legali · C consenso/brand · D link/asset
 *            E contratto form · F residui PHP · R refusi/contenuto.
 * Exit code: 1 se ci sono ERROR, altrimenti 0 (utilizzabile in pre-commit/CI).
 */

require __DIR__ . '/audit/Audit.php';
require __DIR__ . '/audit/Report.php';

$root = dirname(__DIR__);

// --- Parsing argomenti ---------------------------------------------------
$opts = [
    'site' => null, 'client' => null, 'only' => [],
    'refresh' => false, 'lint' => false, 'render' => false, 'spell' => false,
    'no-color' => false, 'json' => null, 'html' => null, 'min' => 'INFO',
];
foreach (array_slice($argv, 1) as $arg) {
    if (preg_match('/^--([a-z\-]+)(?:=(.*))?$/', $arg, $m)) {
        $key = $m[1];
        $val = $m[2] ?? true;
        if ($key === 'only') {
            $opts['only'] = array_map('strtoupper', array_filter(explode(',', (string) $val)));
        } elseif (array_key_exists($key, $opts)) {
            $opts[$key] = $val;
        } else {
            fwrite(STDERR, "Opzione sconosciuta: --$key\n");
            exit(2);
        }
    }
}

// --- Configurazione API --------------------------------------------------
// Ordine: ambiente di sistema (consigliato), poi fallback su _shared/.env
// (NON versionato, vedi .gitignore: il token NON deve mai finire su git).
$apiBase = getenv('DBC2_API_BASE') ?: '';
$token = (string) (getenv('DBC2_TOKEN') ?: '');
if (($token === '' || $apiBase === '') && is_file(__DIR__ . '/.env')) {
    $shared_env = load_env(__DIR__ . '/.env');
    if ($token === '' && isset($shared_env['DBC2_TOKEN'])) {
        $token = clean_env_value($shared_env['DBC2_TOKEN']);
    }
    if ($apiBase === '' && isset($shared_env['DBC2_API_BASE'])) {
        $apiBase = clean_env_value($shared_env['DBC2_API_BASE']);
    }
}
if ($apiBase === '') {
    $apiBase = 'https://dbc2.datalia.it/api';
}

$canon = new Canonical($apiBase, $token, $root, (bool) $opts['refresh']);

// --- Esecuzione ----------------------------------------------------------
$audit = new Audit($root, $opts, $canon);
$sites = $audit->discover();
if (!$sites) {
    fwrite(STDERR, "Nessun sito trovato (filtri troppo restrittivi?).\n");
    exit(2);
}
$findings = $audit->run();

// --- Meta / note ---------------------------------------------------------
$cstats = $canon->stats();
$notes = [];
if ($token === '') {
    $notes[] = "DBC2_TOKEN non impostato: controlli canonici (B/C/A-url) limitati alla cache .company-cache.json per-sito.";
}
if ($cstats['errors']) {
    $notes[] = count($cstats['errors']) . " id NON risolti dall'API (es. " . implode('; ', array_slice($cstats['errors'], 0, 3)) . (count($cstats['errors']) > 3 ? ' …' : '') . ").";
}
$canonSource = $token !== ''
    ? "API live ({$cstats['api']} ok, {$cstats['cache']} da cache, {$cstats['none']} assenti)"
    : "cache per-sito ({$cstats['cache']} disponibili, {$cstats['none']} assenti)";

$meta = [
    'sites' => count($sites),
    'canon_source' => $canonSource,
    'generated_at' => date('c'),
    'notes' => $notes,
];

$report = new Report($findings, $sites, $meta);

// --- Output --------------------------------------------------------------
echo $report->console(!$opts['no-color'], strtoupper((string) $opts['min']));

if ($opts['json']) {
    $path = is_string($opts['json']) ? $opts['json'] : ($root . '/_shared/audit-report.json');
    file_put_contents($path, $report->json());
    echo "\nJSON: $path\n";
}
if ($opts['html']) {
    $path = is_string($opts['html']) ? $opts['html'] : ($root . '/_shared/audit-report.html');
    file_put_contents($path, $report->html());
    echo "HTML: $path\n";
}

$counts = $report->counts();
exit($counts['ERROR'] > 0 ? 1 : 0);
