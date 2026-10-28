<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';
include __DIR__ . '/header.php';

$contactCompany = $COMPANY['company_name'] !== '' ? $COMPANY['company_name']
  : ($COMPANY['nome_commerciale'] !== '' ? $COMPANY['nome_commerciale']
    : ($OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $brandName));
$contactAddress = $COMPANY['sede_legale'] !== '' ? $COMPANY['sede_legale']
  : ($LANDING_PAGE['sede_legale'] !== '' ? $LANDING_PAGE['sede_legale'] : $OPERATORE['indirizzo']);
$contactVat = $COMPANY['p_iva'] !== '' ? $COMPANY['p_iva']
  : ($LANDING_PAGE['p_iva'] !== '' ? $LANDING_PAGE['p_iva'] : $OPERATORE['partita_iva']);
$contactEmail = $COMPANY['email_supporto'] !== '' ? $COMPANY['email_supporto'] : $OPERATORE['email_supporto'];
$contactPhone = $COMPANY['telefono'] !== '' ? $COMPANY['telefono'] : $OPERATORE['telefono'];
$operatorName = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'];
$partnerName = $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : $contactCompany;
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

        <div class="contact-sidebar reveal">
          <div class="contact-info-card">
            <h3>I nostri recapiti</h3>
            <div class="contact-info-list">
              <?php if ($contactAddress !== '' || $contactVat !== '') { ?>
                <div class="contact-info-item">
                  <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2"/></svg></div>
                  <div><div class="label">Sede legale</div><div class="meta"><?= $contactCompany ?></div><div class="contact-detail"><?= $contactAddress ?><?php if ($contactVat !== '') { ?><br>P.IVA e C.F.: <?= $contactVat ?><?php } ?></div></div>
                </div>
              <?php } ?>
              <?php if ($contactEmail !== '') { ?>
                <div class="contact-info-item">
                  <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M4 4h16c1 0 2 1 2 2v12c0 1-1 2-2 2H4c-1 0-2-1-2-2V6c0-1 1-2 2-2z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M22 6l-10 7L2 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                  <div><div class="label">Email</div><div class="meta">Informazioni e assistenza</div><a href="mailto:<?= $contactEmail ?>"><?= $contactEmail ?></a></div>
                </div>
              <?php } ?>
              <?php if ($contactPhone !== '') { ?>
                <div class="contact-info-item">
                  <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M22 16.92V20a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 015 13.18 19.79 19.79 0 011.92 4.55 2 2 0 013.92 2.5h3.08a2 2 0 012 1.72c.13.96.36 1.9.69 2.8a2 2 0 01-.45 2.11L8.09 10.5a16 16 0 006 6l1.37-1.15a2 2 0 012.11-.45c.9.33 1.84.56 2.8.69a2 2 0 011.72 2.03z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
                  <div><div class="label">Telefono</div><div class="meta">Parla con un consulente</div><a href="tel:<?= preg_replace('/[^0-9+]/', '', $contactPhone) ?>"><?= $contactPhone ?></a></div>
                </div>
              <?php } ?>
            </div>
          </div>

          <div class="contact-card-cta" style="margin-top:24px;">
            <div class="label">Scegli con consapevolezza</div>
            <div class="name">Luce e Gas per la tua realtà</div>
            <div class="note">Ti aiutiamo a capire quale offerta è più adatta ai tuoi consumi.</div>
            <a class="see-all" href="tariffe.php">Vedi tutte le offerte</a>
          </div>
        </div>

        <div id="contatto-form" class="reveal">
          <div class="contact-form contact-page-form">
            <div class="form-kicker">Il primo passo è semplice</div>
            <h3>Parliamo della tua fornitura</h3>
            <p class="sub">Compila il form e ti ricontatteremo per una prima valutazione.</p>

            <form id="leadForm" method="POST" novalidate>
              <div class="form-group">
                <label class="form-label" for="fOfferta">Offerta di interesse</label>
                <select class="form-input" id="fOfferta" name="offerta">
                  <option value="">Seleziona un'offerta (facoltativo)</option>
                  <?php foreach ($OFFERTE as $offerta) {
                    $offertaId = e((string) $offerta['id']);
                    $offertaNome = trim(strip_tags((string) ($offerta['nome'] !== '' ? $offerta['nome'] : $offerta['titolo'])));
                    if ($offertaNome === '') { continue; }
                  ?>
                    <option value="<?= $offertaId ?>"><?= e($offertaNome) ?></option>
                  <?php } ?>
                </select>
                <div class="field-error" data-error-for="fOfferta"></div>
              </div>

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
                  <span>Richiedo di essere ricontattato da <?= $operatorName ?>, tramite il partner commerciale <?= $partnerName ?>, per ricevere informazioni e proposte commerciali relative alla fornitura di energia elettrica e/o gas. *</span>
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
