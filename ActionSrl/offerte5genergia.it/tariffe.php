<?php
require __DIR__ . '/_config.php';

$operatoreNome = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale'];
$operatoreLogo = $OPERATORE['logo_url'] !== '' ? $OPERATORE['logo_url'] : $OPERATORE['logo2_url'];
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Le offerte Luce e Gas configurate per questa landing page, con condizioni aggiornate e consulenza dedicata.';

$tipologie = [];
foreach ($OFFERTE as $offerta) {
    if ($offerta['tipologia'] !== '' && !in_array($offerta['tipologia'], $tipologie, true)) {
        $tipologie[] = $offerta['tipologia'];
    }
}

$pageHead = <<<'CSS'
<style>
  .offers-grid { display:grid; max-width:1200px; grid-template-columns:repeat(2,minmax(0,1fr)); gap:24px; align-items:stretch; }
  .offer-card { display:flex; flex-direction:column; min-width:0; overflow:hidden; border:1px solid var(--line); border-radius:26px; background:#fff; box-shadow:0 10px 28px rgba(11,18,32,.06); transition:transform .3s var(--ease),box-shadow .3s var(--ease),border-color .3s var(--ease); }
  .offer-card:hover { transform:translateY(-7px); border-color:var(--primary-100); box-shadow:0 22px 48px rgba(11,18,32,.13); }
  .offer-ribbon { display:flex; align-items:center; justify-content:space-between; min-height:66px; padding:18px 24px 10px; gap:8px; background:#fff; }
  .offer-ribbon .pill, .offer-ribbon .lock { padding:6px 10px; font-size:10px; }
  .offer-ribbon .pill { background:var(--primary-50); color:var(--primary); border-color:var(--primary-100); }
  .offer-ribbon .pill.warm { background:var(--primary-50); color:var(--primary); border-color:var(--primary-100); }
  .offer-ribbon .lock { background:var(--primary); color:#fff; border-color:var(--primary); }
  .offer-card-body { display:flex; flex:1; flex-direction:column; padding:10px 24px 24px; }
  .offer-operator { display:flex; align-items:center; justify-content:space-between; min-height:34px; margin-bottom:8px; }
  .offer-operator span, .offer-supplier-label { color:var(--muted); font-size:10px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; }
  .offer-operator img { display:block; width:auto; height:32px; max-width:145px; object-fit:contain; }
  .offer-supplier { display:flex; align-items:center; gap:8px; margin-bottom:8px; }
  .offer-name { min-height:58px; margin-bottom:4px; color:var(--ink); font-size:clamp(20px,2vw,24px); line-height:1.08; }
  .offer-api-title { min-height:58px; display:flex; align-items:flex-start; margin-bottom:4px; }
  .offer-api-title h1, .offer-api-title h2, .offer-api-title h3, .offer-api-title h4, .offer-api-title h5 { margin:0; color:var(--ink)!important; font-family:var(--font-display); font-size:clamp(20px,2vw,24px); line-height:1.08; }
  .offer-api-subtitle { min-height:42px; margin-bottom:16px; color:var(--muted); font-size:12.5px; line-height:1.45; }
  .offer-api-subtitle p { margin:0; color:var(--muted)!important; font-size:inherit; line-height:inherit; }
  .price-block { min-height:94px; padding:16px; margin-bottom:18px; background:var(--bg-soft); border:1px solid var(--line); }
  .price-block > * { margin:0 0 8px; color:var(--ink)!important; font-size:14px; line-height:1.45; }
  .price-block > *:last-child { margin-bottom:0; }
  .price-block strong, .price-block b { color:var(--primary)!important; }
  .price-block > div:first-child, .price-block > div:first-child span { color:var(--primary)!important; font-weight:700; }
  .price-block .text-white, .price-block .text-white\/50 { color:var(--ink)!important; }
  .price-block .text-\[\#fb923c\] { color:var(--primary)!important; }
  .offer-features { min-height:88px; gap:8px; margin-bottom:18px; }
  .offer-features li { display:flex; align-items:flex-start; gap:10px; font-size:13px; line-height:1.4; }
  .offer-features li > span { display:block; flex:1; min-width:0; margin:0; padding:0; }
  .offer-features li > span p, .offer-features li > span div { margin:0; padding:0; color:var(--ink-3)!important; font-size:inherit; line-height:inherit; }
  .offer-features li > span > div > div { margin:0; padding:0; }
  .offer-features li strong, .offer-features li b { color:var(--ink)!important; }
  .offer-note { min-height:52px; margin-top:auto; padding:10px 12px; color:var(--muted); font-size:11.5px; line-height:1.45; }
  .offer-note p { margin:0; color:inherit!important; font-size:inherit; line-height:inherit; }
  .offer-card .btn-primary { width:100%; margin-top:18px; padding:13px 18px; font-size:14px; }
  .offers-empty { grid-column:1/-1; padding:42px 20px; text-align:center; color:var(--muted); background:var(--bg-soft); border:1px dashed var(--line); border-radius:var(--r-lg); }
  @media (max-width:860px) { .offers-grid { grid-template-columns:1fr; } }
</style>
CSS;
include __DIR__ . '/header.php';

$ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$ICON_BOLT = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
$ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
?>

<section class="page-hero offer-page-hero">
  <div class="container">
    <span class="eyebrow eyebrow-light"><span class="dot"></span> Offerte aggiornate <?= e($brandName) ?></span>
    <h1>Trova la soluzione <span class="accent">adatta ai tuoi consumi</span></h1>
    <p>Qui trovi esclusivamente le offerte associate a questa landing page. Confronta le caratteristiche, scegli quella che vuoi approfondire e chiedi supporto al nostro team.</p>
<?php if ($operatoreNome !== '') { ?>
    <div style="margin-top:32px;display:inline-flex;align-items:center;gap:16px;background:rgba(255,255,255,.1);padding:12px 24px;border-radius:50px;border:1px solid rgba(255,255,255,.2);">
      <span style="font-size:15px;font-weight:600;color:#fff;">Fornitore</span>
<?php if ($operatoreLogo !== '') { ?>
      <img src="<?= e($operatoreLogo) ?>" alt="<?= e($operatoreNome) ?>" loading="lazy" style="height:34px;width:auto;max-width:180px;object-fit:contain;">
<?php } else { ?><strong style="color:#fff;"><?= e($operatoreNome) ?></strong><?php } ?>
    </div>
<?php } ?>
  </div>
  <div class="wave"><svg viewBox="0 0 1440 70" preserveAspectRatio="none"><path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/></svg></div>
</section>

<main class="section offers-page" style="padding:80px 0 40px;">
  <div class="container">
<?php if (count($tipologie) > 1) { ?>
    <div class="tab-bar" id="tab-bar">
      <button class="tab-btn active" data-filter="all">Tutte</button>
<?php foreach ($tipologie as $tipologia) { ?><button class="tab-btn" data-filter="<?= e($tipologia) ?>"><?= e(dbc2_format_tipologia($tipologia)) ?></button><?php } ?>
    </div>
<?php } ?>

    <div id="offers-grid" class="offers-grid">
<?php if (empty($OFFERTE)) { ?>
      <div class="offers-empty">Nessuna offerta disponibile al momento. Contattaci per ricevere assistenza.</div>
<?php } else { foreach ($OFFERTE as $offerta) {
      $isGas = strpos(strtolower($offerta['tipologia']), 'gas') === 0;
      $icon = $isGas ? $ICON_FLAME : $ICON_BOLT;
      $offertaNome = trim(strip_tags((string) ($offerta['titolo'] !== '' ? $offerta['titolo'] : $offerta['nome'])));
      $offertaNome = $offertaNome !== '' ? $offertaNome : 'Offerta ' . dbc2_format_tipologia($offerta['tipologia']);
?>
      <article class="offer-card" data-category="<?= e($offerta['tipologia']) ?>">
        <div class="offer-ribbon"><span class="pill <?= $isGas ? 'warm' : '' ?>"><?= $icon ?><span><?= e(dbc2_format_tipologia($offerta['tipologia'])) ?></span></span><span class="lock">Disponibile</span></div>
        <div class="offer-card-body">
<?php if ($operatoreLogo !== '') { ?><div class="offer-operator"><span>Fornitore</span><img src="<?= e($operatoreLogo) ?>" alt="<?= e($operatoreNome) ?>" loading="lazy"></div>
<?php } elseif ($operatoreNome !== '') { ?><div class="offer-supplier"><span class="offer-supplier-label">Fornitore</span><strong><?= e($operatoreNome) ?></strong></div><?php } ?>
<?php if ($offerta['titolo'] !== '') { ?><div class="offer-api-title"><?= $offerta['titolo'] ?></div><?php } else { ?><h3 class="offer-name"><?= e($offertaNome) ?></h3><?php } ?>
<?php if ($offerta['sottotitolo'] !== '') { ?><div class="offer-api-subtitle"><?= $offerta['sottotitolo'] ?></div><?php } ?>
<?php if (!empty($offerta['caratteristiche_evidenza'])) { ?><div class="price-block"><?php foreach ($offerta['caratteristiche_evidenza'] as $evidenza) { echo $evidenza; } ?></div><?php } ?>
<?php if (!empty($offerta['caratteristiche'])) { ?><ul class="offer-features"><?php foreach ($offerta['caratteristiche'] as $caratteristica) { ?><li><?= $ICON_CHECK ?><span><?= $caratteristica ?></span></li><?php } ?></ul><?php } ?>
<?php if ($offerta['footer'] !== '') { ?><div class="offer-note"><?= $offerta['footer'] ?></div><?php } ?>
          <a class="btn-primary" href="contatti.php?offerta=<?= e($offerta['id']) ?>#contatto-form">Richiedi informazioni <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        </div>
      </article>
<?php } } ?>
    </div>
    <p style="font-size:13.5px;color:var(--muted);text-align:center;max-width:900px;margin:48px auto 0;line-height:1.7;">Le offerte e le condizioni visualizzate sono quelle configurate per questa landing page. Gli eventuali valori economici sono al netto di IVA, imposte, oneri e corrispettivi previsti dall'Autorità.</p>
  </div>
</main>

<section class="section glossary"><div class="container"><div class="section-head"><span class="eyebrow"><span class="dot"></span> Capire prima di scegliere</span><h2 class="section-title">Leggi bene <span class="underline">la tua offerta</span></h2><p class="section-sub">Trovi le informazioni principali direttamente nelle schede. Se hai un dubbio su una voce o su una condizione, il nostro team è a disposizione.</p></div></div></section>

<?php if (count($tipologie) > 1) { $pageScripts = <<<'HTML'
<script>
document.querySelectorAll('#tab-bar .tab-btn').forEach(function (button) {
  button.addEventListener('click', function () {
    document.querySelectorAll('#tab-bar .tab-btn').forEach(function (item) { item.classList.remove('active'); });
    button.classList.add('active');
    var filter = button.dataset.filter;
    document.querySelectorAll('#offers-grid .offer-card').forEach(function (card) { card.hidden = filter !== 'all' && card.dataset.category !== filter; });
  });
});
</script>
HTML;
} ?>

<?php include __DIR__ . '/footer.php'; ?>
