<?php 
	session_start(); 
 	$userid = $_SESSION['user_id'];
?>

<?php include "header.php"; ?>
<section>
	<h2>Edit/Delete Organism Sighting</h2>

	<form id="searchEditDeleteForm" method="POST" action="<?php if(isset($_GET['user'])){echo 'edit-delete.php?user='. $_GET['user'];} ?>">
		<div>
	      <label>Search by</label>
	      <select id="searchsightingby" name="searchsightingby">
	        <option value="searchall" name="searchall" selected="selected">Show All</option>
	        <option value="reportID" name="reportID">Report ID</option>
	        <option value="OrganismLocation" name="OrganismLocation">Organism Name and/or Location</option>
	      </select>
	    </div>
		<div id = "searchbyreportID" class="searchby">
			<label>Report ID</label>
			<input type="text" name="reportid">
		</div>

		<div id = "searchbyOrganism" class="searchby">
			<label>Organism Name</label>
			<input type="text" name="organismname">
		</div>

		<div id = "searchbyLocation" class="searchby">
			<label>Location</label>
			<input type="text" name="locationname">
		</div>

		<input class ="button" type="submit" value="Submit" name="searchsubmit">

		<div class="resultposition"></div>

	</form>	

<?php
	
	include('connect.php');
	include('phpfunction.php');
	
	$columnNames = array("Report ID", "Organism Name","Species", "Location", "Report Date");
	//$user = $_GET['user'];
	
	if(isset($_POST['searchsubmit'])){
		/*if(isset($_GET['user'])){
			$user = $_GET['user'];
		}*/
		$searchall = (!empty($_POST['searchall']) ? $connection->real_escape_string($_POST['searchall']) : false);
		$reportid = (!empty($_POST['reportid']) ? $connection->real_escape_string($_POST['reportid']) : false);
		$organismname = (!empty($_POST['organismname']) ? $connection->real_escape_string($_POST['organismname']) : false);
		$locationname = (!empty($_POST['locationname']) ? $connection->real_escape_string($_POST['locationname']) : false);

		$selection="";
		if($searchall){
			$selection="";
		}
		if($reportid){
			$selection.=" AND s.sid = $reportid";
		}
		if($organismname){
			$selection.=" AND lower(o.organismname) LIKE '%$organismname%'";
		}
		if($locationname){
			$selection.=" AND s.locationname LIKE '%$locationname%'";
		}

		//$query="select s.SID, o.organismname, o.species, s.locationname, s.reportdate from sighting_report s, organism o where s.species = o.species AND s.userid = ". $user;

		$query = "select s.SID, o.organismname, o.species, s.locationname, s.reportdate from sighting_report s join organism o on s.species=o.species where s.userid = " . $userid;
		
		$query.=$selection;

		$result = mysqli_query($connection, $query);
		
		if(!$result) {
		  	die('Could not process the query. Possible reason: Report ID input is not an integer.');
		}
		printEditDeleteTable($result, $columnNames, $userid);
		
		echo "<p class='confirmmsg'>" . mysqli_num_rows($result) . " results found</p>";


	}

	if (isset($_SESSION['user_id']) && isset($_GET["sid"])) {
		$sid = $_GET["sid"];

		$query ="delete from sighting_Report where sid=" . $sid;

		$result = mysqli_query($connection, $query);
		
		echo "<p class='confirmmsg'>Report ID " . $sid . " has been deleted from Sighting Report</p>";

		$query = "select s.SID, o.organismname, o.species, s.locationname, s.reportdate from sighting_report s join organism o on s.species=o.species where s.userid = " . $userid;
		$result = mysqli_query($connection, $query);

		printEditDeleteTable($result, $columnNames, $userid);
	}

	mysqli_close($connection);

?>

</section>

<?php include "footer-user.php"; ?>
