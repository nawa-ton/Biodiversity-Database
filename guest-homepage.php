<?php include "header.php"; ?>
<section>
	<h2>Search Organism</h2>
		
	<form id="viewForm" method="POST" action="guest-homepage.php">
		<div>
			<div id="selecttype" >
			<label>Organism Type</label>
			<select id="vieworganismtype" name="vieworganismtype">
			   	<option value="all" selected="selected">All</option>
			   	<option value="animal">Animal</option>
			    <option value="plant">Plant</option>
			    <option value="fungus">Fungus</option>
			</select>
			</div>
		</div>
		<div>
			<label>Query Type</label>
			<select id="querytype" name="querytype">
			   	<option value="selection" selected="selected">Selection</option>
			   	<option value="aggregation">Aggregation</option>
				<option value="division">Division</option>
			</select>
		</div>
			<div id = "insertselection">
				<label>Show Columns</label>
				<input type="checkbox" name="cspecies" checked>Species		
				<input type="checkbox" name="cname" checked>Name		
				<input type="checkbox" name="chabitat" checked> Habitat		
				<input type="checkbox" name="cprimarycolor" > Primary Color
				<input type="checkbox" name="crarity" > Rarity<br><br>
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

			<div id="insertaggregation" >
				<label>Group By</label>
				<select id="group" name="group">
					<option name="gspecies" value="species" selected="selected">Species</option>
					<option name="gorganismtype" value="organismname">Name</option>
					<option name="ghabitat" value="habitat">Habitat</option>
					<option name="gprimarycolor" value="primarycolor">PrimaryColor</option>
					<option name="grarity" value="rarity">Rarity</option>
				</select>	
			</div>

			<div id="insertdivision" >
					<label>Find Animals that Eats All</label>
					<select id="typeeaten" name="typeeaten">
						<option name="eorganism" value="organism" selected="selected">Organisms</option>
						<option name="eanimal" value="animal">Animals</option>
						<option name="eplant" value="plant">Plants</option>
						<option name="efungus" value="fungus">Fungus</option>
					</select>	
			</div>
		</div>
		<input class ="button" type="submit" value="Submit" name="organismsubmit">
	</form>
</section>
<section>
	<?php include "organism-query.php";?>

</section>	

<?php include "footer-guest.php"; ?>
