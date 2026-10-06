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

// I frammenti delle offerte arrivano dall'API e possono contenere emoji.
// Le rimuoviamo prima della visualizzazione per mantenere una grafica uniforme.
$stripOfferEmoji = static function ($value): string {
    return preg_replace('/[\x{1F300}-\x{1FAFF}\x{2600}-\x{27BF}\x{FE0F}\x{200D}]/u', '', (string) $value) ?? (string) $value;
};
?>

<style>
  .offers-page .offers-grid { max-width: 1180px; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 24px; }
  .offers-page .offer-card { border: 1px solid rgba(244,90,10,.14); box-shadow: 0 12px 36px rgba(8,36,92,.12); }
  .offers-page .offer-card:hover { transform: translateY(-8px); box-shadow: 0 22px 52px rgba(8,36,92,.18); }
  .offers-page .offer-ribbon { display: flex; align-items: center; gap: 10px; padding: 15px 22px; }
  .offers-page .offer-ribbon::before { content: ''; width: 9px; height: 9px; border-radius: 50%; background: rgba(255,255,255,.9); box-shadow: 0 0 0 5px rgba(255,255,255,.14); }
  .offers-page .offer-body { padding: 30px; }
  .offers-page .offer-price-box { border: 1px solid rgba(244,90,10,.18); background: linear-gradient(135deg, var(--primary-xlight), #fff); box-shadow: inset 0 1px 0 rgba(255,255,255,.8); }
  .offers-page .offer-feats { padding: 14px 16px; border-radius: var(--r-md); background: #fbfcfd; border: 1px solid var(--line); }
  .offers-page .offer-body .offer-feats { list-style: disc; padding-left: 36px; }
  .offers-page .offer-body .offer-feats li { display: list-item; }
  .offers-page .offer-body .offer-feats li::before { content: none; }
  .offers-page .offer-body > p:not(.offer-type) { position: relative; margin: 0 0 12px; padding-left: 22px; color: var(--muted); line-height: 1.6; }
  .offers-page .offer-body > p:not(.offer-type)::before { content: '•'; position: absolute; left: 4px; top: 0; color: var(--primary); font-size: 22px; font-weight: 800; line-height: 1.35; }
  .offers-page .offer-cta { margin-top: 12px; box-shadow: 0 8px 20px rgba(244,90,10,.24); }
  .offers-page .tab-bar { padding: 7px; border-radius: var(--r-pill); background: var(--bg-soft); border: 1px solid var(--line); gap: 6px; }
  .offers-page .tab-btn { border-radius: var(--r-pill); }
  .offers-page .tab-mark { display: inline-block; width: 8px; height: 8px; margin-right: 8px; border-radius: 50%; background: var(--primary); vertical-align: 1px; }
  .offers-page .tab-mark.gas { background: var(--coral); }
  @media (max-width: 980px) { .offers-page .offers-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
  @media (max-width: 720px) { .offers-page .offers-grid { grid-template-columns: minmax(0, 400px); } .offers-page .tab-bar { border-radius: var(--r-lg); flex-wrap: wrap; } }
</style>

<main class="offers-page">

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
        <button class="tab-btn" data-filter="<?= e($t) ?>"><span class="tab-mark <?= stripos($t, 'gas') !== false ? 'gas' : '' ?>"></span><?= e($t) ?></button>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Le tre offerte Vita Facile -->
      <div class="offers-grid" id="offers-grid">
        <article class="offer-card" data-cat="Luce">
          <div class="offer-ribbon luce-res">Luce</div>
          <div class="offer-body">
            <div class="offer-operator">
              <span>Vita Facile</span>
            </div>
            <h3>Vita Facile Luce</h3>
            <div class="offer-type">La soluzione semplice per la tua energia</div>
            <div class="offer-price-box">
              <h3>Energia per la tua casa</h3>
              <p>Scopri la proposta più adatta alle tue abitudini di consumo.</p>
            </div>
            <ul class="offer-feats"><li>Consulenza personalizzata</li><li>Supporto nella lettura della bolletta</li><li>Attivazione semplice e assistita</li></ul>
            <div class="offer-note">Richiedi informazioni sulle condizioni dedicate a te.</div>
            <button class="offer-cta" data-offer-id="vita-facile-luce" data-name="Vita Facile Luce">Richiedi informazioni</button>
          </div>
        </article>
        <article class="offer-card" data-cat="Gas">
          <div class="offer-ribbon gas-res">Gas</div>
          <div class="offer-body">
            <div class="offer-operator"><span>Vita Facile</span></div>
            <h3>Vita Facile Gas</h3>
            <div class="offer-type">Comfort e supporto per la tua casa</div>
            <div class="offer-price-box">
              <h3>Il calore che ti accompagna</h3>
              <p>Una proposta pensata per gestire il gas con maggiore semplicità.</p>
            </div>
            <ul class="offer-feats"><li>Orientamento alla soluzione più adatta</li><li>Chiarimenti su consumi e bollette</li><li>Assistenza durante l'attivazione</li></ul>
            <div class="offer-note">Richiedi informazioni sulle condizioni dedicate a te.</div>
            <button class="offer-cta" data-offer-id="vita-facile-gas" data-name="Vita Facile Gas">Richiedi informazioni</button>
          </div>
        </article>
        <article class="offer-card" data-cat="Luce e Gas">
          <div class="offer-ribbon luce-res">Luce e Gas</div>
          <div class="offer-body">
            <div class="offer-operator"><span>Vita Facile</span></div>
            <h3>Vita Facile Casa</h3>
            <div class="offer-type">Luce e gas in un unico punto di riferimento</div>
            <div class="offer-price-box">
              <h3>Tutto più semplice</h3>
              <p>Gestisci le tue forniture con un unico percorso di assistenza.</p>
            </div>
            <ul class="offer-feats"><li>Supporto coordinato luce e gas</li><li>Un unico riferimento per le tue utenze</li><li>Consulenza chiara e senza complicazioni</li></ul>
            <div class="offer-note">Richiedi informazioni sulle condizioni dedicate a te.</div>
            <button class="offer-cta" data-offer-id="vita-facile-luce-gas" data-name="Vita Facile Casa">Richiedi informazioni</button>
          </div>
        </article>
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

</main>

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
