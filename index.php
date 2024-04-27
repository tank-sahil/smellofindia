<html>

<head>
    <title></title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="index1.css">
</head>

<body>
    <?php include('header.php') ?>

    <div class="container-fluide">
        <div class="main-banner">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <?php
            $con = new mysqli("localhost", "root", "", "soi");
            $res = $con->query("select * from indexe");
            while ($row = $res->fetch_assoc()) {
            ?>
                <center>
                    <h3><?= $row['h3'] ?></h3>
                    <h1><?= $row['h1'] ?></h1>
                    <p><?= $row['p'] ?></p>
                </center>
            <?php

            }
            ?>

        </div>
        <center>
            <?php
            $res2 = $con->query("select * from imgofi");
            while ($row2 = $res2->fetch_assoc()) {

            ?>
                <div class="main-card">
                    <div class="sub-card">
                        <h1>Best Selling Food</h1>
                        <img src="upload/<?= $row2['i1'] ?>" alt="">
                        <img src="upload/<?= $row2['i2'] ?>" alt="">
                        <img src="upload/<?= $row2['i3'] ?>" alt="">

                    </div>
                    <div class="but2">
                        <h4><a href="menu.php"class="btn" style="background-color:#433;color:white">Menu</a></h4>
                        <br>
                    </div>
                </div>
        </center>
    <?php
            }
    ?>

    <div class="container2">
        <div class="banner2">
            <?php
            $con = new mysqli("localhost", "root", "", "soi");
            $res = $con->query("select * from aofi");
            while ($row1 = $res->fetch_assoc()) {
            ?>
                <center>
                    <div class="write1">
                        <br><br>
                        <h1>ABOUT OUR RESTAURANT</h1>
                        <br><br><br>
                        <p><?= $row1['p1'] ?></p>
                        <p><?= $row1['p2'] ?></p>
                        <br><br>
                        <div>
                            <h4><a href="about.php" class="btn" style="background-color:#433;color:white">About Us</a></h4>
                        </div>
                </center>
            <?php
            }
            ?>


        </div>
    </div>

    </div>
    <?php include('footer.php') ?>
</body>

</html>