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
    <title>realestatemanagement.com/Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/rem.css">
</head>

<body background="img/profile.jpg">
    <!-- Sidebar -->

    <div class="menu">
        <a href="welcome.php" class="sidebar">Welcome</a>
        <a href="profile.php">My Profile</a>
        <a href="users.php">Users</a>
        <a href="access_request.php">Access Requests</a>

    </div>

    <div class="Profile">

        <form id="profileform" action="db_connect.php" method="post">
            <h1>Profile</h1>
            <label for="em"><b>Email Address</b></label>
            <input type="text" name="e" placeholder="Email Address" required="required" />
            <label for="p"><b>Password</b></label>
            <input type="password" name="p" placeholder="Password" required="required" />

            <label for="fn"><b>First Name</b></label>
            <input type="text" name="fn" placeholder="First Name" required="required" />
            <label for="ln"><b>Last Name</b></label>
            <input type="text" name="ln" placeholder="Last Name" required="required" />
            <label for="dob"><b>Date of Birth</b></label>
            <input type="text" name="dob" placeholder="Date of Birth" required="required" />
            <label for="at"><b>Access Type</b></label>
            <input type="text" name="at" placeholder="Access Type" required="required" />
            <label for="phone"><b>Phone Number</b></label>
            <input type="text" name="phone" placeholder="Phone Number" required="required" />
            <label for="dept"><b>Department</b></label>
            <input type="text" name="dept" placeholder="Department" required="required" />
            <label for="addr"><b>Address</b></label>
            <input type="text" name="addr" placeholder="Address" required="required" />

            <input type="submit" name="edit" value="EDIT" class="btn-edit" />
        </form>
    </div>
    <div class="reqbtn">
        <input type="submit" name="req" value="Request Elevated Access" class="btn-req" />
        <label for="addr"><b>Request Pending</b></label>
    </div>
    <div class="logoutlink"> <a href="login.php">Logout</a> </div>
</body>

</html>
