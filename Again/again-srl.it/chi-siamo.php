<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
include __DIR__ . '/header.php';
?>

  <section class="hero about-hero" style="background: var(--primary); color: #ffffff;">
    <div class="hero-wrapper" style="gap: 80px; align-items: center;">
      <div class="hero-content">
        <h1 class="hero-title" style="color: #ffffff; text-shadow: none;">Trasformiamo l'energia del domani
        </h1>
        <p class="hero-p" style="color: rgba(255, 255, 255, 0.92);">
          <?= $brandName ?> nasce per rivoluzionare il mercato energetico, offrendo soluzioni all'avanguardia per privati e imprese. L'energia pulita è il nostro impegno quotidiano.
        </p>
        <div class="hero-actions" style="margin-top: 40px;">
          <a href="tariffe.php" class="btn-primary">Scopri le nostre offerte</a>
        </div>
      </div>
      <div class="hero-image" style="flex: 0 0 35%; display: flex; justify-content: center;">
        <img src="about_mission.png" alt="La nostra missione" class="hero-img"
          style="max-width: 100%; height: auto; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
      </div>
    </div>
  </section>

  <section style="padding: 80px 20px; background: #fff;">
    <div
      style="max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 40px; text-align: center;">
      <div>
        <div style="font-size: 48px; font-weight: 800; color: var(--primary); margin-bottom: 10px;">50k+</div>
        <div style="font-weight: 600; color: var(--text-label);">Clienti Soddisfatti</div>
      </div>
      <div>
        <div style="font-size: 48px; font-weight: 800; color: var(--primary); margin-bottom: 10px;">100%</div>
        <div style="font-weight: 600; color: var(--text-label);">Energia Verde</div>
      </div>
      <div>
        <div style="font-size: 48px; font-weight: 800; color: var(--primary); margin-bottom: 10px;">120+</div>
        <div style="font-weight: 600; color: var(--text-label);">Esperti nel Team</div>
      </div>
    </div>
  </section>

  <section style="padding: 80px 20px; background: #f1f5f9;">
    <div style="max-width: 1000px; margin: 0 auto;">
      <h2 class="section-title">I nostri valori</h2>
      <p class="section-sub">Ciò che ci guida ogni giorno</p>

      <div
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 40px;">
        <div
          style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); text-align: center;">
          <img src="icon_free_new.png" alt="Affidabilità" style="max-height: 80px; width: auto; margin-bottom: 20px;">
          <h4 style="color: var(--primary); margin-bottom: 15px; font-size: 20px;">Tariffe Chiare</h4>
          <p style="color: var(--text-label); line-height: 1.6; text-align: left;">Le nostre offerte sono studiate per essere comprensibili e prive di soprese. Vogliamo che tu abbia il pieno controllo sulla spesa energetica.</p>
        </div>
        <div
          style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); text-align: center;">
          <img src="icon_nocommit_new.png" alt="Sicurezza"
            style="max-height: 80px; width: auto; margin-bottom: 20px;">
          <h4 style="color: var(--primary); margin-bottom: 15px; font-size: 20px;">Energia Rinnovabile</h4>
          <p style="color: var(--text-label); line-height: 1.6; text-align: left;">Il nostro impegno è proteggere il pianeta. Ogni fornitura che offriamo contribuisce attivamente alla riduzione dell'impatto ambientale.</p>
        </div>
        <div
          style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); text-align: center;">
          <img src="icon_call_new.png" alt="Assistenza" style="max-height: 80px; width: auto; margin-bottom: 20px;">
          <h4 style="color: var(--primary); margin-bottom: 15px; font-size: 20px;">Supporto Esperto</h4>
          <p style="color: var(--text-label); line-height: 1.6; text-align: left;">Crediamo in una relazione diretta con i nostri clienti. Nessun call center esterno: parlerai sempre con professionisti pronti ad aiutarti.</p>
        </div>
      </div>
    </div>
  </section>

  <section style="padding: 80px 20px; background: #fff;">
    <div style="max-width: 1000px; margin: 0 auto; display: flex; align-items: center; gap: 60px; flex-wrap: wrap;">
      <div style="flex: 1; min-width: 300px;">
        <img src="company_origins.png" alt="<?= $brandName ?>"
          style="max-width: 100%; height: auto; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
      </div>
      <div style="flex: 1.5; min-width: 300px;">
        <h2 class="section-title" style="text-align: left; margin-top: 0;">La nostra Storia</h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-label); margin-bottom: 20px;">
          Nata da un gruppo di ingegneri e specialisti del settore, <?= $brandName ?> si pone l'obiettivo di rendere accessibile a tutti l'energia di domani. Investiamo continuamente in tecnologie all'avanguardia per garantirti la massima efficienza energetica.
        </p>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-label);">
          Siamo fieri di essere il partner di fiducia per migliaia di famiglie ed imprese che scelgono la nostra competenza per il loro approvvigionamento green.
        </p>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>