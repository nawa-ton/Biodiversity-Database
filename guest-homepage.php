<?php include "header.php"; ?>

	<ul id="accountlink">
		<li><a href="register.php">Register</a></li>
		<li><a href="login.php">Log in</a></li>
	</ul>

	<h2>Search Organism</h2>


	<form id="viewForm" method="POST" action="index.php">
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
			<label>Location</label>
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


		<input class ="button" type="submit" value="Submit" name="viewsubmit">
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