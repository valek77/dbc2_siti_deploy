<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Policy di Utilizzo della Landing Page';
$pageDescription = 'Policy di utilizzo della landing page unica del Titolare ' . $OPERATORE['nome_legale'] . ' — conformità Decreto Bollette e art. 51 del Codice del Consumo.';
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
    <h1>INFORMATIVA PER IL TRATTAMENTO DEI DATI PERSONALI</h1>
    <em>Ai sensi dell’art. 13 del Regolamento UE 2016/679 (GDPR)</em>
    <div class="separator">***</div>

    <p>Gentile Utente,</p>
    <p>Con la presente informativa, resa in ottemperanza all’art. 13 del Regolamento Europeo n. 679/2016 GDPR, <?= $OPERATORE['nome_legale'] ?> Le fornisce dettagliate informazioni riguardo al trattamento dei Suoi dati personali, affinché conosca quali dati raccogliamo su di Lei, le ragioni per cui usiamo e condividiamo tali dati, quanto a lungo li conserviamo, quali sono i Suoi diritti e come può esercitarli.</p>
    <p>La presente informativa è destinata ad essere utilizzata nell’ambito dei servizi di informazione e promozione di offerte nel settore dell’energia (luce e gas), mediante canali digitali e moduli di raccolta contatti.</p>

    <h2>TITOLARE DEL TRATTAMENTO</h2>
    <span class="section-subhead">Art. 13, par. 1, lett. a</span>
    <p>Il Titolare del trattamento è <strong><?= $OPERATORE['nome_legale'] ?></strong>, P.IVA: <?= $OPERATORE['partita_iva'] ?>, con sede legale in <?= $OPERATORE['indirizzo'] ?>, PEC: <a href="mailto:ecomspa@pec.it">ecomspa@pec.it</a> (di seguito anche “Titolare” o “<?= $OPERATORE['nome_marketing'] ?>”).</p>
    <p>Il Titolare potrà essere contattato al seguente indirizzo e-mail: <a href="mailto:privacy@energiacomune.com">privacy@energiacomune.com</a>.</p>
    <p>I dati personali saranno trattati secondo i principi di liceità, correttezza, trasparenza, sicurezza e riservatezza, con supporti cartacei e attraverso l'ausilio di mezzi informatici, unicamente con operazioni strettamente indispensabili in rapporto alle finalità indicate. I Suoi dati non saranno trattati con processi che comportano decisioni automatizzate.</p>

    <h2>DATA PROTECTION OFFICER</h2>
    <span class="section-subhead">Art. 13, par. 1, lett. b</span>
    <p>Il Titolare ha nominato un Responsabile della protezione dei dati personali (RPD o DPO) che può essere contattato al seguente indirizzo e-mail: <strong><a href="mailto:dpo@energiacomune.com">dpo@energiacomune.com</a></strong>.</p>

    <h2>FINALITÀ SPECIFICHE DEL TRATTAMENTO DEI DATI PERSONALI</h2>
    <span class="section-subhead">Art. 13, par. 1, lett. c</span>
    <p>Il Titolare tratterà i Dati Personali per le seguenti finalità:</p>
    <ul>
      <li><strong>Ricontatto da parte di un Operatore (Finalità Precontrattuale):</strong> attività necessarie e connesse al fine di dar seguito alla Sua richiesta di contatto telefonico e di informazioni precontrattuali, da parte di un Operatore del Partner Commerciale della Società <em><?= $responsabileData ?></em>, nominato Responsabile del Trattamento dei dati personali ex Art. 28 del Regolamento Europeo n. 679/2016 GDPR. Tale finalità sarà perseguita entro 7 giorni dalla raccolta della richiesta di contatto.</li>
      <li><strong>Svolgimento di attività di marketing diretto:</strong> previo Suo espresso e specifico consenso, il Titolare tratterà i Suoi Dati Personali per lo svolgimento di attività di marketing relative a prodotti e servizi del Titolare, anche successivamente al ricontatto effettuato entro i 7 giorni. Tali attività comprendono l’invio di comunicazioni mediante strumenti tradizionali di contatto (es. chiamata con operatore), attraverso social, nonché mediante modalità automatizzate (es. posta elettronica, sms, ecc.).</li>
    </ul>

    <h2>BASE GIURIDICA</h2>
    <span class="section-subhead">Art. 13, par. 1, lett. d</span>
    <p>Il trattamento dei dati personali si fonda sulle seguenti basi giuridiche:</p>
    <ul>
      <li><strong>Misure precontrattuali:</strong> la necessità di dare esecuzione al contratto di cui l’interessato è parte o a misure precontrattuali adottate su richiesta dello stesso (art. 6, par. 1, lett. b) GDPR), per la finalità di ricontatto e informazioni commerciali.</li>
      <li><strong>Consenso dell’interessato:</strong> il Suo consenso libero, espresso e specifico (art. 6, par. 1, lett. a) del Regolamento) per lo svolgimento delle attività di marketing diretto. Si ricorda che resta ferma la possibilità di revocare il consenso in ogni momento.</li>
    </ul>

    <h2>NATURA E CATEGORIA DEI DATI PERSONALI TRATTATI</h2>
    <p>Nei limiti delle finalità descritte, il Titolare tratta le seguenti categorie di dati personali da Lei forniti:</p>
    <ul>
      <li><strong>Dati identificativi:</strong> ad esempio il nome.</li>
      <li><strong>Dati di contatto:</strong> ad esempio numeri di telefono, indirizzo e-mail.</li>
      <li><strong>Altri dati forniti spontaneamente:</strong> ad esempio il numero di persone che vivono nella stessa casa, il costo della bolletta attuale e la valutazione sul costo della stessa.</li>
    </ul>

    <h2>MANCATA COMUNICAZIONE DEI DATI PERSONALI E CONSEGUENZE DEL RIFIUTO</h2>
    <span class="section-subhead">Art. 13, par. 2, lett. e</span>
    <p>Il conferimento dei dati contrassegnati nel form con un asterisco è <strong>necessario</strong> per consentire al Titolare di ricontattarla; in caso di mancato conferimento non ci sarà possibile dare seguito alla Sua richiesta.</p>
    <p>Il conferimento dei dati indicati nel form privi di asterisco è <strong>facoltativo</strong>. Il loro mancato conferimento non pregiudica la possibilità di dar seguito alla Sua richiesta di ricontatto, ma non consente al Titolare di effettuare un contatto personalizzato.</p>

    <h2>DESTINATARI DEI DATI PERSONALI</h2>
    <span class="section-subhead">Art. 13, par. 1, lett. e</span>
    <p>I Suoi Dati potranno essere comunicati e conosciuti da dipendenti autorizzati al trattamento e/o da società o professionisti di cui il Titolare si avvale ai primi dell'esecuzione di specifici servizi (es. fornitori di servizi IT, consulenti professionali, partner commerciali, tra cui la società <em><?= $COMPANY['company_name'] ?></em> in qualità di Responsabile del trattamento).</p>
    <p>Inoltre, ove necessario, i Dati potranno essere comunicati a soggetti che tratteranno i dati in qualità di Titolari autonomi, come le Autorità e/o soggetti a cui sia riconosciuta la facoltà di accedere da norme di legge o dell'Unione. L’elenco completo dei Responsabili del trattamento può essere richiesto scrivendo a: <a href="mailto:privacy@energiacomune.com">privacy@energiacomune.com</a>.</p>

    <h2>TRASFERIMENTO DEI DATI VERSO PAESI TERZI</h2>
    <p>Nel caso in cui i Dati Personali siano trasferiti fuori dallo Spazio Economico Europeo (SEE), il trasferimento verrà effettuato mediante il ricorso a clausole contrattuali standard adottate dalla Commissione europea con la decisione 2021/914 ed eventuali successive modifiche, oppure sulla base di una decisione di adeguatezza o di ogni altro strumento idoneo di cui al Capo V del Regolamento. Potrà ottenere informazioni sul luogo di trasferimento scrivendo a <a href="mailto:privacy@energiacomune.com">privacy@energiacomune.com</a>.</p>

    <h2>DURATA DEL TRATTAMENTO - PERIODO DI CONSERVAZIONE DEI DATI</h2>
    <span class="section-subhead">Art. 13, par. 2, lett. a</span>
    <p>I Suoi Dati saranno trattati solo per il tempo necessario per le finalità sopra menzionate, come segue:</p>
    <ul>
      <li><strong>Dati per la richiesta di ricontatto:</strong> trattati fino al momento del ricontatto da parte di un Operatore del Partner Commerciale (Società <?= $COMPANY['company_name'] ?>), e comunque <strong>non oltre i 7 giorni</strong> dal momento della richiesta, a seguito del quale il Titolare, salvo Sua volontà contraria, provvederà alla loro cancellazione.</li>
      <li><strong>Dati per attività di marketing:</strong> trattati fino alla revoca del Suo consenso e, comunque, <strong>non oltre 24 mesi</strong> dall’acquisizione dello stesso. In seguito alla revoca, il Titolare cesserà il trattamento e non conserverà ulteriormente i dati acquisiti per tale finalità. In assenza di revoca, a seguito della cessazione del rapporto contrattuale, il Titolare Le ricorderà periodicamente i consensi prestati e la facoltà di revocarli.</li>
    </ul>

    <h2>DIRITTI DELL’INTERESSATO</h2>
    <p>In ogni momento, alla luce dei diritti di cui agli articoli 15 e ss. del Regolamento, potrà chiedere e ottenere:</p>
    <ul>
      <li>Diritto di accesso per verificare l’esistenza dei propri dati e riceverne copia;</li>
      <li>Diritto di rettifica o integrazione dei dati inesatti o incompleti;</li>
      <li>Diritto alla cancellazione e/o alla limitazione del trattamento qualora i dati non siano più necessari o sia decorso il periodo di conservazione;</li>
      <li>Diritto di opposizione al trattamento basato su un legittimo interesse del Titolare;</li>
      <li>Diritto alla portabilità dei dati in formato strutturato verso un altro Titolare (se trattati con sistemi automatizzati);</li>
      <li>Diritto di revoca del consenso in qualsiasi momento senza pregiudicare la liceità del trattamento precedente.</li>
    </ul>
    <p>Per l’esercizio di tali diritti, potrà contattare il nostro DPO al seguente indirizzo e-mail: <strong><a href="mailto:dpo@energiacomune.com">dpo@energiacomune.com</a></strong>. Il Titolare, prima di accogliere la richiesta, potrebbe richiedere ulteriori informazioni al fine di accertarsi della Sua identità.</p>

    <h2>RECLAMO ALL’AUTORITÀ DI CONTROLLO</h2>
    <p>Se desidera proporre un reclamo circa le modalità attraverso cui i Suoi Dati sono trattati dal Titolare, può presentare un’istanza direttamente all’Autorità di controllo competente: <strong>Garante per la protezione dei dati personali</strong>, Piazza Venezia 11, 00187 - Roma, Italia (Tel. +39 06696771, E-mail: <a href="mailto:protocollo@gpdp.it">protocollo@gpdp.it</a>, sitoweb: <a href="https://www.garanteprivacy.it" target="_blank">www.garanteprivacy.it</a>).</p>

    <h2>AGGIORNAMENTI DELLA PRESENTE INFORMATIVA</h2>
    <p>La presente informativa potrà essere oggetto di modifiche e/o integrazioni per essere adeguata a nuovi trattamenti o a interventi normativi in materia. Sarà nostra cura darLe evidenza della data dell’ultimo aggiornamento intervenuto.</p>
    <p><em>Ultimo aggiornamento: 18.06.2026</em></p>
  </main>
<?php include __DIR__ . '/footer.php'; ?>
