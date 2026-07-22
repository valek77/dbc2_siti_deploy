<?php
require __DIR__ . '/_config.php';

// Brand dell'operatore energetico Enjoy.
// I valori di $OPERATORE sono gia' HTML-safe.
$brand = 'Enjoy';
$brandName = $brand;
// Ragione sociale dell'operatore, citata dove serve il soggetto giuridico.
$ragioneSociale = $OPERATORE['nome_legale'];

$pageTitle = 'Chi Siamo';
$pageDescription = $brand . ' è l’operatore energetico per luce e gas che mette al primo posto il risparmio in bolletta: prezzi chiari, trasparenza sui costi e zero sorprese.';
include __DIR__ . '/header.php';
?>

<main class="pl-about-page">
  <section class="hero pl-about-hero" style="min-height: 500px;">
    <div class="hero-slides">
      <div class="hero-slide active">
        <img src="hero_energy_1.png" class="hero-slide-bg" alt="Casa efficiente e comfort energetico">
        <div class="container">
          <div class="hero-content">
            <span class="eyebrow eyebrow-light"><span class="dot"></span> Chi siamo</span>
            <h1><?= $brand ?>, l'energia che fa sentire a <span class="accent">casa</span></h1>
            <p class="lede"><?= $brand ?> è l'operatore energetico per luce e gas che mette al primo posto il tuo risparmio in bolletta. Con offerte trasparenti, assistenza concreta e condizioni comprensibili, portiamo energia nelle case e nelle imprese senza sorprese.</p>
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
          <h2 class="section-title" style="text-align:left;">Energia semplice, <span class="accent">risparmio concreto</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:18px; color:var(--muted); line-height:1.75; margin: 0 0 24px;">
            <?= $brand ?> nasce per rendere più semplice il rapporto con l'energia. Scegliere una nuova fornitura di luce e gas è facile: offerte competitive, condizioni trasparenti e supporto costante, perché capire ciò che paghi è il primo passo per risparmiare.
          </p>
          <div class="split-tiles">
            <div class="split-tile">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Prezzi bloccati 12 mesi</h5>
                <p>Il prezzo che scegli resta fisso per 12 mesi dall'attivazione.</p>
              </div>
            </div>
            <div class="split-tile warm">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div>
                <h5>Zero sorprese</h5>
                <p>Costi chiari fin dall'inizio, senza addebiti inattesi in bolletta.</p>
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
          <div class="n">12 mesi</div>
          <div class="l">Prezzo bloccato</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">Zero</div>
          <div class="l">Sorprese in bolletta</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">100%</div>
          <div class="l">Chiarezza sui costi</div>
        </div>
        <div class="stat-item reveal">
          <div class="n">Gratis</div>
          <div class="l">Attivazione fornitura</div>
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
        <p class="section-sub">Semplicità, velocità e convenienza guidano <?= $brand ?> nel rapporto con ogni cliente, dalla richiesta fino all'attivazione della fornitura.</p>
      </div>

      <div class="features-staggered">
        <article class="stagger-item reveal">
          <div class="stagger-visual">
            <img src="hero_energy_1.png" alt="Casa efficiente e comfort domestico">
          </div>
          <div class="stagger-content">
            <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/><path d="M21 21l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
            <h4>Semplicità</h4>
            <p>Attivare una nuova fornitura di luce e gas con <?= $brand ?> è facile e gratuito: nessuna pratica complicata, ti accompagniamo passo dopo passo.</p>
          </div>
        </article>

        <article class="stagger-item reveal">
          <div class="stagger-visual">
          <img src="chi_siamo_team.png" alt="Il team Enjoy al lavoro con i clienti">
          </div>
          <div class="stagger-content">
            <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg></div>
            <h4>Velocità</h4>
            <p>Ottieni tutte le informazioni sulla nostra offerta con pochi click e ricevi un'assistenza immediata quando ne hai bisogno.</p>
          </div>
        </article>

        <article class="stagger-item reveal">
          <div class="stagger-visual">
          <img src="split_home.png" alt="Il risparmio energetico a casa con Enjoy">
          </div>
          <div class="stagger-content">
            <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
            <h4>Convenienza</h4>
            <p>Tariffe competitive, chiarezza sui costi e prezzi bloccati 12 mesi: una soluzione all'insegna del risparmio, perché il risparmio parte da casa.</p>
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
          <h2 class="section-title" style="text-align:left;">La <span class="underline">casa</span> al centro</h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            Per noi l'energia è parte della vita di ogni giorno: illumina la casa, sostiene il lavoro e accompagna ogni progetto. Per questo <?= $brand ?> propone soluzioni chiare, pensate per accompagnarti verso un consumo più consapevole e conveniente.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 32px;">
            Scegliere <?= $brand ?> significa trovare un'offerta luce o gas adatta alle tue esigenze, con un'attivazione semplice e un'assistenza pronta ad aiutarti. Nessuna sorpresa in bolletta: solo chiarezza e attenzione dal primo giorno.
          </p>
          <a href="contatti.php" class="btn-primary">Parla con un consulente</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Quote finale -->
  <section class="quote-banner">
    <div class="mark">"</div>
    <h2>Con <?= $brand ?> l'energia è semplice, trasparente e conveniente: il risparmio comincia da una scelta consapevole.</h2>
  </section>

</main>

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
