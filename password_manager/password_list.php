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
    <title>Password-List</title>
</head>

<body>

    
    <div class="header">
        <?php include '../components/navbar.php'; ?>

        <div class="flex justify-center m-4 ">
            <p class="border-double border-4 border-sky-500 px-8 py-4 bg-slate-100 font-mono text-xl font-medium tracking-wide">Password List</p>
        </div>
    </div>


    <div class="flex justify-center">
        <table class="border-separate border-2 border-slate-500 w-1/2">
            <tr class="">
                <th class="border border-slate-600">Site</th>
                <th class="border border-slate-600">Username</th>
                <th class="border border-slate-600">Password</th>
            </tr>
            <?php
                while ($rows=mysqli_fetch_assoc($res)) {
            ?>
            <tr class="">
                <td class="border border-slate-700 "> <p class="flex justify-center"><?php echo $rows['website'] ?> </p></td>
                <td class="border border-slate-700"> <p class="flex justify-center"><?php echo $rows['uname'] ?> </p></td>
                <td class="border border-slate-700 ">
                    <p class="flex justify-center">
                        <?php

                        include '../sensitive_info/encryption.php';
                        $newKey = $key.$user;
                        $decryptedData = openssl_decrypt($rows['password'], $method, $newKey, $options, $iv);

                        echo  $decryptedData;
                        ?>
                    </p>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    
    <div  class="flex justify-center">
        <button class="border border-slate-800"><a href="../">Back</a></button>
    </div>
</body>

</html>