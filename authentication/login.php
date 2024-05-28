<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '../configuration/config.php';
    $usernameOrEmail = $_POST["usernameOrEmail"];
    $pass = $_POST["pass"];

    $query = "SELECT * FROM users where username='$usernameOrEmail' or name='$usernameOrEmail'";

    $res = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($res);

    if ($row > 0) {
        $hashPassword = $row['password'];
        if (password_verify($pass, $hashPassword)) {
            $_SESSION['login'] = TRUE;
            $_SESSION['username'] = $usernameOrEmail;
            header("Location: ../index.php");
        }
    } else {
        echo "    
        <script>
            alert('Username Or Email Doesn't Exist');
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <h1>Login</h1>
    </div>

    <form action="login.php" method="post">
        <p>Username Or Email : <input type="text" name="usernameOrEmail"></p>
        <p>Password : <input type="password" name="pass"></p>
        <button type="submit">Submit</button>
    </form>
</body>
</html>