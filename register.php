<?php include "header.php"; ?>
<section>
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

		<input class ="button" type="submit" value="Register" name="submit">
		<p><a href="login.php">Login</a></p>
	</form>


<?php
include 'connect.php';
$connection = OpenCon();

// If the values are posted, insert them into the database.
if(isset($_POST['submit'])){
    if (isset($_POST['Name']) &&isset($_POST['Email']) && isset($_POST['Password'])){
		$email = $_POST['Email'];
		$name = $_POST['Name'];
		$password = $_POST['Password'];

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "Please enter a valid email.";
			include "footer-guest.php";
			return;
		}


        $query = "INSERT INTO `user` (name, email,password)
			VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($connection, $query);
        if($result){
            echo "User Created Successfully.";
        }else{
            echo "User Registration Failed";
        }
	}else{
		echo "Please fill in all fields";
	}
}
    ?>

</section>
<?php include "footer-guest.php"; ?>
