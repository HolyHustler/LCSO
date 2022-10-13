<?php   
    session_start(); 
    unset($_SESSION['id']); 
    unset($_SESSION['access']); 
    unset($_SESSION['matricule']); 
    unset($_SESSION['nom']); 
    unset($_SESSION['prenom']); 
    unset($_SESSION['service']);
    
    session_destroy(); 
    header("Location: connexion.php"); 
    exit();
?>