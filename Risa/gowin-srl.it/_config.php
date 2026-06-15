<?php
/**
 * _config.php — cuore del sito.
 *
 * 1. Legge il file .env (token, company_id, api base, sito_web).
 * 2. Scarica i dati dell'azienda dall'API protetta da token bearer.
 * 3. Tiene una copia in cache su file (.company-cache.json): se l'API non
 *    risponde, il sito continua a funzionare con l'ultima copia valida.
 * 4. Mette a disposizione delle pagine:
 *      $p_iva, $company_name, $pec, ... -> una variabile per ogni campo API,
 *                   GIÀ PULITA per l'HTML: si stampa direttamente <?= $p_iva ?>
 *      $brand     -> nome da mostrare (commerciale, o ragione sociale)
 *      $company   -> array con i dati azienda grezzi (non puliti)
 *      c('chiave')-> valore grezzo di un campo azienda (con eventuale default)
 *      e('testo') -> rende sicuro un testo per l'HTML (per valori NON già puliti)
 *
 * Il token resta SEMPRE lato server: il browser riceve solo HTML già pronto.
 */

// --- Impostazioni cache ---------------------------------------------------
define('CACHE_FILE', __DIR__ . '/.company-cache.json');
define('CACHE_TTL', 3600); // secondi (1 ora) prima di richiamare l'API

// --- 1. Lettura del file .env --------------------------------------------
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

$env = load_env(__DIR__ . '/.env');

$API_BASE = isset($env['DBC2_API_BASE']) ? rtrim($env['DBC2_API_BASE'], '/') : '';
$TOKEN = isset($env['DBC2_TOKEN']) ? $env['DBC2_TOKEN'] : '';
$COMPANY_ID = isset($env['COMPANY_ID']) ? $env['COMPANY_ID'] : '';
$SITO_WEB = isset($env['SITO_WEB']) ? htmlspecialchars($env['SITO_WEB'], ENT_QUOTES, 'UTF-8') : '';
// Operatore energetico di cui il sito è rivenditore (es. "Hera Comm").
$OPERATORE_ENERGETICO = isset($env['OPERATORE_ENERGETICO']) ? htmlspecialchars($env['OPERATORE_ENERGETICO'], ENT_QUOTES, 'UTF-8') : '';

// --- 2. Chiamata all'API --------------------------------------------------
function fetch_company($apiBase, $token, $companyId)
{
    if ($apiBase === '' || $token === '' || $companyId === '') {
        return null; // configurazione incompleta
    }
    $url = $apiBase . '/companies/' . rawurlencode($companyId);

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
        curl_close($ch);
        if ($body !== false && $code >= 200 && $code < 300) {
            $data = json_decode($body, true);
            if (is_array($data)) {
                return $data;
            }
        }
        return null;
    }

    // Fallback: file_get_contents con stream context
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
        if (is_array($data) && isset($data['id'])) {
            return $data;
        }
    }
    return null;
}

// --- 3. Cache su file con fallback ---------------------------------------
function load_company($apiBase, $token, $companyId)
{
    $cacheFresh = is_file(CACHE_FILE) && (time() - filemtime(CACHE_FILE) < CACHE_TTL);

    // Cache valida e recente: usala senza chiamare l'API.
    if ($cacheFresh) {
        $cached = json_decode((string) @file_get_contents(CACHE_FILE), true);
        if (is_array($cached)) {
            return $cached;
        }
    }

    // Cache assente o scaduta: prova a richiamare l'API.
    $fresh = fetch_company($apiBase, $token, $companyId);
    if ($fresh !== null) {
        @file_put_contents(CACHE_FILE, json_encode($fresh, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        return $fresh;
    }

    // API non raggiungibile: usa l'ultima copia salvata, anche se "vecchia".
    if (is_file(CACHE_FILE)) {
        $stale = json_decode((string) @file_get_contents(CACHE_FILE), true);
        if (is_array($stale)) {
            return $stale;
        }
    }

    // Nessun dato disponibile: array vuoto (le pagine mostreranno i default).
    return [];
}

$company = load_company($API_BASE, $TOKEN, $COMPANY_ID);

// --- 4. Ogni campo dell'API diventa una variabile globale GIÀ PULITA ------
// Così nelle pagine puoi usare direttamente $p_iva, $company_name, $pec, ...
// senza scrivere e($...): i valori vengono già resi sicuri per l'HTML qui.
// I campi noti sono SEMPRE definiti (stringa vuota se mancanti), così non
// compaiono "avvisi di variabile non definita".
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
    'bpg_customer_id',
    'bpg_customer_name',
    'created_at',
    'updated_at',
];
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

// --- 5. Helper per le pagine ---------------------------------------------

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
