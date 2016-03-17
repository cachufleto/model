<?php

/************************************************/
/* Création automatique du flux rss grâce à php */
/************************************************/

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
$requete = "SELECT * FROM articles ORDER BY date DESC LIMIT 0,50";
$resultat = $mysqli->query($requete);

// Variable qui va contenir tout mon flux. Je l'initialise avec la partie fixe d'en-tête de flux

$monflux = '<?xml version="1.0"?>
	<rss version="2.0">
		<channel>
			<title> Flux dynamique </title>
			<link>http://www.monsiteperso.fr</link>
			<description>Flux rss du site</description>
			<pubDate>'.date('Y-m-d H:i:s').'</pubDate>';

// MISE EN FORME DES RESULTATS DE REQUETE
while($ligne = $resultat->fetch_assoc()){
	//var_dump($ligne);
	$monflux .="<item>"."\n";
	// Concaténer avec ."\n" permet de créer un retour à la ligne dans le fichier. ce qui le rend plus lisible !
	$monflux .="\t"."<title>".$ligne['titre']."</title>"."\n";
	// Concaténer avec ."\t" permet de créer une tabulation dans le fichier. ce qui le rend encore plus lisible !
	$description = str_replace('<','<![CDATA[ < ]]>',$ligne['description']);
	// str_replace nous permet de remplacer le chevron ouvrant par la section <![CDATA[ < ]]> 
	$monflux .="<description>".$description."</description>"."\n";
	$monflux .="<link>http://www.monsiteperso.fr/articles.php?id=".$ligne['id']."</link>"."\n";
	$monflux .="<pubDate>".$ligne['date']."</pubDate>"."\n";
	$monflux .="</item>"."\n";
}

// On concatène la partie fixe de fin
$monflux .= '</channel></rss>';

// CREER LE FICHIER
$fichier = fopen('rss.xml', 'w+');
fwrite($fichier, $monflux);
fclose($fichier);



?>