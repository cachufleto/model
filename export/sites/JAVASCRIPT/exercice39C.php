<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>JavaScript : Exercice 39</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type="text/javascript" src="jquery-1.12.0.js"></script> 
		<script type="text/javascript"> 
			//Enoncé :
			// librairie Jquery
			//Créer un formulaire
			//Quand je soumets le formulaire, si le champ de saisie du formulaire n'est pas renseigné, empêcher que le formulaire soit transmis et afficher un message d'erreur sous le formulaire.
			//Utiliser la fonction jQuery et ses méthodes : ready(), submit() et event.preventDefault(), val(), html()
			
			$(document).ready(function(){
				
				$("#form").submit(
					function(event) {
					if($("input:first").val() == "test" ) {
						return true;
					}
					event.preventDefault();
				});
			});
		</script>
	</head>
	<body>
		<h1 id="titre" style="margin-left:0px; opacity:0.1; font-size:1em">jQuery Formulaire</h1>
		<form id="form" action="#" method="POST">
			<input id="text" type="text" name="text" value="">
			<input id="submit" type="submit" name="button" value="Valider">
		</form>
		<noscript>
			<p>Veuillez activer JavaScript</p>
		</noscript>
<?php 
if($_POST) var_dump($_POST);
?>
		</body>
</html>