<?php include "header.php"; ?>

	<h2>Users Account</h2>



	<!-- ********* Add message to confirm successful deletion ******** -->
		<form id="searchUsersForm" method="POST" action="index.php">
		<div>
			<label>User ID</label>
			<input type="text" name="UserID">
		</div>

		<div>
			<label>Name</label>
			<input type="text" name="Name">
		</div>

		<div>
			<label>Year Joined</label>
			<input type="text" name="YearJoined">
		</div>

		<input class ="button" type="submit" value="Submit" name="searcheusersubmit">
	</form>	


	<div class="viewResults">

	<!-- ******** This is just a placeholder table. To get data from the database, refer to function printResult in oracle-test.php (tutorial 7) ******** -->
		<p class="remark">Note: This is only to give the idea about layout of the table. The actual table shold be appeared only after submitting query</p>

	<table>
		<thead>
			<tr>
				<th>User ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Date Joined</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Placeholder</td>
				<td>Placeholder</td>
				<td>Placeholder</td>
				<td>Placeholder</td>
				<td><a hred="users-account.php">Delete</a></td> 
			</tr>
			<tr>

			</tr>
		</tbody>

	</table>


<?php include "footer-user.php"; ?>