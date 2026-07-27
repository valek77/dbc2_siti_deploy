<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Luce e gas, scelti con chiarezza';
$pageDescription = ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'GR Contact Call Center')
    . ' gestisce questo sito come agenzia commerciale autorizzata ' . $OPERATORE['nome_marketing']
    . '. Scopri offerte luce e gas trasparenti e ricevi assistenza dedicata.';
include __DIR__ . '/header.php';
?>

<main class="home-new">
  <section class="home-hero-new">
    <div class="container home-hero-grid-new">
      <div class="home-hero-copy-new">
        <span class="eyebrow eyebrow-light"><span class="dot"></span> Energia spiegata bene</span>
        <h1>La tua energia,<br><em>senza complicazioni.</em></h1>
        <p>Con <?= $brandName ?> confronti le offerte <?= $OPERATORE['nome_marketing'] ?>, capisci cosa stai scegliendo e attivi la soluzione più adatta a casa o al lavoro.</p>
        <div class="home-hero-actions-new">
          <a class="btn-primary" href="tariffe.php">Guarda le offerte <span aria-hidden="true">↗</span></a>
          <a class="home-text-link-new" href="contatti.php">Parla con un consulente <span aria-hidden="true">→</span></a>
        </div>
        <div class="home-proof-new">
          <div><strong>01</strong><span>Analisi dei consumi</span></div>
          <div><strong>02</strong><span>Scelta trasparente</span></div>
          <div><strong>03</strong><span>Attivazione assistita</span></div>
        </div>
      </div>
      <div class="home-hero-art-new">
        <div class="home-hero-image-new">
          <img src="hero_energy_1.png" alt="Casa confortevole e soluzioni energia">
        </div>
        <div class="home-hero-note-new">
          <span>La scelta giusta parte da qui</span>
          <strong>Consulenza gratuita</strong>
        </div>
        <div class="home-hero-number-new"><strong>24h</strong><span>per ricevere<br>una risposta</span></div>
      </div>
    </div>
  </section>

  <section class="home-intro-new section">
    <div class="container home-intro-grid-new">
      <div>
        <span class="eyebrow"><span class="dot"></span> Un modo più semplice</span>
        <h2>Non vendiamo dubbi.<br><span>Costruiamo scelte.</span></h2>
      </div>
      <div class="home-intro-text-new">
        <p>Una bolletta non dovrebbe sembrare un enigma. Ti aiutiamo a leggere i consumi, mettere a confronto le possibilità e trovare l'offerta luce o gas più coerente con il tuo modo di vivere.</p>
        <a class="home-arrow-link-new" href="chi-siamo.php">Scopri chi siamo <span aria-hidden="true">↗</span></a>
      </div>
    </div>
  </section>

  <section class="home-offers-new section">
    <div class="container">
      <div class="home-section-head-new">
        <div><span class="eyebrow"><span class="dot"></span> Le nostre soluzioni</span><h2>Energia per ogni<br><span>ritmo di vita.</span></h2></div>
        <p>Tre punti di partenza, un unico obiettivo: farti scegliere con maggiore consapevolezza.</p>
      </div>
      <div class="home-offer-grid-new">
        <a class="home-offer-card-new home-offer-card-yellow" href="tariffe.php">
          <div class="home-offer-img-new"><img src="feature_luce.png" alt="Offerte luce"></div>
          <div class="home-offer-content-new"><span>01 / Luce</span><h3>Accendi il risparmio.</h3><p>Soluzioni chiare per la tua casa, con condizioni da capire al primo sguardo.</p><strong>Scopri di più ↗</strong></div>
        </a>
        <a class="home-offer-card-new home-offer-card-magenta" href="tariffe.php">
          <div class="home-offer-img-new"><img src="feature_gas.png" alt="Offerte gas"></div>
          <div class="home-offer-content-new"><span>02 / Gas</span><h3>Il calore che conviene.</h3><p>Un'offerta adatta ai tuoi consumi, con il supporto di un team sempre disponibile.</p><strong>Scopri di più ↗</strong></div>
        </a>
        <a class="home-offer-card-new home-offer-card-dark" href="contatti.php">
          <div class="home-offer-img-new"><img src="feature_consulenza.png" alt="Consulenza energia"></div>
          <div class="home-offer-content-new"><span>03 / Supporto</span><h3>Una voce dall'altra parte.</h3><p>Raccontaci cosa ti serve: ti rispondiamo in modo diretto, senza tecnicismi inutili.</p><strong>Parla con noi ↗</strong></div>
        </a>
      </div>
    </div>
  </section>

  <section class="home-steps-new section">
    <div class="container">
      <div class="home-steps-layout-new">
        <div class="home-steps-title-new"><span class="eyebrow eyebrow-light"><span class="dot"></span> Come funziona</span><h2>Quattro passi.<br><em>Nessun salto nel buio.</em></h2><p>Ti accompagniamo dall'idea alla nuova fornitura, senza interruzioni e senza sorprese.</p></div>
        <div class="home-step-list-new">
          <div><b>01</b><h3>Raccontaci le tue esigenze</h3><p>Casa, attività o seconda abitazione: partiamo dalla tua situazione reale.</p></div>
          <div><b>02</b><h3>Leggiamo insieme la bolletta</h3><p>Mettiamo ordine tra consumi, costi e condizioni dell'offerta.</p></div>
          <div><b>03</b><h3>Confrontiamo le opzioni</h3><p>Ti presentiamo la soluzione più coerente, con parole semplici.</p></div>
          <div><b>04</b><h3>Seguiamo l'attivazione</h3><p>Restiamo al tuo fianco fino alla conferma della fornitura.</p></div>
        </div>
      </div>
    </div>
  </section>

  <section class="home-reassurance-new section">
    <div class="container home-reassurance-grid-new">
      <div class="home-reassurance-image-new"><img src="feature_payment.png" alt="Gestione semplice delle offerte energia"></div>
      <div class="home-reassurance-copy-new"><span class="eyebrow"><span class="dot"></span> Il nostro impegno</span><h2>Più chiarezza.<br><span>Meno pensieri.</span></h2><p><?= $brandName ?> gestisce questo sito come agenzia commerciale autorizzata <?= $OPERATORE['nome_marketing'] ?>. Il nostro lavoro è aiutarti a scegliere e seguirti con attenzione, prima e dopo l'attivazione.</p><div class="home-checks-new"><span>✓ Condizioni spiegate chiaramente</span><span>✓ Consulenza senza impegno</span><span>✓ Assistenza dedicata</span></div><a class="btn-primary" href="contatti.php">Richiedi un consiglio <span aria-hidden="true">↗</span></a></div>
    </div>
  </section>

  <section class="home-final-new">
    <div class="container"><span class="eyebrow eyebrow-light"><span class="dot"></span> Inizia da una domanda</span><h2>Quanto potresti<br><em>risparmiare davvero?</em></h2><p>Parlane con chi sa trasformare una bolletta in una scelta più semplice.</p><a class="btn-primary" href="contatti.php">Parla con un consulente <span aria-hidden="true">↗</span></a></div>
  </section>
