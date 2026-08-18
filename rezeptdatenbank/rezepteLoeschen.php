<?php

require_once 'dbVerbindung.php';

try {
    if (isset($_GET['deleteID'])) {
        $id = (int)$_GET['deleteID'];
        $sql = "DELETE FROM rezepte WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    header('Location: rezepteIndex.php');
    exit;
} catch (PDOException $fehler) {
    $meldung = 'Das Rezept konnte wegen eines Datenbankfehlers nicht gelöscht werden.';
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezept löschen</title>
    <link rel="stylesheet" href="rezepte.css">
</head>
<body>
    <h1>Rezept löschen</h1>
    <div class="feedback"><?= htmlspecialchars($meldung, ENT_QUOTES, 'UTF-8') ?></div>
    <a href="rezepteIndex.php">Rezept-Übersicht</a>
</body>
</html>
