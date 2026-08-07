<?php
require __DIR__ . '/_config.php';
$brandName = $COMPANY['company_name'] !== ''
    ? $COMPANY['company_name']
    : ($LANDING_PAGE['nome_portale'] !== ''
        ? $LANDING_PAGE['nome_portale']
        : ($LANDING_PAGE['titolo'] !== '' ? $LANDING_PAGE['titolo'] : 'GR Contact Call Center'));
$pageTitle = 'Contatti';
$pageDescription = 'Contatta ' . $brandName . ' per una consulenza gratuita sulle offerte ' . $OPERATORE['nome_marketing'] . '. Rispondiamo entro 24 ore lavorative.';
include __DIR__ . '/header.php';

// Offerta eventualmente preselezionata via ?offerta=<id> (link da tariffe.php).
$preselOffertaId = isset($_GET['offerta']) ? trim((string) $_GET['offerta']) : '';
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
      <div class="contact-wrapper" id="form" style="grid-template-columns: minmax(0, 640px); justify-content: center;">
        <!-- FORM -->
        <div class="contact-form-card">
          <?php if ($OPERATORE['logo_url'] !== ''): ?>
          <div class="switch-operator" style="display:flex; align-items:center; gap:14px; padding:14px 18px; margin-bottom:24px; background: var(--bg-soft); border:1px solid var(--line); border-radius: var(--r-md);">
            <img src="<?= $OPERATORE['logo_url'] ?>" alt="<?= $OPERATORE['nome_marketing'] ?>" loading="lazy" style="height:34px; width:auto; max-width:130px; object-fit:contain;">
          </div>
          <?php endif; ?>
          <h3>Richiedi una consulenza gratuita</h3>
          <p class="sub">Compila il form e un nostro consulente ti contatterà entro 24 ore lavorative.</p>

            <form id="leadForm" method="POST" novalidate>
              <?php if (!empty($OFFERTE)): ?>
              <div class="form-group">
                <label class="form-label" for="fOfferta">Offerta di interesse</label>
                <select class="form-input" id="fOfferta" name="offerta">
                  <option value="">Seleziona un'offerta (facoltativo)</option>
                  <?php foreach ($OFFERTE as $o): ?>
                  <option value="<?= e($o['id']) ?>"<?= ($preselOffertaId !== '' && (string) $o['id'] === $preselOffertaId) ? ' selected' : '' ?>><?= e($o['nome']) ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="field-error" data-error-for="fOfferta"></div>
              </div>
              <?php endif; ?>

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
                <label class="consent-label consent-oneline" style="margin-top:12px;">
                  <input type="checkbox" name="consenso_privacy" required style="flex-shrink:0;margin-top:3px;">
                  <span style="font-weight:700;">Dichiaro di aver preso visione dell'<a href="informativa-privacy.php" style="text-decoration:underline;">informativa privacy</a> ai sensi del Regolamento (UE) 2016/679. *</span>
                </label>

              <div class="form-group" style="margin-top: 28px;">
                <label class="consent-label">
                  <input type="checkbox" name="consenso_ricontatto" required style="flex-shrink:0;margin-top:3px;">
                  <span style="font-weight:700;">Richiedo di essere ricontattato da <?= $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : "" ?>,  per ricevere informazioni e proposte commerciali relative alla fornitura di energia elettrica e/o gas di <?= $OPERATORE['nome_marketing'] ?> *</span>
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
