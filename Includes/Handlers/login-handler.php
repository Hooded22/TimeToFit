<?php 
	if(isset($_POST['login']))
  	{
    	//echo "Everything is okey, now...";
    	$usernameLogin = $_POST['username-login'];
    	$passwordLogin = $_POST['password-login'];

    	//Login

    	$result = $account->login($usernameLogin, $passwordLogin);

    	if($result)
    	{
			$_SESSION['userLogged'] = $usernameLogin;
			
			if($_SESSION['confirm'] != 0) {
				header('Location: Includes/Pages/userPage.php');
			} else {
				header('Location: Includes/Pages/confirmEmail.php');
			}
    		
    	}
    	else
    	{
    		return;
    	}
  	}
 ?>