<?php

	include('../../Includes/DataBase/config.php');

	if(isset($_POST['workout']))
	{
		$_SESSION['currentTable'] = $_POST['workout'];
		return $_SESSION['currentTable'];
	}
	else if(isset($_POST['show']))
	{
		$_SESSION['nameOfRoutine'] = $_POST['show'];
		return $_SESSION['nameOfRoutine'];
	}
	else if(isset($_POST['remove']))
	{
		$workoutName = $_POST['remove'];
		$userName = $_SESSION['userLogged'];

		$sql = "SELECT * FROM users WHERE username = 'Hooded'";

		$query = mysqli_query($con, $sql);

		$array = mysqli_fetch_array($query);

		$count = $array['exerciseTables'] - 1;

		$sqlUser = "UPDATE `users` SET `exerciseTables` = $count WHERE `users`.`username` = '$userName' ";	

		$queryUser = mysqli_query($con, $sqlUser);

		$sqlRemove = "DROP TABLE $workoutName";

		mysqli_query($conUsers, $sqlRemove);


		echo json_encode($sqlRemove);
		//changeData($exercisesTables);



	}
	else if(isset($_POST['changerName']))
	{
		$tableToChange = $_POST['changerName'];
		$fieldToChange = $_POST['changerItem'];
		$valueToSet = $_POST['changerValue'];

		$sql = "UPDATE $tableToChange SET $fieldToChange = '$valueToSet'";

		mysqli_query($conUsers,$sql);
	}

?>