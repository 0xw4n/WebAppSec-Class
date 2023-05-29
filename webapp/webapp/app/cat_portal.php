<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Button Photos</title>
</head>
<body>
  <div class="container">
  <h1>Cute cats photos</h1>
    <form action="image.php" method="post">
      <div class="row">
        <div class="col-md-4">
          <button type="submit" name="photo" value="./images/image1.jpg" class="btn btn-link btn-photo">
            <img src="./images/image1.jpg" alt="Photo 1" class="img-fluid">
          </button>
        </div>
        <div class="col-md-4">
          <button type="submit" name="photo" value="./images/image2.jpg" class="btn btn-link btn-photo">
            <img src="./images/image2.jpg" alt="Photo 2" class="img-fluid">
          </button>
        </div>
        <div class="col-md-4">
          <button type="submit" name="photo" value="./images/image3.jpg" class="btn btn-link btn-photo">
            <img src="./images/image3.jpg" alt="Photo 3" class="img-fluid">
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <button type="submit" name="photo" value="./images/image4.jpg" class="btn btn-link btn-photo">
            <img src="./images/image4.jpg" alt="Photo 4" class="img-fluid">
          </button>
        </div>
        <div class="col-md-4">
          <button type="submit" name="photo" value="./images/image5.jpg" class="btn btn-link btn-photo">
            <img src="./images/image5.jpg" alt="Photo 5" class="img-fluid">
          </button>
        </div>
        <div class="col-md-4">
          <button type="submit" name="photo" value="./images/image6.jpg" class="btn btn-link btn-photo">
            <img src="./images/image6.jpg" alt="Photo 6" class="img-fluid">
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <button type="submit" name="photo" value="./images/image7.jpg" class="btn btn-link btn-photo">
            <img src="./images/image7.jpg" alt="Photo 7" class="img-fluid">
          </button>
        </div>
        <div class="col-md-4">
          <button type="submit" name="photo" value="./images/image8.jpg" class="btn btn-link btn-photo">
            <img src="./images/image8.jpg" alt="Photo 8" class="img-fluid">
          </button>
        </div>
        <div class="col-md-4">
          <button type="submit" name="photo" value="./images/image9.jpg" class="btn btn-link btn-photo">
            <img src="./images/image9.jpg" alt="Photo 9" class="img-fluid">
          </button>
        </div>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

