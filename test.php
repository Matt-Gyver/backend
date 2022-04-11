<?php
//require 'model/Pays.php';

//$belgique = new Pays("BE","Belgique");

//var_dump($belgique,
//        $belgique->cde_pays,
//        $belgique->getnom()
//);

//require 'elements/connexion.php';
/*
$query=  $pdo->prepare('SELECT * FROM TBL_PAYS');
        $query->execute();
        $result = $query->fetchAll();
        $liste_pays = [];
        foreach($result as $pays){
            $p = new Pays($pays->CDE_PAYS,$pays->NOM_PAYS);
            $liste_pays[] = $p;
        }
var_dump(//$result,
           //$liste_pays,
           $liste_pays[0]->getnom()
        );
*/

require 'dao/pays.php';

$list = getListPays();
var_dump($list);

?>