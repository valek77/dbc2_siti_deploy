<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Policy di Utilizzo della Landing Page';
$pageDescription = 'Policy di utilizzo della landing page unica del Titolare Semplice Gas & Luce S.p.A. — conformità Decreto Bollette e art. 51 del Codice del Consumo.';
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
  .policy-doc a { color: var(--primary, #1e40af); font-weight: 600; }
  .policy-doc .doc-sign {
    margin-top: 56px; padding-top: 24px; border-top: 1px dashed var(--line, #e2e8f0);
    font-size: 15px; color: var(--ink-2, #374151); text-align: left; letter-spacing: 0.01em;
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
    $resp[] = 'PEC ' . $COMPANY['pec'];
}
$responsabileData = implode(', ', $resp);
?>

  <main class="policy-doc">

    <h1 class="doc-title">Policy di Utilizzo della Landing Page</h1>
    <p class="doc-subtitle">Regole d'uso della landing page unica del Titolare — conformità Decreto Bollette e art. 51 Codice del Consumo</p>
    <hr class="doc-rule">

    <h2>Premesse</h2>
    <p>(A) La landing page unica <a href="<?= $LANDING_PAGE['url'] ?>"><?= $LANDING_PAGE['url'] ?></a> è di proprietà di <strong>Semplice Gas &amp; Luce S.p.A.</strong>, con sede legale in Via San Quintino 3, 10121 Torino (TO), C.F./P.IVA e n. Registro Imprese 11796930011, REA TO-1241415, tel. 800 069 750 — 011 0122502, e-mail partner@semplicegaseluce.it, PEC semplicegaseluce@pec.it, in persona del legale rapp.te p.t. (il «Titolare»), ed è gestita dalla società di teleselling nominata Responsabile ex art. 28 GDPR<?= $responsabileData !== '' ? ', ' . $responsabileData : '' ?> (il «Responsabile») e dai sub-partner commerciali autorizzate.</p>
    <p>(B) La presente Policy regola l'uso della pagina in conformità al nuovo art. 51, commi 8-bis e seguenti, del Codice del Consumo (L. 49/2026, Decreto Bollette), che vieta le sollecitazioni telefoniche per energia elettrica e gas salvo richiesta del consumatore effettuata tramite le interfacce informatiche del professionista.</p>

    <h2>Art. 1 — Oggetto</h2>
    <p>La Policy definisce le regole vincolanti d'uso della landing page unica del Titolare da parte del Responsabile e dei sub-partner commerciali.</p>

    <h2>Art. 2 — Proprietà e landing page unica</h2>
    <p>La pagina è di proprietà del Titolare; il Responsabile e tutti i sub-partner commerciali la utilizzano in via esclusiva.</p>
    <p>È vietato l'uso di pagine, form, domini o canali di raccolta diversi dalla landing page unica.</p>

    <h2>Art. 3 — Presupposto della chiamata (Decreto Bollette)</h2>
    <p>La chiamata è effettuata solo verso chi ha inoltrato la richiesta tramite la pagina, entro 30 giorni dall'inoltro, e unicamente per i prodotti richiesti.</p>
    <p>Decorsi 30 giorni senza conclusione del contratto, il lead è cancellato.</p>
    <p>La chiamata avviene da numerazione identificabile; l'operatore si qualifica e richiama la richiesta effettuata dall'interessato.</p>

    <h2>Art. 4 — Esclusione dei flag di consenso</h2>
    <p>Il form non contiene alcuna casella di consenso (marketing, profilazione, cessione a terzi).</p>
    <p>L'unica spunta ammessa è la <strong>presa visione dell'informativa</strong>, obbligatoria e di natura non negoziale. Da flaggare prima dell'inoltro dei dati tramite il form.</p>
    <p>Il consenso marketing non costituisce e non deve essere presentato come base della chiamata: la chiamata si fonda esclusivamente sulla richiesta dell'interessato.</p>

    <h2>Art. 5 — Conservazione del log di presa visione</h2>
    <p>È conservato il log del flag di presa visione dell'informativa per ciascuna richiesta: data e ora, indirizzo IP, versione dell'informativa visualizzata.</p>
    <p>Il log è conservato per il tempo utile a dimostrare l'adempimento informativo e la liceità del contatto e comunque non oltre 10 anni; è messo a disposizione del Titolare su richiesta.</p>

    <h2>Art. 6 — Contrattualizzazione</h2>
    <p>In caso di adesione, il Responsabile carica i dati nei sistemi del Titolare e cura gli adempimenti del contratto a distanza: conferma dell'offerta su supporto durevole e perfezionamento mediante accettazione scritta (art. 51, comma 6, Cod. Cons.) e informativa sul diritto di recesso di 14 giorni (artt. 52 ss. Cod. Cons.).</p>

    <h2>Art. 7 — Uso del marchio</h2>
    <p>Il Responsabile del trattamento ed i sub-responsabili (teleselling e sub-partner commerciali) inseriscono il marchio della Titolare nella landing page in modo da permettere un immediato riconoscimento dei prodotti offerti. Il Logo societario o i marchi saranno trasmessi via pec con separata comunicazione.</p>
    <p>Il marchio del Titolare è utilizzato esclusivamente sulla landing page unica e su nessun altro canale o supporto; l'uso è gratuito, non esclusivo, non trasferibile e revocabile.</p>
    <p>In caso di cessazione o revoca, il marchio è immediatamente rimosso e ne cessa ogni utilizzo.</p>

    <h2>Art. 8 — Tracciabilità, prove e audit</h2>
    <p>Il Responsabile conserva l'evidenza di ciascuna richiesta (form, log di presa visione, esito del contatto) per assolvere l'onere della prova della liceità del contatto, e la mette a disposizione del Titolare.</p>
    <p>Il Titolare può effettuare audit e richiedere reportistica periodica.</p>

    <h2>Art. 9 — Divieti</h2>
    <p>È vietato: chiamare chi non ha fatto richiesta; usare il consenso marketing come base della chiamata; effettuare cross-selling o proporre prodotti/fornitori diversi; utilizzare liste o dati non provenienti dalla pagina; inserire caselle di consenso nel form; cedere la pagina o il dominio a terzi.</p>

    <h2>Art. 10 — Durata, risoluzione ed effetti</h2>
    <p>Il Titolare può sospendere o risolvere il rapporto con effetto immediato in caso di violazione della Policy o di provvedimenti dell'Autorità. Alla cessazione il Responsabile interrompe l'uso della pagina e del marchio e gestisce i dati secondo la nomina art. 28. La pagina sarà chiusa al termine del rapporto di collaborazione.</p>

    <p class="doc-sign">Il Titolare ______________________ Il Responsabile ______________________ Data __________</p>

  </main>

<?php include __DIR__ . '/footer.php'; ?>
