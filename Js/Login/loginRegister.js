$(function(){
	
	formRegister.hide().css('opacity','0');
	formLogin.find('input').empty().val("");



	$('input').focus(function(){
		var figcaption = $(this).next('figcaption');
		if(figcaption.css('opacity')==0.7)
		{
			figcaption.animate({
				'top': '-50%',
				'opacity': '1',
				'font-size': '0.7em'
			},300);
		}
	}).blur(function(){
		var figcaption = $(this).next('figcaption');
		
		if($(this).val()=="")
		{
			figcaption.animate({
			'top': '20%',
			'opacity': '0.7',
			'font-size': '1em'
		},300);
		}
	});

});

var formLogin = $('#form-login');
var formRegister = $('#form-register');
var blockMessage = $('.blockMessage');

function blockMessageHidden()
	{
		if(blockMessage.text()!='')
		{
			blockMessage.delay(2000).fadeOut(300);
		}
	}


function registerFormOpen()
	{
		var opener = $('.formWrapper h4 span');
		formLogin.fadeOut(300);
		formRegister.toggle();
		formRegister.fadeTo(200,1);
		$('.formWrapper h3').fadeOut(300)
		opener.parent('h4').removeClass('py-3').addClass('py-0').removeClass('my-3').addClass('my-1');
		opener.attr('onclick','');
		opener.css('opacity','0.7').css('cursor','default');
		opener.text('Creat Your account');
		$('.fa-arrow-circle-left').toggle();
	}

$('#button-register').click(blockMessageHidden());

