<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';
$pageDescription = 'Contatta ' . $brand . ' per ricevere una consulenza gratuita sulle offerte ' . $OPERATORE_ENERGETICO . '. Siamo qui per aiutarti a scegliere la tariffa giusta.';
$pageScripts = '  <script src="lead-form.js"></script>';

// Numero di telefono in sole cifre per il link WhatsApp.
$telDigits = preg_replace('/\D+/', '', (string) c('telefono'));

include __DIR__ . '/header.php';
?>

  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Contattaci</span>
      <h1>Parliamo di <span class="accent">energia</span></h1>
      <p>Richiedi una consulenza gratuita: un nostro esperto ti contatterà entro 24 ore lavorative per analizzare la tua bolletta e proporti l'offerta più adatta.</p>
    </div>
    <div class="wave">
      <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
        <path d="M0,32L120,26.7C240,21,480,11,720,13.3C960,16,1200,32,1320,40L1440,48L1440,70L0,70Z"/>
      </svg>
    </div>
  </section>

  <main class="section" style="padding: 80px 0 var(--section);">
    <div class="container">
      <div class="contact-grid">

        <div>
          <div class="contact-info-card">
            <h3 style="font-size: 22px; margin: 0 0 24px; color: var(--ink);">Come raggiungerci</h3>
            <div class="contact-info-list">

<?php if ($telefono) { ?>
              <div class="contact-info-item">
                <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M22 16.92V20a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 015 13.18 19.79 19.79 0 011.92 4.55 2 2 0 013.92 2.5h3.08a2 2 0 012 1.72c.13.96.36 1.9.69 2.8a2 2 0 01-.45 2.11L8.09 10.5a16 16 0 006 6l1.37-1.15a2 2 0 012.11-.45c.9.33 1.84.56 2.8.69a2 2 0 011.72 2.03z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
                <div>
                  <div class="label">Telefono</div>
                   <div class="meta">Consulenza immediata</div>
                    <a href="tel:<?= $telefono ?>"><?= $telefono ?></a>
                </div>
              </div>
<?php } ?>

<?php if ($email_supporto) { ?>
              <div class="contact-info-item">
                <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M4 4h16c1 0 2 1 2 2v12c0 1-1 2-2 2H4c-1 0-2-1-2-2V6c0-1 1-2 2-2z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M22 6l-10 7L2 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div>
                  <div class="label">Email</div>
                   <div class="meta">Scrivici per info</div>
                   <a href="mailto:<?= $email_supporto ?>"><?= $email_supporto ?></a>
                </div>
              </div>
<?php } ?>

<?php if ($telDigits) { ?>
              <div class="contact-info-item">
                <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
                <div>
                  <div class="label">WhatsApp</div>
                   <div class="meta">Chat veloce</div>
                    <a href="https://wa.me/<?= $telDigits ?>">Scrivici su WhatsApp</a>
                </div>
              </div>
<?php } ?>

              <div class="contact-info-item">
                <div class="ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div>
                  <div class="label">Orari</div>
                  <div class="meta" style="line-height:1.6;">Lun–Ven: 9:00 – 18:00<br>Sabato: 9:00 – 13:00</div>
                </div>
              </div>
            </div>
          </div>

          <div class="contact-card-cta">
            <div class="label">Offerta del momento</div>
            <div class="name">PRIMA CASA LUCE</div>
            <div class="price">PUN +€0,025<small> €/kWh</small></div>
            <div class="note">con domiciliazione bancaria (RID)</div>
            <a class="see-all" href="tariffe.php">Vedi tutte le offerte
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
        </div>

        <div id="contatto-form">
          <div class="contact-form">
            <h3>Richiedi una consulenza gratuita</h3>
            <p class="sub">Compila il form e un nostro consulente ti ricontatterà entro 24 ore lavorative.</p>

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
                  <span>Richiedo di essere ricontattato da <?= $OPERATORE_ENERGETICO ?>, tramite il partner commerciale <?= $brand ?>, per ricevere una proposta commerciale relativa alla fornitura di energia elettrica e/o gas. *</span>
                </label>

              </div>

              <button type="submit" class="btn-primary" id="btnSubmit" disabled style="width: 100%; padding: 17px; font-size: 16px; margin-top: 24px;">
                Invia richiesta
                <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </button>
            </form>

            <div id="conferma" hidden style="text-align: center; padding: 32px 0; margin-top: 20px; background: #ECFDF5; border: 1px solid #6EE7B7; border-radius: var(--r-md); color: #065F46;">
              <div style="font-size: 56px; margin-bottom: 12px;">✅</div>
              <strong style="font-size: 17px;">Richiesta inviata con successo!</strong>
              <p style="margin: 8px 0 0; font-size: 14.5px;">Un nostro consulente ti contatterà.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>

<?php include __DIR__ . '/footer.php'; ?>
