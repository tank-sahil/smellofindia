<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title>Auto Slider Example</title>
  <style>
    /* Customize the slider styles if needed */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .slide {
      width: 65%;
      height: 100%;
      position: relative;
      left: 17.5%;
    }

    @media screen and (max-width:1080px) {
      .slide {
        width: 100%;
        height: 0%;
        left: 0;
      }
    }

    .ab {
      background-image: url(images/backosau.jpeg);
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      object-fit: cover;
      height: 50vh;
      width: 100%;

    }

    .hi {
      margin-top: 0%;
      margin-left: 0%;
    }

    @media screen and (max-width:1080px) {
      .hello .hi {
        margin-top: 60%;
      }
    }
  </style>
</head>

<body>
  <?php include('header.php'); ?>
  <div class="container-fluide">

    <div id="carouselExample" class="carousel slide mt-5" data-bs-ride="carousel">
      <h1 style="text-align: center;">Our Team</h1>
      <?php
      $con = new mysqli("localhost", "root", "", "soi");
      $sel = "select * from slider";
      $res = $con->query($sel);
      $row = $res->num_rows;

      for ($i = 1; $i <= $row; $i++) {
        $data = $res->fetch_assoc();

        if ($i == 1) {
      ?>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="upload/<?php echo $data['i1'] ?>" class="d-block w-100 " alt="Image 1">
            </div>
          <?php
        } else {
          ?>
            <div class="carousel-item">
              <img src="upload/<?php echo $data['i1'] ?>" class="d-block w-100 " alt="Image 2">
            </div>
        <?php
        }
      }
        ?>
        <!-- Add more carousel items as needed -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
    </div><br><br>
    <?php
    $select = "select * from abute";
    $res = $con->query($select);
    $row = $res->fetch_assoc();
    ?>
    <center>
      <div class="ab">
        <div class=" hello" style="text-align: center;">
          <br><br>
          <h1><?= $row['head'] ?></h1>
          <br><br>
        </div>
        <!-- <div class=""> -->
        <h3><?= $row['par'] ?>
          <br>

        </h3>
        <!-- </div> -->
      </div>
  </div>
  </center>
  <br><br><br><br><br><br>

  <?php include('footer.php') ?>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Enable the carousel with automatic sliding
  document.addEventListener('DOMContentLoaded', function() {
    var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExample'), {
      interval: 2000, // Set the interval (in milliseconds) for automatic sliding
      wrap: true // Allow carousel to wrap around when reaching the last or first item
    });
  });
</script>