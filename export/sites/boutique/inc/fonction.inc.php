<?php

# Fonction debug()
# affiche les informations passes dans l'argument $var
# $var => string, array, object
# $mode => defaut = 1
# RETURN NULL;
function debug($mode=1){
	global $_debug;
	
	echo '<div class="col-md-12">';

	if($mode === 1)
	{
		echo '<pre>'; var_dump($_debug); echo '</pre>';
	}
	else {
		echo '<pre>'; print_r($_debug); echo '</pre>';
	}

	echo '</div>';

	return;
}

function _debug($var, $label){
	
	global $_debug;
	
	$_debug[$label] = $var;
	
	return;
}

# Fonction inputValue()
# affiche les informations comptenue dans $_POST[$var]
# $var => string nom de l'indice
# $type => type de champ 'input', 'textarea'
# RETURN string
function inputValue($name, $type = 'input') {

	/**********textarea***************/
	if ($type == 'textarea' && isset($_POST[$name])) {
		return $_POST[$name];
	}
	/**************input******************/
	elseif(isset($_POST[$name])) {
		return 'value="' . $_POST[$name] . '" ';
	}
}

# Fonction radioCheck()
# Vérifie la valeur du check 
# $info => array(...'valide'), valeurs du champs
# $value => valeur à comparer
# RETURN string
function radioCheck($info, $value) {

	// info['valide'] => valeur du formulaire
	return (!empty($info['valide']) && $info['valide'] == $value)? 'checked' : '';

}

# Fonction executeRequete()
# Exe requette SQL
# $req => string SQL
# BLOQUANT
# RETURN object
function executeRequete($req) {
	global $mysqli;

	$resultat = $mysqli->query($req);

	if(!$resultat) {
		die ('Erreur sur la requete SQL <br /><b>Message : </b>' . $mysqli->error . '<br />');
	}

	return $resultat;
}

# Fonction de navMenu()
/*
function navMenu () {
	$page_en_cours = strrchr($_SERVER['REQUEST_URI'], '/');

	if($page_en_cours == ) {

	}
}
*/

# Fonction listeMenu()
# Valide le menu de navigation
# [@_pages] => array de navigation
# RETURN Boolean
function listeMenu(){
	
	global $_pages, $_reglesAll, $_reglesMembre, $_reglesAdmin;
	
	if(utilisateurEstAdmin())
		foreach($_reglesAdmin as $key)
			$_pages[$key]['affiche'] = TRUE;
	elseif(utilisateurEstConnecte())
		foreach($_reglesMembre as $key)
			$_pages[$key]['affiche'] = TRUE;
	else
		foreach($_reglesAll as $key)
			$_pages[$key]['affiche'] = TRUE;
	return; 
}

# Fonction utilisateurEstConnecte()
# Verifie SESSION ACTIVE
# RETURN Boolean
function utilisateurEstConnecte() {

	return (!isset($_SESSION['utilisateur']))? false : true;
	
}

# Fonction utilisateurEstAdmin()
# Verifie SESSION ADMIN ACTIVE
# RETURN Boolean
function utilisateurEstAdmin () {
	
	return(utilisateurEstConnecte() && $_SESSION['utilisateur']['statut'] == 1)? true : false;

}

# Fonction liste_nav()
# affiche les informations en forme de liste du menu de navigation
# $actif => mode de connexion
# [@nav] => string action
# [@_pages] => array('nav'...)
# [@titre] => string titre de la page
# RETURN string liste <li>...</li>
function liste_nav(){
	
	global $nav, $_pages, $titre;
	
	$menu = '';
	$titre = '';
	
	// generation de la liste de nav
	foreach ($_pages as $item => $info){
		if($info['affiche']) {
			$active = ($item == $nav)? 'active' : '';
			if(empty($titre) && ($item == $nav)) $titre = $info['titre'];
			$menu .= (!empty($item))? '
			<li class="' . $active . '"><a href="?nav='. $item .'">' . $info['item'] . '</a></li>' : '';
			
		}
	}
	
	return $menu;
}

# Fonction postCheck() 
# Control des informations Postées
# convertion avec htmlentities
# $nomFormulaire => string nom du tableau
# RETURN string alerte
function postCheck($nomFormulaire){
	
	global ${$nomFormulaire};
	$fomulaire = ${$nomFormulaire};
	$message = '';
	
	if(isset($_POST['valide'])){
		$message = postValide($nomFormulaire);
		// appel à la fonction spécifique à chaque formulaire
		// la fonction doit ce trouver dans le fichier de traitement
		if(empty($message)) $message = valideForm($fomulaire);
	}
	
	return $message;
}


