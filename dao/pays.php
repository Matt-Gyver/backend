<?php 
require 'model/Pays.php';
require 'elements/connexion.php';

// CRUD

function getListPays()
{
    try {
        global $pdo;
        $listpays=[];
        $query=  $pdo->query('SELECT * FROM TBL_PAYS');
        $result = $query->fetchAll();
        foreach($result as $pays){
            $p = new Pays($pays->CDE_PAYS,$pays->NOM_PAYS);
            $listpays[] = $p;
        }
        return $listpays;
    } catch(PDOException $e) {
        $error = $e->getMessage();
    }

}

?>