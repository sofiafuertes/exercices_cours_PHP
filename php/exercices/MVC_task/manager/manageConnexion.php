<?php
class ManageUserCo extends ModelUserCo{
    //* Fonction pour recuperer et verifier si le login de l'utilisataeur il est deja dans la bdd
function readUserByLogin(){
    $login_user = $this->getLoginUser();
    
    //* Connexion avec la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    //* Requete pour recuperer les donnes de les users
    try {
        $req = $bdd -> prepare ('SELECT login_user, mdp_user, id_user, name_user, first_name_user FROM users WHERE login_user = ?');
    
        // introduire l elogin de l'user das ma requete 
        $req ->bindParam(1,$login_user, PDO::PARAM_STR);
    
        $req -> execute();
    
        $data = $req -> fetchAll();
    
        return $data; 
    
    } catch (Exception $error) {
        return $error -> getMessage();
    }
    }
}