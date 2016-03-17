<?php

// FONCTION DIVERS

function debug($var, $mode = 1)
{
	echo '<div class="col-md-12">';
	if($mode === 1)
	{
		echo '<pre>'; var_dump($var); echo '</pre>';
	}
	else {
		echo '<pre>'; print_r($var); echo '</pre>';
	}
	echo '</div>';
	return;
}

// FONCTION POUR FAIRE DES REQUETES EN BDD


function executeRequete($req) // on doit fournir en argument la requete à exécuter.
{
	global $mysqli; // on précise de récupérer la variable $mysqli (qui représente la connexion à la BDD) depuis l'espace global (voir dans init.inc.php)
	$resultat = $mysqli->query($req); // on exécute la requete reçue en argument.
	
	if(!$resultat) // si cela renvoi false, c'est qu'il y a une erreur sur la requete
	{
		die ("Erreur sur la requete SQL<br /> <b>Message: </b>" . $mysqli->error . "<br /> Requete: ". $req);
	}
	return $resultat;
	
}

// FONCTION MEMBRE

function utilisateurEstConnecte()
{
	if(!isset($_SESSION['utilisateur']))
	{ 
		return false;
	}
	else {// si l'indice utilisateur existe dans la session, alors l'utilisateur est passé par la page connexion et a donné les bons identifiants. Il est donc connecté.
		return true;
	}
}

function utilisateurEstConnecteEtEstAdmin()
{
	if(utilisateurEstConnecte() && $_SESSION['utilisateur']['statut'] == 1) // on vérifie si l'utilisateur est connecté et aussi si son statut est égal à 1
	{
		return true;
	}
	return false;
}

// Controle de l'extension des images provenant du formulaire de la page gestion_boutique

function verificationExtensionPhoto() 
{
	$extension = strrchr($_FILES['photo']['name'], '.'); // permet de retourner le texte contenu après le . en incluant le . 
	// premier argument la chaine de caractères où chercher
	// deuxième argument ce qu'on cherche.
	// strrrchr cherche le deuxième argument en partant de la fin de la chaine.
	$extension = strtolower(substr($extension, 1)); // nous coupons le . et strtolower passe la chaine de caractères en minuscule.
	$tab_extension_valide = array('jpg', 'jpeg', 'png', 'gif'); // on déclare un tableau arrau contenant les extensions acceptées.
	$verif_extension = in_array($extension, $tab_extension_valide); // in_array va vérifier si le premier argument est présent dans les valeurs du deuxième argument (tableau ARRAY) // renvoi true ou false
	
	return $verif_extension; // retourne true ou false !
}


// PANIER / COMMANDE / PAIEMENT

// un panier est un array dans la session qui contient lui même plusieurs tableaux array.
// $_SESSION => Panier (array) => 4 tableaux array (titre / id_article / prix / quantite)

function creationDuPanier () {
	if(!isset($_SESSION['panier'])) // si le panier n'est pas déjà existant.
	{
		$_SESSION['panier'] = array();
		$_SESSION['panier']['titre'] = array();
		$_SESSION['panier']['id_article'] = array();
		$_SESSION['panier']['quantite'] = array();
		$_SESSION['panier']['prix'] = array();
	}
	return true;
}

// ajout panier

function ajouterUnArticleDansPanier($titre, $id_article, $quantite, $prix) // réception d'argument en provenance de panier.php
{
	// on vérifie si l'article à rajouter est déjà présent dans le panier. Si c'est le cas on ne change que la quantité.
	$position_article = array_search($id_article, $_SESSION['panier']['id_article']); // array_search() => premier argument ce que l'on doit chercher / deuxième argument où on doit chercher.
	// si l'id_article est trouvé, on réupère l'indice !
	if($position_article !== FALSE) // si l'article est déjà présent dans la panier
	{
		$_SESSION['panier']['quantite'][$position_article] += $quantite; // on ne rajoute que la quantité de l'article.		
	}else { // si l'article n'est pas déjà présent alors on l'ajoute
		$_SESSION['panier']['titre'][] = $titre;
		$_SESSION['panier']['id_article'][] = $id_article;
		$_SESSION['panier']['quantite'][] = $quantite;
		$_SESSION['panier']['prix'][] = $prix;
	}
}

// Montant total du panier

function montantTotal()
{
	$total = 0;
	$nb_article = count($_SESSION['panier']['id_article']); // on récupère le nombre d'article dans le panier.
	
	for($i = 0; $i < $nb_article; $i++)
	{
		$total += $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i]; // on multiplie la quantité par le prix unitaire et l'on rajoute la valeur dans $total.
	}
	return round($total, 2); // on renvoi le total arrondi deux chiffre après la virgule.
}

// retirer un article du panier

function retirerUnArticleDuPanier($id_article_a_supprimer)
{
	$position_article = array_search($id_article_a_supprimer, $_SESSION['panier']['id_article']);
	
	if($position_article !== false) // si l'article a été trouvé
	{
		array_splice($_SESSION['panier']['titre'], $position_article, 1);
		array_splice($_SESSION['panier']['id_article'], $position_article, 1);
		array_splice($_SESSION['panier']['quantite'], $position_article, 1);
		array_splice($_SESSION['panier']['prix'], $position_article, 1);
		// array_splice permet de retirer un élément d'un tableau ARRAY et de réordonner les indices du tableau afin qu'il n'y ait pas de décalage dans les indices du tableau.
	}
}






















