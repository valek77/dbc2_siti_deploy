<?php
require __DIR__ . '/_config.php';
$brandName = $COMPANY['company_name'] !== ''
    ? $COMPANY['company_name']
    : ($LANDING_PAGE['nome_portale'] !== ''
        ? $LANDING_PAGE['nome_portale']
        : ($LANDING_PAGE['titolo'] !== '' ? $LANDING_PAGE['titolo'] : 'GR Contact Call Center'));
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Tutte le offerte ' . $OPERATORE['nome_marketing'] . ' disponibili tramite ' . $brandName . '. Tariffe luce e gas per uso domestico e professionale con prezzi indicizzati al mercato.';
include __DIR__ . '/header.php';

// Tipologie distinte presenti nelle offerte dell'API (per i filtri). Il valore
// e' gia' formattato Title Case da _shared (es. "Luce Residenziale").
$tipologie = [];
foreach ($OFFERTE as $o) {
    $t = $o['tipologia'];
    if ($t !== '' && !in_array($t, $tipologie, true)) {
        $tipologie[] = $t;
    }
}
?>

  <!-- PAGE HERO — foto parco eolico -->
  <section class="page-hero">
    <div class="photo-bg" style="background-image: url('https://images.unsplash.com/photo-1466611653911-95081537e5b7?auto=format&fit=crop&w=1600&q=80');"></div>
    <div class="photo-overlay"></div>
    <div class="inner">
      <span class="eyebrow" style="color:var(--primary-light);"><span class="dot" style="background:var(--primary-light);"></span> Offerte <?= $OPERATORE['nome_marketing'] ?></span>
      <h1>Trova la tariffa <span class="hl">giusta per te</span></h1>
      <p>Offerte per uso domestico e professionale. Prezzi indicizzati al mercato con spread fisso. Contributo di attivazione €30,00 (scontato con 6 mesi di permanenza).</p>
    </div>
  </section>

  <!-- OFFERS -->
  <section class="section">
    <div class="container">

      <?php if (count($tipologie) > 1): ?>
      <!-- Filtro (una scheda per tipologia presente nell'API) -->
      <div class="tab-bar" id="tab-bar">
        <button class="tab-btn active" data-filter="all">Tutte le offerte</button>
        <?php foreach ($tipologie as $t): ?>
        <button class="tab-btn" data-filter="<?= e($t) ?>"><?= (stripos($t, 'gas') !== false ? '🔥 ' : '⚡ ') . e($t) ?></button>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Griglia offerte (renderizzata lato server dai dati dell'API) -->
      <div class="offers-grid" id="offers-grid">
        <?php if (empty($OFFERTE)): ?>
        <p style="color: var(--muted);">Nessuna offerta disponibile al momento.</p>
        <?php else: foreach ($OFFERTE as $o):
            $isGas = (stripos($o['tipologia'], 'gas') !== false);
        ?>
        <article class="offer-card" data-cat="<?= e($o['tipologia']) ?>">
          <div class="offer-ribbon <?= $isGas ? 'gas-res' : 'luce-res' ?>"><?= ($isGas ? '🔥 ' : '⚡ ') . e($o['tipologia']) ?></div>
          <div class="offer-body">
            <?php if ($OPERATORE['logo_url'] !== ''): ?>
            <div class="offer-operator">
              <span>Fornitore</span>
              <img src="<?= $OPERATORE['logo_url'] ?>" alt="<?= $OPERATORE['nome_marketing'] ?>" loading="lazy">
            </div>
            <?php endif; ?>

            <?php /* titolo/sottotitolo: FRAMMENTI HTML grezzi dall'API */ ?>
            <?= $o['titolo'] ?>
            <?php if ($o['sottotitolo'] !== ''): ?>
            <div class="offer-type"><?= $o['sottotitolo'] ?></div>
            <?php endif; ?>

            <?php if (!empty($o['caratteristiche_evidenza'])): ?>
            <div class="offer-price-box">
              <?php foreach ($o['caratteristiche_evidenza'] as $ev) {
                  echo $ev; // frammento HTML grezzo (h3 prezzo / p bollettino)
              } ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($o['caratteristiche'])): ?>
            <?php foreach ($o['caratteristiche'] as $c) {
                echo $c; // frammento HTML grezzo (<ul class="offer-feats"><li>...</li></ul>)
            } ?>
            <?php endif; ?>

            <?php if ($o['footer'] !== ''): ?>
            <div class="offer-note"><?= $o['footer'] ?></div>
            <?php endif; ?>

            <button class="offer-cta" data-offer-id="<?= e($o['id']) ?>" data-name="<?= e($o['nome']) ?>">Richiedi informazioni</button>
          </div>
        </article>
        <?php endforeach; endif; ?>
      </div>

      <p style="font-size:13px; color:var(--muted-2); text-align:center; max-width:900px; margin:56px auto 0; line-height:1.7;">
        * I prezzi indicati si riferiscono alle componenti energia (PUN) e gas (PSV) con l'aggiunta degli spread indicati. Contributo di attivazione €30,00, scontato con permanenza minima di 6 mesi. Offerte soggette a condizioni contrattuali <?= $OPERATORE['nome_legale'] ?>. <?= $brandName ?> è partner/agenzia commerciale autorizzata indipendente.
      </p>
    </div>
  </section>

  <!-- GLOSSARIO — dark section -->
  <section class="dark-section" style="padding: var(--section) 0;">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow" style="color:var(--primary-light); justify-content:center;"><span class="dot" style="background:var(--primary-light);"></span> Capire il prezzo</span>
        <h2 class="section-title" style="color:#fff; text-align:center;">Come funzionano<br><span style="color:var(--primary-light);">le tariffe</span></h2>
        <p class="section-sub" style="margin:0 auto 56px; text-align:center;"><?= $OPERATORE['nome_marketing'] ?> offre tariffe variabili indicizzate al mercato all'ingrosso. Il prezzo finale è dato dal prezzo di mercato più uno spread fisso definito nel contratto.</p>
      </div>
      <div class="glossary-grid">
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4.09 12.11A1 1 0 005 14h7l-1 8 8.91-10.11A1 1 0 0019 10h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PUN (Luce)</h4>
          <p>Prezzo Unico Nazionale: il costo dell'energia elettrica sul mercato all'ingrosso italiano, aggiornato ogni mese.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PSV (Gas)</h4>
          <p>Punto di Scambio Virtuale: il prezzo di riferimento del gas naturale sul mercato italiano, aggiornato mensilmente.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 14l4-4 4 4 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h4>Spread</h4>
          <p>Quota fissa aggiunta al prezzo di mercato, definita in contratto.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><rect x="2" y="5" width="20" height="14" rx="2" stroke="currentColor" stroke-width="2"/><path d="M2 10h20" stroke="currentColor" stroke-width="2"/></svg></div>
          <h4>RID vs Bollettino</h4>
          <p>Con domiciliazione bancaria (RID) hai lo spread più basso. Con bollettino postale o bancario si applica uno spread maggiorato.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section" style="text-align:center;">
    <div class="container">
      <h2 class="section-title" style="margin-bottom:16px;">Non sai quale offerta fa per te?</h2>
      <p style="font-size:18px; color:var(--muted); max-width:560px; margin:0 auto 36px; line-height:1.7;">Contattaci: analizziamo la tua bolletta attuale e ti consigliamo la tariffa più adatta gratuitamente.</p>
      <a href="contatti.php" class="btn-primary" style="font-size:17px; padding:16px 44px;">Consulenza gratuita →</a>
    </div>
  </section>

<?php
$pageScripts = <<<'HTML'
  <script>
    // Le card sono già nel DOM (render lato server dai dati API): qui gestiamo
    // solo il filtro per tipologia e il click "Richiedi informazioni".
    (function () {
      const cards = Array.from(document.querySelectorAll('#offers-grid .offer-card'));

      const tabBar = document.getElementById('tab-bar');
      if (tabBar) {
        tabBar.addEventListener('click', function (e) {
          const btn = e.target.closest('.tab-btn');
          if (!btn) return;
          tabBar.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
          btn.classList.add('active');
          const f = btn.dataset.filter;
          cards.forEach(c => {
            c.style.display = (f === 'all' || c.dataset.cat === f) ? '' : 'none';
          });
        });
      }

      cards.forEach(card => {
        const btn = card.querySelector('.offer-cta');
        if (!btn) return;
        btn.addEventListener('click', function () {
          // Passo l'ID offerta a contatti.php: preselezione combo + invio a dbc2.
          const id = btn.dataset.offerId;
          window.location.href = 'contatti.php?offerta=' + encodeURIComponent(id) + '#form';
        });
      });
    })();
  </script>
HTML;
include __DIR__ . '/footer.php';
?>
