var adressVariable = "../../Js/Ajax/sendRate.php";

confirmEmail = () => {
    let code = $('#confirmCode').val();

    $.ajax({
        type: "POST",
        data: {code: code},
        url: "../../Js/Ajax/confirmEmail.php",
        success: (data) => {
            let correctness = JSON.parse(data);
            
            if(correctness != ""){
                $('#errorMessage').text('Incorect Code');
                setTimeout(() => {
                    $('#errorMessage').text('');
                }, 2000)
            } else {
                location.reload();
            }

        }
    });
}