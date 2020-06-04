var form = new FormAccount();
var returned = 'false';
var ifRemove;
var adressVariable = "Js/Ajax/sendRate.php";

$(document).ready(function(){
	$('.form_box form').slideUp(1);
	countFormListener();
});


countFormListener = () => {
	$('#count_form button').on('click', (event) => {
		event.preventDefault();
		let countValue = $('#count_form input').val();
		
		$.ajax({
			url: 'Js/Ajax/makeCountVariable.php',
			type: 'POST',
			data: {count: countValue},
			success: () => {
				window.location.reload();
			}
		})
	})
}

//Efects on input after click

$('input[name="count"]').focus(function(){
	inputEffectOn($(this));
}).blur(function(){
	inputEffectOff($(this));
});

$('.formWrapper > .row > textarea').focus(function(){
	inputEffectOn($(this));
}).blur(function(){
	inputEffectOff($(this));
});

$('textarea').on('blur',function(){
	$(this).hide();
});

//Read-out of values

getDataFromField = (item) => {
	var title = $(item).parents('.form_box').find('input[name="title"]').val();
	var type = $(item).parents('.form_box').find('select').val();
	var time = $(item).parents('.form_box').find('input[name="time"]').val();
	var series = $(item).parents('.form_box').find('input[name="series"]').val();
	var breakTime = $(item).parents('.form_box').find('input[name="break"]').val();
	var description = $(item).parents('.form_box').find('textarea').val();
	var id = $(item).parents('.form_box').find('h6').find('span').text();

	form.sumbmitForm(title, type, time, series, breakTime, description, id, item);
}

/*$('.button_submit').click(function(){
	var title = $(this).parents('.form_box').find('input[name="title"]').val();
	var type = $(this).parents('.form_box').find('select').val();
	var time = $(this).parents('.form_box').find('input[name="time"]').val();
	var series = $(this).parents('.form_box').find('input[name="series"]').val();
	var breakTime = $(this).parents('.form_box').find('input[name="break"]').val();
	var description = $(this).parents('.form_box').find('textarea').val();
	var id = $(this).parents('.form_box').find('h6').find('span').text();

	form.sumbmitForm(title, type, time, series, breakTime, description, id, this);
});*/


//Slide down of forms


sliderDown = (item) => {
	$(item).next('form').slideToggle(300);
}

/*$('.removeHandler').click(function(){
	var item = $(this);
	var id = item.prev().children().text();
	var itemToRemove = item.prev().parent();
	removeExerciseField(item, id, itemToRemove);
	//$(this).next('i').next('form').html('');
	//$(this).
});*/

removeHandler = (target) => {
	window.item = $(target);
	window.id = item.prev().children().text();
	window.itemToRemove = item.prev().parent();

		const popoutSet = {
			header: {
				content: "Choose name for your routine"
			},
			content: {
				input: {
					exist: false,
				},
				buttons:{
					cancel: {
						content: "No"
					},
					confirm: {
						content: "Yes",
						function: 'agreeRemove()'
					}
				},
				paragraph: {
					exist: false
				}
			}
		}
	
		showPopOut(popoutSet);

		/*$('#popout_content button[name = "confirm"]').on('click', () => {
			removeExerciseField(item, id, itemToRemove);
			return;
		})*/

		return;
}

//Removing of field//





//............................:: FUNCTIONS ::.................................... //

