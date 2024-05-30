<?php
require '../configuration/config.php';
if ($_SESSION['login']) {
    $user = $_SESSION["username"];
    $query = "SELECT * FROM password_list where user='$user'";
    $res = mysqli_query($conn, $query);
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
    <table>
        <tr>
            <th>Title</th>
            <th>Password</th>
        </tr>
        <?php
            while ($rows=mysqli_fetch_assoc($res)) {
        ?>
        <tr>
            <td><?php echo $rows['title'] ?></td>
            <td>
                <?php

                    $decryptedData = openssl_decrypt($rows['password'], $method, $key, $options, $iv);

                    echo  $decryptedData;
                ?>
            </td>
        </tr>
        <?php } ?>
    </table>

    <button><a href="../">Back</a></button>
</body>

</html>