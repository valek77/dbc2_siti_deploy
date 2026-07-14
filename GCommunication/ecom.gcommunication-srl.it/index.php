<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Luce e gas per casa e impresa';
include __DIR__ . '/header.php';
?>

  <section class="hero-image" style="position: relative; padding: 140px 24px; min-height: 75vh; display: flex; align-items: center; justify-content: center; text-align: center; overflow: hidden;">
    <div id="hero-slides" style="position: absolute; inset: 0; z-index: 0;">
      <div class="hero-slide is-active" style="position: absolute; inset: 0; background-image: url('https://images.unsplash.com/photo-1559302504-64aae6ca6b6d?auto=format&fit=crop&w=2000&q=80'); background-size: cover; background-position: center; opacity: 1; transition: opacity 0.8s ease;"></div>
      <div class="hero-slide" style="position: absolute; inset: 0; background-image: url('https://images.unsplash.com/photo-1497436072909-60f360e1d4b1?auto=format&fit=crop&w=2000&q=80'); background-size: cover; background-position: center; opacity: 0; transition: opacity 0.8s ease;"></div>
      <div class="hero-slide" style="position: absolute; inset: 0; background-image: url('https://images.unsplash.com/photo-1466611653911-95081537e5b7?auto=format&fit=crop&w=2000&q=80'); background-size: cover; background-position: center; opacity: 0; transition: opacity 0.8s ease;"></div>
    </div>
    <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.7)); z-index: 1;"></div>
    
    <div class="container" style="position: relative; z-index: 2; max-width: 900px;">
      <span class="eyebrow" style="color: var(--primary-light); font-weight: 800; text-transform: uppercase; font-size: 15px; letter-spacing: 2px; margin-bottom: 24px; display: inline-block;">
        Soluzioni energia su misura
      </span>
      <h1 style="font-size: clamp(44px, 7vw, 72px); line-height: 1.05; font-weight: 900; color: #fff; margin-bottom: 32px; letter-spacing: -1px;">
        Energia chiara per la tua casa<br>e per la tua attivita.
      </h1>
      <p style="font-size: 22px; color: rgba(255,255,255,0.9); margin-bottom: 48px; line-height: 1.6; max-width: 700px; margin-left: auto; margin-right: auto; font-weight: 400;">
        Offerte luce e gas pensate per semplificare i consumi, controllare la spesa e avere sempre un supporto concreto nella gestione della fornitura.
      </p>
      <div style="display: flex; gap: 16px; flex-wrap: wrap; justify-content: center;">
        <a href="tariffe.php" class="btn-primary" style="background: var(--primary); color: #fff; padding: 18px 48px; border-radius: 99px; text-decoration: none; font-weight: 700; font-size: 18px; box-shadow: 0 10px 25px rgba(18, 144, 111, 0.3); transition: transform 0.2s;">Scopri le offerte</a>
        <a href="contatti.php" class="btn-outline" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.3); color: #fff; padding: 18px 48px; border-radius: 99px; text-decoration: none; font-weight: 700; font-size: 18px; transition: background 0.2s;">Contattaci</a>
      </div>
      <div style="display: flex; justify-content: center; gap: 10px; margin-top: 32px;">
        <button type="button" class="hero-dot is-active" data-slide="0" aria-label="Vai alla slide 1" style="width: 12px; height: 12px; border-radius: 50%; border: 0; background: #ffffff; opacity: 1; cursor: pointer; padding: 0;"></button>
        <button type="button" class="hero-dot" data-slide="1" aria-label="Vai alla slide 2" style="width: 12px; height: 12px; border-radius: 50%; border: 0; background: #ffffff; opacity: 0.45; cursor: pointer; padding: 0;"></button>
        <button type="button" class="hero-dot" data-slide="2" aria-label="Vai alla slide 3" style="width: 12px; height: 12px; border-radius: 50%; border: 0; background: #ffffff; opacity: 0.45; cursor: pointer; padding: 0;"></button>
      </div>
    </div>
  </section>

  <section class="section" style="padding: 90px 0; background: #F8FBFC;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
      <div style="display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr); gap: 40px; align-items: center;">
        <div>
          <span style="display: inline-block; color: var(--primary); font-weight: 800; text-transform: uppercase; font-size: 13px; letter-spacing: 1.5px; margin-bottom: 18px;">Come lavoriamo</span>
          <h2 style="font-size: clamp(32px, 4vw, 46px); line-height: 1.15; font-weight: 800; color: #17324D; margin: 0 0 20px;">
            Un percorso semplice per scegliere la fornitura energia piu adatta
          </h2>
          <p style="font-size: 18px; line-height: 1.7; color: #617082; margin: 0 0 32px; max-width: 640px;">
            Analizziamo il tuo profilo di consumo, ti aiutiamo a leggere le condizioni economiche e ti affianchiamo nella richiesta di attivazione con un supporto diretto e comprensibile.
          </p>
          <div style="display: flex; flex-wrap: wrap; gap: 16px;">
            <a href="tariffe.php" style="display: inline-block; background: var(--primary); color: #fff; padding: 16px 32px; border-radius: 999px; text-decoration: none; font-weight: 700;">Scopri le tariffe</a>
          </div>
        </div>
        <div style="background: #fff; border: 1px solid #E4EAF0; border-radius: 24px; padding: 32px; box-shadow: 0 18px 40px rgba(23, 63, 95, 0.08);">
          <div style="display: grid; gap: 22px;">
            <div style="display: flex; gap: 18px; align-items: flex-start;">
              <div style="flex: 0 0 52px; width: 52px; height: 52px; border-radius: 16px; background: var(--primary-100); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: 800;">1</div>
              <div>
                <h3 style="margin: 0 0 8px; font-size: 20px; color: #17324D;">Ascolto delle esigenze</h3>
                <p style="margin: 0; color: #617082; line-height: 1.6;">Raccogliamo le informazioni utili su consumi, abitudini e tipologia di utenza per orientarti verso la soluzione piu coerente.</p>
              </div>
            </div>
            <div style="display: flex; gap: 18px; align-items: flex-start;">
              <div style="flex: 0 0 52px; width: 52px; height: 52px; border-radius: 16px; background: rgba(23, 63, 95, 0.08); color: var(--secondary); display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: 800;">2</div>
              <div>
                <h3 style="margin: 0 0 8px; font-size: 20px; color: #17324D;">Lettura chiara dell'offerta</h3>
                <p style="margin: 0; color: #617082; line-height: 1.6;">Ti aiutiamo a comprendere costi, indici, corrispettivi e condizioni contrattuali, senza linguaggio tecnico superfluo.</p>
              </div>
            </div>
            <div style="display: flex; gap: 18px; align-items: flex-start;">
              <div style="flex: 0 0 52px; width: 52px; height: 52px; border-radius: 16px; background: var(--primary-100); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: 800;">3</div>
              <div>
                <h3 style="margin: 0 0 8px; font-size: 20px; color: #17324D;">Supporto fino all'attivazione</h3>
                <p style="margin: 0; color: #617082; line-height: 1.6;">Restiamo al tuo fianco durante tutta la richiesta, fino alla gestione pratica della nuova fornitura luce o gas.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SOSTENIBILITA E CERTIFICAZIONI -->
  <section class="section" style="padding: 100px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
      <div class="section-head" style="text-align: center; margin-bottom: 64px;">
        <span class="eyebrow" style="color: var(--primary); font-weight: 700; text-transform: uppercase; font-size: 13px; letter-spacing: 1.5px; display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: 16px;"><span class="dot" style="width: 6px; height: 6px; background: var(--primary); border-radius: 50%;"></span> Il nostro impegno</span>
        <h2 style="font-size: 36px; font-weight: 800; line-height: 1.2;">Energia, assistenza e chiarezza<br>in ogni fase della fornitura</h2>
      </div>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 32px;">
        <div style="text-align: center; padding: 48px 32px; border: 1px solid #E4E4E7; border-radius: 20px;">
          <div style="font-size: 40px; margin-bottom: 24px;">🌿</div>
          <h4 style="font-size: 20px; font-weight: 800; margin-bottom: 16px;">Energia piu consapevole</h4>
          <p style="color: #71717A; line-height: 1.6;">Promuoviamo offerte che aiutano famiglie e imprese a gestire i consumi con maggiore attenzione, valorizzando efficienza e sostenibilita.</p>
        </div>
        <div style="text-align: center; padding: 48px 32px; border: 1px solid #E4E4E7; border-radius: 20px;">
          <div style="font-size: 40px; margin-bottom: 24px;">🛡️</div>
          <h4 style="font-size: 20px; font-weight: 800; margin-bottom: 16px;">Condizioni trasparenti</h4>
          <p style="color: #71717A; line-height: 1.6;">Ogni proposta e presentata in modo chiaro, con dettagli leggibili su corrispettivi, indici di riferimento e condizioni economiche della fornitura.</p>
        </div>
        <div style="text-align: center; padding: 48px 32px; border: 1px solid #E4E4E7; border-radius: 20px;">
          <div style="font-size: 40px; margin-bottom: 24px;">👥</div>
          <h4 style="font-size: 20px; font-weight: 800; margin-bottom: 16px;">Supporto dedicato</h4>
          <p style="color: #71717A; line-height: 1.6;">Ti accompagniamo dalla richiesta iniziale all'attivazione, con un referente pronto a rispondere a dubbi su bolletta, offerta e gestione del contratto.</p>
        </div>
      </div>
    </div>
  </section>



<?php include __DIR__ . '/footer.php'; ?>
<script>
  (function() {
    const slides = Array.from(document.querySelectorAll('.hero-slide'));
    const dots = Array.from(document.querySelectorAll('.hero-dot'));
    if (!slides.length || !dots.length) return;

    let activeIndex = 0;
    let timerId = null;

    function setActiveSlide(index) {
      activeIndex = index;
      slides.forEach((slide, slideIndex) => {
        slide.style.opacity = slideIndex === index ? '1' : '0';
        slide.classList.toggle('is-active', slideIndex === index);
      });
      dots.forEach((dot, dotIndex) => {
        dot.style.opacity = dotIndex === index ? '1' : '0.45';
        dot.classList.toggle('is-active', dotIndex === index);
      });
    }

    function startAutoplay() {
      timerId = window.setInterval(() => {
        const nextIndex = (activeIndex + 1) % slides.length;
        setActiveSlide(nextIndex);
      }, 4500);
    }

    function resetAutoplay() {
      if (timerId) window.clearInterval(timerId);
      startAutoplay();
    }

    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        setActiveSlide(index);
        resetAutoplay();
      });
    });

    setActiveSlide(0);
    startAutoplay();
  })();
</script>
