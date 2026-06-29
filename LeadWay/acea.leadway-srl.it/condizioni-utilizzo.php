<?php
require __DIR__ . '/_config.php';

// Dati dinamici dall'API nuova (/landing-pages). Disponibili subito dopo _config.php,
// prima dell'include di header.php (dove viene impostato $brandName).
$nomeOperatore  = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing']
    : ($OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : 'Illumia');
$ragioneSociale = $COMPANY['company_name'] !== '' ? $COMPANY['company_name']
    : ($LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale'] : 'Action Srl');
$emailContatto  = $COMPANY['email_supporto'] !== '' ? $COMPANY['email_supporto'] : $COMPANY['pec'];

$pageTitle = 'Condizioni di Utilizzo';
$metaDescription = 'Termini e condizioni generali di utilizzo del sito web ' . $nomeOperatore . '.';

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
    @media (max-width: 768px) {
      .privacy-box {
        margin: 40px 20px 80px;
        padding: 40px 30px;
      }
    }
  </style>
CSS;

include __DIR__ . '/header.php';
?>

  <main class="privacy-box">
    <h1 style="color:var(--primary); margin:0 0 8px; font-size:28px; line-height:1.3; font-weight:800;">Condizioni di Utilizzo</h1>
    <p style="font-style:italic; font-size:14px; color:var(--muted); margin:0 0 30px;">Termini e condizioni generali del sito web <?= $nomeOperatore ?></p>

    <h2>Premessa</h2>
    <p>L’utilizzo del presente sito web<?php if ($LANDING_PAGE['url'] !== '') { ?> <?= $LANDING_PAGE['url'] ?><?php } ?> (di seguito, il “Sito”) comporta l’accettazione integrale delle presenti condizioni generali di utilizzo. Il Sito è di titolarità e proprietà di <strong><?= $ragioneSociale ?></strong><?php if ($COMPANY['sede_legale'] !== '') { ?>, con sede in <?= $COMPANY['sede_legale'] ?><?php } ?><?php if ($COMPANY['p_iva'] !== '') { ?>, Partita IVA <?= $COMPANY['p_iva'] ?><?php } ?>.</p>

    <h2>Oggetto del servizio</h2>
    <p>Questo sito è una piattaforma digitale che consente agli utenti di consultare, confrontare e analizzare offerte, preventivi e informazioni relative a prodotti energetici. Le informazioni hanno natura informativa e orientativa.</p>

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
