<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe';

// Catalogo offerte: dati statici (non fanno parte dell'anagrafica azienda API).
// Il nome dell'operatore (dal .env) viene passato al JS come costante PROVIDER.
$operatoreJs = json_encode(html_entity_decode($OPERATORE['nome_marketing'], ENT_QUOTES, 'UTF-8'));
$pageScripts = "  <script>const PROVIDER = $operatoreJs;</script>\n" . <<<'JS'
  <script>
    const offers = [
      {
        id: 'acea-sprint-luce',
        esclusiva: true,
        nome: 'Acea Energia Sprint Web',
        sottotitolo: 'LUCE',
        fornitore: PROVIDER,
        tipo: 'Offerta esclusiva web',
        bollettaMensile: 8.00,
        bollettaAnnua: 96.00,
        risparmio: 0,
        features: [
          'PUN Index GME + 0,007000 €/kWh',
          'Monorario uguale per tutte le ore del giorno',
          'Corrispettivo annuo 96,00 €/anno',
          'Prezzi validi per i primi 12 mesi',
          'Valida fino al 30-09-2026'
        ]
      },
      {
        id: 'acea-sprint-gas',
        esclusiva: true,
        nome: 'Acea Energia Sprint Web',
        sottotitolo: 'GAS',
        fornitore: PROVIDER,
        tipo: 'Offerta esclusiva web',
        bollettaMensile: 8.00,
        bollettaAnnua: 96.00,
        risparmio: 0,
        features: [
          'PSV + 0,043000 €/Smc',
          'Prezzo valido tutto il giorno',
          'Corrispettivo annuo 96,00 €/anno',
          'Prezzi validi per i primi 12 mesi',
          'Valida fino al 30-09-2026'
        ]
      },
      {
        id: 'acea-sprint-dual',
        esclusiva: true,
        nome: 'Acea Energia Sprint Web',
        sottotitolo: 'LUCE E GAS',
        fornitore: PROVIDER,
        tipo: 'Offerta esclusiva web',
        bollettaMensile: 16.00,
        bollettaAnnua: 192.00,
        risparmio: 0,
        features: [
          'Luce: PUN Index GME + 0,007000 €/kWh',
          'Gas: PSV + 0,043000 €/Smc',
          'Corrispettivo annuo 192,00 €/anno',
          'Prezzi validi per i primi 12 mesi',
          'Valida fino al 30-09-2026'
        ]
      }
    ];

    const fmt = n => n.toLocaleString('it-IT', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    const resultsEl = document.getElementById('results');
    resultsEl.innerHTML = offers.map(o => `
    <article class="offer-card${o.esclusiva ? ' exclusive' : ''}">
      <div class="offer-card-ribbon">${o.esclusiva ? 'OFFERTA ESCLUSIVA WEB' : 'Offerta Standard'}</div>
      <div class="offer-card-body" style="padding: 40px;">
        <div style="margin-bottom: 24px;">
          <img src="logo-acea-energia.png" alt="Logo ${o.fornitore}" style="height: 40px; margin-bottom: 20px;">
        </div>
        <div class="offer-card-header" style="margin-bottom: 24px; align-items: flex-start;">
          <div>
            <div class="offer-name-wrap"><span class="offer-name" style="font-size: 26px; font-weight: 800; font-family: var(--font-h); color: var(--accent);">${o.nome}</span></div>
            ${o.sottotitolo ? `<div style="font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--accent); margin-top: 6px;">${o.sottotitolo}</div>` : ''}
            <div class="offer-provider" style="margin-top: 4px;">${o.fornitore} · ${o.tipo}</div>
          </div>
        </div>
        <div class="offer-features" style="display: flex; flex-direction: column; gap: 14px; margin-bottom: 32px;">${o.features.map(f => `<span class="offer-tag" style="display: flex; align-items: center; gap: 10px; font-weight: 500; border-radius: 8px; color: var(--text-label); background: #f1f5f9;"><span style="color: var(--accent); font-size: 18px;">✓</span> ${f}</span>`).join('')}</div>
        <button type="button" class="btn-primary" style="width: 100%; border: none; cursor: pointer;" data-offer-id="${o.id}">Attiva ora</button>
      </div>
    </article>`).join('');

    resultsEl.addEventListener('click', e => {
      const btn = e.target.closest('[data-offer-id]');
      if (!btn) return;
      const o = offers.find(x => x.id === btn.dataset.offerId);
      if (!o) return;
      window.location.href = 'contatti.php?offerta=' + encodeURIComponent(o.nome + ' (' + o.fornitore + ')') + '#contatto-form';
    });
  </script>
JS;

include __DIR__ . '/header.php';
?>

  <section class="hero"
    style="background: linear-gradient(rgba(4, 8, 50, 0.7), rgba(4, 8, 50, 0.7)), url('hero_telecom.png') center/cover no-repeat; color: #ffffff; padding: var(--section-padding) 20px; height: auto; min-height: 400px; text-align: center; display: flex; align-items: center; justify-content: center;">
    <div class="hero-wrapper"
      style="max-width: 900px; margin: 0 auto; text-align: center; display: flex; flex-direction: column; align-items: center;">
      <div
        style="display: flex; align-items: center; gap: 12px; background: rgba(255, 255, 255, 0.1); padding: 8px 16px; border-radius: 100px; margin-bottom: 24px; border: 1px solid rgba(255, 255, 255, 0.2);">
        <span style="font-size: 14px; text-transform: uppercase; letter-spacing: 1px; font-weight: 600;">Official
          Partner</span>
        <img src="logo-acea-energia.png" alt="<?= $OPERATORE['nome_marketing'] ?>" style="height: 24px; filter: brightness(0) invert(1);">
      </div>
      <h1 style="font-size: clamp(40px, 6vw, 64px); margin: 0 0 24px; max-width: 800px; font-weight: 800;">L'energia che
        conviene con <?= $OPERATORE['nome_marketing'] ?></h1>
      <p style="font-size: 20px; color: rgba(255, 255, 255, 0.9); margin: 0; max-width: 700px;">Scegli la sicurezza:
        avrai un esperto dedicato per individuare il contratto su misura per te, assicurandoti un supporto continuo nel
        tempo!</p>
    </div>
  </section>

  <main class="container" style="max-width: 1280px; margin: var(--section-padding) auto; padding: 0 20px;">
    <section class="tariffe-fix-section">
      <div class="tariffe-fix-header">
        <h2>Acea Energia Fix</h2>
        <p>Hai tempo fino al 02-07-2026</p>
      </div>

      <div class="tariffe-fix-grid">
        <!-- LUCE -->
        <article class="tariffa-fix-card">
          <div class="tariffa-fix-badge">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6"/><path d="M10 22h4"/><path d="M12 2a7 7 0 0 0-7 7c0 2.38 1.19 4.47 3 5.74V17h8v-2.26C17.81 13.47 19 11.38 19 9a7 7 0 0 0-7-7z"/></svg>
            <span>Luce</span>
          </div>
          <div class="tariffa-fix-content">
            <div class="tariffa-fix-toggle">
              <button type="button" class="active">monoraria</button>
              <button type="button">fasce</button>
            </div>
            <p class="tariffa-fix-desc">Adatta se consumi elettricità ogni giorno a qualsiasi ora</p>

            <div class="tariffa-fix-row">
              <span>Corrispettivo per il consumo</span>
              <span class="tariffa-fix-price">0,125000€/kWh
                <svg class="tariffa-fix-info" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
              </span>
            </div>
            <div class="tariffa-fix-row">
              <span>
                <svg class="tariffa-fix-info" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                Fascia F0
              </span>
            </div>
            <div class="tariffa-fix-row">
              <span>Corrispettivo annuo</span>
              <span class="tariffa-fix-price">90,00€/anno</span>
            </div>

            <p class="tariffa-fix-note">Prezzi validi per i primi 12 mesi.</p>
          </div>
        </article>

        <!-- GAS -->
        <article class="tariffa-fix-card">
          <div class="tariffa-fix-badge">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2s-3 3-3 7c0 2 .5 3 1.5 4-1.5-1-2.5-2.5-2.5-5 0-3 2.5-5.5 4-6 1.5.5 4 3 4 6 0 2.5-1 4-2.5 5 1-1 1.5-2 1.5-4 0-3.5-3-7-3-7z"/><path d="M12 22a5 5 0 0 1-5-5c0-2 1.5-3.5 3-5 1 1.5 2 3 2 5a5 5 0 0 1-5 5z"/></svg>
            <span>Gas</span>
          </div>
          <div class="tariffa-fix-content">
            <p class="tariffa-fix-desc">Prezzo valido tutto il giorno</p>

            <div class="tariffa-fix-row">
              <span>Corrispettivo per il consumo</span>
              <span class="tariffa-fix-price">0,520000€/Smc</span>
            </div>
            <div class="tariffa-fix-row">
              <span>Corrispettivo annuo</span>
              <span class="tariffa-fix-price">90,00€/anno</span>
            </div>

            <p class="tariffa-fix-note">Prezzi validi per i primi 12 mesi</p>
          </div>
        </article>
      </div>
    </section>

    <div class="results-list" id="results"
      style="display: grid; grid-template-columns: repeat(auto-fit, minmax(380px, 1fr)); gap: var(--gutter);"></div>

    <div style="margin-top: 120px; display: flex; align-items: center; gap: var(--gutter); flex-wrap: wrap;">
      <div style="flex: 1; min-width: 300px;">
        <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 36px;">Ottimizza le tue utenze
        </h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
          <?= $brandName ?> va oltre la semplice fornitura di energia. Il nostro scopo è proteggerti dai costi eccessivi
          attraverso consigli chiari e costanti sulle tue utenze. Avrai sempre una figura di riferimento a tua disposizione, eliminando
          lo stress dei call center.
        </p>
        <div style="display: flex; gap: 16px;">
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Luce</div>
          <div class="tag"
            style="background: var(--accent-bg); color: var(--accent); padding: 8px 16px; border-radius: 100px; font-weight: 600;">
            Gas</div>
        </div>
      </div>
      <div style="flex: 0.8; min-width: 300px; display: flex; justify-content: center;">
        <img src="services_telecom.png" alt="Risparmio Utenze"
          style="max-width: 100%; height: auto; border-radius: var(--radius-lg); box-shadow: 0 20px 40px rgba(4, 8, 50, 0.08);">
      </div>
    </div>
  </main>

  <p class="price-disclaimer" id="price-disclaimer"
    style="max-width: 1200px; margin: 40px auto; padding: 0 20px; font-size: 14px; color: var(--text-muted); text-align: center;">
    * Stime basate su profilo medio. Importi soggetti a variazioni in base a consumo, zona e potenza. Dati aggiornati
    secondo il portale ufficiale <?= $OPERATORE['nome_marketing'] ?>.
  </p>

  <section class="info-section"
    style="padding: 60px 20px; background: var(--bg-cream); border-radius: 32px; max-width: 1200px; margin: 80px auto;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 40px;">
      <div>
        <h4 style="color: var(--accent); margin-bottom: 16px; font-weight: 700;">Dettagli Contrattuali</h4>
        <ul style="font-size: 15px; color: var(--text-secondary); padding-left: 20px; line-height: 1.8;">
          <li>Fatturazione: Mensile</li>
          <li>Durata: Tempo indeterminato</li>
          <li>Ripensamento: 14 giorni solari</li>
          <li>Metodi: SDD, Area Clienti, PayPal, Carte</li>
        </ul>
      </div>
      <div>
        <h4 style="color: var(--accent); margin-bottom: 16px; font-weight: 700;">Bonus & Sconti</h4>
        <ul style="font-size: 15px; color: var(--text-secondary); padding-left: 20px; line-height: 1.8;">
          <li>Sconto Domiciliazione: -2,00 €/mese</li>
          <li>Sconto Fattura Elettronica: -1,00 €/mese</li>
          <li>Bonus Fedeltà: -1,50 €/mese (dopo 12m)</li>
          <li>Attivazione: Gratuita (promo online)</li>
        </ul>
      </div>
      <div>
        <h4 style="color: var(--accent); margin-bottom: 16px; font-weight: 700;">Altre Informazioni</h4>
        <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6;">
          Nessun costo di attivazione per le offerte con domiciliazione bancaria. Disattivazione anticipata secondo le normative vigenti Agcom.
        </p>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
