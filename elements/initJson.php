<?php
require 'connexion.php';

// Generation du fichier json de la liste de localite
try {
    global $pdo;
    $listville=[];
    $query=  $pdo->query('SELECT * FROM TBL_VILLE');
    $result = $query->fetchAll();
    foreach($result as $villes){
        $idville = $villes->ID_VILLE;
        $cpost = $villes->CPOST;
        $ville = $villes->VILLE;
        $cdepays = $villes->CDE_PAYS;

        $listville[] = array('ID_VILLE'=>$idville, 'CPOST' => $cpost, 'VILLE' => $ville, 'CDE_PAYS'=>$cdepays);
    };

    $frame['villes'] = $listville;
    
    $file = fopen('../js/localites.json','w');
    fwrite($file, json_encode($frame));
    fclose($file);

} catch(PDOException $e) {
    $error = $e->getMessage();
};


?>