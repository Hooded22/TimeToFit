<?php
	include('../../Includes/DataBase/config.php');

	if(isset($_POST['Id']))
	{
		$Id = $_POST['Id'];

		$table = $_SESSION['currentTable'];

		$query = mysqli_query($conUsers, "SELECT * FROM $table");

		$result = array();

		while($row = mysqli_fetch_array($query))
		{	if($row['id'] ==  $Id)
			{
				$result[] = '<li class="my-0 py-2 col-12 mx-0 px-0"><i class="fas fa-circle pointerDot"></i>
				<p class="d-inline-block col-10 mx-0 px-0">'.$row['Title'].', - '.$row['Time'].' ('.$row['Type'].')</p>
				<i class="fas fa-ellipsis-v d-inline-block col-1 mx-0 px-0"></i>	
				</li>';
			}
			else if($row['id'] < $Id)
			{
				$result[] = '<li class="my-0 py-2 col-12 mx-0 px-0" style="opacity:0.5">
				<i class="far fa-check-circle doneDot"></i>
			<p class="d-inline-block col-10 mx-0 px-0">'.$row['Title'].', - '.$row['Time'].' ('.$row['Type'].')</p>
			<i class="fas fa-ellipsis-v d-inline-block col-1 mx-0 px-0"></i>	
			</li>';
			}
			else
			{
				$result[] = '<li class="my-0 py-2 col-12 mx-0 px-0">
			<p class="d-inline-block col-10 mx-0 px-0">'.$row['Title'].', - '.$row['Time'].' ('.$row['Type'].')</p>
			<i class="fas fa-ellipsis-v d-inline-block col-1 mx-0 px-0"></i>	
			</li>';
			}
		}
		echo json_encode($result);
	}
?>