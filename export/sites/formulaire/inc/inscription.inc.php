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
	'obligatoire' => true,
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
	'defaut' => "01 25 84 56 78");

$_formulaire['sexe'] = array(
	'label' => 'Sexe',
	'type' => 'radio',
	'option' => array('Homme'=>'m', 'Femme'=>'f'),
	'defaut' => "",
	'obligatoire' => true);

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
$msg = postCheck('_formulaire');

// affichage des messages d'erreur
if('OK' == $msg){
	// on renvoi ver connection
	header('Location:index.php?nav=actif&qui='.$_formulaire['pseudo']['valide'].
		'&mp='.$_formulaire['mdp']['valide'].'');
	exit();
}else{
	// RECUPERATION du formulaire
	$form = '
			<form action="#" method="POST">
			' . afficheForm($_formulaire) . ' 
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
	$sql_champs = $sql_Value = '';
	
	foreach ($_formulaire as $key => $info){
		$label = $info['label'];
		$valeur = (isset($info['valide']))? $info['valide'] : NULL;
		
		if('valide' != $key)
			if (isset($info['maxlength']) && 
				((strlen($valeur) < $minLen  || strlen($valeur) > $info['maxlength'])))
			{
				$message.= '<p> Erreur sur le ' .$label. 
					': doit avoir un nombre de caracter compris entre ' . $minLen . 
					' et ' . $info['maxlength'] . ' </p>';
			}else{

				switch($key){
					case 'pseudo':
						$pseudo = $valeur;
						$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $valeur );
						if (!$verif_caractere  && !empty($valeur))
						{
							$message.= '<p> Erreur sur le ' .$label. ' "' .$valeur. 
								'", Caractere acceptés: A à Z et 0 à 9 sans espaces</p>';
						}

					break;
					
					case 'sexe':
						if(empty($valeur))
						{
							$message.= '<p> Erreur sur ' . $label . 
								': Vous devez choisire une option  </p>';
						}
					break;
					
					case 'nom':
					case 'prenom':
						$obligatoire = (!empty($info['obligatoire']))? true : false ;
						if( $obligatoire && strlen($valeur) == 0 )
						{
							$message.= '<p> Erreur sur ' . $label . 
								': Il doit être rensaigné </p>';
						}
					break;

					case 'telephone':
						if(!preg_match('#[0-9.\s.-]#', $valeur))
						{
							$message.= '<p> Erreur sur ' . $label . 
								': Il doit comptenir que des chiffres </p>';
						}
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
				$sql_champs .= ((!empty($sql_champs))? ", " : "") . $key;
				$sql_Value .= ((!empty($sql_Value))? ", " : "") . "'$valeur'" ;
			}
	}
	
	// si la variable $message est vide alors il n'y a pas d'erreurr !
	if(empty($message)) 
	{
		
		// lançons une requete nommee membre dans la BD pour voir si un pseudo est bien saisi.
		// $pseudo déjà définie
		$membre = executeRequete ("SELECT * FROM membre WHERE pseudo='$pseudo'"); 
		// la variable $pseudo existe grace a l'extract fait prealablemrent.
		// verifions si dans la requete lancee, si le pseudo s'il existe un nbre de ligne 
		// superieur à 0. si c >0 c kil ya une ligne creee donc un pseudo existe

		// si la requete tourne un enregisterme, c'est que 'pseudo' est deja utilisé en BD.
		if($membre->num_rows > 0) 
		{
			$message = '<p> Pseudo indisponible ! </p>';
		}
		else {  // le pseudo n'existe pas en BD donc on peut lancer l'inscription
			
			$sql = " INSERT INTO membre ($sql_champs) VALUES ($sql_Value) ";
			executeRequete ($sql);
			// ouverture d'une session
			$message = "OK";
			
		}
		
	}else{ 
		$message = '<div class="bg-danger message">'.$message.'</div>';
	}

	return $message;
}