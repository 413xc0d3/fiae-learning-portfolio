# import os an anfang des codes, um auf das Dateisystem zuzugreifen 
# per Konvention in Python, import statements immer an Anfang des Codes.

import os
dateien = os.listdir("beispieldateien") 

# Funktion, die die Objekte aus einer Datei lädt und in einem Dictionary speichert
# analog zu dem Code in woerterbuch.py

def lade_objekte(file_path):
    with open (file_path, encoding="utf-8") as meineDaten:              # öffnet die Datei /encoding="utf-8" sorgt dafür, dass Umlaute korrekt gelesen werden
        objekte = meineDaten.readlines()                                # liest alle Zeilen der Datei ein
        lines = [line.strip() for line in objekte]                      # entfernt Leerzeichen am Anfang und Ende jeder Zeile

    objekte_dict = {}                               # öffnet ein leeres Dictionary, um die Objekte zu speichern
    for zeile in lines:
        werte = zeile.split(";")                    # teilt die Zeile mit Semikolons
        if len(werte) == 2:                         # 2 Werte in Zeile? 
            objekte_dict[werte[0]] = werte[1]       # erster Wert = Schlüssel / zweiter Wert = Wert
    return objekte_dict                             


# lade die Objekte aus der Datei "objekte.txt" in ein Dictionary

objekte = lade_objekte("objekte.txt")

# Funktion, die die Objekt-ID aus dem Dateinamen extrahiert
# und das entsprechende Objekt aus dem Dictionary zurückgibt

def finde_objekt_id(dateiname, objekte):
    for objekt_id in objekte:
        if objekt_id in dateiname:
            return objekt_id
    return None


# zuordnung gruppiert Dateien nach Objekt-ID,
# nicht_zugeordnet sammelt Dateien ohne passende ID

zuordnung = {}
nicht_zugeordnet = []

# Funktion, die die Dateien den Objekten zuordnet und die Ergebnisse zurückgibt
# datei ist dabei der Dateiname, objekte ist das Dictionary mit den Objekten

def ordne_dateien_zu(dateien, objekte):
    for datei in dateien:
        objekt_id = finde_objekt_id(datei, objekte)
        if objekt_id:
            if objekt_id not in zuordnung:
                zuordnung[objekt_id] = []               # leere liste anlegen
            zuordnung[objekt_id].append(datei)          # Datei in die liste einfügen
        else:                                           # objekt_id = none
            nicht_zugeordnet.append(datei)              # Datei landet in der Liste nicht_zugeordnet
    return zuordnung, nicht_zugeordnet

zuordnung, nicht_zugeordnet = ordne_dateien_zu(dateien, objekte)  # entpackt die zurückgegebenen 2 Werte in 2 Variablen

for objekt_id, dateien_liste in zuordnung.items():              # durchläuft die Zuordnungen
    print(objekt_id + " (" + objekte[objekt_id] + "):")         # zeigt die Objekt-ID und den Namen des Objekts
    for datei in dateien_liste:                                 # geht jede Datei in der Liste dieses Objekts einzeln durch
        print("  - " + datei)                                   # gibt sie mit Einrückung "  - " und Dateinamen aus, z.B. "  - Mietvertrag_OBJ001_2024.txt"
print("Nicht zugeordnete Dateien:")                         # zeigt die nicht zugeordneten Dateien an
for datei in nicht_zugeordnet:
    print("  - " + datei)                                   