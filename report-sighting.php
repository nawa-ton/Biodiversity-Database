<?php include "header.php"; ?>

	<h2>Report Sighting</h2>
	<h5>* indicates required field<h5>

	<!-- ******** Add message to confirm successful insertion *********-->


	<form id="insertForm" method="POST" action="report-sighting.php">
		<div>
			<label>Organism Type</label>
			<select id="organismtype" name="organismtype">
			   	<option value="animal" selected="selected">Animal</option>
			    <option value="plant">Plant</option>
			    <option value="fungus">Fungus</option>
			</select>
		</div>
		<div>
			<label>Name*</label>
			<input type="text" name="CommonName">
		</div>
		<div>
			<label>Species*</label>
			<input type="text" name="Species">
		</div>
		<div>
			<label>Primary Color*</label>
			<input type="text" name="PrimaryColor">
		</div>
		<div>
			<label>Rarity</label>
			<input type="text" name="Rarity">
		</div>
		<div>
			<label>Habitat</label>
			<input type="text" name="Habitat">
		</div>

		<div>
			<label>Dependence(insert other organism that this one depends on)</label>
			<input type="text" name="dependee">
		</div>

		<div id = "insertanimal" class = "insertOrganism">
			<!-- for animal -->
			<div>
				<label>Predator/Prey</label>
				<select id="eat" name="eat">
					<option value="neither" selected="selected">Neither</option>
				   	<option value="predator">Predator</option>
				    <option value="prey">Prey</option>
				</select>
			</div>
			<div>
				<label>Diet</label>
				<input type="text" name="Diet">
			</div>

			<div>
				<label>Aggressiveness</label>
				<input type="text" name="Aggressiveness">
			</div>
			<div>
				<label>Health</label>
				<input type="text" name="Health">
			</div>

			<div>
				<label>Sound</label>
				<input type="text" name="Sound">
			</div>

			<div>
				<label>Eats (if predator)</label>
				<input type="text" name="Eats">
			</div>
		</div> <!-- end div insertAnimal-->


		<div id = "insertplant" class = "insertOrganism">
			<!-- for animal -->
			<div>
				<label>Flower Color</label>
				<input type="text" name="FlowerColor">
			</div>

			<div>
				<label>Calories per 100 gram</label>
				<input type="text" name="Calories">
			</div>
			<div>
				<label>Fruit Name</label>
				<input type="text" name="FruitName">
			</div>

			<div>
				<label>Fruit Calories</label>
				<input type="text" name="FruitCalories">
			</div>
		</div> <!-- end div insertPlant-->

		<div id = "insertfungus" class = "insertOrganism">
			<!-- for animal -->
			<div>
				<label>Size (cm.)</label>
				<input type="text" name="Size">
			</div>
			<div>
				<label>Smell</label>
				<input type="text" name="Smell">
			</div>

			<div>
				<label>Texture</label>
				<input type="text" name="Texture">
			</div>

			<div>
				<label>Edibility</label>
				<select id="edibility" name="edibility">
				   	<option value="inedible" selected="selected">Inedible</option>
				    <option value="edible">Edible</option>
				</select>
			</div>

			<div id="inserttoxin">
				<div>
					<label>Chemical Name</label>
					<input type="text" name="ChemicalName">
				</div>
				<div>
					<label>Toxicity</label>
					<input type="text" name="Toxicity">
				</div>

				<div>
					<label>Onset</label>
					<input type="text" name="Onset">
				</div>

				<div>
					<label>Treatments</label>
					<input type="text" name="Treatments">
				</div>
			</div>

		</div> <!-- end div insertFungus-->

		<div>
			<label>Location Name</label>
			<input type="text" name="Location_Name">
		</div>

		<div>
			<label>Location Condition</label>
			<select id="locationcondition" name="locationcondition">
				<option value="normal" selected="selected">Normal</option>
			   	<option value="construction">Construction</option>
			    <option value="maintenance">Maintenance</option>
			</select>
		</div>

		<div id = "insertconstruction">
			<div>
				<label>Remodel Date</label>
				<input type="text" name="ExpectedDate">
			</div>
			<div>
				<label>Expected Date</label>
				<input type="text" name="ExpectedDate">
			</div>

			<div>
				<label>Infrastructure</label>
				<input type="text" name="Infrastructure">
			</div>
		</div> <!-- end div insertconstruction-->

		<div id = "insertmaintenance">
			<div>
				<label>Schedule</label>
				<input type="text" name="Schedule">
			</div>
			<div>
				<label>Task</label>
				<input type="text" name="Task">
			</div>
		</div> <!-- end div insertmaintenance-->

		<input class ="button" type="submit" value="Create" name="createsubmit">
</form>

<?php include "sighting.php";
      include "footer-user.php"; ?>
