<?php

/*************************************************/
/* Création automatique d'un sitemap grâce à php */
/*************************************************/

//On suppose des url de la forme 
// http://www.monsiteperso.fr/articles.php?id=1
// http://www.monsiteperso.fr/articles.php?id=2


// CONNEXION BASE
$mysqli = new mysqli('localhost','root','','xml_rss');
if($mysqli->connect_error){
	die("Oups, ça ne marche pas".$mysqli->connect_error);
	exit;
}
// Force mysql à nous retourner les résultats en utf8
$mysqli->set_charset('utf8');
// REQUETE
$requete = "SELECT * FROM articles LIMIT 0,50000";
$resultat = $mysqli->query($requete);

// Variable qui va contenir tout mon flux. Je l'initialise avec la partie fixe d'en-tête de flux

$monsitemap = '<?xml version="1.0" ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// MISE EN FORME DES RESULTATS DE REQUETE
while($ligne = $resultat->fetch_assoc()){
	$monsitemap .="<url>";
	$monsitemap .="<loc>http://www.example.com/articles.php?id=".$ligne['id']."</loc>";
	$monsitemap .="<lastmod>".$ligne['date']."</lastmod>";
	$monsitemap .="<changefreq>monthly</changefreq>";
	$monsitemap .="<priority>0.5</priority>";
	$monsitemap .="</url>";
}

// On concatène la partie fixe de fin
$monsitemap .= '</urlset>';

// CREER LE FICHIER
$fichier = fopen('sitemap.xml', 'w+');
fwrite($fichier,$monsitemap);
fclose($fichier);



?>