<?php
    include_once "components/_filter-input.php";
    $email = $password = "";
    
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['email']) && isset($_POST['password'])){
            global $email,$password;
            $email = filterOutInput($_POST['email']);
            $password = filterOutInput($_POST['password']);

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;


            header("refresh:3;url=http://localhost/mini-project/otpauthenticationforsignin.php");

        }
    }




?>
