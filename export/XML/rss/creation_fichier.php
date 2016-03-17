<?php

$fichier = 'rss.xml';

$flux = fopen($fichier, 'w+');

fwrite($flux, '<?xml version="1.0"?>
	<rss version="2.0">
		<channel>
			<title> Voici un flux rss </title>
			<link>http://localhost</link>
			<description>Flux rss du site</description>
			<pubDate>'.date('Y-m-d h:m:s').'</pubDate>');
			


while($liste = $rss->fetch_assoc()){
fwrite($flux, '
			<item>
				<title>'.$liste['titre'].'</title>
				<link>http://localhost/article1.php?id='.$liste['id'].'</link>
				<description>'.utf8_encode(str_replace('<', '<![CDATA[ < ]]>', $liste['description'])).'</description>
				<pubDate>'.$liste['date'].'</pubDate>
			</item>');
	
}

fwrite($flux, '
		</channel>
	</rss>');

fclose($flux);

?>