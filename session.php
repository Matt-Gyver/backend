<?php
session_start();
$_SESSION['role'] = 'administrateur';
$title = "session";
require 'elements/header.php';
?>



<?php require 'elements/footer.php' ?>