<?php
# FORMULAIRE D'INSCRIPTION

// Déconnection de l'utilisateur
if(isset($_SESSION['utilisateur'])){
	// destruction de la session
	session_destroy();
	header('Location:index.php');
	exit();
}

// traitement info get
  
if(
	isset($_GET['qui']) && 
	!empty($_GET['qui']) && 
	isset($_GET['mp']) && 
	!empty($_GET['mp']))
{
	$_POST['pseudo'] =  $_GET['qui'];
	$_POST['mdp'] =  $_GET['mp'];
	$_POST['valide'] = 'valide';
}

// Items du formulaire
$_formulaire = array();

$_formulaire['pseudo'] = array(
	'label' => 'Login',
	'type' => 'text',
	'maxlength' => 14,
	'defaut' => "pseudo");
	
$_formulaire['mdp'] = array(
	'label' => 'Mot de Passe',
	'type' => 'password',
	'maxlength' => 14,
	'defaut' => "MotPasse!");

// ############## SUBMIT ############
$_formulaire['valide'] = array(
	'label' => '',
	'type' => 'submit',
	'defaut' => "Se Connecter",
	'class' => 'form-control btn btn-success');
	
/////////////////////////////////////

// Connection automatique suite au remplissage du formulaire d'inscription
// traitement info get
if(
	isset($_GET['qui']) && 
	!empty($_GET['qui']) && 
	isset($_GET['mp']) && 
	!empty($_GET['mp']))
{
	$_POST['pseudo'] =  $_GET['qui'];
	$_POST['mdp'] =  $_GET['mp'];
	$_POST['valide'] = 'valide';
}

// traitement du formulaire
$msg = postCheck('_formulaire');

// affichage des messages d'erreur
if('OK' == $msg){
	header('Location:index.php');
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
	$sql_Where = '';
	
	foreach ($_formulaire as $key => $info){
		
		$label = $info['label'];
		$valeur = (isset($info['valide']))? $info['valide'] : NULL;

		if('valide' != $key)
			if (isset($info['maxlength']) && (strlen($valeur) < $minLen  || strlen($valeur) > $info['maxlength'])) // $msg.= doit etre declarer vide avant
			{

				$message.= '<div class=bg-danger message"> <p> Erreur sur le ' .$label. 
					': doit avoir un nombre de caracter compris entre ' . $minLen . 
					' et ' . $info['maxlength'] . ' </p></div>';
			
			}else{
				switch($key){
					case 'pseudo':
						$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $valeur );
						if (!$verif_caractere  && !empty($valeur)) // $verif_caractere si c vrai sa donne un TRUE
						{
							$message.= '<div class=bg-danger message"> <p> Erreur sur le ' .$label. 
								', Caractere acceptés: A à Z et 0 à 9 </p></div>'; 
							// un message sans ecresser les messages existant avant. On place dans $msg des chaines de caracteres
						}

					break;
					
					}
				// Construction de la requettes
				$sql_Where .= ((!empty($sql_Where))? " AND " : "") . $key.'="' . $valeur . '" ';
			}
	}
	
	if(empty($message)) // si la variable $msg est vide alors il n'y a pas d'erreurr !
	{
		// lançons une requete nommee membre dans la BD pour voir si un pseudo est bien saisi.
		$membre = executeRequete ("SELECT * FROM membre WHERE $sql_Where "); // la variable $pseudo existe grace a l'extract fait prealablemrent.
		// verifions si dans la requete lancee, si le pseudo s'il existe un nbre de ligne superieur à 0. si c >0 c kil ya une ligne creee donc un pseudo existe

		if($membre->num_rows > 0) // si la requete tourne un enregisterme,cest cest que le pseudo est deja utilisé en BD.
		{
			$session = $membre->fetch_assoc();
			$_SESSION['utilisateur'] = array('id'=>$session['id_membre'], 'pseudo'=>$session['pseudo'], 'statut'=>$session['statut']);
			$message = 'OK';
	}
		else {  // le pseudo n'existe pas en BD donc on peut lancer l'inscription

			$message .= '<div class="bg-danger message"> <p>Une erreur est survenue ! </p>';
	
		}

	}

	return $message;
}