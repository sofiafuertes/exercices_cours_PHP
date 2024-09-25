<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exo 2</h1>
    <?php
    
    /*-Ecrire un programme qui prend le prix HT d’un article, 
    le nombre d’articles et le taux de TVA, et qui fournit le prix total TTC correspondant.
-Afficher le prix HT, le nbr d’articles et le taux de TVA (utilisez la fonction echo),
-Afficher le résultat (utilisez la fonction echo).*/ 

$prixArticleHT = 30;
$nombreArticle = 1;
$TVA = 21;
$prixArticleTTC = ($prixArticleHT+$prixArticleHT*$TVA/100)*$nombreArticle;
//$prixTTC= $prixArticle * $quantite * (1 + $TVA); 

//*Examples de concatenation avec le . avant la variable - entre les ""(fonctionne pas avec '') - {$variable} (fonctionne qu'avec "") 

echo "Le prix HT de l'article est: " .$prixArticleHT;
echo "<br>";
echo "La quantite d'article est de: $nombreArticle" . "<br>";
echo "Le prix TTC de l'article est de: {$prixArticleTTC} ";


/*Exercice 3 : concaténation
-Créer une variable $a qui a pour valeur 'bonjour',
-Afficher un paragraphe (balise html) et à l’intérieur les mots suivants :l’adrar,
-Ajouter la variable $a avant la phase dans le paragraphe*/

$a = 'bonjour';
echo "<p> $a l'adrar</p>"


?>
</body>
</html>