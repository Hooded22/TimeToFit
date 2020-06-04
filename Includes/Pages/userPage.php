<?php
	include('../DataBase/config.php');
	include('../Classes/Data.php');
	include('../Functions/tablesName.php');
	if(!isset($_SESSION['userLogged']))
	{
		header('Location:../../login-page.php');
	}


	//$numRows = 0;
	//$time = 0;
	tablesOfUser($conTables);
	$name = $_SESSION['tablesName'];

	$data = new Data($con, $conUsers, $name);

	
?>
<!Doctype html>
<html>
	<head>
		<!--meta Data-->
		<meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <meta name = "description" content="Your own profile in aplication" />
        <meta name = "author" content="Przemyslaw Sipta" />
        <meta name = "keywords" content="Wokout, Exercise, Music, Workout Menager, Workout Time Counter, Time Counter"/>
        <meta name="theme-color" content="white"/>
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#000000">

		<!--Links-->
		<link rel="stylesheet" href="../../Style/bootstrap.min.css">
		<link rel="stylesheet" href="../../Style/user-page-style.css"/>
		<link rel="stylesheet" href="../../Style/feedBack-style.css"/>
		<link rel="stylesheet" href="../../Style/Fontello/UserPage/css/fontello.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Karla|Oswald|Rajdhani|Stylish|Titillium+Web" rel="stylesheet"/>
		<link rel="manifest" href="../../manifest.json">

		<!--Favicon-->
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


		<title>TimeToFit || User Profile</title>
	</head>
<body>

<nav>
  <div id="siderMenu" class="container col-8 hidden">

  	<h4 class="col-10 mx-auto py-3 pb-0 mb-0">
  	TimeToFit
	<p class="Version pb-0 mb-0">Version Alpha 1.0</p>
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
					<p class="d-inline-block mx-auto col-7 my-3">About</p>
				</a>

				<a href="comingSoon.php" class="col-12 mx-auto">
					<i class="fas fa-globe d-inline-block mx-auto px-0 col-1 "></i>
					<p class="d-inline-block mx-auto  col-7 my-3">Social</p>
				</a>

				<a href="../Handlers/logout.php" class="col-12 mx-auto">
					<i class="fa fa-power-off col-2 d-inline-block mx-auto px-0"></i>
					<p class="d-inline-block mx-auto col-7 my-3">Logout</p>
				</a>


				<!--<a href="#" class="col-12 mx-auto">
					<i class="fa fa-times col-1 d-inline-block mx-auto px-0" onclick="showSiderMenu()"></i>
					<p class="d-inline-block mx-auto col-7 my-3">Close</p>
				</a>-->

			</div>
  </div>
    
</nav>

