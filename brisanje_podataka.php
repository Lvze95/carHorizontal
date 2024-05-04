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
        <h1> Ukoliko zelite ovde mozete obrisati sve podatke o Vasem vozilu. Unesite broj sasije </h1>
    </div>
    <form action="" method="post" class="kontent">

        <label> Broj sasije: </label> <br>
        <input type="text" name="brSasije"> <br><br>

        <input type="submit" name="potvrdi" value="Obrisite podatke"><br>
        
    </form>
    <div class="kontent" id="php">
        <?php

           $mysqli = new mysqli("localhost", "root", "", "carhorizontal");
           if($mysqli->connect_error){
            echo "Greska u konekciji";
            exit();
           }
           if(isset($_POST['potvrdi'])){
            $sql = "DELETE FROM automobil WHERE brSasije = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $br_Sasije);
            $br_Sasije = $_POST['brSasije']; 
            $stmt->execute();
           }

        ?>
    </div>

</body>
</html>