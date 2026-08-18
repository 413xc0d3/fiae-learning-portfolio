import mysql.connector

try:
    db = mysql.connector.connect(
        host="localhost", user="root", password="", database="verwaltung"
    )

    # cursor = db.cursor()
    cursor = db.cursor(dictionary=True)
    sql = "SELECT * FROM person"
    # sql = "SELECT * FROM person WHERE Vorname='Gisela'"
    cursor.execute(sql)
    personen = cursor.fetchall()

    for person in personen:
        print(person["Vorname"])

    print("auf personen zugreifen")
    # print(personen[0][2])
    print("spaltenbezeichnung")
    print(personen[0]["Gewicht"])


except mysql.connector.ProgrammingError as fehler:
    print("Fehler beim Verbindungsaufbau")
    print("Genaue Fehlermeldung:", fehler)
    print("Fehlercode:", fehler.args[0])
