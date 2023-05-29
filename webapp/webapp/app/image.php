<?php
ini_set('display_errors', 0);
// Get the view parameter from the URL
$view = $_POST['photo'];

// Check if the view parameter is set and not empty
if (isset($view) && !empty($view)) {
    $imagePath = $view;
    $photo = basename($view);

    // Output the image file
    header('Content-Disposition: attachment; filename=' . $photo);
    header('Content-Type: image/jpeg');
    header('Content-Length: ' . filesize($imagePath));

    readfile($imagePath);
    exit;
}

// If the view parameter is not valid or the image file doesn't exist, display an error message
echo 'Image not found.';
?>

