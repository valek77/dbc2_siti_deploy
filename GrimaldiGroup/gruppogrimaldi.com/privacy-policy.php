<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Privacy Policy';

$pageHead = <<<'CSS'
  <style>
    .legal-content {
      padding: 80px 20px;
      max-width: 900px;
      margin: 0 auto;
      line-height: 1.8;
      color: var(--text-label);
    }

    .legal-content h1 {
      color: var(--primary);
      margin-bottom: 40px;
      font-size: 32px;
      text-align: center;
      line-height: 1.3;
    }

    .legal-content h2 {
      color: var(--primary);
      margin-top: 60px;
      margin-bottom: 20px;
      font-size: 20px;
      text-align: center;
      text-transform: uppercase;
      font-weight: 800;
    }

    .legal-content .section-subhead {
      text-align: center;
      font-weight: 800;
      margin-bottom: 30px;
      display: block;
      color: var(--primary);
    }

    .legal-content p {
      margin-bottom: 20px;
      text-align: justify;
    }

    .legal-content ul,
    .legal-content ol {
      margin-bottom: 20px;
      padding-left: 30px;
    }

    .legal-content li {
      margin-bottom: 15px;
      text-align: justify;
    }

    .legal-content .separator {
      text-align: center;
      font-size: 24px;
      margin: 40px 0;
    }

    .legal-content em {
      display: block;
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
CSS;

// --- Titolare del trattamento: dati dall'API azienda ($COMPANY) -----------
$titolareNome = $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Gierre Contact Call Center S.r.l.';
$titolareSede = $COMPANY['sede_legale'] !== '' ? $COMPANY['sede_legale'] : 'Via Console Cesario n. 3, 80132 Napoli (NA)';
$titolarePiva = $COMPANY['p_iva'] !== '' ? $COMPANY['p_iva'] : '09991111213';
$titolarePec = $COMPANY['pec'] !== '' ? $COMPANY['pec'] : 'gierrecontactcallcentersrl@pec.it';
$emailSupporto = $COMPANY['email_supporto'];
// Capitale sociale: campo API se presente, altrimenti valore camerale del documento.
$capitaleSociale = $COMPANY['capitale_sociale'] !== '' ? $COMPANY['capitale_sociale'] : '€ 10.000,00 i.v.';
// REA: campo API (numero_rea) se presente, altrimenti valore camerale del documento.
$titolareRea = $COMPANY['numero_rea'] !== '' ? $COMPANY['numero_rea'] : 'NA-1072970';

// --- DPO: email dall'API con fallback al recapito indicato nel documento ---
$emailDpo = $COMPANY['email_dpo'] !== '' ? $COMPANY['email_dpo'] : 'dpo.fulmine@libero.it';
$dpoNome = 'Dott.ssa Maddalena Fulmine';

// --- Venditore finale / operatore energetico: dati dall'API ($OPERATORE) --
// Nel documento è "Switch Luce & Gas S.r.l.": qui usiamo la ragione sociale
// restituita dall'API dell'operatore energetico, con fallback prudenziale.
$switch = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : 'Switch Luce & Gas S.r.l.';

include __DIR__ . '/header.php';
?>

  <main class="legal-content">
    <h1>PRIVACY POLICY</h1>
    <em>Informativa ai sensi degli artt. 13 e 14 del Regolamento (UE) 2016/679</em>
    <div class="separator">***</div>

    <p>La presente informativa descrive le modalità con cui <strong><?= $titolareNome ?></strong> tratta i dati personali degli utenti che richiedono informazioni, consulenza commerciale o ricontatto per offerte luce e gas.</p>

    <h2>1. Titolare del trattamento</h2>
    <p>Il Titolare del trattamento è:</p>
    <p>
      <strong><?= $titolareNome ?></strong><br>
      Sede legale: <?= $titolareSede ?><br>
      C.F. e P.IVA: <?= $titolarePiva ?><br>
      Registro Imprese di Napoli n. <?= $titolarePiva ?><br>
      REA: <?= $titolareRea ?><br>
      Capitale sociale: <?= $capitaleSociale ?><br>
      Società a socio unico<br>
      PEC: <?= $titolarePec ?>
    </p>

    <h2>2. Responsabile della Protezione dei Dati / DPO</h2>
    <p><?= $titolareNome ?> ha nominato un Responsabile della Protezione dei Dati / Data Protection Officer.</p>
    <p>
      DPO / RPD: <?= $dpoNome ?><br>
      E-mail: <?= $emailDpo ?>
    </p>
    <p>Il DPO può essere contattato per questioni relative al trattamento dei dati personali e per l’esercizio dei diritti degli interessati.</p>

    <h2>3. Ruoli privacy</h2>
    <p><?= $titolareNome ?> opera come Titolare del trattamento e tratta i dati per gestire la richiesta dell’utente, fornire informazioni, svolgere una prima consulenza commerciale e ricontattare l’utente nei casi consentiti dalla normativa vigente.</p>
    <p>Quando l’utente manifesta interesse per un’offerta riferibile a <?= $switch ?> o chiede di procedere alla valutazione o sottoscrizione di una proposta contrattuale con <?= $switch ?>, i dati necessari possono essere trattati nell’ambito della fase commerciale e contrattuale di competenza di Switch.</p>
    <p>In tale fase <?= $switch ?> opera come Titolare del trattamento per le attività connesse alla proposta commerciale, alla verifica dei dati, alla gestione della richiesta contrattuale, alla conclusione del contratto, alla gestione della fornitura e agli adempimenti successivi di propria competenza.</p>
    <p>Per le attività svolte per conto di <?= $switch ?>, <?= $titolareNome ?> opera come Responsabile del trattamento ai sensi dell’art. 28 GDPR, secondo le istruzioni ricevute da <?= $switch ?> e nei limiti delle attività affidate.</p>
    <p>L’utente riceverà o potrà consultare anche l’informativa privacy di <?= $switch ?>, relativa ai trattamenti effettuati da Switch in qualità di Titolare del trattamento.</p>

    <h2>4. Dati personali trattati</h2>
    <p>A seconda dell’utilizzo del sito e dei servizi richiesti, potranno essere trattati i seguenti dati personali:</p>
    <ul>
      <li>dati identificativi, come nome e cognome;</li>
      <li>dati di contatto, come numero di telefono, indirizzo e-mail, indirizzo di residenza o domicilio;</li>
      <li>dati relativi alla richiesta formulata dall’utente;</li>
      <li>dati relativi alla fornitura luce e gas, ove comunicati dall’utente, come tipologia di utenza, consumi, POD, PDR, fornitore attuale, condizioni economiche e dati presenti in bolletta;</li>
      <li>dati necessari alla valutazione di un’offerta o alla predisposizione di una proposta commerciale;</li>
      <li>dati relativi ai consensi prestati, inclusi data, ora, fonte, URL, versione dell’informativa e log tecnici;</li>
      <li>dati di navigazione, come indirizzo IP, informazioni sul browser, dispositivo utilizzato, log di accesso e dati tecnici necessari al funzionamento del sito;</li>
      <li>eventuali comunicazioni trasmesse tramite form, e-mail, telefono, SMS, WhatsApp o altri canali di contatto.</li>
    </ul>
    <p>L’utente è invitato a non inviare dati non necessari rispetto alla richiesta formulata.</p>

    <h2>5. Finalità del trattamento e basi giuridiche</h2>
    <p>I dati personali potranno essere trattati per le seguenti finalità.</p>

    <span class="section-subhead">a) Navigazione e funzionamento del sito</span>
    <p>I dati tecnici di navigazione sono trattati per consentire il corretto funzionamento del sito, garantire la sicurezza dei sistemi, prevenire utilizzi illeciti e ricavare informazioni tecniche sul funzionamento del servizio.</p>
    <p><em>Base giuridica:</em> legittimo interesse del Titolare alla sicurezza e al corretto funzionamento del sito.</p>

    <span class="section-subhead">b) Gestione della richiesta dell’utente</span>
    <p>I dati forniti tramite form, telefono, e-mail, WhatsApp o altri canali sono trattati per rispondere alla richiesta dell’utente, fornire informazioni, svolgere una prima consulenza commerciale e ricontattare l’utente in relazione alla richiesta formulata.</p>
    <p><em>Base giuridica:</em> esecuzione di misure precontrattuali richieste dall’interessato e/o consenso dell’interessato, a seconda della specifica richiesta formulata.</p>

    <span class="section-subhead">c) Ricontatto telefonico per offerte luce e gas</span>
    <p>I dati di contatto possono essere utilizzati per ricontattare l’utente in relazione alla richiesta di informazioni o alla manifestazione di interesse relativa a offerte luce e gas.</p>
    <p>Il ricontatto telefonico viene effettuato solo nei casi consentiti dalla normativa vigente, ad esempio a seguito di richiesta dell’utente, manifestazione di interesse o consenso specifico documentabile.</p>
    <p><em>Base giuridica:</em> richiesta dell’interessato e/o consenso specifico dell’interessato.</p>

    <span class="section-subhead">d) Valutazione di offerte luce e gas</span>
    <p>I dati forniti dall’utente, inclusi eventuali dati presenti in bolletta, possono essere utilizzati per valutare offerte luce e gas coerenti con il profilo di consumo o con la richiesta dell’utente.</p>
    <p><em>Base giuridica:</em> esecuzione di misure precontrattuali richieste dall’interessato e/o consenso dell’interessato.</p>

    <span class="section-subhead">e) Trasmissione o messa a disposizione dei dati a <?= $switch ?></span>
    <p>Quando l’utente manifesta interesse per un’offerta di <?= $switch ?> o chiede di procedere alla valutazione o sottoscrizione della proposta, i dati necessari potranno essere comunicati o resi disponibili a <?= $switch ?>.</p>
    <p>In tale fase <?= $switch ?> tratterà i dati in qualità di Titolare del trattamento per le finalità di propria competenza.</p>
    <p><em>Base giuridica:</em> esecuzione di misure precontrattuali richieste dall’interessato e/o consenso dell’interessato, ove richiesto.</p>

    <span class="section-subhead">f) Invio di comunicazioni tramite telefono, e-mail, SMS o WhatsApp</span>
    <p>Previo consenso, i dati potranno essere utilizzati per inviare comunicazioni commerciali o informative tramite telefono, e-mail, SMS, WhatsApp o altri strumenti elettronici.</p>
    <p><em>Base giuridica:</em> consenso dell’interessato.</p>
    <p>L’utente può revocare il consenso in qualsiasi momento, senza pregiudicare la liceità del trattamento effettuato prima della revoca.</p>

    <span class="section-subhead">g) Gestione delle opposizioni e delle richieste di non ricontatto</span>
    <p>I dati minimi necessari potranno essere trattati per registrare la volontà dell’utente di non ricevere ulteriori contatti commerciali, per aggiornare eventuali liste interne di esclusione e per evitare ricontatti non desiderati.</p>
    <p><em>Base giuridica:</em> obbligo di legge e legittimo interesse del Titolare alla corretta gestione delle opposizioni.</p>

    <span class="section-subhead">h) Adempimenti normativi e tutela dei diritti</span>
    <p>I dati potranno essere trattati per adempiere a obblighi di legge, rispondere a richieste delle Autorità competenti, svolgere controlli interni, gestire reclami, contestazioni o eventuali esigenze di accertamento, esercizio o difesa di un diritto.</p>
    <p><em>Base giuridica:</em> obbligo di legge e legittimo interesse del Titolare alla tutela dei propri diritti.</p>

    <h2>6. Natura del conferimento dei dati</h2>
    <p>Il conferimento dei dati tecnici di navigazione è necessario per il funzionamento del sito.</p>
    <p>Il conferimento dei dati richiesti tramite form o altri canali di contatto è facoltativo, ma in mancanza dei dati necessari potrebbe non essere possibile gestire la richiesta, fornire la consulenza richiesta o procedere alla valutazione dell’offerta.</p>
    <p>Il consenso per comunicazioni commerciali ulteriori è facoltativo e può essere revocato in qualsiasi momento.</p>

    <h2>7. Modalità di raccolta dei dati</h2>
    <p>I dati possono essere raccolti:</p>
    <ul>
      <li>direttamente dall’utente, tramite compilazione del form presente sul sito;</li>
      <li>tramite contatto telefonico, e-mail, SMS, WhatsApp o altri canali di comunicazione;</li>
      <li>attraverso eventuali documenti trasmessi dall’utente, come bollette o dati relativi alla fornitura;</li>
      <li>tramite strumenti tecnici di navigazione e cookie, secondo quanto indicato nella Cookie Policy;</li>
      <li>tramite registrazione dei consensi, delle richieste di ricontatto e delle opposizioni manifestate dall’utente.</li>
    </ul>
    <p>Quando i dati non sono raccolti direttamente presso l’interessato, <?= $titolareNome ?> verifica, per quanto di propria competenza, che il trattamento avvenga nel rispetto della normativa applicabile.</p>

    <h2>8. Modalità del trattamento e misure di sicurezza</h2>
    <p>Il trattamento dei dati avviene con strumenti informatici e telematici, nel rispetto dei principi di liceità, correttezza, trasparenza, minimizzazione, esattezza, limitazione della conservazione, integrità e riservatezza.</p>
    <p><?= $titolareNome ?> adotta misure tecniche e organizzative adeguate a proteggere i dati personali da accessi non autorizzati, perdita, distruzione, diffusione indebita o trattamenti non consentiti.</p>
    <p>I dati sono trattati da personale autorizzato e istruito, nei limiti delle mansioni assegnate.</p>

    <h2>9. Destinatari dei dati</h2>
    <p>I dati personali potranno essere comunicati o resi accessibili, nei limiti necessari, a:</p>
    <ul>
      <li>personale autorizzato di <?= $titolareNome ?>;</li>
      <li><?= $switch ?>, quando l’utente manifesta interesse per un’offerta o richiede di procedere alla valutazione o sottoscrizione della proposta;</li>
      <li>fornitori di servizi informatici, hosting, manutenzione sito, CRM, piattaforme di gestione contatti, servizi telefonici, SMS, e-mail, WhatsApp o altri strumenti di comunicazione;</li>
      <li>consulenti e professionisti che supportano il Titolare in adempimenti legali, fiscali, amministrativi, tecnici o privacy;</li>
      <li>soggetti pubblici, Autorità o organismi di controllo, nei casi previsti dalla legge;</li>
      <li>eventuali altri soggetti nominati Responsabili del trattamento ai sensi dell’art. 28 GDPR.</li>
    </ul>

    <h2>10. Trasferimento dei dati fuori dallo Spazio Economico Europeo</h2>
    <p>I dati personali sono trattati preferibilmente all’interno dell’Unione Europea o dello Spazio Economico Europeo.</p>
    <p>Qualora, per l’utilizzo di specifici fornitori o strumenti digitali, si rendesse necessario trasferire dati personali verso Paesi extra SEE, il trasferimento avverrà solo in presenza delle garanzie previste dal GDPR, quali decisioni di adeguatezza della Commissione Europea, Clausole Contrattuali Standard o altre garanzie idonee.</p>

    <h2>11. Tempi di conservazione</h2>
    <p>I dati personali sono conservati per il tempo strettamente necessario al perseguimento delle finalità per cui sono stati raccolti.</p>
    <p>In particolare:</p>
    <ul>
      <li>dati tecnici di navigazione: per il tempo necessario al funzionamento e alla sicurezza del sito, salvo ulteriori esigenze di accertamento di illeciti;</li>
      <li>dati raccolti tramite form o richiesta di contatto: fino a 6 mesi dall’ultimo contatto utile, salvo prosecuzione della trattativa, richiesta dell’utente o diversa necessità documentata;</li>
      <li>dati relativi a richieste di offerta o valutazioni commerciali non concluse: fino a 6 mesi dall’ultima interazione, salvo obblighi di legge o esigenze di tutela dei diritti;</li>
      <li>dati e documentazione relativi a consensi, richieste di ricontatto, prove della fonte del contatto e log di acquisizione: per il tempo necessario a dimostrare la liceità del contatto e, di norma, non oltre 24 mesi, salvo contestazioni o obblighi ulteriori;</li>
      <li>dati relativi a richieste di opposizione o liste interne di esclusione: per il tempo necessario a garantire il rispetto della volontà dell’interessato e prevenire ulteriori contatti indesiderati;</li>
      <li>dati trattati da <?= $titolareNome ?> per conto di <?= $switch ?> nella fase commerciale o contrattuale: secondo le istruzioni di <?= $switch ?> e secondo quanto indicato nell’informativa privacy del venditore finale;</li>
      <li>dati trattati per obblighi di legge o tutela dei diritti: per i termini previsti dalla normativa applicabile o per il tempo necessario alla gestione di eventuali contestazioni.</li>
    </ul>
    <p>Decorso il periodo di conservazione, i dati saranno cancellati, anonimizzati o resi inutilizzabili, salvo obblighi di conservazione ulteriori previsti dalla legge.</p>

    <h2>12. Cookie e strumenti di tracciamento</h2>
    <p>Il sito può utilizzare cookie tecnici necessari al funzionamento delle pagine e, previo consenso dell’utente, eventuali cookie o strumenti analoghi per finalità statistiche, analitiche, funzionali o di marketing.</p>
    <p>Le informazioni complete sui cookie utilizzati, sulle relative finalità e sulle modalità di gestione o revoca del consenso sono disponibili nella Cookie Policy del sito.</p>
    <p>L’utente può modificare le proprie preferenze attraverso il link “Gestisci preferenze cookie” presente sul sito.</p>

    <h2>13. Diritti dell’interessato</h2>
    <p>L’interessato può esercitare, nei casi previsti dal GDPR, i seguenti diritti:</p>
    <ul>
      <li>diritto di accesso ai dati personali;</li>
      <li>diritto di rettifica;</li>
      <li>diritto di cancellazione;</li>
      <li>diritto di limitazione del trattamento;</li>
      <li>diritto di opposizione;</li>
      <li>diritto alla portabilità dei dati, ove applicabile;</li>
      <li>diritto di revocare il consenso prestato, senza pregiudicare la liceità del trattamento effettuato prima della revoca.</li>
    </ul>
    <p>Le richieste possono essere inviate al Titolare ai recapiti indicati nella presente informativa oppure al DPO.</p>

    <h2>14. Diritto di opposizione ai contatti commerciali</h2>
    <p>L’utente può opporsi in qualsiasi momento alla ricezione di ulteriori contatti commerciali.</p>
    <p>L’opposizione può essere comunicata durante il contatto telefonico oppure mediante i recapiti indicati nella presente informativa.</p>
    <p>A seguito dell’opposizione, <?= $titolareNome ?> tratterà i dati minimi necessari per registrare la richiesta e prevenire ulteriori ricontatti non desiderati.</p>

    <h2>15. Reclamo all’Autorità di controllo</h2>
    <p>L’interessato che ritenga che il trattamento dei propri dati personali avvenga in violazione della normativa applicabile ha diritto di proporre reclamo al Garante per la Protezione dei Dati Personali, secondo le modalità indicate sul sito dell’Autorità: <a href="https://www.garanteprivacy.it" target="_blank" rel="noopener">www.garanteprivacy.it</a>.</p>

    <h2>16. Informativa privacy di <?= $switch ?></h2>
    <p>Quando l’utente sceglie di procedere con un’offerta riferibile a <?= $switch ?>, <?= $switch ?> tratta i dati personali in qualità di Titolare del trattamento per le finalità connesse alla proposta commerciale, alla contrattualizzazione, alla gestione della fornitura, agli adempimenti normativi, amministrativi e contrattuali di propria competenza.</p>
    <p>Per i trattamenti svolti da <?= $switch ?> si invita l’utente a consultare l’informativa privacy del venditore finale, resa disponibile prima della sottoscrizione o tramite i canali ufficiali del venditore.</p>

    <h2>17. Aggiornamenti della privacy policy</h2>
    <p>La presente privacy policy potrà essere aggiornata in caso di modifiche normative, tecniche, organizzative o commerciali.</p>
    <p><em>Ultimo aggiornamento: 09/07/2026</em></p>
  </main>

<?php include __DIR__ . '/footer.php'; ?>
