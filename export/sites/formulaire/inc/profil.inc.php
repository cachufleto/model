<?php
# FORMULAIRE D'INSCRIPTION

// Items du formulaire
$_formulaire = array();

$_formulaire['pseudo'] = array(
	'label' => 'Login',
	'type' => 'text',
	'maxlength' => 14,
	'defaut' => "pseudo",
	'obligatoire' => true);
	
$_formulaire['mdp'] = array(
	'label' => 'Mot de Passe',
	'type' => 'password',
	'maxlength' => 14,
	'defaut' => "MotPasse!",
	'rectification' => true);
	
$_formulaire['nom'] = array(
	'label' => 'Nom',
	'type' => 'text',
	'defaut' => "Mon nom",
	'obligatoire' => true);
	
$_formulaire['prenom'] = array(
	'label' => 'Prenom',
	'type' => 'text',
	'defaut' => "Mon prenom",
	'obligatoire' => true);
	
$_formulaire['email'] = array(
	'label' => 'E-mail',
	'type' => 'email',
	'defaut' => "email@fournisseur.ou",
	'obligatoire' => true,
	'rectification' => true);
	
$_formulaire['telephone'] = array(
	'label' => 'Téléphone',
	'type' => 'text',
	'maxlength' => 14,
	'defaut' => "01 25 84 56 78");

$_formulaire['sexe'] = array(
	'label' => 'Sexe',
	'type' => 'radio',
	'option' => array('Homme'=>'m', 'Femme'=>'f'),
	'defaut' => "");
	
$_formulaire['ville'] = array(
	'label' => 'Ville',
	'type' => 'text',
	'defaut' => "Paris");

$_formulaire['cp'] = array(
	'label' => 'code postal',
	'type' => 'text',
	'defaut' => "75001");

$_formulaire['adresse'] = array(
	'label' => 'Adresse',
	'type' => 'textarea',
	'defaut' => "Ou j'habite");

// ############## SUBMIT ############
$_formulaire['valide'] = array(
	'label' => '',
	'type' => 'submit',
	'defaut' => "Inscription");
	
// traitement du formulaire
$msg = modCheck('_formulaire');

// traitement du formulaire
$msg = postCheck('_formulaire', TRUE);
$form = '';
// affichage des messages d'erreur
if('OK' == $msg){
	// on renvoi ver connection
	$msg = 'Les modification ont effectues';
}else{
	// RECUPERATION du formulaire
	$form = '
			<form action="#" method="POST">
			' . afficheFormMod($_formulaire) . ' 
			</form>';
}
?>
    <div class="container">
      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-pencil "></span><?php echo $titre; ?></h1>
		<hr />
      </div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<?php  
			// affichage
			echo $msg; 
			echo $form; 
			?>
			</div>
		</div>
    </div><!-- /.container -->
<?php

##### FUNCTIONS ##########################################################

# Fonction valideForm()
# Verifications des informations en provenance du formulaire
# $_form => tableau des items
# RETURN string msg
function valideForm(){
	
	global $_formulaire, $minLen;
	$message = '';
	$sql_set = '';
	
	foreach ($_formulaire as $key => $info){
		
		$label = $info['label'];
		$valeur = (isset($info['valide']))? $info['valide'] : NULL;
		
		if('valide' != $key && !isset($info['obligatoire']))
			if (isset($info['maxlength']) && 
				(strlen($valeur) < $minLen  || strlen($valeur) > $info['maxlength']) &&
				$key != 'mdp')
			{
				$message.= '<p> Erreur sur le ' .$label. 
					': doit avoir un nombre de caracter compris entre ' . $minLen . 
					' et ' . $info['maxlength'] . ' </p>';
			}else{

				switch($key){
					
					case 'sexe':
						if(empty($valeur))
						{
							$message.= '<p> Erreur sur ' . $label . 
								': Vous devez choisire une option  </p>';
						}
					break;
					
					case 'telephone':
						if(!preg_match('#[0-9.\s.-]#', $valeur))
						{
							$message.= '<p> Erreur sur ' . $label . 
								': Il doit comptenir que des chiffres </p>';
						}
					break;

					case 'mdp':
					break;

					default:
						if(strlen($valeur) < $minLen ) 
						{
							$message.= '<p> Erreur sur ' . $label . 
								': Il doit avoir un nombre de minimum ' . $minLen . ' caracteres </p>';
								
						}
					break;
										
					}
					
				// Construction de la requettes
				// le mot de passe doit être traité differament
				if($key != 'mdp' || ($key == 'mdp' and !empty($valeur))) 
					$sql_set .= ((!empty($sql_set))? ", " : "") . "$key = '$valeur'";
			}
	}
	
	// si la variable $message est vide alors il n'y a pas d'erreurr !
	if(empty($message)) 
	{

		$sql = 'UPDATE membre SET '.$sql_set.'  WHERE id_membre = '.$_SESSION['utilisateur']['id'];
		executeRequete ($sql);
		// ouverture d'une session
		$message = "OK";
		
	}else{ 
		$message = '<div class="bg-danger message">'.$message.'</div>';
	}

	return $message;
}