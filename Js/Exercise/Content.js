function Content()
{
	this.getData = function()
	{
		$.ajax({
			type: 'POST',
			url: 'Js/Ajax/getDataExercise.php',
			data: {Id:Data['Id']},
			success: function(data){
				//var dataArray = [];
				var provided = JSON.parse(data);
				//console.log(provided);
				if(provided != 'The End')
				{
					var Title = provided[1];
					var Type = provided[2];
					var Time = provided[3];
					var Series = provided[4]
					var Break = provided[5];
					var Desc = provided[6];
					var comunicat = new Comunicat(); 

					Data['Title'] = Title;
					Data['Type'] = Type;
					Data['Time'] = Time;
					Data['Series'] = Series;
					Data['ConstSeries'] = Data['Series'];
					Data['Break'] = Break;
					Data['Desc'] = Desc;

					Data['seriesCounter'] = 1;
					
					$('#exercise_title').text(Title);
					if(Type == "Time")
					{
						settings(Time, Break);
						$('.time_menager').removeClass('hidden');
						comunicat.areYouReady(Title, Type, Time);
					}
					else
					{
						let Reps = "<span class = 'spanReps d-block'>Reps</span>"
						czas = Time + Reps;
						writeTheTime();
						$('.timer_overlay').css('opacity','0');
						//console.log('Here');
						$('.time_menager').addClass('hidden');
						$('.fa-clock').parents('.time_menager').addClass('hidden');
						comunicat.areYouReady(Title, Type, Time);
					}
					
					
				}
				else
				{
					var comunicat = new Comunicat(); 
					comunicat.theEndMessage();
				}

			}
		});
	}

	this.howMuch = function()
	{
		$.ajax({
			type: 'POST',
			url: 'Js/Ajax/getDataExercise.php',
			success: function(posted){
				var howMuch = JSON.parse(posted);
				Data['Count'] = howMuch;
			}
		});
	}

	this.next = function(howMuch)
	{

		//Next exercise after user click
		if(Data['Id'] < Data['Count'] && Data['Series'] == 1)
		{
			Data['Id'] = Data['Id'] + 1;
			Data['Series'] = Data['Id'] - 1;
			content.getData();
		}
		else if(Data['Id'] == Data['Count'] && Data['Series'] == 1)
		{
			Data['Id'] = Data['Id'] + 1;
			content.getData();
			Data['Id'] =  Data['Id'] - 1;

		} // Next series after user click or if time of set will be null
		else if(Data['Series'] != 1)
		{
			content.repeat();
		}

	}

	this.previous = function()
	{
		Data['Id'] = Data['Id'] - 1;
		breakFlag = false;
		pause();
		this.getData();
	}

	//Next series

	this.repeat = function()
	{
		breakFlag = false;

		var comunicat = new Comunicat();

		Data['Series'] =  Data['Series'] - 1;

		if(Data['Type'] == 'Time'){

			settings(Data['Time'], Data['Break']);

			$('time_menager p').addClass('hidden');

			$('time_menager i').removeClass('hidden');

		} else {

			settings(Data['Time'] + "Reps", Data['Break']);

			$('time_menager i').addClass('hidden');

			$('time_menager p').removeClass('hidden');
		}

		console.log('Seriess: '+Data['Series']);
		console.log('Type: ' + Data['Type'])

		comunicat.nextSeriesMessage(Data['Title'], Data['Type'], Data['Time'], Data['Series']);
	}

}
