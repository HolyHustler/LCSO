<?php 
	include("header.php"); 
?>

<!DOCTYPE html PUBLIC">
<html>
	<head>
		<meta charset ="utf-8"/>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<script src="https://kit.fontawesome.com/0d56cf9e43.js" crossorigin="anonymous"></script>
		<title>Index</title>
	</head>
	<body>
		<div class="titre">
			<a href="deconnexion.php"><span id="fa-solid fa-xmark" class="btnDeco">&times;</span></a>
			<a href="index.php"><i class="fa-solid fa-house-user"></i></a>
			<p>Bienvenue <?php echo($_SESSION['matricule']." - ".$_SESSION['prenom']." ".$_SESSION['nom']) ?><p>
		</div>

		<div class="contenu">
			<ul>
				<li><a href="immatriculations.php">Fichier des Immatriculations</a></li>
				<li><a href="avis-de-recherche.php">Fichier des Avis de Recherche</a></li>
				<li><a href="casier-judiciare.php">Fichier des Casiers Judiciare</a></li>
			</ul>



			<a href="recherche.php">Recherche d'antécédents</a>
		</div>
	</body>
</html>