<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Le offerte Flexy Gas e Ready Luce 24 di Enjoy Energy per clienti domestici sul Mercato Libero.';
$pageHead = <<<'CSS'
<style>
  /* ─── Hero tariffe ─── */
  .tariffe-hero {
    background: linear-gradient(135deg, #111111 0%, #FF7A00 100%);
    color: #fff; padding: 64px 20px 110px; text-align: center; position: relative;
    overflow: hidden;
  }
  .tariffe-hero::after {
    content: ''; position: absolute; inset: 0;
    background: radial-gradient(circle at 80% -10%, rgba(255,255,255,0.18), transparent 45%);
    pointer-events: none;
  }
  .tariffe-hero .inner { max-width: 760px; margin: 0 auto; position: relative; z-index: 1; }
  .tariffe-hero .eyebrow {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(255,255,255,0.14); border: 1px solid rgba(255,255,255,0.28);
    padding: 8px 18px; border-radius: 100px; font-size: 14px; font-weight: 700;
    letter-spacing: .02em; margin-bottom: 22px; backdrop-filter: blur(4px);
  }
  .tariffe-hero .eyebrow .dot { width: 8px; height: 8px; border-radius: 50%; background: #fff; }
  .tariffe-hero h1 {
    font-family: var(--font-h); font-size: clamp(34px, 5.5vw, 54px); font-weight: 800;
    line-height: 1.12; margin: 0 0 16px; text-shadow: 0 2px 6px rgba(0,0,0,0.15);
  }
  .tariffe-hero h1 .accent { color: #FFD9B3; }
  .tariffe-hero p { font-size: 20px; line-height: 1.55; opacity: .95; margin: 0 auto; max-width: 600px; }
  .tariffe-hero .partner {
    margin-top: 28px; display: inline-flex; align-items: center; gap: 14px; flex-wrap: wrap;
    justify-content: center; background: rgba(255,255,255,0.12); padding: 12px 24px;
    border-radius: 100px; border: 1px solid rgba(255,255,255,0.22);
  }
  .tariffe-hero .partner .lbl { font-size: 15px; font-weight: 600; }
  .tariffe-hero .partner .op { font-size: 17px; font-weight: 800; letter-spacing: .5px; text-transform: uppercase; }

  /* ─── Griglia offerte ─── */
  .offers-wrap { max-width: 1040px; margin: -64px auto 0; padding: 0 20px; position: relative; z-index: 2; }
  .offers-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 28px; }
  @media (max-width: 880px) { .offers-grid { grid-template-columns: 1fr; } }

  .o-card {
    background: #fff; border-radius: 22px; overflow: hidden; display: flex; flex-direction: column;
    box-shadow: 0 24px 60px rgba(17,17,17,0.12); border: 1px solid var(--border);
    transition: transform .25s ease, box-shadow .25s ease;
  }
  .o-card:hover { transform: translateY(-6px); box-shadow: 0 32px 70px rgba(255,122,0,0.20); }

  .o-top {
    padding: 22px 28px; display: flex; align-items: center; justify-content: space-between; gap: 12px;
    color: #fff;
  }
  .o-top.luce { background: linear-gradient(135deg, #1f2937 0%, #111111 100%); }
  .o-top.gas  { background: linear-gradient(135deg, #FF9233 0%, #FF7A00 100%); }
  .o-top .kind { display: inline-flex; align-items: center; gap: 9px; font-weight: 800; font-size: 16px; font-family: var(--font-h); }
  .o-top .kind svg { width: 22px; height: 22px; }
  .o-top .badge {
    font-size: 11.5px; font-weight: 700; background: rgba(255,255,255,0.2);
    padding: 6px 12px; border-radius: 100px; display: inline-flex; align-items: center; gap: 6px;
    border: 1px solid rgba(255,255,255,0.28); white-space: nowrap;
  }
  .o-top .badge svg { width: 13px; height: 13px; }

  .o-body { padding: 28px; display: flex; flex-direction: column; flex: 1; }
  .o-name { font-family: var(--font-h); font-size: 27px; font-weight: 800; margin: 0 0 6px; color: var(--text-dark); }
  .o-meta { font-size: 13px; color: var(--text-muted); margin: 0 0 22px; line-height: 1.5; }
  .o-code {
    display: inline-block; font-size: 10.5px; font-weight: 700; letter-spacing: .04em;
    background: #f1f5f9; color: var(--text-secondary); padding: 3px 9px; border-radius: 6px;
    margin-bottom: 8px; word-break: break-all;
  }

  .o-price {
    background: var(--accent-bg); border: 1px solid var(--accent-border); border-radius: 16px;
    padding: 20px 22px; margin-bottom: 22px;
  }
  .o-price .lab { font-size: 13px; font-weight: 600; color: var(--text-muted); margin-bottom: 4px; }
  .o-price .val { font-family: var(--font-h); font-size: 40px; font-weight: 800; color: var(--accent); line-height: 1; }
  .o-price .val .unit { font-size: 16px; font-weight: 700; color: var(--text-secondary); margin-left: 6px; }
  .o-price .locked {
    display: inline-flex; align-items: center; gap: 7px; margin-top: 12px;
    font-size: 13px; font-weight: 700; color: #15803d;
  }
  .o-price .locked svg { width: 16px; height: 16px; }

  .o-feats { list-style: none; padding: 0; margin: 0 0 26px; display: flex; flex-direction: column; gap: 12px; }
  .o-feats li { display: flex; align-items: flex-start; gap: 11px; font-size: 15px; color: var(--text-secondary); line-height: 1.45; }
  .o-feats li svg { width: 19px; height: 19px; flex: 0 0 19px; color: var(--accent); margin-top: 1px; }

  .o-cta {
    display: inline-flex; align-items: center; justify-content: center; gap: 9px;
    background: var(--yellow); color: var(--text-dark); font-family: var(--font-h);
    font-weight: 800; font-size: 17px; text-decoration: none; padding: 15px 24px;
    border-radius: 100px; transition: all .2s; box-shadow: 0 4px 14px var(--accent-shadow-strong);
  }
  .o-cta:hover { background: var(--yellow-hover); transform: translateY(-2px); box-shadow: 0 8px 20px rgba(255,122,0,0.36); }
  .o-cta svg { width: 16px; height: 16px; }

  /* ─── Dettaglio CTE ─── */
  .cte-details { margin-top: auto; padding-top: 18px; border-top: 1px solid var(--border); }
  .cte-details summary {
    cursor: pointer; font-weight: 700; font-size: 14px; color: var(--accent); list-style: none;
    display: flex; align-items: center; gap: 7px;
  }
  .cte-details summary::-webkit-details-marker { display: none; }
  .cte-details summary::before { content: '\25B8'; font-size: 12px; transition: transform .2s; }
  .cte-details[open] summary::before { transform: rotate(90deg); }
  .cte-body { margin-top: 14px; font-size: 12.5px; line-height: 1.65; color: var(--text-muted); }
  .cte-body h5 { font-size: 12.5px; color: var(--text-dark); margin: 16px 0 6px; text-transform: uppercase; letter-spacing: .03em; }
  .cte-body p { margin: 0 0 10px; }
  .cte-rate-table { width: 100%; border-collapse: collapse; margin: 8px 0 12px; }
  .cte-rate-table th, .cte-rate-table td { border: 1px solid var(--border); padding: 7px 9px; text-align: left; font-size: 12px; }
  .cte-rate-table th { background: #f8fafc; width: 62%; font-weight: 600; color: var(--text-secondary); }
  .cte-rate-table td { font-weight: 700; color: var(--text-dark); }

  .offers-note { font-size: 13px; color: var(--text-muted); text-align: center; max-width: 880px; margin: 36px auto 0; line-height: 1.7; }

  /* ─── Glossario ─── */
  .glossary { padding: 80px 20px; }
  .glossary .head { text-align: center; max-width: 640px; margin: 0 auto 48px; }
  .glossary .grid { max-width: 1040px; margin: 0 auto; display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; }
  @media (max-width: 900px) { .glossary .grid { grid-template-columns: repeat(2, 1fr); } }
  @media (max-width: 520px) { .glossary .grid { grid-template-columns: 1fr; } }
  .g-card {
    background: #fff; border: 1px solid var(--border); border-radius: 18px; padding: 28px 22px;
    text-align: center; transition: transform .25s ease, border-color .25s ease;
  }
  .g-card:hover { transform: translateY(-5px); border-color: var(--accent); }
  .g-card .ico {
    width: 56px; height: 56px; border-radius: 16px; background: var(--accent-bg);
    display: flex; align-items: center; justify-content: center; margin: 0 auto 18px; color: var(--accent);
  }
  .g-card .ico svg { width: 28px; height: 28px; }
  .g-card h4 { font-family: var(--font-h); font-size: 18px; font-weight: 800; margin: 0 0 10px; color: var(--text-dark); }
  .g-card p { font-size: 14.5px; line-height: 1.55; color: var(--text-muted); margin: 0; }
</style>
CSS;
include __DIR__ . '/header.php';

$ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$ICON_BOLT  = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
$ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
$ICON_LOCK  = '<svg viewBox="0 0 24 24" fill="none"><rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
$ICON_ARROW = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>

  <!-- Hero -->
  <section class="tariffe-hero">
    <div class="inner">
      <span class="eyebrow"><span class="dot"></span> Offerte Mercato Libero</span>
      <h1>La tariffa giusta per la tua casa, <span class="accent">senza sorprese</span></h1>
      <p>Offerte luce e gas riservate a clienti domestici. Condizioni trasparenti e spread bloccato per tutta la durata contrattuale.</p>
<?php if ($OPERATORE['nome_marketing'] !== '') { ?>
      <div class="partner">
        <span class="lbl"><?= $LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : $COMPANY['company_name'] ?> è partner ufficiale di</span>
        <span class="op"><?= $OPERATORE['nome_marketing'] ?></span>
      </div>
<?php } ?>
    </div>
  </section>

  <!-- Offerte -->
  <div class="offers-wrap">
    <div class="offers-grid">

      <!-- Flexy Gas -->
      <article class="o-card">
        <div class="o-top gas">
          <span class="kind"><?= $ICON_FLAME ?> Gas · Domestico</span>
          <span class="badge"><?= $ICON_LOCK ?> Spread bloccato 12 mesi</span>
        </div>
        <div class="o-body">
          <span class="o-code">034939GSVML01XXDWFLEXYWGW0626W1X</span>
          <h3 class="o-name">Flexy Gas</h3>
          <p class="o-meta">Cliente uso domestico · Mercato Libero indicizzato · Sottoscrivibile fino al 15/07/2026</p>

          <div class="o-price">
            <div class="lab">Corrispettivo per il consumo</div>
            <div class="val">PSV + 0,89<span class="unit">€/Smc</span></div>
            <div class="locked"><?= $ICON_CHECK ?> Spread fisso per i primi 12 mesi</div>
          </div>

          <ul class="o-feats">
            <li><?= $ICON_CHECK ?><span>Corrispettivo annuo: <strong>588,00 €/PDR/anno</strong></span></li>
            <li><?= $ICON_CHECK ?><span>Indicizzato al PSV Day Ahead (ICIS Heren), aggiornato mensilmente</span></li>
            <li><?= $ICON_CHECK ?><span>Pagamento: addebito in conto corrente (SDD)</span></li>
          </ul>

          <a class="o-cta" href="contatti.php?offerta=FLEXY_GAS#contatto-form">Richiedi attivazione <?= $ICON_ARROW ?></a>

          <details class="cte-details">
            <summary>Condizioni Tecnico Economiche (CTE)</summary>
            <div class="cte-body">
              <p>Offerta per il Mercato Libero indicizzata riservata a clienti uso domestico. Le presenti Condizioni Tecnico Economiche (CTE) disciplinano, unitamente alle Condizioni Generali di Contratto (CGC) e alla Proposta di Adesione (PDA), le condizioni di fornitura di gas naturale presso il punto di riconsegna (PDR).</p>
              <p>Le presenti CTE sono riservate a Clienti finali titolari di PDR ad uso Domestico che abbiano deciso di acquistare gas naturale sul Mercato Libero e scelgano quale modalit&agrave; di pagamento l'addebito in conto corrente. L'attivazione &egrave; condizionata all'esito positivo delle verifiche sull'assenza di precedenti morosit&agrave; e alla valutazione sull'affidabilit&agrave; creditizia del Cliente.</p>
              <h5>Voci di spesa per la vendita di gas naturale</h5>
              <table class="cte-rate-table">
                <tr><th>Corrispettivo per il consumo (primi 12 mesi)</th><td>PSV + 0,89 €/Smc</td></tr>
                <tr><th>Corrispettivo annuo di commercializzazione</th><td>588,00 €/PDR/anno</td></tr>
              </table>
              <p><strong>Caratteristiche dell'indice PSV.</strong> Il PSV (PSV Day Ahead Heren Mid) corrisponde al prezzo del gas naturale all'ingrosso al Punto di Scambio Virtuale ed &egrave; calcolato mensilmente come media dei prezzi Bid e Offer pubblicati sotto il titolo &laquo;PSV PRICE ASSESSMENT&raquo; nel report &laquo;ICIS Heren European Spot Gas Markets&raquo; del pi&ugrave; vicino giorno lavorativo secondo il calendario inglese. Il valore massimo dell'indice PSV negli ultimi 12 mesi &egrave; 0,557699 €/Smc (riferito al mese di marzo 2026). Lo spread indicato rappresenta i costi per la spesa della materia prima non coperti dall'indice ed &egrave; liberamente definito dal Fornitore, fisso e invariabile per l'intera durata del Contratto.</p>
              <p>Le presenti condizioni economiche sono valide per 12 mesi a decorrere dalla data di attivazione della fornitura. In caso di switch, la data di attivazione coincide con la data effettiva di switch. Alla scadenza, le condizioni si intenderanno rinnovate per ulteriori periodi di uguale durata, fatta salva la possibilit&agrave; per Enjoy Energy S.r.l. di comunicare eventuali variazioni unilaterali nel rispetto delle modalit&agrave; previste dalle CGC e dalla regolazione ARERA.</p>
              <p>I valori dei corrispettivi sono riferiti al Potere Calorifico Superiore (PCS) pari a 0,03852 GJ/Smc e saranno adeguati in funzione del PCS convenzionale dell'impianto di distribuzione, come determinato da Enjoy Energy secondo le previsioni del TIVG. Per i PdR non dotati di apparecchiatura per la correzione delle misure alle condizioni standard, i volumi saranno adeguati mediante il coefficiente correttivo &laquo;C&raquo; secondo le disposizioni della RTDG e del TIVG.</p>
              <p>I prezzi sono al netto di IVA e imposte. Eventuali aggiornamenti delle componenti ARERA, nonché eventuali ulteriori componenti valorizzate da ARERA in corso di fornitura, saranno automaticamente recepiti in bolletta.</p>
            </div>
          </details>
        </div>
      </article>

      <!-- Ready Luce 24 -->
      <article class="o-card">
        <div class="o-top luce">
          <span class="kind"><?= $ICON_BOLT ?> Luce · Domestico</span>
          <span class="badge"><?= $ICON_LOCK ?> Prezzo fisso 24 mesi</span>
        </div>
        <div class="o-body">
          <h3 class="o-name">Ready Luce 24</h3>
          <p class="o-meta">Cliente uso domestico bassa tensione · Mercato Libero · Sottoscrivibile fino al 15/07/2026</p>

          <div class="o-price">
            <div class="lab">Corrispettivo per il consumo</div>
            <div class="val">F0 0,27<span class="unit">€/kWh</span></div>
            <div class="locked"><?= $ICON_CHECK ?> Prezzo fisso per i primi 24 mesi</div>
          </div>

          <ul class="o-feats">
            <li><?= $ICON_CHECK ?><span>Corrispettivo annuo: <strong>300,00 €/POD/anno</strong></span></li>
            <li><?= $ICON_CHECK ?><span>Prezzo fisso monorario, comprensivo di perdite di rete</span></li>
            <li><?= $ICON_CHECK ?><span>Pagamento: addebito in conto corrente (SDD)</span></li>
          </ul>

          <a class="o-cta" href="contatti.php?offerta=READY_LUCE_24#contatto-form">Richiedi attivazione <?= $ICON_ARROW ?></a>

          <details class="cte-details">
            <summary>Condizioni Tecnico Economiche (CTE)</summary>
            <div class="cte-body">
              <p>Offerta per il Mercato Libero riservata a clienti uso domestico bassa tensione. Le presenti Condizioni Tecnico Economiche (CTE) disciplinano, unitamente alle Condizioni Generali di Contratto (CGC) e alla Proposta di Adesione (PDA), le condizioni di fornitura di energia elettrica presso il punto di prelievo (POD).</p>
              <p>Le presenti CTE sono riservate a Clienti finali titolari di POD ad uso Domestico che abbiano deciso di acquistare energia elettrica sul Mercato Libero e scelgano quale modalit&agrave; di pagamento l'addebito in conto corrente. L'attivazione &egrave; condizionata all'esito positivo delle verifiche sull'assenza di precedenti morosit&agrave; e alla valutazione sull'affidabilit&agrave; creditizia del Cliente.</p>
              <p><strong>Oneri di recesso anticipato.</strong> Le presenti CTE hanno validit&agrave; 24 mesi dalla data di attivazione. Nel caso in cui il Cliente receda prima dei 24 mesi, Enjoy Energy si riserva di applicare un onere per recesso anticipato proporzionale ai mesi residui, calcolato secondo la formula <strong>12€ × MR</strong> (dove MR = numero di mesi residui fino al termine dei 24 mesi). Onere massimo applicabile: 288€ (12€ × 24 mesi). Tale onere viene applicato in conformit&agrave; al Codice di condotta commerciale e alle disposizioni dell'art. 7, comma 5, del D.Lgs. 210/2021.</p>
              <h5>Voci di spesa per la vendita di energia elettrica</h5>
              <table class="cte-rate-table">
                <tr><th>F0 · Corrispettivo per il consumo (primi 24 mesi)</th><td>0,27 €/kWh</td></tr>
                <tr><th>Corrispettivo annuo di commercializzazione</th><td>300,00 €/POD/anno</td></tr>
              </table>
              <p><strong>Caratteristiche.</strong> Prezzo fisso monorario comprensivo di perdite di rete.</p>
              <p>Sono inoltre applicate le componenti relative al servizio di vendita: il corrispettivo di dispacciamento CDISPD, a copertura dei costi di dispacciamento per l'energia elettrica all'ingrosso, espresso in centesimi di euro/kWh e aggiornato mensilmente da ARERA, comprensivo delle perdite di rete pari a 0,019902 €/kWh valida dal 1° giugno 2026.</p>
              <p>Per le utenze in bassa tensione &gt; 16,5 kW e per le utenze in media tensione sar&agrave; conteggiata l'energia reattiva immessa in rete e saranno previste le eventuali penali in caso di superamento delle soglie come stabilito da ARERA con delibera 720/2022/R/eel.</p>
              <p>Le presenti condizioni economiche sono valide per 24 mesi a decorrere dalla data di attivazione della fornitura. In caso di switch, la data di attivazione coincide con la data effettiva di switch. Alla scadenza, le condizioni si intenderanno rinnovate per ulteriori periodi di uguale durata, fatta salva la possibilit&agrave; per Enjoy Energy S.r.l. di comunicare eventuali variazioni unilaterali nel rispetto delle modalit&agrave; previste dalle CGC e dalla regolazione ARERA.</p>
              <p>I prezzi sono al netto di IVA e imposte. Eventuali aggiornamenti delle componenti ARERA, nonché eventuali ulteriori componenti valorizzate da ARERA in corso di fornitura, saranno automaticamente recepiti in bolletta.</p>
            </div>
          </details>
        </div>
      </article>

    </div>

    <p class="offers-note">
      Offerte sul Mercato Libero di Enjoy Energy S.r.l., riservate a clienti domestici. I prezzi indicati sono al netto di IVA e imposte; ai corrispettivi si aggiungono gli oneri e i corrispettivi previsti dall'Autorità di Regolazione per Energia Reti e Ambiente (ARERA). Per il dettaglio completo consulta le CTE di ciascuna offerta.
    </p>
  </div>

  <!-- Glossario -->
  <section class="glossary">
    <div class="head">
      <h2 class="section-title">Comprendere la tua spesa</h2>
      <p class="section-sub">Trasparenza alla base del risparmio: ecco i principali termini per capire come è strutturata la tua bolletta.</p>
    </div>
    <div class="grid">
      <div class="g-card">
        <div class="ico"><svg viewBox="0 0 24 24" fill="none"><rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
        <h4>Prezzo Fisso (Luce)</h4>
        <p>Il corrispettivo per il consumo è stabilito contrattualmente e resta invariato per tutta la durata dell'offerta, indipendentemente dalle oscillazioni del mercato all'ingrosso.</p>
      </div>
      <div class="g-card">
        <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
        <h4>Prezzo PSV (Gas)</h4>
        <p>Il Punto di Scambio Virtuale è il prezzo all'ingrosso di riferimento del gas naturale in Italia. L'indice è aggiornato mensilmente e segue le dinamiche reali del mercato.</p>
      </div>
      <div class="g-card">
        <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 14l4-4 4 4 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h4>Spread di Fornitura</h4>
        <p>La quota aggiunta al prezzo del mercato all'ingrosso a copertura dei costi di commercializzazione. Nelle offerte Enjoy Energy resta bloccata per tutta la durata contrattuale.</p>
      </div>
      <div class="g-card">
        <div class="ico"><svg viewBox="0 0 24 24" fill="none"><rect x="2" y="5" width="20" height="14" rx="2" stroke="currentColor" stroke-width="2"/><path d="M2 10h20" stroke="currentColor" stroke-width="2"/></svg></div>
        <h4>Domiciliazione (SDD)</h4>
        <p>La domiciliazione bancaria è la modalità di pagamento richiesta per queste offerte: garantisce semplicità di gestione ed elimina il rischio di mancati pagamenti.</p>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
