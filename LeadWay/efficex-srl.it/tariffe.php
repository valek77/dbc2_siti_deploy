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
      // --- OFFERTE LUCE ---
      { id: 'switch-luce-zero', category: 'luce', kind: 'luce', tipo: 'Tariffa Luce', top: true,
        nome: 'Switch Luce Zero Domestico', sub: 'Prezzo Variabile · Solo SDD & Bolletta Web',
        prezzoRid: 'PUN + €0,033000', unita: '€/kWh', prezzoBoll: 'Commercializzazione: €17,00/mese',
        note: 'Condizioni valide per 12 mesi dalla data di attivazione della fornitura.',
        features: ['Indicizzato al PUN mensile', 'Spread al consumo: 0,033000 €/kWh', 'Perdite di rete incluse', 'Quota fissa di commercializzazione: 204€/anno'] },
      
      { id: 'tris-luce-green', category: 'luce', kind: 'luce', tipo: 'Tariffa Luce', top: false,
        nome: 'Tris Luce Green', sub: 'Prezzo Variabile · Energia 100% Rinnovabile',
        prezzoRid: 'PUN + €0,049500', unita: '€/kWh', prezzoBoll: 'Commercializzazione: €38,15/mese',
        note: 'Bonus fedeltà di 15€ accreditato ogni 3 mesi (60€ all\'anno totali).',
        features: ['Indicizzato al PUN mensile', 'Spread al consumo: 0,049500 €/kWh', 'Bonus Fedeltà di 15€ ogni 3 mesi', 'Energia Verde certificata da Garanzia d\'Origine'] },
      
      { id: 'family-luce-green', category: 'luce', kind: 'luce', tipo: 'Tariffa Luce', top: false,
        nome: 'Family Luce Green', sub: 'Prezzo Variabile · Assistenza Casa Inclusa',
        prezzoRid: 'PUN + €0,049500', unita: '€/kWh', prezzoBoll: 'Commercializzazione: €33,15/mese',
        note: 'Include il servizio assistenza casa "Stai Sereno Luce" azzerato da relativo sconto.',
        features: ['Indicizzato al PUN mensile', 'Spread al consumo: 0,049500 €/kWh', 'Assistenza Impianti inclusa nel pacchetto', 'Sconto applicato mensilmente in bolletta'] },

      // --- OFFERTE GAS ---
      { id: 'gas-zero', category: 'gas', kind: 'gas', tipo: 'Tariffa Gas', top: true,
        nome: 'Gas Zero Domestico', sub: 'Prezzo Variabile · Ottimizzazione Costi',
        prezzoRid: 'PSV + €0,210000', unita: '€/Smc', prezzoBoll: 'Commercializzazione: €17,00/mese',
        note: 'Tariffa riservata ai clienti domestici con pagamento digitale tramite conto corrente.',
        features: ['Indicizzato al prezzo di mercato PSV', 'Spread al consumo: 0,210000 €/Smc', 'Quota fissa di commercializzazione: 204€/anno', 'Fatturazione digitale via e-mail'] },
      
      { id: 'tris-gas', category: 'gas', kind: 'gas', tipo: 'Tariffa Gas', top: false,
        nome: 'Tris Gas', sub: 'Prezzo Variabile · Più rimani, più risparmi',
        prezzoRid: 'PSV + €0,210000', unita: '€/Smc', prezzoBoll: 'Commercializzazione: €38,15/mese',
        note: 'Premia la tua permanenza con 15€ accreditati direttamente in bolletta ogni 3 mesi.',
        features: ['Indicizzato al prezzo di mercato PSV', 'Spread al consumo: 0,210000 €/Smc', 'Bonus fedeltà di 15€ ogni 3 mesi', 'Attivabile senza cambi di contatore o interruzioni'] },
      
      { id: 'family-gas', category: 'gas', kind: 'gas', tipo: 'Tariffa Gas', top: false,
        nome: 'Family Gas', sub: 'Prezzo Variabile · Protezione Impianto Domestico',
        prezzoRid: 'PSV + €0,210000', unita: '€/Smc', prezzoBoll: 'Commercializzazione: €33,15/mese',
        note: 'Include la polizza di assistenza tecnica "Stai Sereno Gas" completamente abbonata.',
        features: ['Indicizzato al prezzo di mercato PSV', 'Spread al consumo: 0,210000 €/Smc', 'Servizio Assistenza ai locali incluso', 'Sconto in fattura pari al costo del servizio'] }
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
            <div class="price-label">Spread sul consumo</div>
            <div class="price-main">${o.prezzoRid}<span style="font-size:14px; color:var(--muted); margin-left:4px; font-weight:600;">${o.unita}</span></div>
            <div class="price-alt"><b>${o.prezzoBoll}</b></div>
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
    <span class="eyebrow eyebrow-light"><span class="dot"></span> Offerte ufficiali <?= $brandName ?></span>
    <h1>Trova la tariffa <span class="accent">giusta per te</span></h1>
    <p>Scegli la massima convenienza per la tua casa. Tutti i nostri canoni sono indicizzati direttamente al prezzo del
      mercato all'ingrosso con spread chiari e costi fissi di commercializzazione trasparenti.</p>
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
      <button class="tab-btn" data-filter="luce">Tariffe Luce</button>
      <button class="tab-btn" data-filter="gas">Tariffe Gas</button>
    </div>

    <div id="offers-grid"
      style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 24px;"></div>

    <p
      style="font-size: 13px; color: var(--muted); text-align: center; max-width: 900px; margin: 60px auto 0; line-height: 1.6;">
      * I corrispettivi indicati fanno riferimento al prezzo di borsa all'ingrosso della componente energia (PUN) e
      della materia prima gas (PSV) espressi al netto delle imposte e dell'IVA. I contributi fissi e gli spread al
      consumo inseriti rimangono bloccati per 12 mesi dalla data di attivazione delle forniture. Offerte soggette a
      condizioni contrattuali <?= $brandName ?> S.r.l.
    </p>
  </div>
</main>

<section class="section glossary">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow"><span class="dot"></span> Capire il prezzo</span>
      <h2 class="section-title">Come funzionano <span class="accent">le tariffe</span></h2>
      <p class="section-sub"><?= $brandName ?> offre tariffe variabili indicizzate per farti risparmiare
        seguendo l'andamento reale del mercato. Il prezzo finale mensile è composto dall'indice di borsa più un piccolo
        spread al consumo e una quota fissa di commercializzazione.</p>
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
        <h4>Commercializzazione</h4>
        <p>Una quota mensile fissa indipendente dai volumi consumati, volta a coprire i costi fissi commerciali legati
          alla gestione burocratica e tecnica del tuo punto di fornitura.</p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>