<main>
	<div class="container col-sm-12 mx-sm-0 px-0">
		<section id="over_information" class="d-md-none">
			<div class="row top_content col-md-10 offset-md-2 float-md-right col-12 mx-0 px-0 my-0 py-2">
				<div class="col-10 col-md-3 mx-auto float-md-left" class="profile_image_box">
					<?php
						echo '<img src="'.$data->getPicture().'" class="profile_image d-inline-block" />'
					?>
					<h5 class="d-inline-block ml-1">
						<?php
							echo $_SESSION['userLogged'];
						?>
						<a href="userProfileSetting.php" class="d-inline-block mr-3 mr-md-0 ml-md-4"><i class="fas fa-cog "></i></a>
					</h5>

					<i class="fas fa-exclamation-circle fastFeedBack" onclick = "showFeedBack()"></i>
					
				</div>
				<div class="col-12 col-md-7 float-md-left mx-auto my-2 py-2" id="statistics">
					<div class="row">

						<div class="stat_block col-4">
							<?php
								$data->getData();
								echo '<p>'.$data->numRows.'</p>';
							?>
							<h4>Exercises</h4>
						</div>

						<div class="stat_block col-4">
							<?php
								$data->getData();
								echo '<p>'.$data->time.'</p>';
							?>
							<h4>Finished</h4>
						</div>

						<div class="stat_block col-4">
							<p>0</p>
							<h4>Added</h4>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="choice_container">
			<div class="row col-12 col-md-10 offset-md-2 float-md-right mx-0 px-0 pb-5 mb-5 mb-md-0 py-md-5" id="bottom_content">


			<?php
				if($_SESSION['status'] >= 2){
					echo '<a href="adminPanel.php" class="col-12 mx-0 px-0" >
					<div class="choice_box">
	
						<div class="choice_content">
							<div class="choice_image">
								<div class="overlay">
									<p>Admin options</p>
								</div>
	
								<i class="fas fa-user-tie"></i>
								<div class="choice_image_text">
	
									<h4>Admin</h4>
	
								</div>
	
							</div>
	
							<div class="choice_text">
								<h4 class="m-0 p-0">Admin</h4>
								<p class="m-0 p-0">Admin Options</p>
							</div>
	
						</div>
	
					</div>
				</a>';
				}
			?>

			<a href="../../exercise-form.php" class="col-12 mx-0 px-0">
				<div class="choice_box">

					<div class="choice_content">
						<div class="choice_image">
							<div class="overlay">
								<p>Prepare routine, save or not, ane GO !</p>
							</div>

							<i class="fas fa-dumbbell"></i>
							<div class="choice_image_text">

								<h4>Workout</h4>

							</div>

						</div>

						<div class="choice_text">
							<h4 class="m-0 p-0">Workout</h4>
							<p class="m-0 p-0">Prepare routine, save or not, ane GO !</p>
						</div>

					</div>

				</div>
			</a>

			<a href="yourRoutines.php" class="col-12 mx-0 px-0">	
				<div class="choice_box">

					<div class="choice_content">

						<div class="choice_image">

							<div class="overlay">
								<p>List of all your exercise plans</p>
							</div>

							<i class="fas fa-clipboard-list"></i>
							<div class="choice_image_text">

								<h4>Your routines</h4>
								

							</div>

						</div>

						<div class="choice_text">
							<h4 class="m-0 p-0">Your routines</h4>
							<p class="m-0 p-0">List of all your exercise plans.</p>
						</div>

					</div>

				</div>
			</a>
			
			<a href="../../music-page.php" class="col-12 mx-0 px-0">
				<div class="choice_box">

					<div class="choice_content">

						<div class="choice_image">
							<div class="overlay">
								<p>Check what we can offer You in the subject of music </p>
							</div>

							<i class="fas fa-music"></i>
							<div class="choice_image_text">

								<h4>Music</h4>

							</div>

						</div>

						<div class="choice_text">
							<h4 class="m-0 p-0">Music</h4>
							<p class="m-0 p-0">Check what we can offer You in the subject of music</p>
						</div>

					</div>

				</div>
			</a>

				<div class="choice_box disable">

					<div class="choice_content">

						<div class="choice_image">

							<div class="overlay">
								<p>Choose one of progrmas which we`ve prepared for you !</p>
							</div>

							<i class="fas fa-list"></i>
							<div class="choice_image_text">

								<h4>Programs</h4>
								
							</div>

						</div>

						<div class="choice_text">
							<h4 class="m-0 p-0">Programs</h4>
							<p class="m-0 p-0">Choose one of progrmas which we`ve prepared for you !</p>
						</div>

					</div>

				</div>

				
				<div class="choice_box disable">

					<div class="choice_content">

						<div class="choice_image">
							<div class="overlay">
								<p>Measure your effects</p>
							</div>

							<i class="fas fa-chart-line"></i>
							<div class="choice_image_text">

								<h4>Progress</h4>
								
							</div>

						</div>

						<div class="choice_text">
							<h4 class="m-0 p-0">Progress</h4>
							<p class="m-0 p-0">Measure your effects</p>
						</div>

					</div>

				</div>

				<div class="choice_box disable">

					<div class="choice_content">

						<div class="choice_image">
							<div class="overlay">
								<p>Make our content richer</p>
							</div>

							<i class="fas fa-folder-plus"></i>
							<div class="choice_image_text">

								<h4>Add Something</h4>
								
							</div>

						</div>

						<div class="choice_text">
							<h4 class="m-0 p-0">Add Something</h4>
							<p class="m-0 p-0">Make our content richer</p>
						</div>

					</div>

				</div>


			</div>
		</section>
	<nav class="footer mt-auto py-3 col-12 col-md-2 py-0 float-md-left">
	
		<div class="row top_content d-none d-md-block col-12 mx-0 px-0 my-0 ">
			<div class="col-12 mx-auto" class="profil_image_box">
			<?php
				echo '<img src="'.$data->getPicture().'" class="profile_image d-inline-block" />'
			?>
		</div>
			
		<div class="col-12 clearfix my-2">
			<h5 class="d-inline-block col-3 px-0 mx-0">
				<?php
					echo $_SESSION['userLogged'];
				?>
			</h5>
			<a href="userProfileSetting.php" class="col-1 d-inline-block mr-3 mr-md-0 ml-md-4"><i class="fas fa-cog "></i></a>
		</div>

		<div class="col-12 mx-auto my-2 py-2 d-none d-md-block" id="statistics">
			<div class="row">

				<div class="stat_block col-12">
					<?php
						$data->getData();
						echo '<p class="d-inline-block">'.$data->numRows.'</p>'
					?>
					<h4 class="d-inline-block">Exercises</h4>
				</div>

				<div class="stat_block col-12">
					<?php
						$data->getData();
						echo '<p class="d-inline-block">'.$data->time.'</p>'
					?>
					<h4 class="d-inline-block">Finished</h4>
				</div>

				<div class="stat_block col-12">
					<p class="d-inline-block">0</p>
					<h4 class="d-inline-block">Added</h4>
				</div>

			</div>
		</div>

		</div>

		<div class="row menu_icons px-0 col-12 px-0 mx-0 my-3">

			<a href="../Handlers/logout.php" class="col-4 col-md-12 mx-auto">
				<i class="fa fa-power-off col-1 d-inline-block mx-auto px-0"></i>
				<p class="d-none d-md-inline-block mx-auto col-6 col-md-7 my-3">Logout</p>
			</a>
			
			<a href="../../index.php" class="col-4 col-md-12 mx-auto">
				<i class="fas fa-home d-inline-block mx-auto px-0 col-1"></i>
				<p class="d-none d-md-inline-block mx-auto  col-6 col-md-7 my-3">Home</p>
			</a>

			<a class="col-4 col-md-12 mx-auto d-md-none">
				<i class="fas fa-bars d-inline-block mx-auto px-0 col-1" onclick="showSiderMenu()"></i>
			</a>


			<a href="comingSoon.php" class="col-4 col-md-12 mx-auto d-none d-md-block">
				<i class="fas fa-globe d-md-inline-block mx-auto px-0 col-1 "></i>
				<p class="d-none d-md-inline-block mx-auto  col-6 col-md-7 my-3">Social</p>
			</a>

			<p id="sideBarComunicat" class="col-4 p-fixed hidden p-0 m-0">Have a nice day ;)</p>

			<a href="comingSoon.php" class="col-4 col-md-12 mx-auto">
				<i class="fas fa-comments col-1 d-none d-md-inline-block mx-auto px-0 "></i>
				<p class="d-none d-md-inline-block mx-auto  col-6  col-md-7 my-3">Say Hello</p>
			</a>

			<a href="comingSoon.php" class="col-4 col-md-12 mx-auto">
				<i class="fas fa-smile col-1 d-none d-md-inline-block mx-auto px-0 "></i>
				<p class="d-none d-md-inline-block mx-auto col-6 col-md-7 my-3">About</p>
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
<script src = "../../Js/Pages/userPage.js"></script>
<script src="../Functions/showSiderMenu.js"></script>
<script src = "../../Js/Pages/feedBack.js"></script>
</body>
</html>