<?php 

//* Activation de la SESSION
session_start();

//* Declaration de les variables login et psw
$login = "";
$psw = "";
$name = "";
$firstName = ""; 

//* Si les $_SESSION login et psw existe on va las stocker en las variables correspondantes
if(isset($_SESSION['loginCo']) AND isset($_SESSION['passwordCo'])){
    $login = $_SESSION['loginCo'];
    $psw = $_SESSION['passwordCo'];
    $name = $_SESSION['name'];
    $firstName = $_SESSION['first_name'];
}

$UpdateForm = ""; 

// if(isset($_POST['update'])){
//     $UpdateForm = "<form method='post'>
//     <input type='text' name='name_user' placeholder='your name'>
//     <input type='text' name='first_name_user' placeholder='Your first name'>
//     <input type='email' name='login_user' placeholder='Your username'>
//     <input type='password' name='mdp_user' placeholder='Your password'>
//     <input type='submit' name='modifier' value='Modifier'>
//     <input type='submit' name='exit' value='exit'>
// </form>";
// }

// function modifyData(){
//     $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//     $req = $bdd -> prepare('UPDATE users SET ');
// };


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="inscription.php">Inscription</a>
        <a href="mon_compte.php">Mon compte</a>
        <a href="deconnexion.php">Deconnexion</a>
    </nav>
</header>
<main>
    <h1>Mon Compte</h1>
    <p>Nom: <?php echo $name ?></p>
    <p>Prenom: <?php echo $firstName ?></p>
    <p>Login: <?php echo $login ?></p>
    <p>Password: <?php echo $psw ?></p>

    <form action="" method="post">
    <input type="submit" name="update" value="Modifie mes donnees">
    <p><?php echo $UpdateForm ?></p>
    </form>


</main>

</body>
</html>