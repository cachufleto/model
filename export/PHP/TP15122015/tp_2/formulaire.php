<?php


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
		<title>EXERCICE2 FORMULAIRE</title>
	</head>
	<body>
		<h1>EXERCICE 2 - FORMULAIRE</h1>
		
<?php
//var_dump($_POST);
//if($_POST)
//if(isset(var) && isset( ) && isset( )) {}
$nbCaractere=3;
$nbNombre=10;
$current_time = urlEncode(date("d-m-Y")).'<br />';
// echo $current_time;

//*******************************************
// Traitement Date de naissance en timestamp
//$current_time = urlEncode(date("d-m-Y")).'<br />';
//echo "**** ".$current_time;
//$php_timestamp_date = date("d/m/Y", strtotime("now"));

ini_set('date.timezone', 'Europe/Paris');
$timestampJour=strtotime("now").'<br />';
//echo $timestampJour.'<br />';

if(isset($_POST['date-de-naissance'])) {
$dateDeNaissance=strtotime(str_replace ( "/" , "-" , $_POST['date-de-naissance']));
}
//echo $dateDeNaissance.'<br />';

//**********************************************
// REGEX
// $motif='`[][(){}-=^\/!*?<>|:\]+"`';
//	if (preg_match ($motif,$_POST['nom']) ) {
//		echo "c est pas bon";
	 	# code...
//	 } 

// *********************************************


if ( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) &&
        strlen($_POST['nom']) > $nbCaractere && strlen($_POST['prenom']) > $nbCaractere
        &&  strlen($_POST['telephone']) == $nbNombre && $dateDeNaissance <= $timestampJour )
{
	//var_dump($_POST); // DEBUG
	$nom =  htmlentities($_POST['nom'], ENT_QUOTES);
	$prenom = htmlentities($_POST['prenom'], ENT_QUOTES);
	$telephone = htmlentities($_POST['telephone'], ENT_QUOTES);

			
	//$req = "INSERT INTO commentaire (pseudo, message, date) VALUES ('$pseudo', '$message', NOW())";
	//echo $req;	
	//$mysql1_repertoire->query($req) or die ($mysqli->error);	
	
	// DEBUG
	
	$MyNaissance=str_replace( "/" , "-" , $_POST['date-de-naissance']);
    $dateNaissanceForMysql=date('Y-m-d', strtotime($MyNaissance));
  
	
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$telephone=$_POST['telephone'];
	$profession=$_POST['profession'];
	$ville=$_POST['ville'];
	$codepostal=$_POST['codepostal'];
	$adresse=$_POST['adresse'];
	$DateDeNaissance=$dateNaissanceForMysql;
	$sexe=$_POST['sexe'];
	$description=$_POST['description'];

	echo 'nom: '.$nom.'<br />';
	echo 'prenom: '.$prenom.'<br />';
	echo 'telephone: '.$telephone.'<br />';
	echo 'profession: '.$profession.'<br />';
	echo 'ville: '.$ville.'<br />';
	echo 'codepostal: '.$codepostal.'<br />';
	echo 'adresse: '.$adresse.'<br />';
	echo 'date-de-naissance: '.$DateDeNaissance.'<br />';
	echo 'sexe: '.$sexe.'<br />';
	echo 'description: '.$description.'<br /><br />';	
					
} else {

  echo "Variable(s) nom remplie(s) correctement:  Nom, Prenom, Téléphone ou Date de naissance non valide(s)<br />";

}

?>		


		<form method="post" action="formulaire.php" >
			<div>
		    <fieldset>
		    	<legend>Informations</legend>
				<label for="nom">Nom *</label><br />
				<input type="text" pattern="\D{3,}" name="nom" id="nom" value="" 
				placeholder="3 caracteres minimun" /><br /> <!-- /[^\\*?<>|:\]+_]/-->
			
				<label for="prenom">Prénom *</label><br />
				<input type="text" pattern="\D{3,}" name="prenom" id="prenom" value="" placeholder="3 caracteres minimun" /><br />

				<label for="telephone">Téléphone *</label><br />
				<input type="text" pattern="\d{10}" name="telephone" id="telephone" 
				value="" placeholder="10 nombres sans espace" /><br />
				
				<label for="profession">Profession</label><br />
				<input type="text" name="profession" id="profession" value="" /><br />

				<label for="ville">Ville</label><br />
				<input type="text" name="ville" id="ville" value="" /><br />
				
				<label for="codepostal">Code Postal</label><br />
				<input type="text" name="codepostal" id="codepostal" value="" /><br />
				
				<label for="adresse">Adresse</label><br />
				<input type="text" name="adresse" id="adresse" value="" /><br />

				<!--<label for="date-de-naissance"><?php echo "Date"." de "."naissance"; ?></label><br /><br />
                <input type="text" pattern="\d{1,2}/\d{1,2}/\d{4}" name="date-de-naissance" id="date-de-naissance"  
				placeholder="JJ/MM/AAAA" /><br /><br />-->
				
				<label for="date-de-naissance">Date de Naissance</label><br /><br />
				<input type="date" name="date-de-naissance" pattern="\d{1,2}/\d{1,2}/\d{0,4}" placeholder="JJ/MM/AAAA" /><br />
	
				<label for="sexe">Sexe</label><br />
				homme <input type="radio" name="sexe" id="homme" value="m" checked>
				femme <input type="radio" name="sexe" id="femme "value="f"> <br /><br />
		
				<label for="description">Description</label><br />
				<textarea id="description" name="description" rows="6" cols="35"></textarea>
				<br />

			    <!-- *********************************************************************-->
					
				<!-- <label for="goût_1">J'aime la cerise</label>
				<input type="checkbox" id="goût_1" name="goût_cerise" value="1"> -->

				<!-- La deuxième valeur sera sélectionnée au début -->
				<!-- <select name="select">
 				 	<option value="value1">Valeur 1</option> 
  					<option value="value2" selected>Valeur 2</option>
  					<option value="value3">Valeur 3</option>
				</select> -->
			
			
				<input type="submit" name="enregistrement" value="Enregistrement" class="mon_bouton" />
			</fieldset>		
			</div>
		</form>
		

	</body>

</html>

<?php


//*********************************************
// connexion base
// 
$Repertoire = new Mysqli("localhost","root","","repertoire");


$Repertoire->query("INSERT INTO annuaire (nom,prenom,telephone,profession,ville,codepostal,adresse,date_de_naissance,sexe,description) VALUES ('$nom','$prenom','$telephone','$profession','$ville','$codepostal','$adresse','$DateDeNaissance','$sexe','$description')") or die ("Erreur sur la requete: ".$Repertoire->error);

 
//*********************************************

//$repertoirer->query("INSERT INTO employes (prenom,nom) VALUES ('test1','test2')") or die ("Erreur sur la requete: ".$mysqli->error);







	















