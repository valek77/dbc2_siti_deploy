<?php
require __DIR__ . '/_config.php';
$pageTitle = 'Tariffe ' . $OPERATORE['nome_marketing'];
include __DIR__ . '/header.php';
?>

  <section class="hero-page" style="background: #FAFAFA; padding: 120px 24px 80px; text-align: center;">
    <div class="container" style="max-width: 800px; margin: 0 auto;">
      <div style="margin-bottom: 20px; display: flex; align-items: center; justify-content: center; gap: 12px; color: #71717A; font-weight: 700; text-transform: uppercase; font-size: 14px; letter-spacing: 1px;">
        Partner Ufficiale <img src="<?= $OPERATORE['logo_url'] ?>" style="height: 20px; width: auto; object-fit: contain; filter: brightness(0);" alt="<?= $OPERATORE['nome_marketing'] ?>">
      </div>
      <h1 style="font-size: clamp(36px, 5vw, 56px); line-height: 1.1; font-weight: 800; color: #18181B; margin-bottom: 24px;">
        <span style="color: var(--primary);">ReCasa_Luce B13</span>
      </h1>
      <p style="font-size: 19px; color: #71717A; margin-bottom: 0; line-height: 1.6;">
        Mercato Libero - Domestico. Offerta sottoscrivibile entro il 31/08/2026.
      </p>
    </div>
  </section>

  <section class="section" style="padding: 60px 0 100px;">
    <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 0 24px;">

      <div class="offers-grid" style="display: grid; grid-template-columns: 1fr; max-width: 720px; margin: 0 auto;">
        <div class="offer-card" style="border: 1px solid #E4E4E7; border-radius: 24px; overflow: hidden; display: flex; flex-direction: column; background: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
          <div class="offer-ribbon" style="background: var(--primary); color: #fff; padding: 12px 24px; font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Energia Elettrica</div>
          <div class="offer-body" style="padding: 40px; display: flex; flex-direction: column; flex-grow: 1;">
            <div style="font-size: 28px; font-weight: 800; margin-bottom: 8px;">ReCasa_Luce B13</div>
            <img src="<?= $OPERATORE['logo_url'] ?>" alt="<?= $OPERATORE['nome_marketing'] ?>" style="height: 24px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 32px; filter: brightness(0); align-self: flex-start;">

            <div style="background: #FAFAFA; border-radius: 16px; padding: 24px; margin-bottom: 32px; border: 1px solid #F4F4F5;">
              <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Corrispettivo per il consumo (F1/F2/F3)</div>
              <div style="font-size: 32px; font-weight: 800; color: var(--primary); margin-bottom: 4px;">PUN Index GME + 0,13 €/kWh</div>

              <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #E4E4E7;">
                <div style="font-size: 12px; text-transform: uppercase; color: #71717A; font-weight: 700; margin-bottom: 8px; letter-spacing: 0.5px;">Costi di commercializzazione</div>
                <div style="font-size: 24px; font-weight: 800; color: #18181B;">552,00 €<span style="font-size: 14px; color: #71717A;">/POD/anno</span></div>
              </div>
            </div>

            <ul style="list-style: none; padding: 0; margin: 0 0 32px; display: flex; flex-direction: column; gap: 16px; color: #3F3F46; font-size: 16px;">
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> <b>Codice offerta:</b> 036052ENVFL01XXPEI2026NORMALBOL9</li>
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Mercato Libero - Domestico</li>
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Sottoscrivibile entro il 31/08/2026</li>
              <li style="display: flex; gap: 12px;"><span style="color: var(--primary); font-weight: 800;">✓</span> Corrispettivi validi 12 mesi dalla data di attivazione</li>
            </ul>

            <a href="contatti.php?offerta=ReCasa_Luce%20B13" class="btn-primary" style="margin-top: auto; display: block; text-align: center; background: var(--primary); color: #fff; padding: 16px; border-radius: 99px; text-decoration: none; font-weight: 700; font-size: 16px;">Richiedi ReCasa_Luce B13</a>
          </div>
        </div>
      </div>

      <div style="margin-top: 64px; background: #fff; border: 1px solid #E4E4E7; border-radius: 24px; padding: 40px;">
        <h2 style="font-size: clamp(24px, 3vw, 32px); font-weight: 800; color: #18181B; margin-bottom: 24px;">Condizioni dell'offerta</h2>

        <p style="font-size: 16px; color: #3F3F46; line-height: 1.7; margin-bottom: 16px;">
          L'offerta non è sottoscrivibile se per il punto di fornitura è già attiva (o è in corso di attivazione) un'offerta del Fornitore, fatta eccezione per il verificarsi dei casi previsti dall'art. 2.10 e 13.3 delle CGC.
        </p>

        <p style="font-size: 16px; color: #3F3F46; line-height: 1.7; margin-bottom: 32px;">
          Le presenti Condizioni Tecnico Economiche “CTE” integrano le condizioni generali di contratto per la somministrazione di energia elettrica e/o gas naturale per il mercato libero domestico del Fornitore e con le Condizioni Generali di Contratto e la Proposta di Adesione costituiscono il contratto.
        </p>

        <h3 style="font-size: 20px; font-weight: 800; color: #18181B; margin-bottom: 16px;">VENDITA DI ENERGIA ELETTRICA</h3>
        <h4 style="font-size: 16px; font-weight: 700; color: #18181B; margin-bottom: 8px;">Corrispettivo energia elettrica</h4>
        <p style="font-size: 14px; color: #71717A; margin-bottom: 16px;">Corrispettivo per il consumo (al lordo delle perdite di rete) — Corrispettivi definiti dal venditore per i primi 12 mesi</p>

        <table style="width: 100%; border-collapse: collapse; margin-bottom: 32px; font-size: 15px;">
          <thead>
            <tr>
              <th style="text-align: left; padding: 12px; border-bottom: 2px solid #E4E4E7; color: #71717A; font-weight: 700;">Voce</th>
              <th style="text-align: left; padding: 12px; border-bottom: 2px solid #E4E4E7; color: #71717A; font-weight: 700;">Valore</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 12px; border-bottom: 1px solid #F4F4F5; color: #3F3F46;">Corrispettivo per il consumo</td>
              <td style="padding: 12px; border-bottom: 1px solid #F4F4F5; color: #18181B; font-weight: 700;">PUN Index GME + 0,13 €/kWh</td>
            </tr>
            <tr>
              <td style="padding: 12px; color: #3F3F46;">Costi di commercializzazione</td>
              <td style="padding: 12px; color: #18181B; font-weight: 700;">552,00 €/POD/anno</td>
            </tr>
          </tbody>
        </table>

        <h4 style="font-size: 16px; font-weight: 700; color: #18181B; margin-bottom: 16px;">Ulteriore informazione di dettaglio relativa ai corrispettivi definiti dal venditore</h4>

        <p style="font-size: 15px; color: #3F3F46; line-height: 1.7; margin-bottom: 16px;">
          <strong>PUN Index GME:</strong> è l'indice di riferimento del prezzo all'ingrosso dell'energia elettrica negoziata sul Mercato del Giorno Prima (MGP) presso la Borsa Elettrica Italiana (IPEX - Italian Power Exchange). Il PUN Index GME rappresenta la media pesata nazionale dei prezzi zonali di vendita dell'energia elettrica per ogni ora e per ogni giorno. Il dato nazionale è un importo che viene calcolato sulla media di diversi fattori, e che tiene conto delle quantità e dei prezzi formati nelle diverse zone d'Italia e nelle diverse ore della giornata. Per i kWh di energia elettrica prelevati mensilmente dalla rete e misurati dal Distributore, maggiorati delle perdite di rete, il Cliente corrisponderà al Venditore il prezzo medio per fasce come pubblicato sul sito del Gestore Mercati Energetici applicato per ciascuna fascia oraria (F0, F1, F2, F3), al quale verrà sommata lo spread di F1 0,13 €/kWh, F2 0,13 €/kWh, F3 0,13 €/kWh. Il valore massimo dell'indice PUN Index GME negli ultimi 12 mesi è 0,151261 €/kWh per la fascia F1 riferito al mese di gennaio 26, 0,15391 €/kWh per la fascia F2 riferito al mese di marzo 26, 0,13809 €/kWh per la fascia F3 riferito al mese di marzo 26.
        </p>

        <p style="font-size: 15px; color: #3F3F46; line-height: 1.7; margin-bottom: 16px;">
          <strong>Costi di commercializzazione:</strong> fatturati mensilmente in bolletta, invariabili per tutta la durata delle Condizioni Economiche.
        </p>

        <p style="font-size: 15px; color: #3F3F46; line-height: 1.7; margin-bottom: 16px;">
          I valori dei corrispettivi definiti dal venditore hanno una validità di 12 mesi decorrenti dalla data di attivazione della fornitura e sono indicati al lordo delle perdite di rete, pari ad oggi al 10% dell'energia prelevata in Bassa Tensione, e al netto di IVA e imposte.
        </p>

        <p style="font-size: 15px; color: #3F3F46; line-height: 1.7; margin-bottom: 0;">
          <strong>Dispacciamento CDISPD:</strong> è il corrispettivo, espresso in centesimi di euro/kWh, a copertura dei costi di dispacciamento per l'energia elettrica all'ingrosso, inclusi gli oneri netti di approvvigionamento della capacità di cui al Titolo 3 della deliberazione ARG/elt 98/11, al netto del corrispettivo di sbilanciamento effettivo e del corrispettivo di aggregazione delle misure. Tale corrispettivo è aggiornato mensilmente da ARERA, comprensivo delle perdite di rete pari a 0,015531 €/kWh nel mese di aprile 2026.
        </p>
      </div>

    </div>
  </section>

  <!-- BUSINESS -->
  <section class="section" style="background: #FAFAFA; padding: 80px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
      <div style="background: #fff; border-radius: 24px; padding: 48px; border: 1px solid #E4E4E7; display: flex; flex-wrap: wrap; gap: 48px; align-items: center;">
        <div style="flex: 1; min-width: 300px;">
          <h2 style="font-size: 32px; font-weight: 800; margin-bottom: 16px;">Sei un'azienda?</h2>
          <p style="font-size: 18px; color: #71717A; line-height: 1.6; margin-bottom: 32px;">Le esigenze di un'attività commerciale sono diverse da quelle di una casa. Ecco perché <?= $OPERATORE['nome_marketing'] ?> ha pensato a soluzioni su misura per il mercato Business.</p>
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
      * Offerta nel Mercato Libero riservata ai clienti finali titolari di utenze di tipo Domestico. Le Condizioni Tecnico-Economiche (CTE) prevalgono sulle Condizioni Generali di Fornitura (CGF), ove discordanti, e sono applicabili a condizione che la richiesta sia effettuata entro il 31/08/2026. I corrispettivi definiti dal venditore hanno una validità di 12 mesi decorrenti dalla data di attivazione della fornitura e sono indicati al lordo delle perdite di rete, pari ad oggi al 10% dell'energia prelevata in Bassa Tensione, e al netto di IVA e imposte.
    </p>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
