<?php
/**
 * header.php — testata comune a tutte le pagine (gruppogrimaldi.com).
 *
 * Sito DINAMICO su API NUOVA (/landing-pages): brand e logo arrivano dagli array
 * $LANDING_PAGE / $COMPANY popolati da _shared/config.php. I valori degli array
 * sono GIA' resi sicuri per l'HTML (stampare con <?= ... ?>, senza e()).
 *
 * Prima dell'include ogni pagina puo' impostare:
 *   $pageTitle        -> titolo specifico (facoltativo; default = brand)
 *   $pageDescription  -> meta description (facoltativo)
 *   $pageHead         -> HTML extra nel <head>, es. <style> (facoltativo)
 */
if (!isset($LANDING_PAGE)) {
    require __DIR__ . '/_config.php';
}
// Nome da mostrare: ragione sociale azienda (fonte affidabile). Il nome_portale
// dell'API per questo sito arriva ibrido/errato ("SinergyGR"), quindi NON lo usiamo.
if (!isset($brandName) || $brandName === '') {
    $brandName = $COMPANY['company_name'] !== ''
        ? $COMPANY['company_name']
        : ($LANDING_PAGE['titolo'] !== ''
            ? $LANDING_PAGE['titolo']
            : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : 'Gruppo Grimaldi'));
}
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
        <img src="<?= $logoHeader ?>" alt="<?= $brandName ?> Logo">
      </a>
      <nav class="nav-links">
        <a href="chi-siamo.php" class="nav-link">Chi Siamo</a>
        <a href="tariffe.php" class="nav-link">Offerte</a>
       
      </nav>
      <div class="header-cta">
        <a href="contatti.php" class="btn-primary">Richiedi preventivo
          <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </div>
  </header>
