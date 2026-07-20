<?php
require __DIR__ . '/_config.php';

// Dati societari SOLO dall'API nuova (/landing-pages). Nessun campo cablato:
// i dati non forniti dall'API (REA, Registro Imprese, socio unico, nominativo
// DPO) semplicemente non compaiono. I valori di $COMPANY sono gia' HTML-safe.
$ragioneSociale = $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Gruppo Grimaldi';
$coSede         = $COMPANY['sede_legale'];
$coPiva         = $COMPANY['p_iva'];
$coCapitale     = $COMPANY['capitale_sociale'];
$coPec          = $COMPANY['pec'];
$coDpoEmail     = $COMPANY['email_dpo'];

$pageTitle = 'Trasparenza commerciale';
$pageDescription = 'Trasparenza commerciale di ' . $ragioneSociale
    . ': ruolo di agenzia incaricata, documentazione precontrattuale, regole sui contatti telefonici, '
    . 'Registro Pubblico delle Opposizioni, Portale Offerte ARERA e dati societari.';

$pageHead = <<<'CSS'
  <style>
    .privacy-box {
      background: #fff;
      max-width: 920px;
      margin: 60px auto 120px;
      padding: 60px 80px;
      border-radius: var(--r-xl);
      border: 1px solid var(--line);
      box-shadow: var(--shadow-md);
      line-height: 1.8;
      color: var(--ink-3, var(--muted));
      font-size: 17px;
    }
    .privacy-box h2 {
      font-size: 1.35em;
      border-bottom: 2px solid var(--primary-100, var(--primary-xlight));
      padding-bottom: 8px;
      margin-top: 48px;
      color: var(--ink);
      letter-spacing: 0.01em;
    }
    .privacy-box ul { margin: 14px 0; padding-left: 24px; }
    .privacy-box li { margin-bottom: 10px; }
    .privacy-box a { color: var(--primary); font-weight: 600; text-decoration: none; }
    .privacy-box a:hover { text-decoration: underline; }
    .trasp-lead {
      font-size: 15px;
      color: var(--muted);
      margin: 0 0 30px;
      font-style: italic;
    }
    .info-box {
      background: var(--primary-50, var(--primary-xlight));
      border-left: 4px solid var(--primary);
      border-radius: var(--r-md);
      padding: 20px 24px;
      margin: 22px 0;
    }
    .info-box p { margin: 0; }
    .data-card {
      background: var(--bg-soft);
      border: 1px solid var(--line);
      border-radius: var(--r-md);
      padding: 26px 30px;
      margin: 20px 0;
      line-height: 1.9;
      font-size: 16px;
    }
    .data-card strong { color: var(--ink); }
    @media (max-width: 768px) {
      .privacy-box { margin: 40px 20px 80px; padding: 40px 26px; }
      .data-card { padding: 22px 22px; }
    }
  </style>
CSS;

