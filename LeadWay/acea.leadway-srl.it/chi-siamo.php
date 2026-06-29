<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
include __DIR__ . '/header.php';
?>

  <!-- Hero Section -->
  <section class="hero"
    style="background: linear-gradient(rgba(4, 8, 50, 0.5), rgba(4, 8, 50, 0.5)), url('about_telecom.png') center/cover no-repeat; height: 500px; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div style="max-width: 900px; padding: 20px;">
      <h1 style="color: #ffffff; font-size: clamp(48px, 8vw, 84px); margin: 0; font-weight: 800;">Chi Siamo</h1>
    </div>
  </section>

  <!-- Mission Section with Semicircle Image -->
  <section class="about-section" style="padding: 120px 20px; overflow: hidden;">
    <div style="max-width: 1280px; margin: 0 auto; display: flex; align-items: center; gap: 80px; flex-wrap: wrap;">
      <div style="flex: 1; min-width: 400px;">
        <h2 class="section-title" style="text-align: left; font-size: 48px; margin-bottom: 32px;">Connessioni e Persone al
          centro</h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--accent); opacity: 0.8; margin-bottom: 24px;">
          <?= $brandName ?> è stata creata da professionisti del mercato delle telecomunicazioni e utilities che volevano un approccio diverso. Al
          contrario dei colossi senz'anima, noi offriamo supporto vero e consulenza personalizzata.
        </p>
        <p style="font-size: 18px; line-height: 1.8; color: var(--accent); opacity: 0.8;">
          Il nostro traguardo è rendere la gestione delle utenze semplice per tutti. Più che semplici fornitori,
          vogliamo essere i partner ideali per l'efficienza e la connettività della tua abitazione o impresa.
        </p>
      </div>
      <div style="flex: 1; position: relative; height: 500px; min-width: 400px;">
        <img src="team_telecom.png" alt="Il Team <?= $brandName ?>" class="hero-image-mask"
          style="border-radius: 300px 0 0 300px; box-shadow: -20px 20px 40px rgba(0,0,0,0.1);">
      </div>
    </div>
  </section>

  <!-- Stats Ribbon (Eni Style) -->
  <section style="background: var(--primary); padding: 80px 20px; color: var(--accent);">
    <div
      style="max-width: 1280px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; text-align: center;">
      <div>
        <div style="font-size: 56px; font-weight: 800; color: var(--accent); margin-bottom: 8px;">50k+</div>
        <p style="font-size: 16px; opacity: 0.8; text-transform: uppercase; letter-spacing: 1px;">Famiglie Servite</p>
      </div>
      <div>
        <div style="font-size: 56px; font-weight: 800; color: var(--accent); margin-bottom: 8px;">100%</div>
        <p style="font-size: 16px; opacity: 0.8; text-transform: uppercase; letter-spacing: 1px;">Copertura Nazionale</p>
      </div>
      <div>
        <div style="font-size: 56px; font-weight: 800; color: var(--accent); margin-bottom: 8px;">24h</div>
        <p style="font-size: 16px; opacity: 0.8; text-transform: uppercase; letter-spacing: 1px;">Risposta Rapida</p>
      </div>
      <div>
        <div style="font-size: 56px; font-weight: 800; color: var(--accent); margin-bottom: 8px;">-15%</div>
        <p style="font-size: 16px; opacity: 0.8; text-transform: uppercase; letter-spacing: 1px;">Risparmio Medio</p>
      </div>
    </div>
  </section>

  <!-- Values Grid -->
  <section class="about-section" style="padding: 120px 20px; background: var(--bg-cream);">
    <div style="max-width: 1280px; margin: 0 auto;">
      <h2 class="section-title" style="margin-bottom: 80px;">I nostri punti di forza</h2>
      <div class="features-container">
        <div class="trust-card" style="background: #fff;">
          <img src="icon_consultant.png" alt="Consulente" class="trust-mascot">
          <h4>Consulente Dedicato</h4>
          <p>Un professionista esperto, con nome e numero diretto, sempre al tuo fianco per ogni esigenza.</p>
        </div>
        <div class="trust-card" style="background: #fff;">
          <img src="icon_audit.png" alt="Audit" class="trust-mascot">
          <h4>Analisi Utenze</h4>
          <p>Utilizziamo tecnologie all'avanguardia per analizzare le tue fatture e proporti risparmi reali.</p>
        </div>
        <div class="trust-card" style="background: #fff;">
          <img src="icon_transparency.png" alt="Trasparenza" class="trust-mascot">
          <h4>Trasparenza Totale</h4>
          <p>I nostri contratti sono semplici, chiari e privi di sorprese. Nessun costo nascosto nelle tue fatture.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Final Quote Section -->
  <section style="padding: 120px 20px; text-align: center; background: #fff;">
    <div style="max-width: 900px; margin: 0 auto;">
      <h2 style="font-size: 42px; color: var(--accent); line-height: 1.3; font-weight: 700; margin-bottom: 40px;">"Il
        nostro traguardo finale non è un contratto in più, ma stabilire connessioni autentiche, offrendo reali vantaggi
        a chi ci sceglie."</h2>
      <p style="font-size: 20px; color: var(--accent); opacity: 0.6;">— La Direzione <?= $brandName ?></p>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
