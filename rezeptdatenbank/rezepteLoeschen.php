<?php
    
    require_once 'dbVerbindung.php';

   try{
        if(isset($_GET['deleteID'])){
            $id = (int)$_GET['deleteID'];
            $sql = "DELETE FROM rezepte WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id]);

        }

       $sql = "SELECT * FROM rezepte ORDER BY id";
        
        
        // 2. Anfrage an DB geben -> statement
        $stmt = $pdo->query($sql);

        // 3. Antwort empfangen und als Array speichern
        $alleRezepte = $stmt->fetchAll(); 

        header("Location: rezepteIndex.php");
        exit;

   }catch(PDOException $fehler){
        //$meldung =  $fehler->getMessage();
        $meldung = "Sorry, wir haben DB-Probleme";
   }


?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezeptdatenbank - löschen</title>
    <link rel="stylesheet" href="rezepte.css">
</head>
<body>
    <h1>Rezept löschen</h1>
    <div class="feedback"> <?= $meldung ?></div>
    <a href="rezepteIndex.php">Rezepte Übersicht</a>
    
</body>
</html>