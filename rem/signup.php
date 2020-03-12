<?php  
include('db_connect.php');
if(isset($_POST["signup"]))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];

$sql = "INSERT INTO signup (email, pass, cpass, fname, lname, dob) VALUES ('$email', '$pass', '$cpass', '$fname', '$lname', '$dob')";
    
    $result = mysqli_query($conn,$sql);
    
    if (!empty($result))
    {
        echo "DONE";
    }
    else
    {
        echo "NOT DONE";
    }

}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>realestatemanagement.com/Signup Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/rem.css">
  </head>
  <body background="img/signup.jpg">
      
    <h1>Signup</h1>
      <div class="signup">
    <form id ="signupform" action="signup.php" method="post">
    
        <label for="em"><b>Email Address</b></label>
        <input type="text" name="email" placeholder="Email Address" required="required" />
        <label for="p"><b>Password</b></label>
        <input type="password" name="pass" placeholder="Password" required="required" />
        <label for="cp"><b>Confirm Password</b></label>
        <input type="password" name="cpass" placeholder="Confirm Password" required="required" />
        <label for="fn"><b>First Name</b></label>
        <input type="text" name="fname" placeholder="First Name" required="required" />
        <label for="ln"><b>Last Name</b></label>
         <input type="text" name="lname" placeholder="Last Name" required="required" />
        <label for="dob"><b>Date of Birth</b></label>
         <input type="text" name="dob" placeholder="Date of Birth" required="required" />
        <input type ="submit" name = "signup" value = "SIGNUP" class = "btn-signup"/>
        <button type="Cancel" class="btn btn-primary btn-block btn-large">Cancel</button>
          </form>
      </div>
    </body>
</html>

            