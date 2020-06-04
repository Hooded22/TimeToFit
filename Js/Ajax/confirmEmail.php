<?php 
    include('../../Includes/DataBase/config.php');

    if(isset($_POST['code'])){
        $code = $_POST['code'];

        if($code == $_SESSION['key']){

            $user = $_SESSION['userLogged'];

            $sql = "UPDATE users SET emailConfirmed = 'true' WHERE username = '$user'";

            mysqli_query($con, $sql);

            $_SESSION['confirm'] = true;

            echo json_encode("");

            
        } 
        else 
        {
            echo json_encode("error");
        }
    } else {
        header('Location: ../../index.php');
    }
?>