<?php include "header.php"; ?>

	<h2>Create Account</h2>

	<!-- ******** Add message to confirm successdul update. With log in link *********-->

	<form id="registerForm" method="POST" action="register.php">
		<div>
			<label>Name</label>
			<input type="text" name="Name">
		</div>
		<div>
			<label>Email</label>
			<input type="text" name="Email">
		</div>
		<div>
			<label>Password</label>
			<input type="password" name="Password">
		</div>

		<input class ="button" type="submit" value="Register" name="registersubmit">
		<p><a href="login.php">Login</a></p>
	</form>


<?php
	require('connect.php');
    // If the values are posted, insert them into the database.

    if (isset($_POST['name']) &&isset($_POST['email']) && isset($_POST['password'])){
		$email = $_POST['email'];
		$name = $_POST['name'];
		$password = $_POST['password'];

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "Please enter a valid email.";
			return;
		}
		
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO `users` (name, email,password) 
			VALUES ('$name', '$email', $hashed_password')";
        $result = mysqli_query($connection, $query);
        if($result){
            echo "User Created Successfully.";
			
        }else{
            echo "User Registration Failed";
        }
    }
    ?>


<?php include "footer-guest.php"; ?>