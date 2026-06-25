<?php
/**
 * header.php — testata comune a tutte le pagine.
 *
 * Sito DINAMICO su API NUOVA (/landing-pages): brand, logo e dati arrivano dagli
 * array $LANDING_PAGE / $OPERATORE / $COMPANY popolati da _shared/config.php. I
 * valori degli array sono GIÀ resi sicuri per l'HTML (stampare con <?= ... ?>).
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageTitle        -> titolo della scheda browser (consigliato)
 *   $metaDescription  -> meta description della pagina (facoltativo)
 *   $pageHead         -> HTML extra nel <head>, es. <style> (facoltativo)
 *
 * NOTA: il marchio mostrato nel sito è l'operatore energetico
 * ($OPERATORE['nome_marketing']). I dati legali/contatti del rivenditore
 * arrivano invece da $COMPANY.
 */
if (!isset($LANDING_PAGE)) {
  require __DIR__ . '/_config.php';
}
// Brand visibile: nome marketing dell'operatore energetico (fallback: nome portale, ragione sociale).
$brandName = isset($brandName) ? $brandName
  : ($OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing']
  : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale']
  : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Switch')));
$siteBrand = $brandName;
$pageTitle = isset($pageTitle) ? $pageTitle : $siteBrand;
// Logo testata: dalla landing (API), con fallback al logo azienda.
$logo = $LANDING_PAGE['logo_url'] !== '' ? $LANDING_PAGE['logo_url']
  : ($COMPANY['logo_url'] !== '' ? $COMPANY['logo_url'] : '');

?>
<!doctype html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= e($pageTitle) ?> — <?= $siteBrand ?></title>
  <?php if (!empty($metaDescription)) { ?>
    <meta name="description" content="<?= e($metaDescription) ?>">
  <?php } ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <?php if (!empty($pageHead)) {
    echo $pageHead;
  } ?>
</head>

<body>

  <header class="main-header">
    <div class="header-container">
      <a href="index.php" class="logo">
        <img src="<?= $logo ?>" alt="<?= $siteBrand ?> Logo">
      </a>
      <nav class="nav-links">
        <a href="chi-siamo.php" class="nav-link">Chi Siamo</a>
        <a href="tariffe.php" class="nav-link">Offerte</a>
        <a href="contatti.php" class="nav-link">Contatti</a>
      </nav>
      <div class="header-cta">
        <a href="contatti.php" class="btn-primary">Richiedi preventivo
          <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none">
            <path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </a>
      </div>
    </div>
  </header>