<?php
/**
 * footer.php — piè di pagina comune a tutte le pagine.
 *
 * Dati legali 100% da API NUOVA: la riga legale è costruita SOLO dai campi
 * presenti nell'azienda titolare ($COMPANY). I valori sono GIÀ resi sicuri per
 * l'HTML (stampare con <?= ... ?>, senza e()).
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 */
$brandName = isset($brandName) ? $brandName
    : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : 'Domestika');
// Logo footer: logo2 dall'API se presente, altrimenti l'immagine locale del brand.
$logoFooter = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url'] : 'lctarde.png';

// Nome operatore energetico (legale, con fallback al nome marketing) per il blocco rivenditore.
$operatoreNome = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'];

// Riga legale del footer: includo solo le parti effettivamente presenti.
$legalParts = [];
if ($COMPANY['company_name'] !== '') {
  $legalParts[] = $COMPANY['company_name'];
}
if ($COMPANY['sede_legale'] !== '') {
  $legalParts[] = 'Sede Legale: ' . $COMPANY['sede_legale'];
}
if ($COMPANY['p_iva'] !== '') {
  $legalParts[] = 'P.IVA e C.F.: ' . $COMPANY['p_iva'];
}
if ($COMPANY['telefono'] !== '') {
  $legalParts[] = 'Tel. ' . $COMPANY['telefono'];
}
$legalLine = implode(' - ', $legalParts);
?>

  <footer class="main-footer">
    <div class="footer-container">
      <div class="footer-brand">
        <a href="index.php" class="logo">
          <img src="<?= $logoFooter ?>" alt="<?= $brandName ?> Logo">
        </a>
        <p><?php if ($operatoreNome !== '') { ?>Rivenditore autorizzato <?= $operatoreNome ?>. <?php } ?>Prezzi trasparenti, assistenza dedicata e attivazione senza stress.</p>
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
      <p>&copy; <?= date('Y') ?> <?= $legalLine !== '' ? $legalLine . '. ' : '' ?>Tutti i diritti riservati.<?php if ($operatoreNome !== '') { ?> Rivenditore autorizzato <?= $operatoreNome ?>.<?php } ?></p>
    </div>
  </footer>

<?php if (!empty($pageScripts)) {
  echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>

</html>
