<?php
/**
 * footer.php — piè di pagina comune a tutte le pagine.
 *
 * Dati legali 100% da API NUOVA: la riga legale è costruita SOLO dai campi
 * presenti nell'azienda titolare ($COMPANY). Niente dati hardcoded: i campi che
 * l'API non fornisce (es. R.E.A.) semplicemente non compaiono.
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 */
$brandName = isset($brandName) ? $brandName
    : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : 'ENGIE');
// Logo footer (sfondo scuro): logo2 dall'API se presente, altrimenti l'immagine locale.
$logo = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url'] : 'logo.png';

// Riga legale: includo solo le parti effettivamente presenti nell'API.
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

// Dati dell'OPERATORE ENERGETICO (fornitore di cui il sito è partner/rivenditore).
$operatoreNome = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'];
?>

<footer class="main-footer" style="background: var(--secondary); margin-top: 100px; padding-top: 100px;">
  <div class="footer-container">
    <div class="footer-brand">
      <a href="index.php" class="logo">
        <img src="<?= $logo ?>" alt="<?= $brandName ?>" class="logo-img" style="filter: brightness(0) invert(1);">
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
  <div class="footer-bottom" style="border-color: rgba(255,255,255,0.1);">
<?php if ($operatoreNome !== '') { ?>
    <p style="font-size: 15px;">Offerte commercializzate in qualità di partner autorizzato di <strong><?= $operatoreNome ?></strong>.</p>
<?php } ?>
    <p>&copy; <?= date('Y') ?> <?= $legalLine !== '' ? $legalLine . '. ' : '' ?>Tutti i diritti riservati.</p>
  </div>
</footer>

<?php if (!empty($pageScripts)) {
  echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>

</html>