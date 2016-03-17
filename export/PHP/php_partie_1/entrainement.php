<meta charset="utf-8" />
<style>
	h2 {padding: 10px; background-color: black; color: white}
	*{ font-family: calibri;}
</style>

<h2>Ecriture et affichage</h2>
<!-- tout d'abord, il est possible d'écrire du html dans un fichier .php, l'inverse n'est pas possible. -->

<?php 

	echo 'Bonjour'; // echo est une instruction d'affichage.
	
	echo '<br />'; // il est possible d'écrire du html via un echo.

	echo '<hr /><h2>Commentaires</h2>';
	
	echo 'Texte'; // ceci est un commentaire sur une seule ligne
	
	echo 'Texte'; /*
	
		ceci est un commentaire
		
		sur  
		plusieurs lignes.
	*/

	echo 'Texte'; # ceci est commentaire sur une seule ligne.
	
	print '<br />nous sommes mardi'; // print est une autre instruction d'affichage.

	
	
	echo '<hr /><h2>Variable: type / déclaration / affectation</h2>';

	// une variable est un espace nomm permettant de conserver une valeur.
	
// déclaration d'une variable avec le signe $
// /!\ les variables sont sensibles à la casse.
// le nom d'une variable ne peut pas commencer par un chiffre.

	$a = 127; // affectation de la valeur 127 dans la variable $a
	echo gettype($a); // gettype() est une fonction prédéfinie nous permettant de voir le type d'une variable. ici => integer
	echo '<br />';
	
	$b = 1.5; // ici => double / chiffre à virgule
	echo gettype($b);
	echo '<br />';
	
	$a = 'une chaine'; // ici => string / chaine de caractères
	echo gettype($a);
	echo '<br />';
	
	$b = '127';
	echo gettype($b); // ici => string 
	echo '<br />';
	
	$a = TRUE; // ici => boolean
	echo gettype($a);
	echo '<br />';
	
	$b = FALSE;
	echo gettype($b); // ici => boolean
	echo '<br />';
	
	echo '<hr /><h2>Concaténation</h2>';
	
	$x = 'Bonjour ';
	$y = 'tout le monde';
	
	echo $x . $y . '<br />'; // point de concaténation que l'on peut traduire par suivi de.
	
	echo '<br />','Bonjour','<br />'; // concaténation avec une virgule, les deux sont possible.
	
	echo '<hr /><h2>Concaténation lors de l\'affectation</h2>';
	
	$prenom1 = "Bruno";
	$prenom1 = "Claire";
	
	echo $prenom1.'<br />';
	
	$prenom2 = 'Nicolas'; // affectation de la valeur Nicolas dans la variable prenom2
	$prenom2 .= ' Marie'; // affectation de la valeur Marie dans la variable prenom2 en revanche avec le point de concaténation devant le signe = , cela rajoute sans remplacer la valeur précédente.
	
	echo $prenom2 . '<br />';
	
	echo '<hr /><h2>Guillemets et quotes</h2>';
	
	$message = "aujourd'hui"; // sinon 'aujourd\'hui'
	
	$text = "Bonjour";
	
	echo $text . ' tout le monde<br />'; // avec la concaténation
	echo "$text tout le monde<br />"; // dans des guillemets, une variable est reconnue est interprétée
	echo '$text tout le monde<br />'; //dans des quotes, la vraible n'est pas reconnue et donc pas interprétée.

	echo '<hr /><h2>Constante et constante magique</h2>';
	
	define("CAPITALE", "Paris"); // déclaration de la constante CAPITALE
	
	echo CAPITALE . '<br />'; // affichage de la constante
	
	// constante magique
	
	echo __FILE__ . '<br />'; //chemin complet vers le fichier
	echo __LINE__ . '<br />'; // numéro de la ligne.
	
	echo '<hr /><h2>Exercice variable</h2>';
	// exercice: afficher Bleu - Blanc - rouge (avec les tirets) en plaçant chaque couleur dans une variable.
	
	$a = 'Bleu'; $b = 'Blanc'; $c = 'Rouge';
	
	echo $a . ' - ' . $b . ' - ' . $c . '<br />';
	echo "$a - $b - $c<br />";
	
	echo '<hr /><h2>opérateur arithmétique</h2>';
	
	$a = 10; $b = 2;
	
	echo $a+$b . '<br />'; // affiche 12
	
	echo $a-$b;
	echo $a/$b;
	echo $a*$b;
	
	// opération / affectation
	
	$a = 10; $b = 2;
	
	$a += $b; // équivaut à => $a = $a+$b
	$a *= $b; // équivaut à => $a = $a*$b
	
	$a++; // équivaut à => $a = $a+1;
	
	
	echo '<hr /><h2>Structure conditionnelle (if / else) - opérateur de comparaison</h2>';
	
	// empty / isset 
	// empty => test si c'est vide
	// isset => test si c'est défini (si c'est existant)
	
	
	$var1 = 0; // ou false, ou ""
	$var2 = ''; // chaine vide 
	
	if(empty($var1))
	{
		echo '0, vide ou non définie<br />'; // empty test si c'est à 0, vide ou non définie
	}
	
	if(isset($var2))
	{
		echo 'la variable $var2 existe';
	}
	
