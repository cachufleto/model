<?php

// contexte: souvent sur les sites bancaires, on est déconecté au bout d'un certain laps de temps.
session_start();
echo 'Temps actuel: '.time() . '<br />';

var_dump($_SESSION);

if(isset($_SESSION['temps']))
{
	
	if(time() > $_SESSION['temps']+$_SESSION['limite'])
	{
		session_destroy();
		echo '<h1>déconnexion</h1>';
	}else {
		$_SESSION['temps'] = time();
		echo '<h1>Connexion mise à jour</h1>';
	}
	
}else {
	echo '<h1>Connexion</h1>';
	$_SESSION['temps'] = time(); // on enregistre le temps actuel lors d el'affichage de la page.
	$_SESSION['limite'] = 20; // 20 représente le nombre de secondes limites avant de détruire la session
}



