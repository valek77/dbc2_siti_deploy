<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe';

// Catalogo offerte: dati statici (non fanno parte dell'anagrafica azienda API).
// Il nome dell'operatore (dal .env) viene passato al JS come costante PROVIDER.
$operatoreJs = json_encode(html_entity_decode($OPERATORE_ENERGETICO, ENT_QUOTES, 'UTF-8'));
$pageScripts = "  <script>const PROVIDER = $operatoreJs;</script>\n" . <<<'JS'
  <script>
    const offers = [
      {
        id: 'black-luce',
        esclusiva: true,
        nome: 'BLACK LUCE',
        fornitore: PROVIDER,
        tipo: 'PUN + Spread 0,018',
        bollettaMensile: 58.44,
        bollettaAnnua: 701.28,
        energiaMensile: 35.00,
        risparmio: 90.00,
        features: [
          'Spread: 0,018 €/kWh (incl. perdite)',
          'Bonus Canone RAI: fino a 90€/anno',
          'Sconto RID + Bollett@Online: -2€/mese',
          'Consulente Dedicato incluso'
        ]
      },
      {
        id: 'black-gas',
        esclusiva: true,
        nome: 'BLACK GAS',
        fornitore: PROVIDER,
        tipo: 'PSV + Spread 0,13',
        bollettaMensile: 58.91,
        bollettaAnnua: 706.92,
        energiaMensile: 38.00,
        risparmio: 24.00,
        features: [
          'Spread: 0,13 €/Smc',
          'Sconto RID + Bollett@Online: -2€/mese',
          'Consulente Dedicato incluso',
          'Fatturazione Mensile'
        ]
      },
      {
        id: 'black-dual',
        esclusiva: false,
        nome: 'BLACK LUCE & GAS',
        fornitore: PROVIDER,
        tipo: 'Combo Variabile',
        bollettaMensile: 117.35,
        bollettaAnnua: 1408.20,
        energiaMensile: 73.00,
        risparmio: 114.00,
        features: [
          'Tutti i Bonus raddoppiati',
          'Gestione Unica via App Lucy',
          'Assistenza Prioritaria H24',
          'Prezzo indicizzato PUN/PSV'
        ]
      }
    ];

    const fmt = n => n.toLocaleString('it-IT', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    const resultsEl = document.getElementById('results');
    resultsEl.innerHTML = offers.map(o => `
    <article class="offer-card${o.esclusiva ? ' exclusive' : ''}">
      <div class="offer-card-ribbon">${o.esclusiva ? '⭐ Più scelta' : 'Offerta Standard'}</div>
      <div class="offer-card-body" style="padding: 40px;">
        <div style="margin-bottom: 24px;">
          <img src="logo-dark.png" alt="Logo ${o.fornitore}" style="height: 40px; margin-bottom: 20px;">
        </div>
        <div class="offer-card-header" style="margin-bottom: 24px; align-items: flex-start;">
          <div>
            <div class="offer-name-wrap"><span class="offer-name" style="font-size: 26px; font-weight: 800; font-family: var(--font-h); color: var(--accent);">${o.nome}</span></div>
            <div class="offer-provider" style="margin-top: 4px;">${o.fornitore} · ${o.tipo}</div>
          </div>
          <div class="offer-price-wrap" style="text-align: right;">
            <div class="offer-price" style="font-size: 36px; font-weight: 800; color: var(--accent);">€${fmt(o.bollettaMensile)}<span class="offer-price-unit" style="font-size: 16px; font-weight: 500;">/mese</span></div>
            <div class="offer-price-detail" style="font-size: 14px;">€${fmt(o.bollettaAnnua)}/anno</div>
          </div>
        </div>
        ${o.risparmio > 0 ? `<div class="offer-saving" style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 8px; font-weight: 600; margin-bottom: 24px; display: inline-block;">Tariffa Ufficiale</div>` : ''}
        <div class="offer-features" style="display: flex; flex-direction: column; gap: 14px; margin-bottom: 32px;">${o.features.map(f => `<span class="offer-tag" style="display: flex; align-items: center; gap: 10px; font-weight: 500; border-radius: 8px; color: var(--text-label); background: #f1f5f9;"><span style="color: var(--accent); font-size: 18px;">✓</span> ${f}</span>`).join('')}</div>
        <button type="button" class="btn-primary" style="width: 100%; border: none; cursor: pointer;" data-offer-id="${o.id}">Attiva ora</button>
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
JS;

include __DIR__ . '/header.php';
?>

  <section class="hero"
    style="background: linear-gradient(rgba(4, 8, 50, 0.7), rgba(4, 8, 50, 0.7)), url('tariffe_hero.png') center/cover no-repeat; color: #ffffff; padding: var(--section-padding) 20px; height: auto; min-height: 400px; text-align: center; display: flex; align-items: center; justify-content: center;">
    <div class="hero-wrapper"
      style="max-width: 900px; margin: 0 auto; text-align: center; display: flex; flex-direction: column; align-items: center;">
      <div
        style="display: flex; align-items: center; gap: 12px; background: rgba(255, 255, 255, 0.1); padding: 8px 16px; border-radius: 100px; margin-bottom: 24px; border: 1px solid rgba(255, 255, 255, 0.2);">
        <span style="font-size: 14px; text-transform: uppercase; letter-spacing: 1px; font-weight: 600;">Official
          Partner</span>
        <img src="logo-dark.png" alt="<?= $OPERATORE_ENERGETICO ?>" style="height: 24px; filter: brightness(0) invert(1);">
      </div>
      <h1 style="font-size: clamp(40px, 6vw, 64px); margin: 0 0 24px; max-width: 800px; font-weight: 800;">L'energia che
        conviene con <?= $OPERATORE_ENERGETICO ?></h1>
      <p style="font-size: 20px; color: rgba(255, 255, 255, 0.9); margin: 0; max-width: 700px;">Scegli la sicurezza:
        avrai un esperto dedicato per individuare il contratto su misura per te, assicurandoti un supporto continuo nel
        tempo!</p>
    </div>
  </section>

  <main class="container" style="max-width: 1280px; margin: var(--section-padding) auto; padding: 0 20px;">
    <div class="results-list" id="results"
      style="display: grid; grid-template-columns: repeat(auto-fit, minmax(380px, 1fr)); gap: var(--gutter);"></div>

    <div style="margin-top: 120px; display: flex; align-items: center; gap: var(--gutter); flex-wrap: wrap;">
      <div style="flex: 1; min-width: 300px;">
        <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 36px;">Ottimizza i tuoi consumi
        </h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
          <?= $brand ?> va oltre la fornitura energetica classica. Il nostro scopo è proteggerti dai costi eccessivi
          attraverso consigli chiari e costanti. Avrai sempre una figura di riferimento a tua disposizione, eliminando
          lo stress dei call center.
        </p>
        <div style="display: flex; gap: 16px;">
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Luce 100% Green</div>
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Gas Zero Vincoli</div>
        </div>
      </div>
      <div style="flex: 0.8; min-width: 300px; display: flex; justify-content: center;">
        <img src="savings.png" alt="Risparmio"
          style="max-width: 100%; height: auto; border-radius: var(--radius-lg); box-shadow: 0 20px 40px rgba(4, 8, 50, 0.08);">
      </div>
    </div>
  </main>

  <p class="price-disclaimer" id="price-disclaimer"
    style="max-width: 1200px; margin: 40px auto; padding: 0 20px; font-size: 14px; color: var(--text-muted); text-align: center;">
    * Stime basate su profilo medio. Importi soggetti a variazioni in base a consumo, zona e potenza. Dati aggiornati
    secondo il portale ufficiale <?= $OPERATORE_ENERGETICO ?>.
  </p>

  <section class="info-section"
    style="padding: 60px 20px; background: var(--bg-cream); border-radius: 32px; max-width: 1200px; margin: 80px auto;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 40px;">
      <div>
        <h4 style="color: var(--accent); margin-bottom: 16px; font-weight: 700;">Dettagli Contrattuali</h4>
        <ul style="font-size: 15px; color: var(--text-secondary); padding-left: 20px; line-height: 1.8;">
          <li>Fatturazione: Mensile</li>
          <li>Durata: Tempo indeterminato</li>
          <li>Ripensamento: 14 giorni solari</li>
          <li>Metodi: SDD, App Lucy, PayPal, Carte</li>
        </ul>
      </div>
      <div>
        <h4 style="color: var(--accent); margin-bottom: 16px; font-weight: 700;">Bonus & Sconti</h4>
        <ul style="font-size: 15px; color: var(--text-secondary); padding-left: 20px; line-height: 1.8;">
          <li>Sconto RIDotto: -1,00 €/mese</li>
          <li>Sconto Bollett@Online: -1,00 €/mese</li>
          <li>Bonus Assistenza: -1,50 €/mese (24m)</li>
          <li>Canone RAI: Riaccredito fino a 90€</li>
        </ul>
      </div>
      <div>
        <h4 style="color: var(--accent); margin-bottom: 16px; font-weight: 700;">Altre Informazioni</h4>
        <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6;">
          Deposito Cauzionale richiesto solo senza domiciliazione (es. 40€ fino a 3kW). Cambio prodotto: 36€ + IVA.
          Gestione morosità: 100€ + IVA.
        </p>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
