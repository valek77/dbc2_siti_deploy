# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this repo is

A deployment repository of **static lead-generation landing sites** (plain HTML/CSS/JS, no build step) for Italian energy/utility resellers. There is no framework, no `package.json`, and no test suite — files are served as-is. `ActionSrl/_build_brand.py` exists but is empty (0 bytes); ignore it.

## Layout

Sites are grouped by client company at the top level, and each site lives in a directory named after its deployed domain:

```
ActionSrl/        action-srl.it, docet-srl.it, … (+ semplice.* and nexicom.* variants)
Again/            again-srl.it, energia-locale.again-srl.it, …
GrimaldiGroup/    gruppogrimaldi.com, energiagr.com, …
Risa/             risa-srl.it, gowin-srl.it
TeamComapny/      sceltaenergia.it, tariffafelice.it, …
```

Each site directory is **fully self-contained** and duplicates the same file set:
`index.html`, `chi-siamo.html`, `tariffe.html`, `contatti.html`, `privacy-policy.html`,
`condizioni-utilizzo.html`, `style.css`, `cb.js`, `lead-form.js`, plus per-site images.
Some sites also have `revoke.html` / `revoke.js` (consent-revocation page).

### Brand variants (ActionSrl)

Many ActionSrl sites exist in three near-identical copies: `action-srl.it`, `semplice.action-srl.it`, `nexicom.action-srl.it`. The variants are **identical except** for the provider/brand name in the consent text inside `contatti.html` and `tariffe.html` (e.g. "Illumia" vs "Semplice Luce e Gas" vs "Nexicom"). When editing one variant, check whether the same change belongs in its siblings.

## Key shared behavior

These two scripts are copied (not shared) into every site, so changes to logic must be applied per-site or fanned out across all copies:

- **`lead-form.js`** — handles the contact form (included only by `contatti.html`). It POSTs JSON to `https://dbc2.datalia.it/api/lead`. The DOM contract is fixed across sites:
  - Field IDs: `fNome`, `fTel`, `fEmail`; submit button `btnSubmit`; confirmation element `conferma`.
  - Input `name`s: `nome`, `telefono`, `email`.
  - Consent checkboxes: `consenso_privacy` (required) + a "commercial" consent that may be named `consenso_ricontatto` **or** `consenso_commerciale` (the script accepts either) + optional `consenso_marketing`.
  - Payload maps these to `consenso_0` (commercial), `consenso_1` (privacy), `consenso_2` (marketing), plus `nome_cognome`, `email`, `telefono` (digits only), `ip` (from ipify), `landing_page_url`, `data_registrazione`.
  - Reads `?offerta=` from the URL to prefill the message / show a banner.
- **`cb.js`** — self-injecting cookie-consent banner gated on `localStorage.cookieConsent`. Its accent color is hardcoded per site (search the inline `#hexcolor` values when rebranding).

## Editing conventions

- HTML uses heavy **inline styles** alongside `style.css`; CSS custom properties like `--primary`, `--secondary`, `--text-dark` define the per-site palette in `style.css`.
- All asset references are **relative** (`logo.png`, `style.css`) — keep them relative so the site works under any domain/subdomain.
- Footers contain **legally significant company data** (ragione sociale, P.IVA/C.F., REA, PEC, sede legale). These differ per company — never copy one site's legal block into another company's site. Recent commit history is dominated by mass fixes to contact data, emails, and legal info, so accuracy here matters more than markup.
- Content is in **Italian**; keep copy in Italian.

## Common tasks

- Preview a site locally: serve its directory, e.g. `python -m http.server 8000` from inside the site folder, then open `index.html`.
- A repeated maintenance pattern ("fix massivo contatti") is applying the same correction across many sites — when doing this, enumerate the affected site directories with Glob/Grep and apply the edit to each copy rather than assuming a single source of truth.
- Deployment is git-based (remote: `valek77/dbc2_siti_deploy`); committing/pushing publishes the static files.
