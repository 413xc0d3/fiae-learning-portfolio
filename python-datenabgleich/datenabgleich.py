"""
Kleine Übung: Datenabgleich zwischen zwei Systemen
Basis-Idee für das API-Projekt (Datenqualität/Abgleich zweier Datenbestände)
"""


def finde_unterschiede(system_a, system_b):
    """
    Vergleicht zwei Listen (z. B. IDs aus zwei Systemen) und findet
    Einträge, die jeweils nur in einem der beiden Systeme vorkommen.

    Parameter:
        system_a: Liste von IDs aus System A
        system_b: Liste von IDs aus System B

    Rückgabe:
        Tuple (nur_in_a, nur_in_b) - jeweils ein set() mit den IDs,
        die nur in einer der beiden Listen vorkommen.
    """
    # set() wandelt die Liste in eine Menge um – Duplikate fallen weg,
    # und wir können Mengen-Operationen wie "Differenz" nutzen
    menge_a = set(system_a)
    menge_b = set(system_b)

    nur_in_a = menge_a - menge_b  # Einträge, die es nur in System A gibt
    nur_in_b = menge_b - menge_a  # Einträge, die es nur in System B gibt

    return nur_in_a, nur_in_b


def finde_uebereinstimmungen(system_a, system_b):
    """
    Vergleicht zwei Listen (z. B. IDs aus zwei Systemen) und findet die
    Einträge, die in beiden Systemen vorkommen.

    Parameter:
        system_a: Liste von IDs aus System A
        system_b: Liste von IDs aus System B

    Rückgabe:
        set() mit den IDs, die in beiden Listen vorkommen.
    """
    # & ist die Schnittmenge zweier Sets – anders als bei "-" spielt die
    # Reihenfolge hier keine Rolle, das Ergebnis ist in beide Richtungen gleich
    return set(system_a) & set(system_b)


if __name__ == "__main__":
    # Beispielaufruf
    system_a = ["K001", "K002", "K003", "K004"]
    system_b = ["K002", "K003", "K005"]

    fehlend_in_b, fehlend_in_a = finde_unterschiede(system_a, system_b)
    print("Nur in System A:", fehlend_in_b)
    print("Nur in System B:", fehlend_in_a)

    uebereinstimmungen = finde_uebereinstimmungen(system_a, system_b)
    print("In beiden Systemen:", uebereinstimmungen)
