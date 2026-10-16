<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';
include __DIR__ . '/header.php';
?>

  <section class="page-hero contact-page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Contattaci</span>
      <h1>Parliamo di <span class="accent">energia</span></h1>
      <p>Raccontaci di cosa hai bisogno: ti aiutiamo a leggere la bolletta e a trovare una soluzione più adatta ai tuoi consumi.</p>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

  <main class="section" style="padding: 80px 0 var(--section);">
    <div class="container">
      <div class="contact-grid contact-page-grid">

        <aside class="contact-intro reveal">
          <span class="eyebrow"><span class="dot"></span> Consulenza gratuita</span>
          <h2>Facciamo chiarezza, insieme.</h2>
          <p>Non serve conoscere tutte le sigle del mercato energia. Ci pensiamo noi a confrontare la tua situazione e a spiegarti ogni passaggio con parole semplici.</p>
          <div class="contact-points">
            <div><span>01</span><strong>Ci racconti la tua esigenza</strong><small>Casa, lavoro o piccola impresa.</small></div>
            <div><span>02</span><strong>Analizziamo i tuoi consumi</strong><small>Partiamo dalla bolletta, senza supposizioni.</small></div>
            <div><span>03</span><strong>Ti proponiamo una scelta chiara</strong><small>Senza impegno e senza costi di consulenza.</small></div>
          </div>
        </aside>

        <div id="contatto-form" class="reveal">
          <div class="contact-form contact-page-form">
            <div class="form-kicker">Il primo passo è semplice</div>
            <h3>Parliamo della tua fornitura</h3>
            <p class="sub">Compila il form e ti ricontatteremo per una prima valutazione.</p>

            <form id="leadForm" method="POST" novalidate>
              <div class="form-group">
                <label class="form-label" for="fNome">Nome e Cognome *</label>
                <input class="form-input" id="fNome" name="nome" type="text" placeholder="Mario Rossi" required>
                <div class="field-error" data-error-for="fNome"></div>
              </div>

              <div class="form-group">
                <label class="form-label" for="fTel">Telefono *</label>
                <input class="form-input" id="fTel" name="telefono" type="tel" placeholder="333 1234567" required pattern="[0-9 +]{8,}">
                <div class="field-error" data-error-for="fTel"></div>
              </div>

              <div class="form-group">
                <label class="form-label" for="fEmail">Email</label>
                <input class="form-input" id="fEmail" name="email" type="email" placeholder="mario.rossi@email.it">
                <div class="field-error" data-error-for="fEmail"></div>
              </div>

              <div class="form-group" style="margin-top: 28px;">
                <label class="consent-label" style="margin-top:12px;">
                  <input type="checkbox" name="consenso_privacy" required style="flex-shrink:0;margin-top:3px;">
                  <span>Dichiaro di aver preso visione dell'<a href="privacy-policy.php">informativa privacy</a> ai sensi del Regolamento (UE) 2016/679. *</span>
                </label>
                <label class="consent-label">
                  <input type="checkbox" name="consenso_ricontatto" required style="flex-shrink:0;margin-top:3px;">
                  <span>Richiedo di essere ricontattato da <?= $OPERATORE['nome_legale'] ?>, tramite il partner commerciale <?= $COMPANY['company_name'] ?>, per ricevere informazioni e proposte commerciali relative alla fornitura di energia elettrica e/o gas. *</span>
                </label>

              </div>

              <button type="submit" class="btn-primary" id="btnSubmit" disabled style="width: 100%; padding: 17px; font-size: 16px; margin-top: 24px;">
                Invia richiesta
                <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </button>
            </form>

            <div id="conferma" class="contact-success" hidden>
              <div style="font-size: 56px; margin-bottom: 12px;">✅</div>
              <strong style="font-size: 17px;">Richiesta inviata con successo!</strong>
              <p style="margin: 8px 0 0; font-size: 14.5px;">Un nostro consulente ti contatterà entro 24 ore lavorative.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>

  <script src="lead-form.js"></script>
  <script>
    // Reveal on scroll
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));
  </script>

<?php include __DIR__ . '/footer.php'; ?>
