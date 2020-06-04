<?php
	session_start();

	if(!isset($_SESSION['userLogged']))
	{
		header('Location: login-page.php');
	}
	else
	{
		echo "Hello ".$_SESSION['userLogged']."!";
	}
	
 ?>