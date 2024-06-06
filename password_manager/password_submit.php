<?php
    require '../configuration/config.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $user = $_SESSION['username'];
        $website = $_POST["website"];
        $uname = $_POST["username"];
        $pass = $_POST["password"];



        $newKey = $key.$user;

        require '../sensitive_info/encryption.php';

        $encryptedData = openssl_encrypt($pass, $method, $newKey, $options,$iv);




        $query= "INSERT into password_list(website,uname,password,user) values ('$website','$uname','$encryptedData','$user')";
        $res = mysqli_query($conn,$query);

        if($res){
            header("Location: ../index.php");
        }
    }
?>