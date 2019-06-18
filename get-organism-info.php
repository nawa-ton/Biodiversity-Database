<!-- prints everything from organism table -->
<?php
require('connect.php');
$query = "SELECT * FROM organism_variation ";

		$result = mysqli_query($connection, $query);
		
		// aggregate query on count the number of results
	
		//print out result table 
		if($result){
			echo '<table align ="left"
			cellspacing = "5" cell padding = "8">
			<tr>
			<td align="left"><b>Species</b></td>
			<td align="left"><b>Primary Color</b></td>
			<td align="left"><b>Rarity</b></td>
			</tr>';
			while($row=mysqli_fetch_array($result)){
				echo'<tr><td align="left">'.
				$row['Species'].'</td><td align="left">'.
				$row['PrimaryColor'].'</td><td align="left">';
				$row['Rarity'].'</td><td align="left">';
				echo'</tr>';
			}
	echo'</table>';
} else {
	echo "Couldn't issue database query";
	echo mysqli_error($connection);
}
mysqli_close($connection);
?>