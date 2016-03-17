<?php
echo '1';
echo '<br/>';

ob_start();

include('mon_affichage.php');

$memoire = ob_get_contents();
ob_end_clean();

echo '3';
echo '<br/>';

echo str_replace('p', 'h1', $memoire);
?>