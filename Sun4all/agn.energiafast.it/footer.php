<?php
/**
 * footer.php — pie' di pagina comune a tutte le pagine (energiagr.com / GR Contact).
 *
 * Dati legali dalla API NUOVA: i campi mancanti nell'azienda titolare
 * semplicemente non vengono mostrati.
 *
 * Prima dell'include ogni pagina puo' impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 */
$brandName = isset($brandName) ? $brandName
    : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'GR Contact Call Center');
// Logo footer (sfondo scuro): logo2 dall'API se presente, altrimenti l'immagine locale.
$logoFooter = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url'] : 'gr_logo.png';
// Operatore energetico (fornitore di cui il sito e' agenzia commerciale).
$operatoreMarketing = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale'];

// --- Dati legali dell'azienda titolare per il fondo pagina ------------------
$coName = $COMPANY['company_name'];
$coSede = $COMPANY['sede_legale'];
$coPiva = $COMPANY['p_iva'];
$coCapitale = $COMPANY['capitale_sociale'];
$coPec = $COMPANY['pec'];
$coRea = $COMPANY['numero_rea'];
$coDpoEmail = $COMPANY['email_dpo'];
?>

  <footer class="main-footer">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="index.php" class="logo">
          <img src="<?= $logoFooter ?>" alt="<?= $brandName ?> Logo">
        </a>
        <p>Agenzia commerciale autorizzata<?= $operatoreMarketing !== '' ? ' ' . $operatoreMarketing : '' ?>. Prezzi trasparenti, assistenza dedicata e attivazione senza stress.</p>
      </div>
      <div class="footer-col"><h4>Azienda</h4><a href="chi-siamo.php">Chi siamo</a><a href="tariffe.php">Offerte</a></div>
      <div class="footer-col"><h4>Offerte</h4><a href="tariffe.php">Luce Residenziale</a><a href="tariffe.php">Gas Residenziale</a></div>
      <div class="footer-col"><h4>Legale</h4><a href="privacy-policy.php">Privacy Policy</a><a href="condizioni-utilizzo.php">Condizioni di Utilizzo</a><a href="trasparenza-commerciale.php">Trasparenza commerciale</a><a href="cookie-policy.php">Cookie Policy</a></div>
    </div>
    <div class="footer-bottom">
      <p class="footer-legal">
        &copy; <?= date('Y') ?> <strong><?= $coName ?></strong><br>
        <?php if ($coSede !== ''): ?>Sede legale: <?= $coSede ?><br><?php endif; ?>
        <?php if ($coPiva !== ''): ?>C.F. e P.IVA: <?= $coPiva ?><br><?php endif; ?>
        <?php if ($coRea !== ''): ?>REA: <?= $coRea ?><br><?php endif; ?>
        <?php if ($coCapitale !== ''): ?>Capitale sociale: <?= $coCapitale ?><br><?php endif; ?>
        <?php if ($coPec !== ''): ?>PEC: <a href="mailto:<?= $coPec ?>"><?= $coPec ?></a><br><?php endif; ?>
        <?php if ($coDpoEmail !== ''): ?>DPO/Responsabile della Protezione dei Dati: <a href="mailto:<?= $coDpoEmail ?>"><?= $coDpoEmail ?></a><?php endif; ?>
      </p>
    </div>
  </footer>

<?php if (!empty($pageScripts)) {
    echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>
</html>
