<?php

/**
 * footer.php — piè di pagina comune a tutte le pagine (nexicom.locura-srl.it).
 *
 * Dati legali 100% da API NUOVA: la riga legale è costruita SOLO dai campi
 * presenti nell'azienda titolare ($COMPANY). Niente dati hardcoded: i campi che
 * l'API non fornisce (es. R.E.A.) semplicemente non compaiono.
 *
 * Prima dell'include ogni pagina può impostare:
 *   $pageScripts -> HTML <script> specifici della pagina (facoltativo)
 */
$brandName = isset($brandName) ? $brandName
    : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : 'Locura');
// Logo footer (sfondo scuro): logo2 dall'API se presente, altrimenti l'immagine locale.
$logoFooter = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url'] : 'locura-b.png';

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

// Dati dell'OPERATORE ENERGETICO (fornitore di cui il sito è partner/rivenditore).
// Solo i campi presenti nell'API; il nome va nel prefisso, i dettagli a seguire.
$operatoreNome = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'];
$operatoreDettagli = [];
if ($OPERATORE['indirizzo'] !== '') {
    $operatoreDettagli[] = 'Sede: ' . $OPERATORE['indirizzo'];
}
if ($OPERATORE['partita_iva'] !== '') {
    $operatoreDettagli[] = 'P.IVA: ' . $OPERATORE['partita_iva'];
}
$operatoreDettagliLine = implode(' - ', $operatoreDettagli);
?>

  <footer class="main-footer">
    <div class="footer-container">
      <div class="footer-brand">
        <a href="index.php" class="logo"
          style="display: flex; align-items: center; gap: 10px; color: var(--accent);"><img src="logo.png"
            alt=" <?= $COMPANY['nome_commerciale'] ?> " class="logo-img" style="max-height: 32px; width: auto; filter: brightness(0) invert(1);"></a>
        <p>Rivenditore autorizzato  <?= $OPERATORE['nome_marketing'] ?> . Prezzi trasparenti, assistenza dedicata e attivazione senza stress.</p>
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
      <p>&copy; 2026 <?= $COMPANY['nome_commerciale'] ?> . Tutti i diritti riservati.</p>
    </div>
  </footer>