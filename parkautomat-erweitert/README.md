# Parkautomat – erweiterte Version

Eigenständige Weiterentwicklung des Unterrichtsprojekts [`parkautomat/`](../parkautomat/), losgelöst vom ursprünglichen Unterrichtsstand. Änderungen in diesem Ordner sind vollständig eigenständig entstanden und nicht Teil der im Unterricht erarbeiteten Fassung.

## Neue Funktion: Zugangskontrolle

Reale Parkhäuser lassen oft nicht jedes Fahrzeug einfahren (z. B. Firmenparkplätze, Dauerparker-Bereiche). Deshalb gibt es jetzt eine Zugangsliste mit freigegebenen Kennzeichen:

- nur Kennzeichen auf der Zugangsliste erhalten beim Einparken ein Ticket
- Kennzeichen können über ein eigenes Formular zur Liste hinzugefügt werden
- jedes freigegebene Kennzeichen lässt sich über einen Button wieder entfernen
- der Vergleich ignoriert Groß-/Kleinschreibung und überflüssige Leerzeichen
- im Bedienfeld wird das Kennzeichen statt per Freitext über ein Dropdown ausgewählt, das immer nur die aktuell freigegebenen Kennzeichen anbietet

### Umgesetzte Konzepte
- `Array.prototype.some()` für die Zugangsprüfung
- Normalisierung von Nutzereingaben vor dem Vergleich (`trim`, `toUpperCase`, Leerzeichen vereinheitlichen)
- ein zweites, unabhängiges Formular mit eigenem `submit`-Handler
- dynamisches Rendern einer zweiten Liste (Zugangsliste) analog zur Fahrzeugliste
- dynamisches Befüllen eines `<select>`-Elements mit `createElement("option")`, das bei jeder Änderung der Zugangsliste neu aufgebaut wird

## Neue Funktion: Bezahlung vor dem Ausparken

Bisher wurde ein Fahrzeug beim Klick auf "Ausparken" sofort entfernt, ohne dass eine Gebühr anfiel. Jetzt läuft das zweistufig:

1. Klick auf "Ausparken" berechnet Parkdauer und Gebühr (2,50 € je angefangene Stunde, gedeckelt auf 15 €) und zeigt sie an
2. erst der danach eingeblendete Button "Bezahlen und ausparken" entfernt das Fahrzeug tatsächlich aus der Liste

### Umgesetzte Konzepte
- Datumsdifferenz berechnen (`new Date() - fahrzeug.einfahrt`)
- zweistufiger Bestätigungsablauf über zwei Buttons, von denen einer zunächst versteckt ist (`hidden`)
- `Math.ceil` für angefangene Stunden, `Math.min` für den Gebührendeckel

## Start
`index.html` direkt im Browser öffnen.

## Ausgangsbasis
Übernommen aus [`parkautomat/`](../parkautomat/) (Stand: Einparken, Ausparken, Fahrzeugliste). Alle darüber hinausgehenden Funktionen in diesem Ordner sind eigenständige Erweiterungen.
