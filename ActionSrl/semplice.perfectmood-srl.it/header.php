<?php
/**
 * header.php — testata comune a tutte le pagine (markup del sito).
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageTitle -> titolo della scheda browser (consigliato)
 *   $pageDesc  -> meta description della pagina (facoltativo, già sicuro per l'HTML)
 *   $pageHead  -> HTML extra dentro il <head>, es. <style> (facoltativo)
 *
 * Richiede che _config.php sia già stato incluso (fornisce $brand, le
 * variabili globali dei campi azienda e gli helper c()/e()).
 */
if (!isset($brand)) {
    require __DIR__ . '/_config.php';
}
$pageTitle = isset($pageTitle) ? $pageTitle : $brand;
$logo = $logo_url !== '' ? $logo_url : 'LOGO_again.png';
?>
<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= e($pageTitle) ?> — <?= $brand ?></title>
<?php if (!empty($pageDesc)) { ?>  <meta name="description" content="<?= $pageDesc ?>">
<?php } ?>  <link rel="stylesheet" href="style.css">
<?php if (!empty($pageHead)) {
    echo $pageHead;
} ?>
</head>
<body>

  <header class="main-header">
    <div class="header-inner">
      <a href="index.php" class="logo">
        <img src="<?= $logo ?>" alt="<?= $brand ?> Logo">
      </a>
      <nav class="nav-links">
        <a href="chi-siamo.php" class="nav-link">Chi Siamo</a>
        <a href="tariffe.php" class="nav-link">Offerte</a>
        <a href="contatti.php" class="nav-link">Contatti</a>
      </nav>
      <a href="contatti.php" class="btn-header">Consulenza gratuita</a>
    </div>
  </header>
