<?php
require_once("inc/init.inc.php");

if($_POST) // est-ce que le formulaire a été validé ?
{
	$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']);
	// preg_match() va vérifier les caractères contenus dans $_POST['pseudo'] selon ceux que nous avons déclaré dans l'expression régulière. => retourne 0 si caractère interdit ou => retourne 1 si tout est ok !
	/*
		les signes # indique le début et la fin de notre expression régulière. Nous permetant de préciser les options.
		^ indique le début de la chaine // sinon la chaine pourrait commencer par autre chose
		$ indique la fin de la chaine de caractère // sinon la chaine pourrait finir par autre chose
		+ indique que les caractères autorisés peuvent apparaitre plusieurs fois.	
	*/
	if(!$verif_caractere && !empty($_POST['pseudo'])) // caractère non autorisé
	{
		$msg .= '<div class="bg-danger message"><p>Erreur sur le pseudo,<br /> caractères acceptés: A à Z et 0 à 9</p></div>';
	}
	if(strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 14) // problème de taille sur le pseudo
	{
		$msg .= '<div class="bg-danger message"><p>Erreur sur le pseudo,<br /> Le pseudo doit avoir entre 4 et 14 caractères inclus !</p></div>';
	}
	
	if(empty($msg)) // si la variable $msg est vide alors il n'y a pas d'erreur !
	{
		$pseudo = $_POST['pseudo'];
		
		//$membre = executeRequete("SELECT * FROM membre WHERE pseudo='".$_POST['pseudo']."'");
		//$membre = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
		$membre = executeRequete("SELECT * FROM membre WHERE pseudo='$pseudo'"); 
		if($membre->num_rows > 0) // si la requete retourne un enregistrement, c'est que le pseudo est déjà utilisé en BDD.
		{
			$msg .= '<div class="bg-danger message"><p>Pseudo indisponible !</p></div>';
		}
		else { // le pseudo n'existe pas en BDD donc on peut lancer l'inscription.
			foreach($_POST as $indice => $valeur)
			{
				$_POST[$indice] = htmlentities($_POST[$indice], ENT_QUOTES); // on applique le htmlentities sur tous les éléments contenus dans $_POST
			}
			extract($_POST); // extract créé un variable avec le nom de l'indice contenant la valeur correspondante pour chaque élément du tableau array
			executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, sexe, ville, cp, adresse) VALUES ('$pseudo', '$mdp', '$nom', '$prenom', '$email', '$sexe', '$ville', '$cp', '$adresse')");
		}
	}
}

require_once("inc/header.inc.php");
require_once("inc/nav.inc.php");
echo $msg;
?>    
  <div class="starter-template">
	<h1><span class="glyphicon glyphicon-pencil"></span> Inscription</h1>
	<hr />
  </div>
  <div class="row">
	<div class="col-md-6 col-md-offset-3">
	<form method="post" action="">
		<div class="form-group">
			<label for="pseudo">Pseudo</label>
			<input type="text" class="form-control" id="pseudo" placeholder="Pseudo..." value="<?php if(isset($_POST['pseudo'])) {echo $_POST['pseudo']; } ?>" name="pseudo">
		</div>
		<div class="form-group">
			<label for="mdp">Mot de passe</label>
			<input type="text" class="form-control" id="mdp" placeholder="Mot de passe..." value="<?php if(isset($_POST['mdp'])) {echo $_POST['mdp']; } ?>" name="mdp">
		</div>
		<div class="form-group">
			<label for="nom">Nom</label>
			<input type="text" class="form-control" id="nom" placeholder="Nom..." value="<?php if(isset($_POST['nom'])) {echo $_POST['nom']; } ?>" name="nom">
		</div>
		<div class="form-group">
			<label for="prenom">Prénom</label>
			<input type="text" class="form-control" id="prenom" placeholder="Prénom..." value="<?php if(isset($_POST['prenom'])) {echo $_POST['prenom']; } ?>" name="prenom">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" placeholder="Email..." value="<?php if(isset($_POST['email'])) {echo $_POST['email']; } ?>" name="email">
		</div>
		<div class="form-group">
		  <label>Sexe</label>&nbsp;
			<input type="radio" name="sexe" value="m"  <?php if(isset($_POST['sexe']) && $_POST['sexe'] == 'm') {echo 'checked'; }elseif(!isset($_POST['sexe'])) { echo 'checked'; } ?> > Homme &nbsp;&nbsp;&nbsp;
			<input type="radio" name="sexe" value="f" <?php if(isset($_POST['sexe']) && $_POST['sexe'] == 'f') {echo 'checked'; } ?> > Femme
		</div>
		<div class="form-group">
			<label for="ville">Ville</label>
			<input type="text" class="form-control" id="ville" placeholder="Ville..." value="<?php if(isset($_POST['ville'])) {echo $_POST['ville']; } ?>" name="ville">
		</div>
		<div class="form-group">
			<label for="cp">Code postal</label>
			<input type="text" class="form-control" id="cp" placeholder="Code postal..." value="<?php if(isset($_POST['cp'])) {echo $_POST['cp']; } ?>" name="cp">
		</div>
		<div class="form-group">
			<label for="adresse">Adresse</label>
			<textarea name="adresse" id="adresse" class="form-control" rows="3" placeholder="Adresse..."><?php if(isset($_POST['adresse'])) {echo $_POST['adresse']; } ?></textarea>
		</div>
		<div class="form-group">
			<input type="submit" class="form-control btn btn-success" id="inscription" value="Inscription" name="inscription">
		</div>
		
		
		
	</form>
	</div>
  </div>
  </div><!-- /.container -->
	
<?php
require_once("inc/footer.inc.php");
	
	
	

