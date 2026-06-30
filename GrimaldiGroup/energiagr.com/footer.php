<?php
/**
 * footer.php — pie' di pagina comune a tutte le pagine (energiagr.com / GR Contact).
 *
 * Dati legali 100% da API NUOVA: la riga legale e' costruita SOLO dai campi
 * presenti nell'azienda titolare ($COMPANY). Niente dati hardcoded: i campi che
 * l'API non fornisce (es. R.E.A.) semplicemente non compaiono.
 *
 * Prima dell'include ogni pagina puo' impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 */
$brandName = isset($brandName) ? $brandName
    : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale']
        : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'GR Contact'));
// Logo footer (sfondo scuro): logo2 dall'API se presente, altrimenti l'immagine locale.
$logoFooter = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url'] : 'gr_logo.png';
// Operatore energetico (fornitore di cui il sito e' partner/rivenditore).
$operatoreNomeLegale = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'];

// Riga legale: includo solo le parti effettivamente presenti nell'API.
$legalParts = [];
if ($COMPANY['company_name'] !== '') {
    $legalParts[] = '<strong>' . $COMPANY['company_name'] . '</strong>';
}
if ($COMPANY['sede_legale'] !== '') {
    $legalParts[] = 'Sede legale: ' . $COMPANY['sede_legale'];
}
if ($COMPANY['p_iva'] !== '') {
    $legalParts[] = 'P.IVA e C.F.: ' . $COMPANY['p_iva'];
}
if ($COMPANY['capitale_sociale'] !== '') {
    $legalParts[] = 'Capitale Sociale ' . $COMPANY['capitale_sociale'];
}
if ($COMPANY['pec'] !== '') {
    $legalParts[] = 'PEC: <a href="mailto:' . $COMPANY['pec'] . '">' . $COMPANY['pec'] . '</a>';
}
$legalLine = implode(' - ', $legalParts);
?>

  <footer class="main-footer">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="index.php" class="logo">
          <img src="<?= $logoFooter ?>" alt="<?= $brandName ?> Logo">
        </a>
        <p>Rivenditore autorizzato<?= $operatoreNomeLegale !== '' ? ' ' . $operatoreNomeLegale : '' ?>. Prezzi trasparenti, assistenza dedicata e attivazione senza stress.</p>
      </div>
      <div class="footer-col"><h4>Azienda</h4><a href="chi-siamo.php">Chi siamo</a><a href="tariffe.php">Offerte</a><a href="contatti.php">Contatti</a></div>
      <div class="footer-col"><h4>Offerte</h4><a href="tariffe.php">Luce Residenziale</a><a href="tariffe.php">Gas Residenziale</a><a href="tariffe.php">PLACET</a></div>
      <div class="footer-col"><h4>Legale</h4><a href="privacy-policy.php">Privacy Policy</a><a href="condizioni-utilizzo.php">Condizioni di Utilizzo</a><a href="cookie-policy.php">Cookie Policy</a></div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <?= date('Y') ?> <?= $legalLine !== '' ? $legalLine . '. ' : ($brandName . '. ') ?>Tutti i diritti riservati.</span>
<?php if ($operatoreNomeLegale !== '') { ?>
      <span>Rivenditore autorizzato <?= $operatoreNomeLegale ?></span>
<?php } ?>
    </div>
  </footer>

<?php if (!empty($pageScripts)) {
    echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>
</html>
