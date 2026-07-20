<?php
/**
 * _shared/dbc2_lib.php — funzioni PURE condivise (lettura .env + chiamate API Datalia).
 *
 * Estratte da _shared/config.php per poter essere riusate SENZA eseguire il
 * codice globale di config.php (che effettua il fetch del sito che lo include).
 * Le usa sia il runtime dei siti (config.php) sia il tool di audit (audit.php).
 *
 * Questo file contiene SOLO definizioni di funzione e nessun side-effect:
 * includerlo è sempre sicuro. La logica HTTP/env è identica a quella storica di
 * config.php, così l'audit "vede" esattamente i dati che vede il sito.
 */

if (!function_exists('log_debug')) {
    /**
     * Log diagnostico. Stampa solo se la costante DEBUG_MODE è definita e true
     * (lo è nel runtime di config.php; nel tool di audit resta silenziosa).
     */
    function log_debug($msg)
    {
        if (defined('DEBUG_MODE') && DEBUG_MODE) {
            echo "[DEBUG] " . htmlspecialchars($msg) . "<br>\n";
        }
    }
}

if (!function_exists('load_env')) {
    /** Legge un file .env "CHIAVE=valore" (una per riga) in un array associativo. */
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
}

if (!function_exists('clean_env_value')) {
    /**
     * Ripulisce il valore di una variabile: toglie spazi ai bordi e un'eventuale
     * coppia di virgolette (singole o doppie).
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
}

if (!function_exists('get_env_var')) {
    /**
     * Cerca una variabile prima nell'ambiente di sistema (getenv / $_SERVER /
     * $_ENV) e, se non la trova, nel file .env. Valore sempre ripulito.
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
}

if (!function_exists('dbc2_api_get')) {
    /**
     * GET autenticata (Bearer) verso $url; restituisce l'array decodificato dal
     * JSON oppure null in caso di errore. Logica HTTP CONDIVISA fra l'API vecchia
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
}

if (!function_exists('fetch_company')) {
    /**
     * API VECCHIA (DEPRECATA, ma ANCORA ATTIVA): GET /companies/{COMPANY_ID}.
     * Restituisce l'oggetto azienda "piatto" oppure null.
     */
    function fetch_company($apiBase, $token, $companyId)
    {
        if ($apiBase === '' || $token === '' || $companyId === '') {
            log_debug("Errore API: parametri di configurazione incompleti.");
            return null; // configurazione incompleta
        }
        return dbc2_api_get($apiBase . '/companies/' . rawurlencode($companyId), $token);
    }
}

if (!function_exists('fetch_landing')) {
    /**
     * API NUOVA: GET /landing-pages/{LANDING_PAGE_ID}.
     * Restituisce la risposta annidata { landing_page, operatore_energetico,
     * company } oppure null.
     */
    function fetch_landing($apiBase, $token, $landingId)
    {
        if ($apiBase === '' || $token === '' || $landingId === '') {
            log_debug("Errore API: parametri di configurazione incompleti.");
            return null; // configurazione incompleta
        }
        return dbc2_api_get($apiBase . '/landing-pages/' . rawurlencode($landingId), $token);
    }
}

if (!function_exists('dbc2_build_assoc')) {
    /**
     * Costruisce un array associativo con TUTTE le $fields (default '') sovrascritte
     * dai valori di $source, GIÀ resi sicuri per l'HTML (null -> ''; scalare ->
     * htmlspecialchars; non scalare -> invariato). Chiavi extra di $source incluse.
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
}

if (!function_exists('dbc2_campi_noti')) {
    /** Chiavi note del blocco "company" (e delle variabili piatte dell'API vecchia). */
    function dbc2_campi_noti()
    {
        return [
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
            'numero_rea',
            'telefono',
            'logo_url',
            'logo2_url',
            'bpg_customer_id',
            'bpg_customer_name',
            'created_at',
            'updated_at',
        ];
    }
}

