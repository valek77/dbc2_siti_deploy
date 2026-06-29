<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';
$pageDescription = 'Mettiti in contatto con Locura per ricevere una consulenza energetica personalizzata. Inizia subito ad abbattere i consumi.';
include __DIR__ . '/header.php';
?>


<!doctype html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Contatti— <?=$COMPANY["nome_commerciale"] ?></title>
  <link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=DM+Sans:wght@400;500;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>


  <main style="margin-top: 60px; background: #fff;">
    <div style="max-width: 800px; margin: 0 auto; padding: 40px 20px 20px; text-align: center;">
      <h2 class="section-title" style="font-size: 48px; color: var(--text-dark); margin-top: 0;">Contattaci</h2>
      <p class="section-sub" style="font-size: 20px; color: var(--text-label);">Compila il modulo sottostante per
        inviarci un messaggio o essere ricontattato</p>
    </div>

    <section class="green-intro"
      style="padding: 80px 20px; background: var(--primary); margin: 60px 0; color: #ffffff;">
      <div style="max-width: 1000px; margin: 0 auto; display: flex; align-items: center; gap: 40px; flex-wrap: wrap;">
        <div style="flex: 1; min-width: 300px;">
          <h2 class="section-title" style="text-align: left; margin-top: 0; color: #ffffff;">Un'energia più pulita,
            insieme</h2>
          <p style="font-size: 18px; line-height: 1.6; color: rgba(255, 255, 255, 0.92);">
            Scegliere <?=$COMPANY["nome_commerciale"] ?> significa sostenere l'ambiente. Ogni nostro kilowattora proviene al 100% da fonti
            rinnovabili certificate.
          </p>
        </div>
        <div style="flex: 0.8; min-width: 200px; display: flex; justify-content: center;">
          <img src="hero_clean_energy.png" alt="Eco Energy"
            style="max-width: 300px; height: auto; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
        </div>
      </div>
    </section>

    <div style="max-width: 800px; margin: 0 auto; padding: 0 20px;" id="contatto-form">
      <div class="lead-card">
            <form id="leadForm" method="POST" novalidate>
              <div class="form-group">
                <label class="form-label" for="fNome">Nome e Cognome *</label>
                <input class="form-input" id="fNome" name="nome" type="text" placeholder="Mario Rossi" required>
                <div class="field-error" data-error-for="fNome"></div>
              </div>

              <div class="form-group">
                <label class="form-label" for="fTel">Telefono *</label>
                <input class="form-input" id="fTel" name="telefono" type="tel" placeholder="333 1234567" required pattern="[0-9 +]{8,}">
                <div class="field-error" data-error-for="fTel"></div>
              </div>

              <div class="form-group">
                <label class="form-label" for="fEmail">Email</label>
                <input class="form-input" id="fEmail" name="email" type="email" placeholder="mario.rossi@email.it">
                <div class="field-error" data-error-for="fEmail"></div>
              </div>

              <div class="form-group" style="margin-top: 28px;">
                <label class="consent-label">
                  <input type="checkbox" name="consenso_privacy" required style="flex-shrink:0;margin-top:3px;">
                  <span>Dichiaro di aver preso visione dell'<a href="privacy-policy.php">informativa privacy</a> ai sensi del Regolamento (UE) 2016/679. *</span>
                </label>
                <label class="consent-label" style="margin-top:12px;">
                  <input type="checkbox" name="consenso_ricontatto" required style="flex-shrink:0;margin-top:3px;">
                  <span>Richiedo di essere ricontattato da Nuova Corrente, tramite il partner commerciale Juna Srl , per ricevere informazioni e proposte commerciali relative alla fornitura di energia elettrica e/o gas. *</span>
                </label>
              </div>

              <button type="submit" class="btn-primary" id="btnSubmit" disabled style="width: 100%; padding: 17px; font-size: 16px; margin-top: 24px;">
                Invia richiesta
                <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </button>
            </form>

            <div id="conferma" hidden style="text-align: center; padding: 32px 0; margin-top: 20px; background: #ECFDF5; border: 1px solid #6EE7B7; border-radius: var(--r-md); color: #065F46;">
              <div style="font-size: 56px; margin-bottom: 12px;">✅</div>
              <strong style="font-size: 17px;">Richiesta inviata con successo!</strong>
              <p style="margin: 8px 0 0; font-size: 14.5px;">Un nostro consulente ti contatterà.</p>
            </div>
      </div>
    </div>

    <section class="green-outro"
      style="padding: 80px 20px; background: var(--primary); margin: 80px 0 0 0; color: #ffffff;">
      <div
        style="max-width: 1000px; margin: 0 auto; display: flex; align-items: center; gap: 40px; flex-wrap: wrap-reverse;">
        <div style="flex: 0.8; min-width: 200px; display: flex; justify-content: center;">
          <img src="company_origins.png" alt="Sostenibilità"
            style="max-width: 300px; height: auto; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
        </div>
        <div style="flex: 1; min-width: 300px;">
          <h2 class="section-title" style="text-align: left; margin-top: 0; color: #ffffff;">La nostra promessa verde
          </h2>
          <p style="font-size: 18px; line-height: 1.6; color: rgba(255, 255, 255, 0.92);">
            Non ci limitiamo a vendere energia, promuoviamo un cambiamento reale. Con le nostre soluzioni per il
            fotovoltaico e la mobilità elettrica, rendiamo la tua vita più sostenibile e conveniente.
          </p>
        </div>
      </div>
    </section>
  </main>


  <script src="lead-form.js"></script>

<script src="cb.js"></script>
</body>

</html>
<?php 

include __DIR__ . '/footer.php';

?>