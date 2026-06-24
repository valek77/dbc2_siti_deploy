<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';

$pageHead = <<<'CSS'
  <style>
    .contact-hero {
      background: var(--primary);
      padding: 120px 20px;
      color: var(--accent);
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
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: transform 0.3s ease;
      border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .f-card:hover {
      transform: translateY(-10px);
    }

    .f-card h3 {
      color: var(--accent);
      margin: 20px 0 10px;
      font-weight: 700;
    }

    .f-card p {
      color: var(--text-secondary);
      line-height: 1.6;
    }

    .f-card img {
      width: 48px;
    }

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

    .form-text {
      flex: 1;
      min-width: 400px;
    }

    .form-container {
      flex: 1.2;
      min-width: 400px;
      background: var(--bg-cream);
      padding: 48px 44px;
      border-radius: 28px;
      border: 1px solid rgba(4, 8, 50, 0.06);
      box-shadow: 0 10px 40px rgba(4, 8, 50, 0.05);
    }

    .form-group {
      margin-bottom: 22px;
    }

    .form-label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: var(--accent);
      margin-bottom: 8px;
      letter-spacing: 0.2px;
    }

    .form-input {
      width: 100%;
      padding: 15px 18px;
      border: 1.5px solid rgba(4, 8, 50, 0.1);
      border-radius: 12px;
      font-family: inherit;
      font-size: 15px;
      color: var(--accent);
      background: #fff;
      outline: none;
      transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-input::placeholder {
      color: rgba(4, 8, 50, 0.35);
    }

    .form-input:hover {
      border-color: rgba(4, 8, 50, 0.2);
    }

    .form-input:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 4px var(--accent-bg);
    }

    .field-error:not(:empty) {
      margin-top: 6px;
      font-size: 13px;
      color: #dc2626;
    }

    .consent-label {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      font-size: 13.5px;
      line-height: 1.55;
      color: var(--text-secondary);
      cursor: pointer;
      margin-bottom: 0;
    }

    .consent-label a {
      color: var(--accent);
      text-decoration: underline;
      font-weight: 600;
    }

    .consent-label input[type="checkbox"] {
      appearance: none;
      -webkit-appearance: none;
      width: 20px;
      height: 20px;
      border: 1.5px solid rgba(4, 8, 50, 0.25);
      border-radius: 5px;
      background: #fff;
      cursor: pointer;
      position: relative;
      transition: border-color 0.15s ease, background 0.15s ease;
    }

    .consent-label input[type="checkbox"]:hover {
      border-color: var(--accent);
    }

    .consent-label input[type="checkbox"]:checked {
      background: var(--accent);
      border-color: var(--accent);
    }

    .consent-label input[type="checkbox"]:checked::after {
      content: '';
      position: absolute;
      left: 6px;
      top: 2px;
      width: 5px;
      height: 10px;
      border: solid var(--primary);
      border-width: 0 2.5px 2.5px 0;
      transform: rotate(45deg);
    }

    #btnSubmit:disabled {
      opacity: 0.45;
      cursor: not-allowed;
      box-shadow: none;
      transform: none;
    }

    @media (max-width: 640px) {
      .form-container {
        padding: 32px 24px;
        border-radius: 22px;
      }
    }
  </style>
CSS;

$pageScripts = '  <script src="lead-form.js"></script>';

