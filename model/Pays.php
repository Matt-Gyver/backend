<?php

class Pays{
    public $cde_pays;
    public $nom_pays;

    public function __construct(string $cde_pays, string $nom_pays)
    {
        $this->cde_pays=$cde_pays;
        $this->nom_pays=$nom_pays;
    }

    public function getcde(){
    return (string)$this->cde_pays;
    }

    public function getnom(){
        return (string)$this->nom_pays;
    }



}


?>