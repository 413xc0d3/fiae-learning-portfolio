# Python – Struktogramm und Fehleranalyse

Unterrichtsaufgabe zur Übertragung einer vorgegebenen Programmlogik in Python und zur Analyse eines Logikfehlers am Beispiel einer Parkhausbelegung.

## Einordnung
Die Aufgabe wurde gemeinsam im Unterricht erarbeitet. Ich habe die Umsetzung und insbesondere die Analyse der Programmlogik und des Fehlverhaltens aktiv mitvollzogen.

Sie ist daher **kein vollständig eigenständig entwickeltes Python-Projekt**, sondern ein Lernbeispiel dafür, wie ich Bedingungen, Schleifen, Listen, Funktionen und fehlerhafte Logik nachvollzogen und getestet habe.

## Aufgabe
Ein Parkhaus besitzt 100 Stellplätze. Ein Zähler soll erfassen, wie viele Plätze belegt sind. Ab einem Grenzwert von 90 % soll die Anzeige auf `belegt` wechseln.

Das zugrunde liegende Struktogramm enthält jedoch einen Fehler: Für einen freien Stellplatz wird der Zähler nicht unverändert gelassen, sondern um `1` verringert.

## Behandelte Konzepte
- Funktionen und Parameter
- Listen und Indexzugriff
- `if` / `else`
- Schleifen
- Zählvariablen
- Testfälle
- Fehlersuche und Analyse von Programmlogik
- Übertragung eines Struktogramms in ausführbaren Python-Code

## Beobachtung
Durch den Fehler gilt für `b` tatsächlich belegte Plätze:

`z = b - (100 - b) = 2b - 100`

Die Bedingung `z >= 90` wird dadurch nicht wie vorgesehen ab 90 belegten Plätzen erfüllt, sondern erst ab 95.

Die ausführlichere Herleitung steht in [`ANALYSE.md`](ANALYSE.md).

## Start
Voraussetzung ist Python 3.

```bash
python struktogrammFehler.py
```

Die Datei führt mehrere Testfälle mit unterschiedlicher Belegung aus und gibt den berechneten Zählerstand sowie die resultierende Anzeige aus.
