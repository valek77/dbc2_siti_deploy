<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Offerte Gas e Luce ENGIE';

// Script specifico della pagina (catalogo offerte). Restano dati statici:
// le offerte non fanno parte dell'anagrafica azienda gestita dall'API.
// Il nome dell'operatore (dal .env) viene passato al JS come costante PROVIDER.
$operatoreJs = json_encode('ENGIE');
$pageScripts = "  <script>const PROVIDER = $operatoreJs;</script>\n" . <<<'JS'
  <script>
const offers = [
      {
            "nome": "Energia PuntoFisso 12 mesi",
            "tipo": "Luce",
            "segmento": "Domestico",
            "prezzo": "0,1186 €/kWh",
            "corrispettivo_annuo": "72 €/anno",
            "sconti": [
                  "Prezzo bloccato per 1 anno",
                  "Addebito diretto sul conto corrente",
                  "Energia elettrica 100% rinnovabile"
            ],
            "descrizione": "La tua estate parte con l'energia giusta! Blocca il prezzo di Luce per 12 mesi!",
            "logicard": false,
            "id": "off-eng-01"
      },
      {
            "nome": "Taaanta Energia Sera & Relax",
            "tipo": "Luce",
            "segmento": "Domestico",
            "prezzo": "F1: 0,1193 €/kWh, F2: 0,1285 €/kWh, F3: 0,0899 €/kWh",
            "corrispettivo_annuo": "72 €/anno",
            "sconti": [
                  "Prezzo bloccato per 1 anno",
                  "Addebito diretto sul conto corrente",
                  "Energia elettrica 100% rinnovabile"
            ],
            "descrizione": "30% in meno sul costo della materia prima energia in fascia F3, la sera e nei giorni festivi.",
            "logicard": false,
            "id": "off-eng-02"
      },
      {
            "nome": "Taaanta Energia",
            "tipo": "Luce",
            "segmento": "Domestico",
            "prezzo": "PUN + 0 €/kWh",
            "corrispettivo_annuo": "120 €/anno",
            "sconti": [
                  "Prezzo variabile e zero Spread",
                  "Energia elettrica 100% rinnovabile"
            ],
            "descrizione": "Se la tua casa richiede una quantità significativa di energia questa è l'offerta migliore.",
            "logicard": false,
            "id": "off-eng-03"
      },
      {
            "nome": "Energia VedoChiaro",
            "tipo": "Luce",
            "segmento": "Domestico",
            "prezzo": "PUN + 0,0198 €/kWh",
            "corrispettivo_annuo": "84 €/anno",
            "sconti": [
                  "Prezzo variabile",
                  "Energia elettrica 100% rinnovabile"
            ],
            "descrizione": "Vuoi sapere sempre come cambia il prezzo dell’energia? Segui il mercato energetico!",
            "logicard": false,
            "id": "off-eng-04"
      },
      {
            "nome": "Energia PuntoFisso 12 mesi",
            "tipo": "Gas",
            "segmento": "Domestico",
            "prezzo": "0,4900 €/Smc",
            "corrispettivo_annuo": "72 €/anno",
            "sconti": [
                  "Prezzo bloccato per 1 anno",
                  "Addebito diretto sul conto corrente"
            ],
            "descrizione": "La tua estate parte con l'energia giusta! Blocca il prezzo del Gas per 12 mesi!",
            "logicard": false,
            "id": "off-eng-05"
      },
      {
            "nome": "Energia VedoChiaro",
            "tipo": "Gas",
            "segmento": "Domestico",
            "prezzo": "PSV + 0,0680 €/Smc",
            "corrispettivo_annuo": "84 €/anno",
            "sconti": [
                  "Prezzo variabile",
                  "Gestione online"
            ],
            "descrizione": "Vuoi sapere sempre come cambia il prezzo del gas? Segui il mercato energetico!",
            "logicard": false,
            "id": "off-eng-06"
      }
];


    const resultsEl = document.getElementById('results');
    resultsEl.innerHTML = offers.map(o => {
      const isLuce = o.tipo === 'Luce';
      const badge = (isLuce ? '⚡ Luce' : '🔥 Gas') + (o.segmento === 'Condominio' ? ' · Condominio' : '');
      const ribbonBg = isLuce ? 'var(--primary)' : 'var(--secondary)';
      return `
    <article class="offer-card${o.logicard ? ' exclusive' : ''}" style="border-radius: 12px; overflow: hidden; border: 1px solid var(--border); background: #fff; display:flex; flex-direction:column;">
      <div class="offer-card-ribbon" style="background: ${ribbonBg}; color: #fff; padding: 8px; text-align: center; font-weight: 700; font-size: 14px;">${badge}</div>
      <div class="offer-card-body" style="padding: 36px; display:flex; flex-direction:column; flex:1;">
        <div class="offer-card-header" style="margin-bottom: 20px;">
          <img src="logo.png" alt="ENGIE" style="max-height: 30px; margin-bottom: 12px;">
          <span class="offer-name" style="font-size: 22px; font-weight: 700; color: var(--text-dark); display:block;">${o.nome}</span>
          <span class="offer-provider" style="color: var(--text-secondary); margin-top: 4px; font-size: 14px;">${PROVIDER} · ${o.segmento}</span>
        </div>
        <div class="offer-price-wrap" style="margin-bottom: 20px;">
          <div class="offer-price" style="font-size: 28px; font-weight: 800; color: var(--primary); line-height:1.2;">${o.prezzo}</div>
          <div class="offer-price-detail" style="font-size: 14px; color: var(--text-muted); margin-top:4px;">Corrispettivo annuo: ${o.corrispettivo_annuo}*</div>
        </div>
        <p style="font-size:14px; color:var(--text-secondary); margin:0 0 20px; line-height:1.6;">${o.descrizione}</p>
        <div class="offer-features" style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 28px;">
          ${o.sconti.map(s => `<span class="offer-tag" style="display: flex; align-items: center; gap: 8px; color: var(--text-secondary); font-weight: 500; font-size: 14px;"><span style="color: var(--primary);">✓</span> ${s}</span>`).join('')}
        </div>
        <button type="button" class="btn-primary" style="width: 100%; margin-top:auto;" data-offer-id="${o.id}">Attiva con ${PROVIDER}</button>
      </div>
    </article>`;}).join('');

    resultsEl.addEventListener('click', e => {
      const btn = e.target.closest('[data-offer-id]');
      if (!btn) return;
      const o = offers.find(x => x.id === btn.dataset.offerId);
      if (!o) return;
      window.location.href = 'contatti.php?offerta=' + encodeURIComponent(o.nome + ' (' + PROVIDER + ')') + '#contatto-form';
    });
  </script>
