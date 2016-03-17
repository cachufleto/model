<?php
	$requete = "SELECT * FROM article"; 

	$mysqli = new mysqli('192.168.105.225', 'sami', '123456', 'blablog');
	
	$resultats = $mysqli->query($requete);
	
	
	while($ligne=$resultats->fetch_assoc()){
		
		var_dump($ligne);
	}
?>