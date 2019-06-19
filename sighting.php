<?php
include('connect.php');

$connection = OpenCon();

if(isset($_POST['createsubmit'])){

 // general organism values to organism table
 $organismname = (!empty($_POST['CommonName']) ? $connection->real_escape_string($_POST['CommonName']) : false);
 $species = (!empty($_POST['Species']) ? $connection->real_escape_string($_POST['Species']) : false);
 $habitat = (!empty($_POST['Habitat']) ? $connection->real_escape_string($_POST['Habitat']) : false);
 $primarycolor = (!empty($_POST['PrimaryColor']) ? $connection->real_escape_string($_POST['PrimaryColor']) : false);
 $rarity = (!empty($_POST['Rarity']) ? $connection->real_escape_string($_POST['Rarity']) : false);
 $dependee = $_POST['dependee'];
 $organismtype = $_POST['organismtype'];


if($organismname == false or $species == false or $primarycolor == false) {
echo "A required field is empty. Please enter a valid Report Sighting.";
} else {

// check if organism is already in organism_variation
// if $query == true, organism already in database, just need to add sighting report
$query = "SELECT count(*) FROM organism_variation WHERE Species='$species' and PrimaryColor='$primarycolor')";

if ($connection->query($query) > 0) {
	echo "Organism already listed. Sighting location report added.";
}

// new organism entry
else {

// insert into organism
$organism_query = "INSERT INTO organism (Species, OrganismName, Habitat) VALUES ('$species', '$organismname', '$habitat')";
$insert_organism_query = mysqli_query($connection,$organism_query);

if(! $insert_organism_query ) {
	die('Could not enter data into list of organisms : ' . mysqli_error($connection));
}


// insert into organism_Variation
$org_variation_query = "INSERT INTO organism_Variation (Species, PrimaryColor, Rarity) VALUES ('$species', '$primarycolor', '$rarity')";
$insert_org_variation_query =  mysqli_query($connection,$org_variation_query);


if(! $insert_org_variation_query ) {
	die('Could not enter data into list of organism variations: ' . mysqli_error($connection));
}

// insert any dependence into dependence table
$dependee_query = "INSERT INTO organism_Dependence (Species_Dependant, Species_Dependee) VALUES ('$species', '$dependee')";
$insert_dependee_query =  mysqli_query($connection,$dependee_query);

if(! $insert_dependee_query ) {
	echo "Could not enter data into list of dependees: $dependee not found in list of existing organisms";
}

// add attributes unique to different types of organismname
 $organismtype = $_POST['organismtype'];

	if($organismtype == "animal"){
		$eat = $_POST['eat'];
		$diet = $_POST['Diet'];
		$aggresiveness = $_POST['Aggressiveness'];
		$health = $_POST['Health'];
		$sound = $_POST['Sound'];
		$animal_query = "INSERT INTO animal (Species, PrimaryDiet, Aggresiveness, Health, Sound) VALUES ('$species', '$diet', '$aggresiveness', '$health', '$sound')";
		$insert_animal_query =  mysqli_query($connection,$animal_query);

		if(! $insert_animal_query ) {
			die('Could not enter data into database: '  . mysqli_error($connection) );
		}

    if($eat == "predator"){
		$animal_eats_query = "INSERT INTO animal_Eats (Species_Eats, Species_Eaten) VALUES ('$species', '$Eats')";
		}

	}

	if($organismtype == "plant"){
		$flowercolor = $_POST['FlowerColor'];
		$calories = $_POST['Calories'];
		$fruitname = $_POST['FruitName'];
		$fruitcalories = $_POST['FruitCalories'];

		$plant_query = "INSERT INTO plant (Species, FlowerColor, Calories) VALUES ('$species', '$flowercolor', '$calories')";
		$insert_plant_query = mysqli_query($connection, $plant_query);

		if(! $insert_plant_query ) {
			die('Could not enter data into database: '  . mysqli_error($connection) );
		}
	}

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
			die('Could not enter data into database: '  . mysqli_error($connection) );
		}

		if($edibility == "edible"){
			$toxin_query = "INSERT INTO produces_toxin (Species, Chemical, Onset, Toxicity, Treatment) VALUES ('$Species', '$chemicalname', '$onset', '$toxicity', '$treatments')";
			$insert_toxin_query = mysqli_query($connection, $toxin_query);
		}


	$location = (!empty($_POST['Location_Name']) ? $connection->real_escape_string($_POST['Location_Name']) : false);

	}

	echo "Entered data successfully\n";
	}
	}
}

 ?>
