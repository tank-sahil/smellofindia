<html>

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="menu.css">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="menu.css">

    <style>
        h3 {
            text-transform: uppercase;
        }

        h4 {
            text-align: end;
            text-transform: uppercase;
        }

        h1 img {
            display: inline;
            height: 130px;
            width: 90px;
        }

        h1:hover img {
            visibility: hidden;

        }

        h1:hover .img2 {
            visibility: visible;

        }

        .photo img {
            height: 70%;
            object-fit: cover;
        }

        .img2 {
            visibility: collapse;
        }

        #change a {
            color: #443;
            text-decoration: none;
        }
    </style>
</head>

<body>


    <div class="container">
        <!--Breakfast Menu Start -->
        <h4 id="change"><a href="menu.php">Back to menu</a></h4>

        <br>
        <div class="row" id="breakfast">
            <h1 style="text-align: center;padding-top: 5px;"><img src="images/tea.jpg" alt="">DRINK <img src="images/tea.jpg" alt="" class="img2"></h1>
            <!-- 
            <div class="col-sm-6 mt-5 sm-h-5">
                <div class="child">
                    <div class="photo">
                        <img src="images/cha.jpg" alt="" class="wow fadeInLeft delay-2s" data-wow-delay="0.1s">
                    </div>
                    <div class="des">
                        <h3>Tea</h3>
                        <p class="wow fadeInLeft delay-2s" data-wow-delay="0.1s">
                            <br><br>
                        <h5><b>Net Quantity 100 millilitre</b></h5>
                        </p>
                        <h5><b>Price 45/-</b></h5>
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 mt-5">
                <div class="child">
                    <div class="photo">
                        <img src="images/blacktea.jpg" alt="" class="wow fadeInRight delay-2s" data-wow-delay="0.1s">
                    </div>
                    <div class="des">
                        <h3>black-tea</h3>
                        <p class="wow fadeInRight delay-2s" data-wow-delay="0.5s"> <br>
                        <h5><b>Net Quantity 100 millilitre</b></h5>
                        </p>
                        <h5><b>Price 40/-</b></h5>
                        </p>

                    </div>
                </div>
            </div>
            <!--p1-->
            <!-- <div class="col-sm-6 mt-5 sm-h-5">
                <div class="child">
                    <div class="photo">
                        <img src="images/coffee.jpg" alt="" class="wow fadeInLeft delay-2s" data-wow-delay="0.1s">
                    </div>
                    <div class="des">
                        <h3>coffee</h3>
                        <p class="wow fadeInLeft delay-2s" data-wow-delay="0.1s">
                            <br><br>
                        <h5><b>Net Quantity 100 millilitre</b></h5>
                        </p>
                        <h5><b>Price 60/-</b></h5>
                        </p>

                    </div>
                </div>
            </div>
            <br> -->
            <!--p2-->
            <!-- <div class="col-sm-6 mt-5 sm-h-5">
                <div class="child">
                    <div class="photo">
                        <img src="images/ccoffwe.jpg" alt="" class="wow fadeInRight delay-2s" data-wow-delay="0.1s">
                    </div>
                    <div class="des">
                        <h3>cappuccino</h3>
                        <p class="wow fadeInRight delay-2s" data-wow-delay="0.2s"><br><br>
                        <h5><b>Net Quantity 100 millilitre</b></h5>
                        </p>
                        <h5><b>Price 120/-</b></h5>
                        </p>

                    </div>
                </div>
            </div> -->
            <!--p3-->
            <!-- <div class="col-sm-6 mt-5">
                <div class="child">
                    <div class="photo">
                        <img src="images/cold.jpg" alt="" class="wow fadeInLeft delay-2s" data-wow-delay="0.2s">
                    </div>
                    <div class="des">
                        <h3>cold coffee</h3>
                        <p class="wow fadeInLeft delay-2s" data-wow-delay="0.3s"><br><br>
                        <h5><b>Net Quantity 100 millilitre</b></h5>
                        </p>
                        <h5><b>Price 190/-</b></h5>
                        </p>

                    </div>
                </div>
            </div>
            p4 -->
            <!-- <div class="col-sm-6 mt-5">
                <div class="child">
                    <div class="photo">
                        <img src="images/milk.jpg" alt="" class="wow fadeInRight delay-2s" data-wow-delay="0.2s">
                    </div>
                    <div class="des">
                        <h3>milk</h3>
                        <p class="wow fadeInRight delay-2s" data-wow-delay="0.3s"><br><br>
                        <h5><b>Net Quantity 200 millilitre</b></h5>
                        </p>
                        <h5><b>Price 60/-</b></h5>
                        </p>

                    </div>
                </div>
            </div> -->

            <?php
            $con = new mysqli("localhost", "root", "", "soi");
            $sel = "select * from item where time='breakfast' and typeoffood = 'drinks'";
            $result = $con->query($sel);

            while ($test = mysqli_fetch_assoc($result)) {
            ?>

                <div class="col-sm-6 mt-5">
                    <div class="child">
                        <div class="photo">
                            <img src=" imgup/<?= $test['photo']; ?>" alt="" class="wow fadeInRight delay-2s" data-wow-delay="0.2s">
                        </div>
                        <div class="des">
                            <h3><?= $test['name']; ?></h3>
                            <p class="wow fadeInRight delay-2s" data-wow-delay="0.3s"><br><br>
                            <h5><b><?= $test['des'] ?></b></h5>
                            </p>
                            <h5><b><?= $test['price'] ?></b></h5>
                            </p>

                        </div>
                    </div>
                </div>
            <?php

            } ?>



            <br> <br><br><br>
        </div>
</body>

</html>

<script src="lib/wow/wow.min.js"></script>
<script>
    new WOW().init();

    window.onscroll = function() {
        myFunction()
    };
</script>