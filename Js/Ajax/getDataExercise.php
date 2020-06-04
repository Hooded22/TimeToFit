<?php
	include('../../Includes/DataBase/config.php');

	if(isset($_POST['Id']))
	{
		$Id = $_POST['Id'];

		$table = $_SESSION['currentTable'];

		$query = mysqli_query($conUsers, "SELECT * FROM $table");

		$rowsNumber = mysqli_num_rows($query);

		if($Id <= $rowsNumber)
		{
			$properQuery = mysqli_query($conUsers, "SELECT * FROM $table WHERE id = '$Id'");

			$result = mysqli_fetch_array($properQuery);

			echo json_encode($result);
		}
		else
		{
			$error = 'The End';
			echo json_encode($error);
		}
	}
	else
	{
		$table = $_SESSION['currentTable'];
		
		$query = mysqli_query($conUsers, "SELECT * FROM $table");

		$rowsNumber = mysqli_num_rows($query);

		echo json_encode($rowsNumber);
	}
?>