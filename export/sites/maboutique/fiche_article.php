<?php
require_once("inc/init.inc.php");

if(isset($_GET['id_article']))
{
	$id_article = $_GET['id_article'];
	$resultat = executeRequete("SELECT * FROM article WHERE id_article = '$id_article'");	
	
	if($resultat->num_rows < 1)
	{
		header("location:index.php");
		exit();
	}
	
	$article = $resultat->fetch_assoc();
	
}else {
	header("location:index.php");
	exit();
}



require_once("inc/header.inc.php");
require_once("inc/nav.inc.php");
echo $msg;
//debug($article);

// faire une mise en forme des informations de l'article
// ne pas aficher l'id_article

// faire un formulaire d'ajout au panier
// - choix de la quantité (select)
		// - la liste ne doit pas afficher plus de quantité que le stock de l'article
// bouton de validation 
?>    


      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-thumbs-up"></span> Fiche article</h1>
		<hr />
      </div>
	  <div class="col-md-8 col-md-offset-2" style="text-align: center;">
		<div class="panel panel-warning">
			<div class="panel-heading"><h3><?php echo $article['titre']; ?></h3></div>
			<div class="panel-body">				
				<p><span class="texte_gras">Catégorie:</span> <?php echo $article['categorie']; ?></p>
				<p><span class="texte_gras">Taille: </span><?php echo $article['taille']; ?></p>
				<p><span class="texte_gras">Couleur: </span><?php echo $article['couleur']; ?></p>
				<p><span class="texte_gras">Description: </span><?php echo $article['description']; ?></p>
				<p><img src="<?php echo RACINE_PHOTO.$article['photo']; ?>" /></p>
				<p><span class="texte_gras">Prix: </span><?php echo $article['prix']; ?></p>
				
<?php
			if($article['stock'] > 0)
			{
				echo '<p><span class="texte_gras">Stock: </span>'.$article['stock'].'</p>';
				echo '<form method="post" action="panier.php">';
				echo '<input type="hidden" name="id_article" value="'.$article['id_article'].'" />';
				echo '<label for="quantite">Quantité</label>';
				echo '<select name="quantite" class="form-control">';
				
				for($i=1; $i<= $article['stock'] && $i <= 5; $i++)
				{
					echo '<option>'.$i.'</option>';
				}
					
				echo '</select>';
				echo '<input type="submit" value="Ajouter au panier" name="ajout_panier" class="form-control btn btn-success" />';
				echo '</form>';
			}
			else {
				echo '<p>Rupture de stock pour ce produit</p>';
			}
?>				
			<hr />
			<a href="index.php?categorie=<?php echo $article['categorie']; ?>" class="btn btn-primary">Retour vers votre selection</a>
			</div>
		</div>
	  </div>
	
<?php
require_once("inc/footer.inc.php");
	
	
	

