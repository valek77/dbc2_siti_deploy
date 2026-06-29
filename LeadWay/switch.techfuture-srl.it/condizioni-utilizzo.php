<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Condizioni di Utilizzo';
$metaDescription = 'Termini e condizioni generali di utilizzo del sito web ' . $OPERATORE['nome_marketing'] . '.';

$pageHead = <<<'CSS'
  <style>
    .privacy-content h2 {
      font-size: 1.4em;
      border-bottom: 2px solid var(--primary-100);
      padding-bottom: 8px;
      margin-top: 48px;
      text-transform: uppercase;
      color: var(--ink);
      letter-spacing: 0.02em;
    }
    .privacy-box {
      background: #fff;
      max-width: 920px;
      margin: 60px auto 120px;
      padding: 60px 80px;
      border-radius: var(--r-xl);
      border: 1px solid var(--line);
      box-shadow: var(--shadow-md);
      line-height: 1.8;
      color: var(--ink-3);
      font-size: 17px;
    }
    .intro-box {
      background-color: var(--bg-soft);
      padding: 30px;
      border-radius: 12px;
      border: 1px solid var(--line);
      margin-bottom: 40px;
      font-style: italic;
    }
    @media (max-width: 768px) {
      .privacy-box {
        margin: 40px 20px 80px;
        padding: 40px 30px;
      }
    }
  </style>
CSS;

// Ragione sociale e recapito dai dati API (con fallback).
$ragioneSociale = $COMPANY['company_name'] !== '' ? $COMPANY['company_name']
  : ($COMPANY['nome_commerciale'] !== '' ? $COMPANY['nome_commerciale'] : $OPERATORE['nome_marketing']);
$emailContatto = $COMPANY['email_supporto'] !== '' ? $COMPANY['email_supporto'] : $COMPANY['pec'];

include __DIR__ . '/header.php';
?>

  <section style="background: linear-gradient(135deg,#047857 0%,#10B981 100%); padding:100px 20px; text-align:center;">
    <h1 style="color:#fff; font-size:clamp(36px,5vw,56px); margin:0; font-weight:800;">Condizioni di Utilizzo</h1>

  </section>

  <main class="privacy-box">
    <div class="intro-box">
      <p style="margin: 0;">L’utilizzo del presente sito web<?php if ($LANDING_PAGE['url'] !== '') { ?> <?= $LANDING_PAGE['url'] ?><?php } ?> (di seguito, il “Sito”) comporta l’accettazione integrale delle presenti condizioni generali di utilizzo. Il Sito è di titolarità e proprietà di <strong><?= $ragioneSociale ?></strong><?php if ($COMPANY['sede_legale'] !== '') { ?>, con sede in <?= $COMPANY['sede_legale'] ?><?php } ?><?php if ($COMPANY['p_iva'] !== '') { ?>, Partita IVA <?= $COMPANY['p_iva'] ?><?php } ?>.</p>
    </div>

    <h2>Oggetto del servizio</h2>
    <p>Questa è una piattaforma digitale che consente agli utenti di consultare, confrontare e analizzare offerte, preventivi e informazioni relative a prodotti energetici. Le informazioni hanno natura informativa e orientativa.</p>

    <h2>Diritti e doveri dell’utente</h2>
    <p>L’utente si impegna a utilizzare il Sito in modo lecito, corretto e conforme alle presenti Condizioni Generali. In particolare, si impegna a non utilizzare il Sito per finalità illecite o fraudolente.</p>

    <h2>Limitazioni di responsabilità</h2>
    <p>La Società non potrà essere ritenuta responsabile per danni derivanti dall'uso o dal mancato uso del Sito, o dall'affidamento riposto sulle informazioni in esso contenute, salvo i casi di dolo o colpa grave.</p>

    <h2>Proprietà intellettuale</h2>
    <p>Tutti i contenuti presenti sul Sito sono di proprietà di <strong><?= $ragioneSociale ?></strong> o dei rispettivi titolari dei diritti e sono protetti dalla normativa sulla proprietà intellettuale.</p>

    <h2>Comunicazioni</h2>
<?php if ($emailContatto) { ?>    <p>Per qualsiasi richiesta di assistenza o segnalazione, è possibile scrivere a: <a href="mailto:<?= $emailContatto ?>" style="color:var(--primary); font-weight:600;"><?= $emailContatto ?></a>.</p>
<?php } ?>

    <hr>
    <p style="font-size: 14px; color: var(--muted); text-align: center;">Ultimo aggiornamento: Maggio 2026</p>
  </main>

<?php include __DIR__ . '/footer.php'; ?>
