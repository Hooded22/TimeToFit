function Comunicat()
{
	this.areYouReady = function(Title, Type, Time)
	{
		console.log(Title);
		if(Data['Id'] != 1)
		{
			let titleType = Type === "Time" ? 's' : '';

			var headers = [];

			headers[0] = '<h1 class = "col-12 mx-auto">Next Exercise</h1>';

			headers[1] = "<h3>" + Title + "</h3>";

			headers[2] = "<h4>" + Type + ": " +  Time + " " + titleType + "</h4>";

			headers[3] = "<h4>Break Time: " + Data['Break'] + "s </h4>";
				
			$('#message .message_block').html(headers[0] + headers[1] + headers[2] + headers[3]);

			$('#message').removeClass('hidden');
			console.log("Type" + Type);
			this.messCounter(3);
			setTimeout(function(){
				$('#message').addClass('hidden');
				
				if(Type === "Time")
				{
					activated = false;
					play();
				} else {
					czas = Time + "REPS";
					writeTheTime();
				}
			},3300);
			
		}
		else
		{
			var header = "<h3>Hi !</h3>";
			var buttons = '<button class="col-3 d-inline-block mx-2 mt-4 mb-2" onclick="hiddenThis(\'#message\')" >Okey !</button>';
			var content = "<p>This is your first exercise. Set the music and click timer face</p>";
			$('#message .message_block').html(header+content+buttons);
			$('#message').removeClass('hidden');
			if(Type == "Reps")
			{
				Data['Type'] = Type;
			} 
		}
	}

	this.nextSeriesMessage = function(Title, Type, Time, Series)
	{
		
		Data['seriesCounter']++;

		$('#exercise_title').text(Title +" ("+Data['seriesCounter']+" / " + Data['ConstSeries'] +" )");

		let titleType = Type === "Time" ? 's' : '';

		var headers = [];

		headers[0] = '<h1 class = "col-12 mx-auto">Next Set</h1>';

		headers[1] = "<h3>" + Title + "</h3>";

		headers[2] = "<h4>" + Type + ": " +  Time + " " + titleType + "</h4>";

		headers[3] = "<h4>Break Time: " + Data['Break'] + "s </h4>";
			
		$('#message .message_block').html(headers[0] + headers[1] + headers[2] + headers[3]);

		$('#message').removeClass('hidden');

		this.messCounter(3);
		
		setTimeout(function(){
			$('#message').addClass('hidden');
			//console.log(Type);
			if(Type == "Time")
			{
				activated = false;
				$('#message .counter').text('');
				play();
			}
		},3300);
	}

	this.messCounter = function(i)
	{
		if(i >= 0)
		{
			$('#message .counter').css({
				'font-size': '3em',
				'opacity': '1',
			});

			var time = i > 0 ? i : 'Go!';

			var content  = $('.message_block').html();

			$('#message .counter').text(time);

			$('#message .counter').animate({
				fontSize: '60em',
				opacity: 0
			}, 300,);

			var newTime = time - 1;
			setTimeout(function(){
				new Comunicat().messCounter(newTime);
			},1000);
		}	
	}

	this.description = function()
	{
		pause();
		var header = "<h4 class='my-2'>"+Data['Title']+" - Description</h4>";
		var content = "<p>"+Data['Desc']+"</p>";
		$('#descAndList h5').text("Description");
		$('#descAndList .message_block').html(header+content);
		$('#descAndList').removeClass('hidden');
	}

	this.listOfWhole = function()
	{
		pause();
		var header = "<h4>Your Workout Routine</h4>";
		var listOpener = '<ol class="row col-12 mx-auto my-4">';
		var listCloser = '</ol>';
		$('#descAndList h5').text("List of routine");
		$.ajax({
			url: "Js/Ajax/listOfWhole.php",
			type: "POST",
			data: {Id:Data['Id']},
			success: function(provided)
			{
				var content = JSON.parse(provided);
				content =  content.toString();
				content = content.split(',').join('');
				$('#descAndList .message_block').html(header+listOpener+content+listCloser);
			}
		});
		$('#descAndList').removeClass('hidden');
	}

	this.agree = function()
	{

		$('#message').removeClass('hidden');
		var block = $('.message_block');
		var buttonAccept = '<button class="col-3 d-inline-block mx-2 mt-4 mb-2" onclick="new Comunicat().messBlockTrue()" >Yes !</button>';
		var buttonCancle = '<button class="col-3 d-inline-block mx-2 mt-4 mb-2" onclick="hiddenThis(\'#message\')" >No !</button>';
		var header = '<h3>Are you sure</h3>';
		var content = '<p class="my-4 d-block">That you want to reset time counter ?</p>';

		block.html(header+content+buttonAccept+buttonCancle);
	}

	this.messBlockTrue = function()
	{
		$('#message').addClass('hidden');
		areYouSure = true;
		reset();
	}

	this.theEndMessage = function()
	{
		$('#message .counter').text('');

		$('#message').removeClass('hidden');

		var block = $('#message .message_block');

		var buttonAccept = '<button class="col-3 d-inline-block mx-2 mt-4 mb-2" onclick="new Comunicat().theEndReturn(1)" >Repeat</button>';

		var buttonCancle = '<button class="col-3 d-inline-block mx-2 mt-4 mb-2" onclick="new Comunicat().theEndReturn(0)" >Exit</button>';

		var header = '<h3>Congratulation !!</h3>';

		var content = '<p class="my-4 d-block">You just have ended your workout routine. Now, you can back leave that place or repeat routine. </p>';	
		
		new Comunicat().updateDoned();
		
		block.html(header+content+buttonAccept+buttonCancle);
	}

	this.theEndReturn = function(answer)
	{
		if(answer == 1 )
		{
			
			location.reload();
		}
		else
		{
			
			 window.location.replace("Includes/Pages/userPage.php");
		}
	}

	this.updateDoned =  function()
	{
		$.ajax({
			url:'Js/Ajax/updateDoned.php',
			success: function(data){
				return;
			}
		});
	}

}