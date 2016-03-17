<?php
//

// Création d'une nouvelle ressource cURL
$curl = curl_init();

// Configuration de l'URL et d'autres options
curl_setopt($curl, CURLOPT_URL, 'http://rss.lemonde.fr/c/205/f/3050/index.rss');
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Récupération de l'URL et enregistrement du code dans la variable $result
$result = curl_exec($curl);

// Fermeture de la session cURL
curl_close($curl);

// Transformation du Code XML en objet PHP
$mon_objet = simplexml_load_string($result); 

// Affichage de l'objet PHP
echo '<pre>';
  var_dump($mon_objet);
echo '</pre>';



// Création d'une nouvelle ressource cURL
$curl = curl_init();

// Configuration de l'URL et d'autres options
curl_setopt($curl, CURLOPT_URL, 'http://rss.lefigaro.fr/lefigaro/laune?format=xml');
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Récupération de l'URL et enregistrement du code dans la variable $result
$result = curl_exec($curl);

// Fermeture de la session cURL
curl_close($curl);

// Transformation du Code XML en objet PHP
$mon_objet = simplexml_load_string($result); 

// Affichage de l'objet PHP
echo '<pre>';
  var_dump($mon_objet);
echo '</pre>';

?>