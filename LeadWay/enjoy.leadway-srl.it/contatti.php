<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';
$pageScripts = '  <script src="lead-form.js"></script>';
include __DIR__ . '/header.php';

// Offerta eventualmente preselezionata via ?offerta=<id> (link da tariffe.php).
$preselOffertaId = isset($_GET['offerta']) ? trim((string) $_GET['offerta']) : '';
?>

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
          <h2 class="section-title" style="text-align: left; margin-top: 0; color: #ffffff;">Siamo qui per guidarti</h2>
          <p style="font-size: 18px; line-height: 1.6; color: rgba(255, 255, 255, 0.92);">
            Affidarsi a <?= $brandName ?> significa tagliare i costi superflui potendo contare su un team di veri esperti del settore. Inviaci la tua richiesta e ottieni subito una valutazione gratuita e su misura per le tue bollette.
          </p>
        </div>
        <div style="flex: 0.8; min-width: 200px; display: flex; justify-content: center;">
          <img src="hero_gcommunication.png" alt="Consulenza su misura"
            style="max-width: 300px; height: auto; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
        </div>
      </div>
    </section>

    <div style="max-width: 800px; margin: 0 auto; padding: 0 20px;" id="contatto-form">
      <div class="lead-card">
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
                <label class="consent-label">
                  <input type="checkbox" name="consenso_privacy" required style="flex-shrink:0;margin-top:3px;">
                  <span>Dichiaro di aver preso visione dell'<a href="privacy-policy.php">informativa privacy</a> ai sensi del Regolamento (UE) 2016/679. *</span>
                </label>
                <label class="consent-label" style="margin-top:12px;">
                  <input type="checkbox" name="consenso_ricontatto" required style="flex-shrink:0;margin-top:3px;">
                  <span>Richiedo di essere ricontattato da <?= $OPERATORE['nome_legale'] ?>, tramite il partner commerciale <?= $COMPANY['company_name'] ?>, per ricevere informazioni e proposte commerciali relative alla fornitura di energia elettrica e/o gas. *</span>
                </label>
              </div>

              <button type="submit" class="btn-primary" id="btnSubmit" disabled style="width: 100%; padding: 17px; font-size: 16px; margin-top: 24px;">
                Invia richiesta
                <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </button>
            </form>

            <div id="conferma" hidden style="text-align: center; padding: 32px 0; margin-top: 20px; background: #f9eaf4; border: 1px solid rgba(159,32,124,0.25); border-radius: var(--radius-md); color: #111111;">
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
          <img src="consulting_business.png" alt="Supporto consulenziale"
            style="max-width: 300px; height: auto; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
        </div>
        <div style="flex: 1; min-width: 300px;">
          <h2 class="section-title" style="text-align: left; margin-top: 0; color: #ffffff;">Il nostro patto di fiducia</h2>
          <p style="font-size: 18px; line-height: 1.6; color: rgba(255, 255, 255, 0.92);">
            Non puntiamo solo a farti attivare un contratto, ma a costruire una solida alleanza nel tempo. Studiamo in dettaglio le tue reali necessità per presentarti le uniche vere opportunità che porteranno valore sia nella tua vita domestica che aziendale.
          </p>
        </div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/footer.php'; ?>
