<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Energia Luce e Gas per la tua casa';
$pageDescription = $LANDING_PAGE['nome_portale'] . ' è il partner ufficiale ' . $OPERATORE['nome_marketing'] . '. Scopri le migliori offerte luce e gas per casa e azienda con prezzi trasparenti e assistenza dedicata.';

$pageScripts = <<<'HTML'
  <script>
    // Reveal on scroll
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));
  </script>

  <script>
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.nav-dot');
    let currentSlide = 0;
    let slideInterval;

    function showSlide(n) {
      slides[currentSlide].classList.remove('active');
      dots[currentSlide].classList.remove('active');
      currentSlide = (n + slides.length) % slides.length;
      slides[currentSlide].classList.add('active');
      dots[currentSlide].classList.add('active');
    }

    function nextSlide() {
      showSlide(currentSlide + 1);
    }

    function startSlider() {
      slideInterval = setInterval(nextSlide, 6000);
    }

    function stopSlider() {
      clearInterval(slideInterval);
    }

    dots.forEach(dot => {
      dot.addEventListener('click', () => {
        stopSlider();
        showSlide(parseInt(dot.dataset.index));
        startSlider();
      });
    });

    startSlider();
  </script>
HTML;

include __DIR__ . '/header.php';
?>

  <!-- ===== Hero ===== -->
  <!-- ===== Hero Slider ===== -->
  <section class="hero">
    <div class="hero-slider">
      <div class="slides">
        <!-- Slide 1: Family/Comfort -->
        <div class="slide active" style="background-image: url('hero1.png')">
          <div class="container">
            <div class="hero-content">
              <span class="eyebrow eyebrow-light"><span class="dot"></span> Partner ufficiale <?= $OPERATORE['nome_marketing'] ?></span>
              <h1>Energia <span class="accent">trasparente</span>, bolletta più leggera.</h1>
              <p class="lede"><?= $brandName ?> ti guida nel mercato libero con offerte <?= $OPERATORE['nome_marketing'] ?>. Prezzi indicizzati al mercato, spread chiari e zero burocrazia.</p>
              <div class="hero-actions">
                <a href="tariffe.php" class="btn-primary">Scopri le offerte
                  <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <a href="contatti.php" class="btn-secondary">Parla con noi</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Slide 2: Sustainability -->
        <div class="slide" style="background-image: url('hero2.png')">
          <div class="container">
            <div class="hero-content">
              <span class="eyebrow eyebrow-light"><span class="dot"></span> Futuro Sostenibile</span>
              <h1>Verso un'energia <span class="accent">più pulita</span>.</h1>
              <p class="lede">Soluzioni innovative per la tua casa. Risparmia rispettando l'ambiente con le tariffe green di <?= $OPERATORE['nome_marketing'] ?>.</p>
              <div class="hero-actions">
                <a href="tariffe.php" class="btn-primary">Vedi tariffe Green
                  <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Slide 3: Professional/Business -->
        <div class="slide" style="background-image: url('hero3.png')">
          <div class="container">
            <div class="hero-content">
              <span class="eyebrow eyebrow-light"><span class="dot"></span> Consulenza Esperti</span>
              <h1>Professionisti <span class="accent">al tuo fianco</span>.</h1>
              <p class="lede">Non solo tariffe, ma una consulenza completa. Analizziamo i tuoi consumi per offrirti la soluzione più efficiente per il tuo business.</p>
              <div class="hero-actions">
                <a href="chi-siamo.php" class="btn-primary">La nostra storia
                  <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-nav">
        <button class="nav-dot active" data-index="0"></button>
        <button class="nav-dot" data-index="1"></button>
        <button class="nav-dot" data-index="2"></button>
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
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg> Fornitore <?= $OPERATORE['nome_marketing'] ?></span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M22 16.92V20a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 015 13.18 19.79 19.79 0 011.92 4.55 2 2 0 013.92 2.5h3.08a2 2 0 012 1.72c.13.96.36 1.9.69 2.8a2 2 0 01-.45 2.11L8.09 10.5a16 16 0 006 6l1.37-1.15a2 2 0 012.11-.45c.9.33 1.84.56 2.8.69a2 2 0 011.72 2.03z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg> Assistenza multicanale</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2v6m0 8v6m10-10h-6M8 12H2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/></svg> Nessuna interruzione di fornitura</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M8 12l3 3 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Consulenza gratuita</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-4z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Contratti certificati ARERA</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg> Fornitore <?= $OPERATORE['nome_marketing'] ?></span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M22 16.92V20a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 015 13.18 19.79 19.79 0 011.92 4.55 2 2 0 013.92 2.5h3.08a2 2 0 012 1.72c.13.96.36 1.9.69 2.8a2 2 0 01-.45 2.11L8.09 10.5a16 16 0 006 6l1.37-1.15a2 2 0 012.11-.45c.9.33 1.84.56 2.8.69a2 2 0 011.72 2.03z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg> Assistenza multicanale</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M8 12l3 3 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Consulenza gratuita</span>
    </div>
  </section>

  <!-- ===== Cosa offriamo ===== -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Cosa offriamo</span>
        <h2 class="section-title">Tre servizi, <span class="underline">una sola promessa</span></h2>
        <p class="section-sub">Siamo rivenditori autorizzati <?= $OPERATORE['nome_marketing'] ?>. Scegliamo per te la tariffa giusta e ti seguiamo dalla prima firma alla bolletta.</p>
      </div>

      <div class="features-container">
        <article class="feature-card reveal">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Offerte Luce</h4>
          <p>Tariffa FAMILY LUCE TLS nel Mercato Libero, indicizzata al PUN INDEX GME con spread fisso bloccato per 12 mesi. Per uso domestico in Bassa Tensione.</p>
        </article>

        <article class="feature-card reveal">
          <div class="feature-icon warm">
            <svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Offerte Gas</h4>
          <p>Tariffa DOMESTICO GAS TLS nel Mercato Libero, con prezzo ancorato al PSV e componente fissa per 12 mesi. Attivazione rapida e senza interventi tecnici.</p>
        </article>

        <article class="feature-card reveal">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Consulenza gratuita</h4>
          <p>Analizziamo la tua bolletta attuale e ti proponiamo l'offerta più conveniente in pochi minuti. Senza impegno, senza costi nascosti.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===== How it works ===== -->
  <section class="section how-it-works section-on-dark">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow eyebrow-light"><span class="dot"></span> Come funziona</span>
        <h2 class="section-title">Attivi la nuova fornitura <br>in <span class="accent">4 passi semplici</span></h2>
        <p class="section-sub">Cambiare fornitore con <?= $brandName ?> è veloce e non richiede alcun intervento tecnico in casa.</p>
      </div>

      <div class="hiw-steps">
        <div class="hiw-step">
          <div class="hiw-num">01</div>
          <h5>Scegli l'offerta</h5>
          <p>Confronta le tariffe Luce o Gas <?= $OPERATORE['nome_marketing'] ?> e individua quella più adatta al tuo profilo.</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-num">02</div>
          <h5>Parla con noi</h5>
          <p>Un consulente ti contatta, ti guida nella compilazione e risponde a tutti i tuoi dubbi.</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-num">03</div>
          <h5>Invia la bolletta</h5>
          <p>Ci occupiamo noi della pratica con il vecchio fornitore. Zero stress, zero burocrazia.</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-num">04</div>
          <h5>Sei attivo</h5>
          <p>La nuova fornitura parte automaticamente. Nessuna interruzione, nessun tecnico a casa.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Split: Perché GR ===== -->
  <section class="section">
    <div class="container">
      <div class="split">
        <div>
          <span class="eyebrow"><span class="dot"></span> Perché scegliere <?= $brandName ?></span>
          <h2 class="section-title" style="text-align:left;">Risparmio reale, <span class="accent">assistenza vera</span></h2>
          <p style="font-size:17px; color:var(--muted); line-height:1.7; margin: 0 0 18px;">
            Non siamo un punto vendita anonimo: siamo consulenti energetici. Per ogni cliente troviamo la soluzione più conveniente, senza costi nascosti e senza sorprese in bolletta.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.7; margin: 0;">
            Con <?= $OPERATORE['nome_marketing'] ?> scegli offerte a prezzo indicizzato al mercato (PUN INDEX GME e PSV) con spread fisso garantito per 12 mesi dalla data di attivazione.
          </p>

        </div>

        <div class="split-visual">
          <img src="split_home.png" alt="Comfort domestico e risparmio">
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
            <h3>Valutato eccellente dai nostri clienti</h3>
            <p>Migliaia di famiglie e imprese hanno scelto <?= $brandName ?> per il passaggio alle offerte <?= $OPERATORE['nome_marketing'] ?>.</p>
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
      <h2>Bolletta più bassa, energia più chiara.</h2>
      <p>Richiedi una consulenza gratuita. Ti contattiamo entro 24 ore lavorative per trovare insieme la tariffa giusta per te.</p>
      <div class="actions">
        <a href="tariffe.php" class="btn-primary">Vedi tutte le offerte
          <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a href="contatti.php" class="btn-secondary">Contattaci ora</a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
