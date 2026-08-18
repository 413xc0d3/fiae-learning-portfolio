# prinzipiell entscheidet PY selbst den Datentypen

# integer
menge = 5

# float
preis = 1.50

# float
gesamtPreis = menge * preis

# string
produkt = "Hundefutter"

print("Der Preis für", produkt, "beträgt", preis)
print("Bei einer Menge von", menge, "ist das ein Gesamtpreis von", gesamtPreis)

zufriedenheit = True
print(zufriedenheit)

# Bedingung
if zufriedenheit:
    print("Zufriedener Hund")
    print("Mehr Futter")
else:
    print("unzufriedener Hund")


# Array -> Listen
menge = ["viel", 100, 50, 20]
print(menge[0])