//Add new exercise block//
addNewField = () => {
	if(count < 20) {
		let newId = count + 1;
		var previous = $('#form_block_' + count).parent();
		
		const newItems = {
			field: '<div class="form_box col-10 mx-auto my-4 d-inline-block">\
			<h6 class="d-inline-block py-0 my-0 ml-2"><span class="id_block">'+newId+'</span>. Exercise</h6>\
			 <i class="fas fa-trash col-1 mx-auto d-inline-block py-2 removeHandler" role = "button" title = "Remove Exercise" onclick = "removeHandler(this)"></i>\
			 <i class="fas fa-edit col-2 col-md-1 mx-auto d-inline-block py-2 sliderDown" role = "button" title = "Opens Exercise" role="button" onclick = "sliderDown(this)" ></i>\
			 <form action="#" method="POST" id="form_block_'+newId+'" class="col-12 col-lg-10 mx-auto my-1 collapse">\
				 <figure class="my-4 my-lg-5 col-md-8 mx-auto">\
				   <figcaption>Title of exercise</figcaption>\
				   <input type="text" name="title" class="mt-0 mb-2 col-12 d-block py-0">\
				 </figure>\
				  <figure class="my-5 my-lg-5 col-md-5 mx-auto">\
				   <select name="type" class="mt-0 mb-2 col-12 d-block py-2">\
					 <option value="Time">Time</option>\
					 <option value="Reps">Reps</option>\
				   </select>\
				  </figure>\
				 <figure class="my-5 my-lg-5 col-md-5 mx-auto">\
				   <figcaption>Time or Reps</figcaption>\
				   <input type="number" name="time" class="mt-0 mb-2 col-12 d-block py-0">\
				 </figure>\
				 <figure class="my-5 my-lg-5 col-md-5 mx-auto">\
				   <figcaption>Series</figcaption>\
				   <input type="number" name="series" class="mt-0 mb-2 col-12 d-block py-0">\
				 </figure>\
				 <figure class="my-5 my-lg-5 col-md-5 mx-auto">\
				   <figcaption>Break Time</figcaption>\
				   <input type="number" name="break" class="mt-0 mb-2 col-12 d-block py-0">\
				 </figure>\
				 <figure class="my-4 my-lg-5 col-md-8 mx-auto">\
					<figcaption>Description of Exercise</figcaption>\
				   <textarea name="description" class="mt-0 mb-2 col-12 d-block py-0"></textarea>\
				 </figure>\
				   <button type="button" class="button_submit mx-auto d-block col-5 col-md-2 py-0 mb-4"  onclick = "getDataFromField(this)"  name="addExercise" >OK</button>\
				 </form>\
		   </div>'
		}
	
		previous.after(newItems.field);
		count ++
	} else {
		alert('You can have only 20 exercise')
	}
	
	
}

//Function to remove item after click 'YES' on popout//
agreeRemove = () => {
	let id = window.id;
	let itemToRemove = window.itemToRemove
	let item = window.item;
	
	hidePopOut();
	removeExerciseField(item, id, itemToRemove);
}


//Remove exercise block
removeExerciseField = (item, id, itemToRemove) => {
	item.next('i').next('form').html('');
	item.prev().children().text('');
	
	itemToRemove.remove();

	$.ajax(
		{
			type:'POST',
			url:'Js/Ajax/removeExerciseField.php',
			data: {key: id},
			success: (d) => {
				let data = JSON.parse(d);
				console.log("Getting Data: " + data);
				numberingAgain();
				return;
			}
		}
	);

	return;

	
}

//Add again all id for fields

numberingAgain = () => {
	
	var all = $(".id_block").map(function() {
		return this;
	}).get();

	var id = $(".form_box form").map(function() {
		return this;
	}).get();
	
	for (let index = 0; index < all.length; index++) {
		$(all[index]).html(index + 1);
		$(id[index]).attr('id', 'form_block_' + (index + 1));
	}

	

	count = parseFloat($(all[all.length - 1]).html());
	console.log('COUNT: ' + count);
}

//Check if every field is not empty//


checkNotEmpty = () => {

	let forms = $('.form_box input');
	var message  = "Any field cannot be empty";

	for (let i = 0; i < forms.length; i++) {

		if(forms[i].value == ""){
			alert(message);
			return false;
		}
	}

	return true;
}

//Decorating of input

function inputEffectOn(it) {
	var figcaption = $(it).next('figcaption');
	if(figcaption.css('opacity')==0.7)
	{
		figcaption.animate({
			'top': '-50%',
			'opacity': '1',
			'font-size': '0.7em'
		},300);
	}
}

function inputEffectOff(it) {
	var figcaption = $(it).next('figcaption');
	
	if($(it).val()=="")
	{
		figcaption.animate({
		'top': '20%',
		'opacity': '0.7',
		'font-size': '1em'
	},300);
	}
}

function hide(element)
{
	$(element).addClass('hidden');
	console.log(element);
}

//Pop out menu//

