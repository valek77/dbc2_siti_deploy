<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi Siamo';
include __DIR__ . '/header.php';
?>

  <section class="hero about-hero" style="background: var(--primary); color: #ffffff;">
    <div class="hero-wrapper" style="gap: 80px; align-items: center;">
      <div class="hero-content">
        <h1 class="hero-title" style="color: #ffffff; text-shadow: none;">La nostra missione al tuo fianco
        </h1>
        <p class="hero-p" style="color: rgba(255, 255, 255, 0.92);">
          Siamo il team di Tech Future: professionisti dell'energia impegnati a rendere più semplici le tue scelte, con consulenza chiara, attenzione ai consumi e condizioni trasparenti.
        </p>
        <div class="hero-actions" style="margin-top: 40px;">
          <a href="tariffe.php" class="btn-primary">Le nostre offerte</a>
        </div>
      </div>
      <div class="hero-image" style="flex: 0 0 35%; display: flex; justify-content: center;">
        <img src="energy-home.png" alt="La nostra missione" class="hero-img"
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
        <div style="font-weight: 600; color: var(--text-label);">Consulenza Trasparente</div>
      </div>
      <div>
        <div style="font-size: 48px; font-weight: 800; color: var(--primary); margin-bottom: 10px;">120+</div>
        <div style="font-weight: 600; color: var(--text-label);">Esperti nel Team</div>
      </div>
    </div>
  </section>

  <section class="values-section" style="padding: 80px 20px; background: #f1f5f9;">
    <div style="max-width: 1000px; margin: 0 auto;">
      <h2 class="section-title">I nostri valori</h2>
<p class="section-sub">I principi con cui lavoriamo ogni giorno</p>

      <div
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 40px;">
        <div
          style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); text-align: center;">
          <img src="icon_free_new.png" alt="Trasparenza" class="trust-mascot" style="max-height: 80px; width: auto; margin-bottom: 20px;">
          <h4 style="color: var(--primary); margin-bottom: 15px; font-size: 20px;">Trasparenza Totale</h4>
          <p style="color: var(--text-label); line-height: 1.6; text-align: left;">Basta asterischi e costi nascosti. Ti
            diciamo sempre la
            verità sulla tua bolletta, garantendo prezzi onesti e stabili nel tempo.</p>
        </div>
        <div
          style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); text-align: center;">
          <img src="icon_nocommit_new.png" alt="Sostenibilità" class="trust-mascot"
            style="max-height: 80px; width: auto; margin-bottom: 20px;">
          <h4 style="color: var(--primary); margin-bottom: 15px; font-size: 20px;">Soluzioni su Misura</h4>
          <p style="color: var(--text-label); line-height: 1.6; text-align: left;">Le nostre proposte sono studiate sulle tue esigenze reali. Aiutiamo i clienti privati e business a ottimizzare i costi senza brutte sorprese.</p>
        </div>
        <div
          style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); text-align: center;">
          <img src="icon_call_new.png" alt="Innovazione" class="trust-mascot" style="max-height: 80px; width: auto; margin-bottom: 20px;">
          <h4 style="color: var(--primary); margin-bottom: 15px; font-size: 20px;">Innovazione Utile</h4>
          <p style="color: var(--text-label); line-height: 1.6; text-align: left;">Usiamo la nostra esperienza nel mercato per offrirti servizi all'avanguardia e fornirti strumenti per gestire al meglio le tue utenze in un click.</p>
        </div>
      </div>
    </div>
  </section>

  <section style="padding: 80px 20px; background: #fff;">
    <div style="max-width: 1000px; margin: 0 auto; display: flex; align-items: center; gap: 60px; flex-wrap: wrap;">
      <div style="flex: 1; min-width: 300px;">
        <img src="energy-consulting.png" alt="Tech Future"
          style="max-width: 100%; height: auto; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
      </div>
      <div style="flex: 1.5; min-width: 300px;">
<h2 class="section-title" style="text-align: left; margin-top: 0;">La storia di Tech Future</h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-label); margin-bottom: 20px;">
          Tech Future nasce per aiutare famiglie e imprese a orientarsi nel mondo dell'energia. Analizziamo esigenze e consumi per individuare soluzioni convenienti, comprensibili e affidabili.
        </p>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-label);">
          Ogni giorno costruiamo relazioni durature, offrendo un supporto presente e concreto dall'analisi iniziale fino alla gestione della fornitura.
        </p>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
