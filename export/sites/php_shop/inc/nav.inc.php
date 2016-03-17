<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">MaBoutique</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
<?php 	
	if(utilisateurEstConnecte()) // si on récupère TRUE
	{
	echo   '<li class="active"><a href="'.RACINE_SITE.'index.php"> Boutique</a></li>
            <li><a href="'.RACINE_SITE.'panier.php">Panier</a></li>
            <li><a href="'.RACINE_SITE.'profil.php">Profil</a></li>
            <li><a href="'.RACINE_SITE.'connexion.php?action=deconnexion">Déconnexion</a></li>';	
	}
	else {
	  
    echo   '<li class="active"><a href="'.RACINE_SITE.'index.php"> Boutique</a></li>
            <li><a href="'.RACINE_SITE.'panier.php">Panier</a></li>
            <li><a href="'.RACINE_SITE.'inscription.php">Inscription</a></li>
            <li><a href="'.RACINE_SITE.'connexion.php">Connexion</a></li>';
	}
	if(utilisateurEstConnecteEtEstAdmin())
	{
	echo   '<li><a href="'.RACINE_SITE.'admin/gestion_boutique.php">Gestion Boutique</a></li>
            <li><a href="'.RACINE_SITE.'admin/gestion_membre.php">Gestion membre</a></li>
            <li><a href="'.RACINE_SITE.'admin/gestion_commande.php">Gestion commande</a></li>';	
	}
?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="container">