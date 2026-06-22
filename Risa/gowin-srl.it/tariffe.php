<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe';

// Script specifico della pagina (catalogo offerte). Restano dati statici:
// le offerte non fanno parte dell'anagrafica azienda gestita dall'API.
// Il nome dell'operatore (dal .env) viene passato al JS come costante OPERATORE.
$operatoreJs = json_encode(html_entity_decode($OPERATORE_ENERGETICO, ENT_QUOTES, 'UTF-8'));
$pageScripts = "  <script>const OPERATORE = $operatoreJs;</script>\n" . <<<'JS'
  <script>
    const offers = [
      // --- OFFERTE LUCE ---
      {
        id: 'family-luce-green',
        esclusiva: false,
        nome: 'Family Luce Green',
        fornitore: OPERATORE,
        tipo: 'Mercato Libero · Prezzo Indicizzato',
        categoria: 'luce',
        codice: '028056ESVFL02XX00FAMILYLUCEGREEN',
        bollettaMensile: 0.00,
        bollettaAnnua: 0.00,
        risparmio: 0.00,
        features: ['Energia elettrica - Utenze domestiche Bassa Tensione', 'F1/F2/F3 = PUN Index GME + 0,049500 €/kWh (perdite di rete incluse)', 'Corrispettivo annuo: 397,80 €/POD/anno', 'Energia 100% green da fonti rinnovabili (GO)', 'Richiesta entro il 30/06/2026']
      },
      {
        id: 'tris-luce-green',
        esclusiva: false,
        nome: 'Tris Luce Green',
        fornitore: OPERATORE,
        tipo: 'Mercato Libero · Prezzo Indicizzato',
        categoria: 'luce',
        codice: '028056ESVFL02XX0000TRISLUCEGREEN',
        bollettaMensile: 0.00,
        bollettaAnnua: 0.00,
        risparmio: 0.00,
        features: ['Energia elettrica - Utenze domestiche Bassa Tensione', 'F1/F2/F3 = PUN Index GME + 0,049500 €/kWh (perdite di rete incluse)', 'Corrispettivo annuo: 457,80 €/POD/anno', 'Energia 100% green da fonti rinnovabili (GO)', 'Richiesta entro il 30/06/2026']
      },
      // --- OFFERTE GAS ---
      {
        id: 'family-gas',
        esclusiva: false,
        nome: 'Family Gas',
        fornitore: OPERATORE,
        tipo: 'Mercato Libero · Prezzo Indicizzato',
        categoria: 'gas',
        codice: '028056GSVML02XX00000000FAMILYGAS',
        bollettaMensile: 0.00,
        bollettaAnnua: 0.00,
        risparmio: 0.00,
        features: ['Gas naturale - Utenze domestiche', 'M = PSV + 0,210000 €/Smc', 'Corrispettivo annuo: 397,80 €/PdR/anno', 'Richiesta entro il 30/06/2026']
      },
      {
        id: 'tris-gas',
        esclusiva: false,
        nome: 'Tris Gas',
        fornitore: OPERATORE,
        tipo: 'Mercato Libero · Prezzo Indicizzato',
        categoria: 'gas',
        codice: '028056GSVML02XX0000000000TRISGAS',
        bollettaMensile: 0.00,
        bollettaAnnua: 0.00,
        risparmio: 0.00,
        features: ['Gas naturale - Utenze domestiche', 'M = PSV + 0,210000 €/Smc', 'Corrispettivo annuo: 457,80 €/PdR/anno', 'Richiesta entro il 30/06/2026']
      }
    ];

    const fmt = n => n.toLocaleString('it-IT', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    const resultsEl = document.getElementById('results');
    
    // Funzione per renderizzare le card (mostrate tutte o filtrabili)
    const renderOffers = (filter = 'all') => {
      const filtered = filter === 'all' ? offers : offers.filter(o => o.categoria === filter);
      
      resultsEl.innerHTML = filtered.map(o => `
      <article class="offer-card${o.esclusiva ? ' exclusive' : ''}" data-cat="${o.categoria}" style="border-radius: 12px; overflow: hidden; border: 1px solid var(--border); background: #fff;">
        <div class="offer-card-ribbon" style="background: ${o.esclusiva ? 'var(--primary)' : 'var(--secondary)'}; color: #fff; padding: 8px; text-align: center; font-weight: 700; font-size: 14px;">
          ${o.esclusiva ? '🔥 Consigliata' : o.categoria.toUpperCase() + ' - Standard'}
        </div>
        <div class="offer-card-body" style="padding: 40px;">
          <div class="offer-card-header" style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
              <div class="offer-name-wrap"><span class="offer-name" style="font-size: 24px; font-weight: 700; color: var(--text-dark);">${o.nome}</span></div>
              <div class="offer-provider" style="color: var(--text-secondary); margin-top: 4px; font-size: 14px;">${o.fornitore} · ${o.tipo}</div>
              ${o.codice ? `<div class="offer-code" style="color: var(--text-muted); margin-top: 4px; font-size: 11px; letter-spacing: 0.3px;">Cod. offerta: ${o.codice}</div>` : ''}
            </div>
            <div class="offer-price-wrap" style="text-align: right;">
              <div class="offer-price" style="font-size: 18px; font-weight: 700; color: var(--primary);">Prezzo Ingrosso</div>
              <div class="offer-price-detail" style="font-size: 13px; color: var(--text-muted);">Indicizzato del mercato</div>
            </div>
          </div>
          ${o.risparmio > 0 ? `<div class="offer-saving" style="background: #FFF9E6; color: #B28900; padding: 8px 16px; border-radius: 8px; font-weight: 600; margin-bottom: 24px; display: inline-block; font-size: 14px;">Bonus Fedeltà: ${o.risparmio}€/anno</div>` : ''}
          <div class="offer-features" style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 32px;">${o.features.map(f => `<span class="offer-tag" style="display: flex; align-items: center; gap: 8px; color: var(--text-secondary); font-weight: 500; font-size: 14px;"><span style="color: var(--primary);">✓</span> ${f}</span>`).join('')}</div>
          <button type="button" class="btn-primary" style="width: 100%;" data-offer-id="${o.id}">Attiva con ${o.fornitore}</button>
        </div>
      </article>`).join('');
    };

    // Inizializza con tutte le offerte
    renderOffers('all');

    // Listener per i bottoni di filtro
    document.querySelectorAll('[data-filter]').forEach(btn => {
      btn.addEventListener('click', (e) => {
        document.querySelectorAll('[data-filter]').forEach(b => b.classList.remove('active'));
        e.target.classList.add('active');
        renderOffers(e.target.dataset.filter);
      });
    });

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
  <div class="hero-wrapper"
    style="max-width: 900px; margin: 0 auto; text-align: center; display: flex; flex-direction: column; align-items: center;">
    <h1 style="font-size: clamp(40px, 6vw, 64px); margin: 0 0 24px; max-width: 800px; font-weight: 800;">Offerte Luce e
      Gas <span style="color: var(--accent);"><?= $OPERATORE_ENERGETICO ?></span></h1>
    <p style="font-size: 20px; color: rgba(255, 255, 255, 0.9); margin: 0; max-width: 700px;">Scegli la trasparenza dei
      prezzi all'ingrosso. Con <?= $OPERATORE_ENERGETICO ?> hai energia elettrica certificata 100% green, parametri fissi
      garantiti per 12 mesi e nessuna sorpresa in bolletta.</p>
  </div>
</section>

<!-- Filtri per switchare comodamente tra Luce e Gas nella pagina -->
<div class="filter-wrapper" style="text-align: center; margin-top: 60px; margin-bottom: 20px;">
  <button type="button" class="btn-filter active" data-filter="all"
    style="padding: 10px 24px; font-weight: 600; cursor: pointer; border: 1px solid var(--border); background: #fff; margin: 0 4px; border-radius: 50px;">Tutte</button>
  <button type="button" class="btn-filter" data-filter="luce"
    style="padding: 10px 24px; font-weight: 600; cursor: pointer; border: 1px solid var(--border); background: #fff; margin: 0 4px; border-radius: 50px;">💡
    Luce</button>
  <button type="button" class="btn-filter" data-filter="gas"
    style="padding: 10px 24px; font-weight: 600; cursor: pointer; border: 1px solid var(--border); background: #fff; margin: 0 4px; border-radius: 50px;">🔥
    Gas</button>
</div>

<main class="container" style="max-width: 1280px; margin: var(--section-padding) auto; padding: 0 20px;">
  <div class="results-list" id="results"
    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(380px, 1fr)); gap: var(--gutter);"></div>

  <div style="margin-top: 120px; display: flex; align-items: center; gap: var(--gutter); flex-wrap: wrap;">
    <div style="flex: 1; min-width: 300px;">
      <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 36px;">Trasparenza e Servizi Dedicati
      </h2>
      <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
        Passare a <?= $OPERATORE_ENERGETICO ?> conviene: gestisci le tue utenze domestiche in modo chiaro, con prezzi
        indicizzati al mercato all'ingrosso (PUN Index GME per la luce, PSV per il gas), parametri fissi garantiti per 12
        mesi ed energia elettrica 100% green certificata da Garanzia d'Origine.
      </p>
      <div style="display: flex; gap: 16px; flex-wrap: wrap;">
        <div class="tag"
          style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
          Prezzo di Mercato (PUN/PSV)</div>
        <div class="tag"
          style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
          Parametri fissi 12 mesi</div>
        <div class="tag"
          style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
          Energia 100% Verde (GO)</div>
      </div>
    </div>
    <div style="flex: 0.8; min-width: 300px; display: flex; justify-content: center;">
      <img src="hero_new.png" alt="Risparmio <?= $OPERATORE_ENERGETICO ?>"
        style="max-width: 100%; height: auto; border-radius: var(--radius-lg); box-shadow: 0 20px 40px rgba(4, 8, 50, 0.08);">
    </div>
  </div>
</main>

<p class="price-disclaimer" id="price-disclaimer"
  style="max-width: 1200px; margin: 40px auto; padding: 0 20px; font-size: 14px; color: var(--text-muted); text-align: center;">
  * I prezzi indicati si riferiscono ai corrispettivi di borsa per la componente energia (PUN Index GME) e materia prima
  gas (PSV) espressi al netto di IVA e imposte. I parametri fissi applicati al consumo e i costi di commercializzazione
  e vendita sono garantiti per 12 mesi dall'attivazione.
</p>

<?php include __DIR__ . '/footer.php'; ?>