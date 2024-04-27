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

    h1 {
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

    .carousel-item img {
      filter: blur(1px);
    }

    .carousel-item img:hover {
      filter: none;
    }
    .row{
      background-image: url(images/backosau.jpeg);
      object-fit: cover;
      height: 50%;
      width: 100%;
      margin: 0.5px;
    }
    .hi{
      margin-top: 8%;
    }
    @media screen and (max-width:1080px) {
      .hello .hi {
        margin-top: 60%;
      }
    }
    hr{
        border: 2px solid black;
    }
  </style>
</head>

<body>
  <div id="carouselExample" class="carousel slide mt-5" data-bs-ride="carousel">
  <h1 style="text-align: center;">Our Team</h1>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/chef.jpg" class="d-block w-100 " alt="Image 1">
        <div class="carousel-caption d-md-bloc">
          <h1>Kunal Kapur</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/chef2.jpg" class="d-block w-100 " alt="Image 2">
        <div class="carousel-caption d-md-bloc">
          <h1>Pooja Dhingra</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/chef3.jpg" class="d-block w-100 " alt="Image 3">
        <div class="carousel-caption d-md-bloc">
          <h1>Ranveer Brar</h1>
        </div>
      </div>
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
  </div><br>
  <hr>
  <div class="container-fluide">
    <div class="row d-flex">
      <div class="col-6 hello" style="text-align: center;">
        
        <h1 class="hi ">SAY NO TO MEATS</h1>
        <h1>ON DRUGS</h1>
      </div>
      <div class="col-6">
        <h2>The fabric of Cutlets was born out of love and respect for these humble deli creations, met with a desire to
          bring quality ingredients to the table. Simply put, we’re here to bring you a sandwich experience you can feel
          good about.
        </h2>
      </div>
    </div>
    </div>
    <hr>
    <br><br><br><br>
  

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Enable the carousel with automatic sliding
  document.addEventListener('DOMContentLoaded', function () {
    var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExample'), {
      interval: 3000, // Set the interval (in milliseconds) for automatic sliding
      wrap: true // Allow carousel to wrap around when reaching the last or first item
    });
  });
</script>