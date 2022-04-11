<?php

function isconnected():bool {
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    return !empty($_SESSION['connected']);
}

function user_connected():void {
    // limiter l'acces a un utilisateur pas connecte : 
    if (!isconnected()){
        header('Location: ./login.php');
        exit();
    }
// ----
}

?>