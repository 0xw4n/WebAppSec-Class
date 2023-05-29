<?php
session_start(); // Start the session

// Clear all session variables
$servername = "db";
$dbuser = "root";
$dbpassword = "rootuser";
$dbname = "workshop";
$session = session_id();

try {
  $conn = new mysqli($servername, $dbuser, $dbpassword, $dbname);
   // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
  $stmt->bind_param("s", $_SESSION['username']);
  $stmt->execute();

  $stmt = $conn->prepare("DELETE FROM usersession WHERE session = ?");
  $stmt->bind_param("s", $session);
  $stmt->execute();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Destroy the session
session_unset();
session_destroy();
setcookie("user", "");

// Redirect to the login page
header("Location: login.php");
exit;
?>