</main>

<style>
  .home-offer-card-new { background:#fff; color:#0B1220; border:1px solid #e5e7eb; border-radius:18px; box-shadow:0 8px 24px rgba(11,18,32,.08); overflow:hidden; transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease; }
  .home-offer-card-new:hover { transform:translateY(-6px); border-color:#ca1b6e; box-shadow:0 18px 34px rgba(11,18,32,.15); }
  .home-offer-card-magenta, .home-offer-card-dark { background:#fff; color:#0B1220; }
  .home-offer-img-new { height:260px; background:#f3f4f6; overflow:hidden; }
  .home-offer-img-new::after { display:none; }
  .home-offer-img-new img, .home-offer-card-magenta .home-offer-img-new img, .home-offer-card-dark .home-offer-img-new img { width:100%; height:100%; object-fit:cover; mix-blend-mode:normal; opacity:1; transition:transform .4s ease; }
  .home-offer-card-new:hover .home-offer-img-new img { transform:scale(1.04); }
  .home-offer-content-new { background:#fff; color:#0B1220; padding:28px 28px 30px; }
  .home-offer-content-new > span { color:#ca1b6e; opacity:1; }
  .home-offer-content-new h3 { color:#0B1220; margin:16px 0 12px; }
  .home-offer-content-new p, .home-offer-card-magenta .home-offer-content-new p, .home-offer-card-dark .home-offer-content-new p { color:#59636f; opacity:1; }
  .home-offer-content-new strong, .home-offer-card-magenta .home-offer-content-new strong, .home-offer-card-dark .home-offer-content-new strong { color:#ca1b6e; }
  @media (max-width:900px) { .home-offer-card-new:hover { transform:translateY(-4px); } }
</style>

<?php include __DIR__ . '/footer.php'; ?>
