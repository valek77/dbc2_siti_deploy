<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Scopri tutte le offerte ' . $OPERATORE['nome_marketing'] . ' disponibili tramite ' . $LANDING_PAGE['nome_portale'] . ': tariffe luce e gas per uso residenziale e professionale, con prezzi chiari e spread trasparenti.';
include __DIR__ . '/header.php';
?>

  <!-- Page hero -->
  <section class="page-hero">
    <div class="container">
      <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px; background: rgba(255,255,255,0.1); padding: 8px 16px; border-radius: 12px; width: fit-content;">
        <img src="logo-domestika.png" alt="<?= $OPERATORE['nome_marketing'] ?>" style="height: 28px; filter: brightness(0) invert(1);">
        <span style="color: #fff; font-weight: 600; font-size: 14px; letter-spacing: 0.05em; text-transform: uppercase;">Partner Ufficiale</span>
      </div>
      <h1>Trova la tariffa <span class="accent">giusta per te</span></h1>
      <p>Offerte Luce e Gas per uso domestico nel Mercato Libero. Prezzi indicizzati al mercato (PUN INDEX GME per la luce, PSV per il gas) con spread fisso per 12 mesi. Richiesta entro il 30/06/2026.</p>
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
      <div id="offers-grid" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 24px; max-width: 760px; margin: 0 auto;"></div>

      <p style="font-size: 13px; color: var(--muted); text-align: center; max-width: 900px; margin: 60px auto 0; line-height: 1.6;">
        * I prezzi indicati sono riferiti alle componenti energia (PUN INDEX GME) e gas (PSV) con l'aggiunta degli spread fissi indicati, validi per 12 mesi dalla data di attivazione. Al corrispettivo per il consumo si aggiunge il corrispettivo annuo indicato in ciascuna offerta. Pagamento tramite Bonifico Bancario, Bollettino Postale o Addebito su Conto (SDD). Richiesta entro il 30/06/2026. Offerte soggette a condizioni contrattuali <?= $OPERATORE['nome_legale'] ?>. <?= $brandName ?> è rivenditore indipendente autorizzato.
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
          <p>Quota fissa aggiunta al prezzo di mercato, definita in contratto e bloccata per 12 mesi dalla data di attivazione.</p>
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
    const ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    const ICON_BOLT = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_LOCK = '<svg viewBox="0 0 24 24" fill="none"><rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';

    const offers = [
      { id: 'family-luce-tls', category: 'luce', kind: 'luce', tipo: 'Luce Mercato Libero', top: true,
        nome: 'FAMILY LUCE TLS', sub: 'Mercato Libero · Uso domestico in Bassa Tensione',
        codice: '027274ESVFL04XX000000426TLSEDPUN',
        prezzoRid: 'PUN INDEX GME + €0,055', unita: '€/kWh', prezzoBoll: null,
        note: 'Corrispettivo annuo 624,00 €/POD/anno. Prezzi fissi per 12 mesi dall\'attivazione. Richiesta entro il 30/06/2026.',
        features: ['Prezzo unico F1·F2·F3: +0,055 €/kWh', 'Indicizzato al PUN INDEX GME mensile', 'Corrispettivo annuo fisso 624,00 €/POD', 'Perdite di rete incluse'] },
      { id: 'domestico-gas-tls', category: 'gas', kind: 'gas', tipo: 'Gas Mercato Libero', top: true,
        nome: 'DOMESTICO GAS TLS', sub: 'Mercato Libero · Uso domestico',
        codice: '027274GSVML04XX000000426IDXGGTLS',
        prezzoRid: 'PSV + €0,45', unita: '€/Smc', prezzoBoll: null,
        note: 'Corrispettivo annuo 672,00 €/PdR/anno. Prezzi validi 12 mesi dall\'attivazione. Richiesta entro il 30/06/2026.',
        features: ['Componente M fissa: +0,450 €/Smc', 'Indicizzato al PSV mensile', 'Corrispettivo annuo fisso 672,00 €/PdR', 'Attivazione rapida, zero burocrazia'] }
    ];

    function renderCard(o) {
      const warm = o.kind === 'gas';
      const styleVars = 'flex: 0 1 340px; max-width: 100%;' + (warm
        ? ' --ribbon-color:#C2410C; --ribbon-bg:#FFF7E6; --ribbon-text:#9A3412; --ribbon-border:#FFE5B0;'
        : '');
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
            <img src="logo-domestika.png" alt="<?= $OPERATORE['nome_marketing'] ?>" class="partner-logo">
            <span class="kind-badge">${o.tipo}</span>
          </div>
          <h3 class="offer-name">${o.nome}</h3>
          <p class="offer-type">${o.sub}</p>
          ${o.codice ? `<p class="offer-code" style="font-size:11px; color:var(--muted); letter-spacing:0.03em; margin:-4px 0 0; word-break:break-all;">Codice offerta: <b>${o.codice}</b></p>` : ''}

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

<?php include __DIR__ . '/footer.php'; ?>
