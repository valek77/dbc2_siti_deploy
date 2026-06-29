<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Energia per il tuo futuro';
include __DIR__ . '/header.php';
?>

  <section class="hero-image" style="position: relative; padding: 140px 24px; min-height: 75vh; display: flex; align-items: center; justify-content: center; text-align: center; background-image: url('https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=2000&q=80'); background-size: cover; background-position: center;">
    <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.7)); z-index: 1;"></div>
    
    <div class="container" style="position: relative; z-index: 2; max-width: 900px;">
      <span class="eyebrow" style="color: var(--primary-light, #FED7AA); font-weight: 800; text-transform: uppercase; font-size: 15px; letter-spacing: 2px; margin-bottom: 24px; display: inline-block;">
        L'energia di casa tua, semplificata
      </span>
      <h1 style="font-size: clamp(44px, 7vw, 72px); line-height: 1.05; font-weight: 900; color: #fff; margin-bottom: 32px; letter-spacing: -1px;">
        Diamo luce alla tua casa,<br>con totale trasparenza.
      </h1>
      <p style="font-size: 22px; color: rgba(255,255,255,0.9); margin-bottom: 48px; line-height: 1.6; max-width: 700px; margin-left: auto; margin-right: auto; font-weight: 400;">
        Offerta luce su misura per la tua famiglia. Un unico referente sempre al tuo fianco, per un ambiente domestico più efficiente e zero costi imprevisti.
      </p>
      <div style="display: flex; gap: 16px; flex-wrap: wrap; justify-content: center;">
        <a href="tariffe.php" class="btn-primary" style="background: var(--primary); color: #fff; padding: 18px 48px; border-radius: 99px; text-decoration: none; font-weight: 700; font-size: 18px; box-shadow: 0 10px 25px rgba(234, 88, 12, 0.3); transition: transform 0.2s;">Scopri l'offerta</a>
        <a href="contatti.php" class="btn-outline" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.3); color: #fff; padding: 18px 48px; border-radius: 99px; text-decoration: none; font-weight: 700; font-size: 18px; transition: background 0.2s;">Contattaci</a>
      </div>
    </div>
  </section>

  <!-- OFFERTE GRID -->
  <section class="section" style="padding: 80px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
      <div class="section-head" style="margin-bottom: 48px;">
        <h2 class="section-title" style="font-size: 36px; font-weight: 800; margin-bottom: 16px;">La nostra offerta in evidenza</h2>
        <p class="section-sub" style="color: #71717A; font-size: 18px; max-width: 600px;">Un'offerta luce indicizzata al PUN Index GME con corrispettivo annuo fisso, pensata per la tua casa senza sorprese.</p>
      </div>
      <div class="offers-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">

        <div class="offer-card" style="border: 1px solid #E4E4E7; border-radius: 20px; overflow: hidden; display: flex; flex-direction: column; background: #fff;">
          <div class="offer-ribbon" style="background: linear-gradient(90deg, var(--primary), var(--accent)); color: #fff; padding: 12px 20px; font-weight: 700; font-size: 12px; text-transform: uppercase;">Offerta Luce</div>
          <div class="offer-body" style="padding: 32px; display: flex; flex-direction: column; flex-grow: 1;">
            <div style="font-size: 28px; font-weight: 800; margin-bottom: 8px;">ReCasa_Luce B13</div>
            <img src="<?= $OPERATORE['logo_url'] ?>" alt="<?= $OPERATORE['nome_marketing'] ?>" style="height: 24px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 32px; filter: brightness(0); align-self: flex-start;">
            <div style="background: #FAFAFA; border-radius: 12px; padding: 20px; margin-bottom: 24px;">
              <div style="font-size: 11px; text-transform: uppercase; color: #A1A1AA; font-weight: 600; margin-bottom: 8px;">PUN Index GME + Contributo al consumo</div>
              <div style="font-size: 28px; font-weight: 800; color: var(--primary);">PUN + 0,13 €/kWh</div>
              <div style="font-size: 14px; color: #71717A; margin-top: 12px; padding-top: 12px; border-top: 1px solid #E4E4E7;">Costi di commercializzazione: 552,00 € / POD / anno</div>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0 0 32px; display: flex; flex-direction: column; gap: 12px; color: #71717A; font-size: 15px;">
              <li style="display: flex; gap: 8px;"><span style="color: var(--primary);">✓</span> Mercato Libero - Domestico</li>
              <li style="display: flex; gap: 8px;"><span style="color: var(--primary);">✓</span> Prezzo indicizzato al PUN Index GME</li>
              <li style="display: flex; gap: 8px;"><span style="color: var(--primary);">✓</span> Sottoscrivibile entro il 31/08/2026</li>
            </ul>
            <a href="tariffe.php" class="btn-primary" style="margin-top: auto; display: block; text-align: center; background: var(--primary); color: #fff; padding: 14px; border-radius: 99px; text-decoration: none; font-weight: 600;">Scopri l'offerta</a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- SERVIZI E SOLUZIONI -->
  <section class="section" style="background: #FAFAFA; padding: 100px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
      <div class="split" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 80px; align-items: center; direction: rtl;">
        <div style="direction: ltr;">
          <span class="eyebrow" style="color: var(--primary); font-weight: 700; text-transform: uppercase; font-size: 13px; letter-spacing: 1.5px; display: flex; align-items: center; gap: 8px; margin-bottom: 16px;"><span class="dot" style="width: 6px; height: 6px; background: var(--primary); border-radius: 50%;"></span> Efficienza Domestica</span>
          <h2 style="font-size: 36px; font-weight: 800; margin-bottom: 24px; line-height: 1.2;">Soluzioni per la tua Casa<br>e la tua Famiglia</h2>
          <div style="width: 48px; height: 4px; background: var(--primary); border-radius: 2px; margin-bottom: 24px;"></div>
          <p style="font-size: 17px; color: #71717A; line-height: 1.7; margin-bottom: 32px;">La casa è il centro della tua vita. Offriamo soluzioni di efficienza energetica su misura per le esigenze di ogni famiglia. Dalla riduzione dei consumi all'ottimizzazione degli impianti, passando per il fotovoltaico.</p>
          <ul style="list-style: none; padding: 0; margin: 0 0 40px; display: flex; flex-direction: column; gap: 12px; color: #71717A; font-size: 16px;">
            <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Analisi gratuita dei consumi domestici e check-up energetico</li>
            <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Proposte di risparmio e sostenibilità per la tua casa</li>
            <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Supporto completo per bonus ed agevolazioni statali</li>
          </ul>
          <a href="contatti.php" class="btn-primary" style="background: var(--primary); color: #fff; padding: 14px 32px; border-radius: 99px; text-decoration: none; font-weight: 600;">Richiedi una consulenza</a>
        </div>
        <div class="split-img" style="direction: ltr; border-radius: 20px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
          <img src="efficiency_tech.jpg" alt="Soluzioni energetiche per aziende ed enti" style="width: 100%; height: 100%; object-fit: cover; aspect-ratio: 4/3;">
        </div>
      </div>
    </div>
  </section>

  <!-- SOSTENIBILITA E CERTIFICAZIONI -->
  <section class="section" style="padding: 100px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
      <div class="section-head" style="text-align: center; margin-bottom: 64px;">
        <span class="eyebrow" style="color: var(--primary); font-weight: 700; text-transform: uppercase; font-size: 13px; letter-spacing: 1.5px; display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: 16px;"><span class="dot" style="width: 6px; height: 6px; background: var(--primary); border-radius: 50%;"></span> Il nostro impegno</span>
        <h2 style="font-size: 36px; font-weight: 800; line-height: 1.2;">Un fornitore affidabile,<br>un'energia pensata per la tua famiglia</h2>
      </div>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 32px;">
        <div style="text-align: center; padding: 48px 32px; border: 1px solid #E4E4E7; border-radius: 20px;">
          <div style="font-size: 40px; margin-bottom: 24px;">🌿</div>
          <h4 style="font-size: 20px; font-weight: 800; margin-bottom: 16px;">Transizione Sostenibile</h4>
          <p style="color: #71717A; line-height: 1.6;">Lavoriamo costantemente per offrire opzioni energetiche che riducano l'impatto ambientale e aiutino le famiglie a consumare meglio.</p>
        </div>
        <div style="text-align: center; padding: 48px 32px; border: 1px solid #E4E4E7; border-radius: 20px;">
          <div style="font-size: 40px; margin-bottom: 24px;">🛡️</div>
          <h4 style="font-size: 20px; font-weight: 800; margin-bottom: 16px;">Certificazione e Sicurezza</h4>
          <p style="color: #71717A; line-height: 1.6;">Tutte le nostre offerte PLACET e i contratti sono rigorosamente conformi alle direttive ARERA per garantirti la massima tutela.</p>
        </div>
        <div style="text-align: center; padding: 48px 32px; border: 1px solid #E4E4E7; border-radius: 20px;">
          <div style="font-size: 40px; margin-bottom: 24px;">👥</div>
          <h4 style="font-size: 20px; font-weight: 800; margin-bottom: 16px;">Assistenza di Qualità</h4>
          <p style="color: #71717A; line-height: 1.6;">Un team dedicato sempre pronto a rispondere. Nessun call center estero o code infinite, solo un riferimento vero a tua disposizione.</p>
        </div>
      </div>
    </div>
  </section>



<?php include __DIR__ . '/footer.php'; ?>
