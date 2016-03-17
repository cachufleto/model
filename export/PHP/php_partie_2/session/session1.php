<?php

session_start(); // permet de cr�er un fichier de session ou de l'ouvrir s'il existe d�j�.
// var_dump($_SESSION);

$_SESSION['pseudo'] = 'Mathieu'; // on cr�e dans la session un nouvel indice (pseudo) et lui affecte une valeur.
$_SESSION['mdp'] = 'password';


echo '1 er affichage: <br />';
var_dump($_SESSION);

// echo $_SESSION['pseudo']; // appel d'une information de la session

unset($_SESSION['mdp']); // il est possible de vider une partie de la session.

echo '2 eme affichage: <br />';
var_dump($_SESSION);

// session_destroy(); // suppression de la session. En revanche, le session_destroy() est vu par l'interpr�teur, mais ex�cut� uniquement � la fin du script

echo '3 eme affichage: <br />';
var_dump($_SESSION);




