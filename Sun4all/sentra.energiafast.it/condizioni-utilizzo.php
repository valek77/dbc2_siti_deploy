<?php
require __DIR__ . '/_config.php';

// Dati dinamici dall'API nuova (/landing-pages). Disponibili subito dopo _config.php,
// prima dell'include di header.php (dove viene impostato $brandName).
// --- Gestore del sito / Titolare: dati dall'API azienda ($COMPANY) --------
$titolareNome = $COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Gierre Contact Call Center S.r.l.';
$titolareSede = $COMPANY['sede_legale'] !== '' ? $COMPANY['sede_legale'] : 'Via Console Cesario n. 3, 80132 Napoli (NA)';
$titolarePiva = $COMPANY['p_iva'] !== '' ? $COMPANY['p_iva'] : '09991111213';
$titolarePec = $COMPANY['pec'] !== '' ? $COMPANY['pec'] : 'gierrecontactcallcentersrl@pec.it';
$capitaleSociale = $COMPANY['capitale_sociale'] !== '' ? $COMPANY['capitale_sociale'] : '€ 10.000,00 i.v.';
// Dati camerali NON esposti dall'API (dal documento fornito dal cliente).
$titolareRea = 'NA-1072970';
// DPO: email dall'API con fallback al recapito indicato nel documento.
$emailDpo = $COMPANY['email_dpo'] !== '' ? $COMPANY['email_dpo'] : 'dpo.fulmine@libero.it';
$dpoNome = 'Dott.ssa Maddalena Fulmine';

$ragioneSociale = $titolareNome;
$emailContatto  = $COMPANY['email_supporto'] !== '' ? $COMPANY['email_supporto'] : $titolarePec;

