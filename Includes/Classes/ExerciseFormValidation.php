<?php
	/**
	 * 
	 */
	class Validation
	{
		private $con;
		public $errorArray;
		
		function __construct($con)
		{
			$this->con = $con;
			$this->errorArray = array();
		}

		public function addToBase($title, $type, $time, $series, $break, $desc)
		{
			$this->validateTitle($title);
			$this->validateTime($time, $break, $series);
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

		private function validateTime($time, $break, $series)
		{
			if($time < 0 || $time > 999 || $time === '')
			{
				array_push($this->errorArray,Comunicats::$timeError);
				return;
			}

			if($break < 0 || $break > 999 || $break === '')
			{
				array_push($this->errorArray,Comunicats::$breakError);
				return;
			}

			if($series < 0 || $series > 999 || $series === '')
			{
				array_push($this->errorArray,Comunicats::$seriesError);
				return;
			}
		}

		private function validateDesc($desc)
		{
			if(strlen($desc) > 500)
			{
				array_push($this->errorArray,Comunicats::$descError);
				return;
			}
		}
	}
?>