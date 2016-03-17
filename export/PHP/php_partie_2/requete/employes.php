<?php

$mysqli = new Mysqli("localhost", "root", "", "diwoo10_entreprise"); // La classe Mysqli a besoin de 4 arguments: hôte / login / password / nomdelaBDD
echo '<meta charset="utf-8" />';
/*
	$mysqli représente un objet issue de la classe Mysqli
	Quand on exécute une requete de type SELECT sur l'objet $mysqli via la methode query():
		- Succès: on obtient un nouvel objet issue de la classe Mysqli_result. Cet objet a des methodes et propriétés différentes.
		- Echec: on obtient un boolean FALSE.
	
	Quand on exécute une requete de type INSERT / UPDATE / DELETE via la methode query()
		- Succès: on obtient TRUE
		- Echec: on obtient FALSE.

	Ne pas hésiter à lancer des var_dump des résultats obtenus.		
*/

// var_dump($mysqli);

// Erreur sql volontaire:

	$mysqli->query("orligjrlejglj");
	
	echo $mysqli->error . '<br />'; // permet d'observer la dernière erreur SQL. error est une propriété de l'objet $mysqli
echo '<hr /><hr /><hr />';
// Exécuter une requete SQL dans du PHP

	// $mysqli->query("INSERT INTO employes (prenom, nom) VALUES ('test1', 'test2')") or die ("Erreur sur la requete: ".$mysqli->error); // or die permet de bloquer le script et de nous renvoyer un message sous forme de chaine de caractères.
	
	// echo 'Nombre d\'enregistrement affecté: '.$mysqli->affected_rows . '<br />'; // nb d'enregistrement affecté par la dernière requete.
	
// Boucle while permet d'afficher chaque ligne de la table resultat	(tant que l'on possède des enregistrement, on les traite !)
	
	$resultat = $mysqli->query("SELECT * FROM employes"); // $resultat contient notre résultat sous forme inexploitable.
	
	echo 'Nombre d\'employes: ' . $resultat->num_rows . '<br />'; // num_rows est une propriété de l'objet issue de la classe mysqli_result contenant le nombre de ligne de la dernière requete SELECT
	// var_dump($resultat);
	
	while($ligne = $resultat->fetch_assoc())
	{ // la boucle while permet de faire avancer le curseur à la ligne suivante de notre resultat à chaque tour de boucle. Et rends cette ligne exploitable grace à la methode fetch_assoc() qui transforme la ligne en cours en tableau ARRAY représenté par $ligne.
		
		//var_dump($ligne);
		echo $ligne['prenom'] . '<br />';
		
	}
// Attention, il n'y a pas un tableau ARRAY avec tous les résultats mais un tableau ARRAY par ligne de notre résultat.

// Votre requete sort plusieurs lignes: un boucle !
// votre requete sort un seule et unique ligne: pas de boucle (juste un fetch_assoc())
// votre requete sort potentiellement 1 ou plusieurs lignes de dans notre resultat: un boucle !

// Traiter l'affichage d'une requete sous forme exploitable:

	$result = $mysqli->query("SELECT * FROM employes WHERE id_employes=7499");
	echo 'Nombre: ' . $result->num_rows . '<br />';
	
	
	// $employes = $result->fetch_assoc(); // fetch_assoc() pour un tableau indexé avec le nom des colonnes.
	// $employes = $result->fetch_row(); // fetch_row() pour un tableau indexé numériquement.
	// $employes = $result->fetch_array(); //  fetch_array(): melange de fetch_assoc() + fetch_row()
	$employes = $result->fetch_object(); // fetch_object() retourne un objet avec les noms des champs comme propriétés publiques.	
	var_dump($employes);
	
	// pour afficher le prénom:
	echo $employes->prenom . '<br />'; // avec fetch_object()
	// $employes['prenom'] // fetch_assoc()
	// $employes[0] // fetch_assoc()
	// $employes[1] // fetch_row()
	
// Afficher la liste des bases de données dans une liste ul li. 
	
	$liste_BDD = $mysqli->query("SHOW DATABASES");
	
	echo '<ul>';
	
	while($ma_base = $liste_BDD->fetch_assoc())
	{
		// var_dump($ma_base);
		echo '<li>' . $ma_base['Database'] . '</li>';
	}
	echo '</ul>';
	
// Afficher le resultat de notre requete sous forme de tablau html.

	$resultat = $mysqli->query("SELECT * FROM employes");
	// on récupère le contenu de la table employes sous forme inexploitable => $resultat
	
	$nb_col = $resultat->field_count; // on récupère le nombre de colonnes contenu dans notre résultat.
	
	echo '<table border="1" style="border-collapse: collapse;">';
	echo '<tr>';
	for($i=0; $i<$nb_col; $i++)
	{
		$colonne = $resultat->fetch_field();
		// var_dump($colonne);
		echo '<th>'. $colonne->name . '</th>';
	}
	echo '</tr>';
	
	while($ligne = $resultat->fetch_assoc())
	{
		echo '<tr>';
		foreach($ligne AS $valeur_en_cours)
		{
			echo '<td>'.$valeur_en_cours.'</td>';
		}
		echo '</tr>';
	}	
	
	echo '</table>';
	


















