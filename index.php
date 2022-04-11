<?php
$loginerror = null;
if(!empty($_POST['email']) && !empty($_POST['password'])){
    // query to catch object user 
    if ($_POST['email'] === 'test' && $_POST['password'] === 'test'){

    // redirect to immo.php
    session_start();
    $_SESSION['connected'] = 1;
    header('Location: immo.php');
    exit();
    } else {
        $loginerror = "login / password incorrect.";
    }
}

require 'elements/auth.php';
if (isconnected() ) {
    header('Location: immo.php');
    exit();
}
require 'elements/header.php';

?>

<?php if ($loginerror):  ?>
<div class="alert alert-danger">
    <?= $loginerror ?>
</div>
<?php endif; ?>

<div class="container">
    <div class="col-4">
    <form action="" class="action" method="post">
        <div class="form-group">
            <input class="form-control" type="text" name="email" placeholder="entrez votre login/email">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="entrez votre mot de passe">
        </div>
        <button type="submit" class="btin btn-primary" >se connecter </button>
    </form>
    </div>
</div>
<?php require 'elements/footer.php'; ?>