<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Informativa sulla Protezione dei Dati Personali';
$pageDescription = 'Informativa sul trattamento dei dati personali del Titolare ' . $OPERATORE['nome_legale'] . ' ai sensi dell\'art. 13 del Regolamento (UE) 2016/679 (GDPR).';
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
include __DIR__ . '/header.php';

// Il «Partner Commerciale / Responsabile del trattamento» è la company (dall'API):
// nell'informativa Risa contact corrisponde a «Risa contact srl».
$partner = $COMPANY['company_name'];
?>

<main class="legal-content">
    <h1>INFORMATIVA SULLA PROTEZIONE DEI DATI PERSONALI</h1>
    <em>ai sensi dell’art. 13 del Regolamento (UE) 2016/679</em>
    <div class="separator">***</div>

    <h2>1. Perché queste informazioni.</h2>
    <p>Con la presente informativa, resa in ottemperanza all’art. 13 del Regolamento Europeo n. 679/2016 GDPR (di seguito, “Regolamento”), <strong><?= $OPERATORE['nome_legale'] ?></strong> Le fornisce dettagliate informazioni riguardo al trattamento dei Suoi dati personali, affinché conosca quali dati raccogliamo su di Lei, le ragioni per cui usiamo e condividiamo tali dati, quanto a lungo li conserviamo, quali sono i Suoi diritti e come può esercitarli.</p>

    <h2>2. Il Titolare del trattamento.</h2>
    <p>Il Titolare del trattamento è <strong><?= $OPERATORE['nome_legale'] ?></strong>, P.IVA: <?= $OPERATORE['partita_iva'] ?>, con sede legale in <?= $OPERATORE['indirizzo'] ?>, <a href="mailto:ecomspa@pec.it">ecomspa@pec.it</a> (di seguito, anche “Titolare” o “<?= $OPERATORE['nome_marketing'] ?>”).</p>
    <p>Il Titolare potrà essere contattato al seguente indirizzo e-mail: <a href="mailto:privacy@energiacomune.com">privacy@energiacomune.com</a>.</p>

    <h2>3. Il Responsabile della protezione dei Dati Personali.</h2>
    <p>Il Titolare ha nominato un Responsabile per la protezione dei dati personali (RPD o DPO, acronimo inglese) che può essere contattato al seguente indirizzo e-mail: <a href="mailto:dpo@energiacomune.com">dpo@energiacomune.com</a>.</p>

    <h2>4. Quali Suoi dati personali trattiamo.</h2>
    <p>Nei limiti delle finalità e delle modalità descritte nella presente Informativa, il Titolare potrebbe trattare le seguenti categorie di dati personali da Lei forniti (di seguito “Dati Personali” o “Dati”):</p>
    <ol type="a">
      <li>dati identificativi (es. nome);</li>
      <li>dati di contatto (es. numeri di telefono, indirizzo e-mail);</li>
      <li>altri dati da Lei spontaneamente forniti (es. numero di persone che vivono nella stessa casa, costo della bolletta, valutazione sul costo della bolletta).</li>
    </ol>

    <h2>5. Per quali finalità e su quali basi trattiamo i Suoi dati personali.</h2>
    <p>Il Titolare tratterà i Dati Personali per le seguenti finalità:</p>
    <p class="section-subhead">a) Per il ricontatto da parte di un Operatore</p>
    <p>Il Titolare tratterà i Dati Personali per le attività necessarie e connesse al fine di dar seguito alla Sua richiesta di contatto telefonico e di informazioni precontrattuali, da parte di un Operatore del Partner Commerciale della Società <strong><?= $partner ?></strong> nominato Responsabile del Trattamento dei dati personali ex. Art. 28 del Regolamento Europeo n. 679/2016 GDPR. Tale finalità sarà perseguita entro 7 giorni dalla raccolta della richiesta di contatto.</p>
    <p>Questa attività di trattamento è basata sulla necessità di dare esecuzione al contratto di cui l’interessato è parte o a misure precontrattuali adottate su richiesta dello stesso (art. 6, par. 1, lett. b) GDPR).</p>
    <p class="section-subhead">b) Per svolgere attività di marketing</p>
    <p>Previo Suo espresso e specifico consenso, il Titolare tratterà i Suoi Dati Personali per lo svolgimento di attività di marketing relative a prodotti e servizi del Titolare, anche successivamente al ricontatto effettuato entro 7 giorni. Tali attività comprendono l’invio di comunicazioni che potranno essere effettuate mediante strumenti tradizionali di contatto (es. chiamata con operatore), attraverso social, nonché mediante modalità automatizzate di contatto (es. posta elettronica, sms etc.). Questa attività di trattamento è basata sul Suo consenso (art. 6, par. 1, lett. a) del Regolamento). Si ricorda che resta ferma la possibilità di revocare il consenso al trattamento in ogni momento con comunicazione al Titolare o al DPO ai recapiti sopra indicati o mediante procedura informatizzata di “opt-out”.</p>

    <h2>6. Natura del conferimento e conseguenze in caso di mancato conferimento.</h2>
    <p>Il conferimento dei dati contrassegnati nel form con un asterisco è necessario per consentire al Titolare di ricontattarla; in caso di mancato conferimento non ci sarà possibile dare seguito alla Sua richiesta.</p>
    <p>Il conferimento dei dati indicati nel form privi di asterisco è facoltativo. Il loro mancato conferimento non pregiudica la possibilità di dar seguito alla Sua richiesta di ricontatto, ma non consente al Titolare di effettuare un contatto personalizzato.</p>

    <h2>7. Come sono trattati i Suoi dati personali.</h2>
    <p>Il trattamento dei Dati Personali verrà effettuato sia mediante supporti cartacei, sia attraverso l'ausilio di mezzi informatici, unicamente con operazioni, nonché con logiche e mediante forme di organizzazione dei dati, strettamente indispensabili in rapporto alle finalità indicate e, comunque, in modo da garantire la sicurezza e la riservatezza. I Suoi Dati non saranno trattati con processi che comportano decisioni automatizzate.</p>

    <h2>8. Con chi condividiamo i Suoi dati personali.</h2>
    <p>Per le finalità di cui sopra, i Suoi Dati potranno essere comunicati e conosciuti da dipendenti autorizzati al trattamento e/o da società, professionisti, di cui il Titolare si avvale ai fini della esecuzione di specifici servizi, come ad esempio i fornitori di servizi IT, consulenti professionali, altri partner commerciali. Inoltre, ove necessario, i Suoi Dati potranno essere comunicati a soggetti, o categorie di soggetti, che tratteranno i Suoi Dati in qualità di Titolari autonomi del trattamento, come le Autorità e/o soggetti a cui sia riconosciuta la facoltà di accedere a tali Dati da norma di legge o di normativa secondaria o dell’Unione. L’elenco dei Responsabili del trattamento può essere richiesto scrivendo al seguente indirizzo <a href="mailto:privacy@energiacomune.com">privacy@energiacomune.com</a>.</p>

    <h2>9. Trasferimento dei dati personali a paesi extra UE.</h2>
    <p>Nel caso in cui i Dati Personali siano trasferiti fuori dallo Spazio Economico Europeo, il trasferimento verrà effettuato mediante il ricorso a clausole contrattuali standard adottate dalla Commissione europea con la decisione 2021/914 ed eventuali successive modifiche, oppure sulla base di una decisione di adeguatezza della Commissione o di ogni altro strumento idoneo di cui al Capo V del Regolamento. Potrà ottenere informazioni sul luogo in cui i Dati sono stati trasferiti e copia di tali Dati scrivendo a <a href="mailto:privacy@energiacomune.com">privacy@energiacomune.com</a>.</p>

    <h2>10. Quanto a lungo conserviamo i Suoi dati personali.</h2>
    <p>I Suoi Dati saranno trattati solo per il tempo necessario per le finalità sopra menzionate, come segue:</p>
    <ul>
      <li>i Dati saranno trattati per dare seguito alla Sua richiesta di ricontatto da parte di un Operatore del Partner Commerciale della Società <strong><?= $partner ?></strong>, nominato Responsabile del Trattamento dei dati personali ex. Art. 28 del Regolamento Europeo n. 679/2016 GDPR fino al momento del ricontatto, e comunque non oltre i 7 giorni dal momento della richiesta, a seguito del quale il Titolare, salvo Sua volontà contraria, provvederà alla loro cancellazione;</li>
      <li>i Dati saranno trattati per svolgere attività di marketing fino alla revoca del Suo consenso e, comunque, non oltre 24 mesi dall’acquisizione dello stesso; in seguito a tale revoca il Titolare cesserà il trattamento in questione e non conserverà ulteriormente i Dati acquisiti esclusivamente per tale finalità; in assenza di revoca, a seguito della cessazione del rapporto contrattuale, il Titolare provvederà a ricordarLe periodicamente quali sono i consensi da Lei prestati e la Sua facoltà di revocarli in ogni momento.</li>
    </ul>

    <h2>11. Quali sono i Suoi diritti e come può esercitarli.</h2>
    <p>In ogni momento, alla luce dei diritti di cui agli articoli 15 e ss. del Regolamento, potrà chiedere e ottenere:</p>
    <ul>
      <li>Informazioni circa l’esistenza di Suoi Dati Personali nella nostra disponibilità, nonché avere copia degli stessi (Diritto di accesso dell’interessato);</li>
      <li>La modifica e/o la correzione dei Suoi Dati Personali, se ritiene che siano inesatti o incompleti (Diritto di rettifica);</li>
      <li>La cancellazione dei Suoi Dati Personali e/o la limitazione del loro trattamento, qualora si tratti di informazioni non necessarie – o non più necessarie – per le finalità di cui sopra, una volta decorso il periodo di conservazione suindicato (Diritto alla cancellazione e Diritto di limitazione di trattamento);</li>
      <li>La cessazione del trattamento dei Suoi Dati basato su un nostro legittimo interesse (Diritto di opposizione);</li>
      <li>La ricezione in formato strutturato e il trasferimento ad altro Titolare del trattamento, se i Dati sono oggetto di trattamento con sistemi automatizzati (Diritto alla portabilità dei dati);</li>
      <li>La revoca in qualsiasi momento del consenso al trattamento dei Dati precedentemente prestato (Diritto di revoca del consenso).</li>
    </ul>
    <p>Per l’esercizio di tali diritti, potrà contattare il nostro DPO al seguente indirizzo e-mail: <a href="mailto:dpo@energiacomune.com">dpo@energiacomune.com</a>. Per garantire che i Suoi Dati non siano oggetto di violazioni o utilizzi illegittimi da parte di terzi, il Titolare, prima di accogliere una Sua richiesta di esercizio di uno dei diritti indicati, potrebbe chiedere alcune ulteriori informazioni al fine di accertarsi della Sua identità.</p>
    <p>Se desidera proporre un reclamo circa le modalità attraverso cui i Suoi Dati sono trattati dal Titolare, ovvero in merito alla gestione di un reclamo da Lei proposto, può presentare un’istanza direttamente all’Autorità di controllo competente, ossia il <strong>Garante per la protezione dei dati personali</strong>, Piazza Venezia 11, 00187 - Roma, Italia, Telephone +39 06696771, E-mail: <a href="mailto:protocollo@gpdp.it">protocollo@gpdp.it</a>, <a href="https://www.garanteprivacy.it" target="_blank">www.garanteprivacy.it</a>.</p>

    <h2>12. Modifiche alla presente informativa.</h2>
    <p>La presente informativa potrà essere oggetto di modifiche e/o integrazioni per essere aggiornata in merito ad eventuali nuovi trattamenti o a trattamenti già in corso e, ancora, qualora sia necessario adeguarla a nuovi interventi normativi in materia. Sarà nostra cura darLe evidenza della data dell’ultimo aggiornamento intervenuto all’inizio della presente Informativa nella sezione “Ultimo aggiornamento”.</p>
    <p><em>Ultimo aggiornamento: 18.06.2026</em></p>
  </main>
<?php include __DIR__ . '/footer.php'; ?>
