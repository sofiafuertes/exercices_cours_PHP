<?php



class ControlerAccueil
{
    private string $message;

    public function __construct()
    {
        $this->message = "";
        $this->class = "";
        $this->classNav = "displayNone";
    }
    public function getMessage(): ?string
    {
        return $this->message;
        
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }



    //*Fonction pour chequer si les champs sont vides et filtrer, nettoyer les donnees 

    function sendCleanData()
    {
        //*Verifier si les champs sont vides, si ils le sont on retourne on message de erreur
        if (empty($_POST['loginCo']) or empty($_POST['passwordCo'])) {
            return 'Veuillez remplir le Login ET le Mot de Passe !';
        }

        //*Nettoyer les donnees avec la fonction sanitize
        $login = sanitize($_POST['loginCo']);
        $psw = sanitize($_POST['passwordCo']);

        //* Filtrer le email
        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return 'Login pas au bon format !';
        }

        //* cet fonction retournera un tableau avec le $login et le $psw
        return [$login, $psw];

    }

    public function connexionUser(): void
    {
        //* Une fois que le utilisiteur veux ce connecter, on va a nettoyer les donnes avec la fonction sendCleanData(), on va a chequer que le login ($data[0]) il est enrigestrer dans la bdd. 
        if (isset($_POST['connexion'])) {
            $data = $this->sendCleanData();
            $manageUserCo = new ManageUserCo($data[0]);
            $loginUser = $manageUserCo->readUserByLogin();

            //* Si le login il est vide on va a afficher un message qui dit que le mail il est pas enregistre dans la bdd et apres on verifie si la mot de passe correspondre a la mdp lie a ce login. Si elle correspondre on affiche message 'vous etes connecté' et on sauvegarde les donnes en la $_SESSION. 
            if (empty($loginUser)) {
                var_dump($loginUser);
                $this->setMessage("C'est login il est pas enrigestré en bdd");
            } else if (password_verify($_POST['passwordCo'], $loginUser[0]['mdp_user'])) {
                $this->setMessage("Vous etes connecté");
                $_SESSION['id_user'] = $loginUser[0]['id_user'];
                $_SESSION['loginCo'] = $loginUser[0]['login_user'];
                $_SESSION['name'] = $loginUser[0]['name_user'];
                $_SESSION['first_name'] = $loginUser[0]['first_name_user'];
                // print_r($_SESSION);
            } else {
                $this->setMessage("Le mot de passe est incorrect");
            }
        }
    }

}


