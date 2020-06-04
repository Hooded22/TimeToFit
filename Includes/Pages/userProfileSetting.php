<?php
	include('../DataBase/config.php');
	include('../Classes/Account.php');
	include('../Classes/PasswordChange.php');
	include('../Classes/File.php');
	include('../Classes/Constants.php');
	if(!isset($_SESSION['userLogged']))
	{
		header('Location:../../login-page.php');
	}

	$username = $_SESSION['userLogged'];

	$query = mysqli_query($con,"SELECT * FROM users WHERE username ='$username'");

	$result = mysqli_fetch_array($query);

	$account = new Account($con);

	$fileValidation = new File($con);

	$passwordChange =  new PasswordChange($con);


	include('../Handlers/changeHandler.php');

	
?>
<!Doctype html>
<html>
	<head>

		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
		<meta name = "description" content="Page for change settings of your profile" />
		<meta name = "author" content="Przemyslaw Sipta" />
		<meta name = "keywords" content="Wokout, Exercise, Music, Workout Menager, Workout Time Counter, Time Counter"/>
		<meta name="theme-color" content="white"/>
		<meta name="msapplication-TileColor" content="#000000">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#000000">
		<meta http-equiv="Cache-control" content="no-cache">



		<link rel="stylesheet" href="../../Style/bootstrap.css">
		<link rel="stylesheet" href="../../Style/user-page-style.css"/>
		<link rel="stylesheet" href="../../Style/feedBack-style.css"/>
		<link rel="stylesheet" href="../../Style/Fontello/UserPage/css/fontello.css"/>
		<link rel="stylesheet" href="../../Style/loadingAnimation.css"/>
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



		<title>TimeToFit || User Settings</title>
	</head>
