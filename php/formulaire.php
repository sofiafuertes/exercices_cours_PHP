<?php

// $_GET = [
//     "nom" => "le nom",
//     "email" => "l'email",
//     "password" => 'le mot de passe'
// ];
// $_POST = [
//     "nom" => "le nom",
//     "email" => "l'email",
//     "password" => 'le mot de passe'
// ];

//*je verifie si $_GET a une cle qui s'appelle nom, si c'est le cas, je l'affiche si non, j'affiche rien
if(isset($_GET["nom"])){
    echo $_GET["nom"];
};

if(isset($_POST["submit"])){
    print_r($_POST);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Formulaires</h1>
<form action="formulaire.php" method="GET">
    <input type="text" name="nom" placeholder="Votre nom">
    <input type="text" name="email" placeholder="Votre email">
    <input type="text" name="password" placeholder="Votre mot de passe">
    <input type="submit">
</form>

<h2>Checkbox</h2>
<h2>Les fruits que vous aimez</h2>
<form action="" method="post">
    <p><input type="checkbox" name="fruit[]" value="Banane">Banane</p>
    <p><input type="checkbox" name="fruit[]" value="Pomme">Pomme</p>
    <p><input type="checkbox" name="fruit[]" value="Poire">Poire</p>
    <input type="submit" name="submit">
    //* Donner le meme name a les input avec les [] pour creer un tableaux et pouvoir stocker tous les donnes coches
</form>

</body>

</html>