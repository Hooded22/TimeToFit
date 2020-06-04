<?php 
    include('../DataBase/Config.php');
    include('../Classes/Constants.php');
    include('../Classes/File.php');



	if(isset($_FILES['profileImg']))
  	{

        if($_FILES['profileImg']['tmp_name'] != "")
        {
            //session_start();
            $File = $_FILES['profileImg'];
            $_SESSION['profileImage'] = $File;
            $Name = $_SESSION['userLogged'].'-'.strip_tags($File['name']);
            $tmpName = $File['tmp_name'];
            $Type = 'image/png';
            $fileValid = new File($con);
            $ValidExtension = array('jpeg','jpg','png','gif','bmp');


        	$addingSuccess = $fileValid->addFile($Type, $File, $ValidExtension, 'temporary');

        	if($addingSuccess == true)
        	{
        		
        		echo json_encode($Name);
        	}
        	else
        	{
                /*echo $fileValid->getError('$fileToBig');
                echo $fileValid->getError('$fileToBig');
                echo $fileValid->getError('$nonOmnisLoad');
                echo $fileValid->getError('$luckOfFile');
                echo $fileValid->getError('$uploadError');
        		echo $fileValid->getError('$fileTypeError');*/
                echo 'Error: ';
                //unset($_SESSION['profileImage']);
        	}
        }
        else
        {
            return;
        }
  	}
    else 
    {
        return;
    }

?>