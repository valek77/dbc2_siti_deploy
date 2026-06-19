<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe ' . $OPERATORE_ENERGETICO;
include __DIR__ . '/header.php';
?>

  <section class="hero"
    style="background: linear-gradient(rgba(94, 200, 215, 0.4), rgba(94, 200, 215, 0.6)), url('tariffe_hero.jpg') center/cover no-repeat; color: #ffffff; padding: 120px 20px; height: auto; min-height: 400px; text-align: center; display: flex; align-items: center; justify-content: center;">
    <div class="hero-wrapper" style="max-width: 900px; margin: 0 auto; text-align: center; display: flex; flex-direction: column; align-items: center;">
      <h1 style="font-size: clamp(40px, 6vw, 64px); margin: 0 0 24px; max-width: 800px; font-weight: 800;">Offerte <span style="color: var(--accent);"><?= $OPERATORE_ENERGETICO ?></span></h1>
      <p style="font-size: 20px; color: rgba(255, 255, 255, 0.9); margin: 0; max-width: 700px;">Tre vantaggi, un'unica offerta: Luce e gas in un'unica soluzione, Prezzo Fisso per 3 anni e Bonus incluso.</p>
    </div>
  </section>

  <main class="container" style="max-width: 1280px; margin: var(--section-padding) auto; padding: 0 20px;">
    <div class="results-list" id="results"
      style="display: grid; grid-template-columns: repeat(auto-fit, minmax(380px, 1fr)); gap: var(--gutter);"></div>

    <div style="margin-top: 120px; display: flex; align-items: center; gap: var(--gutter); flex-wrap: wrap;">
      <div style="flex: 1; min-width: 300px;">
        <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 36px;">Energia Lunghissima Luce e Gas</h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
          Passare a <?= $OPERATORE_ENERGETICO ?> conviene: il prezzo di energia e gas resta uguale per 3 anni, riparandoti dai rincari del mercato. Inoltre, ricevi 20€ di bonus in bolletta attivando Luce e Gas insieme.
        </p>
        <div style="display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 24px;">
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Prezzo Bloccato 3 Anni</div>
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Bonus 20€</div>
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Luce e Gas in un'unica soluzione</div>
        </div>
        <img src="illumia_logo.png" alt="<?= $OPERATORE_ENERGETICO ?> Logo" style="max-width: 200px; height: auto;">
      </div>
      <div style="flex: 0.8; min-width: 300px; display: flex; justify-content: center;">
        <img src="hero_new.jpg" alt="Risparmio <?= $OPERATORE_ENERGETICO ?>"
          style="max-width: 100%; height: auto; border-radius: var(--radius-lg); box-shadow: 0 20px 40px rgba(4, 8, 50, 0.08);">
      </div>
    </div>
  </main>

  <p class="price-disclaimer" id="price-disclaimer"
    style="max-width: 1200px; margin: 40px auto; padding: 0 20px; font-size: 14px; color: var(--text-muted); text-align: center;">
    * I prezzi indicati si riferiscono alla componente energia e materia prima gas fissi per 36 mesi. Dati aggiornati secondo l'offerta ufficiale "Energia Lunghissima Luce e Gas" di <?= $OPERATORE_ENERGETICO ?>.
  </p>

  <script>
    const offers = [
      {
        id: 'illumia-luce-gas',
        esclusiva: true,
        nome: 'Energia Lunghissima (Luce + Gas)',
        fornitore: '<?= $OPERATORE_ENERGETICO ?>',
        tipo: 'Prezzo Fisso 3 anni',
        bollettaMensile: 95.00,
        bollettaAnnua: 1140.00,
        risparmio: 20.00,
        features: ['Luce: 0,119 €/kWh', 'Gas: 0,53 €/Smc', 'Bonus Bundle 20€', 'PCV/QVD: 7€/mese per punto']
      },
      {
        id: 'illumia-luce',
        esclusiva: false,
        nome: 'Energia Lunghissima Luce',
        fornitore: '<?= $OPERATORE_ENERGETICO ?>',
        tipo: 'Prezzo Fisso 3 anni',
        bollettaMensile: 45.00,
        bollettaAnnua: 540.00,
        risparmio: 0,
        features: ['Luce: 0,119 €/kWh', 'Prezzo bloccato 3 anni', 'Energia 100% verde', 'PCV: 7€/mese (84€/anno)']
      },
      {
        id: 'illumia-gas',
        esclusiva: false,
        nome: 'Energia Lunghissima Gas',
        fornitore: '<?= $OPERATORE_ENERGETICO ?>',
        tipo: 'Prezzo Fisso 3 anni',
        bollettaMensile: 50.00,
        bollettaAnnua: 600.00,
        risparmio: 0,
        features: ['Gas: 0,53 €/Smc', 'Prezzo bloccato 3 anni', 'Riparati dai rincari', 'QVD: 7€/mese (84€/anno)']
      }
    ];

    const fmt = n => n.toLocaleString('it-IT', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    const resultsEl = document.getElementById('results');
    resultsEl.innerHTML = offers.map(o => `
    <article class="offer-card${o.esclusiva ? ' exclusive' : ''}" style="border-radius: 12px; overflow: hidden; border: 1px solid var(--border); background: #fff;">
      <div class="offer-card-ribbon" style="background: ${o.esclusiva ? 'var(--primary)' : 'var(--secondary)'}; color: #fff; padding: 8px; text-align: center; font-weight: 700; font-size: 14px;">${o.esclusiva ? '🔥 La più scelta (Dual Fuel)' : 'Offerta Standard'}</div>
      <div class="offer-card-body" style="padding: 40px;">
        <div class="offer-card-header" style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: flex-start;">
          <div>
            <div class="offer-name-wrap"><span class="offer-name" style="font-size: 24px; font-weight: 700; color: var(--text-dark);">${o.nome}</span></div>
            <div class="offer-provider" style="color: var(--text-secondary); margin-top: 4px; font-size: 14px;">${o.fornitore} · ${o.tipo}</div>
          </div>
          <div class="offer-price-wrap" style="text-align: right;">
            <div class="offer-price" style="font-size: 32px; font-weight: 700; color: var(--primary);">€${fmt(o.bollettaMensile)}<span class="offer-price-unit" style="font-size: 16px; font-weight: 500; color: var(--text-muted);">/mese</span></div>
            <div class="offer-price-detail" style="font-size: 14px; color: var(--text-muted);">€${fmt(o.bollettaAnnua)}/anno</div>
          </div>
        </div>
        ${o.risparmio > 0 ? `<div class="offer-saving" style="background: #FFF9E6; color: #B28900; padding: 8px 16px; border-radius: 8px; font-weight: 600; margin-bottom: 24px; display: inline-block; font-size: 14px;">Bonus in Bolletta: ${o.risparmio}€</div>` : ''}
        <div class="offer-features" style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 32px;">${o.features.map(f => `<span class="offer-tag" style="display: flex; align-items: center; gap: 8px; color: var(--text-secondary); font-weight: 500; font-size: 14px;"><span style="color: var(--primary);">✓</span> ${f}</span>`).join('')}</div>
        <button type="button" class="btn-primary" style="width: 100%;" data-offer-id="${o.id}">Attiva con <?= $OPERATORE_ENERGETICO ?></button>
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
