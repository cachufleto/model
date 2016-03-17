<?php
// Exercice faire un formulaire avec une liste select qui propose les fruits disponibles, un champs type text pour recevoir un poids + bouton de validation.
// ensuite afficher au dessus du formulaire les informations obtenu lors de la validation du formulaire.
// ensuite passer ces informations dans la fonction calcul afin d'avoir le résultat.
// dernière chose, afficher par défaut la dernière saisie de l'utilisateur dans le formulaire.
include("fonction.inc.php");



?>
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
if($_POST) // if(!empty($_POST)) // si le formulaire a été validé
{
	var_dump($_POST);
	if(isset($_POST['poids']) && isset($_POST['fruits']))
	{
		/* $poids = $_POST['poids']; */
		echo calcul($_POST['fruits'], $_POST['poids'] );
		
	}
	
	
	
	
}

?>
		<hr />
		<h1>Formulaire</h1>
		<form method="post" action="">
		
			<label for="fruits">Fruits</label>
			<select name="fruits" id="fruits">
				<option>cerises</option>
				<option <?php if(isset($_POST['fruits']) && $_POST['fruits'] == 'pommes') { echo 'selected'; } ?> >pommes</option>
				<option <?php if(isset($_POST['fruits']) && $_POST['fruits'] == 'papayes') { echo 'selected'; } ?> >papayes</option>
				<option <?php if(isset($_POST['fruits']) && $_POST['fruits'] == 'bananes') { echo 'selected'; } ?> >bananes</option>
			</select><br />
			
			<label for="poids">Poids</label>
			<input type="text" id="poids" name="poids" value="<?php if(isset($_POST['poids'])) { echo $_POST['poids']; } ?>" /><br />
			
			<input type="submit" name="envoi" value="Envoi" />
		</form>
	</body>
</html>
















