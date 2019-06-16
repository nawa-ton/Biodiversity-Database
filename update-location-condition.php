<?php include "header.php"; ?>

	<h2>Report Sighting</h2>

	<!-- ******** Add message to confirm successful insertion *********-->


	<form id="updateLocationForm" method="POST" action="update-location-condition.php">
		<div>
			<label>Location Name</label>
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

		<div id = "insertconstruction">
			<div>
				<label>Remodel Date</label>
				<input type="text" name="ExpectedDate">
			</div>
			<div>
				<label>Expected Date</label>
				<input type="text" name="ExpectedDate">
			</div>

			<div>
				<label>Infrastructure</label>
				<input type="text" name="Infrastructure">
			</div>
		</div> <!-- end div insertconstruction-->

		<div id = "insertmaintenance">
			<div>
				<label>Schedule</label>
				<input type="text" name="Schedule">
			</div>
			<div>
				<label>Task</label>
				<input type="text" name="Task">
			</div>
		</div> <!-- end div insertmaintenance-->
 
		<input class ="button" type="submit" value="Update" name="updatesubmit">
</form>

		
<?php include "footer-user.php"; ?>
