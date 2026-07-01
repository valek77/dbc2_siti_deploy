<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Le offerte Enjoy Energy per luce, gas e PLACET: tariffe fisse, variabili e offerte obbligatorie per legge per clienti domestici sul Mercato Libero.';
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
  .o-top.placet { background: linear-gradient(135deg, #0f766e 0%, #115e59 100%); }
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

  .o-suboffer { padding: 18px 0; border-top: 1px solid var(--border); }
  .o-suboffer:first-of-type { border-top: none; padding-top: 0; }
  .o-suboffer h4 { font-family: var(--font-h); font-size: 17px; font-weight: 800; margin: 0 0 8px; color: var(--text-dark); }
  .o-suboffer p { font-size: 14.5px; line-height: 1.6; color: var(--text-secondary); margin: 0 0 10px; }
  .o-suboffer ul { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px; }
  .o-suboffer li { display: flex; align-items: flex-start; gap: 10px; font-size: 14px; color: var(--text-secondary); line-height: 1.45; }
  .o-suboffer li svg { width: 17px; height: 17px; flex: 0 0 17px; color: var(--accent); margin-top: 2px; }

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
$ICON_SCALE = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 3a9 9 0 100 18 9 9 0 000-18z" stroke="currentColor" stroke-width="2"/><path d="M12 7v5l3 3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
?>

  <!-- Hero -->
  <section class="tariffe-hero">
    <div class="inner">
      <span class="eyebrow"><span class="dot"></span> Offerte Mercato Libero</span>
      <h1>Le nostre tariffe <span class="accent">per luce e gas</span></h1>
      <p>Offerte per clienti domestici: tariffe fisse, variabili e offerte PLACET obbligatorie per legge. Scegli la soluzione più adatta alle tue esigenze.</p>
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

      <!-- Luce -->
      <article class="o-card">
        <div class="o-top luce">
          <span class="kind"><?= $ICON_BOLT ?> Luce · Domestico</span>
          <span class="badge"><?= $ICON_LOCK ?> Fissa e variabile</span>
        </div>
        <div class="o-body">
          <h3 class="o-name">Offerte Luce</h3>
          <p class="o-meta">Per utenze domestiche in bassa tensione sul Mercato Libero.</p>

          <div class="o-suboffer">
            <h4>Enjoy Forever · Tariffa Variabile</h4>
            <p>Prezzo componente energia indicizzato al PUN (Prezzo Unico Nazionale), con l'aggiunta di un contributo al consumo (spread/alfa).</p>
            <ul>
              <li><?= $ICON_CHECK ?><span>Disponibile in versione <strong>Monoraria</strong> o <strong>Multioraria</strong> (F1, F2, F3)</span></li>
              <li><?= $ICON_CHECK ?><span>Quota fissa mensile di commercializzazione indipendente dal consumo</span></li>
              <li><?= $ICON_CHECK ?><span>Prezzo che segue l'andamento mensile del mercato all'ingrosso</span></li>
            </ul>
          </div>

          <div class="o-suboffer">
            <h4>Ready Luce 24 · Tariffa Fissa</h4>
            <p>Prezzo della componente energia bloccato per kWh, solitamente per 12 o 24 mesi.</p>
            <ul>
              <li><?= $ICON_CHECK ?><span>Prezzo fisso per il consumo per tutta la durata contrattuale</span></li>
              <li><?= $ICON_CHECK ?><span>Quota fissa mensile di commercializzazione indipendente dal consumo</span></li>
              <li><?= $ICON_CHECK ?><span>Ideale per chi cerca stabilità e nessuna sorpresa in bolletta</span></li>
            </ul>
          </div>

          <a class="o-cta" href="contatti.php?offerta=LUCE#contatto-form">Richiedi informazioni <?= $ICON_ARROW ?></a>

          <details class="cte-details">
            <summary>Condizioni Tecnico Economiche (CTE)</summary>
            <div class="cte-body">
              <p>Le offerte luce sono riservate a clienti finali titolari di POD ad uso domestico in bassa tensione che acquistino energia elettrica sul Mercato Libero. L'attivazione è condizionata all'esito positivo delle verifiche di morosità e alla valutazione di affidabilità creditizia.</p>
              <p>Per la tariffa variabile <strong>Enjoy Forever</strong> il corrispettivo per il consumo è indicizzato al PUN (Prezzo Unico Nazionale), calcolato mensilmente, più un contributo al consumo (spread/alfa) stabilito dal fornitore. La tariffa può essere erogata in forma monoraria o multioraria (F1, F2, F3).</p>
              <p>Per la tariffa fissa <strong>Ready Luce 24</strong> il corrispettivo per il consumo è bloccato per kWh per la durata contrattuale indicata, solitamente 12 o 24 mesi.</p>
              <p>Per entrambe le offerte è previsto un costo fisso di commercializzazione mensile indipendente dai consumi. I prezzi sono al netto di IVA e imposte; eventuali aggiornamenti delle componenti ARERA saranno automaticamente recepiti in bolletta.</p>
            </div>
          </details>
        </div>
      </article>

      <!-- Gas -->
      <article class="o-card">
        <div class="o-top gas">
          <span class="kind"><?= $ICON_FLAME ?> Gas · Domestico</span>
          <span class="badge"><?= $ICON_LOCK ?> Variabile</span>
        </div>
        <div class="o-body">
          <h3 class="o-name">Offerte Gas</h3>
          <p class="o-meta">Per utenze domestiche con PDR sul Mercato Libero.</p>

          <div class="o-suboffer">
            <h4>Enjoy Forever Gas / Par 0 Web · Tariffa Variabile</h4>
            <p>Prezzo componente materia prima indicizzato al PSV (Prezzo di Riferimento del Mercato All'ingrosso Italiano), più un contributo al consumo per Smc.</p>
            <ul>
              <li><?= $ICON_CHECK ?><span>Prezzo indicizzato al PSV, aggiornato mensilmente</span></li>
              <li><?= $ICON_CHECK ?><span>Quota fissa mensile di commercializzazione indipendente dal consumo</span></li>
              <li><?= $ICON_CHECK ?><span>Trasparenza su spread e componenti di mercato</span></li>
            </ul>
          </div>

          <a class="o-cta" href="contatti.php?offerta=GAS#contatto-form">Richiedi informazioni <?= $ICON_ARROW ?></a>

          <details class="cte-details">
            <summary>Condizioni Tecnico Economiche (CTE)</summary>
            <div class="cte-body">
              <p>Le offerte gas sono riservate a clienti finali titolari di PDR ad uso domestico che acquistino gas naturale sul Mercato Libero. L'attivazione è condizionata all'esito positivo delle verifiche di morosità e alla valutazione di affidabilità creditizia.</p>
              <p>Il corrispettivo per il consumo è indicizzato al PSV (Prezzo di Riferimento del Mercato All'ingrosso Italiano), calcolato mensilmente, più un contributo al consumo per Smc (spread/alfa) stabilito dal fornitore.</p>
              <p>È previsto un costo fisso di commercializzazione mensile indipendente dai consumi. I prezzi sono al netto di IVA e imposte; eventuali aggiornamenti delle componenti ARERA saranno automaticamente recepiti in bolletta.</p>
            </div>
          </details>
        </div>
      </article>

      <!-- PLACET -->
      <article class="o-card" style="grid-column: 1 / -1;">
        <div class="o-top placet">
          <span class="kind"><?= $ICON_SCALE ?> PLACET</span>
          <span class="badge"><?= $ICON_LOCK ?> Obbligatorie per legge</span>
        </div>
        <div class="o-body">
          <h3 class="o-name">Offerte PLACET</h3>
          <p class="o-meta">Offerte a Condizioni Economiche di Protezione per luce e gas, definite dall'ARERA.</p>

          <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 24px;">
            <div class="o-suboffer" style="border-top: none; padding-top: 0;">
              <h4>PLACET Fissa · Luce e Gas</h4>
              <p>Prezzo della materia prima bloccato per 12 mesi, con condizioni contrattuali definite dall'ARERA.</p>
              <ul>
                <li><?= $ICON_CHECK ?><span>Prezzo fisso per la materia prima per 12 mesi</span></li>
                <li><?= $ICON_CHECK ?><span>Condizioni definite dall'Autorità di Regolazione</span></li>
              </ul>
            </div>

            <div class="o-suboffer" style="border-top: none; padding-top: 0;">
              <h4>PLACET Variabile · Luce e Gas</h4>
              <p>Prezzo indicizzato con parametri stabiliti dall'ARERA: PUN per la luce, PSV per il gas.</p>
              <ul>
                <li><?= $ICON_CHECK ?><span>Indicizzata al PUN per la luce e al PSV per il gas</span></li>
                <li><?= $ICON_CHECK ?><span>Parametri di aggiornamento definiti dall'Autorità</span></li>
              </ul>
            </div>
          </div>

          <a class="o-cta" href="contatti.php?offerta=PLACET#contatto-form">Richiedi informazioni <?= $ICON_ARROW ?></a>

          <details class="cte-details">
            <summary>Condizioni Tecnico Economiche (CTE)</summary>
            <div class="cte-body">
              <p>Le offerte PLACET (Prezzo Lazzerato a Condizioni di Tutela) sono offerte obbligatorie per legge, proposte dai venditori di ultima istanza e regolate dall'ARERA. Sono destinate ai clienti domestici e alle piccole imprese che ne facciano richiesta.</p>
              <p>La versione <strong>PLACET Fissa</strong> prevede un prezzo della materia prima bloccato per 12 mesi, con condizioni contrattuali definite dall'Autorità.</p>
              <p>La versione <strong>PLACET Variabile</strong> prevede un prezzo indicizzato al PUN per la luce e al PSV per il gas, con parametri di aggiornamento stabiliti dall'ARERA.</p>
              <p>Per il dettaglio completo dei corrispettivi, dei vincoli di accesso e delle modalità di recesso si rimanda alle condizioni contrattuali pubblicate sul sito del fornitore e alle delibere ARERA in materia.</p>
            </div>
          </details>
        </div>
      </article>

    </div>

    <p class="offers-note">
      <strong>Nota di trasparenza:</strong> per verificare i valori numerici esatti dei centesimi di euro (sconti commerciali inclusi, spread precisi e quote fisse mensili aggiornate al mese in corso), ti invitiamo a consultare direttamente i box riassuntivi sul sito del fornitore o a scaricare la "Scheda di Confrontabilità" e le "Condizioni Economiche" in PDF. Offerte sul Mercato Libero e PLACET di Enjoy Energy S.r.l.; i prezzi sono al netto di IVA e imposte.
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
        <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
        <h4>PUN · Prezzo Unico Nazionale</h4>
        <p>È il prezzo di riferimento all'ingrosso dell'energia elettrica in Italia. Nelle tariffe variabili determina la componente energia aggiornata mensilmente.</p>
      </div>
      <div class="g-card">
        <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
        <h4>PSV · Prezzo del Gas</h4>
        <p>Il Punto di Scambio Virtuale è il prezzo all'ingrosso di riferimento del gas naturale in Italia. L'indice è aggiornato mensilmente e segue le dinamiche reali del mercato.</p>
      </div>
      <div class="g-card">
        <div class="ico"><svg viewBox="0 0 24 24" fill="none"><rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
        <h4>Prezzo Fisso</h4>
        <p>Il corrispettivo per il consumo è stabilito contrattualmente e resta invariato per tutta la durata dell'offerta, indipendentemente dalle oscillazioni del mercato all'ingrosso.</p>
      </div>
      <div class="g-card">
        <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 14l4-4 4 4 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h4>Spread / Alfa</h4>
        <p>La quota aggiunta al prezzo del mercato all'ingrosso a copertura dei costi di commercializzazione e approvvigionamento. Viene definita dal fornitore e può essere fissa per tutta la durata contrattuale.</p>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
