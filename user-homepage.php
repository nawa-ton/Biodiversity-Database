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
			<label>Query Type</label>
			<select id="querytype" name="querytype">
			   	<option value="selection" selected="selected">Selection</option>
			   	<option value="aggregation">Aggregation</option>
			</select>
		</div>
			<div id = "insertselection" parent="querytype">
				<label>Show Columns</label>
				<input type="checkbox" name="cspecies" checked>Species		
				<input type="checkbox" name="cname" checked>Name		
				<input type="checkbox" name="chabitat" checked> Habitat		
				<input type="checkbox" name="cprimarycolor" checked> Primary Color
				<input type="checkbox" name="crarity" checked> Rarity<br><br>	

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
				<div>
					<label>Primary Color</label>
					<input type="text" name="PrimaryColor">
				</div>
				<div>
					<label>Rarity</label>
					<input type="text" name="Rarity">
				</div>
			</div>

			<div id="insertaggregation" parent="querytypw">
				<label>Group By</label>
				<select id="group" name="group">
			   	<option value="gspecies" selected="selected">Species</option>
			   	<option value="ghabitat">Habitat</option>
				<option value="gprimarycolor">PrimaryColor</option>
				<option value="grarity">Rarity</option>
			</select>	
			</div>
		</div>

		<input class ="button" type="submit" value="Submit" name="organismsubmit">
	</form>

	<?php include "organism-query.php";?>
	
<?php include "footer-user.php"; ?>