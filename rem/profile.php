<?php  
session_start();            //Session Start 
include('db_connect.php');
if(isset($_SESSION['email']))
{
    echo "hello : " . $_SESSION['email'];
    
$query1 ="SELECT * FROM profile WHERE email ='{$_SESSION['email']}'";
    $result = mysqli_query($conn,$query1) or die(mysqli_error());
    
            while ($row1 = mysqli_fetch_array($result))
            {
                $email = $row1['email'];
                $pass = $row1['pass'];
                $fname = $row1['fname'];
                $lname = $row1['lname'];
                $dob = $row1['dob'];
                $access = $row1['access'];
                $phone = $row1['phone'];
                $dep = $row1['dep'];
                $address = $row1['address'];
            }

}
    else
    {
        echo "Cant Fetch Data";
    }

?>
<?php
include('db_connect.php');
if(isset($_POST["edit"]))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $access = $_POST['access'];
    $phone = $_POST['phone'];
    $dep = $_POST['dep'];
    $address = $_POST['address'];
        
    /*https://forums.mysql.com/read.php?52,620146,620146
    
    REGUlar can only see my profile
      elevated can see myprofile + users.php
      admin can see +access request.php
    */  

$sql = "UPDATE profile SET
email = '$email',
pass = '$pass',
fname = '$fname',
lname = '$lname',
dob = '$dob',
access = '$access',
phone = '$phone',
dep = '$dep',
address = '$address'
where email = '$email'";
    
    $result = mysqli_query($conn,$query);
    
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
    <title>realestatemanagement.com/Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/rem.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body background="img/profile.jpg">
    <!-- Sidebar -->

    <div class="menu">
        <ul>
            <li><a href="welcome.php" class="sidebar">Welcome</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="users.php">Users</a></li>
            <li>
                <a href="access_request.php">Access Requests</a>
            </li>
        </ul>
    </div>

    <div class="profile">
        <form autocomplete="off" id="profileform" action="db_connect.php" method="post">
            <h1>Profile</h1>
            <label for="em"><b>Email Address</b></label>
            <input type="text" name="e" placeholder="Email Address" value=<?php echo $email; ?> required="required" />
            <label for="p"><b>Password</b></label>
            <input type="password" name="p" placeholder="Password" value=<?php echo $pass; ?> required="required" />
            <label for="fn"><b>First Name</b></label>
            <input type="text" name="fn" placeholder="First Name" value=<?php echo $fname; ?> required="required" />
            <label for="ln"><b>Last Name</b></label>
            <input type="text" name="ln" placeholder="Last Name" value=<?php echo $lname; ?> required="required" />

            <script>
                $(function() {
                    $("#datepicker").datepicker();
                    $("#format").on("change", function() {
                        $("#datepicker").datepicker("option", "dateFormat", $(this).val());
                    });
                });

            </script>
            <b>Date of Birth <input type="text" name="dob" value=<?php echo $dob; ?> id="datepicker" size="30"></b>

            <label for="at"><b>Access Type</b></label>
            <input type="text" name="at" placeholder="Access Type" value=<?php echo $access; ?> required="required" />
            <label for="phone"><b>Phone Number</b></label>
            <input type="text" name="phone" placeholder="Phone Number" value=<?php echo $phone; ?> required="required" />
            <label for="dept"><b>Department</b></label>
            <input type="text" name="dept" placeholder="Department" value=<?php echo $dep; ?> required="required" />
            <label for="addr"><b>Address</b></label>
            <input type="text" name="addr" placeholder="Address" value=<?php echo $address; ?> required="required" />

            <input type="submit" name="edit" value="EDIT" class="btn-edit" />
        </form>
    </div>
    <div class="reqbtn">
        <input type="submit" name="req" value="Request Elevated Access" class="btn-req" />
    </div>
    <div class="logoutlink">
        <a href="login.php">Logout</a>
    </div>
</body>

</html>
