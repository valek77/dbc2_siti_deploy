<?php
require __DIR__ . '/_config.php';
$operatoreNome = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale'];
$operatoreLogo = $OPERATORE['logo_url'] !== '' ? $OPERATORE['logo_url'] : $OPERATORE['logo2_url'];
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Le offerte luce e gas di Semplice Gas & Luce per clienti domestici: indicizzate a PUN Index GME e PSV, spread bloccato 12 mesi, condizioni tecnico economiche trasparenti.';
$pageHead = <<<'CSS'
<style>
  .cte-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 32px; max-width: 1000px; margin: 0 auto; }
  @media (max-width: 860px) { .cte-grid { grid-template-columns: 1fr; } }
  .cte-details { margin-top: 18px; border-top: 1px solid var(--line, #e2e8f0); padding-top: 14px; }
  .cte-details summary { cursor: pointer; font-weight: 700; font-size: 13.5px; color: var(--primary, #1e40af); list-style: none; }
  .cte-details summary::-webkit-details-marker { display: none; }
  .cte-details summary::before { content: '\25B8\00A0'; }
  .cte-details[open] summary::before { content: '\25BE\00A0'; }
  .cte-body { margin-top: 14px; font-size: 12px; line-height: 1.6; color: var(--muted, #64748b); }
  .cte-body h5 { font-size: 12.5px; color: var(--ink, #0f172a); margin: 16px 0 6px; text-transform: uppercase; letter-spacing: .03em; }
  .cte-body p { margin: 0 0 10px; }
  .cte-rate-table { width: 100%; border-collapse: collapse; margin: 6px 0 12px; }
  .cte-rate-table th, .cte-rate-table td { border: 1px solid var(--line, #e2e8f0); padding: 6px 8px; text-align: left; font-size: 12px; }
  .cte-rate-table th { background: var(--bg-soft, #f5f5f4); width: 60%; font-weight: 600; }
</style>
CSS;
include __DIR__ . '/header.php';
?>

  <!-- Page hero -->
  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Piani Tariffari 100% Sostenibili</span>
      <h1>La tariffa ottimale, <span class="accent">senza sorprese</span></h1>
      <p>Piani chiari per utenze domestiche e professionali. Semplice Gas &amp; Luce propone tariffe trasparenti e condizioni contrattuali chiare.</p>
      
      <div style="margin-top: 32px; display: inline-flex; align-items: center; gap: 16px; background: rgba(255,255,255,0.1); padding: 12px 24px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.2);">
        <span class="operator-hero-label" style="font-size: 15px; font-weight: 600; color: #fff;">Operatore energetico<?php if ($operatoreLogo !== '') { ?><img src="<?= e($operatoreLogo) ?>" alt="<?= e($operatoreNome) ?> logo"><?php } ?></span>
      </div>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

<?php
// --- Condizioni Tecnico Economiche (CTE) per tipo di fornitura ------------
function cte_gas($spread)
{
    return <<<HTML
<p>Le presenti "Condizioni tecnico economiche di fornitura" (CTE) disciplinano, unitamente alle "Condizioni generali di fornitura" (CGF) e alla "Proposta Di Contratto" (PDC) sottoscritta dal Cliente finale e agli allegati in essa richiamati, le condizioni di fornitura del gas naturale presso il punto di riconsegna (PDR). Le presenti CTE sono riservate a Clienti finali titolari di PDR domestici che abbiano deciso di acquistare gas naturale alle condizioni proposte da Semplice Gas &amp; Luce S.p.A. (SGL) sul Mercato Libero e che scelgano quale modalità di pagamento l'addebito su conto corrente (SDD), il bonifico o il bollettino. Le presenti CTE integrano le CGF e, in caso di contrasto, prevalgono su queste ultime.</p>
<h5>Vendita di gas naturale &mdash; primi 12 mesi</h5>
<table class="cte-rate-table">
<tr><th>Corrispettivo per il consumo</th><td>PSV + {$spread} &euro;/Smc</td></tr>
<tr><th>Corrispettivo annuo</th><td>648,00 &euro;/PDR/anno</td></tr>
</table>
<p><strong>Caratteristiche.</strong> Il PSV (PSV Day Ahead Heren Mid) corrisponde al prezzo del gas naturale all'ingrosso al PSV (Punto di Scambio Virtuale) ed &egrave; calcolato mensilmente come media dei prezzi Bid e Offer pubblicati sotto il titolo "PSV PRICE ASSESSMENT" nel report "ICIS Heren European Spot Gas Markets" del pi&ugrave; vicino giorno lavorativo secondo il calendario inglese. Periodicit&agrave; di aggiornamento: mensile. Nel corso degli ultimi 12 mesi il PSV ha raggiunto un valore unitario massimo pari a 0,557699 &euro;/Smc, applicato per il periodo marzo 2026.</p>
<h5>Corrispettivi previsti dal 13&deg; mese</h5>
<table class="cte-rate-table">
<tr><th>Corrispettivo per il consumo</th><td>PSV + {$spread} &euro;/Smc</td></tr>
</table>
<p>Caratteristiche del PSV come sopra. Periodicit&agrave; di aggiornamento: mensile.</p>
<p>Le presenti condizioni economiche sono valide per 12 mesi a decorrere dalla data di attivazione della fornitura. In caso di switch (cambio fornitore) la data di attivazione coincide con la data effettiva di switch, compatibilmente con le tempistiche per l'esercizio del diritto di recesso dal precedente contratto. Alla scadenza le condizioni si intendono automaticamente rinnovate per un ulteriore periodo di pari durata, applicando i corrispettivi della tabella "Corrispettivi previsti dal 13&deg; mese". Resta salva la possibilit&agrave; per SGL di comunicare, nel rispetto delle CGF e della regolazione ARERA, eventuali variazioni unilaterali del Contratto. I prezzi sono al netto di IVA e imposte.</p>
<p>I corrispettivi fanno riferimento al Potere Calorifico Superiore (PCS) pari a 0,03852 GJ/Smc e saranno adeguati in funzione del PCS convenzionale della localit&agrave; di fornitura, come determinato da SGL secondo le previsioni del TIVG. I volumi prelevati presso un PdR il cui gruppo di misura non sia dotato di apparecchiatura per la correzione alle condizioni standard saranno adeguati, per essere espressi in Standard Metri Cubi (Smc), mediante il coefficiente correttivo "C" secondo RTDG e TIVG. Eventuali aggiornamenti delle componenti descritte o ulteriori componenti valorizzate da ARERA in corso di fornitura saranno automaticamente recepiti in bolletta. Eventuali variazioni dei corrispettivi definiti da SGL saranno oggetto di comunicazione di variazione unilaterale secondo il Codice di Condotta Commerciale ARERA e le CGF.</p>
HTML;
}

function cte_luce($spread)
{
    return <<<HTML
<p>Le presenti "Condizioni tecnico economiche di fornitura" (CTE) disciplinano, unitamente alle "Condizioni generali di fornitura" (CGF) e alla "Proposta Di Contratto" (PDC) sottoscritta dal Cliente finale e agli allegati in essa richiamati, le condizioni di fornitura dell'energia elettrica presso il punto di prelievo (POD). Le presenti CTE sono riservate a Clienti finali titolari di POD domestici che abbiano deciso di acquistare energia elettrica alle condizioni proposte da Semplice Gas &amp; Luce S.p.A. (SGL) sul Mercato Libero e che scelgano quale modalità di pagamento l'addebito su conto corrente (SDD), il bonifico o il bollettino. Le presenti CTE integrano le CGF e, in caso di contrasto, prevalgono su queste ultime.</p>
<h5>Vendita di energia elettrica &mdash; primi 12 mesi</h5>
<table class="cte-rate-table">
<tr><th>F1 &middot; Corrispettivo per il consumo</th><td>PUN Index GME + {$spread} &euro;/kWh</td></tr>
<tr><th>F2 &middot; Corrispettivo per il consumo</th><td>PUN Index GME + {$spread} &euro;/kWh</td></tr>
<tr><th>F3 &middot; Corrispettivo per il consumo</th><td>PUN Index GME + {$spread} &euro;/kWh</td></tr>
<tr><th>Corrispettivo annuo</th><td>456,00 &euro;/POD/anno</td></tr>
</table>
<p><strong>Caratteristiche.</strong> Il PUN Index GME &egrave; la media dei prezzi zonali ponderata per le quantit&agrave; acquistate in ciascuna zona di mercato; transitoriamente tiene conto della componente perequativa applicata dal GME in esito al MGP. Il valore &egrave; pubblicato e aggiornato sul sito del GME (mercatoelettrico.org). Periodicit&agrave; di aggiornamento: mensile. Nel corso degli ultimi 12 mesi il PUN Index GME ha raggiunto i valori unitari massimi di 0,14339 &euro;/kWh (F0), 0,14315 &euro;/kWh (F1), 0,15375 &euro;/kWh (F2) e 0,13805 &euro;/kWh (F3), con riferimento al mese di marzo 2026.</p>
<h5>Corrispettivi previsti dal 13&deg; mese</h5>
<table class="cte-rate-table">
<tr><th>F1 / F2 / F3 &middot; Corrispettivo per il consumo</th><td>PUN Index GME + {$spread} &euro;/kWh</td></tr>
</table>
<p>Caratteristiche del PUN Index GME come sopra. Periodicit&agrave; di aggiornamento: mensile.</p>
<p>Le presenti condizioni economiche sono valide per 12 mesi a decorrere dalla data di attivazione della fornitura. In caso di switch (cambio fornitore) la data di attivazione coincide con la data effettiva di switch, compatibilmente con le tempistiche per l'esercizio del diritto di recesso dal precedente contratto. Alla scadenza le condizioni si intendono automaticamente rinnovate per un ulteriore periodo di pari durata, applicando i corrispettivi della tabella "Corrispettivi previsti dal 13&deg; mese". Resta salva la possibilit&agrave; per SGL di comunicare, nel rispetto delle CGF e della regolazione ARERA, eventuali variazioni unilaterali del Contratto.</p>
<p>Saranno inoltre applicate le seguenti componenti: Corrispettivo di dispacciamento (CDISPD) a copertura dei costi del servizio di dispacciamento e del mercato della capacit&agrave;, definito e aggiornato mensilmente da ARERA ai sensi del comma 48.8 dell'Allegato A alla deliberazione 362/2023/R/eel e ss.mm.ii. (TIV); il valore deliberato per maggio 2026 &egrave; pari a 0,019902 &euro;/kWh (comprensivo delle perdite di rete). I prezzi sono al lordo delle perdite di rete pari al 10,00% per le forniture in bassa tensione, quale fattore di correzione di cui al TIS. Eventuali aggiornamenti delle componenti descritte o ulteriori componenti valorizzate da ARERA in corso di fornitura saranno automaticamente recepiti in bolletta. Eventuali variazioni dei corrispettivi definiti da SGL saranno oggetto di comunicazione di variazione unilaterale secondo il Codice di Condotta Commerciale ARERA e le CGF. I prezzi sono al netto di IVA e imposte.</p>
HTML;
}

// Ordine: gas, luce, gas, luce -> colonna sinistra = Gas, colonna destra = Luce.
$offerte = [
    ['kind' => 'gas',  'tipo' => 'Gas',  'nome' => 'PSV Domestico 386',          'prezzo' => 'PSV + 0,45',            'unita' => '&euro;/Smc', 'annuo' => '648,00 €/PDR/anno', 'spread' => '0,45',  'indice' => 'Indicizzato al PSV Day Ahead (ICIS Heren), aggiornato mensilmente'],
    ['kind' => 'luce', 'tipo' => 'Luce', 'nome' => 'PUN Index GME Domestico 386', 'prezzo' => 'PUN Index GME + 0,055', 'unita' => '&euro;/kWh', 'annuo' => '456,00 €/POD/anno', 'spread' => '0,055', 'indice' => 'Indicizzato al PUN Index GME, stesso spread su F1/F2/F3, aggiornato mensilmente'],
    ['kind' => 'gas',  'tipo' => 'Gas',  'nome' => 'PSV Domestico CS 386',       'prezzo' => 'PSV + 0,42',            'unita' => '&euro;/Smc', 'annuo' => '648,00 €/PDR/anno', 'spread' => '0,42',  'indice' => 'Indicizzato al PSV Day Ahead (ICIS Heren), aggiornato mensilmente'],
    ['kind' => 'luce', 'tipo' => 'Luce', 'nome' => 'PUN Index GME Domestico CS 386', 'prezzo' => 'PUN Index GME + 0,05', 'unita' => '&euro;/kWh', 'annuo' => '456,00 €/POD/anno', 'spread' => '0,05',  'indice' => 'Indicizzato al PUN Index GME, stesso spread su F1/F2/F3, aggiornato mensilmente'],
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
          $cte = $isGas ? cte_gas($o['spread']) : cte_luce($o['spread']);
          $href = 'contatti.php?offerta=' . rawurlencode($o['nome']) . '#contatto-form';
?>
        <article class="offer-card"<?= $isGas ? ' style="--ribbon-color:#d97706; --ribbon-bg:#fef3c7; --ribbon-text:#b45309; --ribbon-border:#fde68a;"' : '' ?>>
          <div class="offer-ribbon">
            <span class="pill <?= $isGas ? 'warm' : '' ?>"><?= $isGas ? $ICON_FLAME : $ICON_BOLT ?><span><?= $o['tipo'] ?> · Domestico</span></span>
            <span class="lock"><?= $ICON_LOCK ?> Spread bloccato 12 mesi</span>
          </div>
          <div class="offer-card-body">
<?php if ($operatoreLogo !== '') { ?><div class="operator-card-logo"><span>Offerta di</span><img src="<?= e($operatoreLogo) ?>" alt="<?= e($operatoreNome) ?>"></div><?php } ?>
            <h3 class="offer-name"><?= $o['nome'] ?></h3>
            <p class="offer-type">Cliente domestico · Mercato Libero</p>

            <div class="price-block">
              <div class="price-label">Corrispettivo per il consumo</div>
              <div class="price-main"><?= $o['prezzo'] ?><span style="font-size:14px; color:var(--muted); margin-left:4px; font-weight:600;"><?= $o['unita'] ?></span></div>
              <div class="price-locked"><?= $ICON_CHECK ?> Spread fisso per i primi 12 mesi</div>
            </div>

            <ul class="offer-features">
              <li><?= $ICON_CHECK ?><span>Corrispettivo annuo: <?= htmlspecialchars($o['annuo'], ENT_QUOTES, 'UTF-8') ?></span></li>
              <li><?= $ICON_CHECK ?><span><?= $o['indice'] ?></span></li>
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
        Offerte riservate a clienti domestici sul Mercato Libero di Semplice Gas &amp; Luce S.p.A. I prezzi indicati sono al netto di IVA e imposte; ai corrispettivi si aggiungono gli oneri e i corrispettivi previsti dall'Autorità (ARERA). Condizioni valide 12 mesi, con rinnovo automatico ai corrispettivi previsti dal 13° mese. Per il dettaglio completo consulta le CTE di ciascuna offerta.
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
