<?php
$test = 'Sami';

echo "Bonjour $test";

//Bonjour Sami

echo 'Bonjour $test';

//Bonjour $test

$autre_test = array('prenom' => 'Sami');

echo "Bonjour $autre_test[prenom]";

//Bonjour Sami

echo 'Bonjour $autre_test[prenom]';

//Bonjour $autre_test[prenom]

//echo "Bonjour $autre_test['prenom']";

//PLAAAAAANTE !!!!

echo "Bonjour '
" . $autre_test['prenom'] . "' !";

//Bonjour 'Sami' !




?>