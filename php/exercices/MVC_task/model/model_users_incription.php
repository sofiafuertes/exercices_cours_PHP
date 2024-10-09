<?php 
//*Creation class ModelUser avec les fonctions Getter et Setter et AddUser(), ReadUser() et readUserByLogin()
class ModelUser{
    private ?int $idUser;
    private ?string $nameUser;
    private ?string $firstNameUser;
    private ?string $loginUser;
    private ?string $mdpUser;

    public function __construct(?string $loginUser){
        $this -> loginUser = $loginUser;
    }

    //* GETTER
    public function getIdUser(){
        return $this->idUser;
    }
    public function getNameUser(){
        return $this->nameUser;
    } public function getFirstNameUser(){
        return $this->firstNameUser;
    } public function getLoginUser(){
        return $this->loginUser;

    } public function getMdpUser(){
        return $this->mdpUser;
    }
    //* SETTER
    public function setIdUser(?int $idUser):ModelUser{
        $this-> idUser = $idUser;
        return $this;
    }
    public function setNameUser(?string $nameUser):ModelUser{
        $this-> nameUser= $nameUser;
        return $this;
    } public function setFirstNameUser(?string $firstNameUser):ModelUser{
        $this-> firstNameUser = $firstNameUser;
        return $this;
    } public function setLoginUser(?string $loginUser):ModelUser{
        $this-> loginUser = $loginUser;
        return $this;
    } public function setMdpUser(?string $mdpUser):ModelUser{
        $this-> mdpUser = $mdpUser;
        return $this;
    }


    // public function addUser():string{
    //     $login = $this-> loginUser;
    //     $nameUser = $this-> nameUser;
    //     $firstNameUser = $this-> firstNameUser;
    //     $mdpUser = $this-> mdpUser;

    //     //*Connexion avec la bdd
    //     $bdd = new PDO('mysql:host=localhost;dbname=task','root','',
    //     array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    //     //* Try...Catch pour faire la requete de envoie de donnees a la bdd et gerer des possibles erreurs
    //     try {
    //         //* Preparation requete
    //         $req = $bdd -> prepare ('INSERT INTO users (name_user, first_name_user, login_user, mdp_user) VALUES (?,?,?,?)');
    
    //         //* Relie les donnes a chaque ? 
    //         $req -> bindParam(1,$nameUser,PDO::PARAM_STR);
    //         $req -> bindParam(2,$firstNameUser,PDO::PARAM_STR);
    //         $req -> bindParam(3,$login,PDO::PARAM_STR);
    //         $req -> bindParam(4,$mdpUser,PDO::PARAM_STR);
    
    //         //* Execution de la requete
    //         $req -> execute();
    
    //         //* Message de confirmation
    //         return "$login a été enregistré avec succès";
    
    //     } catch (Exception $error) {
    //         return $error -> getMessage();
    //     }
    // }

    
    // public function readUsers():array | string{

    //     //* Connexion avec la bdd
    //     $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    //     //* Requete pour recuperer les donnes de les users
    //     try {
    //         $req = $bdd -> prepare ('SELECT name_user, first_name_user, login_user FROM users ');
    
    //         $req -> execute();
    
    //         $data = $req -> fetchAll();
    
    //         return $data; 
    
    //     } catch (Exception $error) {
    //         return $error -> getMessage();
    //     }
    // }

    // public function readUserByLogin():array | string{

    //     //* Connexion avec la bdd
    //     $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    //     //* Requete pour recuperer les donnes de les users
    //     try {
    //         $req = $bdd -> prepare ('SELECT name_user, first_name_user, login_user FROM users WHERE login_user = ?');
    
    //         // introduire l elogin de l'user das ma requete 
    //         $req ->bindParam(1,$this-> loginUser, PDO::PARAM_STR);
    
    //         $req -> execute();
    
    //         $data = $req -> fetchAll(PDO::FETCH_ASSOC);
    
    //         return $data; 
    
    //     } catch (Exception $error) {
    //         return $error -> getMessage();
    //     }
    // }

}


// function addUser($name, $firstName,$login,$psw){
//     //*Connexion avec la bdd
//     $bdd = new PDO('mysql:host=localhost;dbname=task','root','',
//     array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//     //* Try...Catch pour faire la requete de envoie de donnees a la bdd et gerer des possibles erreurs
//     try {
//         //* Preparation requete
//         $req = $bdd -> prepare ('INSERT INTO users (name_user, first_name_user, login_user, mdp_user) VALUES (?,?,?,?)');

//         //* Relie les donnes a chaque ? 
//         $req -> bindParam(1,$name,PDO::PARAM_STR);
//         $req -> bindParam(2,$firstName,PDO::PARAM_STR);
//         $req -> bindParam(3,$login,PDO::PARAM_STR);
//         $req -> bindParam(4,$psw,PDO::PARAM_STR);

//         //* Execution de la requete
//         $req -> execute();

//         //* Message de confirmation
//         return "$login a été enregistré avec succès";

//     } catch (Exception $error) {
//         return $error -> getMessage();
//     }
// }

//* Creation de la fonction pour afficher la list de utilisateurs de la bdd

// function readUsers(){

//     //* Connexion avec la bdd
//     $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//     //* Requete pour recuperer les donnes de les users
//     try {
//         $req = $bdd -> prepare ('SELECT name_user, first_name_user, login_user FROM users ');

//         $req -> execute();

//         $data = $req -> fetchAll();

//         return $data; 

//     } catch (Exception $error) {
//         return $error -> getMessage();
//     }
// }

// //* Fonction pour recuperer un utilisateur en bdd selon un login precis
// function readUserByLogin($login_user){

//     //* Connexion avec la bdd
//     $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//     //* Requete pour recuperer les donnes de les users
//     try {
//         $req = $bdd -> prepare ('SELECT name_user, first_name_user, login_user FROM users WHERE login_user = ?');

//         // introduire l elogin de l'user das ma requete 
//         $req ->bindParam(1,$login_user, PDO::PARAM_STR);

//         $req -> execute();

//         $data = $req -> fetchAll(PDO::FETCH_ASSOC);

//         return $data; 

//     } catch (Exception $error) {
//         return $error -> getMessage();
//     }
// }