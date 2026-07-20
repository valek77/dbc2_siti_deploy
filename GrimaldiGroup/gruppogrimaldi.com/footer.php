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

// --- Dati legali dell'azienda titolare ($COMPANY), 100% da API NUOVA -------
// Stessa informativa del footer di energiagr.com: ragione sociale, sede, C.F./
// P.IVA, REA, Registro Imprese, capitale sociale, PEC e DPO. Nessun dato cablato:
// i campi non forniti dall'API (REA/capitale/DPO se vuoti) semplicemente non
// compaiono. I valori di $COMPANY sono gia' resi sicuri per l'HTML.
$coName = $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : $brandName;
$coSede = $COMPANY['sede_legale'];
$coPiva = $COMPANY['p_iva'];
$coRea = $COMPANY['numero_rea'];
$coCapitale = $COMPANY['capitale_sociale'];
$coPec = $COMPANY['pec'];
$coDpoEmail = $COMPANY['email_dpo'];
// Cablati (NON modellati dall'API): forma societaria e nominativo del DPO.
$coDpoNome = 'Dott.ssa Maddalena Fulmine';
// Riga identificativi "C.F. e P.IVA – REA – Registro Imprese": monto solo le
// parti effettivamente presenti nell'API.
$identParts = [];
if ($coPiva !== '') {
    $identParts[] = 'C.F. e P.IVA: ' . $coPiva;
}
if ($coRea !== '') {
    $identParts[] = 'REA ' . $coRea;
}
if ($coPiva !== '') {
    $identParts[] = 'Registro Imprese di Napoli n. ' . $coPiva;
}
$identLine = implode(' &ndash; ', $identParts);
// Capitale sociale (da API se presente) + "Societa' a socio unico" (cablato,
// sempre mostrato).
$capitaleLine = $coCapitale !== ''
    ? 'Capitale sociale: ' . $coCapitale . ' &ndash; Società a socio unico'
    : 'Società a socio unico';
// DPO: nominativo cablato + contatto e-mail dall'API se presente.
$dpoLine = 'DPO/Responsabile della Protezione dei Dati: ' . $coDpoNome
    . ($coDpoEmail !== '' ? ' &ndash; contatto: <a href="mailto:' . $coDpoEmail . '">' . $coDpoEmail . '</a>' : '');
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
        &copy; <?= date('Y') ?> <strong><?= $coName ?></strong>. Tutti i diritti riservati.
<?php if ($coSede !== '') { ?>        <br>Sede legale: <?= $coSede ?>
<?php } if ($identLine !== '') { ?>        <br><?= $identLine ?>
<?php } ?>        <br><?= $capitaleLine ?>
<?php if ($coPec !== '') { ?>        <br>PEC: <a href="mailto:<?= $coPec ?>"><?= $coPec ?></a>
<?php } ?>        <br><?= $dpoLine ?>
      </p>
    </div>
  </footer>

<?php if (!empty($pageScripts)) {
    echo $pageScripts;
} ?>
<script src="cb.js"></script>
</body>

</html>
