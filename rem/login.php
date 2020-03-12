<?php  
include('db_connect.php');

if(isset($_POST["login"])){
    

     //Define $user and $pass
 $email=$_POST['uname'];
 $pass=$_POST['pass'];

$query = mysqli_query($conn,"SELECT * FROM login WHERE email='$email' AND pass='$pass'");
    
    
 $rows = mysqli_num_rows($query);

         if($rows == 1){
         header("Location: welcome.php"); // Redirecting to other page
 }
          else if($rows == 2){
 header("Location: welcome2.php"); // Redirecting to other page
 }
              else if($rows == 3){
 header("Location: welcome3.php"); // Redirecting to other page
 }
 else
 {
 $error = "Username of Password is Invalid";
 }

}
?>


<!DOCTYPE html>
<html>

<head>
    <title>realestatemanagement.com/Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/rem.css">
</head>

<body background="img/login.jpg">

    <form id="loginform" action="login.php" method="POST">
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" required>



            <input type="submit" name="login" value="LOGIN" class="btn-login" />
            <button onclick="document.location = 'signup.php'">Signup</button>
        </div>
    </form>
</body>

</html>
