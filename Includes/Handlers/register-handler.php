<?php
	
	function sanitizeFormUsername($text)
	{
		$text = strip_tags($text);
		$text = str_replace(' ','',$text);
		return $text;
	}

	function sanitizeFormPassword($text)
	{
		$text = strip_tags($text);
		return $text;
	}

	function sanitizeFormString($text)
	{
		$text = strip_tags($text);
		$text = str_replace(' ','',$text);
		$text = ucfirst(strtolower($text));
		return $text;

	}

	if(isset($_POST['register']))
  	{
    	//echo "Everything is okey, now...";
    	$username = sanitizeFormUsername($_POST['username']);
    	$firstName = sanitizeFormString($_POST['first-name']);
    	$lastName = sanitizeFormString($_POST['last-name']);
    	$email = sanitizeFormString($_POST['email']);
    	$emailConfirm = sanitizeFormString($_POST['email-confirm']);
    	$password = sanitizeFormPassword($_POST['password']);
    	$passwordConfirm = sanitizeFormPassword($_POST['password-confirm']);

    	$registerSuccess = $account->register($username, $firstName, $lastName, $email, $emailConfirm, $password, $passwordConfirm);

    	if($registerSuccess == true)
    	{
    		
    		return true;
    	}
    	else
    	{
    		return false;
    	}
  	}
?>