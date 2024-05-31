<?php
    require '../configuration/config.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $user = $_SESSION['username'];
        $title = $_POST["title"];
        $pass = $_POST["pass"];

        // $method = "AES-256-CBC";
        // $key = "encryptionKey123";
        // $options = 0;
        // $iv = '1234567891011121';

        $newKey = $key.$user;

        $encryptedData = openssl_encrypt($pass, $method, $newKey, $options,$iv);


        // $decryptedData = openssl_decrypt($encryptedData, $method, $key, $options, $iv);


        // echo $user.$title." ".$encryptedData;
        // echo "\nDecrypt : ".$decryptedData;

        $query= "INSERT into password_list(title,password,user) values ('$title','$encryptedData','$user')";
        $res = mysqli_query($conn,$query);

        if($res){
            header("Location: ../index.php");
        }
    }
?>