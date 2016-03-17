<?php
// Intertion des parametres de fonctionement
require_once("inc/init.inc.php");


// intertion de l'entête
require_once("inc/header.inc.php");
// insertion menu de navigation
require_once("inc/nav.inc.php");

// insertion des pages dinamiques
if(file_exists($__page.".inc.php") )
	require_once($__page.".inc.php");
else require_once("inc/erreur.inc.php");

// affichage des debug
if(defined('DEBUG')) include_once("inc/debug.inc.php");

// insertion Pied de page
require_once("inc/footer.inc.php");

