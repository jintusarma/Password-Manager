<?php 
    require '../configuration/config.php';
    $_SESSION=[];
    session_unset();
    session_destroy();
    header("Location: login.php");

?>