# Runbook — "Rendi dinamico il sito nella cartella XYZ"

Procedura per convertire un sito **HTML statico** di questo repo nell'architettura
**PHP vanilla con dati azienda da API** (nessun framework, nessun build step).

I dati (landing page, operatore energetico, azienda) sono letti a runtime dalla
**API NUOVA** Datalia `GET /landing-pages/{LANDING_PAGE_ID}`, esposta dal cuore
condiviso `_shared/config.php`. Vedi la guida completa alle variabili in
**`_shared/LEGGIMI.md`**.

Sito di riferimento (pilota, già convertito sull'API nuova):
**`ActionSrl/semplice.locura-srl.it`**. In caso di dubbio, copiare il pattern da lì.

Comando d'innesco: l'utente dirà *"Rendi dinamico il sito nella cartella XYZ"*.

> **API vecchia (DEPRECATA).** Esiste ancora la variante `GET /companies/{COMPANY_ID}`
> con le variabili "piatte" (`$p_iva`, `$company_name`, …) e `$brand`. È mantenuta
> attiva per i siti già in produzione ma **NON va usata per i nuovi**: usare sempre
> `LANDING_PAGE_ID`. Un sito già scritto su questa API va **convertito** all'API nuova:
> non si riparte da zero, si segue il **§7 — Conversione da API vecchia a nuova**.
> Dettagli sulla compatibilità in `_shared/LEGGIMI.md`.

---

## Principio guida (vale per entrambi gli scenari)

Due regole non negoziabili, da rispettare in ogni conversione:

1. **Non si tocca la grafica.** Si analizza il sito **così com'è** e si lascia intatto:
   stesso markup, stesso `style.css`, stessi inline-style, stesse immagini/asset, stesso
   layout. La conversione è **solo** infrastruttura PHP + sostituzione di testi. Nessun
   ridisegno, nessun ritocco estetico non richiesto.
2. **Si sostituisce ogni testo statico che ha una variabile API.** Lo scopo della
   conversione è che i dati di landing, operatore energetico e azienda non restino scritti
   a mano ma arrivino a runtime dall'API. La sostituzione vale per **qualunque occorrenza in
   qualunque punto** (testata, footer, corpo pagina, pagine legali, testi dei consensi,
   script inline), non solo per la riga legale del footer. Quello che l'API **non** modella
   resta statico come testo editoriale (vedi §3 e §0).

---

## 0. Prima di iniziare

### 0.1 Triage — che tipo di sito è?

Lo stesso comando d'innesco copre **due scenari d'ingresso** diversi: prima di toccare nulla,
capire in quale ci si trova.

- **Scenario A — sito HTML statico.** File `.html`, dati azienda **hardcoded** nel markup,
  nessun `_config.php` / `.env`. → Percorso completo statico→PHP: segui **§1–§6**.
- **Scenario B — sito già PHP sull'API vecchia.** Già convertito in passato sull'endpoint
  deprecato `GET /companies/{COMPANY_ID}`. → **Non** ri-convertire da zero: vai al
  **§7 — Conversione da API vecchia a nuova** (e usa le §1.1/§2/§4 come riferimento).

Come riconoscere lo **Scenario B** in pratica (basta un indizio):
- `.env` contiene `COMPANY_ID` (e tipicamente `SITO_WEB`, `OPERATORE_ENERGETICO`) e **non**
  `LANDING_PAGE_ID`;
- le pagine usano le variabili **piatte** (`$company_name`, `$p_iva`, `$pec`, `$brand`, …)
  invece dei tre array `$LANDING_PAGE`/`$OPERATORE`/`$COMPANY`;
- riferimenti all'endpoint `/companies/`.

> `_shared/config.php` sceglie l'API vecchia **esattamente quando** `LANDING_PAGE_ID` è vuoto
> e `COMPANY_ID` è valorizzato (`_shared/config.php:300`). Valorizzare `LANDING_PAGE_ID` nel
> `.env` è quindi ciò che fa passare il sito all'API nuova.

### 0.2 Dato da chiedere all'utente (entrambi gli scenari)

Serve un solo dato che NON è nel repo:

- **`LANDING_PAGE_ID`** della landing (numero) — indispensabile per la chiamata API.
  Da esso l'API restituisce TUTTO il resto: landing page, operatore energetico e
  azienda (ragione sociale, P.IVA, sede, PEC, logo, URL del sito, ecc.).

Il **token API** (`DBC2_TOKEN`) e l'`DBC2_API_BASE` di norma **non** stanno nel `.env`:
arrivano dall'ambiente di sistema del server (PHP-FPM `env[]` / Apache `SetEnv`),
condivisi da tutti i siti del tenant (vedi §1.1). **Mai** scrivere il token in un file
versionato né stamparlo.

Decisioni editoriali/legali da concordare con l'utente (incidono sul footer e sulle
pagine legali — vedi §3):
- i campi che l'API **non fornisce** (es. R.E.A., capitale sociale se assente)
  spariscono, oppure restano statici come fallback?
