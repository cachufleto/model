<?php
session_start();

$mysqli = new Mysqli("localhost", "root", "", "diwoo10_symfony_monBlog");
if($mysqli->connect_error){
    die("Ta un problème sur ta connection à la base de données mec!");
}

$message = "";

function executeRequete($req)
{
    global $mysqli;
    $requete = $mysqli->query($req);

    if(!$requete)
    {
        die ("Erreur sur la requete SQL<br/><b>Message : </b>".$mysqli->error."<br/>Requete : ".$req);
    }
    return $requete;
}

function auteurConnecte()
{
    if(isset($_SESSION['auteur'])){
        return true;
    } else {
        return false;
    }
}

$id_article = $_GET['id_article'];
if(isset($_POST['supprimer'])){
    executeRequete("DELETE FROM articles WHERE id_article = '$id_article'");
    $message = '<div class="alert alert-success">L\'article à bien été supprimé !</div>';
}

//var_dump($_GET);
//ar_dump($_POST);
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
    <h2>Supprimer des articles</h2>
      <div class="message">
          <?php
          if(!empty($message)){
              echo $message;
          }
          ?>
      </div>
    <?php
        if(auteurConnecte()){
            if(empty($_POST)){
                if($_GET['action'] = 'supprimer' && isset($_GET['id_article'])){
                    ?>
                    <form method="post" action="">
                        <label>Êtes-vous sur de vouloir suprimer l'article ?</label>
                        <br/>
                        <input class="form-control btn btn-primary" type="submit" name="supprimer" value="Supprimer"/>
                    </form>
                    <?php
                }
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
