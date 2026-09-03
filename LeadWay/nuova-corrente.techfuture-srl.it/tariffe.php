<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe';
include __DIR__ . '/header.php';
?>

  <main class="container" style="margin-top: 60px;">
    <h2 class="section-title" style="display: flex; align-items: center; justify-content: center; gap: 15px; flex-wrap: wrap;">
      Le migliori offerte
      <img src="nuovaCorrente.png" alt="Nuova Corrente" style="height: 40px; width: auto;">
    </h2>
    <p class="section-sub">In partnership con <?= $OPERATORE['nome_marketing'] ?> per garantirti il massimo risparmio</p>

    <div class="results-list" id="results"></div>


  </main>

  <script>
    const offers = [
      {
        id: 'nc-energy-online',
        esclusiva: true,
        nome: '⚡ ENERGY ONLINE',
        fornitore: <?= json_encode($OPERATORE_ENERGETICO) ?>,
        tipo: 'Luce',
        prezzoLabel: 'PUN + 0 €/kWh<br><small>NO SPREAD</small>',
        bollettaMensile: 0,
        bollettaAnnua: 0,
        energiaMensile: 0,
        risparmio: 0,
        features: ['Quota fissa: 10,00/8,00 €/POD — bonus dal 4° mese', 'Sconto SDD: 2 €/mese', 'Prezzo indicizzato al PUN mensile', 'Bolletta Total Green', 'Opzione Energia Verde disponibile', 'Attivazione rapida online']
      },
      {
        id: 'nc-gas-online',
        esclusiva: true,
        nome: '🔥 GAS ONLINE',
        fornitore: <?= json_encode($OPERATORE_ENERGETICO) ?>,
        tipo: 'Gas',
        prezzoLabel: 'PSV + 0,10 €/Smc',
        bollettaMensile: 0,
        bollettaAnnua: 0,
        energiaMensile: 0,
        risparmio: 0,
        features: ['Quota fissa: 10,00/8,00 €/PDR ad emissione — bonus dal 4° mese', 'Contributo al consumo: 0,10 €/Smc (valido 12 mesi)', 'Sconto SDD: 2 €/mese', 'Prezzo indicizzato al PSV mensile', 'Valido 36 mesi', 'Attivazione rapida online']
      },
      {
        id: 'nc-online-dual',
        esclusiva: true,
        nome: '⚡🔥 ONLINE DUAL',
        fornitore: <?= json_encode($OPERATORE_ENERGETICO) ?>,
        tipo: 'Luce + Gas',
        prezzoLabel: 'PUN + 0 €/kWh<br><small>NO SPREAD · PSV + 0,10 €/Smc</small>',
        bollettaMensile: 0,
        bollettaAnnua: 0,
        energiaMensile: 0,
        risparmio: 0,
        features: ['Quota fissa: 10,00/8,00 € (POD-PDR) — bonus dal 4° mese', 'Attiva insieme Luce e Gas', 'Un unico referente per entrambe', 'Sconto SDD: 2 €/mese', 'Bolletta Total Green', 'Attivazione rapida online', 'Gestione semplificata']
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
            <div class="offer-name-wrap"><span class="offer-name">${o.nome}</span></div>
            <div class="offer-provider" style="display: flex; align-items: center; gap: 8px;">
              <img src="nuovaCorrente.png" alt="Nuova Corrente" style="height: 18px; width: auto;">
              Nuova Corrente · ${o.tipo}
            </div>
          </div>
          <div class="offer-price-wrap">
            ${o.bollettaMensile > 0
              ? `<div class="offer-price">€${fmt(o.bollettaMensile)}<span class="offer-price-unit">/mese</span></div>
                 <div class="offer-price-detail">€${fmt(o.bollettaAnnua)}/anno</div>`
              : `<div class="offer-price" style="font-size: 22px; line-height: 1.2; text-align: right;">${o.prezzoLabel}</div>`}
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
