<?php include "header.php"; ?>

	<h2>Report Sighting</h2>

	<!-- ******** Add message to confirm successful insertion *********-->


	<form id="updateLocationForm" method="POST" action="update-location-condition.php">
		<div>
			<label>Location Name</label>
			<input type="text" name="LocationName">
		</div>

		<div>
			<label>Location Condition</label>
			<select id="locationcondition" name="LocationCondition">
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

<?php

include('connect.php');

if (isset($_POST['updatesubmit'])) {
	$locationcondition = $_POST['LocationCondition'];
	$locationname = (!empty($_POST['LocationName']) ? $connection->real_escape_string($_POST['LocationName']) : false);
	if ($locationcondition == "normal") {
		$maintenancequery = "DELETE FROM location_maintenance WHERE 1=1";
		if ($locationname) {
			//delete record from location_maintenance
			$maintenancequery.= " AND locationname = '%locationname%'";
			$maintenanceresponse = mysqli_query($connection, $maintenancequery);
			if ($maintenanceresponse) {
				echo "Location_Maintenace table updated successfully!";
			} else {
				echo "Couldn't issue database query";
			}

			//delete record from location_remodel
			$remodelquery = "DELETE FROM location_remodel WHERE 1=1";
			$remodelquery.=" AND locationname = '%locationname'";
			$remodelresponse = mysqli_query($connection, $remodelquery);
			if ($remodelresponse) {
				echo "Location_remodel table updated successfully!";
			} else {
				echo "Couldn't issue database query";
			}
		}
	} else
		if ($locationcondition == "construction") {
			//update fields
		} else
			if ($locationcondition == "maintenance") {
				//update fields
			}
}
 ?>

<?php include "footer-user.php"; ?>
