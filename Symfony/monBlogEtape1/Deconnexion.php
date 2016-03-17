<?php
session_start();

$message = "";

function auteurConnecte()
{
    if(isset($_SESSION['auteur'])){
        return true;
    } else {
        return false;
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
    $_SESSION = null;
    session_destroy();
    $message = '<div class="alert alert-success">Vous ètes déconnecté <br/>A bientôt !</di>';
}
?>
<!DOCTYPE>
<html>
<head>
    <title>Mon blog pour comprendre Symfony</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
</head>
<body>
<header class="row">
  <div class="col-md-offset-3 col-md-6">
    <h1><span class="glyphicon glyphicon-road"></span> Mon blog pour comprendre Symfony</h1>
  </div>
</header>
<nav class="navbar navbar-default navbar-static-top">
    <ul class="nav navbar-nav">
        <?php
        if(!auteurConnecte()){
            echo '<li><a href="connexion.php">Connexion</a></li>
                  <li><a href="index.php">Les articles</a></li>
                 ';
        } else {
            echo '<li><a href="index.php">Les articles</a></li>
                  <li><a href="ajouter_article.php">Ajouter un article</a></li>
                  <li><a href="Deconnexion.php">Déconnexion</a></li>
                 ';
        }
        ?>
    </ul>
</nav>
<section class="row">
  <div class="col-md-offset-3 col-md-6">
    <h2>Déconnexion</h2>
    <?php
        if(auteurConnecte()) {
            echo '<h3>Pour vous déconnecter cliquer <a class="btn btn-primary" href="Deconnexion.php?action=deconnexion">ICI</a></h3>';
        } else {
            if(!empty($message)){
                echo $message;
            }
        }
    ?>
  </div>
</section>
<footer>
    <h3>Mon blog pour comprendre Symfony</h3>
</footer>
<script src="js/bootstrap.js"></script>
</body>
</html>
