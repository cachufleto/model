<?php
/************************************************/
/*   Manipulation mondial.xml en PHP            */
/************************************************/
$xml = simplexml_load_file('mondial.xml');
// <country car_code="AL">
//     <name>Albania</name>
// </country>

// Accès à un attribut
echo $xml->country[0]['car_code'];
echo '<br/>';
// Accès à un sous-objet
echo $xml->country[0]->name;
echo '<hr/>';
// Afficher la liste des pays du monde et leur nombre
foreach($xml->country as $country){
	echo $country->name;
	echo '<br/>';
}
echo "Il y a ".count($xml->country)." pays dans le fichier.<hr/>";
// Trouver le pays le plus peuplé
$popmax = 0;
$paysmax= '';

foreach($xml->country as $country){
	// Si la population du pays que je parcours est supérieure à la population de référence
	if(intval($country->population) > $popmax){
		// Alors ma population de référence devient la population du pays que je parcours
		$popmax = intval($country->population);
		// Et le pays le plus peuplé devient le pays que je parcours
		$paysmax = $country->name;
	}
}
echo "Le pays le plus peuple est la $paysmax avec $popmax habitants.<hr/>";
// Trouver le pays le moins peuplé
$popmin = $popmax;
$paysmin= '';

foreach($xml->country as $country){
	if(intval($country->population) < $popmin){
		$popmin = intval($country->population);
		$paysmin = $country->name;
	}
}
echo "Le pays le moins peuple sont les $paysmin avec $popmin habitants.<hr/>";

// Connexion à la base
$mysqli = new mysqli('localhost','root','','xml_pays')or die("Oups, ça ne marche pas".$mysqli->connect_error);
// Afficher pour chaque pays : nom, capitale, code_pays, population
foreach($xml->country as $country){
	echo $country->name." ".$country->population." ".$country['car_code']." ";
	// On parcours chaque ville du pays
	foreach($country->city as $city){
		// Si une ville a l'attribut 'is_country_cap'='yes'
		if($city['is_country_cap'] == 'yes'){
			// Alors on affiche le nom de la ville
			echo $city->name;
			$capitale = $city->name;
			break;
		}
	}
	// Pour les 'grands' pays qui sont organisés en régions, il faut d'abord parcourir les régions puis les villes de chaque région
	foreach($country->province as $province){
		foreach($province->city as $city){
			if($city['is_country_cap'] == 'yes'){
				echo $city->name;
				$capitale = $city->name;
				break;
			}
		}
	}
	echo "<br/>";
	// Requête d'insertion
	$nom = $country->name;
	$population = $country->population;
	$codepays = $country['car_code'];
	// On vérifie l'existence du pays en base
	$req_verif_existence = "SELECT * FROM pays WHERE nom='$nom'";
	$resultat = $mysqli->query($req_verif_existence);
	// Si le pays n'existe pas en base
	if($resultat->num_rows == 0){
		// Alors on l'insère
		$requete = "INSERT INTO pays VALUES(NULL,'$nom','$population','$capitale','$codepays')";
		$mysqli->query($requete);
	}
}
echo "<hr/>";

// Insérer ses informations dans une base de données xml_pays
// (structure fournie dans xml_pays.sql sur le réseau)
// Voir ci-dessus î

// Trouver la liste et le nombre des pays membres de l'OTAN
$nbpays = 0;
foreach($xml->country as $country){
	// Si on trouve la chaine 'NATO' dans la valeur de l'attribut 'memberships
	if(strpos($country['memberships'], 'NATO') !== FALSE){
		// Alors on affiche ce pays et on incrémente $nbpays
		echo $country->name."<br/>";
		$nbpays++;
	}
}

echo "Il y a $nbpays pays membres de l'OTAN dans le fichier.<hr/>";

// Trouver la montagne la plus haute des Etats-Unis d'Amérique
$altmax = 0;
$mntmax = "";

foreach($xml->mountain as $mountain){
	if(strpos($mountain['country'], 'USA') !== FALSE){
		if(intval($mountain->height) > $altmax){
			$altmax = intval($mountain->height);
			$mntmax = $mountain->name;
		}
	}
}
echo "Que la montagne $mntmax est belle avec ses $altmax metres !<hr/>";
// Equivalent à 
echo 'Que la montagne '.$mntmax.' est belle avec ses '.$altmax.' metres !<hr/>';


























?>