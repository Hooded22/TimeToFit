$(document).ready(function(){
		setChoiceBlock();
		blockMessageHidden();
	});

	var adressVariable = "../../Js/Ajax/sendRate.php";

	function setChoiceBlock(){
		$('.choice_box').addClass('col-12');

		$('choice_box').css('text-align','center');

		$('.choice_text').addClass('col-7 mx-0 ml-2 px-0 my-0 d-inline-block d-md-none');

		$('.choice_content').addClass('col-md-3 col-12 mt-2 mx-md-auto py-3 mx-0');

		$('.choice_image').addClass('col-3 col-md-12 my-0 ml-3 mx-0 mx-md-auto d-inline-block px-0');

		$('.choice_image i').addClass('mt-md-5');

		$('.choice_image_text').addClass(' d-none d-md-block pb-md-5 m-0');

		$('.choice_image').filter(function(index){
			return (index + 1) % 3 == 0;
		}).css('background','#7E4E60');

		$('.choice_image').filter(function(index){
			return (index + 1) % 2 == 0;
		}).css('background','#D1603D');

		$('.choice_image').filter(function(index){
			return (index + 1) % 4 == 0;
		}).css('background','#6D8EA0');
	}

	//Hide block message and refresh the page after data changes
	function blockMessageHidden()
	{
		var blockMessage = $('.blockMessage');
		var expression = /[a-z]|[A-Z]/;
		var newLocation = "http://timetofit.hmcloud.pl/Includes/Pages/userProfileSetting.php";

		console.log(expression.test(blockMessage.text()));

		if(expression.test(blockMessage.text()) == true)
		{
			setTimeout(() => {
				blockMessage.fadeOut(300);
				window.location.replace(newLocation);
			},2000)
			
		}
	}

	submiter = (form) => {
		let id = "#" + form;
		$(id).submit();
	}

	//Show and hide block using to change password or profile image
	//condit: 'false'->close the window of chenges, 'true'->open the window od chages
	//name: name of window to change (password or image)

	function change(condit, name)
	{
		var changePassword = $('#change_'+name);
		if(condit == 'true')
		{
			changePassword.removeClass('hidden');
			if(name == 'password')
			{
				changePassword.find('.change_content').animate({
				'bottom': '-2%'
				},500);
			}
			else
			{
				changePassword.find('.change_content').animate({
				'top': '-5%'
				},500);
			}
			
		}
		else
		{
			changePassword.addClass('hidden');

			if(name == 'password')
			{
				changePassword.find('.change_content').css('bottom','-40%');
				changePassword.find('.change_content input').val('');
			}
			else
			{
				changePassword.find('.change_content').css('top','-40%');
			}
		}
		
	}

	//Label for input type:file
	function clickButtonFile()
	{
		$('#sendButton').click();
	}

	$('#sendButton').val(function(){
		
		$(this).on('change',function(){
			if($(this).val() == "")
			{
				$('.upload_image_button p').show();
				$('.upload_image_button img').hide();
				console.log($(this).val());
			}
			else
			{
				$('.upload_image_button p').hide();
				$('.upload_image_button img').hide();
				$('.upload_image_button .sk-folding-cube').removeClass('hidden');
				$('#imageForm').submit();
			}
		
		});

	});

	//Functions relative for make preview and loaded file and validation this one
	$('#imageForm').on('submit',function(event){
		event.preventDefault();
		var dataForm = new FormData(this);
		
		$.ajax({
			url:'../Handlers/addImage-handler.php',
			data: dataForm,
			type: 'POST',
			contentType: false,
			processData: false,
			cache: false,
			success: function(data){
					var image = JSON.parse(data);
					var imageSplit = image.split(':');

					if(imageSplit[0] == 'Error')
					{
						console.log(image);
						$('.upload_image_button p').show();
						$('.upload_image_button img').hide();
						$('#errorMessage').find('span').text(image);
						change('false','image');
						setTimeout(function(){
							$('#errorMessage').find('span').text('');
						},4000);
					}
					else
					{
						$('.upload_image_button img').show();
						$('.upload_image_button .sk-folding-cube').addClass('hidden');
						$('.upload_image_button img').attr('src','../../Img/tmp-picture/'+image);
						console.log('Add file returned: ' + image);
					}
					
			}
		});
	});

	//Delete all file from tmp-pictures. This is activated by button called 'Cancel'
	function deleteFiles()
	{
		var deleteFile = '../../Img/tmp-picture';
		$.ajax({
			url:'../Handlers/file-operations.php',
			type: 'POST',
			data: {file:deleteFile},
			success: function(data){
				$('.upload_image_button img').hide();
				$('.upload_image_button p').show();
			}
		});
	}

//Save file from preview to folder profile-picture and database. This is activated by button called 'OK'
	function saveProfileImage()
	{
		var url = [];
		url[0] = '../../Img/tmp-picture/';
		url[1] = '../../Img/profile-picture/';
		$.ajax({
			url:'../Handlers/file-operations.php',
			type: 'POST',
			data: {saveUrl:url},
			success: function(data)
			{
				
				if(data == 'Success')
				{
					$('.upload_image_button img').hide();
					$('.upload_image_button p').show();
					location.reload(true);
					console.log("SUCCESS: " + data);
				}
				else
				{
					$('.upload_image_button img').hide();
					$('.upload_image_button p').show();
					location.reload(true);
					console.log('FAIL' + data);
					return;
				}
				
			},
			fail: (error) => {
				console.log('Ajax error: ' + error);
			}
		});
	}


//Hide and show password in input type password, this is activated by buton with eye icon.
	function passwordShow(element)
	{
		var atribute = $(element).siblings('input').attr('type');

		if(atribute == "password")
		{
			$(element).siblings('input').attr('type','text');
			$(element).removeClass('fa-eye-slash');
			$(element).addClass('fa-eye');
		}
		else
		{
			$(element).siblings('input').attr('type','password');
			$(element).removeClass('fa-eye');
			$(element).addClass('fa-eye-slash');
		}
	}