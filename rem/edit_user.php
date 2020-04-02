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
    <div class="Edit User">
        <form autocomplete="off" id="editform" action="edit_user.php" method="post">
            <h1>Edit User</h1>
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

    <div class="logoutlink"> <a href="login.php">Logout</a> </div>
</body>

</html>
