<?php
require __DIR__ . '/_config.php';

// Titolare del trattamento = OPERATORE ENERGETICO ($OPERATORE). I dati vengono
// dall'API NUOVA; se un campo non è (ancora) valorizzato si ricade sui valori
// legali storici di questo sito, così l'informativa non perde mai PEC/REA/DPO.
$titNome = $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : 'Semplice Gas &amp; Luce S.p.A.';
$titParts = [];
$titParts[] = 'con sede legale in ' . ($OPERATORE['indirizzo'] !== '' ? $OPERATORE['indirizzo'] : 'Via San Quintino 3, 10121 Torino (TO)');
$titParts[] = 'C.F./P.IVA e n. Registro Imprese ' . ($OPERATORE['partita_iva'] !== '' ? $OPERATORE['partita_iva'] : '11796930011');
$titParts[] = 'REA ' . ($OPERATORE['numero_rea'] !== '' ? $OPERATORE['numero_rea'] : 'TO-1241415');
if ($OPERATORE['capitale_sociale'] !== '') { $titParts[] = 'capitale sociale ' . $OPERATORE['capitale_sociale']; }
$titParts[] = 'e-mail ' . ($OPERATORE['email_supporto'] !== '' ? $OPERATORE['email_supporto'] : 'partner@semplicegaseluce.it');
$titParts[] = 'PEC ' . ($OPERATORE['pec'] !== '' ? $OPERATORE['pec'] : 'semplicegaseluce@pec.it');
$titExtra = ', ' . implode(', ', $titParts);
$emailDpo = $OPERATORE['email_dpo'] !== '' ? $OPERATORE['email_dpo'] : 'dpo@semplicegaseluce.it';

