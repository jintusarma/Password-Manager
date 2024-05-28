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
<style>
        #myForm {
            display: none;
        }
    </style>
    <h1>Hello <?php echo $row['name'];?></h1>

    <p>Add Password</p>
    <button id="showFormButton">Add Password</button>


    <form action="password_manager/password_submit.php" method="post" id="myForm" onsubmit="submitForm(event)">
        <label for="name">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="pass" name="pass" required>
        <br>
        <button type="submit">Submit</button>
    </form>

    <script>
        const toggleFormButton = document.getElementById('showFormButton');
        const formContainer = document.getElementById('myForm');
        const dynamicForm = document.getElementById('dynamicForm');

        toggleFormButton.addEventListener('click', () => {
            if (formContainer.style.display === 'none' || !formContainer.style.display) {
                formContainer.style.display = 'block';
            } else {
                formContainer.style.display = 'none';
            }
        });

        dynamicForm.addEventListener('submit', (event) => {
            event.preventDefault();
            formContainer.style.display = 'none';
            dynamicForm.reset();
        });
    </script>

</body>
</html>