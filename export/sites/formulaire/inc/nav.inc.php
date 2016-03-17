<?php 
	listeMenu();
?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">LOGO</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
		  <?php echo liste_nav(); 
				echo (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['statut'] == 1)? 
					'<li><a style="color:red;">[ADMIN '.$_SESSION['utilisateur']['id_membre'].']</a></li>' : 
					((isset($_SESSION['utilisateur']))? 
					'<li><a style="color:red;">"'.$_SESSION['utilisateur']['pseudo'].'"</a></li>' : 
					'');
			?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