- i contatti (telefono/email) si mostrano **solo se presenti** in API o si tiene un
  valore statico?

## 1. Infrastruttura PHP (copiare dal pilota)

Copiare nella cartella del sito, adattando dove serve:

| File | Note |
|------|------|
| `_config.php` | **Stub di 2 righe** (vedi sotto), uguale per ogni sito. La logica vera è in `_shared/config.php`. |
| `header.php`  | Testata + menu. Brand e logo da `$LANDING_PAGE`/`$COMPANY`. Imposta `$brandName`. |
| `footer.php`  | Footer + riga legale costruita SOLO dai campi presenti in `$COMPANY`. |

> **Cuore condiviso.** La logica (lettura `.env`, scelta API, chiamata, cache,
> esposizione variabili) vive in **un solo file**: `_shared/config.php` alla root del
> repo (fuori da ogni docroot). Ogni sito ha solo questo stub `_config.php`, **identico**
> per tutti, che cattura la cartella del sito e include il file condiviso:
> ```php
> <?php
> $SITE_DIR = __DIR__;
> require dirname(__DIR__, 2) . '/_shared/config.php';
> ```
> `$SITE_DIR` fa sì che `.env` e `.company-cache.json` restino **nella cartella del
> sito**. Non usare un symlink al posto dello stub: PHP risolve `__DIR__` al path reale
> del target e perderebbe la cartella del sito. Lo stub presuppone il sito a 2 livelli
> sotto la root (`Cliente/dominio/`), com'è per tutti i siti attuali.

Poi creare il **`.env`** del sito:

```
LANDING_PAGE_ID=<numero>
```

Tutto qui: `DBC2_API_BASE` e `DBC2_TOKEN` (segreto) arrivano dall'ambiente di sistema.
Con l'API nuova **non servono** `SITO_WEB` né `OPERATORE_ENERGETICO`: l'URL del sito e
i dati dell'operatore arrivano dall'API. Esempi pronti: `_shared/.env.example.api-nuova`
(e `_shared/.env.example.api-vecchia` per la variante deprecata).

