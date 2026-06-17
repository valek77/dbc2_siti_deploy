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
$logo = $logo_url !== '' ? $logo_url : 'logo.png';

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

  <footer class="main-footer">
    <div class="footer-container">
      <div class="footer-brand">
        <a href="index.php" class="logo">
          <img src="<?= $logo ?>" alt="<?= $brand ?>">
        </a>
        <?php if ($OPERATORE_ENERGETICO) { ?>
          <p>Rivenditore autorizzato <?= $OPERATORE_ENERGETICO ?>.</p>
        <?php } ?>
      </div>
      <div class="footer-links">
        <div class="footer-col">
          <h4>Azienda</h4>
          <a href="chi-siamo.php">Chi Siamo</a>
          <a href="tariffe.php">Servizi</a>
          <a href="contatti.php">Contatti</a>
        </div>
        <div class="footer-col">
          <h4>Servizi</h4>
          <a href="tariffe.php">Internet Fibra</a>
          <a href="tariffe.php">Telefonia Mobile</a>
          <a href="tariffe.php">Consulenza Aziendale</a>
        </div>
        <div class="footer-col">
          <h4>Legale</h4>
          <a href="privacy-policy.php">Privacy Policy</a>
          <a href="condizioni-utilizzo.php">Condizioni di Utilizzo</a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?= date('Y') ?> <?= $legalLine !== '' ? $legalLine . '. ' : '' ?>Tutti i diritti riservati.</p>
    </div>
  </footer>

<?php if (!empty($pageScripts)) {
  echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>
</html>
