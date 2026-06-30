<?php
require __DIR__ . '/_config.php';
$pageTitle = 'L\'energia di domani, oggi a casa tua';
include __DIR__ . '/header.php';
?>

  <section class="hero" id="hero" style="background-image: url('hero_main.jpg');">
    <div class="hero-overlay" style="background: linear-gradient(90deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0) 100%);"></div>
    <div class="container">
      <div class="hero-content">
        <span class="hero-tag">Energia Intelligente</span>
        <h1 id="hero-title">L'energia di domani, oggi a casa tua.</h1>
        <p id="hero-text">Scegli l'efficienza e la trasparenza per le tue utenze di luce e gas. Un servizio clienti sempre presente e tariffe pensate per farti risparmiare davvero.</p>

        <div class="hero-actions">
          <a href="tariffe.php" class="btn-primary">Scopri le offerte</a>
          <a href="contatti.php" class="btn-secondary">Parla con noi</a>
        </div>
      </div>
    </div>
    <div class="hero-wave">
      <svg viewBox="0 0 1440 120" preserveAspectRatio="none" style="width: 100%; height: 100%;">
        <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
      </svg>
    </div>
  </section>

  <section class="features-section" style="background: #fff; padding: 100px 20px;">
    <div style="max-width: 900px; margin: 0 auto 60px; text-align: center;">
      <h2 class="section-title" style="font-size: 42px; margin-bottom: 20px; color: var(--text-dark);">Soluzioni intelligenti per la tua fornitura</h2>
      <p class="section-sub" style="font-size: 18px; color: var(--text-secondary);">Siamo al tuo fianco per aiutarti a ottimizzare i consumi ed evitare sprechi.</p>
    </div>

    <div class="features-container">
      <div class="trust-card">
        <img src="icon_transparency.png" alt="Trasparenza" class="trust-mascot">
        <h4>Costi Chiari</h4>
        <p>Nessuna voce nascosta. Le nostre bollette sono semplici da leggere e mostrano esattamente cosa stai pagando.</p>
      </div>
      <div class="trust-card">
        <img src="icon_consultant.png" alt="Consulente" class="trust-mascot">
        <h4>Supporto Dedicato</h4>
        <p>Il nostro team è sempre a disposizione per aiutarti a scegliere l'offerta più conveniente per le tue abitudini.</p>
      </div>
      <div class="trust-card">
        <img src="icon_audit.png" alt="Audit Energetico" class="trust-mascot">
        <h4>Monitoraggio Consumi</h4>
        <p>Ti forniamo gli strumenti per tenere d'occhio la tua spesa energetica in tempo reale.</p>
      </div>
    </div>
  </section>

  <section class="how-it-works-section">
    <div class="hiw-container">
      <div class="hiw-header">
        <h2 class="section-title">Attiva il tuo contratto in 4 passaggi</h2>
        <p class="section-sub">Passare a noi è un gioco da ragazzi, pensiamo a tutto noi.</p>
      </div>

      <div class="hiw-steps">
        <div class="hiw-step">
          <div class="hiw-number">1</div>
          <p>Scegli la soluzione più adatta alle tue esigenze.</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">2</div>
          <p>Fornisci i tuoi dati e l'ultima bolletta.</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">3</div>
          <p>Ci occupiamo noi di tutta la burocrazia per il passaggio.</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">4</div>
          <p>Inizia a risparmiare con la tua nuova fornitura.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="efficiency-section" style="padding: 100px 20px; background: #fff; overflow: hidden;">
    <div class="container" style="max-width: 1280px; margin: 0 auto; display: flex; align-items: center; gap: 80px; flex-wrap: wrap;">
      <div style="flex: 1.2; min-width: 400px;">
        <h2 class="section-title" style="text-align: left; font-size: 48px; line-height: 1.2; margin-bottom: 32px; color: var(--text-dark);"><?= $brandName ?> Fotovoltaico: <span style="color: var(--primary);">L'energia rinnovabile a casa tua</span></h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 24px;">
          Investire nell'energia solare significa proteggere l'ambiente e abbattere i costi in bolletta a lungo termine.
        </p>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin-bottom: 40px;">
          Proponiamo soluzioni su misura, progettando impianti fotovoltaici all'avanguardia per garantire la massima resa energetica.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
          <div style="background: var(--bg-cream); padding: 24px; border-radius: 12px; border-left: 4px solid var(--primary);">
            <h4 style="color: var(--text-dark); margin-bottom: 8px; font-weight: 700;">Qualità Superiore</h4>
            <p style="font-size: 14px; color: var(--text-secondary);">Utilizziamo solo pannelli ad alta efficienza e sistemi di accumulo di ultima generazione.</p>
          </div>
          <div style="background: var(--bg-cream); padding: 24px; border-radius: 12px; border-left: 4px solid var(--primary);">
            <h4 style="color: var(--text-dark); margin-bottom: 8px; font-weight: 700;">Chiavi in mano</h4>
            <p style="font-size: 14px; color: var(--text-secondary);">Gestiamo tutto noi: dal sopralluogo iniziale all'installazione, fino alla manutenzione.</p>
          </div>
        </div>
      </div>
      <div style="flex: 1; min-width: 400px;">
        <img src="efficiency_tech.jpg" alt="Efficienza Tecnologica" style="width: 100%; border-radius: 50% 50% 70% 50% / 50% 50% 70% 50%; box-shadow: 20px 20px 60px rgba(0,0,0,0.1);">
      </div>
    </div>
  </section>

  <section class="trustpilot-section">
    <div class="trustpilot-wrapper">
      <div class="tp-container">
        <div class="tp-stars">★★★★★</div>
        <p class="tp-text">Valutato <strong>Eccellente</strong> su <span class="tp-star-logo">★</span> <span
            class="tp-logo">Feedaty</span></p>
        <p class="tp-subtext">Le opinioni di chi ha già scelto i nostri servizi</p>
      </div>
      <div class="tp-reviews">
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Servizio fantastico!</h5>
          <p class="tp-review-body">Mi hanno spiegato ogni dettaglio dell'offerta senza fretta. Bollette finalmente comprensibili e più basse.</p>
          <p class="tp-review-author">Andrea P.</p>
        </div>
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Molto soddisfatta</h5>
          <p class="tp-review-body">Attivazione veloce e senza intoppi. Il servizio clienti ha risposto subito al mio primo dubbio.</p>
          <p class="tp-review-author">Marta S.</p>
        </div>
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Professionalità</h5>
          <p class="tp-review-body">Consiglio a tutti. Finalmente ho trovato un fornitore che non nasconde costi extra.</p>
          <p class="tp-review-author">Luca M.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="info-section" style="padding: 100px 20px; background: #fff; color: var(--text-dark);">
    <div class="container"
      style="max-width: 1280px; margin: 0 auto; display: flex; align-items: center; gap: 80px; flex-wrap: wrap;">
      <div style="flex: 1; min-width: 300px; display: flex; justify-content: center;">
        <img src="team_new.jpg" alt="Il Team <?= $brandName ?>"
          style="max-width: 100%; height: auto; border-radius: 50% 70% 50% 50% / 50% 70% 50% 50%; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
      </div>
      <div style="flex: 1.2; min-width: 300px; text-align: left; padding-left: 0;">
        <h2 class="section-title" style="text-align: left; margin-top: 0; font-size: 42px; line-height: 1.2;"><?= $brandName ?> Clima: Il comfort ideale in <span style="color: var(--primary);">ogni stagione</span></h2>
        <p style="font-size: 18px; line-height: 1.8; color: var(--text-secondary); margin: 32px 0;">
          Vivi la tua casa al massimo del comfort grazie ai nostri climatizzatori di ultima generazione. Soluzioni ad alta efficienza per rinfrescare l'estate e scaldare l'inverno, ottimizzando i consumi.
        </p>
        <a href="tariffe.php" class="btn-primary" style="display: inline-block;">Scopri le tariffe</a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
