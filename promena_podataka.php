<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>CarHorizontal</title>
</head>
<body>
    <nav class="kontent">
        <a href="index.php">Pocetna</a>
        <a href="promena_podataka.php">Promena podataka</a>
        <a href="brisanje_podataka.php">Brisanje podataka</a>
        <a href="pretraga.php">Pretraga</a>
    </nav>
    <div class="hero">
        <img src="logo.png" alt="log" id="logo">
        <h1>Izmenite podatke o Vasem vozilu </h1>
    </div>
    <form action="" method="post" class="kontent">

        <label> Broj sasije: </label> <br>
        <input type="text" name="brSasije"> <br>

        <label> Kilometraza: </label><br>
        <input type="number" name="kilometraza"><br><br>

        <input type="submit" name="potvrdi" value="Izmenite podatke"><br>
        
    </form>
    <div class="kontent" id="php">
    <?php

    try{
        $pdo = new PDO("mysql:host=localhost;dbname=carhorizontal", "root", "");
        
        
        $sql = "UPDATE automobil SET kilometraza = :kilometraza WHERE brSasije = :brSasije";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":brSasije", $brSasije);
        $stmt->bindParam(":kilometraza", $kilometraza);

        if(empty($_POST['brSasije']) or empty($_POST['kilometraza'])){
            echo "Sva polja moraju biti popunjena";
        }
        else{
            $brSasije = $_POST['brSasije'];
            $kilometraza = $_POST['kilometraza'];  
            $stmt->execute();
            echo "<h3 style='color:#73bd1b'>Uspesno izmenjeni podaci</h3>";
        }


    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

    ?>
    </div>

</body>
</html>