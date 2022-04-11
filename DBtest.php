<?php 
require 'elements/header.php'  ;
require 'elements/functions.php';
require 'dao/pays.php'


/**
differente methode : execute pour une requete prepare
- fetch pour recuperer un resultat
- fetchAll pour recuperer tous les resultats
- fetchcolumn pour recuperer une colonne en particulier

    il existe different fetchmode : 

    - PDO::FETCH_ASSOC : retourne un tableau indexe par le nom de la colonne comme retourner dans le jeu de resultat
    - PDO::FETCH_BOTH : retourne un tableau indexe par le nom de la colonne ET numero de colonne
    - PDO::FETCH_CLASS : retourne les donnees sous forme d'instance de classe
    - PDO::FETCH_INTO : inserer des donnees dans une instance de classe deja cree 
    - PDO::FETCH_LAZY : combinaison de BOTH et OBJ 
    - PDO::FETCH_NUM : retourne un tableau indexe par le numero de la colonne 
    - PDO::FETCH_OBJ : retourne un objet anonyme avec les noms des proprietes qui correspondent aux noms des colonnes

FETCH_OBJ : renvoi un objet qui est une instance d'une classe de php qui s'appelle STDCLASS
STDCLASS : une classe generique qui n'a pas de constructeur et php va direcement mettre ses propriete dedans

Pour recuper des informations avec FETCH_OBJ :

    print_r($tbl_bien[0]->ID_BIEN)
    => un objet est cree avec chaque propriete qui correspond au nom des colonnes de notre DB


    ATTRIBUT PDO :

    quand on construit le pdo on peut lui donner un quatrieme parametre (tableau d'option, setAttribute)
    => $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        - ATTR_ERRMODE : rapport d'erreur 
        - ERRMODE_EXCEPTION : emet une exception 

    => on essaye notre request, si erreur on peut recuperer l'exceptoin directement (pratique)
    try {
        $query=  $pdo->query('SELECT * FROM TBL_BIEN');
        $tbl_bien = $query->fetchAll(PDO::FETCH_OBJ);
    } catch(PDOException $e) {
        $error = $e->getMessage();
    }

    ------------------------
    on definit egalement une methode par defaut pour la recuperation de nos donnees (FETCH_OBJ) dans le setAttributes
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);


*/

?>
<?php

/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=kcni9234_vannestemathieu;host=127.0.0.1';
$user = 'kcni9234_vannestemathieu'; 
$password = 'C[!YyenK?v[8';

$pdo = new PDO($dsn, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
//$pdo->setAttribute(, PDO::ERRMODE_EXCEPTION);
$error = null;
// pod query


try {
    $query=  $pdo->query('SELECT * FROM TBL_BIEN');
    // $tbl_bien = $query->fetchAll(PDO::FETCH_OBJ); 
    // parce qu'on a definit au dessus la methode de recuperation par defaut, plus besoin de preciser ici :
    $tbl_bien = $query->fetchAll();
} catch(PDOException $e) {
    $error = $e->getMessage();
}
// Plus besoin avec le try catch
//if ($query === false){
//    var_dump($pdo->errorInfo());
//    die('Erreur sql');
//}

 /** PDOstatement : un objet qui permet de representer une requete
 * et les resultats associes.
 * methodes utiles : 
 *
 * execute dans le cas du request prepare
 * fetch pour recupere 1 result
 * fetchall pour recuperer tous les resultats
 * fetchcolumn pour recuperer une colonne en particulier
 * 
 */


?>
<?php if($error): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php else: ?>
<ul>

</ul>
<?php endif ?>

<?=
$listpays = [];
$listpays = getListPays();

foreach($listpays as $pays){
    echo $pays->getcde();
}

?>

<?php require 'elements/footer.php'  ?>