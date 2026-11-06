<?php
/**
 * _shared/lead_proxy.php — backend del form contatti: inoltra il lead a POST {DBC2_API_BASE}/lead.
 *
 * L'API /lead richiede il token Sanctum (DBC2_TOKEN), che è SEGRETO e non può
 * stare in lead-form.js: l'invio diretto dal browser non è più supportato.
 * Il browser invia il JSON a "lead.php" (stub del sito), che include questo file:
 * qui si completano i dati che deve fornire il SERVER, si aggiunge
 * l'header Authorization e si restituisce al browser status e body dell'API.
 *
 * Stub per-sito (lead.php), stesso pattern di _config.php:
 *      $SITE_DIR = __DIR__;
 *      require dirname(__DIR__, 2) . '/_shared/lead_proxy.php';
 *
 * Variabili (sistema prima, poi .env del sito):
 *   DBC2_API_BASE  es. https://dbc2.datalia.it/api
 *   DBC2_TOKEN     token Sanctum (segreto)
 *   DBC2_IP_HEADER facoltativa: header $_SERVER fidato con l'IP del visitatore
 *                  quando il sito è dietro un NOSTRO CDN/reverse proxy
 *                  (es. HTTP_CF_CONNECTING_IP). Vuota -> REMOTE_ADDR.
 *
 * Regole dalla guida "Integrazione API Lead" di DBContatti:
 *   - ip / user_agent: quelli del VISITATORE, presi dal server (non dal client);
 *   - landing_page_url: l'URL registrato (landing_page.url dalla cache della
 *     landing), senza query string;
 *   - telefono: solo cifre (+ iniziale ammesso);
 *   - mai ripetere un invio che ha ricevuto 201 (ogni lead fa partire un SMS):
 *     qui NON ci sono retry automatici.
 * Il token non viene mai restituito né scritto nei log.
 */

if (!isset($SITE_DIR)) {
    $SITE_DIR = __DIR__;
}

// Solo funzioni pure: NON includo config.php (farebbe il fetch della landing).
require_once __DIR__ . '/dbc2_lib.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

/** Risposta JSON di errore generica e uscita. */
function lead_proxy_fail($status, $message)
{
    http_response_code($status);
    echo json_encode(['message' => $message], JSON_UNESCAPED_UNICODE);
    exit;
}

// --- 1. Solo POST ----------------------------------------------------------
if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Allow: POST');
    lead_proxy_fail(405, 'Metodo non consentito.');
}

// --- 2. Controllo minimo same-origin ---------------------------------------
// Se il browser manda Origin, deve essere lo stesso host del sito.
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if ($origin !== '') {
    $originHost = strtolower((string) parse_url($origin, PHP_URL_HOST));
    $siteHost = strtolower(preg_replace('/:\d+$/', '', (string) ($_SERVER['HTTP_HOST'] ?? '')));
    if ($originHost === '' || $originHost !== $siteHost) {
        lead_proxy_fail(403, 'Origine non consentita.');
    }
}

// --- 3. Payload: deve essere un oggetto JSON -------------------------------
$raw = (string) file_get_contents('php://input');
if (strlen($raw) > 65536) {
    lead_proxy_fail(413, 'Richiesta troppo grande.');
}
$in = json_decode($raw, true);
if (!is_array($in) || ($in !== [] && array_keys($in) === range(0, count($in) - 1))) {
    lead_proxy_fail(400, 'Payload non valido.');
}

// --- 4. Configurazione -----------------------------------------------------
$env_file = load_env($SITE_DIR . '/.env');
$API_BASE = rtrim(get_env_var('DBC2_API_BASE', $env_file), '/');
$TOKEN = get_env_var('DBC2_TOKEN', $env_file);
$IP_HEADER = get_env_var('DBC2_IP_HEADER', $env_file);
if ($API_BASE === '' || $TOKEN === '') {
    error_log('lead_proxy: DBC2_API_BASE o DBC2_TOKEN non impostati per ' . $SITE_DIR);
    lead_proxy_fail(500, 'Servizio temporaneamente non disponibile.');
}

// --- 5. Payload verso l'API: solo i campi previsti dalla guida -------------

// IP del visitatore: header fidato (se configurato) oppure REMOTE_ADDR.
$ip = null;
if ($IP_HEADER !== '' && !empty($_SERVER[$IP_HEADER])) {
    $ip = trim(explode(',', (string) $_SERVER[$IP_HEADER])[0]); // X-Forwarded-For: primo valore
}
if ($ip === null || filter_var($ip, FILTER_VALIDATE_IP) === false) {
    $ip = $_SERVER['REMOTE_ADDR'] ?? null;
}

