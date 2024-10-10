<?php 

class ModelUserCo{
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
    public function setIdUser(?int $idUser):ModelUserCo{
        $this-> idUser = $idUser;
        return $this;
    }
    public function setNameUser(?string $nameUser):ModelUserCo{
        $this-> nameUser= $nameUser;
        return $this;
    } public function setFirstNameUser(?string $firstNameUser):ModelUserCo{
        $this-> firstNameUser = $firstNameUser;
        return $this;
    } public function setLoginUser(?string $loginUser):ModelUserCo{
        $this-> loginUser = $loginUser;
        return $this;
    } public function setMdpUser(?string $mdpUser):ModelUserCo{
        $this-> mdpUser = $mdpUser;
        return $this;
    }


}

