<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contattaci';
include __DIR__ . '/header.php';
?>

  <section class="hero-page" style="background: #FAFAFA; padding: 120px 24px 80px; text-align: center;">
    <div class="container" style="max-width: 800px; margin: 0 auto;">
      <span class="eyebrow" style="color: var(--primary); font-weight: 700; text-transform: uppercase; font-size: 14px; letter-spacing: 2px; margin-bottom: 20px; display: inline-block;">
        Assistenza Clienti
      </span>
      <h1 style="font-size: clamp(36px, 5vw, 56px); line-height: 1.1; font-weight: 800; color: #18181B; margin-bottom: 24px;">
        Siamo qui per te.
      </h1>
      <p style="font-size: 19px; color: #71717A; margin-bottom: 0; line-height: 1.6;">
        Lasciaci i tuoi contatti e un nostro EnergyTeller ti ricontatterà per fornirti supporto senza alcun impegno.
      </p>
    </div>
  </section>

  <section class="section" style="padding: 60px 0 100px;">
    <div class="container" style="max-width: 560px; margin: 0 auto; padding: 0 24px;">
      <div style="background: #fff; padding: 40px; border-radius: 20px; border: 1px solid #E4E4E7; box-shadow: 0 20px 40px rgba(0,0,0,0.05);">
          <h3 style="font-size: 24px; font-weight: 800; margin-bottom: 24px;" id="contatto-form">Richiesta Contatto</h3>
          <form id="leadForm" method="POST" novalidate>
            <div style="margin-bottom: 20px;">
              <label for="fNome" style="display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #18181B;">Nome e Cognome *</label>
              <input type="text" id="fNome" name="nome" required style="width: 100%; padding: 14px; border: 1px solid #E4E4E7; border-radius: 12px; font-family: inherit; font-size: 16px;">
              <div class="field-error" data-error-for="fNome" style="color: #DC2626; font-size: 13px; margin-top: 6px;"></div>
            </div>
            <div style="margin-bottom: 20px;">
              <label for="fTel" style="display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #18181B;">Telefono *</label>
              <input type="tel" id="fTel" name="telefono" required pattern="[0-9 +]{8,}" style="width: 100%; padding: 14px; border: 1px solid #E4E4E7; border-radius: 12px; font-family: inherit; font-size: 16px;">
              <div class="field-error" data-error-for="fTel" style="color: #DC2626; font-size: 13px; margin-top: 6px;"></div>
            </div>
            <div style="margin-bottom: 24px;">
              <label for="fEmail" style="display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #18181B;">Email</label>
              <input type="email" id="fEmail" name="email" style="width: 100%; padding: 14px; border: 1px solid #E4E4E7; border-radius: 12px; font-family: inherit; font-size: 16px;">
              <div class="field-error" data-error-for="fEmail" style="color: #DC2626; font-size: 13px; margin-top: 6px;"></div>
            </div>
            <div style="margin-bottom: 24px; display: flex; flex-direction: column; gap: 16px;">
              <label style="display: flex; align-items: flex-start; gap: 12px; cursor: pointer;">
                <input type="checkbox" name="consenso_privacy" required style="margin-top: 4px;">
                <span style="font-size: 13px; color: #71717A; line-height: 1.5;">Ho preso visione dell'<a href="privacy-policy.php" style="color: var(--primary);">informativa sul trattamento dei dati personali</a> e chiedo di essere ricontattato da Energia Comune entro 7 giorni. (*campo obbligatorio)</span>
              </label>
              <input type="checkbox" name="consenso_ricontatto" style="position:absolute;opacity:0;pointer-events:none;" tabindex="-1" aria-hidden="true">
              <label style="display: flex; align-items: flex-start; gap: 12px; cursor: pointer;">
                <input type="checkbox" name="consenso_marketing" style="margin-top: 4px;">
                <span style="font-size: 13px; color: #71717A; line-height: 1.5;">Esprimo il consenso a ricevere comunicazioni promozionali e di marketing relative a prodotti e servizi di Energia Comune, anche successivamente al ricontatto effettuato entro 7 giorni. (facoltativo)</span>
              </label>
            </div>
            <button type="submit" id="btnSubmit" disabled class="btn-primary" style="width: 100%; background: var(--primary); color: #fff; padding: 16px; border: none; border-radius: 99px; font-weight: 700; font-size: 16px; cursor: pointer; transition: opacity 0.2s;">Invia Richiesta</button>
          </form>
          <div id="conferma" hidden style="margin-top: 24px; padding: 16px; background: #D1FAE5; color: #065F46; border-radius: 12px; font-weight: 600; text-align: center;">
            Richiesta inviata! Un nostro EnergyTeller ti contatterà al più presto.
          </div>
        </div>
    </div>
  </section>

  <script>
    (function () {
      const privacy = document.querySelector('input[name="consenso_privacy"]');
      const ricontatto = document.querySelector('input[name="consenso_ricontatto"]');
      if (privacy && ricontatto) {
        ricontatto.checked = privacy.checked;
        privacy.addEventListener('change', function () { ricontatto.checked = privacy.checked; });
      }
    })();
  </script>
  <script src="lead-form.js"></script>
<?php include __DIR__ . '/footer.php'; ?>