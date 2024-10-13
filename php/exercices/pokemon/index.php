<?php 
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);

//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/

//test de la valeur $path dans l'URL et import de la ressource
switch ($path) {

    case $path === "/php/exercices_cours_PHP/php/exercices/pokemon/":
        include "./manager/pikachu.php";
        include "./manager/sasha.php";
        include "./controler/dresseur.php";
        include "./controler/pokemon.php";
        $sasha = new Sasha("Sasha", new Pikachu("Pikachu",150));
        $sasha->lancerPokemon();
        $sasha->attaquerDresseur("Pierre");
        break;
    }