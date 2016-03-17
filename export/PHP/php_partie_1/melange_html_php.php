<?php

// exercice:
// faire une boucle qui affiche de 0 à 9 sur une seule ligne => 0123456789
for($i = 0; $i < 10; $i++)
{
	echo $i;
}

// exercice: faire le même exercice mais cette fois ci en mettant chaque valeur dans une cellule de tableau html.

?>
<table border="1" style="border-collapse: collapse;">
	<tr>
		<td>0</td>
		<td>1</td>
		<td>2</td>
		<td>3</td>
		<td>4</td>
		<td>5</td>
		<td>6</td>
		<td>7</td>
		<td>8</td>
		<td>9</td>
	</tr>
</table>
<hr />

<?php

echo '	<table border="1" style="border-collapse: collapse;">
			<tr>';
for($i = 0; $i <10 ; $i++)
{
	echo '<td>' . $i . '</td>';
}	
	
echo    '	</tr>
		</table>';

// boucle imbriquée !
// faire un affichage d'un tableau html contenant 10 lignes avec chacune des lignes contenant 10 cellules.
// la première celule doit avoir la valeur de 0 jusqu'à la dernière qui doit être à 99





