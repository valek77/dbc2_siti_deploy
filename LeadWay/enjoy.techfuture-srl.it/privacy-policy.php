<?php
require __DIR__ . '/_config.php';
$brandName = $LANDING_PAGE['titolo'] !== ''
    ? $LANDING_PAGE['titolo']
    : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Locura');
$pageTitle = 'Informativa Privacy';
$pageDescription = 'Informativa per il trattamento dei dati personali ai sensi dell\'art. 13 del Regolamento UE 2016/679 (GDPR).';
$pageHead = <<<'CSS'
<style>
  .policy-doc { max-width: 820px; margin: 70px auto 110px; padding: 0 24px; }
  .policy-doc .doc-title {
    text-align: center; font-size: clamp(22px, 4vw, 30px); font-weight: 800;
    text-transform: uppercase; letter-spacing: -0.01em; color: var(--ink, #0f172a); margin: 0;
  }
  .policy-doc .doc-subtitle {
    text-align: center; font-style: italic; font-size: 15px; color: var(--muted, #475569); margin: 12px 0 0;
  }
  .policy-doc .doc-rule { border: 0; border-top: 2px solid var(--primary, #0d9488); margin: 20px 0 40px; }
  .policy-doc h2 {
    color: var(--primary, #0d9488); font-size: 17px; font-weight: 700; margin: 34px 0 4px; letter-spacing: 0.01em;
  }
  .policy-doc .doc-art { text-align: left; font-style: italic; font-size: 13px; color: var(--muted, #475569); margin: 0 0 12px; font-weight: 600; }
  .policy-doc p { font-size: 15px; line-height: 1.75; text-align: justify; margin: 0 0 14px; color: var(--ink-2, #374151); }
  .policy-doc ol, .policy-doc ul { font-size: 15px; line-height: 1.75; color: var(--ink-2, #374151); margin: 0 0 14px; padding-left: 24px; }
  .policy-doc li { margin-bottom: 12px; text-align: justify; }
  .policy-doc a { color: var(--primary, #0d9488); font-weight: 600; }
</style>
CSS;
include __DIR__ . '/header.php';

// Titolare del trattamento = soggetto giuridico che gestisce il sito = azienda dall'API ($COMPANY).
// Costruisco la riga con i soli campi effettivamente presenti.
$tParts = [];
if ($COMPANY['sede_legale'] !== '') { $tParts[] = 'con sede legale in ' . $COMPANY['sede_legale']; }
if ($COMPANY['p_iva'] !== '')       { $tParts[] = 'Codice Fiscale e Partita IVA ' . $COMPANY['p_iva']; }
$contactEmail = $COMPANY['pec'] !== '' ? $COMPANY['pec'] : $COMPANY['email_supporto'];
if ($contactEmail !== '')           { $tParts[] = 'contattabile all\'indirizzo e-mail/PEC <a href="mailto:' . $contactEmail . '">' . $contactEmail . '</a>'; }
$tLine = $tParts ? ', ' . implode(', ', $tParts) : '';
$tName = $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'la società che gestisce il presente sito web';
?>

  <main class="policy-doc">

    <h1 class="doc-title">Informativa per il Trattamento dei Dati Personali</h1>
    <p class="doc-subtitle">Ai sensi dell&rsquo;art. 13 del Regolamento UE 2016/679</p>
    <hr class="doc-rule">

    <p>Gentile Utente,</p>

    <p>La informiamo che, ai sensi dell&rsquo;art. 16 del TFUE e dell&rsquo;art. 8 della Carta dei diritti fondamentali dell&rsquo;Unione Europea, ogni persona ha diritto alla protezione dei dati di carattere personale che la riguardano, a prescindere dalla nazionalità o residenza. I dati devono essere trattati secondo i principi di liceità, correttezza, trasparenza e minimizzazione, per finalità determinate e sulla base di un fondamento giuridico previsto dalla normativa vigente.</p>

    <p>La presente informativa ha carattere generico ed esemplificativo ed è destinata ad essere utilizzata nell&rsquo;ambito di servizi di informazione, comparazione e promozione di offerte nel settore dell&rsquo;energia (luce e gas), anche mediante siti web, landing page e strumenti digitali di raccolta contatti.</p>

    <h2>Titolare del trattamento</h2>
    <p class="doc-art">Art. 13, par. 1, lett. a</p>

    <p>Conformemente a quanto previsto dal Regolamento UE 2016/679, il Titolare del trattamento è individuato nel soggetto giuridico che gestisce il sito web o la piattaforma digitale attraverso la quale vengono raccolti i dati personali (di seguito, il &ldquo;Titolare&rdquo;).</p>

    <p>Nello specifico, il Titolare del trattamento è la società <strong><?= $tName ?></strong><?= $tLine ?>.</p>

    <p>Il Titolare fornisce agli interessati le informazioni relative al trattamento dei dati personali effettuato nell&rsquo;ambito dei servizi offerti online, inclusa la raccolta di richieste di informazioni, preventivi e proposte contrattuali relative a forniture di energia elettrica e gas naturale.</p>

    <p>I dati personali saranno trattati secondo i principi di liceità, correttezza, trasparenza, sicurezza e riservatezza. Il trattamento potrà avvenire con strumenti manuali e automatizzati, nel rispetto delle disposizioni di cui all&rsquo;art. 32 del GDPR e delle misure di sicurezza tecniche e organizzative adeguate.</p>

    <h2>Data Protection Officer</h2>
    <p class="doc-art">Art. 13, par. 1, lett. b</p>

    <p>Qualora previsto dalla normativa vigente, il Titolare potrà designare un Responsabile della Protezione dei Dati (RPD &ndash; DPO). I relativi dati di contatto saranno resi disponibili sul sito web o mediante specifica comunicazione all&rsquo;interessato.</p>

<?php if ($COMPANY['email_dpo'] !== '') { ?>
    <p>I dati di contatto del Responsabile della Protezione dei Dati (DPO) sono i seguenti: <a href="mailto:<?= $COMPANY['email_dpo'] ?>"><strong><?= $COMPANY['email_dpo'] ?></strong></a>.</p>
<?php } ?>

    <h2>Finalità specifiche del trattamento dei dati personali</h2>
    <p class="doc-art">Art. 13, par. 1, lett. c</p>

    <p>I dati personali forniti dall&rsquo;Utente possono essere trattati per le seguenti finalità:</p>

    <ul>
      <li>Gestione delle richieste di informazioni e preventivi nel settore energia: consentire all&rsquo;Utente di richiedere informazioni o ricevere proposte commerciali relative a forniture di energia elettrica e gas, nonché di essere ricontattato da operatori qualificati o partner commerciali per la presentazione di offerte contrattuali.</li>
      <li>Gestione dei contatti commerciali e precontrattuali: consentire il ricontatto telefonico o tramite strumenti elettronici da parte del Titolare o di soggetti partner autorizzati, esclusivamente previa acquisizione di un consenso valido, documentabile e verificabile, nel rispetto della normativa vigente in materia di telemarketing e tutela dei consumatori.</li>
      <li>Adempimento di obblighi normativi e regolatori nel settore energia: garantire il rispetto delle disposizioni previste dalla normativa nazionale e dalle misure introdotte per la tutela degli utenti nel mercato dell&rsquo;energia, inclusi gli obblighi di trasparenza, correttezza commerciale e tracciabilità del consenso, anche in relazione alle disposizioni introdotte in materia di contrasto alle pratiche commerciali scorrette e al telemarketing aggressivo.</li>
      <li>Sicurezza dei sistemi e prevenzione abusi: garantire il corretto funzionamento del sito, la sicurezza dei sistemi informatici, la prevenzione di utilizzi illeciti o fraudolenti e la tutela dei diritti del Titolare in sede giudiziaria.</li>
      <li>Analisi delle esigenze energetiche dell&rsquo;Utente: consentire all&rsquo;Utente di fornire informazioni relative alla propria fornitura energetica, anche mediante caricamento volontario di documenti (es. bollette), al fine di ricevere proposte commerciali coerenti con il proprio profilo di consumo.</li>
      <li>Attività di marketing diretto: inviare comunicazioni promozionali e informative relative a servizi e offerte nel settore energia, mediante telefono, e-mail, SMS o altri strumenti di comunicazione elettronica, esclusivamente previo consenso espresso dell&rsquo;interessato.</li>
    </ul>

    <h2>Base giuridica</h2>
    <p class="doc-art">Art. 13, par. 1, lett. d</p>

    <p>Il trattamento dei dati personali si fonda sulle seguenti basi giuridiche:</p>

    <ul>
      <li>esecuzione di misure precontrattuali adottate su richiesta dell&rsquo;interessato, ai sensi dell&rsquo;art. 6, par. 1, lett. b) del GDPR, per la gestione delle richieste di informazioni, preventivi e contatti commerciali;</li>
      <li>adempimento di obblighi legali e regolatori, ai sensi dell&rsquo;art. 6, par. 1, lett. c) del GDPR, con particolare riferimento agli obblighi previsti dalla normativa in materia di servizi energetici, tutela dei consumatori e trasparenza delle comunicazioni commerciali;</li>
      <li>legittimo interesse del Titolare, ai sensi dell&rsquo;art. 6, par. 1, lett. f) del GDPR, per garantire la sicurezza dei sistemi, prevenire frodi e difendere i propri diritti;</li>
      <li>consenso libero, specifico, informato e inequivocabile dell&rsquo;interessato, ai sensi dell&rsquo;art. 6, par. 1, lett. a) del GDPR, per le attività di marketing e per il ricontatto commerciale mediante telefono o strumenti automatizzati.</li>
    </ul>

    <p>Il consenso prestato dall&rsquo;Utente è registrato e conservato dal Titolare quale prova dell&rsquo;avvenuta manifestazione di volontà, in conformità alla normativa vigente.</p>

    <h2>Natura e categoria dei dati personali trattati</h2>

    <p>Il Titolare tratta dati personali comuni degli Utenti, raccolti direttamente presso l&rsquo;interessato o acquisiti automaticamente durante l&rsquo;utilizzo del sito o delle landing page e, segnatamente:</p>

    <ul>
      <li>Dati di navigazione: i sistemi informatici acquisiscono automaticamente alcuni dati tecnici necessari al funzionamento del sito, quali indirizzo IP, data e ora della richiesta e altre informazioni relative alla connessione.</li>
      <li>Dati personali comuni forniti volontariamente dall&rsquo;Utente: il Titolare tratta i dati personali conferiti mediante la compilazione dei moduli online o tramite contatto telefonico. Tali dati possono comprendere: nome e cognome; numero di telefono; indirizzo e-mail; indirizzo di fornitura; informazioni relative alla fornitura energetica.</li>
      <li>Dati relativi alle preferenze e ai consumi energetici: l&rsquo;Utente può fornire informazioni relative alle proprie abitudini di consumo energetico, utili per la formulazione di proposte commerciali personalizzate.</li>
      <li>Dati contenuti nei documenti caricati dall&rsquo;Utente: l&rsquo;Utente può caricare documenti quali bollette o contratti relativi alla fornitura energetica. Tali documenti sono trattati esclusivamente per la valutazione delle condizioni contrattuali e la predisposizione di offerte commerciali.</li>
      <li>Cookie tecnici: il sito utilizza cookie tecnici strettamente necessari al funzionamento della piattaforma e all&rsquo;erogazione dei servizi richiesti.</li>
    </ul>

    <h2>Mancata comunicazione dei dati personali e conseguenze del rifiuto</h2>
    <p class="doc-art">Art. 13, par. 2, lett. e</p>

    <p>Il conferimento dei dati personali per le finalità di richiesta di informazioni, preventivi e contatti commerciali è necessario per consentire l&rsquo;erogazione dei servizi richiesti dall&rsquo;Utente.</p>

    <p>Il conferimento dei dati per finalità di marketing e contatto commerciale è facoltativo e subordinato al rilascio di uno specifico consenso. L&rsquo;eventuale rifiuto non pregiudica la possibilità di ricevere informazioni di natura non promozionale.</p>

    <h2>Modalità del trattamento e misure tecniche e organizzative</h2>

    <p>Il trattamento dei dati personali avviene mediante strumenti elettronici e informatici idonei a garantire la sicurezza, l&rsquo;integrità e la riservatezza dei dati.</p>

    <p>Il Titolare adotta misure tecniche e organizzative adeguate, tra cui: sistemi di autenticazione e controllo degli accessi; registrazione e tracciabilità delle operazioni sui dati; sistemi di protezione contro accessi non autorizzati; procedure di gestione delle richieste degli interessati; sistemi di conservazione delle prove di consenso.</p>

    <h2>Destinatari di dati personali</h2>
    <p class="doc-art">Art. 13, par. 1, lett. e</p>

    <p>I dati personali non saranno diffusi.</p>

    <p>I dati personali possono essere comunicati a soggetti terzi operanti nel settore dell&rsquo;energia elettrica e del gas naturale, quali fornitori di servizi energetici, società partner o intermediari commerciali, esclusivamente per la gestione delle richieste di preventivo e la conclusione di eventuali contratti di fornitura.</p>

    <p>Tali soggetti trattano i dati in qualità di autonomi titolari o responsabili del trattamento, nel rispetto della normativa vigente.</p>

    <p>Il Titolare può inoltre comunicare i dati a fornitori di servizi tecnici e informatici necessari per il funzionamento del sito e la gestione delle comunicazioni.</p>

    <h2>Trasferimento dei dati verso Paesi terzi</h2>

    <p>I dati personali sono trattati prevalentemente all&rsquo;interno del territorio dell&rsquo;Unione Europea.</p>

    <p>Qualora si rendesse necessario trasferire dati verso Paesi terzi, il Titolare adotterà le garanzie previste dal GDPR, quali clausole contrattuali standard o decisioni di adeguatezza della Commissione Europea.</p>

    <h2>Durata del trattamento &ndash; Periodo di conservazione dei dati</h2>
    <p class="doc-art">Art. 13, par. 2, lett. a</p>

    <p>I dati personali sono conservati per il tempo strettamente necessario al conseguimento delle finalità per le quali sono raccolti e nel rispetto degli obblighi di legge.</p>

    <p>In particolare:</p>

    <ul>
      <li>dati di contatto e richieste di preventivo: conservati per un periodo massimo di 12 mesi dalla raccolta;</li>
      <li>dati relativi al consenso al marketing e al contatto commerciale: conservati fino alla revoca del consenso e comunque per un periodo non superiore a 24 mesi;</li>
      <li>dati necessari per adempiere ad obblighi normativi o per la gestione di eventuali contenziosi: conservati per il periodo previsto dalla legge;</li>
      <li>documenti caricati dall&rsquo;Utente: conservati per il tempo necessario alla valutazione della richiesta e successivamente cancellati o anonimizzati.</li>
    </ul>

    <p>Decorso il termine di conservazione, i dati saranno cancellati o resi anonimi.</p>

    <h2>Luogo di conservazione dei dati</h2>

    <p>I dati personali sono conservati su server e infrastrutture informatiche situati all&rsquo;interno dell&rsquo;Unione Europea.</p>

    <h2>Diritti dell&rsquo;interessato</h2>

    <p>L&rsquo;interessato può esercitare in qualsiasi momento i diritti previsti dagli articoli da 15 a 22 del Regolamento UE 2016/679, tra cui:</p>

    <ul>
      <li>diritto di accesso ai dati personali;</li>
      <li>diritto di rettifica dei dati inesatti;</li>
      <li>diritto alla cancellazione dei dati;</li>
      <li>diritto alla limitazione del trattamento;</li>
      <li>diritto alla portabilità dei dati;</li>
      <li>diritto di opposizione al trattamento;</li>
      <li>diritto di revocare il consenso in qualsiasi momento.</li>
    </ul>

    <p>L&rsquo;interessato ha inoltre il diritto di opporsi in qualsiasi momento al trattamento dei propri dati per finalità di marketing diretto e al contatto telefonico per finalità commerciali.</p>

    <p>Qualora l&rsquo;interessato sia iscritto al Registro Pubblico delle Opposizioni, il Titolare si impegna a verificare preventivamente tale iscrizione prima di effettuare comunicazioni telefoniche a fini commerciali.</p>

    <p>Le richieste relative all&rsquo;esercizio dei diritti possono essere inviate ai recapiti indicati dal Titolare nella presente informativa.</p>

    <h2>Reclamo all&rsquo;Autorità di controllo</h2>

    <p>L&rsquo;interessato ha il diritto di proporre reclamo all&rsquo;Autorità Garante per la protezione dei dati personali, ai sensi dell&rsquo;art. 77 del GDPR, qualora ritenga che il trattamento dei dati violi la normativa vigente.</p>

    <h2>Revoca del consenso</h2>
    <p class="doc-art">Art. 13, par. 2, lett. d</p>

    <p>L&rsquo;interessato può revocare in qualsiasi momento il consenso prestato per finalità di marketing o contatto commerciale, senza pregiudicare la liceità del trattamento effettuato prima della revoca.</p>

    <h2>Aggiornamenti della presente informativa</h2>

    <p>La presente informativa potrà essere soggetta a modifiche o aggiornamenti, anche in conseguenza di variazioni normative, evoluzioni tecnologiche o aggiornamenti delle policy aziendali nel settore dell&rsquo;energia e della tutela dei consumatori.</p>

    <p>Gli aggiornamenti saranno resi disponibili mediante pubblicazione sul sito web o tramite altri canali informativi appropriati.</p>

  </main>

<?php include __DIR__ . '/footer.php'; ?>
