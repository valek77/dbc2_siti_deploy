# DBC2 Lead per Elementor

Plugin WordPress che aggiunge ai form di **Elementor Pro** l'azione **"Invia lead a DBC2"**.
A ogni invio del form, il server WordPress inoltra il lead a `POST {DBC2_API_BASE}/lead`
con il token Sanctum. Il token non arriva mai al browser.

Fa le stesse cose di `_shared/lead_proxy.php` dei siti PHP: stessi campi, stesse regole
della guida "Integrazione API Lead" di DBContatti, stessi messaggi di errore di `lead-form.js`.

Requisiti: WordPress 5.8+, PHP 7.4+, **Elementor Pro** 3.5+. Una landing DBC2 per sito.

## Installazione

1. Comprimi la cartella `dbc2-elementor-lead` in uno zip e caricalo da
   *Plugin → Aggiungi nuovo → Carica plugin*, oppure copiala in `wp-content/plugins/`.
2. Attiva il plugin.
3. In `wp-config.php`, prima di `/* That's all, stop editing! */`:

   ```php
   define('DBC2_TOKEN', '2|xxxxx');   // obbligatorio, segreto
   ```

   Facoltative:

   ```php
   define('DBC2_API_BASE', 'https://dbc2.datalia.it/api');  // default
   define('DBC2_LANDING_PAGE_ID', '123');   // in alternativa alla pagina Impostazioni
   define('DBC2_IP_HEADER', 'HTTP_CF_CONNECTING_IP');  // solo dietro un CDN/proxy fidato
   ```

4. *Impostazioni → DBC2 Lead*: inserisci il `LANDING_PAGE_ID` (se non è in wp-config.php).
   La pagina mostra la landing letta da DBC2 (URL, azienda, operatore, consensi mostrati)
   e avvisa se l'URL registrato non corrisponde al dominio del sito.

Il token va in `wp-config.php` e non nel database, così non finisce nei backup del DB
e non è visibile a chi accede al pannello.

## Configurare il form in Elementor

1. Nel widget **Form**, scheda *Contenuto → Azioni dopo l'invio*, aggiungi **Invia lead a DBC2**.
2. Nella sezione **DBC2 Lead** indica l'**ID** di ciascun campo
   (lo trovi nel campo, scheda *Avanzate → ID*):

   | Impostazione | Default | Note |
   |---|---|---|
   | Nome e cognome | `name` | obbligatorio |
   | Telefono | `telefono` | obbligatorio, cellulare italiano |
   | Email | `email` | facoltativo |
   | Consenso ricontatto (`consenso_0`) | `consenso_ricontatto` | campo Accettazione o Casella di controllo |
   | Consenso privacy (`consenso_1`) | `consenso_privacy` | campo Accettazione o Casella di controllo |
   | Consenso marketing (`consenso_2`) | vuoto | facoltativo |
   | offerta_id | vuoto | se vuoto usa `?offerta=` nell'URL della pagina |

3. Un consenso conta come dato se il campo ha un valore (casella spuntata).
   Ricontatto e privacy sono obbligatori quando la landing li mostra
   (`mostra_consenso_0/1`); se DBC2 non risponde, sono considerati obbligatori.
   Il marketing non è mai obbligatorio.

## Cosa viene inviato

```json
{
  "nome_cognome": "…", "telefono": "3331234567", "email": "…|null",
  "landing_page_url": "https://<url registrato della landing>",
  "consenso_0": true, "consenso_1": true, "consenso_2": false,
  "ip": "<IP visitatore>", "user_agent": "<UA visitatore>",
  "offerta_id": 12
}
```

- `landing_page_url` è `landing_page.url` da `GET /landing-pages/{id}`, in cache 1 ora
  (transient). Dopo un errore non riprova per 5 minuti e usa l'ultima copia valida.
  Se l'URL registrato è di un altro dominio, usa il dominio del sito e scrive un avviso nel log.
- **Nessun retry**: ogni 201 fa partire un SMS.
- Il telefono viene ridotto a sole cifre (ammesso il `+` iniziale).

## Errori

| Risposta API | Cosa vede il visitatore |
|---|---|
| 201 | messaggio di successo del form Elementor |
| 422 | messaggio specifico (telefono, email, nome) sotto il campo interessato |
| 429 | "Troppe richieste in poco tempo. Riprova più tardi." |
| 401/403, 5xx, timeout | "Errore invio. Riprova tra qualche minuto." |

Gli amministratori collegati vedono anche il motivo tecnico (token mancante, campo non
trovato, 401/403). I dettagli vanno nel log PHP con il prefisso `dbc2-elementor-lead:`;
il token non viene mai scritto.

Le altre azioni del form (email, raccolta invii) vengono eseguite comunque, anche se
l'invio a DBC2 fallisce: è il comportamento standard di Elementor Pro.
