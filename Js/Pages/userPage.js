$(document).ready(function(){
	setChoiceBlock();
	
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
