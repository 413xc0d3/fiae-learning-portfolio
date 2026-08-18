import sys

try:
    # r read lesen
    file = open("Hallo.txt", "r+")
    text = file.read()
    print(text)
    eingabe = input("Text?")
    file.write(eingabe)
    file.write("\n")
    file.close()
except:
    print("Fehler: ", sys.exc_info())
    print("Fehler: ", sys.exc_info()[0])
