<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
$pageDescription = $brand . ' è un team di consulenti energetici specializzati nella vendita di offerte ' . $OPERATORE_ENERGETICO . '. Scopri la nostra storia e i nostri valori.';
include __DIR__ . '/header.php';
?>

  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Chi siamo</span>
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
        <div>
          <span class="eyebrow"><span class="dot"></span> La nostra missione</span>
          <h2 class="section-title" style="text-align:left;">Mercato libero, <span class="accent">scelta libera</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            <?= $brand ?> nasce con un obiettivo preciso: rendere semplice e conveniente il passaggio al mercato libero dell'energia. Siamo rivenditori autorizzati <?= $OPERATORE_ENERGETICO ?> e lavoriamo ogni giorno per portare ai clienti le migliori tariffe disponibili.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0;">
            Il mercato energetico italiano può sembrare complesso — tra PUN, PSV, spread e offerte PLACET. Il nostro lavoro è decifrarlo per te, guidandoti nella scelta della tariffa più adatta alle tue esigenze reali, senza sorprese in bolletta.
          </p>
        </div>

        <div class="split-visual">
          <img src="chi_siamo_lctarde.png" alt="Il nostro team di esperti">
        </div>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="stat-strip">
    <div class="stat-strip-grid">
      <div class="stat-item">
        <div class="n">5.000+</div>
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
        <p class="section-sub">Quello che ci guida nel rapporto con i clienti, dalla prima telefonata alla bolletta del decimo mese.</p>
      </div>

      <div class="features-container">
        <article class="feature-card">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/><path d="M21 21l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
          </div>
          <h4>Trasparenza</h4>
          <p>Nessun costo nascosto, nessuna sorpresa. Ogni offerta viene spiegata nel dettaglio prima della firma del contratto.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon warm">
            <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg>
          </div>
          <h4>Competenza</h4>
          <p>Consulenti formati e aggiornati continuamente sulle normative ARERA e sulle dinamiche del mercato energetico.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2v10z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Vicinanza</h4>
          <p>Non spariamo dopo la firma: siamo qui anche dopo l'attivazione, per qualsiasi dubbio sulla bolletta o sul contratto.</p>
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
            Il nostro processo parte sempre dall'ascolto. Analizziamo la tua bolletta attuale, capiamo consumi e profilo (domestico, uso lavoro, piccola impresa) e solo allora ti proponiamo l'offerta <?= $OPERATORE_ENERGETICO ?> più adatta.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 32px;">
            Ci occupiamo di tutta la documentazione, coordiniamo il passaggio con il distributore locale e ti teniamo aggiornato su ogni fase. Il cambio fornitore avviene senza interruzioni alla fornitura.
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
    <h2>Il nostro obiettivo non è chiudere un contratto, ma costruire una relazione di fiducia duratura con ogni cliente che si affida a noi.</h2>
    <p class="by">— Il Team <?= $brand ?></p>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
