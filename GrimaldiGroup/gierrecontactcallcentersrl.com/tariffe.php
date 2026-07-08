<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Scopri tutte le offerte ' . $OPERATORE['nome_marketing'] . ' disponibili tramite '
    . ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : 'GR Contact')
    . ': tariffe luce e gas per uso residenziale e professionale, con prezzi chiari e spread trasparenti.';
include __DIR__ . '/header.php';
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

      <!-- Filtro -->
      <div class="tab-bar" id="tab-bar">
        <button class="tab-btn active" data-filter="all">Tutte</button>
        <button class="tab-btn" data-filter="luce-res">Luce Residenziale</button>
        <button class="tab-btn" data-filter="luce-placet">Luce PLACET</button>
        <button class="tab-btn" data-filter="gas-res">Gas Residenziale</button>
        <button class="tab-btn" data-filter="gas-placet">Gas PLACET</button>
      </div>

      <!-- Griglia offerte -->
      <div id="offers-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 24px;"></div>

      <p style="font-size: 13px; color: var(--muted); text-align: center; max-width: 900px; margin: 60px auto 0; line-height: 1.6;">
        * I prezzi indicati sono riferiti alle componenti energia (PUN) e gas (PSV) con l'aggiunta degli spread indicati. Contributo di attivazione €30,00, scontato per permanenza minima di 6 mesi. Offerte soggette a condizioni contrattuali <?= $OPERATORE['nome_legale'] ?>. <?= $brandName ?> è rivenditore indipendente autorizzato.
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
          <p>Quota fissa aggiunta al prezzo di mercato, definita in contratto. Con PLACET è bloccata per 12 mesi.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><rect x="2" y="5" width="20" height="14" rx="2" stroke="currentColor" stroke-width="2"/><path d="M2 10h20" stroke="currentColor" stroke-width="2"/></svg></div>
          <h4>RID vs Bollettino</h4>
          <p>Con domiciliazione bancaria (RID) hai lo spread più basso. Con bollettino si applica uno spread maggiorato.</p>
        </div>
      </div>
    </div>
  </section>

  <script>
    window.OPERATOR_LOGO = <?= json_encode($OPERATORE['logo_url']) ?>;
    window.OPERATOR_NAME = <?= json_encode($OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale']) ?>;
  </script>

<?php
$pageScripts = <<<'HTML'
  <script>
    const ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    const ICON_BOLT = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_LOCK = '<svg viewBox="0 0 24 24" fill="none"><rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';

    const offers = [
      { id: 'new-switch-luce-casa', category: 'luce-res', kind: 'luce', tipo: 'Luce Residenziale', top: false,
        nome: 'NEW SWITCH LUCE CASA', sub: 'Prezzo Variabile · Uso domestico',
        prezzoRid: 'PUN + €0,03', unita: '€/kWh', prezzoBoll: 'PUN + €0,05/kWh',
        note: 'Attivazione €30,00 scontata con permanenza minima 6 mesi',
        features: ['Indicizzato al PUN mensile', 'Con RID: spread €0,03/kWh', 'Con Bollettino: spread €0,05/kWh', 'Nessun intervento tecnico'] },
      { id: 'new-switch-luce-lavoro', category: 'luce-res', kind: 'luce', tipo: 'Luce Residenziale', top: false,
        nome: 'NEW SWITCH LUCE LAVORO', sub: 'Prezzo Variabile · Uso non domestico',
        prezzoRid: 'PUN + €0,03', unita: '€/kWh', prezzoBoll: 'PUN + €0,05/kWh',
        note: 'Attivazione €30,00 scontata con permanenza minima 6 mesi',
        features: ['Indicizzato al PUN mensile', 'Con RID: spread €0,03/kWh', 'Con Bollettino: spread €0,05/kWh', 'Ideale per piccoli uffici e studi'] },
      { id: 'happy-switch-placet-luce-lavoro', category: 'luce-placet', kind: 'luce', tipo: 'Luce PLACET', top: true,
        nome: 'HAPPY SWITCH PLACET LUCE LAVORO', sub: 'Spread bloccato 12 mesi · Non domestico',
        prezzoRid: 'PUN + €0,18', unita: '€/kWh', prezzoBoll: null,
        note: 'Attivazione €30,00 · Spread garantito per 12 mesi',
        features: ['Spread fisso bloccato per 12 mesi', 'PUN + €0,18/kWh (unica modalità)', 'Maggiore certezza di spesa', 'Attivazione €30,00'] },
      { id: 'happy-switch-placet-luce-casa', category: 'luce-placet', kind: 'luce', tipo: 'Luce PLACET', top: true,
        nome: 'HAPPY SWITCH PLACET LUCE CASA', sub: 'Spread bloccato 12 mesi · Uso domestico',
        prezzoRid: 'PUN + €0,18', unita: '€/kWh', prezzoBoll: null,
        note: 'Attivazione €30,00 · Spread garantito per 12 mesi',
        features: ['Spread fisso bloccato per 12 mesi', 'PUN + €0,18/kWh (unica modalità)', 'Protezione dalle oscillazioni di mercato', 'Attivazione €30,00'] },
      { id: 'new-switch-gas-casa', category: 'gas-res', kind: 'gas', tipo: 'Gas Residenziale', top: false,
        nome: 'NEW SWITCH GAS CASA', sub: 'Prezzo Variabile · Uso domestico',
        prezzoRid: 'PSV + €0,12', unita: '€/Smc', prezzoBoll: 'PSV + €0,18/Smc',
        note: 'Attivazione €30,00 scontata con permanenza minima 6 mesi',
        features: ['Indicizzato al PSV mensile', 'Con RID: spread €0,12/Smc', 'Con Bollettino: spread €0,18/Smc', 'Nessun intervento tecnico'] },
      { id: 'new-switch-gas-lavoro', category: 'gas-res', kind: 'gas', tipo: 'Gas Residenziale', top: false,
        nome: 'NEW SWITCH GAS LAVORO', sub: 'Prezzo Variabile · Uso non domestico',
        prezzoRid: 'PSV + €0,12', unita: '€/Smc', prezzoBoll: 'PSV + €0,18/Smc',
        note: 'Attivazione €30,00 scontata con permanenza minima 6 mesi',
        features: ['Indicizzato al PSV mensile', 'Con RID: spread €0,12/Smc', 'Con Bollettino: spread €0,18/Smc', 'Per studi professionali e piccole attività'] },
      { id: 'happy-switch-placet-gas-casa', category: 'gas-placet', kind: 'gas', tipo: 'Gas PLACET', top: true,
        nome: 'HAPPY SWITCH PLACET GAS CASA', sub: 'Spread bloccato 12 mesi · Uso domestico',
        prezzoRid: 'PSV + €0,70', unita: '€/Smc', prezzoBoll: null,
        note: 'Attivazione €30,00 · Spread garantito per 12 mesi',
        features: ['Spread fisso bloccato per 12 mesi', 'PSV + €0,70/Smc (unica modalità)', 'Maggiore prevedibilità dei costi', 'Attivazione €30,00'] },
      { id: 'happy-switch-placet-gas-lavoro', category: 'gas-placet', kind: 'gas', tipo: 'Gas PLACET', top: true,
        nome: 'HAPPY SWITCH PLACET GAS LAVORO', sub: 'Spread bloccato 12 mesi · Non domestico',
        prezzoRid: 'PSV + €0,70', unita: '€/Smc', prezzoBoll: null,
        note: 'Attivazione €30,00 · Spread garantito per 12 mesi',
        features: ['Spread fisso bloccato per 12 mesi', 'PSV + €0,70/Smc (unica modalità)', 'Protezione dalle oscillazioni di mercato', 'Attivazione €30,00'] }
    ];

    function renderCard(o) {
      const warm = o.kind === 'gas';
      const styleVars = warm
        ? '--ribbon-color:#0C3A63; --ribbon-bg:#E3F1FC; --ribbon-text:#0C3A63; --ribbon-border:#C7E3F8;'
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
          ${window.OPERATOR_LOGO ? `<div class="offer-operator"><span>Fornitore</span><img src="${window.OPERATOR_LOGO}" alt="${window.OPERATOR_NAME}" loading="lazy"></div>` : ''}
          <h3 class="offer-name">${o.nome}</h3>
          <p class="offer-type">${o.sub}</p>

          <div class="price-block">
            <div class="price-label">Prezzo energia · con RID</div>
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
HTML;
include __DIR__ . '/footer.php';
?>
