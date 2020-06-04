
var adressVariable = "../../Js/Ajax/sendRate.php";

//Constant content of roitine_button_menu.
var previousContent = $('.routine_button_menu .row').html();

//Apeare menu of chosen workout routine
function popMenuWorkout(name)
{
    $('.routine_button_menu').removeClass('hidden');
    $('.routine_button_menu').find('button').eq(0).attr('onclick','goWorkout("'+name+'")');
    $('.routine_button_menu').find('button').eq(1).attr('onclick','showWorkout("'+name+'")');
    $('.routine_button_menu').find('button').eq(2).attr('onclick','inputWorkout("'+name+'","nameChanger")');

    $('.routine_button_menu').find('button').eq(3).attr('onclick','inputWorkout("'+name+'","Icon")');

    $('.routine_button_menu').find('button').eq(4).attr('onclick','inputWorkout("'+name+'","Color")');

    $('.routine_button_menu').find('button').eq(5).attr('onclick','inputWorkout("'+name+'","Remove")');
    previousContent = $('.routine_button_menu .row').html();

    
}

//Hide menu Workout
function hideMenuWorkout()
{
$('.routine_button_menu').find('.row').html(previousContent);
$('.routine_button_menu').addClass('hidden');
}

//Hide menu Workout. This is activated by button called Cancel.
function cancelWorkout()
{
    var content = previousContent;
    $('.routine_button_menu .row').html(content);
}



//Move to page using to edit your routine
function showWorkout(name)
{
    var name =  name;

    $.ajax({
        type: "POST",
        url: "../../Js/Ajax/routineOperations.php",
        data: {show:name},
        success: function(){
                window.location.replace("../../routineEdit.php");
        },
        fail: function(){
            console.log('Non-Yeah');
        }
    });
}

//Generate new content in menuWorkout depending on the type
function inputWorkout(name, type)
{
    if(type == 'nameChanger')
    {
//New content with input to change name

        var newContent = '<input type="text" id="newNameInput" name="newName" class="col-12 py-2 my-3 mx-0 px-0 d-block" placeholder="New Name"><button id="confirmNameChange"class="col-6 d-inline-block py-2 px-4 mt-3">Ok</button><button onclick="cancelWorkout()" class="col-6 d-inline-block py-2 px-4 mt-3">Cancel</button>';
        
//Changing old content to new

        $('.routine_button_menu .row').html(newContent);

//Handler of input (using changer function ).

        $('#confirmNameChange').click(function(){
            let value = $('#newNameInput').val();

            //Here will be fast validation, really. I am not kidding ;)
            $.ajax({
                type: 'POST',
                data: {nameOfTable: value},
                url: '../../Js/Ajax/validateName.php',
                success: function(data){
                    let comunicat = '';
                    //let data = JSON.parse(data);
                    if(data == "error")
                    {
                        comunicat = 'Name of your table must be between 2 and 15 characters';
                        alert(comunicat);
                    }
                    else
                    {
                        changer(name, 'NewName', value);
                    }
                },
                fail: function(){
                    console.log('Something is wrong')
                }
            });

            //changer(name, 'NewName', value);
        });
    }
    else if(type == 'Icon')
    {
//Create new array
        let iconDiv = [];

//Puting data from icons (path d="...").
        for(var i = 2; i <=7; i++)
        {

//Making variable to onclick in div below.
            let changerValue = "'"+icons[i]+"'";
            let changer = "'"+name+"', 'Image', "+changerValue;

            iconDiv[i] = '<div onclick="changer('+changer+')" class="iconBlock col-5 mx-auto px-0 py-2 my-1"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172"style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b71c1c"><path d="'+icons[i]+'"></path></g></g></svg></div>';
        }
        
//New content with divs including icons

        var newContent = '<h5 class="col-10 mx-auto">Choose your icon</h5>'+iconDiv+'<button class="col-6 d-inline-block py-2 px-4 mt-3">Ok</button><button onclick="cancelWorkout()" class="col-6 d-inline-block py-2 px-4 mt-3">Cancel</button>';
        $('.routine_button_menu .row').html(newContent);

    }
    else if(type=="Color")
    {

//New content with divs including colors
        var newContent = '<h5 class="col-10 mx-auto">Choose new color</h5>'+colors+'<button class="col-6 d-inline-block py-2 px-4 mt-3">Ok</button><button onclick="cancelWorkout()" class="col-6 d-inline-block py-2 px-4 mt-3">Cancel</button>';
        
        $('.routine_button_menu .row').html(newContent);

//Handler for color block - taking necessary data and using changer

        $('.color_block').click(function(){
            $('.color_block').css('box-shadow','none');
            $(this).css('box-shadow','0 0 10px 4px black');
            let colorValue = $(this).css('background-color');

            changer(name, 'Color', colorValue);
        });
    }
    else if(type == "Remove")
    {

        let nameString = "'"+name+"'";

//New content with question

        var newContent = '<h5 class="col-10 mx-auto">Are you sure that you want to remove this routine ?</h5><button class="col-6 d-inline-block py-2 px-4 mt-3" onclick="removeWorkout('+nameString+')">Yes</button><button onclick="cancelWorkout()" class="col-6 d-inline-block py-2 px-4 mt-3">No</button>';

        $('.routine_button_menu .row').html(newContent);
    }
}



//Function which change icon and color
function changer(name, item, value)
{
    $.ajax({
        type: "POST",
        url: '../../Js/Ajax/routineOperations.php',
        data: {
            changerName: name,
            changerItem: item,
            changerValue: value
        },
        success: function(){
            location.reload();
        }
    });
}

//Start trainign script with choosen routine
function goWorkout(name) {
    var name =  name;

    $.ajax({
        type: "POST",
        url: "../../Js/Ajax/routineOperations.php",
        data: {workout:name},
        success: function(){
                window.location.replace("../../counter.php");
        },
        fail: function(){
            console.log('Non-Yeah');
        }
    });
}

//function remove workout
function removeWorkout(name)
{
    $.ajax({
        type: "POST",
        url: "../../Js/Ajax/routineOperations.php",
        data: {remove:name},
        success: function(data){
                cancelWorkout();
                hideMenuWorkout();
                console.log(JSON.parse(data))
                location.reload();
        },
        fail: function(){
            //console.log('Non-Yeah');
        }
    });
}

