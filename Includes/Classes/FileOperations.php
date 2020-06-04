<?php
    class FileOperations
    {
        private $con;

        function __construct($con)
        {
            $this->con = $con;
        }

        public function cleanAndSave($arrayUrl)
        {
            session_start();
            $file = $_SESSION['profileImage'];
            $newName = $_SESSION['userLogged'].'-profile-image.png';
            $newLocation = $arrayUrl[1].$newName;
            $location = $arrayUrl[0].$_SESSION['userLogged'].'-'.$file['name'];
            $con = $this->con;

            rename($location,$newLocation);

            $this->deleteAll($arrayUrl[0], $con);
            $this->saveInBase($newLocation, $con);

            return true;
        }

        public function deleteAll($folder, $con)
        {

            $folder = $folder; //'../../Img/tmp-picture';
     
            //Get a list of all of the file names in the folder.
            $files = glob($folder . '/*');
             
            //Loop through the file list.
            foreach($files as $file){
                //Make sure that this is a file and not a directory.
                if(is_file($file)){
                    //Use the unlink function to delete the file.
                    unlink($file);
                }
            }
        }

        private function saveInBase($userPicture, $con)
        {
            //session_start();
            $name = $_SESSION['userLogged'];
            $sql = "UPDATE users SET userPicture = '$userPicture' WHERE username = '$name'";
            if(mysqli_query($con,$sql)){
                echo $sql;
            }
            else {
                //echo "Error";
                return;
            }
            
        }
    }

?>