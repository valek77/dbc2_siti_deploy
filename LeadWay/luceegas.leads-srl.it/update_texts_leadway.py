import os

replacements = {
    'Servizi di Telecomunicazioni e Utenze': 'LeadWay - Genera Valore',
    'Energia e Connessioni per il tuo <span class="accent">business</span>.': 'Generiamo <span class="accent">valore</span> per il tuo business.',
    '<?= $brand ?> ti guida con offerte trasparenti per luce, gas, fibra e telefonia.': 'LeadWay ti guida con strategie trasparenti per ottimizzare le tue utenze.',
    'Il tuo futuro è <span class="accent">connesso</span>.': 'Il tuo futuro genera <span class="accent">valore</span>.',
    'Gestisci le tue <span class="accent">utenze</span> con intelligenza.': 'Gestisci il tuo <span class="accent">business</span> con intelligenza.',
    'Tre servizi, <span class="underline">una sola promessa</span>': 'Le nostre soluzioni, <span class="underline">una sola promessa</span>',
    'Scegliamo per te la tariffa giusta e ti seguiamo dalla prima firma alla bolletta.': 'Scegliamo per te la strategia giusta per farti generare valore fin dal primo giorno.',
    'Attivi la nuova fornitura <br>in <span class="accent">4 passi semplici</span>': 'Inizia a generare valore <br>in <span class="accent">4 passi semplici</span>',
    'Risparmio reale, <span class="accent">assistenza vera</span>': 'Valore reale, <span class="accent">consulenza vera</span>',
    'Utenze con <span class="accent">competenza</span>': 'LeadWay: <span class="accent">Generiamo Valore</span>',
    "Un team di consulenti al tuo fianco per semplificare il mercato dell'energia e delle telecomunicazioni.": "Un team di consulenti al tuo fianco per aiutarti a ottimizzare le risorse e generare nuovo valore.",
    'Chi Siamo': 'Chi Siamo - LeadWay',
    'Tariffa Giusta Energy': 'LeadWay',
    'Offerte Luce e Gas': 'Servizi e Valore'
}

files_to_update = ['index.php', 'chi-siamo.php', 'tariffe.php', 'contatti.php', 'header.php', 'footer.php']

for filename in files_to_update:
    if not os.path.exists(filename): continue
    with open(filename, 'r') as f:
        content = f.read()
        
    for k, v in replacements.items():
        content = content.replace(k, v)
        
    with open(filename, 'w') as f:
        f.write(content)

print("Texts updated for LeadWay")
