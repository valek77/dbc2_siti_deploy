<?php
/**
 * footer.php — piè di pagina comune a tutte le pagine.
 *
 * Dati legali 100% da API NUOVA: la riga legale è costruita SOLO dai campi
 * presenti nell'azienda titolare ($COMPANY). Niente dati hardcoded: i campi che
 * l'API non fornisce (es. R.E.A.) semplicemente non compaiono. I valori sono GIÀ
 * resi sicuri per l'HTML (stampare con <?= ... ?>, senza e()).
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 */
$brandName = isset($brandName) ? $brandName
    : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : 'GCommunication');
// Logo footer: logo dall'API se presente, altrimenti l'immagine locale del brand.
$logoFooter = $LANDING_PAGE['logo_url'] !== '' ? $LANDING_PAGE['logo_url'] : 'logo.png';

// Nome operatore energetico (legale, con fallback al nome marketing) per il blocco rivenditore.
$operatoreNome = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'];

// Riga legale: includo solo le parti effettivamente presenti.
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
if ($COMPANY['capitale_sociale'] !== '') {
  $legalParts[] = 'Capitale Sociale ' . $COMPANY['capitale_sociale'];
}
if ($COMPANY['pec'] !== '') {
  $legalParts[] = 'PEC: ' . $COMPANY['pec'];
}
$legalLine = implode(' &mdash; ', $legalParts);
?>

  <footer class="main-footer">
    <div class="footer-container">
      <div class="footer-brand">
        <a href="index.php" class="logo">
          <img src="<?= $logoFooter ?>" alt="<?= $brandName ?>" class="logo-img">
        </a>
        <p>Prezzi trasparenti, assistenza dedicata e attivazione senza stress.</p>
        <?php if ($operatoreNome !== '') { ?>
          <p style="margin-top: 12px; font-weight: 600;">Rivenditore autorizzato <?= $operatoreNome ?>.</p>
        <?php } ?>
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
        <?php if ($COMPANY['email_supporto'] !== '' || $COMPANY['telefono'] !== '') { ?>
          <div class="footer-col">
            <h4>Contatti</h4>
            <?php if ($COMPANY['email_supporto'] !== '') { ?> <a href="mailto:<?= $COMPANY['email_supporto'] ?>"><?= $COMPANY['email_supporto'] ?></a>
            <?php } ?>
            <?php if ($COMPANY['telefono'] !== '') { ?> <a href="tel:<?= $COMPANY['telefono'] ?>"><?= $COMPANY['telefono'] ?></a>
            <?php } ?>
          </div>
        <?php } ?>
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
