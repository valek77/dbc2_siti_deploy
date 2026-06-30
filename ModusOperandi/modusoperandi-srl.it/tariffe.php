<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Luce e Gas Eni Plenitude';
$pageDescription = 'Scopri le offerte Eni Plenitude per luce e gas per la casa: Fixa Time 24 Smart e Trend Casa. Prezzi chiari, energia verde e vantaggi esclusivi.';
include __DIR__ . '/header.php';
?>

  <!-- Page hero -->
  <section class="page-hero">
    <div class="container">
      <span class="eyebrow"><span class="dot"></span> Offerte per la casa</span>
      <h1>Le offerte <span class="accent">Eni Plenitude</span> per te</h1>
      <p>Scegli la tariffa luce e gas più adatta alla tua casa. Prezzi trasparenti, energia elettrica 100% da fonti rinnovabili e tanti vantaggi.</p>
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
      <div style="background: var(--white); border: 2px solid var(--yellow); padding: 34px; border-radius: var(--r-xl); margin-bottom: 44px; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 18px; box-shadow: var(--shadow-md);">
        <img src="eni_plenitude_logo.svg" alt="Eni Plenitude" style="height: 52px; width: auto;">
        <h2 style="margin: 0; font-size: 26px; font-weight: 800; color: var(--ink);">Partner ufficiale Eni Plenitude</h2>
        <p style="margin: 0; font-size: 17px; max-width: 820px; color: var(--muted);">Ti proponiamo le offerte luce e gas di Eni Plenitude per la casa. Risparmio, bolletta chiara e consulenza dedicata.</p>
        <a href="contatti.php" class="btn-primary" style="margin-top: 6px;">Richiedi informazioni
          <svg class="btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>

      <!-- Filtro -->
      <div class="tab-bar" id="tab-bar" style="display:none;">
        <button class="tab-btn active" data-filter="all">Tutte</button>
      </div>

      <!-- Griglia offerte -->
      <div id="offers-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 420px)); gap: 28px; justify-content: center;"></div>

      <p style="font-size: 13px; color: var(--muted); text-align: center; max-width: 960px; margin: 60px auto 0; line-height: 1.6;">
        * I prezzi indicati si riferiscono alle componenti energia definite da Eni Plenitude. Importi IVA ed imposte escluse, al netto delle spese per il trasporto, la gestione del contatore e gli oneri di sistema. Le condizioni economiche sono valide fino al 12/07/2026. Per il dettaglio completo consulta le Condizioni Tecnico-Economiche riportate sotto. Offerte soggette a condizioni contrattuali Eni Plenitude.
      </p>
    </div>
  </main>

  <!-- Condizioni Tecnico-Economiche -->
  <section class="section" style="background: var(--bg-warm); padding: 60px 0;">
    <div class="container" style="max-width: 920px;">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Trasparenza</span>
        <h2 class="section-title">Condizioni <span class="accent">Tecnico-Economiche</span></h2>
        <p class="section-sub">Le Condizioni Tecnico-Economiche (CTE) prevalgono sulle Condizioni Generali di Fornitura (CGF), ove discordanti. I corrispettivi di rete e oneri di sistema sono definiti da ARERA e sono uguali per tutti i venditori.</p>
      </div>

      <!-- Fixa Time 24 Smart -->
      <details class="cte-detail" open style="background:var(--white); border:1px solid var(--line); border-radius:var(--r-lg); padding:24px 28px; margin-bottom:24px; box-shadow:var(--shadow-sm);">
        <summary style="cursor:pointer; font-size:20px; font-weight:800; color:var(--ink);">⚡ Fixa Time 24 Smart — Luce e Gas</summary>
        <div style="margin-top:18px; font-size:14.5px; line-height:1.7; color:var(--ink-3);">
          <p style="margin:0 0 14px;"><b>Offerta:</b> Fixa Time 24 Smart · Mercato Libero · Clienti domestici con contatore attivo</p>
          <p style="margin:0 0 14px;">L’offerta luce e/o gas con corrispettivi fissi a consumo per 12 mesi. Puoi attivarla in caso di cambio fornitore, voltura luce, prima attivazione o subentro.</p>

          <h4 style="margin:18px 0 8px; font-size:16px;">Luce — primi 12 mesi</h4>
          <ul style="margin:0 0 14px; padding-left:20px;">
            <li><b>Corrispettivo Luce:</b> 0,0990 €/kWh, invariabile per tutta la durata delle condizioni economiche.</li>
            <li><b>Commercializzazione e Vendita:</b> 144 €/anno.</li>
            <li><b>Opzione bioraria:</b> F1 0,1018 €/kWh, F2-3 0,0974 €/kWh.</li>
            <li><b>Sconto Domiciliazione:</b> 5% sul corrispettivo luce con addebito diretto attivo.</li>
          </ul>

          <h4 style="margin:18px 0 8px; font-size:16px;">Gas — primi 12 mesi</h4>
          <ul style="margin:0 0 14px; padding-left:20px;">
            <li><b>Corrispettivo Gas:</b> 0,4400 €/Smc, invariabile per tutta la durata delle condizioni economiche.</li>
            <li><b>Commercializzazione e Vendita:</b> 144 €/anno.</li>
            <li><b>Sconto Domiciliazione:</b> 5% sul corrispettivo gas con addebito diretto attivo.</li>
          </ul>

          <p style="margin:0 0 14px;"><b>Energia verde:</b> per l’intera durata del contratto l’energia elettrica fornita è certificata, tramite garanzie d’origine di provenienza europea, come prodotta da impianti alimentati al 100% da fonti rinnovabili.</p>
          <p style="margin:0 0 14px;"><b>Promo Telepass:</b> 12 mesi di canone gratuito Telepass Family + voucher 50€ di sconto pedaggi per nuovi clienti Telepass. Operazione a premi valida fino al 30/09/2026, attivazione entro il 30/11/2026.</p>
          <p style="margin:0;">Passaggio gratuito, senza interruzioni di fornitura e senza dover dare disdetta al vecchio fornitore. Diritto di ripensamento: 14 giorni se sottoscritto a distanza, 30 giorni negli altri casi.</p>
        </div>
      </details>

      <!-- Trend Casa -->
      <details class="cte-detail" style="background:var(--white); border:1px solid var(--line); border-radius:var(--r-lg); padding:24px 28px; margin-bottom:24px; box-shadow:var(--shadow-sm);">
        <summary style="cursor:pointer; font-size:20px; font-weight:800; color:var(--ink);">📈 Trend Casa — Luce e Gas</summary>
        <div style="margin-top:18px; font-size:14.5px; line-height:1.7; color:var(--ink-3);">
          <p style="margin:0 0 14px;"><b>Offerta:</b> Trend Casa · Mercato Libero · Prezzo variabile indicizzato al mercato</p>
          <p style="margin:0 0 14px;">L’offerta con struttura di prezzo variabile: il costo energia segue l’andamento del PUN per la luce e del PSV per il gas, con un contributo fisso definito in contratto.</p>

          <h4 style="margin:18px 0 8px; font-size:16px;">Luce — primi 24 mesi</h4>
          <ul style="margin:0 0 14px; padding-left:20px;">
            <li><b>Corrispettivo Luce Index:</b> pari al prezzo all’ingrosso PUN mensile.</li>
            <li><b>Contributo al Consumo:</b> 0,0220 €/kWh, invariabile per 24 mesi.</li>
            <li><b>Commercializzazione e Vendita:</b> 144 €/anno.</li>
            <li><b>Sconto Domiciliazione:</b> 24€ di sconto in bolletta in 2 anni (1€/mese) con addebito diretto attivo.</li>
          </ul>

          <h4 style="margin:18px 0 8px; font-size:16px;">Gas — primi 24 mesi</h4>
          <ul style="margin:0 0 14px; padding-left:20px;">
            <li><b>Corrispettivo Gas Index:</b> pari al prezzo all’ingrosso PSV mensile.</li>
            <li><b>Contributo al Consumo:</b> 0,1500 €/Smc, invariabile per 24 mesi.</li>
            <li><b>Commercializzazione e Vendita:</b> 144 €/anno.</li>
            <li><b>Sconto Domiciliazione:</b> 24€ di sconto in bolletta in 2 anni (1€/mese) con addebito diretto attivo.</li>
          </ul>

          <p style="margin:0 0 14px;"><b>Energia verde:</b> anche con Trend Casa l’energia elettrica è certificata come prodotta da fonti rinnovabili al 100% tramite garanzie d’origine europee.</p>
          <p style="margin:0 0 14px;"><b>Promo Telepass:</b> 12 mesi di canone gratuito Telepass Family + voucher 50€ di sconto pedaggi per nuovi clienti Telepass. Operazione a premi valida fino al 30/09/2026, attivazione entro il 30/11/2026.</p>
          <p style="margin:0;">Cambio offerta per clienti già Eni Plenitude disponibile con un corrispettivo una tantum di 12€ (IVA esclusa). Condizioni economiche valide 24 mesi dall’avvio della fornitura.</p>
        </div>
      </details>

      <!-- Altre offerte -->
      <details class="cte-detail" style="background:var(--white); border:1px solid var(--line); border-radius:var(--r-lg); padding:24px 28px; box-shadow:var(--shadow-sm);">
        <summary style="cursor:pointer; font-size:20px; font-weight:800; color:var(--ink);">🏠 Altre offerte e servizi</summary>
        <div style="margin-top:18px; font-size:14.5px; line-height:1.7; color:var(--ink-3);">
          <p style="margin:0 0 14px;">Eni Plenitude propone anche altre soluzioni per la casa:</p>
          <ul style="margin:0; padding-left:20px;">
            <li><b>Fixa Time Base:</b> offerta luce e/o gas con sconto sui corrispettivi fissi a consumo per 12 mesi.</li>
            <li><b>Placet Variabile / Placet Fissa:</b> offerte con condizioni contrattuali fissate da ARERA per il mercato tutelato.</li>
            <li><b>Servizio Tutela Vulnerabilità:</b> offerta gas a prezzo variabile per i clienti che aderiscono al servizio definito da ARERA.</li>
            <li><b>Nuove Attivazioni:</b> offerte per prima attivazione, subentro, voltura e allaccio contatore.</li>
          </ul>
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
        <p class="section-sub">Le offerte Eni Plenitude si dividono in fisse (corrispettivo bloccato) e variabili (corrispettivo indicizzato al mercato all’ingrosso).</p>
      </div>

      <div class="features-container">
        <div class="feature-card reveal">
          <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PUN (Luce)</h4>
          <p>Prezzo Unico Nazionale: il valore medio mensile dell’energia elettrica sul mercato all’ingrosso italiano.</p>
        </div>
        <div class="feature-card reveal">
          <div class="feature-icon warm"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PSV (Gas)</h4>
          <p>Punto di Scambio Virtuale: il prezzo di riferimento del gas naturale sul mercato italiano, aggiornato mensilmente.</p>
        </div>
        <div class="feature-card reveal">
          <div class="feature-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M3 3v18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 14l4-4 4 4 5-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h4>Corrispettivo fisso</h4>
          <p>Con le offerte Fixa Time il prezzo della materia prima è bloccato per tutta la durata delle condizioni economiche.</p>
        </div>
      </div>
    </div>
  </section>

