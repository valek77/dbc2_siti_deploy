<?php
/**
 * footer.php — pie' di pagina comune a tutte le pagine (semplice.again-srl.it).
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
        : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Again'));
// Logo footer: logo2 dall'API se presente, altrimenti l'immagine locale del brand.
$logoFooter = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url'] : 'LOGO_again.png';
// Operatore energetico (fornitore di cui il sito e' partner/rivenditore).
$operatoreNome = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale'];
$operatoreLegale = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'];

// Riga legale azienda titolare: includo solo le parti effettivamente presenti nell'API.
$legalParts = [];
if ($COMPANY['company_name'] !== '') {
    $legalParts[] = $COMPANY['company_name'];
}
if ($COMPANY['p_iva'] !== '') {
    $legalParts[] = 'P.IVA ' . $COMPANY['p_iva'];
}
$legalLine = implode(' &mdash; ', $legalParts);

// Riga operatore energetico: nome legale + P.IVA, solo se presenti.
$operatoreParts = [];
if ($operatoreLegale !== '') {
    $operatoreParts[] = 'Rivenditore autorizzato ' . $operatoreLegale;
}
if ($OPERATORE['partita_iva'] !== '') {
    $operatoreParts[] = 'P.IVA ' . $OPERATORE['partita_iva'];
}
$operatoreLine = implode(' &mdash; ', $operatoreParts);
?>

  <!-- FOOTER -->
  <footer class="main-footer">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="index.php" class="logo">
          <img src="<?= $logoFooter ?>" alt="<?= $brandName ?> Logo">
        </a>
        <p>Rivenditore autorizzato<?= $operatoreNome !== '' ? ' ' . $operatoreNome : '' ?>. Prezzi trasparenti, assistenza dedicata e attivazione senza stress.</p>
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
        <a href="tariffe.php">Linea SICURA</a>
      </div>
      <div class="footer-col">
        <h4>Legale</h4>
        <a href="privacy-policy.php">Privacy Policy</a>
        <a href="condizioni-utilizzo.php">Condizioni di Utilizzo</a>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <?= date('Y') ?> <?= $legalLine !== '' ? $legalLine . '. ' : '' ?>Tutti i diritti riservati.</span>
<?php if ($operatoreLine !== '') { ?>
      <span><?= $operatoreLine ?></span>
<?php } ?>
    </div>
  </footer>

<?php if (!empty($pageScripts)) {
    echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>
</html>