// if, elseif, else
	
	$a = 10; $b = 5; $c = 2;
	
	if($a > $b) // si a est strictement supérieur à b
	{
		print 'a est supérieur à b<br />';
	}
	elseif($b > $c)
	{
		print 'b est supérieur à c<br />'; // on ne rentrera jamais dans ce elseif car nous sommes déjà rentré dans le if. Un seul cas possible !!!
	}
	else { // sinon cas par defaut
		print 'aucune des premières conditions n\'est exacte<br />';
	}
	
	if($a > $b && $b > $c) // si a est supérieur à b ET dans le même temps b est supérieur à c
	{
		echo 'ok pour les deux conditions<br />';
	}
	
	if($a == 9 || $b > $c) // si $a a la valeur de 9 OU si $b est supérieur à $c
	{
		echo 'ok pour au moins une des deux conditions<br />';
	}
	
	if($a == 10 XOR $b == 6)
	{
		echo 'ok condition exclusive<br />';// condition exclusive => uniquement une des deux conditions est bonne. Si les deux conditions sont bonnes ou fausses, on ne rentre pas.
	}

	echo ($a == 10) ? 'a est égal à 10<br />' : 'a n\'est pas égal à 10<br />';
	
	// forme contractée: autre possibilité d'écrire des if / else.
	// le ? remplace le if 
	// les : remplacent le else

	if($a == 8)
	{
		echo 'réponse 1: a vaut 8<br />';
	}
	elseif($a != 10)
	{
		echo 'réponse 2: a est différent de 10<br />';
	}
	else {
		echo 'réponse 3: les deux premières conditions sont fausses !<br />';
	}

	// comparaison
	
	$a = 1;
	$b = "1";
	
	if($a === $b)
	{
		echo 'il s\'agit de la même chose<br />';
	}
	
	/*
	=	affectation
	==	comparaison des valeurs
	===	comparaison des valeurs et du type
	*/
	
	echo '<hr /><h2>Condition switch</h2>';
	
	// les 'case' représentent des cas différent dans lesquel nous pouvons potentiellement tomber.
	
	$couleur = 'jaune';
	
	switch($couleur)
	{
		case 'bleu':
			echo 'vous aimez le bleu <br />';
		break;		
		case 'rouge':
			echo 'vous aimez le rouge <br />';
		break;		
		case 'vert':
			echo 'vous aimez le vert <br />';
		break;		
		default:
			echo 'vous n\'aimez ni le bleu ni le rouge ni le vert<br />';
		break;
	}
	
