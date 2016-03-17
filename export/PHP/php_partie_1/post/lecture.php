<?php

// récupération du contenu d'un fichier externe 

$nom_fichier = "liste.txt";

$fichier = file($nom_fichier); // la fonction file() fait tout le travail, elle retourne chaque ligne d'un fichier à des indices différents d'un tableau ARRAY

var_dump($fichier);


