<?php
require_once("../inc/init.inc.php");
if(!utilisateurEstConnecteEtEstAdmin())
{
	header("location:../connexion.php");
	exit(); // permet d'arreter l'execution du code au cas où une personne malveillante tente l'injection via l'url
}

if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
	$id_article = $_GET['id_article'];
	$resultat = executeRequete("SELECT photo FROM article WHERE id_article=$id_article");
	$article_a_supprimer = $resultat->fetch_assoc();
	
	$chemin = RACINE_SERVER . $article_a_supprimer['photo'];
	// chemin où se trouve la photo à supprimer
	
	$req = "DELETE FROM article WHERE id_article=$id_article";
	executeRequete($req);
	
	if(!empty($article_a_supprimer['photo']) && file_exists($chemin)) // file_exists si un fichier ou un dossier existe en lui donnant comme argument le chemin d'accés
	{
		unlink($chemin); // supprime la photo sur le serveur
	}
}

/******* ENREGISTREMENT D'ARTICLE *******/
if(isset($_POST['enregistrement']))
{
	$reference = $_POST['reference'];
	$ref_article = executeRequete("SELECT * FROM article WHERE reference ='$reference'");
	// executeRequete("SELECT * FROM article WHERE reference ='$_POST[reference]'");
	// executeRequete("SELECT * FROM article WHERE reference ='".$_POST['reference']. "'");
	
	if($ref_article->num_rows >0 && isset($_GET['action']) && $_GET['action'] == 'ajout') // si la référence existe
	{
		$msg .= '<div class="bg-danger message"><p>La référence est déjà attribuée, <br /> Veuillez vérifier votre saisie</p></div>';
	}
	else {
		$photo_bdd = ""; // évite une erreur undefined si l'utilisateur ne charge pas de photo !
		if(isset($_GET['action']) && $_GET['action'] == 'modification')
		{
			$photo_bdd = $_POST['photo_actuelle'];
		}
		if(!empty($_FILES['photo']['name'])) // si une photo a été posté
		{
			// $_POST ne contient pas les infos des fichiers (file upload) $_FILES est une superglobale qui contient un array avec les informations du fichier chargé. (nom / type / taille / tmp_name (qui correspond au code temporaire qui permet de créer ce fichier.) )
			if(verificationExtensionPhoto())
			{
				$nom_photo_securise = htmlentities($_FILES['photo']['name'], ENT_QUOTES);
				$nom_photo = $_POST['reference'] .'-'. $nom_photo_securise; // on change le nom de la photo en rajoutant la référence (unique) afin que la photo n'en écrase pas une avec le même nom.
				$photo_bdd = $nom_photo; // chemin src que l'on enregistre dans la BDD
				$photo_dossier = RACINE_SERVER . RACINE_PHOTO . $nom_photo; // chemin pour l'enregistrement du fichier dans le dossier cible via la fonction copy()
				copy($_FILES['photo']['tmp_name'], $photo_dossier); // copy() permet de copier un fichier depuis un emplacement (1er argument) vers un un autre emplacement (2eme argument)
			}
			else {
				$msg .= '<div class="bg-danger message"><p>L\'extension n\'est pas valide.<br /> Extensions acceptées: jpg / jpeg / png / gif</p></div>';
			}
			
		}
		
		if(empty($msg)) // si msg est vide alors il n'y a pas eu d'erreur au préalable.
		{
			foreach($_POST as $indice => $valeur)
			{
				$_POST[$indice] = htmlentities($valeur, ENT_QUOTES);
			}
			extract($_POST);
			$req = "INSERT INTO article (id_article, reference, categorie, titre, description, couleur, taille, sexe, photo, prix, stock) VALUES ('', '$reference', '$categorie', '$titre', '$description', '$couleur', '$taille', '$sexe', '$photo_bdd', '$prix', '$stock')";
			if(isset($_GET['action']) && $_GET['action'] == 'modification')
			{
				$req = "UPDATE  article set categorie = '$categorie', titre = '$titre', description = '$description', couleur = '$couleur', taille = '$taille', sexe = '$sexe', photo = '$photo_bdd', prix = '$prix', stock = '$stock' WHERE id_article = '$id_article'";
			}
			executeRequete($req);
			$_GET['action'] = 'affichage';
			
		}
		
	}
	
}
/******* FIN ENREGISTREMENT D'ARTICLE *******/





require_once("../inc/header.inc.php");
require_once("../inc/nav.inc.php");
echo $msg;
// debug($_POST);
// debug($_FILES);
// debug($_SERVER);

?>    


      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-ok"></span> Gestion Boutique</h1>
		<hr />
		<a href="?action=ajout" class="btn btn-primary">Ajout</a> | 
		<a href="?action=affichage" class="btn btn-info">Affichage</a>
	</div>
<!-- 
	reference / categorie / titre / description (textarea) / couleur / taille (select S M L XL) / sexe (radio) / photo (file) / prix / stock /// bouton validation
