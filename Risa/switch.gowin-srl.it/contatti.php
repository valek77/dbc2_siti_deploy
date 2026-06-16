<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';
$metaDescription = 'Contatta ' . $OPERATORE_ENERGETICO . ' per ricevere una consulenza gratuita sulle offerte di luce e gas. Siamo qui per aiutarti a scegliere la tariffa giusta.';

// Recapiti dall'API (con fallback ragionevoli se un campo manca).
$emailContatto = $email_supporto !== '' ? $email_supporto : $pec;
// href "tel:" con soli numeri e "+" (il valore mostrato resta quello dell'API).
$telHref = preg_replace('/[^0-9+]/', '', html_entity_decode($telefono, ENT_QUOTES, 'UTF-8'));

$pageScripts = <<<'JS'
  <script src="lead-form.js"></script>
  <script>
    // Reveal on scroll
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));
  </script>
JS;

include __DIR__ . '/header.php';
?>

<section class="page-hero">
  <div class="container">
    <span class="eyebrow eyebrow-light"><span class="dot"></span> Contattaci</span>
    <h1>Parliamo di <span class="accent">energia</span></h1>
    <p>Richiedi una consulenza gratuita: un nostro esperto ti contatterà.</p>
  </div>
  <div class="wave">
    <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
      <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z" />
    </svg>
  </div>
</section>

<main class="section" style="padding: 80px 0 var(--section);">
  <div class="container">
    <div class="contact-grid">

      <div class="reveal">
        <div class="contact-info-card">
          <h3 style="font-size: 22px; margin: 0 0 24px; color: var(--ink);">Come raggiungerci</h3>
          <div class="contact-info-list">

            <div class="contact-info-item">
              <div class="ico"><svg viewBox="0 0 24 24" fill="none">
                  <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke="currentColor" stroke-width="2"
                    stroke-linejoin="round" />
                  <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                </svg></div>
              <div>
                <div class="label">Sede Legale</div>
                <div class="meta"><?= $company_name ?></div>
                <div style="font-size: 14px; color: var(--muted); line-height: 1.5; margin-top: 4px;">
                  <?php if ($sede_legale) { ?>   <?= $sede_legale ?><br>
                  <?php } ?><?php if ($p_iva) { ?> P.IVA: <?= $p_iva ?><br>
                    C.F.: <?= $p_iva ?><br>
                    Vat Europeo: IT<?= $p_iva ?>
                  <?php } ?>
                </div>
              </div>
            </div>

            <?php if ($telHref) { ?>
              <div class="contact-info-item">
                <div class="ico"><svg viewBox="0 0 24 24" fill="none">
                    <path
                      d="M22 16.92V20a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 015 13.18 19.79 19.79 0 011.92 4.55 2 2 0 013.92 2.5h3.08a2 2 0 012 1.72c.13.96.36 1.9.69 2.8a2 2 0 01-.45 2.11L8.09 10.5a16 16 0 006 6l1.37-1.15a2 2 0 012.11-.45c.9.33 1.84.56 2.8.69a2 2 0 011.72 2.03z"
                      stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                  </svg></div>
                <div>
                  <div class="label">Contatti Rapidi</div>
                  <div class="meta">Telefono &amp; WhatsApp</div>
                  <a href="tel:<?= $telHref ?>"><?= $telefono ?></a>
                </div>
              </div>
            <?php } ?>

            <?php if ($emailContatto) { ?>
              <div class="contact-info-item">
                <div class="ico"><svg viewBox="0 0 24 24" fill="none">
                    <path d="M4 4h16c1 0 2 1 2 2v12c0 1-1 2-2 2H4c-1 0-2-1-2-2V6c0-1 1-2 2-2z" stroke="currentColor"
                      stroke-width="2" stroke-linejoin="round" />
                    <path d="M22 6l-10 7L2 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></div>
                <div>
                  <div class="label">Email</div>
                  <div class="meta">Informazioni &amp; Assistenza</div>
                  <a href="mailto:<?= $emailContatto ?>"><?= $emailContatto ?></a>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>

        <div class="contact-card-cta" style="margin-top:24px;">
          <div class="label">Offerta del momento</div>
          <div class="name">NEW <?= $OPERATORE_ENERGETICO ?> LUCE CASA</div>
          <div class="price">PUN +€0,03<small> €/kWh</small></div>
          <a class="see-all" href="tariffe.php" style="margin-top:15px;">Vedi tutte le offerte</a>
        </div>
      </div>

      <div id="contatto-form" class="reveal">
        <div class="contact-form">
          <h3>Richiedi una consulenza</h3>
          <p class="sub">Compila il form e ti ricontatteremo entro 24 ore.</p>

          <form id="leadForm" action="https://dbc2.datalia.it/api/lead" method="POST" novalidate>
            <div class="form-group">
              <label class="form-label" for="fNome">Nome e Cognome *</label>
              <input class="form-input" id="fNome" name="nome" type="text" placeholder="Mario Rossi" required>
              <div class="field-error" data-error-for="fNome"></div>
            </div>

            <div class="form-group">
              <label class="form-label" for="fTel">Telefono *</label>
              <input class="form-input" id="fTel" name="telefono" type="tel" placeholder="333 1234567" required
                pattern="[0-9 +]{8,}">
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
                <span>Dichiaro di aver preso visione dell'<a href="privacy-policy.php">informativa privacy</a> ai sensi
                  del Regolamento (UE) 2016/679. *</span>
              </label>
              <label class="consent-label">
                <input type="checkbox" name="consenso_ricontatto" required style="flex-shrink:0;margin-top:3px;">
                <span>Richiedo di essere ricontattato da <?= $OPERATORE_ENERGETICO ?>, tramite il partner commerciale
                  <?= $brand ?>, per ricevere informazioni e proposte commerciali relative alla fornitura di energia
                  elettrica e/o gas.</span>
              </label>

              <label class="consent-label" style="margin-top:12px;">
                <input type="checkbox" name="consenso_marketing" style="flex-shrink:0;margin-top:3px;">
                <span>Acconsento a ricevere comunicazioni promozionali da <?= $OPERATORE_ENERGETICO ?> tramite telefono,
                  email, SMS e altri strumenti di comunicazione.</span>
              </label>
            </div>

            <button type="submit" class="btn-primary" id="btnSubmit" disabled
              style="width: 100%; padding: 17px; font-size: 16px; margin-top: 24px;">
              Invia richiesta
              <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none">
                <path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
            </button>
          </form>

          <div id="conferma" hidden
            style="text-align: center; padding: 32px 0; margin-top: 20px; background: #ECFDF5; border: 1px solid #6EE7B7; border-radius: var(--r-md); color: #065F46;">
            <div style="font-size: 56px; margin-bottom: 12px;">✅</div>
            <strong style="font-size: 17px;">Richiesta inviata con successo!</strong>
            <p style="margin: 8px 0 0; font-size: 14.5px;">Un nostro consulente ti contatterà entro 24 ore lavorative.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<?php include __DIR__ . '/footer.php'; ?>