<?php include "header.php"; ?>

	<ul id="accountlink">
		<li><a href="register.php">Register</a></li>
		<li><a href="login.php">Log in</a></li>
	</ul>

	<h2>Search Organism</h2>
	<form id="viewForm" method="POST" action="guest-homepage.php">
		<div>
			<label>Organism Type</label>
			<select id="vieworganismtype" name="vieworganismtype">
			   	<option value="all" selected="selected">All</option>
			   	<option value="animal">Animal</option>
			    <option value="plant">Plant</option>
			    <option value="fungus">Fungus</option>
			</select>
		</div>
		<div>
			<label>Organism Name</label>
			<input type="text" name="OrganismName">
		</div>
		<div>
			<label>Species</label>
			<input type="text" name="Species">
		</div>
		<div>
			<label>Habitat</label>
			<input type="text" name="Habitat">
		</div>


		<!-- <div id = "searchFungusEdibility">
			<label>Edibility</label>
				<select id="edibility" name="edibility">
				   	<option value="inedible" selected="selected">Inedible</option>
				    <option value="edible">Edible</option>
				</select>
			</div>
		</div> 
		end div searchFungusEdibility -->


		<input class ="button" type="submit" value="Submit" name="submit">
	</form>
	
<?php
	include('connect.php');
	if(isset($_POST['submit'])){

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
	}
?>


<?php include "footer-guest.php"; ?>