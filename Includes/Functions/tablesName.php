<?php

	function tablesOfUser($conTables)
	{
		$database = $_SESSION['database'];

		$username = strtolower($_SESSION['userLogged']);

		$sql = "select table_name from information_schema.tables where table_schema = '$database' and table_name like '$username%' ";

		$query = mysqli_query($conTables, $sql);

		$tablesName = array('');

		$userName = strtolower($_SESSION['userLogged']);

		$i = 0;

		while($array = mysqli_fetch_array($query)){ 
			if($array['table_name'] != $userName.'favourite' && $array['table_name'] != $userName.'tmpexercises' )
			{
				$tablesName[$i] =  $array['table_name'];
				//echo $tablesName[$i];
				$i++;
				
			}
		}

		$_SESSION['tablesName'] = $tablesName;
	}

?>