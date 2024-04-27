<html>

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="menu.css">


    <style>
        h4 {
            text-align: end;
            text-transform: uppercase;
        }

        h1 {
            color: #0b0b45;
        }

        h1 img {
            display: inline;
            height: 130px;
            width: 90px;
        }

        h2 {
            text-transform: uppercase;
        }

        h1:hover img {
            visibility: hidden;

        }

        h1:hover .img2 {
            visibility: visible;

        }

        .img2 {
            visibility: collapse;
        }
        #change a{
            color: #443;
            text-decoration: none;
        }
    </style>
</head>

<div class="container">
    <!--Breakfast Menu Start -->
    <h4 id="change" ><a href="menu.php">Back to menu</a></h4>
    <br>
    <div class="row" id="breakfast">
        <h1 style="text-align: center;padding-top: 5px;"><img src="images/tamil.jpg" alt="">SOUTH INDIAN<img
                src="images/tamil1.jpg" alt="" class="img2"> </h1>

        <!--p1-->
        <div class="col-sm-6 mt-5 sm-h-5">
            <div class="child">
                <div class="photo">
                    <img src="images/pongal.jpeg" alt="" class="wow fadeInLeft delay-2s" data-wow-delay="0.1s">
                </div>
                <div class="des">
                    <h3>Pongal(sweet)</h3>
                    <p class="wow fadeInLeft delay-2s" data-wow-delay="0.1s"> A sweet rice pudding made with rice, lentils, and jaggery. It is often served during the Pongal festival.</p>
                    <h5><b>Price 200 /-</b></h5>
                </div>
            </div>
        </div>
        <br>
        <!--p2-->
        <div class="col-sm-6 mt-5 sm-h-5">
            <div class="child">
                <div class="photo">
                    <img src="images/maysore.jpeg" alt="" class="wow fadeInRight delay-2s" data-wow-delay="0.1s">
                </div>
                <div class="des">
                    <h2>Mysore(sweet)</h2>
                    <p class="wow fadeInRight delay-2s" data-wow-delay="0.1s">This is a delicious south Indian dish made of gram flour, ghee, and sugar..
                    </p>
                    <h5><b>Price 270/-</b></h5>
                </div>
            </div>
        </div>
        <!--p1-->
        <div class="col-sm-6 mt-5 sm-h-5">
            <div class="child">
                <div class="photo">
                    <img src="images/plain.jpeg" alt="" class="wow fadeInLeft delay-2s" data-wow-delay="0.1s">
                </div>
                <div class="des">
                    <h3>Plain Dosa</h3>
                    <p class="wow fadeInLeft delay-2s" data-wow-delay="0.1s">Make with Rice an surve with Sambhar And Coconut chutney. </p>
                    <h5><b>Price 180 /-</b></h5>
                </div>
            </div>
        </div>
        <br>
        <!--p2-->
        <div class="col-sm-6 mt-5 sm-h-5">
            <div class="child">
                <div class="photo">
                    <img src="images/masala.jpeg" alt="" class="wow fadeInRight delay-2s" data-wow-delay="0.1s">
                </div>
                <div class="des">
                    <h2>Masala Dosa</h2>
                    <p class="wow fadeInRight delay-2s" data-wow-delay="0.1s">Masala dosa make with Rice , Potato and many spices and Sunve on Banana leaves With sambhar and coconut chutney.
                    </p>
                    <h5><b>Price 220/-</b></h5>

                </div>
            </div>
        </div>
        <!--p3-->
        <div class="col-sm-6 mt-5">
            <div class="child">
                <div class="photo">
                    <img src="images/maysori.jpeg" alt="" class="wow fadeInLeft delay-2s" data-wow-delay="0.1s">
                </div>
                <div class="des">
                    <h2>Maysor Masala Dosa</h2>
                    <p class="wow fadeInLeft delay-2s" data-wow-delay="0.3s">It also Make as masala dosa but its masala is very spice.</p>
                    <h5><b>Price 230 /-</b></h5>

                </div>
            </div>
        </div>
        <!--p4-->
        <div class="col-sm-6 mt-5">
            <div class="child">
                <div class="photo">
                    <img src="images/rasam.jpeg" alt="" class="wow fadeInRight delay-2s" data-wow-delay="0.1s">
                </div>
                <div class="des">
                    <h2>Rasam Rice</h2>
                    <p class="wow fadeInRight delay-2s" data-wow-delay="0.3s">it is Delicious Dish of South Indian, It make with Rice & surve with Rasam. </p>
                    <h5><b>Price 190 /-</b></h5>

                </div>
            </div>
        </div>
    </div>
    <br>
</div>
</body>

</html>

<script src="lib/wow/wow.min.js"></script>
<script>
    new WOW().init();
</script>