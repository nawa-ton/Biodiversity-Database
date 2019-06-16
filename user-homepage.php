<?php include "header.php"; ?>

	<ul id="useraction">
		<li><a href="report-sighting.php">Report Sighting</a></li>
		<li><a href="edit-delete.php">Edit/Delete Sighting</a></li>
		<li><a href="update-location-condition.php">Update Location Condition</a></li>
		<li><a href="your-account.php">Your Account</a></li>
		<li><a href="guest-homepage.php">Log Out</a></li>
	</ul>

	<h2>Search Organism</h2>

	<form id="viewForm" method="POST" action="">
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
			<label>Primary Color</label>
			<input type="text" name="PrimaryColor">
		</div>
		<div>
			<label>Rarity</label>
			<input type="text" name="Rarity">
		</div>
		<div>
			<label>Sighting Location</label>
			<input type="text" name="Location_Name">
		</div>

		<div id = "searchFungusEdibility">
			<label>Edibility</label>
				<select id="edibility" name="edibility">
				   	<option value="inedible" selected="selected">Inedible</option>
				    <option value="edible">Edible</option>
				</select>
			</div>
		</div> <!-- end div searchFungusEdibility-->

		<div>
			<label>Sighting Location</label>
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

		<input class ="button" type="submit" value="View Results" name="viewsubmit">
	</form>

	<div class="viewResults">

		<p class="remark">Note: This is only to give the idea about layout of the table. The actual table shold be appeared only after submitting query</p>
		<h2>Results</h2>

		<!-- ********  This is just a placeholder table. To get data from the database, refer to function printResult in oracle-test.php (tutorial 7) ******* -->

		<table>
			<thead>
				<tr>
					<th>Column Name</th>
					<th>Column Name</th>
					<th>Column Name</th>
					<th>Column Name</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Placeholder</td>
					<td>Placeholder</td>
					<td>Placeholder</td>
					<td>Placeholder</td>
				</tr>
				<tr>
					<td>Placeholder</td>
					<td>Placeholder</td>
					<td>Placeholder</td>
					<td>Placeholder</td>
				</tr>
			</tbody>
		</table>
	</div>

<?php include "footer.php"; ?>