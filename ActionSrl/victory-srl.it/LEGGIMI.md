# Guida rapida — sito PHP con dati azienda da API

I dati dell'azienda (nome, P.IVA, sede, PEC, logo…) **non sono più scritti a mano**:
arrivano dall'API Datalia e sono disponibili in ogni pagina come semplici variabili PHP.

## 1. Configurazione

### File `.env` (committabile — NON contiene segreti)

Nella cartella del sito c'è il file **`.env`** con SOLO 3 valori non sensibili:

```
COMPANY_ID=1
SITO_WEB=action-srl.it
OPERATORE_ENERGETICO=Illumia
```

- `COMPANY_ID` = numero dell'azienda di questo sito.
- `SITO_WEB` = indirizzo mostrato nei testi legali.
- `OPERATORE_ENERGETICO` = operatore di cui il sito è rivenditore (usato in
  tutta la pagina Tariffe e nel footer).

### Token e indirizzo API (segreti — NEL SERVER, non nel repo)

`DBC2_TOKEN` (token Sanctum) e `DBC2_API_BASE` vanno nell'**ambiente di sistema**
del server, **non** nel `.env`:

- **PHP-FPM** — in `/etc/php/8.4/fpm/pool.d/www.conf`:
  ```ini
  env[DBC2_API_BASE] = "https://dbc2.datalia.it/api"
  env[DBC2_TOKEN] = "2|xxxxxxxx..."
  ```
  poi `sudo systemctl restart php8.4-fpm`.
- **Apache mod_php** — `export DBC2_TOKEN=...` in `/etc/apache2/envvars`
  (poi `systemctl restart apache2`), oppure `SetEnv DBC2_TOKEN "..."` nel VirtualHost.

> ⚠️ Le **virgolette** attorno al token sono obbligatorie: il carattere `|` senza
> virgolette tronca il valore e l'API risponde `401 Unauthenticated`.

## 2. Come usare i campi nelle pagine

Ogni campo dell'API è una variabile, **già pronta** da stampare con `<?= ... ?>`
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
| `$sede_operativa`       | Indirizzo sede operativa                          |
| `$pec`                  | Indirizzo PEC                                      |
| `$email_dpo`            | Email del DPO                                      |
| `$email_supporto`       | Email di contatto/assistenza                      |
| `$telefono`             | Numero di telefono                                |
| `$capitale_sociale`     | Capitale sociale                                  |
| `$logo_url`             | Indirizzo del logo                                |
| `$logo2_url`            | Indirizzo del logo secondario/alternativo         |
| `$SITO_WEB`             | Indirizzo del sito (dal file `.env`)              |
| `$OPERATORE_ENERGETICO` | Operatore energetico (dal file `.env`)            |

> Se un campo non esiste, la variabile è **vuota** (`""`), quindi non dà errori.
> Mostrare qualcosa solo se il dato c'è: `<?php if ($telefono) { ?> … <?php } ?>`.

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

Opzionali, da impostare **prima** di `include header.php`:
- `$pageHead`    → CSS extra dentro `<head>` (vedi `contatti.php`)
- `$pageScripts` → `<script>` specifici della pagina

> Header, footer, menu e dati societari si modificano una volta sola in
> `header.php` e `footer.php`: la modifica vale per tutte le pagine.

## 4. Avviare il server di test PHP

Dalla cartella del sito:

```
php -S localhost:8000
```

Poi apri **http://localhost:8000/index.php**.

- I dati vengono salvati in cache per 1 ora nel file `.company-cache.json`.
  Per forzare il ricaricamento dall'API, **cancella** quel file e ricarica.
- In produzione lasciare `DEBUG_MODE = false` in `_config.php`.
