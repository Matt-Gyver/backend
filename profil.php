<?php
$user = null;
// déconnexion de l'utilisateur (voir bouton)
if (!empty($_GET['action']) && $_GET['action'] === 'logout') {
    // on vide le cookie de l'utilisateur
    unset($_COOKIE['user']);
    // on detruit le cookie de session avec une date dans le passée
    setcookie('user', '',time()-10);
    header("localtion: ./index.php");
}

// si l'utilisateur existe on sauvegarde la variable 
if (!empty($_COOKIE['user'])){
    $user = $_COOKIE['user']; 
}

// si $_post[login] est vide, on crée un cookie
if(!empty($_POST['login'])) {
    setcookie('user', $_POST['login']);
    $login = $_POST['login'];
    $_COOKIE['login']=$_POST['login'];
}
require 'elements/header.php';
?>

<?php if ($user): ?>
    <h1>Bonjour <?= htmlentities($user) ?> </h1>
    <a href="profil.php?action=logout">log out</a>
<?php else: ?>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="login" placeholder="entrer votre login">
        </div>
        <button class="btn btn-primary">connexion</button>
    </form>
<?php endif; ?>



<?php require 'elements/footer.php'; ?>

