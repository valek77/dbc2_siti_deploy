<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Policy di Utilizzo della Landing Page';
$pageDescription = 'Policy di utilizzo della landing page unica del Titolare Semplice Gas & Luce S.p.A. — conformità Decreto Bollette e art. 51 del Codice del Consumo.';
$pageHead = <<<'CSS'
  <style>
    .legal-content {
      padding: 80px 20px;
      max-width: 900px;
      margin: 0 auto;
      line-height: 1.8;
      color: var(--text-label);
      min-height: 60vh;
    }

    .legal-content h1 {
      color: var(--primary);
      margin-bottom: 40px;
      font-size: 32px;
      text-align: center;
      line-height: 1.3;
    }
  </style>
CSS;
include __DIR__ . '/header.php';

// MODIFICA 2: i dati del «Responsabile» sono quelli della company (dall'API).
$resp = [];
if ($COMPANY['company_name'] !== '') {
  $resp[] = '<strong>' . $COMPANY['company_name'] . '</strong>';
}
if ($COMPANY['sede_legale'] !== '') {
  $resp[] = 'con sede legale in ' . $COMPANY['sede_legale'];
}
if ($COMPANY['p_iva'] !== '') {
  $resp[] = 'C.F./P.IVA ' . $COMPANY['p_iva'];
}
if ($COMPANY['pec'] !== '') {
$resp[] = 'PEC <a href="mailto:' . $COMPANY['pec'] . '"><strong>' . $COMPANY['pec'] . '</strong></a>';
}
$responsabileData = implode(', ', $resp);

?>

