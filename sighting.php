<?php

include 'connect.php';

$connection = OpenCon();

if(isset($_POST['createsubmit'])){

$location = (!empty($_POST['Location_Name']) ? $connection->real_escape_string($_POST['Location_Name']) : false);

 // general organism values to organism table
 $organismname = (!empty($_POST['CommonName']) ? $connection->real_escape_string($_POST['CommonName']) : false);
 $species = (!empty($_POST['Species']) ? $connection->real_escape_string($_POST['Species']) : false);
 $habitat = (!empty($_POST['Habitat']) ? $connection->real_escape_string($_POST['Habitat']) : false);
 $primarycolor = (!empty($_POST['PrimaryColor']) ? $connection->real_escape_string($_POST['PrimaryColor']) : false);
 $rarity = (!empty($_POST['Rarity']) ? $connection->real_escape_string($_POST['Rarity']) : false);
 $dependee = $_POST['dependee'];
 $organismtype = $_POST['organismtype'];


if($organismname == false or $species == false or $primarycolor == false or $location == false) {
echo "<font color=red size='4pt'> A required field is empty. Please enter a valid Report Sighting.";
} else {

  // check if organism is already in organism table
  $query = "SELECT Species FROM organism WHERE Species='$species'";

  if ($connection->query($query)->num_rows > 0) {
    // check if organism variation is already in organism_variation
    // if $query > 0, need to check if variation is already in organism_variation
    $query = "SELECT PrimaryColor FROM organism_Variation WHERE Species='$species'AND PrimaryColor='$primarycolor'";

    if ($connection->query($query)->num_rows > 0) {
	     echo "<font color=blue size='3pt'> Organism already exist. Sighting location report added.";
     } else {
       // insert into organism_Variation
       echo "<font color=blue size='3pt'> Organism already exist but new variation added. Sighting location report added.";
       $org_variation_query = "INSERT INTO organism_Variation (Species, PrimaryColor, Rarity) VALUES ('$species', '$primarycolor', '$rarity')";
       $insert_org_variation_query =  mysqli_query($connection,$org_variation_query);
       if(! $insert_org_variation_query ) {
       	die('Could not enter data into list of organism variations: ' . mysqli_error($connection));
       }

     }
   } else {

  // add new organism
$organism_query = "INSERT INTO organism (Species, OrganismName, Habitat) VALUES ('$species', '$organismname', '$habitat')";
$insert_organism_query = mysqli_query($connection,$organism_query);

if(! $insert_organism_query ) {
	die('Could not enter data into list of organisms : ' . mysqli_error($connection));
}

$org_variation_query = "INSERT INTO organism_Variation (Species, PrimaryColor, Rarity) VALUES ('$species', '$primarycolor', '$rarity')";
$insert_org_variation_query =  mysqli_query($connection,$org_variation_query);
if(! $insert_org_variation_query ) {
 die('Could not enter data into list of organism variations: ' . mysqli_error($connection));
}


// insert any dependence into dependence table
if(!empty($dependee)){
$dependee_query = "INSERT INTO organism_Dependence (Species_Dependant, Species_Dependee) VALUES ('$species', '$dependee')";
$insert_dependee_query =  mysqli_query($connection,$dependee_query);

if(! $insert_dependee_query ) {
	echo "Could not enter data into list of dependees: $dependee not found in list of existing organisms";
}
}

// add attributes unique to different types of organismname
 $organismtype = $_POST['organismtype'];

// insert animal
	if($organismtype == "animal"){
		$eat = $_POST['eat'];
		$prey = $_POST['Eats'];
		$diet = $_POST['Diet'];
		$aggresiveness = $_POST['Aggressiveness'];
		$health = $_POST['Health'];
		$sound = $_POST['Sound'];
		$animal_query = "INSERT INTO animal (Species, PrimaryDiet, Aggresiveness, Health, Sound) VALUES ('$species', '$diet', '$aggresiveness', '$health', '$sound')";
		$insert_animal_query =  mysqli_query($connection,$animal_query);

		if(! $insert_animal_query ) {
			die('Could not enter animal data into database: '  . mysqli_error($connection) );
		}

    if($eat == "predator"){
		$animal_eats_query = "INSERT INTO animal_Eats (Species_Eats, Species_Eaten) VALUES ('$species', '$prey')";
		mysqli_query($connection, $animal_eats_query);
		}
	}


// insert plant
	if($organismtype == "plant"){
		$flowercolor = $_POST['FlowerColor'];
		$calories = $_POST['Calories'];
		$fruitname = $_POST['FruitName'];
		$fruitcalories = $_POST['FruitCalories'];

		$plant_query = "INSERT INTO plant (Species, FlowerColor, Calories) VALUES ('$species', '$flowercolor', '$calories')";
		$insert_plant_query = mysqli_query($connection, $plant_query);

		if(! $insert_plant_query ) {
			die('Could not enter plant data into database: '  . mysqli_error($connection) );
		}
	}


// insert fungus
	if($organismtype == "fungus"){
		$size = $_POST['Size'];
		$smell = $_POST['Smell'];
		$texture = $_POST['Texture'];
		$edibility = $_POST['edibility'];

		// toxins
		$chemicalname = (!empty($_POST['ChemicalName']) ? $connection->real_escape_string($_POST['ChemicalName']) : false);
		$toxicity = $_POST['Toxicity'];
		$onset = $_POST['Onset'];
		$treatments = $_POST['Treatments'];

		$fungus_query = "INSERT INTO fungus (Species, Edibility, Texture, FungusSize, Smell) VALUES ('$species', '$edibility', '$texture', '$size', '$smell')";
		$insert_fungus_query = mysqli_query($connection, $fungus_query);

		if(! $insert_fungus_query) {
			die('Could not enter fungus into database: '  . mysqli_error($connection) );
		}

		if($edibility == "inedible"){
			$toxin_query = "INSERT INTO produces_toxin (Species, Chemical, Onset, Toxicity, Treatment) VALUES ('$Species', '$chemicalname', '$onset', '$toxicity', '$treatments')";
			$insert_toxin_query = mysqli_query($connection, $toxin_query);
		}

}

// check if location is already in database
$query = "SELECT LocationName FROM location WHERE LocationName='$location'";

if ($connection->query($query)->num_rows == 0) {
  $address = $_POST['Address'];
  $env = $_POST['environment'];
  $location_query = "INSERT INTO location (LocationName, Address, Environment) VALUES ('$location', '$address', '$env')";
  $insert_location_query = mysqli_query($connection, $location_query);
  echo "New location added.";
  if(! $insert_location_query) {
    die('Could not enter new location into database: '  . mysqli_error($connection) );
  }
}

  $locationcondition = $_POST['locationcondition'];

  if($locationcondition == "construction") {
    $expecteddate = $_POST['ExpectedDate'];
    $remodeldate = $_POST['RemodelDate'];
    $infrastructure = $_POST['Infrastructure'];

    $location_construction_q = "INSERT INTO location_Remodel (LocationName, Infrastructure, ExpectedDate, RemodelDate) VALUES ('$location', '$infrastructure', '$expecteddate', '$remodeldate')";
    $insert_location_construction = mysqli_query($connection, $location_construction_q);
  }

  if($locationcondition == "maintenance") {
    $schedule = $_POST['Schedule'];
    $task = $_POST['Task'];


    $location_maintenance_q = "INSERT INTO location_Maintenance (LocationName, Schedule, Task) VALUES ('$location', '$infrastructure', '$schedule', '$task')";
    $insert_location_maintenance = mysqli_query($connection, $location_maintenance_q);
  }




// insert sighting_Report
$sighting_report_query = "INSERT INTO sighting_Report (LocationName, Species, UserID) VALUES ( '$location', '$species', '$userid')";
$insert_sighting_report = mysqli_query($connection, $sighting_report_query);

if(! $insert_sighting_report) {
  die('Could not enter sighting report into database: '  . mysqli_error($connection) );
}


}

	echo "\nEntered data successfully. New sighting report added.\n";
	}
}



 ?>
