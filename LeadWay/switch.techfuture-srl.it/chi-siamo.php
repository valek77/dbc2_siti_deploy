<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
$pageDescription = ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'TechFuture')
    . ' accompagna aziende e professionisti nella trasformazione digitale con soluzioni software, consulenza tecnologica e infrastrutture IT.';
include __DIR__ . '/header.php';
?>

  <section class="page-hero page-hero-about">
    <div class="page-hero-bg">
      <img src="hero_energy_1.png" alt="" aria-hidden="true">
    </div>
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Chi siamo</span>
      <h1>Innovazione <span class="accent">digitale</span> con visione concreta</h1>
      <p><?= $brandName ?> supporta aziende e professionisti con soluzioni tecnologiche affidabili, innovative e costruite sulle reali esigenze operative.</p>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="split">
        <div>
          <span class="eyebrow"><span class="dot"></span> La nostra storia</span>
          <h2 class="section-title" style="text-align:left;">Dalle Idee all'<span class="accent">Innovazione</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            TechFuture S.r.l.s. nasce con l'obiettivo di aiutare aziende e professionisti a crescere attraverso soluzioni digitali moderne ed efficaci.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            Fin dall'inizio abbiamo puntato su qualità, affidabilità e innovazione, costruendo rapporti di fiducia con i nostri clienti e affrontando ogni progetto con attenzione e professionalità. La nostra crescita è il risultato dell'impegno costante e della volontà di offrire servizi sempre all'altezza delle aspettative.
          </p>
        </div>

        <div class="split-visual">
          <img src="chi_siamo_team.png" alt="Team TechFuture al lavoro">
        </div>
      </div>
    </div>
  </section>

  <section class="section features" style="background: linear-gradient(180deg, #FFFFFF 0%, #F7FBF8 100%);">
    <div class="container">
      <div class="split" style="grid-template-columns: 1.05fr 1fr;">
        <div class="split-visual">
          <img src="feature_consulenza.png" alt="Consulenza e progettazione tecnologica">
        </div>

        <div>
          <span class="eyebrow"><span class="dot"></span> La nostra missione</span>
          <h2 class="section-title" style="text-align:left;">Soluzioni che fanno la <span class="underline">differenza</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            Crediamo che la tecnologia debba semplificare il lavoro e creare valore. Per questo sviluppiamo soluzioni pensate per migliorare l'organizzazione, ottimizzare i processi e supportare la crescita delle attività dei nostri clienti.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0;">
            Ogni progetto nasce dall'ascolto delle esigenze reali, con l'obiettivo di offrire risultati concreti, affidabili e duraturi.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="split">
        <div>
          <span class="eyebrow"><span class="dot"></span> La nostra filosofia</span>
          <h2 class="section-title" style="text-align:left;">Crescere <span class="accent">insieme</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            Per noi ogni cliente è un partner. Lavoriamo con trasparenza, disponibilità e attenzione ai dettagli, accompagnando ogni progetto con un supporto costante.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0;">
            Crediamo nel miglioramento continuo, nell'aggiornamento delle competenze e nella costruzione di relazioni solide, perché il successo dei nostri clienti rappresenta anche il nostro.
          </p>
        </div>

        <div class="split-visual">
          <img src="split_home.png" alt="Soluzioni digitali e collaborazione con il cliente">
        </div>
      </div>
    </div>
  </section>

  <section class="cta-final" style="padding: 90px 0;">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Contatto diretto</span>
      <h2>Parliamo del tuo prossimo progetto</h2>
      <p>Confrontiamoci sui tuoi obiettivi e costruiamo insieme una soluzione tecnologica solida, scalabile e utile al tuo business.</p>
      <div class="actions">
        <a href="contatti.php" class="btn-primary">Contattaci ora
          <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