// faire la même condition avec if elseif else

	if($couleur == 'bleu')
	{
		echo 'vous aimez le bleu <br />';
	}
	elseif($couleur == 'rouge')
	{
		echo 'vous aimez le rouge <br />';
	}
	
	elseif($couleur=='vert')
	{
		echo 'vous aimez le vert <br />';
	}
	else {
		echo 'vous n\'aimez ni le bleu ni le rouge ni le vert<br />';
	}
	
	echo '<hr /><h2>fonction prédéfinie</h2>';
	
	echo 'Date: <br />';
	echo date("d-m-Y"); // date() est une fonction prédéfinie nous permettant d'afficher la date en cours.
	
	echo '<hr /><h2>fonction prédéfinie: traitement des chaines(strlen / strpos / substr)</h2>';
	
	$email = "mathieu.ifocop@gmail.com";
	
	echo strpos($email, '@') . '<br />'; // nous renvoi la position du caractère fourni en deuxième argument ici '@'  /!\ le premier caractère de la chaine a la position 0
	
	$email2 = 'bonjour';

	echo strpos($email2, '@') . '<br />';
	
	var_dump(strpos($email2, '@')); // grace à var_dump, on apperçoit le FALSE si le caractère @ n'est pas trouvé. var_dump est donc une instruction d'affichage améliorée que l'on utilise régulièrement en phase de developpement
	
	/*
	strpos() 	=> en cas de succès on obtient un INT
				=> en cas d'echec on obtient le boolean FALSE
	argument:
				=> premier argument => la chaine dans laquelle chercher
				=> deuxième argument => l'information que l'on cherche.
	*/
	
	// strlen 
	
	$phrase = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
	
	echo strlen($phrase);
	echo '<br />';
	// strlen() nous renvoi la taille d'une chaine de caractère en terme d'octet.
	// pour avoir la taille d'une chaine avec l'encodage utf-8 privilégier => mb_strlen()
	// exemple: mb_strlen('kehfezé', 'utf-8');
	
	
	//substr
	$texte = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec mauris in tellus mollis gravida. Phasellus ullamcorper, purus vel suscipit pharetra, mi tellus facilisis dui, sed commodo orci lorem eu orci. Curabitur orci eros, eleifend vitae justo sed, aliquam feugiat libero. Pellentesque blandit arcu in quam accumsan, in aliquam ante auctor.';
	
	echo substr($texte, 0, 20) . "... <a href=''>lire la suite</a>";
	
	
	echo '<hr /><h2>Structure itérative: Boucle</h2>';
	
	$i = 0; // valeur de départ
	
	while($i < 3) // condition d'entrée
	{
		echo $i . '--';
		$i++; // incrémentation / équivalent à $i = $i+1
	}
	
// affiche 0--1--2--
// exercice: faire en sorte de ne pas avoir les '--' après le 2
// => 0--1--2	
	
	echo '<br />';
	
	$i = 0;
	while($i < 3) 
	{
		if($i == 2)
		{
			echo $i;
		}else {
			echo $i . '--';
		}		
		$i++;
	}
	echo '<br />';
// boucle for

	for($j = 0; $j < 16; $j++) // for(valeur de depart; condition d'entrée; incrémentation )
	{
		print $j . '<br />';
	}
	

	echo '<hr /><h2>Inclusion de fichiers</h2>';
	
	
	echo '<strong>Première fois avec include:</strong> <br />';
	
	include("exemple.inc.php");
	
	echo '<hr />';
	echo '<strong>Deuxième fois avec include_once:</strong> <br />';
	include_once("exemple.inc.php");
	
	echo '<hr />';
	
	echo '<strong>Première fois avec require:</strong> <br />';
	require("exemple.inc.php");
	
	echo '<hr />';
	
	echo '<strong>Deuxième fois avec require_once:</strong> <br />';
	require_once("exemple.inc.php");
	
	echo '<hr />';
	
	/*
		- avec include: si le fichier n'est pas trouvé, include fait une erreur et continu l'exécution du code
		- avec require: si le fichier n'est pas trouvé, require fait une erreur et stop l'exécution du code.	
	*/
	
	echo '<hr /><h2>Tableau de données ARRAY</h2>';
