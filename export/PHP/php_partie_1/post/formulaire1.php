<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style>
			label {float: left; width: 95px; font-style: italic; color: steelblue;}
			h1 { background-color: steelblue; padding: 10px; color: white;}
			*{ font-family: calibri;}
		</style>
	</head>
	
	<body>
	
	<?php 
		var_dump($_POST);
		
		if(isset($_POST['prenom']) && isset($_POST['description'])) // équivalent à dire if(!empty($_POST)) // si le formulaire a été validé.
		{			
			echo 'Le prénom est: '.$_POST['prenom'] . '<br />';
			echo 'La description est: '.$_POST['description'] . '<br />';
		}
		
		
		
	?>
		<hr />
		<h1>Formulaire</h1>
		<form method="post" action=""><!-- l'attribut method est obligatoire et permet de spécifier la façon dont vont circuler les données. L'attribut action représente l'url cible lors de la validation du formulaire -->
			<label for="prenom">Prénom</label>
			<input type="text" id="prenom" name="prenom" /><br />
			
			<label for="description">Description</label>
			<textarea id="description" name="description"></textarea><br />
			
			<input type="submit" name="envoi" value="Envoi" />
		</form>
	</body>
</html>



