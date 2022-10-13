<?php 
    session_start();
    if (empty($_SESSION['matricule']) OR $_SESSION['access'] == 0) {
        header("Location: connexion.php");
    }
?>