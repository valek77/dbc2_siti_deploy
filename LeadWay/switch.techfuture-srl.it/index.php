<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Energia Luce e Gas per la tua casa';
$pageDescription = ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'GR Contact Call Center')
    . ' è il partner ufficiale ' . $OPERATORE['nome_marketing']
    . '. Scopri le migliori offerte luce e gas per casa e azienda con prezzi trasparenti e assistenza dedicata.';
include __DIR__ . '/header.php';
?>

  <!-- ===== Hero ===== -->
  <section class="hero">
    <div class="hero-visual">
      <div class="hero-slider" data-hero-slider>
        <div class="hero-slides">
          <figure class="hero-slide is-active">
            <img src="split_home.png" alt="Famiglia in casa con comfort energetico">
          </figure>
          <figure class="hero-slide">
            <img src="feature_consulenza.png" alt="Consulenza energetica personalizzata">
          </figure>
          <figure class="hero-slide">
            <img src="hero_energy_2.png" alt="Soluzioni energia per la casa">
          </figure>
        </div>
        <div class="hero-slider-ui">
          <button type="button" class="hero-nav prev" data-hero-prev aria-label="Slide precedente">
            <svg viewBox="0 0 24 24" fill="none"><path d="M15 6l-6 6 6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
          <div class="hero-dots" role="tablist" aria-label="Selezione slide hero">
            <button type="button" class="hero-dot is-active" data-hero-dot="0" aria-label="Vai alla slide 1"></button>
            <button type="button" class="hero-dot" data-hero-dot="1" aria-label="Vai alla slide 2"></button>
            <button type="button" class="hero-dot" data-hero-dot="2" aria-label="Vai alla slide 3"></button>
          </div>
          <button type="button" class="hero-nav next" data-hero-next aria-label="Slide successiva">
            <svg viewBox="0 0 24 24" fill="none"><path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
        </div>
      </div>
    </div>
    <div class="hero-grid"></div>
    <div class="container">
      <div class="hero-content">
        <span class="eyebrow eyebrow-light"><span class="dot"></span> Partner ufficiale <?= $OPERATORE['nome_marketing'] ?></span>
        <h1>Energia <span class="accent">trasparente</span>, bolletta più leggera.</h1>
        <p class="lede">Con <?= $brandName ?> trovi offerte luce e gas <?= $OPERATORE['nome_marketing'] ?> chiare, convenienti e pensate per i tuoi consumi. Ti affianchiamo in ogni fase, dalla scelta della tariffa fino all'attivazione.</p>
        <div class="hero-actions">
          <a href="tariffe.php" class="btn-primary">Scopri le offerte
            <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <a href="contatti.php" class="btn-secondary">Parla con un consulente</a>
        </div>
        <div class="hero-stats">
          <div class="stat"><div class="n">5.000+</div><div class="l">Contratti attivati</div></div>
          <div class="stat"><div class="n">24h</div><div class="l">Risposta garantita</div></div>
          <div class="stat"><div class="n">€0</div><div class="l">Costo consulenza</div></div>
        </div>
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
        <p class="section-sub">Ti aiutiamo a scegliere l'offerta giusta, a capire davvero cosa stai pagando e ad attivare la fornitura senza complicazioni.</p>
      </div>

      <div class="features-container">
        <article class="feature-card reveal">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Offerte Luce</h4>
          <p>Soluzioni luce per casa e lavoro con condizioni trasparenti, prezzi chiari e supporto dedicato nella scelta della tariffa.</p>
        </article>

        <article class="feature-card reveal">
          <div class="feature-icon warm">
            <svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Offerte Gas</h4>
          <p>Offerte gas pensate per privati e professionisti, con attivazione semplice e assistenza completa in ogni fase del passaggio.</p>
        </article>

        <article class="feature-card reveal">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Consulenza gratuita</h4>
          <p>Analizziamo i tuoi consumi e ti proponiamo la soluzione più adatta, senza impegno e con un supporto chiaro e concreto.</p>
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
        <p class="section-sub">Cambiare fornitore è più semplice di quanto pensi: ti guidiamo noi, senza interruzioni del servizio e senza interventi tecnici.</p>
      </div>

      <div class="hiw-steps">
        <div class="hiw-step">
          <div class="hiw-num">01</div>
          <h5>Scegli l'offerta</h5>
          <p>Valutiamo insieme le offerte luce e gas disponibili e individuiamo la soluzione più adatta alle tue esigenze.</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-num">02</div>
          <h5>Parla con noi</h5>
          <p>Un consulente dedicato ti segue nella richiesta, chiarisce ogni dubbio e ti accompagna passo dopo passo.</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-num">03</div>
          <h5>Invia la bolletta</h5>
          <p>Ci fornisci i dati necessari e noi gestiamo la pratica amministrativa in modo rapido e senza inutili complicazioni.</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-num">04</div>
          <h5>Sei attivo</h5>
          <p>La nuova fornitura si attiva in automatico, senza disservizi e senza interventi tecnici presso la tua abitazione.</p>
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
            Non ci limitiamo a proporti un'offerta: analizziamo la tua situazione e ti aiutiamo a scegliere una soluzione davvero adatta ai tuoi consumi, con condizioni chiare e supporto costante.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.7; margin: 0;">
            Con <?= $OPERATORE['nome_marketing'] ?> hai accesso a offerte luce e gas con prezzi trasparenti e il supporto di un team che resta al tuo fianco anche dopo l'attivazione.
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
            <p>Ogni giorno famiglie e professionisti si affidano a <?= $brandName ?> per attivare offerte <?= $OPERATORE['nome_marketing'] ?> in modo semplice e trasparente.</p>
          </div>
          <div class="big">4,9<small>/5</small></div>
        </div>
        <div class="rv-cards">
          <div class="rv-card">
            <div class="quote">"</div>
            <div class="stars">★★★★★</div>
            <h5>Passaggio velocissimo</h5>
            <p>Procedura semplice e tempi rapidi. Sono stato seguito con chiarezza dall'inizio alla fine, senza perdite di tempo.</p>
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
            <p>Mi hanno aiutata a trovare una tariffa più adatta ai miei consumi. Consulenza chiara e proposta spiegata molto bene.</p>
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
            <p>Ho ricevuto spiegazioni semplici e precise. Finalmente un supporto concreto per capire davvero quale offerta scegliere.</p>
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
      <p>Richiedi una consulenza gratuita e scopri in pochi minuti quale offerta luce o gas può adattarsi meglio alle tue esigenze.</p>
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
    (function () {
      const slider = document.querySelector('[data-hero-slider]');
      if (!slider) return;

      const slides = Array.from(slider.querySelectorAll('.hero-slide'));
      const dots = Array.from(slider.querySelectorAll('[data-hero-dot]'));
      const prev = slider.querySelector('[data-hero-prev]');
      const next = slider.querySelector('[data-hero-next]');
      let current = 0;
      let timer = null;

      function render(index) {
        current = (index + slides.length) % slides.length;
        slides.forEach((slide, i) => slide.classList.toggle('is-active', i === current));
        dots.forEach((dot, i) => dot.classList.toggle('is-active', i === current));
      }

      function start() {
        stop();
        timer = window.setInterval(() => render(current + 1), 4500);
      }

      function stop() {
        if (timer) window.clearInterval(timer);
      }

      prev?.addEventListener('click', function () { render(current - 1); start(); });
      next?.addEventListener('click', function () { render(current + 1); start(); });
      dots.forEach((dot, i) => dot.addEventListener('click', function () { render(i); start(); }));
      slider.addEventListener('mouseenter', stop);
      slider.addEventListener('mouseleave', start);

      render(0);
      start();
    })();

    // Reveal on scroll
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));
  </script>
HTML;
include __DIR__ . '/footer.php';
?>
