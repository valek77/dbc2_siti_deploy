<?php
require __DIR__ . '/_config.php';
$operatoreNome = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale'];
$operatoreLogo = $OPERATORE['logo_url'] !== '' ? $OPERATORE['logo_url'] : $OPERATORE['logo2_url'];
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Le offerte luce e gas Nexicom per clienti domestici: indicizzate a PUN Index GME e PSV, spread bloccato 12 mesi, condizioni tecnico economiche trasparenti.';
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
<?php if ($operatoreLogo !== '') { ?>
        <img src="<?= e($operatoreLogo) ?>" alt="<?= e($operatoreNome) ?>" loading="lazy" style="height:34px; width:auto; max-width:180px; object-fit:contain;">
<?php } ?>
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

// --- Condizioni Tecnico Economiche (CTE) per tipo di fornitura ------------
function cte_gas($spread, $op)
{
    return <<<HTML
<p>Le presenti "Condizioni tecnico economiche di fornitura" (CTE) disciplinano, unitamente alle "Condizioni generali di fornitura" (CGF) e alla "Proposta Di Contratto" (PDC) sottoscritta dal Cliente finale e agli allegati in essa richiamati, le condizioni di fornitura del gas naturale presso il punto di riconsegna (PDR). Le presenti CTE sono riservate a Clienti finali titolari di PDR domestici che abbiano deciso di acquistare gas naturale alle condizioni proposte da {$op} sul Mercato Libero e che scelgano quale modalità di pagamento l'addebito su conto corrente (SDD), il bonifico o il bollettino. Le presenti CTE integrano le CGF e, in caso di contrasto, prevalgono su queste ultime.</p>
<h5>Vendita di gas naturale &mdash; primi 12 mesi</h5>
<table class="cte-rate-table">
<tr><th>Corrispettivo per il consumo</th><td>PSV + {$spread} &euro;/Smc</td></tr>
<tr><th>Corrispettivo annuo</th><td>648,00 &euro;/PDR/anno</td></tr>
</table>
<p><strong>Caratteristiche.</strong> Il PSV (PSV Day Ahead Heren Mid) corrisponde al prezzo del gas naturale all'ingrosso al PSV (Punto di Scambio Virtuale) ed &egrave; calcolato mensilmente come media dei prezzi Bid e Offer pubblicati sotto il titolo "PSV PRICE ASSESSMENT" nel report "ICIS Heren European Spot Gas Markets" del pi&ugrave; vicino giorno lavorativo secondo il calendario inglese. Periodicit&agrave; di aggiornamento: mensile. Ha raggiunto nel corso degli ultimi 12 (dodici) mesi un valore unitario massimo pari a 0,557699 &euro;/Smc; tale valore &egrave; stato applicato per il periodo marzo 2026.</p>
<h5>Corrispettivi previsti dal 13&deg; mese di fornitura</h5>
<table class="cte-rate-table">
<tr><th>Corrispettivo per il consumo</th><td>PSV + {$spread} &euro;/Smc</td></tr>
</table>
<p>Caratteristiche del PSV come sopra. Periodicit&agrave; di aggiornamento: mensile.</p>
<p>Le presenti condizioni economiche sono valide per 12 mesi a decorrere dalla data di attivazione della fornitura di gas naturale. In caso di switch (cambio fornitore) la data di attivazione della fornitura &egrave; pari alla data effettiva di switch, compatibilmente con le tempistiche previste per l'esercizio del diritto di recesso dal precedente contratto. Alla scadenza del periodo di validit&agrave;, le condizioni economiche si intenderanno automaticamente rinnovate per un ulteriore periodo di pari durata, applicando i corrispettivi e le condizioni economiche vigenti al momento del rinnovo, come riportati nella Tabella "Corrispettivi previsti dal 13&deg; mese" presente nelle Condizioni Tecnico Economiche. Resta salva la possibilit&agrave; per {$op} di comunicare, nel rispetto delle modalit&agrave; e delle tempistiche previste dalle CGF e nel rispetto di quanto disposto dalla regolazione ARERA, eventuali variazioni unilaterali del Contratto. I prezzi sopra esposti sono al netto di IVA e imposte.</p>
<p>I valori dei corrispettivi sopra indicati fanno riferimento al Potere Calorifico Superiore (PCS) pari a 0,03852 GJ/Smc. Tali valori saranno adeguati in funzione del valore del PCS convenzionale da utilizzare ai fini dell'emissione della bolletta per la localit&agrave; dove &egrave; ubicata la fornitura, come determinato da {$op} secondo le previsioni del TIVG. I volumi prelevati presso un PdR il cui gruppo di misura non sia dotato di apparecchiatura per la correzione delle misure alle condizioni standard, al fine di essere espressi in Standard Metri Cubi (Smc), verranno adeguati mediante l'applicazione del coefficiente correttivo "C", secondo le disposizioni della RTDG e del TIVG. Eventuali aggiornamenti delle componenti descritte, nonch&eacute; eventuali ulteriori componenti che dovessero essere valorizzate da ARERA in corso di fornitura, saranno automaticamente recepite in bolletta. Eventuali variazioni dei corrispettivi definiti da {$op} saranno oggetto di eventuale comunicazione di variazione unilaterale cos&igrave; come disciplinata da ARERA nel Codice di Condotta Commerciale e descritte nelle CGF.</p>
HTML;
}

