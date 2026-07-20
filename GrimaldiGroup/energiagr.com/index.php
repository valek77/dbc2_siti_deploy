<?php
require __DIR__ . '/_config.php';
$brandName = $COMPANY['company_name'] !== ''
    ? $COMPANY['company_name']
    : ($LANDING_PAGE['nome_portale'] !== ''
        ? $LANDING_PAGE['nome_portale']
        : ($LANDING_PAGE['titolo'] !== '' ? $LANDING_PAGE['titolo'] : 'GR Contact Call Center'));
$pageDescription = $brandName . ' è il partner ufficiale Switch Luce Gas. Risparmia sulla bolletta con offerte chiare, prezzi indicizzati e consulenza gratuita.';
include __DIR__ . '/header.php';
?>

  <!-- HERO - ENGIE STYLE -->
  <section class="section" style="padding-top: 60px; padding-bottom: 60px; background: var(--bg-soft);">
    <div class="container">
      <div class="split" style="gap: 40px; align-items: center;">
        <div>
         
          <h1 style="font-size: clamp(40px, 5vw, 56px); margin-bottom: 24px; line-height: 1.1; font-family: var(--font-display); font-weight: 800; color: var(--ink);">
            L'energia giusta per la tua casa,<br><span style="color: var(--primary);">senza sorprese.</span>
          </h1>
          <p style="font-size: 18px; color: var(--muted); margin-bottom: 32px; line-height: 1.6; max-width: 500px;">Scopri le nostre offerte a prezzo fisso e indicizzato. Trasparenza, convenienza e un'assistenza sempre al tuo fianco.</p>
          <div style="display: flex; gap: 16px; flex-wrap: wrap;">
            <a href="tariffe.php" class="btn-primary">Scopri le offerte</a>
            <a href="contatti.php" class="btn-outline" style="border: 2px solid var(--primary); color: var(--primary);">Ti chiamiamo noi</a>
          </div>
        </div>
        <div class="split-img" style="border-radius: 20px 80px 20px 20px; box-shadow: var(--shadow-lg);">
          <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80" alt="Casa confortevole con energia <?= $OPERATORE['nome_marketing'] ?>">
        </div>
      </div>
    </div>
  </section>

  <!-- PERCHE SCEGLIERCI -->
  <section class="section" style="padding: 80px 0;">
    <div class="container">
      <div class="section-head" style="margin-bottom: 48px;">
        <span class="eyebrow"><span class="dot"></span> Perché sceglierci</span>
        <h2 class="section-title">Energia semplice,<br><span class="hl">senza sorprese</span></h2>
        <p class="section-sub" style="margin: 0 auto; max-width: 600px;">Ti seguiamo dalla scelta della tariffa all'attivazione, con prezzi chiari e persone reali al tuo fianco.</p>
      </div>
      <div class="feature-grid">
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; font-size: 36px; background: transparent;">⚡</div>
          <h4>Prezzi trasparenti</h4>
          <p style="margin-top: 12px;">Tariffe indicizzate a PUN e PSV con spread chiaro definito in contratto: nessun costo nascosto, nessuna sorpresa in bolletta.</p>
        </div>
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; font-size: 36px; background: transparent;">🎧</div>
          <h4>Assistenza dedicata</h4>
          <p style="margin-top: 12px;">Consulenti reali in Italia, sempre disponibili. Nessun call center estero: solo persone competenti pronte ad aiutarti.</p>
        </div>
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; font-size: 36px; background: transparent;">✅</div>
          <h4>Attivazione senza stress</h4>
          <p style="margin-top: 12px;">Zero burocrazia per il passaggio: gestiamo noi il subentro e ti seguiamo dalla prima firma fino alla bolletta.</p>
        </div>
      </div>
      <div style="text-align: center; margin-top: 48px;">
        <a href="tariffe.php" class="btn-primary">Scopri le offerte luce e gas</a>
      </div>
    </div>
  </section>

  <!-- SERVIZI E SOLUZIONI -->
  <section class="section" style="background: var(--bg-soft); padding: 100px 0;">
    <div class="container">
      <div class="split reverse" style="gap: 80px; align-items: center;">
        <div>
          <span class="eyebrow"><span class="dot"></span> Efficienza Energetica</span>
          <h2 class="section-title">Soluzioni per aziende<br>ed <span class="hl">Enti Pubblici</span></h2>
          <div class="divider-line"></div>
          <p style="font-size: 17px; color: var(--muted); line-height: 1.7; margin-bottom: 24px;">Non solo case. Offriamo consulenza personalizzata e soluzioni di efficienza energetica per imprese di ogni dimensione. Dalla riduzione dei consumi all'ottimizzazione degli impianti.</p>
          <ul class="offer-feats" style="margin-bottom: 40px;">
            <li>Analisi gratuita dei consumi aziendali e audit energetico</li>
            <li>Proposte di decarbonizzazione personalizzate</li>
            <li>Gestione documentale e supporto per pratiche agevolate</li>
          </ul>
          <a href="contatti.php" class="btn-primary">Richiedi una consulenza</a>
        </div>
        <div class="split-img" style="border-radius: 20px; box-shadow: var(--shadow-md);">
          <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80" alt="Soluzioni energetiche per aziende ed enti">
        </div>
      </div>
    </div>
  </section>

  <!-- SOSTENIBILITA E CERTIFICAZIONI -->
  <section class="section" style="padding: 100px 0;">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Il nostro impegno</span>
        <h2 class="section-title">Un fornitore affidabile,<br>un'energia per il <span class="ul">futuro</span></h2>
      </div>
      <div class="feature-grid">
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; font-size: 36px; background: transparent;">🌿</div>
          <h4>Transizione Sostenibile</h4>
          <p style="margin-top: 12px;">Lavoriamo costantemente per offrire opzioni energetiche che riducano l'impatto ambientale e aiutino le famiglie a consumare meglio, con maggiore consapevolezza.</p>
        </div>
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; font-size: 36px; background: transparent;">🛡️</div>
          <h4>Certificazione e Sicurezza</h4>
          <p style="margin-top: 12px;">Tutte le nostre offerte e i contratti sono rigorosamente conformi alle direttive ARERA per garantirti la massima trasparenza e tutela del consumatore.</p>
        </div>
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; font-size: 36px; background: transparent;">👥</div>
          <h4>Assistenza di Qualità</h4>
          <p style="margin-top: 12px;">Un team dedicato sempre pronto a rispondere. Nessun call center estero o code infinite, solo consulenti esperti e reali a tua completa disposizione.</p>
        </div>
      </div>
    </div>
  </section>

