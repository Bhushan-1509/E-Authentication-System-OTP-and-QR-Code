<?php
    session_start();
    session_unset();
    session_destroy();

    header("refresh:3;url=http://localhost/mini-project/sign-in.php");

?>