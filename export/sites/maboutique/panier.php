<?php
require_once("inc/init.inc.php");

creationDuPanier();

if(isset($_POST['ajout_panier']))
{
	$id_article = $_POST['id_article'];
	$sql = "SELECT * FROM article WHERE id_article = '$id_article'";
	
	if( $resultat = ((is_numeric($id_article))? executeRequete($sql) : FALSE) )
	{
		$article = $resultat->fetch_assoc();
		ajouterUnArticleDansPanier($article['titre'], 
			$id_article, 
			(is_numeric($_POST['quantite'])? $_POST['quantite'] : 0), 
			$article['prix'] * 1.2);
		header("Location:index.php");
		exit();
	}
	
}

if(isset($_POST['payer'])){
	$msg = decompterUnPanierArticle();
}

if(isset($_POST['vider'])){
	//on supprime l'indice fournit
	if(isset($_POST['id']) && isset($_POST['id'])){
		supprimerUnArticleDansPanier($_POST['id'], $_POST['vider']);
	}else{
		unset($_SESSION['panier']);
		creationDuPanier();
	}
}

$tableau = !empty($_SESSION['panier']['id_article'])
		? '<tr><th colspan="5">PANIER</th><td><form action="" method="post">
			<input class="btn btn-warning" type="submit" name="vider" value="Vider le panier" 
			onClick="return(confirm(\'êtes-vous sur ?\'));">
			</form>
			</td></tr>'
		: '<tr><th colspan="6">PANIER</th></tr>';
		
$tableau .=	'
		<tr><th>Titre</th><th>Article</th><th>Quantité</th><th>Prix unitaire</th><th>Prix total</th><th>action</th></tr>';

if(!empty($_SESSION['panier']['id_article'])){
	$totalTTC = 0;
	foreach($_SESSION['panier']['id_article'] as $indice => $id){

		// somme total par article
		$sous_total = $_SESSION['panier']['prix'][$indice] * $_SESSION['panier']['quantite'][$indice];

		// affichage tableau
		$tableau .='
		<tr><td>'.$_SESSION['panier']['titre'][$indice].'</td>
			<td>'.$id.'</td>
			<td>'.$_SESSION['panier']['quantite'][$indice].'</td>
			<td>'.$_SESSION['panier']['prix'][$indice].'&euro;</td>
			<td>'.$sous_total.'&euro;</td>
			<td><form action="" method="post">
			<input class="btn btn-danger" type="submit" name="vider" value="-">
			<input class="btn btn-danger" type="submit" name="vider" value="+">
			<input class="btn btn-danger" type="submit" name="vider" value="X">
			<input type="hidden" name="id" value="'.$id.'" 
			onClick="return(confirm(\'êtes-vous sur ?\'));">
			</form></td>
		</tr>';

		// somme total à payer
		$totalTTC += $sous_total;
		$tva = ($totalTTC/1.2) * 0.2;

	}
	
	// boutton pour payer ou se connecter
	$payer = (utilisateurEstConnecte()) 
			?	'<form action="" method="post">
				<input class="btn btn-success" type="submit" name="payer" value="payer"></form>' 
			:	'<a href="connexion.php"><button type="button" class="btn btn-warning">Se connecter</button></a>';
	
	// affichage du total
	$tableau .='
	<tr>
		<td colspan="3" rowspan="2"></td>
		<td>TOTAL</td>
		<td>'. $totalTTC .'&euro; TTC</td>
		<td rowspan="2">' .$payer. '</td>
	</tr>
	<tr>
		<td>Dont TVA</td>
		<td>'.$tva.'&euro;</td>
	</tr>';
	
	if(utilisateurEstConnecte()){
		$tableau .='
	<tr>
		<td colspan="3">Vous serez livrée à l\'adresse suivante:</td>
		<td colspan="2">'.
				$_SESSION['utilisateur']['adresse'].'<br>'.
				$_SESSION['utilisateur']['cp']." ".
				$_SESSION['utilisateur']['ville'].'</td>
		<td><a href="profil.php"><button type="button" class="btn btn-warning">Modifier adresse</button></a></td>
	</tr>';
	}
	
}else{
	$tableau .='
	<tr><th colspan="6">Votre panier est vide!</th></tr>';

}

#############################################################################

require_once("inc/header.inc.php");
require_once("inc/nav.inc.php");
echo $msg;
?>
    <div class="starter-template">
    <h1><span class=""></span> Panier</h1>
	<hr />
    </div>
	<div class="col-md-8 col-md-offset-2">
	<table class="table" border="1">
		<?php 
		echo $tableau;
		?>	
	</table>
	</div>
    </div><!-- /.container -->
<?php
debug($_SESSION['panier']);
require_once("inc/footer.inc.php");
	
	
	

