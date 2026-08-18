# Barista-Automat – PHP, Sessions und Zustandslogik

Unterrichtsprojekt aus der laufenden FIAE-Umschulung. Die Anwendung simuliert einen einfachen Getränkeautomaten, dessen Zustand über PHP-Sessions verwaltet wird.

## Funktionen
- Maschine aufheizen
- Getränk auswählen und zubereiten
- Zutaten anhand eines Rezeptbuchs prüfen und verbrauchen
- Ressourcen auffüllen
- Reinigungsintervall überwachen und zurücksetzen
- Maschinenzustand über eine Konfigurationsdatei initialisieren
- Aktionen in einer lokalen Logdatei protokollieren

## Behandelte Konzepte
- PHP-Sessions und Zustandsverwaltung
- Arrays und verschachtelte Datenstrukturen
- Formularverarbeitung über `POST`
- Kontrollstrukturen und Funktionen
- Konfigurationsdatei einlesen
- dynamische Ressourcenverwaltung
- einfache Validierung von Benutzeraktionen
- Schreiben einer lokalen Logdatei

## Lokaler Start
Voraussetzung ist eine lokale PHP-Umgebung, zum Beispiel XAMPP oder der eingebaute PHP-Entwicklungsserver.

1. Den Ordner lokal speichern.
2. Im Ordner beispielsweise `php -S localhost:8000` starten.
3. Im Browser `http://localhost:8000` öffnen.

Die Datei `logbuch.txt` wird bei Benutzung automatisch erzeugt und ist nicht Bestandteil des Repositories.

## Entstehung und Einordnung
Das Projekt wurde im Unterricht über mehrere Entwicklungsstufen schrittweise aufgebaut. Ich habe die Entwicklung der einzelnen Stufen mitvollzogen und Aufgaben dabei teilweise zunächst selbst bearbeitet. Den finalen Stand habe ich anschließend mit dem gemeinsam erarbeiteten beziehungsweise vorgesehenen Unterrichtsstand abgeglichen und korrigiert, damit ich keine fehlerhafte Variante als Lernstand behalte.

Die hier veröffentlichte Fassung ist deshalb **kein vollständig unabhängig entwickeltes Produktivprojekt**, sondern eine bereinigte Portfolio-Version des Unterrichtsstands.

## Aufbereitung für das Portfolio
Für die öffentliche Fassung wurden nur nachvollziehbare Bereinigungen vorgenommen:
- dreifache Ressourcenanzeige auf eine Tabelle reduziert,
- nicht verwendete Beispielressourcen aus der Konfiguration entfernt,
- Debug-/Experimentierreste aus der Darstellung entfernt,
- Auswahl- und Aktionsprüfung robuster gemacht,
- Redirect beim Ausschalten auf einen festen lokalen Einstiegspunkt gesetzt,
- HTML-Ausgaben an relevanten Stellen maskiert,
- Oberfläche übersichtlicher strukturiert.

Die grundlegende Fachlogik des Unterrichtsprojekts – Rezepte, Sessions, Ressourcenverbrauch, Reinigungszähler, Befüllen und Logging – bleibt erhalten.
