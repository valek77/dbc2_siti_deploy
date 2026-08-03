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
  : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'GR Contact Call Center');
// Logo footer: logo2 dall'API se presente, altrimenti l'immagine locale del brand.
$logoFooter = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url'] : 'gr_logo.png';
// Operatore energetico (fornitore di cui il sito e' agenzia commerciale).
$operatoreMarketing = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale'];

// --- Dati legali dell'azienda titolare per il fondo pagina ------------------
// REGOLA: usa il valore dall'API ($COMPANY) quando presente; per i campi NON
// modellati dall'API (REA, Registro Imprese, socio unico, nominativo DPO) usa
// il valore cablato. I valori di $COMPANY sono gia' resi sicuri per l'HTML.
$coName = $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Gierre Contact Call Center S.r.l.';
$coSede = $COMPANY['sede_legale'] !== '' ? $COMPANY['sede_legale'] : 'Via Console Cesario n. 3, 80132 Napoli (NA)';
$coPiva = $COMPANY['p_iva'] !== '' ? $COMPANY['p_iva'] : '09991111213';
$coCapitale = $COMPANY['capitale_sociale'] !== '' ? $COMPANY['capitale_sociale'] : '&euro; 10.000,00';
$coPec = $COMPANY['pec'] !== '' ? $COMPANY['pec'] : ($LANDING_PAGE['pec'] !== '' ? $LANDING_PAGE['pec'] : 'efficexsrls@pec.it');
$coDpoEmail = $COMPANY['email_dpo'];
// Campi NON modellati dall'API -> cablati.
$coRea = $COMPANY['numero_rea'];
$coRegImprese = 'Registro Imprese di Napoli n. ' . $coPiva;
?>

<footer class="main-footer">
  <div class="footer-container">
    <div class="footer-brand">
      <a href="index.php" class="logo">
        <img src="<?= $logoFooter ?>" alt="<?= $brandName ?> Logo">
      </a>
      <p>Agenzia commerciale autorizzata<?= $operatoreMarketing !== '' ? ' ' . $operatoreMarketing : '' ?>.
        Prezzi trasparenti, assistenza dedicata e attivazione senza stress.</p>
    </div>
    <div class="footer-col">
      <h4>Azienda</h4>
      <a href="chi-siamo.php">Chi siamo</a>
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
      &copy; <?= date('Y') ?> <strong><?= $coName ?></strong><br>
      Sede legale: <?= $coSede ?><br>
      C.F. e P.IVA: <?= $coPiva ?> &ndash; REA <?= $coRea ?> &ndash; <?= $coRegImprese ?><br>
      Capitale sociale: <?= $coCapitale ?> i.v. &ndash;<br>
      <?php if ($coPec !== ''): ?>PEC: <a href="mailto:<?= $coPec ?>"><?= $coPec ?></a><?php endif; ?><?php if ($coDpoEmail !== ''): ?><br>
      DPO/Responsabile della Protezione dei Dati &ndash; contatto: <a
        href="mailto:<?= $coDpoEmail ?>"><?= $coDpoEmail ?></a><?php endif; ?>
    </p>
  </div>
</footer>

<?php if (!empty($pageScripts)) {
  echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>

</html>
