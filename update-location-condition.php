
<?php include "header.php"; ?>

	<h2>Report Sighting</h2>


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
				<label>Remodel Date (YYYY-MM-DD)</label>
				<input type="text" name="RemodelDate">
			</div>
			<div>
				<label>Expected Date (YYYY-MM-DD)</label>
				<input type="text" name="ExpectedDate">
			</div>

			<div>
				<label>Infrastructure</label>
				<input type="text" name="Infrastructure">
			</div>
		</div> <!-- end div insertconstruction-->

		<div id = "insertmaintenance">
			<div>
				<label>Scheduled Date (YYYY-MM-DD)</label>
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
include('phpfunction.php');


if (isset($_POST['updatesubmit'])) {
	$locationcondition = $_POST['LocationCondition'];
	$locationname = (!empty($_POST['LocationName']) ? $connection->real_escape_string($_POST['LocationName']) : false);
	if ($locationcondition == "normal") {
		$maintenancequery = "DELETE FROM location_maintenance WHERE 1=1";
		if ($locationname) {
			//delete record from location_maintenance
			$maintenancequery.= " AND locationname = '$locationname'";
			$maintenanceresponse = mysqli_query($connection, $maintenancequery);
			if ($maintenanceresponse) {
				echo "<p class='confirmmsg'>Location Maintenance updated successfully!</p>";
			} else {
				echo "Couldn't issue database query";
				echo mysqli_error($connection);
			}

			//delete record from location_remodel
			$remodelquery = "DELETE FROM location_remodel WHERE 1=1";
			$remodelquery.=" AND locationname = '$locationname'";
			$remodelresponse = mysqli_query($connection, $remodelquery);
			if ($remodelresponse) {
				echo "<p class='confirmmsg'>Location Remodel updated successfully!</p>";
			} else {
				echo "Couldn't issue database query";
				echo mysqli_error($connection);
			}

			$lmquery = "SELECT * FROM location_maintenance";
			$lmresult = mysqli_query($connection, $lmquery);
			$lmcolumns = ["locationname", "maintenanceid", "schedule", "task"];
			if ($lmresult) {
				printTable($lmresult, $lmcolumns);
			}

			$lrquery = "SELECT * FROM location_remodel";
			$lrresult = mysqli_query($connection, $lrquery);
			$lrcolumns = ["locationname", "constructionid", "infrastructure", "expecteddate", "remodeldate"];
			if ($lrresult) {
				printTable($lrresult, $lrcolumns);
			}
		}
	} else
		if ($locationcondition == "construction") {
			$infrastructure = (!empty($_POST['Infrastructure']) ? $connection->real_escape_string($_POST['Infrastructure']) : false);
			$expecteddate = (!empty($_POST['ExpectedDate']) ? $connection->real_escape_string($_POST['ExpectedDate']) : false);
			$remodeldate = (!empty($_POST['RemodelDate']) ? $connection->real_escape_string($_POST['RemodelDate']) : false);

			//add record to Location_Remodel
			if ($locationname && $infrastructure && $expecteddate && $remodeldate) {
				$constructionquery = "INSERT INTO location_remodel (locationname, infrastructure, expecteddate, remodeldate)
				VALUES ('$locationname', '$infrastructure', '$expecteddate', '$remodeldate')";
				$constructionresponse = mysqli_query($connection, $constructionquery);
				if ($constructionresponse) {
					echo "<p class='confirmmsg'>Construction added successfully!</p>";
				} else {
					echo "Couldn't issue database query";
					echo mysqli_error($connection);
				}
			} else {
				echo "<p class='confirmmsg'>Couldn't add construction; Name, Remodel Date, Expected Date and Infrastructure cannot be left blank.</p>";
			}

			$lrquery = "SELECT * FROM location_remodel";
			$lrresult = mysqli_query($connection, $lrquery);
			$lrcolumns = ["locationname", "constructionid", "infrastructure", "expecteddate", "remodeldate"];
			if ($lrresult) {
				printTable($lrresult, $lrcolumns);
			}

		} else
			if ($locationcondition == "maintenance") {
				$schedule = (!empty($_POST['Schedule']) ? $connection->real_escape_string($_POST['Schedule']) : false);
				$task = (!empty($_POST['Task']) ? $connection->real_escape_string($_POST['Task']) : false);

				//add record to Location_Maintenance
				if ($locationname && $schedule && $task) {
					$maintenancequery = "INSERT INTO location_maintenance (locationname, schedule, task)
					VALUES ('$locationname', '$schedule', '$task')";
					$maintenanceresponse = mysqli_query($connection, $maintenancequery);
					if ($maintenanceresponse) {
						echo "<p class='confirmmsg'>Maintenance added successfully!</p>";
					} else {
						echo "Couldn't issue database query";
						echo mysqli_error($connection);
					}
				} else {
					echo "<p class='confirmmsg'>Couldn't add maintenance; Location Name, Scheduled Date and Task cannot be left blank.</p>";
				}

				$lmquery = "SELECT * FROM location_maintenance";
				$lmresult = mysqli_query($connection, $lmquery);
				$lmcolumns = ["locationname", "maintenanceid", "schedule", "task"];
				if ($lmresult) {
					printTable($lmresult, $lmcolumns);
				}
			}
		}

 ?>

<?php include "footer-user.php"; ?>
