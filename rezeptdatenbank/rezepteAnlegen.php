<?php 

    require_once 'dbVerbindung.php';


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
                try{
                    // $sql = "INSERT INTO rezepte (name, wasser, bohnen, milch, zucker, kakao) VALUES('Testgetränk', 10, 10, 20, 25, 5)";
                    // Platzhalter - SQL-Injection vermeiden
                    $sql = "INSERT INTO rezepte (name, wasser, bohnen, milch, zucker, kakao) VALUES(:name, :wasser, :bohnen, :milch, :zucker, :kakao)";
                    // 2. Auftrag an DB geben -> statement
                    $stmt = $pdo->prepare($sql);

                    // Daten sollen aus Formular kommen
                    $daten = [
                        'name'      => $name, 
                        'wasser'    => $wasser, 
                        'bohnen'    => $bohnen, 
                        'milch'     => $milch, 
                        'zucker'    => $zucker, 
                        'kakao'     => $kakao
                    ];
                    

                    // 3. Daten an DB übergeben
                    $stmt -> execute($daten);

                    $meldung = "Getränk angelegt";
                }catch(PDOException $fehler){
                    $meldung = $fehler->getMessage();
                    // oder eigene Meldung schreiben z.B. sorry, fehler mit DB
                }
            }else{
                $meldung = 'Bitte Getränkename eingeben';
            }
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
    <h1>Rezept anlegen</h1>
    
    <form  method="post">

        <label for="name">Getränkename:</label>
        <input type="text" name="getraenk" placeholder="z.B. Wunschkaffee" required>

        <label for="wasser">Wasser</label>
        <input type="number" min="0" value="0" name="wasser" >

        <label for="bohnen">Bohnen</label>
        <input type="number" min="0" value="0" name="bohnen" >

        <label for="milch">Milch</label>
        <input type="number" min="0" value="0" name="milch" >

        <label for="zucker">Zucker</label>
        <input type="number" min="0" value="0" name="zucker" >

        <label for="kakao">Kakao</label>
        <input type="number" min="0" value="0" name="kakao" >

        <button type=submit>Rezept eintragen</button>

    </form>

    <?php if($meldung): ?>
        <div class="feedback"><?= $meldung ?></div>
    <?php endif;?>

    <a href="rezepteIndex.php">Rezept-Übersicht</a>

</body>
</html>