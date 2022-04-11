<?php
require_once 'functions.php';
?>
<!DOCTYPE html> 
<html lang="fr">
    <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
<body>
<header class="sticky-top">
        <nav id="navbar" class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <div class="container">
                <div  class="row">
                    <div class="collapse navbar-collapse">
                        <div class ="container row mx-auto">
                            <ul class="navbar-nav mr-auto">
                                <?php nav_item('./index.php','Login'); ?>
                                <?php nav_item('./inscription.php','Inscription'); ?>
                                <?php nav_item('./immo.php','Immo'); ?>
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>
        </nav>
</header>