include __DIR__ . '/header.php';
?>

  <main class="privacy-box">
    <h1 style="color:var(--primary); margin:0 0 8px; font-size:28px; line-height:1.3; font-weight:800;">Trasparenza commerciale</h1>
    <p class="trasp-lead">Informazioni sul nostro ruolo, sulla documentazione precontrattuale e sulle regole dei contatti commerciali.</p>

    <h2>Chi siamo</h2>
    <p><strong><?= $ragioneSociale ?></strong> è una società operante nel settore dei servizi di consulenza commerciale e supporto alla valutazione di offerte luce e gas.</p>
    <p><?= $ragioneSociale ?> opera come <strong>agenzia commerciale autorizzata</strong> per la promozione di offerte luce e gas di venditori autorizzati. Il contratto di fornitura, ove sottoscritto dal cliente, viene concluso con il venditore indicato nella documentazione precontrattuale e contrattuale consegnata prima della sottoscrizione.</p>

    <h2>Documentazione prima della sottoscrizione</h2>
    <p>Prima di qualsiasi eventuale sottoscrizione, il cliente riceverà la documentazione relativa all’offerta proposta, tra cui:</p>
    <ul>
      <li>scheda sintetica dell’offerta;</li>
      <li>condizioni tecnico-economiche;</li>
      <li>condizioni generali di fornitura;</li>
      <li>informazioni sul diritto di ripensamento;</li>
      <li>modulo per l’esercizio del diritto di ripensamento;</li>
      <li>informativa privacy del venditore finale;</li>
      <li>canali di assistenza e reclamo del venditore finale.</li>
    </ul>
    <p>Il cliente è invitato a leggere attentamente tutta la documentazione prima di aderire a qualsiasi offerta.</p>

    <h2>Contatti telefonici e richieste di ricontatto</h2>
    <p>Nel rispetto della normativa vigente in materia di tutela del consumatore, protezione dei dati personali, comunicazioni commerciali, telemarketing, teleselling e settore energia, con particolare riferimento al Regolamento (UE) 2016/679 (“GDPR”), al D.Lgs. 196/2003 come modificato dal D.Lgs. 101/2018, al D.Lgs. 206/2005 (“Codice del Consumo”), al D.P.R. 178/2010 e al D.P.R. 26/2022 in materia di Registro Pubblico delle Opposizioni, al Codice di condotta per le attività di telemarketing e teleselling approvato dal Garante per la Protezione dei Dati Personali con provvedimento del 7 marzo 2024, nonché al Codice di condotta commerciale ARERA per la vendita di energia elettrica e gas naturale ai clienti finali, di cui alla deliberazione ARERA 366/2018/R/com e successivi aggiornamenti, le attività di contatto vengono effettuate esclusivamente nei casi consentiti dalla normativa applicabile, ad esempio a seguito di richiesta diretta dell’utente, manifestazione di interesse o consenso specifico, libero, informato, documentabile e non preselezionato.</p>
    <p>L’utente può in ogni momento chiedere di non essere più ricontattato per finalità commerciali.</p>
    <p>Durante il contatto telefonico, l’operatore provvederà immediatamente a:</p>
    <ul>
      <li>identificarsi con il proprio nome o codice operatore;</li>
      <li>indicare chiaramente la denominazione di <?= $ragioneSociale ?>;</li>
      <li>specificare il marchio del venditore di energia/gas per conto del quale viene effettuata la proposta commerciale;</li>
      <li>mostrare un numero di telefono richiamabile o appartenente ai prefissi identificativi nazionali stabiliti dalle Autorità.</li>
    </ul>
    <p>In conformità al <a href="https://www.odmtelemarketing.it/" target="_blank" rel="noopener">Codice di condotta per attività di telemarketing e teleselling</a>, l’utente può opporsi in qualsiasi momento al contatto e richiedere l’iscrizione nella nostra Black List interna per non essere più ricontattato.</p>

    <h2>Registro Pubblico delle Opposizioni</h2>
    <p><?= $ragioneSociale ?> si impegna a rispettare le disposizioni applicabili in materia di Registro Pubblico delle Opposizioni e a gestire le richieste di opposizione, cancellazione o limitazione dei contatti commerciali secondo le procedure aziendali adottate.</p>
    <p>L’utente che non desidera ricevere ulteriori contatti commerciali può comunicarlo all’operatore durante la chiamata oppure utilizzare i recapiti indicati sul sito.</p>

    <h2>Portale Offerte ARERA</h2>
    <p>Per confrontare le offerte luce e gas disponibili sul mercato, il cliente può consultare il Portale Offerte, strumento pubblico e indipendente previsto dalla regolazione di settore.</p>
    <p>La consultazione del Portale Offerte non sostituisce la lettura della documentazione precontrattuale e contrattuale fornita dal venditore prima della sottoscrizione.</p>
    <div class="info-box">
      <p>Link utile: <a href="https://www.ilportaleofferte.it/" target="_blank" rel="noopener noreferrer">Portale Offerte ARERA — ilportaleofferte.it</a></p>
    </div>

    <h2>Assistenza e reclami</h2>
    <p>Per richieste relative al primo contatto commerciale, alla consulenza ricevuta o all’eventuale ricontatto da parte di <?= $ragioneSociale ?>, è possibile utilizzare i recapiti presenti sul sito.</p>
    <p>Per reclami relativi alla fornitura, alla fatturazione, all’attivazione, allo switching, alla gestione del contratto o all’esecuzione del rapporto di fornitura, il cliente deve rivolgersi al <strong>venditore finale</strong> indicato nella documentazione contrattuale.</p>

    <h2>Dati societari</h2>
    <p>Il sito è gestito da:</p>
    <div class="data-card">
      <strong><?= $ragioneSociale ?></strong><br>
<?php if ($coSede !== '') { ?>      Sede legale: <?= $coSede ?><br>
<?php } ?><?php if ($coPiva !== '') { ?>      C.F. e P.IVA: <?= $coPiva ?><br>
<?php } ?><?php if ($coCapitale !== '') { ?>      Capitale sociale: <?= $coCapitale ?><br>
<?php } ?><?php if ($coPec !== '') { ?>      PEC: <a href="mailto:<?= $coPec ?>"><?= $coPec ?></a><?= $coDpoEmail !== '' ? '<br>' : '' ?>
<?php } ?><?php if ($coDpoEmail !== '') { ?>      E-mail DPO / Responsabile della Protezione dei Dati: <a href="mailto:<?= $coDpoEmail ?>"><?= $coDpoEmail ?></a>
<?php } ?>    </div>

    <h2>Aggiornamento della pagina</h2>
    <p>La presente pagina potrà essere aggiornata in caso di modifiche normative, organizzative, commerciali o operative.</p>
  </main>

<?php include __DIR__ . '/footer.php'; ?>
