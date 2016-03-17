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

// PANIER / COMMADE / PAIMENT

// un panier est un array dans la session qui contient lui m^me plusieurs tableaux array
// $_SESSION => Panier array()=> 4 tableaux array(titre / id_article / prix / quantité)

function creationDuPanier(){
	if(!isset($_SESSION['panier'])) // si le panier n'est pas déjà crée
	{
		$_SESSION['panier'] = array();
		$_SESSION['panier']['titre'] = array();
		$_SESSION['panier']['id_article'] = array();
		$_SESSION['panier']['quantite'] = array();
		$_SESSION['panier']['prix'] = array();
	}
	
	return TRUE; 
}

// Ajout panier

function ajouterUnArticleDansPanier($titre, $id_article, $quantite, $prix)
{
	// on verifie si l'article à rajouter est déjà présent dans le panier.
	$position_article = array_search($id_article, $_SESSION['panier']['id_article']);
	// array_search, quoi et ou!
	if($position_article !== FALSE)
	{
		$_SESSION['panier']['quantite'][$position_article] += $quantite;
	}else{
		$_SESSION['panier']['titre'][] = $titre;
		$_SESSION['panier']['id_article'][] = $id_article;
		$_SESSION['panier']['quantite'][] = $quantite;
		$_SESSION['panier']['prix'][] = $prix;
	}
}


// suppretion dans panier

function supprimerUnArticleDansPanier($id_article, $action)
{
	$indice = array_search($id_article, $_SESSION['panier']['id_article']);
	// on verifie si l'article à rajouter est déjà présent dans le panier.
	if($indice !== false)
	{
		if(array_key_exists($indice, $_SESSION['panier']['quantite'])){
			
			if($action == '-') $_SESSION['panier']['quantite'][$indice]--;
			elseif($action == '+') {
				$_SESSION['panier']['quantite'][$indice] += 
					($_SESSION['panier']['quantite'][$indice] < getStockArticle($id_article))? 1 : 0;
			}
			else $_SESSION['panier']['quantite'][$indice] = 0;
			
			if($_SESSION['panier']['quantite'][$indice] == 0){
					array_splice($_SESSION['panier']['quantite'], $indice, 1);
				if(array_key_exists($indice, $_SESSION['panier']['titre'])) 
					array_splice($_SESSION['panier']['titre'], $indice, 1);
				if(array_key_exists($indice, $_SESSION['panier']['id_article'])) 
					array_splice($_SESSION['panier']['id_article'], $indice, 1);
				if(array_key_exists($indice, $_SESSION['panier']['prix'])) 
					array_splice($_SESSION['panier']['prix'], $indice, 1);
				
			}
		} 
	}
	return TRUE;
}

// extraction du stock par article
function getStockArticle($id_article){

	$sql = "SELECT stock FROM article WHERE id_article = $id_article";
	$article = executeRequete($sql);
	$stock = $article->fetch_assoc();
	return $stock['stock'];
}


function montantTotal() {
	$total = 0;
	foreach ($_SESSION['panier']['id_article'] as $indice => $id_article) {
		$total += $_SESSION['panier']['prix'][$indice] * $_SESSION['panier']['quantite'][$indice];
	}
	return round($total, 2);
}


// payement d'un panier

function decompterUnPanierArticle()
{
	$vide = array();
	$articles = $_SESSION['panier']['id_article'];
	
	foreach($articles as $indice => $id_article){
		
		$stock = getStockArticle($id_article);
		$demande = $_SESSION['panier']['quantite'][$indice];
		$message = '';
		
		if($demande > $stock){
			$_SESSION['panier']['quantite'][$indice] = $stock;
			if(!empty($stock)){
				$message = '<p>La quantité de l\'article "'.$_SESSION['panier']['titre'][$indice].
					'" est insuffisante<br/>Veuillez vérifier vos achats</p>';
			}else{
				$vide[] = $id_article;
				$message = '<p>L\'article "'.$_SESSION['panier']['titre'][$indice].
					'" est épuisé<br/>Veuillez vérifier vos achats</p>';
			}
		}
	}
	
	if(!empty($vide)){

		foreach($vide as $id_article)
			supprimerUnArticleDansPanier($id_article, 'X');

	}elseif(empty($message)){
		global $mysqli; 
		// insertion dans la base des données
		$sql = "INSERT INTO commande (id_membre, montant, date) VALUES (".
				$_SESSION['utilisateur']['id_membre'].", ".montantTotal().", now())";
		$commande = executeRequete($sql);
		$id_commande = $mysqli->insert_id;
		// insertion de chaque-un des articles commandes
		foreach($articles as $indice => $id_article){

			$stock = $_SESSION['panier']['quantite'][$indice];
			$prix = $_SESSION['panier']['prix'][$indice]; 
			
			$sql_update = "UPDATE article SET stock=stock - $stock WHERE id_article=$id_article";
			$sql_insert = "INSERT INTO details_commande (id_commande, id_article, prix, quantite) 
				VALUE ($id_commande, $id_article, $prix, $stock)";
			debug($sql_insert);
			executeRequete($sql_insert);
			debug($sql_update);
			executeRequete($sql_update);
		}
		unset($_SESSION['panier']);
		// mail($_SESSION['utilisateur']['mail'], "Confirmation $id_commande", "From:vendeur@maboutique.com");
	}
	
	return !empty($message)? '<div class="bg-danger message" >'.$message.'</div>' : '';
}







