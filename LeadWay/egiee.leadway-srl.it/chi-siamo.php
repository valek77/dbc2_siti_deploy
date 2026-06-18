<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
include __DIR__ . '/header.php';
?>

  <!-- Hero Section -->
  <section class="hero" style="background: linear-gradient(rgba(94, 200, 215, 0.4), rgba(94, 200, 215, 0.6)), url('about_landscape.jpg') center/cover no-repeat; height: 500px; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div style="max-width: 900px; padding: 20px;">
      <h1 style="color: #ffffff; font-size: clamp(48px, 8vw, 84px); margin: 0; font-weight: 800;">La nostra <span style="color: var(--accent);">passione</span></h1>
    </div>
  </section>

  <!-- Mission Section with Semicircle Image -->
  <section class="about-section" style="padding: 100px 20px; overflow: hidden;">
    <div style="max-width: 1280px; margin: 0 auto; display: flex; align-items: center; gap: 80px; flex-wrap: wrap;">
      <div style="flex: 1; min-width: 400px;">
        <h2 class="section-title" style="text-align: left; font-size: 42px; margin-bottom: 32px; color: var(--text-dark);">Le tue vendite, la nostra <span style="color: var(--primary);">passione</span></h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
          Lavoriamo ogni giorno per offrirti le migliori soluzioni di Business Process Outsourcing (BPO) per la tua azienda, con un impegno costante verso il raggiungimento dei tuoi KPI e l'innovazione tecnologica.
        </p>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary);">
          Dalla Lead Generation al Teleselling e al Customer Care, siamo il tuo partner strategico di fiducia per un futuro aziendale più efficiente, scalabile e profittevole.
        </p>
      </div>
      <div style="flex: 1; position: relative; height: 500px; min-width: 400px;">
        <img src="team_new.jpg" alt="Il Team <?= $brand ?>" class="hero-image-mask" style="border-radius: 300px 0 0 300px; box-shadow: -20px 20px 40px rgba(0,0,0,0.1);">
      </div>
    </div>
  </section>

  <!-- Stats Ribbon (Eni Style) -->
  <section style="background: var(--bg-cream); padding: 80px 20px; color: var(--text-dark); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);">
    <div style="max-width: 1280px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; text-align: center;">
      <div>
        <div style="font-size: 56px; font-weight: 800; color: var(--primary); margin-bottom: 8px;">200+</div>
        <p style="font-size: 16px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1px;">Aziende Partner</p>
      </div>
      <div>
        <div style="font-size: 56px; font-weight: 800; color: var(--primary); margin-bottom: 8px;">15k+</div>
        <p style="font-size: 16px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1px;">Lead Mensili</p>
      </div>
      <div>
        <div style="font-size: 56px; font-weight: 800; color: var(--primary); margin-bottom: 8px;">24/7</div>
        <p style="font-size: 16px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1px;">Customer Care</p>
      </div>
      <div>
        <div style="font-size: 56px; font-weight: 800; color: var(--primary); margin-bottom: 8px;">+30%</div>
        <p style="font-size: 16px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1px;">Crescita Media ROI</p>
      </div>
    </div>
  </section>

  <!-- Values Grid -->
  <section class="about-section" style="padding: 120px 20px; background: var(--bg-cream);">
    <div style="max-width: 1280px; margin: 0 auto;">
      <h2 class="section-title" style="margin-bottom: 80px;">I nostri valori e il nostro impegno</h2>
      <div class="features-container">
        <div class="trust-card" style="background: #fff;">
          <img src="icon_consultant.png" alt="Consulente" class="trust-mascot">
          <h4>Account Manager Dedicato</h4>
          <p>Un professionista esperto sempre al tuo fianco per monitorare l'andamento delle tue campagne e dei processi esternalizzati.</p>
        </div>
        <div class="trust-card" style="background: #fff;">
          <img src="icon_audit.png" alt="Audit" class="trust-mascot">
          <h4>Strategia Data-Driven</h4>
          <p>Utilizziamo tecnologie e software all'avanguardia per analizzare i dati e proporti margini di miglioramento reali sulle vendite.</p>
        </div>
        <div class="trust-card" style="background: #fff;">
          <img src="icon_transparency.png" alt="Trasparenza" class="trust-mascot">
          <h4>Trasparenza sui Risultati</h4>
          <p>Report completi, chiari e prive di sorprese. Paghi in base alle performance e ai risultati effettivamente raggiunti.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Final Quote Section -->
  <section style="padding: 120px 20px; text-align: center; background: #fff;">
    <div style="max-width: 900px; margin: 0 auto;">
      <h2 style="font-size: 42px; color: var(--primary); line-height: 1.3; font-weight: 700; margin-bottom: 40px;">"Il nostro obiettivo non è fornire semplici servizi, ma generare un valore duraturo e misurabile per i nostri partner commerciali."</h2>
      <p style="font-size: 20px; color: var(--primary); opacity: 0.6;">— Il Team <?= $brand ?></p>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
