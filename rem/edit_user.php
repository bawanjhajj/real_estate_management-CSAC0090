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
    <title>realestatemanagement.com/Edit User Page</title>
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
    <div class="Edit User">
        <form id="editform" action="edit_user.php" method="post">
            <h1>Edit User</h1>
            <label for="em"><b>Email Address</b></label>
            <input type="text" name="email" placeholder="Email Address" required="required" />
            <label for="p"><b>Password</b></label>
            <input type="password" name="pass" placeholder="Password" required="required" />

            <label for="fn"><b>First Name</b></label>
            <input type="text" name="fname" placeholder="First Name" required="required" />
            <label for="ln"><b>Last Name</b></label>
            <input type="text" name="lname" placeholder="Last Name" required="required" />
            <label for="dob"><b>Date of Birth</b></label>
            <input type="text" name="dob" placeholder="Date of Birth" required="required" />
            <label for="at"><b>Access Type</b></label>
            <input type="text" name="access" placeholder="Access Type" required="required" />
            <div class="reqstatus"><label for="addr"><b>Access Request Aproved</b></label></div>
            <label for="phone"><b>Phone Number</b></label>
            <input type="text" name="phone" placeholder="Phone Number" required="required" />
            <label for="dept"><b>Department</b></label>
            <input type="text" name="dep" placeholder="Department" required="required" />
            <label for="addr"><b>Address</b></label>
            <input type="text" name="address" placeholder="Address" required="required" />

            <input type="submit" name="edit" value="EDIT" class="btn-edit" />
        </form>
    </div>

    <div class="logoutlink"> <a href="login.php">Logout</a> </div>
</body>

</html>
