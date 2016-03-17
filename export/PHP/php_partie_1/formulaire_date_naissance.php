<?php
// exercice sur formulaire date de naissance:
// faire un champs select qui contiendra les jours de 1 à 31
// faire un champs select qui contiendra les 12 mois de l'année en toute lettre (mettre les mois dans un tableau ARRAY et utiliser une boucle foreach)
// faire un champs pour l'année qui remonte jusqu'à 1930
?>

<form method="" action="" >
	<label for="jour">Jour</label>
	<select id="jour" name="jour">
<?php
	for($i = 1; $i <= 31; $i++)
	{
		echo '<option>'.$i.'</option>';
	}
?>			
	</select>
	
	<label for='mois'>Mois</label>
	<select id="mois" name="mois">
<?php
$mois = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
	foreach($mois AS $val)
	{
		echo '<option>'.$val.'</option>';
	}
?>		
	</select>
	
	<label for="annee">Annee</label>
	<select name="annee" id="annee">
<?php
	/* $annee_en_cours = date("Y");
	
	while($annee_en_cours >= 1930)
	{
		echo '<option>'.$annee_en_cours.'</option>';
		$annee_en_cours--;
	} */
	$annee_en_cours = date("Y");
	for($annee_en_cours; $annee_en_cours >= 1930; $annee_en_cours--)
	{
		echo '<option>'.$annee_en_cours.'</option>';
	}
	
	
?>		
	</select>
</form>

<?php
// var_dump($mois);
// echo $annee_en_cours;






