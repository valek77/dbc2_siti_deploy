<?php
/**
 * _shared/audit/Report.php — output dei findings: console, JSON, HTML.
 */
class Report
{
    private $findings;
    private $sites;
    private $meta;

    public function __construct(array $findings, array $sites, array $meta)
    {
        $this->findings = $findings;
        $this->sites = $sites;
        $this->meta = $meta;
    }

    private static function sevRank($s)
    {
        return ['ERROR' => 0, 'WARN' => 1, 'INFO' => 2][$s] ?? 3;
    }

    /** Normalizza un livello accettando abbreviazioni: ERR/E, WARN/W, INFO/I. */
    public static function normSev($s)
    {
        $map = [
            'E' => 'ERROR', 'ERR' => 'ERROR', 'ERROR' => 'ERROR',
            'W' => 'WARN', 'WARN' => 'WARN', 'WARNING' => 'WARN',
            'I' => 'INFO', 'INFO' => 'INFO',
        ];
        return $map[strtoupper(trim((string) $s))] ?? 'INFO';
    }

    public function counts()
    {
        $c = ['ERROR' => 0, 'WARN' => 0, 'INFO' => 0];
        foreach ($this->findings as $f) {
            $c[$f['sev']]++;
        }
        return $c;
    }

    public function console($useColor = true, $min = 'INFO')
    {
        $col = function ($txt, $code) use ($useColor) {
            return $useColor ? "\033[{$code}m{$txt}\033[0m" : $txt;
        };
        $sevCol = ['ERROR' => '1;31', 'WARN' => '1;33', 'INFO' => '0;36'];
        $minRank = self::sevRank(self::normSev($min));

        // Raggruppa per sito (filtrando per severità minima di visualizzazione)
        $bySite = [];
        foreach ($this->findings as $f) {
            if (self::sevRank($f['sev']) <= $minRank) {
                $bySite[$f['site']][] = $f;
            }
        }
        ksort($bySite);

        $out = "\n" . $col('═══ AUDIT SITI DBC2 ═══', '1;37') . "\n";
        $out .= "Siti analizzati: {$this->meta['sites']}  |  Fonte canonico: {$this->meta['canon_source']}\n";
        if (!empty($this->meta['notes'])) {
            foreach ($this->meta['notes'] as $n) {
                $out .= $col("  ! $n", '0;33') . "\n";
            }
        }
        $out .= "\n";

        foreach ($bySite as $site => $items) {
            usort($items, fn($a, $b) => self::sevRank($a['sev']) <=> self::sevRank($b['sev']));
            $worst = $items[0]['sev'];
            $out .= $col("● $site", $sevCol[$worst]) . "\n";
            foreach ($items as $f) {
                $tag = $col(str_pad($f['sev'], 5), $sevCol[$f['sev']]);
                $loc = $f['file'] ? " ({$f['file']})" : '';
                $out .= "    $tag [{$f['cat']}/{$f['code']}] {$f['msg']}$loc\n";
            }
            $out .= "\n";
        }

        $c = $this->counts();
        $out .= $col("─── Totale ───", '1;37') . "\n";
        $out .= "  " . $col("{$c['ERROR']} ERROR", '1;31') . "   "
            . $col("{$c['WARN']} WARN", '1;33') . "   "
            . $col("{$c['INFO']} INFO", '0;36') . "\n";
        return $out;
    }

