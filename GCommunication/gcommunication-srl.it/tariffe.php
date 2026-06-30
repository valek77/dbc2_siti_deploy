<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe';

// Nome marketing dell'operatore (dall'API) per claim/badge. Passato al JS come costante PROVIDER.
$operatoreMarketing = $OPERATORE['nome_marketing'];
$operatoreJs = json_encode(html_entity_decode($operatoreMarketing, ENT_QUOTES, 'UTF-8'));

include __DIR__ . '/header.php';
?>

  <main class="container" style="margin-top: 60px;">
    <h2 class="section-title" style="display: flex; align-items: center; justify-content: center; gap: 15px; flex-wrap: wrap;">
      Le migliori offerte
      <img src="https://nuovacorrente.it/wp-content/uploads/2025/01/logo.png" alt="<?= $operatoreMarketing ?>" style="height: 40px; width: auto;">
    </h2>
    <p class="section-sub">In partnership con <?= $operatoreMarketing ?> per garantirti il massimo risparmio</p>

    <div class="results-list" id="results"></div>


  </main>

  <script>const PROVIDER = <?= $operatoreJs ?>;</script>
  <script>
    const offers = [
      {
        id: 'nc-energy-online',
        esclusiva: true,
        nome: 'Energy Online Luce',
        fornitore: PROVIDER,
        tipo: 'PUN + 0€ Spread',
        bollettaMensile: 74.50,
        bollettaAnnua: 894.00,
        energiaMensile: 42.00,
        risparmio: 195.00,
        features: ['Nessuno Spread sul PUN', 'Bonus 66€ incluso', 'Quota fissa scontata', 'Energia 100% Green']
      },
      {
        id: 'nc-gas-online',
        esclusiva: true,
        nome: 'Gas Online',
        fornitore: PROVIDER,
        tipo: 'PSV + 0.10€ Spread',
        bollettaMensile: 88.00,
        bollettaAnnua: 1056.00,
        energiaMensile: 55.00,
        risparmio: 160.00,
        features: ['Prezzo indicizzato PSV', 'Bonus 66€ incluso', 'Sconto Fedeltà dal 4° mese', 'Attivazione Gratuita']
      },
      {
        id: 'nc-dual-online',
        esclusiva: true,
        nome: 'Dual Online (Luce + Gas)',
        fornitore: PROVIDER,
        tipo: 'Prezzo Indicizzato',
        bollettaMensile: 158.00,
        bollettaAnnua: 1896.00,
        energiaMensile: 98.00,
        risparmio: 132.00,
        features: ['Bonus Totale 132€', 'Gestione Unificata', 'Tutto Online', 'Zero Vincoli']
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
              <img src="https://nuovacorrente.it/wp-content/uploads/2025/01/logo.png" alt="${o.fornitore}" style="height: 18px; width: auto;">
              ${o.fornitore} · ${o.tipo}
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
