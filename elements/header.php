<?php
require_once 'functions.php';
?>
<!DOCTYPE html> 
<html lang="fr">
    <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
            <link rel="shortcut icon" href="#">

            <title>
                <?php if (isset($title)): ?>
                    <?=  $title ?>
                <?php else : ?>
                    TITLE MISSING
                <?php endif ?>
            
            </title>
    </head>

