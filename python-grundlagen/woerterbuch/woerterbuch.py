with open("woerterbuch.txt") as meinDatenstrom:
    print(meinDatenstrom)
    print(type(meinDatenstrom))
    inhaltGesamt = meinDatenstrom.readlines()
    print(inhaltGesamt)

    # setzt "Zeiger" auf Position 0 im Datenstrom
    meinDatenstrom.seek(0)

    # assoziativ --> DICT
    woerter = {}
    for zeile in meinDatenstrom:
        # print(zeile)
        # wie trim in PHP, Leerzeichen zu Beginn und Ende entfernen
        zeile = zeile.strip()
        # Trennzeichen
        werte = zeile.split(";")
        if len(werte) == 2:
            # print("linke Seite:", werte[0])
            # print("rechte Seite", werte[1])
            # woerter["Deutschland"] = "Germany"
            woerter[werte[0]] = werte[1]

# print(woerter)

while True:
    suchWort = input("Wort?: ")
    print("Suchwort: ", suchWort)
    if suchWort in woerter:
        print("Übersetzung: ", woerter[suchWort])
    else:
        print("Nicht vorhanden")


# Aufgabe:
# Eingabe von x - soll Programm beenden exit()
# mehrere Sprachen? vorher Auswahl 1 = En, 2 = Fr....
