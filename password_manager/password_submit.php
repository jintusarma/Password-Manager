<?php
    require '../configuration/config.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $user = $_SESSION['username'];
        $title = $_POST["title"];
        $pass = $_POST["pass"];
        // $hashPass = password_hash($pass,PASSWORD_DEFAULT);
        // $realPass = 


        // echo $user.$title.$pass;

        $query= "INSERT into password_list(title,password,user) values ('$title','$pass','$user')";
        $res = mysqli_query($conn,$query);

        if($res){
            header("Location: ../index.php");
        }
    }
?>