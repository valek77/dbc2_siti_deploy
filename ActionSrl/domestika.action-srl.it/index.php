<?php
require __DIR__ . '/_config.php';
$pageDescription = 'Action ti accompagna nella scelta di offerte luce e gas per casa e impresa, con consulenza energetica chiara e assistenza dedicata.';
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
              <span class="eyebrow eyebrow-light"><span class="dot"></span> Action consulenza energia</span>
              <h1>Energia <span class="accent">chiara</span>, scelte più semplici.</h1>
              <p class="lede">Action ti aiuta a valutare le migliori soluzioni luce e gas per casa, ufficio e impresa, con supporto concreto e spiegazioni sempre trasparenti.</p>
              <div class="hero-actions">
                <a href="tariffe.php" class="btn-primary">Scopri le offerte</a>
                <a href="contatti.php" class="btn-secondary">Parla con noi</a>
              </div>
            </div>
          </div>
        </div>
        <div class="hero-slide">
          <img src="hero_energy_2.png" class="hero-slide-bg" alt="Pannelli solari su edificio">
          <div class="container">
            <div class="hero-content">
              <span class="eyebrow eyebrow-light"><span class="dot"></span> Efficienza e risparmio</span>
              <h1>Più controllo sui <span class="accent">consumi</span>.</h1>
              <p class="lede">Con Action trovi consulenza energetica orientata al risparmio, per scegliere offerte coerenti con le tue abitudini e con il tuo budget.</p>
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
              <span class="eyebrow eyebrow-light"><span class="dot"></span> Supporto dedicato</span>
              <h1>La tua <span class="accent">energia</span>, seguita meglio.</h1>
              <p class="lede">Dall'analisi della bolletta alla scelta della tariffa, Action resta al tuo fianco in ogni fase del cambio fornitore.</p>
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

  <!-- ===== Intro Layout ===== -->
  <section class="section">
    <div class="container">
      <div class="split">
        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> Consulenza Action</span>
          <h2 class="section-title" style="text-align:left;">Un punto di riferimento <span class="accent">per luce e gas</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:18px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            Action aiuta famiglie, professionisti e imprese a orientarsi nel mercato dell'energia con un approccio semplice: ascolto, analisi della bolletta e proposta chiara.
          </p>
          <p style="font-size:18px; color:var(--muted); line-height:1.75; margin: 0 0 28px;">
            Ti accompagniamo dalla valutazione iniziale fino all'attivazione della nuova fornitura, con assistenza concreta e senza passaggi complicati.
          </p>
          <div class="hero-actions" style="margin-bottom:0;">
            <a href="contatti.php" class="btn-primary">Richiedi una consulenza</a>
            <a href="chi-siamo.php" class="btn-ghost">Conosci Action</a>
          </div>
        </div>

        <div class="reveal">
          <div class="split-tiles" style="margin-top:0;">
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Lettura bolletta</h5>
                <p>Analizziamo consumi, potenza e spesa reale prima di suggerire un'offerta.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/><path d="M8 12h8M12 8v8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
              <div>
                <h5>Soluzioni su misura</h5>
                <p>Casa, ufficio o impresa: la proposta cambia in base alle tue esigenze.</p>
              </div>
            </div>
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M22 12h-4l-3 8-6-16-3 8H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Attivazione lineare</h5>
                <p>Seguiamo il cambio fornitore senza interruzioni e senza stress operativo.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M20 7l-8 10-4-4" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Assistenza reale</h5>
                <p>Restiamo disponibili anche dopo l'attivazione per dubbi e chiarimenti.</p>
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
          <div class="n">5.000+</div>
          <div class="l">Richieste gestite</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">24h</div>
          <div class="l">Tempo medio di contatto</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">Casa + Business</div>
          <div class="l">Profili seguiti</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">€0</div>
          <div class="l">Costo della consulenza</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Cosa offriamo ===== -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Cosa offriamo</span>
        <h2 class="section-title">Servizi pensati per <span class="underline">semplificare</span></h2>
        <p class="section-sub">Dalla scelta dell'offerta alla gestione della pratica, ogni passaggio viene reso più chiaro e più leggero.</p>
      </div>

      <div class="features-staggered">
        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="hero_energy_1.png" alt="Casa efficiente e ben illuminata">
          </div>
          <div class="stagger-content">
            <h4>Offerte Luce</h4>
            <p>Action seleziona offerte luce per clienti domestici e business, con condizioni leggibili, costi chiari e supporto nella scelta tra prezzo fisso e variabile.</p>
            <a href="tariffe.php" class="btn-ghost" style="margin-top:20px;">Vedi tariffe luce</a>
          </div>
        </article>

        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="feature_gas.png" alt="Cucina domestica con fornitura gas">
          </div>
          <div class="stagger-content">
            <h4>Offerte Gas</h4>
            <p>Ti guidiamo nella valutazione delle offerte gas per casa e azienda, con consulenza su consumi, spesa attesa e modalità di attivazione senza complicazioni.</p>
            <a href="tariffe.php" class="btn-ghost" style="margin-top:20px;">Vedi tariffe gas</a>
          </div>
        </article>

        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="feature_consulenza.png" alt="Consulenza energetica personalizzata">
          </div>
          <div class="stagger-content">
            <h4>Consulenza gratuita</h4>
            <p>Analizziamo la tua bolletta, leggiamo i consumi reali e ti proponiamo una soluzione coerente con il tuo profilo, senza impegno e con un consulente Action dedicato.</p>
            <a href="contatti.php" class="btn-ghost" style="margin-top:20px;">Analizza la mia bolletta</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ===== Quote Break ===== -->
  <section class="quote-banner">
    <div class="mark">"</div>
    <h2>Per noi una buona consulenza energetica non deve confondere: deve aiutarti a capire, decidere e attivare con serenita.</h2>
  </section>

  <!-- ===== How it works ===== -->
  <section class="section how-it-works section-on-dark">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow eyebrow-light"><span class="dot"></span> Come funziona</span>
        <h2 class="section-title">Attivi la nuova fornitura <br>in <span class="accent">4 passi semplici</span></h2>
        <p class="section-sub">Con Action il cambio fornitore viene spiegato passo dopo passo, senza interruzioni del servizio e senza interventi tecnici a domicilio.</p>
      </div>

      <div class="timeline">
        <div class="timeline-item reveal">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="hiw-num" style="margin-bottom:10px;">01</div>
            <h5>Scegli l'offerta</h5>
            <p>Esaminiamo insieme le offerte luce e gas più adatte alle tue abitudini di consumo e ai tuoi obiettivi di spesa.</p>
          </div>
        </div>
        <div class="timeline-item reveal">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="hiw-num" style="margin-bottom:10px;">02</div>
            <h5>Parla con noi</h5>
            <p>Un consulente Action ti contatta, chiarisce ogni voce dell'offerta e ti supporta nella compilazione della pratica.</p>
          </div>
        </div>
        <div class="timeline-item reveal">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="hiw-num" style="margin-bottom:10px;">03</div>
            <h5>Invia la bolletta</h5>
            <p>Raccogliamo i dati necessari, verifichiamo la documentazione e seguiamo per te l'avvio della richiesta.</p>
          </div>
        </div>
        <div class="timeline-item reveal">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <div class="hiw-num" style="margin-bottom:10px;">04</div>
            <h5>Sei attivo</h5>
            <p>La nuova fornitura si attiva senza disservizi e con Action disponibile anche dopo il passaggio per ogni chiarimento.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Split: Perché Action ===== -->
  <section class="section">
    <div class="container">
      <div class="split reverse">
        <div class="split-visual reveal">
          <img src="hero_energy_3.png" alt="Monitoraggio intelligente dei consumi energetici">
        </div>

        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> Perché scegliere Action</span>
          <h2 class="section-title" style="text-align:left;">Più chiarezza, <span class="accent">meno dispersione</span></h2>
          <p style="font-size:17px; color:var(--muted); line-height:1.7; margin: 0 0 18px;">
            Action non si limita a proporti un contratto: analizza il tuo profilo energetico, confronta le opzioni disponibili e ti aiuta a scegliere con maggiore consapevolezza.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.7; margin: 0 0 24px;">
            Lavoriamo con un approccio pratico e trasparente, per offrirti supporto sulle forniture luce e gas, sulla lettura della bolletta e sulle opportunita di risparmio concrete.
          </p>
          <div class="split-tiles">
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M4 12h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M12 4v16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
              <div>
                <h5>Confronto guidato</h5>
                <p>Ti aiutiamo a leggere le differenze reali tra una proposta e l'altra.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 3l7 4v5c0 4.5-3 7.9-7 9-4-1.1-7-4.5-7-9V7l7-4z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Scelte più sicure</h5>
                <p>Ogni passaggio viene spiegato in modo comprensibile, senza tecnicismi inutili.</p>
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
            <h3>Apprezzato da chi cerca consulenza chiara</h3>
            <p>Famiglie, professionisti e aziende si affidano ad Action per orientarsi meglio nel mercato dell'energia.</p>
          </div>
          <div class="big">4,9<small>/5</small></div>
        </div>
        <div class="rv-cards">
          <div class="rv-card">
            <div class="quote">"</div>
            <div class="stars">★★★★★</div>
            <h5>Passaggio velocissimo</h5>
            <p>Ho cambiato fornitore in meno di una settimana. Il consulente mi ha seguito dall'inizio alla fine, senza problemi.</p>
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
            <h5>Risparmio concreto</h5>
            <p>Bolletta ridotta di circa il 15% rispetto al vecchio fornitore. Ottima consulenza e prezzi davvero chiari.</p>
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
            <h5>Finalmente competenti</h5>
            <p>Mi hanno spiegato bene le differenze tra RID e bollettino e mi hanno aiutato a scegliere la tariffa più adatta.</p>
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
      <h2>Parla con Action e fai chiarezza sulla tua energia.</h2>
      <p>Richiedi una consulenza gratuita: analizziamo insieme la tua situazione e ti aiutiamo a individuare la soluzione luce o gas piu adatta.</p>
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
