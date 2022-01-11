<!DOCTYPE html>
<html>

<head>
    <title>SignUp</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="css/sign-up.css" />
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

</head>

<body>
    <div class="container">
        <div class="form-box">
            <form id="register" class="input-group" action="signupprocess.php" method="post">
                <div class="form-element" id="heading">
                    <h2>Sign Up</h2>
                </div>
                <br>
                <div class="form-element">
                    <input type="text" class="input-field" placeholder="First Name" name="first-name" required />
                </div>
                <div>
                    <input type="text" class="input-field" placeholder="Last Name" name = "last-name" required />
                </div>
                <div>
                    <input type="email" class="input-field" placeholder="Email Address" name="email" required />
                </div>
                <div>
                    <input type="email" class="input-field" placeholder="Recovery Email Address" name="recovery_email" required />
                </div>

                <div class="form-element">
                    <input type="password" class="input-field" placeholder="Choose Password" name="password" required />
                </div>
                <div>
                    <input type="password" class="input-field" placeholder="Confirm Password" name="cpassword" required />
                    <br><br>
                    <div class="submitBtn">
                        <button class="btn info">Sign Up</button>
                    </div>
            </form>

        </div>
    </div>
    </div>
    <!--  -->
</body>

</html>