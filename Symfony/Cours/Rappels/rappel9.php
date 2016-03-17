<?php

$routes = array(
	'search' => array(
		'fichier' => '/test/titi.php',
		'fonction' => 'index'
	),
	'add' => array(
		'fichier' => '/test/ttoo.php',
		'fonction' => 'modifier'
	),
);

foreach($routes as $action => $route){
	if($_GET['action'] == $action){
		include($route['fichier']);
		$route['fonction']();
	}
}