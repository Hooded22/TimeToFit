<div class="container col-12 px-0 mx-0 d-block" style = "text-align: center;">
	<!--Title of exercies, handy menu of the curent exercise -->
	<div class="row col-10 px-0 mx-auto">
		<div class = "buttons_container col-12 mx-0 px-0 py-4">
			<header class="col-12 mx-0 my-1">
					<div>
						<h4 class="exercise_title" id="exercise_title">
						</h4>
					</div>
				</header>
				<div class="description_bar col-md-12 mr-auto ml-auto">
					<div role="button" aria-label="Open Menu Music" Title="Open Menu Music" class="desc col-4 d-block float-left ">
						<div class="col-10 col-md-5 d-block mr-auto ml-auto desc_block" onclick="Open('.music_list')">
							<i class="fas fa-music"></i>
						</div>
					</div>
					<div role="button" aria-label="Show exercise`s description" Title="Show exercise`s description" class="desc col-4 d-block float-left ">
						<div class="col-12 col-md-8 d-block mr-auto ml-auto desc_block" onclick="new Comunicat().description()">
							<i>Desc.</i>
						</div>
					</div>
					<div role="button" aria-label="Look on your list of exercise" Title="Look on your list of exercise" class="desc col-4 d-block float-left ">
						<div class="col-10 col-md-5 d-block mr-auto ml-auto desc_block" onclick="new Comunicat().listOfWhole()">
							<i class="fas fa-clipboard-list"style="font-size: 1.7em"></i>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
<div class = "container col-12 px-0 mx-0 d-block">
	<div class = "row col-12 mx-0 px-0">
		<div class = "timer_container col-10 mx-auto px-0  py-2">
			<div class="direction col-1 col-md-3 px-0 mx-auto d-inline-block">
				<i class="fas fa-chevron-circle-left" onclick="previousExercise()"></i>
			</div>
			<div class="timer col-9 col-sm-4 col-md-3 mx-auto d-block">
				<div class="timer_overlay overlay" onclick="play()">
					<i class="far fa-play-circle" role = "button"></i>
				</div>
				<div class="timer_clock col-12 mx-0 my-0">
					<span class="timer_content">
						0
					</span>
				</div>
			</div>
			<div class="direction col-1 col-md-3 px-0 mx-auto d-inline-block">
				<i class="fas fa-chevron-circle-right" onclick="nextExerciseButton('open')"></i>
			</div>
			<div class="clearfix"></div>
			<div class="time_menager  mx-auto my-3 px-0"  onclick="play()">
				<i class="far fa-play-circle my-2" style="font-size: 2em" role = "button" disabled = "true"></i>
				<p class = "hidden">Reps</p>
			</div>
		</div>
	</div>
</div>

</div>
<!--<div class = "container col-12 px-0 mx-0 d-block">
	<div class = "row col-12 mx-0 px-0">
	
		<div class="timer_container col-12 px-0 mx-0 mt-5 ">
			<div class="direction col-2 col-md-3 d-inline-block">
				<i class="fas fa-chevron-circle-left" onclick="previousExercise()"></i>
			</div>
			<div class="timer col-7 col-md-5 mx-auto d-inline-block">
				<div class="timer_overlay overlay" onclick="play()">
					<i class="far fa-play-circle"></i>
				</div>
				<div class="timer_clock col-12 mx-0 my-1">
					<span class="timer_content d-block">
						0
					</span>
				</div>
			</div>
			<div class="direction col-2 col-md-3 d-inline-block">
				<i class="fas fa-chevron-circle-right" onclick="nextExerciseButton('open')"></i>
			</div>
		</div>
		<div class="time_menager col-2 mx-auto my-3 px-0"  onclick="reset()">
			<i class="far fa-stop-circle my-2" style="font-size: 2em"></i>
		</div>
	</div>
</div>-->