<?php


class Data
	{
		private $con;
		public $numRows;
		public $time;

		public function __construct($con, $conUsers, $name)
		{
			$this->con = $con;
			$this->conUsers = $conUsers;
			$this->dates = array();
			$this->user =  $_SESSION['userLogged'];
			$this->tablesName = $name;
		}

		public function getData()
		{
			
			$sql = "SELECT exerciseTables FROM users WHERE username = '$this->user'";

			$row = mysqli_fetch_array(mysqli_query($this->con,$sql));

			$this->getTimeAndNum($row);
			$this->getDoned();
		}

		public function getPicture()
		{
			$sql = "SELECT userPicture FROM users WHERE username = '$this->user'";

			$row = mysqli_fetch_array(mysqli_query($this->con,$sql));

			return $row[0];
		}


		private function getTimeAndNum($row)
		{
			
			for($i=0; $i<=$row[0]; $i++)
			{
				$lowerUser = strtolower($this->user);
				$name = $_SESSION['tablesName'];
				@$table = $this->tablesName[$i];
				$sql = "SELECT * FROM $table";
				$query = mysqli_query($this->conUsers,$sql);
				@$this->numRows = $this->numRows + mysqli_num_rows($query);
			}
		}

		private function getDoned()
		{
			$sql_second = "SELECT Doned FROM users WHERE username = '$this->user'";
			$query = mysqli_query($this->con,$sql_second);
			$row_second = mysqli_fetch_array($query);
			$this->time = $row_second[0];
		}
	}
	?>