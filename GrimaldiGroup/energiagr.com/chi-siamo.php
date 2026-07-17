<?php
require __DIR__ . '/_config.php';
$brandName = $COMPANY['company_name'] !== ''
    ? $COMPANY['company_name']
    : ($LANDING_PAGE['nome_portale'] !== ''
        ? $LANDING_PAGE['nome_portale']
        : ($LANDING_PAGE['titolo'] !== '' ? $LANDING_PAGE['titolo'] : 'GR Contact Call Center'));
// Ragione sociale dall'API (company_name), mai il nome commerciale.
$companyName = $COMPANY['company_name'];
$pageTitle = 'Chi Siamo';
$pageDescription = $companyName . ' nasce nel 2012 dal sogno di un giovane imprenditore: diventare leader nei Contact Center per l\'energia e le telecomunicazioni. Oggi 20 sedi in Campania e oltre 1.000 collaboratori.';
include __DIR__ . '/header.php';
?>

  <!-- HERO — foto città/grattacieli -->
  <section class="page-hero">
    <div class="photo-bg" style="background-image: url('https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?auto=format&fit=crop&w=1600&q=80');"></div>
    <div class="photo-overlay"></div>
    <div class="inner">
      <span class="eyebrow" style="color:var(--primary-light);"><span class="dot" style="background:var(--primary-light);"></span> Chi siamo</span>
      <h1>Lo sviluppo di un <span class="hl">grande sogno</span></h1>
      <p>Dal 2012 costruiamo, persona dopo persona, uno dei principali Contact Center per l'energia e le telecomunicazioni. Questa è la nostra storia.</p>
    </div>
  </section>

  <!-- STORIA SPLIT -->
  <section class="section">
    <div class="container">
      <div class="split">
        <div>
          <span class="eyebrow"><span class="dot"></span> La nostra storia</span>
          <h2 class="section-title">Un percorso iniziato<br><span class="hl">nel 2012</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin:0 0 20px;"><?= $companyName ?> ha intrapreso il suo percorso nel 2012, grazie all'ambizioso progetto di un giovane imprenditore. Fin dall'inizio abbiamo perseguito un chiaro obiettivo: affermarci come leader nel settore dei Contact Center per l'energia e le telecomunicazioni.</p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin:0 0 36px;">Partiti con tre uffici a Napoli, abbiamo realizzato una crescita costante che oggi ci vede presenti con 20 sedi distribuite su tutto il territorio campano e oltre 1.000 collaboratori, di cui una parte significativa opera anche in modalità smart working. Un'espansione che testimonia il nostro impegno nel fornire servizi di qualità alle imprese e ai privati.</p>
          <a href="tariffe.php" class="btn-primary">Scopri le offerte</a>
        </div>
        <div class="split-img">
          <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=800&q=80" alt="Il team <?= $companyName ?> al lavoro" loading="lazy">
          <div class="badge">
            <div class="label">Dal</div>
            <div class="val">2012</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- STAT STRIP -->
  <div class="stat-strip">
    <div class="stat-grid">
      <div class="stat-item"><div class="n">2012</div><div class="l">Anno di nascita</div></div>
      <div class="stat-item"><div class="n">20</div><div class="l">Sedi in Campania</div></div>
      <div class="stat-item"><div class="n">1.000+</div><div class="l">Collaboratori</div></div>
      <div class="stat-item"><div class="n">Smart</div><div class="l">Working diffuso</div></div>
    </div>
  </div>

  <!-- REPARTI -->
  <section class="section" style="background:var(--bg-soft);">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri reparti</span>
        <h2 class="section-title">Persone, ruoli,<br><span class="ul">risultati</span></h2>
        <p class="section-sub">Forniamo alle nostre risorse strategia, visione e strumenti concreti per eccellere. Ogni reparto è un tassello del nostro modello operativo.</p>
      </div>
      <div class="feature-grid">
        <div class="feat-card">
          <div class="ico">👥</div>
          <h4>Responsabile HR</h4>
          <p>I nostri Responsabili delle Risorse Umane rivestono un ruolo strategico. Attraverso un'attenta gestione del capitale umano individuano e valorizzano i migliori talenti, contribuendo a creare un vantaggio competitivo sostenibile.</p>
        </div>
        <div class="feat-card">
          <div class="ico">📞</div>
          <h4>Reparto Teleselling</h4>
          <p>Ogni progetto di teleselling viene progettato e realizzato su misura. Selezioniamo e formiamo operatori qualificati, che rappresentano un elemento fondamentale del nostro modello operativo.</p>
        </div>
        <div class="feat-card">
          <div class="ico">🗂️</div>
          <h4>Back Office</h4>
          <p>Il reparto Back Office costituisce il pilastro organizzativo e amministrativo della struttura. Gestisce con efficienza le attività operative, garantendo il corretto supporto ai processi commerciali e la piena realizzazione dei servizi offerti ai clienti.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CULTURA AZIENDALE — dark -->
  <section class="dark-section" style="padding: var(--section) 0;">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow" style="color:var(--primary-light);"><span class="dot" style="background:var(--primary-light);"></span> La nostra cultura aziendale</span>
        <h2 class="section-title" style="color:#fff;">Le persone al <span style="color:var(--primary-light);">centro</span></h2>
        <p class="section-sub" style="color:rgba(255,255,255,.75);">In <?= $companyName ?> le persone rappresentano il fulcro della nostra organizzazione. La nostra cultura si fonda sulla valorizzazione delle risorse umane, sulla formazione continua e sullo sviluppo professionale, anche attraverso soluzioni flessibili come lo smart working.</p>
      </div>
      <div class="feature-grid" style="grid-template-columns: repeat(2, 1fr); max-width: 820px; margin: 0 auto;">
        <div class="feat-card" style="background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12);">
          <div class="ico">📈</div>
          <h4 style="color:#fff;">Sviluppo e Formazione</h4>
          <p style="color:rgba(255,255,255,.7);">Investiamo costantemente nella crescita professionale dei collaboratori attraverso programmi di formazione mirati e percorsi di carriera strutturati.</p>
        </div>
        <div class="feat-card" style="background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12);">
          <div class="ico">⚖️</div>
          <h4 style="color:#fff;">Meritocrazia e Rispetto</h4>
          <p style="color:rgba(255,255,255,.7);">Promuoviamo un ambiente basato sul riconoscimento del merito, sulla correttezza e sul rispetto reciproco.</p>
        </div>
        <div class="feat-card" style="background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12);">
          <div class="ico">🤝</div>
          <h4 style="color:#fff;">Collaborazione</h4>
          <p style="color:rgba(255,255,255,.7);">Favoriamo il lavoro di squadra e la sinergia tra i vari reparti per il raggiungimento degli obiettivi comuni.</p>
        </div>
        <div class="feat-card" style="background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.12);">
          <div class="ico">🎯</div>
          <h4 style="color:#fff;">Professionalità e Risultato</h4>
          <p style="color:rgba(255,255,255,.7);">Selezioniamo e valorizziamo persone competenti, proattive e orientate al raggiungimento di elevati standard qualitativi.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- QUOTE -->
  <section class="section" style="text-align:center;">
    <div class="container" style="max-width:800px;">
      <div style="font-size:64px; color:var(--primary); line-height:1; margin-bottom:24px; font-family:var(--font-display);">"</div>
      <h2 style="font-size:clamp(24px,3.5vw,34px); color:var(--ink); font-weight:700; line-height:1.4; margin:0 0 32px;">Il successo di <?= $companyName ?> nasce dalle persone, dall'impegno e dalla professionalità di chi lavora, ha lavorato o lavorerà con noi.</h2>
      <div style="font-family:var(--font-display); font-weight:700; color:var(--primary); font-size:16px;">— Il Team <?= $companyName ?></div>
    </div>
  </section>

  <!-- FOTO background / CTA -->
  <section class="photo-section" style="padding: var(--section) 0;">
    <div class="photo-bg" style="background-image: url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=1600&q=80');"></div>
    <div class="photo-overlay"></div>
    <div class="container" style="text-align:center; position:relative; z-index:2;">
      <h2 style="font-family:var(--font-display); font-size:clamp(30px,5vw,50px); font-weight:800; color:#fff; margin:0 0 20px;">Pronto a risparmiare?</h2>
      <p style="font-size:18px; color:rgba(255,255,255,.8); margin:0 auto 36px; max-width:520px; line-height:1.6;">Inizia con una consulenza gratuita. Analizziamo insieme la tua situazione senza impegno.</p>
      <a href="contatti.php" class="btn-primary" style="font-size:17px; padding:16px 44px;">Contattaci ora →</a>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
