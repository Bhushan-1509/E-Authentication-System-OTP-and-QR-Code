<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<script src="js/bootstrap.min.js"></script>
<?php
    include_once "components/_filter-input.php";

    $firstName = $lastName =$email =$recoveryEmail =$password=$cpassword = "";
     
    if($_SERVER['REQUEST_METHOD']  == 'POST'){
       if(isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['email']) && isset($_POST['recovery_email']) && isset($_POST['password']) && isset($_POST['cpassword'])){
        $firstName = filterOutInput($_POST['first-name']);
        $lastName = filterOutInput($_POST['last-name']);
        $email = $_POST['email'];
        $recoveryEmail = filterOutInput($_POST['recovery_email']);
        $password = filterOutInput($_POST['password']);
        $cpassword = filterOutInput($_POST['cpassword']);
        if(strval($password) != strval($cpassword)){
            echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
               Passwords do not match !
            </div>';

            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br>";
    
            echo '<br><br><div><form action = "sign-up.php" method="post"><button class="btn btn-primary">  Back </button></form></div>';
            die;
        }
        session_start();
        $_SESSION['first-name'] = $firstName;
        $_SESSION['last-name'] = $lastName;
        $_SESSION['email'] = $email;
        $_SESSION['reovery-email'] = $recoveryEmail;
        $_SESSION['password'] = $password;
        $_SESSION['cpassword'] = $cpassword;
        
        header("refresh: 3; url = http://localhost/mini-project/otpauthentication.php");

        
       }
    }

?>

