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
var_dump([1, 2, 3]);
echo "<br>"; //afficher un tableau
print_r([1, 2, 3]); //afficher un tableau plus lisible

//variables
echo "<br>";
$nomDeLaVariable;
echo $nomDeLaVariable;
//asignation valeur
echo "<br>";
$maVariable = "Bonjour le monde!";
echo $maVariable;

//Recuperer le type de variable:
echo "<br>";
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
/*
LES BOUCLES
*/
echo "<h2>LES BOUCLES</h2>";

$tabUser = ['Yoann', 'Mathieu', 'Jeff', 'Sophie'];

//Boucle FOR
//référence pour avoir la taille d'un tableau : https://www.php.net/manual/fr/function.count.php
echo "<h3>BOUCLE FOR</h3>";
for ($i = 0; $i < sizeof($tabUser); $i++) {
    echo "<p>$tabUser[$i]</p>";
}

//Boucle WHILE
echo "<h3>BOUCLE WHILE</h3>";
$y = 0;
while ($y < sizeof($tabUser)) {
    echo "<p>$tabUser[$y]</p>";
    $y++;
}

//Boucle FOREACH
echo "<h3>BOUCLE FOREACH</h3>";
foreach ($tabUser as $user) {
    echo "<p>$user</p>";
}

/*TABLEAU ASSOCIATIF*/
echo "<h2>LES TABLEAUX ASSOCIATIFS </h2>";

$tabUserAssoc = ['prenom' => 'Yoann', 'nom' => 'Depriester', 'age' => 23, 'profession' => 'Formateur'];

//Boucle FOR
echo "<h3>BOUCLE FOR</h3>";
for ($i = 0; $i < sizeof($tabUserAssoc); $i++) {
    $tabCle = array_keys($tabUserAssoc); //récupéré un tableau indexé contenant les clé du tableau associatif

    print_r($tabCle);

    $cle = $tabCle[$i]; //on récupère le nom de la clé contenu dans le tableau de clé à l'index $i;
    echo "<p>index \$i : $i  -  \$cle = $cle</p>";

    echo "<p>$cle : $tabUserAssoc[$cle]</p>";
}

//Boucle WHILE
echo "<h3>BOUCLE WHILE</h3>";
$y = 0;
while ($y < sizeof($tabUserAssoc)) {
    $tabCle = array_keys($tabUserAssoc);
    $cle = $tabCle[$y];
    echo "<p>$cle : $tabUserAssoc[$cle]</p>";
    $y++;
}

//Boucle FOREACH
echo "<h3>BOUCLE FOREACH</h3>";
foreach ($tabUserAssoc as $cle => $valeur) {
    echo "<p>$cle : $valeur</p>";
}
;

//* ARRAY_MAP
echo "<h3> ARRAY_MAP </h3>";
$tab = [2, -6, 8, 8, 9, 3, 4, 5];
function map($valeur)
{
    return $valeur += 1; //return important pour l'envoyer dans le nouveau tableau
}
;

$newTab = array_map('map', $tab); // array_map ne modifie pas le tableau initial $tab, il renvoit a la place un nouveau tableau possedant les nouvelles valeurs

//$newTab = array_map(fn($valeur)=> $valeur +=1, $tab); 

print_r($newTab);


//* ARRAY_FILTER() 
echo "<h3>ARRAY_FILTER</h3>";
function filter($valeur)
{
    if ($valeur > 5) {
        return $valeur;
    }
}
;
$newTabFilter = array_filter($tab, 'filter');
print_r($newTabFilter);


//* ARRAY_REDUCE()
echo "<h3>ARRAY_REDUCE</h3>";
function somme($agregateur, $valeur){ //agregateur c'est le que conserve la valeur de la somme et valeur la valeur de la casse que on est.  
        return $agregateur + $valeur; 
}

$newTabReduce = array_reduce($tab,'somme',0);
echo "<p>$newTabReduce</p>";


function monMax($agregateur, $valeur){
    if($valeur > $agregateur){
        return $valeur;
    }
    return $agregateur;
}
$newTabReduce = array_reduce($tab,'monMax',$tab[0]);
echo "<p>$newTabReduce</p>";

//* TABLEUX MULTIDIMENSIONNELLE 
$tabUsers = [
    [
        'nom' => 'Sheppard',
        'prenom' => 'John',
        'age' => 40,
        'civilisation' => 'humaine',
        'profession' => 'spectre',
        'genre' => 'masculin'
    ],
    [
        'nom' => 'Vakarian',
        'prenom' => 'Garrus',
        'age' => 35,
        'civilisation' => 'turienne',
        'profession' => 'soldat',
        'genre' => 'masculin'
    ],
    [
        'nom' => 'Zorah',
        'prenom' => 'Tali',
        'age' => 25,
        'civilisation' => 'quarienne',
        'profession' => 'ingénieure',
        'genre' => 'féminin'
    ]
];

foreach($tabUsers as $user){
    print_r($user);
    echo "<article>";
    foreach($user as $cle => $valeur){
        echo "<p> $cle : $valeur </p>";
        echo "</article>";
}}











?>

