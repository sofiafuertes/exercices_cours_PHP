<?php

class ManagerPokemon extends ModelPokemon
{
    public function attaquer(string $cible)
    {
        $pointDegat = $this->getPointDegat();
        echo "{$this->getNom()} attaques $cible";
        return $pointDegat;
    }
    
    public function addPokemon(): string{
        $nom = $this->getNom();
        $typePokemon = $this->getType();
        $forcePokemon = $this->getForce();
        $faiblesse = $this->getFaiblesse();

        //*Connexion avec la bdd
        $bdd = new PDO(
            'mysql:host=localhost;dbname=pokemon','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        //* Try...Catch pour faire la requete de envoie de donnees a la bdd et gerer des possibles erreurs
        try {
            //* Preparation requete
            $req = $bdd->prepare('INSERT INTO pokemons (nom, typePokemon, forcePokemon, faiblesse) VALUES (?,?,?,?)');

            //* Relie les donnes a chaque ? 
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $typePokemon, PDO::PARAM_STR);
            $req->bindParam(3, $forcePokemon, PDO::PARAM_STR);
            $req->bindParam(4, $faiblesse, PDO::PARAM_STR);

            //* Execution de la requete
            $req->execute();

            //* Message de confirmation
            return "$nom a été enregistré avec succès";

        } catch (Exception $error) {
            return $error->getMessage();
        }
}

    public function readPokemon(): array|string
    {
        //* Connexion avec la bdd
        $bdd = new PDO('mysql:host=localhost;dbname=pokemon', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //* Requete pour recuperer les donnes de les users
        try {
            $req = $bdd->prepare('SELECT nom, typePokemon, forcePokemon, faiblesse FROM pokemons ');

            $req->execute();

            $data = $req->fetchAll();

            return $data;

        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    public function readPokemonByName(): array|string
    {
        $nomPokemon = $this->getNom();
        //* Connexion avec la bdd
        $bdd = new PDO('mysql:host=localhost;dbname=pokemon', 'root', '', options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //* Requete pour recuperer les donnes de les users
        try {
            $req = $bdd->prepare('SELECT nom, typePokemon, forcePokemon, faiblesse FROM pokemons WHERE nom = ?');

            // introduire l elogin de l'user das ma requete 
            $req->bindParam(1, $nomPokemon, PDO::PARAM_STR);

            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            return $data;

        } catch (Exception $error) {
            return $error->getMessage();
        }

    }

}