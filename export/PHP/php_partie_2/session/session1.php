<?php

session_start(); // permet de créer un fichier de session ou de l'ouvrir s'il existe déjà.
// var_dump($_SESSION);

$_SESSION['pseudo'] = 'Mathieu'; // on crée dans la session un nouvel indice (pseudo) et lui affecte une valeur.
$_SESSION['mdp'] = 'password';


echo '1 er affichage: <br />';
var_dump($_SESSION);

// echo $_SESSION['pseudo']; // appel d'une information de la session

unset($_SESSION['mdp']); // il est possible de vider une partie de la session.

echo '2 eme affichage: <br />';
var_dump($_SESSION);

// session_destroy(); // suppression de la session. En revanche, le session_destroy() est vu par l'interpréteur, mais exécuté uniquement à la fin du script

echo '3 eme affichage: <br />';
var_dump($_SESSION);




