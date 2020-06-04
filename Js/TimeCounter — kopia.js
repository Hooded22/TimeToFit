var czas = 0;
var timeBreak = 15;
var breakFlag = false;
var activated = false;

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
	if(activated==false && czas > 0)
	{
		activated=true;
		$('.fa-play-circle').addClass('fa-pause-circle');
		$('.fa-pause-circle').removeClass('fa-play-circle');
		$('.timer_overlay').css('opacity','');
		$('.fa-clock').addClass('fa-stop-circle');
		$('.fa-stop-circle').removeClass('fa-clock');
		timeCounter();
	}
	else if(activated==true && czas>0)
	{
		activated=false;
		$('.fa-pause-circle').addClass('fa-play-circle');
		$('.fa-play-circle').removeClass('fa-pause-circle');
		$('.timer_overlay').css('opacity','0.9');
		timeCounter();
	}
	else if(czas==0)
	{
		$('.fa-pause-circle').addClass('fa-play-circle');
		$('.fa-play-circle').removeClass('fa-pause-circle');
	}
}

function timeCounter()
{
	if(czas>0 && activated==true)
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
	else if(czas==0)
	{
		if(breakFlag==false)
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
		}
		
	}
	else if(activated==false)
	{
		writeTheTime();
	}
}

function settings()
{
	var usersTimeExercise = $('#timeExercise').val();
	var usersTimeBreak = $('#timeBreak').val();

	if(usersTimeBreak=="" || usersTimeExercise=="")
	{
		if(usersTimeExercise=="")
		{
			usersTimeExercise=30;
		}
		else
		{
			usersTimeBreak=15;
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
	if(activated==true && czas > 0)
	{
		activated=false
		czas=0;
		writeTheTime();
		$('.fa-stop-circle').addClass('fa-clock');
		$('.fa-clock').removeClass('fa-stop-circle');
		$('.fa-pause-circle').addClass('fa-play-circle');
		$('.fa-play-circle').removeClass('fa-pause-circle');
		$('.timer_content').css('color','white');
	}
	else if(activated==false && czas > 0)
	{
		activated=false
		czas=0;
		writeTheTime();
		$('.fa-stop-circle').addClass('fa-clock');
		$('.fa-clock').removeClass('fa-stop-circle');
		$('.timer_overlay').css('opacity','');
		$('.fa-pause-circle').addClass('fa-play-circle');
		$('.fa-play-circle').removeClass('fa-pause-circle');
		$('.timer_content').css('color','white');
	}
	else if(czas == 0)
	{
		$('.settings').removeClass('hidden');
	}
}