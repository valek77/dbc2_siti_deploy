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
  <link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=DM+Sans:wght@400;500;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css">
<?php if (!empty($pageHead)) {
    echo $pageHead;
} ?>
</head>

<body>

  <header class="main-header">
    <div class="header-container">
      <a href="index.php" class="logo" style="display: flex; align-items: center; gap: 10px; color: var(--accent);"><img
          src="<?= $logo ?>" alt="<?= $brand ?>" class="logo-img" style="max-height: 48px; width: auto;"></a>
      <nav class="nav-links">
        <a href="chi-siamo.php" class="nav-link">Chi Siamo</a>
        <a href="tariffe.php" class="nav-link">Tariffe</a>
        <a href="contatti.php" class="nav-link">Contatti</a>
      </nav>
    </div>
  </header>
