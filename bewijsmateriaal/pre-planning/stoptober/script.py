from pandas import *
import pandas as pd

data = read_csv("./Book1.csv")

df = pd.DataFrame(data, columns= ['Name', 'IOS', 'Android',  'NL', 'EN', 'Nuchtere teller', 'Spaarteller', 'Belonings-/prestatiesysteem', 'Een SOS-knop', 'Community-chat', 'Professionele hulp', 'Leuke weetjes', 'Persoonlijk feed', 'Gezondheidsindicator', 'FAQ', 'Chatbot', 'Dagboek/logboek', 'Substitute Recommendation', 'Geldbesparend doel', 'Hunkering analysator', 'Smartwatch-integratie', 'Persoonlijke coach', 'Citaat van de dag.', 'Andere verslavingen', 'Pincode', 'Motivatie om te stoppen', 'Deel je verhaal', 'Geen Premium', 'Grafiek', 'Geen Advertenties', 'Motiverende berichten via meldingen', 'Tijd bespaard', 'Vragen inchecken', 'Stel dagelijkse doelen in', 'Ondersteuning na het roken', 'Spel voor aandacht', 'Deel uw rookgeschiedenis', 'Verwachte besparingen', 'Geen Exclusive Beschikbaar', 'Dagelijks rooklogboek', 'Hulp bij moment van Hunkering', 'Motivatie bij terugval', 'Nuttige tips', 'Daggen leven terug', 'Homesreen widget'])
results = []
k = 0
for x in range(38):
    hi = df.iloc[x]
    for r in hi:
        if r == "YES":
            k = k + 1
        if r == "PREMIUM":
            k = k + 0.5
    print( df.iloc[x][0] + " has " + str(k) + " features!")
    k = 0