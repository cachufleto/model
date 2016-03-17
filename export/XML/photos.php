<?php

/************************************************/
/*   Manipulation XML en PHP                    */
/************************************************/

$xml = simplexml_load_file('photos.xml');

// echo '<pre>';
// print_r($xml);
// echo '</pre>';

echo $xml->auteur[0]['name'];
echo '<br/>';
echo $xml->auteur[1]->photo[0]['uri'];

echo "<br/><br/>BOUCLE FOREACH <br/><br/>";

foreach($xml->auteur as $auteur ){
	echo $auteur['name'];
	echo '<br/>';
	foreach($auteur->photo as $photo){
		echo $photo['uri'];
		echo '<img src="'.utf8_decode($photo['uri']).'" alt="Image" />';
		// La fonction utf8_encode() permet d'encoder une chaine de caractères en utf8
		echo '<br/>';	
	}
}

echo "<br/><br/>BOUCLE FOR <br/><br/>";

for($i = 0 ; $i < count($xml->auteur); $i++){
	echo $xml->auteur[$i]['name'];
	echo '<br/>';
	for($j = 0 ; $j < count($xml->auteur[$i]->photo) ; $j++){
		echo $xml->auteur[$i]->photo[$j]['uri'];
		echo '<br/>';
	}
}


?>