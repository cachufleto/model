Esta pagina es para aprender a hacer un scrip
<hr>

<?php
// voy a definier/declarar una variable

$form = array('name'=>'');

// voy a alimentar una variable

// voy a verificar la informacion de una variable

echo '<pre>funcion var_dump()';
var_dump($form);
echo 'fin var_dump()</pre>';

function test(){
	if(isset($_GET['valide'])){
		return $_GET;
	}
}

$form = test();

echo '<pre>funcion var_dump()';
var_dump($form);
echo 'fin var_dump()</pre>';

// voy a afichar la informacion de una variable

echo '<hr>';

echo $form['name'];

?>