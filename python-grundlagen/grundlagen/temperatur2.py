try:
    print("Bitte Temperaturen eingeben")
    # wichtig: input wird erstmal als string interpretiert --> casting
    t1 = float(input("Temp 1:"))
    t2 = float(input("Temp 2:"))
    t3 = float(input("Temp 3:"))
    print("Eingabe: ", t1, "°C", t2, "°C", t3, "°C")
    # formatierter String {platzhalter}, beginnt bei 0
    meinString = "Eingabe:{0}°C, {1}°C, {2}°F".format(t1, t2, t3)
    print(meinString)
    d = (t1 + t2 + t3) / 3
    print(d)
except Exception as fehler:
    print("Was ist passiert:", fehler)
    print("Achtung Programm wird beendet")
    # Programm beenden
    exit()
finally:
    print("Finaleeeee: wird immer ausgeführt egal ob try oder except durchgeführt wird")

print("Kommen wir dahin?")
