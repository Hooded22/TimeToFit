<section id = "feedBack" class = "hidden">
    <div class = "container col-12 overlay">
        <div class = "row col-10 px-0 mx-auto wrapper">

            <i class="far fa-times-circle" onclick="closeFeedBack()"></i>

            <h1 class = "col-10 mx-auto pt-3 mt-4">
                Say us
            </h1>
            <h2 class = "col-10 mx-auto">
                anything
            </h2>
            <form class="col-10 col-lg-8 mx-auto" method = "POST" action = "#">
                <textarea class="col-10 col-lg-6 mx-auto"></textarea>
                <button type = "submit" name = "sendFeedBack" class = "mt-4 col-8 col-lg-4 py-2">
                    Send Feedback
                </button>

                <div class="acknowledgements col-12 col-lg-10 mx-auto mt-5 hidden">
                    <h1>Thanks for feedback</h1>
                    <span onclick = "sendAnotherOne(false)">Send another one</span>
                </div>
            </form>
            <div class = "col-10 mx-auto rateContainer d-block mb-4 mt-5">
                <h1 class = "my-3">Rate Us</h1>
                <div class="starsContainer col-12 col-lg-4 mx-auto">
                    <i class="far fa-star" onclick="chooseRate(this)" id = "0"></i>
                    <i class="far fa-star" onclick="chooseRate(this)" id = "1"></i>
                    <i class="far fa-star" onclick="chooseRate(this)" id = "2"></i>
                    <i class="far fa-star" onclick="chooseRate(this)" id = "3"></i>
                    <i class="far fa-star" onclick="chooseRate(this)" id = "4"></i>
                </div>
            </div>
            <div class="acknowledgements col-12 col-lg-10 mx-auto mt-5 hidden" id = "rate">
                <h1>Thanks for rate</h1>
                <span onclick = "changeTheRate()">Change the rate</span>
            </div>
        </div>
    </div>
</section>