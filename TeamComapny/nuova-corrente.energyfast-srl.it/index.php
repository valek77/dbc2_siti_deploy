<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Energie Rinnovabili';
include __DIR__ . '/header.php';
?>

  <section class="hero">
    <div class="hero-wrapper">
      <div class="hero-content">
        <h1>Soluzioni avanzate per telecomunicazioni e utilities</h1>
        <p>GCommunication offre consulenza specializzata, analisi dei costi e servizi su misura per ottimizzare le utenze domestiche e aziendali, garantendoti le migliori condizioni sul mercato.</p>

        <div class="hero-actions">
          <a href="tariffe.php" class="btn-primary">Le nostre offerte</a>
        </div>

      </div>
      <div class="hero-image">
        <img src="hero_gcommunication.png" alt="Consulenza GCommunication" class="mascot-img" style="max-width: 100%; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.2);" />
      </div>
    </div>
  </section>

  <section class="features-section">
    <h2 class="section-title" style="margin-top: 0;">Perché scegliere noi?</h2>
    <p class="section-sub" style="margin-bottom: 40px;">Tutti i vantaggi del nostro servizio</p>
    <div class="features-container">
      <div class="trust-card">
        <img src="icon_free_new.png" alt="Servizio gratuito" class="trust-mascot" />
        <h4>Servizio gratuito</h4>
        <p>Confrontiamo le offerte senza alcun costo per te.</p>
      </div>
      <div class="trust-card">
        <img src="icon_call_new.png" alt="Ti richiamiamo noi" class="trust-mascot" />
        <h4>Ti richiamiamo noi</h4>
        <p>I nostri esperti ti supportano in ogni passaggio.</p>
      </div>
      <div class="trust-card">
        <img src="icon_nocommit_new.png" alt="Nessun impegno" class="trust-mascot" />
        <h4>Nessun impegno</h4>
        <p>Valuta le proposte liberamente, senza vincoli nascosti.</p>
      </div>
    </div>
  </section>


  <section class="how-it-works-section">
    <div class="hiw-container">
      <div class="hiw-header">
        <h2 class="section-title">Ottimizzare i costi non è mai stato così semplice</h2>
        <p class="section-sub">Un processo chiaro in 4 passaggi</p>
      </div>

      <div class="hiw-steps">
        <div class="hiw-step">
          <div class="hiw-number">1</div>
          <p>Scegli la tariffa che più si adatta alle tue esigenze</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">2</div>
          <p>Tieni a portata di mano una bolletta e il tuo cellulare</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">3</div>
          <p>Inserisci i tuoi dati e scegli il metodo di pagamento</p>
        </div>
        <div class="hiw-step">
          <div class="hiw-number">4</div>
          <p>Non dovrai fare più nulla, penseremo a tutto noi</p>
        </div>
      </div>
    </div>
  </section>

  <section class="trustpilot-section">
    <div class="trustpilot-wrapper">
      <div class="tp-container">
        <div class="tp-stars">★★★★★</div>
        <p class="tp-text">Valutato <strong>Eccellente</strong> su <span class="tp-star-logo">★</span> <span
            class="tp-logo">Trustpilot</span></p>
        <p class="tp-subtext">Basato su oltre 5.000 recensioni verificate</p>
      </div>
      <div class="tp-reviews">
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Servizio impeccabile!</h5>
          <p class="tp-review-body">Mi hanno aiutato a trovare la tariffa migliore in pochissimo tempo. Davvero
            competenti
            e veloci.</p>
          <p class="tp-review-author">Marco R.</p>
        </div>
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Risparmio garantito</h5>
          <p class="tp-review-body">Ero scettica, ma mi hanno fatto risparmiare oltre 200€ all'anno. Una bella sorpresa.
          </p>
          <p class="tp-review-author">Giulia F.</p>
        </div>
        <div class="tp-review-card">
          <div class="tp-review-stars">★★★★★</div>
          <h5 class="tp-review-title">Gentili e preparati</h5>
          <p class="tp-review-body">Nessun call center aggressivo, solo veri consulenti che ti guidano passo passo con
            chiarezza.</p>
          <p class="tp-review-author">Antonio L.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="info-section" style="padding: 80px 20px; background: #ffffff; color: var(--text-dark);">
    <div class="container"
      style="max-width: 1000px; margin: 0 auto; display: flex; align-items: center; gap: 40px; flex-wrap: wrap;">
      <div style="flex: 1; min-width: 300px; display: flex; justify-content: center;">
        <img src="consulting_business.png" alt="Consulenza strategica"
          style="max-width: 100%; height: auto; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);" />
      </div>
      <div style="flex: 1.2; min-width: 300px; text-align: left;">
        <h2 class="section-title" style="text-align: left; margin-top: 0; color: var(--text-dark);">Ottimizza i costi con la giusta strategia</h2>
        <p style="font-size: 18px; line-height: 1.6; color: var(--text-label); margin-bottom: 32px;">
          Con <?= $brand ?> hai un partner affidabile per l'analisi e la gestione dei contratti luce, gas e telecomunicazioni. Analizziamo le fatture e selezioniamo per te le migliori opportunità.
        </p>
        <a href="tariffe.php" class="btn-primary" style="display: inline-block;">Le nostre offerte</a>
      </div>
    </div>
  </section>

  <section class="sustainability-section" style="padding: 80px 20px; background: #fff;">
    <div class="container"
      style="max-width: 1000px; margin: 0 auto; display: flex; align-items: center; gap: 40px; flex-wrap: wrap-reverse;">
      <div style="flex: 1.2; min-width: 300px; text-align: left;">
        <h2 class="section-title" style="text-align: left; margin-top: 0;">Un supporto dedicato per te e il tuo business</h2>
        <p style="font-size: 18px; line-height: 1.6; color: var(--text-label); margin-bottom: 32px;">
          Che tu sia un'azienda in cerca di maggiore efficienza per le comunicazioni o un privato interessato al risparmio energetico, i nostri esperti sono sempre pronti a guidarti con serietà e trasparenza verso la soluzione migliore.
        </p>
        <a href="tariffe.php" class="btn-primary" style="display: inline-block;">Le nostre offerte</a>
      </div>
      <div style="flex: 1; min-width: 300px; display: flex; justify-content: center;">
        <img src="about_gcom.png" alt="Team GCommunication"
          style="max-width: 100%; height: auto; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);" />
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
