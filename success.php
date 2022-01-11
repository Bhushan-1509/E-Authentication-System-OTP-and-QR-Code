<?php
  include_once "components/_send-mail.php";
  include_once "components/_dbConfig.php";
  include_once "components/_qrCodeGenrator.php";
  
  session_start();
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    header("refresh:1 ; url = http://localhost/mini-project/welcome.php");
  }
  $mail = new sendMail();
  $file = new qrGenerate();
  $filePath = $file->generateQR($_SESSION['email']);
  $checksumValue = $file->generateCheckSum();
  // SQL UPDATE STMT ->
  // UPDATE `sys_users` SET `file_checksum` = '$checksumValue' WHERE email = 'SESSION_["email"]';
  $mail->sendAttachment($_SESSION['email'],$filePath);
  $emailTmp = $_SESSION['email'];
  $sqlupdateStmt = "update `sys_users` set `checksum_value` = '$checksumValue' where email = '$emailTmp' ";
  $dbInstance  = new dbConfig();
  $connection = new mysqli($dbInstance->hostName,$dbInstance->userName,$dbInstance->password,$dbInstance->database,$dbInstance->port);
  $result = $connection->query($sqlupdateStmt);
  $file->deleteFile();
  session_unset();
  session_destroy();
  

?>



<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <title>Success</title>

  </head>
    <link rel="stylesheet" href="css/success.css">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <body>
      <div class="card">
      <div class="checkmark" style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>You are succesfully authenticated <br/>Now you can login and use our service<p>
        <button class="loginBtn" id="successPageLoginBtn">Login</button>

      </div>
      <script src="js/script.js"></script>
    </body>
</html>