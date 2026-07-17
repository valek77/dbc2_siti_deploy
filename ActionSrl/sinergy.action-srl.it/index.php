<?php
require __DIR__ . '/_config.php';
$pageDescription = 'Sinergy Luce e Gas propone offerte luce e gas, soluzioni rinnovabili e supporto continuo per clienti domestici, professionisti e PMI in tutta Italia.';
include __DIR__ . '/header.php';
?>

  <!-- ===== Hero Slider ===== -->
  <section class="hero">
    <div class="hero-slider">
      <div class="hero-slides">
        <div class="hero-slide active">
          <img src="split_home.png" class="hero-slide-bg" alt="Famiglia felice in casa">
          <div class="container">
            <div class="hero-content">
              <span class="eyebrow eyebrow-light"><span class="dot"></span> Sinergy Luce e Gas</span>
              <h1>Rinnoviamo la tua <span class="accent">energia</span>.</h1>
              <p class="lede">Sinergy Luce e Gas mette al centro chiarezza, supporto continuo e offerte dedicate a casa, professionisti e PMI, con una presenza attiva su tutto il territorio nazionale.</p>
              <div class="hero-actions">
                <a href="tariffe.php" class="btn-primary">Scopri le offerte</a>
                <a href="contatti.php" class="btn-secondary">Contatta Sinergy</a>
              </div>
            </div>
          </div>
        </div>
        <div class="hero-slide">
          <img src="hero_energy_2.png" class="hero-slide-bg" alt="Pannelli solari su edificio">
          <div class="container">
            <div class="hero-content">
              <span class="eyebrow eyebrow-light"><span class="dot"></span> Luce, gas e rinnovabili</span>
              <h1>Ancora più <span class="accent">luce, gas, energia</span>.</h1>
              <p class="lede">Dalle offerte per la fornitura di energia alle soluzioni per il fotovoltaico, Sinergy amplia i servizi per accompagnarti ogni giorno con proposte chiare e concrete.</p>
              <div class="hero-actions">
                <a href="tariffe.php" class="btn-primary">Vedi soluzioni</a>
              </div>
            </div>
          </div>
        </div>
        <div class="hero-slide">
          <img src="feature_consulenza.png" class="hero-slide-bg" alt="Consulenza energia personalizzata">
          <div class="container">
            <div class="hero-content">
              <span class="eyebrow eyebrow-light"><span class="dot"></span> Supporto continuo</span>
              <h1>Un fornitore che ascolta le tue <span class="accent">esigenze</span>.</h1>
              <p class="lede">Sinergy punta sulla soddisfazione del cliente con tariffe chiare, supporto costante e una rete di consulenti pronta a seguire ogni fase della fornitura.</p>
              <div class="hero-actions">
                <a href="contatti.php" class="btn-primary">Richiedi informazioni</a>
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

  <!-- ===== Intro Layout ===== -->
  <section class="section">
    <div class="container">
      <div class="split">
        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> Il mondo Sinergy</span>
          <h2 class="section-title" style="text-align:left;">Un punto di riferimento <span class="accent">per luce, gas e servizi energia</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:18px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            Sinergy Luce e Gas opera nel mercato libero dell'energia elettrica e del gas naturale dal 2017, con l'obiettivo di offrire forniture chiare e un supporto continuo a privati e PMI.
          </p>
          <p style="font-size:18px; color:var(--muted); line-height:1.75; margin: 0 0 28px;">
            Con sede a Verona e una rete di oltre 200 collaboratori, Sinergy lavora ogni giorno per coniugare competenza, vicinanza al cliente e attenzione alle nuove tecnologie.
          </p>
          <div class="hero-actions" style="margin-bottom:0;">
            <a href="contatti.php" class="btn-primary">Richiedi una consulenza</a>
            <a href="chi-siamo.php" class="btn-ghost">Conosci Sinergy</a>
          </div>
        </div>

        <div class="reveal">
          <div class="split-tiles" style="margin-top:0;">
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Lettura bolletta</h5>
                <p>Un supporto utile per capire meglio consumi, condizioni economiche e struttura della fornitura.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/><path d="M8 12h8M12 8v8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
              <div>
                <h5>Soluzioni su misura</h5>
                <p>Offerte dedicate a clienti domestici, professionisti e PMI, con percorsi pensati per esigenze diverse.</p>
              </div>
            </div>
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M22 12h-4l-3 8-6-16-3 8H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Attivazione lineare</h5>
                <p>Procedure chiare e assistenza continua per accompagnarti nell'attivazione della nuova fornitura.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M20 7l-8 10-4-4" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Assistenza reale</h5>
                <p>Il cliente resta al centro, con una rete di consulenti pronta a offrire supporto nel tempo.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Stats ===== -->
  <section class="stat-strip">
    <div class="container">
      <div class="stat-strip-grid">
        <div class="stat-item reveal">
          <div class="n">Dal 2017</div>
          <div class="l">Presenza nel mercato libero</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">200+</div>
          <div class="l">Collaboratori sul territorio</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">Privati + PMI</div>
          <div class="l">Clienti serviti</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">Verona</div>
          <div class="l">Sede operativa</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Cosa offriamo ===== -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Cosa offriamo</span>
        <h2 class="section-title">Soluzioni pensate per <span class="underline">energia e continuità</span></h2>
        <p class="section-sub">Offerte luce e gas, supporto al cliente e tecnologie per l'efficienza: l'offerta Sinergy si sviluppa attorno alle esigenze reali di casa e impresa.</p>
      </div>

      <div class="features-staggered">
        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="hero_energy_1.png" alt="Casa efficiente e ben illuminata">
          </div>
          <div class="stagger-content">
            <h4>Offerte Luce</h4>
            <p>Sinergy propone offerte luce con condizioni chiare e un supporto commerciale orientato a rendere la scelta più semplice per clienti domestici e business.</p>
            <a href="tariffe.php" class="btn-ghost" style="margin-top:20px;">Vedi tariffe luce</a>
          </div>
        </article>

        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="feature_gas.png" alt="Cucina domestica con fornitura gas">
          </div>
          <div class="stagger-content">
            <h4>Offerte Gas</h4>
            <p>Le offerte gas sono progettate per unire semplicità, chiarezza contrattuale e assistenza continua durante tutte le fasi della fornitura.</p>
            <a href="tariffe.php" class="btn-ghost" style="margin-top:20px;">Vedi tariffe gas</a>
          </div>
        </article>

        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="feature_consulenza.png" alt="Consulenza energetica personalizzata">
          </div>
          <div class="stagger-content">
            <h4>Rinnovabili e nuove tecnologie</h4>
            <p>Sinergy affianca alle forniture anche soluzioni per il fotovoltaico, i sistemi di accumulo, le pompe di calore, le caldaie a condensazione e i climatizzatori.</p>
            <a href="contatti.php" class="btn-ghost" style="margin-top:20px;">Richiedi informazioni</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ===== Quote Break ===== -->
  <section class="quote-banner">
    <div class="mark">"</div>
    <h2>Sinergy punta su chiarezza, supporto continuo e sulla capacità di mettere a fuoco le esigenze di ogni cliente.</h2>
  </section>

  <!-- ===== How it works ===== -->
  <section class="section how-it-works section-on-dark">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow eyebrow-light"><span class="dot"></span> Come funziona</span>
        <h2 class="section-title">Attivi la nuova fornitura <br>in <span class="accent">4 passi semplici</span></h2>
        <p class="section-sub">Con Sinergy ogni passaggio viene gestito con chiarezza, dalla scelta dell'offerta fino all'attivazione del servizio.</p>
      </div>

      <div class="timeline">
        <div class="timeline-item reveal">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="hiw-num" style="margin-bottom:10px;">01</div>
            <h5>Scegli l'offerta</h5>
            <p>Valuta le soluzioni luce e gas disponibili e individua quella più coerente con il tuo profilo di consumo.</p>
          </div>
        </div>
        <div class="timeline-item reveal">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="hiw-num" style="margin-bottom:10px;">02</div>
            <h5>Confrontati con Sinergy</h5>
            <p>Ricevi supporto per comprendere condizioni, documentazione necessaria e modalità di attivazione.</p>
          </div>
        </div>
        <div class="timeline-item reveal">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="hiw-num" style="margin-bottom:10px;">03</div>
            <h5>Completa la richiesta</h5>
            <p>Invia i dati utili alla pratica e lascia che il team segua l'avanzamento dell'attivazione.</p>
          </div>
        </div>
        <div class="timeline-item reveal">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="hiw-num" style="margin-bottom:10px;">04</div>
            <h5>Sei attivo</h5>
            <p>La fornitura entra in servizio con il supporto continuo di Sinergy anche dopo l'attivazione.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Split: Perché Sinergy ===== -->
  <section class="section">
    <div class="container">
      <div class="split reverse">
        <div class="split-visual reveal">
          <img src="hero_energy_3.png" alt="Monitoraggio intelligente dei consumi energetici">
        </div>

        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> Perché scegliere Sinergy</span>
          <h2 class="section-title" style="text-align:left;">Più chiarezza, <span class="accent">più continuità</span></h2>
          <p style="font-size:17px; color:var(--muted); line-height:1.7; margin: 0 0 18px;">
            Sinergy nasce con l'obiettivo di essere molto più di un semplice fornitore: punta a costruire un rapporto basato su chiarezza, affidabilità e vicinanza concreta al cliente.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.7; margin: 0 0 24px;">
            Tariffe chiare e semplici, promozioni dedicate e attenzione alle nuove tecnologie completano un'offerta costruita per accompagnare privati e PMI nel quotidiano.
          </p>
          <div class="split-tiles">
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M4 12h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M12 4v16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
              <div>
                <h5>Tariffe chiare</h5>
                <p>Condizioni leggibili e offerte pensate per aiutarti a scegliere con maggiore consapevolezza.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 3l7 4v5c0 4.5-3 7.9-7 9-4-1.1-7-4.5-7-9V7l7-4z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Supporto continuo</h5>
                <p>Una rete di consulenti e collaboratori che mette al primo posto la soddisfazione del cliente.</p>
              </div>
            </div>
          </div>
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
            <h3>Energia, supporto e presenza sul territorio</h3>
            <p>Sinergy opera in tutta Italia e continua a crescere puntando su chiarezza, relazioni solide e attenzione alle esigenze concrete dei clienti.</p>
          </div>
          <div class="big">200+<small></small></div>
        </div>
        <div class="rv-cards">
          <div class="rv-card">
            <div class="quote">"</div>
            <div class="stars">★★★★★</div>
            <h5>Privati</h5>
            <p>Offerte e supporto pensati per accompagnare le famiglie nella gestione quotidiana della fornitura luce e gas.</p>
            <div class="author">
              <div class="avatar">SI</div>
              <div>
                <div class="author-name">Sinergy</div>
                <div class="author-meta">Offerte Casa</div>
              </div>
            </div>
          </div>
          <div class="rv-card">
            <div class="quote">"</div>
            <div class="stars">★★★★★</div>
            <h5>PMI e business</h5>
            <p>Una proposta commerciale costruita per imprese e professionisti che cercano chiarezza, continuità e un referente affidabile.</p>
            <div class="author">
              <div class="avatar">BG</div>
              <div>
                <div class="author-name">Sinergy</div>
                <div class="author-meta">Offerte Business</div>
              </div>
            </div>
          </div>
          <div class="rv-card">
            <div class="quote">"</div>
            <div class="stars">★★★★★</div>
            <h5>Nuove tecnologie</h5>
            <p>Fotovoltaico, accumulo, pompe di calore e climatizzazione ampliano il perimetro dei servizi dedicati all'energia.</p>
            <div class="author">
              <div class="avatar">RE</div>
              <div>
                <div class="author-name">Sinergy</div>
                <div class="author-meta">Rinnovabili</div>
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
      <h2>Contatta Sinergy e scopri la soluzione più adatta.</h2>
      <p>Esplora le offerte disponibili oppure richiedi un contatto per ricevere supporto su forniture luce, gas e servizi dedicati all'energia.</p>
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
