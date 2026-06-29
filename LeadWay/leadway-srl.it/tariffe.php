<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe';
$pageHead = <<<'HTML'
<style>
  .tf-desc { color: var(--text-muted, #64748b); font-size: 14px; margin: 2px 0 14px; line-height: 1.5; }
  .tf-bonus { display:inline-block; background: rgba(22,163,74,.08); color:#16a34a; font-weight:700; font-size:14px; padding:4px 12px; border-radius:8px; margin-bottom:14px; }
  .tf-block { border:1px solid var(--border, #e2e8f0); border-radius:12px; padding:12px 14px; margin-bottom:12px; }
  .tf-promo { background: linear-gradient(135deg,#f59e0b,#fbbf24); color:#1f2937; font-weight:700; font-size:13px; padding:6px 10px; border-radius:8px; margin-bottom:10px; }
  .tf-block-label { font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:.04em; color:var(--accent); margin-bottom:6px; }
  .tf-price-label { font-size:12px; color:var(--text-muted, #64748b); }
  .tf-price { font-size:30px; font-weight:800; color:var(--accent); line-height:1.1; }
  .tf-unit { font-size:14px; font-weight:600; color:var(--text-muted, #64748b); margin-left:3px; }
  .tf-orig { font-size:13px; color:var(--text-muted, #94a3b8); margin-top:2px; }
  .tf-orig s { color:#ef4444; }
  .tf-quota { font-size:13px; color:var(--text-dark); margin-top:8px; font-weight:600; }
  .tf-features { list-style:none; padding:0; margin:14px 0; display:flex; flex-direction:column; gap:8px; }
  .tf-features li { font-size:13px; color:var(--text-dark); display:flex; gap:8px; align-items:flex-start; line-height:1.4; }
  .tf-features li::before { content:'\2713'; color:#16a34a; font-weight:800; flex:none; }
</style>
HTML;
include __DIR__ . '/header.php';
?>

<main class="container" style="margin-top: 60px;">
  <h2 class="section-title" style="text-align:center;">Le offerte ufficiali <?= $OPERATORE_ENERGETICO ?></h2>
  <p class="section-sub">In partnership con <?= $OPERATORE_ENERGETICO ?> per garantirti il massimo risparmio su luce e gas</p>

  <div class="results-list" id="results"></div>
</main>

<script>
  // Offerte reali Enel Energia. Prezzi e condizioni come da listini ufficiali Enel.
  const offers = [
    // ─────────────── LUCE ───────────────
    {
      id: 'enel-fix-web-luce',
      categoria: 'Luce',
      badge: 'Solo online',
      nome: 'Enel Fix Web Luce',
      descr: 'Per te che sei già cliente Gas o lo stai diventando scegli i vantaggi dell’offerta Enel Fix Web Luce.',
      bonus: 'Bonus 90€ nelle bollette',
      blocks: [
        { promo: 'Risparmio del 20%* per 3 anni', prezzo: '0,139', unita: '€/kWh', originale: '0,174', quota: '144', quotaUnita: '€/POD/Anno' }
      ],
      features: [
        'Risparmio del 20%* sul prezzo Luce per 3 anni',
        'Prezzo Luce stabile e sicuro per 3 anni',
        'Bonus 90€ nelle bollette',
        'Bolletta Web e addebito diretto obbligatori',
        'Fatturazione mensile',
        'Compatibile con la piattaforma ebitts'
      ]
    },
    {
      id: 'enel-flex-control-luce',
      categoria: 'Luce',
      badge: 'Prezzo variabile con limite al PUN Index GME',
      nome: 'Enel Flex Control Luce',
      descr: 'L’offerta indicizzata senza sorprese con un tetto massimo al prezzo Luce.',
      blocks: [
        { promo: 'Un tetto massimo agli aumenti', prezzoLabel: 'Contributo al consumo (α)', prezzo: '0,022', unita: '€/kWh', quota: '180', quotaUnita: '€/POD/Anno' }
      ],
      features: [
        'Prezzo Luce: PUN Index GME + α',
        'Tetto massimo prezzo Luce: 0,174 €/kWh',
        'A scelta, Addebito diretto su c/c o avviso di pagamento',
        'Bolletta Web obbligatoria',
        'Compatibile con la piattaforma ebitts'
      ]
    },
    {
      id: 'enel-fix-luce',
      categoria: 'Luce',
      badge: 'Offerta dedicata clienti Gas',
      nome: 'Enel Fix Luce',
      descr: 'Se sei già cliente Gas o vuoi diventarlo scegli Enel Fix Luce.',
      blocks: [
        { promo: 'Sconto del 20%* per i primi 100 kWh ogni mese per 2 anni', prezzo: '0,139', unita: '€/kWh', originale: '0,174', quota: '144', quotaUnita: '€/POD/Anno' }
      ],
      features: [
        'Offerta con sconto dedicato a te che sei già cliente Gas o aderisci contestualmente al Gas',
        'Sconto del 20% sul prezzo Luce per i primi 100 kWh del mese per 2 anni',
        'Prezzo Luce stabile e sicuro per i primi 2 anni',
        'Bolletta Web e addebito diretto obbligatori',
        'Compatibile con la piattaforma ebitts'
      ]
    },
    // ─────────────── GAS ───────────────
    {
      id: 'enel-fix-web-gas',
      categoria: 'Gas',
      badge: 'Solo online',
      nome: 'Enel Fix Web Gas',
      descr: 'Per te che sei già cliente Luce o lo stai diventando scegli i vantaggi dell’offerta Enel Fix Web Gas.',
      bonus: 'Bonus 110€ nelle bollette',
      blocks: [
        { promo: 'Risparmio del 30%* per 3 anni', prezzo: '0,490', unita: '€/Smc', originale: '0,700', quota: '144', quotaUnita: '€/PDR/Anno' }
      ],
      features: [
        'Risparmio del 30%* sul prezzo di listino del Gas per 3 anni',
        'Prezzo Gas stabile e sicuro per 3 anni',
        'Bonus 110€ nelle bollette',
        'Bolletta Web e addebito diretto obbligatori',
        'Fatturazione mensile'
      ]
    },
    {
      id: 'enel-flex-control-gas',
      categoria: 'Gas',
      badge: 'Prezzo variabile con limite al PSV',
      nome: 'Enel Flex Control Gas',
      descr: 'L’offerta indicizzata senza sorprese con un tetto massimo al prezzo Gas.',
      blocks: [
        { promo: 'Un tetto massimo agli aumenti', prezzoLabel: 'Contributo al consumo (α)', prezzo: '0,110', unita: '€/Smc', quota: '180', quotaUnita: '€/PDR/Anno' }
      ],
      features: [
        'Prezzo Gas: PSV + α',
        'Tetto massimo prezzo Gas: 0,80 €/Smc',
        'A scelta, Addebito diretto su c/c o avviso di pagamento',
        'Bolletta Web obbligatoria'
      ]
    },
    {
      id: 'enel-move-gas',
      categoria: 'Gas',
      badge: 'Servizio Enel Move Plus Gas incluso',
      nome: 'Enel Move Gas',
      descr: 'Scegli l’offerta gas con il servizio Enel Move Plus Gas di Enel Energia incluso.',
      blocks: [
        { promo: 'Prezzo gas stabile e sicuro per 2 anni', prezzo: '0,700', unita: '€/Smc', quota: '156', quotaUnita: '€/PDR/Anno' }
      ],
      features: [
        'A scelta, Addebito diretto su c/c o avviso di pagamento',
        'A scelta, Bolletta Web o cartacea'
      ]
    },
    // ─────────────── LUCE E GAS ───────────────
    {
      id: 'enel-fix-web-luce-gas',
      categoria: 'Luce e Gas',
      badge: 'Solo online',
      nome: 'Enel Fix Web Luce e Gas',
      descr: 'Scegli le offerte Luce e Gas da web per ottenere vantaggi esclusivi.',
      bonus: 'Bonus 200€ nelle bollette',
      blocks: [
        { label: 'Luce', promo: 'Risparmio del 20%* per 3 anni', prezzo: '0,139', unita: '€/kWh', originale: '0,174', quota: '144', quotaUnita: '€/POD/Anno' },
        { label: 'Gas', promo: 'Risparmio del 30%* per 3 anni', prezzo: '0,490', unita: '€/Smc', originale: '0,700', quota: '144', quotaUnita: '€/PDR/Anno' }
      ],
      features: [
        'Con luce e gas insieme hai più vantaggi!',
        'Prezzo Luce e Gas stabile e sicuro per 3 anni',
        'Bonus 200€ nelle bollette',
        'Bolletta Web e addebito diretto obbligatori',
        'Fatturazione mensile',
        'Compatibile con la piattaforma ebitts'
      ]
    },
    {
      id: 'enel-fix-luce-gas',
      categoria: 'Luce e Gas',
      badge: 'Enel non aumenta i prezzi',
      nome: 'Enel Fix Luce e Gas',
      descr: 'Scegli le offerte con un prezzo della Luce e del Gas stabili e sicuri per 2 anni.',
      blocks: [
        { label: 'Luce', promo: 'Sconto 20%* per i primi 100 kWh ogni mese per 2 anni', prezzo: '0,139', unita: '€/kWh', originale: '0,174', quota: '144', quotaUnita: '€/POD/Anno' },
        { label: 'Gas', promo: 'Sconto del 30%** e prezzo stabile e sicuro per 2 anni', prezzo: '0,490', unita: '€/Smc', originale: '0,700', quota: '144', quotaUnita: '€/PDR/Anno' }
      ],
      features: [
        'Sconto del 20% sul prezzo Luce per i primi 100 kWh del mese per 2 anni',
        'Sconto del 30% sul prezzo Gas per i primi 100 kWh per 2 anni',
        'Prezzo Luce e Gas stabile e sicuro per 2 anni',
        'Bolletta Web obbligatoria',
        'Addebito diretto obbligatorio per l’offerta Enel Fix Luce'
      ]
    },
    {
      id: 'enel-move-luce-gas',
      categoria: 'Luce e Gas',
      badge: 'Solo online',
      nome: 'Enel Move Luce e Gas',
      descr: 'Scegli l’offerta luce e gas con i servizi Enel Move Plus Luce e Gas di Enel Energia inclusi, e se le attivi insieme 120€ di bonus nelle bollette luce e gas.',
      bonus: 'Bonus di 120€ nelle bollette',
      blocks: [
        { label: 'Luce', promo: 'Prezzo luce stabile e sicuro per 2 anni', prezzo: '0,179', unita: '€/kWh', quota: '156', quotaUnita: '€/POD/Anno' },
        { label: 'Gas', promo: 'Prezzo gas stabile e sicuro per 2 anni', prezzo: '0,700', unita: '€/Smc', quota: '156', quotaUnita: '€/PDR/Anno' }
      ],
      features: [
        'Bonus di 120€ nelle bollette',
        'A scelta, Addebito diretto su c/c o carta di credito o avviso di pagamento',
        'A scelta, Bolletta Web o cartacea',
        'Offerta disponibile solo per richiesta di subentro, voltura e prima attivazione'
      ]
    }
  ];

  const renderBlock = (b, dual) => `
    <div class="tf-block">
      ${b.label && dual ? `<div class="tf-block-label">${b.label}</div>` : ''}
      <div class="tf-promo">${b.promo}</div>
      ${b.prezzoLabel ? `<div class="tf-price-label">${b.prezzoLabel}</div>` : ''}
      <div class="tf-price">${b.prezzo}<span class="tf-unit">${b.unita}</span></div>
      ${b.originale ? `<div class="tf-orig">invece di <s>${b.originale} ${b.unita}</s></div>` : ''}
      <div class="tf-quota">Quota fissa: ${b.quota} ${b.quotaUnita}</div>
    </div>`;

  const resultsEl = document.getElementById('results');
  resultsEl.innerHTML = offers.map(o => {
    const dual = o.blocks.length > 1;
    return `
    <article class="offer-card">
      <div class="offer-card-ribbon">${o.categoria} · ${o.badge}</div>
      <div class="offer-card-body">
        <span class="offer-name" style="font-size:20px; font-weight:800; color:var(--text-dark);">${o.nome}</span>
        <p class="tf-desc">${o.descr}</p>
        ${o.bonus ? `<div class="tf-bonus">⭐ ${o.bonus}</div>` : ''}
        ${o.blocks.map(b => renderBlock(b, dual)).join('')}
        <ul class="tf-features">${o.features.map(f => `<li>${f}</li>`).join('')}</ul>
        <button type="button" class="btn-cta" style="padding:14px; border-radius:14px;" data-offer-id="${o.id}">🔥 Ti richiamiamo gratis</button>
      </div>
    </article>`;
  }).join('');

  resultsEl.addEventListener('click', e => {
    const btn = e.target.closest('[data-offer-id]');
    if (!btn) return;
    const o = offers.find(x => x.id === btn.dataset.offerId);
    if (!o) return;
    window.location.href = 'contatti.php?offerta=' + encodeURIComponent(o.nome) + '#contatto-form';
  });
</script>

<?php include __DIR__ . '/footer.php'; ?>
