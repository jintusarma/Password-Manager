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
    *{
        margin: 0;
        padding: 0;
    }
        #myForm {
            display: none;
        }
</style>

<?php include 'components/navbar.php'; ?>
        <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
          <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
            <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
          </div>
          <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Hello <?php echo $row["name"] ?></h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Welcome to password manager</p>
          </div>
 

    <!-- <p>Add Password</p> -->
    <button id="showFormButton"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Password</button>



 


  <form action="password_manager/password_submit.php" method="POST" class="mx-auto mt-4 mb-8 max-w-xl sm:mt-4 sm:mb-8" id="myForm" onsubmit="submitForm(event)">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      
      
      <div class="sm:col-span-2">
        <label for="website" class="block text-sm font-semibold leading-6 text-gray-900">Website</label>
        <div class="mt-2.5">
          <input type="text" name="website" id="website" autocomplete="website" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="username" class="block text-sm font-semibold leading-6 text-gray-900">Username</label>
        <div class="mt-2.5">
          <input type="text" name="username" id="username" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">Password</label>
        <div class="mt-2.5">
          <input type="password" name="password" id="password" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      
      
     
    </div>
    <div class="mt-10">
      <button type="submit" class="block w-full rounded-md bg-indigo-700 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Password</button>
    </div>
  </form>

  
  
  <button><a href="password_manager/password_list.php"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Show All Password</a></button>
  
  <button class="block rounded-md bg-red-700 px-8 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="authentication/logout.php">Logout</a></button>
</div>


        <!-- <label for="name">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="pass" name="pass" required>
        <br> -->

    




    

    <script>
        const toggleFormButton = document.getElementById('showFormButton');
        const formContainer = document.getElementById('myForm');
        const dynamicForm = document.getElementById('dynamicForm');

        toggleFormButton.addEventListener('click', () => {
            if (formContainer.style.display === 'none' || !formContainer.style.display) {
                formContainer.style.display = 'block';
                toggleFormButton.style.display = 'none';
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