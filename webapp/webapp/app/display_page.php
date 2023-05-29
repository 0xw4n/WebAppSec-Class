<?php
ini_set('display_errors', 0);
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    // Specify the directory where your PHP files are located
    //$directory = '/var/www/html/'; // change this

    // Create the file path
    $filepath = realpath($page);

    // Check if the file exists
    include($filepath);
}
?>

