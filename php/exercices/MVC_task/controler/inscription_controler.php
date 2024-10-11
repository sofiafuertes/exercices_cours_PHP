<?php

class ControlerInscription
{
    private string $userList;
    private string $message;
    private string $class;
    private string $classNav;

    public function __construct(){
        $this->userList="";
        $this->message = "";
        $this->class = "";
        $this->classNav="displayNone";

    }
    //* Getter
    public function getMessage()
    {
        return $this->message;
    }
    public function getUserList()
    {
        return $this->userList;
    }
    public function getClassNav() {
        return $this->classNav;
    }
    public function getClass() {
        return $this->class;
    }

    //* Setter

    public function setMessage($message): self
    {
        $this->message = $message;
        return $this;
    }

    public function setUserList($userList): self
    {
        $this->userList = $userList;
        return $this;
    }
    public function setClass($class): self {
        $this->class = $class;
        return $this;
    }
    public function setClassNav($classNav): self {
        $this->classNav = $classNav;
        return $this;
    }


    public function sendCleanData($a, $b, $c, $d)
    {
        //*Verifier si les champs sont vides, si ils le sont on retourne on message de erreur
        if (empty($c) or empty($d)) {
            return ["name_user" => '', "first_name_user" => '', "login_user" => '', "password_user" => '', "erreur" => 'Veuillez remplir le Login ET le Mot de Passe !'];
        }

        //*Nettoyer les donnees avec la fonction sanitize
        $name = sanitize($a);
        $firstName = sanitize($b);
        $login = sanitize($c);
        $psw = sanitize($d);


        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return ["name_user" => '', "first_name_user" => '', "login_user" => '', "password_user" => '', "erreur" => 'Login pas au bon format !'];
        }

        //* Hasher le mot de passe 
        $psw = password_hash($psw, PASSWORD_BCRYPT);

        return ["name_user" => $name, "first_name_user" => $firstName, "login_user" => $login, "password_user" => $psw, "erreur" => ''];
    }


    //* Affichage de la list de utilisateurs
    public function afficherUserList()
    {
        if(empty($this->userList)){
            $manageUser = new ManageUser('login_user');
            $users = $manageUser->readUsers();
            if (gettype($users) == 'string') {
                $this->setUserList($users);
            } else {
                foreach ($users as $user) {
                    $userList= $this->getUserList();
                    $this->setUserList($userList. "<article style='border-bottom : 2px solid green'>
                <p>Nom utilisateur: {$user['name_user']} </p>
                <p>Prenom utilisateur : {$user['first_name_user']}</p>
                <p>Login utilisateur : {$user['login_user']}</p>
                </article>");
                }
            }
        }
        return $this->userList;
    }

    //* Verification de le reçu de donnes quand le submit il est envoye et affichage de $message. 
    public function testDonnesReçus()
    {
        if (isset($_POST['submit'])) {
            $tab = $this->sendCleanData($_POST['name_user'], $_POST['first_name_user'], $_POST['login_user'], $_POST['mdp_user']);

            if ($tab['erreur'] != '') {
                $this->setMessage($tab['erreur']);
            } else {
                $manageUser = new ManageUser($tab['login_user']);
                if (empty($manageUser->readUserByLogin())) {
                    $manageUser->setFirstNameUser($tab['first_name_user']);
                    $manageUser->setNameUser($tab['name_user']);
                    $manageUser->setMdpUser($tab['password_user']);
                    $this->setMessage($manageUser->addUser());
                } else {
                    $this->setMessage( "Ce Login existe déjà en BDD !");
                }
            }
        }        
        return $this->message;
    }

};




