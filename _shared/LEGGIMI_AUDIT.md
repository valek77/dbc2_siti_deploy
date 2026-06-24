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

## Esempi

```bash
php _shared/audit.php --client=GrimaldiGroup --min=WARN   # un cliente, senza INFO
php _shared/audit.php --only=E                            # solo i form
php _shared/audit.php --html                              # report sfogliabile
```

Dettagli completi (categorie, tecniche anti-refuso, architettura): vedi
`_shared/audit/LEGGIMI.md`.
