<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Energia per il tuo futuro';

// Dati dell'OPERATORE ENERGETICO (fornitore di cui il sito è partner/rivenditore).
// Calcolati qui perché footer.php — che li usa per la riga legale — è incluso solo
// a fine pagina. Tutto agnostico: nome e logo arrivano dall'API ($OPERATORE), così
// hero-badge e sezione partner restano corretti anche se l'operatore cambia.
$operatoreNome     = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale'];
$operatoreLogo     = $OPERATORE['logo_url']; // variante per sfondo chiaro (sezione)
$operatoreLogoDark = $OPERATORE['logo2_url'] !== '' ? $OPERATORE['logo2_url'] : $OPERATORE['logo_url']; // sfondo scuro (hero)
$haOperatore       = $operatoreNome !== '' || $operatoreLogo !== '';

include __DIR__ . '/header.php';
?>

  <section class="hero" id="hero" style="background-image: url('hero_main.jpg');">
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

<?php if ($haOperatore) { ?>
        <div class="hero-partner" style="display: inline-flex; align-items: center; gap: 12px; margin-top: 28px; padding: 8px 18px; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.25); border-radius: 999px; backdrop-filter: blur(4px);">
          <span style="color: #fff; font-size: 13px; font-weight: 600; letter-spacing: 0.3px;">Fornitore ufficiale</span>
<?php if ($operatoreLogoDark !== '') { ?>
          <img src="<?= $operatoreLogoDark ?>" alt="<?= $operatoreNome ?>" style="height: 26px; width: auto;">
<?php } else { ?>
          <strong style="color: #fff; font-size: 16px;"><?= $operatoreNome ?></strong>
<?php } ?>
        </div>
<?php } ?>
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
      <h2 class="section-title" style="font-size: 42px; margin-bottom: 20px; color: var(--text-dark);">I nostri Servizi per la tua Casa</h2>
      <p class="section-sub" style="font-size: 18px; color: var(--text-secondary);">Ottimizza la tua energia. Tieni sotto controllo i tuoi consumi e scopri come risparmiare con le nostre offerte luce e gas.</p>
    </div>

    <div class="features-container">
      <div class="trust-card">
        <img src="icon_transparency.png" alt="Trasparenza" class="trust-mascot">
        <h4>Trasparenza Energetica</h4>
        <p>Tariffe luce e gas chiare e prive di sorprese. Paghi solo l'energia che consumi, con la massima trasparenza.</p>
      </div>
      <div class="trust-card">
        <img src="icon_consultant.png" alt="Consulente" class="trust-mascot">
        <h4>Consulenza Dedicata</h4>
        <p>Un esperto di energia sempre al tuo fianco per guidarti nella scelta delle migliori tariffe e soluzioni.</p>
      </div>
      <div class="trust-card">
        <img src="icon_audit.png" alt="Audit Energetico" class="trust-mascot">
        <h4>Audit dei Consumi</h4>
        <p>Analizziamo gratuitamente i tuoi consumi per eliminare gli sprechi e abbattere i costi in bolletta.</p>
      </div>
    </div>
  </section>

