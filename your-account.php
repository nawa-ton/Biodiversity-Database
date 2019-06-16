<?php include "header.php"; ?>

	<h2>Your Account</h2>

	<!-- ******** Add message to confirm successful update *********-->

	<form id="updateAccountForm" method="POST" action="your-account.php">

		<div>
			<label>User ID</label>
			<input type="text" name="UserID" value="Get info from database">
		</div>
		
		<div>
			<label>Name</label>
			<input type="text" name="Name" value="Get info from database">
		</div>
		<div>
			<label>Email</label>
			<input type="text" name="Email"  value="Get info from database">
		</div>
		<div>
			<label>Password</label>
			<input type="text" name="Password" value="Get info from database">
		</div>

		<input class ="button" type="submit" value="Update" name="updateaccountsubmit">

	</form>

	<p class="remark">display date join here</p>


<?php include "footer-user.php"; ?>