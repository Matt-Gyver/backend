<?php
require 'connexion.php';


function getPays(){
    global $pdo;
    global $error;
    try {
        $query=  $pdo->prepare('SELECT * FROM TBL_PAYS');
        $query->execute();
        $result = $query->fetchAll();
    } catch(PDOException $e) {
        $error = $e->getMessage();
        echo ($error);
    };
    return $result;
}
//$("#inputlocalite").append('<option value="'+toadd+'">'+ toadd +'</option>');

?>