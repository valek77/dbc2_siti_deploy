<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe ' . $OPERATORE_ENERGETICO;
include __DIR__ . '/header.php';
?>

  <section class="hero"
    style="background: linear-gradient(rgba(94, 200, 215, 0.4), rgba(94, 200, 215, 0.6)), url('tariffe_hero.jpg') center/cover no-repeat; color: #ffffff; padding: 120px 20px; height: auto; min-height: 400px; text-align: center; display: flex; align-items: center; justify-content: center;">
    <div class="hero-wrapper" style="max-width: 900px; margin: 0 auto; text-align: center; display: flex; flex-direction: column; align-items: center;">
      <h1 style="font-size: clamp(40px, 6vw, 64px); margin: 0 0 24px; max-width: 800px; font-weight: 800;">Offerte <span style="color: var(--accent);"><?= $OPERATORE_ENERGETICO ?> Smart Flex</span></h1>
      <p style="font-size: 20px; color: rgba(255, 255, 255, 0.9); margin: 0; max-width: 700px;">Prezzo variabile trasparente, agganciato agli indici di mercato (PUN Index GME per la luce, PSV per il gas), con fee chiara e corrispettivo annuo fisso. Offerte valide fino al 10/07/2026.</p>
    </div>
  </section>

  <main class="container" style="max-width: 1280px; margin: var(--section-padding) auto; padding: 0 20px;">
    <div class="results-list" id="results"
      style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: var(--gutter);"></div>

    <div style="margin-top: 120px; display: flex; align-items: center; gap: var(--gutter); flex-wrap: wrap;">
      <div style="flex: 1; min-width: 300px;">
        <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 36px;">Smart Flex: il mercato, senza sorprese</h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
          Con le offerte <?= $OPERATORE_ENERGETICO ?> Smart Flex paghi l'energia al prezzo all'ingrosso del mercato — il PUN Index GME per la luce e il PSV per il gas — maggiorato di una fee chiara e di un corrispettivo annuo fisso. Nessun ricarico nascosto: segui l'andamento del mercato con la massima trasparenza, sia per la casa che per la tua attività.
        </p>
        <div style="display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 24px;">
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Prezzo indicizzato PUN / PSV</div>
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Fee trasparente</div>
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Luce e Gas · Casa e Business</div>
        </div>
        <img src="illumia_logo.png" alt="<?= $OPERATORE_ENERGETICO ?> Logo" style="max-width: 200px; height: auto;">
      </div>
      <div style="flex: 0.8; min-width: 300px; display: flex; justify-content: center;">
        <img src="hero_new.jpg" alt="Risparmio <?= $OPERATORE_ENERGETICO ?>"
          style="max-width: 100%; height: auto; border-radius: var(--radius-lg); box-shadow: 0 20px 40px rgba(4, 8, 50, 0.08);">
      </div>
    </div>
  </main>

  <p class="price-disclaimer" id="price-disclaimer"
    style="max-width: 1200px; margin: 40px auto; padding: 0 20px; font-size: 13px; line-height: 1.7; color: var(--text-muted); text-align: left;">
    * Offerte a prezzo variabile aggiornato mensilmente, valide fino al 10/07/2026. Corrispettivi definiti da <?= $OPERATORE_ENERGETICO ?>.
    <strong>Energia elettrica:</strong> Prezzo Luce = PUN Index GME × (1+λ) + Fee, dove λ è il valore delle perdite di rete (10% per le forniture in bassa tensione, come stabilito da ARERA) e la Fee è quella indicata nella tabella corrispettivi. Si applica inoltre il corrispettivo di dispacciamento CDISPD definito da ARERA nel Testo Integrato della Vendita (TIV). Il PUN Index GME è l'indice di cui all'art. 13.3.9 del TIDE, calcolato dal GME come media aritmetica mensile delle quotazioni orarie nel mese di fatturazione in base alle fasce applicate al cliente; in caso di misuratore non telegestito si applica la fee monoraria a tutte le ore. Il valore massimo dell'indice negli ultimi 12 mesi è stato 0,14340 €/kWh (Marzo 2026); tutti i valori sono su www.mercatoelettrico.org.
    <strong>Gas naturale:</strong> Prezzo Gas = PSV + Fee, dove il PSV è determinato dalla media aritmetica mensile dei prezzi giornalieri "PSV Price Assessment - Day Ahead" pubblicati nell'"European Gas Spot Market Report" da ICIS Heren (con riferimento "PSV Price Assessment - Weekend" per weekend e Bank Holiday), convertito da €/MWh a €/Smc con coefficiente moltiplicativo pari a 0,0107. Il valore massimo dell'indice PSV negli ultimi 12 mesi è stato 0,5577 €/Smc (PCS 0,038520 GJ/Smc, Marzo 2026). I corrispettivi sul consumo sono riferiti a un PCS pari a 0,03852 GJ/Smc e a un coefficiente di conversione C pari a 1 (art. 6 RTDG) e sono suscettibili di adeguamento in proporzione ai valori di PCS approvati da ARERA per l'ambito tariffario del punto di riconsegna.
    Fasce orarie — F1: lun-ven 8:00-19:00; F2: lun-ven 7:00-8:00 e 19:00-23:00, sab 7:00-23:00; F3: lun-sab 0:00-7:00 e 23:00-24:00, domenica e festivi tutto il giorno.
  </p>

  <script>
    const fornitore = '<?= $OPERATORE_ENERGETICO ?>';
    const offers = [
      {
        id: 'smart-flex-luce',
        categoria: 'Uso Domestico',
        esclusiva: true,
        nome: fornitore + ' Smart Flex',
        tipo: 'Luce',
        corrispettivoAnnuo: '180 €/POD/anno',
        feeConsumo: 'PUN Index GME + 0,079 €/kWh',
        features: [
          'Prezzo variabile indicizzato al PUN Index GME',
          'Fee monoraria F0: 0,079 €/kWh · bioraria F1 e F2+F3: 0,079 €/kWh',
          'Corrispettivo annuo 180 €/POD',
          'Offerta valida fino al 10/07/2026'
        ]
      },
      {
        id: 'smart-flex-gas',
        categoria: 'Uso Domestico',
        esclusiva: false,
        nome: fornitore + ' Smart Flex Gas',
        tipo: 'Gas',
        corrispettivoAnnuo: '144 €/PDR/anno',
        feeConsumo: 'PSV + 0,34 €/Smc',
        features: [
          'Prezzo variabile indicizzato al PSV',
          'Fee sul consumo: 0,34 €/Smc',
          'Corrispettivo annuo 144 €/PDR',
          'Offerta valida fino al 10/07/2026'
        ]
      },
      {
        id: 'smart-flex-business-luce',
        categoria: 'Uso Business',
        esclusiva: false,
        nome: fornitore + ' Smart Flex Business',
        tipo: 'Luce',
        corrispettivoAnnuo: '192 €/POD/anno',
        feeConsumo: 'PUN Index GME + 0,085 €/kWh',
        features: [
          'Per usi diversi dal domestico e condomini fino a 10.000 kWh/anno',
          'Fee monoraria F0: 0,085 €/kWh · trioraria F1/F2/F3: 0,085 €/kWh',
          'Corrispettivo annuo 192 €/POD',
          'Offerta valida fino al 10/07/2026'
        ]
      },
      {
        id: 'smart-flex-business-gas',
        categoria: 'Uso Business',
        esclusiva: false,
        nome: fornitore + ' Smart Flex Business Gas',
        tipo: 'Gas',
        corrispettivoAnnuo: '192 €/PDR/anno',
        feeConsumo: 'PSV + 0,44 €/Smc',
        features: [
          'Per siti ad uso non domestico',
          'Fee sul consumo: 0,44 €/Smc',
          'Corrispettivo annuo 192 €/PDR',
          'Offerta valida fino al 10/07/2026'
        ]
      }
    ];

    const resultsEl = document.getElementById('results');
    resultsEl.innerHTML = offers.map(o => `
    <article class="offer-card${o.esclusiva ? ' exclusive' : ''}" style="border-radius: 12px; overflow: hidden; border: 1px solid var(--border); background: #fff; display: flex; flex-direction: column;">
      <div class="offer-card-ribbon" style="background: ${o.esclusiva ? 'var(--primary)' : 'var(--secondary)'}; color: #fff; padding: 8px; text-align: center; font-weight: 700; font-size: 14px;">${o.esclusiva ? '🔥 La più scelta' : o.categoria}</div>
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
