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
$pageDescription = 'Scopri la storia, le persone e il modo di lavorare di ' . $companyName . ', realtà specializzata nei servizi commerciali per energia e telecomunicazioni.';
$pageClass = 'page-about';
include __DIR__ . '/header.php';
?>

  <!-- HERO — foto città/grattacieli -->
  <section class="page-hero">
    <div class="photo-bg" style="background-image: url('https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?auto=format&fit=crop&w=1800&q=85');"></div>
    <div class="photo-overlay"></div>
    <div class="inner">
      <span class="eyebrow" style="color:var(--primary-light);"><span class="dot" style="background:var(--primary-light);"></span> Chi siamo</span>
      <h1>Una crescita costruita <span class="hl">insieme</span></h1>
      <p>Mettiamo persone, competenze e tecnologia al servizio di progetti commerciali affidabili. Qui trovi il nostro modo di lavorare e ciò che ci guida ogni giorno.</p>
    </div>
  </section>

  <!-- STORIA SPLIT -->
  <section class="section">
    <div class="container">
      <div class="split">
        <div>
          <span class="eyebrow"><span class="dot"></span> La nostra storia</span>
          <h2 class="section-title">Una storia fatta di<br><span class="hl">persone e crescita</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin:0 0 20px;"><?= $companyName ?> ha costruito il proprio percorso su ascolto, preparazione e attenzione alle persone. Questa visione si traduce in servizi dedicati ai settori dell'energia e delle telecomunicazioni.</p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin:0 0 36px;">Dai primi tre uffici di Napoli siamo cresciuti fino a una rete di 20 sedi in Campania e oltre 1.000 collaboratori, con una parte del team attiva anche da remoto. Una crescita che ci spinge a migliorare ogni giorno processi, strumenti e qualità del servizio.</p>
          <a href="tariffe.php" class="btn-primary">Conosci le nostre soluzioni</a>
        </div>
        <div class="split-img">
          <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=1100&q=85" alt="Installazione di pannelli solari per l'energia rinnovabile" loading="lazy">
          <div class="badge">
            <div class="label">Dal</div>
            <div class="val">Energia</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- STAT STRIP -->
  <div class="stat-strip">
    <div class="stat-grid">
      <div class="stat-item"><div class="n">Energia</div><div class="l">Il nostro settore</div></div>
      <div class="stat-item"><div class="n">20</div><div class="l">Sedi in Campania</div></div>
      <div class="stat-item"><div class="n">1.000+</div><div class="l">Collaboratori</div></div>
      <div class="stat-item"><div class="n">Smart</div><div class="l">Working diffuso</div></div>
    </div>
  </div>

  <!-- REPARTI -->
  <section class="section" style="background:var(--bg-soft);">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri reparti</span>
        <h2 class="section-title">Competenze diverse,<br><span class="ul">un obiettivo comune</span></h2>
        <p class="section-sub">Ogni area contribuisce al risultato con professionalità, coordinamento e strumenti condivisi. È così che trasformiamo le idee in attività efficaci.</p>
      </div>
      <div class="feature-grid">
        <div class="feat-card">
          <div class="ico">👥</div>
          <h4>Risorse Umane</h4>
          <p>Il team HR cura selezione, inserimento e crescita delle persone, creando percorsi capaci di valorizzare attitudini e potenziale.</p>
        </div>
        <div class="feat-card">
          <div class="ico">📞</div>
          <h4>Area Commerciale</h4>
          <p>Costruiamo progetti commerciali su misura e prepariamo consulenti capaci di comunicare le proposte in modo chiaro, corretto e professionale.</p>
        </div>
        <div class="feat-card">
          <div class="ico">🗂️</div>
          <h4>Back Office</h4>
          <p>Coordina le attività operative e amministrative, verifica le informazioni e assicura continuità a ogni fase del servizio.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CULTURA AZIENDALE — dark -->
  <section class="dark-section" style="padding: var(--section) 0;">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow" style="color:var(--primary-light);"><span class="dot" style="background:var(--primary-light);"></span> La nostra cultura aziendale</span>
        <h2 class="section-title" style="color:#fff;">Cresciamo insieme,<br><span style="color:var(--primary-light);">ogni giorno</span></h2>
        <p class="section-sub" style="color:rgba(255,255,255,.75);">In <?= $companyName ?> crediamo in un ambiente che favorisca responsabilità, confronto e apprendimento continuo. Le persone sono il punto di partenza per offrire un servizio di valore.</p>
      </div>
      <div class="feature-grid" style="grid-template-columns: repeat(2, 1fr); max-width: 820px; margin: 0 auto;">
        <div class="feat-card" style="background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12);">
          <div class="ico">📈</div>
          <h4 style="color:#fff;">Imparare sempre</h4>
          <p style="color:rgba(255,255,255,.7);">Offriamo formazione e affiancamento per consolidare competenze, autonomia e qualità del lavoro.</p>
        </div>
        <div class="feat-card" style="background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12);">
          <div class="ico">⚖️</div>
          <h4 style="color:#fff;">Fiducia e rispetto</h4>
          <p style="color:rgba(255,255,255,.7);">Costruiamo relazioni professionali trasparenti, dove impegno e correttezza vengono riconosciuti.</p>
        </div>
        <div class="feat-card" style="background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12);">
          <div class="ico">🤝</div>
          <h4 style="color:#fff;">Lavoro di squadra</h4>
          <p style="color:rgba(255,255,255,.7);">Mettiamo in comune esperienze e punti di vista per affrontare ogni progetto con maggiore efficacia.</p>
        </div>
        <div class="feat-card" style="background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12);">
          <div class="ico">🎯</div>
          <h4 style="color:#fff;">Qualità nel lavoro</h4>
          <p style="color:rgba(255,255,255,.7);">Scegliamo persone preparate e responsabili, orientate a risultati concreti e a un miglioramento costante.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- QUOTE -->
  <section class="section" style="text-align:center;">
    <div class="container" style="max-width:800px;">
      <div style="font-size:64px; color:var(--primary); line-height:1; margin-bottom:24px; font-family:var(--font-display);">"</div>
      <h2 style="font-size:clamp(24px,3.5vw,34px); color:var(--ink); font-weight:700; line-height:1.4; margin:0 0 32px;">Ogni risultato prende forma quando competenze, fiducia e lavoro di squadra vanno nella stessa direzione.</h2>
      <div style="font-family:var(--font-display); font-weight:700; color:var(--primary); font-size:16px;">— Il team <?= $companyName ?></div>
    </div>
  </section>

  <!-- FOTO background / CTA -->
  <section class="photo-section" style="padding: var(--section) 0;">
    <div class="photo-bg" style="background-image: url('https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?auto=format&fit=crop&w=1800&q=85');"></div>
    <div class="photo-overlay"></div>
    <div class="container" style="text-align:center; position:relative; z-index:2;">
      <h2 style="font-family:var(--font-display); font-size:clamp(30px,5vw,50px); font-weight:800; color:#fff; margin:0 0 20px;">Hai bisogno di un orientamento?</h2>
      <p style="font-size:18px; color:rgba(255,255,255,.8); margin:0 auto 36px; max-width:520px; line-height:1.6;">Raccontaci cosa cerchi: partiamo dalle tue esigenze e valutiamo insieme il percorso più adatto.</p>
      <a href="contatti.php" class="btn-primary" style="font-size:17px; padding:16px 44px;">Parla con noi →</a>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
