<?php

require_once 'dbVerbindung.php';

$rezept = null;

try {
    $id = (int)($_GET['updateID'] ?? 0);
    $sql = "SELECT * FROM rezepte WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $rezept = $stmt->fetch();

    if (!$rezept) {
        $meldung = 'Rezept nicht gefunden';
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $rezept) {
        $name   = trim($_POST['getraenk'] ?? '');
        $wasser = (int)($_POST['wasser'] ?? 0);
        $bohnen = (int)($_POST['bohnen'] ?? 0);
        $milch  = (int)($_POST['milch'] ?? 0);
        $zucker = (int)($_POST['zucker'] ?? 0);
        $kakao  = (int)($_POST['kakao'] ?? 0);

        if ($name !== '') {
            $sql = "UPDATE rezepte
                    SET name = :name, wasser = :wasser, bohnen = :bohnen,
                        milch = :milch, zucker = :zucker, kakao = :kakao
                    WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            $daten = [
                'name'   => $name,
                'wasser' => $wasser,
                'bohnen' => $bohnen,
                'milch'  => $milch,
                'zucker' => $zucker,
                'kakao'  => $kakao,
                'id'     => $id
            ];

            $stmt->execute($daten);
            $meldung = 'Getränk aktualisiert';
        } else {
            $meldung = 'Bitte Getränkename eingeben';
        }
    }
} catch (PDOException $fehler) {
    $meldung = 'Das Rezept konnte wegen eines Datenbankfehlers nicht verarbeitet werden.';
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezept bearbeiten</title>
    <link rel="stylesheet" href="rezepte.css">
</head>
<body>
    <h1>Rezept bearbeiten</h1>

    <?php if (!$rezept): ?>
        <div class="feedback"><?= htmlspecialchars($meldung, ENT_QUOTES, 'UTF-8') ?></div>
        <a href="rezepteIndex.php">Rezept-Übersicht</a>
    <?php else: ?>
        <?php if ($meldung): ?>
            <div class="feedback"><?= htmlspecialchars($meldung, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <form method="post">
            <label for="getraenk">Getränkename:</label>
            <input type="text" id="getraenk" name="getraenk" value="<?= htmlspecialchars($rezept['name'], ENT_QUOTES, 'UTF-8') ?>" required>

            <label for="wasser">Wasser</label>
            <input type="number" id="wasser" min="0" value="<?= (int)$rezept['wasser'] ?>" name="wasser">

            <label for="bohnen">Bohnen</label>
            <input type="number" id="bohnen" min="0" value="<?= (int)$rezept['bohnen'] ?>" name="bohnen">

            <label for="milch">Milch</label>
            <input type="number" id="milch" min="0" value="<?= (int)$rezept['milch'] ?>" name="milch">

            <label for="zucker">Zucker</label>
            <input type="number" id="zucker" min="0" value="<?= (int)$rezept['zucker'] ?>" name="zucker">

            <label for="kakao">Kakao</label>
            <input type="number" id="kakao" min="0" value="<?= (int)$rezept['kakao'] ?>" name="kakao">

            <button type="submit">Rezept aktualisieren</button>
        </form>

        <a href="rezepteIndex.php">Rezept-Übersicht</a>
    <?php endif; ?>
</body>
</html>
