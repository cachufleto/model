<?php
require_once("inc/init.inc.php");

// vider panier
if(isset($_POST['vider'])) // si l'utilisateur clic sur le bouton vider le panier.
{
	unset($_SESSION['panier']); // on vide la partie panier de la session
}
// retirer article
if(isset($_GET['action']) && $_GET['action'] == 'retirer')
{
	retirerUnArticleDuPanier($_GET['id_article']);
}

creationDuPanier();

// AJOUT AU Panier

if(isset($_POST['ajout_panier'])) // ce post provient de la page fiche_article
{
	$id_article = $_POST['id_article'];
	$resultat = executeRequete("SELECT * FROM article WHERE id_article = '$id_article'");
	$article = $resultat->fetch_assoc();
	$article['prix'] = $article['prix'] * 1.2; // ajout de la tva sur le prix.
	ajouterUnArticleDansPanier($article['titre'], $_POST['id_article'], $_POST['quantite'], $article['prix']); // on execute la fonction afin d'ajouter l'article dans le panier.
	header("location:panier.php"); // pour éviter de rajouter le même article en cas de rafraichissement de page.
}

// payer le panier
if(isset($_POST['payer'])) // si l'utilisateur clic sur le bouton payer.
{
	$nb_article = count($_SESSION['panier']['prix']);
	
	for($i = 0; $i < $nb_article ; $i++)
	{
		$id_article = $_SESSION['panier']['id_article'][$i];
		$resultat = executeRequete("SELECT * FROM article WHERE id_article='$id_article'");
		$result = $resultat->fetch_assoc();
		
		if($result['stock'] < $_SESSION['panier']['quantite'][$i]) // on vérifie si le stock restant est inférieur à la quantité demandée.
		{
			if($result['stock'] > 0) // il reste quand même du stock !
			{
				$_SESSION['panier']['quantite'][$i] = $result['stock'];
				$msg .= '<div class="bg-danger message"><p>La quantité de l\'article "'.$_SESSION['panier']['titre'][$i].'" a été modifié car notre stock est insuffisant.<br /> Veuillez vérifier vos achats</p></div>';
			}
			else { // le stock est à zéro !
				
				$msg .= '<div class="bg-danger message"><p>L\'article "'.$_SESSION['panier']['titre'][$i].'" a été retiré de votre commande car nous sommes en rupture de stock.<br /> Veuillez vérifier vos achats</p></div>';
				retirerUnArticleDuPanier($id_article); // si le stock de cet article est à zero alors on le retire du panier.
				$i--;
				$nb_article--;				
				// on décrémente $i car la fonction retirerUnArticleDuPanier a réorganisé les indices. On enlève donc 1 à $i afin de ne pas sauter un article.
			}
		$erreur = true;	 // variable de controle
		}
	}
	
	if(!isset($erreur)) // on vérifie s'il y a une erreur
	{
		executeRequete("INSERT INTO commande (id_membre, montant, date) VALUES (".$_SESSION['utilisateur']['id_membre'].", ".montantTotal().", now())");
		// enregistrement de la commande.
		$id_commande = $mysqli->insert_id; // pour récupérer l'id de la commande
		$nb_article = count($_SESSION['panier']['titre']);
		for($i = 0; $i < $nb_article; $i++)
		{
			executeRequete("INSERT INTO details_commande (id_commande, id_article, prix, quantite) VALUES ($id_commande, ".$_SESSION['panier']['id_article'][$i].", ".$_SESSION['panier']['prix'][$i].", ".$_SESSION['panier']['quantite'][$i].")");			
			// enregistrement details commande
			
			executeRequete("UPDATE article SET stock=stock-".$_SESSION['panier']['quantite'][$i]." WHERE id_article='".$_SESSION['panier']['id_article'][$i]."'");
			// mise a jour du stock			
		}
		unset($_SESSION['panier']);
		mail($_SESSION['utilisateur']['mail'], "Confirmation de votre commande", "Merci pour votre commande, votre numéro de suivi est le $id_commande", "From: vendeur@maboutique.com"); // fonction mail: 4 arguments obligatoires => destinataire (adresse mail) / sujet / message / expéditeur.
		
	}
	
}



require_once("inc/header.inc.php");
require_once("inc/nav.inc.php");
echo $msg;
debug($_SESSION);
//debug($_POST);


?>    


      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-shopping-cart"></span> Panier</h1>
		<hr />
      </div>
	  <div class="col-md-8 col-md-offset-2">
		<table class="table" border="1">
			<tr><th colspan="5">PANIER</th></tr>
			<tr><th>Titre</th><th>Article</th><th>Quantité</th><th>Prix unitaire</th><th>Action</th></tr>
			
			<?php
			if(empty($_SESSION['panier']['titre']))
			{
				echo '<tr><td colspan="5"><h3>Votre panier est vide</h3><a href="index.php">Retour boutique</a></td></tr>';
			}
			else {
				$nb_article = count($_SESSION['panier']['quantite']);
				for($i = 0; $i < $nb_article; $i++)
				{
					echo '<tr>';
					echo '<td>'.$_SESSION['panier']['titre'][$i].'</td>';
					echo '<td>'.$_SESSION['panier']['id_article'][$i].'</td>';
					echo '<td>'.$_SESSION['panier']['quantite'][$i].'</td>';
					echo '<td>'.$_SESSION['panier']['prix'][$i].'</td>';
					echo '<td><a href="?action=retirer&id_article='.$_SESSION['panier']['id_article'][$i].'" class="btn btn-danger" onClick="return(confirm(\'êtes-vous sur ?\'));" ><span class="glyphicon glyphicon-remove"></span></a></td>';					
					echo '</tr>';
				}
				echo '<th colspan="3">Montant total:</th><td colspan="2">'. montantTotal() . ' € ttc</td>';
				
				if(utilisateurEstConnecte())
				{
					echo '<tr><td colspan="5">';
					echo '<form method="post" action="">';
					echo '<input type="submit" name="payer" value="Payer le panier" class="form-control btn btn-success" />';
					echo '</form>';
					echo '</td></tr>';
				}
				else {
					echo '<tr><td colspan="5">Veuillez vous <a href="connexion.php">connecter</a> ou vous <a href="inscription.php">inscrire</a> afin de payer votre panier</td></tr>';
				}
				
				// rajouter une ligne de tableau avec un bouton vider le panier (form method post) 
				// action pour vider le panier: unset($_SESSION['panier'])
				
				// de la même façon, si l'utilisateur est connecté: afficher ses informations de livraison en bas de page.
					echo '<tr><td colspan="5">';
					echo '<form method="post" action="">';
					echo '<input type="submit" name="vider" value="Vider le panier" class="form-control btn btn-danger" />';
					echo '</form>';
					echo '</td></tr>';
			}
			
			?>
		</table>
		<hr />
		<p>Règlement par chèque uniquement ! <br /> A l'adresse 37 rue saint Sebastien 75011 Paris<br /> Tous nos articles sont calculés avec le taux de TVA à 20%</p>
		<hr />
		<?php 
				if(utilisateurEstConnecte())
				{
					echo $_SESSION['utilisateur']['adresse'];
				}
		?>
	  </div>
	  
	  
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
    </div><!-- /.container -->
	
<?php
require_once("inc/footer.inc.php");
	
	
	

