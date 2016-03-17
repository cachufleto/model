<?php

// Création de fichier en php

// On ouvre un fichier en lecture écriture
$fichier = fopen('toto.txt','w+');

// On écrit dans le fichier
fwrite($fichier, "j'ai faim");
// fputs($fichier, "j'ai faim"); 
// fputs est un alias de fwrite ;

// On ferme le fichier
fclose($fichier);



?>