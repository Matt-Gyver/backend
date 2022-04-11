<?php
$nom = "Doe";
$error = null;

$dsn = 'mysql:dbname=kcni9234_vannestemathieu;host=127.0.0.1';
$user = 'kcni9234_vannestemathieu'; 
$password = 'C[!YyenK?v[8';
$urlImg = "http://fe.digitalinit.net/data/img/";
$pdo = new PDO($dsn, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);


function bonjour($prenom = null) {
    global $nom;
    if ($prenom == null){
        return "Bonjour \n";
    }
    return 'Bonjour ' .$prenom. " " .$nom. "\n";
}

function repondre_oui_non ($phrase) :bool
{
    while (true){
        $reponse = readline($phrase);
        if ($reponse === "o"){
            return true;
        }
        elseif ($reponse === "n") {
            return false;
        }
    }
}

//$resultat = repondre_oui_non("Voulez-vous continuer ? [o/n]");
//var_dump($resultat);

function demander_creneaux(String $phrase ="Veuillez entrer  vos créneaux " ): array
{
    $creneaux = [];
    $continuer = true;
    while ($continuer){
        $creneaux[] = demander_creneaux();
        $continuer = repondre_oui_non("Voulez vous continuer ? ");
    }
    return $creneaux;
}

function initImmo ():array
{
    global $pdo;
    // pod query
    try {
        $query=  $pdo->query('SELECT * FROM TBL_BIEN');
        // $tbl_bien = $query->fetchAll(PDO::FETCH_OBJ); 
        // parce qu'on a definit au dessus la methode de recuperation par defaut, plus besoin de preciser ici :
        $tbl_bien = $query->fetchAll();
    } catch(PDOException $e) {
        $error = $e->getMessage();
    };
    return $tbl_bien;
}

function typeBien(Int $id_bien = 1):string {
    global $pdo;
    global $error;
    try {
        $query=  $pdo->prepare('SELECT TYPE_BIEN FROM TBL_TYPE_BIEN WHERE ID_TYPE_BIEN=?');
        $query->execute([$id_bien]);
        $result = $query->fetch()->TYPE_BIEN;
    } catch(PDOException $e) {
        $error = $e->getMessage();
        echo ($error);
    };
    return $result;
}

function typeAnnonce(Int $id_annonce):string {
    global $pdo;
    global $error;
    try {
        $query=  $pdo->prepare('SELECT TYPE_ANNONCE FROM TBL_TYPE_ANNONCE WHERE ID_TYPE_ANNONCE=?');
        $query->execute([$id_annonce]);
        $result = $query->fetch()->TYPE_ANNONCE;
    } catch(PDOException $e) {
        $error = $e->getMessage();
        echo ($error);
    };
    return $result;
}

function isIDuser(Int $num){
    global $pdo;
    try {
        $query=  $pdo->prepare('SELECT ID_USER FROM TBL_BIEN WHERE ID_BIEN=?');
        $query->execute([$num]);
        $result = $query->fetch();
    } catch(PDOException $e) {
        $error = $e->getMessage();
    };
    if($num === $result){
        $answer = "*";
        return $answer;
    } else {
        $answer = "";
        return $answer;
    }
}

?>