<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Whois</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>What is IP address of this domain?</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="ipInput">Domain name:</label>
                <input type="text" class="form-control" id="ipInput" name="org" placeholder="Enter domain name" required>
            </div>
            <button type="submit" class="btn btn-primary">Dig</button>
        </form>
        <hr>

        <?php
	ini_set('display_errors', 0);
        if (isset($_POST['org'])) {
            $org = $_POST['org'];
            $symbolsToRemove = array('{', '}', ';', '(', ')', '$', '[', ']', '|', '&');

            $secure_org = str_replace($symbolsToRemove, '', $org);
            $output = shell_exec("dig " . $secure_org);
            ?>
            <div class="mt-4">
                <h3>Dig Result:</h3>
                <pre><?php echo $output; ?></pre>
            </div>
            <?php
        }
        ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
