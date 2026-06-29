<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Soluzioni per la crescita del tuo business';
include __DIR__ . '/header.php';
?>

  <section class="hero" id="hero" style="background-image: url('hero_main.jpg');">
    <div class="hero-overlay" style="background: linear-gradient(90deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0) 100%);"></div>
    <div class="container">
      <div class="hero-content">
        <span class="hero-tag">Generiamo Valore</span>
        <h1 id="hero-title">Acceleriamo le vendite e ottimizziamo i processi aziendali.</h1>
        <p id="hero-text">Affidati a <?= $brandName ?> per la gestione in outsourcing di reti vendita, telemarketing e customer care. Qualità e risultati misurabili al tuo servizio.</p>

        <div class="hero-actions">
          <a href="tariffe.php" class="btn-primary">Scopri i Servizi</a>
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
      <h2 class="section-title" style="font-size: 42px; margin-bottom: 20px; color: var(--text-dark);">I nostri Servizi BPO per il tuo Business</h2>
      <p class="section-sub" style="font-size: 18px; color: var(--text-secondary);">Ottimizza le tue risorse interne. Affida a noi la gestione dei processi chiave e scopri come far crescere le tue performance.</p>
    </div>

    <div class="features-container">
      <div class="trust-card">
        <img src="icon_transparency.png" alt="Trasparenza" class="trust-mascot">
        <h4>Lead Generation B2B e B2C</h4>
        <p>Strategie omnicanale per generare contatti qualificati e aumentare le tue opportunità di vendita con massima trasparenza sui costi di acquisizione.</p>
      </div>
      <div class="trust-card">
        <img src="icon_consultant.png" alt="Consulente" class="trust-mascot">
        <h4>Teleselling & Presa Appuntamenti</h4>
        <p>Un team di operatori esperti e formati per gestire campagne outbound mirate a chiudere contratti e fissare meeting commerciali.</p>
      </div>
      <div class="trust-card">
        <img src="icon_audit.png" alt="Customer Care" class="trust-mascot">
        <h4>Customer Care & Back Office</h4>
        <p>Gestiamo l'assistenza clienti e i processi di back-office per fidelizzare i tuoi utenti e mantenere alta la qualità del tuo servizio.</p>
      </div>
    </div>
  </section>

  <section class="how-it-works-section">
    <div class="hiw-container">
      <div class="hiw-header">
        <h2 class="section-title">Inizia a crescere con <?= $brandName ?> in 4 passi</h2>
        <p class="section-sub">Attivare una campagna con noi è veloce e strategico.</p>
      </div>

      <div class="hiw-steps">
        <div class="hiw-step">
          <div class="hiw-number">1</div>
          <p>Scegli il pacchetto di servizi BPO più adatto alle necessità del tuo brand</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">2</div>
          <p>Definiamo insieme KPI, target e strategia operativa per la campagna</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">3</div>
          <p>Il nostro team dedicato avvia le attività di lead generation o caring</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">4</div>
          <p>Monitora i risultati in tempo reale grazie alla reportistica avanzata</p>
        </div>
      </div>
    </div>
  </section>

  <section class="efficiency-section" style="padding: 100px 20px; background: #fff; overflow: hidden;">
    <div class="container" style="max-width: 1280px; margin: 0 auto; display: flex; align-items: center; gap: 80px; flex-wrap: wrap;">
      <div style="flex: 1.2; min-width: 400px;">
      <div style="flex: 1.2; min-width: 400px;">
        <h2 class="section-title" style="text-align: left; font-size: 48px; line-height: 1.2; margin-bottom: 32px; color: var(--text-dark);">Lead Generation: <span style="color: var(--primary);">Motore di Crescita</span></h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
          Trovare nuovi clienti in modo costante è la sfida più grande per ogni azienda. Con le nostre soluzioni di telemarketing e digital marketing trasformiamo il traffico in prospect qualificati e pronti all'acquisto.
        </p>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 40px;">
          Costruiamo un flusso continuo di opportunità commerciali per la tua rete vendita, ottimizzando i tassi di conversione e riducendo il Cost per Lead.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
          <div style="background: var(--bg-cream); padding: 24px; border-radius: 12px; border-left: 4px solid var(--primary);">
            <h4 style="color: var(--text-dark); margin-bottom: 8px; font-weight: 700;">Tecnologia Top</h4>
            <p style="font-size: 14px; color: var(--text-secondary);">Dialer predittivi, CRM integrati e database profilati ad alta conversione.</p>
          </div>
          <div style="background: var(--bg-cream); padding: 24px; border-radius: 12px; border-left: 4px solid var(--primary);">
            <h4 style="color: var(--text-dark); margin-bottom: 8px; font-weight: 700;">ROI Positivo</h4>
            <p style="font-size: 14px; color: var(--text-secondary);">Campagne basate su performance reali e lead garantiti.</p>
          </div>
        </div>
      </div>
      <div style="flex: 1; min-width: 400px;">
        <img src="efficiency_tech.jpg" alt="Efficienza Tecnologica" style="width: 100%; border-radius: 50% 50% 70% 50% / 50% 50% 70% 50%; box-shadow: 20px 20px 60px rgba(0,0,0,0.1);">
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
          <h5 class="tp-review-title">Incremento delle vendite</h5>
          <p class="tp-review-body">Grazie a <?= $brandName ?> abbiamo triplicato i nostri appuntamenti commerciali in meno di due mesi. Staff preparato e reattivo.</p>
          <p class="tp-review-author">Marco R. - CEO</p>
        </div>
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Partnership solida</h5>
          <p class="tp-review-body">Abbiamo esternalizzato il customer care e la soddisfazione dei nostri clienti è schizzata alle stelle.</p>
          <p class="tp-review-author">Giulia F. - Operations</p>
        </div>
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Zero sorprese</h5>
          <p class="tp-review-body">Servizio impeccabile e KPI sempre rispettati. La reportistica trasparente ci aiuta a prendere le decisioni giuste.</p>
          <p class="tp-review-author">Antonio L. - Sales Manager</p>
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
        <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 42px; line-height: 1.2;"><?= $brandName ?> Outsourcing: Risultati che durano <span style="color: var(--primary);">tutto l'anno</span></h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin: 32px 0;">
          Esternalizza le attività a basso valore aggiunto o i processi complessi al nostro contact center specializzato. Massimizza la produttività del tuo team interno e riduci i costi operativi.
        </p>
        <a href="tariffe.php" class="btn-primary" style="display: inline-block;">Scopri i pacchetti</a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
