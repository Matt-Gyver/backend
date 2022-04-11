<?php 
require 'model/User.php';
require_once 'elements/connexion.php';

// CRUD

function getuser(string $email):User
{
    try {
        global $pdo;
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