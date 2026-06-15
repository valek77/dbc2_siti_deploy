<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe';

// Script specifico della pagina (catalogo offerte). Restano dati statici:
// le offerte non fanno parte dell'anagrafica azienda gestita dall'API.
$pageScripts = <<<'JS'
  <script>
    const offers = [
      {
        id: 'active-luce-gas',
        esclusiva: true,
        nome: 'Più Controllo Special Active (Luce + Gas)',
        fornitore: 'Hera Comm',
        tipo: 'Prezzo Variabile',
        bollettaMensile: 98.40,
        bollettaAnnua: 1180.80,
        risparmio: 160.00,
        features: ['Luce: PUN + 0,00495 €/kWh', 'Gas: PSV + 0,10 €/Smc', 'Bonus 160€ (100€ Web + 60€ Digital)', 'PCV/QVD: 12€/mese per punto']
      },
      {
        id: 'active-luce',
        esclusiva: false,
        nome: 'Più Controllo Special Active Luce',
        fornitore: 'Hera Comm',
        tipo: 'Prezzo Variabile',
        bollettaMensile: 48.50,
        bollettaAnnua: 582.00,
        risparmio: 80.00,
        features: ['PUN + 0,00495 €/kWh', 'Bonus 80€ (50€ Web + 30€ Digital)', 'Energia 100% Green', 'PCV: 144€/anno']
      },
      {
        id: 'active-gas',
        esclusiva: false,
        nome: 'Più Controllo Special Active Gas',
        fornitore: 'Hera Comm',
        tipo: 'Prezzo Variabile',
        bollettaMensile: 52.90,
        bollettaAnnua: 634.80,
        risparmio: 80.00,
        features: ['PSV + 0,10 €/Smc', 'Bonus 80€ (50€ Web + 30€ Digital)', 'QVD: 144€/anno', 'Condizioni valide 12 mesi']
      },
      {
        id: 'special-flat',
        esclusiva: false,
        nome: 'Più Controllo Special Flat',
        fornitore: 'Hera Comm',
        tipo: 'Prezzo Fisso 12 mesi',
        bollettaMensile: 65.20,
        bollettaAnnua: 782.40,
        risparmio: 60.00,
        features: ['Prezzo Fissa Sicuro', 'Bonus Digital 60€', 'Hera Fast Check Up incluso']
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
        <button type="button" class="btn-primary" style="width: 100%;" data-offer-id="${o.id}">Attiva con ${o.fornitore}</button>
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
    style="background: linear-gradient(rgba(214, 0, 110, 0.4), rgba(214, 0, 110, 0.6)), url('tariffe_hero.png') center/cover no-repeat; color: #ffffff; padding: 120px 20px; height: auto; min-height: 400px; text-align: center; display: flex; align-items: center; justify-content: center;">
    <div class="hero-wrapper" style="max-width: 900px; margin: 0 auto; text-align: center; display: flex; flex-direction: column; align-items: center;">
      <h1 style="font-size: clamp(40px, 6vw, 64px); margin: 0 0 24px; max-width: 800px; font-weight: 800;">Offerte <span style="color: var(--accent);">Hera Comm</span></h1>
      <p style="font-size: 20px; color: rgba(255, 255, 255, 0.9); margin: 0; max-width: 700px;">Scegli la trasparenza del prezzo all'ingrosso. Con Hera Comm hai energia 100% green e bonus esclusivi fino a 160€.</p>
    </div>
  </section>

  <main class="container" style="max-width: 1280px; margin: var(--section-padding) auto; padding: 0 20px;">
    <div class="results-list" id="results"
      style="display: grid; grid-template-columns: repeat(auto-fit, minmax(380px, 1fr)); gap: var(--gutter);"></div>

    <div style="margin-top: 120px; display: flex; align-items: center; gap: var(--gutter); flex-wrap: wrap;">
      <div style="flex: 1; min-width: 300px;">
        <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 36px;">Trasparenza e Bonus</h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
          Passare a Hera Comm conviene: ricevi fino a 160€ di bonus in bolletta attivando Luce e Gas insieme. Gestisci tutto comodamente dall'App My Hera e monitora i tuoi consumi in tempo reale.
        </p>
        <div style="display: flex; gap: 16px; flex-wrap: wrap;">
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Bonus Web 100€</div>
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Bonus Digital 60€</div>
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Energia 100% Verde</div>
        </div>
      </div>
      <div style="flex: 0.8; min-width: 300px; display: flex; justify-content: center;">
        <img src="hero_new.png" alt="Risparmio Hera Comm"
          style="max-width: 100%; height: auto; border-radius: var(--radius-lg); box-shadow: 0 20px 40px rgba(4, 8, 50, 0.08);">
      </div>
    </div>
  </main>

  <p class="price-disclaimer" id="price-disclaimer"
    style="max-width: 1200px; margin: 40px auto; padding: 0 20px; font-size: 14px; color: var(--text-muted); text-align: center;">
    * I prezzi indicati si riferiscono alla componente energia (PUN) e materia prima gas (PSV) con l'aggiunta di un contributo al consumo fisso per 12 mesi. Dati aggiornati secondo il portale ufficiale Hera Comm.
  </p>

<?php include __DIR__ . '/footer.php'; ?>
