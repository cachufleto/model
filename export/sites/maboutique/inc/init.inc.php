<?php

if($_SERVER['HTTP_HOST'] == 'domoquick.fr'){
$_HOST = "rdbms";
$_USER = "U2407285"; 
$_MDP = "20Seajar!"; 
$_BDD = "DB2407285";
} else {
$_HOST = "localhost";
$_USER = "root"; 
$_MDP = ""; 
$_BDD = "diwoo10_site";
}

$mysqli = @new Mysqli($_HOST, $_USER, $_MDP, $_BDD);
if($mysqli->connect_error) // connect_error retourne le message d'erreur de conexion mysql
{
	die ("Un probleme est survenu lors de la connexion a la BDD".$mysqli->connect_error);
}
// Jamais de ma vie je ne mettrais un @ pour cacher une erreur sauf si je la gere proprement avec if.

// $mysqli->set_charset("utf-8"); // en cas de souci d'encodage avec l'utf-8

require_once("fonction.inc.php");

session_start();

//déclaration de constante pour la racine serveur
define("RACINE_SERVER", str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']));

//déclaration de constante pour la racine site
$dir = explode('/', RACINE_SERVER);
$_indice = (empty($dir[count($dir)-1]))? $dir[count($dir)-2] : $dir[count($dir)-1];
$dossier = explode($_indice, __DIR__);
$dossier = str_replace('/inc', '/', str_replace('\\', '/', $dossier[1])); // pour les serveurs WINDOWS
define("RACINE_SITE", str_replace('/fr/', '/', str_replace('//', '/', $dossier)));
define("RACINE_ADMIN", RACINE_SITE.'admin/');
define("RACINE_PHOTO", RACINE_SITE.'photo/');

$msg =""; // déclaration d'une variable qui nous servira à afficher des message à l'utilisateur.








