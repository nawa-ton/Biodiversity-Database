<?php session_start();
$user_id = $_SESSION['user_id'];

include "header.php";
include "phpfunction.php";
 ?>


	<h2>Users Account</h2>



	<!-- ********* Add message to confirm successful deletion ******** -->
		<form id="searchUsersForm" method="POST" action="admin-users-account.php" name="searchUser">
		<div>
			<label>User ID*</label>
			<input type="text" name="UserID">
		</div>

		<div>
			<label>Name</label>
			<input type="text" name="Name">
		</div>


		<input class ="button" type="submit" value="Submit" name="searchusersubmit">
	</form>


	<div class="viewResults">



<?php
include 'connect.php';
$connection = OpenCon();

if(isset($_POST['searchusersubmit'])){

	$userid = (!empty($_POST['UserID']) ? $connection->real_escape_string($_POST['UserID']) : false);
	$name = $_POST['Name'];

	if($userid == false) {
		echo "<font color=red, size='4pt'> Enter Valid UserID";
	} else {

	$query = "SELECT UserID, Name, joindate FROM user WHERE UserID=$userid AND Name LIKE '%$name%'";
	$result = $connection->query($query);

echo  "<br> USERS <br>";

if($result->num_rows > 0){

$columnNames = ['UserID', 'Name', 'Date Joined'];

if($result){
	echo "<table class='resulttable'><tr>";
	foreach ($columnNames as $name) {
		echo "<th>$name</th>";
	}
	echo "<th>delete</th>";
	echo "</tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		$string = "";

		for($i = 0; $i < sizeof($columnNames); $i++){
			$string .= "<td class='resultrow'>" . $row["$i"] . "</td>";
		}

		$string .= " <td class = 'resultrow'>" . "<input type='button' value = 'delete' >" .   "</td>";


		echo $string;
		echo "</tr>";
			}

		}
			echo "</table>";

  } else {
      echo "User not found in database.";
  }

}
}
?>




<?php include "footer-user.php"; ?>
