<?php

$file = 'photos.xml';
$xml = simplexml_load_file($file);
/*
SimpleXMLElement Object
(
    [auteur] => Array
        (
            [0] => SimpleXMLElement Object
                (
                    [@attributes] => Array
                        (
                            [id] => 15
                            [name] => Jerem
                        )
                    [country] => 
			FRANCE
                    [photo] => Array
                        (
                            [0] => SimpleXMLElement Object
                                (
                                    [@attributes] => Array
                                        (
                                            [num] => 1522
                                            [cat] => china
                                            [uri] => photos/Collines.jpg
                                        )
                                )
                            [1] => SimpleXMLElement Object
                                (
                                    [@attributes] => Array
                                        (
                                            [num] => 1111
                                            [cat] => china
                                            [uri] => photos/Coucher_de_soleil.jpg
                                        )
                                )
                            [2] => SimpleXMLElement Object
                                (
                                    [@attributes] => Array
                                        (
                                            [num] => 152
                                            [cat] => abstract
                                            [uri] => photos/Hiver.jpg
                                        )
                                )
                        )
                )
            [1] => SimpleXMLElement Object
                (
                    [@attributes] => Array
                        (
                            [id] => 24
                            [name] => Abstract Girl
                        )
                    [photo] => SimpleXMLElement Object
                        (
                            [@attributes] => Array
                                (
                                    [num] => 450121
                                    [cat] => abstract
                                    [uri] => photos/NÃ©nuphars.jpg
                                )
                        )
                )
        )
)*/

/*
DANS LE XML
<photos>
	<auteur id='15' name='Jerem' > 

EN PHP

SimpleXMLElement Object
(
    [auteur] => Array
        (
            [0] => SimpleXMLElement Object
                (
                    [@attributes] => Array
                        (
========================>    [name] => Jerem
                        )
*/
echo '<h3>Attributs</h3>';
echo '<h4>name de auteur</h4>';
echo '$xml->auteur[1][\'name\']<br>';

echo $xml->auteur[1]['name'];
/*
DANS LE XML
<photos>
	<auteur id='15' name='Jerem' > 
		<photo num='1522' cat='china' uri='photos/Collines.jpg' />

EN PHP
SimpleXMLElement Object
(
    [auteur] => Array
        (
            [0] => SimpleXMLElement Object
                (
                    [@attributes] => Array
                        ( )
                    [photo] => Array
                        (
                            [0] => SimpleXMLElement Object
                                (
                                    [@attributes] => Array
                                        (
========================================>	[uri] => photos/Collines.jpg
                                        )
*/
// Utf-8 peut ce définir au niveau du navigateur, de la balise meta
// utf8_encode ou utf8_decode ou html_entity_decode s'impose autrement
echo '<h4>uri de photo de auteur</h4>';
echo 'utf8_decode($xml->auteur[0]->photo[0][\'uri\'])<br/>';
echo utf8_decode($xml->auteur[0]->photo[0]['uri']);

// il est possible de faire des boucles sur les tableau
echo '<h3>Boucle sur les attributs</h3>';
echo '<h4>photo de auteur</h4>';
echo 'foreach $xml->auteur[0]->photo<br/>';
$i=0;
foreach($xml->auteur[0]->photo as $attribut => $info){
	$i++;
	echo '<br />----------------------------------------------------------'.'<br/>'.$i.' / '.$attribut;
	echo '<br />'.$info['uri'];
	echo '<pre>';
	print_r($info);
	echo '</pre>';
}

// acces sur le comptenue d'une balise
echo '<h3>Comptenu d\'une balise</h3>';
echo '<h4>country de auteur</h4>';
echo 'utf8_decode($xml->auteur[0]->country)<br/>';
echo utf8_decode($xml->auteur[0]->country);





// affichage du contenue du fichier
echo '<pre>**************************************************************<br/>';
print_r($xml);
echo '</pre>';

?>