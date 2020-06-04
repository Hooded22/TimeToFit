<?php
	/**
	 * 
	 */
	class Account
	{
		private $errorArray;
		private $con;
		private $conUsers;
		public $successArray;

		public function __construct($con)
		{
			$this->errorArray = array();
			$this->successArray = array();
			$this->con = $con;
			$this->conUsers =mysqli_connect('localhost','root','','timetofitusersfiles');
		}

		public function login($us, $pw)
		{
			$pw = md5($pw);

			$query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$us' AND password='$pw'");

			$result = mysqli_fetch_array($query);
			$_SESSION['status'] = $result['statusUser'];
			$_SESSION['key'] = $result['userKey'];
			$_SESSION['confirm'] = $result['emailConfirmed'];
			//$_SESSION['tables'] = $result['exerciseTables'];

			if(mysqli_num_rows($query) == 1 && $result['statusUser'] > 0)
			{
				return true;
			}
			else if($result['statusUser'] == 3)
			{
				array_push($this->errorArray, Constants::$bannedUser);
				return false;
			}
			else
			{
				array_push($this->errorArray, Constants::$loginError);
				return false;
			}
		}

		public function register($us, $fn, $ln, $em1, $em2, $ps1, $ps2)
		{
			$this->validateUsername($us);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em1, $em2);
			$this->validatePasswords($ps1, $ps2);


			if(empty($this->errorArray))
			{
				//insert to db
				array_push($this->successArray, Constants::$registerCompeleted);
				$this->creatUserTable($us);
				return $this->insertIntoBase($us, $fn, $ln, $em1, $ps1);
			}
			else
			{
				return false;
			}
		}

		public function change($us, $fn, $ln, $em, $ct, $co, $ab)
		{
			if($us != $_SESSION['userLogged'])
			{
				$this->validateUsername($us);
			}
			else
			{
				$this->validateFirstName($us);
			}
			
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmailChange($em);
			$this->validateFirstName($ct);
			$this->validateFirstName($co);
			$this->validateLongString($ab);

			if(empty($this->errorArray))
			{
				//insert to db
				array_push($this->successArray,Constants::$changeCompleted);
				return $this->successArray;
			}
			else
			{
				return false;
			}
		}

		private function insertIntoBase($un, $fn, $ln, $em, $pw)
		{
			$encryptedPass = md5($pw);
			$userStatus = 1;
			$userPicture = "../../Img/profile-picture/default.png";
			$date = date('Y-m-d H:i:s');
			$em = strtolower($em);
			$userKey = $this->generateUserKey();

			$this->sendEmail($em, $userKey, $un);

			$result = mysqli_query($this->con, "INSERT INTO users VALUES (null,'$un','$fn','$ln', '$em', '$encryptedPass','$date','$userStatus','$userPicture','','','','0','0','0',$userKey)");

			return $result;
		}

		private function creatUserTable($us)
		{
			$username = strtolower($us);
			$sql = "CREATE TABLE `timetofitusersfiles`.`".$username."favourite` ( `Id` INT NOT NULL AUTO_INCREMENT , `Title` VARCHAR(100) NOT NULL , `Type` INT(2) NOT NULL , PRIMARY KEY (`Id`)) ENGINE = MyISAM;";
			$result = mysqli_query($this->conUsers, $sql);

			return $result;

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

		public function getSuccess($nice)
		{
			if(!in_array($nice, $this->successArray))
			{
				$nice = "";
				return false;
			}
			else
			{
				return "<span class='success'>$nice</span>";
			}
		}

		private function validateUsername($us)
		{
			if(strlen($us) > 25 || strlen($us) < 5)
			{
				array_push($this->errorArray, Constants::$usernameError);
				return;
			}

			$checkExist = mysqli_query($this->con, "SELECT username FROM users WHERE username='$us'");

			if(mysqli_num_rows($checkExist) != 0)
			{
				array_push($this->errorArray, Constants::$usernameError2);
				return;
			}
		}

		private function validateFirstName($fn)
		{
			if(strlen($fn) > 25 || strlen($fn) < 2)
			{
				array_push($this->errorArray, Constants::$nameError);
				return;
			}
		}

		private function validateLastName($ln)
		{
			if(strlen($ln) > 25 || strlen($ln) < 2)
			{
				array_push($this->errorArray, Constants::$nameError2);
				return;
			}
		}

		private function validateEmails($em1, $em2)
		{
			if($em1!=$em2)
			{
				array_push($this->errorArray, Constants::$emailError);
				return;
			}

			if(!filter_var($em1, FILTER_VALIDATE_EMAIL))
			{
				array_push($this->errorArray, Constants::$emailError2);
				return;
			}

			$checkExist = mysqli_query($this->con, "SELECT username FROM users WHERE email='$em1'");

			if(mysqli_num_rows($checkExist) != 0)
			{
				array_push($this->errorArray, Constants::$emailError3);
				return;
			}
		}

		private function validatePasswords($ps1, $ps2)
		{
			if($ps1!=$ps2)
			{
				array_push($this->errorArray, Constants::$passwordError3 );
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/',$ps1))
			{
				array_push($this->errorArray, Constants::$passwordError2 );
				return;
			}

			if(strlen($ps1) > 25 || strlen($ps1) < 5)
			{
				array_push($this->errorArray, Constants::$passwordError);
				return;
			}
		}

		private function validateLongString($ls)
		{
			if(strlen($ls) > 500 || strlen($ls) < 2)
			{
				array_push($this->errorArray, Constants::$longStringError);
				return;
			}
		}

		private function validateEmailChange($em)
		{
			if(!filter_var($em, FILTER_VALIDATE_EMAIL))
			{
				array_push($this->errorArray, Constants::$emailError2);
				return;
			}

			$query = mysqli_query($this->con,"SELECT email FROM users WHERE username = '".$_SESSION['userLogged']."'");

			$row = mysqli_fetch_array($query);

			if($row[0]!=$em)
			{
				$this->checkEmailExist($em);
			}
		}

		private function checkEmailExist($em)
		{
			$checkExist = mysqli_query($this->con, "SELECT username FROM users WHERE email='$em'");

			if(mysqli_num_rows($checkExist) != 0)
			{
				array_push($this->errorArray, Constants::$emailError3);
				return;
			}
		}

		private function generateUserKey(){
			$key = "";
			for ($i=0; $i <= 5 ; $i++) { 
				$key = $key.strval(rand(0,10));
			}

			return $key;

			
		}

		private function sendEmail($email, $key, $username){
			mail($email, "TimeToFit || Confirm email code", "Code: $key", "TimeToFit");
		}

	}
?>