<?php
include "modelPokemon.php";
include "managerPokemon.php";

class ControlerAccueil
{
    private ModelPokemon $pokemon;

    private ?string $messageEnregistrer;
    private ?string $messageAttaquer;

    public function __construct()
    {
        $this->messageEnregistrer = "";
        $this->messageAttaquer = "";
    }

    //* Getter and Setter
    public function getPokemon()
    {
        return $this->pokemon;
    }
    public function setPokemon($pokemon): self
    {
        $this->pokemon = $pokemon;
        return $this;
    }
    public function getMessageEnregistrer(): ?string
    {
        return $this->messageEnregistrer;
    }
    public function setMessageEnregistrer(?string $messageEnregistrer): self
    {
        $this->messageEnregistrer = $messageEnregistrer;
        return $this;
    }
    public function getMessageAttaquer(): ?string
    {
        return $this->messageAttaquer;
    }
    public function setMessageAttaquer(?string $messageAttaquer): self
    {
        $this->messageAttaquer = $messageAttaquer;
        return $this;
    }

    //* Fonction poour nettoyer les donnees rentrees dans le formulaire
    public function cleanData()
    {
        //*Verifier si les champs sont vides, si ils le sont on retourne on message de erreur
        if (empty($_POST['nom']) or empty($_POST['type']) or empty($_POST['force']) or empty($_POST['faiblesse'])) {
            return 'Veuillez remplir tous les champs !';
        }

        //*Nettoyer les donnees
        $nom = htmlentities(strip_tags(stripslashes(trim($_POST['nom']))));
        $type = htmlentities(strip_tags(stripslashes(trim($_POST['type']))));
        $force = htmlentities(strip_tags(stripslashes(trim($_POST['force']))));
        $faiblesse = htmlentities(strip_tags(stripslashes(trim($_POST['faiblesse']))));

        //* cet fonction retournera un tableau
        return [$nom, $type, $force, $faiblesse];

    }
    //* Fonction pour enrigestrer un pokemon a la bdd
    public function enrigestrerPokemon(): string
    {
        if (isset($_POST['Ajouter'])) {
            $tab = $this->cleanData();
            if ($tab === '') {
                $this->setMessageEnregistrer($tab);
            } else {
                $managerPokemon = new ManagerPokemon($tab[0], $tab[1], $tab[2], $tab[3]);
                if (empty($managerPokemon->readPokemonByName())) {
                    $managerPokemon->setNom($tab[0]);
                    $managerPokemon->setType($tab[1]);
                    $managerPokemon->setForce($tab[2]);
                    $managerPokemon->setFaiblesse($tab[3]);
                    $this->setMessageEnregistrer($managerPokemon->addPokemon());
                } else {
                    $this->setMessageEnregistrer("Ce Pokemon existe déjà en BDD!");
                }
            }
        }
        return $this->getMessageEnregistrer();
    }

    public function attaquePokemon(string $cible): string
    {
        $pokemon = $this->getPokemon()->attaquer();
        return "$pokemon->getNom fait $pokemon->getPointDegat à $cible";
    }

    //* Fonction pour afficher la liste de pokemons enrigestres en la bdd
    public function displayPokemons()
    {
        if (isset($this->messageAttaquer)) {
            $listPokemons = new ManagerPokemon("nom", "type", "force", "faiblesse");
            $data = $listPokemons->readPokemon();
            // print_r($data);
            if (gettype($data) == '') {
                $this->setMessageAttaquer($data);
            } else {
                foreach ($data as $pokemon) {
                    $list = $this->getMessageAttaquer();
                    $this->setMessageAttaquer($list . "<article style='border-bottom : 2px solid green'>
                        <p>Nom: {$pokemon['nom']} </p>
                        <p>Type : {$pokemon['typePokemon']}</p>
                        <p>Force : {$pokemon['forcePokemon']}</p>
                        <p>Faiblesse : {$pokemon['faiblesse']}</p>
                        </article>");
                }

            }
        }

    }
}


$controlerAccueil = new ControlerAccueil();
$controlerAccueil->enrigestrerPokemon();
$controlerAccueil->displayPokemons();


include "viewAccueil.php";