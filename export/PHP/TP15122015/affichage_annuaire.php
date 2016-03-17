<?php


$Repertoire = new Mysqli("localhost","root","","repertoire");
$resultat1=$Repertoire->query("select * from annuaire");
// on recupere le contenu de la table annuaire

//echo 'Nbe de ligne: '.$resultat1->num_rows.'<br />';
$nb_ligne=$resultat1->num_rows;
$nb_col=$resultat1->field_count; // on recupere le
//nombre de colonne dans notre $resultat1



echo '<table border="1" style="border-collapse:collapse;">';
	echo '<tr>';
	for($i=0; $i < $nb_col; $i++ )
	{
		$colonne = $resultat1-> fetch_field();
	//var_dump($colonne);
	echo '<th>'.$colonne->name.'</th>';

}


	echo '</tr>';
	// while ($ligne = $resultat1->fetch_assoc()) {
	while ($ligne = $resultat1->fetch_assoc()) {
		echo '<tr>';
		foreach ($ligne as $valeur) {
			echo '<td>'.$valeur.'</td>';
			# code...
		}
		echo '</tr>';
		# code...
	}
echo '</table>';

$resultat2=$Repertoire->query("select count(sexe) as m from annuaire where sexe='m'");
$resultat3=$Repertoire->query("select count(sexe) as f from annuaire where sexe='f'");

$countHomme=$resultat2->fetch_assoc();
$countFemme=$resultat3->fetch_assoc();

//var_dump($countHomme).'<br />';
//var_dump($countFemme).'<br />';

$resultat4=$Repertoire->query("select * from annuaire order by id_annuaire asc limit 1");

$nb_col4=$resultat4->fetch_field;

echo '<table border="1" style="border-collapse:collapse;"><br /><br /';
	echo '<tr>';
	for($i=0; $i < $nb_col4; $i++ )
	{
		$colonne = $resultat4->fetch_field();
	//var_dump($colonne);
	echo '<th>'.$colonne->name.'</th>';

}
	
    
	echo '</tr>';
	while ($ligne = $resultat4->fetch_assoc()) {
		echo '<tr>';
		foreach ($ligne as $valeur) {
			echo '<td>'.$valeur.'</td>';
			# code...
		}
		echo '</tr>';
		# code...
	}
echo '</table>';


echo 'il y a: '.$countHomme['m'].' homme(s) et '.$countFemme['f'].' femme(s).<br />';



while ($ligne2 = $resultat2->fetch_assoc()) {
	
			echo $ligne2.'<br />';
			# code...
		}

while ($ligne3 = $resultat3->fetch_assoc()) {
		
			echo $ligne3.'<br />';
			# code...
		}

// on recupere le contenu de la table annuaire
// 

$nom="1";$prenom="";$telephone="";$profession="";$ville="";$codepostal="";$adresse="";$sexe="";$description="";
$DateDeNaissance="";

$champsMysql=array(
"nom"=>$nom,
"prenom"=>$prenom,
"telephone"=>$telephone,
"profession"=>$profession,
"ville"=>$ville,
"codepostal"=>$codepostal,
"adresse"=>$adresse,
"date_de_naissance"=>$DateDeNaissance,
"sexe"=>$sexe,
"description"=>$description
);
//var_dump($champsMysql);

echo '<table border="1" style="border-collapse:collapse;"><br /><br /';
	echo '<tr>';

foreach ( $champsMysql as $value ) {
	
 		echo '<td>'.$value.'</td>';

 	//echo $value.'<br />';
 } 
	echo '</tr>';
echo '</table>';
