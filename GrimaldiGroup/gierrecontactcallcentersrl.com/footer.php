<?php
/**
 * footer.php — pie' di pagina comune a tutte le pagine (gierrecontactcallcentersrl.com).
 *
 * Dati legali 100% da API NUOVA: la riga legale e' costruita SOLO dai campi
 * presenti nell'azienda titolare ($COMPANY). I campi NON modellati dall'API
 * (es. R.E.A.) restano come testo editoriale statico.
 *
 * Prima dell'include ogni pagina puo' impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 */
$brandName = isset($brandName) ? $brandName
    : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : 'GR Contact');
// Logo footer: logo2 dall'API se presente, altrimenti l'immagine locale del brand.
$logoFooter = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url'] : 'gr_logo.png';
// Operatore energetico (fornitore di cui il sito e' partner/rivenditore).
$operatoreMarketing = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale'];
$operatoreLegale = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'];

// Riga legale: includo solo le parti effettivamente presenti nell'API.
// R.E.A. NON e' modellato dall'API -> resta come testo editoriale statico.
$legalParts = [];
if ($COMPANY['company_name'] !== '') {
    $legalParts[] = '<strong>' . $COMPANY['company_name'] . '</strong>';
}
if ($COMPANY['sede_legale'] !== '') {
    $legalParts[] = $COMPANY['sede_legale'];
}
if ($COMPANY['p_iva'] !== '') {
    $legalParts[] = 'P.IVA/C.F. ' . $COMPANY['p_iva'];
}
$legalParts[] = 'REA NA-1072970';
if ($COMPANY['capitale_sociale'] !== '') {
    $legalParts[] = 'Capitale sociale ' . $COMPANY['capitale_sociale'];
}
$legalLine = implode(' - ', $legalParts);
?>

  <footer class="main-footer">
    <div class="footer-container">
      <div class="footer-brand">
        <a href="index.php" class="logo">
          <img src="<?= $logoFooter ?>" alt="<?= $brandName ?> Logo">
        </a>
        <p>Rivenditore autorizzato<?= $operatoreMarketing !== '' ? ' ' . $operatoreMarketing : '' ?>. Prezzi trasparenti, assistenza dedicata e attivazione senza stress.</p>
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
      <p>&copy; <?= date('Y') ?> <?= $legalLine !== '' ? $legalLine . '. ' : '' ?>Tutti i diritti riservati.<?= $operatoreLegale !== '' ? ' Rivenditore autorizzato ' . $operatoreLegale . '.' : '' ?></p>
    </div>
  </footer>

<?php if (!empty($pageScripts)) {
    echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>

</html>
