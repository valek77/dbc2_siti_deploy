<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$metaDescription = 'Scopri tutte le offerte ' . $OPERATORE['nome_marketing'] . ' per luce e gas per uso residenziale e professionale, con prezzi chiari e spread trasparenti.';

// Nome operatore reso sicuro per l'uso dentro JavaScript (stringa JSON).
$operatoreJs = json_encode(html_entity_decode($OPERATORE['nome_marketing'], ENT_QUOTES, 'UTF-8'));

// Corpo dello script offerte: nowdoc (<<<'JS') per preservare i template
// literal ${...} senza che PHP provi a interpolarli. Il nome operatore è
// disponibile come costante JS `OP`, definita prima di questo blocco.
$offersJs = <<<'JS'
    const ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    const ICON_BOLT = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_GIFT = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>';

    const offers = [
      // --- PREZZO FISSO ---
      { id: 'piucontrollo-special-flat', category: 'fisso', tipo: 'Luce & Gas', top: true, badge: 'Consigliata',
        nome: 'PiùControllo Special Flat',
        sub: 'Scegli la nostra offerta a prezzo fisso: se sottoscrivi sul sito cliccando “Attiva Luce e Gas” otterrai il Bonus Digital di 60€!',
        bonus: 'Bonus Digital 60€',
        features: ['Prezzo Luce fisso per 12 mesi', 'Prezzo Gas fisso per 12 mesi', 'Monitoraggio dei consumi tramite app', 'Hera Fast Check Up e Diario dei Consumi inclusi', 'Bolletta mensile'] },

      // --- IBRIDE ---
      { id: 'hera-hybrid-special', category: 'ibrido', tipo: 'Luce & Gas', top: false,
        nome: 'Hera Hybrid Special',
        sub: 'Scegli l’offerta che unisce i vantaggi del prezzo fisso con quelli del prezzo variabile.',
        bonus: null,
        features: ['Prezzo Luce stabile per 2 anni', 'Prezzo Gas stabile per 2 anni', 'Monitoraggio dei consumi tramite app', 'Bolletta mensile e Diario dei Consumi'] },

      // --- PREZZO VARIABILE ---
      { id: 'piucontrollo-special-active', category: 'variabile', tipo: 'Luce & Gas', top: false,
        nome: 'Più Controllo Special Active',
        sub: 'Monitora ogni giorno i tuoi consumi e potrai diluire la spesa!',
        bonus: 'Bonus Digital 30€ per servizio',
        features: ['Bonus Digital di 30€ per ogni servizio', 'Prezzi luce e gas all’ingrosso', 'Monitoraggio dei consumi tramite app', 'Hera Fast Check Up e Diario dei Consumi inclusi', 'Bolletta mensile'] },

      { id: 'hera-hybrid-extra', category: 'ibrido', tipo: 'Luce & Gas', top: false, badge: 'Tutele Graduali',
        nome: 'Hera Hybrid Extra',
        sub: 'L’offerta riservata ai clienti provenienti dal Servizio a Tutele Graduali.',
        bonus: 'Bonus Hera Hybrid Extra',
        features: ['Prezzi validi 24 mesi', 'Bonus Hera Hybrid Extra', 'Diario dei Consumi incluso'] },

      // --- PLACET ---
      { id: 'hera-placet-variabile', category: 'placet', tipo: 'Luce & Gas', top: false,
        nome: 'Hera Placet Variabile',
        sub: 'L’offerta con struttura di prezzo e condizioni contrattuali definite dall’Autorità.',
        bonus: null,
        features: [],
        note: 'Struttura di prezzo e condizioni definite dall’Autorità di Regolazione (ARERA).' },

      { id: 'hera-placet-fissa', category: 'placet', tipo: 'Luce & Gas', top: false,
        nome: 'Hera Placet Fissa',
        sub: 'L’offerta con struttura di prezzo e condizioni contrattuali definite dall’Autorità.',
        bonus: null,
        features: [],
        note: 'Struttura di prezzo e condizioni definite dall’Autorità di Regolazione (ARERA).' }
    ];

    function renderCard(o) {
      const feats = o.features || [];
      return `
      <article class="offer-card ${o.top ? 'featured' : ''}" data-category="${o.category}">
        <div class="offer-ribbon">
          <span class="pill">${ICON_BOLT}${ICON_FLAME}<span>${o.tipo}</span></span>
          ${o.badge ? `<span class="lock">${ICON_GIFT} ${o.badge}</span>` : ''}
        </div>
        <div class="offer-card-body">
          <h3 class="offer-name">${o.nome}</h3>
          <p class="offer-type">${o.sub}</p>

          ${o.bonus ? `
          <div class="price-block">
            <div class="price-label">Vantaggio incluso</div>
            <div class="price-main" style="font-size:22px;">${o.bonus}</div>
          </div>` : ''}

          ${feats.length ? `
          <ul class="offer-features">
            ${feats.map(f => `<li>${ICON_CHECK}<span>${f}</span></li>`).join('')}
          </ul>` : ''}

          ${o.note ? `<div class="offer-note">${o.note}</div>` : ''}

          <button class="btn-primary" data-offer="${o.id}" data-name="${o.nome}">Scopri di più
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
    <span class="eyebrow eyebrow-light"><span class="dot"></span> Offerte ufficiali <?= $brandName ?></span>
    <h1>Trova la tariffa <span class="accent">giusta per te</span></h1>
    <p>Offerte luce e gas a prezzo fisso, variabile o ibrido. Attiva online e approfitta dei Bonus Digital dedicati, con
      monitoraggio dei consumi tramite app e Diario dei Consumi inclusi.</p>
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
      <button class="tab-btn" data-filter="fisso">Prezzo Fisso</button>
      <button class="tab-btn" data-filter="variabile">Prezzo Variabile</button>
      <button class="tab-btn" data-filter="ibrido">Ibride</button>
      <button class="tab-btn" data-filter="placet">Placet</button>
    </div>

    <div id="offers-grid"
      style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 24px;"></div>

    <p
      style="font-size: 13px; color: var(--muted); text-align: center; max-width: 900px; margin: 60px auto 0; line-height: 1.6;">
      * Le offerte e i relativi vantaggi (Bonus Digital, durata dei prezzi, servizi inclusi) sono soggetti alle
      condizioni contrattuali <?= $brandName ?> S.r.l. e possono variare in base alla disponibilità e al profilo del
      cliente. Le offerte PLACET hanno struttura di prezzo e condizioni contrattuali definite dall'Autorità di
      Regolazione per Energia Reti e Ambiente (ARERA).
    </p>
  </div>
</main>

<section class="section glossary">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow"><span class="dot"></span> Capire il prezzo</span>
      <h2 class="section-title">Come funzionano <span class="accent">le tariffe</span></h2>
      <p class="section-sub">Le nostre offerte luce e gas si dividono in tre famiglie — prezzo fisso, prezzo variabile e
        Placet — così puoi scegliere la formula più adatta al tuo profilo di consumo e al livello di protezione che
        cerchi.</p>
    </div>

    <div class="features-container">
      <div class="feature-card reveal">
        <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none">
            <rect x="4" y="10" width="16" height="11" rx="2" stroke="currentColor" stroke-width="2" />
            <path d="M8 10V7a4 4 0 0 1 8 0v3" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
          </svg></div>
        <h4>Prezzo Fisso</h4>
        <p>Con le offerte a prezzo fisso il costo di luce e gas resta bloccato per tutta la durata indicata (ad esempio
          12 o 24 mesi), al riparo dalle oscillazioni del mercato: sai sempre quanto paghi.</p>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none">
            <path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            <path d="M7 14l4-4 4 4 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg></div>
        <h4>Prezzo Variabile</h4>
        <p>Con il prezzo variabile segui l'andamento del mercato all'ingrosso: paghi in base ai prezzi correnti
          dell'energia e, monitorando i consumi tramite app, puoi diluire e ottimizzare la spesa.</p>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none">
            <path d="M6 2h9l5 5v15H6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
            <path d="M14 2v6h6" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
            <path d="M9 13h6M9 17h6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
          </svg></div>
        <h4>Offerte Placet</h4>
        <p>Le offerte PLACET hanno struttura di prezzo e condizioni contrattuali definite dall'Autorità (ARERA), nelle
          varianti a prezzo fisso e variabile: massima trasparenza e piena confrontabilità tra fornitori.</p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>