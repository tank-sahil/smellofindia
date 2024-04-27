<?php
include_once 'header.php';
require_once 'conect.php';
$msg = '';
if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $path = 'slider_img/' . $image;
    $sql = $con->query("insert into slider(image_path) values ('$path')");
    if ($sql) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $msg = 'image uploaded successfully!';
    } else {
        $msg = 'image is upload failed!';
    }
}
$result = $con->query("select image_path from slider");
?>

<html>

<head>
    <style>
        .heading {
            background: url(./img/nikephotoes/nike.png) no-repeat;
            background-size: cover;
            background-position: center;
            text-align: center;
            padding-top: 6rem;
            padding-bottom: 6rem;
        }

        .heading h1 {
            color: sandybrown;
            font-size: 4rem;
        }

        .heading p {
            padding: top 1px;
            font-size: 2rem;
            color: darkgray;
        }

        .heading p a {
            color: #ff7800;
            padding-right: 0.5rem;
        }
    </style>
</head>



<body>

    <br><br>

    <div class="heading">
        <h3 class="heading">BIG <span>SUMMER-OFFER</span></h3>


    </div>
    <div>

        <div class="container-fluid">
            <div class="row justify-content-center mb-2">
                <div class="col-lg-10">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <?php
                            $i = 0;
                            foreach ($result as $row) {
                                $actives = '';
                                if ($i == 0) {
                                    $actives = 'active';
                                }
                            ?>

                                <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>
                            <?php
                                $i++;
                            } ?>

                        </ul>


                        <div class="carousel-inner">
                            <?php
                            $i = 0;
                            foreach ($result as $row) {
                                $actives = '';
                                if ($i == 0) {
                                    $actives = 'active';
                                }
                            ?>
                                <div class="carousel-item <?= $actives; ?> ">
                                    <img src="<?= $row['image_path'] ?>" width="1250px" height="500px">
                                </div>

                            <?php
                                $i++;
                            } ?>
                        </div>
                    </div>


                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>

        </div>
        <!-- <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4 bg-dark rounded px-4">
                <h4 class="text-center text-light p-1">select image to uplode!</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <input type="file" name="image" class="form-control p-1" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="upload" class="btn btn-warning btn-block" value="upload image">
                        </div>
                        <div class="form-group">
                            <h4 class="text-center text-light"><?= $msg; ?></h4>
                        </div>
                    </form>
            </div>

        </div> -->

    </div>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </div>


    <!--end header-->


    <!--end news-->

</body>

</html>
<?php
include_once('footer.php');
?>

<script src="js/script.js"></script>