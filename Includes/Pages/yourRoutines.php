<?php
	include('../DataBase/config.php');
	include('../Classes/Data.php');
	include('../Functions/tablesName.php');
	if(!isset($_SESSION['userLogged']))
	{
		header('Location:../../login-page.php');
	}

	$user =  $_SESSION['userLogged'];

	$sql = "SELECT exerciseTables FROM users WHERE username = '$user'";

	$row = mysqli_fetch_array(mysqli_query($con,$sql));
	
	tablesOfUser($conTables);

	$name = $_SESSION['tablesName'];

	$data = new Data($con, $conUsers, $name);
	


?>
<!Doctype html>
<html>
<head>
	<head>

	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
	<meta name = "description" content="Place where you have all your routines ready to use." />
	<meta name = "author" content="Przemyslaw Sipta" />
	<meta name = "keywords" content="Wokout, Exercise, Music, Workout Menager, Workout Time Counter, Time Counter"/>
	<meta name="theme-color" content="white"/>
	<meta name="msapplication-TileColor" content="#000000">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#000000">
		
	<link rel="stylesheet" href="../../Style/bootstrap.css">
	<link rel="stylesheet" href="../../Style/user-page-style.css"/>
	<link rel="stylesheet" href="../../Style/feedBack-style.css"/>
	<link rel="stylesheet" href="../../Style/Fontello/UserPage/css/fontello.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Karla|Oswald|Rajdhani|Stylish|Titillium+Web" rel="stylesheet"/>
	<link rel="manifest" href="../../manifest.json"> 

	<link rel="apple-touch-icon" sizes="57x57" href="../../Img/Favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../../Img/Favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../../Img/Favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../../Img/Favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../../Img/Favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../../Img/Favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../../Img/Favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../../Img/Favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../../Img/Favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../../Img/Favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../../Img/Favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../../Img/Favicon/favicon-16x16.png">

	<title>TimeToFit || Routines</title>
</head>
<body>
<nav>
  <div id="siderMenu" class="container col-8 hidden">

  	<h4 class="col-10 mx-auto py-3 pb-0 mb-0">
  	TimeToFit
	<p class="Version pb-0 mb-0">Version Beta 1.0</p>
  	</h4>


	<div class="row menu_icons px-0 col-12 px-0 mx-0 my-3">

				
				<a href="../../index.php" class="col-12 mx-auto">
					<i class="fa fa-home col-1 d-inline-block mx-auto px-0"></i>
					<p class="d-inline-block mx-auto col-7 my-3">Home</p>
				</a>

				<a href="userPage.php" class="col-12 mx-auto">
					<i class="fa fa-user-tie col-1 d-inline-block mx-auto px-0"></i>
					<p class="d-inline-block mx-auto col-7 my-3">Profile</p>
				</a>

				<a href="comingSoon.php" class="col-12 mx-auto">
					<i class="fas fa-comments col-1 d-inline-block mx-auto px-0 "></i>
					<p class="d-inline-block mx-auto  col-7 my-3">Say Hello</p>
				</a>

				<a href="comingSoon.php" class="col-12 mx-auto">
					<i class="fas fa-smile col-1 d-inline-block mx-auto px-0 "></i>
					<p class="d-inline-block mx-auto col-7 my-3">About Us</p>
				</a>

				<a href="comingSoon.php" class="col-12 mx-auto">
					<i class="fas fa-globe d-inline-block mx-auto px-0 col-1 "></i>
					<p class="d-inline-block mx-auto  col-7 my-3">Social</p>
				</a>

				<a href="../Handlers/logout.php" class="col-12 mx-auto">
					<i class="fa fa-power-off col-1 d-inline-block mx-auto px-0"></i>
					<p class="d-inline-block mx-auto col-7 my-3">Logout</p>
				</a>

				<a onclick = "showFeedBack()" class="col-7 col-md-8 py-1 d-md-block mx-auto mt-4 fastFeedBack">
					Feedback
				</a>


				<!--<a href="#" class="col-12 mx-auto">
					<i class="fa fa-times col-1 d-inline-block mx-auto px-0" onclick="showSiderMenu()"></i>
					<p class="d-inline-block mx-auto col-7 my-3">Close</p>
				</a>-->

			</div>
  </div>
    
</nav>

