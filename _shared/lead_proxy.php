<?php
/**
 * _shared/lead_proxy.php — proxy lato server del form contatti verso POST {DBC2_API_BASE}/lead.
 *
 * L'API /lead richiede il token Sanctum (DBC2_TOKEN), che è SEGRETO e non può
 * stare in lead-form.js. Il browser quindi invia il JSON a "lead.php" (stub del
 * sito), che include questo file: qui si aggiunge l'header Authorization e si
 * inoltra la richiesta, restituendo al browser lo STESSO status e body dell'API.
 *
 * Stub per-sito (lead.php), stesso pattern di _config.php:
 *      $SITE_DIR = __DIR__;
 *      require dirname(__DIR__, 2) . '/_shared/lead_proxy.php';
 *
 * Variabili lette (sistema prima, poi .env del sito): DBC2_API_BASE, DBC2_TOKEN.
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
$payload = json_decode($raw, true);
if (!is_array($payload) || ($payload !== [] && array_keys($payload) === range(0, count($payload) - 1))) {
    lead_proxy_fail(400, 'Payload non valido.');
}

// IP: se il client non l'ha ottenuto (ipify bloccato da adblock), uso quello visto dal server.
if (empty($payload['ip']) && !empty($_SERVER['REMOTE_ADDR'])) {
    $payload['ip'] = $_SERVER['REMOTE_ADDR'];
}

// --- 4. Configurazione -----------------------------------------------------
$env_file = load_env($SITE_DIR . '/.env');
$API_BASE = rtrim(get_env_var('DBC2_API_BASE', $env_file), '/');
$TOKEN = get_env_var('DBC2_TOKEN', $env_file);
if ($API_BASE === '' || $TOKEN === '') {
    error_log('lead_proxy: DBC2_API_BASE o DBC2_TOKEN non impostati per ' . $SITE_DIR);
    lead_proxy_fail(500, 'Servizio temporaneamente non disponibile.');
}

// --- 5. Inoltro ------------------------------------------------------------
list($status, $body) = dbc2_api_post(
    $API_BASE . '/lead',
    $TOKEN,
    json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
);

if ($status === 0) {
    error_log('lead_proxy: API /lead non raggiungibile (' . $SITE_DIR . ')');
    lead_proxy_fail(502, 'Servizio temporaneamente non disponibile.');
}
if ($status === 401 || $status === 403) {
    // Problema di token lato server: non è colpa dell'utente, non espongo dettagli.
    error_log('lead_proxy: API /lead ha risposto ' . $status . ' (token non valido o senza permessi?) per ' . $SITE_DIR);
    lead_proxy_fail(502, 'Servizio temporaneamente non disponibile.');
}

http_response_code($status);
echo $body !== '' ? $body : '{}';