<main class="legal-content">
  <h1>Condizioni di Utilizzo</h1>

  L’utilizzo del sito web <?= $SITO_WEB ?> (di seguito, il “Sito”) comporta l’accettazione integrale delle presenti
  condizioni generali di utilizzo (di seguito, le “Condizioni Generali”). Il Sito è di titolarità e proprietà di
  <?= $responsabileData ?> (di seguito, la “Società”).
  <ol>
    <li><strong> Premesse</strong></li>
  </ol>
  Le presenti Condizioni Generali disciplinano l’accesso, la navigazione e l’utilizzo del Sito, nonché dei servizi
  informativi, di comparazione, analisi, assistenza digitale e richiesta di preventivo eventualmente resi disponibili
  attraverso il Sito.

  La Società si riserva il diritto di modificare, aggiornare o integrare in qualsiasi momento le presenti Condizioni
  Generali, per esigenze operative, tecniche, commerciali o per adeguamento normativo. Le modifiche avranno efficacia
  dalla data di pubblicazione sul Sito.
  <ol start="2">
    <li><strong> Oggetto del servizio</strong></li>
  </ol>
  <?= $COMPANY['company_name']  ?> è una piattaforma digitale che consente agli utenti di consultare, confrontare e analizzare offerte,
  preventivi, condizioni economiche e informazioni relative a prodotti e servizi propri o di soggetti terzi, anche
  mediante l’impiego di strumenti algoritmici, motori di calcolo, sistemi software avanzati e modelli linguistici di
  supporto all’interazione (LLM).

  Le informazioni, le simulazioni, i risultati di comparazione e gli eventuali contenuti generati o rielaborati
  tramite strumenti automatizzati hanno natura informativa e orientativa, salvo diverso accordo scritto o diversa
  specifica indicazione presente sul Sito.

  Per determinate categorie di prodotti o servizi, il Sito può consentire l’inoltro di richieste verso partner
  commerciali, operatori, intermediari. In tali ipotesi, il relativo servizio potrà essere disciplinato da condizioni
  specifiche, da documentazione dedicata e da informative privacy rese dai rispettivi titolari del trattamento.
  <ol start="3">
    <li><strong> Registrazione, area riservata e servizi continuativi</strong></li>
  </ol>
  L’accesso ad alcune funzionalità del Sito può richiedere la registrazione dell’utente e la creazione di un’area
  riservata, ad esclusione delle categorie (Energia e Telefonia) . L’utente si impegna pertanto,a fornire dati
  completi, corretti e aggiornati, nonché a custodire con diligenza le proprie credenziali di accesso.

  Laddove previsto, la registrazione potrà consentire la memorizzazione delle richieste effettuate, la gestione dei
  preventivi, la ricezione di aggiornamenti relativi alle comparazioni richieste, nonché l’accesso a servizi di
  supporto connessi all’utilizzo della piattaforma nello specifico settore.

  L’utente potrà richiedere la disattivazione del proprio account o l’interruzione dei servizi collegati all’area
  riservata secondo le modalità indicate sul Sito o scrivendo agli indirizzi di contatto della Società.
  <ol start="4">
    <li><strong> Disponibilità del Sito</strong></li>
  </ol>
  La Società adotta misure ragionevoli per assicurare la continuità e il corretto funzionamento del Sito, ma non
  garantisce che il servizio sia sempre disponibile, privo di errori, interruzioni o ritardi.

  Potranno verificarsi sospensioni temporanee dovute a manutenzione, aggiornamenti, interventi tecnici, cause di forza
  maggiore o fatti imputabili a terzi. La Società si riserva il diritto di sospendere, limitare o interrompere in
  tutto o in parte il funzionamento del Sito, anche senza preavviso, ove necessario.
  <ol start="5">
    <li><strong> Diritti e doveri dell’utente</strong></li>
  </ol>
  L’utente si impegna a utilizzare il Sito in modo lecito, corretto e conforme alle presenti Condizioni Generali, alla
  normativa vigente e ai principi di buona fede.
  <ul>
    <li>non utilizzare il Sito per finalità illecite, fraudolente o lesive di diritti altrui;</li>
    <li>non inserire dati falsi, incompleti o riferiti a terzi senza adeguato titolo;</li>
    <li>non compromettere, aggirare o tentare di aggirare le misure di sicurezza del Sito;</li>
    <li>non copiare, riprodurre, rivendere, sfruttare commercialmente o mettere a disposizione di terzi il Sito o
      parti di esso senza preventiva autorizzazione scritta della Società.</li>
  </ul>
  L’utente è l’unico responsabile delle attività effettuate tramite il proprio account e delle informazioni trasmesse
  attraverso il Sito.
  <ol start="6">
    <li><strong> Limitazioni di responsabilità</strong></li>
  </ol>
  Salvo i casi di dolo o colpa grave, la Società non potrà essere ritenuta responsabile per danni diretti o indiretti
  derivanti dall’uso o dal mancato uso del Sito, dall’affidamento riposto sulle informazioni in esso contenute, da
  interruzioni del servizio, errori tecnici, malfunzionamenti, indisponibilità dei sistemi di terzi o inesattezze
  imputabili a dati forniti da partner, operatori o utenti.

  La Società non assume alcuna responsabilità in relazione alla conclusione di contratti tra l’utente e soggetti terzi
  eventualmente presenti o raggiungibili tramite il Sito, salvo che ciò non sia espressamente previsto da specifica
  documentazione contrattuale.
  <ol start="7">
    <li><strong> Proprietà intellettuale e industriale</strong></li>
  </ol>
  Il Sito, la sua struttura, il software, i contenuti, i database, i testi, i layout, le grafiche, i marchi, i segni
  distintivi, le immagini, i flussi conversazionali, i modelli organizzativi e ogni altro elemento presente o reso
  disponibile attraverso il Sito sono di proprietà della Società <?= $COMPANY['company_name'] ?> o dei rispettivi titolari dei diritti
  e sono protetti dalla normativa vigente in materia di proprietà intellettuale e industriale.

  È fatto divieto di copiare, estrarre, riprodurre, distribuire, modificare, decompilare, disassemblare, tradurre,
  adattare o utilizzare in qualsiasi forma il Sito o parte dei suoi contenuti per finalità diverse dall’uso personale
  e legittimo consentito.
  <ol start="8">
    <li><strong> Comunicazioni</strong></li>
  </ol>
  Per comunicazioni, segnalazioni o richieste di assistenza, l’utente potrà utilizzare i recapiti indicati nella
  sezione contatti del Sito. Ai fini redazionali, nel presente testo sono richiamati i seguenti indirizzi:
  <ul>
    <?php if ($COMPANY['email_supporto']) { ?> <li><strong><a href="mailto:<?= $COMPANY['email_supporto'] ?>"><?= $COMPANY['email_supporto'] ?></a></strong></li>
    <?php } ?>
    <?php if ($COMPANY['pec']) { ?> <li><strong><a href="mailto:<?= $COMPANY['pec'] ?>"><?= $COMPANY['pec'] ?></a></strong></li>
    <?php } ?>
  </ul>
  In caso di reclami relativi a specifici servizi o prodotti, ad esclusione delle categorie (Energia e Telefonia) ,la
  Società potrà indirizzare l’utente verso il partner competente o che eroga il servizio richiesto.
  <ol start="9">
    <li><strong> Legge applicabile e foro competente</strong></li>
  </ol>
  Le presenti Condizioni Generali sono regolate dalla legge italiana. Per ogni controversia relativa alla validità,
  interpretazione, esecuzione o cessazione delle presenti Condizioni Generali sarà competente il foro individuato ai
  sensi della normativa applicabile, incluso, ove ne ricorrano i presupposti, il foro del consumatore previsto dal
  Codice del Consumo.
  <ol start="10">
    <li><strong> Modello organizzativo e Codice Etico</strong></li>
  </ol>
  La Società può adottare un proprio Modello di Organizzazione, Gestione e Controllo ai sensi del D. Lgs. 8 giugno
  2001, n. 231, nonché un proprio Codice Etico, quali strumenti di presidio organizzativo e prevenzione dei rischi.

  Qualora attivati, i canali per l’invio di segnalazioni all’Organismo di Vigilanza o ad altra funzione interna
  competente saranno indicati sul Sito o nei documenti societari ufficiali. Le segnalazioni saranno trattate con
  criteri di riservatezza nei limiti previsti dalla normativa applicabile.
  <ol start="11">
    <li><strong> Trattamento dei dati personali</strong></li>
  </ol>
  Rif: <a href="privacy-policy.php">Informativa Privacy</a>
  <ol start="12">
    <li><strong> Clausole finali</strong></li>
  </ol>
  Qualora una o più clausole delle presenti Condizioni Generali dovessero risultare nulle, invalide o inefficaci, la
  restante parte manterrà piena validità ed efficacia.

  Le presenti Condizioni Generali sono redatte in lingua italiana e costituiscono la disciplina generale di utilizzo
  del Sito, salvo eventuali condizioni particolari applicabili a specifici servizi, iniziative o aree della
  piattaforma.
</main>

<?php include __DIR__ . '/footer.php'; ?>