<?php
	ob_start();
	session_start();
	include("accountKeys.php");

	$keys = new AccountKeys;
	
	$timezone = date_default_timezone_get('Europe/Warsaw');

	
	$con = mysqli_connect($keys::HOST,$keys::LOGIN,$keys::PASSWORD,$keys::DB_GENERAL);

	$conUsers = mysqli_connect($keys::HOST,$keys::LOGIN,$keys::PASSWORD,$keys::DB_USERS);

	$conTables = mysqli_connect($keys::HOST,$keys::LOGIN,$keys::PASSWORD,$keys::DB_TABLES);
	

	/*$con = mysqli_connect('localhost','timetofi','Z6-c$j_S_7:0+z','timetofi_TimeToFit');

	$conUsers = mysqli_connect('localhost','timetofi','Z6-c$j_S_7:0+z','timetofi_UsersFiles');

	$conTables = mysqli_connect('localhost','timetofi','Z6-c$j_S_7:0+z','information_schema');*/

	//$_SESSION['database'] = 'timetofi_UsersFiles';

	$_SESSION['database'] = $keys::DB_USERS;


	if(mysqli_connect_errno())
	{
		echo "Connect failed: ".mysqli_connect_errno();
	}
 ?>