<body>
<nav>
  <div id="siderMenu" class="container col-8 hidden">

  	<h4 class="col-10 mx-auto py-3 pb-0 mb-0">
  	TimeToFit
	<p class="Version pb-0 mb-0">Version Alpha 1.0</p>
  	</h4>


	<div class="row menu_icons px-0 col-12 px-0 mx-0 my-3">

				
				<a href="index.php" class="col-12 mx-auto">
					<i class="fa fa-home col-1 d-inline-block mx-auto px-0"></i>
					<p class="d-inline-block mx-auto col-7 my-3">Home</p>
				</a>

				<a href="userPage.php" class="col-12 mx-auto">
					<i class="fa fa-user-tie col-1 d-inline-block mx-auto px-0"></i>
					<p class="d-inline-block mx-auto col-7 my-3">Profile</p>
				</a>


				<a href="contact.php" class="col-12 mx-auto">
					<i class="fas fa-comments col-1 d-inline-block mx-auto px-0 "></i>
					<p class="d-inline-block mx-auto  col-7 my-3">Say Hello</p>
				</a>

				<a href="aboutUs.php" class="col-12 mx-auto">
					<i class="fas fa-smile col-1 d-inline-block mx-auto px-0 "></i>
					<p class="d-inline-block mx-auto col-7 my-3">About Us</p>
				</a>

				<a href="social.php" class="col-12 mx-auto">
					<i class="fas fa-globe d-inline-block mx-auto px-0 col-1 "></i>
					<p class="d-inline-block mx-auto  col-7 my-3">Social</p>
				</a>

				<a href="../Handlers/logout.php" class="col-12 mx-auto">
					<i class="fa fa-power-off col-1 d-inline-block mx-auto px-0"></i>
					<p class="d-inline-block mx-auto col-7 my-3">Logout</p>
				</a>

				<a onclick = "showFeedBack()" class="col-4 col-md-8 py-1 d-none d-md-block mx-auto mt-4 fastFeedBack">
					Feedback
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

		<section id="messages">

			<div class="col-12 mt-2 mb-0 mx-0 blockMessage" id="succesMessage">
			        <?php echo $account->getSuccess(Constants::$changeCompleted);?>
			        <?php echo $passwordChange->getSuccess(Constants::$changeCompleted);?>
			</div>

		    <div class="col-12 mt-2 mb-0 mx-0 blockMessage"  id="errorMessage">
		    	<?php echo $account->getError(Constants::$usernameError)?>
				<?php echo $account->getError(Constants::$usernameError2)?>
				<?php echo $account->getError(Constants::$nameError)?>
			    <?php echo $account->getError(Constants::$nameError2)?>
			    <?php echo $account->getError(Constants::$emailError2)?>
			    <?php echo $account->getError(Constants::$emailError3)?>
			    <?php echo $account->getError(Constants::$emailError)?>
			    <?php echo $account->getError(Constants::$longStringError)?>
			    <?php echo $passwordChange->getError(Constants::$changePasswordError1);?>
			    <?php echo $passwordChange->getError(Constants::$changePasswordError2);?>
			    <?php echo $passwordChange->getError(Constants::$passwordError2);?>
			    <?php echo $passwordChange->getError(Constants::$passwordError3);?>
		        <span class="error"></span>
		    </div>

		</section>
		
		<section id="change_password_section">

			<div class="overlay hidden" class="change_block" id="change_password">

				<div class="change_content col-12 mx-0 px-0 pb-5 pt-2">
					
					<i class="fas fa-times d-block col-10 mx-auto" onclick="change('false','password')"></i>
					<h4>Choose password</h4>

					<form action="#" name="passwordChange" method="POST">

						<div class="line col-10 col-md-6 mx-auto px-0 py-2 d-block">
							<input type="password" name="pw1" class="col-10 mx-auto" placeholder="Old password" />
							<i class="far fa-eye-slash col-1 mx-auto" onclick="passwordShow(this)"></i>
						</div>

						<div class="line col-10 col-md-6 mx-auto px-0 py-2 d-block">
							<input type="password" name="pw2" class="col-10 mx-auto" placeholder="New password" />
							<i class="far fa-eye-slash col-1 mx-auto" onclick="passwordShow(this)"></i>
						</div>

						<button type="submit" name='passwordChange' class="button col-4 col-md-1 mx-auto d-block mt-3 py-1">
								Save Changes
						</button>

					</form>

				</div>

			</div>
		</section>

		<section id="change_image_section">

			<div class="overlay hidden" class="change_block" id="change_image">

				<div class="change_content col-12 mx-0 px-0 pb-5 pt-5">
					
					<i class="fas fa-times d-block col-10 mx-auto" onclick="change('false','image')"></i>

					<h4>Choose Image</h4>
					<div class="line col-10 mx-auto px-0 py-2 d-block">

						<form method="POST" action="../Handlers/addImage-handler.php" enctype="multipart/form-data" id='imageForm'>

							<div class="upload_image_button d-block col-5 col-md-2 mt-2 py-4 mx-auto" onclick="clickButtonFile()">
								<img src="../../Img/profile-picture/default.png">

								<div class="sk-folding-cube hidden">
                                    <div class="sk-cube1 sk-cube"></div>
                                    <div class="sk-cube2 sk-cube"></div>
                                    <div class="sk-cube4 sk-cube"></div>
                                    <div class="sk-cube3 sk-cube"></div>
								</div>

								<p class="p-0 m-0">Click for file</p>
							</div>

							
							<input type="file" name="profileImg" id="sendButton" class="col-12 mx-auto" />

						</form>

					</div>

					<button name="settingsChange" class="button d-inline-block col-3 col-md-3 col-lg-1 mt-0 py-1" onclick="deleteFiles()">
							Cancel
					</button>

					<button name="settingsChange" class="button col-3 col-md-3 col-lg-1  mx-auto d-inline-block mt-0 py-1" onclick="saveProfileImage()">
							Ok
					</button>
				</div>

			</div>
		</section>

		<section id="over_information" class="d-md-none">

			<div class="row top_content col-md-10 offset-md-2 float-md-right col-12 mx-0 px-0 my-0 py-2">

				<div class="col-12 mx-auto profile_image_box">

					<div class="col-5 d-block mx-auto">
						<?php
							echo '<img src="'.$result['userPicture'].'" class="profile_image mx-auto d-block" />'
						?>

						<i class="fas fa-pen py-2 px-2" onclick="change('true','image')"></i>

						<i class="fas fa-exclamation-circle fastFeedBack" style = "right: -30%;" onclick = "showFeedBack()"></i>	
					</div>

						

					<h5 class="profile_name d-block mt-2 mx-auto col-5">
						<?php
							echo $_SESSION['userLogged'];
						?>
					</h5>
					
				</div>
		</section>

		<section id="personal_data">
			<div class="container col-12 col-md-9 mt-3 float-md-right offset-md-2 pb-5 mb-5">
			    <div class="row personal_data col-12 mx-0 px-0">
				<form action="userProfileSetting.php" method="POST" name="settingsChange" id = "form1" class="col-12 mx-0 px-0">

					

						<div class="personal_data_line col-12 mx-auto px-0 py-2 d-block">
							<h4 class="col-6 d-inline-block">First Name</h4>
							<?php
								echo '<input class="col-5 mx-0  d-inline-block" type="text" value="'.$result['firstName'].'" name="firstName"/>'
							?>
						</div>

					
						<div class="personal_data_line col-12 mx-auto px-0 py-2 d-block">
							<h4 class="col-6 d-inline-block">Last Name</h4>
							<?php
								echo '<input class="col-5 mx-0  d-inline-block" type="text" value="'.$result['lastName'].'" name="lastName"/>'
							?>
						</div>
					

					
						<div class="personal_data_line col-12 mx-auto px-0 py-2 d-block">
							<h4 class="col-6 d-inline-block">Username</h4>
							<?php
								echo '<input class="col-5 mx-0  d-inline-block" disabled type="text" value="'.$result['username'].'" name="Username"/>'
							?>
						</div>
					

					
						<div class="personal_data_line col-12 mx-auto px-0 py-2 d-block">
							<h4 class="col-2 d-inline-block">Email</h4>
							<?php
								echo '<input class="col-9 mx-0  d-inline-block" type="text" value="'.$result['email'].'" name="Email"/>'
							?>
						</div>
					

					
						<div class="personal_data_line col-12 mx-auto px-0 py-2 d-block">
							<h4 class="col-6 d-inline-block">City</h4>
							<?php
								echo '<input class="col-5 mx-0  d-inline-block" type="text" value="'.$result['City'].'" name="City"/>'
							?>
						</div>
					

					
						<div class="personal_data_line col-12 mx-auto px-0 py-2 d-block">
							<h4 class="col-6 d-inline-block">Country</h4>
							<?php
								echo '<input class="col-5 mx-0  d-inline-block" type="text" value="'.$result['Country'].'" name="Country"/>'
							?>
						</div>
					

						<div class="personal_data_line col-12 mx-auto px-0 py-2 d-block">
							<h4 class="col-6 d-inline-block">About Me</h4>
							<?php
								echo '<input class="col-5 mx-0  d-inline-block" type="text" value="'.$result['aboutMe'].'" name="aboutMe"/>'
							?>
						</div>
					

						<button onclick = "submiter('form1')" name="settingsChange" class="button col-4 col-md-3 col-lg-1 mx-auto d-block mt-3 py-1">
							Save Changes
						</button>
					
				</form>

					<div class="personal_data_line col-12 mx-auto px-0 py-2 d-block mt-4" onclick="change('true','password')">
						<h4 class="col-10 d-inline-block">Change Password</h4>
						<i class="fas fa-chevron-right col-1 mx-0 d-inline-block"></i>
					</div>

					<div class="personal_data_line col-12 mx-auto px-0 py-2 d-block mt-4">
						<h4 class="col-10 d-inline-block">Private Politicy</h4>
						<i class="fas fa-chevron-right col-1 mx-0 d-inline-block"></i>
					</div>
			</div>		
		</section>
		<nav class="footer mt-auto py-3 col-12 col-md-2 py-0 float-md-left">
		
			<div class="row top_content d-none d-md-block col-12 mx-0 px-0 my-0 ">
				<div class="col-12 mx-auto profile_image_box">

					<div class="col-5 d-block mx-auto">
						<?php
							echo '<img src="'.$result['userPicture'].'" class="profile_image mx-auto d-block" />'
						?>

						<i class="fas fa-pen py-2 px-2" onclick="change('true','image')"></i>
						
					</div>

					

					<h5 class="profile_name d-block mt-2 mt-md-3 mx-auto col-5">
						<?php
							echo $_SESSION['userLogged'];
						?>
					</h5>

								
				
				</div>
			</div>

				<div class="row menu_icons px-0 col-12 px-0 mx-0 my-3">

					<a href="userPage.php" class="col-4 col-md-12 mx-auto ">
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

					<a href="social.php" class="col-4 col-md-12 mx-auto d-none d-md-block">
						<i class="fas fa-globe d-md-inline-block mx-auto px-0 col-1 "></i>
						<p class="d-none d-md-inline-block mx-auto  col-6 col-md-8 my-3">Social</p>
					</a>

					<p id="sideBarComunicat" class="col-4 p-fixed hidden p-0 m-0">Have a nice day ;)</p>

					<a href="contact.php" class="col-4 col-md-12 mx-auto">
						<i class="fas fa-comments col-1 d-none d-md-inline-block mx-auto px-0 "></i>
						<p class="d-none d-md-inline-block mx-auto  col-6 col-md-8 my-3">Say Hello</p>
					</a>

					<a href="aboutUs.php" class="col-4 col-md-12 mx-auto">
						<i class="fas fa-smile col-1 d-none d-md-inline-block mx-auto px-0 "></i>
						<p class="d-none d-md-inline-block mx-auto col-6 col-md-8 my-3">About Us</p>
					</a>

					<a class="col-4 col-md-8 py-1 d-none d-md-block mx-auto mt-4 fastFeedBack" onclick = "showFeedBack()">
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
<script src="../../Js/Pages/userSettings.js"></script>
<script src="../Functions/showSiderMenu.js"></script>
<script src = "../../Js/Pages/feedBack.js"></script>
</body>
</html>