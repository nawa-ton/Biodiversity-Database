<?php include "header.php"; ?>

	<ul id="useraction">
		<li><a href="report-sighting.php">Report Sighting</a></li>
		<li><a href="edit-delete.php">Edit/Delete Sighting</a></li>
		<li><a href="update-location-condition.php">Update Location Condition</a></li>
		<li><a href="your-account.php">Your Account</a></li>
		<li><a href="guest-homepage.php">Log Out</a></li>
	</ul>
	<h2>Search Organism</h2>
	<form id="viewForm" method="POST" action="user-homepage.php">
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


		<input class ="button" type="submit" value="Submit" name="organismsubmit">
	</form>

	<?php include "organism-query.php";?>
	
<?php include "footer.php"; ?>