// URL della landing: quello REGISTRATO (landing_page.url) dalla cache scritta
// da config.php; in mancanza, l'URL inviato dal browser senza query string.
$landingUrl = '';
$cacheFile = dbc2_cache_file($SITE_DIR); // stesso file usato da config.php
$LANDING_PAGE_ID = get_env_var('LANDING_PAGE_ID', $env_file);
if (is_file($cacheFile)) {
    $cache = json_decode((string) @file_get_contents($cacheFile), true);
    // Uso la cache solo se è della landing configurata (una cache vecchia può
    // riferirsi a un LANDING_PAGE_ID corretto nel frattempo).
    $cacheId = isset($cache['landing_page']['id']) ? (string) $cache['landing_page']['id'] : '';
    if ($cacheId !== '' && $LANDING_PAGE_ID !== '' && $cacheId !== $LANDING_PAGE_ID) {
        error_log('lead_proxy: cache della landing ' . $cacheId . ' ma LANDING_PAGE_ID=' . $LANDING_PAGE_ID
            . ' per ' . $SITE_DIR . ': cache ignorata');
    } elseif (isset($cache['landing_page']['url']) && is_string($cache['landing_page']['url'])) {
        $landingUrl = trim($cache['landing_page']['url']);
    }
}
// Protezione da binding errato (LANDING_PAGE_ID di un altro sito nel .env): se
// l'host registrato non è quello su cui gira il sito, NON attribuisco il lead a
// un'altra landing; uso l'host reale e lascio che l'API lo rifiuti se non censito.
$reqHost = strtolower(preg_replace('/:\d+$/', '', (string) ($_SERVER['HTTP_HOST'] ?? '')));
$stripWww = function ($h) { return preg_replace('/^www\./', '', strtolower((string) $h)); };
if ($landingUrl !== '' && $reqHost !== '' && $stripWww(parse_url($landingUrl, PHP_URL_HOST)) !== $stripWww($reqHost)) {
    error_log('lead_proxy: landing_page.url in cache (' . $landingUrl . ') diverso dall\'host del sito ('
        . $reqHost . ') per ' . $SITE_DIR . ': controllare LANDING_PAGE_ID nel .env');
    $landingUrl = 'https://' . $reqHost;
}
if ($landingUrl === '' && isset($in['landing_page_url']) && is_string($in['landing_page_url'])) {
    $landingUrl = preg_replace('/[?#].*$/', '', trim($in['landing_page_url']));
}

$userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? substr((string) $_SERVER['HTTP_USER_AGENT'], 0, 1000) : null;
$email = isset($in['email']) && is_string($in['email']) ? trim($in['email']) : '';

$payload = [
    'nome_cognome' => isset($in['nome_cognome']) ? trim((string) $in['nome_cognome']) : '',
    // Solo cifre; ammesso il "+" iniziale del prefisso +39.
    'telefono' => preg_replace('/(?!^\+)[^\d]/', '', trim((string) ($in['telefono'] ?? ''))),
    'email' => $email !== '' ? $email : null,
    'landing_page_url' => $landingUrl,
    // Consensi: valori reali scelti dal visitatore (0=ricontatto, 1=privacy, 2=marketing).
    'consenso_0' => !empty($in['consenso_0']),
    'consenso_1' => !empty($in['consenso_1']),
    'consenso_2' => !empty($in['consenso_2']),
    'ip' => $ip,
    'user_agent' => $userAgent,
];
if (isset($in['offerta_id']) && $in['offerta_id'] !== null && $in['offerta_id'] !== '') {
    $payload['offerta_id'] = (int) $in['offerta_id'];
}

// --- 6. Inoltro (nessun retry: un 201 già ricevuto non va mai ripetuto) ----
list($status, $body, $retryAfter) = dbc2_api_post(
    $API_BASE . '/lead',
    $TOKEN,
    json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
);

if ($status === 0) {
    error_log('lead_proxy: API /lead non raggiungibile o timeout (' . $SITE_DIR . ')');
    lead_proxy_fail(502, 'Servizio temporaneamente non disponibile.');
}
if ($status === 401 || $status === 403) {
    // Configurazione (token scaduto/errato, IP server non autorizzato, landing non
    // coperta dal token): non è colpa del visitatore, non espongo dettagli.
    error_log('lead_proxy: API /lead ha risposto ' . $status . ' per ' . $SITE_DIR
        . ' (landing_page_url=' . $landingUrl . '): ' . substr($body, 0, 300));
    lead_proxy_fail(502, 'Servizio temporaneamente non disponibile.');
}
if ($status >= 500) {
    error_log('lead_proxy: API /lead ha risposto ' . $status . ' per ' . $SITE_DIR);
}
if ($status === 429 && $retryAfter !== '') {
    header('Retry-After: ' . $retryAfter);
}

http_response_code($status);
echo $body !== '' ? $body : '{}';