<?php
$pageScripts = <<<'HTML'
  <script>
    const ICON_CHECK = '<svg viewBox="0 0 24 24" fill="none"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    const ICON_BOLT = '<svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_FLAME = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
    const ICON_LOCK = '<svg viewBox="0 0 24 24" fill="none"><rect x="4" y="11" width="16" height="10" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 11V7a4 4 0 018 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
    const ICON_LEAF = '<svg viewBox="0 0 24 24" fill="none"><path d="M12 22c4.97-4.97 4.97-13.03 0-18-4.97 4.97-4.97 13.03 0 18z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 22V12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';

    const offers = [
      { id: 'fixa-time-24-smart', category: 'all', kind: 'lucegas', tipo: 'Luce + Gas', top: true,
        nome: 'Fixa Time 24 Smart', sub: 'Mercato Libero · Corrispettivi fissi per 12 mesi',
        prezzoRid: 'Luce 0,099 €/kWh', unita: 'Gas 0,440 €/Smc', prezzoBoll: null,
        note: 'Commercializzazione e Vendita: 144 €/anno per fornitura. Sconto domiciliazione 5%.',
        features: ['Corrispettivi fissi a consumo per 12 mesi', 'Energia elettrica 100% rinnovabile', 'Opzione bioraria disponibile', '12 mesi Telepass Family + 50€ pedaggi'] },
      { id: 'trend-casa', category: 'all', kind: 'lucegas', tipo: 'Luce + Gas', top: false,
        nome: 'Trend Casa', sub: 'Mercato Libero · Prezzo variabile indicizzato per 24 mesi',
        prezzoRid: 'PUN + 0,022 €/kWh', unita: 'PSV + 0,150 €/Smc', prezzoBoll: null,
        note: 'Commercializzazione e Vendita: 144 €/anno per fornitura. Sconto domiciliazione 24€/2anni.',
        features: ['Prezzo variabile indicizzato al mercato', 'Contributo fisso per 24 mesi', 'Energia elettrica 100% rinnovabile', '12 mesi Telepass Family + 50€ pedaggi'] }
    ];

    function renderCard(o) {
      const styleVars = '--ribbon-color:#FFCD00; --ribbon-bg:#FFF9E5; --ribbon-text:#7A6200; --ribbon-border:#FFF0C2;';
      return `
      <article class="offer-card ${o.top ? 'featured' : ''}" data-category="${o.category}" style="${styleVars}">
        <div class="offer-ribbon">
          <span class="pill warm">
            ${ICON_BOLT}
            <span>${o.tipo}</span>
          </span>
          ${o.top ? `<span class="lock">${ICON_LOCK} Prezzo bloccato 12 mesi</span>` : `<span class="lock">${ICON_LEAF} 100% energia verde</span>`}
        </div>
        <div class="offer-card-body">
          <h3 class="offer-name">${o.nome}</h3>
          <p class="offer-type">${o.sub}</p>

          <div class="price-block">
            <div class="price-label">Prezzo materia prima</div>
            <div class="price-main">${o.prezzoRid}<span style="font-size:14px; color:var(--muted); margin-left:4px; font-weight:600;">${o.unita}</span></div>
            ${o.prezzoBoll
              ? `<div class="price-alt">Bollettino: <b>${o.prezzoBoll}</b></div>`
              : `<div class="price-locked">${ICON_CHECK} Condizioni economiche garantite</div>`}
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
