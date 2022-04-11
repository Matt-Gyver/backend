<?php

class User{
    public $iduser;
    public $nomprenom;
    public $adresse;
    public $idville;
    public $email;
    public $password;

    public function __construct(int $iduser, string $nomprenom, string $adresse, string $idville, string $email, string $password)
    {
        $this->iduser=$iduser;
        $this->nomprenom=$nomprenom;
        $this->adresse=$adresse;
        $this->idville=$idville;
        $this->email=$email;
        $this->password=$password;
    }

    public function getid(){
    return (string)$this->iduser;
    }

    public function getnom(){
        return (string)$this->nomprenom;
    }

    public function getaddress(){
        return (string)$this->adresse;
    }

    public function getidville(){
        return (string)$this->idville;
    }

    public function getemail(){
        return (string)$this->email;
    }

    public function getpassword(){
        return (string)$this->password;
    }



}


?>