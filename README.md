# FIAE – ausgewählte Lernprojekte

Dieses Repository dokumentiert meinen aktuellen Lernstand in der laufenden Umschulung zum **Fachinformatiker für Anwendungsentwicklung (FIAE)**.

Die enthaltenen Projekte sind **Unterrichts- und Übungsprojekte**. Der typische Ablauf war dabei: Nach einer Einführung in das jeweilige Thema wurden die Aufgaben zunächst selbstständig bearbeitet. Anschließend wurde die Lösung gemeinsam im Unterricht erarbeitet, besprochen und nachvollzogen. Den eigenen Arbeitsstand habe ich danach entsprechend korrigiert und vervollständigt.

Die Projekte sind deshalb bewusst **nicht als vollständig eigenständig entwickelte Produktivprojekte** dargestellt, sondern als nachvollziehbare Beispiele meines Ausbildungs- und Lernstands.

## Enthaltene Projekte

### 1. Parkautomat – HTML, CSS, JavaScript
Kleine Browser-Anwendung zur Erfassung geparkter Fahrzeuge.

**Live-Demo:** https://413xc0d3.github.io/fiae-learning-portfolio/

Behandelte Themen:
- DOM-Zugriff und Event-Handling
- Funktionen und einfache Validierung
- Arrays und Objekte
- dynamisches Erzeugen von Listeneinträgen
- grundlegende HTML-/CSS-Struktur

Ordner: [`parkautomat/`](parkautomat/)

### 2. Rezeptdatenbank – PHP, PDO, SQL
Kleine CRUD-Anwendung zur Verwaltung von Getränkerezepten in einer relationalen Datenbank.

Behandelte Themen:
- PHP-Formularverarbeitung
- PDO-Datenbankverbindung
- Prepared Statements
- SELECT / INSERT / UPDATE / DELETE
- grundlegende Fehlerbehandlung
- Trennung der Datenbankverbindung vom übrigen Code

Ordner: [`rezeptdatenbank/`](rezeptdatenbank/)

### 3. Barista-Automat – HTML, CSS, JavaScript
Frühe Browser-Stufe der Barista-Unterrichtsreihe mit einfacher Zustandslogik für Aufheizen, Getränkeauswahl und Start.

**Live-Demo:** https://413xc0d3.github.io/fiae-learning-portfolio/barista/

Behandelte Themen:
- DOM-Selektion und Event-Handling
- Funktionen und Parameter
- `while`-Schleife
- `if` / `else` und `switch`
- Zustandsvariablen
- Aktivieren und Deaktivieren von Bedienelementen

Ordner: [`barista-javascript/`](barista-javascript/)

### 4. Barista-Automat – PHP, Sessions und Zustandslogik
Spätere Unterrichtsstufe des Getränkeautomaten mit Zustandsverwaltung über PHP-Sessions.

Behandelte Themen:
- Session-basierte Zustandsverwaltung
- Rezeptlogik mit Arrays
- Ressourcenprüfung und -verbrauch
- Konfiguration aus einer Textdatei
- Formularaktionen über `POST`
- Reinigungsintervall und Maschinenzustand
- lokale Protokollierung von Aktionen

Ordner: [`barista-automat-php/`](barista-automat-php/)

### 5. Struktogramm-Fehleranalyse – Python
Lernbeispiel zur Simulation und Analyse fehlerhafter Programmlogik bei einer Parkhausbelegung.

Behandelte Themen:
- Python-Funktionen und Parameter
- Listen und Indexzugriff
- Bedingungen und Schleifen
- Testfälle
- Fehlersuche und Analyse von Programmlogik
- Übertragung eines Struktogramms in ausführbaren Code

Ordner: [`python-struktogramm-debugging/`](python-struktogramm-debugging/)

### 6. Begrüßungsbeispiel – Java, OOP und MVC
Kleine Konsolenanwendung zur grundlegenden Trennung von Verarbeitung, Ein-/Ausgabe und Steuerung nach dem Model-View-Controller-Prinzip.

Behandelte Themen:
- Klassen, Objekte und Methoden
- Konstruktoren und Objektbeziehungen
- Model, View und Controller
- Konsoleneingabe mit `Scanner`
- Methodenparameter und Rückgabewerte
- zwei View-Varianten aus der Unterrichtsentwicklung

Ordner: [`java-mvc-begruessung/`](java-mvc-begruessung/)

## Einordnung meines Kenntnisstands

Der Schwerpunkt liegt aktuell auf dem Verständnis grundlegender Programmierkonzepte, dem Lesen und Nachvollziehen von Code sowie der schrittweisen Übertragung von Anforderungen in kleinere Anwendungen. Das Repository soll diesen Ausbildungsstand nachvollziehbar machen und wird mit weiteren eigenen Übungen und Projekten ergänzt.

## Aufbereitung für GitHub

Für die Veröffentlichung wurden ausschließlich kleinere technische Bereinigungen vorgenommen, darunter:
- offensichtliche Tippfehler korrigiert,
- Dateipfade vereinheitlicht,
- lokale Datenbankkonfiguration für eine öffentliche Ablage etwas bereinigt,
- minimale Ausgabemaskierung ergänzt,
- Dokumentation und Setup-Hinweise hinzugefügt,
- experimentelle beziehungsweise auskommentierte Unterrichtsreste aus den veröffentlichten Fassungen entfernt.

Die zugrunde liegende Anwendungslogik entspricht den im Unterricht erarbeiteten Übungen. Details stehen in [`CHANGELOG.md`](CHANGELOG.md).

> Hinweis: Unterrichtsskripte, Aufgaben-PDFs, ausdrücklich gekennzeichnete Musterlösungen und fremde Beispielressourcen sind bewusst nicht Bestandteil dieses Repositories.
