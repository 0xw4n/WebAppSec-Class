<?php
ini_set('display_errors', 0);
session_start(); // Start the session

// Check if the user is not logged in
if (!isset($_COOKIE['user'])) {
  header("Location: login.php");
  exit;
}

// Get the username from the session
  $servername = "db";
  $dbuser = "root";
  $dbpassword = "rootuser";
  $dbname = "workshop";
  $name = "";

  try {
    $conn = new mysqli($servername, $dbuser, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = (SELECT username FROM usersession WHERE session = ?)");
    $stmt->bind_param("s", $_COOKIE['user']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
      $name = $row['name'];
    }

    } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
// $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Welcome, <?php echo $name; ?>!</h2>
    <p>This is the dashboard page.</p>
    <a href="logout.php" class="btn btn-primary">Logout</a>
    <a href="delete.php" class="btn btn-primary">Delete</a>
  </div>
</body>
</html>

