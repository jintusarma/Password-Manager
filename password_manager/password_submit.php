<?php
    require '../configuration/config.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $title = $_POST["title"];
        $pass = $_POST["pass"];

        $query= "INSERT into passord_list(title,password) values ('$title','$pass')";
        $res = mysqli_query($conn,$query);

        if($res){
            header("Location: ../index.php");
        }
    }
?>