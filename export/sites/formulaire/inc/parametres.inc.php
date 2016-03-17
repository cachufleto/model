<?php
if(!defined('RACINE_SITE')) {
	header('Location:../index.php');
	exit();
}

////////////////////////////
///// BDD //////////////////
////////////////////////////

$SERVEUR_BDD = 'localhost';
$USER = 'root';
$PASS = '';
$BDD = 'diwoo10_site';

////////////////////////////
///// menu de navigation ///
////////////////////////////

$_pages = array(
	''=> array(
		'affiche' => true,
		'item' => 'Project', 
		'titre' => 'Ma Boutique',
		'picto'=>'glyphicon glyphicon-pencil'),
	
	'home'=> array(
		'affiche' => false,
		'item' => 'Home', 
		'titre' => 'Ma Boutique',
		'picto'=>'glyphicon glyphicon-pencil'),
	
	'panier'=> array(
		'affiche' => false,
		'item' => 'Panier', 
		'titre' => 'Mes achats',
		'picto'=>'glyphicon glyphicon-pencil'),
		
	'about'=> array(
		'affiche' => false,
		'item' => 'La boutique', 
		'titre' => 'Qui Sommes Nous?',
		'picto'=>'glyphicon glyphicon-pencil'),
		
	'inscription'=> array(
		'affiche' => false,
		'item' => 'Inscription', 
		'titre' => 'S\'inscrire',
		'picto'=>'glyphicon glyphicon-pencil'),
		
	'profil'=> array(
		'affiche' => false,
		'item' => 'Profil', 
		'titre' => 'Mon Profil',
		'picto'=>'glyphicon glyphicon-pencil'),
		
	'actif'=> array('affiche' => false,
		'item' => 'Connexion'),
		
	'backoffice'=> array(
		'affiche' => false,
		'item' => 'Panneau d\'admin', 
		'titre' => 'ADMIN',
		'picto'=>'glyphicon glyphicon-pencil'),
		
	'admin_boutique'=> array(
		'affiche' => false,
		'item' => 'Boutique', 
		'titre' => 'ADMIN',
		'picto'=>'glyphicon glyphicon-pencil'),
		
	'admin_users'=> array(
		'affiche' => false,
		'item' => 'Membres', 
		'titre' => 'ADMIN',
		'picto'=>'glyphicon glyphicon-pencil'),
		
	'admin_ventes'=> array(
		'affiche' => false,
		'item' => 'Commandes', 
		'titre' => 'ADMIN',
		'picto'=>'glyphicon glyphicon-pencil'),

	'contact'=> array(
		'affiche' => false,
		'item' => 'Contact', 
		'titre' => 'Contactes Nous',
		'picto'=>'glyphicon glyphicon-pencil'),

	'out'=> array(
		'affiche' => false,
		'item' => 'Déconnection'),

	'rss'=> array(
		'affiche' => false,
		'item' => 'RSS')
	);

// Onglets à activer dans le menu de navigation selon le profil
$_reglesAll = array('','home','about','inscription','actif','contact');
$_reglesMembre = array('','home','panier','about','profil','out','contact', 'rss');
$_reglesAdmin = array('profil','backoffice','admin_boutique','admin_users','admin_ventes','contact','out', 'rss');

// page de navigation
$nav = (isset ($_GET['nav']) && !empty($_GET['nav']) && isset ($_pages[ $_GET['nav'] ]))? $_GET['nav'] : 'home';

// orientation ver la page de validation de la connexion
if('actif' == $nav || 'out' == $nav) $nav = 'connection';

// if($_SESSION[])
$_nav = explode("_", $nav);
$__page = (empty($_nav[1]))? 'inc/' . $_nav[0] : $_nav[1] . '/' . $_nav[1];

// valeur min des champs accepté pour les champs limitées
$minLen = 3;