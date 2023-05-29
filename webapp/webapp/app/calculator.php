<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Calculator</h2>
        <form method="post" action="calculator.php">
            <div class="form-group">
                <input type="text" class="form-control" name="question" placeholder="Enter math question">
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>

        <?php
	ini_set('display_errors', 0);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $question = $_POST['question'];

            // Evaluate the math question and display the result
            try {
                $result = eval("return $question;");
                echo '<div class="mt-3 alert alert-success">Result: ' . $result . '</div>';
            } catch (Throwable $e) {
                echo '<div class="mt-3 alert alert-danger">Invalid math question</div>';
            }
        }
        ?>
    </div>
</body>
</html>