if (!function_exists('dbc2_landing_fields')) {
    /** Chiavi note del blocco "landing_page" (API nuova). */
    function dbc2_landing_fields()
    {
        return [
            'id',
            'url',
            'titolo',
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
    }
}

if (!function_exists('dbc2_operatore_fields')) {
    /** Chiavi note del blocco "operatore_energetico" (API nuova). */
    function dbc2_operatore_fields()
    {
        return [
            'id',
            'nome_marketing',
            'nome_legale',
            'indirizzo',
            'partita_iva',
            'email_supporto',
            'logo_url',
            'logo2_url',
            'created_at',
            'updated_at',
        ];
    }
}

if (!function_exists('dbc2_offerta_fields')) {
    /** Chiavi note di un singolo elemento del blocco "offerte" (API nuova). */
    function dbc2_offerta_fields()
    {
        return [
            'id',
            'operatore_energetico_id',
            'operatore_energetico_nome',
            'nome',
            'tipologia',
            'titolo',
            'sottotitolo',
            'caratteristiche',
            'caratteristiche_evidenza',
            'footer',
        ];
    }
}

if (!function_exists('dbc2_offerta_list_fields')) {
    /** Campi di un'offerta che sono LISTE di frammenti HTML (default []). */
    function dbc2_offerta_list_fields()
    {
        return ['caratteristiche', 'caratteristiche_evidenza'];
    }
}

if (!function_exists('dbc2_format_tipologia')) {
    /**
     * Formatta il campo "tipologia" di un'offerta per la visualizzazione:
     * sostituisce gli underscore con spazi e rende maiuscola l'iniziale di ogni
     * parola. Es: "gas_uso_non_domestico" -> "Gas Uso Non Domestico".
     * Unicode-aware quando l'estensione mbstring è disponibile.
     */
    function dbc2_format_tipologia($value)
    {
        $s = str_replace('_', ' ', (string) $value);
        if (function_exists('mb_convert_case')) {
            return mb_convert_case($s, MB_CASE_TITLE, 'UTF-8');
        }
        return ucwords($s);
    }
}

if (!function_exists('dbc2_build_offerte')) {
    /**
     * Costruisce la LISTA (array a indice numerico) delle offerte dell'API nuova.
     * ATTENZIONE: i campi testuali delle offerte (titolo, sottotitolo, footer,
     * caratteristiche...) sono FRAMMENTI HTML già pronti generati lato server
     * dall'API fidata: si emettono GREZZI con <?= ?> e NON vanno passati in
     * htmlspecialchars (lo escaping li mostrerebbe come testo con i tag visibili).
     * Ogni offerta esce con TUTTE le $fields: default [] per i campi-lista
     * (caratteristiche, caratteristiche_evidenza), '' per gli altri; i null
     * diventano ''. Se $source non è una lista di array, restituisce [].
     */
    function dbc2_build_offerte(array $fields, $source)
    {
        $listFields = dbc2_offerta_list_fields();
        $out = [];
        if (!is_array($source)) {
            return $out;
        }
        foreach ($source as $item) {
            if (!is_array($item)) {
                continue;
            }
            $row = [];
            foreach ($fields as $f) {
                $row[$f] = in_array($f, $listFields, true) ? [] : '';
            }
            // Valori GREZZI (HTML fidato dall'API): null -> '' / [] a seconda del campo.
            foreach ($item as $k => $v) {
                if ($v === null) {
                    $row[$k] = in_array($k, $listFields, true) ? [] : '';
                } else {
                    $row[$k] = $v;
                }
            }
            // "tipologia": normalizzo per la UI (underscore -> spazi, Title Case).
            if (is_string($row['tipologia']) && $row['tipologia'] !== '') {
                $row['tipologia'] = dbc2_format_tipologia($row['tipologia']);
            }
            $out[] = $row;
        }
        return $out;
    }
}
