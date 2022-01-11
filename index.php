<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        header("refresh:1 ; url = http://localhost/mini-project/welcome.php");
      }
    else{
        header("refresh:1 ; url = http://localhost/mini-project/sign-in.php");
        
    }
?>