<?php
/**
 * footer.php — pie' di pagina comune a tutte le pagine (gruppogrimaldi.com).
 *
 * Dati legali 100% da API NUOVA: la riga legale e' costruita SOLO dai campi
 * presenti nell'azienda titolare ($COMPANY). Niente dati hardcoded: i campi che
 * l'API non fornisce (es. R.E.A., Vat Europeo) semplicemente non compaiono.
 *
 * Prima dell'include ogni pagina puo' impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 */
$brandName = isset($brandName) ? $brandName
    : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : 'Gruppo Grimaldi');
// Logo footer (sfondo scuro): logo2 dall'API se presente, altrimenti l'immagine locale.
$logoFooter = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url'] : 'logo.png';
// Operatore energetico (fornitore di cui il sito e' agenzia commerciale).
$operatoreNome = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale'];

// Riga legale: includo solo le parti effettivamente presenti nell'API dell'azienda
// titolare ($COMPANY). I campi non forniti dall'API (es. R.E.A.) non compaiono.
$legalParts = [];
if ($COMPANY['company_name'] !== '') {
    $legalParts[] = 'Sede legale: ' . $COMPANY['sede_legale'];
}
if ($COMPANY['p_iva'] !== '') {
    $legalParts[] = 'C.F. e P.IVA: ' . $COMPANY['p_iva'];
}
if ($COMPANY['capitale_sociale'] !== '') {
    $legalParts[] = 'Capitale sociale ' . $COMPANY['capitale_sociale'];
}
if ($COMPANY['pec'] !== '') {
    $legalParts[] = 'PEC: <a href="mailto:' . $COMPANY['pec'] . '">' . $COMPANY['pec'] . '</a>';
}
if ($COMPANY['email_dpo'] !== '') {
    $legalParts[] = 'DPO: <a href="mailto:' . $COMPANY['email_dpo'] . '">' . $COMPANY['email_dpo'] . '</a>';
}
$legalLine = implode(' &ndash; ', $legalParts);
?>

    <footer class="main-footer">
    <div class="footer-container">
      <div class="footer-brand">
        <a href="index.php" class="logo">
          <img src="<?= $logoFooter ?>" alt="<?= $brandName ?> Logo">
        </a>
        <p>Agenzia commerciale autorizzata<?= $operatoreNome !== '' ? ' ' . $operatoreNome : '' ?>. Prezzi trasparenti, assistenza dedicata e attivazione senza stress.</p>
      </div>
      <div class="footer-col">
        <h4>Azienda</h4>
        <a href="chi-siamo.php">Chi Siamo</a>
        <a href="tariffe.php">Offerte</a>
      </div>
      <div class="footer-col">
        <h4>Servizi</h4>
        <a href="tariffe.php">Luce</a>
        <a href="tariffe.php">Gas</a>
      </div>
      <div class="footer-col">
        <h4>Legale</h4>
        <a href="privacy-policy.php">Privacy Policy</a>
        <a href="condizioni-utilizzo.php">Condizioni di Utilizzo</a>
        <a href="trasparenza-commerciale.php">Trasparenza commerciale</a>
        <a href="cookie-policy.php">Cookie Policy</a>
      </div>
    </div>
    <div class="footer-bottom">
      <p class="footer-legal">
        &copy; <?= date('Y') ?> <strong><?= $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : $brandName ?></strong>. Tutti i diritti riservati.<?= $legalLine !== '' ? '<br>' . $legalLine : '' ?>
      </p>
    </div>
  </footer>

<?php if (!empty($pageScripts)) {
    echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>

</html>
