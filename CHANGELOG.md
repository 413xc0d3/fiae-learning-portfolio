# Änderungsnotizen zur GitHub-Aufbereitung

## 2026-08-18

Die Ausgangsdateien stammen aus Unterrichtsübungen der FIAE-Umschulung.

Für eine saubere öffentliche Darstellung wurden folgende Änderungen vorgenommen:

### Parkautomat
- zweite HTML-Version als `index.html` übernommen
- offensichtlichen Fremd-/Tipptext `XBCXBX` entfernt
- relative CSS-/JavaScript-Pfade an die kompakte Ordnerstruktur angepasst

### Rezeptdatenbank
- refaktorierte Unterrichtsversion verwendet
- offensichtliche Tabellen-Tippfehler `rezeptX` / `rezepteX` auf `rezepte` korrigiert
- Datenbankverbindung mit lokalen Standardwerten und optionalen Umgebungsvariablen versehen
- PDO-Fehlermodus und Fetch-Modus explizit gesetzt
- minimale HTML-Ausgabemaskierung für Rezeptnamen ergänzt
- nach dem Redirect beim Löschen `exit` ergänzt
- `schema.sql` als reproduzierbares lokales Beispielschema ergänzt

### Repository
- README-Dateien ergänzt
- Musterlösungen, Skripte, PDFs, Videos und nicht eindeutig eigene Beispielprojekte bewusst ausgeschlossen
