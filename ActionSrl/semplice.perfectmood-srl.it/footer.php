<?php
/**
 * footer.php — piè di pagina comune a tutte le pagine (markup del sito).
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 *
 * I dati societari (ragione sociale, P.IVA) sono le variabili globali
 * popolate da _config.php a partire dalla risposta dell'API.
 */
$logo = $logo_url !== '' ? $logo_url : 'LOGO_again.png';

// Riga legale: includo solo le parti effettivamente presenti.
$legalParts = [];
if ($company_name) {
  $legalParts[] = $company_name;
}
if ($p_iva) {
  $legalParts[] = 'P.IVA ' . $p_iva;
}
$legalLine = implode(' &mdash; ', $legalParts);
?>

  <footer class="main-footer">
    <div class="footer-grid">
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
        <h4>Offerte</h4>
        <a href="tariffe.php">Luce Casa</a>
        <a href="tariffe.php">Gas Casa</a>
      </div>
      <div class="footer-col">
        <h4>Legale</h4>
        <a href="privacy-policy.php">Privacy Policy</a>
        <a href="condizioni-utilizzo.php">Condizioni di Utilizzo</a>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <?= date('Y') ?> <?= $legalLine !== '' ? $legalLine . '. ' : '' ?>Tutti i diritti riservati.</span>
      <span>Rivenditore autorizzato <?= $OPERATORE_ENERGETICO ?></span>
    </div>
  </footer>

<?php if (!empty($pageScripts)) {
  echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>
</html>
