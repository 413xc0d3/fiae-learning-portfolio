import mysql.connector

try:
    db = mysql.connector.connect(
        host="localhost", user="root", password="", database="verwaltung"
    )

    cursor = db.cursor()

    print("Verbindung zur DB hergestellt")

    cursor.execute("SHOW TABLES")

    for tabelle in cursor:
        print(tabelle)

    cursor.execute("DESCRIBE person")
    for spalte in cursor:
        print(spalte[0])

    print("Daten aus Cursor 'speichern'")
    cursor.execute("DESCRIBE person")
    ergebnis = cursor.fetchall()
    for spalte in ergebnis:
        print(spalte[0])


except mysql.connector.ProgrammingError as fehler:
    print("Fehler beim Verbindungsaufbau")
    print("Genaue Fehlermeldung:", fehler)
    print("Fehlercode:", fehler.args[0])
