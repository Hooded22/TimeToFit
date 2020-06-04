<?php

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $adress = "timetofi@timetofit.hmcloud.pl";
        $subject = "Contact Message from TTF";
        mail($adress, $subject, $message, $email );

        echo "Your email have been sended";
    }

   

?>