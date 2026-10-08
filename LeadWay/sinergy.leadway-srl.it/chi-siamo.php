<?php
require __DIR__ . '/_config.php';
$brandName = $LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : ($LANDING_PAGE['titolo'] !== '' ? $LANDING_PAGE['titolo'] : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'EnergyFast'));
$pageTitle = 'Chi Siamo';
$pageDescription = $brandName . ' è un team di consulenti energetici specializzati in soluzioni luce e gas. Conosci il nostro approccio e i nostri valori.';
include __DIR__ . '/header.php';
?>

  <section class="hero" style="min-height: 500px;">
    <div class="hero-slides">
      <div class="hero-slide active">
        <img src="hero_energy_3.png" class="hero-slide-bg" alt="Chi Siamo">
        <div class="container">
          <div class="hero-content">
            <span class="eyebrow eyebrow-light"><span class="dot"></span> Chi siamo</span>
            <h1>Energia con <span class="accent">consapevolezza</span></h1>
            <p class="lede">Un team di consulenti energetici al tuo fianco per orientarti nel mercato libero. Vicini, chiari e sempre disponibili.</p>
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
          <h2 class="section-title" style="text-align:left;">Mercato libero, <span class="accent">scelte più semplici</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:18px; color:var(--muted); line-height:1.75; margin: 0 0 24px;">
            <?= $brandName ?> nasce con un obiettivo preciso: rendere semplice e conveniente il passaggio al mercato libero dell'energia. Ogni giorno selezioniamo per i clienti le opportunità più adatte.
          </p>
          <div class="split-tiles">
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Analisi bolletta</h5>
                <p>Partiamo dai tuoi consumi effettivi.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Zero rischi</h5>
                <p>La fornitura continua senza interruzioni.</p>
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
        <h2 class="section-title">Tre valori, <span class="underline">ogni giorno</span></h2>
        <p class="section-sub">I principi che guidano il rapporto con i clienti, dalla prima chiamata alla gestione della bolletta.</p>
      </div>

      <div class="features-staggered">
        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="feature_luce.png" alt="Trasparenza">
          </div>
          <div class="stagger-content">
            <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/><path d="M21 21l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
            <h4>Trasparenza</h4>
            <p>Nessun costo nascosto e nessuna sorpresa. Spieghiamo ogni proposta in modo dettagliato prima della firma, perché un cliente informato può scegliere con serenità.</p>
          </div>
        </article>

        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="feature_gas.png" alt="Competenza">
          </div>
          <div class="stagger-content">
            <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg></div>
            <h4>Competenza</h4>
            <p>Consulenti formati e costantemente aggiornati sulle norme ARERA e sul mercato energetico. Ti proponiamo soluzioni affidabili e verificate.</p>
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
          <img src="feature_consulenza.png" alt="Analisi bolletta e consulenza">
        </div>

        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> Il nostro approccio</span>
          <h2 class="section-title" style="text-align:left;">Come <span class="underline">ti accompagniamo</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            Il nostro percorso parte dall'ascolto. Analizziamo la bolletta, comprendiamo consumi e profilo (casa, lavoro o piccola impresa) e poi ti presentiamo la proposta del nostro partner <?= $OPERATORE['nome_marketing'] ?> più adatta.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 32px;">
            Gestiamo la documentazione, coordiniamo il passaggio con il distributore locale e ti aggiorniamo durante ogni fase. Il cambio fornitore avviene senza interruzioni.
          </p>
          <a href="contatti.php" class="btn-primary">Parla con un consulente</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Quote finale -->
  <section class="quote-banner">
    <div class="mark">"</div>
    <h2>Il nostro obiettivo non è solo concludere un contratto, ma costruire una relazione di fiducia nel tempo con ogni cliente.</h2>
    <p class="by">— Il Team <?= $brandName ?></p>
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
