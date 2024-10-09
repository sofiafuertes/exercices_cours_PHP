<?php 

include './model/model_users_incription.php';
include './utils/functions.php';
include './manager/manageUser.php';

$userList = "";
$message = "";

$class = "";
$classNav = "displayNone";


function sendCleanData($a, $b, $c, $d){
    //*Verifier si les champs sont vides, si ils le sont on retourne on message de erreur
    if(empty($c) or empty($d)){
        return ["name_user"=>'',"first_name_user"=>'',"login_user"=>'',"password_user"=>'',"erreur"=>'Veuillez remplir le Login ET le Mot de Passe !'];
    }

    //*Nettoyer les donnees avec la fonction sanitize
    $name = sanitize($a);
    $firstName = sanitize($b);
    $login = sanitize($c);
    $psw = sanitize($d);


    if(!filter_var($login,FILTER_VALIDATE_EMAIL)){
        return ["name_user"=>'',"first_name_user"=>'',"login_user"=>'',"password_user"=>'',"erreur"=>'Login pas au bon format !'];
    }

    //* Hasher le mot de passe 
    $psw = password_hash($psw,PASSWORD_BCRYPT);

    return ["name_user"=>$name,"first_name_user"=>$firstName,"login_user"=>$login,"password_user"=>$psw,"erreur"=>''];
}


//* Verification de le reçu de donnes quand le submit il est envoye et affichage de $message. 
if(isset($_POST['submit'])){
    $tab = sendCleanData($_POST['name_user'],$_POST['first_name_user'],$_POST['login_user'], $_POST['mdp_user']); 

    if($tab['erreur'] != ''){
        $message = $tab['erreur'];
    }else{
        $manageUser = new ManageUser($tab['login_user']);
        if(empty($manageUser-> readUserByLogin())){
            $manageUser -> setFirstNameUser($tab['first_name_user']);
            $manageUser-> setNameUser($tab['name_user']);
            $manageUser-> setMdpUser($tab['password_user']);
            $message = $manageUser-> addUser();
}else{
    $message="Ce Login existe déjà en BDD !";
}
}}


//* Affichage de la list de utilisateurs
if(isset($userList)){
    $manageUser = new ManageUser('login_user');
    $data =  $manageUser->readUsers();
    if(gettype($data) == 'string'){
        $userList = $data;
    }else{
        foreach ($data as $user) {
        $userList .= "<article style='border-bottom : 2px solid green'>
                <p>Nom utilisateur: {$user['name_user']} </p>
                <p>Prenom utilisateur : {$user['first_name_user']}</p>
                <p>Login utilisateur : {$user['login_user']}</p>
                </article>";
        }
    }
}

//* Chacher le formulaire de connexion une fois connecté
if(isset($_SESSION['id_user'])){
    $class = "displayNone";
    $classNav = "";
};




include './view/view_header.php';
include './view/view_inscription.php';