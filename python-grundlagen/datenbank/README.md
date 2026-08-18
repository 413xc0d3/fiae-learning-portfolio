# Python und MySQL/MariaDB

Diese Dateien stammen aus gemeinsam im Unterricht erarbeiteten Übungen zum Datenbankzugriff mit Python.

## Dateien
- `dbConnect.py` – Verbindung herstellen sowie Tabellen- und Spalteninformationen auslesen
- `dbInsert.py` – Datensatz mit einem parametrisierten `INSERT` anlegen
- `dbSelect.py` – Datensätze mit einem Dictionary-Cursor auslesen
- `verwaltung.sql` – lokales Beispielschema mit der Tabelle `person`

## Voraussetzung

```bash
pip install mysql-connector-python
```

Zusätzlich wird eine lokale MySQL-/MariaDB-Instanz benötigt. Die Skripte verwenden den im Unterricht genutzten lokalen Entwicklungszugang `root` ohne Passwort und die Datenbank `verwaltung`. Diese Konfiguration ist nur für eine lokale Lernumgebung gedacht.