showPopOut = (settings) =>
{
	const popOut = {
		header: '<h5 class="my-1 col-12 p-0 py-3 ">'+settings.header.content+'</h5>',
		content: {
			input: settings.content.input.exist ? '<input id="popout_input" class = "mx-0 col-10 py-1 px-0" type="'+settings.content.input.type+'" name="popoutInput" placeholder = "'+settings.content.input.placeholder+'"/>' : '',

			buttons: {
				cancel: settings.content.buttons.cancel.exist ? '<button class="col-6 d-block py-0 mx-auto mt-4" onclick="hidePopOut()" role = "button">'+settings.content.buttons.cancel.content+'</button>' : '',

				confirm: settings.content.buttons.confirm.exist ? '<button class="col-6 d-block py-0 mx-auto mt-3" onclick="" role = "button">'+settings.content.buttons.confirm.content+'</button>' : '',

			},
			paragraph: settings.content.paragraph.exist  ? '<p class = " col-10 my-1 popout_paragraph">'+settings.content.paragraph.content+'</p>' : ''
		}
	}

	
	$('#popout_header h5').text(settings.header.content);
	settings.content.input.exist ? $('#popout_input').removeClass('hidden') : ''
	$('#popout_input').attr('placeholder',settings.content.input.placeholder);

	$('#popout_content button[name = "cancel"]').text(settings.content.buttons.cancel.content);

	$('#popout_content button[name = "confirm"]').text(settings.content.buttons.confirm.content);
	settings.content.buttons.confirm.function != null ? $('#popout_content button[name = "confirm"]').attr('onclick', settings.content.buttons.confirm.function) : $('#popout_content button[name = "confirm"]').attr('onclick','agreeRemove()');

	$('#routine_popout_overlay').removeClass('hidden');
}

hidePopOut = () =>
{

	$('#routine_popout_overlay').addClass('hidden');
}

appendErrorMessage = (mess) => {
	alert("Check if yout routine is corect")
		if($('#errorMessage').html() == "")
		{
			$('#errorMessage').append("<span class='error'>"+mess+"</span>");
			setTimeout(function(){
				$('#errorMessage').html('');
			},4000);
		}
}

//Savign table like one of user`s routine
saveTablePopout = () => {
	const popoutSet = {
		header: {
			content: "Choose name for your routine"
		},
		content: {
			input: {
				exist: true,
				placeholder: "Routine Name",
				type: "text"
			},
			buttons:{
				cancel: {
					content: "Cancel"
				},
				confirm: {
					content: "Let`s Go",
					function: 'saveTable()'
				}
			},
			paragraph: {
				exist: false
			}
		}
	}

	showPopOut(popoutSet);
}

function saveTable()
{


	var nameOfTable = $('#popout_input').val();


	if(returned == "" && checkNotEmpty())
	{
		$.ajax({
			url:'Js/Ajax/saveTable.php',
			method: 'POST',
			data: {name:nameOfTable},
			success: function(data)
			{
				if(data == "error"){
					alert('This table is exist');
				}
				else
				{
					window.location="counter.php";
					
				}
	
	
			},
			fail: function(){
				alert('error');
			}
		});
	} else {
		appendErrorMessage(returned);
	}
	
}


//Function allows enter to exercise page without sving routine

function justGo()
{
	//checkNotEmpty();


	if(returned == "" && checkNotEmpty() )
	{
		$.ajax({
			url:'Js/Ajax/justGo.php',
			method: 'POST',
			success: function()
			{
				
				console.log('Current table: Succes');
				window.location="counter.php";
			}
		});
	}
	else
	{
		appendErrorMessage(returned);
	}
	
}


//Class containing properties of account (adding data, changing titles of form`s blocks)

function FormAccount()
{
	this.dataArray = [];


	this.sumbmitForm = function(title, type, time, series, breakTime ,desc, id, block)
	{
		this.dataArray = [title, type, time, series, breakTime, desc, id];
		this.nameChange(title, id, block);

		console.log('%c Array with data of exercise');
		console.log(this.dataArray);

		$.ajax({
			type:'POST',
			data: {dataForm:this.dataArray},
			url:'Js/Ajax/addExercise.php',
			success:function(data){
				returned = JSON.parse(data);

					console.log('Returned: '+returned);

					$('#errorMessage').append("<span class='error'>"+returned+"</span>");
					setTimeout(function(){
						$('#errorMessage').html('');
					},4000);
			},
			fail: function(error)
			{
				console.log(error);
			}
		});
	}

	this.nameChange = function(title, id, block)
	{
		$(block).parents('.form_box').find('h6').html("<span class = 'id_block'>"+id+"</span>. "+title);
		//$(block).parents('.form_box').find('h6').find('span').text(id);
		$(block).parents('form').slideToggle(300);
	}
}
