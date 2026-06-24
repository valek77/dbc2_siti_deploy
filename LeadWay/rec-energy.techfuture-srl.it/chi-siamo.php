<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
include __DIR__ . '/header.php';
?>

  <section class="hero-page" style="background: #FAFAFA; padding: 120px 24px 80px; text-align: center;">
    <div class="container" style="max-width: 800px; margin: 0 auto;">
      <span class="eyebrow" style="color: var(--primary); font-weight: 700; text-transform: uppercase; font-size: 14px; letter-spacing: 2px; margin-bottom: 20px; display: inline-block;">
        La nostra missione
      </span>
      <h1 style="font-size: clamp(36px, 5vw, 56px); line-height: 1.1; font-weight: 800; color: #18181B; margin-bottom: 24px;">
        Un riferimento vero.<br>Non un robot.
      </h1>
      <p style="font-size: 19px; color: #71717A; margin-bottom: 0; line-height: 1.6;">
        Siamo il tuo fornitore di fiducia per l'energia. Crediamo nella trasparenza totale e nel valore del supporto umano.
      </p>
    </div>
  </section>

  <section class="section" style="padding: 100px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
      <div class="split" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 80px; align-items: center;">
        <div>
          <img src="about_landscape.jpg" style="width: 100%; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
        </div>
        <div>
          <h2 style="font-size: 32px; font-weight: 800; margin-bottom: 24px; line-height: 1.2;">Capisci cosa firmi.<br>Capisci cosa paghi.</h2>
          <div style="width: 48px; height: 4px; background: var(--primary); border-radius: 2px; margin-bottom: 24px;"></div>
          <p style="font-size: 17px; color: #71717A; line-height: 1.7; margin-bottom: 24px;">
            Nel mercato dell'energia c'è molta confusione. Noi abbiamo deciso di fare il contrario: semplificare tutto. Prezzi, bolletta e componenti diventano finalmente leggibili.
          </p>
          <p style="font-size: 17px; color: #71717A; line-height: 1.7; margin-bottom: 32px;">
            Inoltre, non ti abbandoniamo dopo la firma. Il tuo EnergyTeller ti spiega l'offerta, i costi e le condizioni prima di farti scegliere, e resta a tua disposizione per qualsiasi dubbio futuro.
          </p>
          <a href="contatti.php" class="btn-primary" style="background: var(--primary); color: #fff; padding: 14px 32px; border-radius: 99px; text-decoration: none; font-weight: 600; display: inline-block;">Parla con noi</a>
        </div>
      </div>
    </div>
  </section>

  <section class="section" style="background: #FAFAFA; padding: 100px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
      <div class="section-head" style="text-align: center; margin-bottom: 64px;">
        <h2 style="font-size: 36px; font-weight: 800; line-height: 1.2;">I nostri valori</h2>
      </div>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 32px;">
        <div style="background: #fff; padding: 40px; border-radius: 20px; border: 1px solid #E4E4E7; text-align: center;">
          <div style="font-size: 40px; margin-bottom: 20px;">💡</div>
          <h4 style="font-size: 20px; font-weight: 800; margin-bottom: 16px;">Trasparenza</h4>
          <p style="color: #71717A; line-height: 1.6;">Nessun costo nascosto. Quello che vedi è quello che paghi, con spread chiari sui prezzi all'ingrosso.</p>
        </div>
        <div style="background: #fff; padding: 40px; border-radius: 20px; border: 1px solid #E4E4E7; text-align: center;">
          <div style="font-size: 40px; margin-bottom: 20px;">🤝</div>
          <h4 style="font-size: 20px; font-weight: 800; margin-bottom: 16px;">Supporto Umano</h4>
          <p style="color: #71717A; line-height: 1.6;">L'EnergyTeller è una persona vera, non un call center robotizzato, pronta a rispondere a tutte le tue domande.</p>
        </div>
        <div style="background: #fff; padding: 40px; border-radius: 20px; border: 1px solid #E4E4E7; text-align: center;">
          <div style="font-size: 40px; margin-bottom: 20px;">⚡</div>
          <h4 style="font-size: 20px; font-weight: 800; margin-bottom: 16px;">Semplicità</h4>
          <p style="color: #71717A; line-height: 1.6;">Semplifichiamo il mondo dell'energia, dall'attivazione rapida online alla bolletta chiara da leggere.</p>
        </div>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
