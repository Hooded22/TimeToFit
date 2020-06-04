<?php
	include('../../Includes/DataBase/config.php');

	if(isset($_POST['url']))
	{
		$link = $_POST['url'];

		$query = mysqli_query($con, "SELECT * FROM songs WHERE Link = '$link'");

		$result = mysqli_fetch_array($query);

		echo json_encode($result);
	}
?>