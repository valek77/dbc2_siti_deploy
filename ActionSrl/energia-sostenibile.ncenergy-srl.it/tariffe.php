<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe ' . $OPERATORE_ENERGETICO;

$pageHead = <<<'CSS'
  <style>
    /* Tariffe: due colonne fisse (riga 1 = domestiche, riga 2 = business) */
    .results-list {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: var(--gutter);
    }
    @media (max-width: 768px) {
      .results-list {
        grid-template-columns: 1fr;
      }
    }
  </style>
CSS;

include __DIR__ . '/header.php';
?>

  <section class="hero"
    style="background: linear-gradient(rgba(11,11,13,0.8), rgba(11,11,13,0.92)), radial-gradient(70% 100% at 50% 40%, rgba(255,176,32,0.18), transparent 65%), url('tariffe_hero.jpg') center/cover no-repeat; color: #ffffff; padding: 120px 20px; height: auto; min-height: 400px; text-align: center; display: flex; align-items: center; justify-content: center;">
    <div class="hero-wrapper" style="max-width: 900px; margin: 0 auto; text-align: center; display: flex; flex-direction: column; align-items: center;">
      <h1 style="font-size: clamp(40px, 6vw, 64px); margin: 0 0 24px; max-width: 800px; font-weight: 800;">Offerte <span style="color: var(--accent);"><?= $OPERATORE_ENERGETICO ?> Sostenibile</span></h1>
      <p style="font-size: 20px; color: rgba(255, 255, 255, 0.9); margin: 0; max-width: 700px;">Prezzo variabile trasparente, agganciato agli indici di mercato (PUN Index GME per la luce, PSV per il gas), con fee chiara e corrispettivo annuo fisso.</p>
    </div>
  </section>

  <main class="container" style="max-width: 1280px; margin: var(--section-padding) auto; padding: 0 20px;">
    <div class="results-list" id="results"></div>

    <div style="margin-top: 120px; display: flex; align-items: center; gap: var(--gutter); flex-wrap: wrap;">
      <div style="flex: 1; min-width: 300px;">
        <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 36px;">Sostenibile: il mercato, senza sorprese</h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
          Con le offerte <?= $OPERATORE_ENERGETICO ?> Sostenibile paghi l'energia al prezzo all'ingrosso del mercato — il PUN Index GME per la luce e il PSV per il gas — maggiorato di una quota fissa ed un corrispettivo annuo. Nessun ricarico nascosto: segui l'andamento del mercato con la massima trasparenza per la tua casa.
        </p>
        <div style="display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 24px;">
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Prezzo indicizzato PUN / PSV</div>
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Parametro fisso trasparente</div>
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Luce e Gas · Casa</div>
        </div>
      </div>
      <div style="flex: 0.8; min-width: 300px; display: flex; justify-content: center;">
        <img src="hero_new.jpg" alt="Risparmio <?= $OPERATORE_ENERGETICO ?>"
          style="max-width: 100%; height: auto; border-radius: var(--radius-lg); box-shadow: 0 20px 40px rgba(4, 8, 50, 0.08);">
      </div>
    </div>
  </main>

  <p class="price-disclaimer" id="price-disclaimer"
    style="max-width: 1200px; margin: 40px auto; padding: 0 20px; font-size: 13px; line-height: 1.7; color: var(--text-muted); text-align: left;">
    * Offerte a prezzo variabile aggiornato mensilmente. Corrispettivi definiti da <?= $OPERATORE_ENERGETICO ?>.
    <strong>Energia elettrica:</strong> Corrispettivo per il consumo pari a PUN_INDEX_GME + parametro fisso (0,099000 €/kWh perdite di rete incluse) applicato alle fasce F1, F2 e F3. Si applica il corrispettivo annuo fisso di 420,00 €/POD/anno e il corrispettivo di dispacciamento Cdispd definito da ARERA. Ultimo valore PUN INDEX GME disponibile (Marzo 2026): F1: 0,143020 €/kWh, F2: 0,153910 €/kWh, F3: 0,138090 €/kWh.
    <strong>Gas naturale:</strong> Corrispettivo Gas pari a PSV + parametro fisso (0,250000 €/Smc) a copertura dei costi di approvvigionamento e consegna. Si applica il Corrispettivo di Commercializzazione e Vendita pari a 480,00 €/PDR/anno e la componente CCR pari a 0,031510 €/Smc. Ultimo valore PSV disponibile (Marzo 2026): 0,557699 €/Smc.
    I corrispettivi sul consumo di gas sono riferiti ad un potere calorifico superiore (PCS) pari a 0,03852 GJ/Smc e coefficiente C pari a 1. Tutti i prezzi si intendono IVA e imposte escluse.
  </p>

  <script>
    const fornitore = '<?= $OPERATORE_ENERGETICO ?>';
    const offers = [
      {
        id: 'luce-sostenibile-2604',
        categoria: 'Uso Domestico',
        esclusiva: true,
        nome: 'LUCE SOSTENIBILE 2604',
        tipo: 'Luce',
        corrispettivoAnnuo: '420,00 €/POD/anno',
        feeConsumo: 'PUN_INDEX_GME + 0,099000 €/kWh',
        features: [
          'Prezzo variabile indicizzato al PUN Index GME',
          'Parametro fisso per 12 mesi: 0,099000 €/kWh (perdite incluse) su F1, F2, F3',
          'Corrispettivo fisso annuo: 420,00 €/POD/anno (35,00 €/mese)',
          'Riservato a utenze alimentate in Bassa Tensione'
        ]
      },
      {
        id: 'gas-sostenibile-2604',
        categoria: 'Uso Domestico',
        esclusiva: false,
        nome: 'GAS SOSTENIBILE 2604',
        tipo: 'Gas',
        corrispettivoAnnuo: '480,00 €/PDR/anno',
        feeConsumo: 'PSV + 0,250000 €/Smc',
        features: [
          'Prezzo variabile indicizzato al PSV (media mensile ICIS Heren)',
          'Parametro fisso per 12 mesi: 0,250000 €/Smc a copertura costi approvvigionamento',
          'Corrispettivo Commercializzazione e Vendita: 480,00 €/PDR/anno (40,00 €/mese)',
          'Componente CCR inclusa a copertura rischi ingrosso (0,031510 €/Smc)'
        ]
      }
    ];

    const resultsEl = document.getElementById('results');
    resultsEl.innerHTML = offers.map(o => `
    <article class="offer-card${o.esclusiva ? ' exclusive' : ''}" style="border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--border); background: var(--bg-cream); display: flex; flex-direction: column;">
      <div class="offer-card-ribbon" style="background: ${o.esclusiva ? 'var(--grad-yellow)' : 'var(--secondary)'}; color: ${o.esclusiva ? '#16100a' : 'var(--text-secondary)'}; padding: 8px; text-align: center; font-weight: 700; font-size: 13px;">${o.esclusiva ? '🔥 La più scelta' : o.categoria}</div>
      <div class="offer-card-body" style="padding: 40px; display: flex; flex-direction: column; flex: 1;">
        <div class="offer-card-header" style="margin-bottom: 24px;">
          <div class="offer-name-wrap"><span class="offer-name" style="font-size: 24px; font-weight: 700; color: var(--text-dark);">${o.nome}</span></div>
          <div class="offer-provider" style="color: var(--text-secondary); margin-top: 4px; font-size: 14px;">${fornitore} · ${o.tipo} · ${o.categoria}</div>
        </div>
        <div class="offer-price-wrap" style="margin-bottom: 20px;">
          <div class="offer-price" style="font-size: 30px; font-weight: 700; color: var(--primary);">${o.corrispettivoAnnuo}</div>
          <div class="offer-price-detail" style="font-size: 14px; color: var(--text-muted);">Corrispettivo annuo fisso</div>
        </div>
        <div class="offer-saving" style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 8px; font-weight: 600; margin-bottom: 24px; display: inline-block; font-size: 14px;">Consumo: ${o.feeConsumo}</div>
        <div class="offer-features" style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 32px;">${o.features.map(f => `<span class="offer-tag" style="display: flex; align-items: flex-start; gap: 8px; color: var(--text-secondary); font-weight: 500; font-size: 14px;"><span style="color: var(--primary);">✓</span> ${f}</span>`).join('')}</div>
        <button type="button" class="btn-primary" style="width: 100%; margin-top: auto;" data-offer-id="${o.id}">Attiva con ${fornitore}</button>
      </div>
    </article>`).join('');

    resultsEl.addEventListener('click', e => {
      const btn = e.target.closest('[data-offer-id]');
      if (!btn) return;
      const o = offers.find(x => x.id === btn.dataset.offerId);
      if (!o) return;
      window.location.href = 'contatti.php?offerta=' + encodeURIComponent(o.nome + ' (' + fornitore + ')') + '#contatto-form';
    });
  </script>

<?php include __DIR__ . '/footer.php'; ?>