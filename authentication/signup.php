<?php
require '../configuration/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];
    $gender = $_POST["gender"];

    $query = "SELECT * FROM users WHERE username='$username'";
    $res = mysqli_fetch_row(mysqli_query($conn, $query));


    if ($res>0) {
        echo
        "<script>
            alert('Username already exists');
        </script>";
    } else {

        if ($pass == $cpass) {

            $hashPass = password_hash($pass,PASSWORD_DEFAULT);

            $query = "INSERT INTO users(username,name,password,gender) values ('$username','$name','$hashPass','$gender')";
            $res = mysqli_query($conn, $query);

            if ($res) {
                header("Location: login.php");
            } 
            
            else {
                echo
                "<script>
                    alert('Some Problem Occured , Try Again');
                </script>";
            }
        } 
        
        else {
            echo
            "<script>
                alert('Password doesn't match');
            </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Password Manager</title>
</head>

<body>

    <h1>Signup</h1>
    <form action="signup.php" method="post">
        <p>Username</p>
        <input type="text" name="username" id="username" placeholder="Enter Your Username">
        <p>Name</p>
        <input type="text" name="name" id="name" placeholder="Enter your Name">
        <p>Password</p>
        <input type="password" name="pass" id="pass" placeholder="Enter Your Password">
        <p>Confirm Password</p>
        <input type="password" name="cpass" id="cpass" placeholder="Confirm Password">
        <p>Select Your Gender</p>
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <a href="login.php">Login</a>
</body>

</html>