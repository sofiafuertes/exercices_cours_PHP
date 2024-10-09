<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<p>Exo 9</p>";
    /* 1) Créer un script qui affiche les nombres de 1 -> 5 (méthode echo).

    2) Ecrire une fonction qui prend un nombre en paramètre (variable $nbr), et qui ensuite affiche les dix nombres suivants. Par exemple, si la valeur de nbr équivaut à : 17, la fonction affichera les nombres de 18 à 27 (méthode echo).*/

for($i = 1 ; $i <=5 ; $i++){
    echo "<p>$i</p>";
}
//ou
$y = 1; 
while($y <=5){
    echo "<p>$y</p>";
    $y++;
}


/**
 * Summary of display
 * @param mixed $nbr
 * @return void
 */
function display($nbr){
for($i= $nbr+1 ; $i < $nbr+11 ; $i++){
    echo "<p> $i </p>";
}}

display(17);

function afficher($nbr){
    $i= $nbr+1;
    while($i <= $nbr+10){
        echo "<p>$i</p>";
        $i++;
    }
}
afficher(17);
    ?>
</body>

</html>