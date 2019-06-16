<?php include "header.php"; ?>

	<h2>Edit</h2>

	<p class="remark">Note: This is just placeholder. The actual data should correspond to the selected item from edit-delete.php. </p>
	<!-- ********* Add message to confirm successful update ******** -->

	<form id="updateForm" method="POST" action="update.php">
		<p></p>
		<div>
			<label>Name</label>
			<input type="text" name="CommonName" value = "placeholder">
		</div>
		<div>
			<label>Species</label>
			<input type="text" name="Species" value = "placeholder">
		</div>
		<div>
			<label>Primary Color</label>
			<input type="text" name="PrimaryColor" value = "placeholder">
		</div>
		<div>
			<label>Rarity</label>
			<input type="text" name="Rarity" value = "placeholder">
		</div>
		<div>
			<label>Habitat</label>
			<input type="text" name="Habitat" value = "placeholder">
		</div>

		<div>
			<label>Sighting Location</label>
			<input type="text" name="Location_Name" value = "placeholder">
		</div>

		<div>
			<label>Diet</label>
			<input type="text" name="Diet" value = "placeholder">
		</div>

		<div>
			<label>Aggressiveness</label>
			<input type="text" name="Aggressiveness" value = "placeholder">
		</div>
		<div>
			<label>Health</label>
			<input type="text" name="Health" value = "placeholder">
		</div>

		<div>
			<label>Sound</label>
			<input type="text" name="Sound" value = "placeholder">
		</div>
		
		<input class ="button" type="submit" value="Submit" name="editsubmit">

<?php include "footer-user.php"; ?>