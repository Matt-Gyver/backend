<?php

class Localite{
    public $id_ville;
    public $cpost;
    public $ville;
    public $cde_pays;

    public function __construct(int $id_ville, string $cpost,string $ville,string $cde_pays)
    {
        $this->id_ville=$id_ville;
        $this->cpost=$cpost;
        $this->ville=$ville;
        $this->cde_pays=$cde_pays;
    }

    public function getid(){
    return (int)$this->id_ville;
    }

    public function getcpost(){
        return (string)$this->cpost;
    }

    public function getville(){
        return (string)$this->ville;
    }
    public function getcde(){
        return (string)$this->cde_pays;
    }
}


?>