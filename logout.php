<?php
    session_start();
    session_unset();
    session_destroy();
    // unset($_SESSION['loggedIn']);
    // unset($_SESSION['username']);
    // unset($_SESSION['email']);
    // print_r($_SESSION);
    header("location: index.php");
?>