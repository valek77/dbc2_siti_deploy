<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
$pageDescription = 'Action e una societa specializzata nella consulenza energetica per offerte luce e gas, con un approccio chiaro, pratico e orientato al cliente.';
include __DIR__ . '/header.php';
?>

  <section class="hero" style="min-height: 500px;">
    <div class="hero-slides">
      <div class="hero-slide active">
        <img src="hero_energy_1.png" class="hero-slide-bg" alt="Casa efficiente e comfort energetico">
        <div class="container">
          <div class="hero-content">
            <span class="eyebrow eyebrow-light"><span class="dot"></span> Chi siamo</span>
            <h1>Action, energia con <span class="accent">competenza</span></h1>
            <p class="lede">Siamo una societa che opera nel settore energia e accompagna clienti privati e business nella scelta di forniture luce e gas piu consapevoli.</p>
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
  <section class="section">
    <div class="container">
      <div class="split">
        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> La nostra missione</span>
          <h2 class="section-title" style="text-align:left;">Energia semplice, <span class="accent">supporto concreto</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:18px; color:var(--muted); line-height:1.75; margin: 0 0 24px;">
            Action nasce per rendere piu chiaro il mercato dell'energia. Il nostro lavoro consiste nell'ascoltare il cliente, leggere i consumi, spiegare le differenze tra le offerte e accompagnare ogni scelta con attenzione.
          </p>
          <div class="split-tiles">
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Analisi bolletta</h5>
                <p>Studiamo i consumi reali prima di proporre qualsiasi soluzione.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Zero rischi</h5>
                <p>Gestiamo il cambio fornitore senza interruzioni del servizio.</p>
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
          <div class="n">5.000+</div>
          <div class="l">Contratti attivati</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">24h</div>
          <div class="l">Risposta garantita</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">8</div>
          <div class="l">Offerte disponibili</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">€0</div>
          <div class="l">Costo consulenza</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Valori staggered -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri valori</span>
        <h2 class="section-title">Tre principi, <span class="underline">ogni giorno</span></h2>
        <p class="section-sub">I principi che guidano Action nel rapporto con ogni cliente, dal primo contatto fino all'attivazione.</p>
      </div>

      <div class="features-staggered">
        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="hero_energy_1.png" alt="Casa efficiente e comfort domestico">
          </div>
          <div class="stagger-content">
            <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/><path d="M21 21l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
            <h4>Trasparenza</h4>
            <p>Spieghiamo condizioni, costi e caratteristiche delle offerte in modo comprensibile, per aiutarti a scegliere senza dubbi e senza sorprese successive.</p>
          </div>
        </article>

        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="chi_siamo_team.png" alt="Team di consulenza energetica al lavoro">
          </div>
          <div class="stagger-content">
            <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg></div>
            <h4>Competenza</h4>
            <p>Il team Action segue con attenzione l'evoluzione del mercato energia e lavora con metodo, cosi da proporre soluzioni affidabili e coerenti con il profilo del cliente.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Come lavoriamo -->
  <section class="section">
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
            Il nostro processo parte sempre dall'ascolto. Analizziamo la tua bolletta attuale, comprendiamo abitudini di consumo e obiettivi di spesa, e solo dopo individuiamo la soluzione luce o gas piu adatta.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 32px;">
            Action segue la documentazione, ti aggiorna sui passaggi operativi e resta disponibile anche dopo l'attivazione, per offrirti continuita e un riferimento chiaro nel tempo.
          </p>
          <a href="contatti.php" class="btn-primary">Parla con un consulente</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Quote finale -->
  <section class="quote-banner">
    <div class="mark">"</div>
    <h2>L'obiettivo di Action non e solo proporre energia, ma costruire un rapporto di fiducia basato su chiarezza, ascolto e assistenza reale.</h2>
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
