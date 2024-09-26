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


</body>

</html>