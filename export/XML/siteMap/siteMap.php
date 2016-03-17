<?php

// sitemaps.org

// sitemaps generator
// webRankInfo robots.txt

/*

<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

   <url>

      <loc>http://www.example.com/</loc>

      <lastmod>2005-01-01</lastmod>

      <changefreq>monthly</changefreq>

      <priority>0.8</priority>

   </url>

</urlset> 

*/

##################################################
## Cr�ation automatique du flux rss gr�ce � php ##
##################################################

$mysqli = new mysqli('localhost', 'root', '', 'diwoo10_site');
$mysqli->set_charset('utf8');
$link = 'http://localhost/domoquick/PHP/php_partie_3/maboutique/fiche_article.php?id_article=';

$sql = "select id_article as id, titre, description from article ORDER BY stock DESC LIMIT 0,5 ";
$rss = $mysqli->query($sql) or die ($mysqli->error);

// variable du comptenue
$monflux = '';
// int�gration des items dans le squelet
$monflux .= "<?xml version=\"1.0\" encoding=\"utf-8\"?>"."\n";
$monflux .= "<rss version=\"2.0\">"."\n";
$monflux .= "<channel>"."\n";
$monflux .= "\t"."<title> Voici un flux rss </title>"."\n";
$monflux .= "\t"."<link>http://localhost</link>"."\n";
$monflux .= "\t"."<description>Flux rss du site</description>"."\n";
$monflux .= "\t"."<pubDate>".date('Y-m-d h:m:s')."</pubDate>"."\n";
// preparation des items
while($liste = $rss->fetch_assoc()){
	
	$description = str_replace('<', '[<]', $liste['description']);
	$description = str_replace('>', '[ > ]', $description);
	$description = str_replace('[<]', '<![CDATA[ < ]]>', $description);
	$description = str_replace('[ > ]', '<![CDATA[ > ]]>', $description);
	
	$monflux .= "\t"."<item>"."\n";
	$monflux .= "\t"."\t"."<title>".html_entity_decode($liste['titre'])."</title>"."\n";
	$monflux .= "\t"."\t"."<link>".$link.$liste['id']."</link>"."\n";
	$monflux .= "\t"."\t"."<description>".utf8_encode($description)."</description>"."\n";
	$monflux .= "\t"."\t"."<pubDate>".date('Y-m-d h:m:s')."</pubDate>"."\n";
	$monflux .= "\t"."</item>"."\n";
}
$monflux .= "</channel>"."\n";
$monflux .= "</rss>"."\n";

// �criture du fichier xml
$fichier = 'rss.xml';
$flux = fopen($fichier, 'w+');
fwrite($flux, $monflux);
fclose($flux);

header("Location:$fichier");

?>