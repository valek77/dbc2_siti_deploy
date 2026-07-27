<?php
require __DIR__ . '/_config.php';

$operatoreNome = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale'];
$operatoreLogo = $OPERATORE['logo_url'] !== '' ? $OPERATORE['logo_url'] : $OPERATORE['logo2_url'];
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Le offerte luce e gas ' . ($operatoreNome !== '' ? $operatoreNome : 'Nexicom') . ': condizioni trasparenti e proposte aggiornate dalla landing page.';
$pageHead = <<<'CSS'
<style>
  /* Card offerte compatte, allineate alle proporzioni della home. */
  .offers-grid {
    display: grid;
    max-width: 1200px;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 24px;
  }
  .offer-card { border-radius: 26px; box-shadow: 0 10px 28px rgba(85,45,22,.06); }
  .offer-ribbon { padding: 22px 24px 8px; gap: 8px; }
  .offer-ribbon .pill, .offer-ribbon .lock { padding: 5px 10px; font-size: 10px; }
  .offer-card-body { padding: 10px 24px 24px; }
  .offer-operator {
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 34px;
    margin-bottom: 8px;
  }
  .offer-operator span,
  .offer-supplier-label {
    color: var(--muted);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
  }
  .offer-operator img {
    display: block;
    width: auto;
    height: 32px;
    max-width: 135px;
    object-fit: contain;
  }
  .offer-supplier { display: flex; align-items: center; gap: 8px; margin-bottom: 8px; }
  .offer-name { font-size: clamp(20px, 2vw, 24px); margin-bottom: 4px; }
  .offer-type { font-size: 12.5px; margin-bottom: 16px; }
  .price-block { padding: 16px; margin-bottom: 18px; }
  .offer-features { gap: 8px; margin-bottom: 18px; }
  .offer-features li { font-size: 13px; line-height: 1.4; }
  .offer-note { font-size: 11.5px; padding: 10px 12px; margin-bottom: 18px; }
  .offer-card .btn-primary { padding: 13px 18px; font-size: 14px; }
  @media (max-width: 860px) { .offers-grid { grid-template-columns: 1fr; } }
</style>
CSS;
include __DIR__ . '/header.php';

$ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$ICON_BOLT  = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
$ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';

$tipologie = [];
foreach ($OFFERTE as $o) {
    if ($o['tipologia'] !== '' && !in_array($o['tipologia'], $tipologie, true)) {
        $tipologie[] = $o['tipologia'];
    }
}
$offerCols = count($OFFERTE) > 0 && count($OFFERTE) % 3 === 0 ? 3 : 2;
?>

  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Offerte aggiornate</span>
      <h1>La tariffa ottimale, <span class="accent">senza sorprese</span></h1>
      <p>Piani chiari per utenze domestiche e professionali. Le offerte visualizzate sono quelle configurate per questa landing page.</p>
<?php if ($operatoreNome !== '') { ?>
      <div style="margin-top:32px;display:inline-flex;align-items:center;gap:16px;background:rgba(255,255,255,.1);padding:12px 24px;border-radius:50px;border:1px solid rgba(255,255,255,.2);">
        <span style="font-size:15px;font-weight:600;color:#fff;">partner ufficiale di</span>
<?php if ($operatoreLogo !== '') { ?>
        <img src="<?= e($operatoreLogo) ?>" alt="<?= e($operatoreNome) ?>" loading="lazy" style="height:34px;width:auto;max-width:180px;object-fit:contain;">
<?php } else { ?>
        <strong style="color:#fff;"><?= e($operatoreNome) ?></strong>
<?php } ?>
      </div>
<?php } ?>
    </div>
    <div class="wave"><svg viewBox="0 0 1440 70" preserveAspectRatio="none"><path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/></svg></div>
  </section>

  <main class="section" style="padding:80px 0 40px;">
    <div class="container">
<?php if (count($tipologie) > 1) { ?>
      <div class="tab-bar" id="tab-bar">
        <button class="tab-btn active" data-filter="all">Tutte</button>
<?php foreach ($tipologie as $tipologia) { ?>
        <button class="tab-btn" data-filter="<?= e($tipologia) ?>"><?= e(dbc2_format_tipologia($tipologia)) ?></button>
<?php } ?>
      </div>
<?php } ?>

      <div id="offers-grid" class="offers-grid" style="--offer-cols: <?= $offerCols ?>;">
