<?php 

$message = "";
//Declaration de ma variable d'affichage
$message = "";

//Fonction de nettoyage des données
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

//Fonction d'inscription d'un utilisateur
function addUser(){
    //1er étape de sécurité : Vérification des champs vide
    if(empty($_POST["email"]) || empty($_POST["pseudo"]) || empty($_POST["password"])){
        return "Veuillez remplir les champs vides !";
    }

    //2eme étape de sécurité : Vérifier le format des données
    //le seul que je peux vérifier c'est le email
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        return "Email pas au bon format !";
    }

    //3eme étape de sécurité : Nettoyage des données
    $email = sanitize($_POST["email"]);
    $pseudo = sanitize($_POST["pseudo"]);
    $password = sanitize($_POST["password"]);

    //4eme étape de sécurité : Hashage du mot de passe -> fonction password_hash()
    $password = password_hash($password, PASSWORD_BCRYPT);

    //CONNEXION A LA BDD
    $bdd = new PDO('mysql:host=localhost;dbname=utilisateur','root','root',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    //Mon Try... Catch pour gérer les soucis de communication à la BDD
    try{
        //Preparation de la requête : j'utilise des ? là où je dois envoyer des données (c'est comme si je mettais des étiquettes blanches)
        $req = $bdd->prepare('INSERT INTO utilisateurs (email, mdp, pseudo ) VALUES (?,?,?)');

        //Binding de Paramètre : je relis chaque ? à la données qui lui correspond (c'est comme si j'écrivais sur les étiquettes)
        $req->bindParam(1,$email,PDO::PARAM_STR);
        $req->bindParam(2,$password,PDO::PARAM_STR);
        $req->bindParam(3,$pseudo,PDO::PARAM_STR);

        //Exécuter la requête
        $req->execute();

        //Renvoie message de confirmation
        return "$pseudo a été enregistré avec succès !";

    }catch(EXCEPTION $error){
        return $error->getMessage();
    }

}

//Je vérifie que je reçois le formulaire d'inscription
if(isset($_POST["submit"])){
    $message = addUser();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="" method="post">
        <input type="text" name="email" placeholder="votre email">
        <input type="text" name="pseudo" placeholder="votre pseudo">
        <input type="password" name="password" placeholder="votre mot de passe">
        <input type="submit" name="submit">
    </form>
    <p><?php echo $message ?></p>
</body>
</html>
