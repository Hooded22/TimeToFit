<?php
	include('Includes/DataBase/config.php');
	include('Includes/Classes/ExerciseConstants.php');
	class Validation
	{
		private $con;
		private $errorArray;
		
		function __construct($con)
		{
			$this->con = $con;
			$this->errorArray = array();
		}

		public function addToBase($title, $type, $time, $break, $desc)
		{
			$this->validateTitle($title);
			$this->validateTime($time, $break);
			$this->validateDesc($desc);

			if(empty($this->errorArray))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function getError($error)
		{
			if(!in_array($error, $this->errorArray))
			{
				$error = "";
			}
			else
			{
				return "<span class='error'>$error</span>";
			}
		}

		private function validateTitle($title)
		{
			if(strlen($title) < 2 || strlen($title) > 40)
			{
				array_push($this->errorArray,Comunicats::$titleError);
				return;
			}
		}

		private function validateTime($time, $break)
		{
			if($time < 0 || $time > 999)
			{
				array_push($this->errorArray,Comunicats::$timeError);
				return;
			}

			if($break < 0 || $break > 999)
			{
				array_push($this->errorArray,Comunicats::$breakError);
				return;
			}
		}

		private function validateDesc($desc)
		{
			if(strlen($desc) < 2 || strlen($desc) > 500)
			{
				array_push($this->errorArray,Comunicats::$descError);
				return;
			}
		}
	}

	
		$tableName = $_SESSION['userLogged']."tmpexercise";
		$id = 1; 
		$title = ''; 
		$type = "Time"; 
		$time = ""; 
		$breakTime = 15; 
		$desc = "Do it slowly";
		//echo $tableName;

		$validation =  new Validation($con);

		$correctValidation = $validation->addToBase($title, $type, $time, $breakTime, $desc);

		if($correctValidation)
		{
			$sql = "INSERT INTO $tableName VALUES('$id', '$title', '$type', '$time', '$breakTime', '$desc')";

			mysqli_query($conUsers, $sql); 

			echo $sql;
		
		}
		else
		{
			$error = "Validation goes wrong";
			echo $error;
		}
?>