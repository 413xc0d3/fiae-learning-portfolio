# Hauptsächlich für Fehlerhandling
import sys

try:
    text = "Servus"
    # a append anhängen
    # w write überschreiben
    file = open("Hallo.txt", "a")
    file.write(text)
    file.write("\n")
    nutzereingabe = input("Mehr Text?")
    file.write(nutzereingabe)
    file.write("\n")
    file.close()
except:
    print("Fehler aufgetreten: ", sys.exc_info()[0])
