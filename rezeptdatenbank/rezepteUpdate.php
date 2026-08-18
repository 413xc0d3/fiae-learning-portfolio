<?php 

    require_once 'dbVerbindung.php';

   try{

        $id = (int)($_GET['updateID'] ?? 0);
        $sql = "SELECT * FROM rezepte WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $rezept = $stmt->fetch();

        if(!$rezept){
            $meldung = "Rezept nicht gefunden";
        }

        // Formular losgeschickt?
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $name   = trim($_POST['getraenk']   ?? '');
            $wasser = (int)($_POST['wasser']    ?? 0);
            $bohnen = (int)($_POST['bohnen']    ?? 0);
            $milch  = (int)($_POST['milch']     ?? 0);
            $zucker = (int)($_POST['zucker']    ?? 0);
            $kakao  = (int)($_POST['kakao']     ?? 0);


            // wirklich Getränkename eingegeben - also nicht leer?
            if(!empty($name)){
                     // Platzhalter - SQL-Injection vermeiden
                $sql = "UPDATE rezepte SET name = :name, wasser = :wasser, bohnen = :bohnen, milch = :milch, zucker = :zucker, kakao = :kakao WHERE id = :id";
                // 2. Auftrag an DB geben -> statement
                $stmt = $pdo->prepare($sql);

                // Daten sollen aus Formular kommen + id aus der URL
                $daten = [
                    'name'      => $name, 
                    'wasser'    => $wasser, 
                    'bohnen'    => $bohnen, 
                    'milch'     => $milch, 
                    'zucker'    => $zucker, 
                    'kakao'     => $kakao,
                    'id'        => $id
                ];
                

                // 3. Daten an DB übergeben
                $stmt -> execute($daten);

                $meldung = "Getränk geupdated";
            }else{
                $meldung = 'Bitte Getränkename eingeben';
            }
        }

   
   }catch(PDOException $fehler){
        $meldung = $fehler->getMessage();
   }



?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="rezepte.css">
</head>
<body>
    <h1>Rezept Updaten</h1>
    
    <?php if($meldung): ?>
        <div class="feedback"><?= $meldung ?></div>
        <a href="rezepteIndex.php">Rezept-Übersicht</a>

    <?php 
        die();
        endif;
    ?>


    <form  method="post">

        <label for="name">Getränkename:</label>
        <input type="text" name="getraenk" value="<?= htmlspecialchars($rezept['name'], ENT_QUOTES, 'UTF-8') ?>" required>

        <label for="wasser">Wasser</label>
        <input type="number" min="0" value="<?= $rezept['wasser'] ?>" name="wasser" >

        <label for="bohnen">Bohnen</label>
        <input type="number" min="0" value="<?= $rezept['bohnen'] ?>" name="bohnen" >

        <label for="milch">Milch</label>
        <input type="number" min="0" value="<?= $rezept['milch'] ?>" name="milch" >

        <label for="zucker">Zucker</label>
        <input type="number" min="0" value="<?= $rezept['zucker'] ?>" name="zucker" >

        <label for="kakao">Kakao</label>
        <input type="number" min="0" value="<?= $rezept['kakao'] ?>" name="kakao" >

        <button type=submit>Rezept updaten</button>

    </form>

    
    <a href="rezepteIndex.php">Rezept-Übersicht</a>

</body>
</html>