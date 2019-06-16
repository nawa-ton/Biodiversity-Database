<?php include "header.php"; ?>

	<h2>Log in</h2>


	<form id="loginForm" method="POST" action="login.php">
		
		<div>
			<label>User ID</label>
			<input type="text" name="UserID">
		</div>
		<div>
			<label>Password</label>
			<input type="text" name="Password">
		</div>


		<input class ="button" type="submit" value="Submit" name="loginsubmit">

	</form>

	<!--********* To be deleted ********-->
	<p><a href="user-homepage.php">After login</a> (To be deleted after login function is created.)</p>

<?php include "footer-guest.php"; ?>