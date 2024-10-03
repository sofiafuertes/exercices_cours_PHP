<?php 

function addUser($name, $firstName,$login,$psw){
    //*Connexion avec la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=task','root','',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    //* Try...Catch pour faire la requete de envoie de donnees a la bdd et gerer des possibles erreurs
    try {
        //* Preparation requete
        $req = $bdd -> prepare ('INSERT INTO users (name_user, first_name_user, login_user, mdp_user) VALUES (?,?,?,?)');

        //* Relie les donnes a chaque ? 
        $req -> bindParam(1,$name,PDO::PARAM_STR);
        $req -> bindParam(2,$firstName,PDO::PARAM_STR);
        $req -> bindParam(3,$login,PDO::PARAM_STR);
        $req -> bindParam(4,$psw,PDO::PARAM_STR);

        //* Execution de la requete
        $req -> execute();

        //* Message de confirmation
        return "$login a été enregistré avec succès";

    } catch (Exception $error) {
        return $error -> getMessage();
    }
}

//* Creation de la fonction pour aficher la list de utilisateurs de la bdd

function readUsers(){

    //* Connexion avec la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    //* Requete pour recuperer les donnes de les users
    try {
        $req = $bdd -> prepare ('SELECT name_user, first_name_user, login_user FROM users ');

        $req -> execute();

        $data = $req -> fetchAll();

        return $data; 

    } catch (Exception $error) {
        return $error -> getMessage();
    }
}

//* Fonction pour recuperer un utilisateur en bdd selon un login precis
function readUserByLogin($login_user){

    //* Connexion avec la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    //* Requete pour recuperer les donnes de les users
    try {
        $req = $bdd -> prepare ('SELECT name_user, first_name_user, login_user FROM users WHERE login_user = ?');

        // introduire l elogin de l'user das ma requete 
        $req ->bindParam(1,$login_user, PDO::PARAM_STR);

        $req -> execute();

        $data = $req -> fetchAll(PDO::FETCH_ASSOC);

        return $data; 

    } catch (Exception $error) {
        return $error -> getMessage();
    }
}