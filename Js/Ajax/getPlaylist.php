<?php
	

	include('../../Includes/DataBase/config.php');

	if(isset($_POST['genre']))
	{
		$genre = $_POST['genre'];

		$query = mysqli_query($con,"SELECT * FROM playlists WHERE Genre='$genre'");

		$result = array();

		$num_rows = mysqli_num_rows($query);
		

		while($row = mysqli_fetch_array($query))
		{
			//for($i = 1; $i <= $num_rows; $i++)
			//{
				$result[] = '<div class="music_playlist_block col-6 mx-auto px-0"><img src="'.$row['Image'].'"><h6 class="mt-2 mb-0">'.$row['Name'].'</h6>(<span>'.$row['MusicAuthor'].'</span>)<p>Arrange By: '.$row['Author'].'</p></div>';
				
			//}
		}

		echo json_encode($result);
		//echo json_encode($num_rows);
	}
	else if(isset($_POST['usersList']))
	{
		$conUsers = mysqli_connect('localhost','root','','timetofitusersfiles');

		$table = $_POST['usersList'];
		$query_helper = mysqli_query($conUsers, "SELECT * FROM $table WHERE Type = '2'");

		$num_rows_helper = mysqli_num_rows($query_helper);

		$result = array();

		while($row_helper = mysqli_fetch_array($query_helper))
		{
			$query = mysqli_query($con, "SELECT * FROM playlists WHERE Name='".$row_helper['Title']."'");

			$num_rows = mysqli_num_rows($query);

			while($row = mysqli_fetch_array($query))
			{
				//for($i = 1; $i <= $num_rows; $i++)
				//{
					$result[] = '<div class="music_playlist_block col-6 mx-auto px-0"><img src="'.$row['Image'].'"><h6 class="mt-2 mb-0">'.$row['Name'].'</h6>(<span>'.$row['MusicAuthor'].'</span>)<p>Arrange By: '.$row['Author'].'</p></div>';
					
				//}
			}
		}

		echo json_encode($result);
	}
?>