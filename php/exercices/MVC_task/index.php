<?php 
//*Activation de SESSION 
session_start();

include './utils/functions.php';
include './model/model_user_connexion.php';

$message = ""; 
$class = "";
$classNav = "displayNone";


//*Fonction pour chequer si les champs sont vides et filtrer, nettoyer les donnees 
function sendCleanData(){
    //*Verifier si les champs sont vides, si ils le sont on retourne on message de erreur
    if(empty($_POST['loginCo']) OR empty($_POST['passwordCo'])){
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

};

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
        // print_r($_SESSION);
    } else {
        $message = "Le mot de passe est incorrect";
    }
};

//* Chacher le formulaire de connexion une fois connecté
if(isset($_SESSION['id_user'])){
    $class = "displayNone";
    $classNav = "";
};

include './view/view_header.php';
include './view/view_acceuil_conection.php';