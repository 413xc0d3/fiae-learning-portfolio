print("while")
x = int(input("Bei welcher Zahl beginnen? (irgendwas unter 100 wäre super ;-)"))
while x <= 100:
    print(x)
    # x++ funktioniert leider nicht
    x += 1

print("for")
# Anfangswert, Endwert, Schrittweite
# for(i=0, i < 11, i=i+2)
for i in range(0, 11, 2):
    print(i)


for i in range(10, -1, -2):
    print(i)
