# Analyse des Logikfehlers

## Erwartetes Verhalten
Der Zähler `z` soll ausschließlich die belegten Stellplätze erfassen:

- belegter Platz → `z + 1`
- freier Platz → keine Änderung

Bei 100 Stellplätzen und einem Grenzwert von 90 % müsste die Anzeige also ab 90 belegten Plätzen auf `belegt` wechseln.

## Fehler im Ablauf
Im fehlerhaften Struktogramm wird bei einem freien Platz dagegen `z - 1` ausgeführt.

Damit zählt das Programm nicht nur belegte Plätze, sondern zieht zusätzlich jeden freien Platz wieder ab.

Sind `b` Plätze belegt, dann sind `100 - b` Plätze frei. Der berechnete Zähler lautet deshalb:

`z = b - (100 - b)`

also:

`z = 2b - 100`

## Auswirkung auf den Grenzwert
Die Anzeige wechselt auf `belegt`, wenn:

`z >= 90`

Eingesetzt ergibt das:

`2b - 100 >= 90`

`2b >= 190`

`b >= 95`

Der Fehler verschiebt den tatsächlichen Schaltpunkt somit von **90 % auf 95 % Belegung**.

## Beispiele

| Tatsächlich belegt | Berechneter Zähler `z` | Anzeige |
|---:|---:|---|
| 0 | -100 | frei |
| 10 | -80 | frei |
| 90 | 80 | frei |
| 94 | 88 | frei |
| 95 | 90 | belegt |
| 100 | 100 | belegt |

## Korrekturprinzip
Für einen freien Stellplatz dürfte der Belegungszähler nicht verringert werden. Der `else`-Zweig müsste den Zähler daher unverändert lassen.

Die veröffentlichte Python-Datei bildet bewusst die **fehlerhafte Ausgangslogik** ab, weil der Schwerpunkt der Unterrichtsaufgabe auf dem Erkennen, Simulieren und Erklären dieses Fehlers liegt.
