<?php 

require __DIR__ . '/_config.php';
$pageTitle = 'Contatti';
$pageDescription = 'Mettiti in contatto con Locura per ricevere una consulenza energetica personalizzata. Inizia subito ad abbattere i consumi.';
include __DIR__ . '/header.php';
?>

<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Offerte Luce e Gas — <?=  $COMPANY['nome_commericale'] ??  $COMPANY['company_name']  ?> · <?=$OPERATORE["nome_legale"] ?></title>
  <meta name="description" content="Tutte le offerte <?=  $OPERATORE['nome_marketing'] ?> disponibili tramite <?=  $COMPANY['nome_commericale'] ??  $COMPANY['company_name']  ?> . Tariffe luce e gas per uso domestico e professionale con prezzi indicizzati al mercato.">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- PAGE HERO — foto parco eolico -->
  <section class="page-hero">
    <div class="photo-bg" style="background-image: url('https://images.unsplash.com/photo-1466611653911-95081537e5b7?auto=format&fit=crop&w=1600&q=80');"></div>
    <div class="photo-overlay"></div>
    <div class="inner">
      <span class="eyebrow" style="color:var(--primary-light); display: inline-flex; align-items: center; gap: 10px;">
        <span class="dot" style="background:var(--primary-light);"></span> Partner
        <img src="<?=  $OPERATORE['logo_url'] ?> " alt="<?=  $OPERATORE['nome_marketing'] ?>" style="height: 38px; background: white; padding: 4px 8px; border-radius: 6px; object-fit: contain;">
      </span>
      <h1>Trova la tariffa <span class="hl">giusta per te</span></h1>
      <p>Prezzo variabile trasparente, agganciato agli indici di mercato (PUN Index GME per la luce, PSV per il gas), con fee chiara e corrispettivo annuo fisso. Offerte valide fino al 10/07/2026.</p>
    </div>
  </section>

  <!-- OFFERS -->
  <section class="section">
    <div class="container">

      <div class="tab-bar" id="tab-bar">
        <button class="tab-btn active" data-filter="all">Tutte le offerte</button>
        <button class="tab-btn" data-filter="luce-res">⚡ Luce Casa</button>
        <button class="tab-btn" data-filter="gas-res">🔥 Gas Casa</button>
        <button class="tab-btn" data-filter="luce-biz">⚡ Luce Business</button>
        <button class="tab-btn" data-filter="gas-biz">🔥 Gas Business</button>
      </div>

      <div class="offers-grid" id="offers-grid"></div>

      <p style="font-size:13px; color:var(--muted-2); text-align:left; max-width:1100px; margin:56px auto 0; line-height:1.7;">
        * Offerte a prezzo variabile aggiornato mensilmente, valide fino al 10/07/2026. Corrispettivi definiti da <?= $OPERATORE['nome_marketing'] ?>.
        <strong>Energia elettrica:</strong> Prezzo Luce = PUN Index GME × (1+λ) + Fee, dove λ è il valore delle perdite di rete (10% per le forniture in bassa tensione, come stabilito da ARERA) e la Fee è quella indicata nella tabella corrispettivi. Si applica inoltre il corrispettivo di dispacciamento CDISPD definito da ARERA nel Testo Integrato della Vendita (TIV). Il PUN Index GME è l'indice di cui all'art. 13.3.9 del TIDE, calcolato dal GME come media aritmetica mensile delle quotazioni orarie nel mese di fatturazione in base alle fasce applicate al cliente; in caso di misuratore non telegestito si applica la fee monoraria a tutte le ore. Il valore massimo dell'indice negli ultimi 12 mesi è stato 0,14340 €/kWh (Marzo 2026); tutti i valori sono su www.mercatoelettrico.org.
        <strong>Gas naturale:</strong> Prezzo Gas = PSV + Fee, dove il PSV è determinato dalla media aritmetica mensile dei prezzi giornalieri "PSV Price Assessment - Day Ahead" pubblicati nell'"European Gas Spot Market Report" da ICIS Heren (con riferimento "PSV Price Assessment - Weekend" per weekend e Bank Holiday), convertito da €/MWh a €/Smc con coefficiente moltiplicativo pari a 0,0107. Il valore massimo dell'indice PSV negli ultimi 12 mesi è stato 0,5577 €/Smc (PCS 0,038520 GJ/Smc, Marzo 2026). I corrispettivi sul consumo sono riferiti a un PCS pari a 0,03852 GJ/Smc e a un coefficiente di conversione C pari a 1 (art. 6 RTDG) e sono suscettibili di adeguamento in proporzione ai valori di PCS approvati da ARERA per l'ambito tariffario del punto di riconsegna.
        Fasce orarie — F1: lun-ven 8:00-19:00; F2: lun-ven 7:00-8:00 e 19:00-23:00, sab 7:00-23:00; F3: lun-sab 0:00-7:00 e 23:00-24:00, domenica e festivi tutto il giorno.
      </p>
    </div>
  </section>

  <!-- GLOSSARIO — dark section -->
  <section class="dark-section" style="padding: var(--section) 0;">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow" style="color:var(--primary-light); justify-content:center;"><span class="dot" style="background:var(--primary-light);"></span> Capire il prezzo</span>
        <h2 class="section-title" style="color:#fff; text-align:center;">Perché scegliere<br><span style="color:var(--primary-light);"> <?=$OPERATORE["nome_legale"] ?></span></h2>
        <p class="section-sub" style="margin:0 auto 56px; text-align:center;">Prezzi trasparenti indicizzati al mercato all'ingrosso. Il risparmio è garantito dalla gestione digitale e dalla chiarezza contrattuale.</p>
      </div>
      <div class="glossary-grid">
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2L4.09 12.11A1 1 0 005 14h7l-1 8 8.91-10.11A1 1 0 0019 10h-7l1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PUN (Luce)</h4>
          <p>Prezzo Unico Nazionale: il costo dell'energia elettrica sul mercato all'ingrosso, aggiornato mensilmente.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2s-5 6-5 11a5 5 0 1010 0c0-2-1-3.5-2-5 0 1.5-1 2-2 2 0-2 1-4-1-8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h4>PSV (Gas)</h4>
          <p>Punto di Scambio Virtuale: il prezzo di riferimento del gas naturale sul mercato italiano.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2"/><path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
          <h4>Risparmio Digitale</h4>
          <p>Fino a 24€ di sconto annuo attivando la domiciliazione bancaria e la bolletta via email.</p>
        </div>
        <div class="glossary-card">
          <div class="ico"><svg viewBox="0 0 24 24" fill="none"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h4>Linea SICURA</h4>
          <p>Spread più bassi e assistenza casa Logicard (Europ Assistance) inclusa nel contratto.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section" style="text-align:center;">
    <div class="container">
      <h2 class="section-title" style="margin-bottom:16px;">Scegli la trasparenza</h2>
      <p style="font-size:18px; color:var(--muted); max-width:560px; margin:0 auto 36px; line-height:1.7;">Nessun vincolo di durata e nessun costo di recesso. Passa a <?=$OPERATORE["nome_marketing"] ?> con <?=  $COMPANY['nome_commericale'] ??  $COMPANY['company_name']  ?> .</p>
      <a href="tariffe.php" class="btn-primary" style="font-size:17px; padding:16px 44px;">Scopri tariffe</a>
    </div>
  </section>
  <script>
    const fornitore = '<?= $OPERATORE['nome_marketing'] ?>';
    const offers = [
  { id:'smart-flex-luce', cat:'luce-res', ribbon:'luce-res', tag:'⚡ Luce Casa', top:true,
    nome:fornitore + ' Smart Flex', tipo:'Uso Domestico · Indicizzato PUN',
    rid:'180 €/POD/anno', consumo:'PUN Index GME + 0,079 €/kWh',
    note:'Prezzo variabile indicizzato al PUN Index GME con fee chiara e corrispettivo annuo fisso. Offerta valida fino al 10/07/2026.',
    feats:['Prezzo variabile indicizzato al PUN Index GME','Fee monoraria F0: 0,079 €/kWh · bioraria F1 e F2+F3: 0,079 €/kWh','Corrispettivo annuo 180 €/POD','Offerta valida fino al 10/07/2026'] },
  { id:'smart-flex-gas', cat:'gas-res', ribbon:'gas-res', tag:'🔥 Gas Casa', top:false,
    nome:fornitore + ' Smart Flex Gas', tipo:'Uso Domestico · Indicizzato PSV',
    rid:'144 €/PDR/anno', consumo:'PSV + 0,34 €/Smc',
    note:'Prezzo variabile indicizzato al PSV con fee chiara e corrispettivo annuo fisso. Offerta valida fino al 10/07/2026.',
    feats:['Prezzo variabile indicizzato al PSV','Fee sul consumo: 0,34 €/Smc','Corrispettivo annuo 144 €/PDR','Offerta valida fino al 10/07/2026'] },
  { id:'smart-flex-business-luce', cat:'luce-biz', ribbon:'luce-res', tag:'⚡ Luce Business', top:false,
    nome:fornitore + ' Smart Flex Business', tipo:'Uso Business · Indicizzato PUN',
    rid:'192 €/POD/anno', consumo:'PUN Index GME + 0,085 €/kWh',
    note:'Per usi diversi dal domestico e condomini fino a 10.000 kWh/anno. Offerta valida fino al 10/07/2026.',
    feats:['Per usi diversi dal domestico e condomini fino a 10.000 kWh/anno','Fee monoraria F0: 0,085 €/kWh · trioraria F1/F2/F3: 0,085 €/kWh','Corrispettivo annuo 192 €/POD','Offerta valida fino al 10/07/2026'] },
  { id:'smart-flex-business-gas', cat:'gas-biz', ribbon:'gas-res', tag:'🔥 Gas Business', top:false,
    nome:fornitore + ' Smart Flex Business Gas', tipo:'Uso Business · Indicizzato PSV',
    rid:'192 €/PDR/anno', consumo:'PSV + 0,44 €/Smc',
    note:'Per siti ad uso non domestico. Prezzo variabile indicizzato al PSV. Offerta valida fino al 10/07/2026.',
    feats:['Per siti ad uso non domestico','Fee sul consumo: 0,44 €/Smc','Corrispettivo annuo 192 €/PDR','Offerta valida fino al 10/07/2026'] }
    ];

    function card(o) {
      return `<article class="offer-card" data-cat="${o.cat}">
        <div class="offer-ribbon ${o.ribbon}">${o.tag}${o.top ? ' · Vantaggiosa' : ''}</div>
        <div class="offer-body">
          <img src="<?=  $OPERATORE['logo_url'] ?> " alt=""<?=  $OPERATORE['nome_marketing'] ?> "" style="height: 30px; margin-bottom: 12px; object-fit: contain;">
          <div style="font-size:12px; color:var(--muted); font-weight:700; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:8px;"> <?=$OPERATORE["nome_marketing"] ?></div>
          <div class="offer-name">${o.nome}</div>
          <div class="offer-type">${o.tipo}</div>
          <div class="offer-price-box">
            <div class="offer-price-label">Corrispettivo annuo fisso</div>
            <div class="offer-price">${o.rid}</div>
            <div class="offer-price-alt">Consumo: ${o.consumo}</div>
          </div>
          ${o.top ? `<div class="offer-badge">🔥 La più scelta</div>` : ''}
          <ul class="offer-feats">${o.feats.map(f=>`<li>${f}</li>`).join('')}</ul>
          <div class="offer-note">📋 ${o.note}</div>
          <button class="offer-cta" data-name="${o.nome}">Richiedi informazioni</button>
        </div>
      </article>`;
    }

    const grid = document.getElementById('offers-grid');
    let current = 'all';

    function render(f) {
      current = f;
      const list = f === 'all' ? offers : offers.filter(o => o.cat === f);
      grid.innerHTML = list.map(card).join('');
      grid.querySelectorAll('.offer-cta').forEach(b => b.addEventListener('click', () => {
        window.location.href = 'contatti.php?offerta=' + encodeURIComponent(b.dataset.name) + '#form';
      }));
    }

    document.getElementById('tab-bar').addEventListener('click', e => {
      const btn = e.target.closest('.tab-btn');
      if (!btn) return;
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      render(btn.dataset.filter);
    });

    render('all');
  </script>
<script src="cb.js"></script>
</body>
</html>
<?php 

include __DIR__ . '/footer.php';

?>
