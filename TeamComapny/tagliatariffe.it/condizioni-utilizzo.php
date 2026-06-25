<?php 

require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';
$pageDescription = 'Mettiti in contatto con Locura per ricevere una consulenza energetica personalizzata. Inizia subito ad abbattere i consumi.';
include __DIR__ . '/header.php';

if ($COMPANY['company_name'] !== '') {
    $resp[] = '<strong>' . $COMPANY['company_name'] . '</strong>';
}
if ($COMPANY['sede_legale'] !== '') {
    $resp[] = 'con sede legale in ' . $COMPANY['sede_legale'];
}
if ($COMPANY['p_iva'] !== '') {
    $resp[] = 'C.F./P.IVA ' . $COMPANY['p_iva'];
}
if ($COMPANY['pec'] !== '') {
  $resp[] = 'PEC <strong><a href="mailto:' . $COMPANY['pec'] . '">' . $COMPANY['pec'] . '</a></strong>';
}

$responsabileData = implode(', ', $resp);

$op = [];

if ($OPERATORE['nome_legale'] !== '') {
    $op[] = '<strong>' . $OPERATORE['nome_legale'] . '</strong>';
}
if ($OPERATORE['indirizzo'] !== '') {
    $op[] = 'con sede in ' . $OPERATORE['indirizzo'];
}
if ($OPERATORE['partita_iva'] !== '') {
    $op[] = 'C.F./P.IVA ' . $OPERATORE['partita_iva'];
}

$operatoreData = implode(', ', $op);


?>


<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Condizioni di Utilizzo — <?=$COMPANY["company_name"] ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <section class="dark-section" style="padding:80px 0; text-align:center;">
    <div class="container">
      <span class="eyebrow" style="color:var(--primary-light); justify-content:center; margin-bottom:16px;"><span class="dot" style="background:var(--primary-light);"></span> Legale</span>
      <h1 style="color:#fff; font-size:clamp(36px,5vw,56px);">Condizioni di Utilizzo</h1>
      <p style="color:rgba(255,255,255,.7); margin:16px 0 0; font-size:17px;">Termini e condizioni del sito web <?=$COMPANY["company_name"] ?></p>
    </div>
  </section>
  <div class="prose">
    <h2>1. Informazioni sul sito</h2>
    <p>Il presente sito web è gestito da <?= $responsabileData ?> rivenditore indipendente autorizzato di offerte <?=$OPERATORE["nome_legale"] ?><?=$COMPANY["company_name"] ?> non è il fornitore diretto di energia: le forniture vengono attivate da <?=$OPERATORE["nome_legale"] ?>, <?= $operatoreData ?></p>
    <h2>2. Scopo del sito</h2>
    <p>Questo sito ha scopo informativo e commerciale: illustrare le offerte di fornitura luce e gas disponibili tramite <?=$OPERATORE["nome_legale"] ?> e raccogliere richieste di contatto da parte di potenziali clienti interessati a una consulenza.</p>
    <h2>3. Prezzi e offerte</h2>
    <p>Le tariffe e le condizioni economiche indicate nelle pagine di questo sito sono quelle attualmente disponibili tramite <?=$OPERATORE["nome_legale"] ?> <?=$COMPANY["company_name"] ?> si impegna ad aggiornare le informazioni ma non garantisce la loro accuratezza in tempo reale. Le condizioni contrattuali definitive sono quelle indicate nel contratto firmato con <?=$OPERATORE["nome_legale"] ?></p>
    <h2>4. Limitazione di responsabilità</h2>
    <p><?=$COMPANY["company_name"] ?> non è responsabile per eventuali interruzioni del servizio, variazioni tariffarie o problemi tecnici relativi alla fornitura energetica, in quanto tali aspetti sono di esclusiva competenza del fornitore <?=$OPERATORE["nome_legale"] ?> e dei distributori locali.</p>
    <h2>5. Proprietà intellettuale</h2>
    <p>Tutti i contenuti del sito (testi, grafica, struttura, logo) sono di proprietà di <?=$COMPANY["company_name"] ?>. È vietata la riproduzione anche parziale senza autorizzazione scritta. Le fotografie presenti sul sito provengono da Unsplash.com e sono utilizzate in conformità con la relativa licenza.</p>
    <h2>6. Legge applicabile</h2>
    <p>Le presenti condizioni sono regolate dalla legge italiana. Per qualsiasi controversia è competente il Foro del luogo di residenza del consumatore, ai sensi della normativa vigente a tutela del consumatore.</p>
    <p style="margin-top:48px; font-size:14px; color:var(--muted-2);">Ultima modifica: maggio 2026</p>
  </div>
  <footer class="main-footer">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="index.php" class="logo">
          <img src="logo.png" alt="<?=$COMPANY["company_name"] ?> Logo">
        </a>
        <p>Rivenditore autorizzato <?=$OPERATORE["nome_legale"] ?></p>
      </div>
      <div class="footer-col"><h4>Azienda</h4><a href="chi-siamo.php">Chi siamo</a><a href="tariffe.php">Offerte</a><a href="contatti.php">Contatti</a></div>
      <div class="footer-col"><h4>Legale</h4><a href="privacy-policy.php">Privacy Policy</a><a href="condizioni-utilizzo.php">Condizioni</a></div>
    </div>
  </footer>
<script src="cb.js"></script>
</body>
</html>
<?php 

include __DIR__ . '/footer.php';

?>
