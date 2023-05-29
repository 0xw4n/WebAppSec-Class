<?php
ini_set('display_errors', 0);
function alert($msg) {
  echo "<script>alert('".$msg."')</script>";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $username = $_POST["username"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = md5($_POST["password"]);

  // Perform validation (you can add more validation checks as per your requirements)
  if (empty($name) || empty($email) || empty($password) || empty($username)) {
    alert("Please fill in all fields.");
    exit;
  }

  // Perform database operations (insert user into the database, for example)
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
   $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
   $stmt->bind_param("ss", $username, $email);
   $stmt->execute();

   // Get the result
   $result = $stmt->get_result();
   $row = $result->fetch_assoc();

   if($row){
     alert("Username or email already exist.");
     echo "<script>window.location.href = 'signup.php'</script>";
     exit;
   }
  // Prepare and execute the SQL statement
  $stmt = $conn->prepare("INSERT INTO users (username, name, email, password) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $username, $name, $email, $password);
  $stmt->execute();

  alert("Registration successful!");
  echo "<script>window.location.href='./login.php'</script>";


  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>User Registration</h2>
    <form method="post" action="signup.php">
    <div class="mb-3">
        <label for="name" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
</body>
</html>
