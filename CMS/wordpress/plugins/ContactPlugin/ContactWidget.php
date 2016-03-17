<?php
// Cette classe hérite de la classe prédéfinie dans Wordpress : WP_Widget
class ContactWidget extends WP_Widget
{
	// Nous définissons une méthode __construct pour initiliser notre parent.
    public function __construct()
    {
        parent::__construct('contactPlugin', 'Contact', array('description' => 'Affichage des contacts'));
    }
	
	// Cette méthode renferme le contenu du widget : affichage des contacts + formulaire d'ajout.
	public function widget($args, $instance)
	{
		// Cette ligne me permet d'importer une variable global dans un espace local et plus généralement $wpdb me permettra de formuler des requêtes SQL.
		global $wpdb;
		
		// Requete SQL de selection.
		$row = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}contact"); 
		echo '<table border="1">';
			echo '<tr><th  style="width: 20%;">id</th><th>email</th></tr>';
			
		// La boucle FOREACH et son contenu permettent de parcourrir et d'afficher toutes les informations.
		// Chaque ligne de résultat est représentée par $row
		foreach($row AS $valeur)
		{
			echo '<tr>';
				echo '<td>' . $valeur->id . '</td>';
				echo '<td>' . $valeur->email . '</td>';
				//echo '<td>' ; var_dump($row) ; echo  '</td>';
				
			echo '</tr>';
		}
		echo '</table>';
		//var_dump($args);
		//var_dump($instance);
		echo $args['before_widget'];
		echo $args['before_title'];
		// echo apply_filters('widget_title', $instance['title']);
		echo $args['after_title'];
		
		// Cette partie de code permettra l'affichage d'un formulaire pour ajouter des contacts supplémentaire directement à partir du FrontOffice.
		echo '
		<form action="" method="post">
			<p>
				<label for="emailContact">Votre email :</label>
				<input id="emailContact" name="emailContact" type="email"/>
			</p>
			<input type="submit"/>
		</form> ';
		echo $args['after_widget'];
	}
	
	// Cette fonction affiche le formulaire de modification lors de l'affectation du widget dans une région (BackOffice : Apparence > Widget)
	public function form($instance)
	{
		$title = isset($instance['title']) ? $instance['title'] : '';
		echo '<label for="' . $this->get_field_name( 'title' ) . '">' . _e( 'Title:' ) . '</label>';
		echo '<input class="widefat" id="'.  $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" type="text" value="' . $title . '" />';
	}
}