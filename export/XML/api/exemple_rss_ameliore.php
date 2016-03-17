<?php
//Fonction qui fournit un objet à partir d'un flux rss
function get_rss_feed_object($url){
  
  // Création d'une nouvelle ressource cURL
  $curl = curl_init();

  // Configuration de l'URL et d'autres options
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  // Récupération de l'URL et enregistrement du code dans la variable $result
  $result = curl_exec($curl);

  // Fermeture de la session cURL
  curl_close($curl);

  // Transformation du Code XML en objet PHP
  $objet_correspondant_au_flux = simplexml_load_string($result); 

  // Affichage de l'objet PHP
  return $objet_correspondant_au_flux;
}

$lemonde = get_rss_feed_object('http://rss.lemonde.fr/c/205/f/3050/index.rss');
$lefigaro = get_rss_feed_object('http://rss.lefigaro.fr/lefigaro/laune?format=xml');
$leparisien = get_rss_feed_object('http://www.leparisien.fr/une/rss.xml');
$liberation = get_rss_feed_object('http://liberation.fr.feedsportal.com/c/32268/fe.ed/rss.liberation.fr/rss/latest/');


  

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Demain à la une</title>
</head>
<body>
  <table>
    <tr>
      <td><h1>Le Monde</h1><?php 
        echo '<h2>' . $lemonde->channel->item[0]->title . '</h2>';
        echo '<p>' . $lemonde->channel->item[0]->description . '</p>';
        echo '<p><i>' . $lemonde->channel->item[0]->pubdate . '</i></p>';
      ?></td>
      <td><h1>Le Figaro</h1><?php 
        echo '<h2>' . $lefigaro->channel->item[0]->title . '</h2>';
        echo '<p>' . $lefigaro->channel->item[0]->description . '</p>';
        echo '<p><i>' . $lefigaro->channel->item[0]->pubdate . '</i></p>';
      ?></td>
      <td><h1>Le Parisien</h1><?php 
        echo '<h2>' . $leparisien->channel->item[0]->title . '</h2>';
        echo '<p>' . $leparisien->channel->item[0]->description . '</p>';
        echo '<p><i>' . $leparisien->channel->item[0]->pubdate . '</i></p>';
      ?></td>
      <td><h1>Libération</h1><?php 
        echo '<h2>' . $liberation->channel->item[0]->title . '</h2>';
        echo '<p>' . $liberation->channel->item[0]->description . '</p>';
        echo '<p><i>' . $liberation->channel->item[0]->pubdate . '</i></p>';
      ?></td>
    </tr>
  <table>
</body>
</html>