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

if(isset($_POST['ajouter'])){
    if(!empty($_POST['titre']) && !empty($_POST['article'])){
        $titre = htmlentities($_POST['titre'], ENT_QUOTES);
        $article = htmlentities($_POST['article'], ENT_QUOTES);
        $id_auteur = $_SESSION['auteur']['id_auteur'];
        $date = date('Y-m-d H:i:s');
        executeRequete("INSERT INTO articles (id_article, titre, article, id_auteur, date) VALUES ('', '$titre', '$article', '$id_auteur', '$date')");
        $message = '<div class="alert alert-success">Votre article à bien été enregistré<br/>Merci de votre colaboration !</div>';
    } else {
        $message = '<div class="alert alert-danger">Vous n\'avez pas remplis les champs requis !</div>';
    }
}
//var_dump($_POST);
//var_dump($_SESSION);

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
    <h2>Ajouter des articles</h2>
    <div class="message">
        <?php
        if(!empty($message)){
            echo $message;
        }
        ?>
    </div>
    <form class="form-group" method="post" action="">
        <fieldset>
            <legend>Ajouter un article</legend>
            <label for="titre">Le titre</label>
            <br/>
            <input class="form-control" type="text" id="titre" name="titre"/>
            <br/>
            <label for="article">Le message</label>
            <br/>
            <textarea class="form-control" id="article" name="article" rows="5"></textarea>
            <br/>
            <input class="form-control btn btn-primary" type="submit" name="ajouter" value="Ajouter">
        </fieldset>
    </form>
  </div>
</section>
<footer>
    <h3>Mon blog pour comprendre Symfony</h3>
</footer>
<script src="js/bootstrap.js"></script>
</body>
</html>
