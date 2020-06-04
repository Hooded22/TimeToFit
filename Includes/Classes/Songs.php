<?php  
	
	class AccountToAdd
	{
		
		private $con;
		private $errorArray;
		private $successArray;

		function __construct($con)
		{
			$this->con = $con;
			$this->errorArray = array();
			$this->successArray = array();
			$this->con = $con;
		}

		public function addSong($file, $artist, $duration, $genre, $playlist)
		{
			$this->validateRepeat($file['name']);
			$this->validateDuration($duration);
			$this->validateFile($file);
			$this->saveFile($file);

			if(empty($this->errorArray)){
				array_push($this->successArray, Constants::$addCompleted);
				return $this->addToDataBase($file, $artist, $duration, $genre, $playlist);
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

		public function getSuccess($nice)
		{
			if(!in_array($nice, $this->successArray))
			{
				$nice = "";
			}
			else
			{
				return "<span class='success'>$nice</span>";
			}
		}

		private function validateRepeat($arg1)
		{
			$name = $this->sanitizeFileName($arg1);
			$query = mysqli_query($this->con, "SELECT * FROM songs WHERE Title = '$name'");
			$rows = mysqli_num_rows($query);

			if($rows > 0)
			{
				array_push($this->errorArray, Constants::$tileIsExistError);
				return;
			}
		}

		private function validateDuration($duration)
		{
			if(strlen($duration) > 9 || strlen($duration) < 3)
			{
				array_push($this->errorArray, Constants::$durationError);
			}
		}


		private function validateFile($file)
		{
			 if($file['error'] > 0)
			 {
				 switch ($_FILES['obrazek']['error'])
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
				   	if($file['type'] != 'audio/mp3')
				   	{
				   		array_push($this->errorArray, Constants::$fileTypeError);
				   	}
				   	return;
			   }
		}

		private function addToDataBase($file, $artist, $duration, $genre, $playlist)
		{
			$name = sanitizeFormString($file['name']);
			$title = $this->sanitizeFileName($name);
			$link = "Music/".$name;
			$sql ="INSERT INTO songs VALUES(null, '$title', '$artist', '$playlist', '$genre', '$duration', '$link', 1, 0)";
			$query = mysqli_query($this->con, $sql);

			return $query;
		}

		private function sanitizeFileName($file)
		{
			$string = $file;

			$str ="";

			$strArray = explode(".",$string);

			$i=0;
			while($strArray[$i] != "mp3")
			{
			  $str = $str.$strArray[$i];
			  $i++;
			}
			return $str;
		}

		private function saveFile($file)
		{
		  $location = '../../Music/'.$file['name'];

		  if(is_uploaded_file($file['tmp_name']))
		  {
		    if(!move_uploaded_file($_FILES['musicFile']['tmp_name'], $location))
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