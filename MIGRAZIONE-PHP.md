# Runbook — "Rendi dinamico il sito nella cartella XYZ"

Procedura per convertire un sito **HTML statico** di questo repo nell'architettura
**PHP vanilla con dati azienda da API** (nessun framework, nessun build step).

Sito di riferimento (pilota, già convertito): **`Risa/gowin-srl.it`**. In caso di dubbio,
copiare il pattern da lì. Confrontare sempre il sito da convertire con il pilota.

Comando d'innesco: l'utente dirà *"Rendi dinamico il sito nella cartella XYZ"*.

---

## 0. Prima di iniziare — chiedere all'utente

Servono dati che NON sono nel repo:

- **`COMPANY_ID`** dell'azienda (numero) — indispensabile per la chiamata API.
- **`SITO_WEB`** (dominio senza http, es. `www.gowin-srl.it`) — di norma = nome cartella.
- **`OPERATORE_ENERGETICO`** di cui il sito è rivenditore (es. `Hera Comm`).
- Il **token API** (`DBC2_TOKEN`): si mette nel `.env` **oppure** in una variabile di
  sistema (env Apache/PHP-FPM, vedi §1.1). **Mai** scriverlo in un file versionato né
  stamparlo. Per il token segreto è consigliata la variabile di sistema.

## 1. Infrastruttura PHP (copiare dal pilota)

Copiare nella cartella del sito, adattando dove serve:

| File | Note |
|------|------|
| `_config.php`   | Cuore: legge `.env`, chiama l'API, fa cache, espone le variabili. Di norma **identico** al pilota. |
| `header.php`    | Testata + menu condivisi. Logo da `$logo_url` (fallback `logo.png`). |
| `footer.php`    | Footer + riga legale costruita dalle variabili API. |
| `.env.example`  | Template versionato (senza segreti). |

Poi creare il **`.env`** reale (NON versionato) con i valori del punto 0:

```
DBC2_API_BASE=https://dbc2.datalia.it/api
DBC2_TOKEN=<token segreto>
COMPANY_ID=<numero>
SITO_WEB=www.esempio.it
OPERATORE_ENERGETICO=<operatore>
```

Il `.gitignore` di root già ignora `**/.env` e `**/.company-cache.json` — verificare, non
serve aggiungere nulla.

### 1.1 Da dove `_config.php` legge le variabili

`_config.php` (via `get_env_var()`) cerca ogni variabile **prima nell'ambiente di sistema**,
poi nel `.env` come fallback. L'ordine è: `getenv()` → `$_SERVER` → `$_ENV` → `.env`. Ogni
valore viene ripulito da spazi e virgolette di troppo da `clean_env_value()`. Quindi puoi
mettere le variabili (in particolare il **token segreto**) in uno di questi posti:

- **PHP-FPM** (SAPI `fpm-fcgi`) — nel pool, es. `/etc/php/8.4/fpm/pool.d/www.conf`:
  ```ini
  env[DBC2_API_BASE] = "https://dbc2.datalia.it/api"
  env[DBC2_TOKEN] = "2|xxxxxxxx..."
  ```
  poi `sudo systemctl restart php8.4-fpm`.
- **Apache mod_php** — in `/etc/apache2/envvars` con `export DBC2_TOKEN=...` (poi
  `systemctl restart apache2`, non `reload`), oppure `SetEnv DBC2_TOKEN "..."` nel VirtualHost.

