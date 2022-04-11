<?php 
require 'model/Localite.php';
require 'elements/connexion.php';

// CRUD

function getListLocalite()
{
    try {
        global $pdo;
        $listville=[];
        $query=  $pdo->query('SELECT * FROM TBL_VILLE');
        $result = $query->fetchAll();
        foreach($result as $ville){
            $p = new Localite($ville->ID_VILLE,$ville->CPOST,$ville->VILLE,$ville->CDE_PAYS);
            $listville[] = $p;
        }
        return $listville;
    } catch(PDOException $e) {
        $error = $e->getMessage();
    }

}

?>