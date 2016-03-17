<?php
$mysqli = @new Mysqli("localhost", "root", "", "diwoo10_site");
if($mysqli->connect_error) // connect_error retourne le message d'erreur de conexion mysql
{
	die ("Un probleme est survenu lors de la connexion a la BDD".$mysqli->connect_error);
}
// Jamais de ma vie je ne mettrais un @ pour cacher une erreur sauf si je la gere proprement avec if.

// $mysqli->set_charset("utf-8"); // en cas de souci d'encodage avec l'utf-8

require_once("fonction.inc.php");

session_start();

// déclaration de constante pour la racine site
define("RACINE_SITE", "/php_partie_3/diwoo10_site/");

// déclaration de constante pour la racine serveur
define("RACINE_SERVER", $_SERVER['DOCUMENT_ROOT']);

$msg =""; // déclaration d'une variable qui nous servira à afficher des message à l'utilisateur.








