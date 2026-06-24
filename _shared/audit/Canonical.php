<?php
/**
 * _shared/audit/Canonical.php — risolve i dati CANONICI (verità) per ogni sito.
 *
 * Fonte in ordine di priorità:
 *   1. API Datalia live (se DBC2_TOKEN è disponibile) — riusa fetch_landing /
 *      fetch_company di dbc2_lib.php, identiche al runtime dei siti.
 *   2. Cache per-sito .company-cache.json (fallback OFFLINE, può essere "vecchia").
 *
 * Restituisce SEMPRE tre blocchi con valori GREZZI (non escapati): landing,
 * operatore, company — più 'source' (api|cache|none) per tracciare l'origine.
 * La cache delle risposte API vive in _shared/.audit-api-cache.json (gitignored).
 */
class Canonical
{
    private $apiBase;
    private $token;
    private $cacheFile;
    private $refresh;
    private $apiCache = [];
    private $stats = ['api' => 0, 'cache' => 0, 'none' => 0, 'errors' => []];

    public function __construct($apiBase, $token, $repoRoot, $refresh = false)
    {
        $this->apiBase = rtrim($apiBase, '/');
        $this->token = $token;
        $this->cacheFile = $repoRoot . '/_shared/.audit-api-cache.json';
        $this->refresh = $refresh;
        if (!$refresh && is_file($this->cacheFile)) {
            $j = json_decode((string) file_get_contents($this->cacheFile), true);
            if (is_array($j)) {
                $this->apiCache = $j;
            }
        }
    }

    public function hasToken()
    {
        return $this->token !== '';
    }

    public function stats()
    {
        return $this->stats;
    }

    public function persist()
    {
        if ($this->token !== '') {
            @file_put_contents(
                $this->cacheFile,
                json_encode($this->apiCache, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
            );
        }
    }

    /** GET con memoizzazione su _shared/.audit-api-cache.json (chiave = endpoint). */
    private function apiGet($key, callable $fetch)
    {
        if (!$this->refresh && array_key_exists($key, $this->apiCache)) {
            return $this->apiCache[$key];
        }
        $data = $fetch();                 // null se errore/timeout/non autorizzato
        $this->apiCache[$key] = $data;
        return $data;
    }

    /**
     * Dati canonici per un sito. $site è un array con: type (static|php_old|
     * php_new), landing_id, company_id, cache_file (path .company-cache.json).
     */
    public function forSite(array $site)
    {
        $empty = ['landing' => [], 'operatore' => [], 'company' => [], 'source' => 'none'];

        // 1) API live, se ho il token e un id.
        if ($this->token !== '') {
            if ($site['landing_id'] !== '') {
                $payload = $this->apiGet('L:' . $site['landing_id'], function () use ($site) {
                    return fetch_landing($this->apiBase, $this->token, $site['landing_id']);
                });
                if (is_array($payload)) {
                    $this->stats['api']++;
                    return $this->shape($payload);
                }
                $this->stats['errors'][] = $site['dir'] . " (landing {$site['landing_id']} non risolta)";
            } elseif ($site['company_id'] !== '') {
                $payload = $this->apiGet('C:' . $site['company_id'], function () use ($site) {
                    return fetch_company($this->apiBase, $this->token, $site['company_id']);
                });
                if (is_array($payload)) {
                    $this->stats['api']++;
                    return $this->shape($payload);
                }
                $this->stats['errors'][] = $site['dir'] . " (company {$site['company_id']} non risolta)";
            }
        }

        // 2) Fallback OFFLINE: cache per-sito .company-cache.json
        if ($site['cache_file'] !== '' && is_file($site['cache_file'])) {
            $j = json_decode((string) file_get_contents($site['cache_file']), true);
            if (is_array($j)) {
                $this->stats['cache']++;
                $out = $this->shape($j);
                $out['source'] = 'cache';
                return $out;
            }
        }

        $this->stats['none']++;
        return $empty;
    }

    /** Riconosce la forma (nuova annidata vs vecchia piatta) e separa i blocchi. */
    private function shape($payload)
    {
        $isNew = isset($payload['landing_page']) || isset($payload['operatore_energetico']) || isset($payload['company']);
        if ($isNew) {
            return [
                'landing'   => is_array($payload['landing_page'] ?? null) ? $payload['landing_page'] : [],
                'operatore' => is_array($payload['operatore_energetico'] ?? null) ? $payload['operatore_energetico'] : [],
                'company'   => is_array($payload['company'] ?? null) ? $payload['company'] : [],
                'source'    => 'api',
            ];
        }
        // Forma vecchia: oggetto azienda piatto.
        return ['landing' => [], 'operatore' => [], 'company' => $payload, 'source' => 'api'];
    }
}
