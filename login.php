<?php
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
   session_destroy();
}
session_start();
?>

<?php
include 'connect.php';
$connection = OpenCon();

if(isset($_POST['submit'])){
	error_reporting(0);
    if (!empty( $_POST['email'] ) && !empty( $_POST['password'] ) ) {
			//Assigning posted values to variables
			$email = $_POST['email'];
			$password = $_POST['password'];

        $select = $connection->prepare("SELECT * FROM user WHERE email=?");
        $select->bind_param('s', $_POST['email']);
        $select->execute();
        $result = $select->get_result();
    	  $user = $result->fetch_object();

    	// Verify user password and set $_SESSION
    	if ($_POST['password'] == $user->Password) {
			$_SESSION['user_id'] = $user->UserID;
			$_SESSION['user_name'] = $user->Name;
				header('Location:user-homepage.php');
				exit();
    	} else {
					echo "Invalid Login Credentials.";
			}
    } else {
			echo "Please enter login credentials.";
		}
}

include "header.php";
?>
<section>
	<h2>Log in</h2>
	<form id="loginForm" method="POST" action="login.php">

		<div>
			<label>Email</label>
			<input type="text" name="email" class="form-control">
		</div>
		<div>
			<label>Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control">
		</div>


		<input class ="button" type="submit" value="Login" name="submit">

	</form>

</section>
<?php include "footer-guest.php"; ?>
