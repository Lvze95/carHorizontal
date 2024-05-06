<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Pretraga</title>
</head>
<body>
    
<div class="hero">
        <img src="css/slike/logo.png" alt="log" id="logo">
        <h1> Spisak vozila </h1>
    </div>
    <div class="kontent" id="php">
    <?php

    try{
        $pdo = new PDO("mysql:host=localhost;dbname=carhorizontal", "root", "");
        
        $sql1 = "DROP PROCEDURE IF EXISTS podaci_auta";
        $sql2 = "CREATE PROCEDURE podaci_auta()
        BEGIN
            SELECT * FROM automobil;
        END;
        ";
        $pdo->exec($sql1);
        $pdo->exec($sql2);

        $sql = "CALL podaci_auta()";
        $result = $pdo->query($sql);
            foreach($result as $row){
                echo "Broj sasije: " . $row['brSasije'] . "<br>" .
                "Model auta: <i>" . $row['model'] . "</i> <br>" . 
                "Godiste auta: " . $row['godiste'] . "<br>" . 
                "Kilometraza auta: " . $row['kilometraza'] . " <br>" .
                "Vlasnik auta: " . $row['vlasnik'] . "<br><br>";
            }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

    ?>
    </div>

</body>
</html>