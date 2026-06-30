<?php
require __DIR__ . '/_config.php';
$_brand = $LANDING_PAGE['nome_portale'] !== '' ? $LANDING_PAGE['nome_portale']
    : ($COMPANY['company_name'] !== '' ? $COMPANY['company_name'] : 'Again');
$pageDescription = $_brand . ' è il partner ufficiale ' . $OPERATORE['nome_marketing'] . '. Risparmia sulla bolletta con offerte chiare, prezzi indicizzati e consulenza gratuita.';
include __DIR__ . '/header.php';
?>

  <!-- HERO — foto elettrodotti al tramonto -->
  <section class="hero">
    <div class="hero-bg" style="background-image: url('https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?auto=format&fit=crop&w=1600&q=80');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <div class="hero-eyebrow">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--primary-light)"><path d="M13 2L4.09 12.11A1 1 0 005 14h7l-1 8 8.91-10.11A1 1 0 0019 10h-7l1-8z"/></svg>
        Partner ufficiale <?= $OPERATORE['nome_marketing'] ?>
      </div>
      <h1>L'energia diventa <span class="hl">semplice</span>,<br>il risparmio diventa <span class="hl">reale</span></h1>
      <p class="hero-sub">Soluzioni luce e gas su misura per la tua casa. Insieme a <?= $OPERATORE['nome_marketing'] ?>, ti offriamo tariffe trasparenti, assistenza umana e tutta la chiarezza che meriti.</p>
      <div class="hero-actions">
        <a href="tariffe.php" class="btn-primary">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M13 2L4.09 12.11A1 1 0 005 14h7l-1 8 8.91-10.11A1 1 0 0019 10h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
          Vedi le offerte
        </a>
        <a href="contatti.php" class="btn-outline">Parla con un consulente</a>
      </div>
    </div>
    <div class="hero-scroll">
      <div class="scroll-dot"></div>
      Scorri
    </div>
  </section>

  <!-- TRUST BAR -->
  <div class="trust-bar">
    <div class="trust-bar-inner">
      <div class="trust-item"><div class="ico">🔒</div> Contratti certificati ARERA</div>
      <div class="trust-item"><div class="ico">⚡</div> Fornitore <?= $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'] ?></div>
      <div class="trust-item"><div class="ico">📞</div> Assistenza multicanale</div>
      <div class="trust-item"><div class="ico">🌿</div> Nessuna interruzione fornitura</div>
      <!-- Duplicati per loop infinito -->
      <div class="trust-item"><div class="ico">🔒</div> Contratti certificati ARERA</div>
      <div class="trust-item"><div class="ico">⚡</div> Fornitore <?= $OPERATORE['nome_legale'] !== '' ? $OPERATORE['nome_legale'] : $OPERATORE['nome_marketing'] ?></div>
      <div class="trust-item"><div class="ico">📞</div> Assistenza multicanale</div>
      <div class="trust-item"><div class="ico">🌿</div> Nessuna interruzione fornitura</div>
    </div>
  </div>

  <!-- COSA OFFRIAMO -->
  <section class="section">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> I nostri servizi</span>
        <h2 class="section-title">Tutto quello che ti serve<br>per <span class="hl">cambiare fornitore</span></h2>
        <p class="section-sub">Siamo il volto umano dell'energia. Come partner ufficiale <?= $OPERATORE['nome_marketing'] ?>, ti guidiamo nella scelta della tariffa migliore, gestiamo ogni pratica e restiamo al tuo fianco, sempre.</p>
      </div>
      <div class="feature-grid">
        <div class="feat-card">
          <div class="ico">⚡</div>
          <h4>Offerte Luce</h4>
          <p>Tariffe variabili indicizzate al PUN. Scegli tra la linea FAMILY per la flessibilità o la linea SICURA per spread ridotti e assistenza casa.</p>
        </div>
        <div class="feat-card">
          <div class="ico">🔥</div>
          <h4>Offerte Gas</h4>
          <p>Forniture gas ancorate al PSV. Soluzioni per casa, lavoro e imprese con attivazione rapida e nessun intervento tecnico.</p>
        </div>
        <div class="feat-card">
          <div class="ico">🤝</div>
          <h4>Consulenza Gratuita</h4>
          <p>Analizziamo la tua bolletta attuale e ti proponiamo la soluzione più conveniente in base ai tuoi consumi reali.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SPLIT — foto living room -->
  <section class="section" style="background: var(--bg-soft); padding-top: var(--section); padding-bottom: var(--section);">
    <div class="container">
      <div class="split">
        <div class="split-img">
          <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80" alt="Casa confortevole con energia <?= $OPERATORE['nome_marketing'] ?>" loading="lazy">
          <div class="badge">
            <div class="label">Offerta Luce Casa</div>
            <div class="val">PUN +€0,05 <span class="unit">€/kWh</span></div>
          </div>
        </div>
        <div>
          <span class="eyebrow"><span class="dot"></span> Perché sceglierci</span>
          <h2 class="section-title">Risparmio reale,<br><span class="hl">assistenza vera</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 20px;">In <?= $brandName ?> non vendiamo solo contratti, costruiamo relazioni. Analizziamo i tuoi consumi reali per offrirti solo quello di cui hai bisogno, senza costi nascosti o clausole complicate.</p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 36px;">Con le nostre linee FAMILY e SICURA, hai la certezza di un prezzo indicizzato al mercato e la tranquillità di un'assistenza casa sempre inclusa.</p>
          <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:36px;">
            <div style="padding:18px; background:#fff; border-radius:14px; border-left:3px solid var(--primary); box-shadow:var(--shadow-sm);">
              <div style="font-family:var(--font-display); font-weight:700; color:var(--ink); margin-bottom:6px; font-size:15px;">Prezzi Trasparenti</div>
              <div style="font-size:13px; color:var(--muted);">Spread fissi e chiari, nessuna componente nascosta.</div>
            </div>
            <div style="padding:18px; background:#fff; border-radius:14px; border-left:3px solid var(--coral); box-shadow:var(--shadow-sm);">
              <div style="font-family:var(--font-display); font-weight:700; color:var(--ink); margin-bottom:6px; font-size:15px;">Zero Burocrazia</div>
              <div style="font-size:13px; color:var(--muted);">Gestiamo noi il passaggio dal tuo attuale fornitore.</div>
            </div>
            <div style="padding:18px; background:#fff; border-radius:14px; border-left:3px solid var(--primary); box-shadow:var(--shadow-sm);">
              <div style="font-family:var(--font-display); font-weight:700; color:var(--ink); margin-bottom:6px; font-size:15px;">Attivazione Rapida</div>
              <div style="font-size:13px; color:var(--muted);">Il contratto si attiva in pochi giorni lavorativi.</div>
            </div>
            <div style="padding:18px; background:#fff; border-radius:14px; border-left:3px solid var(--coral); box-shadow:var(--shadow-sm);">
              <div style="font-family:var(--font-display); font-weight:700; color:var(--ink); margin-bottom:6px; font-size:15px;">Supporto Dedicato</div>
              <div style="font-size:13px; color:var(--muted);">Un consulente sempre disponibile per ogni dubbio.</div>
            </div>
          </div>
          <a href="tariffe.php" class="btn-primary">Scopri le offerte</a>
        </div>
      </div>
    </div>
  </section>

  <!-- COME FUNZIONA — dark section con timeline -->
  <section class="dark-section" style="padding: var(--section) 0;">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Processo semplice</span>
        <h2 class="section-title" style="color:#fff;">Attivare è semplice:<br><span style="color:var(--primary-light);">4 passi e sei dentro</span></h2>
        <p class="section-sub" style="margin:0 auto 64px;">Cambiare fornitore non richiede tecnici e non interrompe la fornitura. Risparmia subito con la gestione digitale e lo sconto in bolletta per SDD e Email.</p>
      </div>
      <div class="timeline">
        <div class="tl-step">
          <div class="tl-num">1</div>
          <h4>Scegli l'offerta</h4>
          <p>Luce o gas, per casa o lavoro: trovi l'offerta giusta tra le nostre linee FAMILY e SICURA.</p>
        </div>
        <div class="tl-step">
          <div class="tl-num">2</div>
          <h4>Contattaci</h4>
          <p>Il nostro consulente ti guida passo dopo passo nella compilazione del contratto <?= $OPERATORE['nome_marketing'] ?>.</p>
        </div>
        <div class="tl-step">
          <div class="tl-num">3</div>
          <h4>Carica la bolletta</h4>
          <p>Pensiamo noi a tutta la documentazione e al coordinamento con il distributore locale.</p>
        </div>
        <div class="tl-step">
          <div class="tl-num">4</div>
          <h4>Fornitura attiva</h4>
          <p>Nessuna interruzione, nessun tecnico a casa. La nuova tariffa parte in automatico.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- STATS -->
  <div class="stat-strip">
    <div class="stat-grid">
      <div class="stat-item"><div class="n">5.000+</div><div class="l">Contratti attivati</div></div>
      <div class="stat-item"><div class="n">24h</div><div class="l">Risposta garantita</div></div>
      <div class="stat-item"><div class="n">8</div><div class="l">Offerte disponibili</div></div>
      <div class="stat-item"><div class="n">€0</div><div class="l">Costo consulenza</div></div>
    </div>
  </div>

  <!-- SPLIT — foto consulente/ufficio (reverse) -->
  <section class="section">
    <div class="container">
      <div class="split reverse">
        <div>
          <span class="eyebrow"><span class="dot"></span> Il nostro team</span>
          <h2 class="section-title">Consulenti<br><span class="hl">sempre al tuo fianco</span></h2>
          <div class="divider-line"></div>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 20px;">Non sparisci dopo la firma. Il nostro team rimane a disposizione anche dopo l'attivazione, per qualsiasi dubbio sulla bolletta o sul contratto.</p>
          <p style="font-size:17px; color:var(--muted); line-height:1.75; margin: 0 0 36px;">Raggiungiamo i nostri clienti per telefono, email e WhatsApp: scegli tu il canale più comodo.</p>
          <a href="chi-siamo.php" class="btn-primary" style="margin-right:16px;">Chi siamo</a>
          <a href="contatti.php" style="font-family:var(--font-display); font-weight:700; color:var(--primary); text-decoration:none; font-size:16px;">Contattaci →</a>
        </div>
        <div class="split-img">
          <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=800&q=80" alt="Team <?= $brandName ?> consulenti energetici" loading="lazy">
        </div>
      </div>
    </div>
  </section>

  <!-- RECENSIONI -->
  <section class="section" style="background:var(--bg-soft);">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow"><span class="dot"></span> Cosa dicono i clienti</span>
        <h2 class="section-title">La loro soddisfazione<br>è la nostra <span class="ul">presentazione</span></h2>
      </div>
      <div class="reviews-grid">
        <div class="review-card featured-review">
          <div class="review-stars">★★★★★</div>
          <p class="review-quote" style="font-size:17px; font-style:italic;">"Ho cambiato fornitore in meno di una settimana. Il consulente mi ha seguito dall'inizio alla fine. Prima bolletta: risparmiato il 15% rispetto a prima."</p>
          <div class="review-name">Simone B. — Roma</div>
        </div>
        <div class="review-card">
          <div class="review-stars">★★★★★</div>
          <p class="review-quote">"Finalmente qualcuno che mi ha spiegato cosa significa PUN e spread. Adesso so esattamente cosa pago e perché."</p>
          <div class="review-name">Laura M. — Milano</div>
        </div>
        <div class="review-card">
          <div class="review-stars">★★★★★</div>
          <p class="review-quote">"Zero problemi con il passaggio, nessun giorno senza corrente. Assistenza impeccabile, rispondono subito su WhatsApp."</p>
          <div class="review-name">Roberto T. — Napoli</div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA FINALE — foto pannelli solari -->
  <section class="photo-section" style="padding: var(--section) 0;">
    <div class="photo-bg" style="background-image: url('https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=1600&q=80');"></div>
    <div class="photo-overlay"></div>
    <div class="container" style="text-align:center;">
      <span class="eyebrow" style="color:var(--primary-light); justify-content:center; margin-bottom:20px;"><span class="dot" style="background:var(--primary-light);"></span> Inizia oggi</span>
      <h2 style="font-family:var(--font-display); font-size:clamp(36px,5vw,58px); font-weight:800; color:#fff; margin:0 0 20px; line-height:1.1;">Pronto a risparmiare<br>sulla bolletta?</h2>
      <p style="font-size:19px; color:rgba(255,255,255,.8); max-width:600px; margin:0 auto 40px; line-height:1.6;">Richiedi una consulenza senza impegno. Analizzeremo la tua ultima bolletta per mostrarti quanto puoi risparmiare con le nostre soluzioni.</p>
      <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
        <a href="tariffe.php" class="btn-primary" style="font-size:17px; padding:16px 44px;">Vedi tutte le offerte</a>
        <a href="contatti.php" class="btn-outline" style="font-size:17px; padding:16px 44px;">Contattaci ora</a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
