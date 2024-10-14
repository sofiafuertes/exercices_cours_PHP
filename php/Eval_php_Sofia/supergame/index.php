<?php
//CONTROLER DE LA PAGE D'ACCUEIL

//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);

//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/

//test de la valeur $path dans l'URL et import de la ressource
switch ($path) {

    case $path === "/php/exercices_cours_PHP/php/Eval_php_Sofia/supergame/":
                include './utils/utils.php';
                include './model/model_joueurs.php';
                include './manager/manager_joueurs.php';
                include './controler/controler_joueurs.php';
                include './view/header.php';
                include './view/view_accueil.php';
                include './view/footer.php';
        break;
    }
