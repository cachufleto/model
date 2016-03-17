<?php
## Ouverture des sessions
session_start();

//déclaration de constante pour la racine site
define("RACINE_SITE", "./");

//déclaration de constante pour la racine serveur
define("RACINE_SERVER", $_SERVER['DOCUMENT_ROOT']);

require_once("parametres.inc.php");

$mysqli = @new mysqli('localhost', 'root', '', 'diwoo10_site');

// Jamais de ma vie je ne metterais un @ pour cacher une erreur sauf si je le gere proprement avec ifx_affected_rows

if($mysqli->connect_error) {
	die("Un probleme est survenu lors de la connexion a la BDD" . $mysqli->connect_error);
}

//$mysqli->set_charset("utf-8"); // en cas de souci d'encodage avec l'utf-8

require_once("fonction.inc.php");


// déclaration d'une variable qui nous servira à afficher des messages à l'utilisateur
$msg = "";
$_debug = array();
