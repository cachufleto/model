<?php
$mysqli = new Mysqli("localhost", "root", "", "diwoo10_commentaire");
// Exercice: espace de dialogue.
// - faire un formulaire avec les champs: Pseudo / Message et bouton de validation
// - Récupération et affichage des saisies sur la même page (au dessus du formulaire)
// - insertion des saisies dans la table commentaire(req SQL) now()
// - récupération du contenu de la table commentaire (SELECT) pour les afficher proprement en html
// - affichage des commentaires du plus récent au plus ancien.
// - afficher le nombre de commentaire
// - aficher la date et l'heure au format français
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
		<title>Dialogue</title>
	</head>
	<body>
		<h1>Dialogue</h1>
		<hr />
<?php
if($_POST)
{
	var_dump($_POST);
	$pseudo =  htmlentities($_POST['pseudo'], ENT_QUOTES);
	$message = htmlentities($_POST['message'], ENT_QUOTES);
			
	$req = "INSERT INTO commentaire (pseudo, message, date) VALUES ('$pseudo', '$message', NOW())";
	echo $req;	
	$mysqli->query($req) or die ($mysqli->error);		
	
		
			
}
// récupération du contenu de la table commentaire:	
$resultat = $mysqli->query("SELECT pseudo, message, date_format(date, '%d/%m/%Y') AS date_fr, date_format(date, '%H:%i:%s') AS heure_fr FROM commentaire ORDER BY date DESC");	
?>		
		<hr />
		<form method="post" action="">
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" value="" /><br />
			
			<label for="message">Message</label>
			<textarea id="message" name="message"></textarea>
			<br />
			
			<input type="submit" name="envoyer" value="Envoyer" class="mon_bouton" />
		</form>
		<hr />
<?php
	echo '<fieldset>';
	echo '<legend><h2>'.$resultat->num_rows.' commentaire(s)</h2></legend>';


	while($commentaire = $resultat->fetch_assoc())
	{
		// var_dump($commentaire);
		echo '<div class="message">';
		echo '<div class="titre">Par: '.$commentaire['pseudo'].' Le: '.$commentaire['date_fr'].' à '.$commentaire['heure_fr'].'</div>';

		echo '<div class="contenu">'.$commentaire['message'].'</div>';		
		echo '</div><hr />';
	}
	echo '</fieldset>';
?>		
	</body>

</html>

























