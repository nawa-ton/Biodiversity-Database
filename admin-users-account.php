<?php include "header.php"; ?>
	<h2>Users Account</h2>
	<form id="searchUsersForm" method="POST" action="admin-users-account.php">
		<div>
	      <label>Search by</label>
	      <select id="searchuserby" name="searchuserby">
	        <option value="searchall" name="searchall" selected="selected">Show All</option>
	        <option value="UserID" name="UserID">User ID</option>
	        <option value="NameYear" name="NameYear">Name and/or join year</option>
	      </select>
	    </div>
		<div id = "searchbyUserID" class="searchuser">
			<label>User ID</label>
			<input type="text" name="UserID">
		</div>

		<div id = "searchbyName" class="searchuser">
			<label>Name</label>
			<input type="text" name="Name">
		</div>

		<div id = "searchbyJoinYear" class="searchuser">
			<label>Join Year</label>
			<input type="text" name="JoinYear">
		</div>

		<input class ="button" type="submit" value="Submit" name="searcheusersubmit">
	</form>	


<?php
	
	include('connect.php');
	include('phpfunction.php');

	$columnNames = array("User ID", "Name","Email", "Join date");

	if(isset($_POST['searcheusersubmit'])){

		$UserID = (!empty($_POST['UserID']) ? $connection->real_escape_string($_POST['UserID']) : false);
		$Name = (!empty($_POST['Name']) ? $connection->real_escape_string($_POST['Name']) : false);
		$JoinYear = (!empty($_POST['JoinYear']) ? $connection->real_escape_string($_POST['JoinYear']) : false);

		$selection="";
		$query="";
		if($UserID){
			$selection.=" where userid = $UserID";
		}

		if($Name && $JoinYear){
			$selection.=" where name LIKE '%$Name%' AND DATE_FORMAT(joindate, '%d/%m/%Y') LIKE '%$JoinYear%'";
		}

		if($Name && !$JoinYear){
			$selection.=" where name LIKE '%$Name%'";
		}

		if(!$Name && $JoinYear){
			$selection.=" WHERE DATE_FORMAT(joindate, '%d/%m/%Y') LIKE '%$JoinYear%'";
		}

		$query = "select userid, name, email, joindate from user";

		$query.=$selection;

		$result = mysqli_query($connection, $query);
		
		if(!$result) {
		  	die('Could not process the query. Possible reason: User ID input is not an integer.');
		}

		if(mysqli_num_rows($result) > 0){
			printUserTable($result, $columnNames);
			echo "<p class='confirmmsg'>" . mysqli_num_rows($result) . " results found</p>";
		}else{
			echo "<p class='confirmmsg'>No result found</p>";
		}
		
		


	}

	if (isset($_GET["user"])) {
		$user = $_GET["user"];

		$query ="delete from user where UserID=" . $user;

		$result = mysqli_query($connection, $query);
		
		$query = "select userid, name, email, joindate from user";

		$result = mysqli_query($connection, $query);

		printUserTable($result, $columnNames);
		echo "<p class='confirmmsg'>User ID " . $user . " has been deleted</p>";
	}

	mysqli_close($connection);

?>




<?php include "footer-user.php"; ?>