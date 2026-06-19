<?php
/**
 * _config.php — cuore del sito (Versione Irrobustita con Debug)
 */

// --- CONFIGURAZIONE E DEBUG ----------------------------------------------
define('CACHE_FILE', __DIR__ . '/.company-cache.json');
define('CACHE_TTL', 3600); // 1 ora
define('DEBUG_MODE', true); // IMPOSTA A false IN PRODUZIONE PER NASCONDERE I LOG

function log_debug($msg)
{
    if (DEBUG_MODE) {
        echo "[DEBUG] " . htmlspecialchars($msg) . "<br>\n";
    }
}

// --- 1. LETTURA VARIABILI (SISTEMA + .ENV) -------------------------------
function load_env($path)
{
    $vars = [];
    if (!is_file($path)) {
        return $vars;
    }
    foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#' || strpos($line, '=') === false) {
            continue;
        }
        list($key, $value) = explode('=', $line, 2);
        $vars[trim($key)] = trim($value);
    }
    return $vars;
}

// Carica il file .env per le variabili rimaste lì (es. COMPANY_ID)
$env_file = load_env(__DIR__ . '/.env');

/**
 * Helper fondamentale: Cerca prima nelle variabili di sistema (Apache/Ubuntu)
 * e se non le trova guarda nel file .env
 */
/**
 * Ripulisce il valore di una variabile: toglie spazi ai bordi e un'eventuale
 * coppia di virgolette (singole o doppie) che alcuni parser FPM non rimuovono.
 */
function clean_env_value($value)
{
    $value = trim($value);
    if (strlen($value) >= 2) {
        $first = $value[0];
        $last = $value[strlen($value) - 1];
        if (($first === '"' && $last === '"') || ($first === "'" && $last === "'")) {
            $value = substr($value, 1, -1);
        }
    }
    return trim($value);
}

function get_env_var($key, $fallback_array)
{
    // getenv(): mod_php con envvars (export) o FPM con env[...]
    $sys_var = getenv($key);
    if ($sys_var !== false && $sys_var !== '') {
        log_debug("Variabile ospitata nel SISTEMA (getenv): $key");
        return clean_env_value($sys_var);
    }
    // $_SERVER: SetEnv/PassEnv nel VirtualHost (mod_env), tipico con FPM
    if (isset($_SERVER[$key]) && $_SERVER[$key] !== '') {
        log_debug("Variabile ospitata nel SISTEMA (\$_SERVER): $key");
        return clean_env_value($_SERVER[$key]);
    }
    // $_ENV: dipende da variables_order in php.ini
    if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
        log_debug("Variabile ospitata nel SISTEMA (\$_ENV): $key");
        return clean_env_value($_ENV[$key]);
    }
    if (isset($fallback_array[$key]) && $fallback_array[$key] !== '') {
        log_debug("Variabile ospitata nel file .ENV: $key");
        return clean_env_value($fallback_array[$key]);
    }
    log_debug("ATTENZIONE: Variabile NON trovata: $key");
    return '';
}

// Recupero robusto delle variabili
$API_BASE = rtrim(get_env_var('DBC2_API_BASE', $env_file), '/');
$TOKEN = get_env_var('DBC2_TOKEN', $env_file);
$COMPANY_ID = get_env_var('COMPANY_ID', $env_file);
$SITO_WEB = htmlspecialchars(get_env_var('SITO_WEB', $env_file), ENT_QUOTES, 'UTF-8');
$OPERATORE_ENERGETICO = htmlspecialchars(get_env_var('OPERATORE_ENERGETICO', $env_file), ENT_QUOTES, 'UTF-8');


// --- 2. CHIAMATA ALL'API CON DIAGNOSTICA ----------------------------------
function fetch_company($apiBase, $token, $companyId)
{
    if ($apiBase === '' || $token === '' || $companyId === '') {
        log_debug("Errore API: Parametri di configurazione incompleti. Impossibile chiamare l'endpoint.");
        return null;
    }

    $url = $apiBase . '/companies/' . rawurlencode($companyId);
    log_debug("Chiamata API verso: " . $url);

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
            } else {
                log_debug("Errore API: Il body restituito non è un JSON valido.");
            }
        } else {
            log_debug("Errore API: Risposta fallita o non autorizzata. Body: " . substr($body, 0, 200));
        }
        return null;
    }

    // Fallback file_get_contents
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

// --- 3. CACHE CON FALLBACK E LOGGING -------------------------------------
function load_company($apiBase, $token, $companyId)
{
    $cacheFileExists = is_file(CACHE_FILE);
    $cacheAge = $cacheFileExists ? (time() - filemtime(CACHE_FILE)) : 0;
    $cacheFresh = $cacheFileExists && ($cacheAge < CACHE_TTL);

    if ($cacheFresh) {
        log_debug("Cache VALIDA (Età: {$cacheAge}s / TTL: " . CACHE_TTL . "s). Caricamento da file.");
        $cached = json_decode((string) @file_get_contents(CACHE_FILE), true);
        if (is_array($cached)) {
            return $cached;
        }
    }

    log_debug("Cache assente o scaduta. Tento il recupero in tempo reale dall'API...");
    $fresh = fetch_company($apiBase, $token, $companyId);

    if ($fresh !== null) {
        log_debug("API restituita con successo. Aggiorno il file di Cache.");
        @file_put_contents(CACHE_FILE, json_encode($fresh, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        return $fresh;
    }

    if ($cacheFileExists) {
        log_debug("API Fallita! Fallback d'emergenza: Utilizzo la cache SCADUTA recuperata dal file.");
        $stale = json_decode((string) @file_get_contents(CACHE_FILE), true);
        if (is_array($stale)) {
            return $stale;
        }
    }

    log_debug("CRITICO: Nessun dato disponibile né da API né da Cache. Restituisco array vuoto.");
    return [];
}

$company = load_company($API_BASE, $TOKEN, $COMPANY_ID);

// --- 4. INIZIALIZZAZIONE GLOBALI (Invariata) ----------------------------
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
];
foreach ($campi_noti as $campo) {
    $GLOBALS[$campo] = '';
}

foreach ($company as $campo => $valore) {
    if ($valore === null) {
        $GLOBALS[$campo] = '';
    } elseif (is_scalar($valore)) {
        $GLOBALS[$campo] = htmlspecialchars((string) $valore, ENT_QUOTES, 'UTF-8');
    } else {
        $GLOBALS[$campo] = $valore;
    }
}

// --- 5. HELPER PER LE PAGINE (Invariata) ---------------------------------
function c($key, $default = '')
{
    global $company;
    if (isset($company[$key]) && $company[$key] !== null && $company[$key] !== '') {
        return $company[$key];
    }
    return $default;
}

function e($text)
{
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

$brand = $nome_commerciale !== '' ? $nome_commerciale
    : ($company_name !== '' ? $company_name : 'La nostra azienda');