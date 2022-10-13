<?php 
    include("header.php");
    include("mysql.php");
?>

<html>
    <head>
        <meta charset ="utf-8"/>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<script src="https://kit.fontawesome.com/0d56cf9e43.js" crossorigin="anonymous"></script>
        <title>Fichier des Casiers Judiciare</title>
    </head>
    <body>
        <div class="titre">
			<a href="deconnexion.php"><span id="fa-solid fa-xmark" class="btnDeco">&times;</span></a>
			<a href="index.php"><i class="fa-solid fa-house-user"></i></a>
			<p>Bienvenue <?php echo($_SESSION['matricule']." - ".$_SESSION['prenom']." ".$_SESSION['nom']) ?><p>
		</div>
        <div class="contenu">
            <?php
                if(isset($_POST['valider'])) {  
                    if(session_status() == PHP_SESSION_NONE) {
                        $erreur = "Il faut se connecter !<br> Redirection imminente !<br>";
                        sleep(5);
                        // $matricule = "Centrale";
                        // $erreur ="Merci de vous connecter la prochaine fois !<br>";
                        header("Location: connexion.php");
                    } else {
                        $matricule = $_SESSION['matricule']; 
                    }
                    $identite = htmlspecialchars($_POST['identite']); 
                    $infractions = htmlspecialchars($_POST['infractions']); 
                    if(!empty($matricule) AND !empty($identite) AND !empty($motif)) { 
                        include("verif.php");
                        $reqcasier = $bdd->prepare("INSERT INTO casier_judiciare(matricule, identite, infractions) VALUES(:matricule, :identite, :infractions)");
                        $reqcasier->execute(array( 
                    	    'matricule' => $matricule,
                    	    'identite' => $identite,
                    	    'infractions' => $infractions
                        ));
                        $confir = "L'enregistrement à bien était ajouté !"; 
                    } else {
                        $erreur = "Tous les champs doivent être complétés !";
                    }
                }
            ?>
            <div class="zone_form">
			    <form method="post" action="">
			    	<h3>Ajouter une entrée dans le Casier Judiciare</h3>
			    	<p> 
			    		<input type="text" name="identite" placeholder="Identité de la personne" /><br><br> 
			    		<input type="text" name="infractions" placeholder="Article du code pénal violé" />
			    	</p>
			    	<p>
			    		<input type="submit" name="valider" value="Ajouter l'entrée"> <!-- Bouton de validation du formulaire -->
			    	</p>
			    </form>
			    <?php
			        if(isset($erreur)) {
			    	    echo '<font color="red">'.$erreur."</font>"; //Affichage du message d'erreur si une erreur à était découverte
			        }
			        if(isset($confir)) {
			    	    echo '<font color="green">'.$confir."</font>"; //Message de confirmation
			        }
			        ?>
		    </div>
        </div>
        <hr>
        <div class="contenu">
            <h3><a id="btnPopup" class="btnPopup">Liste des entrées</a></h3>
		    <div id="overlay" class="overlay">
			    <div id="popup" class="popup">
                    <span id="btnClose" class="btnClose">&times;</span>
                    <?php
                        try {
                            $request = $bdd->prepare("SELECT DISTINCT * FROM casier_judiciare");
                            $request->execute();
                            $request->setFetchMode(PDO::FETCH_ASSOC);
                            echo "<center><table>
                                            <thead>
                                                <tr>
                                                    <th>Auteur</th>
                                                    <th>Identité</th>
                                                    <th>Infractions</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
                            while($row = $request->fetch()){
                                echo "<tr>
                                        <td>".$row['matricule']."</td>
                                        <td>".$row['identite']."</td>
                                        <td>".$row['infraction']."</td>
                                        <td>".$row['date']."</td>
                                    </tr>";
                            }
                        }
                    
                        catch(PDOException $e){
                            echo "Erreur : " . $e->getMessage();
                        }
                    ?>
                </div>
            </div>
        </div>
        <script src="assets/popup.js"></script>
    </body>
</html>