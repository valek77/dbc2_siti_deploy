<?php
require __DIR__ . '/_config.php';
// Homepage: NON imposto $pageTitle, così header.php usa il "titolo" della landing.
$pageDescription = 'Locura ti guida verso una transizione energetica intelligente. Soluzioni luce e gas 100% green, ottimizzazione dei consumi e tariffe trasparenti per casa e impresa.';

// Brand portale + operatore (dinamici da API, con fallback).
$portal = $LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale']
        : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Locura');
$op = $OPERATORE['nome_marketing'] !== '' ? $OPERATORE['nome_marketing'] : 'Nexicom';
$opLogo = $OPERATORE['logo_url'] !== '' ? $OPERATORE['logo_url'] : $OPERATORE['logo2_url'];

// Offerte reali (solo anteprima — il dettaglio/CTE è in tariffe.php).
$homeOfferte = [
  ['code' => 'NEX_EE_PUN_DOM_386',    'tipo' => 'Luce', 'nome' => 'PUN Index GME Domestico 386',    'prezzo' => 'PUN + 0,055', 'unita' => '€/kWh', 'annuo' => '456 €/POD/anno'],
  ['code' => 'NX_GAS_PSV_DOM_386',    'tipo' => 'Gas',  'nome' => 'PSV Domestico 386',              'prezzo' => 'PSV + 0,45',  'unita' => '€/Smc', 'annuo' => '648 €/PDR/anno'],
  ['code' => 'NEX_EE_PUN_DOM_CS386',  'tipo' => 'Luce', 'nome' => 'PUN Index GME Domestico CS 386', 'prezzo' => 'PUN + 0,05',  'unita' => '€/kWh', 'annuo' => '456 €/POD/anno'],
  ['code' => 'NX_GAS_PSV_DOM_CS386',  'tipo' => 'Gas',  'nome' => 'PSV Domestico CS 386',           'prezzo' => 'PSV + 0,42',  'unita' => '€/Smc', 'annuo' => '648 €/PDR/anno'],
];

