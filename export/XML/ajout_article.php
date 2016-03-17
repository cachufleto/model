<?php

/************************************************/
/* Ajout d'article et génération flux rss       */
/************************************************/

if(!empty($_POST) ){
	//var_dump($_POST);
	if(!empty($_POST['titre']) ){
		$titre = htmlentities($_POST['titre'], ENT_QUOTES);
	}else{
		$errtitre = "Titre manquant";
		$titre ="";
	}
	if(!empty($_POST['description']) ){
		$description = htmlentities($_POST['description'], ENT_QUOTES);
	}else{
		$errdescription = "Description manquante";
		$description ="";
	}
	
	if(!empty($description) && !empty($titre)){
		$date =  date("Y-m-d H-i-s");
		// CONNEXION BASE
		$mysqli = new mysqli('localhost','root','','xml_rss')or die("Oups, ça ne marche pas".$mysqli->connect_error);
		// Requete
		$requete = "INSERT INTO articles VALUES (NULL, '$titre', '$date', '$description' )";
		$mysqli->query($requete);
		$msg_confirm = "Article ajouté";
		
		include('rss.php');
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8" />
		<title>Ajout Article</title>
	</head>
	<body>
		<h1>Ajout article</h1>
		<?php 
			if(isset($msg_confirm)){
				echo '<p style="background-color:green;">'.$msg_confirm.'</p>';
			}
			if(isset($errtitre)){
				echo '<p style="background-color:red;">'.$errtitre.'</p>';
			}
			if(isset($errdescription)){
				echo '<p style="background-color:red;">'.$errdescription.'</p>';
			}
		
		?>
		<form method="post" action="#">
			<label for="titre">Titre</label>
			<input type="text" id="titre" name="titre" />
			<label for="description">Description</label>
			<textarea id="description" name="description"></textarea>
			
			<input type="submit" value="Sauver !" />
		</form>
	
	</body>
<html>