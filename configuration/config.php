<?php
session_start();
$conn = mysqli_connect("localhost","root","","password_manager") or die("Couldn't Connect");


$method = "AES-256-CBC";
$key = "encryptionKey123";
$options = 0;
$iv = '1234567891011121';
?>