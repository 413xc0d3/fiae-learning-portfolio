# Barista-Automat – HTML, CSS und JavaScript

Frühe Browser-Stufe der Barista-Unterrichtsreihe aus der FIAE-Umschulung. In dieser Version werden grundlegende Zustände eines Getränkeautomaten noch vollständig im Browser mit JavaScript verarbeitet.

**Live-Demo:** https://413xc0d3.github.io/fiae-learning-portfolio/barista/

## Funktionen
- Maschine aufheizen
- Espresso oder Latte auswählen
- Auswahl über `switch` auswerten
- Start erst nach dem Aufheizen freigeben
- Maschinenzustand über Variablen verwalten
- Statusmeldungen im DOM anzeigen

## Behandelte Konzepte
- DOM-Selektion mit `getElementById`
- Event-Handler
- Funktionen und Parameter
- `while`-Schleife
- `if` / `else`
- `switch`
- Zustandsvariablen
- Aktivieren und Deaktivieren eines Buttons

## Entstehung
Nach einer Einführung in das jeweilige Thema wurden die Aufgaben zunächst selbstständig bearbeitet. Anschließend wurde die Lösung gemeinsam im Unterricht erarbeitet, besprochen und nachvollzogen. Den eigenen Arbeitsstand habe ich danach entsprechend korrigiert und vervollständigt.

Diese Version zeigt bewusst eine **frühe Entwicklungsstufe**. Das Thema wurde später im Unterricht mit PHP, Sessions, Ressourcenverwaltung, Konfiguration und Logging weitergeführt; diese spätere Stufe liegt im Ordner [`barista-automat-php/`](../barista-automat-php/).

## Start
`index.html` direkt im Browser öffnen.

## Aufbereitung für das Portfolio
Für die erste Veröffentlichung wurde die vorhandene Unterrichtsfassung inhaltlich nicht erweitert. Für die Veröffentlichung wurde `barista.html` lediglich als `index.html` übernommen, damit die Anwendung direkt über GitHub Pages aufgerufen werden kann.

## Eigenständige Weiterentwicklung nach dem Unterricht

Die ursprüngliche Unterrichtsversion hat unbegrenzt Getränke zubereitet, ohne dass die vorhandenen Zutaten berücksichtigt wurden. Deshalb habe ich den Automaten um Vorräte für Wasser, Kaffee und Milch sowie um passende Verbrauchsmengen für beide Getränke erweitert.

Vor der Zubereitung prüft das Programm, ob für das ausgewählte Getränk genügend Zutaten vorhanden sind. Ein Espresso benötigt Wasser und Kaffee, ein Latte zusätzlich Milch. Reichen die Vorräte aus, werden die jeweiligen Mengen abgezogen und die verbleibenden Vorräte angezeigt. Fehlt eine Zutat, wird eine passende Fehlermeldung ausgegeben und das Getränk nicht zubereitet.

### Neue Funktionen

- Anfangsvorräte für Wasser, Kaffee und Milch
- eigene Verbrauchsmengen für Espresso und Latte
- Prüfung der benötigten Zutaten vor jeder Zubereitung
- Abzug der Zutaten nur bei ausreichenden Vorräten
- Fehlermeldung für die jeweils fehlende Zutat
- Anzeige der verbleibenden Vorräte nach erfolgreicher Zubereitung
