<?php
include("header.php");
include("mysql.php");

if(isset($_POST['valider'])) {
	$matricule = htmlspecialchars($_POST['matricule']);  
	$password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
	
	if(!empty($matricule) AND !empty($password)) { 
    	$requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE matricule = ?");
    	$requser->execute(array($matricule));
    	$userexist = $requser->rowCount();
    	if(!$userexist == 1) {   
            $reqinscription = $bdd->prepare("INSERT INTO utilisateurs(matricule, password) VALUES(:matricule, :password)");
            $reqinscription->execute(array( 
                'matricule' => $matricule,
                'password' => $password
            ));
            $confir = "L'enregistrement à bien était ajouté !";
		} else {
			$erreur = "Un utilisateur existe déjà avec ce matricule !";
		}
	} else {
    	$erreur = "Tous les champs doivent être complétés !";
	}
}
?>

<!DOCTYPE html PUBLIC">
<html >
<head>
	<meta charset ="utf-8"/>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<script src="https://kit.fontawesome.com/0d56cf9e43.js" crossorigin="anonymous"></script>
	<title>Authentification</title>
</head>
	<body>
		<div class="titre">
			<i class="fa fa-refresh fa-spin  fa-fw" aria-hidden="true"></i>
			<a href="deconnexion.php"><span id="fa-solid fa-xmark" class="btnDeco">&times;</span></a>
			<a href="index.php"><i class="fa-solid fa-house-user"></i></a>
			<p>Authentification<p>
		</div>

		<div class="contenu">
			<div class="zone_form">
				<h3>Authentification</h3>
				<form method="post" action="">
					<p> 
						<input type="text" name="matricule" placeholder="Matricule" /><br><br>
						<input type="password" name="password" placeholder="Mot de passe" />
					</p>
					<p>
						<input type="submit" name="valider" value="Connexion">
					</p>
				</form>
				<?php
         			if(isset($erreur)) {
            			echo '<font color="red">'.$erreur."</font>";
         			}
         		?>
			</div>
		</div>
	</body>
</html>