<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
include __DIR__ . '/header.php';

// Nome fornitore energetico (Nexicom) e nome dell'agenzia/portale, da API con fallback.
$op = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : 'Nexicom';
$agency = $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : $brandName;
$pageDescription = $op . ' è un\'azienda specializzata nella filiera commerciale del gas naturale e dell\'energia elettrica sul mercato libero. ' . $agency . ' ne commercializza le offerte come partner autorizzato.';
?>

  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Il fornitore</span>
      <h1>Energia gas e luce, con <span class="accent"><?= $op ?></span></h1>
      <p>Offerte luce e gas per clienti domestici sul mercato libero, indicizzate e trasparenti. <?= $agency ?> commercializza le forniture <?= $op ?> in qualità di partner autorizzato.</p>
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
      <span class="eyebrow"><span class="dot"></span> Chi è <?= $op ?></span>
      <h2 class="section-title" style="text-align:left; font-size: clamp(28px, 4vw, 38px); margin: 16px 0 24px;">Un fornitore <span class="accent">specializzato</span> nel mercato libero</h2>
      <p style="font-size:16.5px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
        <?= $op ?> è un'azienda specializzata nella filiera commerciale del gas naturale e dell'energia elettrica. Propone a famiglie e imprese forniture luce e gas sul mercato libero, con prezzi indicizzati ai riferimenti reali di mercato — PUN per la luce, PSV per il gas — e condizioni chiare e trasparenti.
      </p>
      <p style="font-size:16.5px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
        Un team giovane e dinamico, affiancato da un management con esperienza consolidata nel settore, consente di operare con rapidità e precisione. La sede legale è a Monza (MB), con un ufficio operativo a Torino (TO).
      </p>
      <p style="font-size:16.5px; color:var(--muted); line-height:1.75; margin: 0;">
        <strong><?= $agency ?></strong> opera come agenzia e partner autorizzato per la commercializzazione delle offerte <?= $op ?>: ti accompagniamo nella scelta della fornitura più adatta e curiamo le pratiche di attivazione. La fornitura è erogata da <?= $op ?>.
      </p>
    </div>
    <div class="split-block-image reveal">
      <img src="chi_siamo_team.jpg" alt="Team al lavoro su forniture luce e gas <?= $op ?>">
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
        <span class="eyebrow"><span class="dot"></span> I capisaldi di <?= $op ?></span>
        <h2 class="section-title">Valori concreti, <span class="underline">a tuo vantaggio</span></h2>
        <p class="section-sub">Le offerte <?= $op ?> si fondano su tre principi cardine che tutelano la tua spesa e la qualità del servizio.</p>
      </div>

      <div class="features-container">
        <article class="feature-card">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/><path d="M21 21l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
          </div>
          <h4>Offerte competitive</h4>
          <p>Proposte luce e gas vantaggiose per clienti domestici, con prezzi indicizzati ai riferimenti reali di mercato (PUN e PSV) e spread bloccato per i primi 12 mesi.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon warm">
            <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg>
          </div>
          <h4>Servizio di qualità</h4>
          <p>Operatori pronti ad assisterti in ogni fase, dalla scelta dell'offerta all'attivazione della fornitura, con un canale diretto e senza percorsi complicati.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2v10z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Trasparenza e competenza</h4>
          <p>Condizioni chiare, senza costi nascosti, e flessibilità nel rispondere alle tue esigenze grazie a un'esperienza consolidata nel settore energetico.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Come lavoriamo -->
  <section class="split-block split-block-reverse">
    <div class="split-block-content teal-bg reveal">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Come funziona</span>
      <h2 class="section-title" style="text-align:left; color:#ffffff; font-size: clamp(28px, 4vw, 38px); margin: 16px 0 24px;">Dalla richiesta all'<span style="color:#22d3ee;">attivazione</span></h2>
      <p style="font-size:16.5px; color:rgba(255,255,255,0.85); line-height:1.75; margin: 0 0 18px;">
        In qualità di partner autorizzato <?= $op ?>, raccogliamo la tua richiesta, ti illustriamo le offerte luce e gas più adatte al tuo profilo di consumo e curiamo tutte le pratiche di attivazione e di recesso dal precedente fornitore.
      </p>
      <p style="font-size:16.5px; color:rgba(255,255,255,0.85); line-height:1.75; margin: 0 0 32px;">
        La fornitura viene quindi attivata da <?= $op ?>, che gestisce contratto e bolletta. Non dovrai fare altro che attendere lo switch, senza interruzioni di servizio né interventi tecnici in casa.
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