include __DIR__ . '/header.php';
?>

  <section class="contact-hero" style="min-height: 400px; display: flex; align-items: center; justify-content: center;">
    <div style="max-width: 800px; margin: 0 auto; text-align: center;">
      <h1 style="font-size: clamp(48px, 8vw, 84px); font-weight: 800; line-height: 1.1; margin-bottom: 24px;">Sempre al
        tuo servizio</h1>
      <p style="font-size: 20px; opacity: 0.8; line-height: 1.6;">Scorda le attese interminabili e i centralini. Con
        <?= $brand ?> hai un punto di riferimento esclusivo e reale.</p>
    </div>
  </section>

  <div class="floating-cards" style="margin-top: -100px; display: flex; justify-content: center;">
    <div class="f-card" style="max-width: 500px; width: 100%;">
      <img src="icon_consultant.png" alt="Email">
      <h3>Contattaci via Email</h3>
      <p>Il nostro team di esperti è pronto a rispondere a ogni tua domanda.
        <?php if (!empty($email_supporto)) { ?><br><strong><?= htmlspecialchars($email_supporto) ?></strong><?php } ?>
        <?php if (!empty($telefono)) { ?><br><strong><?= htmlspecialchars($telefono) ?></strong><?php } ?>
      </p>
    </div>
  </div>

  <section class="form-section">
    <div class="form-grid">
      <div class="form-text">
        <h2 class="section-title" style="text-align: left; font-size: 42px; margin-bottom: 32px;">Pianifica il tuo
          futuro digitale</h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--accent); opacity: 0.8; margin-bottom: 32px;">
          Inserisci i tuoi dati per ricevere la chiamata di un nostro specialista. Non vogliamo solo proporti
          un'offerta, ma studiare i tuoi bisogni di connettività per farti risparmiare nel tempo.
        </p>
        <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 20px;">
          <li style="display: flex; align-items: center; gap: 16px; font-weight: 600; color: var(--accent);">
            <span style="color: var(--accent); font-size: 24px;">✓</span> Pre-analisi gratuita dei consumi
          </li>
          <li style="display: flex; align-items: center; gap: 16px; font-weight: 600; color: var(--accent);">
            <span style="color: var(--accent); font-size: 24px;">✓</span> Nessun impegno contrattuale
          </li>
          <li style="display: flex; align-items: center; gap: 16px; font-weight: 600; color: var(--accent);">
            <span style="color: var(--accent); font-size: 24px;">✓</span> Supporto umano e diretto
          </li>
        </ul>
      </div>

      <div class="form-container">
        <form id="leadForm" method="POST" novalidate>
          <div class="form-group">
            <label class="form-label" for="fNome">Nome e Cognome *</label>
            <input class="form-input" id="fNome" name="nome" type="text" placeholder="Mario Rossi" required>
            <div class="field-error" data-error-for="fNome"></div>
          </div>

          <div class="form-group">
            <label class="form-label" for="fTel">Telefono *</label>
            <input class="form-input" id="fTel" name="telefono" type="tel" placeholder="333 1234567" required
              pattern="[0-9 +]{8,}">
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
              <span>Dichiaro di aver preso visione dell'<a href="privacy-policy.php">informativa privacy</a> ai sensi
                del Regolamento (UE) 2016/679. *</span>
            </label>
            <label class="consent-label">
              <input type="checkbox" name="consenso_ricontatto" required style="flex-shrink:0;margin-top:3px;">
              <span>Richiedo di essere ricontattato da <?= htmlspecialchars($OPERATORE_ENERGETICO) ?>, tramite il
                partner commerciale <?= htmlspecialchars($brand) ?>, per ricevere informazioni e proposte commerciali
                relative alla fornitura di servizi di telecomunicazione e utenze. *</span>
            </label>

          </div>

          <button type="submit" class="btn-primary" id="btnSubmit" disabled
            style="width: 100%; padding: 17px; font-size: 16px; margin-top: 24px;">
            Invia richiesta
            <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none">
              <path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
        </form>

        <div id="conferma" hidden
          style="text-align: center; padding: 32px 0; margin-top: 20px; background: #ECFDF5; border: 1px solid #6EE7B7; border-radius: var(--r-md); color: #065F46;">
          <div style="font-size: 56px; margin-bottom: 12px;">✅</div>
          <strong style="font-size: 17px;">Richiesta inviata con successo!</strong>
          <p style="margin: 8px 0 0; font-size: 14.5px;">Un nostro consulente ti contatterà.</p>
        </div>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