> ⚠️ Il `.gitignore` di root ignora `**/.company-cache.json` ma **NON** `.env`: i `.env`
> di questo repo sono versionati (non contengono il token, che sta nell'ambiente). Il
> `.env` con solo `LANDING_PAGE_ID` può quindi essere committato senza segreti.

### 1.1 Da dove `_config.php` legge le variabili

`get_env_var()` cerca ogni variabile **prima nell'ambiente di sistema**, poi nel `.env`.
Ordine: `getenv()` → `$_SERVER` → `$_ENV` → `.env`. Ogni valore è ripulito da spazi e
virgolette di troppo (`clean_env_value()`). Quindi metti il **token segreto** in uno di:

- **PHP-FPM** (SAPI `fpm-fcgi`) — nel pool, es. `/etc/php/8.4/fpm/pool.d/www.conf`:
  ```ini
  env[DBC2_API_BASE] = "https://dbc2.datalia.it/api"
  env[DBC2_TOKEN] = "2|xxxxxxxx..."
  ```
  poi `sudo systemctl restart php8.4-fpm`.
- **Apache mod_php** — `/etc/apache2/envvars` con `export DBC2_TOKEN=...` (poi
  `systemctl restart apache2`), oppure `SetEnv DBC2_TOKEN "..."` nel VirtualHost.

> ⚠️ **Virgolette obbligatorie** nel pool FPM (e nei file INI) se il valore contiene
> caratteri riservati come `|`, `&`, `~`, `!`, `(`, `)`, `{`, `}`, `^`, `"`. I token
> Sanctum hanno forma `<id>|<random>`: **senza** virgolette il `|` tronca il valore →
> API `401 Unauthenticated`.

Diagnosi rapida del `401`: con `DEBUG_MODE = true` in `_shared/config.php` i log mostrano
la fonte di ogni variabile e l'`HTTP Code`, oltre a **quale API** viene usata. Per
verificare il token in isolamento:
`curl -i -H "Authorization: Bearer <token>" <API_BASE>/landing-pages/<id>`.

## 2. Variabili disponibili nelle pagine

Con `LANDING_PAGE_ID` impostato, `_shared/config.php` popola **tre array associativi**,
con valori **già resi sicuri per l'HTML** (stampare con `<?= ... ?>`, **senza** `e()`):

- **`$LANDING_PAGE`** — landing page. Chiavi: `id, url, titolo, nome_portale,
  operatore_energetico_id, company_id, p_iva, sede_legale, sede_operativa, pec,
  privacy_version, mostra_consenso_0, mostra_consenso_1, mostra_consenso_2, logo_url,
  logo2_url, created_at, updated_at`.
- **`$OPERATORE`** — operatore energetico. Chiavi: `id, nome_marketing, nome_legale,
  indirizzo, partita_iva, logo_url, logo2_url, created_at, updated_at`.
- **`$COMPANY`** — azienda titolare. Chiavi: `id, company_name, nome_commerciale,
  parent_id, azienda_madre, p_iva, sede_legale, sede_operativa, pec, email_dpo,
  email_supporto, capitale_sociale, telefono, bpg_customer_id, bpg_customer_name,
  logo_url, logo2_url, created_at, updated_at`.

Inoltre: **`$brandName`** è impostato da `header.php` (= `$LANDING_PAGE['nome_portale']`,
con fallback alla ragione sociale) ed è disponibile nel corpo pagina dopo l'include.
Helper: **`e($testo)`** per rendere sicuro un valore NON già pulito (es. i `$pageTitle`
impostati a mano).

Un campo mancante è **stringa vuota `""`**: gatare l'output con
`<?php if ($COMPANY['telefono'] !== '') { ?>…<?php } ?>`. Gli array hanno SEMPRE tutte
le chiavi, anche quando vuote, quindi non si incontrano mai variabili indefinite.

> I `mostra_consenso_0/1/2` di `$LANDING_PAGE` indicano quali consensi mostrare nel form
> (vedi §4). Sono già stringhe: `'1'` = mostra, `''` = nascondi (un `if (...)` funziona).

## 3. Convertire ogni pagina `.html` → `.php`

Per ciascuna pagina (`index`, `chi-siamo`, `tariffe`, `contatti`, `privacy-policy`,
`condizioni-utilizzo`, ed eventuale `revoke`):

1. **Rinominare** `.html` → `.php`.
2. **Sostituire** la testata hardcoded (da `<!doctype html>` fino a `</header>`) con il
   preambolo + include. Schema in testa al file:
   ```php
   <?php
   require __DIR__ . '/_config.php';
   $pageTitle = 'Chi Siamo';                 // solo la parte specifica: header.php aggiunge " — <brand>"
   $pageDescription = '...';                  // facoltativo: <meta name="description">
   $pageHead = <<<'CSS'                        // facoltativo: <style> della pagina (verbatim)
   <style> … </style>
   CSS;
   include __DIR__ . '/header.php';
   ?>
   … contenuto della pagina …
   ```
3. **Sostituire** il footer hardcoded (da `<footer …>` fino a `</html>`, incluso il
   `<script src="cb.js">`) con l'include. Se la pagina ha uno `<script>` proprio, passarlo
   via `$pageScripts` (footer.php lo emette e poi aggiunge `cb.js`):
   ```php
   <?php
   $pageScripts = <<<'HTML'
   <script> … script specifico della pagina … </script>
   HTML;
   include __DIR__ . '/footer.php';
   ?>
   ```
   Se non c'è script di pagina: `<?php include __DIR__ . '/footer.php'; ?>`.
4. **Aggiornare i link interni** da `.html` → `.php` (nav, footer, pulsanti, link consenso,
   e anche dentro gli script inline, comprese le forme `contatti.html?offerta=…#…`).
5. **Sostituire i dati hardcoded con le variabili API** (scansione esaustiva). Non basta
   sistemare il footer: per ogni dato sotto, **cercare ogni occorrenza nel sito** (Grep
   sull'intera cartella, vedi nota in fondo) e sostituirla con la variabile corrispondente.
   | Dato hardcoded nel sito statico | Variabile |
   |---|---|
   | brand visualizzato (testata/footer) | `$brandName` (= `$LANDING_PAGE['nome_portale']`) |
   | ragione sociale / Titolare legale | `$COMPANY['company_name']` |
   | P.IVA / Codice Fiscale | `$COMPANY['p_iva']` |
   | sede legale | `$COMPANY['sede_legale']` |
   | PEC | `$COMPANY['pec']` |
   | email assistenza/contatto | `$COMPANY['email_supporto']` (gatare) |
   | email DPO | `$COMPANY['email_dpo']` (gatare) |
   | telefono | `$COMPANY['telefono']` (gatare) |
   | capitale sociale | `$COMPANY['capitale_sociale']` (gatare) |
   | logo testata | `$LANDING_PAGE['logo_url']` (fallback immagine locale) |
   | logo footer (sfondo scuro) | `$LANDING_PAGE['logo2_url']` (fallback immagine locale) |
   | operatore energetico — nome legale (consensi/testi legali) | `$OPERATORE['nome_legale']` |
   | operatore energetico — nome marketing (claim/badge) | `$OPERATORE['nome_marketing']` |
   | URL del sito nei testi legali | `$LANDING_PAGE['url']` |

   I dati legali (footer, privacy, condizioni) NON vanno più scritti a mano: arrivano
   dall'API. Costruire la riga legale del footer **solo dai campi presenti** (gatare ogni
   pezzo con `if ($COMPANY['x'] !== '')`), come in `footer.php` del pilota — così i campi
   non forniti dall'API (es. R.E.A.) semplicemente non compaiono.

   **Metodo di scansione.** Prima di considerare chiusa una pagina, fare Grep sull'intera
   cartella del sito per ciascun **valore noto** ancora presente nel sito statico (la vecchia
   ragione sociale, la vecchia P.IVA, la vecchia PEC, il vecchio telefono, il vecchio nome
   operatore, il vecchio URL): non deve restare **nessuna occorrenza hardcoded** (si ricollega
   al controllo finale del §6).

   > **Attenzione (scelte da concordare).** Alcuni dati delle pagine legali NON sono
   > modellati dall'API (es. email di servizio `privacy@`, `dpo@` nella privacy policy):
   > di norma si lasciano **statici** come testo editoriale. I contatti telefono/email del
   > sito si **gatano** sui campi `$COMPANY` e compaiono solo quando l'API li valorizza.

## 4. Form contatti — contratto DOM invariato

`contatti.php` include `lead-form.js` (passarlo via `$pageScripts`). Il form NON va
ridisegnato: rispettare il contratto (vedi `CLAUDE.md` › "Key shared behavior"):
- `method="POST"` (NON serve l'attributo `action`: l'invio è gestito interamente da
  `lead-form.js` con `e.preventDefault()` + `fetch()`, l'`action` HTML nativo non viene mai usato).
- ID campi: `fNome` / `fTel` / `fEmail`; submit `btnSubmit`; conferma `#conferma`.
- `name`: `nome`, `telefono`, `email`.
- consensi: `consenso_privacy` (obbligatorio) + `consenso_ricontatto` (o `consenso_commerciale`)
  + `consenso_marketing` (facoltativo).
- Nei testi dei consensi usare `<?= $OPERATORE['nome_legale'] ?>` (operatore),
  `<?= $COMPANY['company_name'] ?>` (partner commerciale) e `<?= $brandName ?>`.
- Facoltativo: gatare la visibilità dei consensi con
  `$LANDING_PAGE['mostra_consenso_0|1|2']`.

`lead-form.js` si copia invariato. `cb.js` si copia ma **il colore accento è hardcoded**:
allineare i valori esadecimali del fallback (gradiente del pulsante "Accetta" e relative
`box-shadow`) ai colori del brand del sito (in `style.css`, `--primary` / `--accent`), e
aggiornare il link `privacy-policy.html` → `.php` al suo interno.

## 5. Asset

Lasciare immagini e `style.css` specifici del sito. Tutti i riferimenti restano **relativi**.
Le custom properties di palette (`--primary`, `--accent`, …) restano in `style.css`.

## 6. Verifica

- `php -l <file>.php` su ogni pagina (e su `header.php`/`footer.php`): nessun errore.
- Render reale **senza token**: creare a mano `.company-cache.json` nella cartella del sito
  con il JSON della risposta `/landing-pages/{id}` (la cache "fresca" evita la chiamata di
  rete), poi `php <pagina>.php` da CLI o `php -S localhost:8000` e aprire `index.php`.
- Controllare l'output reso: nessun `Warning`/`Notice` PHP; footer, privacy e condizioni
  mostrano i dati corretti dell'azienda; nessun link `.html` interno residuo; nessun dato
  legale hardcoded rimasto nelle pagine.
- In **produzione** lasciare `DEBUG_MODE = false` in `_shared/config.php`. I dati API sono
  in cache 1h in `.company-cache.json`; per forzare il refresh, **cancellare** quel file.

## 7. Conversione da API vecchia a nuova (Scenario B)

Quando il sito è **già PHP sull'API vecchia** (`/companies/{COMPANY_ID}`, variabili piatte),
l'infrastruttura PHP esiste già: **non si rinomina nulla e non si rifà la grafica**. Si
cambiano solo il `.env` e i **riferimenti alle variabili**. Delta rispetto allo statico→PHP:

1. **`.env`** — rimuovere `COMPANY_ID`, `SITO_WEB`, `OPERATORE_ENERGETICO`; lasciare solo:
   ```
   LANDING_PAGE_ID=<numero>
   ```
   `DBC2_TOKEN`/`DBC2_API_BASE` restano nell'ambiente di sistema (vedi §1.1). Valorizzare
   `LANDING_PAGE_ID` è ciò che fa passare `_shared/config.php` all'API nuova
   (`_shared/config.php:300`): nessuna modifica al cuore condiviso.

2. **Mappatura variabili piatte → array** — applicare in tutte le pagine, in `header.php` e
   `footer.php`:
   | API vecchia (piatta) | API nuova |
   |---|---|
   | `$brand` | `$brandName` (= `$LANDING_PAGE['nome_portale']`) |
   | `$company_name` | `$COMPANY['company_name']` |
   | `$p_iva` | `$COMPANY['p_iva']` |
   | `$sede_legale` | `$COMPANY['sede_legale']` |
   | `$pec` | `$COMPANY['pec']` |
   | `$email_supporto` | `$COMPANY['email_supporto']` |
   | `$email_dpo` | `$COMPANY['email_dpo']` |
   | `$telefono` | `$COMPANY['telefono']` |
   | `$capitale_sociale` | `$COMPANY['capitale_sociale']` |
   | `$logo_url` / `$logo2_url` | `$LANDING_PAGE['logo_url']` / `['logo2_url']` |
   | `OPERATORE_ENERGETICO` (da `.env`) | `$OPERATORE['nome_legale']` / `$OPERATORE['nome_marketing']` |
   | `SITO_WEB` (da `.env`) | `$LANDING_PAGE['url']` |

   Le piatte restano comunque definite (vuote) con l'API nuova, quindi un riferimento
   dimenticato non genera errori ma **stampa vuoto**: per questo la scansione del punto 5 è
   indispensabile.

3. **`header.php` / `footer.php`** — allineare al pilota API-nuova: `$brandName` da
   `$LANDING_PAGE['nome_portale']` (fallback alla ragione sociale), riga legale del footer
   costruita gatando i campi `$COMPANY` (`if ($COMPANY['x'] !== '')`), come in §3.

4. **Form e consensi** (`contatti.php`) — i testi consenso che usavano `$brand` o il valore
   `OPERATORE_ENERGETICO` del `.env` passano a `$OPERATORE['nome_legale']` (operatore),
   `$COMPANY['company_name']` (partner commerciale) e `$brandName`. Opzionale: gating della
   visibilità con `$LANDING_PAGE['mostra_consenso_0|1|2']` (non disponibile sull'API vecchia).
   Il contratto DOM del form e `lead-form.js` restano invariati (§4).

5. **Scan finale** — stessa checklist del §3.5: Grep sull'intera cartella per ogni variabile
   piatta (`$brand`, `$company_name`, `$p_iva`, `$pec`, `$telefono`, …) e per ogni valore
   hardcoded residuo; **cancellare** la vecchia `.company-cache.json` (ha la forma "piatta")
   per forzare il refresh sulla risposta annidata nuova; poi verificare come al §6.

## 8. Guida utente

Non serve più copiare un `LEGGIMI.md` nella cartella del sito: la guida unica (configurazione
`.env`, variabili disponibili, avvio server di test) è centralizzata in **`_shared/LEGGIMI.md`**.