> ⚠️ **Virgolette obbligatorie** nel pool FPM (e in genere nei file INI) se il valore contiene
> caratteri riservati come `|`, `&`, `~`, `!`, `(`, `)`, `{`, `}`, `^`, `"`. I token Sanctum
> hanno la forma `<id>|<random>`: **senza** virgolette il `|` tronca il valore (PHP riceve solo
> l'`<id>`) → API `401 Unauthenticated`. `clean_env_value()` toglie eventuali virgolette
> residue, ma il `|` va comunque protetto a monte con le virgolette.

Diagnosi rapida del `401`: con `DEBUG_MODE = true` in `_config.php` i log mostrano la fonte di
ogni variabile (`Variabile dal SISTEMA (getenv): ...`) e l'`HTTP Code` della chiamata. Per
verificare il token in isolamento: `curl -i -H "Authorization: Bearer <token>" <API_BASE>/companies/<id>`.

## 2. Variabili disponibili nelle pagine

Ogni campo dell'API è una variabile globale **già resa sicura per l'HTML** (stampare con
`<?= $var ?>`, senza `e()`). Campi noti (in `_config.php`, `$campi_noti`):

`id`, `company_name`, `nome_commerciale`, `parent_id`, `azienda_madre`, `p_iva`,
`sede_legale`, `sede_operativa`, `pec`, `email_dpo`, `email_supporto`,
`capitale_sociale`, `telefono`, `logo_url`, `logo2_url`, `bpg_customer_id`,
`bpg_customer_name`, `created_at`, `updated_at`.

Dal `.env`: `$SITO_WEB`, `$OPERATORE_ENERGETICO`. Derivata: `$brand` (= nome commerciale
se presente, altrimenti ragione sociale). Helper: `c('chiave', $default)` valore grezzo,
`e($testo)` per rendere sicuro un valore NON già pulito.

Un campo mancante è stringa vuota `""`: gatare l'output con `<?php if ($x) { ?>…<?php } ?>`.

## 3. Convertire ogni pagina `.html` → `.php`

Per ciascuna pagina (`index`, `chi-siamo`, `tariffe`, `contatti`, `privacy-policy`,
`condizioni-utilizzo`, ed eventuale `revoke`):

1. **Rinominare** `.html` → `.php`.
2. **Sostituire** l'`<head>`, l'`<header>` e il `<footer>` hardcoded con gli include.
   Schema in testa al file:
   ```php
   <?php
   require __DIR__ . '/_config.php';
   $pageTitle = 'Chi Siamo';                       // titolo scheda browser
   $pageHead   = <<<'CSS' … CSS;                    // facoltativo: <style> della pagina
   $pageScripts = '<script src="lead-form.js"></script>'; // facoltativo: solo dove serve
   include __DIR__ . '/header.php';
   ?>
   … contenuto della pagina …
   <?php include __DIR__ . '/footer.php'; ?>
   ```
3. **Aggiornare i link interni** da `.html` → `.php` (nav, footer, pulsanti, link consenso).
4. **Sostituire i dati hardcoded con le variabili API**:
   | Dato hardcoded nel sito statico | Variabile |
   |---|---|
   | ragione sociale / nome brand | `$brand` (o `$company_name` per il Titolare legale) |
   | P.IVA / Codice Fiscale | `$p_iva` |
   | sede legale | `$sede_legale` |
   | PEC | `$pec` |
   | email assistenza/contatto | `$email_supporto` |
   | email DPO | `$email_dpo` |
   | telefono | `$telefono` |
   | capitale sociale | `$capitale_sociale` |
   | logo | `$logo_url` (fallback `logo.png`) |
   | operatore energetico | `$OPERATORE_ENERGETICO` |
   | URL del sito nei testi legali | `$SITO_WEB` |

   I dati legali (footer, privacy, condizioni) NON vanno più scritti a mano: arrivano
   dall'API. Vedi `footer.php`, `privacy-policy.php`, `condizioni-utilizzo.php` del pilota.

## 4. Form contatti — contratto DOM invariato

`contatti.php` include `lead-form.js`. Il form NON va ridisegnato: rispettare il contratto
(vedi `CLAUDE.md` › "Key shared behavior"):
- `action="https://dbc2.datalia.it/api/lead"`, `method="POST"`.
- ID campi: `fNome` / `fTel` / `fEmail`; submit `btnSubmit`; conferma `#conferma`.
- `name`: `nome`, `telefono`, `email`.
- consensi: `consenso_privacy` (obbligatorio) + `consenso_ricontatto` (o `consenso_commerciale`)
  + `consenso_marketing` (facoltativo).
- Nei testi dei consensi usare `<?= $OPERATORE_ENERGETICO ?>` e `<?= $brand ?>`.

`lead-form.js` si copia invariato. `cb.js` si copia ma **il colore accento è hardcoded**:
sostituire i valori esadecimali del brand (nel pilota gowin: `#D6006E` e l'hover `#A50055`)
con i colori del nuovo sito.

## 5. Asset

Lasciare immagini e `style.css` specifici del sito. Tutti i riferimenti restano **relativi**.
Le custom properties di palette (`--primary`, `--accent`, …) restano in `style.css`.

## 6. Verifica

- `php -l <file>.php` su ogni pagina (nessun errore di sintassi).
- `php -S localhost:8000` dalla cartella del sito → aprire `index.php`.
- I dati API sono in cache 1h in `.company-cache.json`; per forzare il refresh, **cancellare**
  quel file e ricaricare.
- Controllare che footer, privacy e condizioni mostrino i dati corretti dell'azienda.
- In **produzione** lasciare `DEBUG_MODE = false` in `_config.php` (i `[DEBUG]` espongono i
  nomi delle variabili ai visitatori). Metterlo `true` solo per diagnosi temporanea.

## 7. Aggiornare la guida utente

Copiare/adattare `LEGGIMI.md` nella cartella del sito (istruzioni per l'utente finale:
configurazione `.env`, campi disponibili, avvio server di test).
