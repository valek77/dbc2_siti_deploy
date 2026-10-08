<?php
require __DIR__ . '/_config.php';
$brandName = $LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : ($LANDING_PAGE['titolo'] !== '' ? $LANDING_PAGE['titolo'] : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'EnergyFast'));
$pageTitle = 'Energia Luce e Gas per la tua casa';
$pageDescription = $brandName . ' ti aiuta a trovare soluzioni per luce e gas. Scopri le proposte per casa e azienda, con prezzi chiari e assistenza dedicata.';
include __DIR__ . '/header.php';
?>

  <!-- ===== Hero Slider ===== -->
  <section class="hero">
    <div class="hero-slider">
      <div class="hero-slides">
        <div class="hero-slide active">
          <img src="hero_energy_1.png" class="hero-slide-bg" alt="Energia per la casa">
          <div class="container">
            <div class="hero-content">
              <span class="eyebrow eyebrow-light"><span class="dot"></span> Partner ufficiale <?= $OPERATORE['nome_marketing'] ?></span>
              <h1>Energia <span class="accent">chiara</span>, bolletta più leggera.</h1>
              <p class="lede"><?= $brandName ?> ti accompagna nel mercato libero con proposte trasparenti, prezzi indicizzati al mercato e meno burocrazia.</p>
              <div class="hero-actions">
                <a href="tariffe.php" class="btn-primary">Scopri le offerte</a>
                <a href="contatti.php" class="btn-secondary">Parla con noi</a>
              </div>
            </div>
          </div>
        </div>
        <div class="hero-slide">
          <img src="hero_energy_2.png" class="hero-slide-bg" alt="Pannelli Solari">
          <div class="container">
            <div class="hero-content">
              <span class="eyebrow eyebrow-light"><span class="dot"></span> Sostenibilità</span>
              <h1>Il tuo futuro diventa <span class="accent">sostenibile</span>.</h1>
              <p class="lede">Scopri soluzioni innovative per migliorare l'efficienza energetica della tua casa o della tua azienda.</p>
              <div class="hero-actions">
                <a href="tariffe.php" class="btn-primary">Vedi soluzioni</a>
              </div>
            </div>
          </div>
        </div>
        <div class="hero-slide">
          <img src="hero_energy_3.png" class="hero-slide-bg" alt="Smart Energy">
          <div class="container">
            <div class="hero-content">
              <span class="eyebrow eyebrow-light"><span class="dot"></span> Risparmio intelligente</span>
              <h1>Gestisci la tua <span class="accent">energia</span> in modo semplice.</h1>
              <p class="lede">Tieni sotto controllo i consumi e ottieni ogni mese un risparmio concreto in bolletta.</p>
              <div class="hero-actions">
                <a href="contatti.php" class="btn-primary">Richiedi analisi gratuita</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-slider-dots">
        <button class="hero-dot active" data-slide="0"></button>
        <button class="hero-dot" data-slide="1"></button>
        <button class="hero-dot" data-slide="2"></button>
      </div>
    </div>
    <div class="hero-wave">
      <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path d="M0,40L80,46C160,52,320,64,480,60C640,56,800,36,960,32C1120,28,1280,40,1360,46L1440,52L1440,80L0,80Z"/>
      </svg>
    </div>
  </section>

  <!-- ===== Trust marquee ===== -->
  <section class="trust-strip">
    <div class="trust-track">
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-4z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Contratti certificati ARERA</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg> Partner <?= $OPERATORE['nome_marketing'] ?></span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M22 16.92V20a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 015 13.18 19.79 19.79 0 011.92 4.55 2 2 0 013.92 2.5h3.08a2 2 0 012 1.72c.13.96.36 1.9.69 2.8a2 2 0 01-.45 2.11L8.09 10.5a16 16 0 006 6l1.37-1.15a2 2 0 012.11-.45c.9.33 1.84.56 2.8.69a2 2 0 011.72 2.03z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg> Assistenza multicanale</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2v6m0 8v6m10-10h-6M8 12H2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/></svg> Nessuna interruzione di fornitura</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M8 12l3 3 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Consulenza gratuita</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-4z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Contratti certificati ARERA</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg> Partner <?= $OPERATORE['nome_marketing'] ?></span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M22 16.92V20a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 015 13.18 19.79 19.79 0 011.92 4.55 2 2 0 013.92 2.5h3.08a2 2 0 012 1.72c.13.96.36 1.9.69 2.8a2 2 0 01-.45 2.11L8.09 10.5a16 16 0 006 6l1.37-1.15a2 2 0 012.11-.45c.9.33 1.84.56 2.8.69a2 2 0 011.72 2.03z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg> Assistenza multicanale</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M8 12l3 3 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Consulenza gratuita</span>
    </div>
  </section>

  <!-- ===== Cosa offriamo ===== -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Cosa offriamo</span>
        <h2 class="section-title">Tre servizi, <span class="underline">un unico impegno</span></h2>
        <p class="section-sub">Ti aiutiamo a scegliere la tariffa più adatta e restiamo al tuo fianco dalla firma alla bolletta.</p>
      </div>

      <div class="features-staggered">
        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="feature_luce.png" alt="Offerte Luce">
          </div>
          <div class="stagger-content">
            <h4>Offerte Luce</h4>
            <p>Tariffe variabili indicizzate al PUN e proposte a prezzo fisso per 12 mesi, pensate per uso domestico e professionale. Costi chiari e nessuna interruzione.</p>
            <a href="tariffe.php" class="btn-ghost" style="margin-top:20px;">Vedi tariffe luce</a>
          </div>
        </article>

        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="feature_gas.png" alt="Offerte Gas">
          </div>
          <div class="stagger-content">
            <h4>Offerte Gas</h4>
            <p>Forniture gas con prezzo legato al PSV. Soluzioni per casa, lavoro e imprese, con attivazione veloce e senza interventi tecnici a domicilio.</p>
            <a href="tariffe.php" class="btn-ghost" style="margin-top:20px;">Vedi tariffe gas</a>
          </div>
        </article>

        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="feature_consulenza.png" alt="Consulenza gratuita">
          </div>
          <div class="stagger-content">
            <h4>Consulenza gratuita</h4>
            <p>Esaminiamo la tua bolletta e individuiamo in pochi minuti la proposta più conveniente. Senza impegno, costi nascosti o vincoli.</p>
            <a href="contatti.php" class="btn-ghost" style="margin-top:20px;">Analizza la mia bolletta</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ===== How it works ===== -->
  <section class="section how-it-works section-on-dark">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow eyebrow-light"><span class="dot"></span> Come funziona</span>
        <h2 class="section-title">Attiva la nuova fornitura <br>in <span class="accent">4 passaggi facili</span></h2>
        <p class="section-sub">Passare a <?= $OPERATORE['nome_marketing'] ?> è semplice, rapido e non richiede interventi tecnici a casa.</p>
      </div>

      <div class="timeline">
        <div class="timeline-item reveal">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="hiw-num" style="margin-bottom:10px;">01</div>
            <h5>Scegli l'offerta</h5>
            <p>Metti a confronto le tariffe Luce e Gas di <?= $OPERATORE['nome_marketing'] ?> e trova quella più adatta alle tue esigenze.</p>
          </div>
        </div>
        <div class="timeline-item reveal">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="hiw-num" style="margin-bottom:10px;">02</div>
            <h5>Parla con noi</h5>
            <p>Un consulente ti richiama, ti accompagna nella compilazione e chiarisce ogni tuo dubbio.</p>
          </div>
        </div>
        <div class="timeline-item reveal">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="hiw-num" style="margin-bottom:10px;">03</div>
            <h5>Invia la bolletta</h5>
            <p>Gestiamo noi la pratica con il precedente fornitore, riducendo al minimo stress e burocrazia.</p>
          </div>
        </div>
        <div class="timeline-item reveal">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="hiw-num" style="margin-bottom:10px;">04</div>
            <h5>Sei attivo</h5>
            <p>La nuova fornitura si attiva automaticamente, senza interruzioni e senza tecnici a casa.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Split: Perché noi ===== -->
  <section class="section">
    <div class="container">
      <div class="split reverse">
        <div class="split-visual reveal">
          <img src="split_home.png" alt="Comfort domestico e risparmio">
        </div>

        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> Perché scegliere <?= $brandName ?></span>
          <h2 class="section-title" style="text-align:left;">Risparmio concreto, <span class="accent">supporto sempre presente</span></h2>
          <p style="font-size:17px; color:var(--muted); line-height:1.7; margin: 0 0 18px;">
            Non siamo un semplice punto vendita: siamo consulenti energetici. Per ogni cliente cerchiamo la soluzione più adatta, con costi chiari e nessuna sorpresa in bolletta.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.7; margin: 0 0 24px;">
            Con il nostro partner <?= $OPERATORE['nome_marketing'] ?> puoi scegliere tra proposte a prezzo variabile indicizzato al mercato e soluzioni a prezzo fisso garantito per 12 mesi.
          </p>
          <a href="chi-siamo.php" class="btn-ghost">Scopri di più su di noi</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Reviews ===== -->
  <section class="section reviews">
    <div class="container">
      <div class="reviews-grid">
        <div class="rv-panel">
          <div>
            <div class="stars">★★★★★</div>
            <h3>La fiducia dei nostri clienti</h3>
            <p>Migliaia di famiglie e imprese hanno scelto i nostri partner per gestire la propria fornitura di energia.</p>
          </div>
          <div class="big">4,9<small>/5</small></div>
        </div>
        <div class="rv-cards">
          <div class="rv-card">
            <div class="quote">"</div>
            <div class="stars">★★★★★</div>
            <h5>Passaggio rapido</h5>
            <p>Ho cambiato fornitore in meno di una settimana. Il consulente mi ha accompagnato passo dopo passo.</p>
            <div class="author">
              <div class="avatar">SB</div>
              <div>
                <div class="author-name">Simone B.</div>
                <div class="author-meta">Cliente Luce Casa</div>
              </div>
            </div>
          </div>
          <div class="rv-card">
            <div class="quote">"</div>
            <div class="stars">★★★★★</div>
            <h5>Un risparmio reale</h5>
            <p>La bolletta è diminuita di circa il 15% rispetto al vecchio fornitore. Consulenza ottima e prezzi chiari.</p>
            <div class="author">
              <div class="avatar">LM</div>
              <div>
                <div class="author-name">Laura M.</div>
                <div class="author-meta">Cliente Luce + Gas</div>
              </div>
            </div>
          </div>
          <div class="rv-card">
            <div class="quote">"</div>
            <div class="stars">★★★★★</div>
            <h5>Consulenza chiara</h5>
            <p>Mi hanno illustrato bene le differenze tra RID e bollettino, aiutandomi a scegliere la soluzione giusta.</p>
            <div class="author">
              <div class="avatar">RT</div>
              <div>
                <div class="author-name">Roberto T.</div>
                <div class="author-meta">Cliente Gas Lavoro</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Final CTA ===== -->
  <section class="cta-final">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Pronto a partire?</span>
      <h2>Più chiarezza, bollette più leggere.</h2>
      <p>Richiedi una consulenza gratuita: ti richiamiamo entro 24 ore lavorative per trovare insieme la soluzione più adatta.</p>
      <div class="actions">
        <a href="tariffe.php" class="btn-primary">Vedi tutte le offerte
          <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a href="contatti.php" class="btn-secondary">Contattaci ora</a>
      </div>
    </div>
  </section>

<?php
$pageScripts = <<<'HTML'
  <script>
    // Hero Slider
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    const totalSlides = slides.length;

    function showSlide(index) {
      slides.forEach(s => s.classList.remove('active'));
      dots.forEach(d => d.classList.remove('active'));
      slides[index].classList.add('active');
      dots[index].classList.add('active');
      currentSlide = index;
    }

    function nextSlide() {
      let next = (currentSlide + 1) % totalSlides;
      showSlide(next);
    }

    let sliderInterval = setInterval(nextSlide, 5000);

    dots.forEach((dot, i) => {
      dot.addEventListener('click', () => {
        clearInterval(sliderInterval);
        showSlide(i);
        sliderInterval = setInterval(nextSlide, 5000);
      });
    });

    // Reveal on scroll
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));
  </script>
HTML;
include __DIR__ . '/footer.php';
?>
