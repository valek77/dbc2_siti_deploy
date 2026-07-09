<?php
require __DIR__ . '/_config.php';
$brandName = $LANDING_PAGE['nome_portale'] !== ''
    ? $LANDING_PAGE['nome_portale']
    : ($LANDING_PAGE['titolo'] !== ''
        ? $LANDING_PAGE['titolo']
        : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'GR Contact'));
$pageTitle = 'Chi Siamo';
$pageDescription = $brandName . ' è un team di consulenti energetici specializzati nelle offerte Switch Luce Gas. Scopri la nostra storia, i nostri valori e il nostro approccio.';
include __DIR__ . '/header.php';
?>

  <!-- HERO — foto città/grattacieli -->
  <section class="page-hero">
    <div class="photo-bg" style="background-image: url('https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?auto=format&fit=crop&w=1600&q=80');"></div>
    <div class="photo-overlay"></div>
    <div class="inner">
      <span class="eyebrow" style="color:var(--primary-light);"><span class="dot" style="background:var(--primary-light);"></span> Chi siamo</span>
      <h1>Energia con <span class="hl">competenza</span></h1>
      <p>Un team di consulenti al tuo fianco per navigare il mercato libero dell'energia. Semplici, trasparenti, sempre disponibili.</p>
    </div>
  </section>

  <!-- MISSIONE SPLIT -->
  <section class="section">
    <div class="container">
      <div class="split">
        <div>
          <span class="eyebrow"><span class="dot"></span> La nostra missione</span>
          <h2 class="section-title">Mercato libero,<br><span class="hl">scelta libera</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin:0 0 20px;"><?= $brandName ?> nasce con un obiettivo preciso: rendere semplice e conveniente il passaggio al mercato libero dell'energia. Siamo rivenditori autorizzati <?= $OPERATORE['nome_legale'] ?> e lavoriamo ogni giorno per portare ai nostri clienti le migliori tariffe disponibili.</p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin:0 0 36px;">Il mercato energetico italiano può sembrare complesso, tra PUN, PSV e spread. Il nostro lavoro è decifrarlo per te, guidandoti nella scelta della tariffa più adatta, senza sorprese in bolletta.</p>
          <a href="tariffe.php" class="btn-primary">Scopri le offerte</a>
        </div>
        <div class="split-img">
          <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=800&q=80" alt="Team <?= $brandName ?> al lavoro" loading="lazy">
          <div class="badge">
            <div class="label">Partner ufficiale</div>
            <div class="val"><?= $OPERATORE['nome_marketing'] ?></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- STAT STRIP -->
  <div class="stat-strip">
    <div class="stat-grid">
      <div class="stat-item"><div class="n">5.000+</div><div class="l">Contratti attivati</div></div>
      <div class="stat-item"><div class="n">24h</div><div class="l">Risposta garantita</div></div>
      <div class="stat-item"><div class="n">8</div><div class="l">Offerte disponibili</div></div>
      <div class="stat-item"><div class="n">€0</div><div class="l">Costo consulenza</div></div>
    </div>
  </div>

  <!-- VALORI -->
  <section class="section" style="background:var(--bg-soft);">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri valori</span>
        <h2 class="section-title">Tre principi,<br><span class="ul">ogni giorno</span></h2>
        <p class="section-sub">Quello che ci guida nel rapporto con i clienti, dalla prima chiamata all'ultima bolletta.</p>
      </div>
      <div class="feature-grid">
        <div class="feat-card">
          <div class="ico">🔍</div>
          <h4>Trasparenza</h4>
          <p>Nessun costo nascosto, nessuna sorpresa. Ogni offerta viene spiegata nel dettaglio prima della firma.</p>
        </div>
        <div class="feat-card">
          <div class="ico">🎯</div>
          <h4>Competenza</h4>
          <p>I nostri consulenti sono formati e aggiornati sulle normative ARERA e sulle dinamiche del mercato energetico italiano.</p>
        </div>
        <div class="feat-card">
          <div class="ico">💬</div>
          <h4>Vicinanza</h4>
          <p>Non spariamo dopo la firma. Siamo qui anche dopo l'attivazione, per qualsiasi dubbio su bolletta o contratto.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- COME LAVORIAMO — dark split -->
  <section class="dark-section" style="padding: var(--section) 0;">
    <div class="container">
      <div class="split reverse">
        <div>
          <span class="eyebrow" style="color:var(--primary-light);"><span class="dot" style="background:var(--primary-light);"></span> Il nostro approccio</span>
          <h2 class="section-title" style="color:#fff;">Come lavoriamo <span style="color:var(--primary-light);">con te</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:rgba(255,255,255,.75); line-height:1.75; margin:0 0 20px;">Il nostro processo parte sempre dall'ascolto. Analizziamo la tua bolletta attuale, capiamo i tuoi consumi e il tuo profilo — domestico, uso lavoro, piccola impresa — e solo allora ti proponiamo l'offerta più adatta.</p>
          <p style="font-size:17px; color:rgba(255,255,255,.75); line-height:1.75; margin:0 0 36px;">Ci occupiamo di tutta la documentazione, coordiniamo il passaggio con il distributore locale e ti teniamo aggiornato su ogni fase. Il cambio fornitore avviene senza interruzioni alla fornitura.</p>
          <a href="contatti.php" class="btn-primary">Parla con un consulente</a>
        </div>
        <div class="split-img" style="border-radius:var(--r-2xl); overflow:hidden; aspect-ratio:4/3;">
          <img src="https://images.unsplash.com/photo-1556745757-8d76bdb6984b?auto=format&fit=crop&w=800&q=80" alt="Consulente <?= $brandName ?> con cliente" loading="lazy" style="width:100%;height:100%;object-fit:cover;">
        </div>
      </div>
    </div>
  </section>

  <!-- QUOTE -->
  <section class="section" style="text-align:center;">
    <div class="container" style="max-width:800px;">
      <div style="font-size:64px; color:var(--primary); line-height:1; margin-bottom:24px; font-family:var(--font-display);">"</div>
      <h2 style="font-size:clamp(24px,3.5vw,34px); color:var(--ink); font-weight:700; line-height:1.4; margin:0 0 32px;">Il nostro obiettivo non è chiudere un contratto, ma costruire una relazione di fiducia duratura con ogni cliente che si affida a noi.</h2>
      <div style="font-family:var(--font-display); font-weight:700; color:var(--primary); font-size:16px;">— Il Team <?= $brandName ?></div>
    </div>
  </section>

  <!-- FOTO background / CTA -->
  <section class="photo-section" style="padding: var(--section) 0;">
    <div class="photo-bg" style="background-image: url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=1600&q=80');"></div>
    <div class="photo-overlay"></div>
    <div class="container" style="text-align:center; position:relative; z-index:2;">
      <h2 style="font-family:var(--font-display); font-size:clamp(30px,5vw,50px); font-weight:800; color:#fff; margin:0 0 20px;">Pronto a risparmiare?</h2>
      <p style="font-size:18px; color:rgba(255,255,255,.8); margin:0 auto 36px; max-width:520px; line-height:1.6;">Inizia con una consulenza gratuita. Analizziamo insieme la tua situazione senza impegno.</p>
      <a href="contatti.php" class="btn-primary" style="font-size:17px; padding:16px 44px;">Contattaci ora →</a>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
