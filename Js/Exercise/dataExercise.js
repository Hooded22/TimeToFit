


	/*							Global variable and global 
								function to overflow managing 
								of data from base with exercise            		*/



var content = new Content();

var Data = [];
Data['Id'] = 1;
Data['Count'] = 0;
Data['Desc'] = "None";
Data['Title'] = "";


$(document).ready(function(){
	content.getData();
	content.howMuch();
});

function nextExerciseButton(block)
{
	var overlay = $('.direction_button_menu');
	if(block == "close")
	{	
		overlay.addClass('hidden');
	}
	else if(block == "open")
	{
		if(Data['Series']!=1)
		{
			overlayListener();
			pause();
			overlay.removeClass('hidden');
		}
		else
		{
			nextExercise('exercise');
		}
		
	}	
}

function nextExercise(theme)
{
	if(theme == "series")
	{
		$('.direction_button_menu').addClass('hidden');
		pause();
		content.next();
	}
	else if(theme == "exercise")
	{
		$('.direction_button_menu').addClass('hidden');
		pause();
		Data['Series'] = 1;
		content.next();
	}
	else
	{
		pause();
		content.next();
	}
}

function previousExercise()
{
	if(Data['Id'] > 1)
	{
		content.previous();
	}
}

function hiddenThis(block)
{
	console.log(block);
	$(block).addClass('hidden');
	if(Data['Type'] != "Reps")
	{
		$('.timer_overlay').css('opacity','1');
	}
}

overlayListener = () => {
	$('.direction_button_menu').on('click', (event) => {
		$('.direction_button_menu').addClass('hidden');
	})
}





