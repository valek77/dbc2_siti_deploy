<?php
require __DIR__ . '/_config.php';
$brandName = $COMPANY['company_name'] !== ''
    ? $COMPANY['company_name']
    : ($LANDING_PAGE['nome_portale'] !== ''
        ? $LANDING_PAGE['nome_portale']
        : ($LANDING_PAGE['titolo'] !== '' ? $LANDING_PAGE['titolo'] : 'GR Contact Call Center'));
$pageDescription = $brandName . ' ti aiuta a scegliere la soluzione luce e gas più adatta, con condizioni comprensibili e supporto dedicato.';
$pageClass = 'page-home';
include __DIR__ . '/header.php';
?>

  <!-- HERO - ENGIE STYLE -->
  <section class="section home-hero" style="padding-top: 60px; padding-bottom: 60px; background: var(--bg-soft);">
    <div class="container">
      <div class="split" style="gap: 40px; align-items: center;">
        <div>
          <span class="eyebrow"><span class="dot"></span> Energia più consapevole</span>
          <h1 style="font-size: clamp(40px, 5vw, 56px); margin-bottom: 24px; line-height: 1.1; font-family: var(--font-display); font-weight: 800; color: var(--ink);">
            Più chiarezza nelle tue scelte,<br><span style="color: var(--primary);">più valore ogni giorno.</span>
          </h1>
          <div class="divider-line"></div>
          <p style="font-size: 18px; color: var(--muted); margin-bottom: 24px; line-height: 1.6; max-width: 500px;">Confronta le proposte luce e gas, trova quella più adatta alle tue esigenze e affidati a un team pronto ad accompagnarti in ogni passaggio.</p>
          <ul class="offer-feats hero-feats">
            <li>Soluzioni pensate per casa e attività</li>
            <li>Informazioni chiare prima di scegliere</li>
            <li>Supporto dedicato durante l'attivazione</li>
          </ul>
          <div style="display: flex; gap: 16px; flex-wrap: wrap;">
            <a href="tariffe.php" class="btn-primary">Esplora le soluzioni</a>
            <a href="contatti.php" class="btn-outline" style="border: 2px solid var(--primary); color: var(--primary);">Parla con un consulente</a>
          </div>
        </div>
        <div class="split-img hero-image" style="border-radius: 20px 80px 20px 20px; box-shadow: var(--shadow-lg);">
          <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=1100&q=85" alt="Pannelli solari su un'abitazione">
        </div>
      </div>
    </div>
  </section>

  <!-- PERCHE SCEGLIERCI -->
  <section class="section" style="padding: 80px 0;">
    <div class="container">
      <div class="section-head" style="margin-bottom: 48px;">
        <span class="eyebrow"><span class="dot"></span> Perché sceglierci</span>
        <h2 class="section-title">Un servizio chiaro,<br><span class="hl">pensato per te</span></h2>
        <p class="section-sub" style="margin: 0 auto; max-width: 600px;">Dalla prima valutazione all'attivazione, mettiamo competenza e ascolto al servizio delle tue necessità.</p>
      </div>
      <div class="feature-grid">
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; font-size: 36px; background: transparent;">⚡</div>
          <h4>Condizioni comprensibili</h4>
          <p style="margin-top: 12px;">Leggi e confronta le nostre proposte con facilità: ogni voce è presentata in modo semplice, per una scelta consapevole.</p>
        </div>
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; font-size: 36px; background: transparent;">🎧</div>
          <h4>Un riferimento concreto</h4>
          <p style="margin-top: 12px;">Un team di persone reali ascolta le tue domande e ti offre indicazioni utili prima, durante e dopo l'attivazione.</p>
        </div>
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; font-size: 36px; background: transparent;">✅</div>
          <h4>Passaggio accompagnato</h4>
          <p style="margin-top: 12px;">Ti guidiamo nella procedura e nella raccolta delle informazioni necessarie, così il cambio di fornitura diventa più semplice.</p>
        </div>
      </div>
      <div style="text-align: center; margin-top: 48px;">
        <a href="tariffe.php" class="btn-primary">Guarda le offerte luce e gas</a>
      </div>
    </div>
  </section>

  <!-- SERVIZI E SOLUZIONI -->
  <section class="section" style="background: var(--bg-soft); padding: 100px 0;">
    <div class="container">
      <div class="split reverse" style="gap: 80px; align-items: center;">
        <div>
          <span class="eyebrow"><span class="dot"></span> Efficienza Energetica</span>
          <h2 class="section-title">Energia e strategia<br>per <span class="hl">organizzazioni efficienti</span></h2>
          <div class="divider-line"></div>
          <p style="font-size: 17px; color: var(--muted); line-height: 1.7; margin-bottom: 24px;">Affianchiamo imprese ed enti con un approccio su misura: analizziamo i consumi, individuiamo le opportunità e costruiamo percorsi per usare l'energia in modo più efficace.</p>
          <ul class="offer-feats" style="margin-bottom: 40px;">
            <li>Valutazione dei consumi e lettura delle principali voci di spesa</li>
            <li>Soluzioni personalizzate per migliorare efficienza e controllo</li>
            <li>Supporto operativo nella gestione delle pratiche</li>
          </ul>
          <a href="contatti.php" class="btn-primary">Parliamone insieme</a>
        </div>
        <div class="split-img" style="border-radius: 20px; box-shadow: var(--shadow-md);">
          <img src="https://images.unsplash.com/photo-1466611653911-95081537e5b7?auto=format&fit=crop&w=1100&q=85" alt="Parco eolico per la produzione di energia rinnovabile">
        </div>
      </div>
    </div>
  </section>

  <!-- SOSTENIBILITA E CERTIFICAZIONI -->
  <section class="section" style="padding: 100px 0;">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Il nostro impegno</span>
        <h2 class="section-title">Scelte più consapevoli,<br>un futuro più <span class="ul">responsabile</span></h2>
      </div>
      <div class="feature-grid">
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; font-size: 36px; background: transparent;">🌿</div>
          <h4>Consumi sotto controllo</h4>
          <p style="margin-top: 12px;">Promuoviamo un rapporto più attento con l'energia, aiutando famiglie e attività a comprendere meglio le proprie abitudini di consumo.</p>
        </div>
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; font-size: 36px; background: transparent;">🛡️</div>
          <h4>Regole chiare</h4>
          <p style="margin-top: 12px;">Proposte e documenti sono costruiti nel rispetto della normativa vigente, con informazioni accessibili e attenzione alla tutela del cliente.</p>
        </div>
        <div class="feat-card" style="text-align: center; padding: 48px 32px;">
          <div class="ico" style="margin: 0 auto 24px; font-size: 36px; background: transparent;">👥</div>
          <h4>Vicini quando serve</h4>
          <p style="margin-top: 12px;">Quando hai bisogno di un chiarimento puoi contare su un team preparato, disponibile e orientato a trovare risposte concrete.</p>
        </div>
      </div>
    </div>
  </section>

