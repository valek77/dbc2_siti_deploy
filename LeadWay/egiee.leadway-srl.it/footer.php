<?php
/**
 * footer.php — piè di pagina comune a tutte le pagine.
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 *
 * I dati societari (ragione sociale, sede, P.IVA, capitale, PEC) sono le
 * variabili globali popolate da _config.php a partire dalla risposta dell'API.
 */
$logo = $logo2_url !== '' ? $logo2_url : 'logo.png';

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

<footer class="main-footer" style="background: var(--secondary); margin-top: 100px; padding-top: 100px;">
  <div class="footer-container">
    <div class="footer-brand">
      <a href="index.php" class="logo">
        <img src="<?= $logo ?>" alt="<?= $brand ?>" class="logo-img" style="filter: brightness(0) invert(1);">
      </a>
      <p style="margin-top: 20px;">Le tue performance quotidiane: strategie data-driven, customer care dedicato e lead generation per una crescita continua.</p>
    </div>
    <div class="footer-links">
      <div class="footer-col">
        <h4>Azienda</h4>
        <a href="chi-siamo.php">Chi Siamo</a>
        <a href="tariffe.php">Tariffe</a>
        <a href="contatti.php">Contatti</a>
      </div>
      <div class="footer-col">
        <h4>Legale</h4>
        <a href="privacy-policy.php">Privacy Policy</a>
        <a href="condizioni-utilizzo.php">Condizioni di Utilizzo</a>
      </div>
      <?php if ($email_supporto || $telefono) { ?>
        <div class="footer-col">
          <h4>Contatti</h4>
          <?php if ($email_supporto) { ?> <a href="mailto:<?= $email_supporto ?>"><?= $email_supporto ?></a>
          <?php } ?>
          <?php if ($telefono) { ?> <a href="tel:<?= $telefono ?>"><?= $telefono ?></a>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="footer-bottom" style="border-color: rgba(255,255,255,0.1);">
    <p>&copy; <?= date('Y') ?> <?= $legalLine !== '' ? $legalLine . '. ' : '' ?>Tutti i diritti riservati.</p>
  </div>
</footer>

<?php if (!empty($pageScripts)) {
  echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>

</html>