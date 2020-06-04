<?php 
	include('../../Includes/DataBase/config.php');
	include('../../Includes/Classes/ValidateName.php');

	if(isset($_POST['nameOfTable']))
	{

		$name = $_POST['nameOfTable'];
		$tables = $_SESSION['tablesName'];
		
		
		//Check if exist

		$ValidateName = new ValidateName($name);

		if($ValidateName -> validation())
		{
			echo "error";
		}
		else
		{
			echo "";
		}
	}	
 ?>