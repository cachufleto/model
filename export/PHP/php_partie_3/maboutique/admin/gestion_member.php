<?php
require_once("../inc/init.inc.php");

if(!utilisateurEstConnecteEtEstAdmin())
{
	header("location:../connexion.php");
}



require_once("../inc/header.inc.php");
require_once("../inc/nav.inc.php");
echo $msg;
?>    


      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-ok"></span> Gestion Boutique</h1>
		<hr />
      </div>
<!-- 
	reference / categorie / titre / description (textarea) / couleur / taille (select S M L XL) / sexe (radio) / photo (file) / prix / stock /// bouton validation
-->	 
	<div class="col-md-6 col-md-offset-3">
		<form method="post" action="" enctype="multipart/form-data"><!-- enctype="multipart/form-data" est obligatoire si le formulaire contient un champs file upload -->
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
	
	
	

