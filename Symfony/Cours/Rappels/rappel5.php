<form action="http://192.168.105.191/mvc/etape1/rappel4.php" method="post">
	<label for="message"/>
	<input type="text" name="message"/>
	<input type="submit" name="Envoyer"/>
</form>

<?php
if(!empty($_POST)){
	var_dump($_POST);
	$_POST;
	echo 'merci de m\'avoir envoyé des données';
	
	
}

?>