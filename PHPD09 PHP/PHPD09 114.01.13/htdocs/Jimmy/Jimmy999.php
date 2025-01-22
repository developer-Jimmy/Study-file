<?php
// File and new size
$filename = 'coffee.copy.jpg';
$percent = 0.5;

// Define crop coordinates and size (e.g., cropping from (x=100, y=100) with width=200, height=200)
$crop_x = 100;
$crop_y = 100;
$crop_width = 200;
$crop_height = 200;

// Content type
header('Content-Type: image/jpeg');

// Get original image size
list($width, $height) = getimagesize($filename);

// Calculate new sizes for resizing
$newwidth = $width * $percent;
$newheight = $height * $percent;

// Load the image
$source = imagecreatefromjpeg($filename);

// Create a new true color image with desired dimensions for the cropped and resized image
$thumb = imagecreatetruecolor($newwidth, $newheight);

// Crop the source image (from $crop_x, $crop_y with $crop_width, $crop_height)
$cropped = imagecreatetruecolor($crop_width, $crop_height);
imagecopy($cropped, $source, 0, 0, $crop_x, $crop_y, $crop_width, $crop_height);

// Resize the cropped image to the new dimensions
imagecopyresized($thumb, $cropped, 0, 0, 0, 0, $newwidth, $newheight, $crop_width, $crop_height);

// Output the final image
imagejpeg($thumb);
?>