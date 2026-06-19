<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Scopri le offerte ' . $OPERATORE_ENERGETICO . ' disponibili tramite ' . $brand . ': FAMILY LUCE TLS e FAMILY GAS TLS per uso domestico, con prezzi chiari e spread fisso trasparente.';
include __DIR__ . '/header.php';
?>

  <!-- Page hero -->
  <section class="page-hero">
    <div class="container">
      <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px; background: rgba(255,255,255,0.1); padding: 8px 16px; border-radius: 12px; width: fit-content;">
        <img src="logo-domestika.png" alt="<?= $OPERATORE_ENERGETICO ?>" style="height: 28px; filter: brightness(0) invert(1);">
        <span style="color: #fff; font-weight: 600; font-size: 14px; letter-spacing: 0.05em; text-transform: uppercase;">Partner Ufficiale</span>
      </div>
      <h1>Trova la tariffa <span class="accent">giusta per te</span></h1>
      <p>Offerte per uso domestico. Prezzi indicizzati al mercato (PUN per la luce, PSV per il gas) con spread fisso bloccato per 12 mesi dalla data di attivazione. Richiesta entro il 30/06/2026.</p>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

  <main class="section" style="padding: 80px 0 40px;">
    <div class="container">

      <!-- Filtro -->
      <div class="tab-bar" id="tab-bar">
        <button class="tab-btn active" data-filter="all">Tutte</button>
        <button class="tab-btn" data-filter="luce">Luce</button>
        <button class="tab-btn" data-filter="gas">Gas</button>
      </div>

      <!-- Griglia offerte -->
      <div id="offers-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 360px)); justify-content: center; gap: 24px;"></div>

      <p style="font-size: 13px; color: var(--muted); text-align: center; max-width: 900px; margin: 60px auto 0; line-height: 1.6;">
        * I prezzi indicati si riferiscono alla sola componente di vendita: PUN_INDEX_GME (luce) e PSV (gas) con l'aggiunta dello spread fisso indicato, valido per 12 mesi dalla data di attivazione. Al corrispettivo per il consumo si aggiunge il corrispettivo annuo fisso indicato in ciascuna offerta, oltre alle spese per il trasporto, la gestione del contatore e gli oneri di sistema. Offerte riservate a clienti domestici, richiesta entro il 30/06/2026, soggette alle condizioni contrattuali <?= $OPERATORE_ENERGETICO ?>. <?= $brand ?> è rivenditore indipendente autorizzato.
      </p>
    </div>
  </main>

  <!-- Glossary -->
  <section class="section glossary">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Capire il prezzo</span>
        <h2 class="section-title">Come funzionano <span class="underline">le tariffe</span></h2>
        <p class="section-sub"><?= $OPERATORE_ENERGETICO ?> offre tariffe variabili indicizzate al mercato all'ingrosso. Il prezzo finale è dato dal prezzo di mercato (PUN per la luce, PSV per il gas) più uno spread fisso definito nel contratto.</p>
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
          <p>Quota fissa aggiunta al prezzo di mercato, definita in contratto e bloccata per 12 mesi dalla data di attivazione.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><rect x="2" y="5" width="20" height="14" rx="2" stroke="currentColor" stroke-width="2"/><path d="M2 10h20" stroke="currentColor" stroke-width="2"/></svg></div>
          <h4>Corrispettivo annuo</h4>
          <p>Quota fissa e invariabile per tutta la durata dell'offerta, indipendente dai consumi, che si aggiunge al corrispettivo per il consumo.</p>
        </div>
      </div>
    </div>
  </section>

  <script>
    const ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    const ICON_BOLT = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_LOCK = '<svg viewBox="0 0 24 24" fill="none"><rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';

    const offers = [
      { id: 'family-luce-tls', category: 'luce', kind: 'luce', tipo: 'Luce', top: true,
        nome: 'FAMILY LUCE TLS', sub: 'Prezzo Variabile · Uso domestico · Bassa Tensione',
        prezzoRid: 'PUN + €0,055', unita: '€/kWh', prezzoBoll: null,
        note: 'Corrispettivo annuo: €624,00/POD. Spread fisso 0,055 €/kWh su F1, F2 e F3, perdite di rete incluse. Codice offerta: 025867ESVFL04XX000000426TLSEDPUN.',
        features: ['Indicizzato al PUN_INDEX_GME mensile', 'Spread fisso 0,055 €/kWh per 12 mesi', 'Stesso prezzo su F1, F2 e F3', 'Perdite di rete incluse', 'Riservata a utenze domestiche BT'] },
      { id: 'family-gas-tls', category: 'gas', kind: 'gas', tipo: 'Gas', top: true,
        nome: 'FAMILY GAS TLS', sub: 'Prezzo Variabile · Uso domestico',
        prezzoRid: 'PSV + €0,600', unita: '€/Smc', prezzoBoll: null,
        note: 'Corrispettivo annuo: €696,00/PdR. Spread fisso (M) 0,600 €/Smc per 12 mesi. Codice offerta: 025867GSVML04XX00000426APSVGDTLS.',
        features: ['Indicizzato al PSV mensile', 'Spread fisso 0,600 €/Smc per 12 mesi', 'Corrispettivo annuo €696,00', 'Riservata a utenze domestiche'] }
    ];

    function renderCard(o) {
      const warm = o.kind === 'gas';
      const styleVars = warm
        ? '--ribbon-color:#C2410C; --ribbon-bg:#FFF7E6; --ribbon-text:#9A3412; --ribbon-border:#FFE5B0;'
        : '';
      return `
      <article class="offer-card ${o.top ? 'featured' : ''}" data-category="${o.category}" style="${styleVars}">
        <div class="offer-ribbon">
          <span class="pill ${warm ? 'warm' : ''}">
            ${o.kind === 'luce' ? ICON_BOLT : ICON_FLAME}
            <span>${o.tipo}</span>
          </span>
          ${o.top ? `<span class="lock">${ICON_LOCK} Spread bloccato</span>` : ''}
        </div>
        <div class="offer-card-body">
          <div class="partner-badge">
            <img src="logo-domestika.png" alt="Domestika Energia" class="partner-logo">
            <span class="kind-badge">${o.tipo}</span>
          </div>
          <h3 class="offer-name">${o.nome}</h3>
          <p class="offer-type">${o.sub}</p>

          <div class="price-block">
            <div class="price-label">Corrispettivo per il consumo</div>
            <div class="price-main">${o.prezzoRid}<span style="font-size:14px; color:var(--muted); margin-left:4px; font-weight:600;">${o.unita}</span></div>
            ${o.prezzoBoll
              ? `<div class="price-alt">Bollettino: <b>${o.prezzoBoll}</b></div>`
              : `<div class="price-locked">${ICON_CHECK} Prezzo unico, spread garantito 12 mesi</div>`}
          </div>

          <ul class="offer-features">
            ${o.features.map(f => `<li>${ICON_CHECK}<span>${f}</span></li>`).join('')}
          </ul>

          <div class="offer-note">${o.note}</div>

          <button class="btn-primary" data-offer="${o.id}" data-name="${o.nome}">Richiedi informazioni
            <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
        </div>
      </article>`;
    }

    const grid = document.getElementById('offers-grid');

    function applyFilter(filter) {
      const filtered = filter === 'all' ? offers : offers.filter(o => o.category === filter);
      grid.innerHTML = filtered.map(renderCard).join('');
      grid.querySelectorAll('[data-offer]').forEach(btn => {
        btn.addEventListener('click', () => {
          const name = btn.dataset.name;
          window.location.href = 'contatti.php?offerta=' + encodeURIComponent(name) + '#contatto-form';
        });
      });
    }

    document.getElementById('tab-bar').addEventListener('click', e => {
      const btn = e.target.closest('.tab-btn');
      if (!btn) return;
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      applyFilter(btn.dataset.filter);
    });

    applyFilter('all');
  </script>

<?php include __DIR__ . '/footer.php'; ?>
