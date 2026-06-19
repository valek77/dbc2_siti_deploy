<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe Energia Comune';
include __DIR__ . '/header.php';
?>

  <section class="hero-page" style="background: #FAFAFA; padding: 120px 24px 80px; text-align: center;">
    <div class="container" style="max-width: 800px; margin: 0 auto;">
      <div style="margin-bottom: 20px; display: flex; align-items: center; justify-content: center; gap: 12px; color: #71717A; font-weight: 700; text-transform: uppercase; font-size: 14px; letter-spacing: 1px;">
        Partner Ufficiale <img src="https://www.energiacomune.com/img/ecom_logo-2048x270.png" style="height: 20px; width: auto; object-fit: contain; filter: brightness(0);" alt="Energia Comune">
      </div>
      <h1 style="font-size: clamp(36px, 5vw, 56px); line-height: 1.1; font-weight: 800; color: #18181B; margin-bottom: 24px;">
        Le tariffe <span style="color: var(--primary);">Zero</span>,<br>chiare e senza sorprese.
      </h1>
      <p style="font-size: 19px; color: #71717A; margin-bottom: 0; line-height: 1.6;">
        Paga l'energia al prezzo all'ingrosso (PUN o PSV) con soli 17€/mese di commercializzazione. EnergyTeller incluso in ogni offerta.
      </p>
    </div>
  </section>

  <section class="section" style="padding: 60px 0 100px;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
      <div class="offers-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 32px;">
        
        <!-- LUCE ZERO -->
        <div class="offer-card" style="border: 1px solid #E4E4E7; border-radius: 24px; overflow: hidden; display: flex; flex-direction: column; background: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
          <div class="offer-ribbon" style="background: var(--primary); color: #fff; padding: 12px 24px; font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Energia Elettrica</div>
          <div class="offer-body" style="padding: 40px; display: flex; flex-direction: column; flex-grow: 1;">
            <div style="font-size: 28px; font-weight: 800; margin-bottom: 8px;">Luce Zero</div>
            <img src="https://www.energiacomune.com/img/ecom_logo-2048x270.png" alt="Energia Comune" style="height: 24px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 32px; filter: brightness(0); align-self: flex-start;">
            
            <div style="background: #FAFAFA; border-radius: 16px; padding: 24px; margin-bottom: 32px; border: 1px solid #F4F4F5;">
              <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Componente Energia</div>
              <div style="font-size: 32px; font-weight: 800; color: var(--primary); margin-bottom: 4px;">€ 0,033<span style="font-size: 16px; color: #71717A;">/kWh</span></div>
              <div style="font-size: 14px; color: #A1A1AA; font-weight: 500;">+ PUN Index GME</div>
              
              <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #E4E4E7;">
                <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Commercializzazione</div>
                <div style="font-size: 24px; font-weight: 800; color: #18181B;">17,00 €<span style="font-size: 14px; color: #71717A;">/mese</span></div>
                <div style="font-size: 13px; color: #A1A1AA;">(204,00 €/POD/anno)</div>
              </div>
            </div>

            <ul style="list-style: none; padding: 0; margin: 0 0 40px; display: flex; flex-direction: column; gap: 16px; color: #3F3F46; font-size: 16px;">
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Tariffa indicizzata trasparente</li>
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> <b>EnergyTeller incluso</b> nei costi</li>
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Nessun deposito cauzionale</li>
            </ul>
            
            <a href="contatti.php?offerta=Luce%20Zero" class="btn-primary" style="margin-top: auto; display: block; text-align: center; background: var(--primary); color: #fff; padding: 16px; border-radius: 99px; text-decoration: none; font-weight: 700; font-size: 16px;">Richiedi Luce Zero</a>
          </div>
        </div>

        <!-- GAS ZERO -->
        <div class="offer-card" style="border: 1px solid #E4E4E7; border-radius: 24px; overflow: hidden; display: flex; flex-direction: column; background: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
          <div class="offer-ribbon" style="background: #D97706; color: #fff; padding: 12px 24px; font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Gas Naturale</div>
          <div class="offer-body" style="padding: 40px; display: flex; flex-direction: column; flex-grow: 1;">
            <div style="font-size: 28px; font-weight: 800; margin-bottom: 8px;">Gas Zero</div>
            <img src="https://www.energiacomune.com/img/ecom_logo-2048x270.png" alt="Energia Comune" style="height: 24px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 32px; filter: brightness(0); align-self: flex-start;">
            
            <div style="background: #FAFAFA; border-radius: 16px; padding: 24px; margin-bottom: 32px; border: 1px solid #F4F4F5;">
              <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Componente Gas</div>
              <div style="font-size: 32px; font-weight: 800; color: #D97706; margin-bottom: 4px;">€ 0,210<span style="font-size: 16px; color: #71717A;">/Smc</span></div>
              <div style="font-size: 14px; color: #A1A1AA; font-weight: 500;">+ Indice PSV</div>
              
              <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #E4E4E7;">
                <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Commercializzazione</div>
                <div style="font-size: 24px; font-weight: 800; color: #18181B;">17,00 €<span style="font-size: 14px; color: #71717A;">/mese</span></div>
                <div style="font-size: 13px; color: #A1A1AA;">(204,00 €/PDR/anno)</div>
              </div>
            </div>

            <ul style="list-style: none; padding: 0; margin: 0 0 40px; display: flex; flex-direction: column; gap: 16px; color: #3F3F46; font-size: 16px;">
              <li style="display: flex; gap: 12px;"><span style="color: #D97706; font-weight: 800;">✓</span> Tariffa indicizzata all'ingrosso</li>
              <li style="display: flex; gap: 12px;"><span style="color: #D97706; font-weight: 800;">✓</span> <b>EnergyTeller incluso</b> nei costi</li>
              <li style="display: flex; gap: 12px;"><span style="color: #D97706; font-weight: 800;">✓</span> Attivazione facile e online</li>
            </ul>
            
            <a href="contatti.php?offerta=Gas%20Zero" class="btn-primary" style="margin-top: auto; display: block; text-align: center; background: #D97706; color: #fff; padding: 16px; border-radius: 99px; text-decoration: none; font-weight: 700; font-size: 16px;">Richiedi Gas Zero</a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- BUSINESS -->
  <section class="section" style="background: #FAFAFA; padding: 80px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
      <div style="background: #fff; border-radius: 24px; padding: 48px; border: 1px solid #E4E4E7; display: flex; flex-wrap: wrap; gap: 48px; align-items: center;">
        <div style="flex: 1; min-width: 300px;">
          <h2 style="font-size: 32px; font-weight: 800; margin-bottom: 16px;">Sei un'azienda?</h2>
          <p style="font-size: 18px; color: #71717A; line-height: 1.6; margin-bottom: 32px;">Le esigenze di un'attività commerciale sono diverse da quelle di una casa. Ecco perché Energia Comune ha pensato a soluzioni su misura per il mercato Business.</p>
          <ul style="list-style: none; padding: 0; margin: 0 0 32px; display: flex; flex-direction: column; gap: 12px; color: #3F3F46; font-size: 16px;">
            <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Consulenza energetica dedicata</li>
            <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Tariffe agevolate in base ai consumi reali</li>
            <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Referente unico (EnergyTeller) per la tua impresa</li>
          </ul>
          <a href="contatti.php?offerta=Business" class="btn-outline" style="border: 2px solid #18181B; color: #18181B; padding: 14px 32px; border-radius: 99px; text-decoration: none; font-weight: 700; display: inline-block;">Parla con un consulente</a>
        </div>
        <div style="flex: 1; min-width: 300px;">
          <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80" style="width: 100%; border-radius: 16px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
        </div>
      </div>
    </div>
  </section>

  <section class="section" style="padding: 60px 20px;">
    <p class="price-disclaimer" id="price-disclaimer" style="max-width: 1000px; margin: 0 auto; font-size: 13px; line-height: 1.7; color: #A1A1AA; text-align: justify;">
      * Offerte a prezzo variabile aggiornato mensilmente. 
      <strong>Luce Zero:</strong> Prezzo Luce = PUN Index GME + 0,033 €/kWh, oltre a 17 €/mese per spese di commercializzazione. Si applicano perdite di rete e dispacciamento come definiti da ARERA. 
      <strong>Gas Zero:</strong> Prezzo Gas = PSV + 0,210 €/Smc, oltre a 17 €/mese per spese di commercializzazione.
      EnergyTeller è sempre incluso all'interno delle spese di commercializzazione. Condizioni regolate per il Mercato Libero in Italia.
    </p>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
