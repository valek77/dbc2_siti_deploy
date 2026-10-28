<?php
require __DIR__ . '/_config.php';
$brandName = $COMPANY['company_name'] !== ''
    ? $COMPANY['company_name']
    : ($LANDING_PAGE['nome_portale'] !== ''
        ? $LANDING_PAGE['nome_portale']
        : ($LANDING_PAGE['titolo'] !== '' ? $LANDING_PAGE['titolo'] : 'GR Contact Call Center'));
// Ragione sociale dall'API (company_name), mai il nome commerciale.
$companyName = $COMPANY['company_name'];
$pageTitle = 'Chi Siamo';
$pageDescription = $companyName . ' offre consulenza e supporto nel settore dell\'energia, aiutando famiglie e imprese a orientarsi tra le soluzioni disponibili.';
include __DIR__ . '/header.php';
?>

<style>
  .about-page .page-hero { min-height: 540px; }
  .about-page .page-hero .photo-bg { background-position: center; }
  .about-page .page-hero .inner { padding-top: 130px; padding-bottom: 130px; }
  .about-page .page-hero h1 { max-width: 700px; }
  .about-page .section:first-of-type { background: linear-gradient(180deg, #fff 0%, var(--bg-soft) 100%); }
  .about-page .split-img { box-shadow: var(--shadow-lg); transform: rotate(1.5deg); }
  .about-page .split-img:hover { transform: rotate(0deg); }
  .about-page .stat-strip { position: relative; overflow: hidden; }
  .about-page .stat-strip::before { content: ''; position: absolute; width: 320px; height: 320px; border: 1px solid rgba(156,202,234,.18); border-radius: 50%; left: -110px; top: -180px; }
  .about-page .stat-item { position: relative; }
  .about-page .stat-item .n { font-size: clamp(28px, 3vw, 42px); }
  .about-page .feature-grid { align-items: stretch; }
  .about-page .feat-card { min-height: 250px; }
  .about-page .feat-card .ico svg { width: 30px; height: 30px; display: block; }
  .about-page .dark-section .feat-card .ico { color: var(--primary); background: rgba(156,202,234,.16); border: 1px solid rgba(156,202,234,.28); }
  .about-page .dark-section .feat-card:hover .ico { color: #fff; background: var(--primary); border-color: var(--primary); }
  .about-page .dark-section { background: linear-gradient(135deg, #0d2738 0%, #143f57 100%); }
  .about-page .photo-section { min-height: 430px; display: flex; align-items: center; }
  @media (max-width: 768px) {
    .about-page .page-hero { min-height: 500px; }
    .about-page .page-hero .inner { padding-top: 100px; padding-bottom: 90px; }
    .about-page .split-img { transform: none; }
    .about-page .feat-card { min-height: 0; }
  }
</style>

<main class="about-page">

  <!-- HERO — foto città/grattacieli -->
  <section class="page-hero">
    <div class="photo-bg" style="background-image: url('chi-siamo-hero.png');"></div>
    <div class="photo-overlay"></div>
    <div class="inner">
      <span class="eyebrow" style="color:var(--primary-light);"><span class="dot" style="background:var(--primary-light);"></span> Chi siamo</span>
      <h1>Energia, persone e <span class="hl">nuove possibilità</span></h1>
      <p>Siamo una realtà che mette competenza, ascolto e attenzione al servizio di chi cerca soluzioni semplici e adatte alle proprie esigenze.</p>
    </div>
  </section>

  <!-- STORIA SPLIT -->
  <section class="section">
    <div class="container">
      <div class="split">
        <div>
          <span class="eyebrow"><span class="dot"></span> Chi siamo</span>
          <h2 class="section-title">Un punto di riferimento<br><span class="hl">per le tue scelte</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin:0 0 20px;"><?= $companyName ?> opera nel settore dell'energia con l'obiettivo di rendere più chiaro e accessibile un mondo spesso complesso. Affianchiamo privati e imprese nella ricerca di soluzioni coerenti con i loro consumi, le loro necessità e i loro obiettivi.</p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin:0 0 36px;">Ascolto, trasparenza e professionalità guidano ogni relazione. Il nostro lavoro nasce dal confronto con le persone e dalla volontà di offrire un supporto concreto, dalla prima richiesta fino alla scelta finale.</p>
          <a href="tariffe.php" class="btn-primary">Scopri le offerte</a>
        </div>
        <div class="split-img">
          <img src="chi-siamo-team.png" alt="Consulenza energetica per una famiglia" loading="lazy">
          <div class="badge">
            <div class="label">Il nostro</div>
            <div class="val">metodo</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- STAT STRIP -->
  <div class="stat-strip">
    <div class="stat-grid">
      <div class="stat-item"><div class="n">Ascolto</div><div class="l">Partiamo dalle persone</div></div>
      <div class="stat-item"><div class="n">Chiarezza</div><div class="l">Spieghiamo le soluzioni</div></div>
      <div class="stat-item"><div class="n">Supporto</div><div class="l">Ti accompagniamo nella scelta</div></div>
      <div class="stat-item"><div class="n">Futuro</div><div class="l">Guardiamo oltre il presente</div></div>
    </div>
  </div>

  <!-- REPARTI -->
  <section class="section" style="background:var(--bg-soft);">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri reparti</span>
        <h2 class="section-title">Persone, ruoli,<br><span class="ul">risultati</span></h2>
        <p class="section-sub">Competenze diverse lavorano insieme per offrire un servizio attento, ordinato e vicino alle esigenze di ogni cliente.</p>
      </div>
      <div class="feature-grid">
        <div class="feat-card">
          <div class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
          <h4>Persone</h4>
          <p>Valorizziamo le persone e le loro competenze, creando un ambiente in cui collaborazione, ascolto e crescita contribuiscono alla qualità del lavoro quotidiano.</p>
        </div>
        <div class="feat-card">
          <div class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.9.33 1.78.62 2.63a2 2 0 0 1-.45 2.11L8 9.73a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.85.29 1.73.5 2.63.62A2 2 0 0 1 22 16.92z"/></svg></div>
          <h4>Consulenza</h4>
          <p>Il nostro team ascolta le esigenze di privati e imprese e presenta le opportunità disponibili con un linguaggio semplice, chiaro e trasparente.</p>
        </div>
        <div class="feat-card">
          <div class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7h5l2 2h11v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h5l2 2"/><path d="M3 7h18"/></svg></div>
          <h4>Organizzazione</h4>
          <p>Un'organizzazione attenta coordina le attività e garantisce continuità, precisione e un supporto puntuale in ogni fase del rapporto con il cliente.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CULTURA AZIENDALE — dark -->
  <section class="dark-section" style="padding: var(--section) 0;">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow" style="color:var(--primary-light);"><span class="dot" style="background:var(--primary-light);"></span> La nostra cultura aziendale</span>
        <h2 class="section-title" style="color:#fff;">Le persone al <span style="color:var(--primary-light);">centro</span></h2>
        <p class="section-sub" style="color:rgba(255,255,255,.75);">In <?= $companyName ?> crediamo che un buon servizio nasca da un modo di lavorare responsabile, collaborativo e orientato alle persone.</p>
      </div>
      <div class="feature-grid" style="grid-template-columns: repeat(2, 1fr); max-width: 820px; margin: 0 auto;">
        <div class="feat-card" style="background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12);">
          <div class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m7 16 4-5 3 3 5-7"/><path d="M15 7h4v4"/></svg></div>
          <h4 style="color:#fff;">Competenza</h4>
          <p style="color:rgba(255,255,255,.7);">Coltiviamo le competenze e promuoviamo un approccio professionale, così da affrontare ogni richiesta con preparazione e attenzione.</p>
        </div>
        <div class="feat-card" style="background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12);">
          <div class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v18M5 6h14M5 6l-3 6a4 4 0 0 0 6 0L5 6zM19 6l-3 6a4 4 0 0 0 6 0l-3-6zM8 21h8"/></svg></div>
          <h4 style="color:#fff;">Trasparenza</h4>
          <p style="color:rgba(255,255,255,.7);">Comunichiamo in modo diretto e corretto, per costruire relazioni basate sulla fiducia e sulla consapevolezza.</p>
        </div>
        <div class="feat-card" style="background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12);">
          <div class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m12 12 2-2a2.8 2.8 0 0 1 4 0l3 3a2.8 2.8 0 0 1-4 4l-1-1"/><path d="m12 12-2-2a2.8 2.8 0 0 0-4 0l-3 3a2.8 2.8 0 0 0 4 4l4-4"/><path d="m8 16 2 2a2.8 2.8 0 0 0 4 0l1-1"/><path d="m16 8-2-2a2.8 2.8 0 0 0-4 0L8 8"/></svg></div>
          <h4 style="color:#fff;">Ascolto</h4>
          <p style="color:rgba(255,255,255,.7);">Ogni persona ha esigenze diverse: per questo partiamo dalle domande, comprendiamo il contesto e costruiamo risposte pertinenti.</p>
        </div>
        <div class="feat-card" style="background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12);">
          <div class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/></svg></div>
          <h4 style="color:#fff;">Responsabilità</h4>
          <p style="color:rgba(255,255,255,.7);">Lavoriamo con serietà e cura, consapevoli del valore delle scelte che aiutiamo a compiere ogni giorno.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- QUOTE -->
  <section class="section" style="text-align:center;">
    <div class="container" style="max-width:800px;">
      <div style="font-size:64px; color:var(--primary); line-height:1; margin-bottom:24px; font-family:var(--font-display);">"</div>
      <h2 style="font-size:clamp(24px,3.5vw,34px); color:var(--ink); font-weight:700; line-height:1.4; margin:0 0 32px;">Crediamo in un'energia più semplice da comprendere e in relazioni costruite con attenzione, chiarezza e fiducia.</h2>
      <div style="font-family:var(--font-display); font-weight:700; color:var(--primary); font-size:16px;">— Il Team <?= $companyName ?></div>
    </div>
  </section>

  <!-- FOTO background / CTA -->
  <section class="photo-section" style="padding: var(--section) 0;">
    <div class="photo-bg" style="background-image: url('chi-siamo-energy.png');"></div>
    <div class="photo-overlay"></div>
    <div class="container" style="text-align:center; position:relative; z-index:2;">
      <h2 style="font-family:var(--font-display); font-size:clamp(30px,5vw,50px); font-weight:800; color:#fff; margin:0 0 20px;">Parliamo delle tue esigenze</h2>
      <p style="font-size:18px; color:rgba(255,255,255,.8); margin:0 auto 36px; max-width:520px; line-height:1.6;">Contattaci per ricevere maggiori informazioni e scoprire le soluzioni più adatte a te, senza impegno.</p>
      <a href="contatti.php" class="btn-primary" style="font-size:17px; padding:16px 44px;">Contattaci ora →</a>
    </div>
  </section>

</main>

<?php include __DIR__ . '/footer.php'; ?>
