<?php require 'elements/auth.php';
if (!isconnected() ) {
    header('Location: index.php');
    exit();
}
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

$error = null;

// pod query


try {
    $id=$_GET['id'];
    $vendu=$_POST['SOLD'];
    $lib=$_POST['LIB'];
    $description=$_POST['DESCRIPTION'];
    $prix=$_POST['PRIX'];
    $classe_energie=$_POST['CLASSE_ENERGIE'];
    $chambre=$_POST['CHAMBRE'];
    $sdb=$_POST['SDB'];
    $wc=$_POST['WC'];
    $surfacet=$_POST['ST'];
    $surfaceh=$_POST['SH'];
    $idtypebien=$_POST['ID_TYPE_BIEN'];
    $idtypeannonce=$_POST['ID_TYPE_ANNONCE'];

    //===
    if (isset(
        $_POST['SOLD'],
        $_POST['LIB'],
        $_POST['DESCRIPTION'],
        $_POST['PRIX'],
        $_POST['CLASSE_ENERGIE'],
        $_POST['CHAMBRE'],
        $_POST['SDB'],
        $_POST['WC'],
        $_POST['ST'],
        $_POST['SH'],
        $_POST['ID_TYPE_BIEN'],
        $_POST['ID_TYPE_ANNONCE']
        )){
        $query = $pdo->prepare("UPDATE TBL_BIEN SET 
                                                SOLD=?, 
                                                LIB=?, 
                                                DESCRIPTION=?, 
                                                PRIX=?, 
                                                CLASSE_ENERGIE=?, 
                                                CHAMBRE=?, 
                                                SDB=?, 
                                                WC=?, 
                                                ST=?, 
                                                SH=?, 
                                                ID_TYPE_BIEN=?, 
                                                ID_TYPE_ANNONCE=? 
                                                WHERE ID_BIEN=?");
        $query->execute([
            $vendu,
            $lib,
            $description,
            $prix,
            $classe_energie,
            $chambre,
            $sdb,
            $wc,
            $surfacet,
            $surfaceh,
            $idtypebien,
            $idtypeannonce
        ]);
        $success = "Information mise à jour.";
    }
    //$id=$_GET['id'];
    $query=  $pdo->prepare("SELECT * FROM TBL_BIEN WHERE ID_BIEN=?");
    $query->execute([
        $id
       // 'id' => $_GET['id']
    ]);
    $post = $query->fetch();
} catch(PDOException $e) {
    $error = $e->getMessage();
}
$idTypeBien=$post->ID_TYPE_BIEN;
$idTypeAnnonce =$post->ID_TYPE_ANNONCE;
$idUser =$post->ID_USER;
?>

<?php require 'elements/header.php'; require_once 'elements/functions.php'  ?>

<div class="container">
<?php if ($success): ?>
        <div class="alert alert-success"> <?= $success ?> </div>
    <?php endif ?>
    <?php if($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php else: ?>
        <form action="" method="post" class="container">
            <div class="form-group">
            <h5 class="title"> bien numero : <?= $post->ID_BIEN ?> </h5>
            </div>
            <div class="form row justify-content-center">
                <label class="col-2 float-left">Vendu :</label> 
                <input id="boxcheck" type="checkbox" id="scales" name="vendu">
            </div>
            <div id="LIB" class="form row justify-content-center">
                <label class="col-2 float-left">Libelé :</label> 
                <input class="form-control col-5 float-right " name="LIB" type="text" value="<?= htmlentities($post->LIB) ?>">
            </div>
            <div id="DESCRIPTION" class="form row justify-content-center">
                <label class="col-2 float-left">Description :</label> 
                <textarea class="form-control col-5 float-right " name="DESCRIPTION"><?= htmlentities($post->DESCRIPTION) ?> </textarea>
            </div>
            <div id="PRIX" class="form row justify-content-center">
                <label class="col-2 float-left">prix :</label> 
                <input class="form-control col-5 float-right " name="PRIX" type="text" value="<?= number_format(htmlentities($post->PRIX), 2, ',', '.') ?>">
            </div>
            <div id="CLASSE_ENERGIE" class="form row justify-content-center">
                <label class="col-2 float-left">classe énergétique :</label> 
                <input class="form-control col-5 float-right " name="CLASSE_ENERGIE" type="text" value="<?= htmlentities($post->CLASSE_ENERGIE) ?>">
            </div>
            <div id="CHAMBRE" class="form row justify-content-center">
                <label class="col-2 float-left">nombre de chambre :</label> 
                <input class="form-control col-5 float-right " name="CHAMBRE" type="text" value="<?= htmlentities($post->CHAMBRE) ?>">
            </div>
            <div id="SDB" class="form row justify-content-center">
                <label class="col-2 float-left">nombre de SDB :</label> 
                <input class="form-control col-5 float-right " name="SDB" type="text" value="<?= htmlentities($post->SDB) ?>">
            </div>
            <div id="WC" class="form row justify-content-center">
                <label class="col-2 float-left">nombre de toilette :</label> 
                <input class="form-control col-5 float-right " name="WC" type="text" value="<?= htmlentities($post->WC) ?>">
            </div>
            <div id="ST" class="form row justify-content-center">
                <label class="col-2 float-left">Surface du terrain :</label> 
                <input class="form-control col-5 float-right " name="ST" type="text" value="<?= htmlentities($post->ST) ?>">
            </div>
            <div id="SH" class="form row justify-content-center">
                <label class="col-2 float-left">Surface habitable :</label> 
                <input class="form-control col-5 float-right " name="SH" type="text" value="<?= htmlentities($post->SH) ?>">
            </div>
        </form>
                
        

            <button class="btn btn-primary">save</button>

        </form>
    <?php endif ?>
</div>

