<?php include "header.php"; ?>

	<h2>Log in</h2>
	<form id="loginForm" method="POST">
		
		<div>
			<label>Email</label>
			<input type="text" name="email" class="form-control">
		</div>
		<div>
			<label>Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control">
		</div>


		<input class ="button" type="submit" value="Submit" name="loginsubmit">

	</form>

	<p><a href="register.php">Register</a> </p>

<?php  
session_start();
require 'connect.php';
if (isset($_POST['email']) and isset($_POST['password'])){
//Assigning posted values to variables
$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
//Check if the values exist in the database 
$query = "SELECT * FROM `users` WHERE email='$email' and password='$hashed_password'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

//If the posted values are equal to the database values, then session will be created for the user.
if (mysqli_num_rows($result)){
$_SESSION['name'] = $name;
header('Location:user-homepage.php');
}else{
//If the login credentials doesn't match, show error message.
$fmsg = "Invalid Login Credentials.";
}
}
?>

<?php include "footer-guest.php"; ?>