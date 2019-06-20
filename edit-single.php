<?php 
	session_start(); 
 	$userid = $_SESSION['user_id'];
?>

<?php include "header.php"; ?>
<section class="aligncenter">

<?php
	
	include('connect.php');
	include('phpfunction.php');

	$id = $_GET["sid"];

	if(isset($_POST['updateorganism'])){

		$selectspecies = (!empty($_POST['selectspecies']) ? $connection->real_escape_string($_POST['selectspecies']) : false);  
		$query = "update sighting_report set species='$selectspecies' where sid =" . $id;
		$result = mysqli_query($connection, $query);
		
			echo "<p class='confirmmsg'>Organism has been updated</p>";
		
	}

	if(isset($_POST['updatelocation'])){

		$selectlocation = (!empty($_POST['selectlocation']) ? $connection->real_escape_string($_POST['selectlocation']) : false);  
		$query = "update sighting_report set locationName='$selectlocation' where sid =" . $id;
		$result = mysqli_query($connection, $query);
		
			echo "<p class='confirmmsg'>Location has been updated</p>";


	}

	//$selectlocation = (!empty($_POST['selectlocation']) ? $connection->real_escape_string($_POST['selectlocation']) : false);

	if (isset($id)) {
		  	
		echo "<p><span class='bold'>Report ID: </span>".$id."</p>";

		$selection="select o.species as Species, s.locationName as Location, o.OrganismName as Organism_Name, o.Habitat";
		$from=" from sighting_report s, organism o";
		$projection=" where s.sid = ".$id." and s.species = o.species";
		$query = "";
		if(checkOrganismType("animal", $connection, $id)){
			$selection.=", a.PrimaryDiet as Diet, a.Aggresiveness, a.health, a.sound";
		  	$from.=", animal a";
		  	$projection.=" and a.species = o.species";
		  	$query = $query.$selection.$from.$projection;
		}else if(checkOrganismType("plant", $connection, $id)){
			$selection.=", p.FlowerColor as Flower_Color, p.Calories as Calories_per100g, fr.FruitName as Fruit_Name, fr.Calories as Fruit_Calories_per100g";
		  	$from.=", plant p left join plant_Fruit fr on p.species = fr.species";
		  	$projection.=" and p.species = o.species";
		  	$query = $query.$selection.$from.$projection;

		}else if(checkOrganismType("fungus", $connection, $id)){

			$selection.=", f.Edibility, f.Texture, f.FungusSize, f.smell, t.chemical, t.toxicity, t.onset, t.treatment";
		  	$from.=", fungus f left join produces_Toxin t on f.species = t.species";
		  	$projection.=" and f.species = o.species";
		  	$query = $query.$selection.$from.$projection;
		}

		$result = mysqli_query($connection, $query);

		if(mysqli_num_rows($result) > 0){
			printKeyVal($result);
		}
	}

?>
</section>
<section>
<h2>Edit Organism/Location</h2>
	<form id="editSighting" method="POST" action="<?php if(isset($_GET['user']) && isset($_GET['sid'])){echo 'edit-single.php?sid='.$id.'&user='. $_GET['user'];} ?>">
		
		<div>
	      	<label>Organism</label>
	        <?php 
	        	$query="select species, OrganismName from organism";
	        	$result = mysqli_query($connection, $query);
	        	printDropdown($result, "selectspecies");
	        ?>
	        <input class ='button' type='submit' value='Update' name='updateorganism'>
	    </div>
	    <div>
	        <label>Location</label>
	        <?php 
	        	$query="select locationName from location";
	        	$result = mysqli_query($connection, $query);
	        	printDropdown($result, "selectlocation");
	        ?>
	        <input class ='button' type='submit' value='Update' name='updatelocation'>
	    </div>
	</form>	

<div class="resultposition"></div>

<a style="text-align:center;" href="edit-delete.php">Back to Edit/Delete</a>

</section>
<?php include "footer-user.php"; ?>
