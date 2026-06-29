<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$metaDescription = 'Scopri tutte le offerte ' . $OPERATORE_ENERGETICO . ' per luce e gas per uso residenziale e professionale, con prezzi chiari e spread trasparenti.';

// Nome operatore reso sicuro per l'uso dentro JavaScript (stringa JSON).
$operatoreJs = json_encode(html_entity_decode($OPERATORE_ENERGETICO, ENT_QUOTES, 'UTF-8'));

// Corpo dello script offerte: nowdoc (<<<'JS') per preservare i template
// literal ${...} senza che PHP provi a interpolarli. Il nome operatore è
// disponibile come costante JS `OP`, definita prima di questo blocco.
$offersJs = <<<'JS'
    const ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    const ICON_BOLT = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_GIFT = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>';

    const offers = [
      // --- LUCE RESIDENZIALE ---
      { id: 'new-switch-luce-casa', category: 'luce-res', kind: 'luce', tipo: 'Luce Residenziale', top: false,
        nome: 'NEW SWITCH LUCE CASA', sub: 'Prezzo Variabile · Uso domestico',
        prezzoRid: 'PUN + €0,03', unita: '€/kWh', prezzoBoll: 'Bollettino: PUN + €0,05/kWh',
        note: 'Contributo attivazione €30,00 — scontato con 6 mesi di permanenza.',
        features: ['Indicizzato al PUN mensile', 'RID: spread €0,03/kWh', 'Bollettino: spread €0,05/kWh', 'Nessun intervento tecnico'] },

      { id: 'new-switch-luce-lavoro', category: 'luce-res', kind: 'luce', tipo: 'Luce Residenziale', top: false,
        nome: 'NEW SWITCH LUCE LAVORO', sub: 'Prezzo Variabile · Non domestico',
        prezzoRid: 'PUN + €0,03', unita: '€/kWh', prezzoBoll: 'Bollettino: PUN + €0,05/kWh',
        note: 'Contributo attivazione €30,00 — scontato con 6 mesi di permanenza.',
        features: ['Indicizzato al PUN mensile', 'RID: spread €0,03/kWh', 'Bollettino: spread €0,05/kWh', 'Per uffici e studi professionali'] },

      // --- LUCE PLACET ---
      { id: 'happy-placet-luce-lavoro', category: 'luce-placet', kind: 'luce', tipo: 'Luce PLACET', top: true,
        nome: 'HAPPY SWITCH PLACET LUCE LAVORO', sub: 'Spread Bloccato 12 mesi · Non domestico',
        prezzoRid: 'PUN + €0,18', unita: '€/kWh', prezzoBoll: null,
        note: 'Contributo attivazione €30,00 · Spread garantito per 12 mesi.',
        features: ['Spread fisso bloccato 12 mesi', 'PUN + €0,18/kWh (unica modalità)', 'Maggiore certezza di spesa', 'Attivazione €30,00'] },

      { id: 'happy-placet-luce-casa', category: 'luce-placet', kind: 'luce', tipo: 'Luce PLACET', top: true,
        nome: 'HAPPY SWITCH PLACET LUCE CASA', sub: 'Spread Bloccato 12 mesi · Uso domestico',
        prezzoRid: 'PUN + €0,18', unita: '€/kWh', prezzoBoll: null,
        note: 'Contributo attivazione €30,00 · Spread garantito per 12 mesi.',
        features: ['Spread fisso bloccato 12 mesi', 'PUN + €0,18/kWh (unica modalità)', 'Protezione oscillazioni mercato', 'Attivazione €30,00'] },

      // --- GAS RESIDENZIALE ---
      { id: 'new-switch-gas-casa', category: 'gas-res', kind: 'gas', tipo: 'Gas Residenziale', top: false,
        nome: 'NEW SWITCH GAS CASA', sub: 'Prezzo Variabile · Uso domestico',
        prezzoRid: 'PSV + €0,12', unita: '€/Smc', prezzoBoll: 'Bollettino: PSV + €0,18/Smc',
        note: 'Contributo attivazione €30,00 — scontato con 6 mesi di permanenza.',
        features: ['Indicizzato al PSV mensile', 'RID: spread €0,12/Smc', 'Bollettino: spread €0,18/Smc', 'Nessun intervento tecnico'] },

      { id: 'new-switch-gas-lavoro', category: 'gas-res', kind: 'gas', tipo: 'Gas Residenziale', top: false,
        nome: 'NEW SWITCH GAS LAVORO', sub: 'Prezzo Variabile · Non domestico',
        prezzoRid: 'PSV + €0,12', unita: '€/Smc', prezzoBoll: 'Bollettino: PSV + €0,18/Smc',
        note: 'Contributo attivazione €30,00 — scontato con 6 mesi di permanenza.',
        features: ['Indicizzato al PSV mensile', 'RID: spread €0,12/Smc', 'Bollettino: spread €0,18/Smc', 'Attività e studi professionali'] },

      // --- GAS PLACET ---
      { id: 'happy-placet-gas-casa', category: 'gas-placet', kind: 'gas', tipo: 'Gas PLACET', top: true,
        nome: 'HAPPY SWITCH PLACET GAS CASA', sub: 'Spread Bloccato 12 mesi · Uso domestico',
        prezzoRid: 'PSV + €0,70', unita: '€/Smc', prezzoBoll: null,
        note: 'Contributo attivazione €30,00 · Spread garantito per 12 mesi.',
        features: ['Spread fisso bloccato 12 mesi', 'PSV + €0,70/Smc (unica modalità)', 'Prevedibilità dei costi', 'Attivazione €30,00'] },

      { id: 'happy-placet-gas-lavoro', category: 'gas-placet', kind: 'gas', tipo: 'Gas PLACET', top: true,
        nome: 'HAPPY SWITCH PLACET GAS LAVORO', sub: 'Spread Bloccato 12 mesi · Non domestico',
        prezzoRid: 'PSV + €0,70', unita: '€/Smc', prezzoBoll: null,
        note: 'Contributo attivazione €30,00 · Spread garantito per 12 mesi.',
        features: ['Spread fisso bloccato 12 mesi', 'PSV + €0,70/Smc (unica modalità)', 'Protezione oscillazioni mercato', 'Attivazione €30,00'] }
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
          ${o.top ? `<span class="lock">${ICON_GIFT} Consigliata</span>` : ''}
        </div>
        <div class="offer-card-body">
          <h3 class="offer-name">${o.nome}</h3>
          <p class="offer-type">${o.sub}</p>

          <div class="price-block">
            <div class="price-label">Prezzo energia</div>
            <div class="price-main">${o.prezzoRid}<span style="font-size:14px; color:var(--muted); margin-left:4px; font-weight:600;">${o.unita}</span></div>
            ${o.prezzoBoll ? `<div class="price-alt"><b>${o.prezzoBoll}</b></div>` : `<div class="price-alt" style="color:var(--primary); font-weight:700;">✓ Prezzo unico, spread garantito</div>`}
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
JS;

$pageScripts = "  <script>\n    const OP = {$operatoreJs};\n" . $offersJs . "\n  </script>";

include __DIR__ . '/header.php';
?>

<section class="page-hero">
  <div class="container">
    <span class="eyebrow eyebrow-light"><span class="dot"></span> Offerte ufficiali <?= $OPERATORE_ENERGETICO ?></span>
    <h1>Trova la tariffa <span class="accent">giusta per te</span></h1>
    <p>Offerte per uso domestico e professionale, indicizzate al prezzo del mercato all'ingrosso con spread fisso e
      chiaro. Contributo di attivazione €30,00, scontato con 6 mesi di permanenza.</p>
  </div>
  <div class="wave">
    <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
      <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z" />
    </svg>
  </div>
</section>

<main class="section" style="padding: 80px 0 40px;">
  <div class="container">

    <div class="tab-bar" id="tab-bar">
      <button class="tab-btn active" data-filter="all">Tutte le Offerte</button>
      <button class="tab-btn" data-filter="luce-res">Luce Residenziale</button>
      <button class="tab-btn" data-filter="luce-placet">Luce PLACET</button>
      <button class="tab-btn" data-filter="gas-res">Gas Residenziale</button>
      <button class="tab-btn" data-filter="gas-placet">Gas PLACET</button>
    </div>

    <div id="offers-grid"
      style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 24px;"></div>

    <p
      style="font-size: 13px; color: var(--muted); text-align: center; max-width: 900px; margin: 60px auto 0; line-height: 1.6;">
      * I prezzi indicati si riferiscono alle componenti energia (PUN) e gas (PSV), espresse al netto delle imposte e
      dell'IVA, con l'aggiunta degli spread indicati. Contributo di attivazione €30,00, scontato con permanenza minima
      di 6 mesi. Con domiciliazione bancaria (RID) si applica lo spread più basso; con bollettino lo spread è
      maggiorato. Offerte soggette a condizioni contrattuali <?= $OPERATORE_ENERGETICO ?> S.r.l.
    </p>
  </div>
</main>

<section class="section glossary">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow"><span class="dot"></span> Capire il prezzo</span>
      <h2 class="section-title">Come funzionano <span class="accent">le tariffe</span></h2>
      <p class="section-sub"><?= $OPERATORE_ENERGETICO ?> offre tariffe variabili indicizzate per farti risparmiare
        seguendo l'andamento reale del mercato. Il prezzo finale è dato dall'indice di borsa (PUN o PSV) più uno spread
        fisso definito in contratto, con il vantaggio dello spread ridotto in caso di domiciliazione bancaria (RID).</p>
    </div>

    <div class="features-container">
      <div class="feature-card reveal">
        <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none">
            <path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
          </svg></div>
        <h4>PUN (Luce)</h4>
        <p>Prezzo Unico Nazionale: esprime il costo reale di riferimento dell'energia elettrica all'ingrosso in Italia,
          aggiornato su base mensile dal Gestore dei Mercati Energetici (GME).</p>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none">
            <path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor"
              stroke-width="2" stroke-linejoin="round" />
          </svg></div>
        <h4>PSV (Gas)</h4>
        <p>Punto di Scambio Virtuale: rappresenta il principale indice d'acquisto all'ingrosso per il mercato del gas
          naturale in Italia ed è usato come riferimento di calcolo trasparente.</p>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none">
            <path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            <path d="M7 14l4-4 4 4 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg></div>
        <h4>Spread &amp; RID</h4>
        <p>Lo spread è la quota fissa aggiunta al prezzo di mercato, definita in contratto. Con domiciliazione bancaria
          (RID) hai lo spread più basso; con bollettino lo spread è maggiorato. Con le offerte PLACET resta bloccato
          per 12 mesi.</p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>