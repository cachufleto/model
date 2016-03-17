<?php
require_once("inc/init.inc.php");

$categorie = executeRequete("SELECT DISTINCT categorie FROM article ORDER BY categorie");

/*** choix affichage article ***/
if(isset($_GET['categorie']))
{
	$choix_categorie = htmlentities($_GET['categorie']);
	$liste_article = executeRequete("SELECT * FROM article WHERE categorie = '$choix_categorie'");
}else {
	$liste_article = executeRequete("SELECT * FROM article");
}
/*** fin choix affichage article ***/
require_once("inc/header.inc.php");
require_once("inc/nav.inc.php");
echo $msg;
?>    


      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-home"></span> Boutique</h1>
		<hr />
      </div>
	  
	  <div class="row">
		<div class="col-md-3">
<?php
		echo '<ul style="list-style: none;">';
		while($cat = $categorie->fetch_assoc())
		{
			echo '<li><a href="?categorie='.$cat['categorie']. '"><span class="glyphicon glyphicon-star"></span> '.ucfirst($cat['categorie']). '</a></li>';
		}
		echo '</ul>';
?>		
		</div>	  
		<div class="col-md-9">
<?php
		while($article = $liste_article->fetch_assoc())
		{
			echo '<div class="col-sm-4" style="text-align: center">';
			echo '<div class="panel panel-info">';
			echo '<div class="panel-heading"><img src="img/logo_boutique.png" style="width: 80%"/></div>';
			
			echo '<div class="panel-body" style=" min-height: 320px;">';
			echo '<p><img src="'.RACINE_PHOTO.$article['photo'].'" style="width: 80%" /></p>';
			echo '<h3>'.$article['titre'].'</h3>';
			echo '<p>Prix: '.$article['prix'].' € </p>';
			
			echo '<a href="fiche_article.php?id_article='.$article['id_article'].'" class="btn btn-success">Voir la fiche article</a>';
			
			echo '</div></div></div>';
		}
?>				
		</div>	  
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
	
	
	

