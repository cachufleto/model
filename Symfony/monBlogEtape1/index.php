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

$articles_en_BDD = executeRequete("SELECT * FROM articles");

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
  <div class="col-md-offset-2 col-md-8">
    <h2>Liste des articles</h2>
    <table class="table table-striped table-bordered">
        <caption>Les articles</caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Article</th>
                <th>Auteur</th>
                <th>Date</th>
                <?php
                    if(auteurConnecte()){
                        echo '<th>Modifier</th>';
                        echo '<th>Supprimer</th>';
                    }
                ?>
            </tr>
        </thead>
        <tbody>
        <?php
        while($article = $articles_en_BDD->fetch_assoc())
        {
            echo '<tr>';
                echo "<td>".$article['id_article']."</td>";
                echo "<td>".$article['titre']."</td>";
                echo "<td>".$article['article']."</td>";
                echo "<td>".$article['id_auteur']."</td>";
                echo "<td>".$article['date']."</td>";
                if(auteurConnecte()) {
                    echo "<td><a href='modifier_article.php?action=modification&id_article=".$article['id_article']."'>MODIF</a></td>";
                    echo "<td><a href='supprimer_article.php?action=supprimer&id_article=".$article['id_article']."'>SUPPR</a></td>";
                }
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
  </div>;
</section>
<footer>
    <h3>Mon blog pour comprendre Symfony</h3>
</footer>
<script src="js/bootstrap.js"></script>
</body>
</html>
