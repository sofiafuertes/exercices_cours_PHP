<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    echo "<h1>Exo 11</h1>";
    /*On a ce tableau multidimensionnel là :
    $tab = [[1,2,3],[4,5,6],[7,8,9]]
    
    Afficher chaque nombre les uns sous les autres */

    $tab = [[1,2,3],[4,5,6],[7,8,9]];
foreach($tab as $array){
    foreach($array as $nombre){
        echo "<p> $nombre </p>";
    }
}

    
    
    ?>
</body>
</html>
