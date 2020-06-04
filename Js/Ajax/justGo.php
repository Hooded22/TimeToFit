<?php
	include('../../Includes/DataBase/config.php');

		$tableName = strtolower($_SESSION['userLogged'])."tmpexercise";
		$_SESSION['currentTable'] = $tableName;
		

		//echo json_encode($sql);
?>