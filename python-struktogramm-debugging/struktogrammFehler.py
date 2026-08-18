# Simulation der Sensor-Funktion aus der Aufgabe
# Wir übergeben eine Liste mit dem Zustand aller Plätze
def sensor_lesen(stellplatznummer, parkhaus_belegung):
    # Da Python bei Index 0 anfängt, die Aufgabe aber bei 1, ziehen wir 1 ab
    return parkhaus_belegung[stellplatznummer - 1]


def simuliere_struktogramm(anzahl_besetzte_plaetze):
    # --- VORBEREITUNG DER SIMULATION ---
    # Wir erstellen ein Parkhaus mit 100 Plätzen.
    # "besetzt" für die gewünschte Anzahl, der Rest ist "frei".
    parkhaus = ["besetzt"] * anzahl_besetzte_plaetze + ["frei"] * (
        100 - anzahl_besetzte_plaetze
    )

    # --- START DES FEHLERHAFTEN STRUKTOGRAMMS ---

    # 1. Initialisierungs-Block
    grenzwert = 90
    plaetze = 100
    i = 0
    z = 0  # z soll die besetzten Plätze zählen

    # 2. Die Schleife (Wiederholung mit nachfolgender Bedingung: "Bis i = plaetze")
    while True:
        i = i + 1  # Inkrement

        # Verzweigung (ja/nein)
        if sensor_lesen(i, parkhaus) == "besetzt":
            z = z + 1  # Ja-Zweig: Erhöhe z um 1
        else:
            z = z - 1  # Logikfehler: Ein freier Platz dürfte den Belegungszähler nicht verringern

        # Schleifenbedingung am Ende prüfen
        if i == plaetze:
            break

    # 3. Auswertung und Anzeige-Block
    if z >= (plaetze * grenzwert / 100):
        anzeige = "belegt"
    else:
        anzeige = "frei"

    print(
        f"Tatsächlich besetzt: {anzahl_besetzte_plaetze} Plätze | "
        f"Berechneter Zähler z = {z} -> Anzeige schaltet auf: '{anzeige}'"
    )
    return anzeige


# --- TESTLÄUFE ---
print("--- TEST MIT VERSCHIEDENEN BELEGUNGEN ---")
simuliere_struktogramm(0)
simuliere_struktogramm(10)
simuliere_struktogramm(95)
simuliere_struktogramm(100)
