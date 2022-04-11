<?php

require 'model/Pays.php';

$pays = new Pays("BE","Belgique");

var_dump($pays);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>TEST</p>
    <p><? echo ($pays->getcde()) ?></p>

    <p>FIN</p>
</body>
</html>