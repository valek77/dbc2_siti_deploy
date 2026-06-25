<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Le offerte ECOSmart luce e gas per clienti domestici e altri usi: indicizzate a PUN e PSV Day Ahead, condizioni tecnico economiche trasparenti.';
$pageHead = <<<'CSS'
<style>
  .cte-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 32px; max-width: 1000px; margin: 0 auto; }
  @media (max-width: 860px) { .cte-grid { grid-template-columns: 1fr; } }
  .cte-details { margin-top: 18px; border-top: 1px solid var(--line, #e2e8f0); padding-top: 14px; }
  .cte-details summary { cursor: pointer; font-weight: 700; font-size: 13.5px; color: var(--primary, #0d9488); list-style: none; }
  .cte-details summary::-webkit-details-marker { display: none; }
  .cte-details summary::before { content: '\25B8\00A0'; }
  .cte-details[open] summary::before { content: '\25BE\00A0'; }
  .cte-body { margin-top: 14px; font-size: 12px; line-height: 1.6; color: var(--muted, #64748b); }
  .cte-body h5 { font-size: 12.5px; color: var(--ink, #0f172a); margin: 16px 0 6px; text-transform: uppercase; letter-spacing: .03em; }
  .cte-body p { margin: 0 0 10px; }
  .cte-rate-table { width: 100%; border-collapse: collapse; margin: 6px 0 12px; }
  .cte-rate-table th, .cte-rate-table td { border: 1px solid var(--line, #e2e8f0); padding: 6px 8px; text-align: left; font-size: 12px; }
  .cte-rate-table th { background: var(--bg-soft, #f5f5f4); width: 60%; font-weight: 600; }
  .offer-code { font-size: 11px; font-weight: 700; letter-spacing: .04em; color: var(--muted, #64748b); text-transform: uppercase; }
</style>
CSS;
include __DIR__ . '/header.php';
?>

  <!-- Page hero -->
  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Piani Tariffari 100% Sostenibili</span>
      <h1>La tariffa ottimale, <span class="accent">senza sorprese</span></h1>
      <p>Piani chiari per utenze domestiche e professionali. Tutte le tariffe sono garantite grazie alla nostra solida partnership energetica per offrirti la massima trasparenza contrattuale.</p>

<?php if ($OPERATORE['nome_marketing'] !== '') { ?>
      <div style="margin-top: 32px; display: inline-flex; align-items: center; gap: 16px; background: rgba(255,255,255,0.1); padding: 12px 24px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.2);">
        <span style="font-size: 15px; font-weight: 600; color: #fff;"><?= $LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : $COMPANY['company_name'] ?> è partner ufficiale di</span>
        <span style="font-size: 17px; font-weight: 800; color: #fff; letter-spacing: 0.5px; text-transform: uppercase;"><?= $OPERATORE['nome_marketing'] ?></span>
      </div>
<?php } ?>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

<?php
// Operatore energetico (fornitore): nome legale per i testi legali delle CTE.
$op = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale']
    : ($OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : 'Nexicom S.p.A.');

// --- Condizioni Tecnico Economiche (CTE) per offerta ----------------------

// Blocco percentuali a copertura dei costi di gestione (offerte "altri usi").
function cte_percentuali($op)
{
    return <<<HTML
<p><strong>Corrispettivi a copertura dei costi di gestione.</strong> {$op} fatturer&agrave; al Cliente un corrispettivo pari al 3,49% del totale imponibile a copertura dei costi sostenuti per le attivit&agrave; connesse alla gestione commerciale, amministrativa e operativa del cliente nell'ambito del rapporto di fornitura, non inclusi nelle componenti relative all'energia, agli oneri di sistema e ai costi commerciali di vendita (tali importi sono applicati in misura proporzionale al valore della fornitura in quanto correlati ai volumi gestiti). Tale corrispettivo &egrave; cos&igrave; articolato:</p>
<table class="cte-rate-table">
<tr><th>Costi della struttura di gestione commerciale interna e del rapporto con il cliente (escluse le attivit&agrave; di vendita)</th><td>1,39% del totale imponibile (IVA esclusa)</td></tr>
<tr><th>Costi amministrativi, di fatturazione e di gestione contrattuale</th><td>1,19% del totale imponibile (IVA esclusa)</td></tr>
<tr><th>Costi relativi ai sistemi informativi, alle piattaforme digitali e agli strumenti di gestione e archiviazione documentale</th><td>0,91% del totale imponibile (IVA esclusa)</td></tr>
</table>
HTML;
}

// ECOSmart Power — energia elettrica, "altri usi" (non domestico), mono oraria.
function cte_ecosmart_power($op)
{
    $perc = cte_percentuali($op);
    return <<<HTML
<p>La presente offerta per la fornitura di energia elettrica &egrave; rivolta a tutti i Clienti finali titolari di POD "altri usi" individuati dall'art. 2.3 lettera d del T.I.V., alimentati in bassa tensione, forniti da contatore elettronico leggibile a distanza dotato di misuratore orario (in grado di misurare separatamente l'energia consumata nelle diverse fasce orarie). Le tariffe sono articolate su base mono oraria, che non differenzia il prezzo dell'energia nell'arco della giornata. Verranno applicati i valori del PUN (Prezzo Unico Nazionale) con riferimento al mese di fornitura ed espressi in &euro;/kWh, aumentati dello spread indicato in tabella.</p>
<h5>Voci di spesa per la vendita di energia elettrica</h5>
<table class="cte-rate-table">
<tr><th>F0 &middot; Corrispettivo per il consumo</th><td>PUN + 0,065 &euro;/kWh</td></tr>
<tr><th>Corrispettivo annuo</th><td>744,00 &euro;/POD/anno</td></tr>
</table>
<p><strong>Caratteristiche.</strong> Il PUN medio fascia (Prezzo Unico Nazionale) &egrave; il prezzo di riferimento dell'energia elettrica rilevato sulla borsa elettrica italiana (IPEX, Italian Power Exchange). Il valore &egrave; pubblicato mensilmente dal Gestore dei Mercati Energetici italiani (GME, mercatoelettrico.org). Periodicit&agrave; di aggiornamento: mensile. Il valore massimo raggiunto dall'indice negli ultimi 12 mesi &egrave; pari a 0,14593 &euro;/kWh.</p>
{$perc}
<p>I prezzi sopra esposti sono al netto di IVA e imposte. Ai corrispettivi si aggiungono gli oneri e i corrispettivi previsti dall'Autorit&agrave; (ARERA), automaticamente recepiti in bolletta. Eventuali variazioni dei corrispettivi definiti da {$op} saranno oggetto di comunicazione di variazione unilaterale secondo quanto disciplinato da ARERA nel Codice di Condotta Commerciale.</p>
HTML;
}

// ECOSmart Home Power — energia elettrica, clienti domestici, tre fasce.
function cte_ecosmart_home_power($op)
{
    return <<<HTML
<p>La presente offerta per la fornitura di energia elettrica &egrave; rivolta a tutti i Clienti domestici ad usi civili individuati dall'art. 2.3 lettera a del T.I.V., alimentati in bassa tensione, forniti da contatore elettronico leggibile a distanza dotato di misuratore orario (in grado di misurare separatamente l'energia consumata nelle diverse fasce orarie). Le tariffe sono articolate su tre fasce, secondo la del. 181/06 e s.m.i. (F1, F2, F3), e differenziano il prezzo dell'energia elettrica a seconda del momento del consumo. Verranno applicati i valori per fascia oraria del PUN con riferimento al mese di fornitura ed espressi in &euro;/kWh, aumentati dello spread indicato in tabella.</p>
<h5>Voci di spesa per la vendita di energia elettrica</h5>
<table class="cte-rate-table">
<tr><th>F1 &middot; Corrispettivo per il consumo</th><td>PUN + 0,0684 &euro;/kWh</td></tr>
<tr><th>F2 &middot; Corrispettivo per il consumo</th><td>PUN + 0,0651 &euro;/kWh</td></tr>
<tr><th>F3 &middot; Corrispettivo per il consumo</th><td>PUN + 0,063 &euro;/kWh</td></tr>
<tr><th>Corrispettivo annuo</th><td>744,00 &euro;/POD/anno</td></tr>
</table>
<p><strong>Caratteristiche.</strong> Il PUN medio fascia (Prezzo Unico Nazionale) &egrave; il prezzo di riferimento dell'energia elettrica rilevato sulla borsa elettrica italiana (IPEX, Italian Power Exchange). Il valore &egrave; pubblicato mensilmente dal Gestore dei Mercati Energetici italiani (GME, mercatoelettrico.org). Periodicit&agrave; di aggiornamento: mensile. Il valore massimo raggiunto dall'indice negli ultimi 12 mesi &egrave; pari a 0,14593 &euro;/kWh.</p>
<p><strong>Fasce orarie.</strong> F1 = da luned&igrave; a venerd&igrave; dalle ore 8 alle ore 19; F2 = da luned&igrave; a venerd&igrave; dalle ore 7 alle ore 8 e dalle ore 19 alle ore 23, il sabato dalle ore 7 alle ore 23; F3 = da luned&igrave; a sabato dalle ore 23 alle ore 7, domenica e festivi tutte le ore della giornata. Per "perdite" si intende il coefficiente che esprime le perdite di energia elettrica sulle reti ai sensi della delibera ARERA 5/04 e s.m.i.</p>
<p>I prezzi sopra esposti sono al netto di IVA e imposte. Ai corrispettivi si aggiungono gli oneri e i corrispettivi previsti dall'Autorit&agrave; (ARERA), automaticamente recepiti in bolletta. Eventuali variazioni dei corrispettivi definiti da {$op} saranno oggetto di comunicazione di variazione unilaterale secondo quanto disciplinato da ARERA nel Codice di Condotta Commerciale.</p>
HTML;
}

// ECOSmart Home Gas — gas naturale, clienti domestici.
function cte_ecosmart_home_gas($op)
{
    return <<<HTML
<p>L'offerta &egrave; dedicata a tutti i Clienti allacciati a punti di riconsegna di gas naturale ad uso "domestico", individuati all'art. 2.3 lettera a del T.I.V.G. Per la somministrazione di gas naturale sono fatturati al Cliente i corrispettivi relativi alla Spesa per la Vendita del Gas Naturale, alla Spesa per l'Uso della Rete e alla Spesa per Oneri Generali di Sistema.</p>
<h5>Voci di spesa per la vendita del gas naturale</h5>
<table class="cte-rate-table">
<tr><th>Corrispettivo per il consumo</th><td>PSV DA + 0,30 &euro;/Smc</td></tr>
<tr><th>Corrispettivo annuo</th><td>744,00 &euro;/PDR/anno</td></tr>
</table>
<p><strong>Caratteristiche.</strong> L'elemento "PSV DA" ("Heren PSV Day Ahead Price") &egrave; pari alla media, durante il mese di somministrazione, della quotazione "Heren Price", espressa in &euro;/MWh. Per ogni giorno di somministrazione la quotazione "Heren Price" &egrave; la media dei prezzi "bid" e "offer" pubblicati da ICIS Heren nel report ESGM ("European Spot Gas Markets"), sezione "PSV Price Assessment", dell'ultimo giorno lavorativo precedente secondo il calendario inglese ("Day Ahead" nei giorni lavorativi, "Weekend" nei giorni non lavorativi). Periodicit&agrave; di aggiornamento: mensile. Il valore massimo raggiunto dall'indice negli ultimi 12 mesi &egrave; di 0,45542 &euro;/Smc.</p>
<p>Il corrispettivo per il consumo &egrave; riferito a un gas avente, alle condizioni standard, un potere calorifico superiore (PCS) pari a 0,03852 GJ/Smc, e sar&agrave; adeguato al PCS convenzionale "P" relativo all'impianto di distribuzione cui &egrave; connesso il punto di riconsegna, secondo le disposizioni del TIVG. Per ciascun PdR dotato di gruppo di misura non provvisto di apparecchiature per la correzione dei volumi alle condizioni standard, la correzione a fini tariffari avverr&agrave; mediante il coefficiente di conversione "C", calcolato secondo l'Allegato A (RTDG) alla delibera ARERA ARG/gas 159/08 e s.m.i.</p>
<p>I prezzi sopra esposti sono al netto di IVA e imposte. Ai corrispettivi si aggiungono gli oneri e i corrispettivi previsti dall'Autorit&agrave; (ARERA), automaticamente recepiti in bolletta. Eventuali variazioni dei corrispettivi definiti da {$op} saranno oggetto di comunicazione di variazione unilaterale secondo quanto disciplinato da ARERA nel Codice di Condotta Commerciale.</p>
HTML;
}

// ECOSmart Gas — gas naturale, "altri usi" (non domestico), consumi < 200.000 Smc/anno.
function cte_ecosmart_gas($op)
{
    $perc = cte_percentuali($op);
    return <<<HTML
<p>Offerta valida dal 01/04/2026, dedicata a tutti i Clienti allacciati a punti di riconsegna di gas naturale per "altri usi", individuati all'art. 2.3 lettera d del T.I.V.G., con consumi complessivi inferiori a 200.000 Smc/anno. Per la somministrazione di gas naturale sono fatturati al Cliente i corrispettivi relativi alla Spesa per la Vendita del Gas Naturale, alla Spesa per l'Uso della Rete e alla Spesa per Oneri Generali di Sistema.</p>
<h5>Voci di spesa per la vendita del gas naturale</h5>
<table class="cte-rate-table">
<tr><th>Corrispettivo per il consumo</th><td>PSV DA + 0,30 &euro;/Smc</td></tr>
<tr><th>Corrispettivo annuo</th><td>744,00 &euro;/PDR/anno</td></tr>
</table>
<p><strong>Caratteristiche.</strong> L'elemento "PSV DA" ("Heren PSV Day Ahead Price") &egrave; pari alla media, durante il mese di somministrazione, della quotazione "Heren Price", espressa in &euro;/MWh. Per ogni giorno di somministrazione la quotazione "Heren Price" &egrave; la media dei prezzi "bid" e "offer" pubblicati da ICIS Heren nel report ESGM ("European Spot Gas Markets"), sezione "PSV Price Assessment", dell'ultimo giorno lavorativo precedente secondo il calendario inglese ("Day Ahead" nei giorni lavorativi, "Weekend" nei giorni non lavorativi). Periodicit&agrave; di aggiornamento: mensile. Il valore massimo raggiunto dall'indice negli ultimi 12 mesi &egrave; di 0,45542 &euro;/Smc.</p>
{$perc}
<p>Il corrispettivo per il consumo &egrave; riferito a un gas avente, alle condizioni standard, un potere calorifico superiore (PCS) pari a 0,03852 GJ/Smc, e sar&agrave; adeguato al PCS convenzionale "P" relativo all'impianto di distribuzione cui &egrave; connesso il punto di riconsegna, secondo le disposizioni del TIVG. Per ciascun PdR dotato di gruppo di misura non provvisto di apparecchiature per la correzione dei volumi alle condizioni standard, la correzione a fini tariffari avverr&agrave; mediante il coefficiente di conversione "C", calcolato secondo l'Allegato A (RTDG) alla delibera ARERA ARG/gas 159/08 e s.m.i.</p>
<p>I prezzi sopra esposti sono al netto di IVA e imposte. Eventuali variazioni dei corrispettivi definiti da {$op} saranno oggetto di comunicazione di variazione unilaterale secondo quanto disciplinato da ARERA nel Codice di Condotta Commerciale.</p>
HTML;
}

// Griglia 2x2: riga 1 = energia elettrica (domestico | altri usi), riga 2 = gas (domestico | altri usi).
$offerte = [
    ['kind' => 'luce', 'tipo' => 'Luce', 'segmento' => 'Domestico',  'nome' => 'ECOSmart Home Power', 'codice' => 'ECOSMART_HOME_POWER', 'prezzo' => 'PUN + 0,063 &divide; 0,0684', 'unita' => '&euro;/kWh', 'annuo' => '744,00 €/POD/anno', 'indice' => 'Tre fasce F1/F2/F3 indicizzate al PUN, aggiornate mensilmente', 'cte' => 'cte_ecosmart_home_power'],
    ['kind' => 'luce', 'tipo' => 'Luce', 'segmento' => 'Altri usi',  'nome' => 'ECOSmart Power',      'codice' => 'ECOSMART_POWER',      'prezzo' => 'PUN + 0,065',             'unita' => '&euro;/kWh', 'annuo' => '744,00 €/POD/anno', 'indice' => 'Monoraria indicizzata al PUN (F0), aggiornata mensilmente',  'cte' => 'cte_ecosmart_power'],
    ['kind' => 'gas',  'tipo' => 'Gas',  'segmento' => 'Domestico',  'nome' => 'ECOSmart Home Gas',   'codice' => 'ECOSMART_HOME_GAS',   'prezzo' => 'PSV DA + 0,30',           'unita' => '&euro;/Smc', 'annuo' => '744,00 €/PDR/anno', 'indice' => 'Indicizzato al PSV Day Ahead (ICIS Heren), aggiornato mensilmente', 'cte' => 'cte_ecosmart_home_gas'],
    ['kind' => 'gas',  'tipo' => 'Gas',  'segmento' => 'Altri usi',  'nome' => 'ECOSmart Gas',        'codice' => 'ECOSMART_GAS',        'prezzo' => 'PSV DA + 0,30',           'unita' => '&euro;/Smc', 'annuo' => '744,00 €/PDR/anno', 'indice' => 'Indicizzato al PSV Day Ahead (ICIS Heren), aggiornato mensilmente', 'cte' => 'cte_ecosmart_gas'],
];

$ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$ICON_BOLT  = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
$ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
$ICON_LOCK  = '<svg viewBox="0 0 24 24" fill="none"><rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
?>
  <main class="section" style="padding: 80px 0 40px;">
    <div class="container">

      <div class="cte-grid">
<?php foreach ($offerte as $o):
          $isGas = $o['kind'] === 'gas';
          $cte = $o['cte']($op);
          $indice = $o['indice'];
          $href = 'contatti.php?offerta=' . rawurlencode($o['codice']) . '#contatto-form';
?>
        <article class="offer-card"<?= $isGas ? ' style="--ribbon-color:#d97706; --ribbon-bg:#fef3c7; --ribbon-text:#b45309; --ribbon-border:#fde68a;"' : '' ?>>
          <div class="offer-ribbon">
            <span class="pill <?= $isGas ? 'warm' : '' ?>"><?= $isGas ? $ICON_FLAME : $ICON_BOLT ?><span><?= $o['tipo'] ?> · <?= $o['segmento'] ?></span></span>
            <span class="lock"><?= $ICON_LOCK ?> Spread bloccato 12 mesi</span>
          </div>
          <div class="offer-card-body">
            <h3 class="offer-name"><?= $o['nome'] ?></h3>
            <p class="offer-type"><span class="offer-code"><?= $o['codice'] ?></span> · <?= $o['segmento'] === 'Domestico' ? 'Cliente domestico' : 'Altri usi (non domestico)' ?> · Mercato Libero</p>

            <div class="price-block">
              <div class="price-label">Corrispettivo per il consumo</div>
              <div class="price-main"><?= $o['prezzo'] ?><span style="font-size:14px; color:var(--muted); margin-left:4px; font-weight:600;"><?= $o['unita'] ?></span></div>
              <div class="price-locked"><?= $ICON_CHECK ?> Spread fisso per i primi 12 mesi</div>
            </div>

            <ul class="offer-features">
              <li><?= $ICON_CHECK ?><span>Corrispettivo annuo: <?= htmlspecialchars($o['annuo'], ENT_QUOTES, 'UTF-8') ?></span></li>
              <li><?= $ICON_CHECK ?><span><?= $indice ?></span></li>
              <li><?= $ICON_CHECK ?><span>Pagamento: addebito SDD, bonifico o bollettino</span></li>
            </ul>

            <a class="btn-primary" href="<?= $href ?>">Richiedi attivazione
              <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>

            <details class="cte-details">
              <summary>Condizioni Tecnico Economiche (CTE)</summary>
              <div class="cte-body"><?= $cte ?></div>
            </details>
          </div>
        </article>
<?php endforeach; ?>
      </div>

      <p style="font-size: 13.5px; color: var(--muted); text-align: center; max-width: 900px; margin: 48px auto 0; line-height: 1.7;">
        Offerte sul Mercato Libero di <?= $op ?>, riservate a clienti domestici e ad altri usi (non domestico). I prezzi indicati sono al netto di IVA e imposte; ai corrispettivi si aggiungono gli oneri e i corrispettivi previsti dall'Autorità (ARERA). Per il dettaglio completo consulta le CTE di ciascuna offerta.
      </p>
    </div>
  </main>

  <!-- Glossary -->
  <section class="section glossary">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Educazione Energetica</span>
        <h2 class="section-title">Comprendere la <span class="underline">tua spesa</span></h2>
        <p class="section-sub">Crediamo che la trasparenza sia alla base del risparmio. Ecco un riassunto dei termini per comprendere come viene strutturata la tua fattura mensile.</p>
      </div>

      <div class="glossary-grid">
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>Prezzo PUN (Luce)</h4>
          <p>Il Prezzo Unico Nazionale definisce il costo all'ingrosso dell'energia elettrica in Italia. Cambia mensilmente garantendoti le tariffe aggiornate dei mercati fisici.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>Prezzo PSV (Gas)</h4>
          <p>Il Punto di Scambio Virtuale rappresenta il prezzo all'ingrosso di riferimento del gas naturale per l'Italia, garantendo un aggancio diretto e leale alle dinamiche reali.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 14l4-4 4 4 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h4>Spread di Canale</h4>
          <p>La quota di gestione aggiunta al prezzo del mercato all'ingrosso. Nelle offerte PLACET, questa componente rimane bloccata a garanzia per 12 mesi.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><rect x="2" y="5" width="20" height="14" rx="2" stroke="currentColor" stroke-width="2"/><path d="M2 10h20" stroke="currentColor" stroke-width="2"/></svg></div>
          <h4>Domiciliazione (RID)</h4>
          <p>La domiciliazione bancaria garantisce una tariffazione agevolata grazie alla digitalizzazione dei flussi, eliminando depositi cauzionali e l'uso inutile di carta stampata.</p>
        </div>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
