<?php
	class ValidateName
		{
			
			function __construct($name)
			{
				$this->name = $name;
				$this->tables = $_SESSION['tablesName'];
			}

			public function validation()
			{
				if($this->validateIfExist() || $this->validateLength()){
					return true;
				}
				else
				{
					return false;
				}
			}


			private function validateIfExist()
			{
				$length = count($this->tables);
				//echo $length;
				$nameToCheck = strtolower($_SESSION['userLogged']).$this->name;
					for($i = 0; $i < $length; $i++)
					{
						if($this->tables[$i] == $nameToCheck)
						{
							
							return true;
						}
					}
			}

			private function validateLength()
			{
				if(strlen($this->name) < 2 || strlen($this->name) > 15)
				{
					return true;
				}
				else {
				 	return false;
				 } 
			}
		}

		function sanitazeName($name)
		{
			$name = strip_tags($name);
			$name = str_replace(' ','',$name);
			$name = strtolower($name);

			return $name;
		}
?>