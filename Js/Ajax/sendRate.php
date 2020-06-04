<?php
    include('../../Includes/DataBase/config.php');
    
    function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
        $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    function getUser(){

        if(isset($_SESSION['userLogged'])) {

            $user = $_SESSION['userLogged'];
            return $user;

        } else {

            $user = getRealIpAddr();
            return $user;

        }
    }

    if(isset($_POST['rate']))
    {
        $rate = $_POST['rate'];

        $date = date("Y-m-d");

        $user = getUser();

        $getRatings = "SELECT * FROM ratings WHERE User = '$user' ";

        $getRatingsQuery  = mysqli_query($con, $getRatings);

        if(mysqli_num_rows($getRatingsQuery) === 0) {

            $sendRatings = "INSERT INTO ratings VALUES (NULL, '$user', '$rate', '$date')";

            mysqli_query($con, $sendRatings);

            unset($_POST['rate']);

            return;

        } else {

            $sendRatings = "UPDATE ratings SET Grade = $rate, Date = '$date' WHERE User = '$user'";

            mysqli_query($con, $sendRatings);

            unset($_POST['rate']);

            return;
            
        }

    } else if (isset($_POST['feedBack'])) {
        $feedBack = $_POST['feedBack'];

        $feedBack = strip_tags($feedBack);

        $user = getUser();

        $date = date("Y-m-d");

        //$sql = "INSERT INTO feedback VALUES (NULL, '$user', '$feedBack', '$date')";

        //mysqli_query($con, $sql);

       
        $email = "User email: ".$_POST['email'];

        $adress = "timetofi@timetofit.hmcloud.pl";

        $subject = "FeedBack from ".$user;

        mail($adress, $subject, $feedBack, $email );

        unset( $_POST['feedBack']);

        return;
    } else if (isset($_POST['getData'])){
        $user = getUser();

        $sql = "SELECT Grade FROM ratings WHERE User = '$user'";

        $result = mysqli_query($con, $sql);

        $array = mysqli_fetch_array($result);

        $grade = $array[0];

        echo json_encode($grade);
    }
?>

