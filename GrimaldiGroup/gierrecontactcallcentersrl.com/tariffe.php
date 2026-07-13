<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Scopri tutte le offerte ' . $OPERATORE['nome_marketing'] . ' disponibili tramite '
    . ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'GR Contact Call Center')
    . ': tariffe luce e gas per uso residenziale e professionale, con prezzi chiari e spread trasparenti.';
include __DIR__ . '/header.php';

// --- Icone SVG usate dalle card (checklist + tipologia) ------------------
$ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$ICON_BOLT = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
$ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';

// Tipologie distinte presenti nelle offerte dell'API (per i filtri).
$tipologie = [];
foreach ($OFFERTE as $o) {
    $t = $o['tipologia'];
    if ($t !== '' && !in_array($t, $tipologie, true)) {
        $tipologie[] = $t;
    }
}
?>

  <!-- Page hero -->
  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Offerte ufficiali <?= $OPERATORE['nome_marketing'] ?></span>
      <h1>Trova la tariffa <span class="accent">giusta per te</span></h1>
      <p>Offerte per uso domestico e professionale. Tutti i prezzi sono indicizzati al mercato con spread fisso e contributo di attivazione di €30,00, scontato con permanenza minima di 6 mesi.</p>
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
      <!-- Filtro (una scheda per tipologia presente nell'API) -->
      <div class="tab-bar" id="tab-bar">
        <button class="tab-btn active" data-filter="all">Tutte</button>
        <?php foreach ($tipologie as $t): ?>
        <button class="tab-btn" data-filter="<?= e($t) ?>"><?= e(ucfirst($t)) ?></button>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Griglia offerte (renderizzata lato server dai dati dell'API) -->
      <div id="offers-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 24px;">
        <?php if (empty($OFFERTE)): ?>
        <p style="color: var(--muted);">Nessuna offerta disponibile al momento.</p>
        <?php else: foreach ($OFFERTE as $o):
            $tip = strtolower($o['tipologia']);
            $isGas = ($tip === 'gas');
            $icon = $isGas ? $ICON_FLAME : $ICON_BOLT;
            // Variante "gas": palette calda (come la vecchia resa client-side).
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
            <?php endif; ?>

            <?php /* titolo/sottotitolo: FRAMMENTI HTML grezzi dall'API */ ?>
            <?= $o['titolo'] ?>
            <?php if ($o['sottotitolo'] !== ''): ?>
            <div class="offer-type"><?= $o['sottotitolo'] ?></div>
            <?php endif; ?>

            <?php if (!empty($o['caratteristiche_evidenza'])): ?>
            <div class="price-block">
              <?php foreach ($o['caratteristiche_evidenza'] as $ev) {
                  echo $ev; // frammento HTML grezzo (price-label / price-main / ...)
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
        * I prezzi indicati sono riferiti alle componenti energia (PUN) e gas (PSV) con l'aggiunta degli spread indicati. Contributo di attivazione €30,00, scontato per permanenza minima di 6 mesi. Offerte soggette a condizioni contrattuali <?= $OPERATORE['nome_legale'] ?>. <?= $brandName ?> è partner/agenzia commerciale autorizzata indipendente.
      </p>
    </div>
  </main>

  <!-- Glossary -->
  <section class="section glossary">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Capire il prezzo</span>
        <h2 class="section-title">Come funzionano <span class="underline">le tariffe</span></h2>
        <p class="section-sub"><?= $OPERATORE['nome_marketing'] ?> offre tariffe variabili indicizzate al mercato all'ingrosso. Il prezzo finale è dato dal prezzo di mercato (PUN per la luce, PSV per il gas) più uno spread fisso definito nel contratto.</p>
      </div>

      <div class="glossary-grid">
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PUN (Luce)</h4>
          <p>Prezzo Unico Nazionale: la componente energia elettrica sul mercato all'ingrosso italiano, aggiornata ogni mese.</p>
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
          <p>Con domiciliazione bancaria (RID) hai lo spread più basso. Con bollettino si applica uno spread maggiorato.</p>
        </div>
      </div>
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
            c.style.display = (f === 'all' || c.dataset.category === f) ? '' : 'none';
          });
        });
      }

      cards.forEach(card => {
        const btn = card.querySelector('[data-offer-id]');
        if (!btn) return;
        btn.addEventListener('click', function () {
          // Passo l'ID offerta a contatti.php: preselezione combo + invio a dbc2.
          const id = btn.dataset.offerId;
          window.location.href = 'contatti.php?offerta=' + encodeURIComponent(id) + '#contatto-form';
        });
      });
    })();
  </script>
HTML;
include __DIR__ . '/footer.php';
?>
