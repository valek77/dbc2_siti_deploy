# `_shared/` — cuore condiviso dei siti dinamici (dati azienda da API Datalia)

Questo file spiega come un sito usa il "cuore condiviso" `_shared/config.php` per
ricevere i dati aziendali a runtime, sia con la **API vecchia** (`/companies`) sia
con la **API nuova** (`/landing-pages`). Il token resta sempre lato server: il
browser riceve solo HTML già pronto.

## Come è agganciato un sito

Ogni cartella-sito contiene uno **stub** `_config.php` di 2 righe:

```php
<?php
$SITE_DIR = __DIR__;                       // cartella DI QUESTO sito
require dirname(__DIR__, 2) . '/_shared/config.php';
```

`$SITE_DIR` serve perché `.env` e la cache (`.company-cache.json`) restino nella
cartella del singolo sito, **non** in `_shared/`. Per questo NON si usano symlink
(PHP risolverebbe `__DIR__` al path reale, perdendo la cartella del sito).

Le pagine (`index.php`, `contatti.php`, footer, ecc.) includono lo stub e poi usano
le variabili descritte sotto.

## Le due API: quale viene usata?

La scelta è **automatica**, in base alle variabili presenti nel `.env` del sito:

| Variabile nel `.env` | API usata | Endpoint |
|----------------------|-----------|----------|
| `LANDING_PAGE_ID`    | **NUOVA** (consigliata) | `GET /landing-pages/{LANDING_PAGE_ID}` |
| `COMPANY_ID`         | VECCHIA (deprecata, ancora attiva) | `GET /companies/{COMPANY_ID}` |

Se sono presenti entrambe, **`LANDING_PAGE_ID` ha la precedenza**.

File di esempio in questa cartella (copiarli come `.env` **nella cartella del sito**):
- `.env.example.api-vecchia`
- `.env.example.api-nuova`

## Cosa hai a disposizione nelle pagine

### Con l'API VECCHIA (`COMPANY_ID`) — "mondo piatto"

Una variabile per ogni campo azienda, **già resa sicura per l'HTML** (stampala
diretta con `<?= $var ?>`, senza `e()`):

```
$id  $company_name  $nome_commerciale  $parent_id  $azienda_madre  $p_iva
$sede_legale  $sede_operativa  $pec  $email_dpo  $email_supporto
$capitale_sociale  $telefono  $logo_url  $logo2_url  $bpg_customer_id
$bpg_customer_name  $created_at  $updated_at
```

Più:
- `$brand` — nome da mostrare (commerciale se presente, altrimenti ragione sociale).
- `$company` — array grezzo (non pulito) dell'azienda.
- `c('chiave', $default)` — valore grezzo di un campo azienda.
- `e($testo)` — rende sicuro un testo per l'HTML (per valori NON già puliti).
- `$SITO_WEB`, `$OPERATORE_ENERGETICO` — dal `.env`.

### Con l'API NUOVA (`LANDING_PAGE_ID`) — "tre array"

Tre array associativi con valori **già resi sicuri per l'HTML**:

```php
$LANDING_PAGE['nome_portale']   // dati della landing page
$OPERATORE['nome_legale']       // operatore energetico
$COMPANY['company_name']        // azienda intestataria
```

Chiavi disponibili:
- **`$LANDING_PAGE`**: `id, url, titolo, nome_portale, operatore_energetico_id, company_id,
  p_iva, sede_legale, sede_operativa, pec, privacy_version, mostra_consenso_0,
  mostra_consenso_1, mostra_consenso_2, logo_url, logo2_url, created_at, updated_at`
- **`$OPERATORE`**: `id, nome_marketing, nome_legale, indirizzo, sede_operativa,
  partita_iva, email_supporto, pec, email_dpo, capitale_sociale, telefono,
  numero_rea, logo_url, logo2_url, created_at, updated_at`
- **`$COMPANY`**: stesse chiavi del "mondo piatto" (`company_name`, `p_iva`,
  `sede_legale`, `pec`, ...).

Con l'API nuova **non servono** `SITO_WEB` né `OPERATORE_ENERGETICO`: l'URL del
sito è in `$LANDING_PAGE['url']` e i dati operatore sono in `$OPERATORE[...]`.

Esempio di stampa:
```php
<p>P.IVA <?= $COMPANY['p_iva'] ?> — <?= $LANDING_PAGE['sede_legale'] ?></p>
<?php if ($LANDING_PAGE['mostra_consenso_0']): ?> ...consenso commerciale... <?php endif; ?>
```

## I due "mondi" sono a specchio (importante)

Per non incontrare mai variabili indefinite nelle pagine:

- **API vecchia attiva** → le variabili piatte sono valorizzate; i tre array
  `$LANDING_PAGE / $OPERATORE / $COMPANY` esistono comunque con **tutte le chiavi**
  ma **valori stringa vuota** `''`.
- **API nuova attiva** → i tre array sono valorizzati; le variabili piatte
  (`$p_iva`, `$company_name`, ...) e `$company` esistono ma valgono `''`
  (di conseguenza `$brand` ricade sul fallback "La nostra azienda").

In breve: **una pagina pensata per il mondo piatto** funziona con `COMPANY_ID`;
**una pagina pensata per i tre array** funziona con `LANDING_PAGE_ID`.

## Note tecniche

- **Tipi**: i valori degli array/piatti sono stringhe già pulite per l'HTML. I
  booleani diventano `'1'` (true) / `''` (false), gli interi diventano stringhe,
  i `null` diventano `''`. Per i flag `mostra_consenso_*` un `if (...)` funziona
  comunque (`''` è falso, `'1'` è vero).
- **Cache**: la risposta è messa in cache su file `.company-cache.json` nella
  cartella del sito (TTL 1 ora). Se l'API non risponde, il sito continua a
  funzionare con l'ultima copia valida. Per forzare un aggiornamento, cancella
  quel file.
- **Token lato server**: metti `DBC2_TOKEN` nel `.env` **oppure** come variabile
  di sistema (PHP-FPM `env[]`, Apache `SetEnv`/`envvars`). Vedi i commenti in
  testa a `config.php`.
- **Debug**: in `config.php` metti `DEBUG_MODE = true` solo per diagnosi (stampa
  righe `[DEBUG]` in pagina, inclusa quale API viene usata).

## Compatibilità

L'API vecchia (`fetch_company`/`load_company`) resta **definita e funzionante**:
i siti esistenti basati su `COMPANY_ID` continuano a funzionare **senza modifiche**.
