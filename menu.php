<html>

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="hea.css">
</head>

<body>

    <section>

        <div class="container">
            <?php include('header.php') ?>
            <!-- Button Start -->
            <div class="nav sciky-top bg-white">
                <div class="col-4 hover"> <a href="#breakfast">Breakfast</a></div>
                <div class="col-4 hover"><a href="#lunch">Lunch</a></div>
                <div class="col-4 hover"><a href="#dinner">Dinner</a></div>
            </div><br>

            <?php
            $con = new mysqli("localhost", "root", "", "soi");

            ?>
            <div class="row" id="breakfast">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="container-input"><input type="text" placeholder="Search" name="search" class="input"><svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                            <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
                        </svg></div>
                    <?php
                    if (isset($_POST['search'])) {
                        $msea = $_POST['search'];
                        $sql = "SELECT * FROM item WHERE name LIKE '%$msea%'";
                        $result = $con->query($sql);

                        // Display the search results
                        if ($result->num_rows > 0) {
                            echo "<h2>Search Results:</h2>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["name"] . "</p>";
                                ?>
                                    <script>
                                        window.location.href = "search.php?cost=<?php echo $row['name'] ?>";
                                    </script>
                                <?php
                            }
                        } else {
                            echo "No results found.";
                        }
                    }
                    ?>
                    <div class="container">
                        <h1 style="text-align: center;">Breakfast</h1>
                        <div class="scroll-container">
                            <div class="photo-scroll">
                                <?php
                                $sel = "select * from add_cat where time='breakfast'";
                                $res = $con->query($sel);
                                while ($row = $res->fetch_assoc()) {
                                ?>
                                    <a href="sub_menu.php?time=<?= $row['time'] ?>&cat_name=<?= $row['cat_name'] ?>" style="color: #433;text-decoration:none">

                                        <div class="photo wow fadeInUp delay-2s" data-wow-delay="0.3s">
                                            <h3 style="text-align: center;"><?php echo $row['cat_name']; ?></h3>
                                            <img src="images/<?php echo $row['photo'] ?>" alt="Photo 1">
                                            <div class="text-center fora">
                                                <br><br>
                                            </div>
                                        </div>
                                    </a>

                                <?php
                                }

                                ?>
                            </div>
                        </div>
                    </div>
            </div>


            <!-- LUNCH -->

            <div class="row" id="lunch">
                <div class="container">

                    <h1 style="text-align: center;">Lunch</h1>
                    <div class="scroll-container">
                        <div class="photo-scroll">

                            <?php
                            $sel = "select * from add_cat where time='lunch'";
                            $res = $con->query($sel);
                            while ($row = $res->fetch_assoc()) {
                            ?>
                                <a href="sub_menu.php?time=<?= $row['time'] ?>&cat_name=<?= $row['cat_name'] ?>" style="color: #433;text-decoration:none">

                                    <div class="photo wow fadeInUp delay-2s" data-wow-delay="0.3s">
                                        <h3 style="text-align: center;"><?php echo $row['cat_name']; ?></h3>
                                        <img src="images/<?php echo $row['photo'] ?>" alt="Photo 1">
                                        <div class="text-center fora">
                                            <br><br>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>


            <!-- End Lunch -->

            <!--Start Dinner -->
            <div class="row" id="dinner">
                <div class="container">

                    <h1 style="text-align: center;">Dinner</h1>
                    <div class="scroll-container">
                        <div class="photo-scroll">

                            <?php
                            $sel = "select * from add_cat where time='dinner'";
                            $res = $con->query($sel);
                            while ($row = $res->fetch_assoc()) {
                            ?>
                                <a href="sub_menu.php?time=<?= $row['time'] ?>&cat_name=<?= $row['cat_name'] ?>" style="color: #433;text-decoration:none">
                                    <div class="photo wow fadeInUp delay-2s" data-wow-delay="0.3s">
                                        <h3 style="text-align: center;"><?php echo $row['cat_name']; ?></h3>
                                        <img src="images/<?php echo $row['photo'] ?>" alt="Photo 1">
                                        <div class="text-center fora">
                                            <br><br>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>
                </form>

            </div>

            <!--End Dinner -->


        </div>
        <br> <br><br><br>
        </div>
    </section>
    <!--Breakfast menu End -->
    </section>
    <!--Breakfast menu End -->
    <?php include('footer.php') ?>
</body>

</html>
<script src="lib/wow/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<?php
if (isset($_POST['send_bre'])) {
    $sel = "select * from add_cat where time='breakfast'";
    $res = $con->query($sel);
    $row = $res->fetch_assoc();
    echo "SEND DONE";
    echo $row['cat_name'];
}

?>