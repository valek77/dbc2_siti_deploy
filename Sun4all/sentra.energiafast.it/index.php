<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Luce e gas, con più chiarezza';
$pageDescription = ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'GR Contact Call Center')
    . ' è il partner ufficiale ' . $OPERATORE['nome_marketing']
    . '. Scopri offerte luce e gas trasparenti e assistenza dedicata.';
include __DIR__ . '/header.php';
?>

<main class="home-redesign">
  <section class="home-hero">
    <div class="home-hero-inner">
      <div class="home-hero-copy">
        <span class="eyebrow"><span class="dot"></span> Partner ufficiale <?= $OPERATORE['nome_marketing'] ?></span>
        <h1>Più semplicità per <span>la tua energia.</span></h1>
        <p>Confronta le soluzioni luce e gas con il supporto di chi sa ascoltare, spiegare e accompagnarti davvero.</p>
        <div class="home-actions"><a href="tariffe.php" class="btn-primary">Scopri le offerte <span aria-hidden="true">→</span></a><a href="contatti.php" class="btn-ghost">Parla con un consulente</a></div>
        <div class="home-proof"><strong>24h</strong><span>per essere ricontattato</span><i></i><strong>€0</strong><span>per il primo consiglio</span></div>
      </div>
      <div class="home-hero-media">
        <img class="home-main-image" src="energy-hero.png" alt="Casa efficiente con pannelli solari">
        <div class="home-floating-card home-floating-card--top"><span class="home-card-icon">✓</span><div><strong>Più chiarezza</strong><small>nella tua bolletta</small></div></div>
        <div class="home-floating-card home-floating-card--bottom"><strong>100%</strong><span>assistenza dedicata</span></div>
        <div class="home-pink-shape" aria-hidden="true"></div>
      </div>
    </div>
  </section>

  <section class="home-values" aria-label="I nostri punti di forza"><div class="home-values-inner"><div><span>01</span><h2>Partiamo da te</h2><p>Conosciamo le tue abitudini e cerchiamo la soluzione più adatta.</p></div><div><span>02</span><h2>Parliamo chiaro</h2><p>Ti illustriamo prezzi e condizioni senza formule complicate.</p></div><div><span>03</span><h2>Restiamo al tuo fianco</h2><p>Hai un riferimento anche dopo l'attivazione della fornitura.</p></div></div></section>

  <section class="home-offers section"><div class="container"><div class="redesign-heading"><span class="eyebrow"><span class="dot"></span> Le nostre soluzioni</span><h2>La tariffa che cerchi,<br><span>il supporto che meriti.</span></h2><p>Esplora le proposte <?= $OPERATORE['nome_marketing'] ?> per la casa e il lavoro, con un team pronto a chiarire ogni dubbio.</p></div><div class="home-offer-grid"><article class="home-offer-card"><img src="energy-luce.png" alt="Ambiente domestico illuminato con energia efficiente"><div><span class="offer-kicker">Energia elettrica</span><h3>Luce</h3><p>Una soluzione per la tua quotidianità, con condizioni trasparenti e assistenza durante ogni fase.</p><a href="tariffe.php">Guarda le offerte <span>→</span></a></div></article><article class="home-offer-card home-offer-card--gas"><img src="energy-gas.png" alt="Cucina moderna alimentata a gas"><div><span class="offer-kicker">Energia per la casa</span><h3>Gas</h3><p>Il comfort di cui hai bisogno, con una proposta chiara e senza passaggi complicati.</p><a href="tariffe.php">Guarda le offerte <span>→</span></a></div></article></div></div></section>

  <section class="home-about section"><div class="container home-about-grid"><div class="home-about-image"><img src="energy-consulenza.png" alt="Consulente che aiuta una famiglia a scegliere l'energia"><span>La tua energia,<br><strong>più semplice.</strong></span></div><div class="home-about-copy"><span class="eyebrow"><span class="dot"></span> Perché scegliere <?= $brandName ?></span><h2>Un aiuto concreto, ogni giorno.</h2><p>Ogni richiesta merita tempo, attenzione e una risposta comprensibile.</p><p>Con <?= $brandName ?> hai un team vicino, pronto a guidarti verso una scelta consapevole nel mercato libero.</p><a class="text-link" href="chi-siamo.php">Scopri chi siamo <span>→</span></a></div></div></section>

  <section class="home-final-cta"><div class="container"><span class="eyebrow eyebrow-light"><span class="dot"></span> Inizia da qui</span><h2>Facciamo chiarezza<br><span>sulla tua prossima bolletta.</span></h2><p>Raccontaci di cosa hai bisogno: la prima consulenza è gratuita e senza impegno.</p><a class="btn-primary" href="contatti.php">Richiedi un contatto <span>→</span></a></div></section>
</main>

<?php include __DIR__ . '/footer.php'; ?>
