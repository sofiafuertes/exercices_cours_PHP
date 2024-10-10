<?php 

class ManageUser extends ModelUserIns{

    public function addUser():string{ 

        $login = $this->getLoginUser();
        $nameUser= $this->getNameUser();
        $firstNameUser= $this->getFirstNameUser();
        $mdpUser= $this->getMdpUser();

        //*Connexion avec la bdd
        $bdd = new PDO('mysql:host=localhost;dbname=task','root','',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
        //* Try...Catch pour faire la requete de envoie de donnees a la bdd et gerer des possibles erreurs
        try {
            //* Preparation requete
            $req = $bdd -> prepare ('INSERT INTO users (name_user, first_name_user, login_user, mdp_user) VALUES (?,?,?,?)');
    
            //* Relie les donnes a chaque ? 
            $req -> bindParam(1,$nameUser,PDO::PARAM_STR);
            $req -> bindParam(2,$firstNameUser,PDO::PARAM_STR);
            $req -> bindParam(3,$login,PDO::PARAM_STR);
            $req -> bindParam(4,$mdpUser,PDO::PARAM_STR);
    
            //* Execution de la requete
            $req -> execute();
    
            //* Message de confirmation
            return "$login a été enregistré avec succès";
    
        } catch (Exception $error) {
            return $error -> getMessage();
        }
    }

    
    public function readUsers():array | string{

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

    public function readUserByLogin():array | string{
        $this->getLoginUser();
        //* Connexion avec la bdd
        $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
        //* Requete pour recuperer les donnes de les users
        try {
            $req = $bdd -> prepare ('SELECT name_user, first_name_user, login_user FROM users WHERE login_user = ?');
    
            // introduire l elogin de l'user das ma requete 
            $req ->bindParam(1,$loginUser, PDO::PARAM_STR);
    
            $req -> execute();
    
            $data = $req -> fetchAll(PDO::FETCH_ASSOC);
    
            return $data; 
    
        } catch (Exception $error) {
            return $error -> getMessage();
        }
    }
}

