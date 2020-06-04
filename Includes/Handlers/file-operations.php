 <?php 
 
	include('../Classes/Constants.php');
    include('../DataBase/Config.php');
    include('../Classes/File.php');
    include('../Classes/FileOperations.php');



    if(isset($_POST['file']) || isset($_POST['saveUrl']))
    {

        $operations = new FileOperations($con);

        if(isset($_POST['saveUrl']))
        {
            //session_start();

            if(isset($_SESSION['profileImage']))
            {
                $arrayUrl = $_POST['saveUrl'];

                if($operations->cleanAndSave($arrayUrl)){
                    echo json_encode('Success');
                }

                
            }
            else if(!isset($_SESSION['profileImage']))
            {
                echo 'Undefined variable';
                return;
            } else
            {
                echo "Some other error";
            }
        }
        else
        {
            $operations->deleteAll($_POST['file']);
        }
    }
    else
    {
       return;
       
    }
?>