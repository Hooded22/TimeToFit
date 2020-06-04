var czas = 0;
var timeBreak = 15;
var breakFlag = false;
var activated = false;
var areYouSure = false;
var clicked = false;

function setTime(x, y, z)
{
	alert(z);
}


function writeTheTime()
{
	$('.timer_content').html(czas);	
}

function checkStopButton()
{
	if(czas==0)
	{
		$('.fa-stop-circle').addClass('fa-clock');
		$('.fa-clock').removeClass('fa-stop-circle');
	}
}

function play()
{
	if(!clicked)
	{
		if(activated==false && czas > 0)
		{
			activated=true;
			$('.timer_container .fa-play-circle').addClass('fa-pause-circle');
			$('.timer_container .fa-pause-circle').removeClass('fa-play-circle');
			$('.timer_overlay').css('opacity','0');
			$('.fa-clock').addClass('fa-stop-circle');
			$('.fa-stop-circle').removeClass('fa-clock');
			timeCounter();
		}
		else if(activated==true && czas > 0)
		{
			activated=false;
			$('.timer_container .fa-pause-circle').addClass('fa-play-circle');
			$('.timer_container .fa-play-circle').removeClass('fa-pause-circle');
			$('.timer_overlay').css('opacity','0.9');
			timeCounter();
		}
		else if(czas==0)
		{
			$('.timer_container .fa-pause-circle').addClass('fa-play-circle');
			$('.timer_container .fa-play-circle').removeClass('fa-pause-circle');
		}

		clicked = true;
		setTimeout(() => {
			clicked = false;
		},600)
	}
}

function pause()
{
	if(!clicked)
	{
		if(activated == true)
		{
			play();
		}
	}
	
}

function timeCounter()
{
	breakFlag ? $('.timer_content').css('color','#dbb80d') : $('.timer_content').css('color','#fff');

	
	if(czas >= 0 && activated==true)
	{
		setTimeout(function()
			{
				if(activated==true)
				{
					czas=czas-1;
					$('.timer_content').html(czas);
					
					
					timeCounter();
				}
				
			},
			1000);
	}
	else if(czas < 0 )
	{
		if(breakFlag === false)
		{
			breakFlag=true;
			czas=timeBreak;
			$('.timer_content').css('color','#dbb80d');
			writeTheTime()
			
			timeCounter();
		}
		else
		{
			$('.timer_content').css('color','white');
			czas=0;
			timeBreak=0;
			breakFlag=false;
			checkStopButton();
			writeTheTime();
			nextExercise();
		}
		
	}
	else if(activated==false)
	{
		writeTheTime();
		console.log('STOP');
	}
}


$('#setTimeButton').click(function(){
	var usersTimeExercise = $('#timeExercise').val();
	var usersTimeBreak = $('#timeBreak').val();

	console.log(usersTimeBreak);

	settings(usersTimeExercise, usersTimeBreak);
});


function settings(t, b)
{
	//var usersTimeExercise = $('#timeExercise').val();
	// usersTimeBreak = $('#timeBreak').val();

	//console.log(t);
	//console.log(b);
	var usersTimeExercise = t;
	var usersTimeBreak = b;
	console.log(usersTimeBreak);

	if(usersTimeBreak=="" || usersTimeExercise=="")
	{
		if(usersTimeExercise=="")
		{
			usersTimeExercise=30;
		}
		
		if(usersTimeBreak=="")
		{
			usersTimeBreak = 15;
			console.log(usersTimeBreak);
		}
		if(isNaN(usersTimeExercise) || usersTimeExercise > 3600 || usersTimeExercise == '0' || usersTimeExercise < 0)
		{
			$('#settings_error').removeClass('hidden');
			$('#settings_error').html('You`ve inputed bad value');
		}
		else if(isNaN(usersTimeBreak) || usersTimeExercise > 3600 || usersTimeBreak == '0' || usersTimeBreak < 0)
		{
			$('#settings_error').removeClass('hidden');
			$('#settings_error').html('You`ve inputed bad value');
		}
		else
		{
			$('#settings_error').addClass('hidden');
			$('.settings').addClass('hidden');
			$('.fa-clock').addClass('fa-stop-circle');
			$('.fa-stop-circle').removeClass('fa-clock');
			czas = usersTimeExercise;
			timeBreak = usersTimeBreak;
			writeTheTime();
		}
	}
	else
	{
		if(isNaN(usersTimeExercise) || usersTimeExercise > 3600 || usersTimeExercise == '0' || usersTimeExercise < 0)
		{
			$('#settings_error').removeClass('hidden');
			$('#settings_error').html('You`ve inputed bad value');
		}
		else if(isNaN(usersTimeBreak) || usersTimeExercise > 3600 || usersTimeBreak == '0' || usersTimeBreak < 0)
		{
			$('#settings_error').removeClass('hidden');
			$('#settings_error').html('You`ve inputed bad value');
		}
		else
		{
			$('#settings_error').addClass('hidden');
			$('.settings').addClass('hidden');
			$('.fa-clock').addClass('fa-stop-circle');
			$('.fa-stop-circle').removeClass('fa-clock');
			czas = usersTimeExercise;
			timeBreak = usersTimeBreak;
			writeTheTime();
		}
	}

}

function reset()
{
	if(czas > 0 && areYouSure == true)
	{
		activated=false
		breakFlag = false;
		czas=0;
		writeTheTime();
		$('.fa-stop-circle').addClass('fa-clock');
		$('.fa-clock').removeClass('fa-stop-circle');
		$('.timer_container .fa-pause-circle').addClass('fa-play-circle');
		$('.timer_container .fa-play-circle').removeClass('fa-pause-circle');
		$('.timer_content').css('color','white');
		$('.timer_overlay').css('opacity','0');
		areYouSure = false;
	}
	/*else if(activated==false && czas > 0)
	{
		activated=false
		breakFlag = false;
		czas=0;
		writeTheTime();
		$('.fa-stop-circle').addClass('fa-clock');
		$('.fa-clock').removeClass('fa-stop-circle');
		$('.timer_overlay').css('opacity','');
		$('.fa-pause-circle').addClass('fa-play-circle');
		$('.fa-play-circle').removeClass('fa-pause-circle');
		$('.timer_content').css('color','white');
	}*/
	else if(czas == 0)
	{
		$('.settings').removeClass('hidden');
	}
	else if(areYouSure == false)
	{ 
		new Comunicat().agree();
	}
}
