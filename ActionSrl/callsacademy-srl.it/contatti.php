<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';

$pageHead = <<<'CSS'
  <style>
    /* Hero Section */
    .contact-hero {
      min-height: 400px; 
      display: flex; 
      align-items: center; 
      justify-content: center; 
      background: var(--bg-cream); 
      color: var(--text-dark);
      padding: 120px 20px 140px;
      text-align: center;
    }
    .hero-container {
      max-width: 800px; 
      margin: 0 auto;
    }
    .hero-container h1 {
      font-size: clamp(38px, 6vw, 72px); 
      font-weight: 800; 
      line-height: 1.1; 
      margin-bottom: 24px; 
      color: var(--text-dark);
    }
    .hero-container h1 span {
      color: var(--primary);
    }
    .hero-container p {
      font-size: 18px; 
      color: var(--text-secondary); 
      line-height: 1.6;
    }

    /* Cards */
    .floating-cards {
      max-width: 1280px;
      margin: -80px auto 0;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 32px;
      padding: 0 20px;
      position: relative;
      z-index: 10;
    }
    .f-card {
      background: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: 1px solid var(--border);
    }
    .f-card:hover { 
      transform: translateY(-5px); 
      box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    }
    .f-card h3 { 
      color: var(--text-dark); 
      margin: 20px 0 10px; 
      font-weight: 700; 
      font-size: 22px;
    }
    .f-card p { 
      color: var(--text-secondary); 
      line-height: 1.6; 
      font-size: 15px;
    }
    .f-card strong {
      color: var(--primary);
      display: inline-block;
      margin-top: 4px;
    }
    .f-card img { 
      width: 48px; 
      height: auto;
    }

    /* Layout Sezione Form */
    .form-section {
      padding: 120px 20px;
      background: #fff;
    }
    .form-grid {
      max-width: 1280px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1.2fr;
      gap: 80px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .form-grid {
        grid-template-columns: 1fr;
        gap: 60px;
      }
    }

    /* Testo descrittivo */
    .form-text .section-title {
      text-align: left; 
      font-size: clamp(32px, 4vw, 42px); 
      margin-bottom: 24px; 
      color: var(--text-dark);
      line-height: 1.2;
    }
    .form-text .section-title span {
      color: var(--primary);
    }
    .form-text p {
      font-size: 17px; 
      line-height: 1.7; 
      color: var(--text-secondary); 
      margin-bottom: 32px;
    }
    .features-list {
      list-style: none; 
      padding: 0; 
      display: flex; 
      flex-direction: column; 
      gap: 18px;
    }
    .features-list li {
      display: flex; 
      align-items: center; 
      gap: 16px; 
      font-weight: 600; 
      color: var(--text-dark);
      font-size: 16px;
    }
    .features-list li .check-icon {
      color: var(--primary); 
      font-size: 22px;
      line-height: 1;
    }

    /* Form UI Elements */
    .form-container {
      background: var(--bg-cream);
      padding: 50px;
      border-radius: 24px;
    }
    @media (max-width: 576px) {
      .form-container { padding: 30px 20px; }
    }
    .form-group {
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
    }
    .form-label {
      font-size: 14px;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 8px;
    }
    .form-input {
      width: 100%;
      padding: 14px 16px;
      font-size: 16px;
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 8px;
      color: var(--text-dark);
      transition: border-color 0.2s, box-shadow 0.2s;
      outline: none;
    }
    .form-input:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(var(--primary-rgb, 0, 0, 0), 0.1); /* fallback generico se non hai la variabile rgb */
    }
    .form-input::placeholder {
      color: #a0a0a0;
    }
    .field-error {
      font-size: 13px;
      color: #dc2626;
      margin-top: 5px;
      min-height: 18px;
    }

    /* Consensi / Checkbox */
    .consent-group {
      margin-top: 28px;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }
    .consent-label {
      display: flex; 
      gap: 12px; 
      font-size: 14px; 
      color: var(--text-secondary); 
      line-height: 1.5;
      cursor: pointer;
    }
    .consent-label input[type="checkbox"] {
      flex-shrink: 0;
      margin-top: 3px;
      width: 16px;
      height: 16px;
      accent-color: var(--primary);
    }
    .consent-label a {
      color: var(--primary);
      text-decoration: underline;
    }

    /* Submit Button ed Errori */
    .btn-primary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%; 
      padding: 16px; 
      font-size: 16px; 
      font-weight: 600;
      margin-top: 24px;
      border: none;
      background: var(--primary);
      color: #fff;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.2s, opacity 0.2s;
    }
    .btn-primary:hover:not(:disabled) {
      filter: brightness(0.95);
    }
    .btn-primary:disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }
    .btn-arrow {
      transition: transform 0.2s;
    }
    .btn-primary:hover .btn-arrow {
      transform: translateX(4px);
    }

    /* Alert Conferma */
    .success-alert {
      text-align: center; 
      padding: 32px 24px; 
      margin-top: 24px; 
      background: #f0fdf4; 
      border: 1px solid #bbf7d0; 
      border-radius: 12px; 
      color: #166534;
    }
    .success-alert .icon { 
      font-size: 48px; 
      margin-bottom: 12px; 
    }
    .success-alert strong { 
      display: block;
      font-size: 18px; 
      margin-bottom: 6px;
    }
    .success-alert p { 
      margin: 0; 
      font-size: 14.5px; 
      color: #15803d;
    }
  </style>
