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
    $prix=$_POST['PRIX'];
    $description=$_POST['DESCRIPTION'];

    //===
    if (isset($_POST['DESCRIPTION'],
                $_POST['PRIX'])){
        $query = $pdo->prepare("UPDATE TBL_BIEN SET PRIX=?, DESCRIPTION=? WHERE ID_BIEN=?");
        $query->execute([
            $prix,
            $description,
            $id
            
           // 'id' => $_GET['id']
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
?>

<?php require 'elements/header.php'  ?>

<div class="container">
<?php if ($success): ?>
        <div class="alert alert-success"> <?= $success ?> </div>
    <?php endif ?>
    <?php if($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php else: ?>
        <form action="" method="post">
            <div class="form-group">
            <h5 class="title"> bien numero : <?= $post->ID_BIEN ?> </h5>
                <input type="text" class="form-control" name="PRIX" value="<?= htmlentities($post->PRIX) ?>">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="DESCRIPTION"><?= htmlentities($post->DESCRIPTION) ?> </textarea>
            </div>

            <button class="btn btn-primary">save</button>
            

        </form>
    <?php endif ?>
</div>

<?php require 'elements/footer.php'  ?>