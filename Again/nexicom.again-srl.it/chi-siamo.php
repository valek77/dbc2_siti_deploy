<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
// Ragione sociale dell'azienda, ricavata dall'API.
$brand = $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Again';
$LANDING_PAGE['titolo'] = $brand;
$pageDescription = $brand . ' è una realtà di consulenza energetica specializzata nel mercato libero. Ti accompagniamo nella scelta di offerte luce e gas chiare e convenienti.';
include __DIR__ . '/header.php';
?>

  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Il nostro team</span>
      <h1>Il mercato dell'energia, <span class="accent">più chiaro</span></h1>
      <p><?= $brand ?> ti aiuta a orientarti tra le offerte luce e gas con un approccio concreto: ascoltiamo le tue esigenze, analizziamo i consumi e traduciamo i dettagli in scelte comprensibili.</p>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

  <!-- Mission split -->
  <section class="split-block">
    <div class="split-block-content stone-bg reveal">
      <span class="eyebrow"><span class="dot"></span> Chi è <?= $brand ?></span>
      <h2 class="section-title" style="text-align:left; font-size: clamp(28px, 4vw, 38px); margin: 16px 0 24px;">Competenza e ascolto per una scelta <span class="accent">più semplice</span></h2>
      <p style="font-size:16.5px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
        <?= $brand ?> aiuta famiglie e imprese a orientarsi tra le proposte del mercato libero dell'energia. Mettiamo a confronto prezzi, condizioni e modalità di fornitura per rendere ogni scelta più chiara e consapevole.
      </p>
      <p style="font-size:16.5px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
        Il nostro lavoro parte dall'ascolto: leggiamo la tua bolletta, comprendiamo le tue abitudini e trasformiamo gli elementi tecnici in indicazioni semplici e concrete.
      </p>
      <p style="font-size:16.5px; color:var(--muted); line-height:1.75; margin: 0;">
        <strong><?= $brand ?></strong> ti accompagna dalla valutazione iniziale alla richiesta di attivazione, aiutandoti a confrontare le soluzioni disponibili e curando le pratiche necessarie. Tu scegli con consapevolezza, noi ti seguiamo passo dopo passo.
      </p>
    </div>
    <div class="split-block-image reveal">
      <img src="chi_siamo_team.jpg" alt="Team <?= $brand ?> al lavoro su forniture luce e gas">
    </div>
  </section>

  <!-- Stats -->
  <section class="stat-strip">
    <div class="stat-strip-grid">
      <div class="stat-item">
        <div class="n">Luce &amp; Gas</div>
        <div class="l">Doppia fornitura</div>
      </div>
      <div class="stat-item">
        <div class="n">12 mesi</div>
        <div class="l">Spread bloccato</div>
      </div>
      <div class="stat-item">
        <div class="n">PUN / PSV</div>
        <div class="l">Prezzi indicizzati</div>
      </div>
      <div class="stat-item">
        <div class="n">€0</div>
        <div class="l">Costo del preventivo</div>
      </div>
    </div>
  </section>

  <!-- Valori -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I capisaldi di <?= $brand ?></span>
        <h2 class="section-title">Valori concreti, <span class="underline">a tuo vantaggio</span></h2>
        <p class="section-sub">Il metodo di <?= $brand ?> si fonda su tre principi: informazioni comprensibili, attenzione alle esigenze reali e supporto concreto.</p>
      </div>

      <div class="features-container">
        <article class="feature-card">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/><path d="M21 21l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
          </div>
          <h4>Offerte competitive</h4>
          <p>Confrontiamo le proposte luce e gas considerando consumi, condizioni economiche e obiettivi di spesa.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon warm">
            <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg>
          </div>
          <h4>Servizio di qualità</h4>
          <p>Ti accompagniamo dalla prima richiesta all'attivazione con un supporto diretto e senza percorsi complicati.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2v10z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Trasparenza e competenza</h4>
          <p>Spieghiamo prezzi e condizioni con parole semplici, mettendo in evidenza ciò che è davvero importante per te.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Come lavoriamo -->
  <section class="split-block split-block-reverse">
    <div class="split-block-content teal-bg reveal">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Come funziona</span>
      <h2 class="section-title" style="text-align:left; color:#ffffff; font-size: clamp(28px, 4vw, 38px); margin: 16px 0 24px;">Dalla richiesta all'<span style="color:#ffaa00;">attivazione</span></h2>
      <p style="font-size:16.5px; color:rgba(255,255,255,0.85); line-height:1.75; margin: 0 0 18px;">
        Raccogliamo la tua richiesta, ti illustriamo le offerte luce e gas più adatte al tuo profilo di consumo e curiamo tutte le pratiche di attivazione e di recesso dal precedente fornitore.
      </p>
      <p style="font-size:16.5px; color:rgba(255,255,255,0.85); line-height:1.75; margin: 0 0 32px;">
        Dopo la scelta, il fornitore indicato nell'offerta gestisce contratto e bolletta. Non dovrai fare altro che attendere lo switch, senza interruzioni di servizio né interventi tecnici in casa.
      </p>
      <a href="contatti.php" class="btn-secondary" style="align-self: flex-start; padding: 14px 28px; background:#ffffff; color:var(--primary); font-weight:700;">
        Voglio essere ricontattato
        <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
    <div class="split-block-image reveal">
      <img src="feature_consulenza.jpg" alt="Energy analysis and carbon offset graphs on tablet">
    </div>
  </section>

  <!-- Quote finale -->
  <section class="quote-banner">
    <div class="mark">"</div>
    <h2>Il progresso ecologico ha valore solo se genera un beneficio reale per le persone e le imprese che scelgono di sostenerlo ogni giorno.</h2>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
