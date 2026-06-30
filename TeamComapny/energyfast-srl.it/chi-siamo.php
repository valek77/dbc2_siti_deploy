<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
include __DIR__ . '/header.php';
?>

  <!-- Hero Section -->
  <section class="hero" style="background: linear-gradient(rgba(30, 58, 138, 0.5), rgba(15, 23, 42, 0.7)), url('about_landscape.jpg') center/cover no-repeat; height: 500px; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div style="max-width: 900px; padding: 20px;">
      <h1 style="color: #ffffff; font-size: clamp(48px, 8vw, 84px); margin: 0; font-weight: 800;">Energia con <span style="color: var(--accent);">trasparenza</span></h1>
    </div>
  </section>

  <!-- Mission Section with Semicircle Image -->
  <section class="about-section" style="padding: 100px 20px; overflow: hidden;">
    <div style="max-width: 1280px; margin: 0 auto; display: flex; align-items: center; gap: 80px; flex-wrap: wrap;">
      <div style="flex: 1; min-width: 400px;">
        <h2 class="section-title" style="text-align: left; font-size: 42px; margin-bottom: 32px; color: var(--text-dark);">La nostra missione è il tuo <span style="color: var(--primary);">risparmio</span></h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
          Siamo nati con un unico grande obiettivo: semplificare la vita delle persone, offrendo contratti luce e gas chiari, convenienti e senza costi nascosti.
        </p>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary);">
          Il nostro team di esperti monitora costantemente il mercato per garantirti tariffe vantaggiose, accompagnandoti anche nella transizione ecologica con soluzioni fotovoltaiche e di climatizzazione all'avanguardia.
        </p>
      </div>
      <div style="flex: 1; position: relative; height: 500px; min-width: 400px;">
        <img src="team_new.jpg" alt="Il Team <?= $brandName ?>" class="hero-image-mask" style="border-radius: 300px 0 0 300px; box-shadow: -20px 20px 40px rgba(0,0,0,0.1);">
      </div>
    </div>
  </section>

  <!-- Stats Ribbon -->
  <section style="background: var(--bg-cream); padding: 80px 20px; color: var(--text-dark); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);">
    <div style="max-width: 1280px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; text-align: center;">
      <div>
        <div style="font-size: 56px; font-weight: 800; color: var(--primary); margin-bottom: 8px;">20k+</div>
        <p style="font-size: 16px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1px;">Clienti Soddisfatti</p>
      </div>
      <div>
        <div style="font-size: 56px; font-weight: 800; color: var(--primary); margin-bottom: 8px;">100%</div>
        <p style="font-size: 16px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1px;">Zero Costi Nascosti</p>
      </div>
      <div>
        <div style="font-size: 56px; font-weight: 800; color: var(--primary); margin-bottom: 8px;">24h</div>
        <p style="font-size: 16px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1px;">Supporto Clienti</p>
      </div>
      <div>
        <div style="font-size: 56px; font-weight: 800; color: var(--primary); margin-bottom: 8px;">-20%</div>
        <p style="font-size: 16px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1px;">Risparmio in Bolletta</p>
      </div>
    </div>
  </section>

  <!-- Values Grid -->
  <section class="about-section" style="padding: 120px 20px; background: var(--bg-cream);">
    <div style="max-width: 1280px; margin: 0 auto;">
      <h2 class="section-title" style="margin-bottom: 80px;">I nostri principi cardine</h2>
      <div class="features-container">
        <div class="trust-card" style="background: #fff;">
          <img src="icon_consultant.png" alt="Consulente" class="trust-mascot">
          <h4>Assistenza Personalizzata</h4>
          <p>Una persona vera a tua disposizione per ogni necessità, niente call center infiniti. Costruiamo rapporti di fiducia.</p>
        </div>
        <div class="trust-card" style="background: #fff;">
          <img src="icon_audit.png" alt="Audit" class="trust-mascot">
          <h4>Analisi dei Consumi</h4>
          <p>Studiamo le tue bollette per trovare la soluzione ottimale che abbassi i costi mensili in modo intelligente.</p>
        </div>
        <div class="trust-card" style="background: #fff;">
          <img src="icon_transparency.png" alt="Trasparenza" class="trust-mascot">
          <h4>Chiarezza Assoluta</h4>
          <p>Ogni voce in bolletta ti sarà spiegata con precisione, senza spiacevoli sorprese a fine mese.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Final Quote Section -->
  <section style="padding: 120px 20px; text-align: center; background: #fff;">
    <div style="max-width: 900px; margin: 0 auto;">
      <h2 style="font-size: 42px; color: var(--primary); line-height: 1.3; font-weight: 700; margin-bottom: 40px;">"Vogliamo essere il partner energetico di cui ti puoi davvero fidare."</h2>
      <p style="font-size: 20px; color: var(--primary); opacity: 0.6;">— Il Team <?= $brandName ?></p>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
