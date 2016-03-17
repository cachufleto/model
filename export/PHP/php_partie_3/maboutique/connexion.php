<?php
require_once("inc/init.inc.php");

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
{
	session_destroy();
}

if(utilisateurEstConnecte())
{
	header("location:profil.php"); // header() doit toujours etre exécuté avant le moindre affichage html. Cela permet de rediriger vers une autre page. Ici la page profil.
}

if(isset($_POST['pseudo']) && isset($_POST['mdp']))
{
	$pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES);
	$mdp = htmlentities($_POST['mdp'], ENT_QUOTES);
	
	$selection_membre = executeRequete("SELECT * FROM membre WHERE pseudo = '$pseudo' AND mdp = '$mdp'");
	if($selection_membre->num_rows != 0) // si $selection_membre possede au moins une ligne alors le membre existe en BDD et le pseudo et mdp correspondent.
	{
		$membre = $selection_membre->fetch_assoc(); // on traite notre ligne de resultat avec un fetch_assoc() pour obtenir un tableau ARRAY
		
		foreach($membre AS $indice => $valeur)
		{
			if($indice != 'mdp')
			{
				$_SESSION['utilisateur'][$indice] = $valeur;
			}
		}
		header("location:profil.php");
		
	}else {
		$msg .= '<div class="bg-danger message"><p>Erreur d\'identification !</p></div>';
	}
}
require_once("inc/header.inc.php");
require_once("inc/nav.inc.php");
echo $msg;
// debug($_SESSION);

?>    


      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-ok"></span>Connexion</h1>
		<hr />
      </div>
	  <div class="row">
		<div class="col-md-4 col-md-offset-4">
		<form method="post" action="">
			<div class="form-group">
				<label for="pseudo">Pseudo</label>
				<input type="text" class="form-control" id="pseudo" placeholder="Pseudo..." value="<?php if(isset($_POST['pseudo'])) {echo $_POST['pseudo']; } ?>" name="pseudo">
			</div>
			<div class="form-group">
				<label for="mdp">Mot de passe</label>
				<input type="text" class="form-control" id="mdp" placeholder="Mot de passe..." value="" name="mdp">
			</div>
			<div class="form-group">				
				<input type="submit" class="form-control btn btn-warning" id="connexion" value="Connexion" name="connexion">
			</div>
		</form>
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
	
	
	

