<?php
require __DIR__ . '/_config.php';
$brandName = $LANDING_PAGE['titolo'] !== ''
    ? $LANDING_PAGE['titolo']
    : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Locura');
$pageTitle = 'Informativa Privacy';
$pageDescription = 'Informativa privacy per la raccolta dei dati tramite form di contatto, ai sensi degli artt. 12, 13 e 14 del Regolamento UE 2016/679 (GDPR).';
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
    color: var(--primary, #0d9488); font-size: 17px; font-weight: 700; margin: 34px 0 12px; letter-spacing: 0.01em;
  }
  .policy-doc h3 { color: var(--ink, #0f172a); font-size: 15px; font-weight: 700; margin: 18px 0 4px; }
  .policy-doc p { font-size: 15px; line-height: 1.75; text-align: justify; margin: 0 0 14px; color: var(--ink-2, #374151); }
  .policy-doc address { font-style: normal; font-size: 15px; line-height: 1.75; color: var(--ink-2, #374151); margin: 0 0 14px; padding-left: 16px; border-left: 2px solid var(--primary, #0d9488); }
  .policy-doc ul { font-size: 15px; line-height: 1.75; color: var(--ink-2, #374151); margin: 0 0 14px; padding-left: 24px; }
  .policy-doc li { margin-bottom: 8px; text-align: justify; }
  .policy-doc a { color: var(--primary, #0d9488); font-weight: 600; }
  .policy-doc .doc-updated { font-size: 13px; font-style: italic; color: var(--muted, #475569); margin-top: 24px; }
</style>
CSS;
include __DIR__ . '/header.php';

// Titolare del trattamento = operatore energetico dall'API ($OPERATORE).
// Partner che gestisce la landing = azienda dall'API ($COMPANY).
// I valori sono già puliti per l'HTML; le righe senza dato non vengono mostrate.
$opNome = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : 'Operatore energetico';
$opBrand = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : $opNome;
$opEmail = $OPERATORE['email_dpo'] !== '' ? $OPERATORE['email_dpo'] : $OPERATORE['email_supporto'];
$partnerNome = $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Partner commerciale';

$mailLink = function ($email) {
    return '<a href="mailto:' . $email . '">' . $email . '</a>';
};

$titolareRighe = ['<strong>' . $opNome . '</strong>'];
if ($OPERATORE['indirizzo'] !== '')    { $titolareRighe[] = 'Sede legale: ' . $OPERATORE['indirizzo']; }
if ($OPERATORE['partita_iva'] !== '')  { $titolareRighe[] = 'C.F. / P. IVA: ' . $OPERATORE['partita_iva']; }
if ($OPERATORE['numero_rea'] !== '')   { $titolareRighe[] = 'R.E.A.: ' . $OPERATORE['numero_rea']; }
if ($OPERATORE['capitale_sociale'] !== '') {
    $capitale = $OPERATORE['capitale_sociale'];
    $titolareRighe[] = 'Capitale Sociale: € ' . (is_numeric($capitale) ? number_format((float) $capitale, 2, ',', '.') : $capitale);
}

$partnerRighe = ['<strong>' . $partnerNome . '</strong>'];
if ($COMPANY['sede_legale'] !== '')    { $partnerRighe[] = 'Sede: ' . $COMPANY['sede_legale']; }
if ($COMPANY['p_iva'] !== '')          { $partnerRighe[] = 'P. IVA / C.F.: ' . $COMPANY['p_iva']; }
if ($COMPANY['email_supporto'] !== '') { $partnerRighe[] = 'Email: ' . $mailLink($COMPANY['email_supporto']); }
if ($COMPANY['pec'] !== '')            { $partnerRighe[] = 'PEC: ' . $mailLink($COMPANY['pec']); }

$dirittiRighe = ['<strong>' . $opNome . '</strong>'];
if ($opEmail !== '')                   { $dirittiRighe[] = 'Email: ' . $mailLink($opEmail); }
if ($OPERATORE['pec'] !== '')          { $dirittiRighe[] = 'PEC: ' . $mailLink($OPERATORE['pec']); }
?>

  <main class="policy-doc">

    <h1 class="doc-title">Informativa privacy per la raccolta dei dati tramite form di contatto</h1>
    <p class="doc-subtitle">Informativa ai sensi degli artt. 12, 13 e 14 del Regolamento UE 2016/679 (“GDPR”)</p>
    <hr class="doc-rule">

    <p>La presente informativa descrive il trattamento dei dati personali conferiti dall’utente mediante la compilazione del form di contatto presente su questa landing page, finalizzato alla richiesta di ricontatto per ricevere informazioni commerciali sulle offerte luce e gas di <?= $opNome ?>, a brand <?= $opBrand ?>.</p>

    <p>La presente informativa riguarda esclusivamente il trattamento dei dati inseriti nel form di raccolta nominativi. Non disciplina, invece, i trattamenti relativi alla navigazione sul sito, alla gestione tecnica della landing page, ai cookie o ad altri strumenti di tracciamento eventualmente presenti, che sono regolati da separata informativa resa dal soggetto che gestisce il sito e/o la landing page.</p>

    <h2>1. Titolare del trattamento</h2>
    <p>Il Titolare del trattamento dei dati personali raccolti tramite il form è:</p>
    <address><?= implode('<br>', $titolareRighe) ?></address>

    <h2>2. Soggetto che gestisce la landing page e il contatto telefonico</h2>
    <p>La landing page su cui è presente il form è gestita da:</p>
    <address><?= implode('<br>', $partnerRighe) ?></address>
    <p>Il Partner gestisce la landing page e, limitatamente ai dati conferiti tramite il form per conto di <?= $opNome ?>, opera quale soggetto autorizzato e/o Responsabile del trattamento ai sensi dell’art. 28 GDPR, sulla base di specifico accordo e istruzioni documentate impartite da <?= rtrim($opNome, '.') ?>.</p>
    <p>Il Partner potrà contattare l’utente, per conto di <?= $opNome ?>, esclusivamente per dare seguito alla richiesta di ricontatto ricevuta tramite il form, illustrare le offerte luce e gas di <?= $opNome ?> ed eventualmente promuovere la conclusione di un contratto.</p>

    <h2>3. Tipologia di dati trattati</h2>
    <p>Attraverso il form possono essere raccolti e trattati, a titolo esemplificativo:</p>
    <ul>
      <li>nome e cognome;</li>
      <li>recapito telefonico;</li>
      <li>indirizzo email;</li>
      <li>provincia, comune, CAP o area geografica di interesse;</li>
      <li>eventuali informazioni relative alla fornitura o alle esigenze dell’utente, ove richieste nel form;</li>
      <li>eventuale fornitore attuale o dati dichiarati dall’utente per ricevere una proposta commerciale;</li>
      <li>data e ora di compilazione del form;</li>
      <li>indirizzo IP;</li>
      <li>identificativi tecnici della sessione;</li>
      <li>URL della landing page o campagna di provenienza;</li>
      <li>versione dell’informativa privacy visualizzata;</li>
      <li>prova del consenso o della richiesta di ricontatto prestata tramite checkbox;</li>
      <li>log tecnici necessari a documentare la provenienza del lead e la manifestazione di volontà dell’utente.</li>
    </ul>
    <p>Non è richiesto all’utente di inserire dati appartenenti a categorie particolari ai sensi dell’art. 9 GDPR, quali, ad esempio, dati relativi alla salute, opinioni politiche, convinzioni religiose o appartenenza sindacale.</p>

    <h2>4. Finalità del trattamento</h2>
    <p>I dati personali conferiti tramite il form saranno trattati per le seguenti finalità:</p>
    <h3>a) Gestione della richiesta di ricontatto</h3>
    <p>I dati saranno utilizzati per contattare l’utente che ha compilato il form e richiesto di essere richiamato.</p>
    <h3>b) Illustrazione delle offerte luce e gas di <?= $opNome ?></h3>
    <p>I dati saranno utilizzati per fornire informazioni commerciali sulle offerte luce e gas di <?= $opNome ?>, rispondere alle richieste dell’utente e proporre soluzioni coerenti con l’interesse manifestato.</p>
    <h3>c) Eventuale promozione e gestione della fase precontrattuale</h3>
    <p>Qualora l’utente manifesti interesse, i dati potranno essere utilizzati per avviare le attività necessarie alla formulazione di una proposta, alla verifica dei dati forniti e all’eventuale conclusione di un contratto con <?= rtrim($opNome, '.') ?>.</p>
    <h3>d) Gestione di richieste, reclami, contestazioni e verifiche interne</h3>
    <p>I dati, inclusi i log tecnici relativi alla compilazione del form, potranno essere trattati per verificare la corretta acquisizione della richiesta di ricontatto, dimostrare la provenienza del lead, gestire eventuali contestazioni, reclami o richieste dell’interessato.</p>
    <h3>e) Adempimento di obblighi di legge e tutela dei diritti</h3>
    <p>I dati potranno essere trattati per adempiere a obblighi normativi, regolamentari o richieste delle Autorità competenti, nonché per accertare, esercitare o difendere un diritto in sede giudiziale o stragiudiziale.</p>
    <p>I dati raccolti tramite il presente form non saranno utilizzati per finalità promozionali ulteriori, autonome o non collegate alla richiesta di ricontatto formulata dall’utente, salvo eventuale separato e specifico consenso.</p>

    <h2>5. Base giuridica del trattamento</h2>
    <p>Il trattamento dei dati personali si fonda sulle seguenti basi giuridiche:</p>
    <ul>
      <li>per la gestione della richiesta di ricontatto e l’illustrazione delle offerte richieste dall’utente: consenso dell’interessato e/o esecuzione di misure precontrattuali adottate su richiesta dello stesso;</li>
      <li>per l’eventuale fase precontrattuale e commerciale successiva alla richiesta dell’utente: esecuzione di misure precontrattuali;</li>
      <li>per la conservazione della prova della richiesta, dei log tecnici e della manifestazione di volontà dell’utente: legittimo interesse del Titolare a dimostrare la liceità del contatto, prevenire abusi, gestire contestazioni e tutelare i propri diritti;</li>
      <li>per l’adempimento di obblighi di legge o richieste delle Autorità: obbligo legale;</li>
      <li>per l’accertamento, l’esercizio o la difesa di un diritto: legittimo interesse del Titolare.</li>
    </ul>
    <p>L’utente può revocare in qualsiasi momento il consenso eventualmente prestato. La revoca non pregiudica la liceità del trattamento effettuato prima della revoca.</p>

    <h2>6. Natura del conferimento dei dati</h2>
    <p>Il conferimento dei dati contrassegnati come obbligatori nel form è necessario per consentire a <?= $opNome ?>, direttamente o tramite il Partner incaricato, di ricontattare l’utente e dare seguito alla sua richiesta.</p>
    <p>Il mancato conferimento dei dati obbligatori comporta l’impossibilità di inviare correttamente il form e di ricevere il ricontatto richiesto.</p>
    <p>Il conferimento di eventuali dati non obbligatori è facoltativo. Il mancato conferimento di tali dati non impedisce l’invio della richiesta, salvo che tali informazioni siano necessarie per formulare una proposta coerente con le esigenze manifestate dall’utente.</p>

    <h2>7. Modalità del trattamento</h2>
    <p>I dati saranno trattati con strumenti cartacei, informatici, telematici e telefonici, secondo principi di liceità, correttezza, trasparenza, minimizzazione, esattezza, integrità e riservatezza.</p>
    <p>Il trattamento sarà effettuato da personale autorizzato da <?= $opNome ?> e/o dal Partner incaricato, nonché da soggetti esterni debitamente nominati, ove necessario, Responsabili del trattamento.</p>
    <p>I dati potranno essere inseriti e conservati nei sistemi informatici di <?= $opNome ?> e in ulteriori piattaforme tecniche utilizzate per la gestione del lead, del contatto telefonico e della tracciabilità della richiesta, inclusi sistemi CRM, sistemi di gestione campagne, centralini, piattaforme VoIP, sistemi di reportistica e strumenti di conservazione dei log.</p>

    <h2>8. Destinatari dei dati personali</h2>
    <p>I dati personali potranno essere comunicati o resi accessibili alle seguenti categorie di soggetti:</p>
    <ul>
      <li>personale autorizzato di <?= $opNome ?>;</li>
      <li>Partner commerciali, call center e soggetti incaricati da <?= $opNome ?> per la gestione del ricontatto;</li>
      <li>fornitori di servizi informatici, CRM, hosting, conservazione dati, sistemi VoIP, centralini telefonici e piattaforme di gestione chiamate;</li>
      <li>consulenti legali, amministrativi, tecnici o professionali, nei limiti necessari;</li>
      <li>società o soggetti che forniscono supporto nella gestione di reclami, controlli qualità e verifiche interne;</li>
      <li>Autorità pubbliche, Autorità di controllo o soggetti legittimati per legge, ove richiesto.</li>
    </ul>
    <p>I dati non saranno diffusi.</p>

    <h2>9. Trasferimento dei dati fuori dallo Spazio Economico Europeo</h2>
    <p>I dati personali saranno trattati, di regola, all’interno dello Spazio Economico Europeo.</p>
    <p>Qualora, per esigenze tecniche connesse all’utilizzo di piattaforme, sistemi CRM, hosting, VoIP, servizi cloud o altri strumenti tecnologici, si rendesse necessario trasferire dati verso Paesi situati al di fuori dello Spazio Economico Europeo, il trasferimento avverrà nel rispetto degli artt. 44 e seguenti del GDPR, sulla base di decisioni di adeguatezza della Commissione Europea, Clausole Contrattuali Standard o altre garanzie previste dalla normativa applicabile.</p>
    <p>L’interessato potrà richiedere maggiori informazioni sulle garanzie applicate scrivendo ai recapiti del Titolare indicati nella presente informativa.</p>

    <h2>10. Tempi di conservazione</h2>
    <p>I dati personali raccolti tramite il form saranno conservati per il tempo strettamente necessario a gestire la richiesta di ricontatto e le eventuali attività precontrattuali conseguenti.</p>
    <ul>
      <li>i dati di contatto e le informazioni commerciali del lead saranno conservati, in caso di mancata conclusione del contratto, per un periodo massimo di 12 mesi dalla raccolta;</li>
      <li>i dati tecnici, i log, la prova della compilazione del form, la versione dell’informativa accettata, l’indirizzo IP, data e ora della richiesta e gli elementi necessari a dimostrare la liceità del contatto potranno essere conservati per un periodo massimo di 24 mesi dalla raccolta, salvo necessità di ulteriore conservazione in caso di contestazioni, reclami, richieste dell’interessato o tutela dei diritti del Titolare;</li>
      <li>qualora l’utente concluda un contratto con <?= $opNome ?>, i dati saranno successivamente trattati e conservati secondo l’informativa privacy relativa al rapporto contrattuale con il cliente;</li>
      <li>in caso di contenzioso, reclamo, richiesta dell’Autorità o necessità di difesa di un diritto, i dati potranno essere conservati per il tempo necessario alla gestione della relativa procedura e nei limiti dei termini di prescrizione applicabili.</li>
    </ul>
    <p>Decorso il periodo di conservazione, i dati saranno cancellati, anonimizzati o aggregati in modo irreversibile.</p>

    <h2>11. Diritti dell’interessato</h2>
    <p>L’interessato può esercitare, nei limiti previsti dal GDPR, i seguenti diritti:</p>
    <ul>
      <li>diritto di accesso ai dati personali;</li>
      <li>diritto di rettifica dei dati inesatti o incompleti;</li>
      <li>diritto alla cancellazione dei dati;</li>
      <li>diritto alla limitazione del trattamento;</li>
      <li>diritto di opposizione al trattamento;</li>
      <li>diritto alla portabilità dei dati, ove applicabile;</li>
      <li>diritto di revocare il consenso prestato, senza pregiudicare la liceità del trattamento effettuato prima della revoca;</li>
      <li>diritto di proporre reclamo all’Autorità Garante per la protezione dei dati personali.</li>
    </ul>
    <p>Per esercitare i diritti, l’interessato può scrivere a:</p>
    <address><?= implode('<br>', $dirittiRighe) ?></address>
    <p>Il Titolare risponderà alle richieste nei termini previsti dalla normativa applicabile.</p>

    <h2>12. Reclamo all’Autorità di controllo</h2>
    <p>L’interessato che ritenga che il trattamento dei propri dati personali avvenga in violazione del GDPR ha diritto di proporre reclamo al Garante per la protezione dei dati personali, con sede in Piazza Venezia 11, 00187 Roma, o tramite i canali indicati sul sito ufficiale dell’Autorità.</p>

    <h2>13. Assenza di processi decisionali automatizzati</h2>
    <p>I dati raccolti tramite il form non saranno utilizzati per processi decisionali automatizzati, compresa la profilazione, idonei a produrre effetti giuridici sull’interessato o a incidere in modo analogo significativamente sulla sua persona.</p>

    <h2>14. Aggiornamenti</h2>
    <p>La presente informativa potrà essere aggiornata in caso di modifiche normative, tecniche, organizzative o commerciali. La versione applicabile è quella pubblicata o resa disponibile al momento della compilazione del form.</p>
    <p class="doc-updated"><?php if ($LANDING_PAGE['privacy_version'] !== '') { ?>Versione <?= $LANDING_PAGE['privacy_version'] ?> &middot; <?php } ?>Ultimo aggiornamento: 18/06/2026</p>

  </main>

<?php include __DIR__ . '/footer.php'; ?>
