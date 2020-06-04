function showSiderMenu()
	{
		var siderMenu = $('#siderMenu');
		var menu_icons = $('.footer .menu_icons a');

		console.log(siderMenu.css('right'));

		if(siderMenu.css('right')!='0px')
		{

			//Show block of menu
			siderMenu.removeClass('hidden');
			siderMenu.animate({
				'right':'0'
			},500);

			
			//Change icon
			$('.fa-bars').addClass('fa-times');
			$('.fa-times').removeClass('fa-bars');

			//Hide others bottom menu iconc despite of icon having class 'bars' + adding margin to 'bars'
			menu_icons.eq(1).addClass('hidden');
			menu_icons.eq(0).addClass('hidden');
			menu_icons.eq(2).removeClass('mx-auto').css('margin-left','65%');

			//Show comunicat which will be showed in bottom menu next to 'bars'
			$('#sideBarComunicat').removeClass('hidden');

			//Slide of comunicat and icon
			menu_icons.eq(2).animate({
				'margin-left':'0'
			},500);

			$('#sideBarComunicat').animate({
				'left':'25%',
				'right':'-30%'
			},500);
		}
		else
		{
			//Hide block of menu
			siderMenu.animate({
				'right':'-100%'
			},500, function(){
				siderMenu.addClass('hidden');
			});

			menu_icons.eq(2).animate({
				'margin-left':'-65%'
			},500);

			 //Change icon
			 $('.fa-times').addClass('fa-bars');
			 $('.fa-bars').removeClass('fa-times');

			$('#sideBarComunicat').animate({
				'left':'110%',
				'right':'-30%'
			},500, function(){
				menu_icons.eq(1).removeClass('hidden');
				menu_icons.eq(0).removeClass('hidden');
				menu_icons.eq(2).removeClass('mx-auto').css('margin-left','0');
				menu_icons.eq(2).addClass('mx-auto');

			});
		}
	}