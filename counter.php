<?php
	include("Includes/DataBase/config.php");
	if(!isset($_SESSION['currentTable']))
	{
		header('Location:login-page.php');
	}
	
		/*$table = $_SESSION['currentTable'];

		$query =  mysqli_query($conUsers, "SELECT * FROM $table");

		$row = mysqli_fetch_array($query);

		$num = mysqli_num_rows($query);

		$currentId = $row['id'];

		function currentTitle($conUsers, $Id, $Table)
		{
			$queryHelper = mysqli_query($conUsers, "SELECT Title FROM $Table WHERE id = '$Id' ");
			$rowHelper = mysqli_fetch_array($queryHelper);
			echo  $rowHelper[0];
		}*/
?>
<!Doctype html>
<html>
<head>
	<?php include('Includes/HTML_Parts/header.php')?>
</head>
<body onload="writeTheTime(), checkStopButton()">
	<!--Navbar Logo Menu-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark col-12 mx-auto px-0">
		<?php include('Includes/HTML_Parts/navigation.php')?>
		<title>TimeToFit || Workout </title>
	</nav>
	<main>
			<div class="overlay settings hidden">
				<?php include('Includes/HTML_Parts/settings.php')?>
			</div>
			<div class="overlay" id="message">
				<?php include('Includes/HTML_Parts/message.php')?>
			</div>
			<div class="overlay hidden" id="descAndList">
				<?php include('Includes/HTML_Parts/description.php')?>
			</div>
			<div class="overlay music_list hidden">
				<?php include('Includes/HTML_Parts/music_list.php')?>
			</div>
			<div class="overlay direction_button_menu hidden my-0 mx-0">
				<div class="row col-6 col-lg-2 mx-auto my-0">
					<button class="col-12 d-block py-2 px-4 mt-3" onclick="nextExercise('series')">Series</button>
					<button class="col-12 d-block py-3 px-4" onclick="nextExercise('exercise')">Exercise</button>
				</div>
			</div>
		<section class="exercise">
			<?php include('Includes/HTML_Parts/exercise.php')?>
		</section>
		<section class="music">
			<?php include('Includes/HTML_Parts/music.php')?>
		</section>
	</main>
	<?php include('Includes/HTML_Parts/feedBack.php')?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="Js/bootstrap.min.js"></script>
<script type="text/javascript" src="Js/Exercise/TimeCounter.js"></script>
<script type="text/javascript" src="Js/Music/MusicMenager.js"></script>
<script type="text/javascript" src="Js/Exercise/Content.js"></script>
<script type="text/javascript" src="Js/Exercise/dataExercise.js"></script>
<script type="text/javascript" src="Js/Exercise/Comunicats.js"></script>
<script type="text/javascript">
	
	var adressVariable = "Js/Ajax/sendRate.php";

	$(window).on('load', () => {
		let timer = $('.timer');
		let timerWidth = timer.css('width');
		timer.css('height', timerWidth);

	} )

	window.onresize = () => {
		let timer = $('.timer');
		let timerHeight  = timer.css('height');
		let timerWidth = timer.css('width');

		console.log(timerWidth);

		timer.css('height', timerWidth);
	}
</script>
<script src = "Js/Pages/feedBack.js"></script>
<!--<script type="text/javascript">
	var audioElement =  new Audio();
	audioElement.setTrack("Music/Cypress Hill - (Rock) Superstar.mp3");
	audioElement.audio.play();
</script>-->
</html>
