<?php 
    include("header.php");
    include("mysql.php");
?>

<?php
    $bdd->query("SET NAMES UTF8");
    if (isset($_GET["recherche"])) {
        $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les intrusions html
        $terme = $_GET["terme"];
        $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
        $terme = strip_tags($terme); //pour supprimer les balises html dans la requête
        if (isset($terme)) {
            $terme = strtolower($terme);
            $select_terme = $bdd->prepare("SELECT identite FROM fichage WHERE identite LIKE ?");
            $select_terme->execute(array("%".$terme."%"));
        } else {
            $message = "Vous devez entrer votre requete dans la barre de recherche";
        }
    }

?>

<html>
    <head>
        <meta charset ="utf-8"/>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<script src="https://kit.fontawesome.com/0d56cf9e43.js" crossorigin="anonymous"></script>
        <title>Fichiers</title>
    </head>
    <body>
        <div class="titre">
			<a href="deconnexion.php"><span id="fa-solid fa-xmark" class="btnDeco">&times;</span></a>
			<a href="index.php"><i class="fa-solid fa-house-user"></i></a>
			<p>Bienvenue <?php echo($_SESSION['matricule']." - ".$_SESSION['prenom']." ".$_SESSION['nom']) ?><p>
		</div>
        <div class="contenu">
            <h3>Recherche dans la BDD</h3>
            <div class="zone_form">
                <form method = "get">
                <input type = "search" name = "terme">
                <input type = "submit" name = "recherche" value = "Rechercher">
		    </div>
        </div>
        <hr>
        <div class="contenu">
            <h3><a id="btnPopup" class="btnPopup">Liste des entrées</a></h3>
		    <div id="overlay" class="overlay">
			    <div id="popup" class="popup">
                    <span id="btnClose" class="btnClose">&times;</span>
                    <?php
                        if (isset($select_terme) OR !empty($select_terme)) {
                            $terme_trouve = $select_terme->fetch();
                            if (!empty($terme_trouve)) {
                                echo "<h1>Occurences pour : ".$terme_trouve['identite']."</h1>";

                                echo "<h2><a href='immatriculations.php'>Fichier des Immatriculations</a></h2>";
                                $request = $bdd->prepare("SELECT DISTINCT * FROM immatriculations WHERE identite = ?");
                                $request->execute(array($terme_trouve['identite']));
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
                                echo "</tbody></table></center>";

                                echo "<h2><a href='casier-judiciare.php'>Fichier des Casiers Judiciare</a></h2>";
                                $request = $bdd->prepare("SELECT DISTINCT * FROM casier_judiciare WHERE identite = ?");
                                $request->execute(array($terme_trouve['identite']));
                                $request->setFetchMode(PDO::FETCH_ASSOC);
                                echo "<center><table>
                                        <thead>
                                            <tr>
                                                <th>Auteur</th>
                                                <th>Identité</th>
                                                <th>Infraction</th>
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
                                echo "</tbody></table></center>";

                                echo "<h2><a href='avis-de-recherche.php'>Fichier des Avis de recherche</a></h2>";
                                $request = $bdd->prepare("SELECT DISTINCT * FROM avis_recherche WHERE identite = ?");
                                $request->execute(array($terme_trouve['identite']));
                                $request->setFetchMode(PDO::FETCH_ASSOC);
                                echo "<center><table>
                                        <thead>
                                            <tr>
                                                <th>Auteur</th>
                                                <th>Identité</th>
                                                <th>Motif</th>
                                                <th>Description Physique</th>
                                                <th>Adresse</th>
                                                <th>Précautions</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                                while($row = $request->fetch()){
                                    echo "<tr>
                                            <td>".$row['matricule']."</td>
                                            <td>".$row['identite']."</td>
                                            <td>".$row['motif']."</td>
                                            <td>".$row['physique']."</td>
                                            <td>".$row['adresse']."</td>
                                            <td>".$row['danger']."</td>
                                            <td>".$row['date']."</td>
                                        </tr>";
                                }
                                echo "</tbody></table></center>";
                            } else {
                                echo "<h2>Aucune occurence pour : ".$_GET["terme"]."</h2>";
                            }
                            $select_terme->closeCursor();
                        }
                    ?>
                </div>
            </div>
            <?php
                if (isset($select_terme) OR !empty($select_terme)) {
                    if (!empty($terme_trouve)) {
                        echo "<center><font color='green'>".$terme_trouve['identite']." est connu dans notre base de données.</font></center>";
                    } else {
                        echo "<center><font color='red'>".$_GET["terme"]." est inconnu dans notre base de données.</font></center>";
                    }
                }
            ?>
        </div>
        <script src="assets/popup.js"></script>
    </body>
</html>