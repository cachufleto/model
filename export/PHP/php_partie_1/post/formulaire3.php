<?php
	if(isset($_POST['pseudo']) && isset($_POST['email']))
	{
		
		$pseudo = $_POST['pseudo'];
		$email = $_POST['email'];
		
		if(strlen($pseudo) >= 8 && strlen($pseudo) <= 14)
		{
			echo 'Le pseudo est: '. $_POST['pseudo'] . '<br />';
			echo 'L\'email est: '. $_POST['email'] . '<br />';
			
			// inscription des informations dans un fichier txt extérieur.
			
			$f = fopen("liste.txt", 'a'); // fopen() en mode a permet de créer le fichier s'il n'existe pas sinon de l'ouvrir. 
			fwrite($f, $_POST['pseudo'] . ' - ');
			// fwrite() permet d'écrire dans un fichier
			fwrite($f, $_POST['email'] . "\n");
			// "\n" => entre guillemet permet de revenir à la ligne dans un fichier /!\ ce doit être écrit entre ""
			$f = fclose($f); // fclose() n'est pas obligatoire mais nous permet de fermer le fichier et ainsi de libérer de la ressource.			
		}
		else {
			echo '<h1>Erreur de taille sur le pseudo, celui-ci doit contenir entre 8 et 14 caractères !</h1>';
		}	
		
		/* echo 'Le pseudo est: '. $_POST['pseudo'] . '<br />';
		echo 'L\'email est: '. $_POST['email'] . '<br />'; */
	}