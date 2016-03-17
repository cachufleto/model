<?php
if(isset($_GET['langue'])) // si $_GET['langue'] existe alors l'utilisateur a cliqué sur un des liens.
{
	$langue = $_GET['langue']; // dans ce cas on récupère cete valeur.
}
elseif(isset($_COOKIE['langue'])) // si un cookie a déjà été généré.
{
	$langue = $_COOKIE['langue']; // alors on récupère sa valeur.
} 
else {
	$langue = 'fr'; // cas par défaut // l'utilisateur vient d'arriver pour la première fois sur le site.
}

$un_an = 365*24*3600; // 365jours*24heures*3600secondes
setCookie("langue", $langue, time()+$un_an); 
// 3 arguments => le nom du cookie, son contenu, sa durée de vie.
// pour supprimer un cookie, il faut mettre une durée de vie prérimée. Par exemple "time()-1"
// cette fonction doit être exécutée obligatoirement avant le moindre affichage dans la page.

// var_dump($_COOKIE);

// echo time(); // pour afficher le timestamp // nombre de seconde depuis le 1 er janvier 1970
// faire 4 liens qui pointent sur la même page pour un choix de langue:
// - français
// - espagnol
// - anglais
// - italien

?>
<meta charset="utf-8" />
<ul>
	<li><a href="?langue=fr">français</a></li>
	<li><a href="?langue=es">espagnol</a></li>
	<li><a href="?langue=en">anglais</a></li>
	<li><a href="?langue=it">italien</a></li>
</ul>
<?php

// var_dump($_SERVER);
echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) . '<br />';
// il est possible de détecter la langue du navigateur de l'internaute via la superglobale $_SERVER // ne pas hésiter à faire un var_dump pour voir le contenu.




switch($langue)
{
	case 'fr': echo '<h2>Vous visitez actuellement le site en français.</h2>';
	break;
	case 'es': echo '<h2>Vous visitez actuellement le site en espagnol.</h2>';
	break;
	case 'it': echo '<h2>Vous visitez actuellement le site en italien.</h2>';
	break;
	case 'en': echo '<h2>Vous visitez actuellement le site en anglais.</h2>';
	break;
	default: echo '<h2>La langue demandée n\'est pas disponible !</h2>';
	break;
}








