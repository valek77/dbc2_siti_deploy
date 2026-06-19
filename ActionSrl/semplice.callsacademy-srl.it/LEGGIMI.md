# Guida rapida — sito PHP con dati azienda da API

I dati dell'azienda (nome, P.IVA, sede, PEC, logo…) **non sono più scritti a mano**:
arrivano dall'API Datalia e sono disponibili in ogni pagina come semplici variabili PHP.

## 1. Configurazione

### File `.env` (committabile, solo valori NON segreti)

Nella cartella del sito c'è il file **`.env`** con i 3 valori di configurazione del sito.
Non contiene segreti, quindi può stare su git:

```
COMPANY_ID=32
SITO_WEB=semplice.again-srl.it
OPERATORE_ENERGETICO=Semplice Luce e Gas S.r.l.
```

- `COMPANY_ID` = numero dell'azienda di questo sito sull'API Datalia.
- `SITO_WEB` = indirizzo mostrato nei testi legali.
- `OPERATORE_ENERGETICO` = operatore di cui il sito è rivenditore (usato nella
  pagina Offerte, nei testi di consenso e nel footer).

### Token API e indirizzo API (SEGRETI / ambiente di sistema)

Il **token** (`DBC2_TOKEN`) e l'**indirizzo base** (`DBC2_API_BASE`) **non** stanno
nel repo: vanno impostati come **variabili d'ambiente di sistema** sul server, così il
token segreto non finisce mai su git. `_config.php` le legge automaticamente
dall'ambiente (`getenv()` → `$_SERVER` → `$_ENV`) e usa il `.env` solo come fallback.

- **PHP-FPM** — nel pool (`/etc/php/8.4/fpm/pool.d/www.conf`), virgolette obbligatorie
  perché il token contiene `|`:
  ```ini
  env[DBC2_API_BASE] = "https://dbc2.datalia.it/api"
  env[DBC2_TOKEN] = "2|xxxxxxxx..."
  ```
  poi `sudo systemctl restart php8.4-fpm`.
- **Apache mod_php** — `export DBC2_API_BASE=...` ed `export DBC2_TOKEN=...` in
  `/etc/apache2/envvars` (poi `systemctl restart apache2`), oppure `SetEnv` nel VirtualHost.

## 2. Come usare i campi nelle pagine

Ogni campo dell'API è una variabile **già pronta** da stampare con `<?= ... ?>`
(è già "sicura" per l'HTML):

```php
<p>P.IVA: <?= $p_iva ?></p>
<a href="mailto:<?= $pec ?>"><?= $pec ?></a>
<img src="<?= $logo_url ?>" alt="<?= $brand ?>">
```

### Campi disponibili

| Variabile               | Cosa contiene                                     |
|-------------------------|---------------------------------------------------|
| `$brand`                | Nome da mostrare (commerciale, o ragione sociale) |
| `$company_name`         | Ragione sociale                                   |
| `$nome_commerciale`     | Nome commerciale/brand (se presente)              |
| `$p_iva`                | Partita IVA (= Codice Fiscale)                    |
| `$sede_legale`          | Indirizzo sede legale                             |
| `$sede_operativa`       | Indirizzo sede operativa                         |
| `$pec`                  | Indirizzo PEC                                      |
| `$email_dpo`            | Email del DPO                                      |
| `$email_supporto`       | Email di contatto/assistenza                     |
| `$telefono`             | Numero di telefono                                |
| `$capitale_sociale`     | Capitale sociale                                  |
| `$logo_url` / `$logo2_url` | Indirizzo del logo (principale / alternativo)  |
| `$SITO_WEB`             | Indirizzo del sito (dal file `.env`)              |
| `$OPERATORE_ENERGETICO` | Operatore energetico (dal file `.env`)            |

> Se un campo non esiste, la variabile è **vuota** (`""`), quindi non dà errori.
> Per mostrare qualcosa solo se il dato c'è: `<?php if ($telefono) { ?>…<?php } ?>`.

## 3. Struttura di una pagina

```php
<?php
require __DIR__ . '/_config.php';   // carica i dati azienda
$pageTitle = 'Chi Siamo';           // titolo della scheda browser
include __DIR__ . '/header.php';    // testata + menu
?>
   ...contenuto della pagina...   (qui usi $p_iva, $brand, ecc.)
<?php include __DIR__ . '/footer.php'; ?>
```

Opzionali, da impostare **prima** di `include header.php` / `footer.php`:
- `$pageDesc`    → meta description della pagina
- `$pageHead`    → CSS extra dentro `<head>`
- `$pageScripts` → `<script>` specifici della pagina (vedi `tariffe.php`)

> Header, footer, menu e dati societari si modificano una volta sola in
> `header.php` e `footer.php`: la modifica vale per tutte le pagine.

## 4. Avviare il server di test PHP

Dalla cartella del sito:

```
php -S localhost:8000
```

Poi apri **http://localhost:8000/index.php**.

- Serve PHP installato (verifica con `php -v`).
- In locale, senza il token nell'ambiente, i campi azienda risultano vuoti: è normale.
  Per un test completo, esporta `DBC2_TOKEN` e `DBC2_API_BASE` nell'ambiente prima di avviare.
- I dati vengono salvati in cache per 1 ora in `.company-cache.json`.
  Per forzare il ricaricamento dall'API, **cancella** quel file e ricarica la pagina.