<?php if (empty($OFFERTE)) { ?>
        <p style="color:var(--muted);text-align:center;grid-column:1/-1;">Nessuna offerta disponibile al momento.</p>
<?php } else { foreach ($OFFERTE as $o):
          $isGas = strpos(strtolower($o['tipologia']), 'gas') === 0;
          $icon = $isGas ? $ICON_FLAME : $ICON_BOLT;
          $ribbonStyle = $isGas ? ' style="--ribbon-color:#d97706;--ribbon-bg:#fef3c7;--ribbon-text:#b45309;--ribbon-border:#fde68a;"' : '';
?>
        <article class="offer-card" data-category="<?= e($o['tipologia']) ?>"<?= $ribbonStyle ?>>
          <div class="offer-ribbon">
            <span class="pill <?= $isGas ? 'warm' : '' ?>"><?= $icon ?><span><?= e(dbc2_format_tipologia($o['tipologia'])) ?></span></span>
            <span class="lock">Offerta disponibile</span>
          </div>
          <div class="offer-card-body">
<?php if ($operatoreLogo !== '') { ?>
            <div class="offer-operator"><span>Fornitore</span><img src="<?= e($operatoreLogo) ?>" alt="<?= e($operatoreNome) ?>" loading="lazy"></div>
<?php } elseif ($operatoreNome !== '') { ?>
            <div class="offer-supplier"><span class="offer-supplier-label">Fornitore</span><strong><?= e($operatoreNome) ?></strong></div>
<?php } ?>
            <?= $o['titolo'] ?>
<?php if ($o['sottotitolo'] !== '') { ?><div class="offer-type"><?= $o['sottotitolo'] ?></div><?php } ?>
<?php if (!empty($o['caratteristiche_evidenza'])) { ?>
            <div class="price-block"><?php foreach ($o['caratteristiche_evidenza'] as $evidenza) { echo $evidenza; } ?></div>
<?php } ?>
<?php if (!empty($o['caratteristiche'])) { ?>
            <ul class="offer-features">
<?php foreach ($o['caratteristiche'] as $caratteristica) { ?><li><?= $ICON_CHECK ?><span><?= $caratteristica ?></span></li><?php } ?>
            </ul>
<?php } ?>
<?php if ($o['footer'] !== '') { ?><div class="offer-note"><?= $o['footer'] ?></div><?php } ?>
            <a class="btn-primary" href="contatti.php?offerta=<?= e($o['id']) ?>#contatto-form">Richiedi informazioni
              <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
        </article>
<?php endforeach; } ?>
      </div>

      <p style="font-size:13.5px;color:var(--muted);text-align:center;max-width:900px;margin:48px auto 0;line-height:1.7;">
        Le offerte e le relative condizioni sono quelle pubblicate nella landing page. I prezzi indicati sono al netto di IVA e imposte; ai corrispettivi si aggiungono gli oneri e i corrispettivi previsti dall'Autorità (ARERA).
      </p>
    </div>
  </main>

  <section class="section glossary"><div class="container"><div class="section-head">
    <span class="eyebrow"><span class="dot"></span> Educazione Energetica</span>
    <h2 class="section-title">Comprendere la <span class="underline">tua spesa</span></h2>
    <p class="section-sub">Crediamo che la trasparenza sia alla base del risparmio. Consulta le informazioni presenti in ogni scheda per comprendere la tua offerta.</p>
  </div></div></section>

<?php if (count($tipologie) > 1) {
  $pageScripts = <<<'HTML'
<script>
document.querySelectorAll('#tab-bar .tab-btn').forEach(function (button) {
  button.addEventListener('click', function () {
    document.querySelectorAll('#tab-bar .tab-btn').forEach(function (item) { item.classList.remove('active'); });
    button.classList.add('active');
    var filter = button.dataset.filter;
    document.querySelectorAll('#offers-grid .offer-card').forEach(function (card) {
      card.hidden = filter !== 'all' && card.dataset.category !== filter;
    });
  });
});
</script>
HTML;
} ?>
<?php include __DIR__ . '/footer.php'; ?>
