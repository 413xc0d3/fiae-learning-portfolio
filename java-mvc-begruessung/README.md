# Java – Begrüßungsbeispiel mit MVC

Kleine Konsolenanwendung aus dem FIAE-Unterricht zur grundlegenden Aufteilung einer Anwendung in **Model**, **View** und **Controller**.

## Aufbau
- `BegruessungsModel.java` enthält die Verarbeitung des Begrüßungstextes.
- `BegruessungsView.java` enthält eine einfache deutschsprachige Konsolenansicht.
- `AndereView.java` ist eine zweite View-Variante aus der Unterrichtsentwicklung.
- `BegruessungsController.java` verbindet Eingabe, Verarbeitung und Ausgabe. In der hier vorliegenden Fassung verwendet er `AndereView`.

## Behandelte Konzepte
- Klassen und Objekte
- Methoden, Parameter und Rückgabewerte
- Konstruktoren und Objektbeziehungen
- grundlegende Aufgabentrennung nach Model-View-Controller
- Konsoleneingabe mit `Scanner`
- Instanziierung mit `new`
- Weitergabe von Daten zwischen Objekten

## Einordnung der MVC-Umsetzung
Das Beispiel zeigt die grundlegende Trennung der Verantwortlichkeiten: Das Model erzeugt den Begrüßungstext, die View übernimmt Ein- und Ausgabe und der Controller koordiniert den Ablauf.

Die Unterrichtsfassung verwendet noch **kein gemeinsames View-Interface**. Der Controller ist konkret auf `AndereView` typisiert. Diese Begrenzung wird bewusst nicht nachträglich zu einer komplexeren Architektur umgebaut, damit der veröffentlichte Code den tatsächlich behandelten Lernstand widerspiegelt.

## Entstehung
Nach einer Einführung in das jeweilige Thema wurden die Aufgaben zunächst selbstständig bearbeitet. Anschließend wurde die Lösung gemeinsam im Unterricht erarbeitet, besprochen und nachvollzogen. Den eigenen Arbeitsstand habe ich danach entsprechend korrigiert und vervollständigt.

## Start
Voraussetzung ist ein installiertes JDK.

Vom Projektordner aus:

```bash
javac -d out src/mvc/*.java
java -cp out mvc.BegruessungsController
```

Danach fragt die Anwendung in der Konsole nach einem Namen und gibt den vom Model erzeugten Begrüßungstext über die View aus.

## Aufbereitung für das Portfolio
Für die Veröffentlichung wurden nur kleinere Lesbarkeitsbereinigungen vorgenommen: Einrückungen und Abstände wurden vereinheitlicht und auskommentierte Zwischenstände im Controller entfernt. Die Programmlogik und die verwendete View-Variante bleiben dem Unterrichtsstand entsprechend erhalten.
