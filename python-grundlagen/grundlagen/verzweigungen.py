zahl = 13

# Einfachverzweigung
if zahl < 20:
    print("Zahl ist kleiner")
else:
    print("Zahl ist größer")

print("----")

# Mehrfachverzweigung
if zahl < 20:
    print("Zahl ist kleiner")
elif zahl == 20:
    print("Zahl ist gleich")
else:
    print("Zahl ist größer")

# Mehrfachverzweigung - match (in anderen Sprachen switch)
match zahl:
    case 10:
        print("zahl ist eine 10")
    case 12:
        print("Zahl ist eine 12")
    case 13 | 14 | 15:
        print("Irgendwas zwischen 13-15")
    case _:
        # _ Wildcard, default
        print("Andere Zahl")

sprache = "Python"
match sprache:
    case "PHP":
        print("Hasst die KI einer Dame hier")
    case "JS":
        print("Findet die KI auch nicht so prall")
    case "Python":
        print("Scheinbar besser")
    case _:
        print("Was soll das für eine Sprache sein?")
