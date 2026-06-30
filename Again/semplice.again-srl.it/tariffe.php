<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
$_brand = $LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale']
    : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Again');
$pageDescription = 'Tutte le offerte ' . $OPERATORE['nome_marketing'] . ' disponibili tramite ' . $_brand . '. Tariffe luce e gas per uso domestico e professionale con prezzi indicizzati al mercato.';
include __DIR__ . '/header.php';
?>

  <!-- PAGE HERO — foto parco eolico -->
  <section class="page-hero">
    <div class="photo-bg" style="background-image: url('https://images.unsplash.com/photo-1466611653911-95081537e5b7?auto=format&fit=crop&w=1600&q=80');"></div>
    <div class="photo-overlay"></div>
    <div class="inner">
      <span class="eyebrow" style="color:var(--primary-light);"><span class="dot" style="background:var(--primary-light);"></span> Offerte <?= $OPERATORE['nome_marketing'] ?></span>
      <h1>Trova la tariffa <span class="hl">giusta per te</span></h1>
      <p>Offerte per uso domestico e professionale. Prezzi indicizzati al mercato all'ingrosso (PUN e PSV) con spread fisso bloccato per 12 mesi.</p>
    </div>
  </section>

  <!-- OFFERS -->
  <section class="section">
    <div class="container">

      <div class="tab-bar" id="tab-bar">
        <button class="tab-btn active" data-filter="all">Tutte le offerte</button>
        <button class="tab-btn" data-filter="luce-res">⚡ Luce Casa</button>
        <button class="tab-btn" data-filter="gas-res">🔥 Gas Casa</button>
      </div>

      <div class="offers-grid" id="offers-grid"></div>

      <p style="font-size:13px; color:var(--muted-2); text-align:center; max-width:900px; margin:56px auto 0; line-height:1.7;">
        * I prezzi indicati si riferiscono alle componenti energia (PUN) e gas (PSV) con l'aggiunta degli spread indicati e sono al netto di IVA, imposte, oneri di sistema e costi di trasporto e gestione del contatore stabiliti e aggiornati da ARERA. Condizioni valide 12 mesi con rinnovo automatico. Offerte soggette a condizioni contrattuali <?= $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'] ?>. <?= $brandName ?> è rivenditore indipendente autorizzato.
      </p>
    </div>
  </section>

  <!-- GLOSSARIO — dark section -->
  <section class="dark-section" style="padding: var(--section) 0;">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow" style="color:var(--primary-light); justify-content:center;"><span class="dot" style="background:var(--primary-light);"></span> Capire il prezzo</span>
        <h2 class="section-title" style="color:#fff; text-align:center;">Perché scegliere<br><span style="color:var(--primary-light);"><?= $OPERATORE['nome_marketing'] ?></span></h2>
        <p class="section-sub" style="margin:0 auto 56px; text-align:center;">Prezzi trasparenti indicizzati al mercato all'ingrosso. Il risparmio è garantito dalla gestione digitale e dalla chiarezza contrattuale.</p>
      </div>
      <div class="glossary-grid">
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4.09 12.11A1 1 0 005 14h7l-1 8 8.91-10.11A1 1 0 0019 10h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PUN (Luce)</h4>
          <p>Prezzo Unico Nazionale: il costo dell'energia elettrica sul mercato all'ingrosso, aggiornato mensilmente.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PSV (Gas)</h4>
          <p>Punto di Scambio Virtuale: il prezzo di riferimento del gas naturale sul mercato italiano.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2"/><path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
          <h4>Risparmio Digitale</h4>
          <p>Fino a 24€ di sconto annuo attivando la domiciliazione bancaria e la bolletta via email.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h4>Versione CS</h4>
          <p>Le offerte CS applicano uno spread ridotto sulla materia prima, bloccato e garantito per i primi 12 mesi.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section" style="text-align:center;">
    <div class="container">
      <h2 class="section-title" style="margin-bottom:16px;">Scegli la trasparenza</h2>
      <p style="font-size:18px; color:var(--muted); max-width:560px; margin:0 auto 36px; line-height:1.7;">Nessun vincolo di durata e nessun costo di recesso. Passa a <?= $OPERATORE['nome_marketing'] ?> con <?= $brandName ?>.</p>
      <a href="contatti.php" class="btn-primary" style="font-size:17px; padding:16px 44px;">Parla con un esperto →</a>
    </div>
  </section>

  <script>
    const offers = [
  { id:'pun-dom', cat:'luce-res', ribbon:'luce-res', tag:'⚡ Luce Casa', top:false,
    nome:'PUN Index GME Domestico 386', tipo:'Prezzo Variabile · Indicizzato PUN',
    rid:'PUN Index GME + 0,055 €/kWh', boll:null,
    note:'Offerta <?= $OPERATORE['nome_marketing'] ?>. Indicizzato al PUN Index GME, stesso spread su F1/F2/F3, aggiornato mensilmente.',
    feats:['Corrispettivo annuo: 456,00 €/POD/anno','Spread fisso per 12 mesi','Pagamento: addebito SDD, bonifico o bollettino','Nessuna spesa di cambio fornitore'] },
  { id:'pun-dom-cs', cat:'luce-res', ribbon:'luce-res', tag:'⚡ Luce Casa', top:false,
    nome:'PUN Index GME Domestico CS 386', tipo:'Prezzo Variabile · Indicizzato PUN',
    rid:'PUN Index GME + 0,05 €/kWh', boll:null,
    note:'Offerta <?= $OPERATORE['nome_marketing'] ?>. Versione CS con spread ridotto, indicizzata al PUN Index GME (F1/F2/F3), aggiornata mensilmente.',
    feats:['Corrispettivo annuo: 456,00 €/POD/anno','Spread ridotto fisso per 12 mesi','Pagamento: addebito SDD, bonifico o bollettino','Nessuna spesa di cambio fornitore'] },
  { id:'psv-dom', cat:'gas-res', ribbon:'gas-res', tag:'🔥 Gas Casa', top:false,
    nome:'PSV Domestico 386', tipo:'Prezzo Variabile · Indicizzato PSV',
    rid:'PSV + 0,45 €/Smc', boll:null,
    note:'Offerta <?= $OPERATORE['nome_marketing'] ?>. Indicizzato al PSV Day Ahead (ICIS Heren), aggiornato mensilmente.',
    feats:['Corrispettivo annuo: 648,00 €/PDR/anno','Spread fisso per 12 mesi','Pagamento: addebito SDD, bonifico o bollettino','Nessuna spesa di cambio fornitore'] },
  { id:'psv-dom-cs', cat:'gas-res', ribbon:'gas-res', tag:'🔥 Gas Casa', top:false,
    nome:'PSV Domestico CS 386', tipo:'Prezzo Variabile · Indicizzato PSV',
    rid:'PSV + 0,42 €/Smc', boll:null,
    note:'Offerta <?= $OPERATORE['nome_marketing'] ?>. Versione CS con spread ridotto, indicizzata al PSV Day Ahead (ICIS Heren), aggiornata mensilmente.',
    feats:['Corrispettivo annuo: 648,00 €/PDR/anno','Spread ridotto fisso per 12 mesi','Pagamento: addebito SDD, bonifico o bollettino','Nessuna spesa di cambio fornitore']}
    ];

    function card(o) {
      return `<article class="offer-card" data-cat="${o.cat}">
        <div class="offer-ribbon ${o.ribbon}">${o.tag}${o.top ? ' · Vantaggiosa' : ''}</div>
        <div class="offer-body">
          <div style="font-size:12px; color:var(--muted); font-weight:700; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:8px;"><?= $OPERATORE['nome_marketing'] ?></div>
          <div class="offer-name">${o.nome}</div>
          <div class="offer-type">${o.tipo}</div>
          <div class="offer-price-box">
            <div class="offer-price-label">Prezzo materia prima</div>
            <div class="offer-price">${o.rid}</div>
            <div class="offer-price-alt">Valido per 12 mesi</div>
          </div>
          ${o.top ? `<div class="offer-badge">💎 Linea SICURA con Assistenza</div>` : ''}
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
<?php include __DIR__ . '/footer.php'; ?>
