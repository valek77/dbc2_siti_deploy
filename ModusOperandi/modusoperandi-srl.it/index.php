<?php
require __DIR__ . '/_config.php';
$pageDescription = 'Scopri le offerte per luce e gas. Tariffe trasparenti, consulenza gratuita e zero interruzioni di fornitura.';
include __DIR__ . '/header.php';
?>

  <!-- ===== Hero full-width slider ===== -->
  <section class="hero hero-fullwidth" id="heroSlider">
    <div class="hero-slides">

      <!-- Slide 1 -->
      <div class="hero-slide active" data-slide="0">
        <img class="hero-slide-bg" src="hero_1.jpg" alt="Famiglia felice a colazione in casa luminosa">
        <div class="hero-overlay"></div>
        <div class="container">
          <div class="hero-content">
            <span class="eyebrow eyebrow-light"><span class="dot"></span> Partner ufficiale <?= $brandName ?></span>
            <h1>Energia <span class="accent">chiara</span>, bollette più leggere.</h1>
            <p class="lede">Scegli le offerte <?= $brandName ?> per la luce e il gas della tua casa. Tariffe trasparenti, zero sorprese e un consulente sempre al tuo fianco.</p>
            <div class="hero-actions">
              <a href="tariffe.php" class="btn-primary">Scopri le offerte
                <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
              <a href="contatti.php" class="btn-ghost btn-ghost-light">Parla con noi</a>
            </div>
            <div class="hero-stats">
              <div class="stat">
                <div class="n">5.000+</div>
                <div class="l">Clienti soddisfatti</div>
              </div>
              <div class="stat">
                <div class="n">24h</div>
                <div class="l">Risposta garantita</div>
              </div>
              <div class="stat">
                <div class="n">€0</div>
                <div class="l">Costo consulenza</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="hero-slide" data-slide="1">
        <img class="hero-slide-bg" src="hero_2.jpg" alt="Coppia sorridente fuori casa">
        <div class="hero-overlay"></div>
        <div class="container">
          <div class="hero-content">
            <span class="eyebrow eyebrow-light"><span class="dot"></span> Zero pensieri</span>
            <h1>La serenità di una <span class="accent">fornitura sicura</span>.</h1>
            <p class="lede">Cambio fornitore senza interruzioni, senza costi nascosti e con l'assistenza di un consulente dedicato per ogni domanda.</p>
            <div class="hero-actions">
              <a href="contatti.php" class="btn-primary">Richiedi consulenza
                <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
              <a href="chi-siamo.php" class="btn-ghost btn-ghost-light">Chi siamo</a>
            </div>
            <div class="hero-stats">
              <div class="stat">
                <div class="n">100%</div>
                <div class="l">Nessuna interruzione</div>
              </div>
              <div class="stat">
                <div class="n">4,9<small>/5</small></div>
                <div class="l">Valutazione clienti</div>
              </div>
              <div class="stat">
                <div class="n">€0</div>
                <div class="l">Costo consulenza</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="hero-slide" data-slide="2">
        <img class="hero-slide-bg" src="hero_3.jpg" alt="Pale eoliche al tramonto">
        <div class="hero-overlay"></div>
        <div class="container">
          <div class="hero-content">
            <span class="eyebrow eyebrow-light"><span class="dot"></span> Energia consapevole</span>
            <h1>Scegli un futuro <span class="accent">più green</span>.</h1>
            <p class="lede">Con <?= $brandName ?> hai accesso a tariffe che valorizzano le energie rinnovabili, per un consumo più sostenibile e una bolletta più chiara.</p>
            <div class="hero-actions">
              <a href="tariffe.php" class="btn-primary">Vedi tariffe green
                <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
              <a href="contatti.php" class="btn-ghost btn-ghost-light">Parla con noi</a>
            </div>
            <div class="hero-stats">
              <div class="stat">
                <div class="n">Green</div>
                <div class="l">Energia rinnovabile</div>
              </div>
              <div class="stat">
                <div class="n">12</div>
                <div class="l">Mesi di tranquillità</div>
              </div>
              <div class="stat">
                <div class="n">€0</div>
                <div class="l">Costo consulenza</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <button class="hero-arrow hero-prev" aria-label="Slide precedente">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <button class="hero-arrow hero-next" aria-label="Slide successiva">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>

    <div class="hero-dots" aria-label="Indicatori slide"></div>

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
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg> Offerte <?= $brandName ?></span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M22 16.92V20a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 015 13.18 19.79 19.79 0 011.92 4.55 2 2 0 013.92 2.5h3.08a2 2 0 012 1.72c.13.96.36 1.9.69 2.8a2 2 0 01-.45 2.11L8.09 10.5a16 16 0 006 6l1.37-1.15a2 2 0 012.11-.45c.9.33 1.84.56 2.8.69a2 2 0 011.72 2.03z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg> Assistenza multicanale</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2v6m0 8v6m10-10h-6M8 12H2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/></svg> Nessuna interruzione</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M8 12l3 3 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Consulenza gratuita</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-4z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Contratti certificati ARERA</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg> Offerte <?= $brandName ?></span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M22 16.92V20a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 015 13.18 19.79 19.79 0 011.92 4.55 2 2 0 013.92 2.5h3.08a2 2 0 012 1.72c.13.96.36 1.9.69 2.8a2 2 0 01-.45 2.11L8.09 10.5a16 16 0 006 6l1.37-1.15a2 2 0 012.11-.45c.9.33 1.84.56 2.8.69a2 2 0 011.72 2.03z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg> Assistenza multicanale</span>
      <span class="trust-item"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M8 12l3 3 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Consulenza gratuita</span>
    </div>
  </section>

  <!-- ===== Servizi ===== -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri servizi</span>
        <h2 class="section-title">Tutto l'energia di cui <span class="underline">hai bisogno</span></h2>
        <p class="section-sub">Scegliamo insieme la soluzione più adatta al tuo profilo di consumo, con tariffe chiare e senza sorprese.</p>
      </div>

      <div class="features-container">
        <article class="feature-card reveal">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Offerte Luce</h4>
          <p>Tariffe variabili indicizzate al PUN e offerte PLACET con spread bloccato per 12 mesi. Per casa e lavoro.</p>
          <a href="tariffe.php" class="btn-ghost" style="margin-top:22px;">Vedi tariffe luce</a>
        </article>

        <article class="feature-card reveal">
          <div class="feature-icon warm">
            <svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Offerte Gas</h4>
          <p>Forniture gas con prezzo ancorato al PSV. Soluzioni per uso domestico, professionale e imprese.</p>
          <a href="tariffe.php" class="btn-ghost" style="margin-top:22px;">Vedi tariffe gas</a>
        </article>

        <article class="feature-card reveal">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2v10z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h4>Consulenza gratuita</h4>
          <p>Analizziamo la tua bolletta e ti proponiamo l'offerta più conveniente. Senza impegno e senza costi.</p>
          <a href="contatti.php" class="btn-ghost" style="margin-top:22px;">Richiedi analisi</a>
        </article>
      </div>
    </div>
  </section>

  <!-- ===== Perché scegliere ===== -->
  <section class="section">
    <div class="container">
      <div class="split reverse">
        <div class="split-visual reveal">
          <img src="split_home.jpg" alt="Famiglia a casa propria">
        </div>

        <div class="reveal">
          <span class="eyebrow"><span class="dot"></span> Perché scegliere <?= $brandName ?></span>
          <h2 class="section-title" style="text-align:left;">Risparmio reale, <span class="accent">assistenza vera</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            Non siamo un semplice intermediario: siamo consulenti energetici. Per ogni cliente troviamo la soluzione più conveniente, senza costi nascosti e senza sorprese in bolletta.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 28px;">
            Con <?= $brandName ?> puoi scegliere tra offerte a prezzo variabile indicizzato al mercato o offerte PLACET con spread fisso garantito per 12 mesi.
          </p>
          <a href="chi-siamo.php" class="btn-primary">Scopri chi siamo
            <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Come funziona ===== -->
  <section class="section how-it-works">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Come funziona</span>
        <h2 class="section-title">Attiva la fornitura in <span class="accent">4 passi</span></h2>
        <p class="section-sub">Cambiare fornitore con <?= $brandName ?> è veloce e non richiede alcun intervento tecnico.</p>
      </div>

      <div class="hiw-steps">
        <div class="hiw-step reveal">
          <div class="hiw-num">01</div>
          <h5>Scegli l'offerta</h5>
          <p>Confronta le tariffe Luce e Gas <?= $brandName ?> e individua quella più adatta a te.</p>
        </div>
        <div class="hiw-step reveal">
          <div class="hiw-num">02</div>
          <h5>Parla con noi</h5>
          <p>Un consulente ti contatta, ti guida nella compilazione e risponde a ogni dubbio.</p>
        </div>
        <div class="hiw-step reveal">
          <div class="hiw-num">03</div>
          <h5>Invia la bolletta</h5>
          <p>Ci occupiamo noi della pratica con il vecchio fornitore. Zero stress, zero burocrazia.</p>
        </div>
        <div class="hiw-step reveal">
          <div class="hiw-num">04</div>
          <h5>Sei attivo</h5>
          <p>La nuova fornitura parte automaticamente. Nessuna interruzione, nessun tecnico a casa.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Recensioni ===== -->
  <section class="section reviews">
    <div class="container">
      <div class="reviews-grid">
        <div class="rv-panel">
          <div>
            <div class="stars">★★★★★</div>
            <h3>Valutato eccellente dai clienti</h3>
            <p>Migliaia di famiglie e imprese hanno scelto <?= $brandName ?> per la loro fornitura di energia.</p>
          </div>
          <div class="big">4,9<small>/5</small></div>
        </div>
        <div class="rv-cards">
          <div class="rv-card">
            <div class="quote">"</div>
            <div class="stars">★★★★★</div>
            <h5>Passaggio velocissimo</h5>
            <p>Ho cambiato fornitore in meno di una settimana. Il consulente mi ha seguito dall'inizio alla fine.</p>
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
            <p>Bolletta ridotta di circa il 15% rispetto al vecchio fornitore. Prezzi davvero chiari.</p>
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
            <p>Mi hanno spiegato bene le differenze tra le tariffe e mi hanno aiutato a scegliere quella giusta.</p>
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

  <!-- ===== CTA finale ===== -->
  <section class="cta-final">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Pronto a partire?</span>
      <h2>Bolletta più bassa, energia più chiara.</h2>
      <p>Richiedi una consulenza gratuita. Ti contattiamo entro 24 ore lavorative per trovare insieme la tariffa giusta per te.</p>
      <div class="actions">
        <a href="tariffe.php" class="btn-secondary">Vedi tutte le offerte
          <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a href="contatti.php" class="btn-ghost" style="border-color:rgba(26,26,26,.3); color:var(--ink);">Contattaci ora</a>
      </div>
    </div>
  </section>

