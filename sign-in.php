<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignIn</title>
  <link rel="stylesheet" href="css/sign-in.css">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

</head>

<body>
  <div class="container">

      <div class="row">
        <h2 style="text-align:center">Sign In with OTP or QR-Code</h2>
        <div class="vl">
          <span class="vl-innertext">or</span>
        </div>

        <div class="col">

          <img src="images/qr-code.jpg" alt="" srcset="" style="margin-top:-18%;margin-left:9%">
          <!-- <button class="qr-login-btn">Login With QR-Code</button> -->
          <input type="button" value="Login With QR-Code" class="qr-login-btn" id= "loginqr">
        </div>

        <div class="col">
          <div class="hide-md-lg">
            <p>Or sign in manually:</p>
          </div>

          <form action="signinprocess.php" method="post">
            <input type="text" name="email" placeholder="Email" required>
            <br><br><br>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login" style="margin-top:29%">
          </form>

          <!-- <br><br><br><br><br><br><br> -->

        </div>

      </div>
  
  </div>
  </div>
  </div>

  <div class="last-section" style="margin-top:2%;margin-left:25%">
    <input type="button" value="Sign Up" id = "signUpBtn" style="background-color:#6868d1;color:white;width:40%">
  </div>
</body>
<script>
  document.getElementById("loginqr").addEventListener("click",function(){
    location.assign("http://localhost/mini-project/qrupload.php");
  })
  document.getElementById("signUpBtn").addEventListener("click",()=>{
    location.assign("http://localhost/mini-project/sign-up.php")
  })
</script>

</html>