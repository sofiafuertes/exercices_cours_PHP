<?php
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);

//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/

//test de la valeur $path dans l'URL et import de la ressource
switch ($path) {
    
    case $path === "/php/exercices_cours_PHP/php/exercices/exo_router/":
        include './view/view_header.php';
        include './view/view_accueil.php';
        break;

  //route /exercices/exo_router/page_articles
    case $path === "/php/exercices_cours_PHP/php/exercices/exo_router/articles":
        include './model/model_articles.php';
        include './controler/controler_articles.php';
        include './utils/functions.php';      
        include './view/view_header.php';
        include './view/view_articles.php';
        break;       
}

