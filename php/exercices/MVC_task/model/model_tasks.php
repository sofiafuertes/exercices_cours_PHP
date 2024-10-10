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
    public function setNomTask(?string $nomTask):ModelTask{
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

    public function setIdUser(?int $idUser){
        $this->idUser = $idUser;
        return $this;
    }

    public function setIdCategory(?int $idCategory){
        $this->idCategory = $idCategory;
        return $this;
    }


}






