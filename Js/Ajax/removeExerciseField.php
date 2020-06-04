<?php
    include('../../Includes/DataBase/config.php');

    if(isset($_POST['key']))
    {
        $key = $_POST['key'];
        $table = strtolower($_SESSION['userLogged']).'tmpexercise';
        $sql = "DELETE FROM $table WHERE id = $key";

        mysqli_query($conUsers, $sql);

        $getData = "SELECT id FROM $table";

        $getResult = mysqli_query($conUsers, $getData);

        $idArray = array();


        $index = 0;

        while( $getArray = mysqli_fetch_array($getResult))
        {
            $idArray[$index] = $getArray['id'];
            $index++;
        }

        for ($i=0; $i < count($idArray); $i++) { 

            $newId = $i + 1;
            $id = $idArray[$i];

            $updateSQL = "UPDATE $table SET id = '$newId' WHERE id = $id";

            mysqli_query($conUsers, $updateSQL);
        }
        


        echo json_encode($sql);
    }
?>