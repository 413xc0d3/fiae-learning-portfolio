# Python – Datenabgleich zwischen zwei Systemen

## Unterrichtsgrundlage
Basisübung zum Thema Datenabgleich: Zwei Datenbestände (z. B. IDs aus zwei
Systemen) werden verglichen, um Abweichungen zu finden – Grundlage für die
Prüfung der Datenqualität zwischen zwei Datenquellen.

Aktueller Stand: `finde_unterschiede()` vergleicht zwei Listen von IDs mit
`set`-Differenzen und gibt zurück, welche Einträge jeweils nur in einem der
beiden Systeme vorkommen.

## Eigenständige Erweiterung
Ergänzend zu `finde_unterschiede()` wurde `finde_uebereinstimmungen()`
umgesetzt: Sie liefert per Schnittmenge (`&`) die IDs, die in beiden Systemen
vorkommen.

Weitere denkbare Erweiterungen: Vergleich ganzer Datensätze statt nur IDs,
Behandlung von Duplikaten, Export der Abweichungen.

## Ausführen

```bash
python datenabgleich.py
```

## Tests
*(folgt)*
