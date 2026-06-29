<?php
/**
 * footer.php — piè di pagina comune (switch.gowin-srl.it).
 *
 * Sito DINAMICO su API NUOVA (/landing-pages): la riga legale è costruita SOLO dai
 * campi presenti nell'azienda titolare ($COMPANY). Brand e logo dalla landing.
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 */

if (!isset($LANDING_PAGE)) {
  require __DIR__ . '/_config.php';
}
$brandName = isset($brandName) ? $brandName
    : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale']
        : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Switch'));
// Logo footer (sfondo scuro): logo2 della landing se presente, altrimenti dell'azienda.
$logoFooter = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url'] : $COMPANY['logo2_url'];

// Riga legale: includo solo le parti effettivamente presenti nell'azienda titolare.
$legalParts = [];
if ($COMPANY['company_name'] !== '') {
  $legalParts[] = 'Ragione Sociale: ' . $COMPANY['company_name'];
}
if ($COMPANY['p_iva'] !== '') {
  $legalParts[] = 'P.IVA: ' . $COMPANY['p_iva'];
  $legalParts[] = 'Vat Europeo: IT' . $COMPANY['p_iva'];
}
$legalLine = implode(' | ', $legalParts);
?>

<footer class="main-footer">
  <div class="footer-container">
    <div class="footer-brand">
      <a href="index.php" class="logo">
        <img src="<?= $logoFooter ?>" alt="<?= $brandName ?> Logo">
      </a>
      <p><?= $brandName ?>: prezzi trasparenti, assistenza dedicata e attivazione senza stress.</p>
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
      <a href="tariffe.php">Offerte SWITCH</a>
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
    <p>&copy; <?= date('Y') ?> <?= $brandName ?>. Tutti i diritti riservati.</p>
  </div>
</footer>

<?php if (!empty($pageScripts)) {
  echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>

</html>