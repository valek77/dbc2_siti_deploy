# Tool di audit / regression dei siti — `_shared/audit.php`

Controllo automatico di **tutti** i siti del repo per intercettare: associazioni
sbagliate (landing/operatore/company), dati legali incoerenti, refusi/errori di
contenuto, link rotti, form non conformi e residui di migrazione PHP.

La **fonte di verità** è l'**API Datalia**: il tool riusa le stesse funzioni del
runtime dei siti (`_shared/dbc2_lib.php`), quindi "vede" esattamente i dati che
vede il sito in produzione.

## Uso

```bash
# Dalla root del repo:
php _shared/audit.php                      # tutti i siti, report a console
php _shared/audit.php --min=WARN           # nasconde gli INFO (consigliato)
php _shared/audit.php --site=Risa/gowin-srl.it
php _shared/audit.php --client=GrimaldiGroup
php _shared/audit.php --only=A,B,E         # solo alcune categorie
php _shared/audit.php --lint               # aggiunge `php -l` (più lento)
php _shared/audit.php --json --html        # scrive _shared/audit-report.{json,html}
php _shared/audit.php --refresh            # ignora la cache API locale e rilegge
```

### Token API (fonte di verità)

I controlli "canonici" (P.IVA/PEC vs azienda reale, operatore/partner nel
consenso, landing legata al dominio giusto) richiedono il token. **Impostalo
nell'ambiente prima di lanciare** (non va mai committato):

```powershell
# PowerShell
$env:DBC2_TOKEN = "2|xxxxxxxx"
php _shared/audit.php --min=WARN
```
```bash
# bash
DBC2_TOKEN="2|xxxxxxxx" php _shared/audit.php --min=WARN
```

In alternativa all'ambiente, puoi mettere il token in **`_shared/.env`** (lo legge
solo l'audit): copia `_shared/.env.example` in `_shared/.env` e incolla il token.
`_shared/.env` è in `.gitignore`, quindi il token non finisce su git. L'ordine di
lettura è: ambiente di sistema → `_shared/.env`.

Senza token il tool **funziona comunque**: i controlli canonici usano come
ripiego la cache `.company-cache.json` di ogni sito (dati eventualmente vecchi),
mentre tutti i controlli strutturali (link, form, refusi, residui, coerenza
interna dei dati legali) girano lo stesso. Le risposte API vengono messe in
cache in `_shared/.audit-api-cache.json` (gitignored); `--refresh` la rigenera.

### Exit code

`0` se non ci sono **ERROR**, `1` altrimenti — utilizzabile in un hook
pre-commit o in una GitHub Action.

## Categorie di controllo

| Cat | Cosa verifica |
|-----|---------------|
| **A** Associazione | un solo binding nel `.env`; id numerico; `landing.url` dell'API == dominio della cartella; `SITO_WEB` == dominio; nessun `LANDING_PAGE_ID` duplicato fra cartelle; segnala i siti ancora su API vecchia. |
| **B** Dati legali | P.IVA **etichettate** coerenti fra le pagine e col canonico + **check digit** valido; PEC/REA/capitale coerenti; ragione sociale canonica presente. |
| **C** Consenso/brand | nel testo consenso "ricontattato da **X** … partner commerciale **Y**": X == operatore e Y == azienda del canonico. |
| **D** Link & asset | link/asset relativi esistenti su disco; ancore `#id` esistenti; (in PHP) link `.html` interni = residuo. |
| **E** Form | contratto DOM del form contatti (`fNome/fTel/fEmail/btnSubmit/conferma`, name, consensi); endpoint `api/lead` presente nel form o in `lead-form.js`; `lead-form.js` presente. |
| **F** Residui PHP | variabili "piatte" API-vecchia in siti API-nuova (stampano vuoto); link `.html` interni; con `--lint`, errori di sintassi `php -l`. |
| **R** Refusi/contenuto | **consenso fra le copie** (frasi consenso difformi dalla maggioranza = refuso); placeholder/`TODO`/`lorem`; mojibake da encoding; parole doppie; **drift** di `lead-form.js` fra i siti (fix non propagato). |

## Come trova i refusi / errori di contenuto

1. **Consenso fra le copie** (`R-consensus`): la stessa frase di consenso è
   duplicata su ~127 siti; il tool calcola la variante maggioritaria e segnala
   chi se ne discosta di pochi caratteri (refuso/regressione). Per il consenso
   commerciale il nome operatore/partner viene mascherato così resta il *template*.
2. **Diff col canonico** (`B-*`, `C-*`): ogni dato legale diverso dall'API è un errore.
3. **Validatori di formato** (`B-piva-bad`): check digit della partita IVA, ecc.
4. **Placeholder / mojibake / parole doppie** (`R-placeholder`, `R-mojibake`, `R-dup`).
5. **Link/asset** (`D-*`): esistenza su disco; (HTTP esterno: estensione futura).

> **Spell-check ortografico (hunspell):** non incluso di default (richiede il
> binario `hunspell -d it_IT`, assente su questa macchina). La rilevazione refusi
> si basa oggi su consenso-fra-copie + formato + placeholder, che per questo repo
> (alta duplicazione) ha segnale molto alto. Per aggiungerlo in futuro: estrarre
> il testo con `audit_html_to_text()` e passarlo a hunspell con whitelist seminata
> dai nomi azienda/operatore del canonico.

## Architettura

```
_shared/
  dbc2_lib.php       funzioni pure condivise (env + API), usate da config.php e dall'audit
  audit.php          entry-point CLI (parsing argomenti, output, exit code)
  audit/
    helpers.php      estrazione/validazione/normalizzazione (pure)
    Canonical.php    risoluzione dati canonici (API live o cache per-sito)
    Audit.php        discovery dei siti + tutti i controlli + cross-site
    Report.php       output console / JSON / HTML
```

`_shared/config.php` (runtime dei siti) è invariato nel comportamento: le funzioni
condivise sono solo state spostate in `dbc2_lib.php` (verificato: render dei siti
byte-identico prima/dopo).
