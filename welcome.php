<?php
session_start();
if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true){
    header("refresh:1 ; url = http://localhost/mini-project/sign-in.php");
    
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/welcome.css">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height:15vh;">
    <li class="nav-item">
      <img src="images/user-icon.png" />
      <label for="" style="color:white;font-weight:bold;font-size:19px;">Welcome</label>
      <?php $name = $_SESSION['name'];
      echo "<label style='color:white;font-weight:bold;font-size:19px;'>$name<label>"?>
    </li>
    <input type="button" value="Logout" class="btn btn-warning" id="logoutBtnWelcomePage" style="margin-left:80%">
  </nav>
  <div class="heading">
    <h2>Welcome to our page</h2>
  </div>
  <script src="js/logout.js"></script>
</body>

</html>