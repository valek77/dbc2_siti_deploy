<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Scopri tutte le offerte Gruppo Grimaldi per luce e gas per uso residenziale e professionale, con prezzi chiari e spread trasparenti.';
include __DIR__ . '/header.php';
?>

  <!-- Page hero -->
  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Offerte partner <?= $OPERATORE['nome_marketing'] ?></span>
      <h1>Trova la tariffa <span class="accent">giusta per te</span></h1>
      <p>Offerte per uso domestico e professionale. Il nostro fornitore partner è <?= $OPERATORE['nome_marketing'] ?>, che ti garantisce prezzi trasparenti e condizioni vantaggiose.</p>
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
        <button class="tab-btn" data-filter="gas-res">Gas Residenziale</button>
      </div>

      <!-- Griglia offerte -->
      <div id="offers-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 24px;"></div>

      <p style="font-size: 13px; color: var(--muted); text-align: center; max-width: 900px; margin: 60px auto 0; line-height: 1.6;">
        * I prezzi indicati sono riferiti alle componenti energia (PUN) e gas (PSV) con l'aggiunta degli spread o prezzi fissi indicati. Il fornitore partner è <?= $OPERATORE['nome_marketing'] ?>. Le offerte sono soggette alle condizioni contrattuali di <?= $OPERATORE['nome_marketing'] ?>.
      </p>
    </div>
  </main>

  <!-- Glossary -->
  <section class="section glossary">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Capire il prezzo</span>
        <h2 class="section-title">Come funzionano <span class="accent">le tariffe</span></h2>
        <p class="section-sub">Il fornitore partner <?= $OPERATORE['nome_marketing'] ?> offre tariffe variabili indicizzate al mercato all'ingrosso e tariffe a prezzo fisso. Il prezzo finale variabile è dato dal prezzo di mercato (PUN per la luce, PSV per il gas) più uno spread fisso.</p>
      </div>

      <div class="features-container">
        <div class="feature-card reveal">
          <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PUN (Luce)</h4>
          <p>Prezzo Unico Nazionale: la componente energia elettrica sul mercato all'ingrosso italiano, aggiornata ogni mese.</p>
        </div>
        <div class="feature-card reveal">
          <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PSV (Gas)</h4>
          <p>Punto di Scambio Virtuale: il prezzo di riferimento del gas naturale sul mercato italiano, aggiornato mensilmente.</p>
        </div>
        <div class="feature-card reveal">
          <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 14l4-4 4 4 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h4>Spread</h4>
          <p>Quota fissa aggiunta al prezzo di mercato, definita in contratto.</p>
        </div>
      </div>
    </div>
  </section>

<?php
$operatoreJs = json_encode($OPERATORE['nome_marketing']);
$pageScripts = <<<HTML
  <script>
    const OPERATORE_NOME = {$operatoreJs};
  </script>
HTML;
$pageScripts .= <<<'HTML'
  <script>
    const ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    const ICON_BOLT = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_LOCK = '<svg viewBox="0 0 24 24" fill="none"><rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';

    const offers = [
      { id: 'sinergy-luce-casa', category: 'luce-res', kind: 'luce', tipo: 'Luce Residenziale', top: true,
        nome: 'Prime Casa Luce', sub: 'Prezzo Variabile indicizzato PUN · Uso domestico',
        prezzoRid: 'PUN + €0,025', unita: '€/kWh', prezzoBoll: 'PUN + €0,025/kWh',
        note: 'Corrispettivo annuo fisso: 132€ (11€/mese)',
        features: ['Fornitore partner: ' + OPERATORE_NOME, 'Indicizzato al PUN mensile', 'Spread F1/F2/F3: 0,025 €/kWh', 'Sconto 1€/mese per bolletta web'] },
      { id: 'sinergy-luce-lavoro', category: 'luce-res', kind: 'luce', tipo: 'Luce Business', top: false,
        nome: 'B2C Luce', sub: 'Prezzo Fisso 12 mesi · Uso non domestico',
        prezzoRid: '0,1309', unita: '€/kWh', prezzoBoll: '0,1309 €/kWh',
        note: 'Commercializzazione 116€/anno + Oneri Amm. 24€/anno',
        features: ['Fornitore partner: ' + OPERATORE_NOME, 'Prezzo fisso per 12 mesi', 'Fascia F1/F2/F3 a 0,1309 €/kWh', 'Sconto 1€/mese per bolletta web'] },
      { id: 'sinergy-gas-casa', category: 'gas-res', kind: 'gas', tipo: 'Gas Residenziale', top: false,
        nome: OPERATORE_NOME + ' Gas Casa', sub: 'Prezzo Variabile · Uso domestico',
        prezzoRid: 'PSV + €0,12', unita: '€/Smc', prezzoBoll: 'PSV + €0,12/Smc',
        note: 'Attivazione e condizioni ' + OPERATORE_NOME,
        features: ['Fornitore partner: ' + OPERATORE_NOME, 'Indicizzato al PSV mensile', 'Bolletta web', 'Nessun intervento tecnico'] },
      { id: 'sinergy-gas-lavoro', category: 'gas-res', kind: 'gas', tipo: 'Gas Business', top: false,
        nome: OPERATORE_NOME + ' Gas Lavoro', sub: 'Prezzo Variabile · Uso non domestico',
        prezzoRid: 'PSV + €0,12', unita: '€/Smc', prezzoBoll: 'PSV + €0,12/Smc',
        note: 'Attivazione e condizioni ' + OPERATORE_NOME,
        features: ['Fornitore partner: ' + OPERATORE_NOME, 'Indicizzato al PSV mensile', 'Bolletta web', 'Per studi e piccole attività'] }
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
