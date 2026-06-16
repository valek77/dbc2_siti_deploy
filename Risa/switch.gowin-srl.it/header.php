<?php
/**
 * header.php — testata comune a tutte le pagine (BLUE ENERGY / switch.gowin-srl.it).
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageTitle        -> titolo della scheda browser (consigliato)
 *   $metaDescription  -> meta description della pagina (facoltativo)
 *   $pageHead         -> HTML extra nel <head>, es. <style> (facoltativo)
 *
 * Richiede _config.php già incluso (fornisce $brand, $OPERATORE_ENERGETICO,
 * le variabili globali dei campi azienda e gli helper c()/e()).
 *
 * NOTA: il marchio mostrato nel sito è l'operatore energetico (es. "BLUE ENERGY",
 * impostato in .env come OPERATORE_ENERGETICO). I dati legali/contatti del
 * rivenditore arrivano invece dall'API azienda.
 */
if (!isset($brand)) {
    require __DIR__ . '/_config.php';
}
$siteBrand = $OPERATORE_ENERGETICO !== '' ? $OPERATORE_ENERGETICO : $brand;
$pageTitle = isset($pageTitle) ? $pageTitle : $siteBrand;
// Il logo dell'operatore è un asset statico del sito.
$logo = 'gr_logo.png';
?>
<!doctype html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= e($pageTitle) ?> — <?= $siteBrand ?></title>
<?php if (!empty($metaDescription)) { ?>  <meta name="description" content="<?= e($metaDescription) ?>">
<?php } ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
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
          <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </div>
  </header>
