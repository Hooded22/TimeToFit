<?php
	/**
	 * 
	 */
	class File
	{
		public $errorArray;
		
		function __construct($con)
		{
			$this->con = $con;
			$this->errorArray = array();
		}

		public function addFile($type, $file, $validExtension, $duration)
		{
			$this->validateFile($type, $file, $validExtension);
			$this->saveFile($file,'tmp-picture');

			if(empty($this->errorArray))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		private function validateFile($type, $file, $validExtension)
		{
			 if($_FILES['profileImg']['error'] > 0)
			 {
				 switch ($_FILES['profileImg']['error'])
				    {
				      // jest większy niż domyślny maksymalny rozmiar,
				      // podany w pliku konfiguracyjnym
				      case 1: {array_push($this->errorArray, Constants::$fileToBig); break;} 

				      // jest większy niż wartość pola formularza 
				      // MAX_FILE_SIZE
				      case 2: {array_push($this->errorArray, Constants::$fileToBig); break;}

				      // plik nie został wysłany w całości
				      case 3: {array_push($this->errorArray, Constants::$nonOmnisLoad); break;}

				      // plik nie został wysłany
				      case 4: {array_push($this->errorArray, Constants::$luckOfFile); break;}

				      // pozostałe błędy
				      default: {array_push($this->errorArray, Constants::$uploadError); break;}
				    }
				    return;
			   }
			   else
			   {
			   		$fileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
				   	if(!in_array($fileType, $validExtension))
				   	{
				   		array_push($this->errorArray, Constants::$fileTypeError);
				   	}
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


		public function saveFile($file, $url)
		{

		$fileName = $_SESSION['userLogged'].'-'.strip_tags($file['name']);
		//$_SESSION['profile-image-name'] = $fileName;
		//$_SESSION['profile-image-tmp-name'] = $_FILES['profileImg']['tmp_name'];
		$location = '../../Img/'.$url.'/'.$fileName;

		if(is_uploaded_file($file['tmp_name']))
		{
		    if(!move_uploaded_file($_FILES['profileImg']['tmp_name'], $location))
		    {
		      array_push($this->errorArray,Constants::$uploadError);
		        return;
		    }
		  }
		  else
		  {
		    array_push($this->errorArray,Constants::$fileTypeError);
		    return;
		  }
		  return true;
		}


}
?>