
<?php
	include('connect.php');
	if(isset($_POST['organismsubmit'])){

		$viewtype = $_POST['vieworganismtype'];
		if($viewtype=="all"){
			$viewtype="organism";
		}
		$organismname = (!empty($_POST['OrganismName']) ? $connection->real_escape_string($_POST['OrganismName']) : false);
        $species = (!empty($_POST['Species']) ? $connection->real_escape_string($_POST['Species']) : false);
        $habitat = (!empty($_POST['Habitat']) ? $connection->real_escape_string($_POST['Habitat']) : false);        

		$query = "SELECT * FROM $viewtype WHERE 1=1";
		if($organismname){
			$query.=" AND organismname LIKE '%$organismname%'";
		}
		if($species){
			$query.=" AND species = '%$species%'";
		}
		if($habitat){
			$query.=" AND habitat = '%$habitat%'";
		}
		$response = mysqli_query($connection, $query);
		$numresults=0;
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
				$numresults++;
			}
			echo'</table>';
			echo "Results Found: $numresults";
		} else {
			echo "Couldn't issue database query";
			echo mysqli_error($connection);
		}
		mysqli_close($connection);
	}
?>