<?php
// Create a blank image with specified dimensions
$image_width = 600;
$image_height = 400;
$image = imagecreate($image_width, $image_height); // Use imagecreate() instead of imagecreatetruecolor()

// Set background color (white)
$background_color = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $background_color);

// Define data points (x-axis labels and corresponding values)
$data = array(
    "January" => 100,
    "February" => 150,
    "March" => 200,
    "April" => 180,
    "May" => 220
);

// Define colors
$line_color = imagecolorallocate($image, 0, 0, 255); // Blue color for the line

// Find maximum and minimum values to scale the graph
$max_value = max($data);
$min_value = min($data);
$scale = ($image_height - 40) / ($max_value - $min_value);

// Draw the data points and lines
$prev_x = 20;
$prev_y = $image_height - ($data[key($data)] - $min_value) * $scale;
foreach ($data as $label => $value) {
    $x = $prev_x + 100;
    $y = $image_height - ($value - $min_value) * $scale;
    imageline($image, $prev_x, $prev_y, $x, $y, $line_color);
    $prev_x = $x;
    $prev_y = $y;
}

// Output the image
header("Content-type: image/png");
imagepng($image);

// Clean up resources
imagedestroy($image);
?>
