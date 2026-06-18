<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe';
include __DIR__ . '/header.php';
?>

<main class="container" style="margin-top: 60px;">
  <h2 class="section-title"
    style="display: flex; align-items: center; justify-content: center; gap: 15px; flex-wrap: wrap;">
    Le migliori offerte
    <img src="logo-acea-energia.png"
      alt="Acea Energia" style="height: 40px; width: auto;">
  </h2>
  <p class="section-sub">In partnership con <?= $OPERATORE_ENERGETICO ?> per garantirti il massimo risparmio</p>

  <div class="results-list" id="results"></div>


</main>

<script>
  const offers = [
    {
      id: 'nc-luce-fisso',
      esclusiva: true,
      nome: 'Luce Acea Fix',
      fornitore: <?= json_encode($OPERATORE_ENERGETICO) ?>,
      tipo: 'Prezzo bloccato 12 mesi',
      bollettaMensile: 65.00,
      bollettaAnnua: 780.00,
      energiaMensile: 35.00,
      risparmio: 150.00,
      features: ['Prezzo bloccato 12 mesi', 'Energia 100% Green', 'Bolletta Web Inclusa']
    },
    {
      id: 'nc-gas-fisso',
      esclusiva: true,
      nome: 'Gas Acea Fix',
      fornitore: <?= json_encode($OPERATORE_ENERGETICO) ?>,
      tipo: 'Prezzo bloccato 12 mesi',
      bollettaMensile: 85.00,
      bollettaAnnua: 1020.00,
      energiaMensile: 45.00,
      risparmio: 140.00,
      features: ['Prezzo bloccato 12 mesi', 'Gas compensazione CO2', 'Bolletta Web Inclusa']
    },
    {
      id: 'nc-dual-fisso',
      esclusiva: true,
      nome: 'Luce e Gas Acea Fix',
      fornitore: <?= json_encode($OPERATORE_ENERGETICO) ?>,
      tipo: 'Prezzi bloccati 12 mesi',
      bollettaMensile: 145.00,
      bollettaAnnua: 1740.00,
      energiaMensile: 80.00,
      risparmio: 300.00,
      features: ['Prezzi bloccati 12 mesi', 'Tutto Online', 'Bolletta Web Inclusa']
    }
  ];

  const fmt = n => n.toLocaleString('it-IT', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

  const resultsEl = document.getElementById('results');
  resultsEl.innerHTML = offers.map(o => `
    <article class="offer-card${o.esclusiva ? ' exclusive' : ''}">
      <div class="offer-card-ribbon">${o.esclusiva ? '⭐ Offerta esclusiva' : 'Offerta fornitore'}</div>
      <div class="offer-card-body">
        <div class="offer-card-header">
          <div>
            <div class="offer-name-wrap"><span class="offer-name">${o.nome}</span><span class="offer-info" title="Dettagli">i</span></div>
            <div class="offer-provider" style="display: flex; align-items: center; gap: 8px;">
              <img src="logo-acea-energia.png" alt="Acea Energia" style="height: 18px; width: auto;">
              Acea Energia · ${o.tipo}
            </div>
          </div>
          <div class="offer-price-wrap">
            <div class="offer-price">€${fmt(o.bollettaMensile)}<span class="offer-price-unit">/mese</span></div>
            <div class="offer-price-detail">€${fmt(o.bollettaAnnua)}/anno</div>
          </div>
        </div>
        ${o.risparmio > 0 ? `<div class="offer-saving">Risparmi €${fmt(o.risparmio)}/anno</div>` : ''}
        <div class="offer-features">${o.features.map(f => `<span class="offer-tag">${f}</span>`).join('')}</div>
        <button type="button" class="btn-cta" data-offer-id="${o.id}">🔥 Ti richiamiamo gratis</button>
      </div>
    </article>`).join('');

  resultsEl.addEventListener('click', e => {
    const btn = e.target.closest('[data-offer-id]');
    if (!btn) return;
    const o = offers.find(x => x.id === btn.dataset.offerId);
    if (!o) return;
    window.location.href = 'contatti.php?offerta=' + encodeURIComponent(o.nome + ' (' + o.fornitore + ')') + '#contatto-form';
  });
</script>

<?php include __DIR__ . '/footer.php'; ?>