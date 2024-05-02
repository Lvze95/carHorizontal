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
    </div>

    <select name="model">
        <option value="Serija 1">Serija 1</option>
        <option value="Serija 1">Serija 1</option>
  </select>
</body>
</html>