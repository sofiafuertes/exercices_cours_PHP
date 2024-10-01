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

// function afficherHummain($tab){
//     foreach($tab as $users){
//         // print_r($users);
//         echo "<article style= 'border-bottom : 3px solid black '>";
//         foreach($users as $cle => $valeur){
//             echo "<p> $cle  :  $valeur  </p>";
//             }
//             echo "</article>";
//         }
//     }

// afficherHummain($tabData[0]);

//! Correction exo 3

function afficherHummain($tab){
    echo "<article style= 'border-bottom : 3px solid black '>
    <h2> nom: {$tab['name']} </h2>
    <p> email: {$tab['email']} </p>
    <p> age : {$tab['age']} </p> 
    </article> ";
}

afficherHummain($USERS_HUMAN[0]);


// function afficherAnimal($tab){
//     foreach($tab as $animal){
//         // print_r($users);
//         echo "<article style= 'border-bottom : 3px solid black '>";
//         foreach($animal as $cle => $valeur){
//             echo "<p> $cle  :  $valeur  </p>";
//             }
//             echo "</article>";
//         }
// }

// afficherAnimal($tabData[1]);

//! Correction exo 4

function afficherAnimal($tab){
    echo "<article style= 'border-bottom : 3px solid black '>
    <h2> nom: {$tab['name']} </h2>
    <p> espece: {$tab['espece']} </p>
    <p> age : {$tab['age']} </p>
    <p> proprietaire : {$tab['propriétaire']} </p>

    </article> ";
}

afficherAnimal($USERS_PET[0]);



// function afficherXeno($tab){
//     foreach($tab as $xeno){
//         // print_r($users);
//         echo "<article style= 'border-bottom : 3px solid black '>";
//         foreach($xeno as $cle => $valeur){
//             echo "<p> $cle  :  $valeur  </p>";
//             }
//             echo "</article>";
//         }
// }
// afficherXeno($tabData[2]);

//! Correction exo 5
function afficherXeno($tab){
    echo "<article style= 'border-bottom : 3px solid black '>
    <h2> nom: {$tab['name']} </h2>
    <p> espece: {$tab['espece']} </p>
    <p> age : {$tab['age']} </p>
    <p> menace : {$tab['menace']} </p>

    </article> ";
}

afficherXeno($USERS_XENO[0]);



// function profil($tab){
//     foreach($tab as $users)
//     foreach($users as $cle => $valeur){
//         // echo "<p> $cle : $valeur </p>" ; 
//     if($cle === "type" AND $valeur === 'humain'){
//         echo afficherHummain($tab);
//     } else if($cle === "type" AND $valeur ==='animal de compagnie'){
//         echo afficherAnimal($tab);
//     }else if($cle === "type" AND $valeur === 'Xeno'){
//         afficherXeno($tab);
//     }else{
//         echo '<script>';
//         echo "console.log('Type de profil non existant');";
//         echo '</script>';
//     }
//     }
// }

// profil($tabData[0]);
// profil($tabData[1]);
// profil($tabData[2]);

//! Correction exo 6,7,8
function profil($tab){
    foreach($tab as $profil){
        if($profil['type'] == 'humain'){
            afficherHummain($profil);
        }else if($profil['type'] == 'animal de compagnie'){
            afficherAnimal($profil);
        }elseif ($profil['type'] == 'Xeno') {
            afficherXeno($profil);
        }else{
            echo "<p>Type de profil non existant</p>";
        }
    }
}

profil($USERS_HUMAN);
profil($USERS_PET);
profil($USERS_XENO);

// function profilAll($tab){
//     foreach( $tab as $users){
//     foreach($users as $profils){
//         profil($profils);
//     }}
// };

// profilAll($tabData);

//! Correction exo 9

function profilAll($bigTab){
    foreach($bigTab as $tab){
        profil($tab);
    }
}

//! exo 12 

profilAll($tabData);
?>