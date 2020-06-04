<?php
	$songsQuery =  mysqli_query($con, "SELECT * FROM songs ORDER BY Rand() LIMIT 2");

	$resultArray = array();

	while($result = mysqli_fetch_array($songsQuery))
	{
		array_push($resultArray, $result['Id']);
	} 

	$jsonArray = json_encode($resultArray);
?>

<script type="text/javascript" src="Js/Music/musicPlayer.js"></script>

<script>
	$(document).ready(function(){
		currentPlaylist = <?php echo $jsonArray; ?>;
		audioElement = new Audio();
		updateVolumeProgressBar(audioElement.audio);
		console.log(audioElement.audio.volume);

		$('#soundtrack').mousedown(function(){
			mouseDown = true;
		});

		$('#soundtrack').mousemove(function(e){
			if(mouseDown)
			{
				timeFromOffset(e, this);
			}
		});

		$('#soundtrack').mouseup(function(e){
			timeFromOffset(e, this);
		});

		//Volume

		$('#volume').mousedown(function(){
			mouseDown = true;
		});

		$('#volume').mousemove(function(e){
			if(mouseDown)
			{
				var percentage = e.offsetX / $(this).width();

				if(percentage >= 0 && percentage <=1)
				{
					audioElement.audio.volume = percentage;
					currentVolume = audioElement.audio.volume;
				}
			}
		});

		$('#volume').mouseup(function(e){
			var percentage = e.offsetX / $(this).width();
			

			if(percentage >= 0 && percentage <=1)
			{
				audioElement.audio.volume = percentage;
				currentVolume = audioElement.audio.volume;
			}
		});
	});

	$(document).mouseup(function(){
		mouseDown = false;
	});


	function timeFromOffset(mouse, bar){
		var percentage = mouse.offsetX / $(bar).width() * 100;
		var seconds = audioElement.audio.duration * (percentage / 100);
		audioElement.setTime(seconds);
	}
</script>


<div class="container-fluid">
<div class="row">
<!--Part for music-->
<div class="music_container mt-3 mt-lg-5 col-12 px-0 mx-auto">

	<i class = "fas fa-chevron-left hidden musicContainerSliderButton" onclick = "musicContainerSlide(false)"></i>

<div class="music_title col-12 col-lg-6 mx-auto px-0">
	<h5 style="text-align: center;" class="mt-2 mb-0">Song Title</h5>
</div>

<div class="music_viewer col-12 col-lg-8 py-0 mx-auto mt-2 mb-2 mb-lg-0 px-0 d-lg-inline-block float-left float-lg-none">
	<audio src="" id="music_audio_player"></audio>
	<div class="progressBar mx-0">
		<div class="row col-12 mx-0">
			<div class="progressTime currentMusicTime col-lg-2 col-1 d-none d-lg-block ">0:00</div>
			<div class="progressBarBack col-lg-8 px-0" id="soundtrack">
				<div class="progressBarBg"></div>
			</div>
			<div class="progressTime currentMusicTime d-lg-none d-block col-6 my-4 mb-2">0:00</div>
			<div class="progressTime remaningMusicTime col-lg-2 col-6 my-4 mb-2 my-lg-0 d-lg-block ">0:00</div>
		</div>
	</div>
</div>
<div class="col-12 col-md-8 py-3 py-lg-0 mx-auto px-0 my-0 music_menu_bottom">
	<div class="music_menu_bottom_parts col-12 mx-auto mr-0 px-0 d-block">
		<i class="fas fa-volume-up" style="opacity: 0; margin-left: 15%"></i>
		<i class="fas fa-random hidden"></i>
		<i class="fas fa-step-backward" onclick="prevSong()"></i>
		<i class="far fa-play-circle" id="playButtonMenuMusic" onclick="playSong()"></i>
		<i class="fas fa-step-forward" onclick="nextSong()"></i>
		<i class="icon-loop hidden"></i>
		<div class="d-inline-block position-relative col-2 px-0 mr-0 ml-3">
			<i class="fas fa-volume-up" onclick="mute()"></i>
			<div class="progressBarBack col-lg-8 col-12 px-0 py-0 d-lg-inline-block" id="volume">
				<div class="progressBarBg"></div>
			</div>
		</div>
	</div>
</div>

</div>
</div>
</div>