<?php
require __DIR__ . '/_config.php';
$brandName = $LANDING_PAGE['nome_portale'] !== ''
    ? $LANDING_PAGE['nome_portale']
    : ($LANDING_PAGE['titolo'] !== ''
        ? $LANDING_PAGE['titolo']
        : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'GR Contact'));
$pageTitle = 'Offerte Luce e Gas';
$pageDescription = 'Tutte le offerte Switch Luce Gas disponibili tramite ' . $brandName . '. Tariffe luce e gas per uso domestico e professionale con prezzi indicizzati al mercato.';
include __DIR__ . '/header.php';
?>

  <!-- PAGE HERO — foto parco eolico -->
  <section class="page-hero">
    <div class="photo-bg" style="background-image: url('https://images.unsplash.com/photo-1466611653911-95081537e5b7?auto=format&fit=crop&w=1600&q=80');"></div>
    <div class="photo-overlay"></div>
    <div class="inner">
      <span class="eyebrow" style="color:var(--primary-light);"><span class="dot" style="background:var(--primary-light);"></span> Offerte <?= $OPERATORE['nome_marketing'] ?></span>
      <h1>Trova la tariffa <span class="hl">giusta per te</span></h1>
      <p>Offerte per uso domestico e professionale. Prezzi indicizzati al mercato con spread fisso. Contributo di attivazione €30,00 (scontato con 6 mesi di permanenza).</p>
    </div>
  </section>

  <!-- OFFERS -->
  <section class="section">
    <div class="container">

      <div class="tab-bar" id="tab-bar">
        <button class="tab-btn active" data-filter="all">Tutte le offerte</button>
        <button class="tab-btn" data-filter="luce-res">⚡ Luce Residenziale</button>
        <button class="tab-btn" data-filter="luce-placet">⚡ Luce PLACET</button>
        <button class="tab-btn" data-filter="gas-res">🔥 Gas Residenziale</button>
        <button class="tab-btn" data-filter="gas-placet">🔥 Gas PLACET</button>
      </div>

      <div class="offers-grid" id="offers-grid"></div>

      <p style="font-size:13px; color:var(--muted-2); text-align:center; max-width:900px; margin:56px auto 0; line-height:1.7;">
        * I prezzi indicati si riferiscono alle componenti energia (PUN) e gas (PSV) con l'aggiunta degli spread indicati. Contributo di attivazione €30,00, scontato con permanenza minima di 6 mesi. Offerte soggette a condizioni contrattuali <?= $OPERATORE['nome_legale'] ?>. <?= $brandName ?> è rivenditore indipendente autorizzato.
      </p>
    </div>
  </section>

  <!-- GLOSSARIO — dark section -->
  <section class="dark-section" style="padding: var(--section) 0;">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow" style="color:var(--primary-light); justify-content:center;"><span class="dot" style="background:var(--primary-light);"></span> Capire il prezzo</span>
        <h2 class="section-title" style="color:#fff; text-align:center;">Come funzionano<br><span style="color:var(--primary-light);">le tariffe</span></h2>
        <p class="section-sub" style="margin:0 auto 56px; text-align:center;"><?= $OPERATORE['nome_marketing'] ?> offre tariffe variabili indicizzate al mercato all'ingrosso. Il prezzo finale è dato dal prezzo di mercato più uno spread fisso definito nel contratto.</p>
      </div>
      <div class="glossary-grid">
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4.09 12.11A1 1 0 005 14h7l-1 8 8.91-10.11A1 1 0 0019 10h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PUN (Luce)</h4>
          <p>Prezzo Unico Nazionale: il costo dell'energia elettrica sul mercato all'ingrosso italiano, aggiornato ogni mese.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PSV (Gas)</h4>
          <p>Punto di Scambio Virtuale: il prezzo di riferimento del gas naturale sul mercato italiano, aggiornato mensilmente.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 14l4-4 4 4 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h4>Spread</h4>
          <p>Quota fissa aggiunta al prezzo di mercato, definita in contratto. Con offerte PLACET lo spread è bloccato per 12 mesi.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><rect x="2" y="5" width="20" height="14" rx="2" stroke="currentColor" stroke-width="2"/><path d="M2 10h20" stroke="currentColor" stroke-width="2"/></svg></div>
          <h4>RID vs Bollettino</h4>
          <p>Con domiciliazione bancaria (RID) hai lo spread più basso. Con bollettino postale o bancario si applica uno spread maggiorato.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section" style="text-align:center;">
    <div class="container">
      <h2 class="section-title" style="margin-bottom:16px;">Non sai quale offerta fa per te?</h2>
      <p style="font-size:18px; color:var(--muted); max-width:560px; margin:0 auto 36px; line-height:1.7;">Contattaci: analizziamo la tua bolletta attuale e ti consigliamo la tariffa più adatta gratuitamente.</p>
      <a href="contatti.php" class="btn-primary" style="font-size:17px; padding:16px 44px;">Consulenza gratuita →</a>
    </div>
  </section>

  <script>
    window.OPERATOR_LOGO = <?= json_encode($OPERATORE['logo_url']) ?>;
    window.OPERATOR_NAME = <?= json_encode($OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale']) ?>;
  </script>

<?php
$pageScripts = <<<'HTML'
  <script>
    const offers = [
      { id:'nlc', cat:'luce-res', ribbon:'luce-res', tag:'⚡ Luce Residenziale', top:false,
        nome:'NEW SWITCH LUCE CASA', tipo:'Prezzo Variabile · Uso domestico',
        rid:'PUN + €0,03/kWh', boll:'PUN + €0,05/kWh',
        note:'Contributo attivazione €30,00 — scontato con 6 mesi di permanenza',
        feats:['Indicizzato al PUN mensile','RID: spread €0,03/kWh','Bollettino: spread €0,05/kWh','Nessun intervento tecnico'] },
      { id:'nll', cat:'luce-res', ribbon:'luce-res', tag:'⚡ Luce Residenziale', top:false,
        nome:'NEW SWITCH LUCE LAVORO', tipo:'Prezzo Variabile · Non domestico',
        rid:'PUN + €0,03/kWh', boll:'PUN + €0,05/kWh',
        note:'Contributo attivazione €30,00 — scontato con 6 mesi di permanenza',
        feats:['Indicizzato al PUN mensile','RID: spread €0,03/kWh','Bollettino: spread €0,05/kWh','Per uffici e studi professionali'] },
      { id:'hpll', cat:'luce-placet', ribbon:'luce-placet', tag:'⚡ Luce PLACET', top:true,
        nome:'HAPPY SWITCH PLACET LUCE LAVORO', tipo:'Spread Bloccato 12 mesi · Non domestico',
        rid:'PUN + €0,18/kWh', boll:null,
        note:'Contributo attivazione €30,00 · Spread garantito per 12 mesi',
        feats:['Spread fisso bloccato 12 mesi','PUN + €0,18/kWh (unica modalità)','Maggiore certezza di spesa','Attivazione €30,00'] },
      { id:'hplc', cat:'luce-placet', ribbon:'luce-placet', tag:'⚡ Luce PLACET', top:true,
        nome:'HAPPY SWITCH PLACET LUCE CASA', tipo:'Spread Bloccato 12 mesi · Uso domestico',
        rid:'PUN + €0,18/kWh', boll:null,
        note:'Contributo attivazione €30,00 · Spread garantito per 12 mesi',
        feats:['Spread fisso bloccato 12 mesi','PUN + €0,18/kWh (unica modalità)','Protezione oscillazioni mercato','Attivazione €30,00'] },
      { id:'ngc', cat:'gas-res', ribbon:'gas-res', tag:'🔥 Gas Residenziale', top:false,
        nome:'NEW SWITCH GAS CASA', tipo:'Prezzo Variabile · Uso domestico',
        rid:'PSV + €0,12/Smc', boll:'PSV + €0,18/Smc',
        note:'Contributo attivazione €30,00 — scontato con 6 mesi di permanenza',
        feats:['Indicizzato al PSV mensile','RID: spread €0,12/Smc','Bollettino: spread €0,18/Smc','Nessun intervento tecnico'] },
      { id:'ngl', cat:'gas-res', ribbon:'gas-res', tag:'🔥 Gas Residenziale', top:false,
        nome:'NEW SWITCH GAS LAVORO', tipo:'Prezzo Variabile · Non domestico',
        rid:'PSV + €0,12/Smc', boll:'PSV + €0,18/Smc',
        note:'Contributo attivazione €30,00 — scontato con 6 mesi di permanenza',
        feats:['Indicizzato al PSV mensile','RID: spread €0,12/Smc','Bollettino: spread €0,18/Smc','Attività e studi professionali'] },
      { id:'hpgc', cat:'gas-placet', ribbon:'gas-placet', tag:'🔥 Gas PLACET', top:true,
        nome:'HAPPY SWITCH PLACET GAS CASA', tipo:'Spread Bloccato 12 mesi · Uso domestico',
        rid:'PSV + €0,70/Smc', boll:null,
        note:'Contributo attivazione €30,00 · Spread garantito per 12 mesi',
        feats:['Spread fisso bloccato 12 mesi','PSV + €0,70/Smc (unica modalità)','Prevedibilità dei costi','Attivazione €30,00'] },
      { id:'hpgl', cat:'gas-placet', ribbon:'gas-placet', tag:'🔥 Gas PLACET', top:true,
        nome:'HAPPY SWITCH PLACET GAS LAVORO', tipo:'Spread Bloccato 12 mesi · Non domestico',
        rid:'PSV + €0,70/Smc', boll:null,
        note:'Contributo attivazione €30,00 · Spread garantito per 12 mesi',
        feats:['Spread fisso bloccato 12 mesi','PSV + €0,70/Smc (unica modalità)','Protezione oscillazioni mercato','Attivazione €30,00'] }
    ];

    function card(o) {
      return `<article class="offer-card" data-cat="${o.cat}">
        <div class="offer-ribbon ${o.ribbon}">${o.tag}${o.top ? ' · Spread bloccato' : ''}</div>
        <div class="offer-body">
          ${window.OPERATOR_LOGO ? `<div class="offer-operator"><span>Fornitore</span><img src="${window.OPERATOR_LOGO}" alt="${window.OPERATOR_NAME}" loading="lazy"></div>` : ''}
          <div class="offer-name">${o.nome}</div>
          <div class="offer-type">${o.tipo}</div>
          <div class="offer-price-box">
            <div class="offer-price-label">Prezzo energia</div>
            <div class="offer-price">${o.rid}</div>
            ${o.boll ? `<div class="offer-price-alt">Bollettino: ${o.boll}</div>` : `<div style="font-size:13px;color:var(--primary);margin-top:8px;font-weight:700;">✓ Prezzo unico, spread garantito</div>`}
          </div>
          ${o.top ? `<div class="offer-badge">🔒 Spread bloccato 12 mesi</div>` : ''}
          <ul class="offer-feats">${o.feats.map(f=>`<li>${f}</li>`).join('')}</ul>
          <div class="offer-note">📋 ${o.note}</div>
          <button class="offer-cta" data-name="${o.nome}">Richiedi informazioni</button>
        </div>
      </article>`;
    }

    const grid = document.getElementById('offers-grid');
    let current = 'all';

    function render(f) {
      current = f;
      const list = f === 'all' ? offers : offers.filter(o => o.cat === f);
      grid.innerHTML = list.map(card).join('');
      grid.querySelectorAll('.offer-cta').forEach(b => b.addEventListener('click', () => {
        window.location.href = 'contatti.php?offerta=' + encodeURIComponent(b.dataset.name) + '#form';
      }));
    }

    document.getElementById('tab-bar').addEventListener('click', e => {
      const btn = e.target.closest('.tab-btn');
      if (!btn) return;
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      render(btn.dataset.filter);
    });

    render('all');
  </script>
HTML;
include __DIR__ . '/footer.php';
?>