JS;

include __DIR__ . '/header.php';
?>

  <section class="hero"
    style="background: linear-gradient(rgba(15, 17, 24, 0.7), rgba(15, 17, 24, 0.8)), url('tariffe_hero.jpg') center/cover no-repeat; color: #ffffff; padding: 120px 20px; height: auto; min-height: 400px; text-align: center; display: flex; align-items: center; justify-content: center;">
    <div class="hero-wrapper" style="max-width: 900px; margin: 0 auto; text-align: center; display: flex; flex-direction: column; align-items: center;">
      <h1 style="font-size: clamp(40px, 6vw, 64px); margin: 0 0 24px; max-width: 800px; font-weight: 800;">Offerte <span style="color: var(--accent);">ENGIE</span></h1>
      <p style="font-size: 20px; color: rgba(255, 255, 255, 0.9); margin: 0; max-width: 700px;">Scopri le offerte Luce e Gas di ENGIE: soluzioni a prezzo fisso o variabile, 100% energia rinnovabile, pensate per la tua casa.</p>
    </div>
  </section>

  <section class="container" style="max-width: 1280px; margin: var(--section-padding) auto 0; padding: 0 20px;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--gutter); text-align: center;">
      <div style="padding: 24px;">
        <h3 style="font-size: 20px; margin: 0 0 8px; color: var(--text-dark);">Nessun Costo</h3>
        <p style="color: var(--text-secondary); margin: 0;">Nessuna spesa per il cambio fornitore.</p>
      </div>
      <div style="padding: 24px;">
        <h3 style="font-size: 20px; margin: 0 0 8px; color: var(--text-dark);">Nessun Lavoro</h3>
        <p style="color: var(--text-secondary); margin: 0;">Nessuna sostituzione del contatore.</p>
      </div>
      <div style="padding: 24px;">
        <h3 style="font-size: 20px; margin: 0 0 8px; color: var(--text-dark);">Customer Care</h3>
        <p style="color: var(--text-secondary); margin: 0;">Operatori cortesi e disponibili, sempre.</p>
      </div>
    </div>
  </section>

  <main class="container" style="max-width: 1280px; margin: 60px auto var(--section-padding); padding: 0 20px;">
    <h2 class="section-title" style="text-align: center; margin-top: 0; font-size: 36px;">Le nostre offerte Luce e Gas ENGIE</h2>
    <p style="text-align:center; color: var(--text-secondary); max-width: 720px; margin: 0 auto 48px; font-size: 18px;">Tutte le offerte sono riservate ai clienti che aderiscono tramite richiesta web. Scegli quella piu adatta a te.</p>
    <div class="results-list" id="results"
      style="display: grid; grid-template-columns: repeat(auto-fit, minmax(360px, 1fr)); gap: var(--gutter);"></div>
  </main>

  <p class="price-disclaimer" id="price-disclaimer"
    style="max-width: 1200px; margin: 40px auto; padding: 0 20px; font-size: 14px; color: var(--text-muted); text-align: center;">
    * I corrispettivi indicati si riferiscono alla sola componente Materia Energia e sono al netto di imposte, costi di trasporto e gestione del contatore e oneri di sistema, come stabiliti e aggiornati da ARERA. Prezzo indicizzato (PUN/PSV Index GME) piu spread fisso per 12 mesi. Dati aggiornati secondo le offerte ufficiali ENGIE.
  </p>

<?php include __DIR__ . '/footer.php'; ?>

