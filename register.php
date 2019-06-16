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
			<input type="text" name="Password">
		</div>

		<input class ="button" type="submit" value="Register" name="registersubmit">

	</form>




<?php include "footer-guest.php"; ?>