<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Privacy Policy';
$pageHead = <<<'CSS'
<style>
    .privacy-content h2 {
      font-size: 1.25em;
      border-bottom: 1.5px solid var(--line);
      padding-bottom: 10px;
      margin-top: 48px;
      text-transform: uppercase;
      color: var(--ink);
      letter-spacing: 0.02em;
    }
    .privacy-content h3 {
      font-size: 1.05em;
      margin-top: 24px;
      color: var(--ink-2);
    }
    .privacy-content .law-ref {
      display: block;
      font-size: 0.85em;
      font-style: italic;
      margin-bottom: 12px;
      color: var(--muted);
      font-weight: 600;
    }
    .privacy-content hr {
      border: 0;
      border-top: 1px dashed var(--line);
      margin: 40px 0;
    }
    .privacy-content ul {
      margin-bottom: 24px;
      padding-left: 20px;
    }
    .privacy-content li {
      margin-bottom: 10px;
    }
    .privacy-content p {
      margin-bottom: 22px;
      text-align: justify;
    }
  </style>
CSS;
include __DIR__ . '/header.php';
?>

  <section style="background: var(--grad-aurora); padding:80px 20px; text-align:center; color: #fff; position: relative;">
    <h1 style="color:#fff; font-size:clamp(32px,5vw,52px); margin:0; font-weight:800; letter-spacing: -0.02em;">Privacy Policy</h1>
    <p style="color:rgba(255,255,255,0.8); margin:16px 0 0; font-size:17px;">Informativa sul trattamento dei dati personali (Regolamento UE 2016/679 - GDPR)</p>
  </section>

  <main class="privacy-content" style="max-width: 860px; margin: 80px auto 100px; padding: 0 24px; line-height: 1.8; color: var(--muted); font-size: 16.5px;">

    <p>Gentile Utente,</p>
    <p>La informiamo che ai sensi dell’art. 16 del TFUE e dell’art. 8 della Carta dei diritti fondamentali dell’Unione Europea, ogni persona ha diritto alla protezione dei dati di carattere personale che la riguardano, a prescindere dalla nazionalità o residenza. I dati devono essere trattati secondo il principio di lealtà, per finalità determinate e in base al consenso della persona interessata o ad altro fondamento legittimo previsto dalla legge.</p>

    <h2>TITOLARE DEL TRATTAMENTO</h2>
    <span class="law-ref">Art. 13, par.1, lett. a</span>
    <p>Conformemente a quanto previsto dal Regolamento UE 2016/679, <strong><?= $COMPANY['company_name'] ?></strong>, con sede legale in <?= $COMPANY['sede_legale'] ?>, Partita IVA <?= $COMPANY['p_iva'] ?>, e-mail <a href="mailto:privacy@locura-srl.it" style="color: var(--primary); font-weight:600;">privacy@locura-srl.it</a>, in qualità di Titolare del trattamento, Le rilascia le informazioni relative al trattamento che verrà effettuato, di seguito analiticamente descritto, in relazione ai Suoi dati personali, nonché ai diritti che potrà in qualsiasi momento esercitare. La seguente privacy policy ha lo scopo di illustrare le modalità di trattamento e le categorie di dati personali riguardanti i soggetti interessati (“Utenti”) che navigano sul sito web: <a href="<?= $LANDING_PAGE['url'] ?>" style="color: var(--primary); font-weight:600;"><?= $LANDING_PAGE['url'] ?></a> (di seguito, il “Sito”).</p>
    <p>I Suoi dati saranno trattati secondo i principi di liceità, correttezza, trasparenza, sicurezza e riservatezza. Il trattamento sarà svolto in forma automatizzata e/o manuale, nel rispetto di quanto previsto dall’art. 32 del GDPR 2016/679, ad opera di soggetti appositamente incaricati e in ottemperanza a quanto previsto dall’art. 29 GDPR 2016/679.</p>

    <h2>DATA PROTECTION OFFICER</h2>
    <span class="law-ref">Art. 13, par.1, lett. b</span>
    <p>Le rendiamo noti, inoltre, i dati di contatto del Responsabile della Protezione Dati (RPD – DPO), contattabile al seguente indirizzo e-mail: <a href="mailto:dpo@locura-srl.it" style="color: var(--primary); font-weight:600;">dpo@locura-srl.it</a>, PEC: <a href="mailto:<?= $COMPANY['pec'] ?>" style="color: var(--primary); font-weight:600;"><?= $COMPANY['pec'] ?></a>.</p>

    <h2>FINALITÀ SPECIFICHE DEL TRATTAMENTO DEI DATI PERSONALI</h2>
    <span class="law-ref">Art. 13, par.1, lett. c</span>
    <p>I dati personali da Lei forniti sono necessari per le seguenti specifiche finalità:</p>
    <ul>
        <li><strong>a)</strong> consentire il corretto funzionamento del Sito, garantire la sicurezza dei sistemi informatici e prevenire eventuali utilizzi illeciti o fraudolenti, nonché accertare, esercitare o difendere un diritto in sede giudiziaria;</li>
        <li><strong>b)</strong> consentire l’erogazione del servizio di informazione e comparazione delle offerte nel settore dell’energia (luce e gas), nonché permettere il ricontatto dell’Utente da parte di operatori commerciali del Titolare per fornire informazioni, consulenza e proposte contrattuali relative ai servizi richiesti o compatibili con le esigenze manifestate;</li>
        <li><strong>c)</strong> gestire richieste di informazioni, preventivi o di contatto formulate dall’Utente mediante i moduli presenti sul Sito;</li>
        <li><strong>d)</strong> consentire l’analisi dei dati contenuti nella bolletta energetica caricata volontariamente dall’Utente, al fine di individuare offerte compatibili con il proprio profilo di consumo;</li>
        <li><strong>e)</strong> previo specifico e libero consenso dell’Utente, inviare comunicazioni promozionali, offerte commerciali, materiale informativo o pubblicitario relativo a prodotti e servizi del Titolare, mediante modalità automatizzate e tradizionali di contatto;</li>
        <li><strong>f)</strong> previo specifico e libero consenso dell’Utente, comunicare i dati personali a soggetti terzi partner operanti nel settore dell’energia, affinché possano contattare l’Utente per finalità di marketing e promozione commerciale.</li>
    </ul>

    <h2>BASE GIURIDICA</h2>
    <span class="law-ref">Art. 13, par.1, lett. d</span>
    <p>Il trattamento dei dati personali è effettuato sulla base delle seguenti condizioni di liceità.</p>
    <p>Per le finalità di cui alle lettere a), b), c) e d), il trattamento è necessario all’esecuzione di misure precontrattuali adottate su richiesta dell’interessato o all’esecuzione di un contratto di cui l’interessato è parte, ai sensi dell’art. 6, par. 1, lett. b) del GDPR.</p>
    <p>Per la finalità di cui alla lettera a), limitatamente agli aspetti connessi alla sicurezza dei sistemi informatici e alla prevenzione di abusi, il trattamento può altresì fondarsi sul legittimo interesse del Titolare ai sensi dell’art. 6, par. 1, lett. f) del GDPR.</p>
    <p>Per le finalità di cui alle lettere e) ed f), il trattamento è effettuato sulla base del consenso libero, specifico, informato e inequivocabile dell’interessato, ai sensi dell’art. 6, par. 1, lett. a) del GDPR.</p>
    <p>Il consenso potrà essere revocato in qualsiasi momento con la stessa facilità con cui è stato prestato, senza pregiudicare la liceità del trattamento effettuato prima della revoca.</p>

    <h2>NATURA E CATEGORIA DEI DATI PERSONALI TRATTATI</h2>
    <p>Il Titolare tratta dati personali comuni degli Utenti, raccolti direttamente presso l’interessato o acquisiti automaticamente durante l’utilizzo del Sito. In particolare, possono essere trattate le seguenti categorie di dati personali.</p>

    <h3>Dati di navigazione</h3>
    <p>I sistemi informatici e le procedure software preposte al funzionamento del Sito acquisiscono, nel corso del loro normale esercizio, alcuni dati personali la cui trasmissione è implicita nell’uso dei protocolli di comunicazione di Internet. Tali dati comprendono, a titolo esemplificativo, l’indirizzo IP dell’utente, la data e l’ora della richiesta e altre informazioni tecniche necessarie per la corretta erogazione dei servizi web. Si tratta di informazioni che non sono raccolte per essere associate a interessati identificati, ma che, per loro stessa natura, potrebbero, attraverso elaborazioni e associazioni con dati detenuti da terzi, consentire l’identificazione dell’utente.</p>

    <h3>Dati personali comuni forniti volontariamente dall’Utente</h3>
    <p>Il Titolare tratta i dati personali conferiti volontariamente dall’Utente mediante la compilazione dei moduli presenti sul Sito, finalizzati alla richiesta di ricontatto o di informazioni commerciali. Tali dati possono comprendere:</p>
    <ul>
        <li>nome e cognome;</li>
        <li>numero di telefono;</li>
        <li>indirizzo e-mail;</li>
        <li>indirizzo di fornitura;</li>
        <li>fascia oraria preferita per il ricontatto.</li>
    </ul>

    <h3>Dati relativi alle preferenze e ai consumi energetici</h3>
    <p>Ai fini dell’erogazione del servizio di comparazione e consulenza, l’Utente può fornire informazioni relative alle proprie esigenze e abitudini di consumo nel settore dell’energia. Tali informazioni possono includere, a titolo esemplificativo:</p>
    <ul>
        <li>fornitore attuale e costo della fornitura;</li>
        <li>consumo energetico annuo (kWh o mc);</li>
        <li>tipologia di abitazione e numero di occupanti;</li>
        <li>caratteristiche tecniche del contatore o del servizio richiesto.</li>
    </ul>
    <p>Tali dati sono utilizzati esclusivamente per individuare e proporre offerte commerciali compatibili con le esigenze dell’Utente.</p>

    <h3>Dati contenuti nei documenti caricati dall’Utente</h3>
    <p>Il Sito consente all’Utente di caricare documenti, quali bollette in formato PDF, al fine di consentire la valutazione delle condizioni contrattuali in essere e la predisposizione di offerte commerciali personalizzate. Tali documenti sono trattati esclusivamente per le finalità indicate e non vengono conservati oltre il tempo strettamente necessario all’elaborazione.</p>

    <h3>Cookie tecnici</h3>
    <p>Il Sito utilizza esclusivamente cookie tecnici strettamente necessari al funzionamento della piattaforma e all’erogazione dei servizi richiesti dall’Utente. Non sono utilizzati cookie di profilazione, cookie pubblicitari o strumenti di tracciamento di terze parti.</p>

    <h2>MANCATA COMUNICAZIONE DEI DATI PERSONALI E CONSEGUENZE DEL RIFIUTO</h2>
    <span class="law-ref">Art. 13, par.2, lett. e</span>
    <p>Il conferimento dei dati personali per le finalità di cui alle lettere a), b), c) e d) è necessario per consentire l’erogazione dei servizi richiesti dall’Utente. L’eventuale rifiuto di fornire tali dati comporterà l’impossibilità di usufruire dei servizi offerti dal Sito.</p>
    <p>Il conferimento dei dati per le finalità di marketing e comunicazione a terzi partner è facoltativo e subordinato al rilascio di specifico consenso. Il mancato conferimento non pregiudica l’utilizzo dei servizi principali del Sito.</p>

    <h2>MODALITÀ DEL TRATTAMENTO E MISURE TECNICHE E ORGANIZZATIVE</h2>
    <p>Il trattamento dei dati personali avviene mediante strumenti elettronici e informatici idonei a garantire la sicurezza, l’integrità e la riservatezza dei dati, nel rispetto delle disposizioni normative vigenti.</p>
    <p>Il Titolare adotta misure tecniche e organizzative adeguate, tra cui:</p>
    <ul>
        <li>sistemi di controllo degli accessi basati su ruoli e autorizzazioni;</li>
        <li>validazione e protezione dei dati inseriti dagli utenti;</li>
        <li>protezione contro attacchi informatici quali SQL injection e CSRF;</li>
        <li>restrizioni tecniche per limitare l’accesso ai sistemi informativi;</li>
        <li>procedure di sicurezza per la gestione dei dati e delle credenziali di accesso.</li>
    </ul>

    <h2>DESTINATARI DEI DATI PERSONALI</h2>
    <span class="law-ref">Art. 13, par.1, lett. e</span>
    <p>I Suoi dati personali non saranno diffusi.</p>
    <p>I dati personali dell’Utente potranno essere comunicati a soggetti autorizzati al trattamento ex art. 29 GDPR e a soggetti terzi che operano per conto del Titolare in qualità di Responsabili del trattamento, ai sensi dell’art. 28 del GDPR. In particolare, i dati potranno essere trattati da:</p>
    <ul>
        <li>personale interno autorizzato;</li>
        <li>operatori commerciali incaricati di contattare l’Utente;</li>
        <li>fornitori di servizi informatici e tecnici;</li>
        <li>consulenti e professionisti che supportano il Titolare nello svolgimento delle attività aziendali.</li>
    </ul>
    <p>Previo consenso dell’interessato, i dati personali potranno essere comunicati a partner commerciali operanti nel settore dell’energia elettrica e del gas naturale, che li tratteranno in qualità di titolari autonomi del trattamento.</p>
    <p>Inoltre, i Suoi dati personali potranno essere trasferiti ad altri soggetti in virtù di obblighi di legge.</p>

    <h2>TRASFERIMENTO DEI DATI VERSO PAESI TERZI</h2>
    <p>I dati personali trattati dal Titolare non sono trasferiti verso Paesi situati al di fuori dello Spazio Economico Europeo. I server utilizzati per il trattamento dei dati personali sono situati nel territorio della Repubblica Italiana.</p>

    <h2>DURATA DEL TRATTAMENTO – PERIODO DI CONSERVAZIONE DEI DATI</h2>
    <span class="law-ref">Art. 13, par.2, lett. a</span>
    <p>Nel rispetto dei principi di liceità, limitazione delle finalità e minimizzazione dei dati, ai sensi dell’art. 5 GDPR 2016/679, i Suoi dati personali saranno conservati per il periodo di tempo necessario al conseguimento delle finalità specifiche per le quali sono raccolti e trattati. In particolare:</p>
    <ul>
        <li>i dati di navigazione sono conservati per un periodo massimo di 30 giorni, salvo eventuali esigenze di accertamento di reati o difesa in sede giudiziaria;</li>
        <li>i dati forniti per la richiesta di ricontatto o di comparazione sono conservati per un periodo massimo di 24 mesi dalla raccolta;</li>
        <li>i dati trattati per finalità di marketing sono conservati fino alla revoca del consenso e, comunque, per un periodo non superiore a 24 mesi;</li>
        <li>i dati comunicati a terzi partner per finalità promozionali sono conservati per un periodo massimo di 3 mesi dalla comunicazione;</li>
        <li>i documenti caricati dall’Utente per l’analisi della fornitura sono conservati per il solo tempo necessario all’elaborazione della richiesta e successivamente cancellati o anonimizzati in modo irreversibile.</li>
    </ul>
    <p>Decorso il termine di conservazione, i dati saranno cancellati o anonimizzati in modo irreversibile.</p>

    <h2>LUOGO DI CONSERVAZIONE DEI DATI</h2>
    <p>I dati personali sono conservati in database informatici situati su server fisicamente localizzati nel territorio italiano.</p>

    <h2>DIRITTI DELL’INTERESSATO</h2>
    <p>Le comunichiamo che potrà esercitare i diritti di cui al Reg. UE 2016/679, di seguito analiticamente descritti.</p>
    <ul>
        <li><strong>Diritto di accesso</strong> <em>ex</em> art. 15 — Ha diritto di ottenere dal Titolare la conferma dell’esistenza o meno di un trattamento di dati personali relativi ai Suoi dati, di conoscerne il contenuto e l’origine, verificarne l’esattezza e, in tal caso, di ottenere l’accesso ai suddetti dati. In ogni caso ha diritto di ricevere una copia dei dati personali oggetto di trattamento.</li>
        <li><strong>Diritto di rettifica</strong> <em>ex</em> art. 16 — Ha diritto di ottenere dal Titolare l’integrazione, l’aggiornamento nonché la rettifica dei Suoi dati personali senza ingiustificato ritardo.</li>
        <li><strong>Diritto alla cancellazione</strong> <em>ex</em> art. 17 — Ha diritto di ottenere dal Titolare la cancellazione dei dati personali che La riguardano, senza ingiustificato ritardo, nei casi in cui ricorra una delle ipotesi previste dall’art. 17 (dati non più necessari rispetto alle finalità per cui sono stati raccolti, revoca del consenso, trattamento illecito, ecc.).</li>
        <li><strong>Diritto di limitazione del trattamento</strong> <em>ex</em> art. 18 — Ha diritto di ottenere dal Titolare la limitazione del trattamento dei dati personali nei casi espressamente previsti dal Regolamento. Se il trattamento è limitato, i dati personali saranno trattati solo con il Suo esplicito consenso. Il Titolare è tenuto ad informarla prima che la limitazione sia revocata.</li>
        <li><strong>Diritto alla portabilità dei dati</strong> <em>ex</em> art. 20 — Qualora il trattamento sia effettuato con mezzi automatizzati, ha garantito il diritto alla portabilità dei dati personali che La riguardano, qualora il trattamento si basi sul consenso o su un contratto, nonché la trasmissione diretta degli stessi ad altro titolare, ove tecnicamente fattibile.</li>
        <li><strong>Diritto di opposizione</strong> <em>ex</em> art. 21 — Ha diritto di opporsi in qualsiasi momento, per motivi connessi alla sua situazione particolare, al trattamento di dati personali che Lo riguardano. Ha inoltre il diritto di opporsi in qualsiasi momento al trattamento dei propri dati per finalità di marketing diretto. Qualora l’interessato sia iscritto al Registro Pubblico delle Opposizioni, il Titolare si impegna a verificare preventivamente tale iscrizione prima di effettuare comunicazioni telefoniche a fini commerciali.</li>
    </ul>
    <p>Le richieste per l’esercizio dei suindicati diritti vanno rivolte direttamente all’indirizzo <a href="mailto:privacy@locura-srl.it" style="color: var(--primary); font-weight:600;">privacy@locura-srl.it</a> oppure a <a href="mailto:dpo@locura-srl.it" style="color: var(--primary); font-weight:600;">dpo@locura-srl.it</a> o <a href="mailto:<?= $COMPANY['pec'] ?>" style="color: var(--primary); font-weight:600;"><?= $COMPANY['pec'] ?></a>.</p>
    <p>Le richieste possono essere inoltrate senza alcuna limitazione oraria. <?= $COMPANY['company_name'] ?> avrà cura di agevolare l’esercizio dei diritti dell’interessato ai sensi degli articoli da 15 a 22 GDPR, fornendogli tutte le informazioni relative all’azione intrapresa senza ingiustificato ritardo e, comunque, al più tardi entro un mese dal ricevimento della richiesta stessa. Tale termine può essere prorogato di due mesi, se necessario, tenuto conto della complessità e del numero delle richieste (<?= $COMPANY['company_name'] ?> informerà comunque l’interessato di tale proroga e dei motivi del ritardo, entro un mese dal ricevimento della richiesta).</p>
    <p>Qualora <?= $COMPANY['company_name'] ?> decidesse di non ottemperare alla richiesta dell’interessato, informerà lo stesso senza ritardo, ed al più tardi entro un mese dal ricevimento della stessa, dei motivi dell’inottemperanza e della possibilità di proporre reclamo ad un’Autorità di controllo e di proporre ricorso giurisdizionale.</p>

    <h2>RECLAMO ALL’AUTORITÀ DI CONTROLLO</h2>
    <p>La informiamo, inoltre, che può proporre <strong>reclamo</strong> motivato al Garante per la Protezione dei Dati Personali:</p>
    <ul>
        <li>via e-mail, all’indirizzo: <a href="mailto:garante@gpdp.it" style="color: var(--primary); font-weight:600;">garante@gpdp.it</a> / <a href="mailto:urp@gpdp.it" style="color: var(--primary); font-weight:600;">urp@gpdp.it</a></li>
        <li>via fax: 06 696773785</li>
        <li>oppure via posta, al Garante per la Protezione dei Dati Personali, Piazza Venezia n. 11, 00187 Roma (RM).</li>
    </ul>

    <h2>REVOCA DEL CONSENSO</h2>
    <span class="law-ref">Art. 13, par.2, lett. d</span>
    <p>Le comunichiamo, altresì, che ha il diritto di revocare, in qualsiasi momento, il consenso relativo alle finalità di cui sopra ai punti <strong>e)</strong> ed <strong>f)</strong>, con la stessa facilità con cui è stato accordato. Le richieste per l’esercizio della revoca del consenso vanno rivolte a <a href="mailto:privacy@locura-srl.it" style="color: var(--primary); font-weight:600;">privacy@locura-srl.it</a>.</p>
    <p>Resteranno fermi i trattamenti effettuati prima della suddetta revoca.</p>

    <h2>AGGIORNAMENTI DELLA PRESENTE INFORMATIVA</h2>
    <p>La presente informativa potrà essere soggetta a modifiche o aggiornamenti, anche in conseguenza di variazioni normative o evoluzioni tecnologiche. In tali casi, gli aggiornamenti saranno pubblicati sul Sito con indicazione della data di revisione.</p>

    <hr>
    <p style="margin-top: 48px; font-size: 14px; color: var(--text-muted);">Ultimo aggiornamento: Maggio 2026</p>
  </main>

<?php include __DIR__ . '/footer.php'; ?>
