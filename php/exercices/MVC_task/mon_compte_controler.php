<?php 

//* Activation de la SESSION
session_start();

$class = "";
$classNav = "displayNone";

//* Declaration de les variables login et psw
$login = "";
$psw = "";
$name = "";
$firstName = ""; 

//* Si les $_SESSION login et psw existe on va las stocker en las variables correspondantes
if(isset($_SESSION['loginCo']) AND isset($_SESSION['passwordCo'])){
    $login = $_SESSION['loginCo'];
    $psw = $_SESSION['passwordCo'];
    $name = $_SESSION['name'];
    $firstName = $_SESSION['first_name'];
}


//* Chacher le formulaire de connexion une fois connecté
if(isset($_SESSION['id_user'])){
    $class = "displayNone";
    $classNav = "";
};

include './view/view_header.php';
include './view/view_mon_compte.php';


