<?php
	/**
	 * 
	 */
	


	if(isset($_POST['settingsChange']))
	{
		$name = $_SESSION['userLogged'];

		$firstName = strip_tags($_POST['firstName']);
		$lastName = strip_tags($_POST['lastName']);
		$Username = $_SESSION['userLogged'];
		$Email = $_POST['Email'];
		$Country = strip_tags($_POST['Country']);
		$City = strip_tags($_POST['City']);
		$aboutMe = strip_tags($_POST['aboutMe']);

		$sql = "UPDATE users SET firstName = '$firstName', lastName='$lastName', username='$Username', email='$Email', Country = '$Country', City = '$City', aboutMe = '$aboutMe' WHERE username = '$name'";

		$success = $account->change($Username, $firstName, $lastName, $Email, $Country, $City, $aboutMe);

		if($success)
		{
			mysqli_query($con,$sql);
		}
		else
		{
			return;
		}
	}
	else if(isset($_POST['passwordChange']))
		{
			$oldPassword = $_POST['pw1'];
			$newPassword = $_POST['pw2'];
			$username = $_SESSION['userLogged'];

			//Encrypting passwords using method md5

			$oldPassword = md5($oldPassword);
			$newPassword = md5($newPassword);

			//Preparing sql query aimed at save new password in base.
			$sql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
			

			//Check if old password is same like password in base
			$success = $passwordChange->changePassword($oldPassword, $newPassword);


			if($success)
			{
				mysqli_query($con,$sql);
			}
			else
			{
				return;
			}
		}
?>