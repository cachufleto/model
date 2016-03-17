<?php
// page d'accueil

include('includes/template.class.php');
include('includes/functions.php');
include('includes/config.php');

// on precise le repertoire o� se trouve les fichiers templates et le r�p�rtoire o� on met les fichiers compil�s (cache)
$template = new Template('template', 'cache');

// on precise la variable langage
$template->set_language_var($lang);

page_header('Ma page d\'accueil', 'Accueil', 'HOME');
page_footer();

$template->set_filenames(array(
	'body' => 'accueil.html'));

$template->display('body');
?>