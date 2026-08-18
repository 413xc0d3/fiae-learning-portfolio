# Rezeptdatenbank

Unterrichtsübung zur Verbindung von PHP mit einer relationalen MySQL-/MariaDB-Datenbank.

## Funktionen
- Rezepte anzeigen
- Rezepte anlegen
- Rezepte bearbeiten
- Rezepte löschen

## Behandelte Konzepte
- PHP und HTML kombinieren
- Formularverarbeitung über `POST`
- URL-Parameter über `GET`
- PDO
- Prepared Statements
- CRUD-Operationen mit SQL
- einfache Fehlerbehandlung

## Lokaler Start
Voraussetzung ist eine lokale PHP-/MySQL-Umgebung, zum Beispiel XAMPP.

1. `schema.sql` in MySQL/MariaDB importieren.
2. Den Ordner in das lokale Webroot legen.
3. Bei Bedarf die Umgebungsvariablen `DB_HOST`, `DB_NAME`, `DB_USER` und `DB_PASS` setzen. Ohne Variablen werden typische lokale Standardwerte verwendet.
4. `rezepteIndex.php` über den lokalen Webserver öffnen.

## Entstehung
Die Anwendung wurde als Unterrichtsprojekt schrittweise erarbeitet. Einzelne Aufgaben wurden zunächst selbstständig gelöst und anschließend gemeinsam mit der Dozentin beziehungsweise anhand einer Referenzlösung überprüft.

## Nächste mögliche Lernschritte
- Löschvorgang von `GET` auf `POST` umstellen
- CSRF-Schutz ergänzen
- Validierung weiter ausbauen
- Oberfläche und Fehlermeldungen verbessern
- Struktur stärker in getrennte Verantwortlichkeiten aufteilen
