<?php
	include('../../Includes/DataBase/config.php');

	if(isset($_POST['songId']))
	{
		$Id = $_POST['songId'];

		$query = mysqli_query($con, "UPDATE songs SET Plays = Plays + 1 WHERE Id = '$Id'");
	}
?>