<?php
# FORMULAIRE ***

// Items du formulaire
/*
'label' => libellé du champ,
'type' => balise <input> text, textarea, password, email, ...
'maxlength' => 14,
'defaut' => defaut content,
'class' => class complementaire,
'obligatoire' => false, true
*/
$_formulaire = array();

$_formulaire['item'] = array(
	'label' => 'label',
	'type' => 'text',
	'maxlength' => 14,
	'defaut' => "defaut content",
	'class' => "nouvelle class",
	'obligatoire' => false);
	
// ############## SUBMIT ############
$_formulaire['valide'] = array(
	'label' => '',
	'type' => 'submit',
	'defaut' => "Valider");
	
// traitement du formulaire
$msg = postCheck('_formulaire');

// affichage des messages d'erreur
if('OK' == $msg){
	$form = '<h2>Texte de validation</h2>';
	$msg = ''; 
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
function valideForm($_form){
	
	global $minLen;
	$message = '';
	$sql_Where = ''; // conditions
	//$sql_champs = $sql_Value = ''; // insertions

	
	foreach ($_form as $key => $info){
		
		$label = $info['label'];
		$valeur = (isset($info['valide']))? $info['valide'] : NULL;
		_debug($info, $key);
		if('valide' != $key)
			if (isset($info['maxlength']) && (strlen($valeur) < $minLen  || strlen($valeur) > $info['maxlength'])) // $msg.= doit etre declarer vide avant
			{

				$message.= '<div class=bg-danger message"> <p> Erreur sur le ' .$label. ': doit avoir un nombre de caracter compris entre ' . $minLen . ' et ' . $info['maxlength'] . ' </p></div>';
			
			}else{
				switch($key){
					case 'pseudo':
						$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $valeur );
						if (!$verif_caractere  && !empty($valeur)) // $verif_caractere si c vrai sa donne un TRUE
							// esk ya pas de caractere non autoriser esk kelk chose a ete taper dans la champ
						{
							$message.= '<div class=bg-danger message"> <p> Erreur sur le ' .$label. ', Caractere acceptés: A à Z et 0 à 9 </p></div>'; // un message sans ecresser les messages existant avant. On place dans $msg des chaines de caracteres
						}

					break;
					
					case 'exeptions':
						$obligatoire = (!empty($info['obligatoire']))? true : false ;
						if( $obligatoire && strlen($valeur) == 0 )
						{
							$message.= '<div class=bg-danger message"> <p> Erreur sur ' . $label . ': Il doit être rensaigné </p></div>';
						}
					break;

					default:
						if(strlen($valeur) < $minLen ) 
						{
							$message.= '<div class=bg-danger message"> <p> Erreur sur ' . $label . ': Il doit avoir un nombre de minimum ' . $minLen . ' caracteres </p></div>';
								
						}
					break;
					}
			}
		// Construction de la requettes
		if($key != 'valide'){
			$sql_Where .= ((!empty($sql_Where))? " AND " : "") . $key.'="' . $valeur . '" ';
			//$sql_champs .= ((!empty($sql_champs))? ", " : "") . $key;
			//$sql_Value .= ((!empty($sql_Value))? ", " : "") . "'$valeur'" ;

		}
	}
	
	if(empty($message)) // si la variable $msg est vide alors il n'y a pas d'erreurr !
	{

		//$pseudo = $_formIncription[$key]['valide'];
		// lançons une requete nommee membre dans la BD pour voir si un pseudo est bien saisi.
		$membre = executeRequete ("SELECT * FROM table WHERE $sql_Where "); // la variable $pseudo existe grace a l'extract fait prealablemrent.
		// verifions si dans la requete lancee, si le pseudo s'il existe un nbre de ligne superieur à 0. si c >0 c kil ya une ligne creee donc un pseudo existe

		if($membre->num_rows > 0) // si la requete tourne un enregisterme,cest cest que le pseudo est deja utilisé en BD.
		{
			$message .= '<div class="bg-danger message"> <p> OK </p>';
		}
		else {  // le pseudo n'existe pas en BD donc on peut lancer l'inscription

			$message .= '<div class="bg-danger message"> <p>Une erreur est survenue ! </p>';
	
		}

	}

	return $message;
}