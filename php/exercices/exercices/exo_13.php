<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exo 13: Formulaire TTC</h1>
    <form action="exo_14.php" method="POST">
        <input type="number" name="prix_HT" placeholder="Prix HT" step="0.01">
        <input type="number" name="quantite" placeholder="Quantité" step="1">
        <input type="number" name="TVA" placeholder="TVA">
        <input type="submit" name="submit" value="Calculer">
    </form>

</body>
</html>

<?php 


//* function pour nettoyer les données
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

/**
 * function pour calculer le prix TTC d'un article
 * @param mixed $a
 * @param mixed $b
 * @param mixed $c
 * @return string
 */
function calcul($a, $b, $c){
    //* on verifie si les champs sont bien vide, il va retouner true si les champs sont vides et on retourne message error
    if (empty($a) or empty($b) or empty($c)) {
        return "Tous les champs ne sont pas remplis";
    }
    //* filter_var va a returner true quand le filter il est respecté, donc ici on verifie que le données ecrits sur le champs sont pas des numeros (!filter_var), cette function va a retourner true si le champ rempli c'est texte ou autre donc il va a returner "Le format...", si les données sont de numeros va a continuer avec le rest de la function) 
    if (
        (!filter_var($a, FILTER_VALIDATE_FLOAT)) //que FLOAT parce que c'est de numeros en 
        or
        (!filter_var($b, FILTER_VALIDATE_INT))
        or
        (!filter_var($c, FILTER_VALIDATE_FLOAT))
    ) {
        return "Le format de les champs il est pas correct";
    }
    //* Ici on utilise la function sanitize() pour nettoyer les données et apres on fait le calcul et on l'affiche
    $number1 = sanitize($a);
    $number2 = sanitize($b);
    $number3 = sanitize($c);

    $result = ($number1 + $number1 * $number3 / 100) * $number2;
    return "Le prix TTC est égal a: $result €";

}
;
//* Si le "submit" est envoyer on appelle la function calcul() et on affiche le resultat
if (isset($_POST["submit"])) {
    echo calcul($_POST["prix_HT"], $_POST["quantite"], $_POST["TVA"]);
}

?>