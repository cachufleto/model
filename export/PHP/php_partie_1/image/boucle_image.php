<?php

// EXERCICE
// 1 - prendre 5 images sur le web et les rennomer image1.jpg / image2.jpg / image3.jpg / ...
// 2 - afficher une image avec une ligne html <img />
// 3 - afficher 5 fois l'image 1 avec une seul ligne html (boucle)
// 4 - afficher les 5 images avec toujours une seule ligne html (boucle)

echo '<img src="image1.jpg" width="200"/><hr />';

for($i=1; $i<6;$i++)
{
	echo '<img src="image1.jpg" width="200"/>';
}
echo '<hr />';

for($i=1; $i<6;$i++)
{
	echo '<img src="image'.$i.'.jpg" width="200"/>';
}
// rand();
// la fonction prédéfinie rand() nous renvoi un entier aléatoire compris enttre deux entiers fournis comme arguments
echo '<hr />';
$aleatoire = rand(1, 5);
echo '<img src="image'.$aleatoire.'.jpg" width="200"/><hr />';

$background = rand(100000, 999999);

$couleur = array("a", "b", "c", "d", "e", "f", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
$code_couleur="";
for($i= 0; $i<6; $i++)
{
	$code_couleur .= $couleur[rand(0, 15)];
}	
echo '<style>
	body {background-color: #'.$code_couleur.';}
</style>';
var_dump($couleur );





