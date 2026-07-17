<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
$pageDescription = ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'GR Contact Call Center')
    . ' è un team di consulenti energetici specializzati nella vendita di offerte ' . $OPERATORE['nome_marketing']
    . '. Scopri la nostra storia e i nostri valori.';
include __DIR__ . '/header.php';
?>

  <section class="page-hero page-hero-about">
    <div class="page-hero-bg">
      <img src="hero_energy_1.png" alt="" aria-hidden="true">
    </div>
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Chi siamo</span>
      <h1>Energia con <span class="accent">competenza</span></h1>
      <p>Siamo un team di consulenti energetici che ti aiuta a orientarti nel mercato libero con chiarezza, competenza e attenzione reale alle tue esigenze.</p>
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
        <div>
          <span class="eyebrow"><span class="dot"></span> La nostra missione</span>
          <h2 class="section-title" style="text-align:left;">Mercato libero, <span class="accent">scelta libera</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            <?= $brandName ?> nasce per rendere più semplice la scelta delle offerte luce e gas. Ogni giorno affianchiamo privati e professionisti con consulenze chiare, supporto dedicato e soluzioni in linea con i loro consumi.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0;">
            Siamo agenzia commerciale autorizzata <?= $OPERATORE['nome_marketing'] ?> e il nostro obiettivo è trasformare un mercato spesso complesso in un percorso semplice, comprensibile e senza sorprese.
          </p>
        </div>

        <div class="split-visual">
          <img src="chi_siamo_team.png" alt="Il nostro team di esperti">
        </div>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="stat-strip">
    <div class="stat-strip-grid">
      <div class="stat-item">
        <div class="n">20.000+</div>
        <div class="l">Contratti attivati</div>
      </div>
      <div class="stat-item">
        <div class="n">24h</div>
        <div class="l">Risposta garantita</div>
      </div>
      <div class="stat-item">
        <div class="n">8</div>
        <div class="l">Offerte disponibili</div>
      </div>
      <div class="stat-item">
        <div class="n">€0</div>
        <div class="l">Costo consulenza</div>
      </div>
    </div>
  </section>

  <!-- Valori -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri valori</span>
        <h2 class="section-title">Tre principi, <span class="underline">ogni giorno</span></h2>
        <p class="section-sub">Sono i valori che guidano ogni consulenza, dal primo contatto fino all'attivazione della fornitura.</p>
      </div>

      <div class="features-container">
        <article class="feature-card">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/><path d="M21 21l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
          </div>
          <h4>Trasparenza</h4>
          <p>Spieghiamo ogni proposta in modo chiaro, con informazioni semplici e complete prima di qualsiasi scelta.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon warm">
            <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg>
          </div>
          <h4>Competenza</h4>
          <p>Mettiamo a disposizione esperienza, aggiornamento continuo e conoscenza del mercato per offrirti un supporto concreto.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2v10z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Vicinanza</h4>
          <p>Restiamo al tuo fianco anche dopo l'attivazione, per chiarimenti, dubbi o necessità legate alla fornitura.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Come lavoriamo -->
  <section class="section">
    <div class="container">
      <div class="split" style="grid-template-columns: 1fr 1.05fr;">
        <div class="split-visual">
          <img src="feature_consulenza.png" alt="Analisi bolletta e consulenza">
        </div>

        <div>
          <span class="eyebrow"><span class="dot"></span> Il nostro approccio</span>
          <h2 class="section-title" style="text-align:left;">Come <span class="underline">lavoriamo</span> con te</h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            Il nostro lavoro parte dall'ascolto. Analizziamo i tuoi consumi, valutiamo le tue abitudini e individuiamo l'offerta <?= $OPERATORE['nome_marketing'] ?> più adatta al tuo profilo.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 32px;">
            Ti accompagniamo nella documentazione, gestiamo il passaggio e ti aggiorniamo su ogni fase della pratica, così puoi cambiare fornitore con serenità e senza interruzioni del servizio.
          </p>
          <a href="contatti.php" class="btn-primary">Parla con un consulente
            <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Quote finale -->
  <section class="quote-banner">
    <div class="mark">"</div>
    <h2>Per noi una buona consulenza non si misura solo in un contratto firmato, ma nella fiducia che riusciamo a costruire con ogni cliente.</h2>
    <p class="by">— Il Team <?= $brandName ?></p>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
