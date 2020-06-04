<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Time To Fit || Home Page</title>

        <!--Meta Data-->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <meta name = "description" content="Aplication to workout, managing routines and listen to music. Home page of Time To Fit Workout App" />
        <meta name = "author" content="Przemyslaw Sipta" />
        <meta name = "keywords" content="Wokout, Exercise, Music, Workout Menager, Workout Time Counter, Time Counter"/>
        <meta name="theme-color" content="white"/>
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#000000">

        <!--Styles-->
        <link rel="stylesheet" href="Style/bootstrap.css">
        <link rel="stylesheet" href="Style/homePage-style.css"/>
        <link rel="stylesheet" href="Style/feedBack-style.css"/>
        <link rel="stylesheet" href="Style/loadingAnimation.css"/>
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
                        <a class = "nav-link col-12" href="#Introduction" name = "Introduction">
                            <!--<i class="fas fa-list d-inline-block d-lg-none mx-4"></i>-->
                            Mission
                        </a>
                    </li>
                    <li class = "nav-item col-7 col-xl-1 col-lg-2 mx-auto">
                        <a class = "nav-link col-12" href="#Contact" name = "Contact">
                            <!--<i class="fas fa-dumbbell d-inline-block d-lg-none mx-4"></i>-->
                            Contact
                        </a>
                    </li>
                    <li class = "nav-item col-7 col-xl-1 col-lg-2 mx-auto">
                        <a class = "nav-link col-12" href="#News" name = "News">
                                <!--<i class="fas fa-music d-inline-block d-lg-none mx-4"></i>-->
                            News
                        </a>
                    </li>
                    <li class = "nav-item col-1 mx-auto d-none d-lg-block" style = "text-align: center">
                        <img src="Img/Logos/logo_medium.png" class = "mx-auto" width="40" height="40" class="align-top d-none d-lg-inline-block" alt="TimeToFit Logo">
                    </li>
                    <li class = "nav-item col-7 col-xl-1 col-lg-2 mx-auto">
                        <a class = "nav-link col-12" onclick = "showFeedBack()">
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
                        <a class = "nav-link col-12 active" href="login-page.php">
                            <!--<i class="fas fa-list d-inline-block d-lg-none mx-4"></i>-->
                            Sign In
                        </a>
                    </li>
                </ul>
                <span id = "version">Version Alpha 1.0</span>
            </div>
        </nav>
        <main>
            <div class="container px-0 mx-0 col-12">
                <section id = "mainContainer" class = "col-12 mx-0 px-0">
                    <div class="row mx-0 px-0 col-12">
                        <div class = "wrapper col-12">
                            <h5 class="col-12 col-lg-5 mx-auto mt-5 pt-3">
                                It`s Time For...
                            </h5>
                            <button type="button" role="button" name = "signUp" title="Go to SignUp" class="col-6 col-lg-3 mx-auto p-2 d-block" onclick = "location.href = 'login-page.php'">
                                
                            </button>
                            <h6 class="col-12 mx-auto p-0 my-0">
                                YOU
                            </h6>
                        </div>
                    </div>
                </section>
            </div>
            <section id = "Introduction" class = " Content ">
                <div class = "container col-12">
                    <div class = "row">
                        <div class = "wrapper col-12 mx-auto my-0">
                            <h5 class = "col-12 col-lg-5 mx-auto">
                                Our Mission
                            </h5>
                            <h3 class="col-10 col-lg-5 mt-5 mx-auto">
                                    TimeToFit is a aplication made by people loves workout for mans like them. We offer combain aplication to managing of your own training routine, counting time or reps while training and listen to music from our own base. 
                            </h3>
                            
                            <div class = "counter_wrapper col-12 col-lg-8 mx-auto">
                                <div class = "counter col-8 col-lg-2 mx-5">
                                    <span 
                                        data-quantity = "230"
                                    >
                                        0
                                    </span>
                                    <span>
                                        Posibility Exercise
                                    </span>
                                </div>

                                <div class = "counter col-8 col-lg-2 mx-5">
                                    <span
                                        data-quantity = "321"
                                    >
                                        0
                                    </span>
                                    <span>
                                        Songs to choose
                                    </span>
                                </div>

                                    <div class = "counter col-8 col-lg-2 mx-5">
                                        <span
                                            data-quantity = "123"
                                        >
                                            0
                                        </span>
                                        <span>
                                            Happy Users
                                        </span>
                                     </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id = "First_Quotee" class = "Quotes">
                <div class = "container col-12 px-0">
                    <div class = "row wrapper col-12 px-0 mx-0">
                        <div class = "col-12 col-lg-6 mx-auto">
                            <p style = "font-size: 3em">
                               All  <span class = "Outstanding">progress</span> takes place <span class = "Outstanding">outside</span> the <span class = "Outstanding">comfort zone</span>
                            </p>
                            <span class = "author d-block col-12">~ Michael John Bobak</span>
                        </div>
                    </div>
                </div>
            </section>

            <section id = "News" class = " Content ">
                <div class = "container col-12 px-0">
                    <div class = "row">
                        <div class = "wrapper col-12 mx-auto">
                            <h5 class = "col-12 col-lg-5 mx-auto">
                                NEWS
                            </h5>
                            <div class = "newsBlock col-10 col-lg-5 mx-auto">
                                <img src = "Img/NewsImg/13.09.2019.jpg" alt = "Picture of news" class = "mx-auto"/>
                                <h6>Here we come...</h6>
                                <p>
                                    First version (alpha 1.0) is just avalible as web aplication for everybody. We are going to updating this up to date. Our target is make TimeToFit as native application on mobile devices. But even now, you have access to every functionality of TimeToFit, but we not promise that evething works perfect ;) If while using you find some errors or something what iritate you and you wanto to change it, please say us about it !
                                </p>
                                <span>
                                    13.09.2019
                                </span>
                            </div>

                            <button type = "button" role = "button" name = "seeMore" title = "See more news" class = "col-4 col-lg-1 col-md-2 py-2" onclick = 'location.href = "https://www.instagram.com/timetofit.workoutapp/"'>
                                See More
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <section id = "Second_Quotee" class = "Quotes">
                <div class = "container col-12 px-0">
                    <div class = "row wrapper col-12 px-0 mx-0">
                        <div class = "col-12 col-lg-6 mx-auto">
                            <p style = "font-size: 3em">
                               <span class = "Outstanding">Take care </span>of Your <span class = "Outstanding">body</span> it`s a only place you <span class = "Outstanding">have to live </span>
                            </p>
                            <span class = "author d-block col-12">~ Jim Rohn</span>
                        </div>
                    </div>
                </div>
            </section>

            <section id = "Contact" class = " Content ">
                <div class = "container col-12 px-0">
                    <div class = "row">
                        <div class = "wrapper col-12 mx-auto">
                            <h5 class = "col-12 col-lg-5 mx-auto">
                                CONTACT
                            </h5>

                            <form action="#" method = "POST" name = "contactForm" class = "col-12 col-lg-10 mx-auto">
                                    <div class = "blockMessage"></div>
                                <label class = "col-10 col-lg-4 d-block mx-auto" for = "first_contact_input">
                                    <input id = "first_contact_input" name = "first_contact_input" type = "text" placeholder="Your Name" class = "col-10 col-lg-4 mx-auto my-3 mt-5"/>
                                    <span></span>
                                </label>
                                <label class = "col-10 col-lg-4 d-block mx-auto" for = "second_contact_input">
                                    <input id = "second_contact_input" name = "second_contact_input" type = "text" placeholder="Your Email" class = "col-10 col-lg-4 mx-auto my-3 mt-5"/>
                                    <span></span>
                                </label>
                                <label for = "messageBox" class = "col-8 col-lg-3 mx-auto d-block">
                                    <textarea placeholder="Message" name = "messageBox" class = "col-12 mx-auto"></textarea>
                                </label>
                                <button type = "submit" role = "button"  name = "sendMess" title = "Send Message" class = "col-4 col-lg-1 col-md-2 py-2 mt-5">
                                    Send
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section id = "Third_Quotee" class = "Quotes">
                <div class = "container col-12 px-0">
                    <div class = "row wrapper col-12 px-0 mx-0">
                        <div class = "col-12 col-lg-6 mx-auto">
                            <p style = "font-size: 3em">
                                You`re only <span class = "Outstanding">one</span> workout away from a <span class = "Outstanding">good moon</span>
                            </p>
                            <span class = "author d-block col-12">~ OpenFit.pl</span>
                        </div>
                    </div>
                </div>
            </section>
    
            <section id = "Join" class = " Content ">
                <div class = "container col-12 px-0">
                    <div class = "row">
                        <div class = "wrapper col-12 mx-auto">
                            <h5 class = "col-12 col-lg-5 mx-auto">
                                Join To Us
                            </h5>
                            <h3 class="col-10 col-lg-5 mt-5 mx-auto">
                                    TimeToFit is making by very small team so our project is still growing in a little slow time. If you want to help us to develope this app, join to us, test our product and leave feedback. Thanks!
                            </h3>
                            <button class = "col-4 col-lg-2 col-md-3 mx-auto py-3 px-0" name = "linkLogin" onclick = "location.href = 'login-page.php'">
                                Join Now !
                            </button>
                            <div class = "mediaBlock col-10 col-lg-5 mx-auto">
                                <a href = "https://www.facebook.com/Time-To-Fit-101005584638261/">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                 <a href = "Includes/Pages/comingSoon.php">
                                   <i class="fab fa-google-play"></i>
                                </a>
                                 <a href = "https://www.instagram.com/timetofit.workoutapp/">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
            <footer>
                <div class = "container col-12 px-0">
                    <div class = "row col-12 px-0 mx-0">
                        <div class = "wrapper col-12 mx-0 p-0">
                            <div class = "footerBlock col-10 col-lg-4 mx-auto">
                                <h5 class = "col-8 mx-auto my-3 py-0">
                                        <img src="Img/Logos/logo_medium.png" width="40" height="40" class="d-inline-block align-top mx-0 px-0" alt="TimeToFit">
                                    Time To Fit
                                </h5>
                                <p class = "col-8 mx-auto">
                                        Project made by Przemyslaw Sipta as part of demonstration work to portfolio. Application code on GNU license available on GITHub under link: http://LoremIpsum.com.pl
                                </p>
                            </div>
                            <div class = "footerBlock col-10 col-lg-4 mx-auto">
                                <h5 class = "col-8 mx-auto my-3 py-0">
                                    Contact Us
                                </h5>
                                <ul class = "col-12 col-lg-6">
                                    <li><i class="fas fa-at"></i> timetofit.contact@gmail.com</li>
                                    <li><i class="fas fa-phone"></i> 661 626 141</li>
                                    <li><i class="fab fa-facebook-messenger" onclick = "location.href = 'https://www.facebook.com/Time-To-Fit-101005584638261/'"></i> Time To Fit</li>
                                </ul>
                            </div>
                            <div class = "footerBlock col-10 col-lg-4 mx-auto pb-5">
                                <h5 class = "col-12 mx-auto my-3 py-0">
                                    Leave FeedBack
                                </h5>
                                <p class = "col-8 mx-auto">
                                    Your feedbacks are very important to us so be so kind and leave something for us ;)
                                </p>
                                <button type = "button" role = "button"  name = "joinUs" title = "feedBack" class = "col-8 col-lg-6 col-xl-4 col-md-4 py-2" onclick = "showFeedBack()">
                                   Feedback
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!--FeedBack-->
            <?php include('Includes/HTML_Parts/feedBack.php')?>

            <section id = "loadingOverlay">
                <div class = "overlay">
                    <div class = "container">
                        <div class = "row"> 
                            <div class = "wrapper col-10 col-md-8 mx-auto">

                                <div class="sk-folding-cube">
                                    <div class="sk-cube1 sk-cube"></div>
                                    <div class="sk-cube2 sk-cube"></div>
                                    <div class="sk-cube4 sk-cube"></div>
                                    <div class="sk-cube3 sk-cube"></div>
                                  </div>

                                  <h1 class = "col-10 mx-auto py-5">Page is loading... ;)</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            

        </main>
    </body>
    <script src = "Js/progressiveApp.js"></script>
    <script type="text/javascript" src="https://unpkg.com/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="Js/j.query.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="Js/bootstrap.min.js"></script>
    <script src = "Js/Pages/homePage.js"></script>
    <script src = "Js/Pages/feedBack.js"></script>
    <script src = "sw.js"></script>
    <script src = "main.js"></script>
</html>