$(window).on('load', () => {
    counting = (item, target) => {
        let value = $(item).text();
        value = parseFloat(value);
    
        if(value < target){
    
            let multiplier;
    
            if(target < 10) {
                multiplier = 1;
            } else if( target > 10 && target < 50 )
            {
                multiplier = 3;
            } else if( target > 50 )
            {
                multiplier = 5;
            }
    
            value = value + multiplier;
    
            $(item).text(value);
    
            setTimeout(() => {
                counting(item, target);
            }, 50)
        }
    }

    onScreenHandler();
    formValidationHandler();
    stopLoadingAnimation();
})

var adressVariable = "Js/Ajax/sendRate.php";

onScreenHandler = () => {
    var os = new OnScreen();

    os.on('enter', '.counter span', (element, event) => {
        let value = $(element).data('quantity');
        counting(element, value);
    });

    os.on('enter', '.wrapper', (element, event) => {
        let target = $(element).parent().parent().parent().attr('id');
        $('a[name = ' + target + ']').css('opacity','0.4');
    })

    os.on('leave', '.wrapper', (element, event) => {
        let target = $(element).parent().parent().parent().attr('id');
        $('a[name = ' + target + ']').css('opacity','1');
    })
}

formValidationHandler = () => {
    $('#Contact form button').on('click', (event) => {
        event.preventDefault();
        sendEmail();
    })
}

formValidation = (nameItem, emailItem, messageItem) => {
    let name = String(nameItem.val()).length ;
    let email = emailItem.val() ;
    let message = messageItem.val() ;
    var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    if(name === "" || name > 30 || name < 2) {
        nameItem.next('span').css('border-color','#b71c1c')
        showMessage("Your name must be between 2 and 30 characters", true);
        return false;
    } else
     { 
        nameItem.next('span').css('border-color','#fff') 
     }
    if(email === "" || email > 30 || email < 2 || !re.test(String(email).toLowerCase())) {
        emailItem.next('span').css('border-color','#b71c1c')
        showMessage("Incorect Email", true)
        return false;
    } else {
        emailItem.next('span').css('border-color','#fff');
    }
    if(message === "" || message > 250 || message < 2) {
        messageItem.css('border-color','#b71c1c');
        showMessage("Your message must be between 2 and 250 characters", true)
        return false;
    } else {
        messageItem.css('border-color','#fff');
    }

    return true;
}

sendEmail = () => {
    let name = $('#Contact input[name = "first_contact_input"]');
    let email = $('#Contact input[name = "second_contact_input"]');
    let message = $('#Contact textarea');

    let values = [];

    values[0] = name.val();
    values[1] = email.val();
    values[2] = message.val();

    if (formValidation(name, email, message)){

        name.next('span').css('border-color','#b71c1c');
        email.next('span').css('border-color','#b71c1c');
        name.next('span').css('border-color','#b71c1c');
        message.css('border-color','#fff');

        $.ajax({
            data: {name: values[0], email: values[1], message: values[2]},
            url: 'Js/Ajax/sendMail.php',
            type: "POST",
            success: (data) => {
                showMessage(data, false);
            }
        })
    };
}


showMessage = (message, error) => {

    var blockMessage = $('.blockMessage');

    if(error){
        blockMessage.html('');
        blockMessage.removeClass('hidden');
        blockMessage.append('<span class = "error">' + message + '</span');
        setTimeout(() => {
            blockMessage.addClass('hidden').html('');
        }, 3000);
    } else {
        blockMessage.html('');
        blockMessage.removeClass('hidden');
        blockMessage.append('<span class = "success">' + message + '</span');
        setTimeout(() => {
            blockMessage.addClass('hidden').html('');
        }, 3000);
    }
}

stopLoadingAnimation = () => {
    $('#loadingOverlay .wrapper .sk-folding-cube').remove();
    $('#loadingOverlay .overlay').addClass('hidden');
}





