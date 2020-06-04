<?php
	include("Includes/DataBase/config.php");
	if(!isset($_SESSION['userLogged']))
	{
		header('Location:login-page.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('Includes/HTML_Parts/header.php')?>
	<title>TimeToFit || Music Page</title>
</head>
<body style="overflow-y: hidden;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark col-12 mx-auto px-0">
		<?php include('Includes/HTML_Parts/navigation.php')?>
	</nav>
	<main>

		<div class="container col-12 px-0 mx-0" style="height:130%;">
			<section id="music_list">
				<div>
					<div class="overlay hidden h-100" id="music_kind">
						<div class="music_list_navbar">
							<i class="fas fa-arrow-circle-left d-block col-1 mr-2 float-left" id="back_3"></i>
							<h5 class="float-left mx-2">Genres</h5>
							<div class="music_list_search float-left col-4 float-right">Szukaj</div>
						</div>
						<div class="playlist_image col-12 col-sm-10 col-lg-8  mx-0 mx-sm-auto px-0 py-0 px-0 my-0">
							<img style="display: none" src=""/>
						</div>
						<div class="row col-12 mx-auto px-0 px-lg-auto" id="music_kind_content">
								<li class="col-12 mx-0 px-auto mt-1 d-none px-0 music_song"><div class="music_kind_numbering float-left col-2 mx-0 px-0">1</div><div class="music_kind_description float-left col-8 mx-0 px-0"><p>Tytuł</p><p>Autor</p></div><div class="music_kind_time float-left col-2 mx-0 px-0">00:00</div></li>
							</ul>
						</div>
					</div>

					<div class="overlay hidden h-100" id="music_choice">
						<div class="music_list_navbar">
							<i class="fas fa-arrow-circle-left d-block col-1 mr-2 d-block col-1 float-left" id="back_2"></i>
							<h5 class="float-left mx-2">Genres</h5>
							<div class="music_list_search float-left col-4 float-right">Szukaj</div>
						</div>
						<div style="clear: both;"></div>
						<div class="row col-12 d-block mx-auto px-0 h-100" >

							<div class="choice_selector col-12 d-block col-md-6 float-md-left mx-0 px-0" id="playlist_selector">
								<p>Playlists</p>
								<img src="Img/Backgrounds/playlist_choice_bg_2.jpg" alt="Choice songs"/>
							</div>

							<div class="choice_selector col-12 col-sm-6 d-block float-md-left mx-0 px-0" id="songs_selector">
								<p>Songs</p>
								<img src="Img/Backgrounds/songs_choice_bg.jpg" alt="Choice songs"/>
							</div>

						</div>
					</div>

					<div id="music_genres" class="music_genre container col-10 mx-auto px-0">
						<div class="music_list_navbar col-12 col-lg-10 mx-auto px-0">
							<h5 class="col-7 col-lg-9 col-md-7 mx-auto d-inline-block">Genres</h5>
							<?php
								$onclick = "'".$_SESSION['userLogged']."- Favour'";
								echo '<i class="fas fa-heart mx-1 d-inline-block" onclick="showMeChoice('.$onclick.')"></i>';
							?>
							<div class="music_list_search col-2 d-inline-block ">Szukaj</div>
						</div>
						<div class="row col-12 col-lg-10 mx-0 px-0 mx-auto py-lg-auto">

							<div role="button" class="music_list_block ">Rock</div>
							<div role="button" class="music_list_block">Rap</div>

							<div role="button" class="music_list_block">Trap</div>
							<div role="button" class="music_list_block">Epic</div>

							<div role="button" class="music_list_block">To Game</div>
							<div role="button" class="music_list_block">Pop</div>

							<div role="button" class="music_list_block">Latin</div>
							<div role="button" class="music_list_block">Remix</div>
						</div>
					</div>

				</div>
			</section>
			
			<section id="music_player">

				<div class="ovr-min">
					<?php Include('Includes/HTML_Parts/music.php') ?>
				</div>

			</section>
		</div>

	</main>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script type="text/javascript" src="Js/bootstrap.min.js"></script>
	<script type="text/javascript" src="Js/Exercise/TimeCounter.js"></script>
	<script type="text/javascript" src="Js/Music/MusicMenager.js"></script>
	<script type="text/javascript" src="Js/Exercise/Content.js"></script>
	<script type="text/javascript" src="Js/Exercise/dataExercise.js"></script>
	<script type="text/javascript" src="Js/Exercise/Comunicats.js"></script>
</body>
</html>