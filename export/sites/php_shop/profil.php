<?php
require_once("inc/init.inc.php");

if(!utilisateurEstConnecte()) // si l'utilisateur n'est pas connecté
{
	header("location:connexion.php");
}


require_once("inc/header.inc.php");
require_once("inc/nav.inc.php");
echo $msg;
// var_dump($_SESSION);
?>    


      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-user"></span> Profil</h1>
		<hr />
      </div>
	  <div class="row">
		<div class="col-md-12">
			<div class="col-md-6 col-md-offset-2 profil">
			<?php 
				echo '<span class="texte_gras texte_italic">Pseudo </span>' . $_SESSION['utilisateur']['pseudo'] . '<br />'; 
				echo '<span class="texte_gras texte_italic">Nom </span>' . $_SESSION['utilisateur']['nom'] . '<br />'; 
				echo '<span class="texte_gras texte_italic">Prénom </span>' . $_SESSION['utilisateur']['prenom'] . '<br />'; 
				echo '<span class="texte_gras texte_italic">Email </span>' . $_SESSION['utilisateur']['email'] . '<br />'; 
				echo '<span class="texte_gras texte_italic">Sexe </span>' . $_SESSION['utilisateur']['sexe'] . '<br />'; 
				echo '<span class="texte_gras texte_italic">Adresse </span>' . $_SESSION['utilisateur']['adresse'] . $_SESSION['utilisateur']['cp'] . $_SESSION['utilisateur']['ville'] . '<br />'; 
			?>
			</div>
			<div class="col-md-4">
				<img src="img/profil.jpg" alt="" class="img-thumbnail" />
			</div>			
		</div>
	  </div>
	  <div class="row">
		<div class="col-md-12">
		<!-- 
		- EXERCICE: afficher si le membre est administrateur ou uste membre dans un titre h2.
		-->
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
	
	
	

