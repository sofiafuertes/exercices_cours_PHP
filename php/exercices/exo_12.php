<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Exo 11</h1>

<form action="exo_12.php" method="GET">
    <input type="number" name="number1" placeholder="Nombre 1">
    <input type="number" name="number2" placeholder="Nombre 2">
    <input type="submit" value="Resultat">
</form>

</body>
</html>

<?php 

if (isset($_GET["number1"]) and isset($_GET["number2"])){
    $somme = 0;
    $somme = $_GET["number1"] + $_GET["number2"];
    echo "La somme est égale à: $somme .";
}


?>