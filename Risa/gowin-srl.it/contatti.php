<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contattaci';
include __DIR__ . '/header.php';

$offertaSelezionata = isset($_GET['offerta']) ? $_GET['offerta'] : '';
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
    <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 0 24px;">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 60px;">
        
        <div>
          <h3 style="font-size: 24px; font-weight: 800; margin-bottom: 24px;">Informazioni Utili</h3>
          <p style="color: #71717A; margin-bottom: 32px; line-height: 1.6;">Se hai dubbi sulla tua fornitura o vuoi semplicemente maggiori informazioni sulle nostre offerte, i nostri consulenti sono a tua disposizione.</p>
          
          <div style="display: flex; flex-direction: column; gap: 24px;">
            <?php if ($COMPANY['telefono']) { ?>
            <div style="display: flex; align-items: flex-start; gap: 16px;">
              <div style="background: #FAFAFA; padding: 12px; border-radius: 50%; color: var(--primary);">📞</div>
              <div>
                <div style="font-weight: 700; color: #18181B; margin-bottom: 4px;">Telefono</div>
                <a href="tel:<?= $COMPANY['telefono'] ?>" style="color: #71717A; text-decoration: none;"><?= $COMPANY['telefono'] ?></a>
              </div>
            </div>
            <?php } ?>

            <?php if ($COMPANY['email_supporto']) { ?>
            <div style="display: flex; align-items: flex-start; gap: 16px;">
              <div style="background: #FAFAFA; padding: 12px; border-radius: 50%; color: var(--primary);">✉️</div>
              <div>
                <div style="font-weight: 700; color: #18181B; margin-bottom: 4px;">Email</div>
                <a href="mailto:<?= $COMPANY['email_supporto'] ?>" style="color: #71717A; text-decoration: none;"><?= $COMPANY['email_supporto'] ?></a>
              </div>
            </div>
            <?php } ?>

            <?php if ($COMPANY['sede_legale']) { ?>
            <div style="display: flex; align-items: flex-start; gap: 16px;">
              <div style="background: #FAFAFA; padding: 12px; border-radius: 50%; color: var(--primary);">📍</div>
              <div>
                <div style="font-weight: 700; color: #18181B; margin-bottom: 4px;">Sede</div>
                <div style="color: #71717A;"><?= $COMPANY['sede_legale'] ?></div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>

        <div style="background: #fff; padding: 40px; border-radius: 20px; border: 1px solid #E4E4E7; box-shadow: 0 20px 40px rgba(0,0,0,0.05);">
          <h3 style="font-size: 24px; font-weight: 800; margin-bottom: 24px;" id="contatto-form">Richiesta Contatto</h3>
          <form id="leadForm" method="POST" novalidate>
            <div style="margin-bottom: 20px;">
              <label for="fNome" style="display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #18181B;">Nome e Cognome *</label>
              <input type="text" id="fNome" name="nome" required style="width: 100%; padding: 14px; border: 1px solid #E4E4E7; border-radius: 12px; font-family: inherit; font-size: 16px;">
            </div>
            <div style="margin-bottom: 20px;">
              <label for="fTel" style="display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #18181B;">Telefono *</label>
              <input type="tel" id="fTel" name="telefono" required style="width: 100%; padding: 14px; border: 1px solid #E4E4E7; border-radius: 12px; font-family: inherit; font-size: 16px;">
            </div>
            <div style="margin-bottom: 20px;">
              <label for="servizio" style="display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #18181B;">Servizio di interesse</label>
              <select id="servizio" name="servizio" style="width: 100%; padding: 14px; border: 1px solid #E4E4E7; border-radius: 12px; font-family: inherit; font-size: 16px; background: #fff;">
                <option value="Generale">Informazioni Generali</option>
                <option value="Luce Zero" <?= $offertaSelezionata == 'Luce Zero' ? 'selected' : '' ?>>Luce Zero</option>
                <option value="Gas Zero" <?= $offertaSelezionata == 'Gas Zero' ? 'selected' : '' ?>>Gas Zero</option>
                <option value="Business" <?= $offertaSelezionata == 'Business' ? 'selected' : '' ?>>Soluzioni Business</option>
              </select>
            </div>
            <div style="margin-bottom: 24px; display: flex; flex-direction: column; gap: 16px;">
              <label style="display: flex; align-items: flex-start; gap: 12px; cursor: pointer;">
                <input type="checkbox" name="consenso_privacy" required style="margin-top: 4px;">
                <span style="font-size: 13px; color: #71717A; line-height: 1.5;">Dichiaro di aver preso visione dell'<a href="privacy-policy.php" style="color: var(--primary);">informativa privacy</a> ai sensi del Regolamento (UE) 2016/679. *</span>
              </label>
              <label style="display: flex; align-items: flex-start; gap: 12px; cursor: pointer;">
                <input type="checkbox" name="consenso_ricontatto" required style="margin-top: 4px;">
                <span style="font-size: 13px; color: #71717A; line-height: 1.5;">Richiedo di essere ricontattato da <?= $OPERATORE['nome_marketing'] ?>, tramite il partner commerciale <?= $COMPANY['company_name'] ?>, per ricevere informazioni e proposte commerciali relative alla fornitura di energia elettrica e/o gas. *</span>
              </label>
            </div>
            <button type="submit" id="btnSubmit" disabled class="btn-primary" style="width: 100%; background: var(--primary); color: #fff; padding: 16px; border: none; border-radius: 99px; font-weight: 700; font-size: 16px; cursor: pointer; transition: opacity 0.2s;">Invia Richiesta</button>
          </form>
          <div id="conferma" hidden style="margin-top: 24px; padding: 16px; background: #D1FAE5; color: #065F46; border-radius: 12px; font-weight: 600; text-align: center;">
            Richiesta inviata! Un nostro EnergyTeller ti contatterà al più presto.
          </div>
        </div>

      </div>
    </div>
  </section>

  <script src="lead-form.js"></script>
<?php include __DIR__ . '/footer.php'; ?>