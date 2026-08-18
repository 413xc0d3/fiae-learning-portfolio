import sys

try:
    # r read lesen
    file = open("Hallo.txt")
    text = file.read()
    print(text)
    file.close()
except:
    print("Fehler: ", sys.exc_info())
    print("Fehler: ", sys.exc_info()[0])
