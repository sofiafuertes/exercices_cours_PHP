<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<p>Exo 10</p>";

    $tableauX = [8, 9, 100, 56, 102, 7, 3];
    echo "Le tableau: ";
    print_r($tableauX);
    echo "<br>";

    //* 1) Créer une fonction qui affiche la valeur la plus grande du tableau.
    function bigValue($tab)
    {
        echo 'La valeur plus grande est:' . max($tab);
    }
    bigValue($tableauX);

// option boucle 
    function lePlusGrand($tab){
        $max = $tab[0];
        foreach($tab as $valeur){
            if($max < $valeur){
                $max = $valeur;
            }}
            echo "La valeur la plus grande est: $max ";
        }
lePlusGrand($tableauX);





    //* 2) Créer une fonction qui affiche la moyenne du tableau.
    function moyenneTab($tab){
        $sum = array_sum($tab) / count($tab);
        echo "<p>La moyenne du tableau est de: $sum </p>";
    }
    moyenneTab($tableauX);

    function moyenne ($tab){
        $somme = 0;
        foreach($tab as $valeur){
            $somme += $valeur;
        }
        $moyenne = $somme/ count($tab);
        echo "La moyenne du tableau est : $moyenne ";
    };

    moyenne($tableauX);
    echo "<br>";

    //* 3) Créer une fonction qui affiche la valeur la plus petite du tableau.
    function smallValue($tab)
    {
        echo "La valeur plus petite est: " . min($tab);
    }
    smallValue($tableauX);


    function lePlusPetite($tab){
        $min= $tab[0];
        foreach($tab as $valeur){
            if($min > $valeur){
                $min = $valeur;
            }}
            echo "La valeur la plus petite est: $min ";
        }
lePlusPetite($tableauX);

    ?>
</body>

</html>