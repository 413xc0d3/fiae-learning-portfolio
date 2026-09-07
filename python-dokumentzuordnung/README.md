# Python – Dokumentzuordnung für Verwaltungsobjekte

## Hintergrund
Die Idee basiert auf einer realen Aufgabenstellung aus meiner früheren Tätigkeit im Bereich Dokumentendigitalisierung (ELO Office, Immobilienverwaltung): unsortierte Dokumente mussten inhaltlich den zugehörigen Verwaltungsobjekten zugeordnet werden. Dieses Skript bildet eine vereinfachte, rein fiktive Version dieses Ablaufs in Python nach – alle Beispieldaten (Objekte, Dateinamen, Adressen) sind frei erfunden, es wurden keine echten Daten aus früheren Projekten verwendet.

Aufbauend auf den Grundlagen aus [`python-grundlagen`](../python-grundlagen/) (Dateiverarbeitung, Aufbau eines Dictionaries nach dem Muster aus `woerterbuch.py`) wurde das Skript eigenständig entwickelt.

## Funktionsweise
- `objekte.txt` enthält eine Liste bekannter Verwaltungsobjekte im Format `ID;Bezeichnung`
- `beispieldateien/` enthält fiktive, unsortierte Dokumente – ein Teil der Dateinamen enthält eine bekannte Objekt-ID, ein Teil eine unbekannte oder gar keine
- Das Skript liest die Objektliste ein, durchsucht jeden Dateinamen nach einer bekannten ID und gruppiert die Treffer je Objekt
- Dateien ohne erkennbare oder ohne registrierte ID landen in einer separaten Liste "nicht zugeordnet"
- Am Ende gibt das Skript einen lesbaren Report in der Konsole aus: je Objekt Name und zugehörige Dateien, danach die nicht zugeordneten Dateien

## Ausführen
```bash
cd python-dokumentzuordnung
python dokumentenzuordnung.py
```

## Entstehung
Den Code habe ich selbst in VS Code geschrieben. Claude hat dabei als Tutor fungiert: Konzepte erklärt, typische Anfängerfehler beim Debuggen aufgezeigt (z. B. ein Encoding-Problem, durch das Umlaute beim Einlesen der Objektdatei falsch dargestellt wurden) und Rückfragen beantwortet. Geschrieben und angepasst habe ich den Code jeweils selbst.

## Weitere denkbare Erweiterungen
- Zuordnung nicht nur über den Dateinamen, sondern auch über den Dateiinhalt
- Tatsächliches Verschieben der Dateien in objektspezifische Unterordner statt nur Report
- Export des Reports in eine Datei (z. B. CSV oder TXT) statt nur Konsolenausgabe