function cte_luce($spread, $op)
{
    return <<<HTML
<p>Le presenti "Condizioni tecnico economiche di fornitura" (CTE) disciplinano, unitamente alle "Condizioni generali di fornitura" (CGF) e alla "Proposta Di Contratto" (PDC) sottoscritta dal Cliente finale e agli allegati in essa richiamati, le condizioni di fornitura dell'energia elettrica presso il punto di riconsegna (POD). Le presenti CTE sono riservate a Clienti finali titolari di POD domestici che abbiano deciso di acquistare energia elettrica alle condizioni proposte da {$op} sul Mercato Libero e che scelgano quale modalità di pagamento l'addebito su conto corrente (SDD), il bonifico o il bollettino. Le presenti CTE integrano le CGF e, in caso di contrasto, prevalgono su queste ultime.</p>
<h5>Vendita di energia elettrica &mdash; primi 12 mesi</h5>
<table class="cte-rate-table">
<tr><th>F1 &middot; Corrispettivo per il consumo</th><td>PUN Index GME + {$spread} &euro;/kWh</td></tr>
<tr><th>F2 &middot; Corrispettivo per il consumo</th><td>PUN Index GME + {$spread} &euro;/kWh</td></tr>
<tr><th>F3 &middot; Corrispettivo per il consumo</th><td>PUN Index GME + {$spread} &euro;/kWh</td></tr>
<tr><th>Corrispettivo annuo</th><td>456,00 &euro;/POD/anno</td></tr>
</table>
<p><strong>Caratteristiche.</strong> Il PUN Index GME &egrave; la media dei prezzi zonali ponderata per le quantit&agrave; acquistate in ciascuna zona di mercato. Transitoriamente, il suo valore tiene inoltre conto della componente perequativa applicata direttamente dal GME in esito al MGP. Il suo valore viene pubblicato e aggiornato all'interno del sito del GME (mercatoelettrico.org). Periodicit&agrave; di aggiornamento: mensile. Il PUN Index GME ha raggiunto nel corso degli ultimi 12 mesi il valore unitario massimo pari a 0,14339 (F0), 0,14315 (F1), 0,15375 (F2) e 0,13805 (F3) &euro;/kWh, con riferimento al mese di marzo 2026.</p>
<h5>Corrispettivi previsti dal 13&deg; mese di fornitura</h5>
<table class="cte-rate-table">
<tr><th>F1 / F2 / F3 &middot; Corrispettivo per il consumo</th><td>PUN Index GME + {$spread} &euro;/kWh</td></tr>
</table>
<p>Caratteristiche del PUN Index GME come sopra. Periodicit&agrave; di aggiornamento: mensile.</p>
<p>Le presenti condizioni economiche sono valide per 12 mesi a decorrere dalla data di attivazione della fornitura di energia elettrica. In caso di switch (cambio fornitore) la data di attivazione della fornitura &egrave; pari alla data effettiva di switch, compatibilmente con le tempistiche previste per l'esercizio del diritto di recesso dal precedente contratto. Alla scadenza del periodo di validit&agrave;, le condizioni economiche si intenderanno automaticamente rinnovate per un ulteriore periodo di pari durata, applicando i corrispettivi e le condizioni economiche vigenti al momento del rinnovo, come riportati nella Tabella "Corrispettivi previsti dal 13&deg; mese" presente nelle Condizioni Tecnico Economiche. Resta salva la possibilit&agrave; per {$op} di comunicare, nel rispetto delle modalit&agrave; e delle tempistiche previste dalle CGF e nel rispetto di quanto disposto dalla regolazione ARERA, eventuali variazioni unilaterali del Contratto.</p>
<p>Saranno inoltre applicate le seguenti componenti: Corrispettivo di dispacciamento (CDISPD) a copertura dei costi del servizio di dispacciamento e del mercato della capacit&agrave;, definito ed aggiornato mensilmente da ARERA ai sensi del comma 48.8 dell'Allegato A alla deliberazione 362/2023/R/eel e ss.mm.ii. (TIV); il valore deliberato per il maggio 2026 &egrave; pari a 0,019902 &euro;/kWh (comprensivo delle perdite di rete). I prezzi sopra esposti sono al lordo delle perdite di rete pari al 10,00% nel caso di forniture in bassa tensione, quale fattore di correzione per tenere conto delle perdite di rete di cui al TIS. Eventuali aggiornamenti delle componenti descritte, nonch&eacute; eventuali ulteriori componenti che dovessero essere valorizzate da ARERA in corso di fornitura, saranno automaticamente recepite in bolletta. Eventuali variazioni dei corrispettivi definiti da {$op} saranno oggetto di eventuale comunicazione di variazione unilaterale cos&igrave; come disciplinata da ARERA nel Codice di Condotta Commerciale e descritte dalle CGF. I prezzi sono al netto di IVA e imposte.</p>
HTML;
}

