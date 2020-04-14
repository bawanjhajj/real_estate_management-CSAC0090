<?php  
session_start();            //Session Start    
include('db_connect.php');  //link to Connection file
    
if(isset($_POST["login"]))  //When click login
{
    //Define $user and $pass
    $email=$_POST['uname'];       //Assign Variable
    $pass=$_POST['pass'];
    $access=$_POST['access'];

    $query = mysqli_query($conn,"SELECT * FROM login WHERE email='$email' AND pass='$pass'");

    $rows = mysqli_num_rows($query);    
    if($rows != 0)                  //if data exists
    {
        while ($row = mysqli_fetch_array($query))
        {
           $dbemail = $row['email'];
            $dbpass = $row['pass'];
            $dbaccess = $row['access'];
        }

         $_SESSION['email']=$email;
         $_SESSION['dbaccess']=$dbaccess;
         header("Location: welcome2.php");
    }
    else{   echo "Access Not Defined";   }
}
mysqli_close($conn);
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
            <input type="email" placeholder="Email Address" name="uname" required />
<!--            <input type="email" pattern=".+@gmail.com" placeholder="Ex. abc@gmail.com" name="uname" required>-->

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" required>

            <input type="hidden" name="access" />

            <input type="submit" name="login" value="LOGIN" class="loginbtn" />

            <button id="signupbtn" onclick="document.location = 'signup.php'">Signup</button>
        </div>
    </form>
</body>

</html>
