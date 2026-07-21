<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
$pageDescription = 'Scopri Sinergy Luce e Gas: un operatore attivo dal 2017 nel mercato libero, con sede a Verona, oltre 200 collaboratori e un approccio basato su chiarezza e supporto continuo.';
include __DIR__ . '/header.php';
?>

  <section class="hero about-hero" style="min-height: 500px;">
    <div class="hero-slides">
      <div class="hero-slide active">
        <img src="hero_energy_1.png" class="hero-slide-bg" alt="Casa efficiente e comfort energetico">
        <div class="container">
          <div class="hero-content">
            <span class="eyebrow eyebrow-light"><span class="dot"></span> Chi siamo</span>
            <h1>Sinergy, energia con <span class="accent">chiarezza</span></h1>
            <p class="lede">Sinergy Luce e Gas e un fornitore che punta su chiarezza, supporto continuo e capacita di mettere a fuoco le esigenze di clienti privati e PMI.</p>
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

  <!-- Mission split -->
  <section class="section about-mission">
    <div class="container">
      <div class="split">
        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> La nostra missione</span>
          <h2 class="section-title" style="text-align:left;">Energia chiara, <span class="accent">supporto continuo</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:18px; color:var(--muted); line-height:1.75; margin: 0 0 24px;">
            Sinergy Luce e Gas entra nel libero mercato dell'energia elettrica e del gas naturale nel 2017, con l'intenzione di diventare un punto di riferimento per le forniture dedicate a privati e PMI.
          </p>
          <div class="split-tiles">
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Chiarezza</h5>
                <p>Tariffe semplici e condizioni leggibili per aiutare il cliente a orientarsi con maggiore sicurezza.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Supporto continuo</h5>
                <p>La soddisfazione del cliente resta al centro grazie a un'assistenza costante nel tempo.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="split-visual reveal">
          <img src="hero_energy_2.png" alt="Impianto fotovoltaico e visione sostenibile">
        </div>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="stat-strip">
    <div class="container">
      <div class="stat-strip-grid">
        <div class="stat-item reveal">
          <div class="n">2017</div>
          <div class="l">Ingresso nel mercato libero</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">200+</div>
          <div class="l">Collaboratori</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">Verona</div>
          <div class="l">Sede aziendale</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">Italia</div>
          <div class="l">Operativita nazionale</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Valori staggered -->
  <section class="section features about-values">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri valori</span>
        <h2 class="section-title">Tre principi, <span class="underline">ogni giorno</span></h2>
        <p class="section-sub">I principi che guidano Sinergy nel rapporto con ogni cliente, dal primo contatto fino alla gestione della fornitura.</p>
      </div>

      <div class="features-staggered">
        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="hero_energy_1.png" alt="Casa efficiente e comfort domestico">
          </div>
          <div class="stagger-content">
            <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/><path d="M21 21l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
            <h4>Trasparenza</h4>
            <p>Condizioni chiare, offerte leggibili e un approccio orientato a rendere ogni scelta più consapevole e lineare.</p>
          </div>
        </article>

        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="chi_siamo_team.png" alt="Team di consulenza energetica al lavoro">
          </div>
          <div class="stagger-content">
            <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg></div>
            <h4>Competenza</h4>
            <p>Lo sviluppo delle competenze interne e l'efficacia dei modelli organizzativi sostengono una crescita costruita con metodo e attenzione al cliente.</p>
          </div>
        </article>
        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="hero_energy_2.png" alt="Energia, innovazione e nuove tecnologie">
          </div>
          <div class="stagger-content">
            <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2v6m0 8v6m10-10h-6M8 12H2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/></svg></div>
            <h4>Innovazione</h4>
            <p>Sinergy mantiene uno sguardo attento verso le nuove tecnologie, ampliando la propria proposta con servizi dedicati all'energia e alle rinnovabili.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Come lavoriamo -->
  <section class="section about-approach">
    <div class="container">
      <div class="split reverse">
        <div class="split-visual reveal">
          <img src="feature_consulenza.png" alt="Analisi bolletta e consulenza energia">
        </div>

        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> Il nostro approccio</span>
          <h2 class="section-title" style="text-align:left;">Come <span class="underline">lavoriamo</span> con te</h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            Il punto di forza di Sinergy e nella capacita di mettere al primo posto la soddisfazione del cliente, garantendo supporto continuo e una proposta fondata su tariffe chiare e semplici.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 32px;">
            L'azienda opera su tutto il territorio nazionale grazie a una rete di oltre 200 collaboratori e continua a investire in partnership, organizzazione e qualita del servizio.
          </p>
          <a href="contatti.php" class="btn-primary">Parla con Sinergy</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Quote finale -->
  <section class="quote-banner about-quote">
    <div class="mark">"</div>
    <h2>Sinergy nasce per essere molto piu di un semplice fornitore: un riferimento affidabile costruito su chiarezza, supporto e competenza.</h2>
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
