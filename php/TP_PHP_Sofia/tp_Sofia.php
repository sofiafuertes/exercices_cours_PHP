<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> TP PHP Algo, Sofia </h1>
</body>
</html>

<?php
$USERS_HUMAN = [[
        "type"=> "humain",
        "name"=> "John Doe",
        "email"=> "j.smith@gmail.com",
        "age"=> 25
    ],
    [
        "type"=> "humain",
        "name"=> "Jane Smith",
        "email"=> "ja.doe@sfr.fr",
        "age"=> 5
    ],
    [
        "type"=> "humain",
        "name"=> "Le Vénérable",
        "email"=> "levy@gmail.com",
        "age"=> 500
    ]
];

$USERS_PET = [[
        "type"=> "animal de compagnie",
        "espece"=> "chien",
        "name"=> "Rox",
        "age"=> 7,
        "propriétaire"=> "John Doe"
    ],
    [
        "type"=> "animal de compagnie",
        "espece"=> "renard",
        "name"=> "Roukie",
        "age"=> 300,
        "propriétaire"=> "Le Vénérable"
    ]
];

$USERS_XENO = [[
        "type"=> "Xeno",
        "espece"=> "Krogan",
        "name"=> "Wrex",
        "menace"=> "Rouge",
        "age"=> 45
    ],
    [
        "type"=> "Xeno",
        "espece"=> "Turien",
        "name"=> "Garrus",
        "menace"=> "Vert",
        "age"=> 35
    ],
    [
        "type"=> "Xeno",
        "espece"=> "Asari",
        "name"=> "Liara",
        "menace"=> "ULTRA Rouge",
        "age"=> 25
    ]
];


$tabData = [];

array_push($tabData,$USERS_HUMAN,$USERS_PET,$USERS_XENO);

function afficherHummain($tab){
    foreach($tab as $users){
        // print_r($users);
        echo "<article style= 'border-bottom : 3px solid black '>";
        foreach($users as $cle => $valeur){
            echo "<p> $cle  :  $valeur  </p>";
            }
            echo "</article>";
        }
    }

afficherHummain($tabData[0]);

// for($i = 1 ; $i < sizeof($users); $i++){
//     echo "<article style= 'border-bottom : 3px solid black '>";
//     echo "<h2>nom :" . $profil[$i]  . "</h2>";
//     echo "<p>email :" .  $profil[$i] .  "</p>";
//     echo "<p>age :" . $profil[$i] . "</p>";
//     echo "</article>";



function afficherAnimal($tab){
    foreach($tab as $animal){
        // print_r($users);
        echo "<article style= 'border-bottom : 3px solid black '>";
        foreach($animal as $cle => $valeur){
            echo "<p> $cle  :  $valeur  </p>";
            }
            echo "</article>";
        }
}

afficherAnimal($tabData[1]);


function afficherXeno($tab){
    foreach($tab as $xeno){
        // print_r($users);
        echo "<article style= 'border-bottom : 3px solid black '>";
        foreach($xeno as $cle => $valeur){
            echo "<p> $cle  :  $valeur  </p>";
            }
            echo "</article>";
        }
}
afficherXeno($tabData[2]);


function profil($tab){
    foreach($tab as $users)
    foreach($users as $cle => $valeur){
        // echo "<p> $cle : $valeur </p>" ; 
    if($cle === "type" AND $valeur === 'humain'){
        echo afficherHummain($tab);
    } else if($cle === "type" AND $valeur ==='animal de compagnie'){
        echo afficherAnimal($tab);
    }else if($cle === "type" AND $valeur === 'Xeno'){
        afficherXeno($tab);
    }else{
        echo '<script>';
        echo "console.log('Type de profil non existant');";
        echo '</script>';
    }
    }
}

profil($tabData[0]);
profil($tabData[1]);
profil($tabData[2]);


function profilAll($tab){
    foreach( $tab as $users){
    foreach($users as $profils){
        profil($profils);
    }}
};

profilAll($tabData);

?>