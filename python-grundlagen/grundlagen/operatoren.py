a = 4 + 1
# 5
print(a)

a = 3 - 2
# 1
print(a)

a = 3 * 2
# 6
print(a)

a = 6 / 2
# 3.0 --> bei division wird es zum float
print(a)

a = 6 / 4
# 1.5
print(a)

a = 6 // 4
# floor division - Nachkommazahlen werden beschnitten --> int
print(a)

a = 6 % 4
# Modulo-Operator: Rest der Division
print(a)


print("--------")

# Vergleichsoperatoren
# < kleiner, <= kleiner gleich
# > größer, >= größer gleich
# == gleich
# !=
# and beide/ alle Seiten müssen wahr sein 4 <= 2 or 5 != 3 --> false
# or eine Seite muss wahr sein 4 <= 2 or 5 != 3 --> true
# not kehrt den Ausdruck um (! in PHP) not 2 == 2 --> false
# not (4 <= 2 or 5 != 3) --> false

ergebnis = not (4 <= 2 or 5 != 3)
print(ergebnis)
