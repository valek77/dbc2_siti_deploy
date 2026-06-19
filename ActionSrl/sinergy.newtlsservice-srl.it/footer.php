<?php
/**
 * footer.php — piè di pagina comune a tutte le pagine.
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 *
 * I dati societari (ragione sociale, sede, P.IVA, telefono) sono le variabili
 * globali popolate da _config.php a partire dalla risposta dell'API.
 */
$logo = $logo_url !== '' ? $logo_url : 'lctarde.png';

// Riga legale del footer: includo solo le parti effettivamente presenti.
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
if ($telefono) {
  $legalParts[] = 'Tel. ' . $telefono;
}
$legalLine = implode(' - ', $legalParts);
?>

  <footer class="main-footer">
    <div class="footer-container">
      <div class="footer-brand">
        <a href="index.php" class="logo">
          <img src="<?= $logo ?>" alt="<?= $brand ?> Logo">
        </a>
        <p>Rivenditore autorizzato <?= $OPERATORE_ENERGETICO ?>. Prezzi trasparenti, assistenza dedicata e attivazione senza stress.</p>
      </div>
      <div class="footer-col">
        <h4>Azienda</h4>
        <a href="chi-siamo.php">Chi siamo</a>
        <a href="tariffe.php">Offerte</a>
        <a href="contatti.php">Contatti</a>
      </div>
      <div class="footer-col">
        <h4>Servizi</h4>
        <a href="tariffe.php">Luce</a>
        <a href="tariffe.php">Gas</a>
        <a href="tariffe.php">Tutte le offerte</a>
      </div>
      <div class="footer-col">
        <h4>Legale</h4>
        <a href="privacy-policy.php">Privacy Policy</a>
        <a href="condizioni-utilizzo.php">Condizioni di Utilizzo</a>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?= date('Y') ?> <?= $legalLine !== '' ? $legalLine . '. ' : '' ?>Tutti i diritti riservati.<?php if ($OPERATORE_ENERGETICO) { ?> Rivenditore autorizzato <?= $OPERATORE_ENERGETICO ?>.<?php } ?></p>
    </div>
  </footer>

<?php if (!empty($pageScripts)) {
  echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>

</html>