// un tableau est déclaré un peu comme une variable améliorée, car on ne conserve pas une valeur mais un ensemble de valeur.
		
	$liste = array("Grégoire", "Nathalie", "Marie", "Emilie", "Georges");
	
	echo '<b>Avec print_r: </b><br />';
	print_r($liste); // print_r() afiche le contenu d'un tableau.
	echo '<hr />';
	
	echo '<pre>'; print_r($liste); echo '</pre>';
	
	echo '<b>Avec var_dump: </b><br />';
	
	var_dump($liste);
	
	echo '<hr />';
	
	echo '<pre>'; var_dump($liste); echo '</pre>';
	
	echo '<hr /><h2>Boucle Foreach pour les tableaux de données ARRAY</h2>';
	
	// foreach est un moyen simple de passer en revue tous les éléments d'un tableau. Foreach ne fonctionne que sur les tableau ARRAY et les objets.
	
	// autre façon de déclarer un tableau ARRAY
	
	$tab[] = "France"; // ici en mettant les crochets, il n'est pas nécessaire de préciser array()
	$tab[] = "Italie";
	$tab[] = "Espagne";
	$tab[] = "Angleterre";
	$tab[] = "Belgique";
	
	var_dump($tab);
	
	echo $tab[2] . '<hr />';
	
	foreach($tab AS $valeur)
	{
		echo $valeur . '<br />';
	}// le mot AS fait partie du langage et est obligatoire.la variable $valeur vient parcourir les valeurs l'une après l'autre.
	
	echo '<hr />';
	
	foreach($tab AS $ind => $info)
	{
		echo $ind .' - '. $info . '<br />'; 
	}// quand il y a deux variables de réception ici $ind et $info, la première parcours la colonne des ndices, la deuxième parcours la colonne des valeurs.
	
	// il est possible de préciser les indices:
	
	$couleur = array("j" => "Jaune", "b" => "Bleu", "r" => "Rouge", "v" => "Vert");
	
	/* 
	$couleur2['j'] = 'Jaune';
	$couleur2['b'] = 'Bleu';
	$couleur2['r'] = 'Rouge'; */
	//...
	
	var_dump($couleur);
	
	echo $couleur['b'] . '<hr />';
	
	echo 'taille du tableau avec count: '.count($couleur). '<br />'; // nous renvoi la taille du tableau
	echo 'taille du tableau avec sizeof: '.sizeof($couleur). '<br />'; // nous renvoi la taille du tableau
	
	echo '<hr /><h2>Tableaux de données ARRAY multidimensionnel</h2>';
	// nous parlons de tableau multidimensionnel lorsqu'un tableau est contenu dans un autre tableau
	
	$tab_multi = array(0 => array("prenom" => "Emilie", "email" => "emilie@mail.fr"), 1 => array("prenom" => "Nicolas", "email" => "nicolas@mail.fr"), 2 => array("prenom" => "Marie", "email" => "marie@mail.fr"));
	
	$tab_multi2 = array(
				0 => array(
					"prenom" => "Emilie", 
					"email" => "emilie@mail.fr"), 
				1 => array(
					"prenom" => "Nicolas", 
					"email" => "nicolas@mail.fr"),
				2 => array(
					"prenom" => "Marie", 
					"email" => "marie@mail.fr"));
	
	var_dump($tab_multi);
	
	echo $tab_multi[1]['email'] . '<hr />';
	
	$taille_tab_multi = count($tab_multi);
	
	for($i = 0; $i < $taille_tab_multi; $i++)
	{
		echo $tab_multi[$i]['email'] . '<br />';
	}
	
	
	echo '<hr /><h2>Fonction utilisateur</h2>';
	
	function separation() { // déclaration d'une fonction qui ne recevra pas d'argument.
		echo '<hr /><hr /><hr />';
	}
	
	separation(); // exécution de la fonction
	
	// fonction avec argument
	
	function bonjour($qui) { // $qui est une variable de réception qui recevra l'argument fourni lors de l'exécution de la fonction.
	
		return "Bonjour $qui<br />";
		echo 'ALLO'; // on ne verra jamais cette ligne car lorsqu'il y a un return dans une fonction, on sort de la fonction.
	}
	
	echo bonjour("Marie");
	$prenom = 'Nicolas';
	echo bonjour($prenom);
	
	//---
	
	function calcul_ttc($montant) {
		return $montant*1.2;
	}
	echo '5000€ avec 20% de tva: ' . calcul_ttc(5000) . '<br />';
	
	//-- function calcul avec choix du taux !

	function calcul_ttc_avec_taux($montant, $taux = 1.2){
		$resultat = $montant*$taux;
		return $resultat;
	}
	echo '5000€ avec 40% de tva: ' . calcul_ttc_avec_taux(5000, 1.4) . '<br />';
	echo '5000€ avec 20% de tva: ' . calcul_ttc_avec_taux(5000) . '<br />';
	
	// sur cete fonction, l'argument $taux est initialisé par défaut à 1.2 => $taux = 1.2
	// dans ce cas le deuxième argument est facultatif.
	// Si l'on ne fourni qu'un seul argument alors $taux vaudra par defaut 1.2
	// en revanche si un deuxième argument est fourni, sa valeur remplacera la valeur par defaut.
	
	/* echo $mavariable;
	$mavariable = 'bonjour'; 
	// avec le sens de lecture, on ne peut pas afficher une variable avant de l'avoir déclarée.
	*/
	
	//--
	meteo('hiver', 5);
	
	function meteo($saison, $temperature) {
		echo 'Nous sommes en '.$saison. ' et il fait: '.$temperature. ' degré(s)<br />'; 
	}
	
	// refaire une fonction meteo2 en gérant le s sur degré.
	
	function meteo2($saison, $temperature) {
		if($temperature >= -1 && $temperature <=1)
		{
			$degre = 'degré';
		}
		else {
			$degre = 'degrés';
		}
		echo 'Nous sommes en '.$saison. ' et il fait: '.$temperature. ' ' . $degre .'<br />';
	}
	
	meteo2("hiver", 0);
	meteo2("hiver", 1);
	meteo2("hiver", 20);
	meteo2("hiver", -15);
	
	//-----
	
	function joursemaine() {
		$jour = 'lundi'; // cette variable est déclarée dans un espace local.
		// Dans une fonction on se trouve dans un espace local.
		return $jour;
	}
	
	echo joursemaine() . '<br />';
	
	// echo $jour . '<br />'; // ne fonctionne pas car cette variable n'est connue qu'a l'intérieur de la fonction où elle a été déclarée
		
	$pays = "France"; // déclaration d'une variable dans l'espace global. (notre script)
	
	function affichagePays() {		
		global $pays; // il n'est pas possible de récupérer une variable déclarée dans l'espace global à l'intérieur d'une fonction (espace local) sans préciser avec le mot clé "global"
		echo $pays;
	}	
	affichagePays();
	
	
	echo '<hr /><h2>Objets</h2>';
	
