<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Exo 11: Addition</h1>

<form action="exo_12.php" method="post">
    <input type="number" name="number1" placeholder="Nombre 1">
    <input type="number" name="number2" placeholder="Nombre 2">
    <input type="submit" name="submit" value="Resultat">
</form>


</body>
</html>

<?php 



/*if (isset($_POST["number1"]) and isset($_POST["number2"])){
    $somme = 0;
        $somme = $_POST["number1"] + $_POST["number2"];
        echo "La somme est égale à: $somme .";
}
*/

 function sanitize($data){
    return htmlentities((strip_tags(strip_tags(trim($data)))));
 }

// if (isset($_POST["submit"])) {
//     if (!empty($_POST["number1"] and !empty($_POST["number2"]))) { //etape 1, verifier si les champs son vides 
//         if (
//             (filter_var($_POST["number1"], FILTER_VALIDATE_INT) or filter_var($_POST["number1"], FILTER_VALIDATE_FLOAT))
//             &&
//             (filter_var($_POST["number2"], FILTER_VALIDATE_INT) or filter_var($_POST["number2"], FILTER_VALIDATE_FLOAT)) //verifier le format de donnes 
//         ) { //nettoyage de donees
//             $nombre1 = htmlentities((strip_tags(strip_tags(trim($_POST["number1"])))));
//             $nombre2 = htmlentities((strip_tags(strip_tags(trim($_POST["number2"])))));
//             $somme = $_POST["number1"] + $_POST["number2"];
//             echo "La somme est égale à: $somme .";
//         } else {
//             echo "Donnes pas au bon format";
//         }
//     } else {
//         echo "Veulliez remplir tous les chmaps requis!";
//     }
// }


function formReceive()
{   //etape 1, verifier si les champs son vides 
    if (empty($_POST["number1"] or empty($_POST["number2"]))) {
        return "Veulliez remplir tous les chmaps requis!";
    }
    if ( //verifier le format de donnes 
        (!filter_var($_POST["number1"], FILTER_VALIDATE_INT) and !filter_var($_POST["number1"], FILTER_VALIDATE_FLOAT))
        or
        (!filter_var($_POST["number2"], FILTER_VALIDATE_INT) and !filter_var($_POST["number2"], FILTER_VALIDATE_FLOAT))
        
    ) {
       return "Donnes pas au bon format";
        
    } //nettoyage de donees
    $nombre1 = htmlentities((strip_tags(strip_tags(trim($_POST["number1"])))));
    $nombre2 = htmlentities((strip_tags(strip_tags(trim($_POST["number2"])))));
    $somme = $_POST["number1"] + $_POST["number2"];
    return "La somme est égale à: $somme .";
}

if(isset($_POST["submit"])){
    echo formReceive();
}
?>