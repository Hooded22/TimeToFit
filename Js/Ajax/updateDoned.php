<?php
	include('../../Includes/DataBase/config.php');

	
		$table = $_SESSION['currentTable'];

		$user = $_SESSION['userLogged'];

		$sql = "UPDATE users SET Doned = (Doned+1) WHERE username = '$user'";

		mysqli_query($con,$sql);

		echo json_encode($sql);

?>