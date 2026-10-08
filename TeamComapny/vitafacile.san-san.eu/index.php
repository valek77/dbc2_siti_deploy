<?php
require __DIR__ . '/_config.php';
$brandName = $COMPANY['company_name'] !== ''
    ? $COMPANY['company_name']
    : ($LANDING_PAGE['nome_portale'] !== ''
        ? $LANDING_PAGE['nome_portale']
        : ($LANDING_PAGE['titolo'] !== '' ? $LANDING_PAGE['titolo'] : 'GR Contact Call Center'));
$pageDescription = $brandName . ' offre consulenza e supporto per aiutarti a orientarti nel mondo dell\'energia e scegliere le soluzioni più adatte alle tue esigenze.';
include __DIR__ . '/header.php';
?>

<style>
  .home-page .home-hero { position: relative; overflow: hidden; min-height: 680px; display: flex; align-items: center; background: linear-gradient(90deg, rgba(6,27,74,.9) 0%, rgba(6,27,74,.68) 48%, rgba(6,27,74,.22) 100%), url('home-hero.png') center/cover no-repeat; }
  .home-page .home-hero::before { content: ''; position: absolute; width: 420px; height: 420px; border: 1px solid rgba(255,255,255,.2); border-radius: 50%; right: -120px; top: -180px; }
  .home-page .home-hero .container { position: relative; z-index: 1; }
  .home-page .home-hero h1 { max-width: 650px; color: #fff !important; }
  .home-page .home-hero .hero-copy { max-width: 650px; padding: 48px; border-left: 5px solid var(--primary); border-radius: 0 var(--r-xl) var(--r-xl) 0; background: rgba(6,27,74,.72); box-shadow: 0 20px 60px rgba(0,0,0,.18); }
  .home-page .home-hero .hero-copy p { color: rgba(255,255,255,.86) !important; }
  .home-page .home-hero .split-img { border-radius: 28px 90px 28px 28px; box-shadow: var(--shadow-lg); transform: rotate(1deg); }
  .home-page .home-hero .split-img:hover { transform: rotate(0); }
  .home-page .feature-grid .feat-card { height: 100%; }
  .home-page .feat-card .ico svg { width: 32px; height: 32px; display: block; }
  .home-page .feat-card .ico { color: var(--primary); }
  .home-page .feat-card:hover .ico { background: var(--primary) !important; color: #fff; }
  .home-page .home-benefits .feat-card { border-top: 4px solid var(--primary); }
  .home-page .home-sustainability { position: relative; overflow: hidden; }
  .home-page .home-sustainability::after { content: ''; position: absolute; width: 280px; height: 280px; border: 1px solid rgba(244,90,10,.16); border-radius: 50%; left: -120px; bottom: -150px; }
  .home-page .sustainability-banner { position: relative; min-height: 300px; margin-top: 56px; padding: 52px; border-radius: var(--r-2xl); overflow: hidden; display: flex; align-items: center; }
  .home-page .sustainability-banner .photo-bg { position: absolute; inset: 0; background: url('home-sostenibilita.png') center/cover; }
  .home-page .sustainability-banner .photo-overlay { position: absolute; inset: 0; background: linear-gradient(90deg, rgba(6,27,74,.94), rgba(6,27,74,.3)); }
  .home-page .sustainability-banner .content { position: relative; z-index: 1; max-width: 510px; color: #fff; }
  .home-page .sustainability-banner h3 { font-size: clamp(26px, 3vw, 38px); margin-bottom: 14px; }
  .home-page .sustainability-banner p { color: rgba(255,255,255,.78); margin: 0; line-height: 1.7; }
  @media (max-width: 900px) { .home-page .home-hero { min-height: 620px; background-position: 62% center; } }
  @media (max-width: 600px) { .home-page .home-hero { min-height: 650px; } .home-page .home-hero .hero-copy { padding: 32px 24px; } .home-page .sustainability-banner { padding: 32px 24px; } }
</style>

<main class="home-page">

  <!-- HERO -->
  <section class="section home-hero" style="padding-top: 88px; padding-bottom: 88px;">
    <div class="container">
      <div class="split" style="display: block;">
        <div class="hero-copy">
         
          <h1 style="font-size: clamp(40px, 5vw, 56px); margin-bottom: 24px; line-height: 1.1; font-family: var(--font-display); font-weight: 800; color: var(--ink);">
            Una card.<br><span style="color: var(--primary);">Tanti servizi.</span><br>Più semplicità.
          </h1>
          <p style="font-size: 18px; color: var(--muted); margin-bottom: 32px; line-height: 1.6; max-width: 500px;">Vita Facile è la card servizi promossa da SAN.SAN: un punto di riferimento unico per gestire meglio le esigenze di ogni giorno, dalla casa all'assistenza.</p>
          <div style="display: flex; gap: 16px; flex-wrap: wrap;">
            <a href="tariffe.php" class="btn-primary">Scopri i servizi</a>
            <a href="contatti.php" class="btn-outline" style="border: 2px solid var(--primary); color: var(--primary);">Richiedi informazioni</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PERCHE SCEGLIERCI -->
  <section class="section home-benefits" style="padding: 96px 0;">
    <div class="container">
      <div class="section-head" style="margin-bottom: 48px;">
        <span class="eyebrow"><span class="dot"></span> Il nostro modo di lavorare</span>
        <h2 class="section-title">Semplicità, supporto,<br><span class="hl">assistenza ogni giorno</span></h2>
        <p class="section-sub" style="margin: 0 auto; max-width: 600px;">Una sola card per trovare un aiuto concreto quando ne hai bisogno: casa, bollette, acqua, energia, mobilità, CAF e assistenza.</p>
      </div>
      <div class="feature-grid">
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; background: transparent;" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2 3 14h9l-1 8 10-12h-9l1-8z"/></svg></div>
          <h4>Casa e utenze</h4>
          <p style="margin-top: 12px;">Supporto per esigenze legate all'abitazione, alle bollette, all'energia e al gas.</p>
        </div>
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; background: transparent;" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.9.33 1.78.62 2.63a2 2 0 0 1-.45 2.11L8 9.73a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.85.29 1.73.5 2.63.62A2 2 0 0 1 22 16.92z"/></svg></div>
          <h4>Servizi per te</h4>
          <p style="margin-top: 12px;">Acqua, CAF e fisco, mobilità e soluzioni pensate per semplificare la quotidianità.</p>
        </div>
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; background: transparent;" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg></div>
          <h4>Assistenza</h4>
          <p style="margin-top: 12px;">Un riferimento dedicato quando hai bisogno di informazioni, orientamento o supporto.</p>
        </div>
      </div>
      <div style="text-align: center; margin-top: 48px;">
        <a href="tariffe.php" class="btn-primary">Scopri tutti i servizi</a>
      </div>
    </div>
  </section>

  <!-- SERVIZI E SOLUZIONI -->
  <section class="section" style="background: var(--bg-soft); padding: 100px 0;">
    <div class="container">
      <div class="split reverse" style="gap: 80px; align-items: center;">
        <div>
          <span class="eyebrow"><span class="dot"></span> Per privati e imprese</span>
          <h2 class="section-title">Un aiuto pratico<br>per casa, utenze <span class="hl">e servizi</span></h2>
          <div class="divider-line"></div>
          <p style="font-size: 17px; color: var(--muted); line-height: 1.7; margin-bottom: 24px;">Vita Facile nasce per offrirti un punto di riferimento unico quando hai bisogno di supporto: dalla gestione delle utenze alle pratiche, dalla mobilità all'assistenza casa.</p>
          <ul class="offer-feats" style="margin-bottom: 40px;">
            <li>Energia, gas e supporto sulle bollette</li>
            <li>Acqua, CAF e pratiche fiscali</li>
            <li>Mobilità e assistenza per la casa</li>
          </ul>
          <a href="contatti.php" class="btn-primary">Richiedi una consulenza</a>
        </div>
        <div class="split-img" style="border-radius: 20px; box-shadow: var(--shadow-md);">
          <img src="home-consulenza.png" alt="Consulenti e clienti durante un incontro sull'energia">
        </div>
      </div>
      <div class="sustainability-banner">
        <div class="photo-bg"></div>
        <div class="photo-overlay"></div>
        <div class="content">
          <h3>Tutto più semplice, ogni giorno</h3>
          <p>Una card, tanti servizi e un supporto concreto per accompagnarti nella gestione delle esigenze quotidiane.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SOSTENIBILITA E CERTIFICAZIONI -->
  <section class="section home-sustainability" style="padding: 100px 0;">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Il nostro impegno</span>
        <h2 class="section-title">Una card pensata<br>per la tua <span class="ul">quotidianità</span></h2>
      </div>
      <div class="feature-grid">
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; background: transparent;" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 4c-7.5 0-13 3.5-13 9.5C7 17.5 10 20 14 20c5 0 6-7 6-16z"/><path d="M4 20c2-4 5-7 10-9"/></svg></div>
          <h4>Consapevolezza</h4>
          <p style="margin-top: 12px;">Promuoviamo un approccio più attento all'energia e alle conseguenze delle scelte quotidiane.</p>
        </div>
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; background: transparent;" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg></div>
          <h4>Affidabilità</h4>
          <p style="margin-top: 12px;">Costruiamo relazioni corrette e trasparenti, con attenzione alle informazioni e ai passaggi che accompagnano ogni scelta.</p>
        </div>
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; background: transparent;" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 8v4l3 2"/></svg></div>
          <h4>Vicini nel tempo</h4>
          <p style="margin-top: 12px;">Rimaniamo disponibili per chiarimenti e supporto anche dopo il primo contatto.</p>
        </div>
      </div>
    </div>
  </section>

</main>

<?php
// Footer "mega" specifico della home. Dati legali dell'azienda titolare: valore
// dall'API ($COMPANY) quando presente, altrimenti valore cablato per i campi NON
// modellati dall'API (REA, Registro Imprese, socio unico, nominativo DPO).
$logoFooter = $LANDING_PAGE['logo2_url'] !== ''
    ? $LANDING_PAGE['logo2_url']
    : ($LANDING_PAGE['logo_url'] !== '' ? $LANDING_PAGE['logo_url'] : 'gr_logo.png');
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
