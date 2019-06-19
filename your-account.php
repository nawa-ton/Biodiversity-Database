<?php include "header.php"; ?>

<h2>Your Account</h2>

<?php
	
	include('connect.php');
	include('phpfunction.php');

	$userid = $_GET["user"];


	if(isset($_POST['updatesubmit'])){

		$name = (!empty($_POST['Name']) ? $connection->real_escape_string($_POST['Name']) : false);  
		$email = (!empty($_POST['Email']) ? $connection->real_escape_string($_POST['Email']) : false);       
		$password = (!empty($_POST['Password']) ? $connection->real_escape_string($_POST['Password']) : false); 
		

		if($name && $email && $password){
			echo "<p class='confirmmsg'>Your account info is updated</p>";
		}else{
			echo "<p class='confirmmsg'>Name, Email and Password cannot be left blank.</p>";
		}

		$query="update user set name='$name', email='$email', password='$password' where userid=2";
		$result = mysqli_query($connection, $query);

	}

	if (isset($userid)) {
		  	
		$query = "select name as Name, email as Email, password as Password from user where userid = ".$userid;

		$result = mysqli_query($connection, $query);

		if(mysqli_num_rows($result) > 0){
			printResultFormAllEdit($result, 'your-account.php?&user='.$userid);
		}
	}


?>

<div class="resultposition"></div>
<?php include "footer-user.php"; ?>