<?php 
//*Creation class ModelUserIns avec les fonctions Getter et Setter et AddUser(), ReadUser() et readUserByLogin()
class ModelUserIns{
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
    public function setIdUser(?int $idUser):ModelUserIns{
        $this-> idUser = $idUser;
        return $this;
    }
    public function setNameUser(?string $nameUser):ModelUserIns{
        $this-> nameUser= $nameUser;
        return $this;
    } public function setFirstNameUser(?string $firstNameUser):ModelUserIns{
        $this-> firstNameUser = $firstNameUser;
        return $this;
    } public function setLoginUser(?string $loginUser):ModelUserIns{
        $this-> loginUser = $loginUser;
        return $this;
    } public function setMdpUser(?string $mdpUser):ModelUserIns{
        $this-> mdpUser = $mdpUser;
        return $this;
    }
}