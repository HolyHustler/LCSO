<?php
    include("mysql.php");

    $reqverif = $bdd->prepare("SELECT identite FROM fichage WHERE identite LIKE ?");
    $reqverif->execute([$identite]); 
    $verifidentite = $reqverif->fetch();
    if (!$verifidentite) {
        $reqfichage = $bdd->prepare("INSERT INTO fichage(identite) VALUES(:identite)");
        $reqfichage->execute(array( 'identite' => $identite));
    }
    unset($reqverif);
    unset($verifidentite);
    unset($reqfichage);
?>