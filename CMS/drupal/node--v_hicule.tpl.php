<?php
//monthemeperso_debug($node, 'ethj');
//monthemeperso_debug($classes_array);
//print '<pre>'; print_r($node); print '</pre>'; // avec print_r nous pouvons voir tout le contenu de $node.
echo '<div class="info_vehicule">';
	print render($content['field_marque']);
	print '<br />';
	print render($content['field_mod_le']);
	print '<br />';
	print render($content['field_carburant']);
	print '<br />';
	print render($content['field_couleur']);
	print '<br />';
	print render($content['field_fiche_constructeur']);
	print '<br />';
echo '</div>';

echo '<div class="photo_vehicule">';
global $base_url;
// echo $base_url;
	print "<img src='".$base_url."/sites/default/files/imagevehicule/".$node->field_image_vehicule['und'][0]['filename']."' style='width: 100%;' />";
	// print render($content['field_image_vehicule']);
	// avec le render nous récupérons également le label du champs sinon il est possible de piocher directement dans $node pour obtenir une value
	// echo $node->field_carburant['und'][0]['value'];
	// echo $node->field_couleur['und'][0]['value'];
	// echo $node->field_fiche_constructeur['und'][0]['filename'];
echo '</div>';

echo '<div class="clear"></div>';
	print render($content['body']);
echo '<div class="body_vehicule">';
echo '</div>';

