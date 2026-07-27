<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Chi siamo';
$pageDescription = ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'GR Contact Call Center')
    . ' è l\'agenzia commerciale autorizzata ' . $OPERATORE['nome_marketing']
    . ' che aiuta famiglie e attività a scegliere offerte luce e gas con chiarezza.';
include __DIR__ . '/header.php';
?>

<main class="about-new">
  <section class="about-hero-new">
    <div class="about-hero-index-new">02 <span>/</span> CHI SIAMO</div>
    <div class="container about-hero-grid-new">
      <div>
        <span class="eyebrow"><span class="dot"></span> Una scelta più consapevole</span>
        <h1>Prima<br>le <em>persone.</em></h1>
        <p>Non partiamo dalle tariffe. Partiamo da chi sei, da come consumi e da ciò che vuoi davvero ottenere dalla tua fornitura.</p>
        <a class="btn-primary about-btn-new" href="contatti.php">Conosci il nostro metodo <span aria-hidden="true">↗</span></a>
      </div>
      <div class="about-hero-image-new"><img src="chi_siamo_team.png" alt="Il team che segue le richieste dei clienti"><span>Ascoltare.<br><strong>Capire. Affiancare.</strong></span></div>
    </div>
  </section>

  <section class="section about-manifesto-new">
    <div class="container about-manifesto-grid-new">
      <div><span class="eyebrow"><span class="dot"></span> Il nostro punto di vista</span><h2>Una bolletta più chiara è già un <span>passo avanti.</span></h2></div>
      <div><p><?= $brandName ?> gestisce questo sito come agenzia commerciale autorizzata <?= $OPERATORE['nome_marketing'] ?>. Il nostro compito è rendere più semplice il momento della scelta, senza parole complicate e senza promesse che non possiamo mantenere.</p><p>Ti aiutiamo a capire le offerte disponibili, a leggere i tuoi consumi e a scegliere con la tranquillità di avere qualcuno a cui rivolgerti.</p></div>
    </div>
  </section>

  <section class="about-values-new section">
    <div class="container">
      <div class="about-section-head-new"><div><span class="eyebrow"><span class="dot"></span> Come lavoriamo</span><h2>Tre cose che<br><span>contano davvero.</span></h2></div><p>Ogni contatto è un'occasione per fare ordine, trovare una risposta e lasciare le cose più semplici di come le abbiamo trovate.</p></div>
      <div class="about-values-grid-new">
        <article><b>01</b><h3>Ascolto</h3><p>Partiamo dalle tue esigenze reali, dai consumi e dalle domande che vuoi chiarire.</p><strong>Prima capire, poi proporre.</strong></article>
        <article><b>02</b><h3>Trasparenza</h3><p>Mettiamo in evidenza condizioni, costi e passaggi necessari per scegliere con consapevolezza.</p><strong>Niente sorprese dopo la firma.</strong></article>
        <article><b>03</b><h3>Presenza</h3><p>Non spariamo dopo l'attivazione: restiamo disponibili quando hai bisogno di supporto.</p><strong>Una voce, anche dopo.</strong></article>
      </div>
    </div>
  </section>

  <section class="section about-story-new">
    <div class="container about-story-grid-new">
      <div class="about-story-image-new"><img src="feature_consulenza.png" alt="Consulenza personalizzata sulle offerte energia"></div>
      <div class="about-story-copy-new"><span class="eyebrow"><span class="dot"></span> Il nostro lavoro</span><h2>Consigli concreti,<br><span>persone vere.</span></h2><p>Che tu stia cercando un'offerta per casa, per una piccola attività o per la tua azienda, ti accompagniamo con un metodo semplice: raccogliamo le informazioni, confrontiamo le possibilità e ti lasciamo scegliere senza pressioni.</p><div class="about-facts-new"><div><strong>24h</strong><span>tempo di risposta</span></div><div><strong>€0</strong><span>consulenza iniziale</span></div><div><strong>100%</strong><span>supporto dedicato</span></div></div><a class="home-arrow-link-new" href="tariffe.php">Scopri le offerte disponibili <span aria-hidden="true">↗</span></a></div>
    </div>
  </section>

  <section class="about-quote-new">
    <div class="container"><span class="about-quote-mark-new">“</span><h2>La soluzione giusta<br>inizia da una conversazione.</h2><p>Raccontaci cosa stai cercando. Al resto pensiamo insieme.</p><a class="btn-primary about-btn-new" href="contatti.php">Inizia da qui <span aria-hidden="true">↗</span></a></div>
  </section>
</main>

<?php include __DIR__ . '/footer.php'; ?>
