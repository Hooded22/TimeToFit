<?php
	
	include('../../Includes/DataBase/config.php');

	if(isset($_POST['genre']))
	{
		$genre = $_POST['genre'];

		$query = mysqli_query($con,"SELECT * FROM songs WHERE Genre='$genre'");

		$result = array();

		$num_rows = mysqli_num_rows($query);
		

		while($row = mysqli_fetch_array($query))
		{
			//for($i = 1; $i <= $num_rows; $i++)
			//{
				$src = "'".$row['Link']."'";
				$result[] = '<li class="col-12 mx-0 px-auto mt-1 d-block px-0 music_song"  onclick="playChosenSong('.$src.')"><div class="music_kind_numbering float-left col-2 mx-0 px-0"></div><div class="music_kind_description float-left col-8 mx-0 px-0"><p>'.$row['Title'].'</p><p>'.$row['Artist'].'</p></div><div class="music_kind_time float-left col-2 mx-0 px-0">'.$row['Duration'].'</div></li>';
				
			//}
		}

		echo json_encode($result);
	}
	else if(isset($_POST['playlistName']))
	{
		$plName = $_POST['playlistName'];

		$query = mysqli_query($con, "SELECT * FROM songs WHERE Playlist='$plName'");

		$resultSecond = array();

		$num_rows = mysqli_num_rows($query);

		while($row = mysqli_fetch_array($query))
		{
			//for($i = 1; $i <= $num_rows; $i++)
			//{
				$src = "'".$row['Link']."'";
				$resultSecond[] = '<li class="col-12 mx-0 px-auto mt-1 d-block px-0 music_song"  onclick="playChosenSong('.$src.')"><div class="music_kind_numbering float-left col-2 mx-0 px-0"></div><div class="music_kind_description float-left col-8 mx-0 px-0"><p>'.$row['Title'].'</p><p>'.$row['Artist'].'</p></div><div class="music_kind_time float-left col-2 mx-0 px-0">'.$row['Duration'].'</div></li>';
				
			//}
		}

		echo json_encode($resultSecond);



	}
	else if(isset($_POST['usersSongs']))
	{
		$table = $_POST['usersSongs'];
		$query_helper = mysqli_query($conUsers, "SELECT * FROM $table WHERE Type = '1'");

		$num_rows_helper = mysqli_num_rows($query_helper);

		$result = array();

		while($row_helper = mysqli_fetch_array($query_helper))
		{
			$query = mysqli_query($con, "SELECT * FROM songs WHERE Title='".$row_helper['Title']."'");

			$num_rows = mysqli_num_rows($query);

			while($row = mysqli_fetch_array($query))
			{
				//for($i = 1; $i <= $num_rows; $i++)
				//{
					$src = "'".$row['Link']."'";
					$result[] = '<li class="col-12 mx-0 px-auto mt-1 d-block px-0 music_song"  onclick="playChosenSong('.$src.')"><div class="music_kind_numbering float-left col-2 mx-0 px-0"></div><div class="music_kind_description float-left col-8 mx-0 px-0"><p>'.$row['Title'].'</p><p>'.$row['Artist'].'</p></div><div class="music_kind_time float-left col-2 mx-0 px-0">'.$row['Duration'].'</div></li>';
					
				//}
			}
		}

		echo json_encode($result);
	}
?>