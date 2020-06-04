<?php
	include("Includes/DataBase/config.php");
  include("Includes/Handlers/tableHandler.php");
  include("Includes/Classes/ExerciseFormValidation.php");
  include("Includes/Classes/ExerciseConstants.php");
  	
    $validation = new Validation($con);

	if(!isset($_SESSION['userLogged']) || $_SESSION['status'] < 1)
	{
		header('Location:login-page.php');
	}
  else
  {
    setExerciseTables($con);
    addOrClean($conUsers); 
    //echo $_SESSION['tables'];
  }

  if(isset($_SESSION['count']))
  {
    $count = $_SESSION['count'];
  }

  if(isset($_POST['newCount']))
  {
    echo $_POST['newCount'];
  }
  
?>

<!Doctype html>
<html>
<head>


<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
<meta name = "description" content="Page where you can make new wkorkout routine and start training" />
<meta name = "author" content="Przemyslaw Sipta" />
<meta name = "keywords" content="Wokout, Exercise, Music, Workout Menager, Workout Time Counter, Time Counter"/>

<link rel="stylesheet" href="Style/bootstrap.css">
<link rel="stylesheet" href="Style/exerciseForm-style.css"/>
<link rel="stylesheet" href="Style/feedBack-style.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Karla|Oswald|Rajdhani|Stylish|Titillium+Web" rel="stylesheet"/>

<!--Favicon-->
<link rel="apple-touch-icon" sizes="57x57" href="Img/Favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="Img/Favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="Img/Favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="Img/Favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="Img/Favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="Img/Favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="Img/Favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="Img/Favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="Img/Favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="Img/Favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="Img/Favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="Img/Favicon/favicon-16x16.png">
<meta name="msapplication-TileColor" content="#000000">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#000000">


