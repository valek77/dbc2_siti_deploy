<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
$pageDescription = ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Gierre Contact')
    . ' nasce nel 2012 dal sogno di un giovane imprenditore: diventare leader nei Contact Center per l\'energia e le telecomunicazioni. Oggi 20 sedi in Campania e oltre 1.000 collaboratori.';
include __DIR__ . '/header.php';
// Ragione sociale dall'API (company_name), mai il nome commerciale.
$companyName = $COMPANY['company_name'];
?>

  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Chi siamo</span>
      <h1>Lo sviluppo di un <span class="accent">grande sogno</span></h1>
      <p>Dal 2012 costruiamo, persona dopo persona, uno dei principali Contact Center per l'energia e le telecomunicazioni. Questa è la nostra storia.</p>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

  <!-- Storia split -->
  <section class="section">
    <div class="container">
      <div class="split">
        <div>
          <span class="eyebrow"><span class="dot"></span> La nostra storia</span>
          <h2 class="section-title" style="text-align:left;">Un percorso iniziato <span class="accent">nel 2012</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            <?= $companyName ?> ha intrapreso il suo percorso nel 2012, grazie all'ambizioso progetto di un giovane imprenditore. Fin dall'inizio abbiamo perseguito un chiaro obiettivo: affermarci come leader nel settore dei Contact Center per l'energia e le telecomunicazioni.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0;">
            Partiti con tre uffici a Napoli, abbiamo realizzato una crescita costante che oggi ci vede presenti con 20 sedi distribuite su tutto il territorio campano e oltre 1.000 collaboratori, di cui una parte significativa opera anche in modalità smart working. Un'espansione che testimonia il nostro impegno nel fornire servizi di qualità alle imprese e ai privati.
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
        <div class="n">2012</div>
        <div class="l">Anno di nascita</div>
      </div>
      <div class="stat-item">
        <div class="n">20</div>
        <div class="l">Sedi in Campania</div>
      </div>
      <div class="stat-item">
        <div class="n">1.000+</div>
        <div class="l">Collaboratori</div>
      </div>
      <div class="stat-item">
        <div class="n">Smart</div>
        <div class="l">Working diffuso</div>
      </div>
    </div>
  </section>

  <!-- Reparti -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri reparti</span>
        <h2 class="section-title">Persone, ruoli, <span class="underline">risultati</span></h2>
        <p class="section-sub">Forniamo alle nostre risorse strategia, visione e strumenti concreti per eccellere. Ogni reparto è un tassello del nostro modello operativo.</p>
      </div>

      <div class="features-container">
        <article class="feature-card">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
          </div>
          <h4>Responsabile HR</h4>
          <p>I nostri Responsabili delle Risorse Umane rivestono un ruolo strategico. Attraverso un'attenta gestione del capitale umano individuano e valorizzano i migliori talenti, contribuendo a creare un vantaggio competitivo sostenibile.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon warm">
            <svg viewBox="0 0 24 24" fill="none"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0122 16.92z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h4>Reparto Teleselling</h4>
          <p>Ogni progetto di teleselling viene progettato e realizzato su misura. Selezioniamo e formiamo operatori qualificati, che rappresentano un elemento fondamentale del nostro modello operativo.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Back Office</h4>
          <p>Il reparto Back Office costituisce il pilastro organizzativo e amministrativo della struttura. Gestisce con efficienza le attività operative, garantendo il corretto supporto ai processi commerciali e la piena realizzazione dei servizi offerti ai clienti.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Cultura aziendale -->
  <section class="section">
    <div class="container">
      <div class="split" style="grid-template-columns: 1fr 1.05fr;">
        <div class="split-visual">
          <img src="feature_consulenza.png" alt="Il nostro team al lavoro">
        </div>

        <div>
          <span class="eyebrow"><span class="dot"></span> La nostra cultura aziendale</span>
          <h2 class="section-title" style="text-align:left;">Le persone al <span class="underline">centro</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 18px;">
            In <?= $companyName ?> le persone rappresentano il fulcro della nostra organizzazione. La nostra cultura si fonda sulla valorizzazione delle risorse umane, sulla formazione continua e sullo sviluppo professionale, anche attraverso soluzioni flessibili come lo smart working.
          </p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0;">
            Siamo convinti che solo attraverso lo sviluppo e il benessere delle nostre persone sia possibile garantire un servizio eccellente ai clienti e consolidare la nostra posizione sul mercato.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Pilastri -->
  <section class="section features">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri pilastri</span>
        <h2 class="section-title">Quattro principi, <span class="underline">un approccio</span></h2>
      </div>

      <div class="features-container features-2col">
        <article class="feature-card">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 14l4-4 3 3 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h4>Sviluppo e Formazione</h4>
          <p>Investiamo costantemente nella crescita professionale dei collaboratori attraverso programmi di formazione mirati e percorsi di carriera strutturati.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon warm">
            <svg viewBox="0 0 24 24" fill="none"><path d="M12 2l2 6h6l-5 4 2 6-5-4-5 4 2-6-5-4h6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          </div>
          <h4>Meritocrazia e Rispetto</h4>
          <p>Promuoviamo un ambiente basato sul riconoscimento del merito, sulla correttezza e sul rispetto reciproco.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none"><circle cx="9" cy="7" r="3" stroke="currentColor" stroke-width="2"/><circle cx="17" cy="9" r="3" stroke="currentColor" stroke-width="2"/><path d="M3 20a6 6 0 0112 0M13 20a6 6 0 018-5.66" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
          </div>
          <h4>Collaborazione</h4>
          <p>Favoriamo il lavoro di squadra e la sinergia tra i vari reparti per il raggiungimento degli obiettivi comuni.</p>
        </article>
        <article class="feature-card">
          <div class="feature-icon warm">
            <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="currentColor"/></svg>
          </div>
          <h4>Professionalità e Risultato</h4>
          <p>Selezioniamo e valorizziamo persone competenti, proattive e orientate al raggiungimento di elevati standard qualitativi.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Quote finale -->
  <section class="quote-banner">
    <div class="mark">"</div>
    <h2>Il successo di <?= $companyName ?> nasce dalle persone, dall'impegno e dalla professionalità di chi lavora, ha lavorato o lavorerà con noi.</h2>
    <p class="by">— Il Team <?= $companyName ?></p>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
