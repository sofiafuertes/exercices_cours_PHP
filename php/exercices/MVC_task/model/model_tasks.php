<?php

class ModelTask{
    private ?int $idTask;
    private ?string $nomTask;
    private ?string $contentTask; 
    private ?string $dateTask;
    private ?int $idUser;
    private ?int $idCategory;


    public function __construct(?string $nomTask){
        $this->nomTask = $nomTask;
    }

    //*GETTERS

    public function getIdTask(){
        return $this->idTask;
    }
    public function getNomTask(){
        return $this->nomTask;
    }
    public function getContentTask(){
        return  $this->contentTask;
    }
    public function getDateTask(){
        return  $this->dateTask;
    }

    public function getIdUSer(){
        return  $this->idUser;
    }
    public function getIdCategory(){
        return $this->idCategory;
    }

    //*SETTERS
    public function setIdTask(?int $idTask):ModelTask{
        $this->idTask = $idTask;
        return $this;
    }
    public function setNomTask(?int $nomTask):ModelTask{
        $this->nomTask = $nomTask;
        return $this;
    }
    public function setContentTask(?string $contentTask):ModelTask{
        $this->contentTask = $contentTask;
        return $this;
    }
    public function setDateTask(?string $dateTask):ModelTask{
        $this->dateTask = $dateTask;
        return $this;
    }

    public function setIdUser(?int $idUser):ModelTask{
        $this->idUser = $idUser;
        return $this;
    }

    public function setIdCategory(?int $idCategory):ModelTask{
        $this->idCategory = $idCategory;
        return $this;
    }

// //* Fonction pour ajouter un task
//     function addTask(){
//         //1Er Etape : Instancier l'objet de connexion PDO
//         $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
//         //Try...Catch
//         try{
//             //2nd Etape : préparer ma requête INSERT INTO
//             $req = $bdd->prepare('INSERT INTO tasks (nom_task, content_task, date_task, id_user, id_category) VALUES (?,?,?,?,?)');
    
//             //3eme Etape : Binding de Paramètre pour relier chaque ? à sa donnée
//             $req->bindParam(1,$this->nomTask,PDO::PARAM_STR);
//             $req->bindParam(2,$this->contentTask,PDO::PARAM_STR);
//             $req->bindParam(3,$this->dateTask,PDO::PARAM_STR);
//             $req->bindParam(4,$this->idUser,PDO::PARAM_INT);
//             $req->bindParam(5,$this->idCategory,PDO::PARAM_INT);
    
//             //4eme Etape : exécution de la requête
//             $req->execute();
    
//             //5eme Etape : Retourne un message de confirmation
//             return "$this->nomTask , a été enregistré avec succès !";
//         }catch(EXCEPTION $error){
//             return $error->getMessage();
//         }
//     }
// //*Fonction pour afficher la liste des taks selon l'id_user
// //Param : int
// //Return : array | string
// function readTasksByUser():array|string {
//     $idUser = $this->idUser; 
//     //1Er Etape : Instancier l'objet de connexion PDO
//     $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//     //Try...Catch
//     try{
//         //2nd Etape : préparer ma requête SELECT
//         $req = $bdd->prepare('SELECT id_task, nom_task, content_task, date_task, id_user, tasks.id_category, name_category FROM tasks INNER JOIN categories ON tasks.id_category = categories.id_category WHERE id_user = ?');

//         //3eme Etape : Binding de Paramètre pour relier chaque ? à sa donnée
//         $req->bindParam(1,$idUser,PDO::PARAM_INT);

//         //4eme Etape : exécution de la requête
//         $req->execute();

//         //5eme Etape : Retourne la réponse de la BDD
//         return $req->fetchAll(PDO::FETCH_ASSOC);

//     }catch(EXCEPTION $error){
//         return $error->getMessage();
//     }
// }

}





// //Fonction pour ajouter une tâche
// //Param :
// //Return : string
// function addTask($nom_task, $content_task, $date_task, $id_user, $id_category){
//     //1Er Etape : Instancier l'objet de connexion PDO
//     $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//     //Try...Catch
//     try{
//         //2nd Etape : préparer ma requête INSERT INTO
//         $req = $bdd->prepare('INSERT INTO tasks (nom_task, content_task, date_task, id_user, id_category) VALUES (?,?,?,?,?)');

//         //3eme Etape : Binding de Paramètre pour relier chaque ? à sa donnée
//         $req->bindParam(1,$nom_task,PDO::PARAM_STR);
//         $req->bindParam(2,$content_task,PDO::PARAM_STR);
//         $req->bindParam(3,$date_task,PDO::PARAM_STR);
//         $req->bindParam(4,$id_user,PDO::PARAM_INT);
//         $req->bindParam(5,$id_category,PDO::PARAM_INT);

//         //4eme Etape : exécution de la requête
//         $req->execute();

//         //5eme Etape : Retourne un message de confirmation
//         return "$nom_task , a été enregistré avec succès !";
//     }catch(EXCEPTION $error){
//         return $error->getMessage();
//     }
// }

// //Fonction pour afficher la liste des taks selon l'id_user
// //Param : int
// //Return : array | string
// function readTasksByUser($id_user){
//     //1Er Etape : Instancier l'objet de connexion PDO
//     $bdd = new PDO('mysql:host=localhost;dbname=task','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//     //Try...Catch
//     try{
//         //2nd Etape : préparer ma requête SELECT
//         $req = $bdd->prepare('SELECT id_task, nom_task, content_task, date_task, id_user, tasks.id_category, name_category FROM tasks INNER JOIN categories ON tasks.id_category = categories.id_category WHERE id_user = ?');

//         //3eme Etape : Binding de Paramètre pour relier chaque ? à sa donnée
//         $req->bindParam(1,$id_user,PDO::PARAM_INT);

//         //4eme Etape : exécution de la requête
//         $req->execute();

//         //5eme Etape : Retourne la réponse de la BDD
//         return $req->fetchAll(PDO::FETCH_ASSOC);

//     }catch(EXCEPTION $error){
//         return $error->getMessage();
//     }
// }
