<meta charset='Utf-8'>
<?php

//////////////////the mondial database


$file = 'mondial.xml';
$xml = simplexml_load_file($file);

$L = '<br />';
echo $L, 'Il y a '.count($xml->country).' pays';

$popmin = $popmax = $moyen = 0;
$paymin = $paymax = '';
$i = 0;
$pays = array();

foreach($xml->country as $country ){
	
	// on charge les information pour la BDD
	$_pays = array();
	$_pays['population'] = intval($country->population);
	$_pays['name'] = $country->name;
	$_pays['capital'] = capitalCountry($country);
	$_pays['car_code'] = $country['car_code'];
	
	// on charge la variable pays
	$pays[] = $_pays;
	
	// on traite les information particuliéres
	// selection du pays le plus peuplé
	if($_pays['population'] > $popmax){
		$popmax = $_pays['population'];
		$paymax = $_pays;
	}

	// selection du pays le moins peuplé
	if($_pays['population'] < $popmin || $popmin == 0 ){
		$popmin = $_pays['population'];
		$paymin = $_pays;
	}
	
}

echo $L, 'Le Pays le plus peuplé est '.$paymax['name'] ." [".$paymax['car_code']."]".' avec '.$paymax['population'].' habitans. Capital: '.$paymax['capital'];
echo $L, 'Le Pays le moins peuplé est '.$paymin['name'] ." [".$paymin['car_code']."]".' avec '.$paymin['population'].' habitans. Capital: '.$paymin['capital'];



foreach($xml->mountain as $mountain ){
	if(strpos($mountain['country'], 'USA') !== false){
		
	}
}

// affichage du contenue du fichier
echo '<pre>################################################################<br/>';
echo '################################################################<br/>';
print_r($xml);
echo '</pre>';

################################################################################################
################################################################################################
################################################################################################

function capitalCountry($country){
	
	$capital = '';
	foreach($country->city as $city)
		if($city['is_country_cap'] == 'yes')
			$capital = $city->name;

	foreach($country->province as $province)
		foreach($province->city as $city)
			if($city['is_country_cap'] == 'yes')
				$capital = $city->name;

	return $capital;
}




?>