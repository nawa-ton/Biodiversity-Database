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


		<input class ="button" type="submit" value="Submit" name="organismsubmit">
	</form>
<?php include "get-organism-query.php";?>

<?php include "footer-guest.php"; ?>