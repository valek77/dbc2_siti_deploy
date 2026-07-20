<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';
$pageDescription = 'Mettiti in contatto con Locura per ricevere una consulenza energetica personalizzata. Inizia subito ad abbattere i consumi.';
include __DIR__ . '/header.php';
?>

  <section class="page-hero">
    <div class="container">
      <span class="eyebrow eyebrow-light"><span class="dot"></span> Consulenza Gratuita</span>
      <h1>Parliamo del tuo <span class="accent">risparmio</span></h1>
      <p>Richiedi un'analisi energetica senza impegno. Un nostro energy manager al più presto per identificare l'opzione ideale in base al tuo profilo di consumo.</p>
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
          <div class="contact-card-cta">
            <div class="label">Offerta in evidenza</div>
            <div class="name">Luce PUN Index GME Domestico 386</div>
            <div class="price">PUN +0,055<small> €/kWh</small></div>
            <div class="note">Spread bloccato 12 mesi · 456,00 €/POD/anno</div>
            <a class="see-all" href="tariffe.php">Confronta le tariffe
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
        </div>

        <div id="contatto-form">
          <div class="contact-form">
            <h3>Richiedi l'analisi gratuita</h3>
            <p class="sub">Compila i campi sottostanti per essere ricontattato da un energy manager dedicato.</p>

            <form id="leadForm" method="POST" novalidate>
              <input id="fNome" name="nome" type="hidden" value="--">
              <input id="fEmail" name="email" type="hidden" value="">
              <!-- Campi Nome/Email nascosti su richiesta. Per ripristinarli, elimina i due input hidden sopra e ripristina il markup seguente (Email va dopo il campo Telefono):
              <div class="form-group">
                <label class="form-label" for="fNome">Nome e Cognome *</label>
                <input class="form-input" id="fNome" name="nome" type="text" placeholder="Mario Rossi" required>
                <div class="field-error" data-error-for="fNome"></div>
              </div>
              <div class="form-group">
                <label class="form-label" for="fEmail">Email di contatto</label>
                <input class="form-input" id="fEmail" name="email" type="email" placeholder="mario.rossi@email.it">
                <div class="field-error" data-error-for="fEmail"></div>
              </div>
              -->


              <div class="form-group">
                <label class="form-label" for="fTel">Telefono *</label>
                <input class="form-input" id="fTel" name="telefono" type="tel" placeholder="333 1234567" required pattern="[0-9 +]{8,}">
                <div class="field-error" data-error-for="fTel"></div>
              </div>

<?php /* Consensi: mostrati solo se abilitati nella landing dall'API.
         mostra_consenso_0 = privacy, _1 = commerciale (ricontatto), _2 = marketing. */ ?>
<?php if ($LANDING_PAGE['mostra_consenso_0'] !== '') { ?>
              <label class="consent-label" style="margin-top:12px;">
                <input type="checkbox" name="consenso_privacy" required style="flex-shrink:0;margin-top:3px;">
                <span>Dichiaro di aver preso visione dell'<a href="privacy-policy.php">informativa privacy</a> ai sensi del Regolamento (UE) 2016/679. *</span>
              </label>
<?php } ?>

              <div class="form-group" style="margin-top: 28px;">
<?php if ($LANDING_PAGE['mostra_consenso_1'] !== '') { ?>
                <label class="consent-label">
                  <input type="checkbox" name="consenso_ricontatto" required style="flex-shrink:0;margin-top:3px;">
                  <span>Richiedo di essere ricontattato da <?= $OPERATORE['nome_legale'] ?>, tramite il partner commerciale <?= $COMPANY['company_name'] ?> , per ricevere informazioni e proposte commerciali relative alla fornitura di energia elettrica e/o gas. *</span>
                </label>
<?php } ?>
<?php if ($LANDING_PAGE['mostra_consenso_2'] !== '') { ?>
                <label class="consent-label" style="margin-top:12px;">
                  <input type="checkbox" name="consenso_marketing" style="flex-shrink:0;margin-top:3px;">
                  <span>Acconsento a ricevere comunicazioni promozionali da <?= $brandName ?> tramite telefono, email, SMS e altri strumenti di comunicazione.</span>
                </label>
<?php } ?>
              </div>

              <div class="form-note" style="font-size: 12.5px; color: var(--muted); margin-top: 16px; line-height: 1.4;">
                * I campi contrassegnati con l'asterisco sono obbligatori per l'elaborazione della richiesta.
              </div>

              <button type="submit" class="btn-primary" id="btnSubmit" disabled style="width: 100%; padding: 16px; font-size: 15px; margin-top: 24px;">
                Invia dati e richiedi consulenza
                <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </button>
            </form>

            <div id="conferma" hidden style="text-align: center; padding: 32px; margin-top: 20px; background: var(--primary-50); border: 1px solid var(--primary-100); border-radius: var(--r-sm); color: var(--primary-600);">
              <div style="font-size: 52px; margin-bottom: 12px;">✅</div>
              <strong style="font-size: 17px;">Richiesta inviata correttamente!</strong>
              <p style="margin: 8px 0 0; font-size: 14px; line-height:1.5;">Un consulente energetico prenderà in carico la tua pratica ed effettuerà il ricontatto al più presto.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>

<?php
$pageScripts = <<<'HTML'
<script src="lead-form.js"></script>
HTML;
include __DIR__ . '/footer.php';
?>
