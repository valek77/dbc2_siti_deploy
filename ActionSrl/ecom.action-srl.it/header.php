<?php
/**
 * header.php — testata comune a tutte le pagine.
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageTitle  -> titolo specifico della pagina (obbligatorio)
 *   $pageHead   -> HTML extra da inserire nel <head> (es. <style>) (facoltativo)
 *
 * Richiede che _config.php sia già stato incluso (fornisce $brand, le
 * variabili globali dei campi azienda e gli helper c()/e()).
 */
if (!isset($brand)) {
    require __DIR__ . '/_config.php';
}
$pageTitle = isset($pageTitle) ? $pageTitle : $brand;
$logo = $logo_url !== '' ? $logo_url : 'logo.png';
?>
<!doctype html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= e($pageTitle) ?> — <?= $brand ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
<?php if (!empty($pageHead)) {
    echo $pageHead;
} ?>
</head>

<body style="margin: 0;">

  <header class="main-header" style="top: 0; z-index: 100; background: #fff; border-bottom: 1px solid #E4E4E7;">
    <div class="header-container" style="max-width: 1200px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; padding: 16px 24px;">
      <a href="index.php" class="logo">
        <img src="<?= $logo ?>" alt="<?= $brand ?>" class="logo-img" style="height: 40px; width: auto;">
      </a>
      <nav class="nav-links" style="display: flex; gap: 32px;">
        <a href="tariffe.php" class="nav-link" style="font-weight: 600; color: #18181B; text-decoration: none;">Offerte Luce e Gas</a>
        <a href="chi-siamo.php" class="nav-link" style="font-weight: 600; color: #18181B; text-decoration: none;">Chi Siamo</a>
        <a href="contatti.php" class="nav-link" style="font-weight: 600; color: #18181B; text-decoration: none;">Contatti</a>
      </nav>
      <div class="header-cta">
        <a href="tariffe.php" class="btn-primary" style="padding: 10px 24px; font-size: 14px; background: var(--primary); color: #fff; border-radius: 99px; text-decoration: none; font-weight: 600;">Scopri tariffe</a>
      </div>
    </div>
  </header>
