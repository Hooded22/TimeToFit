<?php
    include('../../Includes/DataBase/config.php');
    
    if(isset($_POST['count'])){
        $_SESSION['count'] = $_POST['count'];
    } else {
        header('Location: ../../exercise-form.php');
    }
?>