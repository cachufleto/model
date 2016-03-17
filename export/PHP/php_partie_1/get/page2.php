<h1>PAGE 2</h1>
<a href="page1.php">Page1</a>
<hr />
<?php

// $_GET représente l'url, c'est une superglobale.
// les superglobales sont de type ARRAY
// il est obligatoire de les marquer en majuscule.
// $_POST et $_GET sont toujours existante (si on test avec isset, on aura toujours la réponse true.)

var_dump($_GET);

if(isset($_GET['article'])) // si l'indice article existe dans le tableau ARRAY $_GET
{
	echo 'L\'article est : '.$_GET['article'] . '<br />';
	echo 'La couleur est : '.$_GET['couleur'] . '<br />';
	echo 'Le prix est : '.$_GET['prix'] . '<br />';
}