<title>TimeToFit || Set Exercise</title>
</head>
<body> 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark col-12 mx-auto px-0">
      <a href="#" class="navbar-brand d-lg-none" id = "brand_small">
        <img src="Img/Logos/logo_medium.png" width="40" height="40" class="d-inline-block align-top" alt="TimeToFit">
        <span>TimeToFit</span>
      </a>
      <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
      </button>
      <div class = "collapse navbar-collapse col-sm-12 col-10 px-0 mx-auto pb-4 pb-lg-0" id="navigation">
          <ul class = "navbar-nav px-0 col-10 mx-auto">
              <li class = "nav-item col-7 col-xl-1 col-lg-2 mx-auto">
                  <a class = "nav-link col-12" href="index.php" name = "Introduction">
                      <!--<i class="fas fa-list d-inline-block d-lg-none mx-4"></i>-->
                      Home
                  </a>
              </li>
              <li class = "nav-item col-7 col-xl-1 col-lg-2 mx-auto">
                  <a class = "nav-link col-12" href="music-page.php" name = "Contact">
                      <!--<i class="fas fa-dumbbell d-inline-block d-lg-none mx-4"></i>-->
                      Music
                  </a>
              </li>
              <li class = "nav-item col-7 col-xl-1 col-lg-2 mx-auto">
                  <a class = "nav-link col-12" href="Includes/Pages/comingSoon.php" name = "News">
                          <!--<i class="fas fa-music d-inline-block d-lg-none mx-4"></i>-->
                      About
                  </a>
              </li>
              <li class = "nav-item col-1 mx-auto d-none d-lg-block" style = "text-align: center">
                  <img src="Img/Logos/logo_medium.png" class = "mx-auto" width="40" height="40" class="align-top d-none d-lg-inline-block" alt="TimeToFit Logo">
              </li>
              <li class = "nav-item col-7 col-xl-1 col-lg-2 mx-auto">
                  <a class = "nav-link col-12" onclick = "showFeedBack()" >
                      <!--<i class="fas fa-globe d-inline-block d-lg-none mx-4"></i>-->
                        Feedback
                  </a>
              </li>
              <li class = "nav-item col-7 col-xl-1 col-lg-2 mx-auto">
                  <a class = "nav-link col-12" href="Includes/Pages/comingSoon.php">
                      <!--<i class="fas fa-list d-inline-block d-lg-none mx-4"></i>-->
                      Download
                  </a>
              </li>
              <li class = "nav-item col-7 col-xl-1 col-lg-2 mx-auto">
                  <a class = "nav-link col-12 active" href="Includes/Pages/userPage.php">
                      <!--<i class="fas fa-list d-inline-block d-lg-none mx-4"></i>-->
                      Profile
                  </a>
              </li>
          </ul>
          <span id = "version">Version Alpha 1.0</span>
      </div>
    </nav>
  <main>
    <section id='content' class = "pt-5">
      <div class=" mt-2 mb-0 mx-0 blockMessage" id="succesMessage">
        <?php //echo $validation->getSuccess(Comunicats::$addCompleted)?>
      </div>
      <div class=" mt-2 mb-0 mx-0 blockMessage" id="errorMessage">
       <?php echo $validation->getError(Comunicats::$titleError)?>
        <?php echo $validation->getError(Comunicats::$timeError)?>
        <?php echo $validation->getError(Comunicats::$breakError)?>
        <?php echo $validation->getError(Comunicats::$descError)?>
      </div>
      <div class="container">
        <section>
          <div id = "routine_popout_overlay" class = "overlay hidden">
            <div id = "routine_popout" class="row col-7 col-md-3 mx-auto mt-md-5">
                <i class="fas fa-times" id = "popout_closer" onclick="hidePopOut()"></i>
                <div id="popout_header" class = "py-3 col-12 mx-0 px-0">
                    <h5 class="my-1 col-12 p-0 "></h5>
                </div>
                <div id = "popout_content" class = "col-12 mx-0 px-0">
                    <input id="popout_input" class = "mx-auto  d-block col-10 py-1 px-0 hidden" type="text" name="popoutInput"/>
                      <p class = " col-10 my-1 popout_paragraph"></p>
                    <button class="col-12 d-block py-2 px-4 mt-3 " name = "confirm" onclick="" role = "button"></button>
                    <button class="col-12 d-block py-3 px-4 " name = "cancel" onclick="hidePopOut()" role = "button"></button>
                </div>
            </div>

          </div>
                <!--<div class="overlay routine_button_menu saveName hidden">
                  <i class="fas fa-times" onclick="hideSaveName()"></i>
                  <div class="row col-7 mx-auto">
                    <h5 class="my-1 col-12 p-0 ">Choose name of your routine</h5>
                    <input id="nameOfTable" type="text" name="nameOfWorkout"/>
                    <button class="col-12 d-block py-2 px-4 mt-3" onclick="saveTable()">Let`s Save</button>
                    <button class="col-12 d-block py-3 px-4" onclick="hideSaveName()">Cancel</button>
                  </div>
                </div>-->
          </section>
        <div class="row">
          <div class="formWrapper col-12 col-lg-10 mx-lg-auto mx-auto my-5 py-2">
            <div class="row">
              <?php
                if(isset($_SESSION['count']) && $_SESSION['count'] > 0 && $_SESSION['count'] < 30 )
                {
                  $i = 1;

                  

                  echo '<a href="exercise-form.php" class="col-1 ml-4 mr-0 my-1 px-0 d-inline-block"><i class="fas fa-arrow-circle-left"></i></a>
                  <h4 class="col-10 mx-0 px-0 d-inline-block">Complete your routine</h4>';

                  while($i <= $_SESSION['count'])
                  {
                    echo '
                    <div class="form_box col-10 mx-auto my-4 d-inline-block">
               
                     <h6 class="d-inline-block py-0 my-0 ml-2"><span class="id_block">'.$i.'</span>. Exercise</h6>
                      <i class="fas fa-trash col-1 mx-auto d-inline-block py-2 removeHandler" role = "button" title = "Remove exercise" onclick = "removeHandler(this)"></i>
                     <i class="fas fa-edit col-2 col-md-1 mx-auto d-inline-block py-2 sliderDown" role = "button"  title = "Open exercise" onclick = "sliderDown(this)"></i>
                     

                           <form action="#" method="POST" id="form_block_'.$i.'" class="col-12 col-lg-10 mx-auto my-1 collapse">
                          <figure class="my-4 my-lg-5 col-md-8 mx-auto">
                            <figcaption>Title of exercise</figcaption>
                            <input type="text" name="title" class="mt-0 mb-2 col-12 d-block py-0">
                          </figure>
                           <figure class="my-5 my-lg-5 col-md-5 mx-auto">
                            <select name="type" class="mt-0 mb-2 col-12 d-block py-2">
                              <option value="Time">Time</option>
                              <option value="Reps">Reps</option>
                            </select>
                           </figure>
                          <figure class="my-5 my-lg-5 col-md-5 mx-auto">
                            <figcaption>Time or Reps</figcaption>
                            <input type="number" name="time" class="mt-0 mb-2 col-12 d-block py-0">
                          </figure>
                          <figure class="my-5 my-lg-5 col-md-5 mx-auto">
                            <figcaption>Series</figcaption>
                            <input type="number" name="series" class="mt-0 mb-2 col-12 d-block py-0">
                          </figure>
                          <figure class="my-5 my-lg-5 col-md-5 mx-auto">
                            <figcaption>Break Time</figcaption>
                            <input type="number" name="break" class="mt-0 mb-2 col-12 d-block py-0">
                          </figure>
                          <figure class="my-4 my-lg-5 col-md-8 mx-auto">
                             <figcaption>Description of Exercise</figcaption>
                            <textarea name="description" class="mt-0 mb-2 col-12 d-block py-0"></textarea>
                          </figure>
                            <button type="button" class="button_submit mx-auto d-block col-5 col-md-2 py-0 mb-4" onclick = "getDataFromField(this)" name="addExercise" >OK</button>
                          </form>

                    </div>';
                    $i++;
                  }
                  echo '<div class = "col-10 d-block mb-2 py-3 mx-auto" ><i class="bottom_icon fas fa-exchange-alt" style = "display: none" title = "Change place of exercises"  ></i><i class="bottom_icon fas fa-plus" title = "Add new exercise" onclick = "addNewField()"></i></div>';
                  echo '<button type="button" onclick="saveTablePopout()" class="mx-auto d-block col-3 py-2 mb-4" name="addSong" >Save and Go</button> <button type="button" onclick="justGo()" class="mx-auto d-block col-3 py-2 mb-4" name="addSong" >Just Go</button>';
                  unset($_SESSION['count']);
                }
                else if(!isset($_SESSION['count']))
                {
                  echo '
                  <h4 class="mx-auto"> Select count of your exercise</h4>
                    <form action="" method="POST" id="count_form" class="col-12 col-lg-10 mx-auto">
                      <figure class="my-4 my-lg-5">
                          <input type="number" name="count" value="" class="mt-0 mb-2 col-12 d-block py-0">
                          <figcaption id="countFigcaption">Count of exercise</figcaption>
                      </figure>
                      <button type="submit" class="mx-auto d-block col-5 col-md-2 py-0 mb-4" >Ok !</button>
                    </form>';
                }
                else if(@$_SESSIO_SESSION['count'] < 0 || @$_SESSIO_SESSION['count'] > 30 || @$_SESSIO_SESSION['count'] == "" )
                {
                  echo '<span class="error d-block col-10 my-2 mx-auto">You must add some exercise but no more than 30</span>
                  <h4 class="mx-auto"> Select count of your exercise</h4>
                    <form action="#" method="POST" id="count_form" class="col-12 col-lg-10 mx-auto">
                      <figure class="my-4 my-lg-5">
                          <input type="number" name="count" value="" class="mt-0 mb-2 col-12 d-block py-0">
                          <figcaption id="countFigcaption">Count of exercise</figcaption>
                      </figure>
                      <button type="submit" class="mx-auto d-block col-5 col-lg-5 py-0 mb-4" >Ok !</button>
                    </form>';
                }
              ?>
              <!--<div class="form_box col-10 mx-auto my-4 d-inline-block">
               
               <h6 class="d-inline-block py-0 my-0 ml-2"><span>1</span>. Exercise</h6>
               <i class="fas fa-edit d-inline-block py-2" ></i>

                     <form action="#" method="POST" id="form_block_1" class="col-12 col-lg-10 mx-auto my-1">
                    <figure class="my-4 my-lg-5">
                      <input type="text" name="title" class="mt-0 mb-2 col-12 d-block py-0">
                      <figcaption>Title of exercise</figcaption>
                    </figure>
                     <figure class="my-5 my-lg-5">
                      <select name="type" class="mt-0 mb-2 col-12 d-block py-2">
                        <option value="Time">Time</option>
                        <option value="Reps">Reps</option>
                      </select>
                     </figure>
                    <figure class="my-5 my-lg-5">
                      <input type="number" name="time" class="mt-0 mb-2 col-12 d-block py-0">
                      <figcaption>Time or Reps</figcaption>
                    </figure>
                    <figure class="my-4 my-lg-5">
                       <figcaption style="top:0%; position:relative; text-align: left;">Description of Exercise</figcaption>
                      <textarea name="description" class="mt-0 mb-2 col-12 d-block py-0">
                      </textarea>
                    </figure>
                      <button type="button" id="button_submit" class="mx-auto d-block col-5 col-lg-5 py-0 mb-4" name="addSong" id="submit_button" >OK</button>
                    </form>

              </div>

             -->

            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include('Includes/HTML_Parts/feedBack.php')?>
  </main>
<script src="Js/j.query.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="Js/bootstrap.min.js"></script>
<script>
  var count = "<?php echo $count?>";
  count =  parseFloat(count);
  console.log("COUNT: " + count);
</script>
<script type="text/javascript" src="Js/Exercise/addExercise.js"></script>
<script src = "Js/Pages/feedBack.js"></script>
</html>