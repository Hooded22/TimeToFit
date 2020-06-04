<?php
	include('../../Includes/DataBase/config.php');
	include('../../Includes/Classes/ExerciseConstants.php');
	include('../../Includes/Classes/ExerciseFormValidation.php');

	if(isset($_POST['dataForm']))
	{
		if(isset($_SESSION['nameOfRoutine']))
		{
			$tableName = strtolower($_SESSION['nameOfRoutine']);
		}
		else
		{
			$tableName = strtolower($_SESSION['userLogged'])."tmpexercise";
		}
		$title = strip_tags($_POST['dataForm'][0]); 
		$type = $_POST['dataForm'][1]; 
		$time = $_POST['dataForm'][2]; 
		$series = $_POST['dataForm'][3]; 
		$breakTime = $_POST['dataForm'][4]; 
		$desc = strip_tags($_POST['dataForm'][5]);
		$id = $_POST['dataForm'][6]; 

		$validation =  new Validation($con);

		$correctValidation = $validation->addToBase($title, $type, $time, $series, $breakTime, $desc);

		if($correctValidation)
		{
			$sqlDownload = "SELECT * FROM $tableName WHERE Id = '$id'";

			$query = mysqli_query($conUsers, $sqlDownload);

			$rows = mysqli_num_rows($query);

			if($rows == 1)
			{
				$sql = "UPDATE $tableName SET id = '$id', Title = '$title', Type = '$type', Time = $time, Series = '$series', Break = $breakTime, Description = '$desc' WHERE id = $id";

				mysqli_query($conUsers,$sql);
				
				echo json_encode('');
			}
			else if($rows == 0)
			{
				$sql = "INSERT INTO $tableName VALUES('$id', '$title', '$type', '$time', '$series', '$breakTime', '$desc', '',DEFAULT ,DEFAULT )";

				mysqli_query($conUsers, $sql);

				$success = "";

				echo json_encode($success);
			}
		
		}
		else
		{
			$error = $validation->errorArray;
			echo json_encode($error);
		}

		
	}
	else
	{
		//echo "Emtpy";
		return;
	}
?>