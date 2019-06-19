<?php include "header.php"; ?>

	<h2>Your Account</h2>

	<!-- ******** Add message to confirm successful update *********-->

	<form id="updateAccountForm" method="POST" action="your-account.php">
		<div>
			<label>Current Email*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Email</label>
			<input type="text" name="OldEmail"><input type="text" name="NewEmail">
		</div>
		<div>
			<label>Current Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Name</label>
			<input type="text" name="OldName"><input type="text" name="NewName">
		</div>
		<div>
			<label>Current Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Password</label>
			<input type="text" name="OldPassword"><input type="text" name="NewPassword">
		</div>

		<p class="remark">* indicates required field</p>

		<input class ="button" type="submit" value="Update" name="updateaccountsubmit">

	</form>

	<?php
	include('connect.php');

	if (isset ($_POST['updateaccountsubmit'])) {
		$oldemail = (!empty($_POST['OldEmail']) ? $connection->real_escape_string($_POST['OldEmail']) : false);
		$newemail = (!empty($_POST['NewEmail']) ? $connection->real_escape_string($_POST['NewEmail']) : false);
		$newname = (!empty($_POST['NewName']) ? $connection->real_escape_string($_POST['NewName']) : false);
		$newpassword = (!empty($_POST['NewPassword']) ? $connection->real_escape_string($_POST['NewPassword']) : false);

		if ($oldemail) {
			echo $oldemail;
			if ($newemail) {
				echo $newemail;
				$updateemail = "UPDATE user SET email = '$newemail' WHERE email = '$oldemail'";
				echo $updateemail;
				$emailresult = mysqli_query($connection, $updateemail);
				if ($emailresult) {
					echo "Email updated successfully!";
				} else {
					echo "Couldn't issue database query";
					echo mysqli_error($connection);
				}
			}

			if ($newname) {
				echo $newname;
				$updatename = "UPDATE user SET name = '$newname' WHERE email = '$oldemail'";
				$nameresult = mysqli_query($connection, $updatename);
				if ($nameresult) {
					echo "Name updated successfully!";
				} else {
					echo "Couldn't issue database query";
					echo mysqli_error($connection);
				}
			}

			if ($newpassword) {
				echo $newpassword;
				$updatepass = "UPDATE user SET password = '$newpassword' WHERE email = '$oldemail'";
			 	$passresult = mysqli_query($connection, $updatepass);
				if ($passresult) {
					echo "Password updated successfully!";
				} else {
					echo "Couldn't issue database query";
					echo mysqli_error($connection);
				}
			}

			} else {
				echo "Please input your current email";
			}
				mysqli_close($connection);
		}






			// echo $oldemail;
			// $selection = "SELECT * FROM user WHERE email='$oldemail'";
			// echo $selection;
			// $result = mysqli_query($connection, $selection);
			// if ($result) {
			// 	//$udpatequery = "UPDATE user SET "
			// 	echo "User exsits!";
			// 	// echo '<table align ="left"
			// 	// 			cellspacing = "5" cell padding = "8">
			// 	// 			<tr>
			// 	// 			<td align '
		// 	} else {
		// 		echo "Couldn't issue database query";
		// 		echo mysqli_error($connection);
		// 	}
		// } else {
		// 	echo "Please input your current email";
		// }
		// mysqli_close($connection);


	 ?>

	<p class="remark">display user ID and date join here</p>


<?php include "footer-user.php"; ?>
