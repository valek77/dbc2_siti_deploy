<?php
/**
 * header.php — testata comune a tutte le pagine.
 *
 * Sito DINAMICO su API NUOVA (/landing-pages): brand e logo arrivano dagli array
 * $LANDING_PAGE / $COMPANY popolati da _shared/config.php. I valori degli array
 * sono GIÀ resi sicuri per l'HTML (stampare con <?= ... ?>, senza e()).
 *
 * Prima di includerlo, ogni pagina può impostare:
 *   $pageTitle        -> titolo specifico della pagina (facoltativo; default = brand)
 *   $pageDescription  -> meta description (facoltativo)
 *   $pageHead         -> HTML extra da inserire nel <head> (es. <style>) (facoltativo)
 */
if (!isset($LANDING_PAGE)) {
    require __DIR__ . '/_config.php';
}
// Nome da mostrare: nome portale della landing, con fallback a titolo, ragione sociale, infine letterale.
$brandName = $LANDING_PAGE['nome_portale'] !== ''
    ? $LANDING_PAGE['nome_portale']
    : ($LANDING_PAGE['titolo'] !== ''
        ? $LANDING_PAGE['titolo']
        : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Service Center'));
// Logo testata: dall'API se presente, altrimenti l'immagine locale del brand.
$logoHeader = $LANDING_PAGE['logo_url'] !== '' ? $LANDING_PAGE['logo_url'] : 'logo.png';
?>
<!doctype html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php
    if (isset($pageTitle) && $pageTitle !== '') {
        echo e($pageTitle) . ' — ' . $brandName;
    } elseif ($LANDING_PAGE['titolo'] !== '') {
        echo $LANDING_PAGE['titolo'];
    } else {
        echo $brandName;
    }
?></title>
<?php if (!empty($pageDescription)) { ?>
  <meta name="description" content="<?= e($pageDescription) ?>">
<?php } ?>
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
          src="<?= $logoHeader ?>" alt="<?= $brandName ?>" class="logo-img" style="max-height: 48px; width: auto;"></a>
      <nav class="nav-links">
        <a href="chi-siamo.php" class="nav-link">Chi Siamo</a>
        <a href="tariffe.php" class="nav-link">Tariffe</a>
        <a href="contatti.php" class="nav-link">Contatti</a>
      </nav>
    </div>
  </header>