<?php if ($haOperatore) { ?>
  <section class="partner-section" style="padding: 100px 20px; background: var(--bg-cream);">
    <div class="container" style="max-width: 1100px; margin: 0 auto; display: flex; align-items: center; gap: 80px; flex-wrap: wrap;">
      <div style="flex: 1; min-width: 280px; display: flex; justify-content: center;">
        <div style="background: #fff; padding: 48px 56px; border-radius: 16px; box-shadow: 0 20px 50px rgba(0,0,0,0.08); display: flex; align-items: center; justify-content: center; width: 100%;">
<?php if ($operatoreLogo !== '') { ?>
          <img src="<?= $operatoreLogo ?>" alt="<?= $operatoreNome ?>" style="max-width: 100%; max-height: 100px; width: auto; height: auto;">
<?php } else { ?>
          <span style="font-size: 40px; font-weight: 800; color: var(--text-dark);"><?= $operatoreNome ?></span>
<?php } ?>
        </div>
      </div>
      <div style="flex: 1.2; min-width: 320px; text-align: left;">
        <span class="hero-tag" style="display: inline-block; margin-bottom: 16px;">Il nostro partner energetico</span>
        <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 42px; line-height: 1.2; color: var(--text-dark);">In collaborazione con <span style="color: var(--primary);"><?= $operatoreNome ?></span></h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin: 28px 0;">
          Affidiamo le tue forniture di luce e gas a <?= $operatoreNome ?>, un operatore energetico solido e affidabile. Questa partnership ci permette di offrirti tariffe trasparenti, energia di qualità e un'assistenza sempre al tuo fianco.
        </p>
        <a href="tariffe.php" class="btn-primary" style="display: inline-block;">Scopri le offerte</a>
      </div>
    </div>
  </section>
<?php } ?>

  <section class="how-it-works-section">
    <div class="hiw-container">
      <div class="hiw-header">
        <h2 class="section-title">Passa a <?= $brandName ?> in 4 semplici passi</h2>
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
        <h2 class="section-title" style="text-align: left; font-size: 48px; line-height: 1.2; margin-bottom: 32px; color: var(--text-dark);"><?= $brandName ?> Luce e Gas: <span style="color: var(--primary);">L'energia che conviene</span></h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
          Scegli un'energia semplice, trasparente e conveniente. Con le nostre offerte luce e gas paghi solo ciò che consumi, senza costi nascosti né sorprese in bolletta.
        </p>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 40px;">
          Il futuro dell'energia è nella chiarezza. Ti affianchiamo nella scelta della tariffa più adatta alle tue abitudini, per garantirti il massimo risparmio mese dopo mese.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
          <div style="background: var(--bg-cream); padding: 24px; border-radius: 12px; border-left: 4px solid var(--primary);">
            <h4 style="color: var(--text-dark); margin-bottom: 8px; font-weight: 700;">Prezzo Trasparente</h4>
            <p style="font-size: 14px; color: var(--text-secondary);">Tariffe luce e gas indicizzate ai mercati PUN e PSV, sempre chiare e aggiornate.</p>
          </div>
          <div style="background: var(--bg-cream); padding: 24px; border-radius: 12px; border-left: 4px solid var(--primary);">
            <h4 style="color: var(--text-dark); margin-bottom: 8px; font-weight: 700;">Energia Verde</h4>
            <p style="font-size: 14px; color: var(--text-secondary);">Energia elettrica 100% da fonti rinnovabili certificate con Garanzia d'Origine.</p>
          </div>
        </div>
      </div>
      <div style="flex: 1; min-width: 400px;">
        <img src="efficiency_tech.jpg" alt="Energia trasparente" style="width: 100%; border-radius: 50% 50% 70% 50% / 50% 50% 70% 50%; box-shadow: 20px 20px 60px rgba(0,0,0,0.1);">
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
          <p class="tp-review-body">Con <?= $brandName ?> ho finalmente capito cosa pago in bolletta. Prezzi onesti e consulenti gentilissimi.</p>
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
        <img src="team_new.jpg" alt="Il Team <?= $brandName ?>"
          style="max-width: 100%; height: auto; border-radius: 50% 70% 50% 50% / 50% 70% 50% 50%; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
      </div>
      <div style="flex: 1.2; min-width: 300px; text-align: left; padding-left: 0;">
        <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 42px; line-height: 1.2;"><?= $brandName ?> al tuo fianco: <span style="color: var(--primary);">assistenza tutto l'anno</span></h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin: 32px 0;">
          Con il nostro servizio clienti dedicato gestisci forniture, bollette e consumi in totale autonomia. Unisci semplicità e tecnologia per tenere sotto controllo la tua energia direttamente dallo smartphone.
        </p>
        <a href="tariffe.php" class="btn-primary" style="display: inline-block;">Scopri le tariffe</a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
