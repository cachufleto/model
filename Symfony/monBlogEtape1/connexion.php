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

if(isset($_POST['connexion']) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])){
    $pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES);
    $mdp = htmlentities($_POST['mdp'], ENT_QUOTES);

    $auteur_en_BDD = executeRequete("SELECT * FROM auteurs WHERE pseudo = '$pseudo' AND mdp ='$mdp'");

    if($auteur_en_BDD->num_rows > 0){
        $auteur = $auteur_en_BDD->fetch_assoc();
        foreach($auteur as $indice => $valeur){
            $_SESSION['auteur'][$indice] = $valeur;
        }
        $message = '<div class="alert alert-success">Vous voila Connecté !</div>';
    } else {
        $message = '<div class="alert alert-danger">Qui vous ètes? Je ne vous connais pas encore</div>';
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
            <h2>Connexion</h2>
            <div class="message">
                <?php
                if(!empty($message)){
                    echo $message;
                }
                ?>
            </div>
            <form class="form-group" method="post" action="">
                <fieldset>
                    <legend>Se connecter</legend>
                    <label for="pseudo">Votre pseudo</label>
                    <br/>
                    <input class="form-control" type="text" id="pseudo" name="pseudo"/>
                    <br/>
                    <label for="mdp">Mot de passe</label>
                    <br/>
                    <input class="form-control" type="text" id="mdp" name="mdp"/>
                    <br/>
                    <input class="form-control btn btn-primary" type="submit" name="connexion" value="Connexion"/>
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
