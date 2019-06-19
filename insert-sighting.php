<!-- template from get-organism-query, to be edited -->
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