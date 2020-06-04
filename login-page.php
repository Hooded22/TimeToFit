<?php
  include("Includes/DataBase/config.php");
  include("Includes/Classes/Account.php");
  include("Includes/Classes/Constants.php");
  
  $account = new Account($con);

  include("Includes/Handlers/login-handler.php");
  include("Includes/Handlers/register-handler.php");

  function getValue($name)
  {
    if(isset($_POST['$name']))
    {
      echo $_POST['$name'];
    }
  }

 if(isset($_SESSION['userLogged']) && $_SESSION['confirm'] == true)
  {
    header('Location:Includes/Pages/userPage.php');
  }



?>
<!Doctype html>
<html lang = "en">
<head>

<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
<meta name = "author" content="Przemyslaw Sipta" />
<meta name = "description" content="Page allows login to aplication Time To Fit" />
<meta name = "keywords" content="Wokout, Exercise, Music, Workout Menager, Workout Time Counter, Time Counter"/>
<meta name="msapplication-TileColor" content="#000000">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#000000">

<link rel="stylesheet" href="Style/bootstrap.css">
<link rel="stylesheet" href="Style/login-style.css"/>
<link rel="stylesheet" href="Style/feedBack-style.css"/>
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

<title>TimeToFit || Login Page</title>
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
                        <a class = "nav-link col-12" href="#Contact" name = "Contact">
                            <!--<i class="fas fa-dumbbell d-inline-block d-lg-none mx-4"></i>-->
                            About
                        </a>
                    </li>
                    <li class = "nav-item col-1 mx-auto d-none d-lg-block" style = "text-align: center">
                        <img src="Img/Logos/logo_medium.png" class = "mx-auto" width="40" height="40" class="align-top d-none d-lg-inline-block" alt="TimeToFit">
                    </li>
                    <li class = "nav-item col-7 col-xl-1 col-lg-2 mx-auto">
                        <a class = "nav-link col-12" onclick = "showFeedBack()">
                            <!--<i class="fas fa-globe d-inline-block d-lg-none mx-4"></i>-->
                             Feedback
                        </a>
                    </li>
                    <li class = "nav-item col-7 col-xl-1 col-lg-2 mx-auto">
                        <a class = "nav-link col-12" href="coming-soon.php">
                            <!--<i class="fas fa-list d-inline-block d-lg-none mx-4"></i>-->
                            Download
                        </a>
                    </li>
                </ul>
                <span id = "version">Version Alpha 1.0</span>
            </div>
        </nav>
  <main>
    <section id='content'>
      <div class=" mt-2 mb-0 mx-0 blockMessage" id="succesMessage">
        <?php echo $account->getSuccess(Constants::$registerCompeleted)?>
      </div>
      <div class=" mt-2 mb-0 mx-0 blockMessage" id="errorMessage">
        <?php echo $account->getError(Constants::$loginError)?>
        <?php echo $account->getError(Constants::$bannedUser)?>
        <?php echo $account->getError(Constants::$usernameError)?>
        <?php echo $account->getError(Constants::$usernameError2)?>
        <?php echo $account->getError(Constants::$nameError)?>
        <?php echo $account->getError(Constants::$nameError2)?>
        <?php echo $account->getError(Constants::$emailError2)?>
        <?php echo $account->getError(Constants::$emailError3)?>
        <?php echo $account->getError(Constants::$emailError)?>
        <?php echo $account->getError(Constants::$passwordError)?>
        <?php echo $account->getError(Constants::$passwordError2)?>
        <?php echo $account->getError(Constants::$passwordError3)?>
      </div>
      <div class="container">
        <div class="row">
          <div class="formWrapper col-10 col-lg-6 mx-lg-auto mx-auto my-5 py-2">
            <div class="row">
              <h3 class="col-9 mx-auto pb-2">Login in</h3>
              <form method="POST" action="" class="col-10 mx-auto my-1" id="form-login">
                <figure>
                
                  <input type="text" name="username-login" placeholder="" value="<?php getValue('username-login')?>" class="mt-0 mb-2 col-12 d-block py-2 mb-3">
                  <figcaption>Username</figcaption>
                </figure>
               
                <figure class="mt-5">
                  <input type="password"  value="<?php getValue('username-password')?>" name="password-login" placeholder="" class="mt-0 mb-2 col-12 d-block py-2 mb-4">
                   <figcaption>Password</figcaption>
                </figure>

                
                <button type="submit" name='login' class="mx-auto d-block col-6 col-lg-3 py-1">Login In</button>
              </form>
              <i class="fas fa-arrow-circle-left ml-2 my-2" id="backToLogin" onclick="location.reload()"></i>
              <h4 class="col-9 my-3 py-3 mx-auto"><span class="openButton" onclick="registerFormOpen()">Or join to us !</span></h4>
              <!--Register Page-->
              <form action="login-page.php" method="POST" class="col-10 mx-auto my-1" id="form-register">
                
                <figure class="my-4">
                <input type="text" name="username" value='<?php getValue("username")?>' class="mt-0 mb-2 col-12 d-block py-2">
                <figcaption>Username</figcaption>
                </figure>

                <figure class="my-5">
                <input type="text" name="first-name" value="<?php getValue('first-name')?>" class="mt-0 mb-2 col-12 d-block py-2 name">               
                <figcaption>First Name</figcaption>
                </figure>


                <figure class="my-5">
                <input type="text" name="last-name" value="<?php getValue('last-name')?>"  class="mt-0 mb-2 col-12 d-block py-2 name">
                <figcaption>Last Name</figcaption>
                </figure>

                
                <figure class="my-5">
                <input type="email" name="email" value="<?php getValue('email')?>"  class=" email mt-0 mb-2 col-12 d-block py-2">
                <figcaption>Your Email</figcaption>
                </figure>

                <figure class="my-5">
                <input type="email" name="email-confirm" class="mt-0 mb-2 col-12 d-block py-2 email">
                <figcaption>Confirm Email</figcaption>
                </figure>

                <figure class="my-5">
                <input type="password" name="password" class="password mt-0 mb-2 col-12 d-block py-2">
                <figcaption>Password</figcaption>
                </figure>

                <figure class="my-5">
                <input type="password" id="pw2" name="password-confirm" class="password mt-0 mb-2 py-2 col-12 d-block">
                <figcaption>Password Confirm</figcaption>
                </figure>
                <button type="submit" class="mx-auto d-block col-8 col-lg-5 py-1 mb-2" name="register" id="button-register">Register Now !</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!--FeedBack-->
     <?php include('Includes/HTML_Parts/feedBack.php')?>
  </main>
<script src="Js/j.query.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="Js/bootstrap.min.js"></script>
<script type="text/javascript" src="Js/Login/loginRegister.js"></script>
<script type="text/javascript" src="Js/Login/FastFeedback.js"></script>
<script type="text/javascript" src="Js/Login/login-validation.js"></script>
<script src = "Js/Pages/feedBack.js"></script>
</html>
