<?php
/**
 * header.php — testata comune a tutte le pagine (energiagr.com / GR Contact).
 *
 * Sito DINAMICO su API NUOVA (/landing-pages): brand e logo arrivano dagli array
 * $LANDING_PAGE / $COMPANY popolati da _shared/config.php. I valori degli array
 * sono GIA' resi sicuri per l'HTML (stampare con <?= ... ?>, senza e()).
 *
 * Prima dell'include ogni pagina puo' impostare:
 *   $pageTitle        -> titolo specifico (facoltativo; default = brand)
 *   $pageDescription  -> meta description (facoltativo)
 *   $pageHead         -> HTML extra nel <head>, es. <style> (facoltativo)
 *   $headerPrefix     -> HTML extra tra <body> e <header> (es. la top-bar dell'index)
 */
if (!isset($LANDING_PAGE)) {
    require __DIR__ . '/_config.php';
}
// Nome azienda da mostrare: ragione sociale dell'azienda titolare (API $COMPANY),
// con fallback a nome portale / titolo della landing.
$brandName = $COMPANY['company_name'] !== ''
    ? $COMPANY['company_name']
    : ($LANDING_PAGE['nome_portale'] !== ''
        ? $LANDING_PAGE['nome_portale']
        : ($LANDING_PAGE['titolo'] !== '' ? $LANDING_PAGE['titolo'] : 'GR Contact Call Center'));
// Logo testata: dall'API se presente, altrimenti l'immagine locale del brand.
$logoHeader = $LANDING_PAGE['logo_url'] !== '' ? $LANDING_PAGE['logo_url'] : 'gr_logo.png';
?>
<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php
    if (isset($pageTitle) && $pageTitle !== '') {
        echo e($pageTitle) . ' — ' . $brandName;        // pagine interne: "Titolo pagina — Brand"
    } elseif ($LANDING_PAGE['titolo'] !== '') {
        echo $LANDING_PAGE['titolo'];                     // homepage: titolo della landing (gia' pulito per HTML)
    } else {
        echo $brandName;
    }
?></title>
<?php if (!empty($pageDescription)) { ?>
  <meta name="description" content="<?= e($pageDescription) ?>">
<?php } ?>
  <link rel="stylesheet" href="style.css">
<?php if (!empty($pageHead)) {
    echo $pageHead;
} ?>
</head>
<body class="<?= isset($pageClass) ? $pageClass : 'page-inner' ?>">

<?php if (!empty($headerPrefix)) {
    echo $headerPrefix;
} ?>
  <header class="main-header">
    <div class="header-inner">
      <a href="index.php" class="logo">
        <img src="<?= $logoHeader ?>" alt="<?= $brandName ?> Logo">
      </a>
      <nav class="nav-links">
        <a href="chi-siamo.php" class="nav-link">Chi Siamo</a>
        <a href="tariffe.php" class="nav-link">Offerte</a>
      </nav>
      <a href="contatti.php" class="btn-header">Scopri le offerte luce e gas</a>
    </div>
  </header>
