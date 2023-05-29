<?php
ini_set('display_errors', 0);
function alert($msg) {
  echo "<script>alert('".$msg."')</script>";
}

if (isset($_COOKIE['user'])) {
  header("Location: dashboard.php");
  exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $email = $_POST["email"];
  $password = md5($_POST["password"]);

  // Perform validation (you can add more validation checks as per your requirements)
  if (empty($email) || empty($password)) {
    alert("Please enter your username and password.");
    exit;
  }

  // Perform database operations (validate user credentials, for example)
  // Replace this with your own database logic

  // Connection parameters
  $servername = "db";
  $dbuser = "root";
  $dbpassword = "rootuser";
  $dbname = "workshop";

  try {
    $conn = new mysqli($servername, $dbuser, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows === 1) {
      // Username and password match, set session and cookie
      session_start();
      $username = $row['username'];
      $_SESSION['username'] = $username;

      $cookieName = 'user';
      $cookieValue = session_id();
      $cookieExpiration = time() + 3600; // Expires in 1 hour

      setcookie($cookieName, $cookieValue, $cookieExpiration);

      $stmt = $conn->prepare("INSERT INTO usersession (username, session) VALUES (?, ?)");
      $stmt->bind_param("ss", $username, $cookieValue);
      $stmt->execute();

      header("Location: dashboard.php");
      exit;
    } else {
      // Invalid credentials
      alert("Invalid username or password.");
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>User Login</h2>
    <form method="post" action="login.php">
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php } ?>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</body>
</html>

