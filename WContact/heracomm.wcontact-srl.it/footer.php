<?php
/**
 * footer.php — piè di pagina comune a tutte le pagine.
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 *
 * La riga legale (ragione sociale, P.IVA) è costruita SOLO dai campi presenti in
 * $COMPANY (API NUOVA). Il marchio mostrato è l'operatore energetico
 * ($OPERATORE['nome_marketing']).
 */

if (!isset($LANDING_PAGE)) {
  require __DIR__ . '/_config.php';
}
$brandName = isset($brandName) ? $brandName
  : ($OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing']
  : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale']
  : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Switch')));
$siteBrand = $brandName;
// Logo footer (sfondo scuro): logo2 della landing, con fallback.
$logo = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url']
  : ($COMPANY['logo2_url'] !== '' ? $COMPANY['logo2_url']
  : ($LANDING_PAGE['logo_url'] !== '' ? $LANDING_PAGE['logo_url'] : ''));

// Riga legale: includo solo le parti effettivamente presenti nell'API.
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
      <a href="tariffe.php">Offerte</a>
    
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