<?php
	include('../../Includes/DataBase/config.php');
	include('../../Includes/Classes/ValidateName.php');

		$tableName = strtolower($_SESSION['userLogged'])."tmpexercise";
		$nameOriginal = $_POST['name'];
		$name = sanitazeName($nameOriginal);
		$ValidateName = new ValidateName($name);

		if($_SESSION['tables'] <= 4)
		{

			//Rename of table. "Add new table with exercise"
			$newTableName = strtolower($_SESSION['userLogged']).strtolower($name); 
			
			$sql = "RENAME TABLE $tableName TO $newTableName";

			$ValidateName = new ValidateName($name);

			if($ValidateName -> validation())
			{
				echo "error";
			}
			else
			{
				
				mysqli_query($conUsers, $sql);

				$exerciseTables = $_SESSION['tables'] + 1;


				//Change number of tables this users
				$update = mysqli_query($con, "UPDATE users SET exerciseTables = '$exerciseTables' WHERE username = '".$_SESSION['userLogged']."'");

				$changeNameTable = "UPDATE $newTableName SET NewName = '$nameOriginal'";

				mysqli_query($conUsers, $changeNameTable);

				$_SESSION['currentTable']= $newTableName;

				echo json_encode($changeNameTable);
			}

		}
		else
		{
			$_SESSION['currentTable']= $tableName;
			return;
		}
		

?>