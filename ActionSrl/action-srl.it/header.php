<?php
/**
 * header.php — testata comune a tutte le pagine.
 *
 * Sito DINAMICO su API NUOVA (/landing-pages): brand e logo arrivano dagli array
 * $LANDING_PAGE / $COMPANY popolati da _shared/config.php. I valori degli array
 * sono GIÀ resi sicuri per l'HTML (stampare con <?= ... ?>, senza e()).
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageTitle  -> titolo specifico della pagina (facoltativo; default = brand)
 *   $pageHead   -> HTML extra da inserire nel <head> (es. <style>) (facoltativo)
 */
if (!isset($LANDING_PAGE)) {
  require __DIR__ . '/_config.php';
}
// Nome da mostrare: nome portale della landing, con fallback alla ragione sociale.
$brandName = $LANDING_PAGE['nome_portale'] !== ''
  ? $LANDING_PAGE['nome_portale']
  : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Action Srl');
$pageTitle = isset($pageTitle) ? $pageTitle : $brandName;
// Logo testata: dall'API se presente, altrimenti l'immagine locale del brand.
$logo = $LANDING_PAGE['logo_url'] !== '' ? $LANDING_PAGE['logo_url'] : 'logo.png';
?>
<!doctype html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= e($pageTitle) ?> — <?= $brandName ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <?php if (!empty($pageHead)) {
    echo $pageHead;
  } ?>
</head>

<body>

  <header class="main-header">
    <div class="header-container">
      <a href="index.php" class="logo">
        <img src="<?= $logo ?>" alt="<?= $brandName ?>" class="logo-img">
      </a>
      <nav class="nav-links">
        <a href="chi-siamo.php" class="nav-link">Chi Siamo</a>
        <a href="tariffe.php" class="nav-link">Tariffe</a>
        <a href="contatti.php" class="nav-link">Contatti</a>
      </nav>
      <div class="header-cta">
        <a href="contatti.php" class="btn-primary" style="padding: 10px 24px; font-size: 14px;">Scopri di più</a>
      </div>
    </div>
  </header>