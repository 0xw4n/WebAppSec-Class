<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ping Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Ping Test</h1>
        <form method="get" action="">
            <div class="form-group">
                <label for="ipInput">Enter IP Address:</label>
                <input type="text" class="form-control" id="ipInput" name="ip" placeholder="Enter IP Address" required>
            </div>
            <button type="submit" class="btn btn-primary">Ping</button>
        </form>
        <hr>

        <?php
	ini_set('display_errors', 0);
        if (isset($_GET['ip'])) {
            $ip = $_GET['ip'];
            $output = shell_exec("ping -c 1 " . $ip);
            ?>
            <div class="mt-4">
                <h3>Ping Result:</h3>
                <pre><?php echo $output; ?></pre>
            </div>
            <?php
        }
        ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
