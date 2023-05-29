<!DOCTYPE html>
<html>
<head>
    <title>Access Control</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Access Control</h2>
        <?php
	ini_set('display_errors', 0);
        $servername = "db";
        $username = "root";
        $password = "rootuser";
        $dbname = "management";
        $admin_cookie = "";

        if (isset($_COOKIE['user'])) {
            $cookie = $_COOKIE['user'];

            try {
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM users where session = '" . $cookie ."'";
                $result = $conn->query($sql);

                $row = $result->fetch_assoc();

                if($row){
                  echo "<p>Welcome, admin! You have access to the page.</p>";
		  echo '<img src="./images/image8.jpg" class="img-fluid" alt="Image 8">';
                } else {
                    echo "<p>You are not an admin. You don't have access to this page.</p>";
                }
                
                $conn->close();
            } catch(PDOException $e) {
              echo "Error: " . $e->getMessage();
            }
        } else {
            echo "<p>You are not an admin. You don't have access to this page.</p>";
        }
        ?>
    </div>
</body>
</html>
