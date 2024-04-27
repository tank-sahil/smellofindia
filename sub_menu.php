<html>

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="menu.css">
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

        #change a {
            color: #443;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    $cat_name = $_REQUEST['cat_name'];
    $time = $_REQUEST['time'];
    // echo "$time AND $cat_name";
    $con = new mysqli("localhost", "root", "", "soi");
    $sel = "select * from item where time ='$time' AND typeoffood = '$cat_name' ";
    $res = $con->query($sel);
    
    ?>
    <div class="container">
        <!--Breakfast Menu Start -->
        <h4 id="change"><a href="menu.php">Back to menu</a></h4>

        <br>
        <div class="row">
            <h1 style="text-align: center;padding-top: 5px;"><?php echo $cat_name ?> </h1>
            <!--p1-->
            <?php
            while ($row = $res->fetch_assoc()) {

            ?>
                <div class="col-sm-6 mt-5 sm-h-5">
                    <div class="child wow fadeinup delay-0.30s">
                        <div class="photo ">
                            <img src="images/<?php echo $row['photo']; ?>" alt="" data-wow-delay="0.1s">
                        </div>
                        <div class="des ">
                            <h3><?php echo $row['name'] ?></h3>
                            <p data-wow-delay="0.1s"><?php echo $row['des'] ?></p>
                            <h5><b><?php echo $row['price'] ?></b></h5>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <br>
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