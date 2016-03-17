<?php
	$mysqli = new Mysqli("localhost", "root", "", "identification") or die ("Erreur lors de la connexion à la BDD");
	
	echo '<meta charset="utf-8" />';
	
	if(isset($_POST['pseudo']) && isset($_POST['mdp'])) // équivalent if(!empty($_POST))
	{
		echo 'Le pseudo est: '.$_POST['pseudo'] . '<br />';
		echo 'Le Mot de passe est: '.$_POST['mdp'] . '<hr />';
		
/* 		foreach ($_POST AS $indice => $valeur)
		{
			$_POST[$indice] = htmlentities($_POST[$indice], ENT_QUOTES);
		} */
		
		
		extract($_POST); // extract()  est une fonction prédéfinie qui ne marche que sur les tableaux ARRAY. Cette fonction créée une variable pour chaque indice du tableau qui contient la valeur correspondante. /!\ ne marche que si les indices sont de type chaine de caractères (une variable ne peut pas commencer par un chiffre !)
		echo $pseudo . ' - ' . $mdp . '<hr />';
		
		$le_pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES);
		$le_mdp = htmlentities($_POST['mdp'], ENT_QUOTES);
		
		$req = "SELECT * FROM utilisateur WHERE pseudo = '$le_pseudo' AND mdp = '$le_mdp'";
		
		echo $req . '<hr />'; // affichage de la requete pour voir les erreurs venant des injections.
		
		$membre = $mysqli->query($req);
		$utilisateur = $membre->fetch_assoc();
		
		if(!empty($utilisateur)) // si $utilisateur n'est pas vide alors j'ai bien récupéré ses informations => le pseudo et le mdp sont corrects
		{
			echo '<h1>CONNEXION OK !</h1>';
			echo 'id_utilisateur: '.$utilisateur['id_utilisateur'] . '<br />';
			echo 'Pseudo: '.$utilisateur['pseudo'] . '<br />';
			echo 'Mot de passe: '.$utilisateur['mdp'] . '<br />';
			echo 'Nom: '.$utilisateur['nom'] . '<br />';
			echo 'Prénom: '.$utilisateur['prenom'] . '<br />';
			echo 'Email: '.$utilisateur['email'] . '<hr />';
		}else {
			echo '<h1>ERREUR D\'IDENTIFICATION</h1>';
		}
		
		
	}
	
?>
<hr />

<form method="post" action="">
<fieldset>
<legend>Identification</legend>
	<label for="pseudo">Pseudo</label><br />
	<input type="text" name="pseudo" id="pseudo" value="" /><br />
	
	<label for="mdp">Mdp</label><br />
	<input type="text" name="mdp" id="mdp" value="" /><br />
	
	<input type="submit" name="valider" id="valider" value="Valider" />
</fieldset>
</form>
&copy;



