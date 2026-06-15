<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Energia per il tuo futuro';
include __DIR__ . '/header.php';
?>

  <section class="hero" id="hero" style="background-image: url('hero_new.png');">
    <div class="hero-overlay" style="background: linear-gradient(90deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0) 100%);"></div>
    <div class="container">
      <div class="hero-content">
        <span class="hero-tag">Energia per la casa</span>
        <h1 id="hero-title">Cerchi le migliori offerte Gas e Luce per la tua casa?</h1>
        <p id="hero-text">Attiva un nuovo contratto luce e gas e avrai la garanzia di un prezzo trasparente e un’assistenza multicanale sempre al tuo fianco.</p>

        <div class="hero-actions">
          <a href="tariffe.php" class="btn-primary">Scopri le offerte</a>
          <a href="contatti.php" class="btn-secondary">Parla con noi</a>
        </div>
      </div>
    </div>
    <div class="hero-wave">
      <svg viewBox="0 0 1440 120" preserveAspectRatio="none" style="width: 100%; height: 100%;">
        <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
      </svg>
    </div>
  </section>

  <section class="features-section" style="background: #fff; padding: 100px 20px;">
    <div style="max-width: 900px; margin: 0 auto 60px; text-align: center;">
      <h2 class="section-title" style="font-size: 42px; margin-bottom: 20px; color: var(--text-dark);">I nostri Prodotti e Servizi per la tua Casa</h2>
      <p class="section-sub" style="font-size: 18px; color: var(--text-secondary);">Ottimizza la tua energia. Controlla i tuoi consumi energetici e scopri come essere più efficiente con i nostri Prodotti e Servizi.</p>
    </div>

    <div class="features-container">
      <div class="trust-card">
        <img src="icon_audit.png" alt="Luce e Gas" class="trust-mascot" >
        <h4>Luce e Gas</h4>
        <p>Tariffe trasparenti e competitive, personalizzate sulla base delle tue necessità e del tuo stile di vita.</p>
      </div>
      <div class="trust-card">
        <img src="icon_consultant.png" alt="Caldaia" class="trust-mascot" >
        <h4><?= $brand ?> Caldaia</h4>
        <p>La scelta sostenibile per riscaldare la tua casa con la massima efficienza e manutenzione programmata.</p>
      </div>
      <div class="trust-card">
        <img src="icon_transparency.png" alt="Clima" class="trust-mascot">
        <h4>Clima e Fotovoltaico</h4>
        <p>Scegli l'energia del sole e il comfort dei climatizzatori a pompa di calore per una casa smart e sostenibile.</p>
      </div>
    </div>
  </section>

  <section class="how-it-works-section">
    <div class="hiw-container">
      <div class="hiw-header">
        <h2 class="section-title">Passa a <?= $brand ?> in 4 semplici passi</h2>
        <p class="section-sub">Attivare le nostre offerte è veloce e sicuro.</p>
      </div>

      <div class="hiw-steps">
        <div class="hiw-step">
          <div class="hiw-number">1</div>
          <p>Scegli l'offerta Luce o Gas più adatta alle tue necessità domestiche</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">2</div>
          <p>Inserisci i tuoi dati e carica l'ultima bolletta per il passaggio rapido</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">3</div>
          <p>Il nostro team verificherà la richiesta e attiverà il nuovo servizio</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">4</div>
          <p>Goditi la tua nuova energia con assistenza multicanale sempre al tuo fianco</p>
        </div>
      </div>
    </div>
  </section>

  <section class="efficiency-section" style="padding: 100px 20px; background: #fff; overflow: hidden;">
    <div class="container" style="max-width: 1280px; margin: 0 auto; display: flex; align-items: center; gap: 80px; flex-wrap: wrap;">
      <div style="flex: 1.2; min-width: 400px;">
        <h2 class="section-title" style="text-align: left; font-size: 48px; line-height: 1.2; margin-bottom: 32px; color: var(--text-dark);"><?= $brand ?> Fotovoltaico: <span style="color: var(--primary);">L'energia del sole</span></h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
          Scegli l'energia del sole: semplice, sostenibile e anche conveniente. Con le nostre soluzioni fotovoltaiche trasformi la tua casa in una centrale di energia pulita e autonoma.
        </p>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 40px;">
          Il futuro dell'energia è nelle nostre mani. Progettiamo il tuo impianto per garantirti il massimo risparmio, riducendo drasticamente i costi in bolletta.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
          <div style="background: var(--bg-cream); padding: 24px; border-radius: 12px; border-left: 4px solid var(--primary);">
            <h4 style="color: var(--text-dark); margin-bottom: 8px; font-weight: 700;">Tecnologia Top</h4>
            <p style="font-size: 14px; color: var(--text-secondary);">Pannelli, Batterie, Pompe di calore e Caldaie di ultima generazione.</p>
          </div>
          <div style="background: var(--bg-cream); padding: 24px; border-radius: 12px; border-left: 4px solid var(--primary);">
            <h4 style="color: var(--text-dark); margin-bottom: 8px; font-weight: 700;">Impatto Zero</h4>
            <p style="font-size: 14px; color: var(--text-secondary);">Rateizzazione intelligente basata sul risparmio energetico reale.</p>
          </div>
        </div>
      </div>
      <div style="flex: 1; min-width: 400px;">
        <img src="efficiency_tech.png" alt="Efficienza Tecnologica" style="width: 100%; border-radius: 50% 50% 70% 50% / 50% 50% 70% 50%; box-shadow: 20px 20px 60px rgba(0,0,0,0.1);">
      </div>
    </div>
  </section>

  <section class="trustpilot-section">
    <div class="trustpilot-wrapper">
      <div class="tp-container">
        <div class="tp-stars">★★★★★</div>
        <p class="tp-text">Valutato <strong>Eccellente</strong> su <span class="tp-star-logo">★</span> <span
            class="tp-logo">Feedaty</span></p>
        <p class="tp-subtext">La soddisfazione dei nostri clienti è la nostra priorità assoluta</p>
      </div>
      <div class="tp-reviews">
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Finalmente chiarezza!</h5>
          <p class="tp-review-body">Con <?= $brand ?> ho finalmente capito cosa pago in bolletta. Prezzi onesti e consulenti gentilissimi.</p>
          <p class="tp-review-author">Marco R.</p>
        </div>
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Risparmio reale</h5>
          <p class="tp-review-body">Passata da un mese, la prima bolletta è stata una sorpresa positiva. Servizio clienti impeccabile.</p>
          <p class="tp-review-author">Giulia F.</p>
        </div>
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Zero attese</h5>
          <p class="tp-review-body">Mi hanno risposto subito e risolto un dubbio sulla voltura in 5 minuti. Consigliatissimi!</p>
          <p class="tp-review-author">Antonio L.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="info-section" style="padding: 100px 20px; background: #fff; color: var(--text-dark);">
    <div class="container"
      style="max-width: 1280px; margin: 0 auto; display: flex; align-items: center; gap: 80px; flex-wrap: wrap;">
      <div style="flex: 1; min-width: 300px; display: flex; justify-content: center;">
        <img src="team_new.png" alt="Il Team <?= $brand ?>"
          style="max-width: 100%; height: auto; border-radius: 50% 70% 50% 50% / 50% 70% 50% 50%; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
      </div>
      <div style="flex: 1.2; min-width: 300px; text-align: left; padding-left: 0;">
        <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 42px; line-height: 1.2;"><?= $brand ?> Clima: Comfort che dura <span style="color: var(--primary);">tutto l'anno</span></h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin: 32px 0;">
          Con i climatizzatori a pompa di calore riscaldi o raffresca la tua casa a seconda della stagione. Unisci efficienza e tecnologia per gestire il tuo riscaldamento direttamente dallo smartphone.
        </p>
        <a href="tariffe.php" class="btn-primary" style="display: inline-block;">Scopri le tariffe</a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
