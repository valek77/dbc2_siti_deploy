<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Cookie Policy';
$pageDescription = 'Informativa sui cookie: questo sito non installa cookie e utilizza solo una voce tecnica di memoria locale per ricordare la scelta sul banner.';
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

    .legal-content p {
      margin-bottom: 20px;
      text-align: justify;
    }

    .legal-content ul {
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

    .legal-content table.cookie-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      font-size: 14.5px;
    }

    .legal-content table.cookie-table th,
    .legal-content table.cookie-table td {
      border: 1px solid rgba(0, 0, 0, 0.12);
      padding: 10px 12px;
      text-align: left;
      vertical-align: top;
    }

    .legal-content table.cookie-table th {
      background: rgba(0, 0, 0, 0.04);
      font-weight: 700;
      color: var(--primary);
    }
  </style>
CSS;
include __DIR__ . '/header.php';
?>

  <main class="legal-content">
    <h1>COOKIE POLICY</h1>
    <em>Informativa sull’uso dei cookie e delle tecnologie di archiviazione locale</em>
    <div class="separator">***</div>

    <p>La presente Cookie Policy illustra le tecnologie utilizzate da questo sito web in relazione ai cookie e agli strumenti di archiviazione locale del browser. Costituisce parte integrante della <a href="privacy-policy.php">Privacy Policy</a>, alla quale si rinvia per le informazioni sul Titolare del trattamento e sull’esercizio dei diritti dell’interessato.</p>

    <h2>CHE COSA SONO I COOKIE</h2>
    <p>I cookie sono piccoli file di testo che i siti web possono salvare sul dispositivo dell’Utente per memorizzare informazioni relative alla navigazione. Tecnologie similari, come l’archiviazione locale del browser (local storage), consentono di salvare informazioni direttamente sul dispositivo dell’Utente senza che queste vengano trasmesse ad alcun server.</p>

    <h2>COOKIE UTILIZZATI DA QUESTO SITO</h2>
    <p>Questo sito è realizzato in modo da ridurre al minimo il trattamento dei dati di navigazione. In particolare, <strong>il sito non installa cookie sul dispositivo dell’Utente</strong>. Più nello specifico, il sito:</p>
    <ul>
      <li>non utilizza cookie di profilazione;</li>
      <li>non utilizza cookie pubblicitari o di marketing;</li>
      <li>non utilizza cookie analitici o statistici;</li>
      <li>non utilizza cookie di terze parti né strumenti di tracciamento (es. Google Analytics, pixel di social network).</li>
    </ul>
    <p>L’unico strumento utilizzato è una <strong>voce tecnica salvata nella memoria locale del browser (local storage)</strong>, necessaria a ricordare la scelta espressa dall’Utente in merito al banner informativo sui cookie, così da non riproporlo ad ogni visita. Tale informazione resta esclusivamente sul dispositivo dell’Utente, non viene trasmessa a terzi, non contiene dati personali e non consente alcuna forma di tracciamento o profilazione.</p>

    <table class="cookie-table">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Tipologia</th>
          <th>Finalità</th>
          <th>Durata</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>cookieConsent</td>
          <td>Tecnico — memoria locale (local storage)</td>
          <td>Ricorda che l’Utente ha già visualizzato il banner informativo sui cookie, evitando di riproporlo ad ogni visita</td>
          <td>Permanente, fino alla cancellazione manuale da parte dell’Utente</td>
        </tr>
      </tbody>
    </table>

    <h2>GESTIONE E CANCELLAZIONE</h2>
    <p>Poiché il sito non installa cookie, non è richiesta alcuna configurazione da parte dell’Utente. È comunque possibile rimuovere in qualsiasi momento la voce salvata nella memoria locale cancellando i dati del sito dalle impostazioni del proprio browser (ad esempio dalla funzione “Cancella dati di navigazione” o “Dati dei siti web”). Tale operazione non pregiudica in alcun modo la navigazione: comporterà unicamente la ricomparsa del banner informativo alla visita successiva.</p>

    <h2>DATI RACCOLTI TRAMITE I MODULI DI CONTATTO</h2>
    <p>I dati eventualmente forniti dall’Utente attraverso i moduli di contatto presenti sul sito non sono raccolti mediante cookie e sono trattati esclusivamente secondo quanto indicato nella <a href="privacy-policy.php">Privacy Policy</a>.</p>

    <h2>AGGIORNAMENTI DELLA PRESENTE INFORMATIVA</h2>
    <p>La presente Cookie Policy potrà essere aggiornata qualora il sito dovesse in futuro introdurre nuovi strumenti tecnologici. Eventuali modifiche saranno pubblicate su questa pagina; si invita pertanto l’Utente a consultarla periodicamente.</p>
  </main>
<?php include __DIR__ . '/footer.php'; ?>
