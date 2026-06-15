<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';

$pageHead = <<<'CSS'
  <style>
    .contact-hero {
      background: var(--primary);
      padding: 120px 20px;
      color: #fff;
      text-align: center;
    }
    .floating-cards {
      max-width: 1280px;
      margin: -80px auto 0;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 32px;
      padding: 0 20px;
      position: relative;
      z-index: 10;
    }
    .f-card {
      background: #fff;
      padding: 40px;
      border-radius: 24px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      text-align: center;
      transition: transform 0.3s ease;
      border: 1px solid rgba(0,0,0,0.05);
    }
    .f-card:hover { transform: translateY(-10px); }
    .f-card h3 { color: var(--primary); margin: 20px 0 10px; font-weight: 700; }
    .f-card p { color: var(--text-secondary); line-height: 1.6; }
    .f-card img { width: 48px; }

    .form-section {
      padding: 160px 20px 120px;
      background: #fff;
    }
    .form-grid {
      max-width: 1280px;
      margin: 0 auto;
      display: flex;
      gap: 100px;
      flex-wrap: wrap;
    }
    .form-text { flex: 1; min-width: 400px; }
    .form-container {
      flex: 1.2; min-width: 400px;
      background: var(--bg-cream);
      padding: 60px;
      border-radius: 32px;
    }
    .consent-label {
      display: flex; gap: 12px; margin-bottom: 20px;
      font-size: 14px; color: var(--text-secondary); line-height: 1.5;
    }
  </style>
CSS;

$pageScripts = '  <script src="lead-form.js"></script>';

include __DIR__ . '/header.php';
?>

  <section class="contact-hero" style="min-height: 400px; display: flex; align-items: center; justify-content: center; background: var(--bg-cream); color: var(--text-dark);">
    <div style="max-width: 800px; margin: 0 auto; text-align: center;">
      <h1 style="font-size: clamp(48px, 8vw, 84px); font-weight: 800; line-height: 1.1; margin-bottom: 24px; color: var(--text-dark);">Siamo al <span style="color: var(--primary);">tuo fianco</span></h1>
      <p style="font-size: 20px; color: var(--text-secondary); line-height: 1.6;">Contattaci per ricevere assistenza sulle nostre offerte Luce e Gas o per richiedere un sopralluogo gratuito per Caldaia, Clima e Fotovoltaico.</p>
    </div>
  </section>

  <div class="floating-cards" style="margin-top: -100px; display: flex; justify-content: center;">
    <div class="f-card" style="max-width: 500px; width: 100%; border-radius: 12px; border: 1px solid var(--border); box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
      <img src="icon_consultant.png" alt="Email" >
      <h3 style="color: var(--text-dark);">Contattaci</h3>
      <p>Il nostro team di esperti è pronto a rispondere a ogni tua domanda.
<?php if ($email_supporto) { ?>        <br><strong style="color: var(--primary);"><?= $email_supporto ?></strong>
<?php } ?>
<?php if ($telefono) { ?>        <br><strong style="color: var(--primary);"><?= $telefono ?></strong>
<?php } ?>
      </p>
    </div>
  </div>

  <section class="form-section">
    <div class="form-grid">
      <div class="form-text">
        <h2 class="section-title" style="text-align: left; font-size: 42px; margin-bottom: 32px; color: var(--text-dark);">Inizia il tuo percorso con un nostro <span style="color: var(--primary);">esperto</span></h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 32px;">
          Compila il modulo per essere ricontattato da un nostro consulente dedicato. Insieme troveremo la soluzione migliore per rendere la tua casa più efficiente e sostenibile.
        </p>
        <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 20px;">
          <li style="display: flex; align-items: center; gap: 16px; font-weight: 600; color: var(--text-dark);">
            <span style="color: var(--primary); font-size: 24px;">✓</span> Sopralluogo gratuito per Caldaia e Clima
          </li>
          <li style="display: flex; align-items: center; gap: 16px; font-weight: 600; color: var(--text-dark);">
            <span style="color: var(--primary); font-size: 24px;">✓</span> Analisi personalizzata per Fotovoltaico
          </li>
          <li style="display: flex; align-items: center; gap: 16px; font-weight: 600; color: var(--text-dark);">
            <span style="color: var(--primary); font-size: 24px;">✓</span> Assistenza dedicata per Luce e Gas
          </li>
        </ul>
      </div>

      <div class="form-container">
            <form id="leadForm" action="https://dbc2.datalia.it/api/lead" method="POST" novalidate>
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
                <label class="consent-label" style="margin-top:12px;">
                  <input type="checkbox" name="consenso_privacy" required style="flex-shrink:0;margin-top:3px;">
                  <span>Dichiaro di aver preso visione dell'<a href="privacy-policy.php">informativa privacy</a> ai sensi del Regolamento (UE) 2016/679. *</span>
                </label>
                <label class="consent-label">
                  <input type="checkbox" name="consenso_ricontatto" required style="flex-shrink:0;margin-top:3px;">
                  <span>Richiedo di essere ricontattato da <?= $brand ?> per ricevere una proposta commerciale relativa alla fornitura di energia elettrica e/o gas. *</span>
                </label>

                <label class="consent-label" style="margin-top:12px;">
                  <input type="checkbox" name="consenso_marketing" style="flex-shrink:0;margin-top:3px;">
                  <span>Acconsento a ricevere comunicazioni promozionali da <?= $brand ?> tramite telefono, email, SMS e altri strumenti di comunicazione.</span>
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
  </section>

<?php include __DIR__ . '/footer.php'; ?>
