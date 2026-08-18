<?php

$rezeptBuch = [
    'Espresso'   => ['wasser' => 50,  'bohnen' => 10],
    'Kaffee'     => ['wasser' => 150, 'bohnen' => 15],
    'Cappuccino' => ['wasser' => 100, 'bohnen' => 10, 'milch' => 100, 'zucker' => 50],
    'Tee'        => ['wasser' => 250],
];

$logDatei = __DIR__ . '/logbuch.txt';
$konfigDatei = __DIR__ . '/barista_config.txt';

function schreibeLog(string $eintrag): void
{
    global $logDatei;

    $zeitStempel = date('Y-m-d | H:i:s');
    file_put_contents(
        $logDatei,
        $zeitStempel . ' --> ' . $eintrag . PHP_EOL,
        FILE_APPEND
    );
}

function initMaschine(): void
{
    global $konfigDatei;

    session_start();

    if (isset($_SESSION['init'])) {
        return;
    }

    if (!file_exists($konfigDatei)) {
        $_SESSION['statusMeldung'] = 'Konfigurationsdatei nicht gefunden.';
        $_SESSION['init'] = true;
        return;
    }

    $alleZeilen = file($konfigDatei, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($alleZeilen as $zeile) {
        $teile = explode('=', $zeile, 2);
        if (count($teile) !== 2) {
            continue;
        }

        [$schluessel, $wert] = $teile;
        $_SESSION[$schluessel] = is_numeric($wert) ? (int)$wert : $wert;

        if (strpos($schluessel, 'Stand') !== false) {
            $ressource = str_replace('Stand', '', $schluessel);
            $_SESSION[$ressource . 'Max'] = (int)$wert;
        }
    }

    $_SESSION['init'] = true;
}

initMaschine();

$ressourcenNamen = [];
foreach ($_SESSION as $key => $value) {
    if (strpos($key, 'Stand') !== false) {
        $ressourcenNamen[] = str_replace('Stand', '', $key);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aktion = $_POST['action'] ?? '';
    $eintrag = '';

    if (isset($_POST['getraenk']) && array_key_exists($_POST['getraenk'], $rezeptBuch)) {
        $_SESSION['wahl'] = $_POST['getraenk'];
        $_SESSION['statusMeldung'] = $_SESSION['wahl'] . ' ausgewählt';
        $eintrag = 'AUSWAHL: ' . $_SESSION['wahl'];
    }

    foreach ($ressourcenNamen as $name) {
        if ($aktion === 'fuellen' . ucfirst($name)) {
            $_SESSION[$name . 'Stand'] = $_SESSION[$name . 'Max'];
            $_SESSION['statusMeldung'] = ucfirst($name) . 'vorrat aufgefüllt';
            $eintrag = 'RESSOURCEN: ' . $_SESSION['statusMeldung'];
        }
    }

    switch ($aktion) {
        case 'heizen':
            while ($_SESSION['temperatur'] < 90) {
                $_SESSION['temperatur'] += 10;
            }
            $_SESSION['statusMeldung'] = 'Maschine vorgeheizt';
            $eintrag = 'SYSTEM: Maschine vorgeheizt';
            break;

        case 'start':
            $getraenk = $_SESSION['wahl'] ?? '';

            if ($getraenk === '' || !array_key_exists($getraenk, $rezeptBuch)) {
                $_SESSION['statusMeldung'] = 'Keine Auswahl getroffen';
                $eintrag = 'FEHLER: Keine Auswahl getroffen';
                break;
            }

            if ($_SESSION['temperatur'] < 90) {
                $_SESSION['statusMeldung'] = 'Maschine muss noch heizen';
                $eintrag = 'FEHLER: Maschine muss noch heizen';
                break;
            }

            if ($_SESSION['tassenZaehler'] >= $_SESSION['reinigungsLimit']) {
                $_SESSION['statusMeldung'] = 'Reinigung erforderlich';
                $eintrag = 'FEHLER: Reinigung erforderlich';
                break;
            }

            $rezept = $rezeptBuch[$getraenk];
            $ressourcenOK = true;

            foreach ($rezept as $zutat => $bedarf) {
                $sessionKey = $zutat . 'Stand';
                if (($_SESSION[$sessionKey] ?? 0) < $bedarf) {
                    $_SESSION['statusMeldung'] = 'Zu wenig ' . ucfirst($zutat);
                    $eintrag = 'FEHLER: ' . $_SESSION['statusMeldung'];
                    $ressourcenOK = false;
                    break;
                }
            }

            if ($ressourcenOK) {
                foreach ($rezept as $zutat => $bedarf) {
                    $_SESSION[$zutat . 'Stand'] -= $bedarf;
                }

                $_SESSION['statusMeldung'] = $getraenk . ' wird zubereitet';
                $_SESSION['tassenZaehler']++;
                $_SESSION['wahl'] = '';
                $eintrag = 'BRÜHVORGANG: ' . $_SESSION['statusMeldung'];
            }
            break;

        case 'reinigen':
            $_SESSION['tassenZaehler'] = 0;
            $_SESSION['statusMeldung'] = 'Danke für die Reinigung';
            $eintrag = 'SERVICE: Reinigung';
            break;

        case 'reset':
            schreibeLog('SYSTEM: ausgeschaltet');
            session_destroy();
            header('Location: index.php');
            exit;
    }

    if ($eintrag !== '') {
        schreibeLog($eintrag);
    }
}

$anzeigeStatus = $_SESSION['statusMeldung'] ?? '';
$anzeigeReinigungIn = ($_SESSION['reinigungsLimit'] ?? 0) - ($_SESSION['tassenZaehler'] ?? 0);
$anzeigeTemperatur = $_SESSION['temperatur'] ?? 0;

$gesperrt = (
    $anzeigeTemperatur < 90 ||
    $anzeigeReinigungIn <= 0 ||
    empty($_SESSION['wahl'])
);
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barista-Automat</title>
    <link rel="stylesheet" href="barista.css">
</head>
<body>
    <main class="automat">
        <header>
            <p class="eyebrow">PHP-Unterrichtsprojekt</p>
            <h1>Barista-Automat</h1>
            <p class="status"><?= htmlspecialchars($anzeigeStatus, ENT_QUOTES, 'UTF-8') ?></p>
        </header>

        <section class="status-grid" aria-label="Maschinenstatus">
            <div>
                <span>Temperatur</span>
                <strong><?= (int)$anzeigeTemperatur ?> °C</strong>
            </div>
            <div>
                <span>Reinigung in</span>
                <strong><?= (int)$anzeigeReinigungIn ?> Tassen</strong>
            </div>
            <div>
                <span>Auswahl</span>
                <strong><?= htmlspecialchars($_SESSION['wahl'] ?: '—', ENT_QUOTES, 'UTF-8') ?></strong>
            </div>
        </section>

        <section>
            <h2>Ressourcen</h2>
            <table>
                <thead>
                    <tr>
                        <th>Ressource</th>
                        <th>Bestand</th>
                        <th>Maximum</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ressourcenNamen as $name): ?>
                        <tr>
                            <td><?= htmlspecialchars(ucfirst($name), ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= (int)$_SESSION[$name . 'Stand'] ?></td>
                            <td><?= (int)$_SESSION[$name . 'Max'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <form method="post">
            <section>
                <h2>Bedienung</h2>
                <div class="button-row">
                    <button type="submit" name="action" value="heizen">Aufheizen</button>
                    <button type="submit" name="action" value="reinigen">Reinigen</button>
                </div>
            </section>

            <section>
                <h2>Getränk wählen</h2>
                <div class="button-row">
                    <?php foreach ($rezeptBuch as $getraenkeName => $zutaten): ?>
                        <button type="submit" name="getraenk" value="<?= htmlspecialchars($getraenkeName, ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($getraenkeName, ENT_QUOTES, 'UTF-8') ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </section>

            <section>
                <h2>Vorräte auffüllen</h2>
                <div class="button-row">
                    <?php foreach ($ressourcenNamen as $name): ?>
                        <button type="submit" name="action" value="fuellen<?= htmlspecialchars(ucfirst($name), ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars(ucfirst($name), ENT_QUOTES, 'UTF-8') ?> füllen
                        </button>
                    <?php endforeach; ?>
                </div>
            </section>

            <div class="button-row primary-actions">
                <button class="primary" type="submit" name="action" value="start" <?= $gesperrt ? 'disabled' : '' ?>>Start</button>
                <button type="submit" name="action" value="reset">Ausschalten</button>
            </div>
        </form>
    </main>
</body>
</html>