$pageTitle = 'Informativa sul Trattamento dei Dati Personali';
$pageDescription = 'Informativa sul trattamento dei dati personali (artt. 13 GDPR 2016/679) per la landing page di Semplice Gas & Luce S.p.A.';
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
  .policy-doc .doc-rule { border: 0; border-top: 2px solid var(--primary, #1e40af); margin: 20px 0 40px; }
  .policy-doc h2 {
    color: var(--primary, #1e40af); font-size: 17px; font-weight: 700; margin: 34px 0 12px; letter-spacing: 0.01em;
  }
  .policy-doc p { font-size: 15px; line-height: 1.75; text-align: justify; margin: 0 0 14px; color: var(--ink-2, #374151); }
  .policy-doc ol, .policy-doc ul { font-size: 15px; line-height: 1.75; color: var(--ink-2, #374151); margin: 0 0 14px; padding-left: 24px; }
  .policy-doc li { margin-bottom: 12px; text-align: justify; }
  .policy-doc a { color: var(--primary, #1e40af); font-weight: 600; }
</style>
CSS;
include __DIR__ . '/header.php';
?>

  <main class="policy-doc">

    <h1 class="doc-title">Informativa sul Trattamento dei Dati Personali</h1>
    <p class="doc-subtitle">(artt. 13 GDPR 2016/679)</p>
    <hr class="doc-rule">

    <h2>Titolare del trattamento</h2>
    <p>Il Titolare del trattamento è <strong><?= $titNome ?></strong><?= $titExtra ?>, in persona del legale rapp.te p.t..</p>

    <h2>Responsabile della protezione dei dati (DPO)</h2>
    <p>Il DPO è contattabile alla casella e-mail <a href="mailto:<?= $emailDpo ?>"><strong><?= $emailDpo ?></strong></a>.</p>

    <h2>Dati personali trattati</h2>
    <p>Tramite il form della pagina sono raccolti i seguenti dati, da te direttamente comunicati: numero di telefono.</p>

    <h2>Finalità del trattamento e base giuridica</h2>
    <p>I dati sono trattati esclusivamente per le seguenti finalità connesse alla pagina:</p>
    <ol>
      <li><strong>Riscontro alla tua richiesta di informazioni</strong> inoltrata tramite il form e conseguente contatto telefonico, entro il termine di 30 giorni dall'inoltro della richiesta, per illustrarti i prodotti di fornitura di energia elettrica e gas oggetto del tuo interesse. Base giuridica: esecuzione di misure precontrattuali adottate su tua richiesta (art. 6, par. 1, lett. b, GDPR).</li>
      <li><strong>Gestione e tracciabilità della richiesta</strong> e conservazione del log di presa visione della presente informativa, al fine di dimostrare la liceità del contatto ai sensi dell'art. 51, comma 8-bis, del Codice del Consumo. Base giuridica: legittimo interesse del Titolare a documentare la conformità e a tutelarsi (art. 6, par. 1, lett. f, GDPR) e adempimento di obblighi di legge (lett. c). I dati di tracciabilità della richiesta saranno conservati per il periodo di validità del contratto e per i 10 anni successivi allo scioglimento del rapporto contrattuale, quale criterio di validità dello stesso.</li>
      <li><strong>Sicurezza e log di accesso.</strong> Raccolta dei dati di navigazione e dei log tecnici dei naviganti (a titolo esemplificativo: indirizzo IP, data e ora di accesso, pagine visitate, tipo di browser e di dispositivo) per garantire la sicurezza della pagina e dei sistemi, prevenire abusi, usi fraudolenti o accessi non autorizzati e assicurare la corretta erogazione del servizio. Base giuridica: legittimo interesse del Titolare alla sicurezza delle reti e dei sistemi informativi (art. 6, par. 1, lett. f, GDPR; cfr. considerando 49).</li>
    </ol>

    <h2>Modalità del contatto e disciplina di settore (Decreto Bollette)</h2>
    <p>La chiamata avviene da numerazione identificabile, entro 30 giorni dall'inoltro della richiesta al Titolare. Ciò è coerente con il nuovo art. 51, comma 8-bis, del Codice del Consumo (introdotto dalla L. 49/2026, c.d. Decreto Bollette), che consente il contatto telefonico per i prodotti di energia elettrica e gas quando il consumatore ne abbia fatto richiesta direttamente al professionista tramite le sue interfacce informatiche.</p>

    <h2>Destinatari dei dati</h2>
    <p>I dati sono trattati, per conto del Titolare, dalle società di teleselling nominate Responsabili del trattamento ai sensi dell'art. 28 GDPR, che gestiscono la pagina, la raccolta delle richieste, il contatto telefonico e l'eventuale contrattualizzazione, nonché da eventuali sub-responsabili (incluso il fornitore di hosting). L'elenco aggiornato dei responsabili e sub-responsabili è disponibile presso il Titolare e richiedibile al DPO. I dati possono essere comunicati a terzi solo per adempiere a obblighi di legge.</p>

    <h2>Periodo di conservazione</h2>
    <p>I dati raccolti tramite la pagina sono cancellati entro 30 giorni dall'inoltro della richiesta, in assenza di conclusione del contratto. Qualora a seguito del contatto si concluda un contratto di fornitura, i dati confluiscono nel rapporto contrattuale e sono trattati secondo l'informativa relativa al rapporto di fornitura del Titolare, con i tempi di conservazione previsti dalla normativa di settore.</p>

    <h2>Trasferimenti extra-UE</h2>
    <p>Non sono previsti trasferimenti dei dati verso Paesi terzi. Ove l'infrastruttura di hosting comportasse trasferimenti extra-UE, saranno adottate adeguate garanzie ai sensi del Capo V del GDPR.</p>

    <h2>Natura del conferimento</h2>
    <p>Il conferimento dei dati indicati è necessario per dar seguito alla tua richiesta; il mancato conferimento impedisce di riscontrarla e di ricontattarti.</p>

    <h2>Processo decisionale automatizzato</h2>
    <p>Non è effettuato alcun processo decisionale automatizzato, inclusa la profilazione, di cui all'art. 22 GDPR.</p>

    <h2>Diritti dell'interessato</h2>
    <p>Puoi esercitare in qualsiasi momento, scrivendo a <a href="mailto:<?= $emailDpo ?>"><?= $emailDpo ?></a>, i seguenti diritti previsti dagli artt. 15-22 del GDPR:</p>
    <ul>
      <li>accesso ai dati personali (art. 15 GDPR);</li>
      <li>rettifica dei dati inesatti o incompleti (art. 16 GDPR);</li>
      <li>cancellazione dei dati e diritto all'oblio (art. 17 GDPR);</li>
      <li>limitazione del trattamento (art. 18 GDPR);</li>
      <li>notifica delle rettifiche, cancellazioni o limitazioni ai destinatari dei dati (art. 19 GDPR);</li>
      <li>portabilità dei dati (art. 20 GDPR);</li>
      <li>opposizione al trattamento, in particolare a quello fondato sul legittimo interesse del Titolare, inclusi i log di sicurezza (art. 21 GDPR);</li>
      <li>non essere sottoposto a una decisione automatizzata, inclusa la profilazione (art. 22 GDPR), fermo restando che il Titolare non effettua tali trattamenti.</li>
    </ul>
    <p>Hai inoltre diritto di proporre reclamo al Garante per la protezione dei dati personali (art. 77 GDPR) e di ricorrere all'autorità giudiziaria.</p>

  </main>

<?php include __DIR__ . '/footer.php'; ?>
