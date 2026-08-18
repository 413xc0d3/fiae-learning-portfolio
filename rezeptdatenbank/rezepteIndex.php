<?php

    require_once 'dbVerbindung.php';

   try{
        $sql = "SELECT * FROM rezepte ORDER BY id";        
        
        // 2. Anfrage an DB geben -> statement
        $stmt = $pdo->query($sql);

        // 3. Antwort empfangen und als Array speichern
        $alleRezepte = $stmt->fetchAll(); 

   }catch(PDOException $fehler){
       $meldung = $fehler->getMessage();
       $meldung ='Sorry, Probleme mit DB - Hol Dir erstmal nen Kaffee';
   }


?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezeptdatenbank</title>
    <link rel="stylesheet" href="rezepte.css">
</head>
<body>
    <h1>Übersicht</h1>
      <?php if($meldung): ?>
        <div class="feedback"><?= $meldung ?></div>
     
        <?php else: ?>  
    
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Wasser</th>
                <th>Bohnen</th>
                <th>Milch</th>
                <th>Zucker</th>
                <th>Kakao</th>
                <th colspan=2>Aktion</th>
            </tr>
            <!-- weitere tr und daten sollen dynamisch sein -->
            <?php foreach($alleRezepte as $rezept):?>
                <tr>
                    <td><?= $rezept['id']?></td>
                    <td><?= htmlspecialchars($rezept['name'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= $rezept['wasser']?></td>
                    <td><?= $rezept['bohnen']?></td>
                    <td><?= $rezept['milch']?></td>
                    <td><?= $rezept['zucker']?></td>
                    <td><?= $rezept['kakao']?></td>
                    <td><a href="rezepteLoeschen.php?deleteID=<?= $rezept['id']?>">löschen</a></td>
                    <td><a href="rezepteUpdate.php?updateID=<?= $rezept['id']?>">bearbeiten</a></td>
                </tr>
            <?php endforeach; ?>   
        </table>
        <a href="rezepteAnlegen.php">Rezept anlegen</a>
     <?php endif;?>
</body>
</html>