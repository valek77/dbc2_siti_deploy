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
    : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : 'LeadWay');
// Logo footer (sfondo scuro): logo2 dall'API se presente, altrimenti l'immagine locale.
$logoFooter = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url'] : 'logo.png';

// Nome operatore energetico (legale, con fallback al nome marketing) per il blocco rivenditore.
$operatoreNome = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'];

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
  $legalParts[] = 'PEC: <a href="mailto:' . $COMPANY['pec'] . '" style="color:inherit; text-decoration:underline;">' . $COMPANY['pec'] . '</a>';
}
$legalLine = implode(' &mdash; ', $legalParts);
?>

  <footer class="main-footer">
    <div class="footer-container">
      <div class="footer-brand">
        <a href="index.php" class="logo" style="display: flex; align-items: center; gap: 10px; color: var(--accent);"><img
            src="<?= $logoFooter ?>" alt="<?= $brandName ?>" class="logo-img"
            style="max-height: 32px; width: auto; filter: brightness(0) invert(1);"></a>
        <?php if ($operatoreNome !== '') { ?>
          <p>Rivenditore autorizzato <?= $operatoreNome ?>. Prezzi trasparenti, assistenza dedicata e attivazione
            senza stress.</p>
        <?php } ?>
      </div>
      <div class="footer-links">
        <div class="footer-col">
          <h4>Chi Siamo</h4>
          <a href="chi-siamo.php">Chi Siamo</a>
          <a href="tariffe.php">Tariffe</a>
          <a href="contatti.php">Contatti</a>
        </div>
        <div class="footer-col">
          <h4>Servizi</h4>
          <a href="tariffe.php">Confronta Offerte Luce</a>
          <a href="tariffe.php">Soluzioni Sostenibili</a>
        </div>
        <div class="footer-col">
          <h4>Legale</h4>
          <a href="condizioni-utilizzo.php">Condizioni di Utilizzo</a>
          <a href="privacy-policy.php">Privacy Policy</a>
        </div>
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
