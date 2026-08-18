# Änderungsnotizen zur GitHub-Aufbereitung

## 2026-08-18

Die Ausgangsdateien stammen aus Unterrichtsübungen der FIAE-Umschulung.

Für eine saubere öffentliche Darstellung wurden folgende Änderungen vorgenommen:

### Parkautomat
- zweite HTML-Version als `index.html` übernommen
- offensichtlichen Fremd-/Tipptext `XBCXBX` entfernt
- relative CSS-/JavaScript-Pfade an die kompakte Ordnerstruktur angepasst
- Debug-Ausgaben und auskommentierte Unterrichtsreste entfernt
- Funktionsname `createSuccesMessage` auf `createSuccessMessage` korrigiert
- Eingabe vor der Verarbeitung mit `trim()` bereinigt
- Ablauf der Ereignisbehandlung übersichtlicher strukturiert

### Rezeptdatenbank
- refaktorierte Unterrichtsversion verwendet
- offensichtliche Tabellen-Tippfehler `rezeptX` / `rezepteX` auf `rezepte` korrigiert
- Datenbankverbindung mit lokalen Standardwerten und optionalen Umgebungsvariablen versehen
- PDO-Fehlermodus und Fetch-Modus explizit gesetzt
- minimale HTML-Ausgabemaskierung ergänzt
- interne PDO-Fehlermeldungen durch neutrale Benutzermeldungen ersetzt
- Formulare und Seitentitel konsistenter benannt
- unnötige Datenbankabfrage nach dem Löschvorgang entfernt
- nach dem Redirect beim Löschen `exit` ergänzt
- `schema.sql` als reproduzierbares lokales Beispielschema ergänzt

### Barista-Automat
- V11 als letzte Fassung vor den ausdrücklich gekennzeichneten Musteraufgaben als Grundlage verwendet
- dreifache Ressourcenanzeige auf eine übersichtliche Tabelle reduziert
- nicht verwendete Beispielressourcen `suppen` und `salz` aus der veröffentlichten Konfiguration entfernt
- Debug-/Experimentierreste aus der Oberfläche entfernt
- Auswahl eines Getränks vor der Verarbeitung gegen das Rezeptbuch geprüft
- Startlogik so abgesichert, dass ohne gültige Auswahl kein Rezeptzugriff erfolgt
- Redirect beim Ausschalten auf `index.php` vereinheitlicht
- relevante HTML-Ausgaben maskiert
- Darstellung für die Portfolio-Fassung übersichtlicher strukturiert
- `logbuch.txt` als zur Laufzeit erzeugte Datei in `.gitignore` aufgenommen

### Python – Struktogramm-Fehleranalyse
- gemeinsam im Unterricht erarbeitete Python-Simulation als Lernbeispiel aufgenommen
- fehlerhafte Ausgangslogik bewusst erhalten, da deren Analyse Inhalt der Aufgabe ist
- Testfälle auf unterschiedliche Belegungszustände dokumentiert
- mathematische Herleitung des tatsächlich entstehenden Schaltpunkts von 95 % ergänzt
- Herkunft und Umfang der eigenen Mitarbeit im README transparent eingeordnet

### Repository
- README-Dateien ergänzt
- `.gitignore` ergänzt
- Parkautomat zusätzlich als GitHub-Pages-Demo veröffentlicht
- Portfolioübersicht um einen sichtbaren Python-Nachweis ergänzt
- Musterlösungen, Skripte, PDFs, Videos und nicht eindeutig eigene Beispielprojekte bewusst ausgeschlossen

> Die Bereinigungen dienen der Lesbarkeit und einer sicheren öffentlichen Darstellung. Die grundlegende Anwendungslogik bleibt die im Unterricht erarbeitete Übung.
