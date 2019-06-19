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
		<div>
			<label>Primary Color</label>
			<input type="text" name="PrimaryColor">
		</div>
		<div>
			<label>Rarity</label>
			<input type="text" name="Rarity">
		</div>

		<label>Show Columns:</label>
		<input type="checkbox" name="cspecies" checked>Species		
 	 	<input type="checkbox" name="cname" checked>Name		
  		<input type="checkbox" name="chabitat" checked> Habitat		
		<input type="checkbox" name="cprimarycolor" checked> Primary Color
		<input type="checkbox" name="crarity" checked> Rarity<br><br>		

		<input class ="button" type="submit" value="Submit" name="organismsubmit">
	</form>
<?php include "organism-query.php";?>

<?php include "footer-guest.php"; ?>