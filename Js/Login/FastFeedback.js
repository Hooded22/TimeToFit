FastFeedback = function(options){
		this.constructor = function()
		{

		}

		var root = this;

		this.myPublicMethodValid = function(lg, nm, nm2, em, em2, ps, ps2)
		{
			var login = this.myPublicMethodLogin(lg);
			var name = this.myPublicMethodName(nm, nm2);
			var email = this.myPublicMethodEmail(em, em2);
			var password = this.myPublicMethodPassword(ps, ps2);

			if(!login || !name || !email || !password)
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		this.myPublicMethodLogin = function(lg)
		{
			if(lg.val().length > 25 || lg.val().length < 5)
			{
				lg.css({'border-top':'0.5px solid red','border-bottom':'0.5px solid red ', 'box-shadow':'0 0 4px #811'});
				return false;
			}
			else
			{
				lg.css({'border-top':'0.5px solid green','border-bottom':'0.5px solid green', 'box-shadow':'0 0 4px #181'});
				
			}
				return true;
		}

		this.myPublicMethodName = function(nm, nm2)
		{
			if(nm.val().length > 25 || nm.val().length < 2)
			{
				nm.css({'border-top':'0.5px solid red','border-bottom':'0.5px solid red ', 'box-shadow':'0 0 4px #811'});
				return false;
			}
			else
			{
				nm.css({'border-top':'0.5px solid green','border-bottom':'0.5px solid green', 'box-shadow':'0 0 4px #181'});
				
			}

			if(nm2.val().length > 25 || nm2.val().length < 2)
			{
				nm2.css({'border-top':'0.5px solid red','border-bottom':'0.5px solid red ', 'box-shadow':'0 0 4px #811'});
				return false;
			}
			else
			{
				nm2.css({'border-top':'0.5px solid green','border-bottom':'0.5px solid green', 'box-shadow':'0 0 4px #181'});
			}
			return true;
		}

		this.myPublicMethodEmail = function(em1, em2)
		{
			var test = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(em1.val());

			console.log(em1.val());

			if(test==false)
			{
				em1.css({'border-top':'0.5px solid red','border-bottom':'0.5px solid red ', 'box-shadow':'0 0 4px #811'});
				return false;
			}
			else
			{
				em1.css({'border-top':'0.5px solid green','border-bottom':'0.5px solid green', 'box-shadow':'0 0 4px #181'});
				
				
			}

			if(em1.val()!=em2.val())
			{
				em2.css({'border-top':'0.5px solid red','border-bottom':'0.5px solid red ', 'box-shadow':'0 0 4px #811'});
				return false;
			}
			else
			{
				em2.css({'border-top':'0.5px solid green','border-bottom':'0.5px solid green', 'box-shadow':'0 0 4px #181'});
				
				
			}
			return true;
		}

		this.myPublicMethodPassword = function(pas1, pas2)
		{
			var test1 = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/.test(pas1.val());

			if(test1==false)
			{
				pas1.css({'border-top':'0.5px solid red','border-bottom':'0.5px solid red ', 'box-shadow':'0 0 4px #811'});
				return false;
			}
			else
			{
				pas1.css({'border-top':'0.5px solid green','border-bottom':'0.5px solid green', 'box-shadow':'0 0 4px #181'});
				
			}

			if(pas1.val()!=pas2.val())
			{
				pas2.css({'border-top':'0.5px solid red','border-bottom':'0.5px solid red ', 'box-shadow':'0 0 4px #811'});
				return false;
			}
			else
			{
				pas2.css({'border-top':'0.5px solid green','border-bottom':'0.5px solid green', 'box-shadow':'0 0 4px #181'});
			
			}
			return true;
		}
}