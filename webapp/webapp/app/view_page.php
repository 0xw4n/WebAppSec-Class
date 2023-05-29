<!DOCTYPE html>
<html>
<head>
    <title>Page Selection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Page Selection</h2>
            <form method="get" action="display_page.php">
                <div class="form-group">
                    <label for="page">Enter the page name:</label>
                    <input type="text" class="form-control" name="page" id="page" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
