<?php
class LeplanDeBilly{
	
	public $etagere_du_haut;
	public $etagere_du_milieu;
	private $etagere_du_bas;
	
	function __construct($le_portrait_de_qui){
		$this->etagere_du_milieu = $le_portrait_de_qui;
		var_dump($this);
	}
	
}

class LaPlanDeBillyPlusLaPorte extends LeplanDeBilly {
	
	private $est_bloquee = true;

	public function ouvrir_la_porte(){
		if($this->est_bloquee){
			echo 'Impossible d\'ouvrir !';
		}
		else{
			echo 'ouvert !';
		}
		
	}
	
}



$mon_armoire_billy = new LaPlanDeBillyPlusLaPorte('le portrait de moman !');
//$mon_armoire_billy->etagere_du_milieu = 'collection de livre de cuisine';
//$mon_armoire_billy->ouvrir_la_porte();

$son_armoire_billy = new LeplanDeBilly('le portrait de papa !');
//$son_armoire_billy->etagere_du_bas = 'Encyclopédie universalis !';

echo $mon_armoire_billy->etagere_du_milieu;
echo $son_armoire_billy->etagere_du_milieu;
?>