<?php
$pageScripts = <<<'HTML'
  <script>
    // Reveal on scroll
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));

    // Hero slider
    (function() {
      const slider = document.getElementById('heroSlider');
      if (!slider) return;
      const slides = Array.from(slider.querySelectorAll('.hero-slide'));
      const dotsContainer = slider.querySelector('.hero-dots');
      const prevBtn = slider.querySelector('.hero-prev');
      const nextBtn = slider.querySelector('.hero-next');
      let current = 0;
      let timer = null;
      const interval = 6000;

      slides.forEach((_, i) => {
        const b = document.createElement('button');
        b.className = 'hero-dot' + (i === 0 ? ' active' : '');
        b.setAttribute('aria-label', 'Vai alla slide ' + (i + 1));
        b.addEventListener('click', () => goTo(i));
        dotsContainer.appendChild(b);
      });
      const dots = Array.from(dotsContainer.children);

      function goTo(index) {
        if (index < 0) index = slides.length - 1;
        if (index >= slides.length) index = 0;
        slides[current].classList.remove('active');
        dots[current].classList.remove('active');
        current = index;
        slides[current].classList.add('active');
        dots[current].classList.add('active');
        resetTimer();
      }

      function next() { goTo(current + 1); }
      function prev() { goTo(current - 1); }

      function resetTimer() {
        if (timer) clearInterval(timer);
        timer = setInterval(next, interval);
      }

      prevBtn.addEventListener('click', prev);
      nextBtn.addEventListener('click', next);

      slider.addEventListener('mouseenter', () => { if (timer) clearInterval(timer); });
      slider.addEventListener('mouseleave', resetTimer);

      resetTimer();
    })();
  </script>
HTML;
include __DIR__ . '/footer.php';
?>
