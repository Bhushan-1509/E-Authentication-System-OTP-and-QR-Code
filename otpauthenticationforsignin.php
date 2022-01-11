<?php


require_once "components/_filter-input.php";
require_once "components/_dbConfig.php";
require_once "components/_send-mail.php";



session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  header("refresh:1 ; url = http://localhost/mini-project/welcome.php");
}
else if (isset($_POST['otpinputfield']) != true && isset($_POST['verifyBtn']) != true) {
  $_SESSION['otpValue'] = strval(rand(100000,999999));
  $mail = new sendMail();
  $mail->sendOTP($_SESSION['otpValue'], $_SESSION['email']);
}

else if (isset($_POST['otpinputfield']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  // $_POST['otpinputfield'] = filterOutInput($_POST['otpinputfield']);
  global $otpValue;
  if (strval($_SESSION['otpValue']) == $_POST['otpinputfield']) {
    $dbInstance  = new dbConfig();
    $connection = new mysqli($dbInstance->hostName,$dbInstance->userName,$dbInstance->password,$dbInstance->database,$dbInstance->port);
    // session_start();
    $email = filterOutInput($_SESSION['email']);
    $password = filterOutInput($_SESSION['password']);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    // INSERT INTO `sys_users` (`user_id`, `first_name`, `last_name`, `email`, `recovery_email`, `password_hash`, `qr_file_checksum`) VALUES (NULL, 'bhushan', 'asdfkasdf', 'test@test.com', 'test@anotherTest.com', 'asdfa', '');
    $sqlSelectCommand = "SELECT * FROM sys_users WHERE email = '$email' AND password_hash = '$passwordHash';";
    $resultObj = $connection->query($sqlSelectCommand);
    $resultObjFetchedArray = $resultObj->fetch_array(MYSQLI_NUM);
    $passwordResult = password_verify($password,strval($resultObjFetchedArray[5]));
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['name'] = $resultObjFetchedArray[1];
    $_SESSION['loggedin'] = true;
  
    header("refresh: 3; url = http://localhost/mini-project/welcome.php");
    
  } else {
    echo '<div class="alert alert-danger" role="alert">
      You did not enter valid OTP
    </div>';
  }
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP Authentication</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/otpauthentication.css">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>

<body>
  <div class="card">
    <!-- <div class="checkmark" style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div> -->
    <!-- <h1>Success</h1> 
        <p>You are succesfully authenticated <br/>Now you can login and use our service<p> -->
    <h3>OTP is sent to your Email address which you gave during registration</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <div class="input-group-lg mb-3" style="margin-top:10%">
        <input type="text" class="form-control" placeholder="Enter OTP "aria-label="Username" aria-describedby="basic-addon1" name="otpinputfield">
      </div>
      <button class="loginBtn" name="verifyBtn">Verify</button>
    </form>

  </div>
  <script src="js/bootstrap.js"></script>
</body>

</html>



