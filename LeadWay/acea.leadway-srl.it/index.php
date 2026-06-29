<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Energia per il tuo futuro';
include __DIR__ . '/header.php';
?>

  <section class="hero" id="hero">
    <div class="hero-text-side">
      <div class="hero-content">
        <h1 id="hero-title">La tua connessione con <?= $brandName ?></h1>
        <p id="hero-text">Dimentica i costi imprevisti e i call center infiniti. Scegli un partner per le telecomunicazioni e le utenze che ti affianca con un consulente su misura per la tua abitazione o azienda.</p>

        <div class="hero-actions">
          <a href="tariffe.php" class="btn-primary">Scopri le offerte</a>
          <a href="contatti.php" class="btn-secondary">Parla con noi</a>
        </div>
      </div>
    </div>
    <div class="hero-image-side">
      <img src="hero_telecom.png" alt="Telecom Future" class="hero-image-mask">
    </div>
  </section>

  <section class="features-section">
    <div style="max-width: 900px; margin: 0 auto 80px; text-align: center;">
      <h2 class="section-title" style="font-size: 48px; margin-bottom: 20px;">Un consulente sempre al tuo fianco</h2>
      <p class="section-sub" style="font-size: 20px;">Con <?= $brandName ?> sei più di un semplice cliente. Crediamo nel
        rapporto umano e vogliamo ottimizzare le telecomunicazioni e le utenze della tua casa o azienda.</p>
    </div>

    <div class="features-container">
      <div class="trust-card">
        <img src="icon_consultant.png" alt="Consulente" class="trust-mascot">
        <h4>Esperto Dedicato</h4>
        <p>Nessuna attesa telefonica. Avrai a disposizione uno specialista che conosce le tue esigenze e ti guida passo dopo passo verso la tariffa migliore.</p>
      </div>
      <div class="trust-card">
        <img src="icon_audit.png" alt="Audit" class="trust-mascot">
        <h4>Analisi Energetica</h4>
        <p>Studiamo le tue esigenze di connessione e consumo per individuare eventuali sprechi e offrirti soluzioni
          ottimali per risparmiare.</p>
      </div>
      <div class="trust-card">
        <img src="icon_transparency.png" alt="Trasparenza" class="trust-mascot">
        <h4>Tariffe Chiare</h4>
        <p>Costi legati all'andamento del mercato, senza spese extra o brutte sorprese in bolletta. Un approccio diretto
          e trasparente.</p>
      </div>
    </div>
  </section>

  <section class="how-it-works-section">
    <div class="hiw-container">
      <div class="hiw-header">
        <h2 class="section-title">Il tuo percorso verso il risparmio</h2>
        <p class="section-sub">Dalla consulenza all'efficienza, in 4 semplici passaggi</p>
      </div>

      <div class="hiw-steps">
        <div class="hiw-step">
          <div class="hiw-number">1</div>
          <p>Consulenza iniziale gratuita per analizzare le tue necessità</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">2</div>
          <p>Analisi dettagliata delle tue bollette e connettività</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">3</div>
          <p>Piano di ottimizzazione personalizzato dal tuo esperto</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">4</div>
          <p>Attivazione del contratto e inizio del tuo vero risparmio</p>
        </div>
      </div>
    </div>
  </section>

  <section class="efficiency-section" style="padding: 140px 20px; background: #fff; overflow: hidden;">
    <div class="container"
      style="max-width: 1280px; margin: 0 auto; display: flex; align-items: center; gap: 80px; flex-wrap: wrap;">
      <div style="flex: 1.2; min-width: 400px;">
        <h2 class="section-title"
          style="text-align: left; font-size: 52px; line-height: 1.1; margin-bottom: 40px; color: var(--accent);">
          Connettività e Utenze: La Vera Rivoluzione</h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--accent); opacity: 0.8; margin-bottom: 24px;">
          Molti operatori vendono "pacchetti magici" promettendo risparmi universali. Ma le tue esigenze sono uniche:
          la velocità richiesta, la copertura e le tue abitudini richiedono un'analisi specifica.
        </p>
        <p style="font-size: 18px; line-height: 1.8; color: var(--accent); opacity: 0.8; margin-bottom: 40px;">
          Con <?= $brandName ?>, l'ottimizzazione è **su misura**. Individuiamo le migliori offerte di telecomunicazioni e
          utenze per ridurre i tuoi costi garantendoti prestazioni al top, il tutto con un **consulente dedicato** sempre
          al tuo fianco.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
          <div style="background: var(--bg-cream); padding: 24px; border-radius: 16px;">
            <h4 style="color: var(--accent); margin-bottom: 8px; font-weight: 700;">Tecnologia Top</h4>
            <p style="font-size: 14px; opacity: 0.8;">Fibra ottica, 5G e servizi di fonia all'avanguardia per ogni
              necessità.</p>
          </div>
          <div style="background: var(--bg-cream); padding: 24px; border-radius: 16px;">
            <h4 style="color: var(--accent); margin-bottom: 8px; font-weight: 700;">Impatto Zero</h4>
            <p style="font-size: 14px; opacity: 0.8;">Bollette chiare e ottimizzate sul reale consumo delle tue utenze.
            </p>
          </div>
        </div>
      </div>
      <div style="flex: 1; min-width: 400px;">
        <img src="services_telecom.png" alt="Servizi Telecomunicazioni"
          style="width: 100%; border-radius: 0 300px 300px 0; box-shadow: 20px 20px 60px rgba(0,0,0,0.1);">
      </div>
    </div>
  </section>

  <section class="trustpilot-section">
    <div class="trustpilot-wrapper">
      <div class="tp-container">
        <div class="tp-stars">★★★★★</div>
        <p class="tp-text">Valutato <strong>Eccellente</strong> su <span class="tp-star-logo">★</span> <span
            class="tp-logo">Feedaty</span></p>
        <p class="tp-subtext">La fiducia dei nostri clienti è la nostra forza</p>
      </div>
      <div class="tp-reviews">
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Finalmente chiarezza!</h5>
          <p class="tp-review-body">Con <?= $brandName ?> ho finalmente capito cosa pago in bolletta. Prezzi onesti e
            consulenti gentilissimi.</p>
          <p class="tp-review-author">Marco R.</p>
        </div>
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Risparmio reale</h5>
          <p class="tp-review-body">Passata da un mese, la prima bolletta è stata una sorpresa positiva. Servizio
            clienti impeccabile.</p>
          <p class="tp-review-author">Giulia F.</p>
        </div>
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Zero attese</h5>
          <p class="tp-review-body">Mi hanno risposto subito e risolto un dubbio sulla voltura in 5 minuti.
            Consigliatissimi!</p>
          <p class="tp-review-author">Antonio L.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="info-section"
    style="padding: var(--section-padding) 20px; background: #ffffff; color: var(--text-dark);">
    <div class="container"
      style="max-width: 1280px; margin: 0 auto; display: flex; align-items: center; gap: var(--gutter); flex-wrap: wrap;">
      <div style="flex: 1; min-width: 300px; display: flex; justify-content: center;">
        <img src="team_telecom.png" alt="Il Team <?= $brandName ?>"
          style="max-width: 100%; height: auto; border-radius: var(--radius-lg); box-shadow: 0 20px 40px rgba(4, 8, 50, 0.08);">
      </div>
      <div style="flex: 1.2; min-width: 300px; text-align: left; padding-left: 40px;">
        <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 42px; line-height: 1.2;">
          Innovazione al servizio del tuo risparmio</h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin: 32px 0;">
          In <?= $brandName ?> monitoriamo costantemente il mercato delle telecomunicazioni e delle utilities.
          Questo ci permette di offrirti tariffe sempre competitive e performanti, senza costi nascosti.
          La nostra missione è semplificare la gestione delle tue utenze.
        </p>
        <a href="tariffe.php" class="btn-primary" style="display: inline-block;">Scopri le tariffe</a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