<?php
// Footer "mega" specifico della home. Dati legali dell'azienda titolare: valore
// dall'API ($COMPANY) quando presente, altrimenti valore cablato per i campi NON
// modellati dall'API (REA, Registro Imprese e socio unico).
$logoFooter = $LANDING_PAGE['logo2_url'] !== ''
    ? $LANDING_PAGE['logo2_url']
    : ($LANDING_PAGE['logo_url'] !== '' ? $LANDING_PAGE['logo_url'] : 'gr_logo.png');
$operatoreMarketing = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $OPERATORE['nome_legale'];
$coName = $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Gierre Contact Call Center S.r.l.';
$coSede = $COMPANY['sede_legale'] !== '' ? $COMPANY['sede_legale'] : 'Via Console Cesario n. 3, 80132 Napoli (NA)';
$coPiva = $COMPANY['p_iva'] !== '' ? $COMPANY['p_iva'] : '09991111213';
$coCapitale = $COMPANY['capitale_sociale'] !== '' ? $COMPANY['capitale_sociale'] : '&euro; 10.000,00';
$coPec = $COMPANY['pec'] !== '' ? $COMPANY['pec'] : 'gierrecontactcallcentersrl@pec.it';
$coDpoEmail = $COMPANY['email_dpo'];
// REA: SOLO dall'API. Se assente non compare.
$coRea = $COMPANY['numero_rea'];
$coRegImprese = 'Registro Imprese di Napoli n. ' . $coPiva;
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
          C.F. e P.IVA: <?= $coPiva ?><?php if ($coRea !== '') { ?> &ndash; REA <?= $coRea ?><?php } ?> &ndash; <?= $coRegImprese ?><br>
          Capitale sociale: <?= $coCapitale ?> i.v. &ndash; Società a socio unico<br>
          PEC: <a href="mailto:<?= $coPec ?>" style="color: rgba(255,255,255,.6);"><?= $coPec ?></a><?php if ($coDpoEmail !== '') { ?><br>
          DPO / Responsabile della Protezione dei Dati: <a href="mailto:<?= $coDpoEmail ?>" style="color: rgba(255,255,255,.6);"><?= $coDpoEmail ?></a><?php } ?>
        </p>
      </div>
    </div>
  </footer>

<script src="cb.js"></script>
</body>
</html>
