<?php
// cr�ation d'une fonction qui permet de retourner un prix en fonction d'un fruit et d'un poids.
// cette fonction doit recevoir 2 arguments obligatoires.
// le premier argument $fruit contiendra la chaine de caract�re du fruit recherch�
// le deuxi�me argument contiendra le poids concern�.
	function calcul($fruit, $poids)
	{
		switch($fruit)
		{
			case 'cerises': $prix_kg = 5.76;break;
			case 'bananes': $prix_kg = 1.09;break;
			case 'pommes': $prix_kg = 3.26;break;
			case 'papayes': $prix_kg = 3.9;break;
			default: return 'Fruit inexistant !'; break;			
		}
		$resultat = round(($poids*$prix_kg/1000), 2);
		// grammes * prix au kilo / 1000
		return 'Les '.$fruit. ' coutent '.$resultat.' Euros pour '. $poids.' grammes<br />' ;
	}


