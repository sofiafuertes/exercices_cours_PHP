<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello World ! </h1>
</body>
</html>

<?php
echo "Hello World !"; 
echo 11;
echo true;
echo "<h2>je suis un titre<h2>";

//aficher des tableaux
var_dump([1,2,3]);
echo"<br>"; //afficher un tableau
print_r([1,2,3]); //afficher un tableau plus lisible

//variables
echo"<br>";
$nomDeLaVariable; 
echo $nomDeLaVariable;
//asignation valeur
echo"<br>";
$maVariable = "Bonjour le monde!";
echo $maVariable;

//Recuperer le type de variable:
echo"<br>"; 
echo "ma variable est: "; 
echo gettype($maVariable);
   /**
     * sanitize() : Clean the datas, removing HTML, SCRIPT JS, PHP, and space at 
     * begining and ending from datas
     * @param: $data -> string
     * @return: String
     */
    function sanitize($data)
    {
        return htmlentities(strip_tags(stripslashes((trim($data)))));
    }

?>