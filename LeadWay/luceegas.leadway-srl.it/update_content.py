import re

with open('index.php', 'r') as f:
    index = f.read()

index = index.replace('hero_telecom_1.png', 'hero_multi_1.png')
index = index.replace('hero_telecom_2.png', 'hero_multi_2.png')
index = index.replace('hero_telecom_3.png', 'hero_multi_3.png')

index = index.replace('Connessioni <span class="accent">veloci</span>, business senza limiti.', 'Energia e Connessioni per il tuo <span class="accent">business</span>.')
index = index.replace('<?= $brand ?> ti guida nel mondo delle telecomunicazioni con offerte trasparenti per fibra e telefonia.', '<?= $brand ?> ti guida con offerte trasparenti per luce, gas, fibra e telefonia.')
index = index.replace('Soluzioni innovative per l\'efficientamento delle comunicazioni della tua casa o della tua azienda.', 'Soluzioni innovative per l\'efficientamento energetico e le comunicazioni della tua casa o azienda.')
index = index.replace('Gestisci la tua <span class="accent">rete</span> con intelligenza.', 'Gestisci le tue <span class="accent">utenze</span> con intelligenza.')
index = index.replace('Monitora i tuoi servizi e risparmia concretamente su internet e telefonia ogni mese.', 'Monitora i tuoi servizi luce, gas e telecomunicazioni per risparmiare concretamente ogni mese.')

index = index.replace('Internet Fibra', 'Luce e Gas')
index = index.replace('feature_internet.png', 'feature_luce_real.png')
index = index.replace('Connessioni ultraveloci in fibra ottica per garantire massime prestazioni. Per uso domestico e professionale. Massima trasparenza sui costi e zero interruzioni.', 'Tariffe trasparenti per l\'energia elettrica e il gas, con soluzioni su misura per abbattere i costi della tua bolletta.')
index = index.replace('Vedi tariffe fibra', 'Vedi tariffe energia')

index = index.replace('Telefonia Mobile', 'Telefonia e Fibra')
index = index.replace('feature_mobile.png', 'feature_telecom.png')
index = index.replace('Piani voce e dati con copertura capillare su tutto il territorio nazionale. Soluzioni per casa, lavoro e imprese, con attivazione rapida e senza limiti nascosti.', 'Connessioni ultraveloci e piani mobile per essere sempre connesso, sia a casa che in mobilità o in azienda.')
index = index.replace('Vedi tariffe mobile', 'Vedi tariffe telecom')

index = index.replace('feature_brokerage.png', 'feature_consulenza.png')

with open('index.php', 'w') as f:
    f.write(index)

with open('chi-siamo.php', 'r') as f:
    chi = f.read()

chi = chi.replace('hero_telecom_2.png', 'hero_multi_3.png')
chi = chi.replace('Telecomunicazioni con <span class="accent">competenza</span>', 'Utenze con <span class="accent">competenza</span>')
chi = chi.replace('mercato delle telecomunicazioni', 'mercato dell\'energia e delle telecomunicazioni')
chi = chi.replace('le migliori tariffe disponibili per internet e fonia.', 'le migliori tariffe disponibili per luce, gas e internet.')
chi = chi.replace('feature_internet.png', 'feature_luce_real.png')

with open('chi-siamo.php', 'w') as f:
    f.write(chi)
    
with open('tariffe.php', 'r') as f:
    tariffe = f.read()

tariffe = tariffe.replace('Servizi di Telecomunicazioni', 'Servizi Luce, Gas e Telecomunicazioni')
tariffe = tariffe.replace('Servizi di telecomunicazioni per uso domestico e professionale. Piani tariffari trasparenti e modulari per fibra ottica e telefonia mobile.', 'Servizi completi per uso domestico e professionale. Piani tariffari trasparenti per luce, gas, fibra ottica e telefonia mobile.')

with open('tariffe.php', 'w') as f:
    f.write(tariffe)
