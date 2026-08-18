# Python – Grundlagen und Unterrichtsübungen

Dieser Ordner enthält ausgewählte Python-Übungen aus der laufenden FIAE-Umschulung.

Die Beispiele wurden im Unterricht gemeinsam anhand der zugehörigen Aufgabenstellungen erarbeitet. Die einzelnen Programmierschritte wurden dabei umgesetzt, besprochen und nachvollzogen. Die Dateien zeigen damit meinen damaligen Lernstand und sind bewusst **nicht als vollständig eigenständig entwickelte Anwendungen** dargestellt.

## Enthaltene Bereiche

### Grundlagen
- Datentypen und Listen
- arithmetische und logische Operatoren
- `if` / `elif` / `else`
- `match` / `case`
- `while`- und `for`-Schleifen
- Benutzereingaben und Typumwandlung
- einfache Fehlerbehandlung mit `try` / `except` / `finally`

Ordner: [`grundlagen/`](grundlagen/)

### Dateiverarbeitung
- Textdateien lesen
- Text an Dateien anhängen
- Lesen und Schreiben über denselben Datenstrom
- einfache Fehlerbehandlung bei Dateioperationen

Ordner: [`dateiverarbeitung/`](dateiverarbeitung/)

### Wörterbuch
- Textdatei zeilenweise einlesen
- Daten mit einem Trennzeichen zerlegen
- Aufbau eines Python-Dictionaries
- Suche nach Schlüsseln und Ausgabe einer Übersetzung

Die in der Unterrichtsdatei enthaltenen Kommentare und die noch offene Erweiterungsaufgabe bleiben bewusst erhalten, weil sie den damaligen Arbeitsstand zeigen.

Ordner: [`woerterbuch/`](woerterbuch/)

### Datenbankzugriff
- Verbindung zu MySQL/MariaDB mit `mysql.connector`
- Cursor und Metadatenabfragen
- parametrisierte `INSERT`-Statements
- `SELECT` und Dictionary-Cursor
- lokales Beispielschema für die verwendete Tabelle

Ordner: [`datenbank/`](datenbank/)

## Lokaler Start

Für die Grundlagen-, Datei- und Wörterbuchübungen wird Python 3 benötigt.

Die Dateiverarbeitungs- und Wörterbuchskripte sollten aus ihrem jeweiligen Unterordner gestartet werden, da sie mit relativen Dateipfaden arbeiten.

Für die Datenbankbeispiele wird zusätzlich das Paket `mysql-connector-python` sowie eine lokale MySQL-/MariaDB-Instanz benötigt:

```bash
pip install -r requirements.txt
```

Anschließend kann `datenbank/verwaltung.sql` in eine lokale MySQL-/MariaDB-Instanz importiert werden. Die Unterrichtsskripte verwenden die lokale Datenbank `verwaltung` und die Tabelle `person`.

## Aufbereitung für das Portfolio

Die Programmlogik und die scherzhaften beziehungsweise persönlichen Unterrichtsausgaben wurden nicht nachträglich geglättet. Sie gehören zum gemeinsam erarbeiteten Unterrichtsstand.

Technisch geändert wurden ausschließlich die für die neue Ordnerstruktur notwendigen relativen Dateipfade. Dadurch funktionieren die entsprechenden Übungen auch in der Portfolio-Struktur.

Nicht aufgenommen wurden unter anderem reine Einstiegsdateien ohne zusätzlichen Aussagewert sowie eine Funktionsübung, deren letzter Unterrichtszustand zu einem Aufruffehler führt. Diese Auswahl dient nur dazu, den Portfolio-Ordner übersichtlich und direkt nachvollziehbar zu halten.
