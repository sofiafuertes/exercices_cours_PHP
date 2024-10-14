<?php

class Manager_joueurs extends Model_joueurs
{
    public function addJoueur():string
    {

        $pseudo = $this->getPseudo();
        $email = $this->getEmail();
        $score = $this->getScore();

        //*Connexion avec la bdd
        $bdd = new PDO ('mysql:host=localhost;dbname=supergame','root','',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        try {
            $req = $bdd->prepare('INSERT INTO joueurs (pseudo , email, score) VALUES (?,?,?)');
        
            $req->bindParam(1,$pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$email,PDO::PARAM_STR);
            $req->bindParam(3,$score,PDO::PARAM_INT);

            $req->execute();

            return "<p style='color: green' >$pseudo été enregistré avec succès </p>";

        } catch (Exception $error) {
            return $error->getMessage(); 
        }

    }
    public function getJoueurs():array|string
    {
        //*Connexion avec la bdd
        $bdd = new PDO ('mysql:host=localhost;dbname=supergame','root','',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        try {
            $req = $bdd->prepare('SELECT pseudo, email, score FROM joueurs');

            $req->execute();

            $data = $req->fetchAll();

            return $data;
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    
    public function getJoueurByPseudo()
    {
            $pseudo = $this->getPseudo();

        //*Connexion avec la bdd
        $bdd = new PDO ('mysql:host=localhost;dbname=supergame','root','',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        try {
            $req = $bdd->prepare('SELECT pseudo, email, score FROM joueurs WHERE pseudo = ?' );

            $req->bindParam(1, $pseudo,PDO::PARAM_STR);

            $req->execute();

            $data = $req->fetchAll();

            return $data;

        } catch (Exception $error) {
            return $error->getMessage();
        }

    }
}
