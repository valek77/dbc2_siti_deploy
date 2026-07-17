<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
$pageDescription = 'Gruppo Grimaldi è un\'azienda esperta nel teleselling outbound, specializzata in campagne personalizzate e ad alto valore aggiunto per le imprese. Attivi dal 2012 nel settore Contact Center per energia e telecomunicazioni.';
include __DIR__ . '/header.php';
// Ragione sociale dall'API (company_name), mai il nome commerciale.
$companyName = $COMPANY['company_name'];
?>

  <section class="hero" style="min-height: 500px;">
    <div class="hero-slides">
      <div class="hero-slide active">
        <img src="hero_energy_3.png" class="hero-slide-bg" alt="Chi Siamo">
        <div class="container">
          <div class="hero-content">
            <span class="eyebrow eyebrow-light"><span class="dot"></span> Chi siamo</span>
            <h1>Esperti nel <span class="accent">teleselling outbound</span></h1>
            <p class="lede">Campagne personalizzate e ad alto valore aggiunto per le imprese che vogliono incrementare le vendite e rafforzare le relazioni con i propri clienti.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="hero-wave">
      <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path d="M0,40L80,46C160,52,320,64,480,60C640,56,800,36,960,32C1120,28,1280,40,1360,46L1440,52L1440,80L0,80Z"/>
      </svg>
    </div>
  </section>

  <!-- Storia split -->
  <section class="section">
    <div class="container">
      <div class="split">
        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> La nostra storia</span>
          <h2 class="section-title" style="text-align:left;">Un percorso iniziato <span class="accent">nel 2012</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:18px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            <?= $companyName ?> è un'azienda esperta nel teleselling outbound, specializzata nella realizzazione di campagne personalizzate e ad alto valore aggiunto per le imprese che vogliono incrementare le vendite e rafforzare le relazioni con i propri clienti.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 24px;">
            Abbiamo intrapreso il nostro percorso nel 2012 con l'obiettivo di affermarci come realtà di riferimento nel settore del teleselling e dei Contact Center per l'energia e le telecomunicazioni. Forniamo alle nostre risorse strategia, visione e strumenti operativi evoluti per eccellere nel mercato.
          </p>
          <div class="split-tiles">
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Campagne su misura</h5>
                <p>Progettate sulle esigenze di ogni impresa.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2l2.9 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77 5.82 21l1.18-6.86-5-4.87 7.1-1.01z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Alto valore aggiunto</h5>
                <p>Campagne complesse e altamente performanti.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="split-visual reveal">
          <img src="chi_siamo_team.png" alt="Il nostro team di esperti">
        </div>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="stat-strip">
    <div class="container">
      <div class="stat-strip-grid">
        <div class="stat-item reveal">
          <div class="n">2012</div>
          <div class="l">Anno di nascita</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">Outbound</div>
          <div class="l">Teleselling specializzato</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">Su misura</div>
          <div class="l">Campagne personalizzate</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">Energia &amp; TLC</div>
          <div class="l">Settori di riferimento</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Reparti -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri reparti</span>
        <h2 class="section-title">Persone, ruoli, <span class="underline">risultati</span></h2>
        <p class="section-sub">Forniamo alle nostre risorse strategia, visione e strumenti operativi evoluti per eccellere nel mercato. Ogni reparto è un tassello della nostra operatività.</p>
      </div>

      <div class="features-container">
        <article class="feature-card reveal">
          <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0122 16.92z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h4>Reparto Teleselling</h4>
          <p>Ogni progetto di teleselling viene studiato e realizzato su misura. Grazie alla nostra consolidata esperienza siamo in grado di progettare campagne complesse e altamente performanti, selezionando e formando professionisti qualificati che rappresentano il cuore della nostra operatività.</p>
        </article>
        <article class="feature-card reveal">
          <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>Back Office</h4>
          <p>Il reparto Back Office costituisce il pilastro organizzativo e amministrativo della nostra struttura. Assicura il corretto supporto operativo e gestionale, garantendo efficienza e qualità nell'esecuzione di tutti i progetti.</p>
        </article>
        <article class="feature-card reveal">
          <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
          <h4>Responsabile HR</h4>
          <p>I nostri Responsabili delle Risorse Umane rivestono un ruolo strategico. Attraverso un'attenta selezione e valorizzazione delle persone contribuiscono a mantenere elevati standard professionali e un vantaggio competitivo sul mercato.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Cultura aziendale -->
  <section class="section">
    <div class="container">
      <div class="split reverse">
        <div class="split-visual reveal">
          <img src="feature_consulenza.png" alt="Il nostro team al lavoro">
        </div>

        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> La nostra cultura aziendale</span>
          <h2 class="section-title" style="text-align:left;">Le persone al <span class="underline">centro</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            In <?= $companyName ?> le persone rappresentano il fulcro della nostra organizzazione. La nostra cultura aziendale si fonda sulla valorizzazione delle risorse umane, sulla formazione continua e sullo sviluppo professionale.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0;">
            Siamo convinti che solo attraverso l'eccellenza delle nostre persone e un approccio professionale sia possibile offrire un servizio di qualità superiore ai nostri clienti e consolidare la nostra posizione come azienda esperta nel teleselling.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Pilastri -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri pilastri</span>
        <h2 class="section-title">Quattro principi, <span class="underline">un approccio</span></h2>
      </div>

      <div class="features-container" style="grid-template-columns: repeat(2, 1fr); max-width: 860px; margin: 0 auto;">
        <article class="feature-card reveal">
          <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 14l4-4 3 3 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h4>Sviluppo e Formazione</h4>
          <p>Investiamo costantemente nella crescita professionale dei nostri collaboratori attraverso programmi di formazione specifici per il settore del teleselling.</p>
        </article>
        <article class="feature-card reveal">
          <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2l2 6h6l-5 4 2 6-5-4-5 4 2-6-5-4h6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>Meritocrazia e Rispetto</h4>
          <p>Promuoviamo un ambiente basato sul riconoscimento del merito, sulla correttezza e sul rispetto reciproco.</p>
        </article>
        <article class="feature-card reveal">
          <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><circle cx="9" cy="7" r="3" stroke="currentColor" stroke-width="2"/><circle cx="17" cy="9" r="3" stroke="currentColor" stroke-width="2"/><path d="M3 20a6 6 0 0112 0M13 20a6 6 0 018-5.66" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
          <h4>Collaborazione</h4>
          <p>Favoriamo il lavoro di squadra e la sinergia tra i vari reparti per il raggiungimento degli obiettivi comuni.</p>
        </article>
        <article class="feature-card reveal">
          <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg></div>
          <h4>Professionalità e Risultato</h4>
          <p>Selezioniamo e valorizziamo persone competenti, proattive e fortemente orientate al raggiungimento di risultati concreti.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Quote finale -->
  <section class="quote-banner">
    <div class="mark">"</div>
    <h2>Il successo di <?= $companyName ?> nasce dalle persone, dall'impegno e dalla professionalità di chi lavora, ha lavorato o lavorerà con noi.</h2>
  </section>

<?php
$pageScripts = <<<'HTML'
  <script>
    // Reveal on scroll
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));
  </script>
HTML;
include __DIR__ . '/footer.php';
?>
