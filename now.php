<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dynamic Slider</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="slider-container">
  <div id="slider">
    <?php
    include 'functions.php';
    foreach ($slides as $slide) {
      echo '<div class="slide" style="background-image: url(' . $slide['url'] . ');"></div>';
    }
    ?>
  </div>
  <button id="prevBtn" onclick="prevSlide()">Previous</button>
  <button id="nextBtn" onclick="nextSlide()">Next</button>
</div>
<div id="controls">
  <form method="post">
    <input type="text" name="slideInput" placeholder="Enter slide URL">
    <button type="submit" name="addSlide">Add Slide</button>
  </form>
  <form method="post">
    <input type="number" name="updateIndex" placeholder="Enter slide ID to update">
    <input type="text" name="updateInput" placeholder="Enter new slide URL">
    <button type="submit" name="updateSlide">Update Slide</button>
  </form>
  <form method="post">
    <input type="number" name="deleteID" placeholder="Enter slide ID to delete">
    <button type="submit" name="deleteSlide">Delete Slide</button>
  </form>
</div>
<script src="script.js"></script>
</body>
</html>
