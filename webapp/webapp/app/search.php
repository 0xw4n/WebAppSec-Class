<!DOCTYPE html>
<html>
<head>
    <title>User Search</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">User Search</h1>

        <form action="search.php" method="GET" class="mt-4">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <?php
	ini_set('display_errors', 0);
        if (isset($_GET['name'])) {
            // Database connection settings
            $servername = "db";
            $dbuser = "root";
            $dbpassword = "rootuser";
            $dbname = "workshop";

            // Establishing connection
            $conn = new mysqli($servername, $dbuser, $dbpassword, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieving user input
            $name = $_GET['name'];
//            $secure_name = htmlentities($name);

            // Searching for users with similar names in the database
            $sql = "SELECT * FROM users WHERE name LIKE '%" . $name . "%'";
            $result = $conn->query($sql);
            echo "<div class='mt-4'><h2>Search Results: ".$name."</h2></div>";
            
            // Displaying the results
            if ($result->num_rows > 0) {
//                echo "<div class='mt-4'><h2>Search Results: ".$name."</h2></div>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='mt-3'><strong>Name:</strong> " . $row["name"] . "</div>";
                    // Display other user information here
                    echo "<br>";
                }
            } else {
                echo "<div class='mt-4'>No results found.</div>";
            }

            // Closing the database connection
            $conn->close();
        }
        ?>

    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
