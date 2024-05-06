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
        <img src="css/slike/logo.png" alt="log" id="logo">
        <h1>Unesite podatke o Vasem vozilu </h1>
    </div>
    <form action="" method="post" class="kontent">

        <label> Broj sasije: </label> <br>
        <input type="text" name="brSasije"> <br>

        <label> Model auta: </label><br>
        <input type="text" name="model"> <br>

        <label> Godiste auta: </label><br>
        <input type="month" name="godiste"><br>

        <label> Kilometraza: </label><br>
        <input type="number" name="kilometraza"><br>

        <label> Vlasnik: </label><br>
        <input type="text" name="vlasnik"><br><br>

        <input type="submit" name="potvrdi" value="Unesite podatke"><br>
        
    </form>
    <div class="kontent" id="php">
    <?php
    

    class Automobil {
        public $broj_Sasije;
        public $model;
        public $godiste;
        public $kilometraza;
        public $vlasnik;
    }
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=carhorizontal", "root", "");
        
        
        $sql = "INSERT INTO automobil(brSasije, model, godiste, kilometraza, vlasnik)
        VALUES(:brSasije, :model, :godiste, :kilometraza, :vlasnik)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":brSasije", $brSasije);
        $stmt->bindParam(":model", $model);
        $stmt->bindParam(":godiste", $godiste);
        $stmt->bindParam(":kilometraza", $kilometraza);
        $stmt->bindParam(":vlasnik", $vlasnik);

        if(empty($_POST['brSasije']) or empty($_POST['model']) or empty($_POST['godiste']) or empty($_POST['kilometraza']) or empty($_POST['vlasnik'])){
            echo "Sva polja moraju biti popunjena";
        }
        else if(ctype_alpha($vlasnik = $_POST['vlasnik'])){
            $automobil = new Automobil();
            $brSasije = $_POST['brSasije'];
            $model = $_POST['model'];
            $godiste = $_POST['godiste'];
            $kilometraza = $_POST['kilometraza'];
            $vlasnik = $_POST['vlasnik'];    
            $stmt->execute();
            echo "<h3 style='color:#73bd1b'>Uspesno uneti podaci</h3>";
        }
        else{
            echo "Polje vlasnik mora sadrzati samo slova!";
        } 


    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

    ?>
    </div>

    <select name="model">
        <option value="Serija 1">Serija 1</option>
        <option value="Serija 1">Serija 1</option>
  </select>
</body>
</html>