CSS;

$pageScripts = '  <script src="lead-form.js"></script>';

include __DIR__ . '/header.php';
?>

<section class="contact-hero">
  <div class="hero-container">
    <h1>Siamo al <span>tuo fianco</span></h1>
    <p>Contattaci per ricevere assistenza sulle nostre offerte Luce e Gas o per richiedere un sopralluogo gratuito per
      Caldaia, Clima e Fotovoltaico.</p>
  </div>
</section>

<div class="floating-cards">
  <div class="f-card">
    <img src="icon_consultant.png" alt="Email">
    <h3>Contattaci</h3>
    <p>Il nostro team di esperti è pronto a rispondere a ogni tua domanda.
      <?php if (!empty($email_supporto)) { ?> <br><strong><?= htmlspecialchars($email_supporto) ?></strong><?php } ?>
      <?php if (!empty($telefono)) { ?> <br><strong><?= htmlspecialchars($telefono) ?></strong><?php } ?>
    </p>
  </div>
</div>

<section class="form-section">
  <div class="form-grid">
    <div class="form-text">
      <h2 class="section-title">Inizia il tuo percorso con un nostro <span>esperto</span></h2>
      <p>
        Compila il modulo per essere ricontattato da un nostro consulente dedicato. Insieme troveremo la soluzione
        migliore per rendere la tua casa più efficiente e sostenibile.
      </p>
      <ul class="features-list">
        <li><span class="check-icon">✓</span> Sopralluogo gratuito per Caldaia e Clima</li>
        <li><span class="check-icon">✓</span> Analisi personalizzata per Fotovoltaico</li>
        <li><span class="check-icon">✓</span> Assistenza dedicata per Luce e Gas</li>
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
          <input class="form-input" id="fTel" name="telefono" type="tel" placeholder="333 1234567" required
            pattern="[0-9 +]{8,}">
          <div class="field-error" data-error-for="fTel"></div>
        </div>

        <div class="form-group">
          <label class="form-label" for="fEmail">Email</label>
          <input class="form-input" id="fEmail" name="email" type="email" placeholder="mario.rossi@email.it">
          <div class="field-error" data-error-for="fEmail"></div>
        </div>

        <div class="consent-group">
          <label class="consent-label">
            <input type="checkbox" name="consenso_privacy" required>
            <span>Dichiaro di aver preso visione dell'<a href="privacy-policy.php">informativa privacy</a> ai sensi del
              Regolamento (UE) 2016/679. *</span>
          </label>

          <label class="consent-label">
            <input type="checkbox" name="consenso_ricontatto" required>
            <span>Richiedo di essere ricontattato da <?= htmlspecialchars($OPERATORE_ENERGETICO) ?>, tramite il partner
              commerciale <?= htmlspecialchars($brand) ?>, per ricevere informazioni e proposte commerciali relative
              alla fornitura di energia elettrica e/o gas. *</span>
          </label>

        </div>

        <button type="submit" class="btn-primary" id="btnSubmit" disabled>
          <span>Invia richiesta</span>
          <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none">
            <path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
      </form>

      <div id="conferma" class="success-alert" hidden>
        <div class="icon">✅</div>
        <strong>Richiesta inviata con successo!</strong>
        <p>Un nostro consulente ti contatterà al più presto.</p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>