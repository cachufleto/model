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

$articles_en_BDD = executeRequete("SELECT * FROM articles WHERE id_article = '$id_article'");
$article = $articles_en_BDD->fetch_assoc();

if(isset($_POST['modification'])){
    if(!empty($_POST['titre']) && !empty($_POST['article'])){
        $titre = htmlentities($_POST['titre'], ENT_QUOTES);
        $article_mis_a_jour = htmlentities($_POST['article'], ENT_QUOTES);
        $date = date('Y-m-d H:i:s');
        executeRequete("UPDATE articles SET titre = '$titre', article = '$article_mis_a_jour', date = '$date' WHERE id_article = '$id_article'");
        $message = '<div class="alert alert-success">Votre article à été modifié !</div>';
    } else {
        $message = '<div class="alert alert-danger">Vous n\'avez pas remplis les champs requis !</div>';
    }
}

//var_dump($_GET);
//var_dump($_POST);
//var_dump($article);
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
    <h2>Modifier les articles</h2>
    <div class="message">
        <?php
        if(!empty($message)){
            echo $message;
        }
        ?>
    </div>
    <?php
        if(isset($_GET['action']) && isset($_GET['id_article'])){
            ?>
            <form class="form-group" method="post" action="">
                <fieldset>
                    <label for="titre">Titre</label>
                    <br/>
                    <input class="form-control" type="text" id="titre" name="titre" value="<?php if($_GET['id_article'] == $article['id_article']){echo $article['titre'];} ?>"/>
                    <br/>
                    <label for="article">Article</label>
                    <br/>
                    <textarea class="form-control" id="article" name="article" rows="5"><?php if($_GET['id_article'] == $article['id_article']){echo $article['article'];} ?></textarea>
                    <br/>
                    <input class="form-control btn btn-primary" type="submit" name="modification" value="Modification"/>
                </fieldset>
            </form>
    <?php
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
