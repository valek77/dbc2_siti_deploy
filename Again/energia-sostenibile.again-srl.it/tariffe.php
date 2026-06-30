<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas';
include __DIR__ . '/header.php';
?>

  <!-- Page hero -->
  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Offerte ufficiali <?= $brandName ?></span>
      <h1>Trova la tariffa <span class="accent">giusta per te</span></h1>
      <p>Offerte Luce e Gas per il Mercato Libero. Prezzi indicizzati al mercato all'ingrosso (PUN per la luce, PSV per il gas) con spread fisso bloccato per 12 mesi dalla data di attivazione.</p>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

  <main class="section" style="padding: 80px 0 40px;">
    <div class="container">

      <!-- Partner Banner -->
      <div style="background: linear-gradient(135deg, #10B981, #047857); padding: 30px; border-radius: var(--r-xl); margin-bottom: 40px; color: #fff; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 16px; box-shadow: var(--shadow-md);">
        <img src="https://www.energiasostenibilespa.it/logo.svg" alt="Energia Sostenibile S.p.A." style="height: 60px; filter: brightness(0) invert(1);">
        <h2 style="margin: 0; font-size: 28px; font-weight: 800;">Offerte Luce in Partnership</h2>
        <p style="margin: 0; font-size: 18px; max-width: 800px; opacity: 0.9;">In collaborazione con il nostro partner, ti proponiamo le migliori offerte luce per la casa e il business. Risparmio garantito, bolletta chiara e consulenza dedicata.</p>
        <a href="https://www.energiasostenibilespa.it/offerte/luce" target="_blank" class="btn-primary" style="background: #fff; color: #047857; font-weight: 700; margin-top: 10px; padding: 12px 24px;">Scopri i dettagli sul sito del partner</a>
      </div>

      <!-- Filtro -->
      <div class="tab-bar" id="tab-bar" style="display:none;">
        <button class="tab-btn active" data-filter="all">Tutte</button>
      </div>

      <!-- Griglia offerte -->
      <div id="offers-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 400px)); gap: 24px; justify-content: center;"></div>

      <p style="font-size: 13px; color: var(--muted); text-align: center; max-width: 900px; margin: 60px auto 0; line-height: 1.6;">
        * I prezzi indicati sono riferiti alle componenti energia (PUN INDEX GME) e gas (PSV) con l'aggiunta degli spread fissi indicati, validi per 12 mesi dalla data di attivazione. Importi IVA ed imposte escluse, al netto delle spese per il trasporto, la gestione del contatore e gli oneri di sistema. Per il dettaglio completo consulta le Condizioni Tecnico-Economiche riportate sopra. Offerte soggette a condizioni contrattuali <?= $brandName ?>.
      </p>
    </div>
  </main>

  <!-- Condizioni Tecnico-Economiche -->
  <section class="section" style="background: var(--bg-alt, #f7f9fb); padding: 60px 0;">
    <div class="container" style="max-width: 920px;">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Trasparenza</span>
        <h2 class="section-title">Condizioni <span class="accent">Tecnico-Economiche</span></h2>
        <p class="section-sub">Le Condizioni Tecnico-Economiche (CTE) prevalgono sulle Condizioni Generali di Fornitura (CGF), ove discordanti, e sono applicabili a condizione che siano soddisfatti congiuntamente i seguenti requisiti: pagamento delle bollette mediante Addebito su Conto (SDD) o PagoPA; invio delle bollette tramite invio combinato Mail + Posta, solo Mail o solo Posta; richiesta effettuata entro il 31/12/2099.</p>
      </div>

      <!-- LUCE SOSTENIBILE 2604 -->
      <details class="cte-detail" open style="background:#fff; border:1px solid var(--border,#e5e9ef); border-radius:var(--r-lg,14px); padding:24px 28px; margin-bottom:24px; box-shadow:var(--shadow-sm);">
        <summary style="cursor:pointer; font-size:20px; font-weight:800; color:var(--text-dark);">⚡ LUCE SOSTENIBILE 2604</summary>
        <div style="margin-top:18px; font-size:14.5px; line-height:1.7; color:var(--text);">
          <p style="margin:0 0 14px;"><b>Codice offerta:</b> 039894ESVFL02XX000000000000AGE01 &middot; Mercato Libero</p>
          <p style="margin:0 0 14px;">LUCE SOSTENIBILE 2604 è un'offerta per la fornitura di energia elettrica riservata ai clienti finali titolari di utenze alimentate in Bassa Tensione. Per la somministrazione di Energia Elettrica sono fatturate al cliente le seguenti voci: spesa per la vendita di energia elettrica, spesa per la tariffa dell'uso della rete elettrica e spesa per gli oneri generali di sistema.</p>

          <h4 style="margin:18px 0 8px; font-size:16px;">Vendita di energia elettrica — primi 12 mesi di fornitura</h4>
          <ul style="margin:0 0 14px; padding-left:20px;">
            <li><b>Corrispettivo Annuo:</b> 420,00 €/POD/anno — corrispettivo fisso ed invariabile per tutta la durata dell'offerta.</li>
            <li><b>Corrispettivo per il Consumo</b>, variabile mensilmente in base al PUN INDEX GME:
              <ul style="margin:6px 0 0; padding-left:20px;">
                <li>PUN_INDEX_GME + F1: 0,099000 €/kWh</li>
                <li>PUN_INDEX_GME + F2: 0,099000 €/kWh</li>
                <li>PUN_INDEX_GME + F3: 0,099000 €/kWh</li>
              </ul>
            </li>
          </ul>
          <p style="margin:0 0 14px;"><b>PUN_INDEX_GME:</b> valore consuntivo medio aritmetico mensile del PUN Index GME (TIDE, allegato delibera ARERA 539/2024/R/eel), risultato della media ponderata dei prezzi zonali orari espresso in €/kWh e determinato dal Gestore dei Mercati Energetici (GME), disponibile su <a href="https://www.mercatoelettrico.org" target="_blank" rel="noopener">www.mercatoelettrico.org</a>. Nel mese di Marzo 2026 (ultimo valore disponibile) il PUN INDEX GME è stato pari a: F1 0,143020 €/kWh, F2 0,153910 €/kWh, F3 0,138090 €/kWh. I valori massimi raggiunti negli ultimi 12 mesi sono stati pari a: F1 0,143020 €/kWh, F2 0,153910 €/kWh, F3 0,138090 €/kWh (Marzo 2026).</p>
          <p style="margin:0 0 14px;"><b>F1, F2, F3:</b> parametri fissi per 12 mesi decorrenti dalla data di attivazione della fornitura, rappresentativi dei costi per la spesa della materia prima non coperti dal PUN INDEX GME, pari a 0,099000 €/kWh ciascuno, perdite di rete incluse.</p>
          <p style="margin:0 0 6px;"><b>Fasce orarie:</b></p>
          <ul style="margin:0 0 14px; padding-left:20px;">
            <li><b>F1</b> = dalle 8.00 alle 19.00 dal lunedì al venerdì, escluse festività nazionali.</li>
            <li><b>F2</b> = dalle 7.00 alle 8.00 e dalle 19.00 alle 23.00 dal lunedì al venerdì, dalle 7.00 alle 23.00 il sabato, escluse festività nazionali.</li>
            <li><b>F3</b> = dalle 0.00 alle 7.00 e dalle 23.00 alle 0.00 dal lunedì al sabato, tutte le ore di domenica e festività nazionali.</li>
          </ul>
          <p style="margin:0;">I valori dei corrispettivi definiti dal venditore hanno una validità di 12 mesi decorrenti dalla data di attivazione della fornitura. Si applica inoltre il corrispettivo di dispacciamento pari al valore del corrispettivo Cdisp<sub>d</sub> definito da ARERA nel Testo Integrato delle disposizioni per l'erogazione dei servizi di vendita dell'energia elettrica di ultima istanza (TIV).</p>
        </div>
      </details>

      <!-- GAS SOSTENIBILE 2604 -->
      <details class="cte-detail" style="background:#fff; border:1px solid var(--border,#e5e9ef); border-radius:var(--r-lg,14px); padding:24px 28px; box-shadow:var(--shadow-sm);">
        <summary style="cursor:pointer; font-size:20px; font-weight:800; color:var(--text-dark);">🔥 GAS SOSTENIBILE 2604</summary>
        <div style="margin-top:18px; font-size:14.5px; line-height:1.7; color:var(--text);">
          <p style="margin:0 0 14px;"><b>Codice offerta:</b> 039894GSVML02XX000000000000AGE01 &middot; Mercato Libero</p>
          <p style="margin:0 0 14px;">GAS SOSTENIBILE 2604 è un'offerta per la fornitura di Gas Naturale. Per la somministrazione di Gas Naturale sono fatturate al cliente le seguenti voci: spesa per la materia gas naturale, spesa per la tariffa dell'uso della rete del gas naturale e spesa per gli oneri generali di sistema.</p>

          <h4 style="margin:18px 0 8px; font-size:16px;">Spesa per la materia gas naturale</h4>
          <p style="margin:0 0 14px;">L'offerta prevede l'applicazione di un Corrispettivo Gas espresso in €/Smc, definito come <b>PSV + α €/Smc</b>, dove:</p>
          <ul style="margin:0 0 14px; padding-left:20px;">
            <li><b>PSV:</b> indice definito come media mensile dei prezzi Bid e Offer delle quotazioni giornaliere nel mercato del gas pubblicate da ICIS Heren — European Spot Gas Markets sotto il titolo "PSV Price Assessment", che varia mensilmente. L'ultimo valore disponibile del PSV relativo a Marzo 2026 è stato pari a 0,557699 €/Smc. Il valore massimo raggiunto negli ultimi 12 mesi è stato pari a 0,566178 €/Smc (Febbraio 2025).</li>
            <li><b>α:</b> espresso in €/Smc, parametro fisso per 12 mesi decorrenti dalla data di attivazione della fornitura, a copertura degli ulteriori costi di approvvigionamento e consegna del gas naturale, pari a 0,250000 €/Smc.</li>
          </ul>
          <p style="margin:0 0 14px;">In relazione alla spesa per la materia prima saranno inoltre applicati:</p>
          <ul style="margin:0 0 14px; padding-left:20px;">
            <li><b>CCR</b> per un importo pari a 0,031510 €/Smc (aggiornato al 27/04/2026), a copertura dei costi delle attività connesse alle modalità di approvvigionamento del gas naturale all'ingrosso, compreso il relativo rischio. Componente prevista dalla delibera ARG/gas 64/09 e ss.mm.ii., aggiornata trimestralmente da ARERA.</li>
            <li><b>Corrispettivo di Commercializzazione e Vendita</b> per un importo pari a 480,00 €/PDR/Anno in rate mensili per 12 mesi.</li>
          </ul>
          <p style="margin:0;">I corrispettivi sopra indicati si intendono riferiti ad un potere calorifico superiore (PCS) pari a 0,03852 GJ/Smc e ad un coefficiente di conversione dei volumi "C" pari a 1, così come definito dalla delibera AEEG 573/2013/R/gas e s.m.i. Il PCS ed il coefficiente "C" saranno adeguati su base territoriale secondo le disposizioni del TIVG. I valori si intendono IVA ed imposte escluse.</p>
        </div>
      </details>
    </div>
  </section>

  <!-- Glossary -->
  <section class="section glossary">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Capire il prezzo</span>
        <h2 class="section-title">Come funzionano <span class="accent">le tariffe</span></h2>
        <p class="section-sub"><?= $brandName ?> offre tariffe variabili indicizzate al mercato all'ingrosso. Il prezzo finale è dato dal prezzo di mercato (PUN per la luce, PSV per il gas) più uno spread fisso definito nel contratto.</p>
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

  <script>
    const ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    const ICON_BOLT = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_LOCK = '<svg viewBox="0 0 24 24" fill="none"><rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';

    const offers = [
      { id: 'luce-sostenibile-2604', category: 'all', kind: 'luce', tipo: 'Luce', top: true,
        nome: 'LUCE SOSTENIBILE 2604', sub: 'Mercato Libero · Cod. 039894ESVFL02XX000000000000AGE01',
        prezzoRid: 'PUN + €0,099', unita: '€/kWh', prezzoBoll: null,
        note: 'Corrispettivo Annuo: 420,00 €/POD/anno',
        features: ['Energia elettrica per utenze in Bassa Tensione', 'Spread F1/F2/F3 fisso per 12 mesi', 'Indicizzata al PUN INDEX GME'] },
      { id: 'gas-sostenibile-2604', category: 'all', kind: 'gas', tipo: 'Gas', top: false,
        nome: 'GAS SOSTENIBILE 2604', sub: 'Mercato Libero · Cod. 039894GSVML02XX000000000000AGE01',
        prezzoRid: 'PSV + €0,25', unita: '€/Smc', prezzoBoll: null,
        note: 'Corrispettivo Commercializzazione e Vendita: 480,00 €/PDR/anno',
        features: ['Fornitura di Gas Naturale', 'Spread α fisso per 12 mesi', 'Indicizzata al PSV'] }
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
            <div class="price-label">Prezzo materia prima</div>
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
