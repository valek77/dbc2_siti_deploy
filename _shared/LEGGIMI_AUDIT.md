# Audit siti — guida rapida

Controlla **tutti i siti** del repo e segnala: associazioni sbagliate
(landing/operatore/azienda), dati legali incoerenti, refusi, link rotti, form
non funzionanti e residui di migrazione PHP. La verità è l'**API Datalia**.

## Avvio

```bash
php _shared/audit.php --min=WARN
```

## Token (consigliato)

Per i controlli sui dati reali (P.IVA/PEC/operatore corretti) serve il token.
Una volta sola:

```bash
cp _shared/.env.example _shared/.env     # poi incolla il token in _shared/.env
```

`_shared/.env` è ignorato da git, il token non finisce nei commit. Senza token
gira lo stesso, ma i controlli "canonici" sono limitati.

## Opzioni utili

| Opzione | Cosa fa |
|---|---|
| `--min=ERR` | mostra solo gli ERROR (accetta anche `WARN`, `INFO`) |
| `--site=Risa/gowin-srl.it` | un solo sito |
| `--client=ActionSrl` | un solo cliente |
| `--only=A,B,E` | solo alcune categorie |
| `--html` / `--json` | salva il report in `_shared/audit-report.html` / `.json` |
| `--refresh` | rilegge l'API ignorando la cache locale |
| `--lint` | aggiunge il controllo sintassi PHP (più lento) |
| `--spell` | aggiunge lo spell-check ortografico (richiede hunspell, vedi sotto) |

## Come leggere l'output

Findings raggruppati per sito, con gravità:

- **ERROR** — rotto/sbagliato, va corretto (es. form non funzionante, P.IVA incoerente).
- **WARN** — sospetto, da controllare (es. PEC diverse, refuso probabile).
- **INFO** — nota (es. sito ancora su API vecchia).

Codice tra parentesi = `categoria/controllo`:
**A** associazione · **B** dati legali · **C** consenso/brand · **D** link/asset
· **E** form · **F** residui PHP · **R** refusi/contenuto.

Exit code `1` se ci sono ERROR (utile per pre-commit/CI), altrimenti `0`.

Nel report **HTML** (`--html`) in alto ci sono i pulsanti **Tutti / ERROR / WARN /
INFO**: cliccane uno per filtrare e vedere solo quel livello.

## Spell-check ortografico (controllo refusi)

Di default i refusi (categoria **R**) si trovano per *consenso fra le copie*,
placeholder, mojibake e parole doppie — **senza** dizionario. Per aggiungere un
vero controllo ortografico parola-per-parola usa `--spell`, che si appoggia a
**hunspell** col dizionario italiano (`it_IT`). Senza hunspell installato il
flag non rompe nulla: stampa un avviso e salta il check.

```bash
php _shared/audit.php --spell --only=R     # solo i refusi, con spell-check
php _shared/audit.php --spell --site=Risa/gowin-srl.it
```

Le segnalazioni sono `R-spell` di livello **INFO** (sono un aiuto alla revisione,
non un errore: nomi propri e brand possono dare falsi positivi). Restano quindi
nascoste con `--min=WARN`: per vederle usa il livello di default oppure `--only=R`.
La whitelist è alimentata automaticamente coi nomi azienda/operatore del
canonico e con le etichette del dominio del sito; i termini di settore/web
(srl, email, cookie, kwh, …) sono già esclusi.

### Abilitarlo su Windows

1. Installa hunspell. Più semplice con un package manager:

   ```powershell
   winget install --id Hunspell.Hunspell      # oppure:  choco install hunspell
   ```

   In alternativa scarica i binari (es. dai build MSYS2/LibreOffice) e mettili in
   una cartella nel `PATH`.

2. Procurati il dizionario italiano: i due file **`it_IT.aff`** e **`it_IT.dic`**
   (presenti in LibreOffice/OpenOffice o scaricabili dal dizionario `it_IT`).
   Mettili in una cartella, es. `C:\hunspell\dict\`, e indicala a hunspell con la
   variabile `DICPATH`:

   ```powershell
   $env:DICPATH = "C:\hunspell\dict"
   php _shared/audit.php --spell --only=R
   ```

3. Verifica al volo che hunspell risponda:

   ```powershell
   "ciao caaasa" | hunspell -d it_IT -l      # deve stampare: caaasa
   ```

### Abilitarlo su macOS

1. Installa hunspell con Homebrew:

   ```bash
   brew install hunspell
   ```

2. Installa il dizionario italiano. Copia `it_IT.aff` e `it_IT.dic` in una delle
   cartelle dizionari di hunspell (per utente):

   ```bash
   mkdir -p ~/Library/Spelling
   # copia qui it_IT.aff e it_IT.dic (da LibreOffice o dal pacchetto it_IT)
   ```

   Se li tieni altrove, punta `DICPATH` alla cartella prima di lanciare:

   ```bash
   export DICPATH="$HOME/Library/Spelling"
   php _shared/audit.php --spell --only=R
   ```

3. Verifica:

   ```bash
   echo "ciao caaasa" | hunspell -d it_IT -l    # deve stampare: caaasa
   ```

### Override (entrambi i sistemi)

Se il binario non si chiama `hunspell` o vuoi un'altra lingua, usa le variabili
d'ambiente lette dall'audit:

| Variabile | Default | A cosa serve |
|---|---|---|
| `HUNSPELL_BIN` | `hunspell` | path/nome del binario hunspell |
| `HUNSPELL_LANG` | `it_IT` | dizionario da usare (`-d`) |
| `DICPATH` | (di sistema) | cartella dove hunspell cerca i `.aff`/`.dic` |

## Esempi

```bash
php _shared/audit.php --client=GrimaldiGroup --min=WARN   # un cliente, senza INFO
php _shared/audit.php --only=E                            # solo i form
php _shared/audit.php --spell --only=R                    # refusi + spell-check
php _shared/audit.php --html                              # report sfogliabile
```

Dettagli completi (categorie, tecniche anti-refuso, architettura): vedi
`_shared/audit/LEGGIMI.md`.
