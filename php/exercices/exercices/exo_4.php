<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<p>Exo 4</p>";

    /*Exercice 4 :
Créer une fonction qui prend en entrée un nombre à virgule (float),
a fonction doit renvoyer l’arrondi (return) du nombre en entrée.

Créer une fonction qui prend en entrée 3 valeurs et renvoie la somme des 3 valeurs.

Créer une fonction qui prend en entrée 3 valeurs et 
retourne la valeur moyenne des 3 valeurs (saisies en paramètre).*/

    function arrondi($nombre1)
    {
        return round($nombre1);
    }
    $result1 = arrondi(2.67);

    echo " L'arrondi est: $result1" . "<br>";

    function somme($numero1, $numero2, $numero3)
    {
        return $numero1 + $numero2 + $numero3;
    }


    $result2 = somme(46, 98, 1065);
    echo "Le total de la somme est: $result2" . "<br>";

    function moyenne($numero1, $numero2, $numero3)
    {
        return ($numero1 + $numero2 + $numero3) / 3;
    }


    $result3 = moyenne(15.6, 18.10, 8.60);
    echo "La moyenne est de: $result3" . "<br>";


    ?>
</body>

</html>