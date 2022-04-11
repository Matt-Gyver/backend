<?php

$error = null;

$dsn = 'mysql:dbname=kcni9234_vannestemathieu;host=127.0.0.1';
$user = 'kcni9234_vannestemathieu'; 
$password = 'C[!YyenK?v[8';
$urlImg = "http://fe.digitalinit.net/data/img/";
$pdo = new PDO($dsn, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);


?>