    public function json()
    {
        return json_encode([
            'meta' => $this->meta,
            'counts' => $this->counts(),
            'findings' => $this->findings,
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function html()
    {
        $c = $this->counts();
        $bySite = [];
        foreach ($this->findings as $f) {
            $bySite[$f['site']][] = $f;
        }
        ksort($bySite);
        $e = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
        $badge = [
            'ERROR' => '#dc2626', 'WARN' => '#d97706', 'INFO' => '#0891b2',
        ];
        $h = '<!doctype html><html lang="it"><head><meta charset="utf-8">'
            . '<meta name="viewport" content="width=device-width,initial-scale=1">'
            . '<title>Audit siti DBC2</title><style>'
            . 'body{font:14px/1.5 system-ui,sans-serif;margin:0;background:#f8fafc;color:#0f172a}'
            . 'header{background:#0f172a;color:#fff;padding:20px 28px}'
            . 'h1{margin:0;font-size:19px}.sub{opacity:.8;font-size:13px;margin-top:4px}'
            . '.wrap{padding:20px 28px;max-width:1100px}'
            . '.site{background:#fff;border:1px solid #e2e8f0;border-radius:10px;margin:14px 0;overflow:hidden}'
            . '.site>h2{margin:0;font-size:15px;padding:12px 16px;background:#f1f5f9;border-bottom:1px solid #e2e8f0}'
            . '.f{display:flex;gap:10px;padding:8px 16px;border-bottom:1px solid #f1f5f9;align-items:baseline}'
            . '.f:last-child{border-bottom:0}'
            . '.b{color:#fff;border-radius:4px;font-size:11px;font-weight:700;padding:2px 7px;flex-shrink:0}'
            . '.cat{color:#64748b;font-size:12px;flex-shrink:0}.loc{color:#94a3b8;font-size:12px}'
            . '.flts{margin-top:10px;display:flex;gap:8px;flex-wrap:wrap}'
            . '.flt{cursor:pointer;border:0;border-radius:999px;padding:5px 13px;font:inherit;font-weight:700;'
            . 'font-size:13px;background:#1e293b;color:#cbd5e1}'
            . '.flt.on{outline:2px solid #fff}'
            . '</style></head><body>';
        $h .= '<header><h1>Audit siti DBC2</h1><div class="sub">Siti: '
            . $e($this->meta['sites']) . ' &middot; Canonico: ' . $e($this->meta['canon_source'])
            . ' &middot; ' . $e($this->meta['generated_at'] ?? '') . '</div>'
            . '<div class="flts">'
            . '<button class="flt on" data-sev="ALL" onclick="flt(\'ALL\')">Tutti (' . ($c['ERROR'] + $c['WARN'] + $c['INFO']) . ')</button>'
            . '<button class="flt" data-sev="ERROR" onclick="flt(\'ERROR\')" style="background:#dc2626;color:#fff">ERROR ' . $c['ERROR'] . '</button>'
            . '<button class="flt" data-sev="WARN" onclick="flt(\'WARN\')" style="background:#d97706;color:#fff">WARN ' . $c['WARN'] . '</button>'
            . '<button class="flt" data-sev="INFO" onclick="flt(\'INFO\')" style="background:#0891b2;color:#fff">INFO ' . $c['INFO'] . '</button>'
            . '</div></header><div class="wrap">';
        foreach ($bySite as $site => $items) {
            usort($items, fn($a, $b) => self::sevRank($a['sev']) <=> self::sevRank($b['sev']));
            $h .= '<div class="site"><h2>' . $e($site) . '</h2>';
            foreach ($items as $f) {
                $h .= '<div class="f" data-sev="' . $f['sev'] . '"><span class="b" style="background:' . $badge[$f['sev']] . '">' . $f['sev'] . '</span>'
                    . '<span class="cat">' . $e($f['cat'] . '/' . $f['code']) . '</span>'
                    . '<span>' . $e($f['msg']) . ' <span class="loc">' . ($f['file'] ? $e($f['file']) : '') . '</span></span></div>';
            }
            $h .= '</div>';
        }
        $h .= '</div><script>'
            . 'function flt(s){'
            . 'document.querySelectorAll(".flt").forEach(b=>b.classList.toggle("on",b.dataset.sev===s));'
            . 'document.querySelectorAll(".site").forEach(site=>{let any=false;'
            . 'site.querySelectorAll(".f").forEach(f=>{var show=s==="ALL"||f.dataset.sev===s;'
            . 'f.style.display=show?"":"none";if(show)any=true;});'
            . 'site.style.display=any?"":"none";});}'
            . '</script></body></html>';
        return $h;
    }
}
