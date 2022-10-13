<?php 
    include("header.php");
    include("mysql.php");
?>

<html>
    <head>
        <meta charset ="utf-8"/>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<script src="https://kit.fontawesome.com/0d56cf9e43.js" crossorigin="anonymous"></script>
        <title>Fichier des Immatriculations</title>
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
                    $plaque = htmlspecialchars($_POST['plaque']); 
                    $proprietaire = htmlspecialchars($_POST['proprietaire']); 
                    $type = htmlspecialchars($_POST['type']); 
                    $modele = htmlspecialchars($_POST['modele']); 
                    $couleur = htmlspecialchars($_POST['couleur']);
                    if(!empty($plaque) AND !empty($proprietaire) AND !empty($type) AND !empty($modele) AND !empty($couleur)) { 
                        $identite = $proprietaire;
                        include("verif.php");
                        $reqverif = $bdd->prepare("SELECT * FROM immatriculations WHERE plaque=?");
                        $reqverif->execute([$plaque]); 
                        $verifplaque = $reqverif->fetch();
                        if ($verifplaque) {
                            $erreur = "Un enregistrement existe déjà pour cette plaque ! <br> Si vous souhaitez mettre à jour la donnée contactez votre technicien !";
                        } else {
                            $reqplaque = $bdd->prepare("INSERT INTO immatriculations(matricule, plaque, identite, type, modele, couleur) VALUES(:matricule, :plaque, :identite, :type, :modele, :couleur)");
                            $reqplaque->execute(array( 
                    	        'matricule' => $matricule,
                    	        'plaque' => $plaque,
                    	        'identite' => $proprietaire,
                    	        'type' => $type,
                    	        'modele' => $modele,
                                'couleur' => $couleur
                            ));
                        $confir = "L'enregistrement à bien était ajouté !"; 
                        } 
                    } else {
                        $erreur = "Tous les champs doivent être complétés !";
                    }
                }
            ?>
            <div class="zone_form">
			    <form method="post" action="">
			    	<h3>Ajouter un enregistrement</h3>
			    	<p> 
			    		<input type="text" name="plaque" placeholder="Plaque du Véhicule" /><br><br> 
			    		<input type="text" name="proprietaire" placeholder="Propriétaire du véhicule" /><br><br> 
			    		<select name="type">
                            <option value="">Meci de choisir une option
                        </option>
                            <option value="Voiture">Voiture</option>
                            <option value="Van">Van</option>
                            <option value="Moto">Moto</option>
                            <option value="Camion">Camion</option>

                        </select>
                        <br><br> 
			    		<input type="text" name="modele" placeholder="Modèle du véhicule" /><br><br> 
			    		<input type="text" name="couleur" placeholder="Couleur du véhicule" /> 
			    	</p>
			    	<p>
			    		<input type="submit" name="valider" value="Ajouter l'enregistrement"> <!-- Bouton de validation du formulaire -->
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
                            $request = $bdd->prepare("SELECT DISTINCT * FROM immatriculations");
                            $request->execute();
                        
                            $request->setFetchMode(PDO::FETCH_ASSOC);
                            echo "<center><table>
                                            <thead>
                                                <tr>
                                                    <th>Auteur</th>
                                                    <th>Propriétaire</th>
                                                    <th>Plaque</th>
                                                    <th>Type</th>
                                                    <th>Modèle</th>
                                                    <th>Couleur</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
                                    while($row = $request->fetch()){
                                        echo "<tr>
                                                <td>".$row['matricule']."</td>
                                                <td>".$row['identite']."</td>
                                                <td>".$row['plaque']."</td>
                                                <td>".$row['type']."</td>
                                                <td>".$row['modele']."</td>
                                                <td>".$row['couleur']."</td>
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