// Ordine: gas, luce, gas, luce -> riga 1 = offerte "386", riga 2 = offerte "CS 386".
$offerte = [
    ['kind' => 'gas',  'tipo' => 'Gas',  'nome' => 'Gas PSV Domestico 386',          'codice' => 'NX_GAS_PSV_DOM_386',   'prezzo' => 'PSV + 0,45',            'unita' => '&euro;/Smc', 'annuo' => '648,00 €/PDR/anno', 'spread' => '0,45'],
    ['kind' => 'luce', 'tipo' => 'Luce', 'nome' => 'Luce PUN Index GME Domestico 386', 'codice' => 'NEX_EE_PUN_DOM_386',   'prezzo' => 'PUN Index GME + 0,055', 'unita' => '&euro;/kWh', 'annuo' => '456,00 €/POD/anno', 'spread' => '0,055'],
    ['kind' => 'gas',  'tipo' => 'Gas',  'nome' => 'Gas PSV Domestico CS 386',       'codice' => 'NX_GAS_PSV_DOM_CS386', 'prezzo' => 'PSV + 0,42',            'unita' => '&euro;/Smc', 'annuo' => '648,00 €/PDR/anno', 'spread' => '0,42'],
    ['kind' => 'luce', 'tipo' => 'Luce', 'nome' => 'Luce PUN Index GME Domestico CS 386', 'codice' => 'NEX_EE_PUN_DOM_CS386', 'prezzo' => 'PUN Index GME + 0,05', 'unita' => '&euro;/kWh', 'annuo' => '456,00 €/POD/anno', 'spread' => '0,05'],
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
          $cte = $isGas ? cte_gas($o['spread'], $op) : cte_luce($o['spread'], $op);
          $indice = $isGas
              ? 'Indicizzato al PSV Day Ahead (ICIS Heren), aggiornato mensilmente'
              : 'Indicizzato al PUN Index GME, stesso spread su F1/F2/F3, aggiornato mensilmente';
          $href = 'contatti.php?offerta=' . rawurlencode($o['codice']) . '#contatto-form';
?>
        <article class="offer-card"<?= $isGas ? ' style="--ribbon-color:#d97706; --ribbon-bg:#fef3c7; --ribbon-text:#b45309; --ribbon-border:#fde68a;"' : '' ?>>
<?php if ($operatoreLogo !== '') { ?>
          <div style="display:flex; align-items:center; justify-content:center; min-height:72px; padding:16px 24px 12px; background:#fff;">
            <img src="<?= e($operatoreLogo) ?>" alt="<?= e($operatoreNome) ?>" loading="lazy" style="height:52px; width:auto; max-width:240px; object-fit:contain;">
          </div>
<?php } ?>
          <div class="offer-ribbon">
            <span class="pill <?= $isGas ? 'warm' : '' ?>"><?= $isGas ? $ICON_FLAME : $ICON_BOLT ?><span><?= $o['tipo'] ?> · Domestico</span></span>
            <span class="lock"><?= $ICON_LOCK ?> Spread bloccato 12 mesi</span>
          </div>
          <div class="offer-card-body">
            <h3 class="offer-name"><?= $o['nome'] ?></h3>
            <p class="offer-type"><span class="offer-code"><?= $o['codice'] ?></span> · Cliente domestico · Mercato Libero</p>

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
        Offerte riservate a clienti domestici sul Mercato Libero di <?= $op ?>. I prezzi indicati sono al netto di IVA e imposte; ai corrispettivi si aggiungono gli oneri e i corrispettivi previsti dall'Autorità (ARERA). Condizioni valide 12 mesi, con rinnovo automatico ai corrispettivi previsti dal 13° mese. Per il dettaglio completo consulta le CTE di ciascuna offerta.
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
