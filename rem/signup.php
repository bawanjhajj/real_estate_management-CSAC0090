<?php  
include('db_connect.php');
if(isset($_POST["signup"]) && $_POST['g-recaptcha-response']!="")
{
    
 $secret = '6Ldk8ugUAAAAADn5jB3Boh6qnkOyhxjUdTfQRYcS';
 $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
 $responseData = json_decode($verifyResponse);
   // echo $verifyResponse;
 if($responseData->success)
 {
     echo "reCAPTCHA VARIFIED   ";
      echo "<br>";
     
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];

if($pass != $cpass)
{
    echo "<h3>Password wasn't same as Confirmed Password</h3>";
}    
else{
    $sql = "INSERT INTO signup (email, pass, cpass, fname, lname, dob) VALUES ('$email', '$pass', '$cpass', '$fname', '$lname', '$dob');";

   $sql .= " INSERT INTO login (email, pass) VALUES ('$email', '$pass') ;";
    
    $sql .= " INSERT INTO profile (email, pass, fname, lname, dob) VALUES ('$email', '$pass', '$fname', '$lname', '$dob');";
    
    
    $result = mysqli_multi_query($conn,$sql);
   
}
    if ($result == 1)
    {
  
    echo "  FORM SUBMITTED";
    }
    else
    {
        echo "FORM IS NOT SUBMITTED";
        echo "<br>";
    }    
 }
else
{
echo "reCAPTCHA IS NOT VARIFIED";
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

    <script src='https://www.google.com/recaptcha/api.js?hl=en'></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body background="img/signup.jpg">
    <div class="signup">
        <form autocomplete="off" id="signupform" action="signup.php" method="post">
            <h1>Signup</h1>
            <label for="em"><b>Email Address</b></label>
            <input type="email" name="email" placeholder="Ex: abc@gmail.com" required="required" />
            <label for="p"><b>Password</b></label>
            <input type="password" name="pass" placeholder="Password" required="required" />
            <label for="cp"><b>Confirm Password</b></label>
            <input type="password" name="cpass" placeholder="Confirm Password" required="required" />
            <label for="fn"><b>First Name</b></label>
            <input type="text" name="fname" placeholder="First Name" required="required" />
            <label for="ln"><b>Last Name</b></label>
            <input type="text" name="lname" placeholder="Last Name" required="required" />
            <label for="dob"><b>Date of Birth</b></label>
            <input type="text" name="dob" id="datepicker" size="30">
            <script>
                $(function() {
                    $("#datepicker").datepicker();
                    $("#format").on("change", function() {
                        $("#datepicker").datepicker("option", "dateFormat", $(this).val());
                    });
                });

            </script>

            <div class="g-recaptcha" data-sitekey="6Ldk8ugUAAAAAHWI_PhZpfGanwoDW_S4CO4jzMd9"></div>
            <input type="submit" name="signup" value="Signup" id="signupbtn" />
            <button id="cancelbtn" onclick="document.location = 'login.php'">Cancel</button>
        </form>
    </div>
</body>

</html>
