# Parkautomat – erweiterte Version

Eigenständige Weiterentwicklung des Unterrichtsprojekts [`parkautomat/`](../parkautomat/), losgelöst vom ursprünglichen Unterrichtsstand. Änderungen in diesem Ordner sind vollständig eigenständig entstanden und nicht Teil der im Unterricht erarbeiteten Fassung.

## Neue Funktion: Zugangskontrolle

Reale Parkhäuser lassen oft nicht jedes Fahrzeug einfahren (z. B. Firmenparkplätze, Dauerparker-Bereiche). Deshalb gibt es jetzt eine Zugangsliste mit freigegebenen Kennzeichen:

- nur Kennzeichen auf der Zugangsliste erhalten beim Einparken ein Ticket
- Kennzeichen können über ein eigenes Formular zur Liste hinzugefügt werden
- jedes freigegebene Kennzeichen lässt sich über einen Button wieder entfernen
- der Vergleich ignoriert Groß-/Kleinschreibung und überflüssige Leerzeichen

### Umgesetzte Konzepte
- `Array.prototype.some()` für die Zugangsprüfung
- Normalisierung von Nutzereingaben vor dem Vergleich (`trim`, `toUpperCase`, Leerzeichen vereinheitlichen)
- ein zweites, unabhängiges Formular mit eigenem `submit`-Handler
- dynamisches Rendern einer zweiten Liste (Zugangsliste) analog zur Fahrzeugliste

## Start
`index.html` direkt im Browser öffnen.

## Ausgangsbasis
Übernommen aus [`parkautomat/`](../parkautomat/) (Stand: Einparken, Ausparken, Fahrzeugliste). Alle darüber hinausgehenden Funktionen in diesem Ordner sind eigenständige Erweiterungen.
