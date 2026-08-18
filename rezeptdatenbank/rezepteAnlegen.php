<?php

require_once 'dbVerbindung.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name   = trim($_POST['getraenk'] ?? '');
    $wasser = (int)($_POST['wasser'] ?? 0);
    $bohnen = (int)($_POST['bohnen'] ?? 0);
    $milch  = (int)($_POST['milch'] ?? 0);
    $zucker = (int)($_POST['zucker'] ?? 0);
    $kakao  = (int)($_POST['kakao'] ?? 0);

    if ($name !== '') {
        try {
            $sql = "INSERT INTO rezepte (name, wasser, bohnen, milch, zucker, kakao)
                    VALUES (:name, :wasser, :bohnen, :milch, :zucker, :kakao)";
            $stmt = $pdo->prepare($sql);

            $daten = [
                'name'   => $name,
                'wasser' => $wasser,
                'bohnen' => $bohnen,
                'milch'  => $milch,
                'zucker' => $zucker,
                'kakao'  => $kakao
            ];

            $stmt->execute($daten);
            $meldung = 'Getränk angelegt';
        } catch (PDOException $fehler) {
            $meldung = 'Das Rezept konnte wegen eines Datenbankfehlers nicht angelegt werden.';
        }
    } else {
        $meldung = 'Bitte Getränkename eingeben';
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezept anlegen</title>
    <link rel="stylesheet" href="rezepte.css">
</head>
<body>
    <h1>Rezept anlegen</h1>

    <form method="post">
        <label for="getraenk">Getränkename:</label>
        <input type="text" id="getraenk" name="getraenk" placeholder="z.B. Wunschkaffee" required>

        <label for="wasser">Wasser</label>
        <input type="number" id="wasser" min="0" value="0" name="wasser">

        <label for="bohnen">Bohnen</label>
        <input type="number" id="bohnen" min="0" value="0" name="bohnen">

        <label for="milch">Milch</label>
        <input type="number" id="milch" min="0" value="0" name="milch">

        <label for="zucker">Zucker</label>
        <input type="number" id="zucker" min="0" value="0" name="zucker">

        <label for="kakao">Kakao</label>
        <input type="number" id="kakao" min="0" value="0" name="kakao">

        <button type="submit">Rezept eintragen</button>
    </form>

    <?php if ($meldung): ?>
        <div class="feedback"><?= htmlspecialchars($meldung, ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif; ?>

    <a href="rezepteIndex.php">Rezept-Übersicht</a>
</body>
</html>
