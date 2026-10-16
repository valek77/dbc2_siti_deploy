<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
include __DIR__ . '/header.php';
?>

  <section class="about-hero">
    <div class="container about-hero-grid">
      <div class="about-hero-copy">
        <span class="eyebrow"><span class="dot"></span> Chi siamo</span>
        <h1>Più chiarezza. <span class="accent">Più energia.</span></h1>
        <p>Aiutiamo famiglie e imprese a orientarsi nel mercato libero con consulenza concreta, parole semplici e soluzioni costruite sui consumi reali.</p>
        <a href="contatti.php" class="btn-primary">Conosciamoci</a>
      </div>
      <div class="about-hero-visual">
        <img src="about_consulenza_green.png" alt="Consulenza energetica in casa">
        <div class="about-hero-badge"><strong>Prima le persone</strong><span>Il contratto viene dopo.</span></div>
      </div>
    </div>
  </section>

  <!-- Mission split -->
  <section class="section">
    <div class="container">
      <div class="split">
        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> La nostra missione</span>
          <h2 class="section-title" style="text-align:left;">L’energia diventa semplice quando <span class="accent">qualcuno te la spiega</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:18px; color:var(--muted); line-height:1.75; margin: 0 0 24px;">
            <?= $brandName ?> nasce per togliere complessità a un mondo che spesso sembra difficile. Partiamo dalla tua situazione, leggiamo i consumi e trasformiamo i numeri della bolletta in una scelta consapevole.
          </p>
          <div class="split-tiles">
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Partiamo dai dati</h5>
                <p>Leggiamo insieme la tua bolletta.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Ti accompagniamo</h5>
                <p>Nessuna interruzione, nessun salto nel buio.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="split-visual reveal">
          <img src="about_consulenza_green.png" alt="Consulente energetica con una famiglia">
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
  <section class="section features about-values">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri valori</span>
        <h2 class="section-title">Il nostro modo di lavorare, <span class="underline">prima di tutto</span></h2>
        <p class="section-sub">Un metodo fatto di ascolto, competenza e presenza: perché scegliere energia è anche scegliere di chi fidarsi.</p>
      </div>

      <div class="features-staggered">
        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="feature_luce.png" alt="Trasparenza">
          </div>
          <div class="stagger-content">
            <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/><path d="M21 21l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
            <h4>Parole semplici</h4>
            <p>Spieghiamo ogni voce dell’offerta prima della firma. Niente formule incomprensibili, niente promesse vaghe: sai sempre cosa stai scegliendo.</p>
          </div>
        </article>

        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="feature_gas.png" alt="Competenza">
          </div>
          <div class="stagger-content">
            <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg></div>
            <h4>Scelte consapevoli</h4>
            <p>Studiamo consumi, abitudini e obiettivi per proporti una soluzione sostenibile nel tempo, aggiornata e adatta alla tua realtà.</p>
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
          <h2 class="section-title" style="text-align:left;">Come <span class="underline">lavoriamo</span> con te</h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            Il nostro processo parte sempre dall’ascolto. Analizziamo la bolletta, capiamo consumi e abitudini e solo allora ti proponiamo l’offerta <?= $brandName ?> più adatta.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 32px;">
            Dalla documentazione all’attivazione ti teniamo aggiornato su ogni passaggio. Tu hai un riferimento chiaro, noi ci occupiamo della parte operativa.
          </p>
          <a href="contatti.php" class="btn-primary">Parla con un consulente</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Quote finale -->
  <section class="quote-banner">
    <div class="mark">"</div>
      <h2>La nostra idea di energia è semplice: una scelta chiara oggi, una relazione di fiducia anche domani.</h2>
    <p class="by">— Il Team Energia Sostenibile</p>
  </section>

  <script>
    // Reveal on scroll
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));
  </script>

<?php include __DIR__ . '/footer.php'; ?>
