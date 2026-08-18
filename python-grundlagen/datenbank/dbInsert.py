import mysql.connector

try:
    db = mysql.connector.connect(
        host="localhost", user="root", password="", database="verwaltung"
    )

    cursor = db.cursor()

    sql = "INSERT INTO person(Name, Vorname, Groesse, Gewicht, Geburtsdatum) VALUES(%s, %s, %s, %s, %s)"
    daten = ("Meierx", "Maxinex", 1.80, 123.5, "1970-12-05")
    cursor.execute(sql, daten)
    # cursor.execute("COMMIT;")
    db.commit()
except mysql.connector.ProgrammingError as fehler:
    print("Fehler beim Verbindungsaufbau")
    print("Genaue Fehlermeldung:", fehler)
    print("Fehlercode:", fehler.args[0])
