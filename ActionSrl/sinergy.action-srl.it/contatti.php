<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';
$pageDescription = 'Contatta Gruppo Grimaldi per ricevere una consulenza gratuita sulle offerte di luce e gas. Siamo qui per aiutarti a scegliere la tariffa giusta.';
include __DIR__ . '/header.php';

$preselOffertaId = isset($_GET['offerta']) ? trim((string) $_GET['offerta']) : '';

$isEnabled = static function ($value) {
    return in_array(strtolower(trim((string) $value)), ['1', 'true', 'yes', 'on'], true);
};

$showConsensoPrivacy = $isEnabled($LANDING_PAGE['mostra_consenso_0']);
$showConsensoCommerciale = $isEnabled($LANDING_PAGE['mostra_consenso_1']);
$showConsensoMarketing = $isEnabled($LANDING_PAGE['mostra_consenso_2']);
?>

  <section class="page-hero contact-page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Contattaci</span>
      <h1>Parliamo di <span class="accent">energia</span></h1>
      <p>Richiedi una consulenza gratuita: un nostro esperto ti contatterà.</p>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

  <main class="section contact-main" style="padding: 80px 0 var(--section);">
    <div class="container">
      <div class="contact-grid" style="grid-template-columns: 1fr; max-width: 720px; margin: 0 auto;">

        <div id="contatto-form" class="reveal">
          <div class="contact-form">
            <h3>Richiedi una consulenza</h3>
            <p class="sub">Compila il form e ti ricontatteremo entro 24 ore.</p>

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

              <input id="fNome" name="nome" type="hidden" value="--">
              <input id="fEmail" name="email" type="hidden" value="">
              <!-- Campi Nome/Email nascosti su richiesta. Per ripristinarli, elimina i due input hidden sopra e ripristina il markup seguente (Email va dopo il campo Telefono):
              <div class="form-group">
                <label class="form-label" for="fNome">Nome e Cognome *</label>
                <input class="form-input" id="fNome" name="nome" type="text" placeholder="Mario Rossi" required>
                <div class="field-error" data-error-for="fNome"></div>
              </div>
              <div class="form-group">
                <label class="form-label" for="fEmail">Email</label>
                <input class="form-input" id="fEmail" name="email" type="email" placeholder="mario.rossi@email.it">
                <div class="field-error" data-error-for="fEmail"></div>
              </div>
              -->

              <div class="form-group">
                <label class="form-label" for="fTel">Telefono *</label>
                <input class="form-input" id="fTel" name="telefono" type="tel" placeholder="333 1234567" required pattern="[0-9 +]{8,}">
                <div class="field-error" data-error-for="fTel"></div>
              </div>

              <div class="form-group" style="margin-top: 28px;">
                <?php if ($showConsensoPrivacy): ?>
                <label class="consent-label" style="margin-top:12px;">
                  <input type="checkbox" name="consenso_privacy" required style="flex-shrink:0;margin-top:3px;">
                  <span style="font-weight:700;">Dichiaro di aver preso visione dell'<a href="privacy-policy.php">informativa privacy</a> ai sensi del Regolamento (UE) 2016/679. *</span>
                </label>
                <?php endif; ?>
                <?php if ($showConsensoCommerciale): ?>
                <label class="consent-label">
                  <input type="checkbox" name="consenso_ricontatto" required style="flex-shrink:0;margin-top:3px;">
                  <span style="font-weight:700;">Richiedo di essere ricontattato da <?= $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'] ?>, tramite il partner commerciale <?= $COMPANY['company_name'] ?>, per ricevere informazioni e proposte commerciali relative alla fornitura di energia elettrica e/o gas. *</span>
                </label>
                <?php endif; ?>
                <?php if ($showConsensoMarketing): ?>
                <label class="consent-label">
                  <input type="checkbox" name="consenso_marketing" style="flex-shrink:0;margin-top:3px;">
                  <span>Acconsento a ricevere comunicazioni promozionali, iniziative commerciali e aggiornamenti sui servizi di <?= $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'] ?>.</span>
                </label>
                <?php endif; ?>
              </div>

              <button type="submit" class="btn-primary" id="btnSubmit" disabled style="width: 100%; padding: 17px; font-size: 16px; margin-top: 24px;">
                Invia richiesta
                <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </button>
            </form>

            <div id="conferma" hidden style="text-align: center; padding: 32px 0; margin-top: 20px; background: var(--bg-soft); border: 1px solid var(--line); border-radius: var(--r-md); color: var(--ink);">
              <div style="font-size: 56px; margin-bottom: 12px;">✅</div>
              <strong style="font-size: 17px;">Richiesta inviata con successo!</strong>
              <p style="margin: 8px 0 0; font-size: 14.5px;">Un nostro consulente ti contatterà entro 24 ore lavorative.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>

<?php
$pageScripts = <<<'HTML'
  <script src="lead-form.js"></script>
  <script>
    // Reveal on scroll
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));
  </script>
HTML;
include __DIR__ . '/footer.php';
?>
