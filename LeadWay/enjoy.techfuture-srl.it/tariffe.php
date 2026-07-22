<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Scopri tutte le offerte ' . $OPERATORE['nome_marketing'] . ' disponibili tramite Action: tariffe luce e gas per uso residenziale e professionale, con prezzi chiari e condizioni trasparenti.';
include __DIR__ . '/header.php';

$ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$ICON_BOLT = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
$ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';

$tipologie = [];
foreach ($OFFERTE as $o) {
    $t = $o['tipologia'];
    if ($t !== '' && !in_array($t, $tipologie, true)) {
        $tipologie[] = $t;
    }
}

$nOfferte = count($OFFERTE);
if ($nOfferte % 3 === 0) {
    $offerCols = 3;
} elseif ($nOfferte % 2 === 0) {
    $offerCols = 2;
} else {
    $offerCols = 3;
}
?>

  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Offerte ufficiali <?= $OPERATORE['nome_marketing'] ?></span>
      <h1>Trova la tariffa <span class="accent">giusta per te</span></h1>
      <p>Action ti accompagna nella scelta delle offerte luce e gas per casa e impresa, con condizioni leggibili e consulenza dedicata in ogni fase.</p>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

  <main class="section" style="padding: 80px 0 40px;">
    <div class="container">

      <?php if (count($tipologie) > 1): ?>
      <div class="tab-bar" id="tab-bar">
        <button class="tab-btn active" data-filter="all">Tutte</button>
        <?php foreach ($tipologie as $t): ?>
        <button class="tab-btn" data-filter="<?= e($t) ?>"><?= e(ucfirst($t)) ?></button>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <div id="offers-grid" class="offers-grid" style="--offer-cols: <?= $offerCols ?>;">
        <?php if (empty($OFFERTE)): ?>
        <p style="color: var(--muted); text-align: center;">Nessuna offerta disponibile al momento.</p>
        <?php else: foreach ($OFFERTE as $o):
            $tip = strtolower($o['tipologia']);
            $isGas = ($tip === 'gas');
            $icon = $isGas ? $ICON_FLAME : $ICON_BOLT;
            $styleVars = $isGas
                ? 'style="--ribbon-color:#0C3A63; --ribbon-bg:#E3F1FC; --ribbon-text:#0C3A63; --ribbon-border:#C7E3F8;"'
                : '';
        ?>
        <article class="offer-card" data-category="<?= e($o['tipologia']) ?>" <?= $styleVars ?>>
          <div class="offer-ribbon">
            <span class="pill <?= $isGas ? 'warm' : '' ?>">
              <?= $icon ?>
              <span><?= e($o['tipologia']) ?></span>
            </span>
          </div>
          <div class="offer-card-body">
            <?php if ($OPERATORE['logo_url'] !== ''): ?>
            <div class="offer-operator">
              <span>Fornitore</span>
              <img src="<?= $OPERATORE['logo_url'] ?>" alt="<?= $OPERATORE['nome_marketing'] ?>" loading="lazy">
            </div>
            <?php elseif ($OPERATORE['nome_marketing'] !== ''): ?>
            <div class="offer-supplier">
              <span class="offer-supplier-label">Fornitore</span>
              <strong><?= e($OPERATORE['nome_marketing']) ?></strong>
            </div>
            <?php endif; ?>

            <?= $o['titolo'] ?>
            <?php if ($o['sottotitolo'] !== ''): ?>
            <div class="offer-type"><?= $o['sottotitolo'] ?></div>
            <?php endif; ?>

            <?php if (!empty($o['caratteristiche_evidenza'])): ?>
            <div class="price-block">
              <?php foreach ($o['caratteristiche_evidenza'] as $ev) {
                  echo $ev;
              } ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($o['caratteristiche'])): ?>
            <ul class="offer-features">
              <?php foreach ($o['caratteristiche'] as $c): ?>
              <li><?= $ICON_CHECK ?><?= $c ?></li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <?php if ($o['footer'] !== ''): ?>
            <div class="offer-note"><?= $o['footer'] ?></div>
            <?php endif; ?>

            <button class="btn-primary" data-offer-id="<?= e($o['id']) ?>" data-name="<?= e($o['nome']) ?>">Richiedi informazioni
              <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
          </div>
        </article>
        <?php endforeach; endif; ?>
      </div>

      <p style="font-size: 13px; color: var(--muted); text-align: center; max-width: 900px; margin: 60px auto 0; line-height: 1.6;">
        Offerte riservate a clienti domestici sul Mercato Libero di <?= $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'] ?>. I prezzi indicati sono al netto di IVA e imposte; ai corrispettivi si aggiungono gli oneri e i corrispettivi previsti dall'Autorità (ARERA). Condizioni valide 12 mesi, con rinnovo automatico ai corrispettivi previsti dal 13° mese. Per il dettaglio completo consulta le CTE di ciascuna offerta.
      </p>
    </div>
  </main>

  <section class="section glossary">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Capire il prezzo</span>
        <h2 class="section-title">Come funzionano <span class="underline">le tariffe</span></h2>
        <p class="section-sub"><?= $OPERATORE['nome_marketing'] ?> propone offerte luce e gas con condizioni definite dall'API landing-pages. Action ti aiuta a leggere le componenti di prezzo e a capire quale soluzione sia più adatta al tuo profilo.</p>
      </div>

      <div class="glossary-grid">
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PUN (Luce)</h4>
          <p>Prezzo Unico Nazionale: il riferimento del mercato all'ingrosso dell'energia elettrica, aggiornato periodicamente.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PSV (Gas)</h4>
          <p>Punto di Scambio Virtuale: il riferimento del mercato italiano del gas naturale, usato come base per le offerte indicizzate.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 14l4-4 4 4 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h4>Spread</h4>
          <p>Quota aggiuntiva rispetto al prezzo di mercato, indicata nelle condizioni dell'offerta.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><rect x="2" y="5" width="20" height="14" rx="2" stroke="currentColor" stroke-width="2"/><path d="M2 10h20" stroke="currentColor" stroke-width="2"/></svg></div>
          <h4>Supporto Action</h4>
          <p>Ti aiutiamo a leggere le voci più importanti dell'offerta e a capire come si adattano ai tuoi consumi reali.</p>
        </div>
      </div>
    </div>
  </section>

<?php
$pageScripts = <<<'HTML'
  <script>
    (function () {
      const cards = Array.from(document.querySelectorAll('#offers-grid .offer-card'));
      const tabBar = document.getElementById('tab-bar');

      if (tabBar) {
        tabBar.addEventListener('click', function (e) {
          const btn = e.target.closest('.tab-btn');
          if (!btn) return;
          tabBar.querySelectorAll('.tab-btn').forEach(function (b) { b.classList.remove('active'); });
          btn.classList.add('active');
          const filter = btn.dataset.filter;
          cards.forEach(function (card) {
            card.style.display = (filter === 'all' || card.dataset.category === filter) ? '' : 'none';
          });
        });
      }

      cards.forEach(function (card) {
        const btn = card.querySelector('[data-offer-id]');
        if (!btn) return;
        btn.addEventListener('click', function () {
          const offerId = btn.dataset.offerId;
          window.location.href = 'contatti.php?offerta=' + encodeURIComponent(offerId) + '#contatto-form';
        });
      });
    })();
  </script>
HTML;
include __DIR__ . '/footer.php';
?>
