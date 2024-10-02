<?php 
//*Activation de SESSION 
session_start();

$message = ""; 

//* Fonction pour nettoyer les donnees 
function sanitize($data)
{
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

//*Fonction pour chequer si les champs sont vides et filtrer, nettoyer les donnees 
function sendCleanData(){
    //*Verifier si les champs sont vides, si ils le sont on retourne on message de erreur
    if(empty($_POST['loginCo']) or empty($_POST['passwordCo'])){
        return 'Veuillez remplir le Login ET le Mot de Passe !';
    }

    //*Nettoyer les donnees avec la fonction sanitize
    $login = sanitize($_POST['loginCo']);
    $psw = sanitize($_POST['passwordCo']);

    //* Filtrer le email
    if(!filter_var($login,FILTER_VALIDATE_EMAIL)){
        return 'Login pas au bon format !';
    }

    //* cet fonction retournera un tableau avec le $login et le $psw
    return [$login, $psw];

}


//* Fonction pour recuperer et verifier si le login de l'utilisataeur il est deja dans la bdd
function readUserByLogin($login_user){

    //* Connexion avec la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    //* Requete pour recuperer les donnes de les users
    try {
        $req = $bdd -> prepare ('SELECT login_user, mdp_user, id_user, name_user, first_name_user FROM users WHERE login_user = ?');

        // introduire l elogin de l'user das ma requete 
        $req ->bindParam(1,$login_user, PDO::PARAM_STR);

        $req -> execute();

        $data = $req -> fetchAll();

        return $data; 

    } catch (Exception $error) {
        return $error -> getMessage();
    }
}


//* Une fois que le utilisiteur veux ce connecter, on va a nettoyer les donnes avec la fonction sendCleanData(), on va a chequer que le login ($data[0]) il est enrigestrer dans la bdd. 
if (isset($_POST['connexion'])) {
    $data = sendCleanData();
    $user = readUserByLogin($data[0]);

    //* Si le login il est vide on va a afficher un message qui dit que le mail il est pas enregistre dans la bdd et apres on verifie si la mot de passe correspondre a la mdp lie a ce login. Si elle correspondre on affiche message 'vous etes connecté' et on sauvegarde les donnes en la $_SESSION. 
    if (empty($user)) {
        $message = "C'est login il est pas enrigestre en bdd";
    }   else if (password_verify($_POST['passwordCo'], $user[0]['mdp_user'])) {
        $message = "Vous etes connecté";
        $_SESSION['id_user'] = $user[0]['id_user'];
        $_SESSION['loginCo'] = $_POST['loginCo'];
        $_SESSION['passwordCo'] = $_POST['passwordCo'];
        $_SESSION['name'] = $user[0]['name_user'];
        $_SESSION['first_name'] = $user[0]['first_name_user'];
        print_r($_SESSION);
    } else {
        $message = "Le mot de passe est incorrect";

    }
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
<header>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="mon_compte.php">Mon compte</a>
        <a href="deconnexion.php">Deconnexion</a>
    </nav>
</header>


    <h1>Exo 16</h1>
    <!-- Creation du formulaire -->
<form action="" method="post">
    <input type="email" name="loginCo" placeholder="Login">
    <input type="text" name="passwordCo" placeholder="Password">
    <input type="submit" name="connexion" value="connexion">
</form>
<p><?php echo $message ?> </p>


</body>

</html>