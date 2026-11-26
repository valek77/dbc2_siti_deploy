<?php
/**
 * Client DBC2: configurazione, lettura della landing (con cache) e invio del lead.
 * Stesse regole di _shared/lead_proxy.php (guida "Integrazione API Lead" di DBContatti):
 *   - ip / user_agent del VISITATORE, presi dal server;
 *   - landing_page_url = landing_page.url registrato in DBC2, senza query string;
 *   - telefono solo cifre (+ iniziale ammesso);
 *   - nessun retry: ogni 201 fa partire un SMS.
 * Il token non viene mai restituito né scritto nei log.
 */

if (!defined('ABSPATH')) {
    exit;
}

class DBC2_Lead_Client
{
    const DEFAULT_API_BASE = 'https://dbc2.datalia.it/api';
    const CACHE_TTL = 3600;          // 1 ora, come config.php dei siti PHP
    const RETRY_AFTER_FAIL = 300;    // dopo un errore API, niente nuovi tentativi per 5 minuti
    const TRANSIENT_LANDING = 'dbc2_lead_landing';
    const TRANSIENT_FAIL = 'dbc2_lead_landing_fail';
    const OPTION_LAST_GOOD = 'dbc2_lead_landing_last';

    // --- Configurazione ------------------------------------------------------

    public static function token()
    {
        return defined('DBC2_TOKEN') ? trim((string) DBC2_TOKEN) : '';
    }

    public static function api_base()
    {
        $base = defined('DBC2_API_BASE') ? trim((string) DBC2_API_BASE) : '';
        return rtrim($base !== '' ? $base : self::DEFAULT_API_BASE, '/');
    }

    public static function ip_header()
    {
        return defined('DBC2_IP_HEADER') ? trim((string) DBC2_IP_HEADER) : '';
    }

    public static function landing_id()
    {
        if (defined('DBC2_LANDING_PAGE_ID') && (string) DBC2_LANDING_PAGE_ID !== '') {
            return trim((string) DBC2_LANDING_PAGE_ID);
        }
        return trim((string) get_option(DBC2_LEAD_OPTION_LANDING, ''));
    }

    /** Elenco di ciò che manca per funzionare (vuoto = ok). */
    public static function missing_config()
    {
        $missing = [];
        if (self::token() === '') {
            $missing[] = 'DBC2_TOKEN';
        }
        if (self::landing_id() === '') {
            $missing[] = 'LANDING_PAGE_ID';
        }
        return $missing;
    }

    public static function norm_host($url)
    {
        $url = trim((string) $url);
        if ($url === '') {
            return '';
        }
        if (strpos($url, '//') === false) {
            $url = 'http://' . $url;
        }
        return preg_replace('/^www\./', '', strtolower((string) wp_parse_url($url, PHP_URL_HOST)));
    }

    // --- Landing (GET /landing-pages/{id}) con cache --------------------------

    public static function clear_cache()
    {
        delete_transient(self::TRANSIENT_LANDING);
        delete_transient(self::TRANSIENT_FAIL);
    }

    /**
     * Risposta di GET /landing-pages/{id} ({ landing_page, operatore_energetico, company })
     * oppure null. Cache fresca → transient; scaduta → API; API in errore → ultima copia
     * valida della STESSA landing (anche vecchia); nulla → null.
     */
    public static function get_landing()
    {
        $id = self::landing_id();
        if ($id === '' || self::token() === '') {
            return null;
        }
        $isMine = function ($data) use ($id) {
            return is_array($data) && isset($data['landing_page']['id'])
                && (string) $data['landing_page']['id'] === $id;
        };

        $cached = get_transient(self::TRANSIENT_LANDING);
        if ($isMine($cached)) {
            return $cached;
        }

        if (!get_transient(self::TRANSIENT_FAIL)) {
            $res = wp_remote_get(self::api_base() . '/landing-pages/' . rawurlencode($id), [
                'timeout' => 10,
                'redirection' => 0,
                'headers' => [
                    'Authorization' => 'Bearer ' . self::token(),
                    'Accept' => 'application/json',
                ],
            ]);
            $code = is_wp_error($res) ? 0 : (int) wp_remote_retrieve_response_code($res);
            $data = $code === 200 ? json_decode((string) wp_remote_retrieve_body($res), true) : null;
            if ($isMine($data)) {
                set_transient(self::TRANSIENT_LANDING, $data, self::CACHE_TTL);
                update_option(self::OPTION_LAST_GOOD, $data, false);
                return $data;
            }
            error_log('dbc2-elementor-lead: GET /landing-pages/' . $id . ' fallita ('
                . (is_wp_error($res) ? $res->get_error_message() : 'HTTP ' . $code) . ')');
            set_transient(self::TRANSIENT_FAIL, 1, self::RETRY_AFTER_FAIL);
        }

        $last = get_option(self::OPTION_LAST_GOOD);
        return $isMine($last) ? $last : null;
    }

