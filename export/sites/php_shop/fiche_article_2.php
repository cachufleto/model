<?php
require_once("inc/init.inc.php");

if(isset($_GET['id_article']))
{
	$id_article = $_GET['id_article'];
	$resultat = executeRequete("SELECT * FROM article WHERE id_article = '$id_article'");
	
	if($resultat->num_rows <1)
	{
		header("location:index.php");
		exit();
	}
	
	$article = $resultat->fetch_assoc();
    
    $reference = $article['reference'];
    $categorie = $article['categorie'];
    $titre = $article['titre'];
    $description = $article['description'];
    $couleur = $article['couleur'];
    $taille = $article['taille'];
    $sexe = $article['sexe'];
    $photo = $article['photo'];
    $prix = $article['prix'];
    $stock = $article['stock'];
    
    if($sexe == 'm')
    {
        $sexe = 'homme';
    }else{
        $sexe = 'femme';
    }

} else {
		header("location:index.php");
		exit();
	}

require_once("inc/header.inc.php");
require_once("inc/nav.inc.php");
echo $msg;
// debug($article);

// faire une mise en forme des informations de l'article
// ne pas afficher l'id 
// utiliser class="panel"

// faire un formulaire d'ajout au panier
// choix de la quantité (select)
	// la liste ne doit pas afficher plus de quantitié que le stock de l'article // for($i=0; $i<$tock && $i<6; $i++)
// bouton de validation
?>
        <div class="starter-template">
            <h1><span class="glyphicon glyphicon-piggy-bank"></span>Fiche Article</h1>
            <hr/>
        </div>
        <div class="row">
            <div class="col-md-3">
<?php
                echo '  <ol class="breadcrumb">
                          <li><a href="boutique_matieu.php">Boutique</a></li>
                          <li><a href="boutique_matieu.php?categorie='.$categorie.'">'.$categorie.'</a></li>
                          <li class="active">'.$titre.'</li>
                        </ol>';
                
                echo '  <form method="post" action="">
                            <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ajout au panier</h3>
                            </div>
                            <div class="panel-body">
                                <label for="quantite">Quantité</label>
                                <select class="form-control" id="quantite" name="quantite">';
                                  for($i=1; $i<$stock && $i<6; $i++)
                                  {
                                      echo'<option>'.$i.'</option>';
                                  }
               echo '           </select>
                            </div>
                            <div class="panel-footer">
                                    <button type="submit" class="btn btn-success">Acheter</button> 
                                </div>
                            </div>
                        </form>';
                var_dump($_POST);
?>
            </div>
            <div class="col-md-6">
<?php
                echo '<div class="panel panel-success">';
                echo '<div class="panel-heading">';
                echo '<h3 class="panel-title">'.$titre.'</h3>';
                echo '</div>';
                echo '<div class="panel-body">';
                echo '<img class="img-responsive" src="'.$photo.'"/>';
                echo '</div>';
                echo '</div>';
?>
            </div>
            <div class="col-md-3">
<?php
                echo '  <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Reference</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-md-6">'.$reference.'</div>
                          </div>
                        </div>';
                echo '  <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Catégorie</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-md-6">'.$categorie.'</div>
                          </div>
                        </div>';
                echo '  <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Déscription</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-md-12">'.$description.'</div>
                          </div>
                        </div>';
                echo '  <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Couleur</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-md-6">'.$couleur.'</div>
                          </div>
                        </div>';
                echo '  <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Taille</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-md-6">'.$taille.'</div>
                          </div>
                        </div>';
                echo '  <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Sexe</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-md-6">'.$sexe.'</div>
                          </div>
                        </div>';
                echo '  <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Prix</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-md-6">'.$prix.'</div>
                          </div>
                        </div>';
                echo '  <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Stock</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-md-6">'.$stock.'</div>
                          </div>
                        </div>';
?>
            </div>
        </div>
    </div><!-- /.container -->
<?php
require_once("inc/footer.inc.php");