# Fonction typeForm() de mise en forme des differents balises html
# $champ => nom de l'item
# $info => tableau des informations relatives a l'item
# RETURN [balises] texte
function typeForm($champ, $info){
	
	$condition = (!empty($info['valide']))? 'value' : 'placeholder';
	$value = (!empty($info['valide']))? $info['valide'] : $info['defaut'];
	$check = (!empty($info['valide']))? 'checked' : '' ;
	$class = (!empty($info['class']))? ' ' . $info['class'] : '';
	
	switch($info['type']){

		case 'password':
			return '<input type="password" class="form-control' . $class . '"   id="' . $champ . '" name="' . $champ . '" placeholder="' .  $value. '" maxlength ="' . $info['maxlength'] . '">';
		break;
		
		case 'email':
			return '<input type="email" class="form-control' . $class . '"   id="' . $champ . '" name="' . $champ . '" ' . $condition . '="' .  $value. '" >';

		break;
		
		case 'radio':
			$balise = '';
			foreach($info['option'] as $key){
				$check = radioCheck($info, $key); 
				$balise .= '<input type="radio" class="radio-inline" id="' . $champ . '" name="' . $champ . '" value="' .  $key. '" ' . $check . ' >';
			}
			// Balise par defaut
			$balise .= '<input type="radio" class="radio-inline" id="' . $champ . '" name="' . $champ . '" value="" ' . (empty($info['valide'])? 'checked' : '') . ' style="visibility:hidden;" >';
			
			return $balise;
		break;
		case 'select':
			$balise = '';
			foreach($info['option'] as $key){
				$check = radioCheck($info, $key); 
				$balise .= '<input type="radio" class="radio-inline" id="' . $champ . '" name="' . $champ . '" value="' .  $key. '" ' . $check . ' >';
			}
			// Balise par defaut
			$balise .= '<input type="radio" class="radio-inline" id="' . $champ . '" name="' . $champ . '" value="" ' . (empty($info['valide'])? 'checked' : '') . ' style="visibility:hidden;" >';
			
			return $balise;
		break;
		
		case 'checkbox':
			$balise = '';
			foreach($info['option'] as $key){
				$balise .= '<input type="radio" class="radio-inline" id="' . $champ . '" name="' . $champ . '" value="' .  $key .  $check .
				'">';
			}
			return $balise;
		break;
		
		case 'textarea':
			$balise = '
					<textarea id="' . $champ . '"  name="' . $champ . '" class="form-control' . $class . '"   placeholder="' . $info['defaut'] . '">' . $value . '</textarea>';
			return $balise;
		break;
		
		case 'submit':
			return '<input type="submit" class="form-control' . $class . '"   name="' . $champ . '" value="' .  $value. '">';
		break;
		
		default:
			$maxlength = (isset($info['maxlength']) AND !empty($info['maxlength']))? ' maxlength ="' . $info['maxlength'] . '"' : '';
			return '<input type="text" class="form-control' . $class . '"   name="' . $champ . '" ' . $condition . '="' .  $value. '" ' . $maxlength . '>';
		
	}
}

# Fonction afficheForm()
# Mise en forme des differents items du formulaire
#$_form => tableau des items
# RETURN string du formulaire
function afficheForm($_form){
	
	//global $_formIncription;
	$formulaire = '';
	foreach($_form as $champ => $info){
		$formulaire .=  '
		<div class="col-md-12" >
			<label class="col-md-4" >' .  $info['label'] . '</label>
			<div class="col-md-8">' . typeForm($champ, $info) . '</div>
		</div>';
	}
	
	return $formulaire; // texte
}

# Fonction postValide()
# Control des informations Postées
# convertion avec htmlentities
# $nom_form => string nom du tableau des items
# [@$nom_form] tableau des items validées du formulaire
# RETURN string message d'alerte
function postValide($nom_form){
	
	global ${$nom_form};
	$message = '';

	$_form = ${$nom_form};
	foreach($_form as $key => $info){
		if(isset($_POST[$key])){
			$valide = htmlentities($_POST[$key], ENT_QUOTES);
			${$nom_form}[$key]['valide'] = ($valide == ${$nom_form}[$key]['defaut'])? '' : $valide;
		}
		else {
			${$nom_form}[$key]['valide'] = '';
			$message .= '<br/> CONNARD Vous fait Quoi avec ' . $key . '?';
		}
		
	}

	return $message;
}

