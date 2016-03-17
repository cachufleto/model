<?php
/*$tableau = array(
	'boite' => 'Coucou !',
	'autre_boite' => 'Re Coucou !'
);


extract($tableau);*/


function a(){
	$boite = 1;
	$autre_boite = 2;
	$encore_autre_boite = 3;
	c(array(
		'boite' => $boite,
		'autre_boite'=> $autre_boite,
		'encore_autre_boite' => $encore_autre_boite
	));
}

function b(){
	$grosse_boite = 1000000000000000000000;
	$petite_boite = 0.567;
	$encore_autre_mega_boite = 30000000000000000000000;
	c(array(
		'grosse_boite' => $grosse_boite,
		'petite_boite'=> $petite_boite,
		'encore_autre_mega_boite' => $encore_autre_mega_boite
	));
}


function c($arg){
	extract($arg);
	//
	
	
}






?>