    /** Il consenso $i (0=ricontatto, 1=privacy, 2=marketing) è mostrato sulla landing? */
    public static function consent_shown($landing, $i)
    {
        $v = $landing['landing_page']['mostra_consenso_' . $i] ?? null;
        if (is_bool($v)) {
            return $v;
        }
        return filter_var((string) $v, FILTER_VALIDATE_BOOLEAN);
    }

    // --- Dati del visitatore ------------------------------------------------

    public static function visitor_ip()
    {
        $ip = null;
        $header = self::ip_header();
        if ($header !== '' && !empty($_SERVER[$header])) {
            $ip = trim(explode(',', (string) $_SERVER[$header])[0]); // X-Forwarded-For: primo valore
        }
        if ($ip === null || filter_var($ip, FILTER_VALIDATE_IP) === false) {
            $ip = isset($_SERVER['REMOTE_ADDR']) ? (string) $_SERVER['REMOTE_ADDR'] : null;
        }
        return $ip;
    }

    public static function visitor_user_agent()
    {
        return isset($_SERVER['HTTP_USER_AGENT']) ? substr((string) $_SERVER['HTTP_USER_AGENT'], 0, 1000) : null;
    }

    /**
     * URL da inviare come landing_page_url: quello registrato in DBC2. Se l'host registrato
     * non è quello del sito (ID di un'altra landing), NON attribuisco il lead a un'altra
     * landing: uso l'host reale e lascio che l'API lo rifiuti se non censito.
     */
    public static function landing_url($landing)
    {
        $siteHost = self::norm_host(home_url());
        $url = isset($landing['landing_page']['url']) && is_string($landing['landing_page']['url'])
            ? trim($landing['landing_page']['url']) : '';
        if ($url !== '' && $siteHost !== '' && self::norm_host($url) !== $siteHost) {
            error_log('dbc2-elementor-lead: landing_page.url (' . $url . ') diverso dal dominio del sito ('
                . $siteHost . '): controllare LANDING_PAGE_ID');
            $url = '';
        }
        if ($url === '') {
            $url = preg_replace('/[?#].*$/', '', untrailingslashit(home_url()));
        }
        return $url;
    }

    public static function normalize_phone($value)
    {
        // Solo cifre; ammesso il "+" iniziale del prefisso +39.
        return preg_replace('/(?!^\+)[^\d]/', '', trim((string) $value));
    }

    // --- Invio (POST /lead) -------------------------------------------------

    /**
     * Invia il lead. Restituisce ['status' => int, 'data' => array|null].
     * status = 0 se la richiesta non è partita o è andata in timeout.
     * NESSUN retry: un 201 già ricevuto non va mai ripetuto.
     */
    public static function send_lead(array $payload)
    {
        $res = wp_remote_post(self::api_base() . '/lead', [
            'timeout' => 15,
            'redirection' => 0,
            'headers' => [
                'Authorization' => 'Bearer ' . self::token(),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'body' => wp_json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        ]);
        if (is_wp_error($res)) {
            error_log('dbc2-elementor-lead: POST /lead non riuscita: ' . $res->get_error_message());
            return ['status' => 0, 'data' => null];
        }
        $status = (int) wp_remote_retrieve_response_code($res);
        $body = (string) wp_remote_retrieve_body($res);
        $data = json_decode($body, true);
        if ($status === 401 || $status === 403 || $status >= 500) {
            error_log('dbc2-elementor-lead: POST /lead ha risposto ' . $status
                . ' (landing_page_url=' . ($payload['landing_page_url'] ?? '') . '): ' . substr($body, 0, 300));
        }
        return ['status' => $status, 'data' => is_array($data) ? $data : null];
    }
}
