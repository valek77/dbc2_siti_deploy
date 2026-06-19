<?php
/**
 * footer.php — piè di pagina comune a tutte le pagine.
 */
$logo = $logo2_url !== '' ? $logo2_url : 'logo_white.png';

// Riga legale: includo solo le parti effettivamente presenti.
$legalParts = [];
if ($company_name) {
  $legalParts[] = $company_name;
}
if ($sede_legale) {
  $legalParts[] = 'Sede Legale: ' . $sede_legale;
}
if ($p_iva) {
  $legalParts[] = 'P.IVA e C.F.: ' . $p_iva;
}
if ($capitale_sociale) {
  $legalParts[] = 'Capitale Sociale ' . $capitale_sociale;
}
if ($pec) {
  $legalParts[] = 'PEC: ' . $pec;
}
$legalLine = implode(' &mdash; ', $legalParts);
?>

<footer class="main-footer" style="background: #111; color: #fff; padding: 80px 0 40px;">
  <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
    <div class="footer-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; margin-bottom: 60px; border-bottom: 1px solid rgba(255,255,255,.1); padding-bottom: 60px;">
      
      <div class="footer-brand" style="grid-column: span 2;">
        <a href="index.php" class="logo" style="margin-bottom: 28px; display: inline-block;">
          <img src="<?= $logo ?>" alt="<?= $brand ?>" class="logo-img" style="height: 48px; filter: brightness(0) invert(1);">
        </a>
        <div style="color: rgba(255,255,255,.6); font-size: 15px; line-height: 1.7; max-width: 320px;">
          Siamo partner autorizzato 
          <img src="https://www.energiacomune.com/img/ecom_logo-2048x270.png" style="height: 18px; vertical-align: middle; margin: 0 4px;" alt="Energia Comune">. 
          La nostra missione è fornire energia a prezzi chiari, supportata da consulenti reali e disponibili per garantirti sempre la massima trasparenza.
        </div>
      </div>

      <div class="footer-col" style="display: flex; flex-direction: column; gap: 14px;">
        <h4 style="font-size: 17px; font-weight: 700; margin-bottom: 12px; color: #fff;">Offerte e Servizi</h4>
        <a href="tariffe.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none;">Offerte Luce e Gas</a>
        <a href="tariffe.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none;">Offerte PLACET</a>
        <a href="chi-siamo.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none;">Consulenza Aziendale</a>
        <a href="#" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none;">Efficienza Energetica</a>
      </div>

      <div class="footer-col" style="display: flex; flex-direction: column; gap: 14px;">
        <h4 style="font-size: 17px; font-weight: 700; margin-bottom: 12px; color: #fff;">Supporto Clienti</h4>
        <a href="contatti.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none;">Contattaci</a>
        <?php if ($telefono) { ?> <a href="tel:<?= $telefono ?>" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none;">Tel: <?= $telefono ?></a> <?php } ?>
        <?php if ($email_supporto) { ?> <a href="mailto:<?= $email_supporto ?>" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none;">Email: <?= $email_supporto ?></a> <?php } ?>
        <a href="#" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none;">FAQ</a>
      </div>

      <div class="footer-col" style="display: flex; flex-direction: column; gap: 14px;">
        <h4 style="font-size: 17px; font-weight: 700; margin-bottom: 12px; color: #fff;">Legale</h4>
        <a href="chi-siamo.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none;">Chi Siamo</a>
        <a href="privacy-policy.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none;">Privacy Policy</a>
        <a href="condizioni-utilizzo.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none;">Condizioni di Utilizzo</a>
      </div>

    </div>
    
    <div class="footer-bottom" style="display: flex; justify-content: space-between; align-items: center; font-size: 13px; color: rgba(255,255,255,.4); flex-wrap: wrap; gap: 16px;">
      <p style="margin: 0;">&copy; <?= date('Y') ?> <?= $legalLine !== '' ? $legalLine . '. ' : '' ?>Tutti i diritti riservati. <span style="margin-left: 8px;"><a href="privacy-policy.php" style="color: inherit; text-decoration: underline;">Privacy Policy</a> &middot; <a href="condizioni-utilizzo.php" style="color: inherit; text-decoration: underline;">Condizioni di Utilizzo</a></span></p>
    </div>
  </div>
</footer>

<?php if (!empty($pageScripts)) {
  echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>
</html>