<section id="routine_block_popmenu">
	<div class="overlay routine_button_menu hidden">
		<i class="fas fa-times" onclick="hideMenuWorkout()"></i>
		<div class="row col-7 col-md-2 mx-auto">
			<button class="col-12 d-block py-2 px-4 mt-3" onclick="goWorkout('name')">Let`s Go !</button>
			<button class="col-12 d-block py-3 px-4" onclick="showWorkout('name')">Show Workout</button>
			<button class="col-12 d-block py-3 px-4" onclick="nameWorkout('name')">Change Name</button>
			<button class="col-12 d-block py-3 px-4" onclick="">Change Icon</button>
			<button class="col-12 d-block py-3 px-4" onclick="">Change Color</button>
			<button class="col-12 d-block py-3 px-4" onclick="">Remove</button>
		</div>
	</div>
</section>


<main>
	<div class="container col-sm-12 mx-sm-0 px-0">

		<section id="your_routines">
			<div class="row col-11 mx-auto mt-3 col-md-10 offset-md-2 float-md-right">
				<h2 class="col-12">Click and Go</h2>

				<?php
					
					if($name[0] != ""){

						for($i=1; $i <= $row[0]; $i++)
						{
							$lowerUser = strtolower($user);
							$name = $_SESSION["tablesName"];
							$table = strtolower($name[$i]);
							$sql = "SELECT * FROM $table";
							$query = @mysqli_query($conUsers,$sql);
							$array =@mysqli_fetch_array($query);
							$numRows = @mysqli_num_rows($query);
							$string = "'".$table."'";

							//Take user name of table:
							//if user name is not empty -> use this name
							//else use routine + $i

							
							echo '<div class="routine_block col-5 col-lg-3 py-lg-2 d-inline-block mx-auto my-2 px-0" onclick="popMenuWorkout('.$string.')" style="border-color:'.$array['Color'].'">
						<h5 class="">'.$array['NewName'].'</h5>
						<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172"style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="'.$array['Color'].'"><path d="'.$array['Image'].'"></path></g></g></svg>
						<p class="mt-2">'.$numRows.' exercises </p>
						</div>';

						}
					} else {
						echo "<h3 class = 'col-10 mx-auto py-5 my-5'>You dont have any routine</h3>";
					}

				?>
				<!--
				<div class="routine_block col-5 d-inline-block mx-auto my-2 px-0">
					<h5 class="">Title</h5>
					<i class="fas fa-fist-raised"></i>
					<p class="mt-2">Count of exercise</p>
				</div>

				<div class="routine_block col-5 d-inline-block mx-auto my-2 px-0">
					<h5 class="">Title</h5>
					<i class="fas fa-fist-raised"></i>
					<p class="mt-2">Count of exercise</p>
				</div>
			-->
			</div>
		</section>

	<nav class="footer mt-auto py-3 col-12 col-md-2 py-0 float-md-left">
	
		<div class="row top_content d-none d-md-block col-12 mx-0 px-0 my-0 ">
			<div class="col-12 mx-auto" id="profil_image_box">
				<?php
						echo '<img src="'.$data->getPicture().'" class="profile_image d-inline-block" />'
					?>
			</div>
			
			<div class="col-12 clearfix my-2">
				<h5 class="d-inline-block ml-1">
						<?php
							echo $_SESSION['userLogged'];
						?>
						<a href="userProfileSetting.php" class="d-inline-block mr-3 mr-md-0 ml-md-4"><i class="fas fa-cog "></i></a>
					</h5>
			</div>

		</div>

			<div class="row menu_icons px-0 col-12 px-0 mx-0 my-3">

				<a href="userPage.php" class="col-4 col-md-12 mx-auto">
					<i class="fas fa-chevron-left col-1 d-inline-block mx-auto px-0"></i>
					<p class="d-none d-md-inline-block mx-auto col-6 col-md-8 my-3">Back</p>
				</a>
				
				<a href="../../index.php" class="col-4 col-md-12 mx-auto">
					<i class="fas fa-home d-inline-block mx-auto px-0 col-1"></i>
					<p class="d-none d-md-inline-block mx-auto  col-6 col-md-8 my-3">Home</p>
				</a>

				<a class="col-4 col-md-12 mx-auto d-md-none">
					<i class="fas fa-bars d-inline-block mx-auto px-0 col-1" onclick="showSiderMenu()"></i>
				</a>

				<a href="comingSoon.php" class="col-4 col-md-12 mx-auto d-none d-md-block">
					<i class="fas fa-globe d-md-inline-block mx-auto px-0 col-1 "></i>
					<p class="d-none d-md-inline-block mx-auto  col-6 col-md-8 my-3">Social</p>
				</a>

				<p id="sideBarComunicat" class="col-4 p-fixed hidden p-0 m-0">Have a nice day ;)</p>

				<a href="comingSoon.php" class="col-4 col-md-12 mx-auto">
					<i class="fas fa-comments col-1 d-none d-md-inline-block mx-auto px-0 "></i>
					<p class="d-none d-md-inline-block mx-auto  col-6 col-md-8 my-3">Say Hello</p>
				</a>

				<a href="comingSoon.php" class="col-4 col-md-12 mx-auto">
					<i class="fas fa-smile col-1 d-none d-md-inline-block mx-auto px-0 "></i>
					<p class="d-none d-md-inline-block mx-auto col-6 col-md-8 my-3">About Us</p>
				</a>

				<a onclick = "showFeedBack()" class="col-4 col-md-8 py-1 d-none d-md-block mx-auto mt-4 fastFeedBack">
					Feedback
				</a>

			</div>
	</nav>
</div>
	<?php include('../HTML_Parts/feedBack.php')?>
</main>

	<script src="../../Js/j.query.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../Js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../Js/Pages/icons.js"></script>
	<script type="text/javascript" src = "../../Js/Pages/routines.js"></script>
	<script src="../Functions/showSiderMenu.js"></script>
	<script src = "../../Js/Pages/feedBack.js"></script>
</body>
</html>