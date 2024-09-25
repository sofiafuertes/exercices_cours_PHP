<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
echo "<h1>Exo 5, 6, 7 et 8</h1>";
/*
Exercice 6 :
Créer une fonction qui teste si un nombre est positif ou négatif (echo dans la page web).
Exercice 7 :
Créer une fonction qui prend en entrée 3 valeurs et retourne le nombre le plus grand (echo dans la page web).
Créer une fonction qui prend en entrée 3 valeurs et retourne le nombre le plus petit (echo dans la page web).
Exercice 9 :
Créer une fonction qui prend en entrée 1 valeur (l’âge d’un enfant). Ensuite, elle informe de sa catégorie (echo dans la page web) :
• "Poussin" de 6 à 7 ans
• "Pupille" de 8 à 9 ans
• "Minime" de 10 à 11 ans
• "Cadet" après 12 ans
*/

function testNumbers ($number1){
    if ($number1 >= 0){
        echo "<p> $number1 est positif </p>";
    }else{
        echo "<p> $number1 est negatif </p>";
    }
}

testNumbers(-8);
testNumbers(260);

function bigNumber($a,$b,$c){
    if($a > $b && $a > $c ){
        echo "<p> $a est le numero plus grand </p>";
    }else if ($c > $b && $c > $a){
        echo "<p> $c est le numero plus grand </p>";
    }else{
        echo "<p> $b est le numero plus grand </p>";
    }
}

bigNumber(150,100,180); 
bigNumber(23,85,4);

function smallNumber($a,$b,$c){
    if($a < $b && $a < $c ){
        echo "<p> $a est le numero plus petit </p>";
    }else if ($c < $b && $c < $a){
        echo "<p> $c est le numero plus petit </p>";
    }else{
        echo "<p> $b est le numero plus petit </p>";
    }
}

smallNumber(15,100,-80); 
smallNumber(23,85,4);

function categorie($age){
    if($age < 6){
        echo "<p> Age: $age -- Vous etes trop jeune pour vous inscrire </p>";
    }else if($age <= 7){
        echo "<p>Age: $age -- Categorie : Poussin </p>";
    }else if($age <= 9){
        echo "<p>Age: $age -- Categorie : Pupille </p>";
    }else if($age <=11){
        echo "<p> Age: $age -- Categorie : Minime </p>";
    }else{
        echo "<p> Age: $age -- Categorie : Cadet </p>";
    }
}
categorie(3);
categorie(7);
categorie(8);
categorie(10);
categorie(14);

//* option avec switch case

function ageCategorie($age2){
    switch ($age2) {
        case $age2<= 5;
            echo "<p> Age: $age2 -- Vous etes trop jeune pour vous inscrire </p>";
            break;
        case $age2>=6 && $age2<=7 :
            echo "<p> Age: $age2 -- Categorie : Poussin </p>";
            break;
        case $age2>=8 && $age2<=9 :
            echo "<p> Age: $age2 -- Categorie : Pupille </p>";
            break;
        case $age2>=10 && $age2<=11 :
            echo "<p> Age: $age2 --  Categorie : Minime </p>";
            break;
        case $age2>=12: 
            echo "<p> Age: $age2 --  Categorie : Cadet </p>";
            break;
}}

ageCategorie(2);
ageCategorie(6);
ageCategorie(9);
ageCategorie(11);
ageCategorie(12);


/* autre option switch
function categorieSwitch($age){
    switch (true) {
        case $age < 6:
            echo "<p> Age: $age -- Vous etes trop jeune pour vous inscrire </p>";
            break;
        
        default:
            # code...
            break;
    }
}*/



?>

</body>
</html>