<?php
// Footer "mega" specifico della home. Dati legali dell'azienda titolare: valore
// dall'API ($COMPANY) quando presente, altrimenti valore cablato per i campi NON
// modellati dall'API (REA, Registro Imprese, socio unico, nominativo DPO).
$logoFooter = $LANDING_PAGE['logo2_url'] !== '' ? $LANDING_PAGE['logo2_url'] : 'gr_logo.png';
$operatoreMarketing = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale'];
$coName = $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Gierre Contact Call Center S.r.l.';
$coSede = $COMPANY['sede_legale'] !== '' ? $COMPANY['sede_legale'] : 'Via Console Cesario n. 3, 80132 Napoli (NA)';
$coPiva = $COMPANY['p_iva'] !== '' ? $COMPANY['p_iva'] : '09991111213';
$coCapitale = $COMPANY['capitale_sociale'] !== '' ? $COMPANY['capitale_sociale'] : '&euro; 10.000,00';
$coPec = $COMPANY['pec'] !== '' ? $COMPANY['pec'] : 'gierrecontactcallcentersrl@pec.it';
$coDpoEmail = $COMPANY['email_dpo'] !== '' ? $COMPANY['email_dpo'] : 'dpo.fulmine@libero.it';
$coRea = 'NA-1072970';
$coRegImprese = 'Registro Imprese di Napoli n. ' . $coPiva;
$coDpoNome = 'Dott.ssa Maddalena Fulmine';
?>
  <!-- MEGA FOOTER -->
  <footer class="main-footer" style="background: var(--dark-bg); color: #fff; padding: 100px 0 40px;">
    <div class="container">
      <div class="footer-grid" style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 60px; border-bottom: 1px solid rgba(255,255,255,.1); padding-bottom: 60px;">
        <div class="footer-brand">
          <a href="index.php" class="logo" style="margin-bottom: 28px; display: inline-block;">
            <img src="<?= $logoFooter ?>" alt="<?= $brandName ?> Logo" style="filter: brightness(0) invert(1); height: 48px;">
          </a>
          <p style="color: rgba(255,255,255,.6); font-size: 15px; line-height: 1.7; max-width: 320px;">Siamo agenzia commerciale autorizzata<?= $operatoreMarketing !== '' ? ' ' . $operatoreMarketing : '' ?>. La nostra missione è fornire energia a prezzi chiari, supportata da consulenti reali e disponibili per garantirti sempre la massima trasparenza.</p>
        </div>
        <div class="footer-col" style="display: flex; flex-direction: column; gap: 14px;">
          <h4 style="font-family: var(--font-display); font-size: 17px; margin-bottom: 12px; color: #fff;">Offerte e Servizi</h4>
          <a href="tariffe.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none; transition: color 0.2s;">Offerte Luce e Gas</a>
          <a href="chi-siamo.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none; transition: color 0.2s;">Consulenza Aziendale</a>
        </div>
        <div class="footer-col" style="display: flex; flex-direction: column; gap: 14px;">
          <h4 style="font-family: var(--font-display); font-size: 17px; margin-bottom: 12px; color: #fff;">Supporto Clienti</h4>
          <a href="contatti.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none; transition: color 0.2s;">Contattaci</a>
        </div>
        <div class="footer-col" style="display: flex; flex-direction: column; gap: 14px;">
          <h4 style="font-family: var(--font-display); font-size: 17px; margin-bottom: 12px; color: #fff;"><?= $brandName ?></h4>
          <a href="chi-siamo.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none; transition: color 0.2s;">Chi Siamo</a>
          <a href="privacy-policy.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none; transition: color 0.2s;">Privacy Policy</a>
          <a href="condizioni-utilizzo.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none; transition: color 0.2s;">Condizioni di Utilizzo</a>
          <a href="trasparenza-commerciale.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none; transition: color 0.2s;">Trasparenza commerciale</a>
          <a href="cookie-policy.php" style="color: rgba(255,255,255,.7); font-size: 15px; text-decoration: none; transition: color 0.2s;">Cookie Policy</a>
        </div>
      </div>
      <div class="footer-bottom" style="font-size: 14px; color: rgba(255,255,255,.4);">
        <p class="footer-legal" style="margin:0; line-height:1.9;">
          &copy; <?= date('Y') ?> <strong><?= $coName ?></strong><br>
          Sede legale: <?= $coSede ?><br>
          C.F. e P.IVA: <?= $coPiva ?> &ndash; REA <?= $coRea ?> &ndash; <?= $coRegImprese ?><br>
          Capitale sociale: <?= $coCapitale ?> i.v. &ndash; Società a socio unico<br>
          PEC: <a href="mailto:<?= $coPec ?>" style="color: rgba(255,255,255,.6);"><?= $coPec ?></a><br>
          DPO/Responsabile della Protezione dei Dati: <?= $coDpoNome ?> &ndash; contatto: <a href="mailto:<?= $coDpoEmail ?>" style="color: rgba(255,255,255,.6);"><?= $coDpoEmail ?></a>
        </p>
      </div>
    </div>
  </footer>

<script src="cb.js"></script>
</body>
</html>
