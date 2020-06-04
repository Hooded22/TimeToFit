<?php
	session_start();

	if(isset($_SESSION['userLogged']))
	{
		session_destroy();
		header('Location:../../login-page.php');
	}
	else {
		header('Location:../../login-page.php');
	}

?>