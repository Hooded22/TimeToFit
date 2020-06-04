<?php
	include("../DataBase/config.php");
  	include("../Classes/Songs.php");
  	include("../Classes/Constants.php");

	if(!isset($_SESSION['userLogged']) || $_SESSION['status'] < 2)
	{
		header('Location: ../../index.php');
	}

	$account = new AccountToAdd($con);

	include("../Handlers/addSongHandler.php");
?>

<!Doctype html>
<html>
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
      <meta name = "description" content="Panel only for members of administration" />
      <meta name = "author" content="Przemyslaw Sipta" />
      <meta name = "keywords" content="Wokout, Exercise, Music, Workout Menager, Workout Time Counter, Time Counter"/>
      <meta name="theme-color" content="white"/>
      <meta name="msapplication-TileColor" content="#000000">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#000000">


      <link rel="stylesheet" href="../../Style/bootstrap.min.css">
      <link rel="stylesheet" href="../../Style/admin-style.css"/>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Karla|Oswald|Rajdhani|Stylish|Titillium+Web" rel="stylesheet"/>
      <link rel="manifest" href="../../manifest.json">

      <link rel="apple-touch-icon" sizes="57x57" href="../../Img/Favicon/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="../../Img/Favicon/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="../../Img/Favicon/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="../../Img/Favicon/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="../../Img/Favicon/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="../../Img/Favicon/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="../../Img/Favicon/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="../../Img/Favicon/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="../../Img/Favicon/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="../../Img/Favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="../../Img/Favicon/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="../../Img/Favicon/favicon-16x16.png">


      <title>TimeToFit || Admin Page</title>
  </head>
<body>
  <nav class="navbar bg-timeToFit navbar-expand-lg">
    <?php include('../HTML_Parts/navigationAdmin.php')?>
  </nav>
  <main>
    <section id='content'>
      <div class=" mt-2 mb-0 mx-0 blockMessage" id="succesMessage">
        <?php echo $account->getSuccess(Constants::$addCompleted)?>
      </div>
      <div class=" mt-2 mb-0 mx-0 blockMessage" id="errorMessage">
       <?php echo $account->getError(Constants::$tileIsExistError)?>
        <?php echo $account->getError(Constants::$durationError)?>
        <?php echo $account->getError(Constants::$fileToBig)?>
        <?php echo $account->getError(Constants::$nonOmnisLoad)?>
        <?php echo $account->getError(Constants::$luckOfFile)?>
        <?php echo $account->getError(Constants::$uploadError)?>
        <?php echo $account->getError(Constants::$fileTypeError)?>
        <?php echo $account->getError(Constants::$formError)?>
      </div>
      <div class="container">
        <div class="row">
          <div class="formWrapper col-10 col-lg-6 mx-lg-auto mx-auto my-5 py-2">
            <div class="row">
            	<h4 class="col-10 mx-auto my-2">Add New Song</h4>
              <form enctype="multipart/form-data" action="#" method="POST" class="col-10 mx-auto my-1">

                <figure class="my-4">
                <input type="text" name="artist" class="mt-0 mb-2 col-12 d-block py-2">
                <figcaption>Artist</figcaption>
                </figure>

                <figure class="my-5">
                <input type="text" name="duration" class="mt-0 mb-2 col-12 d-block py-2">
                <figcaption>Duration</figcaption>
                </figure>

                <figure class="my-5">
                  <select type="select" name="genre"  class="mt-0 mb-2 col-12 d-block py-2 name">
                    <option value="" disabled selected>Choose Genre</option>
                    <option value="Rock">Rock</option>
                    <option value="Rap">Rap</option>
                    <option value="Trap">Trap</option>
                    <option value="Latin">Latin</option>
                    <option value="Remix">Remix</option>
  				        </select>
                </figure>

                <figure class="my-5">
                  <select type="select" name="playlist" value="" class="mt-0 mb-2 col-12 d-block py-2 name">
                    <option value="" selected>None</option>
                    <?php
                      $qOption = mysqli_query($con, "SELECT * FROM playlists");
                      while($Option = mysqli_fetch_array($qOption))
                      {
                        echo '<option style="color:black;" value="'.$Option['Name'].'">'.$Option['Name'].'</option>';
                      } 
                    ?>
                  </select>
                </figure>


                <div class="upload-btn-wrapper mt-0 mb-5">
                  <input type="hidden" value='MAX_FILE_SIZE' value="5120000000" class="mt-0 mb-2 col-12 d-block py-2">
                  <!--<button class="mx-auto col-4 py-2">Chose File</button>-->
                  <input type="file" name="musicFile" class="mt-0 mb-2 col-12 d-block py-2">
               </div>
                <button type="submit" class="mx-auto d-block col-8 col-lg-5 py-1 mb-2" name="addSong" id="submit_button" >Add This !
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
<script src="../../Js/j.query.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../Js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../Js/Music/addSong.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var validate = new Validate();
    validate.validateButton();
  });

  /*$('input').eq(1).on('keydown',function(){
    new Validate().validateArtist(this);
  });

   $('input').eq(2).on('keydown',function(){
    new Validate().validateDuration(this);
  });*/



</script>
</html>