$pageHead = <<<'CSS'
<style>
  /* ===== Homepage editoriale "Ember & Cream" — solo home ===== */
  .nx-home { overflow-x: hidden; }
  .nx-wrap { max-width: 1200px; margin: 0 auto; padding: 0 32px; }
  .nx-kicker {
    display: inline-flex; align-items: center; gap: 12px;
    font-family: var(--font-body); font-size: 12px; font-weight: 700;
    letter-spacing: .2em; text-transform: uppercase; color: var(--primary-700);
  }
  .nx-kicker::before { content: ''; width: 32px; height: 2px; background: var(--primary); }

  /* HERO editoriale chiaro */
  .nx-hero { position: relative; padding: 56px 0 96px; }
  .nx-hero-grid { display: grid; grid-template-columns: 1.05fr .95fr; gap: 64px; align-items: center; }
  .nx-hero h1 {
    font-size: clamp(46px, 6.6vw, 90px); line-height: .98; letter-spacing: -.025em;
    margin: 22px 0 0; color: var(--ink);
  }
  .nx-hero h1 em { font-style: italic; color: var(--primary); }
  .nx-hero .lede { font-size: 19px; line-height: 1.7; color: var(--muted); max-width: 520px; margin: 28px 0 36px; }
  .nx-hero-actions { display: flex; gap: 16px; flex-wrap: wrap; align-items: center; }
  .nx-link { display: inline-flex; align-items: center; gap: 8px; font-weight: 700; color: var(--ink); font-size: 15px; }
  .nx-link svg { width: 16px; height: 16px; transition: transform .3s var(--ease); }
  .nx-link:hover svg { transform: translateX(4px); }
  .nx-mini { display: flex; gap: 44px; margin-top: 50px; padding-top: 30px; border-top: 1px solid var(--line); }
  .nx-mini .n { font-family: var(--font-display); font-size: 36px; color: var(--ink); line-height: 1; }
  .nx-mini .n em { color: var(--primary); font-style: italic; }
  .nx-mini .l { font-size: 12px; color: var(--muted); margin-top: 6px; letter-spacing: .03em; }

  .nx-hero-media { position: relative; }
  .nx-hero-media .frame {
    position: relative; border-radius: var(--r-lg); overflow: hidden;
    box-shadow: var(--shadow-lg); aspect-ratio: 4 / 5; border: 1px solid var(--line);
  }
  .nx-hero-media .frame img { width: 100%; height: 100%; object-fit: cover; }
  .nx-hero-media .tag {
    position: absolute; top: 22px; left: 22px;
    background: rgba(25,14,9,.55); color: #fff; backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,.18); border-radius: var(--r-pill);
    padding: 8px 16px; font-size: 12px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase;
  }
  .nx-hero-media .badge {
    position: absolute; left: -28px; bottom: 38px;
    background: var(--ink); color: #fff; border-radius: var(--r-md);
    padding: 22px 26px; box-shadow: var(--shadow-xl);
  }
  .nx-hero-media .badge .big { font-family: var(--font-display); font-size: 44px; color: var(--accent-hi); line-height: 1; font-style: italic; }
  .nx-hero-media .badge .small { font-size: 11.5px; color: rgba(255,255,255,.72); margin-top: 8px; letter-spacing: .06em; text-transform: uppercase; }
  .nx-amp {
    position: absolute; top: -70px; right: -10px; z-index: -1;
    font-family: var(--font-display); font-style: italic; font-weight: 400;
    font-size: 260px; line-height: 1; color: var(--primary); opacity: .06; pointer-events: none; user-select: none;
  }

  /* MARQUEE ember */
  .nx-marquee { background: var(--primary); color: #fff; overflow: hidden; padding: 20px 0; }
  .nx-marquee .track {
    display: inline-flex; gap: 0; white-space: nowrap;
    font-family: var(--font-display); font-style: italic; font-size: clamp(22px, 2.6vw, 30px);
    animation: nxslide 34s linear infinite;
  }
  .nx-marquee .track span { padding: 0 36px; }
  .nx-marquee .track .st { color: var(--accent-hi); }
  @keyframes nxslide { from { transform: translateX(0); } to { transform: translateX(-50%); } }

  /* MANIFESTO */
  .nx-manifesto { padding: 120px 0; }
  .nx-manifesto .lead {
    font-family: var(--font-display); font-weight: 500;
    font-size: clamp(27px, 3.5vw, 44px); line-height: 1.32; color: var(--ink);
    max-width: 1000px; letter-spacing: -.012em; margin-top: 28px;
  }
  .nx-manifesto .lead em { font-style: italic; color: var(--primary); }
  .nx-manifesto .cols { margin-top: 56px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; }
  .nx-manifesto .cols h4 { font-family: var(--font-body); font-size: 13px; text-transform: uppercase; letter-spacing: .12em; color: var(--primary-700); margin-bottom: 12px; }
  .nx-manifesto .cols p { font-size: 15px; color: var(--muted); line-height: 1.68; }

  /* REEL video */
  .nx-reel { position: relative; height: 380px; overflow: hidden; }
  .nx-reel video { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; }
  .nx-reel .ov {
    position: absolute; inset: 0;
    background: linear-gradient(90deg, rgba(25,14,9,.82) 0%, rgba(25,14,9,.35) 55%, transparent 100%);
    display: flex; align-items: center;
  }
  .nx-reel .ov .nx-wrap { width: 100%; }
  .nx-reel h2 { color: #fff; font-size: clamp(28px, 3.6vw, 44px); max-width: 560px; }
  .nx-reel h2 em { font-style: italic; color: var(--accent-hi); }

  /* STEPS editoriali */
  .nx-steps { background: var(--bg-soft); padding: 120px 0; }
  .nx-step { display: grid; grid-template-columns: 110px 1fr; gap: 36px; align-items: baseline; padding: 34px 0; border-top: 1px solid var(--line); }
  .nx-step:last-child { border-bottom: 1px solid var(--line); }
  .nx-step .idx { font-family: var(--font-display); font-style: italic; font-size: 60px; color: var(--primary); line-height: .8; }
  .nx-step h3 { font-size: 26px; }
  .nx-step p { color: var(--muted); margin-top: 12px; max-width: 620px; font-size: 15.5px; line-height: 1.72; }

  /* OFFERTE anteprima */
  .nx-offers { padding: 120px 0; }
  .nx-offers .head { display: flex; justify-content: space-between; align-items: flex-end; gap: 24px; flex-wrap: wrap; margin-bottom: 48px; }
  .nx-offers .head .partner { font-size: 13.5px; color: var(--muted); }
  .nx-offers .head .partner strong { color: var(--ink); }
  .nx-offer-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }
  .nx-ticket {
    background: var(--bg-cream); border: 1px solid var(--line); border-radius: var(--r-md);
    padding: 30px 32px; display: flex; flex-direction: column; gap: 12px;
    box-shadow: var(--shadow-xs); transition: all .3s var(--ease); position: relative; overflow: hidden;
  }
  .nx-ticket::after { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: var(--primary); opacity: .0; transition: opacity .3s var(--ease); }
  .nx-ticket.luce::after { background: var(--accent); }
  .nx-ticket:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); border-color: rgba(226,145,42,.3); }
  .nx-ticket:hover::after { opacity: 1; }
  .nx-ticket .row { display: flex; justify-content: space-between; align-items: center; }
  .nx-ticket .tipo { font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: .08em; padding: 6px 12px; border-radius: var(--r-pill); }
  .nx-ticket.luce .tipo { background: rgba(226,145,42,.12); color: var(--accent-deep); }
  .nx-ticket.gas .tipo { background: rgba(200,67,31,.1); color: var(--primary); }
  .nx-ticket .code { font-size: 11px; color: var(--muted-2); letter-spacing: .03em; font-weight: 600; }
  .nx-ticket h3 { font-size: 21px; margin: 2px 0 0; }
  .nx-ticket .price { font-family: var(--font-display); font-size: 32px; color: var(--primary-700); line-height: 1; }
  .nx-ticket .price small { font-size: 14px; color: var(--muted); font-weight: 600; font-family: var(--font-body); }
  .nx-ticket .annuo { font-size: 13px; color: var(--muted); }
  .nx-ticket .go { margin-top: 4px; font-weight: 700; font-size: 14px; color: var(--primary); display: inline-flex; align-items: center; gap: 8px; }
  .nx-ticket .go svg { width: 15px; height: 15px; transition: transform .3s var(--ease); }
  .nx-ticket:hover .go svg { transform: translateX(4px); }

  /* CALCOLATORE band */
  .nx-calc-sec { padding: 0 0 120px; }
  .nx-calc { position: relative; overflow: hidden; background: var(--grad-primary); color: #fff; border-radius: var(--r-lg); padding: 64px; }
  .nx-calc::before { content: ''; position: absolute; inset: 0; background: radial-gradient(circle at 85% 110%, rgba(226,145,42,.3), transparent 55%); pointer-events: none; }
  .nx-calc > * { position: relative; z-index: 2; }
  .nx-calc-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 56px; align-items: center; }
  .nx-calc h2 { color: #fff; font-size: clamp(28px, 3.4vw, 42px); }
  .nx-calc h2 em { font-style: italic; color: var(--accent-hi); }
  .nx-calc p { color: rgba(255,255,255,.78); margin-top: 14px; font-size: 16px; line-height: 1.7; max-width: 460px; }
  .nx-calc label { display: block; font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--primary-200); margin-bottom: 10px; }
  .nx-calc .row { display: flex; gap: 12px; }
  .nx-calc input { flex: 1; background: rgba(25,14,9,.5); border: 1px solid rgba(255,255,255,.18); border-radius: var(--r-sm); padding: 16px 18px; color: #fff; font-family: var(--font-body); font-size: 16px; font-weight: 600; outline: none; }
  .nx-calc input:focus { border-color: var(--accent-hi); }
  .nx-calc button { background: var(--grad-accent); color: #fff; border: none; border-radius: var(--r-sm); padding: 16px 26px; font-family: var(--font-body); font-weight: 700; font-size: 15px; cursor: pointer; transition: all .25s var(--ease); }
  .nx-calc button:hover { filter: brightness(1.06); transform: translateY(-1px); }
  .nx-calc .out { margin-top: 22px; display: none; align-items: baseline; gap: 12px; }
  .nx-calc .out .v { font-family: var(--font-display); font-style: italic; font-size: 52px; color: var(--accent-hi); line-height: 1; }
  .nx-calc .out .t { font-size: 14px; color: rgba(255,255,255,.7); }

  /* FEATURE split editoriale */
  .nx-feature-row { display: grid; grid-template-columns: 1fr 1fr; min-height: 540px; border-top: 1px solid var(--line); }
  .nx-feature-row .media { position: relative; overflow: hidden; min-height: 360px; }
  .nx-feature-row .media img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; }
  .nx-feature-row .body { padding: 84px; display: flex; flex-direction: column; justify-content: center; }
  .nx-feature-row.dark .body { background: var(--ink); color: #fff; }
  .nx-feature-row.dark .body h2 { color: #fff; }
  .nx-feature-row.dark .body p { color: rgba(255,255,255,.78); }
  .nx-feature-row .body h2 { font-size: clamp(28px, 3.2vw, 40px); margin: 18px 0 0; }
  .nx-feature-row .body h2 em { font-style: italic; color: var(--primary); }
  .nx-feature-row.dark .body h2 em { color: var(--accent-hi); }
  .nx-feature-row .body p { color: var(--muted); margin: 22px 0 0; font-size: 16px; line-height: 1.72; max-width: 460px; }
  .nx-feature-row .body ul { list-style: none; margin: 26px 0 0; padding: 0; display: flex; flex-direction: column; gap: 12px; }
  .nx-feature-row .body li { display: flex; gap: 12px; align-items: flex-start; font-size: 15px; }
  .nx-feature-row .body li b { color: var(--accent-deep); }
  .nx-feature-row.dark .body li b { color: var(--accent-hi); }

  /* PULL QUOTE */
  .nx-quote { padding: 130px 0; text-align: center; }
  .nx-quote .mark { font-family: var(--font-display); font-style: italic; font-size: 110px; color: var(--accent); line-height: .35; }
  .nx-quote blockquote { font-family: var(--font-display); font-style: italic; font-weight: 500; font-size: clamp(26px, 3.4vw, 42px); line-height: 1.4; color: var(--ink); max-width: 900px; margin: 28px auto; letter-spacing: -.01em; }
  .nx-quote .by { font-size: 13px; letter-spacing: .14em; text-transform: uppercase; color: var(--muted); font-weight: 700; }

  /* CTA */
  .nx-cta { padding: 0 0 130px; }
  .nx-cta-inner { position: relative; overflow: hidden; background: var(--grad-accent); border-radius: var(--r-lg); padding: 84px 60px; text-align: center; color: #fff; box-shadow: var(--shadow-glow); }
  .nx-cta-inner::before { content: ''; position: absolute; inset: 0; background: radial-gradient(circle at 15% 20%, rgba(255,255,255,.22), transparent 40%); pointer-events: none; }
  .nx-cta-inner > * { position: relative; z-index: 2; }
  .nx-cta-inner h2 { color: #fff; font-size: clamp(34px, 4.6vw, 56px); }
  .nx-cta-inner h2 em { font-style: italic; }
  .nx-cta-inner p { color: rgba(255,255,255,.92); font-size: 18px; margin: 18px auto 34px; max-width: 560px; }
  .nx-btn-light { background: #fff; color: var(--primary-700); padding: 16px 34px; border-radius: var(--r-pill); font-weight: 700; font-size: 15px; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 16px 40px rgba(92,29,14,.25); transition: all .3s var(--ease); }
  .nx-btn-light:hover { transform: translateY(-2px); }

  @media (max-width: 980px) {
    .nx-hero-grid { grid-template-columns: 1fr; gap: 48px; }
    .nx-hero-media { max-width: 460px; margin: 0 auto; width: 100%; }
    .nx-amp { display: none; }
    .nx-manifesto .cols { grid-template-columns: 1fr; gap: 28px; }
    .nx-offer-grid { grid-template-columns: 1fr; }
    .nx-calc-grid { grid-template-columns: 1fr; gap: 32px; }
    .nx-calc { padding: 44px 28px; }
    .nx-feature-row { grid-template-columns: 1fr; }
    .nx-feature-row .body { padding: 56px 28px; }
    .nx-feature-row.reverse .media { order: -1; }
  }
  @media (max-width: 560px) {
    .nx-mini { flex-wrap: wrap; gap: 28px; }
    .nx-hero-media .badge { left: 12px; }
    .nx-step { grid-template-columns: 64px 1fr; gap: 18px; }
    .nx-step .idx { font-size: 40px; }
  }
</style>
CSS;
include __DIR__ . '/header.php';
?>

<div class="nx-home">

  <!-- ===== HERO editoriale ===== -->
  <section class="nx-hero">
    <div class="nx-wrap">
      <div class="nx-amp">&amp;</div>
      <div class="nx-hero-grid">
        <div class="reveal">
          <span class="nx-kicker">Luce &amp; Gas · Mercato Libero</span>
          <h1>Energia che <em>capisce</em> come vivi.</h1>
          <p class="lede">Locura analizza i tuoi consumi reali e ti propone tariffe luce e gas indicizzate, trasparenti e calibrate sul tuo profilo. Niente sorprese, solo risparmio misurabile.</p>
          <div class="nx-hero-actions">
            <a href="tariffe.php" class="btn-primary">Scopri le offerte
              <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="contatti.php" class="nx-link">Parla con un energy specialist
              <svg viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
          <div class="nx-mini">
            <div><div class="n">100<em>%</em></div><div class="l">Fonti rinnovabili tracciate</div></div>
            <div><div class="n">12.000<em>+</em></div><div class="l">Punti di prelievo gestiti</div></div>
            <div><div class="n"><em>&minus;</em>22%</div><div class="l">Contrazione media dei costi</div></div>
          </div>
        </div>
        <div class="nx-hero-media reveal">
          <div class="frame">
            <span class="tag">Casa &amp; Impresa</span>
            <img src="split_home.jpg" alt="Casa efficiente con ricarica elettrica">
          </div>
          <div class="badge">
            <div class="big">24h</div>
            <div class="small">Ricontatto<br>di un consulente</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== MARQUEE ===== -->
  <div class="nx-marquee" aria-hidden="true">
    <div class="track">
      <span>Luce rinnovabile</span><span class="st">✳</span><span>Gas trasparente</span><span class="st">✳</span><span>Spread bloccato</span><span class="st">✳</span><span>Audit gratuito</span><span class="st">✳</span><span>Zero costi nascosti</span><span class="st">✳</span>
      <span>Luce rinnovabile</span><span class="st">✳</span><span>Gas trasparente</span><span class="st">✳</span><span>Spread bloccato</span><span class="st">✳</span><span>Audit gratuito</span><span class="st">✳</span><span>Zero costi nascosti</span><span class="st">✳</span>
    </div>
  </div>

  <!-- ===== MANIFESTO ===== -->
  <section class="nx-manifesto">
    <div class="nx-wrap reveal">
      <span class="nx-kicker">Il nostro approccio</span>
      <p class="lead">Non vendiamo contratti: <em>progettiamo forniture</em>. Leggiamo le tue bollette, mappiamo le fasce di consumo e agganciamo i prezzi agli indici reali di mercato — <em>PUN</em> per la luce, <em>PSV</em> per il gas — con uno spread chiaro e bloccato.</p>
      <div class="cols">
        <div><h4>Trasparenza</h4><p>Ogni componente in bolletta è dichiarata. Lo spread resta fisso per i primi 12 mesi, senza rincari arbitrari.</p></div>
        <div><h4>Su misura</h4><p>Analisi del profilo di prelievo e proposta calibrata: paghi per come consumi davvero, non per una media astratta.</p></div>
        <div><h4>Sostenibilità</h4><p>Energia coperta da garanzie d'origine rinnovabile e gas con percorso di compensazione delle emissioni.</p></div>
      </div>
    </div>
  </section>

  <!-- ===== REEL ===== -->
  <div class="nx-reel">
    <video autoplay loop muted playsinline>
      <source src="hero_energy.mp4" type="video/mp4">
    </video>
    <div class="ov">
      <div class="nx-wrap">
        <h2 class="reveal">La transizione è un percorso <em>operativo</em>, non uno slogan.</h2>
      </div>
    </div>
  </div>

  <!-- ===== STEPS ===== -->
  <section class="nx-steps">
    <div class="nx-wrap">
      <div class="reveal" style="margin-bottom:48px;">
        <span class="nx-kicker">Come funziona</span>
        <h2 class="section-title" style="text-align:left; margin:18px 0 0;">Dalla bolletta all'<em style="font-style:italic;color:var(--primary);">attivazione</em>, in quattro mosse.</h2>
      </div>
      <div class="nx-step reveal"><div class="idx">01</div><div><h3>Diagnosi dei consumi</h3><p>Condividi una bolletta recente: i nostri analisti mappano la tua curva di carico e individuano le inefficienze tariffarie.</p></div></div>
      <div class="nx-step reveal"><div class="idx">02</div><div><h3>Ingegnerizzazione</h3><p>Elaboriamo una proposta parametrata sulle reali fasce di prelievo, per una riduzione concreta della spesa energetica.</p></div></div>
      <div class="nx-step reveal"><div class="idx">03</div><div><h3>Gestione amministrativa</h3><p>Curiamo noi tutte le pratiche di recesso dal precedente fornitore: nessun onere operativo a tuo carico.</p></div></div>
      <div class="nx-step reveal"><div class="idx">04</div><div><h3>Attivazione &amp; reporting</h3><p>Avvio della fornitura verde con accesso all'area riservata e monitoraggio delle metriche di sostenibilità.</p></div></div>
    </div>
  </section>

  <!-- ===== OFFERTE anteprima ===== -->
  <section class="nx-offers">
    <div class="nx-wrap">
      <div class="head reveal">
        <div>
          <span class="nx-kicker">Offerte in evidenza</span>
          <h2 class="section-title" style="text-align:left; margin:18px 0 0;">Tariffe chiare, <em style="font-style:italic;color:var(--primary);">indicizzate</em>.</h2>
        </div>
        <p class="partner">Offerte commercializzate in qualità di partner di <strong><?= $op ?></strong>.</p>
      </div>
      <div class="nx-offer-grid">
<?php foreach ($homeOfferte as $o):
        $isLuce = $o['tipo'] === 'Luce';
        $href = 'contatti.php?offerta=' . rawurlencode($o['code']) . '#contatto-form';
?>
        <a class="nx-ticket <?= $isLuce ? 'luce' : 'gas' ?> reveal" href="<?= $href ?>">
<?php if ($opLogo !== '') { ?>
          <div class="nx-ticket-brand"><img src="<?= e($opLogo) ?>" alt="<?= e($op) ?>" loading="lazy"></div>
<?php } ?>
          <div class="row">
            <span class="tipo"><?= $o['tipo'] ?> · Domestico</span>
            <span class="code"><?= $o['code'] ?></span>
          </div>
          <h3><?= $o['nome'] ?></h3>
          <div class="price"><?= $o['prezzo'] ?> <small><?= $o['unita'] ?></small></div>
          <div class="annuo">Corrispettivo annuo: <?= $o['annuo'] ?> · spread bloccato 12 mesi</div>
          <span class="go">Richiedi attivazione
            <svg viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </span>
        </a>
<?php endforeach; ?>
      </div>
      <div class="reveal" style="margin-top:36px;">
        <a href="tariffe.php" class="nx-link">Vedi tutte le offerte e le condizioni tecnico economiche
          <svg viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </div>
  </section>

  <!-- ===== CALCOLATORE ===== -->
  <section class="nx-calc-sec">
    <div class="nx-wrap">
      <div class="nx-calc reveal">
        <div class="nx-calc-grid">
          <div>
            <span class="nx-kicker" style="color:var(--accent-hi);">Stima rapida</span>
            <h2>Quanto puoi <em>risparmiare</em>?</h2>
            <p>Inserisci la tua spesa media mensile per luce e gas: ti mostriamo una stima indicativa del risparmio annuo ottenibile con una fornitura ottimizzata.</p>
          </div>
          <div>
            <label for="nx-bill">Spesa media mensile (€)</label>
            <div class="row">
              <input type="number" id="nx-bill" placeholder="Es. 150" min="20" max="3000">
              <button type="button" id="nx-calc-btn">Calcola</button>
            </div>
            <div class="out" id="nx-calc-out">
              <span class="v" id="nx-calc-val">€0</span>
              <span class="t">stima di risparmio / anno</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== FEATURE split ===== -->
  <section>
    <div class="nx-feature-row reverse reveal">
      <div class="body">
        <span class="nx-kicker">Diagnostica avanzata</span>
        <h2>Audit energetico <em>digitale</em>.</h2>
        <p>Con algoritmi proprietari analizziamo i dati di prelievo per individuare sfasamenti di potenza, picchi anomali e inefficienze operative — e trasformarli in azioni di risparmio.</p>
        <ul>
          <li><span style="color:var(--primary);font-weight:800;">✓</span> Monitoraggio del carico orario e delle curve di prelievo</li>
          <li><span style="color:var(--primary);font-weight:800;">✓</span> Rilevamento e rifasamento delle perdite di energia reattiva</li>
          <li><span style="color:var(--primary);font-weight:800;">✓</span> Reporting mensile con <b>indicatori KPI energetici</b></li>
        </ul>
        <div style="margin-top:30px;"><a href="contatti.php" class="btn-primary">Richiedi un audit gratuito
          <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a></div>
      </div>
      <div class="media"><img src="feature_consulenza.jpg" alt="Dashboard di monitoraggio energetico"></div>
    </div>
    <div class="nx-feature-row dark reveal">
      <div class="media"><img src="chi_siamo_team.jpg" alt="Team al lavoro"></div>
      <div class="body">
        <span class="nx-kicker" style="color:var(--accent-hi);">Il team</span>
        <h2>Persone al servizio dell'<em>innovazione</em>.</h2>
        <p>Tecnici, programmatori ed esperti ambientali con una sola missione: rendere l'energia pulita comprensibile, conveniente e accessibile. Semplifichiamo la burocrazia del mercato libero, tu pensi al resto.</p>
        <div style="margin-top:30px;"><a href="chi-siamo.php" class="nx-link" style="color:#fff;">Scopri la nostra storia
          <svg viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a></div>
      </div>
    </div>
  </section>

  <!-- ===== PULL QUOTE ===== -->
  <section class="nx-quote">
    <div class="nx-wrap reveal">
      <div class="mark">&ldquo;</div>
      <blockquote>Il progresso ecologico ha valore solo se genera un beneficio reale per chi sceglie di sostenerlo, ogni giorno.</blockquote>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="nx-cta">
    <div class="nx-wrap">
      <div class="nx-cta-inner reveal">
        <h2>Pronto a ridurre i consumi e <em>far bene</em> all'ambiente?</h2>
        <p>Richiedi un'analisi energetica gratuita e senza impegno. Un nostro esperto ti ricontatterà al più presto.</p>
        <a href="contatti.php" class="nx-btn-light">Inizia ora
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </div>
  </section>

</div>

<?php
$pageScripts = <<<'HTML'
  <script>
    // Reveal on scroll
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: .14 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));

    // Stima risparmio
    const btn = document.getElementById('nx-calc-btn');
    if (btn) {
      btn.addEventListener('click', () => {
        const v = parseFloat(document.getElementById('nx-bill').value);
        const out = document.getElementById('nx-calc-out');
        const val = document.getElementById('nx-calc-val');
        if (isNaN(v) || v <= 0) { alert('Inserisci un importo valido.'); return; }
        const saving = Math.round(v * 12 * 0.22);
        val.textContent = '€' + saving.toLocaleString('it-IT');
        out.style.display = 'flex';
      });
    }
  </script>
HTML;
include __DIR__ . '/footer.php';
?>
