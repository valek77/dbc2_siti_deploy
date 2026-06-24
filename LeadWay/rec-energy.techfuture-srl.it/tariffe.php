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
        Le offerte <span style="color: var(--primary);">Family</span> e <span style="color: var(--primary);">Tris</span>,<br>chiare e senza sorprese.
      </h1>
      <p style="font-size: 19px; color: #71717A; margin-bottom: 0; line-height: 1.6;">
        Prezzo della componente energia indicizzato all'ingrosso (PUN Index GME o PSV) e corrispettivo annuo fisso e invariabile per 12 mesi. Richiesta entro il 30/06/2026.
      </p>
    </div>
  </section>

  <section class="section" style="padding: 60px 0 100px;">
    <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 0 24px;">

      <!-- ===================== FAMILY ===================== -->
      <div style="text-align: center; margin-bottom: 12px;">
        <span style="display: inline-block; background: var(--primary); color: #fff; padding: 8px 20px; border-radius: 99px; font-weight: 700; font-size: 13px; text-transform: uppercase; letter-spacing: 1px;">Offerte Family</span>
      </div>
      <h2 style="text-align: center; font-size: clamp(28px, 4vw, 40px); font-weight: 800; color: #18181B; margin-bottom: 40px;">La scelta Family</h2>

      <div class="offers-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 32px; margin-bottom: 80px;">

        <!-- FAMILY LUCE GREEN -->
        <div class="offer-card" style="border: 1px solid #E4E4E7; border-radius: 24px; overflow: hidden; display: flex; flex-direction: column; background: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
          <div class="offer-ribbon" style="background: var(--primary); color: #fff; padding: 12px 24px; font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Energia Elettrica · 100% Green</div>
          <div class="offer-body" style="padding: 40px; display: flex; flex-direction: column; flex-grow: 1;">
            <div style="font-size: 28px; font-weight: 800; margin-bottom: 8px;">Family Luce Green</div>
            <img src="https://www.energiacomune.com/img/ecom_logo-2048x270.png" alt="Energia Comune" style="height: 24px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 32px; filter: brightness(0); align-self: flex-start;">

            <div style="background: #FAFAFA; border-radius: 16px; padding: 24px; margin-bottom: 32px; border: 1px solid #F4F4F5;">
              <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Corrispettivo per il consumo (F1/F2/F3)</div>
              <div style="font-size: 32px; font-weight: 800; color: var(--primary); margin-bottom: 4px;">€ 0,049500<span style="font-size: 16px; color: #71717A;">/kWh</span></div>
              <div style="font-size: 14px; color: #A1A1AA; font-weight: 500;">+ PUN Index GME</div>

              <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #E4E4E7;">
                <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Corrispettivo annuo</div>
                <div style="font-size: 24px; font-weight: 800; color: #18181B;">397,80 €<span style="font-size: 14px; color: #71717A;">/POD/anno</span></div>
                <div style="font-size: 13px; color: #A1A1AA;">Fisso e invariabile per 12 mesi</div>
              </div>
            </div>

            <ul style="list-style: none; padding: 0; margin: 0 0 32px; display: flex; flex-direction: column; gap: 16px; color: #3F3F46; font-size: 16px;">
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> <b>Energia 100% green</b></li>
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Prezzo indicizzato al PUN Index GME</li>
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Richiesta entro il 30/06/2026</li>
            </ul>

            <div style="font-size: 12px; color: #A1A1AA; margin-bottom: 24px;">Codice offerta: 028056ESVFL02XX00FAMILYLUCEGREEN</div>

            <a href="contatti.php?offerta=Family%20Luce%20Green" class="btn-primary" style="margin-top: auto; display: block; text-align: center; background: var(--primary); color: #fff; padding: 16px; border-radius: 99px; text-decoration: none; font-weight: 700; font-size: 16px;">Richiedi Family Luce Green</a>
          </div>
        </div>

        <!-- FAMILY GAS -->
        <div class="offer-card" style="border: 1px solid #E4E4E7; border-radius: 24px; overflow: hidden; display: flex; flex-direction: column; background: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
          <div class="offer-ribbon" style="background: #D97706; color: #fff; padding: 12px 24px; font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Gas Naturale</div>
          <div class="offer-body" style="padding: 40px; display: flex; flex-direction: column; flex-grow: 1;">
            <div style="font-size: 28px; font-weight: 800; margin-bottom: 8px;">Family Gas</div>
            <img src="https://www.energiacomune.com/img/ecom_logo-2048x270.png" alt="Energia Comune" style="height: 24px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 32px; filter: brightness(0); align-self: flex-start;">

            <div style="background: #FAFAFA; border-radius: 16px; padding: 24px; margin-bottom: 32px; border: 1px solid #F4F4F5;">
              <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Corrispettivo per il consumo (M)</div>
              <div style="font-size: 32px; font-weight: 800; color: #D97706; margin-bottom: 4px;">€ 0,210000<span style="font-size: 16px; color: #71717A;">/Smc</span></div>
              <div style="font-size: 14px; color: #A1A1AA; font-weight: 500;">+ Indice PSV</div>

              <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #E4E4E7;">
                <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Corrispettivo annuo</div>
                <div style="font-size: 24px; font-weight: 800; color: #18181B;">397,80 €<span style="font-size: 14px; color: #71717A;">/PdR/anno</span></div>
                <div style="font-size: 13px; color: #A1A1AA;">Fisso e invariabile per 12 mesi</div>
              </div>
            </div>

            <ul style="list-style: none; padding: 0; margin: 0 0 32px; display: flex; flex-direction: column; gap: 16px; color: #3F3F46; font-size: 16px;">
              <li style="display: flex; gap: 12px;"><span style="color: #D97706; font-weight: 800;">✓</span> Prezzo indicizzato al PSV</li>
              <li style="display: flex; gap: 12px;"><span style="color: #D97706; font-weight: 800;">✓</span> Corrispettivo annuo fisso per 12 mesi</li>
              <li style="display: flex; gap: 12px;"><span style="color: #D97706; font-weight: 800;">✓</span> Richiesta entro il 30/06/2026</li>
            </ul>

            <div style="font-size: 12px; color: #A1A1AA; margin-bottom: 24px;">Codice offerta: 028056GSVML02XX00000000FAMILYGAS</div>

            <a href="contatti.php?offerta=Family%20Gas" class="btn-primary" style="margin-top: auto; display: block; text-align: center; background: #D97706; color: #fff; padding: 16px; border-radius: 99px; text-decoration: none; font-weight: 700; font-size: 16px;">Richiedi Family Gas</a>
          </div>
        </div>

      </div>

      <!-- ===================== TRIS ===================== -->
      <div style="text-align: center; margin-bottom: 12px;">
        <span style="display: inline-block; background: #18181B; color: #fff; padding: 8px 20px; border-radius: 99px; font-weight: 700; font-size: 13px; text-transform: uppercase; letter-spacing: 1px;">Offerte Tris</span>
      </div>
      <h2 style="text-align: center; font-size: clamp(28px, 4vw, 40px); font-weight: 800; color: #18181B; margin-bottom: 40px;">La scelta Tris</h2>

      <div class="offers-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 32px;">

        <!-- TRIS LUCE GREEN -->
        <div class="offer-card" style="border: 1px solid #E4E4E7; border-radius: 24px; overflow: hidden; display: flex; flex-direction: column; background: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
          <div class="offer-ribbon" style="background: var(--primary); color: #fff; padding: 12px 24px; font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Energia Elettrica · 100% Green</div>
          <div class="offer-body" style="padding: 40px; display: flex; flex-direction: column; flex-grow: 1;">
            <div style="font-size: 28px; font-weight: 800; margin-bottom: 8px;">Tris Luce Green</div>
            <img src="https://www.energiacomune.com/img/ecom_logo-2048x270.png" alt="Energia Comune" style="height: 24px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 32px; filter: brightness(0); align-self: flex-start;">

            <div style="background: #FAFAFA; border-radius: 16px; padding: 24px; margin-bottom: 32px; border: 1px solid #F4F4F5;">
              <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Corrispettivo per il consumo (F1/F2/F3)</div>
              <div style="font-size: 32px; font-weight: 800; color: var(--primary); margin-bottom: 4px;">€ 0,049500<span style="font-size: 16px; color: #71717A;">/kWh</span></div>
              <div style="font-size: 14px; color: #A1A1AA; font-weight: 500;">+ PUN Index GME</div>

              <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #E4E4E7;">
                <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Corrispettivo annuo</div>
                <div style="font-size: 24px; font-weight: 800; color: #18181B;">457,80 €<span style="font-size: 14px; color: #71717A;">/POD/anno</span></div>
                <div style="font-size: 13px; color: #A1A1AA;">Fisso e invariabile per 12 mesi</div>
              </div>
            </div>

            <ul style="list-style: none; padding: 0; margin: 0 0 32px; display: flex; flex-direction: column; gap: 16px; color: #3F3F46; font-size: 16px;">
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> <b>Energia 100% green</b></li>
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Prezzo indicizzato al PUN Index GME</li>
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Richiesta entro il 30/06/2026</li>
            </ul>

            <div style="font-size: 12px; color: #A1A1AA; margin-bottom: 24px;">Codice offerta: 028056ESVFL02XX0000TRISLUCEGREEN</div>

            <a href="contatti.php?offerta=Tris%20Luce%20Green" class="btn-primary" style="margin-top: auto; display: block; text-align: center; background: var(--primary); color: #fff; padding: 16px; border-radius: 99px; text-decoration: none; font-weight: 700; font-size: 16px;">Richiedi Tris Luce Green</a>
          </div>
        </div>

        <!-- TRIS GAS -->
        <div class="offer-card" style="border: 1px solid #E4E4E7; border-radius: 24px; overflow: hidden; display: flex; flex-direction: column; background: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
          <div class="offer-ribbon" style="background: #D97706; color: #fff; padding: 12px 24px; font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Gas Naturale</div>
          <div class="offer-body" style="padding: 40px; display: flex; flex-direction: column; flex-grow: 1;">
            <div style="font-size: 28px; font-weight: 800; margin-bottom: 8px;">Tris Gas</div>
            <img src="https://www.energiacomune.com/img/ecom_logo-2048x270.png" alt="Energia Comune" style="height: 24px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 32px; filter: brightness(0); align-self: flex-start;">

            <div style="background: #FAFAFA; border-radius: 16px; padding: 24px; margin-bottom: 32px; border: 1px solid #F4F4F5;">
              <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Corrispettivo per il consumo (M)</div>
              <div style="font-size: 32px; font-weight: 800; color: #D97706; margin-bottom: 4px;">€ 0,210000<span style="font-size: 16px; color: #71717A;">/Smc</span></div>
              <div style="font-size: 14px; color: #A1A1AA; font-weight: 500;">+ Indice PSV</div>

              <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #E4E4E7;">
                <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Corrispettivo annuo</div>
                <div style="font-size: 24px; font-weight: 800; color: #18181B;">457,80 €<span style="font-size: 14px; color: #71717A;">/PdR/anno</span></div>
                <div style="font-size: 13px; color: #A1A1AA;">Fisso e invariabile per 12 mesi</div>
              </div>
            </div>

            <ul style="list-style: none; padding: 0; margin: 0 0 32px; display: flex; flex-direction: column; gap: 16px; color: #3F3F46; font-size: 16px;">
              <li style="display: flex; gap: 12px;"><span style="color: #D97706; font-weight: 800;">✓</span> Prezzo indicizzato al PSV</li>
              <li style="display: flex; gap: 12px;"><span style="color: #D97706; font-weight: 800;">✓</span> Corrispettivo annuo fisso per 12 mesi</li>
              <li style="display: flex; gap: 12px;"><span style="color: #D97706; font-weight: 800;">✓</span> Richiesta entro il 30/06/2026</li>
            </ul>

            <div style="font-size: 12px; color: #A1A1AA; margin-bottom: 24px;">Codice offerta: 028056GSVML02XX0000000000TRISGAS</div>

            <a href="contatti.php?offerta=Tris%20Gas" class="btn-primary" style="margin-top: auto; display: block; text-align: center; background: #D97706; color: #fff; padding: 16px; border-radius: 99px; text-decoration: none; font-weight: 700; font-size: 16px;">Richiedi Tris Gas</a>
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
          <img src="team_new.jpg" style="width: 100%; border-radius: 16px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
        </div>
      </div>
    </div>
  </section>

  <section class="section" style="padding: 60px 20px;">
    <p class="price-disclaimer" id="price-disclaimer" style="max-width: 1000px; margin: 0 auto; font-size: 13px; line-height: 1.7; color: #A1A1AA; text-align: justify;">
      * Offerte nel Mercato Libero riservate ai clienti finali titolari di utenze di tipo Domestico. Le Condizioni Tecnico-Economiche (CTE) prevalgono sulle Condizioni Generali di Fornitura (CGF), ove discordanti, e sono applicabili a condizione che la richiesta sia effettuata entro il 30/06/2026, con invio bollette tramite solo Mail o solo Posta e pagamento mediante le modalità ammesse (Addebito su Conto SDD, Addebito su Carta, PagoPA, Bonifico Bancario o Bollettino Postale, secondo l'offerta). I corrispettivi definiti dal venditore hanno una validità di 12 mesi decorrenti dalla data di attivazione della fornitura.
      <strong>Luce Green (Family/Tris):</strong> Corrispettivo per il consumo Fn = PUN Index GME + α (α1 = α2 = α3 = 0,049500 €/kWh, perdite di rete incluse), oltre al corrispettivo annuo fisso (397,80 €/POD/anno Family · 457,80 €/POD/anno Tris). Si applica inoltre il corrispettivo di dispacciamento Cdispd definito da ARERA nel TIV. Il PUN Index GME (Maggio 2026) è stato pari a F1 0,107170 €/kWh, F2 0,131440 €/kWh, F3 0,120810 €/kWh; valori massimi negli ultimi 12 mesi (Marzo 2026): F1 0,143020 €/kWh, F2 0,153910 €/kWh, F3 0,138090 €/kWh.
      <strong>Gas (Family/Tris):</strong> Corrispettivo per il consumo M = PSV + α (α = 0,210000 €/Smc), oltre al corrispettivo annuo fisso (397,80 €/PdR/anno Family · 457,80 €/PdR/anno Tris). L'indice PSV (Maggio 2026) è stato pari a 0,501752 €/Smc; valore massimo negli ultimi 12 mesi: 0,566178 €/Smc (Febbraio 2025).
    </p>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
