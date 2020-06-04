$(function(){

	var fastFeedback = new FastFeedback();
	var login = $('#form-register').find('input:text').first();
	var name = $('#form-register').find('.name');
	var password = $('#form-register').find('.password');
	var email = $('#form-register').find('.email');
	
	login.empty().val("");
	password.val("").empty();
	name.val("").empty();
	email.val("").empty();

	login.blur(function(){
		fastFeedback.myPublicMethodLogin(login);
	}).focus(function(){
		$(this).css({'border-bottom':'0.5px solid #eee', 'box-shadow':'none', 'border-top':'0.5px solid #eee'});
	});

	name.blur(function(){
		var nm1 = name.eq(0);
		var nm2 = name.eq(1);
		fastFeedback.myPublicMethodName(nm1, nm2);
	}).focus(function(){
		$(this).css({'border-bottom':'0.5px solid #eee', 'box-shadow':'none', 'border-top':'0.5px solid #eee'});
	});

	email.blur(function(){
		var em1 = email.eq(0);
		var em2 = email.eq(1);
		fastFeedback.myPublicMethodEmail(em1, em2);
	}).focus(function(){
		$(this).css({'border-bottom':'0.5px solid #eee', 'box-shadow':'none', 'border-top':'0.5px solid #eee'});
	});

	password.blur(function(){
		var pw1 = password.eq(0);
		var pw2 = password.eq(1);
		fastFeedback.myPublicMethodPassword(pw1, pw2);
	}).focus(function(){
		$(this).css({'border-bottom':'0.5px solid #eee', 'box-shadow':'none', 'border-top':'0.5px solid #eee'});
	});

	$('#button-register').click(function(event){
		var ValidFlag = fastFeedback.myPublicMethodValid(login, name.eq(0), name.eq(1), email.eq(0), email.eq(1), password.eq(0), password.eq(1));
		console.log(ValidFlag);
		if(!ValidFlag)
		{
			event.preventDefault();
		}
	
	});
	


});