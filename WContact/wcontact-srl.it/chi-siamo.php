<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
$pageDescription = 'Team di consulenti energetici specializzati nelle offerte di luce e gas. Scopri la nostra storia e i nostri valori.';
include __DIR__ . '/header.php';
?>

  <!-- Page hero -->
  <section class="page-hero">
    <div class="container">
      <span class="eyebrow"><span class="dot"></span> Chi siamo</span>
      <h1>Energia con <span class="accent">competenza</span></h1>
      <p>Un team di consulenti energetici al tuo fianco per semplificare il mercato libero dell'energia. Vicini, trasparenti, sempre.</p>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

  <!-- Mission split -->
  <section class="section">
    <div class="container">
      <div class="split">
        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> La nostra missione</span>
          <h2 class="section-title" style="text-align:left;">Mercato libero, <span class="accent">scelta libera</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:18px; color:var(--muted); line-height:1.75; margin: 0 0 24px;">
            <?= $brandName ?> nasce con un obiettivo preciso: rendere semplice e conveniente il passaggio al mercato libero dell'energia. Lavoriamo ogni giorno per portare ai clienti le migliori tariffe disponibili.
          </p>
          <div class="split-tiles">
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Zero rischi</h5>
                <p>Nessuna interruzione di fornitura.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/><path d="M21 21l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
              <div>
                <h5>Analisi bolletta</h5>
                <p>Verifichiamo i tuoi consumi reali.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="split-visual reveal">
          <img src="chi_siamo_team.jpg" alt="Il nostro team di esperti">
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

  <!-- Valori -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri valori</span>
        <h2 class="section-title">Tre principi, <span class="underline">ogni giorno</span></h2>
        <p class="section-sub">Quello che ci guida nel rapporto con i clienti, dalla prima telefonata alla bolletta.</p>
      </div>

      <div class="features-container">
        <article class="feature-card reveal">
          <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/><path d="M21 21l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
          <h4>Trasparenza</h4>
          <p>Nessun costo nascosto, nessuna sorpresa. Ogni offerta viene spiegata nel dettaglio prima della firma.</p>
        </article>

        <article class="feature-card reveal">
          <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg></div>
          <h4>Competenza</h4>
          <p>Consulenti formati e aggiornati sulle normative ARERA e sulle dinamiche del mercato energetico.</p>
        </article>

        <article class="feature-card reveal">
          <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>Affidabilità</h4>
          <p>Ti seguiamo in ogni fase: dalla scelta dell'offerta all'attivazione della fornitura.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Come lavoriamo -->
  <section class="section">
    <div class="container">
      <div class="split reverse">
        <div class="split-visual reveal">
          <img src="feature_consulenza.jpg" alt="Consulenza dedicata al cliente">
        </div>

        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> Il nostro approccio</span>
          <h2 class="section-title" style="text-align:left;">Come <span class="underline">lavoriamo</span> con te</h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            Il nostro processo parte sempre dall'ascolto. Analizziamo la tua bolletta attuale, capiamo consumi e profilo e solo allora ti proponiamo l'offerta <?= $brandName ?> più adatta.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 32px;">
            Ci occupiamo di tutta la documentazione, coordiniamo il passaggio con il distributore locale e ti teniamo aggiornato su ogni fase. Il cambio fornitore avviene senza interruzioni.
          </p>
          <a href="contatti.php" class="btn-primary">Parla con un consulente
            <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Quote finale -->
  <section class="quote-banner">
    <div class="mark">"</div>
    <h2>Il nostro obiettivo non è chiudere un contratto, ma costruire una relazione di fiducia duratura con ogni cliente che si affida a noi.</h2>
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
