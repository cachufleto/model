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
	if(isset($_POST['pseudo']) && isset($_POST['email']))
	{
		echo 'Le pseudo est: '. $_POST['pseudo'] . '<br />';
	}
		
		
		
		
	?>
		<hr />
		<h1>Formulaire</h1>
		<form method="post" action="formulaire3.php">
			<label for="pseudo">Pseudo</label>
			<input type="text" id="pseudo" name="pseudo" /><br />
			
			<label for="email">Email</label>
			<input type="text" id="email" name="email" /><br />
			
			<input type="submit" name="ok" value="Ok" />
		</form>
	</body>
</html>