$pageTitle = 'Condizioni di Utilizzo';
$metaDescription = 'Termini e condizioni generali di utilizzo del sito web ' . $ragioneSociale . '.';

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
    <h1 style="color:var(--primary); margin:0 0 8px; font-size:28px; line-height:1.3; font-weight:800;">Note legali e Condizioni di Utilizzo del Sito</h1>
    <p style="font-style:italic; font-size:14px; color:var(--muted); margin:0 0 30px;">Termini e condizioni generali del sito web <?= $ragioneSociale ?></p>

    <h2>1. Premessa</h2>
    <p>Le presenti Condizioni di Utilizzo disciplinano l’accesso, la navigazione e l’utilizzo del sito internet e delle relative pagine, landing page, form di contatto e contenuti informativi riconducibili a <?= $titolareNome ?>, anche attraverso il servizio commerciale GrEnergy.</p>
    <p>L’accesso e l’utilizzo del sito comportano l’accettazione delle presenti condizioni. L’utente che non intenda accettarle è invitato a non utilizzare il sito e a non trasmettere richieste tramite i form disponibili.</p>

    <h2>2. Gestore del sito</h2>
    <p>Il sito è gestito da:</p>
    <p>
      <strong><?= $titolareNome ?></strong><br>
      Sede legale: <?= $titolareSede ?><br>
      C.F. e P.IVA: <?= $titolarePiva ?><br>
      Registro Imprese di Napoli n. <?= $titolarePiva ?><br>
      REA: <?= $titolareRea ?><br>
      Capitale sociale: <?= $capitaleSociale ?><br>
      Società a socio unico<br>
      PEC: <a href="mailto:<?= $titolarePec ?>"><?= $titolarePec ?></a><br>
      DPO / Responsabile della Protezione dei Dati: <?= $dpoNome ?><br>
      E-mail: <a href="mailto:<?= $emailDpo ?>"><?= $emailDpo ?></a>
    </p>
    <p><?= $titolareNome ?> opera nel settore dei servizi di contact center, consulenza commerciale, telemarketing, teleselling, gestione di campagne promozionali e commerciali, per conto proprio e per conto terzi.</p>

    <h2>3. Oggetto del sito</h2>
    <p>Il sito ha finalità informative e commerciali e consente agli utenti di:</p>
    <ul>
      <li>acquisire informazioni sui servizi commerciali offerti da <?= $titolareNome ?>;</li>
      <li>richiedere un ricontatto;</li>
      <li>ricevere consulenza commerciale su offerte luce e gas;</li>
      <li>consultare pagine informative relative a trasparenza commerciale, privacy, cookie, note legali e documentazione di settore;</li>
      <li>accedere a eventuali link esterni di utilità, quali il Portale Offerte ARERA o siti di venditori/partner commerciali.</li>
    </ul>
    <p>Il sito non costituisce piattaforma di vendita diretta di energia elettrica o gas naturale da parte di <?= $titolareNome ?>.</p>
    <p>Il sito non costituisce portale istituzionale, portale pubblico di confronto delle offerte, sportello di reclamo del venditore finale o canale ufficiale di gestione del contratto di fornitura, salvo quanto eventualmente indicato nella documentazione del venditore finale o nelle pagine dedicate.</p>

    <h2>4. Ruolo di <?= $titolareNome ?></h2>
    <p><?= $titolareNome ?> opera come struttura commerciale, contact center e soggetto incaricato della promozione di offerte luce e gas di venditori autorizzati.</p>
    <p><?= $titolareNome ?> non è il venditore finale della fornitura di energia elettrica o gas naturale.</p>
    <p>Il contratto di fornitura, ove sottoscritto dall’utente, viene concluso con il venditore indicato nella documentazione precontrattuale e contrattuale consegnata prima della sottoscrizione.</p>
    <p><?= $titolareNome ?> non gestisce direttamente la distribuzione dell’energia elettrica o del gas, la fatturazione della fornitura, lo switching tecnico, la gestione del rapporto di fornitura o i reclami di competenza del venditore finale, salvo eventuali attività di supporto commerciale o assistenza preliminare.</p>
    <p>L’eventuale presenza sul sito di riferimenti a venditori, marchi commerciali, offerte luce e gas o partner commerciali ha finalità informativa e commerciale e non modifica la titolarità del rapporto di fornitura, che resta in capo al venditore finale indicato nei documenti contrattuali.</p>

    <h2>5. Natura delle informazioni pubblicate</h2>
    <p>Le informazioni presenti sul sito sono fornite a scopo informativo, commerciale e di orientamento preliminare.</p>
    <p><?= $titolareNome ?> si impegna a mantenere aggiornati i contenuti pubblicati, ma non garantisce l’assoluta assenza di errori materiali, refusi, omissioni o disallineamenti temporanei rispetto alla documentazione ufficiale dei venditori finali.</p>
    <p>In caso di contrasto tra le informazioni presenti sul sito e la documentazione ufficiale del venditore finale, prevalgono sempre le condizioni economiche, contrattuali e precontrattuali fornite dal venditore finale.</p>
    <p>Eventuali esempi, simulazioni, prospetti, messaggi promozionali o sintesi pubblicate sul sito non sostituiscono la documentazione precontrattuale e contrattuale prevista dalla normativa applicabile.</p>

    <h2>6. Offerte luce e gas</h2>
    <p>Eventuali riferimenti a offerte, tariffe, condizioni economiche, vantaggi, risparmi o servizi luce e gas devono intendersi come informazioni preliminari e non vincolanti.</p>
    <p>Prima di qualsiasi sottoscrizione, l’utente deve ricevere e consultare la documentazione ufficiale prevista dalla normativa di settore, tra cui, ove applicabile:</p>
    <ul>
      <li>scheda sintetica dell’offerta;</li>
      <li>condizioni tecnico-economiche;</li>
      <li>condizioni generali di fornitura;</li>
      <li>modulo o informazioni sul diritto di ripensamento;</li>
      <li>informativa privacy del venditore finale;</li>
      <li>canali di assistenza e reclamo del venditore finale.</li>
    </ul>
    <p>L’utente è tenuto a leggere attentamente tutta la documentazione prima di aderire a qualsiasi proposta commerciale.</p>
    <p>Le attività informative e commerciali relative alle offerte luce e gas sono svolte tenendo conto della normativa applicabile in materia di tutela del consumatore, contratti a distanza, contratti negoziati fuori dai locali commerciali, trasparenza precontrattuale e regolazione di settore, inclusi, ove applicabili, il D.Lgs. 206/2005, il Codice di condotta commerciale ARERA per la vendita di energia elettrica e gas naturale ai clienti finali di cui alla deliberazione ARERA 366/2018/R/com e successivi aggiornamenti, nonché le modifiche introdotte dalla deliberazione ARERA 386/2025/R/com.</p>

    <h2>7. Normativa di settore e riferimenti applicabili</h2>
    <p>Nello svolgimento delle attività collegate al sito, alle landing page, ai form di contatto e alle richieste di ricontatto, <?= $titolareNome ?> tiene conto, ove applicabile, dei seguenti riferimenti normativi e regolatori:</p>
    <ul>
      <li>Regolamento (UE) 2016/679 (“GDPR”);</li>
      <li>D.Lgs. 196/2003, come modificato dal D.Lgs. 101/2018;</li>
      <li>D.Lgs. 206/2005 (“Codice del Consumo”);</li>
      <li>D.Lgs. 70/2003 in materia di servizi della società dell’informazione;</li>
      <li>D.P.R. 178/2010 e D.P.R. 26/2022 in materia di Registro Pubblico delle Opposizioni;</li>
      <li>Legge 5/2018, per quanto rilevante in materia di numerazioni e contrasto alle pratiche illecite di telemarketing;</li>
      <li>Codice di condotta per le attività di telemarketing e teleselling approvato dal Garante per la Protezione dei Dati Personali con provvedimento del 7 marzo 2024;</li>
      <li>Codice di condotta commerciale ARERA per la vendita di energia elettrica e gas naturale ai clienti finali, Allegato A alla deliberazione ARERA 366/2018/R/com e successivi aggiornamenti;</li>
      <li>deliberazione ARERA 386/2025/R/com e disposizioni collegate in materia di trasparenza e confrontabilità delle offerte di energia elettrica e gas naturale;</li>
      <li>D.L. 28 febbraio 2025, n. 19, convertito con modificazioni dalla Legge 24 aprile 2025, n. 60, per quanto rilevante in materia di trasparenza delle offerte al dettaglio e rafforzamento dei presidi delle Autorità di vigilanza;</li>
      <li>eventuali provvedimenti, delibere, linee guida e indicazioni delle Autorità competenti applicabili alle attività concretamente svolte.</li>
    </ul>
    <p>I riferimenti normativi sopra indicati non esauriscono il quadro regolatorio applicabile e devono intendersi richiamati nelle versioni tempo per tempo vigenti.</p>

    <h2>8. Richiesta di ricontatto</h2>
    <p>L’utente può utilizzare i form presenti sul sito per richiedere informazioni o un ricontatto.</p>
    <p>La compilazione del form comporta l’invio volontario dei dati indicati dall’utente e consente a <?= $titolareNome ?> di gestire la richiesta ricevuta.</p>
    <p>L’invio del form non comporta alcun obbligo di acquisto, sottoscrizione o adesione ad offerte luce e gas.</p>
    <p><?= $titolareNome ?> potrà ricontattare l’utente nei limiti della richiesta formulata, nel rispetto della normativa vigente in materia di protezione dei dati personali, tutela del consumatore, telemarketing, teleselling e Registro Pubblico delle Opposizioni.</p>
    <p>Nel rispetto della normativa vigente in materia di tutela del consumatore, protezione dei dati personali, comunicazioni commerciali, telemarketing, teleselling e settore energia, le attività di contatto vengono effettuate esclusivamente nei casi consentiti dalla normativa applicabile, ad esempio a seguito di richiesta diretta dell’utente, manifestazione di interesse o consenso specifico, libero, informato, documentabile e non preselezionato.</p>
    <p>In caso di contatto telefonico, <?= $titolareNome ?> adotta procedure volte a garantire la tracciabilità della richiesta o del consenso, la verifica delle eventuali opposizioni al Registro Pubblico delle Opposizioni e alle liste interne di esclusione, l’utilizzo di numerazioni identificabili e richiamabili, nonché la gestione delle richieste di revoca, opposizione, cancellazione o limitazione formulate dall’interessato.</p>

    <h2>9. Obblighi dell’utente</h2>
    <p>L’utente si impegna a utilizzare il sito in modo lecito, corretto e conforme alle presenti condizioni.</p>
    <p>In particolare, l’utente si obbliga a:</p>
    <ul>
      <li>fornire dati veritieri, aggiornati e riferibili alla propria persona o a soggetti per i quali sia legittimato ad agire;</li>
      <li>non utilizzare il sito per finalità illecite, fraudolente, abusive o lesive di diritti altrui;</li>
      <li>non inserire nei form dati falsi, incompleti, offensivi, illeciti o eccedenti rispetto alla richiesta;</li>
      <li>non trasmettere contenuti contenenti virus, malware, codici dannosi o strumenti idonei a compromettere la sicurezza del sito;</li>
      <li>non tentare accessi non autorizzati a sistemi, database, aree riservate o infrastrutture tecniche del sito;</li>
      <li>non porre in essere attività di scraping, crawling, estrazione massiva, copia automatizzata o riutilizzo non autorizzato dei contenuti.</li>
    </ul>
    <p><?= $titolareNome ?> si riserva il diritto di sospendere o impedire l’accesso al sito in caso di uso illecito, abusivo o contrario alle presenti condizioni.</p>

    <h2>10. Divieto di utilizzo improprio del sito</h2>
    <p>È vietato utilizzare il sito per:</p>
    <ul>
      <li>inviare richieste massive, automatizzate o non pertinenti;</li>
      <li>alterare o compromettere il funzionamento delle pagine;</li>
      <li>interferire con la sicurezza dei sistemi;</li>
      <li>acquisire indebitamente dati, informazioni, contenuti o elementi grafici;</li>
      <li>utilizzare loghi, marchi, testi o contenuti senza autorizzazione;</li>
      <li>generare richieste di ricontatto fittizie o riferite a soggetti terzi senza titolo.</li>
    </ul>
    <p>Ogni utilizzo non autorizzato potrà comportare l’adozione di misure tecniche di blocco, la conservazione dei log necessari alla tutela dei diritti e, ove necessario, la segnalazione alle autorità competenti.</p>

    <h2>11. Proprietà intellettuale</h2>
    <p>Tutti i contenuti presenti sul sito, inclusi testi, layout, struttura grafica, immagini, icone, elementi distintivi, loghi, marchi, denominazioni commerciali, documenti scaricabili e contenuti informativi, sono protetti dalla normativa in materia di proprietà intellettuale, diritto d’autore, marchi e segni distintivi.</p>
    <p>È vietata la riproduzione, distribuzione, modifica, pubblicazione, comunicazione, estrazione, riutilizzo o sfruttamento dei contenuti del sito, in tutto o in parte, senza preventiva autorizzazione scritta di <?= $titolareNome ?> o degli eventuali titolari dei relativi diritti.</p>
    <p>Eventuali marchi, loghi o denominazioni di terzi presenti sul sito sono utilizzati esclusivamente per finalità informative e commerciali connesse ai rapporti autorizzati e restano di titolarità dei rispettivi proprietari.</p>

    <h2>12. Link a siti di terzi</h2>
    <p>Il sito può contenere link a siti esterni, portali istituzionali, siti di venditori finali, partner commerciali o soggetti terzi.</p>
    <p><?= $titolareNome ?> non esercita controllo sui contenuti, sui servizi, sulle condizioni legali, sulle informative privacy o sulle cookie policy dei siti terzi.</p>
    <p>L’accesso a siti esterni avviene sotto la responsabilità dell’utente, che è invitato a consultare le rispettive condizioni di utilizzo, informative privacy e cookie policy.</p>
    <p>La presenza di link esterni non implica approvazione, garanzia o assunzione di responsabilità da parte di <?= $titolareNome ?> rispetto ai contenuti o servizi offerti da terzi.</p>
    <p><strong>Portale Offerte ARERA</strong><br>
    Il sito contiene un collegamento al Portale Offerte ARERA, strumento pubblico e indipendente per il confronto delle offerte luce e gas disponibili sul mercato.<br>
    Link utile: <a href="https://www.ilportaleofferte.it/" target="_blank" rel="noopener">https://www.ilportaleofferte.it/</a></p>

    <h2>13. Disponibilità del sito</h2>
    <p><?= $titolareNome ?> si impegna a garantire, nei limiti del ragionevole, il corretto funzionamento del sito.</p>
    <p>Tuttavia, non garantisce che il sito sia sempre disponibile, continuo, privo di interruzioni, errori, malfunzionamenti, sospensioni, vulnerabilità o incompatibilità tecniche.</p>
    <p><?= $titolareNome ?> potrà sospendere, limitare o interrompere temporaneamente l’accesso al sito per esigenze di manutenzione, aggiornamento, sicurezza, adeguamento normativo, forza maggiore o cause tecniche non imputabili alla società.</p>

    <h2>14. Limitazione di responsabilità</h2>
    <p><?= $titolareNome ?> non potrà essere ritenuta responsabile per danni diretti o indiretti derivanti da:</p>
    <ul>
      <li>uso improprio del sito da parte dell’utente;</li>
      <li>impossibilità temporanea di accesso al sito;</li>
      <li>errori materiali o refusi nei contenuti pubblicati;</li>
      <li>inesattezze derivanti da informazioni fornite da terzi;</li>
      <li>malfunzionamenti tecnici, interruzioni, attacchi informatici o eventi fuori dal ragionevole controllo della società;</li>
      <li>decisioni assunte dall’utente sulla base di informazioni non integrate dalla documentazione contrattuale ufficiale del venditore finale.</li>
    </ul>
    <p>Resta fermo che nulla nelle presenti condizioni limita o esclude responsabilità inderogabili previste dalla legge.</p>

    <h2>15. Protezione dei dati personali</h2>
    <p>Il trattamento dei dati personali degli utenti avviene nel rispetto del Regolamento (UE) 2016/679, del D.Lgs. 196/2003 come modificato dal D.Lgs. 101/2018 e della normativa applicabile in materia di protezione dei dati personali.</p>
    <p>Le modalità di trattamento dei dati personali sono descritte nella Privacy Policy del sito.</p>
    <p>L’utilizzo di cookie e strumenti di tracciamento è disciplinato nella Cookie Policy.</p>

    <h2>16. Cookie</h2>
    <p>Il sito può utilizzare cookie tecnici necessari al funzionamento delle pagine e, previo consenso dell’utente, eventuali cookie o strumenti analoghi per finalità statistiche, analitiche, funzionali o di marketing.</p>
    <p>L’utente può consultare la Cookie Policy e gestire le proprie preferenze attraverso il pannello o il link dedicato, ove disponibile.</p>
    <p>L’eventuale rifiuto dei cookie non tecnici non pregiudica la navigazione essenziale del sito.</p>

    <h2>17. Sicurezza informatica</h2>
    <p><?= $titolareNome ?> adotta misure tecniche e organizzative ragionevoli per proteggere il sito, i sistemi e i dati trattati da accessi non autorizzati, perdita, alterazione, divulgazione indebita o utilizzi illeciti.</p>
    <p>L’utente è tenuto a non compromettere la sicurezza del sito e a non porre in essere attività che possano danneggiare, alterare, sovraccaricare o interferire con il funzionamento dei sistemi informatici.</p>
    <p>Eventuali attività anomale potranno essere oggetto di registrazione tecnica, analisi di sicurezza e, ove necessario, comunicazione alle autorità competenti.</p>

    <h2>18. Modifiche al sito e alle condizioni</h2>
    <p><?= $titolareNome ?> si riserva il diritto di modificare, aggiornare, integrare, sospendere o rimuovere, in qualsiasi momento, contenuti, funzionalità, pagine, documenti e presenti Condizioni di Utilizzo.</p>
    <p>Le modifiche avranno efficacia dalla data di pubblicazione sul sito, salvo diversa indicazione.</p>
    <p>L’utente è invitato a consultare periodicamente le presenti condizioni per verificare eventuali aggiornamenti.</p>

    <h2>19. Nullità parziale</h2>
    <p>L’eventuale invalidità, inefficacia o nullità di una o più clausole delle presenti Condizioni di Utilizzo non comporta l’invalidità delle restanti disposizioni, che continueranno a produrre effetti nei limiti consentiti dalla legge.</p>
    <p>La clausola invalida o inefficace si intenderà sostituita, ove possibile, da una disposizione valida ed efficace avente contenuto e finalità quanto più possibile equivalenti.</p>

    <h2>20. Legge applicabile</h2>
    <p>Le presenti Condizioni di Utilizzo sono regolate dalla legge italiana.</p>
    <p>Per quanto non espressamente previsto, si applicano le disposizioni normative vigenti in materia di servizi della società dell’informazione, comunicazioni elettroniche, tutela del consumatore, protezione dei dati personali, proprietà intellettuale e responsabilità civile.</p>
    <p>Il D.Lgs. 70/2003 disciplina, tra l’altro, i servizi della società dell’informazione prestati da soggetti stabiliti in Italia e gli obblighi informativi del prestatore.</p>

    <h2>21. Foro competente</h2>
    <p>Per ogni controversia relativa all’interpretazione, validità, efficacia, esecuzione o cessazione delle presenti Condizioni di Utilizzo sarà competente il Foro individuato secondo le norme inderogabili applicabili.</p>
    <p>Ove l’utente agisca in qualità di consumatore, resta ferma la competenza del foro del luogo di residenza o domicilio del consumatore, se inderogabile ai sensi della normativa vigente.</p>
    <p>Negli altri casi, salvo diversa previsione inderogabile di legge, sarà competente il Foro di Napoli.</p>

    <h2>22. Documenti collegati</h2>
    <p>Le presenti Condizioni di Utilizzo devono essere lette congiuntamente ai seguenti documenti pubblicati sul sito:</p>
    <ul>
      <li>Privacy Policy;</li>
      <li>Cookie Policy;</li>
      <li>Note legali;</li>
      <li>Trasparenza commerciale;</li>
      <li>Documentazione offerte.</li>
    </ul>

    <h2>23. Contatti</h2>
    <p>Per informazioni relative al sito, alle presenti Condizioni di Utilizzo o alle pagine legali pubblicate, è possibile contattare:</p>
    <p>
      <strong><?= $titolareNome ?></strong><br>
      PEC: <a href="mailto:<?= $titolarePec ?>"><?= $titolarePec ?></a>
    </p>
    <p>Per questioni relative al trattamento dei dati personali / privacy:</p>
    <p>
      DPO / RPD: <?= $dpoNome ?><br>
      E-mail: <a href="mailto:<?= $emailDpo ?>"><?= $emailDpo ?></a>
    </p>

    <hr>
    <p style="font-size: 14px; color: var(--muted); text-align: center;">Ultimo aggiornamento: 09/07/2026</p>
  </main>

<?php include __DIR__ . '/footer.php'; ?>
