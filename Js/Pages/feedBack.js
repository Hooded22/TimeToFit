
$(window).on('load', () => {

    feedBackButtonListener();
})

getRating = () => {

    $.ajax({
        url: adressVariable,
        type: "POST",
        data: {getData: ""},
        success: (grade) => {
            let gradeData = JSON.parse(grade);
            setRating(gradeData);
        }
    })
}

setRating = (grade) => {
    if(grade != 0 ){
        let currentGrade = grade - 1; 

        let allStars = $('.fa-star').map(() => {
            return this;
        })
    
        for (let index = 0; index <= currentGrade; index++) {
            $(allStars.prevObject[index]).removeClass('far fa-star');
            $(allStars.prevObject[index]).addClass('fas fa-star');
            
        }

        $('.rateContainer').addClass('hidden');
        $('.acknowledgements#rate').removeClass('hidden');
    }

   
}

showFeedBack = () => {
    getRating();
    $('.navbar-toggler').click();
    $('#feedBack').removeClass('hidden');
}

closeFeedBack = () => {
    $('#feedBack').addClass('hidden');
}

chooseRate = (item) => {
    let allStars = $('.fa-star').map(() => {
        return this;
    })

    let rate = 0;

    let itemClass = $(item).attr('class');

    let currentId = $(item).attr('id');

    if( itemClass === "far fa-star")
    {
        for (let index = 0; index <= currentId; index++) {
            $(allStars.prevObject[index]).removeClass('far fa-star');
            $(allStars.prevObject[index]).addClass('fas fa-star');
            
        }
    } else if ( itemClass === "fas fa-star")
    {
        if(currentId == 0)
        {
            for (let index = 4; index >= currentId; index--) {
                $(allStars.prevObject[index]).removeClass('fas fa-star');
                $(allStars.prevObject[index]).addClass('far fa-star');
                
            }
        } else {
            for (let index = 4; index > currentId; index--) {
                $(allStars.prevObject[index]).removeClass('fas fa-star');
                $(allStars.prevObject[index]).addClass('far fa-star');
                
            }
        }
    }

    if(parseFloat(currentId) === 0 && itemClass === "fas fa-star"){
        rate = 0;
        sendFeedBack(false, rate);
    } else {
        rate = parseFloat(currentId) + 1;
        sendFeedBack(false , rate)
    }

    setTimeout(() => {
        $('.rateContainer').addClass('hidden');
        $('.acknowledgements#rate').removeClass('hidden');
    }, 1000)

}

feedBackButtonListener = () => {
    $('#feedBack form button').on('click', (event) => {
        event.preventDefault();
        let feedback = $('#feedBack form textarea').val();

        sendFeedBack(true, feedback);
    })
}

sendFeedBack = (ifFeedBack, message) => {

    if(ifFeedBack) {

        if(message.length <= 400)
        {
            $.ajax({
                url: adressVariable,
                type: "POST",
                data: {feedBack:message},
                success: (testData) => {
                    //let testData = JSON.parse(test);
                    console.log("Returned from sendRate.php: " + testData);
                    sendAnotherOne(true);
                }
            })
        } else {
            alert('Your message must be shor than 400 characters');
        }

       

    } else {

        $.ajax({
            url: adressVariable,
            type: "POST",
            data: {rate:message},
            success: (testData) => {
                //let testData = JSON.parse(test);
                console.log("Returned from sendRate.php: " + testData);
            }
        })
    }
}

changeTheRate = () => {
    $('.acknowledgements').addClass('hidden');
    $('.rateContainer').removeClass('hidden');
}

sendAnotherOne = (justSend) => {
    if(justSend) {
        $('#feedBack form textarea').addClass('hidden');
        $('#feedBack form textarea').val('');
        $('#feedBack form button').addClass('hidden');
        $('#feedBack form .acknowledgements').removeClass('hidden');
    } else {
        $('#feedBack form .acknowledgements').addClass('hidden');
        $('#feedBack form textarea').removeClass('hidden');
        $('#feedBack form button').removeClass('hidden');
    }
}