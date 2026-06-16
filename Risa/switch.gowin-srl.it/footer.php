<?php
/**
 * footer.php — piè di pagina comune (BLUE ENERGY / switch.gowin-srl.it).
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 *
 * La riga legale (ragione sociale, P.IVA) è costruita dalle variabili globali
 * popolate da _config.php a partire dalla risposta dell'API. Il marchio mostrato
 * è l'operatore energetico ($OPERATORE_ENERGETICO).
 */

if (!isset($brand)) {
  require __DIR__ . '/_config.php';
}
$logo = $logo2_url;
$siteBrand = $OPERATORE_ENERGETICO !== '' ? $OPERATORE_ENERGETICO : $brand;

// Riga legale: includo solo le parti effettivamente presenti.
$legalParts = [];
if ($company_name) {
  $legalParts[] = 'Ragione Sociale: ' . $company_name;
}
if ($p_iva) {
  $legalParts[] = 'P.IVA: ' . $p_iva;
  $legalParts[] = 'Vat Europeo: IT' . $p_iva;
}
$legalLine = implode(' | ', $legalParts);
?>

<footer class="main-footer">
  <div class="footer-container">
    <div class="footer-brand">
      <a href="index.php" class="logo">
        <img src="<?= $logo ?>" alt="<?= $siteBrand ?> Logo">
      </a>
      <p><?= $siteBrand ?>: prezzi trasparenti, assistenza dedicata e attivazione senza stress.</p>
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
      <a href="tariffe.php">Offerte PLACET</a>
    </div>
    <div class="footer-col">
      <h4>Legale</h4>
      <a href="privacy-policy.php">Privacy Policy</a>
      <a href="condizioni-utilizzo.php">Condizioni di Utilizzo</a>
    </div>
  </div>
  <div class="footer-bottom">
    <?php if ($legalLine !== '') { ?>
      <p style="margin-bottom: 8px;"><?= $legalLine ?></p>
    <?php } ?>
    <p>&copy; <?= date('Y') ?> <?= $siteBrand ?>. Tutti i diritti riservati.</p>
  </div>
</footer>

<?php if (!empty($pageScripts)) {
  echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>

</html>