-->	
<?php
/***  AFFICHAGE FORMULAIRE AJOUT ***/
if(isset($_GET['action']) && ($_GET['action'] ==  'ajout' || $_GET['action'] == 'modification'))
{
	if(isset($_GET['id_article']))
	{
		$resultat = executeRequete("SELECT * FROM article WHERE id_article='".$_GET['id_article']."'");
		$article_actuel = $resultat->fetch_assoc();
		
		foreach($article_actuel AS $indice => $valeur)
		{
			$_POST[$indice] = $valeur;
		}
	}
?>	
	<div class="col-md-6 col-md-offset-3">
		<form method="post" action="" enctype="multipart/form-data"><!-- enctype="multipart/form-data" est obligatoire si le formulaire contient un champs file upload -->
		
		<input type="hidden" name="id_article" value="<?php if(isset($_POST['id_article'])) { echo $_POST['id_article'];} ?>" />
		
		<div class="form-group">
			<label for="reference">Référence</label>
			<input type="text" class="form-control" id="reference" placeholder="Référence..." value="<?php if(isset($_POST['reference'])) {echo $_POST['reference']; } ?>" name="reference">
		</div>
		<div class="form-group">
			<label for="categorie">Catégorie</label>
			<input type="text" class="form-control" id="categorie" placeholder="Catégorie..." value="<?php if(isset($_POST['categorie'])) {echo $_POST['categorie']; } ?>" name="categorie">
		</div>
		<div class="form-group">
			<label for="titre">Titre</label>
			<input type="text" class="form-control" id="titre" placeholder="Titre..." value="<?php if(isset($_POST['titre'])) {echo $_POST['titre']; } ?>" name="titre">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea name="description" id="description" class="form-control" rows="3" placeholder="Description..."><?php if(isset($_POST['description'])) {echo $_POST['description']; } ?></textarea>
		</div>		
		<div class="form-group">
			<label for="couleur">Couleur</label>
			<input type="text" class="form-control" id="couleur" placeholder="Couleur..." value="<?php if(isset($_POST['couleur'])) {echo $_POST['couleur']; } ?>" name="couleur">
		</div>
		<div class="form-group">
			<label for="taille">Taille</label>
			<select id="taille" name="taille" class="form-control" >
				<option>S</option>
				<option>M</option>
				<option>L</option>
				<option>XL</option>
<!-- EXERCICE faire en sorte de garder le dernier choix de l'utilisateur dans la liste select -->
			</select>
		</div>
		
		<div class="form-group">
		  <label>Sexe</label>&nbsp;
			<input type="radio" name="sexe" value="m"  <?php if(isset($_POST['sexe']) && $_POST['sexe'] == 'm') {echo 'checked'; }elseif(!isset($_POST['sexe'])) { echo 'checked'; } ?> > Homme &nbsp;&nbsp;&nbsp;
			<input type="radio" name="sexe" value="f" <?php if(isset($_POST['sexe']) && $_POST['sexe'] == 'f') {echo 'checked'; } ?> > Femme
		</div>
		<div class="form-group">
			<label for="photo">Photo</label>
			<input type="file" class="form-control" id="photo"  name="photo">
		</div>

		<?php 
			if(isset($_GET['id_article'])) // si on est dans une modification
			{
				echo '<div class="form-group"><label for="photo_actuelle">photo actuelle</label><br />';
				echo '<img src="'.$_POST['photo'].'" width ="140"/>';
				echo '<input type="hidden" id="photo_actuelle"  name="photo_actuelle" value="'.$_POST['photo'].'"></div>';
			}
		?>
		
		<div class="form-group">
			<label for="prix">Prix</label>
			<input type="text" class="form-control" id="prix" placeholder="Prix..." value="<?php if(isset($_POST['prix'])) {echo $_POST['prix']; } ?>" name="prix">
		</div>
		<div class="form-group">
			<label for="stock">Stock</label>
			<input type="text" class="form-control" id="stock" placeholder="Stock..." value="<?php if(isset($_POST['stock'])) {echo $_POST['stock']; } ?>" name="stock">
		</div>
		
		<div class="form-group">
			<input type="submit" class="form-control btn btn-warning" id="enregistrement" value="Enregistrement" name="enregistrement">
		</div>
		
		</form>
	</div>
<?php
}
/***  FIN AFFICHAGE FORMULAIRE AJOUT ***/

/***  AFFICHAGE TABLEAU ARTICLE ***/
if(isset($_GET['action']) && $_GET['action'] ==  'affichage')
{
	$resultat = $mysqli->query("SELECT * FROM article");
	// on récupère le contenu de la table article sous forme inexploitable => $resultat
	
	echo '<div class="row">';
	echo '<div class="col-md-12">';
	echo '<h1>Affichage</h1>';
	
	$nb_col = $resultat->field_count;
	// on récupère le nombre de colonnes contenues dans $resultat
	
	echo '<table class="table" border="1" style="text-align:center;">';
	
	echo '<tr>';
	
	for($i = 0; $i < $nb_col; $i++)
	{
		$colonne = $resultat->fetch_field();
		echo '<th>'.$colonne->name.'</th>';
	}
	
	echo '<th>Modif</th><th>Suppr</th></tr>';
	
	while($ligne = $resultat->fetch_assoc())
	{
		echo '<tr>';
		
		foreach($ligne AS $indice => $valeur)
		{
			if($indice == "photo")
			{
				echo '<td><img src="'.RACINE_PHOTO.$valeur.'" width="100" /></td>';
			}else {
				echo '<td>'.$valeur.'</td>';
			}
		}
		
		echo '<td><a href="?action=modification&id_article='.$ligne['id_article'].'" class="btn btn-warning"><span class="glyphicon glyphicon-refresh"></span></a></td>';
		
		echo '<td><a href="?action=suppression&id_article='.$ligne['id_article'].'" class="btn btn-danger" onClick="return(confirm(\'êtes-vous sur ?\'));" ><span class="glyphicon glyphicon-remove"></span></a></td>';
		echo '</tr>';
	}
	
	echo '</table>';
	
	echo '</div>';	
	echo '</div>';	
	
}
?>	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
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
require_once("../inc/footer.inc.php");
	
	
	

