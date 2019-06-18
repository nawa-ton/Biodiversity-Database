<?php
require('connect.php');
$query = "SELECT * FROM organism";
$response = mysqli_query($connection, $query);
if($response){
	echo '<table align ="left"
	cellspacing = "5" cell padding = "8">
	<tr>
	<td align="left"><b>Species</b></td>
	<td align="left"><b>Name</b></td>
	<td align="left"><b>Habitat</b></td>
	</tr>';
	while($row=mysqli_fetch_array($response)){
		echo'<tr><td align="left">'.
		$row['Species'].'</td><td align="left">'.
		$row['OrganismName'].'</td><td align="left">'.
		$row['Habitat'].'</td><td align="left">';	
		echo'</tr>';
	}
	echo'</table>';
} else {
	echo "Couldn't issue database query";
	echo mysqli_error($connection);
}
mysqli_close($connection);
?>