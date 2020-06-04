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

  if(isset($_SESSION['nameOfRoutine']))
  {
    $routine = $_SESSION['nameOfRoutine'];
    $sql = "SELECT * FROM $routine";

    $query = mysqli_query($conUsers, $sql);

    $numRows = mysqli_num_rows($query);

  } else {
    header('Location:Includes/Pages/userPage.php');
  }

?>

<!Doctype html>
<html>
<head>

<!--Meta data-->

<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#000000">
<meta name = "description" content="Here you can update fields in your routine e.g. Title or time of series" />
<meta name = "author" content="Przemyslaw Sipta" />
<meta name = "keywords" content="Wokout, Exercise, Music, Workout Menager, Workout Time Counter, Time Counter"/>
<meta name="msapplication-TileColor" content="#000000">

<link rel="stylesheet" href="Style/bootstrap.css">
<link rel="stylesheet" href="Style/exerciseForm-style.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Karla|Oswald|Rajdhani|Stylish|Titillium+Web" rel="stylesheet"/>
<link rel="manifest" href="manifest.json">

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




<title>TimeToFit || Update your routine</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark col-12 mx-auto px-0">
    <?php include('Includes/HTML_Parts/navigation.php')?>
  </nav>
  <main>
    <section id='content'>
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
        <div class="row">
          <div class="formWrapper col-12 col-lg-10 mx-lg-auto mx-auto my-5 py-2">
            <div class="row">
              <?php
                $i = 1;
                  while($row = mysqli_fetch_array($query))
                  {
                    echo '
                    <div class="form_box col-10 mx-auto my-4 d-inline-block">
               
                     <h6 class="d-inline-block py-0 my-0 ml-2"><span>'.$i.'</span>. '.$row['Title'].'</h6>
                     <i class="fas fa-trash col-1 mx-auto d-inline-block py-2 removeHandler" role = "button" title = "Remove exercise" onclick = "removeHandler(this)"></i>
                     <i class="fas fa-edit col-2 col-md-1 mx-auto d-inline-block py-2 sliderDown" role = "button"  title = "Open exercise" onclick = "sliderDown(this)"></i>

                           <form action="#" method="POST" id="form_block_'.$i.'" class="col-12 col-lg-10 mx-auto my-1">
                          <figure class="my-4 my-lg-5 col-md-8 mx-auto">
                            <figcaption>Title of exercise</figcaption>
                            <input type="text" name="title" class="mt-0 mb-2 col-12 d-block py-0" value="'.$row['Title'].'">
                          </figure>
                           <figure class="my-5 my-lg-5 col-md-5 mx-auto">
                            <select name="type" class="mt-0 mb-2 col-12 d-block py-2">';
                            if($row['Type']=='Time')
                            {
                              echo'
                              <option value="Time">Time</option>
                              <option value="Reps">Reps</option>';
                            }
                            else
                            {
                              echo'
                              <option value="Reps">Reps</option>
                              <option value="Time">Time</option>';
                            }
                            echo'</select>
                           </figure>
                          <figure class="my-5 my-lg-5 col-md-5 mx-auto">
                            <figcaption>Time or Reps</figcaption>
                            <input type="number" name="time" class="mt-0 mb-2 col-12 d-block py-0" value="'.$row['Time'].'">
                          </figure>
                          <figure class="my-5 my-lg-5 col-md-5 mx-auto">
                            <figcaption>Series</figcaption>
                            <input type="number" name="series" class="mt-0 mb-2 col-12 d-block py-0" value="'.$row['Series'].'">
                          </figure>
                          <figure class="my-5 my-lg-5 col-md-5 mx-auto">
                            <figcaption>Break Time</figcaption>
                            <input type="number" name="break" class="mt-0 mb-2 col-12 d-block py-0" value="'.$row['Break'].'">
                          </figure>
                          <figure class="my-4 my-lg-5 col-md-8 mx-auto">
                             <figcaption>Description of Exercise</figcaption>
                            <textarea name="description" rows="1" cols="1" class="mt-0 mb-2 col-12 d-block py-0">'.$row['Description'].'</textarea>
                          </figure>
                          <button type="button" class="button_submit mx-auto d-block col-5 col-md-2 py-0 mb-4" onclick = "getDataFromField(this)" name="addExercise" >OK</button>
                          </form>

                    </div>';
                    $i++;
                  }
                  echo '<div class = "col-10 d-block mb-2 py-3 mx-auto" ><i class="bottom_icon fas fa-exchange-alt" style = "display: none" title = "Change place of exercises"  ></i><i class="bottom_icon fas fa-plus" title = "Add new exercise" onclick = "addNewField()"></i></div>';

                  echo '<a class="button mx-auto d-block col-3 py-2 mb-4" href="Includes/Pages/yourRoutines.php">Back</a>';
              ?>

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
<script src="Js/j.query.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="Js/bootstrap.min.js"></script>
<script>
  var count = "<?php echo $numRows?>";
  count =  parseFloat(count);
</script>
<script type="text/javascript" src="Js/Exercise/addExercise.js"></script>
</html>