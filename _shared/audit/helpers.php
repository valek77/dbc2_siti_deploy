<?php
/**
 * _shared/audit/helpers.php — funzioni PURE di supporto al tool di audit.
 *
 * Estrazione dati dai file (P.IVA, PEC, email, REA, ...), validatori di formato
 * (incl. check digit della partita IVA italiana), normalizzazione testo per il
 * confronto e il "consenso fra le copie". Nessuno stato globale: tutto puro.
 */

/* ============================ NORMALIZZAZIONE ============================ */

/** Normalizza un dominio per il confronto: minuscolo, senza schema/www/path/slash. */
function audit_domain_norm($s)
{
    $s = trim((string) $s);
    $s = preg_replace('#^https?://#i', '', $s);
    $s = preg_replace('#/.*$#', '', $s);     // via tutto dopo il primo '/'
    $s = preg_replace('#^www\.#i', '', $s);
    return strtolower(rtrim($s, '/. '));
}

/** Testo visibile da un frammento HTML: via script/style, tag, entità, spazi. */
function audit_html_to_text($html)
{
    $html = preg_replace('#<(script|style)\b[^>]*>.*?</\1>#is', ' ', (string) $html);
    $html = preg_replace('#<[^>]+>#', ' ', $html);
    $html = html_entity_decode($html, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $html = preg_replace('/\s+/u', ' ', $html);
    return trim($html);
}

/** Normalizza una frase per confronto/consenso: minuscolo, spazi collassati. */
function audit_norm_sentence($s)
{
    $s = audit_html_to_text($s);
    $s = mb_strtolower($s, 'UTF-8');
    $s = preg_replace('/\s+/u', ' ', $s);
    return trim($s);
}

/** Toglie la forma societaria (s.r.l., s.p.a., srls, ...) per confronto fuzzy nomi. */
function audit_strip_company_suffix($name)
{
    $n = mb_strtolower(trim((string) $name), 'UTF-8');
    $n = preg_replace('/\b(s\.?\s*r\.?\s*l\.?\s*s\.?|s\.?\s*r\.?\s*l\.?|s\.?\s*p\.?\s*a\.?|s\.?\s*a\.?\s*s\.?|s\.?\s*n\.?\s*c\.?|srls|srl|spa|sas|snc)\b/u', '', $n);
    $n = preg_replace('/[^\p{L}\p{N}]+/u', ' ', $n);
    return trim(preg_replace('/\s+/u', ' ', $n));
}

/** Confronto "morbido" fra due nomi azienda/brand (ignora suffisso e maiuscole). */
function audit_names_match($a, $b)
{
    $a = audit_strip_company_suffix($a);
    $b = audit_strip_company_suffix($b);
    if ($a === '' || $b === '') {
        return false;
    }
    return $a === $b || strpos($a, $b) !== false || strpos($b, $a) !== false;
}

/* ============================== ESTRAZIONE ============================== */

/** Tutte le partite IVA "candidate" (11 cifre isolate) presenti nel testo. */
function audit_extract_pive($text)
{
    preg_match_all('/(?<!\d)\d{11}(?!\d)/', (string) $text, $m);
    return array_values(array_unique($m[0]));
}

/**
 * Partite IVA ETICHETTATE: 11 cifre precedute (entro pochi caratteri) da
 * un'etichetta P.IVA / Partita IVA / C.F. / Codice Fiscale. Evita i falsi
 * positivi dei numeri di 11 cifre che NON sono P.IVA (telefoni, ID, ecc.).
 */
function audit_extract_labeled_piva($text)
{
    preg_match_all(
        '/(?:partita\s*iva|p\.?\s?iva|cod(?:ice)?\.?\s*fisc\w*|c\.?\s?f\.?)\D{0,25}?(\d{11})(?!\d)/iu',
        (string) $text,
        $m
    );
    return array_values(array_unique($m[1]));
}

/** Tutte le email presenti (anche dentro mailto:). */
function audit_extract_emails($text)
{
    preg_match_all('/[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}/', (string) $text, $m);
    $out = array_map('strtolower', $m[0]);
    return array_values(array_unique($out));
}

/** Codici REA nel formato XX-NNNNNN (o "XX NNNNNN", "REA XX 123456"). */
function audit_extract_rea($text)
{
    preg_match_all('/\bREA[\s:]*([A-Za-z]{2})[\s\-]?(\d{5,7})\b/u', (string) $text, $m, PREG_SET_ORDER);
    $out = [];
    foreach ($m as $hit) {
        $out[] = strtoupper($hit[1]) . '-' . $hit[2];
    }
    return array_values(array_unique($out));
}

/** Numeri di telefono "lunghi" (>=8 cifre) da href tel: e da testo. */
function audit_extract_phones($text)
{
    $text = (string) $text;
    $out = [];
    if (preg_match_all('/tel:([+0-9\s\-().]{8,})/i', $text, $m)) {
        foreach ($m[1] as $t) {
            $out[] = preg_replace('/\D+/', '', $t);
        }
    }
    return array_values(array_filter(array_unique($out), fn($p) => strlen($p) >= 8));
}

/** Capitale sociale (valore numerico testuale dopo l'etichetta). */
function audit_extract_capitale($text)
{
    preg_match_all('/capitale sociale[^0-9]{0,12}([0-9][0-9.\s]*(?:,[0-9]{2})?)/iu', (string) $text, $m);
    $out = [];
    foreach ($m[1] as $v) {
        $out[] = trim($v);
    }
    return array_values(array_unique($out));
}

/** Valori href/src "grezzi" presenti nel file (link e asset). */
function audit_extract_refs($html)
{
    preg_match_all('/(?:href|src)\s*=\s*"([^"]*)"/i', (string) $html, $m);
    return $m[1];
}

/* ============================== VALIDATORI ============================== */

/** Check digit della Partita IVA italiana (11 cifre, algoritmo di Luhn pari). */
function audit_piva_valid($p)
{
    $p = (string) $p;
    if (!preg_match('/^\d{11}$/', $p)) {
        return false;
    }
    $sum = 0;
    for ($i = 0; $i < 10; $i++) {
        $n = (int) $p[$i];
        if ($i % 2 === 0) {          // posizione dispari (1-indexed)
            $sum += $n;
        } else {                     // posizione pari: raddoppia, -9 se >9
            $d = $n * 2;
            $sum += $d > 9 ? $d - 9 : $d;
        }
    }
    $check = (10 - ($sum % 10)) % 10;
    return $check === (int) $p[10];
}

/** Email sintatticamente valida. */
function audit_email_valid($e)
{
    return (bool) filter_var(trim((string) $e), FILTER_VALIDATE_EMAIL);
}

/* ========================= CONSENSO FRA LE COPIE ========================= */

/**
 * Dato un insieme di stringhe (con conteggio per stringa), trova per una stringa
 * "rara" la variante più frequente entro una piccola distanza di edit: è il
 * sintomo tipico di un refuso/regressione introdotto su pochi siti.
 *
 * @param string $needle    stringa da valutare
 * @param array  $freq      mappa stringa => conteggio occorrenze (tutte le copie)
 * @param int    $maxDist   distanza di edit massima per considerarle "la stessa"
 * @param int    $minRatio  quante volte più frequente deve essere la variante
 * @return array|null       ['variant'=>..., 'count'=>..., 'mine'=>..., 'dist'=>...]
 */
function audit_consensus_outlier($needle, array $freq, $maxDist = 6, $minRatio = 3)
{
    $mine = $freq[$needle] ?? 0;
    $best = null;
    foreach ($freq as $cand => $count) {
        if ($cand === $needle) {
            continue;
        }
        // levenshtein() lavora su byte: ok per il confronto relativo.
        $dist = levenshtein(
            mb_substr($needle, 0, 255, 'UTF-8'),
            mb_substr($cand, 0, 255, 'UTF-8')
        );
        if ($dist > 0 && $dist <= $maxDist && $count >= $mine * $minRatio && $count >= 3) {
            if ($best === null || $count > $best['count']) {
                $best = ['variant' => $cand, 'count' => $count, 'mine' => $mine, 'dist' => $dist];
            }
        }
    }
    return $best;
}
