<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Le offerte Flexy Gas e Ready Luce 24 di Enjoy Energy per clienti domestici sul Mercato Libero.';
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
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Offerte Mercato Libero</span>
      <h1>La tariffa giusta per la tua casa, <span class="accent">senza sorprese</span></h1>
      <p>Offerte luce e gas riservate a clienti domestici. Condizioni trasparenti, spread bloccato per tutta la durata contrattuale.</p>

<?php if ($OPERATORE['nome_marketing'] !== '') { ?>
      <div style="margin-top: 32px; display: inline-flex; align-items: center; gap: 16px; background: rgba(255,255,255,0.1); padding: 12px 24px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.2);">
        <span style="font-size: 15px; font-weight: 600; color: #fff;"><?= $LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : $COMPANY['company_name'] ?> è partner ufficiale di</span>
        <span style="font-size: 17px; font-weight: 800; color: #fff; letter-spacing: 0.5px; text-transform: uppercase;"><?= $OPERATORE['nome_marketing'] ?></span>
      </div>
<?php } ?>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

<?php
$ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$ICON_BOLT  = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
$ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
$ICON_LOCK  = '<svg viewBox="0 0 24 24" fill="none"><rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
?>
  <main class="section" style="padding: 80px 0 40px;">
    <div class="container">

      <div class="cte-grid">

        <!-- Flexy Gas -->
        <article class="offer-card" style="--ribbon-color:#d97706; --ribbon-bg:#fef3c7; --ribbon-text:#b45309; --ribbon-border:#fde68a;">
          <div class="offer-ribbon">
            <span class="pill warm"><?= $ICON_FLAME ?><span>Gas &middot; Domestico</span></span>
            <span class="lock"><?= $ICON_LOCK ?> Spread bloccato 12 mesi</span>
          </div>
          <div class="offer-card-body">
            <h3 class="offer-name">Flexy Gas</h3>
            <p class="offer-type"><span class="offer-code">034939GSVML01XXDWFLEXYWGW0626W1X</span> &middot; Cliente domestico &middot; Mercato Libero</p>

            <div class="price-block">
              <div class="price-label">Corrispettivo per il consumo</div>
              <div class="price-main">PSV + 0,89<span style="font-size:14px; color:var(--muted); margin-left:4px; font-weight:600;">&euro;/Smc</span></div>
              <div class="price-locked"><?= $ICON_CHECK ?> Spread fisso per i primi 12 mesi</div>
            </div>

            <ul class="offer-features">
              <li><?= $ICON_CHECK ?><span>Corrispettivo annuo: 588,00 &euro;/PDR/anno</span></li>
              <li><?= $ICON_CHECK ?><span>Indicizzato al PSV Day Ahead (ICIS Heren), aggiornato mensilmente</span></li>
              <li><?= $ICON_CHECK ?><span>Pagamento: addebito in conto corrente (SDD)</span></li>
              <li><?= $ICON_CHECK ?><span>Sottoscrivibile fino al 15/07/2026</span></li>
            </ul>

            <a class="btn-primary" href="contatti.php?offerta=FLEXY_GAS#contatto-form">Richiedi attivazione
              <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>

            <details class="cte-details">
              <summary>Condizioni Tecnico Economiche (CTE)</summary>
              <div class="cte-body">
                <p>Offerta per il Mercato Libero indicizzata riservata a clienti uso domestico. Le presenti Condizioni Tecnico Economiche (CTE) disciplinano, unitamente alle Condizioni Generali di Contratto (CGC) e alla Proposta di Adesione (PDA), le condizioni di fornitura di gas naturale presso il punto di riconsegna (PDR).</p>
                <p>Le presenti CTE sono riservate a Clienti finali titolari di PDR ad uso Domestico che abbiano deciso di acquistare gas naturale sul Mercato Libero e scelgano quale modalit&agrave; di pagamento l'addebito in conto corrente. L'attivazione &egrave; condizionata all'esito positivo delle verifiche sull'assenza di precedenti moriosit&agrave; e alla valutazione sull'affidabilit&agrave; creditizia del Cliente.</p>
                <h5>Voci di spesa per la vendita di gas naturale</h5>
                <table class="cte-rate-table">
                  <tr><th>Corrispettivo per il consumo (primi 12 mesi)</th><td>PSV + 0,89 &euro;/Smc</td></tr>
                  <tr><th>Corrispettivo annuo di commercializzazione</th><td>588,00 &euro;/PDR/anno</td></tr>
                </table>
                <p><strong>Caratteristiche dell'indice PSV.</strong> Il PSV (PSV Day Ahead Heren Mid) corrisponde al prezzo del gas naturale all'ingrosso al Punto di Scambio Virtuale ed &egrave; calcolato mensilmente come media dei prezzi Bid e Offer pubblicati sotto il titolo &laquo;PSV PRICE ASSESSMENT&raquo; nel report &laquo;ICIS Heren European Spot Gas Markets&raquo; del pi&ugrave; vicino giorno lavorativo secondo il calendario inglese. Il valore massimo dell'indice PSV negli ultimi 12 mesi &egrave; 0,557699 &euro;/Smc (marzo 2026). Lo spread indicato rappresenta i costi per la spesa della materia prima non coperti dall'indice ed &egrave; liberamente definito dal Fornitore, fisso e invariabile per l'intera durata del Contratto.</p>
                <p>Le presenti condizioni economiche sono valide per 12 mesi dalla data di attivazione. Alla scadenza, le condizioni si intenderanno rinnovate per ulteriori periodi di uguale durata, fatta salva la possibilit&agrave; per Enjoy Energy S.r.l. di comunicare eventuali variazioni unilaterali nel rispetto delle modalit&agrave; previste dalle CGC e dalla regolazione ARERA.</p>
                <p>I valori dei corrispettivi sono riferiti al Potere Calorifico Superiore (PCS) pari a 0,03852 GJ/Smc e saranno adeguati in funzione del PCS convenzionale dell'impianto di distribuzione, come determinato da Enjoy Energy secondo le previsioni del TIVG. Per i PdR non dotati di apparecchiatura per la correzione delle misure alle condizioni standard, i volumi saranno adeguati mediante il coefficiente correttivo &laquo;C&raquo; secondo le disposizioni della RTDG e del TIVG.</p>
                <p>I prezzi sono al netto di IVA e imposte. Eventuali aggiornamenti delle componenti ARERA saranno automaticamente recepiti in bolletta.</p>
              </div>
            </details>
          </div>
        </article>

        <!-- Ready Luce 24 -->
        <article class="offer-card">
          <div class="offer-ribbon">
            <span class="pill"><?= $ICON_BOLT ?><span>Luce &middot; Domestico</span></span>
            <span class="lock"><?= $ICON_LOCK ?> Prezzo fisso 24 mesi</span>
          </div>
          <div class="offer-card-body">
            <h3 class="offer-name">Ready Luce 24</h3>
            <p class="offer-type">Cliente domestico bassa tensione &middot; Mercato Libero</p>

            <div class="price-block">
              <div class="price-label">Corrispettivo per il consumo</div>
              <div class="price-main">F0 0,27<span style="font-size:14px; color:var(--muted); margin-left:4px; font-weight:600;">&euro;/kWh</span></div>
              <div class="price-locked"><?= $ICON_CHECK ?> Prezzo fisso per i primi 24 mesi</div>
            </div>

            <ul class="offer-features">
              <li><?= $ICON_CHECK ?><span>Corrispettivo annuo: 300,00 &euro;/POD/anno</span></li>
              <li><?= $ICON_CHECK ?><span>Prezzo fisso monorario, comprensivo di perdite di rete</span></li>
              <li><?= $ICON_CHECK ?><span>Pagamento: addebito in conto corrente (SDD)</span></li>
              <li><?= $ICON_CHECK ?><span>Sottoscrivibile fino al 15/07/2026</span></li>
            </ul>

            <a class="btn-primary" href="contatti.php?offerta=READY_LUCE_24#contatto-form">Richiedi attivazione
              <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>

            <details class="cte-details">
              <summary>Condizioni Tecnico Economiche (CTE)</summary>
              <div class="cte-body">
                <p>Offerta per il Mercato Libero riservata a clienti uso domestico bassa tensione. Le presenti Condizioni Tecnico Economiche (CTE) disciplinano, unitamente alle Condizioni Generali di Contratto (CGC) e alla Proposta di Adesione (PDA), le condizioni di fornitura di energia elettrica presso il punto di prelievo (POD).</p>
                <p>Le presenti CTE sono riservate a Clienti finali titolari di POD ad uso Domestico che abbiano deciso di acquistare energia elettrica sul Mercato Libero e scelgano quale modalit&agrave; di pagamento l'addebito in conto corrente. L'attivazione &egrave; condizionata all'esito positivo delle verifiche sull'assenza di precedenti moriosit&agrave; e alla valutazione sull'affidabilit&agrave; creditizia del Cliente.</p>
                <p><strong>Oneri di recesso anticipato.</strong> Le presenti CTE hanno validit&agrave; 24 mesi dalla data di attivazione. Nel caso in cui il Cliente receda prima dei 24 mesi, Enjoy Energy si riserva di applicare un onere per recesso anticipato proporzionale ai mesi residui, calcolato secondo la formula: <strong>12&euro; &times; MR</strong> (dove MR = mesi residui fino al termine dei 24 mesi). Onere massimo applicabile: 288&euro; (12&euro; &times; 24 mesi). Tale onere viene applicato in conformit&agrave; al Codice di condotta commerciale e alle disposizioni dell'art. 7, comma 5, del D.Lgs. 210/2021.</p>
                <h5>Voci di spesa per la vendita di energia elettrica</h5>
                <table class="cte-rate-table">
                  <tr><th>F0 &middot; Corrispettivo per il consumo (primi 24 mesi)</th><td>0,27 &euro;/kWh</td></tr>
                  <tr><th>Corrispettivo annuo di commercializzazione</th><td>300,00 &euro;/POD/anno</td></tr>
                </table>
                <p><strong>Caratteristiche.</strong> Prezzo fisso monorario comprensivo di perdite di rete.</p>
                <p>Sono inoltre applicate le componenti relative al servizio di vendita: il corrispettivo CDISPD (copertura costi di dispacciamento per energia elettrica all'ingrosso) aggiornato mensilmente da ARERA, pari a 0,019902 &euro;/kWh dal 1&deg; giugno 2026, comprensivo delle perdite di rete.</p>
                <p>Per le utenze in bassa tensione &gt; 16,5 kW e per le utenze in media tensione sar&agrave; conteggiata l'energia reattiva immessa in rete e saranno previste le eventuali penali in caso di superamento delle soglie come stabilito da ARERA con delibera 720/2022/R/eel.</p>
                <p>Le presenti condizioni economiche sono valide per 24 mesi dalla data di attivazione. Alla scadenza, le condizioni si intenderanno rinnovate per ulteriori periodi di uguale durata, fatta salva la possibilit&agrave; per Enjoy Energy S.r.l. di comunicare eventuali variazioni unilaterali nel rispetto delle modalit&agrave; previste dalle CGC e dalla regolazione ARERA.</p>
                <p>I prezzi sono al netto di IVA e imposte. Eventuali aggiornamenti delle componenti ARERA saranno automaticamente recepiti in bolletta.</p>
              </div>
            </details>
          </div>
        </article>

      </div>

      <p style="font-size: 13.5px; color: var(--muted); text-align: center; max-width: 900px; margin: 48px auto 0; line-height: 1.7;">
        Offerte sul Mercato Libero di Enjoy Energy S.r.l., riservate a clienti domestici. I prezzi indicati sono al netto di IVA e imposte; ai corrispettivi si aggiungono gli oneri e i corrispettivi previsti dall'Autorit&agrave; (ARERA). Per il dettaglio completo consulta le CTE di ciascuna offerta.
      </p>
    </div>
  </main>

  <!-- Glossary -->
  <section class="section glossary">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Educazione Energetica</span>
        <h2 class="section-title">Comprendere la <span class="underline">tua spesa</span></h2>
        <p class="section-sub">Trasparenza alla base del risparmio. Ecco i principali termini per capire come &egrave; strutturata la tua bolletta.</p>
      </div>

      <div class="glossary-grid">
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>Prezzo Fisso (Luce)</h4>
          <p>Il corrispettivo per il consumo &egrave; stabilito contrattualmente e rimane invariato per tutta la durata dell'offerta, indipendentemente dalle fluttuazioni del mercato all'ingrosso.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>Prezzo PSV (Gas)</h4>
          <p>Il Punto di Scambio Virtuale rappresenta il prezzo all'ingrosso di riferimento del gas naturale per l'Italia. L'indice &egrave; aggiornato mensilmente e garantisce un aggancio diretto alle dinamiche reali del mercato.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 14l4-4 4 4 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h4>Spread di Fornitura</h4>
          <p>La quota aggiunta al prezzo del mercato all'ingrosso a copertura dei costi di commercializzazione. Nelle offerte Enjoy Energy questa componente rimane bloccata per tutta la durata contrattuale.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><rect x="2" y="5" width="20" height="14" rx="2" stroke="currentColor" stroke-width="2"/><path d="M2 10h20" stroke="currentColor" stroke-width="2"/></svg></div>
          <h4>Domiciliazione (SDD)</h4>
          <p>La domiciliazione bancaria &egrave; la modalit&agrave; di pagamento richiesta per l'attivazione di queste offerte. Garantisce semplicità di gestione ed elimina il rischio di mancati pagamenti.</p>
        </div>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
