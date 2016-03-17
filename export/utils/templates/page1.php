<?php
// premi�re page

include('includes/template.class.php');
include('includes/functions.php');
include('includes/config.php');

// on precise le repertoire o� se trouve les fichiers templates et le r�p�rtoire o� on met les fichiers compil�s (cache)
$template = new Template('template', 'cache');

// on precise la variable langage
$template->set_language_var($lang);

page_header('Ma premi�re page', 'Page 1', 'PAGE1');
page_footer();

// exemple liste d'article
$tab = array('Cahiers','Livres','Stylos','Crayons','Feutres','R�gles','Raporteurs','Crayons de couleurs');
foreach($tab as $value)
	$template->assign_block_vars('article', array(
		'TEXT' => htmlentities($value)));

$template->assign_var('U_DOC', "http://area51.phpbb.com/docs/coding-guidelines.html#templating");
				
$template->set_filenames(array(
	'body' => 'page1.html'));

$template->display('body');
?>