<?php 

class PasswordChange
	{
		private $con;
		public $errorArray;
		private $username;
		public $successArray;

		function __construct($con)
		{
			$this->con = $con;
			$this->errorArray = array();
			$this->successArray = array();
			$this->username = $_SESSION['userLogged'];
		}

		public function changePassword($pw1, $pw2)
		{
			$this->checkIfExist($pw1, $pw2);

			if(empty($this->errorArray))
			{
				array_push($this->successArray, Constants::$changeCompleted);
				return true;
			}
			else
			{
				
				return false;
			}
			
		}

		private function checkIfExist($oldPassword, $newPassword)
		{
			$sql = "SELECT password FROM users WHERE username='$this->username'";
			$query = mysqli_query($this->con,$sql);
			$password = mysqli_fetch_array($query);

			if($password[0]==$oldPassword)
			{
				$this->validatePasswords($oldPassword, $newPassword);
			}
			else
			{
				array_push($this->errorArray, Constants::$changePasswordError1);
				return;
			}
		}

		private function validatePasswords($old, $new)
		{
			if($old == $new)
			{
				array_push($this->errorArray, Constants::$changePasswordError2);
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/',$new))
			{
				array_push($this->errorArray, Constants::$passwordError2 );
				return;
			}

			if(strlen($new) > 50 || strlen($new) < 5)
			{
				array_push($this->errorArray, Constants::$passwordError3);
				return;
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

		public function getSuccess($success)
		{
			if(!in_array($success, $this->successArray))
			{
				$success = "";
			}
			else
			{
				return "<span class='error'>$success</span>";
			}
		}
	}
?>