# Guida rapida — sito PHP con dati azienda da API

I dati dell'azienda (nome, P.IVA, sede, PEC, logo…) **non sono più scritti a mano**:
arrivano dall'API e sono disponibili in ogni pagina come semplici variabili PHP.

## 1. Configurazione (file `.env`)

Nella cartella del sito c'è il file **`.env`** (copia di `.env.example`). Va compilato
una sola volta e **non si carica su git**:

```
DBC2_API_BASE=https://dbc2.datalia.it/api
DBC2_TOKEN=<token segreto fornito da Datalia>
COMPANY_ID=<numero dell'azienda>
SITO_WEB=sinergy.energyfast-srl.it
OPERATORE_ENERGETICO=Sinergy Luce e Gas
```

- `COMPANY_ID` = numero dell'azienda di questo sito (**da compilare**).
- `DBC2_TOKEN` = token segreto (**da compilare**).
- `SITO_WEB` = indirizzo mostrato nei testi legali.
- `OPERATORE_ENERGETICO` = operatore di cui il sito è rivenditore (usato nella
  pagina Tariffe, nel footer e nel consenso del form contatti).

## 2. Come usare i campi nelle pagine

Ogni campo dell'API è una variabile, **già pronta** da stampare con `<?= ... ?>`
(non serve scrivere altro, è già "sicura" per l'HTML):

```php
<p>P.IVA: <?= $p_iva ?></p>
<p>Sede: <?= $sede_legale ?></p>
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
| `$capitale_sociale`     | Es. *10.000,00 € i.v.*                            |
| `$logo_url`             | Indirizzo del logo                                |
| `$logo2_url`            | Indirizzo del logo secondario/alternativo         |
| `$SITO_WEB`             | Indirizzo del sito (dal file `.env`)              |
| `$OPERATORE_ENERGETICO` | Operatore energetico (dal file `.env`)            |

> Se un campo non esiste, la variabile è **vuota** (`""`), quindi non dà errori.
> Per mostrare qualcosa solo se il dato c'è: `<?php if ($telefono) { ?> … <?php } ?>`.

## 3. Struttura di una pagina

Ogni pagina segue questo schema (header e footer sono condivisi):

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
- `$pageDescription` → meta description della pagina
- `$pageHead`        → CSS extra dentro `<head>` (vedi `contatti.php`)
- `$pageScripts`     → `<script>` specifici della pagina (vedi `index.php` / `tariffe.php`)

## 4. Avviare il server di test PHP

Dalla cartella del sito, apri il terminale ed esegui:

```
php -S localhost:8000
```

Poi apri il browser su **http://localhost:8000/index.php**.

- I dati vengono salvati in cache per 1 ora nel file `.company-cache.json`.
  Per forzare il ricaricamento dall'API, **cancella** quel file e ricarica la pagina.
