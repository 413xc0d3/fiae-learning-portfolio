# Parkautomat

Kleine Unterrichtsübung mit HTML, CSS und JavaScript.

## Funktionen
- Kennzeichen eingeben
- Eingabe auf leeren Wert prüfen
- Zeitpunkt der Einfahrt speichern
- geparkte Fahrzeuge dynamisch in der Oberfläche anzeigen

## Behandelte Konzepte
- `getElementById`
- `addEventListener`
- Funktionen
- Arrays und Objekte
- `forEach`
- `createElement` / `appendChild`
- einfache Eingabevalidierung

## Start
`index.html` direkt im Browser öffnen.

## Eigenständige Weiterentwicklung nach dem Unterricht

In der ursprünglichen Unterrichtsversion konnten Fahrzeuge eingeparkt und in einer Liste angezeigt, aber noch nicht wieder ausgeparkt werden. Deshalb habe ich für jedes geparkte Fahrzeug einen eigenen Auspark-Button ergänzt.

Beim Anklicken wird das zugehörige Fahrzeug anhand seiner Position mit `splice()` aus dem Array entfernt. Anschließend wird die Fahrzeugliste neu aufgebaut und eine Meldung mit dem ausgeparkten Kennzeichen angezeigt.

### Neue Funktionen

- eigener Auspark-Button für jedes geparkte Fahrzeug
- gezieltes Entfernen des ausgewählten Fahrzeugs aus dem Array
- erneutes Rendern der Fahrzeugliste nach dem Ausparken
- Erfolgsmeldung mit dem Kennzeichen des ausgeparkten Fahrzeugs

## Entstehung
Nach einer Einführung in das jeweilige Thema wurden die Aufgaben zunächst selbstständig bearbeitet. Anschließend wurde die Lösung gemeinsam im Unterricht erarbeitet, besprochen und nachvollzogen. Den eigenen Arbeitsstand habe ich danach entsprechend korrigiert und vervollständigt.
