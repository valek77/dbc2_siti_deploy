<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$metaDescription = 'Scopri tutte le offerte ' . $OPERATORE['nome_marketing'] . ' per luce e gas per uso residenziale e professionale.';

$tipologie = [];
foreach ($OFFERTE as $o) {
    if ($o['tipologia'] !== '' && !in_array($o['tipologia'], $tipologie, true)) $tipologie[] = $o['tipologia'];
}
$operatoreLogo = $OPERATORE['logo_url'];
$operatoreNome = $OPERATORE['nome_marketing'];
include __DIR__ . '/header.php';
?>

<section class="page-hero">
  <div class="container">
    <span class="eyebrow eyebrow-light"><span class="dot"></span> Offerte ufficiali <?= $brandName ?></span>
    <h1>Trova la tariffa <span class="accent">giusta per te</span></h1>
    <p>Offerte per uso domestico e professionale, indicizzate al prezzo del mercato all'ingrosso con spread fisso e chiaro.</p>
  </div>
  <div class="wave"><svg viewBox="0 0 1440 70" preserveAspectRatio="none"><path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z" /></svg></div>
</section>

<main class="section" style="padding:80px 0 40px;">
  <div class="container">
    <?php if (!empty($OFFERTE)): ?>
    <div class="tab-bar" id="tab-bar">
      <button class="tab-btn active" data-filter="all">Tutte le Offerte</button>
      <?php foreach ($tipologie as $tipologia): ?><button class="tab-btn" data-filter="<?= e($tipologia) ?>"><?= e($tipologia) ?></button><?php endforeach; ?>
    </div>

    <div id="offers-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(340px,1fr));gap:24px;">
      <?php foreach ($OFFERTE as $o):
        $isGas = stripos($o['tipologia'], 'gas') !== false;
        $title = $o['titolo'] !== '' ? $o['titolo'] : e($o['nome']);
      ?>
      <article class="offer-card" data-cat="<?= e($o['tipologia']) ?>" style="<?= $isGas ? '--ribbon-color:#C2410C;--ribbon-bg:#FFF7E6;--ribbon-text:#9A3412;--ribbon-border:#FFE5B0;' : '' ?>">
        <div class="offer-ribbon"><span class="pill <?= $isGas ? 'warm' : '' ?>"><?= $isGas ? '🔥' : '⚡' ?> <span><?= e($o['tipologia']) ?></span></span></div>
        <div class="offer-card-body">
          <?php if ($operatoreLogo !== ''): ?><div class="offer-operator"><span>Fornitore</span><img src="<?= $operatoreLogo ?>" alt="<?= $operatoreNome ?>" loading="lazy"></div><?php endif; ?>
          <h3 class="offer-name"><?= $title ?></h3>
          <?php if ($o['sottotitolo'] !== ''): ?><div class="offer-type"><?= $o['sottotitolo'] ?></div><?php endif; ?>
          <?php if (!empty($o['caratteristiche_evidenza'])): ?><div class="price-block"><div class="price-label">Prezzo energia</div><?php foreach ($o['caratteristiche_evidenza'] as $evidenza): ?><?= $evidenza ?><?php endforeach; ?></div><?php endif; ?>
          <?php if (!empty($o['caratteristiche'])): ?><ul class="offer-features"><?php foreach ($o['caratteristiche'] as $caratteristica): ?><li><svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span><?= $caratteristica ?></span></li><?php endforeach; ?></ul><?php endif; ?>
          <?php if ($o['footer'] !== ''): ?><div class="offer-note"><?= $o['footer'] ?></div><?php endif; ?>
          <a class="btn-primary" href="contatti.php?offerta=<?= rawurlencode((string) $o['id']) ?>#contatto-form">Richiedi informazioni <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
    <?php else: ?><p style="text-align:center;color:var(--muted);">Al momento non sono disponibili offerte.</p><?php endif; ?>
    <p style="font-size:13px;color:var(--muted);text-align:center;max-width:900px;margin:60px auto 0;line-height:1.6;">* I prezzi indicati si riferiscono alle componenti energia (PUN) e gas (PSV), al netto di imposte e IVA, con l'aggiunta degli spread indicati. Offerte soggette a condizioni contrattuali <?= $brandName ?>.</p>
  </div>
</main>

<section class="section glossary"><div class="container"><div class="section-head"><span class="eyebrow"><span class="dot"></span> Capire il prezzo</span><h2 class="section-title">Come funzionano <span class="accent">le tariffe</span></h2><p class="section-sub"><?= $brandName ?> offre tariffe variabili indicizzate per farti risparmiare seguendo l'andamento reale del mercato. Il prezzo finale è dato dall'indice di borsa (PUN o PSV) più uno spread fisso definito in contratto.</p></div><div class="features-container">
  <div class="feature-card reveal"><div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div><h4>PUN (Luce)</h4><p>Il riferimento dell'energia elettrica all'ingrosso in Italia.</p></div>
  <div class="feature-card reveal"><div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div><h4>PSV (Gas)</h4><p>Il principale indice di riferimento per il prezzo del gas naturale all'ingrosso.</p></div>
  <div class="feature-card reveal"><div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18M7 14l4-4 4 4 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div><h4>Spread &amp; RID</h4><p>La quota fissa aggiunta al prezzo di mercato, definita in contratto.</p></div>
</div></div></section>

<?php
$pageScripts = <<<'HTML'
<script>
(function () {
  const tabs = document.getElementById('tab-bar');
  const cards = Array.from(document.querySelectorAll('#offers-grid .offer-card'));
  if (!tabs) return;
  tabs.addEventListener('click', function (event) {
    const button = event.target.closest('.tab-btn');
    if (!button) return;
    tabs.querySelectorAll('.tab-btn').forEach(function (item) { item.classList.remove('active'); });
    button.classList.add('active');
    const filter = button.dataset.filter;
    cards.forEach(function (card) { card.style.display = filter === 'all' || card.dataset.cat === filter ? '' : 'none'; });
  });
})();
</script>
HTML;
include __DIR__ . '/footer.php';
?>
