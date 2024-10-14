<?php 
    include "./controler/dresseur.php";
    include "./controler/pokemon.php";
    include "./manager/sasha.php";
    include "./manager/pikachu.php";
    $sasha = new Sasha("Sasha", new Pikachu("Pikachu",150));
    $sasha->lancerPokemon();
    $sasha->attaquerDresseur("Pierre");