<?php include "header.php"; ?>

	<h2>Edit/Detele Organism Sighting</h2>
	<!-- ********* Add message to confirm successful deletion ******** -->

	<form id="searchEditDeleteForm" method="POST" action="index.php">
		<div>
			<label>Report ID</label>
			<input type="text" name="ReportID">
		</div>

		<div>
			<label>Organism Name</label>
			<input type="text" name="OrganismName">
		</div>

		<div>
			<label>Sighting Location</label>
			<input type="text" name="Location_Name">
		</div>

		<input class ="button" type="submit" value="Submit" name="searcheditdeletesubmit">
	</form>	


	<div class="viewResults">
			<!-- ******** This is just a placeholder table. To get data from the database, refer to function printResult in oracle-test.php (tutorial 7) ******** -->
		<p class="remark">Note: This is only to give the idea about layout of the table. The actual table shold be appeared only after submitting query</p>

		<table>
			<thead>
				<tr>
					<th>Report ID</th>
					<th>Location Name</th>
					<th>Species</th>
					<th>Organism Name</th>
					<th>Report Date</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Placeholder</td>
					<td>Placeholder</td>
					<td>Placeholder</td>
					<td>Placeholder</td>
					<td>Placeholder</td>

					<!-- when user click edit, it needs to capture the selection and output the data in edit-single -->
					<td><a href="edit-single.php">Edit</a></td>
					<td><a hred="edit-delete.php">Delete</a></td>
				</tr>
				<tr>
					<td>Placeholder</td>
					<td>Placeholder</td>
					<td>Placeholder</td>
					<td>Placeholder</td>
					<td>Placeholder</td>

					<!-- when user click edit, it needs to capture the selection and output the data in edit-single -->
					<td><a href="edit-single.php">Edit</a></td>
					<td><a hred="edit-delete.php">Delete</a></td>
				</tr>
			</tbody>

		</table>
	</div>

<?php include "footer-user.php"; ?>