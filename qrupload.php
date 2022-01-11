<?php
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    header("refresh:1 ; url = http://localhost/mini-project/welcome.php");
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/qrupload.css">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>

<body>
  <div class="mainDiv">
    <form action="qrprocess.php" method="post" enctype="multipart/form-data">
      <div>
        <img src="images/file-upload.jpg" alt="">
        <h2 for="formFileLg" class="form-label">Upload file </h2>
        <input class="form-control form-control-md" id="formFileLg" type="file" name="filesToUpload">
      </div>
      <input type="submit" value="Submit" class="btn btn-primary" style="margin-left:42%;margin-top:1%" name="submitBtn"> 
    </form>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>