// un objet est un autre type de données. Un peu à la manière d'un ARRAY, il permet de regrouper des informations.
// Cependant, cela va beaucoup plus loin car on peut y déclarer des variables (appelées: attribut ou propriété) mais aussi des fonctions (appelées: methode)

// un objet est un conteneur symbolique qui possède sa propre existence et incorpore des informations et mécanisme.

Class Etudiant
{
	public $prenom = "Julien"; // public permet de préciser que l'élément sera accessible de partout. Il y a aussi protected et private.
	public $age = 25;
	
	public function pays()
	{
		return "France";
	}
	
} 
	
	$objet = new Etudiant(); // new est un mot clé permetant d'instancier la classe et d'en faire un objet. C'est ce qui nous permet de le déployer afin de pouvoir s'en servir. On se sert de ce qui est dans la classe via l'objet
	
	var_dump($objet); // nous pouvons observer le type, la référence de l'objet1 et le nom de la classe dont il est issue.
	var_dump(get_class_methods('Etudiant')); // pour voir les methodes, il faut interroger la classe avec get_class_methods
	
	echo $objet->prenom . '<br />'; //nous pouvons piocher dans un ARRAY avec les crochets, nous devons piocher dans un OBJET avec une fleche ->
	echo $objet->age . '<br />';
	echo $objet->pays() . '<br />'; // appel d'une methode. toujours avec les parenthèses !
	
/*
	EXEMPLE:
	sur un site, une classe panier contiendra toutes les methodes utiles => ajout_article() / retirer_article() / valider_paiement() / ...
	
	des propriétés: $nombre_article / $prix_total / $quantite_article
	
*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	



	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	echo '<br />';