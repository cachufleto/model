<?php
/*
Les lignes ci-dessous permettent de fournir des informations relatives au plugin :
Plugin Name: Contact plugin
Plugin URI: http://evogue.fr/
Description: Plugin de gestion de contact - EVOGUE
Version: 1
Author: EVOGUE
Author URI: http://evogue.fr/
License: -
*/
// une classe regroupe des methodes, propriétés, etc.
class ContactPlugin	
{
	// la méthode constructeur s'exécute en premier lors de l'instanciation.
    public function __construct()	
    {
		// La fonction plugin_dir_path(__FILE__) utilisé dans ce contexte permet l'inclusion du fichier ContactWidget.php
		include_once plugin_dir_path(__FILE__).'/ContactWidget.php'; 	
		
		// La fonction add_action va nous permettre d'ajouter un lien de menu dans l'administration, nous précisons que nous devrons exécuter la méthode BackOfficeMenu() sur $this (cet objet).
		add_action('admin_menu', array($this, 'BackOfficeMenu'));
		
		// Nous demandons à wordpress de prendre en compte la méthode sauvegardeContact().
		add_action('wp_loaded', array($this, 'sauvegardeContact'));
		
		// Nous appellons "widgets_init" permettant l'initialisation des widgets et nous enregistrons un nouveau widget grâce à la fonction register_widget() à qui nous demandons de prendre en compte la méthode ContactWidget().
        add_action('widgets_init', function(){register_widget('ContactWidget');});
		
		// Création d'un ShortCode, 2 arguments : nom du short code + méthode à exécuter.
		// Cela rend un shortCode disponible :	[listingContact]	Voici les derniers contacts :	[/listingContact]
		add_shortcode('listingContact', array($this, 'affichageShortCode'));
		
		// Permet de charger et d'enregistrer le paramétrages
		add_action('admin_init', array($this, 'registerSettings'));
		
		// on exécute la fonction install() lors de l'activation du plugin pour la création des tables sql.
		$this->install();
    }
	
	// Cette fonction est exécutee en cas d'installation et d'activation du plugin.
	public static function install()
	{
		// Cette ligne me permet d'importer une variable global dans un espace local - $wpdb->prefix nous permettra de récupérer les préfixes de tables s'il y en a.
		global $wpdb;
		
		// Cette ligne me permet de formuler une requête SQL pour créer une table dans la BDD.
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}contact (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL);");
	}
	
	// affichageShortCode() représente notre méthode qui s'exécutera lorsque l'affichage du ShortCode sera demandé.
	public function affichageShortCode()
	{
		// Cette ligne me permet d'importer une variable global dans un espace local
		global $wpdb;
		
		// $wpdb->get_results nous permet de formuler une requête SQL de selection.
		$row = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}contact"); 	// var_dump($row);
		
		// Les lignes suivantes nous permettent de définir un affichage sous forme de tableau
		echo '<table border="1">';
			echo '<tr><th>id</th><th>email</th></tr>';
			
		// La boucle FOREACH et son contenu permettent de parcourrir et d'afficher toutes les informations.
		// Chaque ligne de résultat est représentée par $row
		foreach($row AS $valeur)
		{
			echo '<tr>';
				echo '<td>' . $valeur->id . '</td>';
				echo '<td>' . $valeur->email . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}

	// Cette méthode doit s'exécuter en cas de desactivation du module pour supprimer la table sql.
	public static function uninstall() 
	{
		global $wpdb;
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}contact;");
	}
	
	// Cette méthode permet d'ajouter des liens de menu dans le Back Office.
	public function BackOfficeMenu()
	{
		// add_menu_page() ajoute une rubrique dans la colonne de gauche et précise quelle sera la méthode à exécutée pour définir l'affichage : BackOfficeGestion().
		add_menu_page('Notre Gestion', 'Gestion Contact', 'manage_options', 'ContactPlugin', array($this, 'BackOfficeGestion'));
		
		// add_submenu_page() ajoute une sous-rubrique dans la colonne et précise quelle sera la méthode à exécutée pour définir l'affichage : BackOfficeAffichage().
        add_submenu_page('ContactPlugin', 'Affichage des contacts', 'Affichage des contacts', 'manage_options', 'affichageContact', array($this, 'BackOfficeAffichage'));
	}
	
	// Cette méthode est exécutée pour afficher notre page de backOffice : Gestion
    public function BackOfficeGestion()
    {
		// get_admin_page_title() est une fonction qui permet de récupérer le titre définit dans le 1er argument de la fonction add_menu_page().
        echo '<h1>'.get_admin_page_title().'</h1>';
		
		// Sur cette page nous décidons d'afficher un formulaire de contact.
		echo '<form method="post" action="options.php">';
		settings_fields('parametres');
		echo "<label>Ajout d'un contact</label>";
		echo '<input type="text" name="emailContact" value=""/>';
		submit_button(); // bouton submit.
		echo '</form>';
    }
	
	// Cette méthode est exécutée pour afficher notre sous-page de backOffice : Affichage Contact
    public function BackOfficeAffichage()
    {
		// Cette ligne me permet d'importer une variable global dans un espace local et plus généralement $wpdb me permettra de formuler des requêtes SQL.
		global $wpdb;
		echo '<h1>Backoffice / Affichage Contact</h1>';
		
		// get_admin_page_title() est une fonction qui permet de récupérer le 1er argument de la fonction add_submenu_page
		echo get_admin_page_title();
		
		// Requête SQL permettant de selectionner les contacts.
		$row = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}contact"); // var_dump($row);
		echo '<table border="1">';
			echo '<tr><th>id</th><th>email</th></tr>';
			
		// La boucle FOREACH et son contenu permettent de parcourrir et d'afficher toutes les informations.
		// Chaque ligne de résultat est représentée par $row
		foreach($row AS $valeur)
		{
			echo '<tr>';
				echo '<td>' . $valeur->id . '</td>';
				echo '<td>' . $valeur->email . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	
	// La méthode sauvegardeContact() s'exécute pour enregistrer un contact.
	public function sauvegardeContact()
	{
		// si le champ emailContact n'est pas vide (et donc rempli ;-)), nous procédons à l'insertion en base de données.
		if (!empty($_POST['emailContact']))
		{
			global $wpdb;
			$wpdb->insert("{$wpdb->prefix}contact", array('email' => $_POST['emailContact']));
		}
	}
	// Fonction permettrant d'enregistrer le paramétrage
	public function registerSettings()
	{
		register_setting('parametres', 'emailContact');
	}
}

// New permet d'instancier notre classe et d'exécuter automatiquement la méthode __construct
new ContactPlugin();