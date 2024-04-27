<html>

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="menu.css">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="menu.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .main-div {
            width: 400px;
            height: 396px;
            position: relative;
            overflow: hidden;
            border-radius: 10%;

        }

        img {
            object-fit: cover;
            height: 398px;
            width: 398px;
            padding: 2px;
            border: none;
            transition: 1s ease-out;

        }

        .sub-div {
            width: 392px;
            height: 300px;
            position: absolute;
            color: black;
            background-color: rgba(128, 128, 128);
            bottom: -300px;
            border-radius: 10%;
            /* Initially hide the sub-div */
            left: 49.8%;
            transform: translateX(-50%);
            transition: bottom 1s ease-in;
            /* Add smooth transition effect */
        }

        .main-div:hover .sub-div {
            bottom: 60px;
            transition: 1s ease-out;
            /* Move the sub-div to the bottom when hovering over the main-div */
        }
        .main-div:hover img {
            filter: grayscale(100%);
            transition: 1s ease-out;
        }
        #change a {
            color: #443;
            text-decoration: none;
            float: right;
        }
    </style>

</head>

<body>
    <div class="container">
        <?php include('header.php') ?>
        <br><br>
        <a href="menu.php">
        <h4 id="change"><a href="menu.php">Back to menu</a></h4>
        </a>
        <div class="d-flex">
            <?php
            $name = $_REQUEST['cost'];

            $con = new mysqli("localhost", "root", "", "soi");
            $sel = "SELECT * FROM `item` WHERE name = '$name'";
            $res = $con->query($sel);
            while ($row = $res->fetch_assoc()) {
            ?>
                <div class="col-sm-6 mt-5 sm-h-5">

                        <div class="main-div">
                            <img src="imgup/<?php echo $row['photo'] ?>" alt="">
                            <div class="sub-div">
                                <center><br><br>
                                    <h2><?php echo $row['name'] ?></h2>
                                    <br>
                                    <h4><?php echo $row['des'] ?></h4>
                                    <br>
                                    <h3><?php echo $row['price'] ?></h3>
                                    <br>
                                </center>
                            </div>
                        </div>
                </div>
            <?php
            }
            ?>

            <!-- <div class="col-sm-6 mt-5 sm-h-5">
                <div class="card">
                    <img src="images/dhokla.jpg" alt="">
                    <div class="card__content">
                        <h1>Dhokla</h1>
                        <br>
                        <h4>Make with Besan</h4>
                        <br>
                        <h3>Price 120</h3>
                        <br>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

</body>

</html>

<?php

?>