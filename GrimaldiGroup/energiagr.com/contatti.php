<?php
require __DIR__ . '/_config.php';
$brandName = $LANDING_PAGE['nome_portale'] !== ''
    ? $LANDING_PAGE['nome_portale']
    : ($LANDING_PAGE['titolo'] !== ''
        ? $LANDING_PAGE['titolo']
        : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'GR Contact'));
$pageTitle = 'Contatti';
$pageDescription = 'Contatta ' . $brandName . ' per una consulenza gratuita sulle offerte Switch Luce Gas. Rispondiamo entro 24 ore lavorative.';
include __DIR__ . '/header.php';
?>

  <!-- HERO -->
  <section class="page-hero">
    <div class="photo-bg" style="background-image: url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?auto=format&fit=crop&w=1600&q=80');"></div>
    <div class="photo-overlay"></div>
    <div class="inner">
      <span class="eyebrow" style="color:var(--primary-light);"><span class="dot" style="background:var(--primary-light);"></span> Contattaci</span>
      <h1>Parliamo di <span class="hl">energia</span></h1>
      <p>Richiedi una consulenza gratuita. Un nostro esperto ti contatterà entro 24 ore lavorative per analizzare la tua bolletta e proporti l'offerta più adatta.</p>
    </div>
  </section>

  <!-- CONTACT BODY -->
  <section class="section">
    <div class="container">
      <div class="contact-wrapper" id="form">
        <!-- SIDEBAR -->
        <div class="contact-sidebar">
          <div class="offer-promo-card">
            <div class="tag">Offerta del momento</div>
            <div class="name">NEW SWITCH LUCE CASA</div>
            <div class="price">PUN +€0,03<small> €/kWh</small></div>
            <div class="note">con domiciliazione bancaria (RID)</div>
            <a href="tariffe.php" class="link">
              Vedi tutte le offerte
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
        </div>

        <!-- FORM -->
        <div class="contact-form-card">
          <h3>Richiedi una consulenza gratuita</h3>
          <p class="sub">Compila il form e un nostro consulente ti contatterà entro 24 ore lavorative.</p>

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
                <label class="consent-label" style="margin-top:12px;">
                  <input type="checkbox" name="consenso_privacy" required style="flex-shrink:0;margin-top:3px;">
                  <span style="font-weight:700;">Dichiaro di aver preso visione dell'<a href="privacy-policy.php">informativa privacy</a> ai sensi del Regolamento (UE) 2016/679. *</span>
                </label>

              <div class="form-group" style="margin-top: 28px;">
                <label class="consent-label">
                  <input type="checkbox" name="consenso_ricontatto" required style="flex-shrink:0;margin-top:3px;">
                  <span style="font-weight:700;">Richiedo di essere ricontattato da <?= $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'] ?>, tramite il partner commerciale <?= $COMPANY['company_name'] ?>, per ricevere informazioni e proposte commerciali relative alla fornitura di energia elettrica e/o gas. *</span>
                </label>
                
              </div>

              <div class="form-note" style="font-size: 12px; color: var(--muted); margin-top: 16px; line-height: 1.4;">
                * Campi obbligatori.
              </div>
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
    </div>
  </section>

<?php
$pageScripts = <<<'HTML'
  <script src="lead-form.js"></script>
HTML;
include __DIR__ . '/footer.php';
?>
