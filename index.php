<?php 
    require 'configuration/config.php';
    if($_SESSION["login"]){
        $user = $_SESSION["username"];
        $query = "SELECT * FROM users where username='$user' or name='$user'";
        $res = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($res);
    }
    else{
        header("Location: authentication/signup.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password manager</title>
</head>
<body>
    <h1>Hello <?php echo $row['name'];?></h1>

    <p>Add Password</p>
</body>
</html>